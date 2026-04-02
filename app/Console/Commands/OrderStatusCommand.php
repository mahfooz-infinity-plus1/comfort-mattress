<?php

namespace App\Console\Commands;

use App\Model\TxnOrder;
use App\Model\User;
use App\Services\LogisticService;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class OrderStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Track Order Status from delhivery and update in database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(LogisticService $logistic)
    {
        $orders = TxnOrder::whereNotIN('status', ['nc', 'Delivered', 'Cancelled'])->get();
        foreach ($orders as $order) {
            $res = $logistic->trackOrder($order->shipment_id);
            $result = json_decode($res, true);
            if (array_key_exists('error', $result['tracking_data'])) {
                $track_response = [];
            } else {
                $track_response = $result['tracking_data']['shipment_track']['current_status'];

                $order->update([
                    'status' => $track_response,
                ]);

                Log::info(['Order Status' => $track_response]);

                if ($track_response == 'Delivered') {

                    $delivery_date = $result['tracking_data']['shipment_track']['delivered_date'];

                    $order->update([
                        'delivery_date' => $delivery_date,
                        'payment_status' => 'Paid',
                    ]);

                    // SMS::send($order->user->mobile, 'Comfort Mattress - Your Order has been Delivered successfully, Your Order ID : ' . $order->id . ' Login for more detail on ' . url('/'));

                    $pdf = PDF::loadView('backend.admin.invoices.download', ['invoice' => $order]);
                    Mail::send(['html' => 'backend.admin.invoices.empty'], ['invoice' => $order], function ($message) use ($order, $pdf) {
                        $message->from('comfortmattresses50@gmail.com', 'Comfort Mattress');
                        $message->to($order->user->email, $order->user->name);
                        $message->subject('Invoice copy of Order No ' . $order->id . ' From Comfort Mattress');
                        $message->attachData($pdf->output(), 'order_no_' . $order->id . '.pdf');
                    });

                    Mail::send(['html' => 'backend.admin.invoices.empty'], ['invoice' => $order], function ($message) use ($order, $pdf) {
                        $message->from('comfortmattresses50@gmail.com', 'Comfort Mattress');
                        $message->to('abhishekgupta5544@gmail.com', 'Abhishek');
                        $message->subject('Invoice copy of Order No ' . $order->id . ' From Comfort Mattress');
                        $message->attachData($pdf->output(), 'order_no_' . $order->id . '.pdf');
                    });
                }

            }
        }
    }
}
