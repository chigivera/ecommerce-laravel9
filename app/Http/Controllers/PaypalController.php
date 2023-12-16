<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{
    public function paypal(Request $request) {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $response = $provider->createOrder([
            "intent"=> "CAPTURE",
            "application_context"=> [
                "return_url"=> redirect("paypal_success"),
                "cancel_url"=> redirect("paypal_success")
            ],
            "processing units" => [
                "amount" => [
                    "currency_code"=> "USD",
          "value"=> $request->price
                ]
                ]
          
        ]);
    }
}
