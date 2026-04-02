<?php

namespace App\Http\Controllers;

use App\Model\TxnContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class EnquiryController extends Controller
{
    public function index()
    {
        $enquiries = TxnContactUs::orderBy('id', 'DESC')->paginate(50);
        return view('backend.admin.enquiries.index', compact('enquiries'));
    }

    public function create()
    {
        return view('frontend.contact');
    }

    public function store(Request $request)
    {
             if (null !== $request->input('g-recaptcha-response')) { 
  $secretKey = "6LeoZPsqAAAAAK8JcHHcCgJcGbvE1ECuj3tp4dMt";
  $ip = $request->ip();
  $response = $request->input('g-recaptcha-response');
  $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$ip";
  $fire = file_get_contents($url);
  $data = json_decode($fire);
  if ($data->success == true) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'mobile' => 'required|digits_between:8,12',
            'subject' => 'max:191',
            'email' => 'email|max:191',
            'message' => '',
        ],
            [
                'name.required' => 'Please Enter Your Name',
                'mobile.required' => 'Please Enter Your Mobile Number',
                'mobile.digits_between' => 'Please Enter Mobile Number in digits between 8 to 12',
                'subject.required' => 'Please Enter Subject',
                'email.required' => 'Please Enter Email ID',
                'email.email' => 'Please Enter Proper Email ID',
                'message.required' => 'Please Enter Message',
            ]);

        if ($validator->fails()) {
            connectify('error', 'Error', $validator->errors()->first());
            return redirect(route('contact'))->withInput();
        }

        $data = TxnContactUs::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'subject' => $request->subject,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        Mail::send(['html' => 'backend.mails.enquiry'], ['data' => $data], function ($message) {
            $message->from('comfortmattresses50@gmail.com', 'Comfort Mattress');
            $message->to('comfortmattresses50@gmail.com', 'Comfort Mattress');
            $message->to('comfortlatexmattresses1959@gmail.com', 'Comfort Mattress');
            $message->to('sanjaresolutions@gmail.com', 'Sanjar E Solutions');
            $message->to('mirzafaizan1931@gmail.com', 'Faizan');

            $message->subject('New Enquiry From Comfort Mattress');
        });
    $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => 'https://sanjarcrm.com/api/leads/submit',
                CURLOPT_POST => 1,
                CURLOPT_POSTFIELDS => array(
                    'name' => $request->name,
                    'contact' => $request->mobile,
                    'message' => $request->message,
                    'email' => $request->email,
                    'extra' => 'Contact Us Page',
                    'table_alias' => 'comfort_mattress_com_',
                    'api_key' => 'e98a33fc9fb8eeadf78165a20b8761f5',
                )
            ));
            $resp = curl_exec($curl);
            curl_close($curl);
        connectify('success', 'Enquiry Success', 'Thank you for contacting us, we\'ll get back to you soon !');

        return redirect(route('contact'));
  }
  }
       else{
      connectify('error', 'Error', 'Please Filled Captcha !');
        return redirect(route('contact'));

        }

    }
}
