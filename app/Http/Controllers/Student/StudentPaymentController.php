<?php

namespace Studihub\Http\Controllers\Student;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Studihub\Http\Controllers\Controller;
use Rave;
class StudentPaymentController extends Controller
{
    public function initialize() {
        //This initializes payment and redirects to the payment gateway
        //The initialize method takes the parameter of the redirect URL
        Rave::initialize(route('callback'));
    }

    public function callback() {
        // This verifies the transaction and takes the parameter of the transaction reference
        $data = Rave::verifyTransaction(request()->txref);
        //dd($data);
        $chargeResponsecode = $data->data->chargecode;
        $chargeAmount = $data->data->amount;
        $chargeCurrency = $data->data->currency;

        $amount = 500;
        $currency = "NGN";
        if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {
            // transaction was successful...
            // please check other things like whether you already gave value for this ref
            // if the email matches the customer who owns the product etc
            //Give Value and return to Success page
            DB::table('user_paid_topics')->insert([
                "topic_id" => $data->metadata['topic_id'],
                "student_id" => Auth()->guard('student')->id(),
                "date_paid" => Carbon::now(),
                "expired_at" => Carbon::now()->subDays($data->data->duration)

            ]);

            return redirect('/success');

        } else {
            //Dont Give Value and return to Failure page

            return redirect('/failed');
        }
        // dd($data->data);
    }
}
