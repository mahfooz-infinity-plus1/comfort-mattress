<?php
namespace App\Model;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use \GuzzleHttp\Client;

class SMS implements ShouldQueue
{
    // public static $user = "hniperfumes";
    // public static $password = "hni@2019";
    // public static $senderid = "hnipfm";
    // public static $route = "06";

    public static function send($mobile, $text)
    {
        $val = Validator::make(['mobile' => $mobile, 'text' => $text], [
            'mobile' => 'required|digits:10',
            'text' => 'required|string|max:250',
        ]);
        if ($val->fails()) {
            Log::info($val->errors());
            return;
        } else {
            // try {
            //     $baseUrl = 'http://103.233.76.120/api/mt/SendSMS?user=' . self::$user . '&password=' . self::$password . '&senderid=' . self::$senderid . '&channel=Trans&DCS=0&flashsms=0&number=' . $mobile . '&text=' . $text . '&route=' . self::$route;

            //     $client = new \GuzzleHttp\Client([
            //         'http_errors' => false,
            //     ]);
            //     $res = $client->get($baseUrl);
            //     return;
            // } catch (\Exception $ex) {
            //     Log::info('Error : ' . $ex->getMessage());
            //     return;
            // }
             try {
                $baseUrl = sprintf(
                    '%s?user=%s&password=%s&senderid=%s&channel=Trans&DCS=0&flashsms=0&number=%s&text=%s&route=%s',
                    config('SMS_API_URL'),
                    config('SMS_USER'),
                    config('SMS_PASSWORD'),
                    config('SMS_SENDERID'),
                    $mobile,
                    urlencode($text),
                    config('SMS_ROUTE')
                );
    
                $client = new Client(['http_errors' => false]);
                $res = $client->get($baseUrl);
                
                if ($res->getStatusCode() == 200) {
                    return ['success' => true];
                } else {
                    Log::error('SMS sending failed: ' . $res->getBody());
                    return ['success' => false, 'error' => 'SMS sending failed'];
                }
            } catch (\Exception $ex) {
                Log::error('Error: ' . $ex->getMessage());
                return ['success' => false, 'error' => 'Exception occurred'];
            }
        }
    }
}
