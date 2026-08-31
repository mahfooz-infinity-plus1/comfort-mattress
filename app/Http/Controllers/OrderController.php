<?php

namespace App\Http\Controllers;

use App\Model\Address;
use App\Model\Delivery;
use App\Model\MapColorSize;
use App\Model\Paytm;
use App\Model\Shop;
use App\Model\Transaction;
use App\Model\TxnMasterGst;
use App\Model\TxnOrder;
use App\Model\TxnOrderDetail;
use App\Model\TxnUser;
use App\Model\MstOffer;
use App\Services\LogisticService;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index()
    {
        if (Cart::getContent()->count() <= 0) {

            connectify('error', 'Add Item', 'Please Add few Product in your cart first !');

            return redirect(route('search'));
        }
        $addresses = [];
        if (auth('user')->check()) {

            $addresses = Address::where('user_id', auth('user')->user()->id)->get();
        }

        $promocodes = DB::table('txn_users')->select('*')->where('elite', true)->inRandomOrder()->limit(5)->get();
        return view('frontend.order.checkout', compact('promocodes', 'addresses'));
    }

  public function checkout(Request $request, LogisticService $logistic)
{
    // Step 1: Validate request input
    $validator = Validator::make(
        $request->all(),
        [
            'payment_mode' => 'required',
            'pincode' => 'required|digits:6',
            'choose_address' => 'required|numeric|min:1|exists:addresses,id',
        ],
        [
            'payment_mode.required' => 'Please Select Any of the Payment Mode !',
            'pincode.required' => 'Please Enter Pincode',
            'pincode.digits' => 'Pincode should be of 6 digits',
            'choose_address.required' => 'Please Choose Any Address',
            'choose_address.numeric' => 'Invalid Address provided',
            'choose_address.min' => 'Invalid Address provided',
            'choose_address.exists' => 'Address does not exists',
        ]
    );

    if ($validator->fails()) {
        connectify('error', 'Checkout Error', $validator->errors()->first());
        return redirect(route('checkout'))->withInput();
    }

    // Step 2: Verify service availability
    $res = $logistic->verify($request->pincode);
    $res1 = json_decode($res, true);

    if (!isset($res1['status']) || $res1['status'] != 200) {
        connectify('error', 'Delivery Not Available', 'Delivery Not Available at ' . $request->pincode);
        return redirect(route('checkout'));
    }

    // Step 3: Calculate cart total
    $total = 0;
    $user = auth('user')->user();
    $gst_value = 0;
    foreach (Cart::getContent() as $item) {
        $size = MapColorSize::find($item->attributes->map_id);
        $total += $size->mrp * $item->quantity;
        $gst = TxnMasterGst::find($size->product->gst_id);
        $gst_value = 1 + ($gst->gst_value / 100);
    }

    // Step 4: Promo Code Logic
    $promocode = null;
    $is_valid_promocode = false;
    $is_discount = false;
    $discountAmount = 0;

    if ($request->session()->has('promocode')) {
        $promoData = $request->session()->get('promocode');
        if (isset($promoData['asdasd'])) {
            $promo = TxnUser::where('code', $promoData['code'])->first();
            dd($promo);
            if ($promo) {
                $promocode = $promo->code;
            }
        } elseif (isset($promoData['code'], $promoData['value'])) {
            $promo = MstOffer::where('code', $promoData['code'])
                ->where('is_active', 1)
                ->first();
            if ($promo) {
                $promocode = $promo->code;
                $is_valid_promocode = true;
                $is_discount = true;

                if ($promo->type === 'percent') {
                    $discountAmount = round($total * ($promo->value / 100), 2);
                } else {
                    $discountAmount = round($promo->value, 2);

                }
            }
        }
    }

    // Step 5: Payment Mode
    $cod = $request->payment_mode === 'cod';
    $request['payment_mode'] = $cod ? 'cod' : 'paytm';
    $request['status'] = 'nc';
    $request['shipingcharge'] = 0;

    // Step 6: Calculate balance, tax
    $request['discount'] = $discountAmount;
    $balance = $total - $discountAmount;
    if ($total < 1000) {
        $balance += $request['shipingcharge'];
    }
    $request['tbt'] = round($balance / $gst_value, 2);
    $request['tax'] = round($balance - $request['tbt'], 2);

    // Step 7: Get Address
    $add = Address::find($request->choose_address);

    // Step 8: Create Order
    $order = TxnOrder::create([
        'total' => $balance,
        'status' => $request->status,
        'user_id' => $user->id,
        'user_name' => $add->name,
        'promocode' => $promocode,
        'discount' => $request['discount'],
        'address' => $add->address,
        'pincode' => $add->pincode,
        'city' => $add->city,
        'territory' => $add->territory,
        'landmark' => $add->landmark,
        'country' => $add->country,
        'type_of_address' => $add->type_of_address,
        'tbt' => $request['tbt'],
        'tax' => $request['tax'],
        'payment_mode' => $request['payment_mode'],
        'payment_status' => "Pending",
        'is_discount' => $is_discount,
    ]);

    // Step 9: Update User Address
    $user->update([
        'address' => $add->address,
        'city' => $add->city,
        'territory' => $add->territory,
        'landmark' => $add->landmark,
        'pincode' => $add->pincode,
        'country' => $add->country,
        'address_id' => $add->id,
        'mobile' => $add->mobile,
    ]);

    // Step 10: Create Order Items
    foreach (Cart::getContent() as $item) {
        TxnOrderDetail::create([
            'title' => $item->name,
            'map_id' => $item->attributes->map_id,
            'mrp' => $item->price,
            'quantity' => $item->quantity,
            'product_id' => $item->attributes->product_id,
            'order_id' => $order->id,
            'size_id' => $item->attributes->size_id,
            'color_id' => $item->attributes->color_id,
            'offers' => $item->attributes->offers,
        ]);
    }

    // Step 11: COD / Online Payment Handling
    if ($cod) {
        $OrderCreation = $logistic->OrderCreation($order, $user, "COD");

        if ($OrderCreation) {
            $order->update(['status' => 'Booked']);
        }

        Mail::send(['html' => 'backend.mails.received'], ['order' => $order], function ($message) use ($order) {
            $message->to($order->user->email)->subject('Your order has been placed successfully ! [order no : ' . $order->id . ']');
            $message->from('comfortmattresses50@gmail.com', 'Comfort Mattress');
        });

        Mail::send(['html' => 'backend.mails.admin'], ['order' => $order], function ($message) use ($order) {
            // $message->to('comfortmattresses50@gmail.com')->subject('You have a new order ! [order id : ' . $order->id . ']');
            $message->to('comfortlatexmattresses1959@gmail.com')->subject('You have a new order ! [order id : ' . $order->id . ']');
            $message->from('comfortmattresses50@gmail.com', 'Comfort Mattress');
        });

        Cart::clear();

        connectify('success', 'Order Placed', 'Your Order has been placed Successfully !');
        return redirect()->route('order.success', encrypt($order->id));
    } else {
        /* OLD PAYMENT GATEWAY (PHONEPE) CODE
        $transaction_data = [
            'merchantId' => env('PHONEPE_MERCHANT_ID'),
            'merchantTransactionId' => $order->id,
            'amount' => $balance * 100,
            "merchantUserId" => strval($user->id),
            "param1" => strval($user->id),
            'redirectUrl' => route('paytm.callback'),
            'redirectMode' => "POST",
            'callbackUrl' => route('paytm.callback'),
            "paymentInstrument" => ["type" => "PAY_PAGE"]
        ];

        $encode = json_encode($transaction_data);
        $payloadMain = base64_encode($encode);
        $salt_index = 1;
        $payload = $payloadMain . "/pg/v1/pay" . env('PHONEPE_API_KEY');
        $sha256 = hash("sha256", $payload);
        $final_x_header = $sha256 . '###' . $salt_index;
        $requestPayload = json_encode(['request' => $payloadMain]);

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.phonepe.com/apis/hermes/pg/v1/pay",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $requestPayload,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "X-VERIFY: $final_x_header",
                "accept: application/json"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            dd("cURL Error #:" . $err);
        }

        $res = json_decode($response);
        if (isset($res->code) && $res->code === 'PAYMENT_INITIATED') {
            return redirect()->away($res->data->instrumentResponse->redirectInfo->url);
        } else {
            dd('Payment Error: ' . json_encode($res));
        }
        */

        // NEW PAYMENT GATEWAY (CCAVENUE) CODE
        $merchant_data = '';
        $working_key = env('CCAVENUE_WORKING_KEY');
        $access_code = env('CCAVENUE_ACCESS_CODE');
        
        $postData = [
            'merchant_id' => env('CCAVENUE_MERCHANT_ID'),
            'order_id' => $order->id,
            'amount' => $balance,
            'currency' => 'INR',
            'redirect_url' => route('ccavenue.callback'),
            'cancel_url' => route('ccavenue.cancel'),

            'language' => 'EN',
            'billing_name' => $user->name,
            'billing_address' => $add->address,
            'billing_city' => $add->city,
            'billing_state' => $add->territory,
            'billing_zip' => $add->pincode,
            'billing_country' => $add->country,
            'billing_tel' => $add->mobile,
            'billing_email' => $user->email,
        ];
        
        foreach ($postData as $key => $value){
            $merchant_data .= $key.'='.$value.'&';
        }
        
        $encrypted_data = \App\Services\CCAvenueService::encrypt($merchant_data, $working_key);
        
        return view('frontend.order.ccavenue-redirect', compact('encrypted_data', 'access_code'));
    }
}


    public function handleCallbackofCOD($orderid)
    {
        $order = TxnOrder::where('id', decrypt($orderid))->with('details', 'user', 'transaction')->firstOrFail();
        return view('frontend.order.transaction-success', compact('order'));
    }

    /* OLD PAYMENT GATEWAY (PHONEPE / PAYTM) CALLBACK
    public function handleCallbackFromPaytm(Request $request, LogisticService $logistic)
    {
        // dd($request->all());
        $paramList = $request->all();

        if ($request->code == 'PAYMENT_SUCCESS') {
            $txnres = $request->all();
            Log::info(['Payment Success' => $txnres]);
            

            $order = TxnOrder::where('id', $request->transactionId)->with('details', 'user', 'transaction')->firstOrFail();

            if ($order->status == 'nc') {

                if ($order->payment_mode == 'paytm') {
                    $OrderCreation = $logistic->OrderCreation($order, $order->user, "Prepaid");
                }

                $order->update([
                    'status' => 'Booked',
                    'payment_status' => 'Paid',
                    // 'shipment_id' => $order->payment_mode == 'paytm' ? $OrderCreation['shipment_id'] : null,
                    // 'shipment_order_id' => $order->payment_mode == 'paytm' ? $OrderCreation['order_id'] : null,
                ]);

                Mail::send(['html' => 'backend.mails.received'], ['order' => $order], function ($message) use ($order) {
                    $message->to($order->user->email)->subject('Your order has been placed successfully ! [order no : ' . $order->id . ']');
                    $message->from('comfortmattresses50@gmail.com', 'Comfort Mattress');
                });

                Mail::send(['html' => 'backend.mails.admin'], ['order' => $order], function ($message) use ($order) {
                    // $message->to('comfortmattresses50@gmail.com')->subject('You have a new order ! [order id : ' . $order->id . ']');
                    $message->to('comfortlatexmattresses1959@gmail.com')->subject('You have a new order ! [order id : ' . $order->id . ']');
                    $message->from('comfortmattresses50@gmail.com', 'Comfort Mattress');
                });

                Cart::clear();
            }
            return view('frontend.order.transaction-success')->with('order', $order)->with('TXNID', $request->transactionId);
        } else {
            return view('frontend.order.transaction-failed')->with('data', $request->except(['MID', 'CHECKSUMHASH']));

        }

        // }
    }
    */
    
    // NEW PAYMENT GATEWAY (CCAVENUE) CALLBACKS
    public function ccavenueCallback(Request $request, LogisticService $logistic)
    {
        $workingKey = env('CCAVENUE_WORKING_KEY');
        $encResponse = $request->encResp;
        $rcvdString = \App\Services\CCAvenueService::decrypt($encResponse, $workingKey);
        
        $decryptValues = explode('&', $rcvdString);
        $dataSize = sizeof($decryptValues);
        
        $responseMap = [];
        for ($i = 0; $i < $dataSize; $i++) {
            $information = explode('=', $decryptValues[$i]);
            if (count($information) == 2) {
                $responseMap[$information[0]] = urldecode($information[1]);
            }
        }
        
        $orderStatus = $responseMap['order_status'] ?? 'Failure';
        $orderId = $responseMap['order_id'] ?? null;
        
        if ($orderStatus === 'Success') {
            Log::info(['CCAvenue Payment Success' => $responseMap]);
            $order = TxnOrder::where('id', $orderId)->with('details', 'user', 'transaction')->firstOrFail();
            
            if ($order->status == 'nc') {
                if ($order->payment_mode == 'paytm' || $order->payment_mode == 'ccavenue') {
                    $OrderCreation = $logistic->OrderCreation($order, $order->user, "Prepaid");
                }
                
                $order->update([
                    'status' => 'Booked',
                    'payment_status' => 'Paid',
                ]);
                
                Mail::send(['html' => 'backend.mails.received'], ['order' => $order], function ($message) use ($order) {
                    $message->to($order->user->email)->subject('Your order has been placed successfully ! [order no : ' . $order->id . ']');
                    $message->from('comfortmattresses50@gmail.com', 'Comfort Mattress');
                });

                Mail::send(['html' => 'backend.mails.admin'], ['order' => $order], function ($message) use ($order) {
                    $message->to('comfortlatexmattresses1959@gmail.com')->subject('You have a new order ! [order id : ' . $order->id . ']');
                    $message->from('comfortmattresses50@gmail.com', 'Comfort Mattress');
                });
                
                Cart::clear();
            }
            return view('frontend.order.transaction-success')->with('order', $order)->with('TXNID', $responseMap['tracking_id'] ?? '');
        } else {
            return view('frontend.order.transaction-failed')->with('data', $responseMap);
        }
    }

    public function ccavenueCancel(Request $request)
    {
        return view('frontend.order.transaction-failed')->with('data', ['message' => 'Transaction cancelled by user.']);
    }
}
