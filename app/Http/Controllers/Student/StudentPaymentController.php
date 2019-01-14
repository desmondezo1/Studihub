<?php

namespace Studihub\Http\Controllers\Student;

use Illuminate\Http\Request;
use Studihub\Http\Controllers\Controller;
use Rave;
class StudentPaymentController extends Controller
{
    public function initialize() {
        //This initializes payment and redirects to the payment gateway
        //The initialize method takes the parameter of the redirect URL
        Rave::initialize(route('callback'));
        //dd(request()->txref);
    }

    public function callback() {
        // This verifies the transaction and takes the parameter of the transaction reference
        $data = Rave::verifyTransaction(request()->txref);
        $chargeResponsecode = $data->data->chargecode;
        $chargeAmount = $data->data->amount;
        $chargeCurrency = $data->data->currency;

        $amount = 4500;
        $currency = "NGN";
        if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {
            // transaction was successful...
            // please check other things like whether you already gave value for this ref
            // if the email matches the customer who owns the product etc
            //Give Value and return to Success page

            return redirect('/success');

        } else {
            //Dont Give Value and return to Failure page

            return redirect('/failed');
        }
        // dd($data->data);
    }
}
