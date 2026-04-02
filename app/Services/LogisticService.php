<?php

namespace App\Services;
use App\Model\MumbaiPincode;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class LogisticService
{
    private $token = null;
    public function __construct()
    {
        try {

            $res = $this->authentication();
            if ($res) {
                $response = json_decode($res, true);
                $this->token = $response['token'];
            }

        } catch (\Exception $ex) {
            Log::error(['Authentication Error' => $ex->getMessage()]);
            return;
        }
    }

    // public function verify($pincode)
    // {
    //     try {

    //         $baseUrl = env('LOGISTIC_BASE_URL') . '/courier/serviceability/?pickup_postcode=110037&delivery_postcode=' . $pincode . '&weight=1&cod=0';

    //         $curl = curl_init();

    //         curl_setopt_array($curl, array(
    //             CURLOPT_URL => $baseUrl,
    //             CURLOPT_RETURNTRANSFER => true,
    //             CURLOPT_ENCODING => '',
    //             CURLOPT_MAXREDIRS => 10,
    //             CURLOPT_TIMEOUT => 0,
    //             CURLOPT_FOLLOWLOCATION => true,
    //             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //             CURLOPT_CUSTOMREQUEST => 'GET',
    //             CURLOPT_HTTPHEADER => array(
    //                 'Content-Type: application/json',
    //                 'Authorization: Bearer ' . $this->token,
    //             ),
    //         ));

    //         $response = curl_exec($curl);
    //         curl_close($curl);
    //         return $response;

    //     } catch (\Exception $ex) {
    //         Log::error(['Verify Error' => $ex->getMessage()]);
    //         return;
    //     }
    // }

    public function verify($pincode){
        
        $exists = MumbaiPincode::where('pincode', $pincode)->first();
        if ($exists) {

            return json_encode([
                'status' => 200,
                'data' => [
                    'available_courier_companies' => [
                        ['etd' => '3-5 days'] 
                    ]
                ]
            ]);

        }
          else{

        return json_encode([
                'status' => 200,
                'data' => [
                    'available_courier_companies' => [
                        ['etd' => '3-5 days'] 
                    ]
                ]
            ]);
        // else{

        // return json_encode([
        //     'status' => 404,
        //     'message' => 'Pincode not found'
        // ]);
    }

    }


    public function authentication()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => env('LOGISTIC_BASE_URL') . '/auth/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode(array('email' => env('LOGISTIC_EMAIL'), 'password' => env('LOGISTIC_PASSWORD'))),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            Log::error(['Authentication Error' => $err]);
            return false;
        } else {
            return $response;
        }
    }

    public function orderCreation($order, $user, $payment_method = "COD")
    {

        $orderDetails = [];

        foreach ($order->details as $key => $value) {
            $temp = [];
            $temp['name'] = $value['title'];
            $temp['sku'] = Str::slug($value['title']);
            $temp['units'] = $value['quantity'];
            $temp['selling_price'] = $value['mrp'];
            $temp['discount'] = 0;
            $temp['tax'] = '';
            $temp['hsn'] = $value['id'];

            $orderDetails[] = $temp;
        }

        $data = [
            "order_id" => $order->id,
            'order_date' => date('Y-m-d H:i', strtotime($order->created_at)),
            'pickup_location' => "Primary",
            'billing_customer_name' => $order->user_name,
            'billing_last_name' => $order->user_name,
            "billing_address" => $order->address,
            "billing_city" => $order->city,
            "billing_pincode" => $order->pincode,
            "billing_state" => $order->territory,
            "billing_country" => $order->country,
            "billing_email" => $user->email,
            "billing_phone" => $user->mobile,
            "shipping_is_billing" => true,
            "order_items" => $orderDetails,
            "payment_method" => $payment_method,
            "sub_total" => $order->total,
            "length" => "10",
            "breadth" => "10",
            "height" => "10",
            "weight" => "1",
        ];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => env('LOGISTIC_BASE_URL') . '/orders/create/adhoc',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . $this->token,
            ),
        ));

        $res = curl_exec($curl);

        Log::info(['Shipment Response: ' => $res]);

        $response = json_decode($res, true);

        Log::info(['shipment resp' => $response]);

        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            Log::error(['Shipment Order Creation Error' => $err]);
            return false;
        }

        return $response;
    }

    public function cancelOrder($shiprocketOrderId)
    {
        try {

            $baseUrl = env('LOGISTIC_BASE_URL') . '/orders/cancel';

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $baseUrl,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode(array("ids" => [$shiprocketOrderId])),
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . $this->token,
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                Log::error(['Shipment Order Cancel Error' => $err]);
                return false;
            }

            return $response;

        } catch (\Exception $ex) {
            Log::error(['Cancel Order Error' => $ex->getMessage()]);
            return;
        }
    }

    public function trackOrder($shipment_id)
    {
        try {

            $baseUrl = env('LOGISTIC_BASE_URL') . '/courier/track/shipment/' . $shipment_id;
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $baseUrl,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . $this->token,
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                Log::error(['Shipment Order Track Error' => $err]);
                return false;
            }

            return $response;

        } catch (\Exception $ex) {
            Log::error(['Track Order Error' => $ex->getMessage()]);
            return;
        }
    }

    public function generateLabel($shipment_id)
    {
        try {

            $baseUrl = env('LOGISTIC_BASE_URL') . '/courier/generate/label';
            dd(json_encode(array("shipment_id" => [$shipment_id])));
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $baseUrl,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode(array("shipment_id" => [$shipment_id])),
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . $this->token,
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                Log::error(['Shipment Order Cancel Error' => $err]);
                return false;
            }

            return $response;

        } catch (\Exception $ex) {
            Log::error(['Cancel Order Error' => $ex->getMessage()]);
            return;
        }
    }
}
