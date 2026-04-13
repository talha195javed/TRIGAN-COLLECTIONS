<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Bank Transfer Details
    |--------------------------------------------------------------------------
    | Shown to customers who select "Bank Transfer" at checkout.
    | Update these values with your actual bank account information.
    |
    */

    'bank_name'            => env('CHECKOUT_BANK_NAME', 'Meezan Bank'),
    'bank_account_title'   => env('CHECKOUT_BANK_ACCOUNT_TITLE', 'Trigan Collections'),
    'bank_account_number'  => env('CHECKOUT_BANK_ACCOUNT_NUMBER', '02270106498671'),
    'bank_iban'            => env('CHECKOUT_BANK_IBAN', 'PK36MEZN0002270106498671'),

    /*
    |--------------------------------------------------------------------------
    | WhatsApp Contact
    |--------------------------------------------------------------------------
    | Customers are asked to send a payment screenshot to this WhatsApp number.
    | whatsapp_number: digits only (used in wa.me link)
    | whatsapp_display: formatted for display
    |
    */

    'whatsapp_number'  => env('CHECKOUT_WHATSAPP', '923001234567'),
    'whatsapp_display' => env('CHECKOUT_WHATSAPP_DISPLAY', '92 300 1234567'),

];
