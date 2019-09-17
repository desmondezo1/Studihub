<?php

namespace Studihub\Http\Controllers\Student;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use KingFlamez\Rave\Facades\Rave;
use Studihub\Http\Controllers\Controller;
use Paystack;

class StudentPaymentController extends Controller
{

    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch (\Exception $e){
            return redirect()->route('callback');
        }
    }

    public function handleGatewayCallback()
    {

        $paymentDetails = Paystack::getPaymentData();
        if($paymentDetails['data']['status'] == 'success'){
            DB::table('user_paid_topics')->insert([
                "topic_id" => $paymentDetails['data']['metadata']['topic_id'],
                "student_id" => $paymentDetails['data']['metadata']['student_id'],
                "date_paid" => Carbon::parse($paymentDetails['data']['paid_at']),
                "expired_at" => Carbon::now()->subDays(Carbon::parse($paymentDetails['data']['metadata']['expires_at'])),
                'amount' => $paymentDetails['data']['amount'],
                'ip_address' => $paymentDetails['data']['ip_address'],
                'reference' => $paymentDetails['data']['reference'],
                'customer_code' => $paymentDetails['data']['customer']['customer_code'],
                'transaction_details' => $paymentDetails['message'],

            ]);
            return redirect('/success');
       }
        return redirect('/failed');
    }
}
