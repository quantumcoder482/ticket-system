<?php

/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

_auth();
$action = route('1','contacts');
$action = strtolower($action);

header('Content-type: application/json');

$app->emit('json/'.$action);

switch ($action){

    case 'customer':
    case 'customers':

        $contacts = ORM::for_table('crm_accounts')->select('id')->select('account','text')->select('email')->find_array();

        echo json_encode($contacts);



        break;

    case 'invoice':
    case 'invoices':

        $invoices = ORM::for_table('sys_invoices')->select('id')->select('invoicenum')->select('account')->select('total')->find_array();

        $x = 0;
        $val = array();
        foreach ($invoices as $invoice){
            $val[$x]['id'] = $invoice['id'];
            $val[$x]['text'] = $invoice['invoicenum'].$invoice['id'].' '.$invoice['account'];
            $x++;
        }

        echo json_encode($val);



        break;


    case 'lead':
    case 'leads':

        $leads = ORM::for_table('crm_leads')->select('first_name')->select('middle_name')->select('last_name')->select('company')->select('email')->select('phone')->select('id')->find_array();

    $x = 0;
    $val = array();
    foreach ($leads as $lead){
        $val[$x]['id'] = $lead['id'];
        $val[$x]['text'] = $lead['first_name'].' '.$lead['middle_name'].' '.$lead['last_name'].(($lead['company'] != ''?' ('.$lead['company'].' )':''));
        $x++;
    }

    echo json_encode($val);


        break;

    case 'quote':
    case 'quotes':

    $quotes = ORM::for_table('sys_quotes')->select('subject')->select('account')->select('id')->select('companyname')->find_array();

    $x = 0;
    $val = array();
    foreach ($quotes as $quote){
        $val[$x]['id'] = $quote['id'];
        $val[$x]['text'] = $quote['account'].' - '.$quote['subject'].(($quote['companyname'] != ''?' ('.$quote['companyname'].' )':''));
        $x++;
    }

    echo json_encode($val);


        break;






}