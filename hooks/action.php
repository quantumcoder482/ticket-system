<?php

// Sample Hooks



//
//
//Event::bind('routing_started',function(){
//
//    global $_L;
//
//    $_L['CRM'] = 'Customers';
//    $_L['Add Contact'] = 'Add Customer';
//    $_L['List Contacts'] = 'List Customers';
//
//
//});
//
//
//Event::bind('invoices/markpaid/',function($invoice){
//
//    $nexmo_api_key = ''; # Nexmo API Key
//    $nexmo_api_secret = ''; # Nexmo API Secret
//    $from = 'iBilling'; # Message from
//
//
//    // Find the client
//
//    $client = ORM::for_table('crm_accounts')->find_one($invoice->userid);
//
//    if($client->phone == ''){
//        return false;
//    }
//
//    $to = $client->phone;
//
//    $text = 'Hi '.$client->account.'! Thanks for your payment. Invoice- '.$invoice->id.' Paid Successfully.';
//
//
//    $url = 'https://rest.nexmo.com/sms/json?' . http_build_query(
//            [
//                'api_key' =>  $nexmo_api_key,
//                'api_secret' => $nexmo_api_secret,
//                'to' => $to,
//                'from' => $from,
//                'text' => $text
//            ]
//        );
//
//    $ch = curl_init($url);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//    $response = curl_exec($ch);
//
//return $response;
//
//});
//
//
//
//add_menu_admin('About','#','about','fa fa-paper-plane',2,array(
//    array(
//        'name' => 'Documentation',
//        'link' => 'http://www.ibilling.io/documentation/'
//    ),
//    array(
//        'name' => 'Purchase',
//        'link' => 'https://codecanyon.net/item/ibilling-crm-accounting-and-billing-software/11021678',
//        'target' => '_blank'
//    )
//));
//
//
//Event::bind('client_registered',function($data){
//
//
//    $message = 'New Client Registered. Client: '.$data['account'].' Email: '.$data['email'];
//
//    Ib_Email::sendEmail('admin@example.com','Client Signup',$message);
//
//
//});
//
//
//Event::bind('client_registered',function($data){
//
//    $name = $data['account'];
//    $email = $data['email'];
//
//    // Your logic to create account through api
//
//
//});