<?php
/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

return [
    'mode'    => env('PAYPAL_MODE', 'sandbox'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'sandbox' => [
        'client_id'         => env('AWMgfWPRqgL1YtpUDHnX0oVX0V0qJeqim9AlT3I7tf6c0bOpDq4YgHCt9lehyYR2Q8amyE-Ds_T1iqxK', ''),
        'client_secret'     => env('AWMgfWPRqgL1YtpUDHnX0oVX0V0qJeqim9AlT3I7tf6c0bOpDq4YgHCt9lehyYR2Q8amyE-Ds_T1iqxK', ''),
        'app_id'            => 'APP-80W284485P519543T',
    ],

    'payment_action' => env('PAYPAL_PAYMENT_ACTION', 'Sale'), // Can only be 'Sale', 'Authorization' or 'Order'
    'currency'       => env('PAYPAL_CURRENCY', 'USD'),
    'notify_url'     => env('PAYPAL_NOTIFY_URL', ''), // Change this accordingly for your application.
    'locale'         => env('PAYPAL_LOCALE', 'en_US'), // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
    'validate_ssl'   => env('PAYPAL_VALIDATE_SSL', true), // Validate SSL when creating api client.
];
