<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{
    public function payment(Request $request) {
        $provider = new PayPalClient;
        
        $provider->setApiCredentials(config('paypal'));
        $paypal_token = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route("paypal_success"),
                "cancel_url" => route("paypal_cancel")
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->total_price
                    ]
                ]
            ]
        ]);

        if(isset($response['id']) && $response['id']!=null) {
            foreach($response['links'] as $link) {
                if($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('paypal_cancel');
        }
    }
    public function success(Request $request) {
        $provider = new PayPalClient;
        
        $provider->setApiCredentials(config('paypal'));
        $paypal_token = $provider->getAccessToken();
        // $order_id = order::findOrFail($request->$cart->id)
        $response = $provider->capturePaymentOrder($request->token);
        if(isset($response['status']) && $response['status']==='COMPLETED') {
            return redirect()->route('index');

        }else {
            return redirect()->route('paypal_cancel');
        }


}
}
