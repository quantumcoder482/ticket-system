<?php

/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

$ui->assign('_application_menu', 'invoices');
$ui->assign('_st', 'Invoices');
$ui->assign('_title', $config['CompanyName']);

if(isset($routes[1]) && ($routes[1] != '')){
    $action = $routes[1];
}
else{
    $action = 'login';
}



$ui->assign('tplheader', 'sections/client_header');
$ui->assign('tplfooter', 'sections/client_footer');


Event::trigger('client',array($action));


switch ($action) {


    case 'iview':

        Event::trigger('client/iview/');

        $today = date('Y-m-d H:i:s');

        $xfooter = Asset::js(array('numeric'));

        $id  = $routes['2'];
        $d = ORM::for_table('sys_invoices')->find_one($id);
        if($d){
            $token = $routes['3'];
            $token = str_replace('token_','',$token);
            $vtoken = $d['vtoken'];
            if($token != $vtoken){
                echo 'Sorry Token does not match!';
                exit;
            }


            $items = ORM::for_table('sys_invoiceitems')->where('invoiceid',$id)->order_by_asc('id')->find_many();
            $ui->assign('items',$items);
            //find related transactions
            $trs_c = ORM::for_table('sys_transactions')->where('iid', $id)->count();

            $trs = ORM::for_table('sys_transactions')->where('iid', $id)->order_by_desc('id')->find_many();
            $ui->assign('trs', $trs);
            $ui->assign('trs_c', $trs_c);
//find the user
            $a = ORM::for_table('crm_accounts')->find_one($d['userid']);
            $ui->assign('a',$a);
            $ui->assign('d',$d);

            $i_credit = $d['credit'];
            $i_due = '0.00';
            $i_total = $d['total'];
            if($d['credit'] != '0.00'){
                $i_due = $i_total - $i_credit;
            }
            else{
                $i_due =  $d['total'];
            }




            $ui->assign('i_due', $i_due);

//            $pgs = ORM::for_table('sys_pg')->where('status','Active')->order_by_asc('sorder')->find_many();
//
//            $ui->assign('pgs',$pgs);
            $cf = ORM::for_table('crm_customfields')->where('showinvoice','Yes')->order_by_asc('id')->find_many();
            $ui->assign('cf',$cf);

            $x_html = '';

            Event::trigger('view_invoice');

            $ui->assign('xfooter', $xfooter);



            $ui->assign('x_html',$x_html);

            $inv_files = Invoice::files($id);

            $inv_files_c = count($inv_files);

            $ui->assign('inv_files_c',$inv_files_c);

            $ui->assign('inv_files',$inv_files);

            //

            if(!isset($_SESSION['uid'])){

                $ip = get_client_ip();
                // log invoice access log

                $country = $_L['Unknown'];
                $city = $_L['Unknown'];
                $lat = '';
                $lon = '';

                if(isset($_SERVER['HTTP_REFERER'])){
                    $referer = $_SERVER['HTTP_REFERER'];
                }
                else{
                    $referer = '';
                }

                if(isset($_SERVER['HTTP_USER_AGENT'])){
                    $browser = $_SERVER['HTTP_USER_AGENT'];
                }
                else{
                    $browser = '';
                }

                if($config['maxmind_installed'] == 1){

                    $l_data = Ip2Location::getDetails($ip);

                    $country = $l_data['country'];
                    $city = $l_data['city'];
                    $lat = $l_data['lat'];
                    $lon = $l_data['lon'];


                }

                $ial = ORM::for_table('ib_invoice_access_log')->create();
                $ial->iid = $id;
                $ial->ip = $ip;
                $ial->browser = $browser;
                $ial->referer = $referer;
                $ial->country = $country;
                $ial->city = $city;
                $ial->viewed_at = $today;
                $ial->customer = $d->account;
                $ial->save();



            }


            //


            if($a->cid != '' || $a->cid != 0){
                $company = Company::find($a->cid);
            }
            else{
                $company = false;
            }

            // find the quote

            $quote = false;

            if($d->quote_id != '0'){
                $quote = ORM::for_table('sys_quotes')->find_one($d->quote_id);
            }

            $plugin_extra_js = '';

            $app->emit('client_viewing_invoice',[&$d]);

            $currencies_all = Currency::getAllCurrencies();

            if(isset($currencies_all[$d->currency_iso_code]))
            {
                $data_a_sign = $currencies_all[$d->currency_iso_code]['symbol'];
                $data_a_sep = $currencies_all[$d->currency_iso_code]['thousands_separator'];
                $data_a_dec = $currencies_all[$d->currency_iso_code]['decimal_mark'];

                if($currencies_all[$d->currency_iso_code] == true)
                {
                    $data_p_sign = 'p';
                }
                else{
                    $data_p_sign = 's';
                }
            }
            else{
                $data_a_sign = $config['currency_code'];
                $data_a_sep = $config['thousands_sep'];
                $data_a_dec = $config['dec_point'];
                $data_p_sign = $config['currency_symbol_position'];
            }


            $payment_gateways = PaymentGateway::where('status','Active')
                ->orderBy('sorder','asc')
                ->get();

            $payment_gateways_by_processor = $payment_gateways->keyBy('processor')->toArray();


           view('client-iview',[
               'company' => $company,
               'quote' => $quote,
               'plugin_extra_js' => $plugin_extra_js,
               'data_a_sign' => $data_a_sign,
               'data_a_sep' => $data_a_sep,
               'data_a_dec' => $data_a_dec,
               'data_p_sign' => $data_p_sign,
               'payment_gateways' => $payment_gateways,
               'payment_gateways_by_processor' => $payment_gateways_by_processor
           ]);

        }
        else{
            r2(U . 'customers/list', 'e', $_L['Account_Not_Found']);
        }

        break;


    case 'q':

        Event::trigger('client/q/');

        $id  = $routes['2'];
        $d = ORM::for_table('sys_quotes')->find_one($id);
        if($d){
            $token = $routes['3'];
            $token = str_replace('token_','',$token);
            $vtoken = $d['vtoken'];
            if($token != $vtoken){
                echo 'Sorry Token does not match!';
                exit;
            }


            $items = ORM::for_table('sys_quoteitems')->where('qid',$id)->order_by_asc('id')->find_many();
            $ui->assign('items',$items);

            $a = ORM::for_table('crm_accounts')->find_one($d['userid']);
            $ui->assign('a',$a);
            $ui->assign('d',$d);

            $cf = ORM::for_table('crm_customfields')->where('showinvoice','Yes')->order_by_asc('id')->find_many();
            $ui->assign('cf',$cf);

            $x_html = '';




            $ui->assign('x_html',$x_html);

            view('client-quote');

        }
        else{
            r2(U . 'customers/list', 'e', $_L['Account_Not_Found']);
        }

        break;




    case 'iprint':

        Event::trigger('client/iprint/');

        $id  = $routes['2'];
        $d = ORM::for_table('sys_invoices')->find_one($id);
        if($d){

            $token = $routes['3'];
            $token = str_replace('token_','',$token);
            $vtoken = $d['vtoken'];
            if($token != $vtoken){
                echo 'Sorry Token does not match!';
                exit;
            }

            //find all activity for this user
            $items = ORM::for_table('sys_invoiceitems')->where('invoiceid',$id)->order_by_asc('id')->find_many();
            $trs_c = ORM::for_table('sys_transactions')->where('iid', $id)->count();

            $trs = ORM::for_table('sys_transactions')->where('iid', $id)->order_by_desc('id')->find_many();
//find the user
            $a = ORM::for_table('crm_accounts')->find_one($d['userid']);
            $i_credit = $d['credit'];
            $i_due = '0.00';
            $i_total = $d['total'];
            if($d['credit'] != '0.00'){
                $i_due = $i_total - $i_credit;
            }
            require 'system/lib/invoices/render.php';

        }
        else{
            r2(U . 'customers/list', 'e', $_L['Account_Not_Found']);
        }

        break;

    case 'ipdf':

        Event::trigger('client/ipdf/');


        $id  = $routes['2'];
        $token = $routes['3'];

        $extraHtml = '';

        $app->emit('generatingPDFInvoice',[&$id]);


        Invoice::pdf($id,'inline',$token);

//        $d = ORM::for_table('sys_invoices')->find_one($id);
//        if($d){
//            $token = $routes['3'];
//            $token = str_replace('token_','',$token);
//            $vtoken = $d['vtoken'];
//            if($token != $vtoken){
//                echo 'Sorry Token does not match!';
//                exit;
//            }
//            //find all activity for this user
//            $items = ORM::for_table('sys_invoiceitems')->where('invoiceid',$id)->order_by_asc('id')->find_many();
//
//            $trs_c = ORM::for_table('sys_transactions')->where('iid', $id)->count();
//
//            $trs = ORM::for_table('sys_transactions')->where('iid', $id)->order_by_desc('id')->find_many();
//
////find the user
//            $a = ORM::for_table('crm_accounts')->find_one($d['userid']);
//            $i_credit = $d['credit'];
//            $i_due = '0.00';
//            $i_total = $d['total'];
//
//            if($d['credit'] != '0.00'){
//                $i_due = $i_total-$i_credit;
//            }
//            else{
//                $i_due = $i_total;
//            }
//
//
//
//          //  $i_due = number_format($i_due,2,$config['dec_point'],$config['thousands_sep']);
//            $cf = ORM::for_table('crm_customfields')->where('showinvoice','Yes')->order_by_asc('id')->find_many();
//
//            define('_MPDF_PATH','system/lib/mpdf/');
//
//            require('system/lib/mpdf/mpdf.php');
//
//            $pdf_c = '';
//            $ib_w_font = 'dejavusanscondensed';
//            if($config['pdf_font'] == 'default'){
//                $pdf_c = 'c';
//                $ib_w_font = 'Helvetica';
//            }
//            elseif($config['pdf_font'] == 'default'){
//                $ib_w_font = 'Helvetica';
//            }
//            else{
//
//
//
//            }
//
//
//
//            $mpdf=new mPDF($pdf_c,'A4','','',20,15,15,25,10,10);
////            $mpdf->SetProtection(array('print'));
//            $mpdf->SetTitle($config['CompanyName'].$_L['Invoice']);
//            $mpdf->SetAuthor($config['CompanyName']);
//            $mpdf->SetWatermarkText(ib_lan_get_line($d['status']));
//            $mpdf->showWatermarkText = true;
//            $mpdf->watermark_font = $ib_w_font;
//
//            // For chinese language uncomment below
//            // $mpdf->watermark_font = 'Sun-ExtA';
//
//            //
//            $mpdf->watermarkTextAlpha = 0.1;
//            $mpdf->SetDisplayMode('fullpage');
//
//            if($config['pdf_font'] == 'AdobeCJK'){
//                $mpdf->useAdobeCJK = true;
//                $mpdf->autoScriptToLang = true;
//                $mpdf->autoLangToFont = true;
//            }
//
//            /*
//
//
//$mpdf->autoLangToFont = true;
//
//$mpdf->watermark_font = 'Sun-ExtA';
//
//             */
//
//            $pdf_tpl = 'system/lib/invoices/pdf-x2.php';
//
//            Event::trigger('invoices/before_pdf_render/',array($id));
//
//
//            ob_start();
//
//            require $pdf_tpl;
//
//            $html = ob_get_contents();
//
//
//            ob_end_clean();
//
//            $mpdf->WriteHTML($html);
//
//            if (isset($routes['4']) AND ($routes['4'] == 'dl')) {
//                $mpdf->Output(date('Y-m-d') . _raid(4) . '.pdf', 'D'); # D
//            } else {
//                $mpdf->Output(date('Y-m-d') . _raid(4) . '.pdf', 'I'); # D
//            }
//        }
//        else{
//            r2(U . 'customers/list', 'e', $_L['Account_Not_Found']);
//        }

        break;



    case 'qpdf':

        Event::trigger('client/qpdf/');


        $id  = route(2);

        Quote::pdf($id,route(4));

//        if (isset($routes[4]) AND ($routes[4] == 'dl')) {
//            $mpdf->Output(date('Y-m-d') . _raid(4) . '.pdf', 'D'); # D
//        } else {
//            $mpdf->Output(date('Y-m-d') . _raid(4) . '.pdf', 'I'); # D
//        }
//
//        $d = ORM::for_table('sys_quotes')->find_one($id);
//        if ($d) {
//
//            //find all activity for this user
//            $items = ORM::for_table('sys_quoteitems')->where('qid', $id)->order_by_asc('id')->find_many();
//
//
//            $a = ORM::for_table('crm_accounts')->find_one($d['userid']);
//
//
//
//            $cf = ORM::for_table('crm_customfields')->where('showinvoice', 'Yes')->order_by_asc('id')->find_many();
//
//
//            define('_MPDF_PATH','system/lib/mpdf/');
//
//            require('system/lib/mpdf/mpdf.php');
//
//            $pdf_c = '';
//            $ib_w_font = 'dejavusanscondensed';
//            if($config['pdf_font'] == 'default'){
//                $pdf_c = 'c';
//                $ib_w_font = 'Helvetica';
//            }
//
//            $mpdf=new mPDF($pdf_c,'A4','','',20,15,15,25,10,10);
//            $mpdf->SetProtection(array('print'));
//            $mpdf->SetTitle($config['CompanyName'].' '.$_L['Quote']);
//            $mpdf->SetAuthor($config['CompanyName']);
//            $mpdf->SetWatermarkText($d['status']);
//            $mpdf->showWatermarkText = true;
//            $mpdf->watermark_font = $ib_w_font;
//            $mpdf->watermarkTextAlpha = 0.1;
//            $mpdf->SetDisplayMode('fullpage');
//
//            if($config['pdf_font'] == 'AdobeCJK'){
//                $mpdf->useAdobeCJK = true;
//                $mpdf->autoScriptToLang = true;
//                $mpdf->autoLangToFont = true;
//            }
//
//            ob_start();
//
//            require 'system/lib/invoices/q-x2.php';
//
//            $html = ob_get_contents();
//
//
//            ob_end_clean();
//
//            $mpdf->WriteHTML($html);
//
//            if (isset($routes[4]) AND ($routes[4] == 'dl')) {
//                $mpdf->Output(date('Y-m-d') . _raid(4) . '.pdf', 'D'); # D
//            } else {
//                $mpdf->Output(date('Y-m-d') . _raid(4) . '.pdf', 'I'); # D
//            }
//            // $mpdf->Output();
//
//
//
//        }


        break;


    case 'ipay':

        Event::trigger('client/ipay/');


        $id  = $routes[2];

        $token = $routes[3];



        $pg = _post('pg');



        if($pg == ''){

            $pg = route(4);

        }

        Event::trigger('client/ipay/pg',array($pg,$id,$token));

        $d = ORM::for_table('sys_invoices')->find_one($id);
        if($d){

            $token = str_replace('token_','',$token);
            $vtoken = $d['vtoken'];
            if($token != $vtoken){
                echo 'Sorry Token does not match!';
                exit;
            }

            //check pg
            $ui->assign('d',$d);


            $i_credit = $d['credit'];
            $i_due = '0.00';
            $i_total = $d['total'];


            $amount = $i_total-$i_credit;
            $invoiceid = $d['id'];
            $vtoken = $d['vtoken'];
            $ptoken = $d['ptoken'];





            //get user details

            $u = ORM::for_table('crm_accounts')->find_one($d->userid);

            $ui->assign('a',$u);


            switch ($pg){

                case 'paypal':

                    $p = ORM::for_table('sys_pg')->where('processor', 'paypal')->find_one();

                    if($p){

                        // get currency

                        $currency_id = $d['currency'];

                        $currency_find = M::factory('Models_Currency')->find_one($currency_id);

                        if($currency_find){

                            $currency = $currency_id;
                            $currency_code = $currency_find->cname;
                            $currency_rate = $currency_find->rate;


                        }
                        else{

                            $currency = 0;
                            $currency_code = $p['c1'];
                            $currency_rate = 1.0000;

                        }

                        $ppemail = $p['value'];
//

                        $c2 = $p['c2'];
                        if(($c2 != '') AND (is_numeric($c2)) AND($c2 != '1')){
                            $amount = $amount/$c2;
                            $amount = round($amount,2);
                        }

                        $url = 'https://www.paypal.com/cgi-bin/webscr';

//                        $params = array(
//                            array('name' => "business",
//                                'value' => $ppemail
//                            ),
//                            array('name' => "return",
//                                'value' => U . "client/ipay_submitted/$invoiceid/token_$vtoken/",
//                            ),
//                            array('name' => "cancel_return",
//                                'value' => U . "client/ipay_cancel/$invoiceid/token_$vtoken/",
//                            ),
//                            array('name' => "notify_url",
//                                'value' => U . "client/ipay_ipn/$invoiceid/token_$ptoken/",
//                            ),
//                            array('name' => "item_name_1",
//                                'value' => "Payment For INV # $invoiceid"
//                            ),
//                            array('name' => "amount_1",
//                                'value' => $amount
//                            ),
//                            array('name' => "item_number_1",
//                                'value' => $invoiceid
//                            ),
//                            array('name' => "quantity_1",
//                                'value' => '1'
//                            ),
//                            array('name' => "upload",
//                                'value' => '1'
//                            ),
//                            array('name' => "cmd",
//                                'value' => '_cart'
//                            ),
//                            array('name' => "txn_type",
//                                'value' => 'cart'
//                            ),
//                            array('name' => "num_cart_items",
//                                'value' => '1'
//                            ),
//                            array('name' => "rm",
//                                'value' => '2'
//                            ),
//                            array('name' => "payment_gross",
//                                'value' => $amount
//                            ),
//                            array('name' => "currency_code",
//                                'value' => $currency_code
//                            )
//                        );



                        $params = array(
                            array('name' => "business",
                                'value' => $ppemail
                            ),
                            array('name' => "return",
                                'value' => U . "client/ipay_submitted/$invoiceid/token_$vtoken/",
                            ),
                            array('name' => "cancel_return",
                                'value' => U . "client/ipay_cancel/$invoiceid/token_$vtoken/",
                            ),
                            array('name' => "notify_url",
                                'value' => U . "client/ipay_ipn/$invoiceid/token_$ptoken/",
                            ),
                            array('name' => "item_name",
                                'value' => "Payment For INV # $invoiceid"
                            ),
                            array('name' => "amount",
                                'value' => $amount
                            ),
                            array('name' => "cmd",
                                'value' => '_xclick'
                            ),
                            array('name' => "no_shipping",
                                'value' => '1'
                            ),
                            array('name' => "rm",
                                'value' => '2'
                            ),
                            array('name' => "currency_code",
                                'value' => $currency_code
                            )
                        );


                        Fsubmit::form($url, $params);

                    }

                    else{
                        echo 'Paypal is Not Found!';
                    }


                    break;


                case 'manualpayment':

                    Event::trigger('client/manualpayment/');

                    $p = ORM::for_table('sys_pg')->where('processor', 'manualpayment')->find_one();

                    if($p){

                        $ui->assign('user',$u);

                        $ui->assign('xheader', Asset::css(array('dropzone/dropzone','modal')));


                        $ui->assign('xfooter', Asset::js(array('modal','dropzone/dropzone')));

                        $ui->assign('jsvar','
                        var iid = '.$d->id.';
                        var i_token = '.$token.';
                        ');

                        $ui->assign('i_due', $amount);
                        $ui->assign('ins',$p['value']);
                       view('client-ipay');
                    }


                    break;

                case 'stripe':


                    $p = ORM::for_table('sys_pg')->where('processor', 'stripe')->find_one();

                    if($p){
                        $a = ORM::for_table('crm_accounts')->find_one($d['userid']);
                        $it = $i_total - $i_credit;
                        $amount = $it*100;
//                        $ins = ' <script
//                                        src="https://checkout.stripe.com/v2/checkout.js" class="stripe-button"
//                                        data-key="'.$p['value'].'"
//                                        data-amount="'.$amount.'"
//                                        data-name="INV #'.$d['id'].'"
//                                        data-email="'.$a['email'].'"
//                                        data-currency="'.$p['c1'].'"
//                                        data-description="Payment for Invoice # '.$d['id'].'">
//                                </script>';
//
//                        $ui->assign('ins',$ins);

                        view('stripe');
                    }


                    break;


                case 'stripe_post':
                    $p = ORM::for_table('sys_pg')->where('processor', 'stripe')->find_one();
                    if($p){
                        $a = ORM::for_table('crm_accounts')->find_one($d['userid']);
                        $it = $i_total - $i_credit;
                        $amount = $it*100;

                        if($d->currency != 0){

                            $currency = ORM::for_table('sys_currencies')->find_one($d->currency);

                            if($currency){
                                $currency_code = $currency->iso_code;
                            }

                        }
                        else{
                            $currency_code = $p['c1'];
                        }


                      //  require_once('system/lib/stripe/init.php');


                        $description = "Payment For INV # $invoiceid";

                        $cardNumber = _post('cardNumber');

                        $cardExpiry = _post('cardExpiry');

                        $ce = explode('/',$cardExpiry);


                        $cardCVC = _post('cardCVC');

                        $myCard = array(
                            'name' => $u->email,
                            'number' => $cardNumber,
                            'exp_month' => $ce['0'],
                            'exp_year' => $ce['1']
                        );


                        try {

                            \Stripe\Stripe::setApiKey($p['value']);
                            $charge = \Stripe\Charge::create(array('card' => $myCard, 'amount' => $amount, 'currency' => $currency_code,"description" => $description));


//                       $charge =  '  Stripe\Charge JSON: {
//    "id": "ch_16QJiYAN1GVPX6ZsbBl20gsJ",
//    "object": "charge",
//    "created": 1437319722,
//    "livemode": false,
//    "paid": true,
//    "status": "succeeded",
//    "amount": 193600,
//    "currency": "usd",
//    "refunded": false,
//    "source": {
//        "id": "card_16QJiYAN1GVPX6ZsDKidAMN7",
//        "object": "card",
//        "last4": "4242",
//        "brand": "Visa",
//        "funding": "credit",
//        "exp_month": 5,
//        "exp_year": 2016,
//        "fingerprint": "n0QKFME5XxL1IRG9",
//        "country": "US",
//        "name": null,
//        "address_line1": null,
//        "address_line2": null,
//        "address_city": null,
//        "address_state": null,
//        "address_zip": null,
//        "address_country": null,
//        "cvc_check": null,
//        "address_line1_check": null,
//        "address_zip_check": null,
//        "tokenization_method": null,
//        "dynamic_last4": null,
//        "metadata": [],
//        "customer": null
//    },
//    "captured": true,
//    "balance_transaction": "txn_16QJiYAN1GVPX6Zs24syLCZi",
//    "failure_message": null,
//    "failure_code": null,
//    "amount_refunded": 0,
//    "customer": null,
//    "invoice": null,
//    "description": null,
//    "dispute": null,
//    "metadata": [],
//    "statement_descriptor": null,
//    "fraud_details": [],
//    "receipt_email": null,
//    "receipt_number": null,
//    "shipping": null,
//    "destination": null,
//    "application_fee": null,
//    "refunds": {
//        "object": "list",
//        "total_count": 0,
//        "has_more": false,
//        "url": "\/v1\/charges\/ch_16QJiYAN1GVPX6ZsbBl20gsJ\/refunds",
//        "data": []
//    }
//}';



                            $charge = str_replace('Stripe\Charge JSON:','',$charge);
                           $resp = json_decode($charge,true);
                            $trid = $resp['id'];
                            $last4 = $resp['source']['last4'];
                          $captured = $resp['captured'];

                            if($captured == true){

                                $inv = ORM::for_table('sys_invoices')->find_one($id);
                                if($inv) {

                                    $inv->status = 'Paid';
                                    $inv->save();
                                    Event::trigger('invoices/markpaid/',$invoice=$inv);
                                    _msglog('s','Payment Successful');
                                    r2(U.'client/iview/'.$d['id'].'/'.'token_'.$d['vtoken']);
                                }

                            }

                            else{
                                _msglog('e','This API call cannot be made with a publishable API key. Please use a secret API key. You can find a list of your API keys at https://dashboard.stripe.com/account/apikeys.');
                                r2(U.'client/iview/'.$d['id'].'/'.'token_'.$d['vtoken']);
                            }



                        } catch(\Stripe\Error\Card $e) {
                            // Since it's a decline, \Stripe\Error\Card will be caught
                            $body = $e->getJsonBody();
                            $err  = $body['error'];

                            print('Status is:' . $e->getHttpStatus() . "\n");
                            print('Type is:' . $err['type'] . "\n");
                            print('Code is:' . $err['code'] . "\n");
                            // param is '' in this case
                            print('Param is:' . $err['param'] . "\n");
                            print('Message is:' . $err['message'] . "\n");
                        } catch (\Stripe\Error\InvalidRequest $e) {
                            // Invalid parameters were supplied to Stripe's API
                        } catch (\Stripe\Error\Authentication $e) {
                            // Authentication with Stripe's API failed
                            // (maybe you changed API keys recently)
                            echo 'Authentication with Stripe\'s API failed';
                        } catch (\Stripe\Error\ApiConnection $e) {
                            // Network communication with Stripe failed
                            echo 'Network communication with Stripe failed';
                        } catch (\Stripe\Error\Base $e) {
                            // Display a very generic error to the user, and maybe send
                            // yourself an email

                        } catch (Exception $e) {
                            // Something else happened, completely unrelated to Stripe
                            var_dump($e);
                        }

                    }

                    break;


                case 'authorize_net':

                    $p = ORM::for_table('sys_pg')->where('processor', 'authorize_net')->find_one();

                    if($p){

                        $invoiceid = $d['id'];
                        $amount = $i_total - $i_credit;
                        $url = 'https://secure.authorize.net/gateway/transact.dll';
                        $loginID = $p['value'];

                        $transactionKey = $p['c1'];

                        $description = "Invoice Payment - $invoiceid";

                        // an invoice is generated using the date and time
                        $invoice = $invoiceid;
// a sequence number is randomly generated
                        $sequence = rand(1, 1000);
// a timestamp is generated
                        $timeStamp = time();

                        $testMode = "false";
                        if (phpversion() >= '5.1.2') {
                            $fingerprint = hash_hmac("md5", $loginID . "^" . $sequence . "^" . $timeStamp . "^" . $amount . "^", $transactionKey);
                        } else {
                            $fingerprint = bin2hex(mhash(MHASH_MD5, $loginID . "^" . $sequence . "^" . $timeStamp . "^" . $amount . "^", $transactionKey));
                        }
                        $params = array(
                            array('name' => "x_login",
                                'value' => $loginID
                            ),
                            array('name' => "x_amount",
                                'value' => $amount
                            ),
                            array('name' => "x_description",
                                'value' => $description
                            ),
                            array('name' => "x_invoice_num",
                                'value' => $invoice
                            ),
                            array('name' => "x_fp_sequence",
                                'value' => $sequence
                            ),
                            array('name' => "x_fp_timestamp",
                                'value' => $timeStamp
                            ),
                            array('name' => "x_fp_hash",
                                'value' => $fingerprint
                            ),
                            array('name' => "x_test_request",
                                'value' => $testMode
                            ),
                            array('name' => "x_show_form",
                                'value' => "PAYMENT_FORM"
                            )
                        );

                        Fsubmit::form($url, $params);
                    }


                    break;


                case 'ccavenue':

                    $p = ORM::for_table('sys_pg')->where('processor', 'ccavenue')->find_one();

                    if($p){

                        require ('system/lib/misc/ccavenue.php');

                        $currency_code = $p['c2'];
                        $c3 = $p['c3'];

                        if(($c3 != '') AND (is_numeric($c3)) AND($c3 != '1')){
                            $amount = $amount/$c3;
                        }

                        $Merchant_Id = $p['value']; //Given to merchant by ccavenue


                        $WorkingKey = $p['c1']; //Given to merchant by ccavenue

                        $redirect_url = U . "client/ipay_ipn/$invoiceid/token_$ptoken/";


                        require ('system/lib/misc/ccform.php');


                        // Updated Jan 10, 2016

//                        $Checksum = getCheckSum($Merchant_Id,$amount,$invoiceid ,$redirect_url,$WorkingKey);
//
//                        $url = 'https://www.ccavenue.com/shopzone/cc_details.jsp';
//
//
//
//
//                        $params = array(
//
//                            array('name' => "merchant_id",
//                                'value' => $Merchant_Id
//                            ),
//
//                            array('name' => "Redirect_Url",
//                                'value' => $redirect_url
//                            ),
//
//                            array('name' => "amount",
//                                'value' => $amount
//                            ),
//                            array('name' => "order_id",
//                                'value' => $invoiceid
//                            ),
//                            array('name' => "Checksum",
//                                'value' => $Checksum
//                            ),
//                            array('name' => "upload",
//                                'value' => '1'
//                            ),
//                            array('name' => "ActionID",
//                                'value' => 'TXN'
//                            ),
//                            array('name' => "TxnType",
//                                'value' => 'A'
//                            ),
//                            array('name' => "num_cart_items",
//                                'value' => '1'
//                            ),
//                            array('name' => "rm",
//                                'value' => '2'
//                            ),
//                            array('name' => "payment_gross",
//                                'value' => $amount
//                            ),
//                            array('name' => "TxnType",
//                                'value' => 'A'
//                            ),
//                            array('name' => "payment_gross",
//                                'value' => $amount
//                            ),
//                            array('name' => "currency",
//                                'value' => $currency_code
//                            ),
//                            array('name' => "billing_name",
//                                'value' =>$u['account']
//                            ),
//                            array('name' => "billing_address",
//                                'value' =>$u['address']
//                            ),
//                            array('name' => "billing_city",
//                                'value' =>$u['city']
//                            ),
//                            array('name' => "billing_state",
//                                'value' =>$u['state']
//                            ),
//                            array('name' => "billing_zip",
//                                'value' =>$u['zip']
//                            ),
//                            array('name' => "billing_country",
//                                'value' =>'India'
//                            ),
//                            array('name' => "billing_tel",
//                                'value' =>$u['phone']
//                            ),
//                            array('name' => "billing_email",
//                                'value' =>$u['email']
//                            ),
//                            array('name' => "delivery_name",
//                                'value' =>$u['account']
//                            ),
//                            array('name' => "delivery_address",
//                                'value' =>$u['address']
//                            ),
//                            array('name' => "delivery_city",
//                                'value' =>$u['city']
//                            ),
//                            array('name' => "delivery_state",
//                                'value' =>$u['state']
//                            ),
//                            array('name' => "delivery_state",
//                                'value' =>$u['state']
//                            ),
//                            array('name' => "delivery_zip",
//                                'value' =>$u['zip']
//                            ),
//                            array('name' => "delivery_country",
//                                'value' =>$u['country']
//                            ),
//                            array('name' => "delivery_tel",
//                                'value' =>$u['phone']
//                            ),
//                            array('name' => "merchant_param1",
//                                'value' =>''
//                            )
//
//                        );
//
//
//                        Fsubmit::form($url, $params);

                    }



                    break;


                case 'braintree':

//                    $p = ORM::for_table('sys_pg')->where('processor', 'braintree')->find_one();
//                    Braintree_Configuration::environment($p['c4']);
//                    Braintree_Configuration::merchantId($p['value']);
//                    Braintree_Configuration::publicKey($p['c1']);
//                    Braintree_Configuration::privateKey($p['c2']);
//
//                    if($p){
//                        $a = ORM::for_table('crm_accounts')->find_one($d['userid']);
//                        $it = $i_total - $i_credit;
//                        $amount = $it*100;
//                        $clientToken = Braintree_ClientToken::generate(array());
//                        $formurl = U . "client/btpay_submitted/$invoiceid/token_$vtoken/";
//                        $vamount =  $config['currency_code']. number_format($d['total'],2,$config['dec_point'],$config['thousands_sep']);
//                        $ins = '
//                      <form id="checkout" method="post" action="'.$formurl.'">
//  <div id="payment-form"></div>
//  <input type="submit" value="Pay '.$config['currency_code'].' '.$vamount .'">
//</form>
//                      <script src="https://js.braintreegateway.com/v2/braintree.js"></script>
//                      <script>
//									var clientToken = "'.$clientToken.'";
//									braintree.setup(clientToken, "dropin", {
//  									container: "payment-form"
//									});
//								</script>';
//                        $ui->assign('ins',$ins);
//                        $ui->display('client-ipay.tpl');
//
//
//                    }

                    break;



                case 'quickpay':

                    $p = ORM::for_table('sys_pg')->where('processor', 'quickpay')->find_one();

                    if($p){

//                        require 'system/lib/misc/quickpay.php';
//
//                        $qp = new Quickpay($p['value'], $p['c1']);
//
//                        $data_fields['msgtype'] = 'authorize';
//                        $data_fields['language'] = 'en';
//                        $data_fields['ordernumber'] = $invoiceid;
//                        $data_fields['amount'] = $amount;
//                        $data_fields['currency'] = $p['c3'];
//                        $data_fields['continueurl'] = U . "client/ipay_submitted/$invoiceid/token_$vtoken/";
//                        $data_fields['cancelurl'] = U . "client/ipay_cancel/$invoiceid/token_$vtoken/";
//                        $data_fields['callbackurl'] = U . "client/ipay_ipn/$invoiceid/token_$ptoken/";



//                        Fsubmit::input('https://secure.quickpay.dk/form/', $qp->form_fields($data_fields));


                    }





                    break;







                default:
                    echo 'Payment Gateway Not Found!';

            }

        }
        else{
            echo 'Sorry Invoice Not Found!';
            exit;
        }

        break;

    /*
     * CCAvenue
     *
     *
     */


    case 'ipay_cancel':

        Event::trigger('client/ipay_cancel/');

        $id  = $routes['2'];
        $token = $routes['3'];
        r2(U."client/iview/$id/$token/",'e',$_L['Payment Cancelled']);

        break;


    case 'ipay_submitted':

        Event::trigger('client/ipay_submitted/');

        $id  = $routes['2'];
        $token = $routes['3'];
        r2(U."client/iview/$id/$token/",'s',$_L['Payment Successful']);


        break;

    case 'ipay_ipn':
        Event::trigger('client/ipay_success/');

        $id  = $routes['2'];
        $token = $routes['3'];
        //   r2(U."client/iview/$id/$token/",'s',$_L['Payment Successful']);

        $d = ORM::for_table('sys_invoices')->find_one($id);
        if($d) {
            $token = $routes['3'];
            $token = str_replace('token_', '', $token);
            $ptoken = $d->ptoken;
            $vtoken = $d->vtoken;
            if ($token != $ptoken) {
                echo 'Sorry Token does not match!';
                exit;
            }

            $d->status = 'Paid';
            $d->save();

            Event::trigger('invoices/markpaid/',$invoice=$d);

            // send email

            $msg = Invoice::gen_email($id,'confirm');

            $subj = $msg['subject'];
            $message_o = $msg['body'];
            $email = $msg['email'];
            $name = $msg['name'];
            Notify_Email::_send($name, $email, $subj, $message_o, $d->userid, $id);

            //
            r2(U."client/iview/$id/$vtoken/",'s',$_L['Payment Successful']);

        }

        break;


    case 'ipay_success':

        Event::trigger('client/ipay_success/');

        $id  = $routes['2'];
        $token = $routes['3'];
        //   r2(U."client/iview/$id/$token/",'s',$_L['Payment Successful']);

        $d = ORM::for_table('sys_invoices')->find_one($id);
        if($d) {
            $token = $routes['3'];
            $token = str_replace('token_', '', $token);
            $ptoken = $d->ptoken;
            $vtoken = $d->vtoken;
            if ($token != $ptoken) {
                echo 'Sorry Token does not match!';
                exit;
            }

            $d->status = 'Paid';
            $d->save();

            Event::trigger('invoices/markpaid/',$invoice=$d);

            // send email

            $msg = Invoice::gen_email($id,'confirm');

            $subj = $msg['subject'];
            $message_o = $msg['body'];
            $email = $msg['email'];
            $name = $msg['name'];
            Notify_Email::_send($name, $email, $subj, $message_o, $d->userid, $id);

            //
            r2(U."client/iview/$id/$vtoken/",'s',$_L['Payment Successful']);

        }

        break;





    case 'btpay_submitted':

        Event::trigger('client/btpay_submitted/');

        $id  = $routes['2'];
        $d = ORM::for_table('sys_invoices')->find_one($id);
        $ui->assign('d',$d);
        $token = $routes['3'];
        $p = ORM::for_table('sys_pg')->where('processor', 'braintree')->find_one();
        if($p){
            $merchantId	= $p["value"];
            $publicKey	= $p["c1"];
            $privateKey	= $p["c2"];
            $account 	= $p["c3"];
            $environment = $p["c4"];
            $accountname = $p["name"];

            Braintree_Configuration::environment($environment);
            Braintree_Configuration::merchantId($merchantId);
            Braintree_Configuration::publicKey($publicKey);
            Braintree_Configuration::privateKey($privateKey);
            $nonce = isset( $_POST["payment_method_nonce"] )?$_POST["payment_method_nonce"]:0;
            if ($nonce) {
                // get user
                $a = ORM::for_table('crm_accounts')->find_one($d['userid']);
                // get invoice
                $id  = $routes['2'];
                $iid = $id;// invoice ID
                $i = ORM::for_table('sys_invoices')->find_one($iid);
                $d = ORM::for_table('sys_invoices')->find_one($id);
                if($d){
                    // we have an invoice, validate token...
                    $token = $routes['3'];
                    $token = str_replace('token_','',$token);
                    $vtoken = $d['vtoken'];
                    if($token != $vtoken){
                        echo 'Sorry Token does not match!';
                        exit;
                    } else {
                        // echo 'TOKEN MATCHES!!!!!!!!!!!!!!!!';
                        $i_credit = $d['credit'];
                        $i_due = '0.00';
                        $i_total = $d['total'];
                        $amount = $i_total - $i_credit;
                        $invoiceid = $d['id'];

                        $result = Braintree_Transaction::sale(array(
                            'amount' => $amount,
                            'orderId' => $id,
                            'paymentMethodNonce' => $nonce,
                            'options' => array(
                                'submitForSettlement' => True
                            )
                        ));

                        if ($result->success) {


                            $invoiceview = U . "invoices/pdf/$invoiceid/view/token_$vtoken";
                            $invoiceprint = U . "iview/print/$invoiceid/token_$vtoken";

                            // Thank you! Your payment has been successfully processed for $16.95
                            $ins = "Success!: Thank you for your payment.";
//                            $ins.= "<br />".'To PRINT your invoice click here <br> <a class="btn btn-primary" href="'.$invoiceprint.'" target="_blank">Print Invoice</a>';
//                            $date = $result->transaction->createdAt->date; //"2015-06-15 18:52:57.000000"
//                            $amount = $result->transaction->amount;
//                            $amount = Finance::amount_fix($amount);
//                            $payerid = $a["id"];
//                            $pmethod = 'Braintree';
//                            $amount = str_replace($config['currency_code'], '', $amount);
//                            $amount = str_replace(',', '', $amount);
//                            if (!is_numeric($amount)) {
//                                $msg .= 'Invalid Amount' . '<br>';
//                            }
//                            $cat = 'Consulting'; //77; // Consulting income. This should already be defined on the invoice or line item.

//                            $description = $p["name"]; //'Braintree Payment';
//                            $a = ORM::for_table('sys_accounts')->where('id', $account)->find_one(); // get braintree balance
//                            $cbal = $a['balance']; // customer balance
//                            $nbal = $cbal + $amount;
//                            $a->balance = $nbal;
//                            $a->save(); // update customer balance
//                            $d = ORM::for_table('sys_transactions')->create(); // BOF add a transaction
//                            $d->account = $accountname;
//                            $d->type = 'Income';
//                            $d->payerid = $payerid;
//
//                            $d->amount = $amount;
//                            $d->category = $cat;
//                            $d->method = $pmethod;
//                            $d->description = 'Invoice '.$id .' Payment'; //$description;
//                            $d->date = date('Y-m-d');//"2015-06-15 18:52:57.000000"
//                            $d->dr = '0.00';
//                            $d->cr = $amount;
//                            $d->bal = $nbal;
//                            $d->iid = $iid;
//                            $d->save(); // BOF add a transaction
//                            $tid = $d->id();
//                            // log it...
//                            _log('New Deposit: ' . $description . ' [TrID: ' . $tid . ' | Amount: ' . $amount . ']', 'Admin',$payerid);
//                            _msglog('s', 'Transaction Added Successfully');

                            if ($i) {
                                $pc = $i['credit'];
                                $it = $i['total'];
                                $dp = $it - $pc;
                                if (($dp == $amount) OR (($dp < $amount))) {
                                    $i->status = 'Paid';
                                    $i->datepaid = date('Y-m-d H:i:s');
                                    Event::trigger('invoices/markpaid/',$invoice=$i);
                                } else {
                                    $i->status = 'Partially Paid';
                                }
                                $i->credit = $pc + $amount;
                                $i->paymentmethod = $accountname;
                                $i->save();

                            } //if ($i) {
                        } else if ($result->transaction) {
                            $ins = "Error processing transaction:";
                            $ins .= ("\n  code: " . $result->transaction->processorResponseCode);
                            $ins .= ("\n  text: " . $result->transaction->processorResponseText);
                        } else {
                            $ins = ("Validation errors: \n");
                            $ins .= ($result->errors->deepAll());
                        }
//                        $ui->assign('ins',$ins);
//                        $ui->display('client-ipay.tpl');
                        r2(U.'client/iview/'.$i->id.'/'.$i->vtoken.'/','s',$ins);
                    }
                }
            }
            /* eof bernie changes */
        } else echo 'Payment Gateway Not Found!';


        break;

    case 'ccsubmit':


        $p = ORM::for_table('sys_pg')->where('processor', 'ccavenue')->find_one();

        if($p) {

            require('system/lib/misc/ccavenue.php');

            $currency_code = $p['c2'];
            $c3 = $p['c3'];

            if (($c3 != '') AND (is_numeric($c3)) AND ($c3 != '1')) {
                $amount = $amount / $c3;
            }

            $Merchant_Id = $p['value']; //Given to merchant by ccavenue


            $WorkingKey = $p['c1']; //Given to merchant by ccavenue

            $redirect_url = U . "client/ipay_ipn/$invoiceid/token_$ptoken/";


            require('system/lib/misc/ccsubmit.php');

        }


        break;



    case 'login':

        Event::trigger('client/login/');

        Contacts::isLogged();


        view('client_auth',[
            'type' => 'login'
        ]);


        break;


    case 'register':

        if($config['allow_customer_registration'] == 0){
            abort('404');
        }



        $extra_fields = array();
        $ui->assign('extra_fields',$extra_fields);
        Event::trigger('client/register/');

        Contacts::isLogged();

        $ui->assign('xfooter',Asset::js(array('contacts/register')));


        view('client_auth',[
            'type' => 'register'
        ]);


        break;

    case 'forgot_pw':

        Event::trigger('client/forgot_pw/');

        view('client_auth',[
            'type' => 'forgot_password'
        ]);


        break;

    case 'forgot_pw_post':

        Event::trigger('client/forgot_pw_post/');

        $username = _post('username');

        if($username == '')
        {
            r2(U.'client/forgot_pw/','e','No User found with this Email');
        }

        $d = ORM::for_table('crm_accounts')->where('email',$username)->find_one();

        if($d){

            //

            $fullname = $d->account;

            $password = Ib_Str::random_string(8);

            $password_hash = Password::_crypt($password);

            $d->password = $password_hash;

            $d->save();

            // Send email notification

//            $mail = Notify_Email::_init();
//            $mail->AddAddress($username, $fullname);
//            $mail->Subject = 'Password Reset for '.$config['CompanyName'];
//            $mail->MsgHTML('Your Password has been reset to: '. $password.' Go to this link to login with new password- '.U.'client/login/');
//            $mail->Send();

            $subject = 'Password Reset for '.$config['CompanyName'];
            $message = '<p>Your Password has been reset to: '. $password.' Go to this link to login with new password- '.U.'client/login/</p>';
            Notify_Email::_send($fullname, $username, $subject, $message, $d->id());

            r2(U.'client/login/','s','New Password has been sent to your email.');



        }

        else{

            r2(U.'client/forgot_pw/','e','No User found with this Email');

        }



        break;

    case 'auth':

        Event::trigger('client/auth/');

        $username = _post('username');
        $password = _post('password');

        $remember_me = _post('remember_me');

        $auth = Contacts::login($username,$password);

        if($auth){

            // store authentication key in the cookies

           // _log('Client Login Successful','Client',);

            if($remember_me == 'yes'){
                setcookie('ib_ct', $auth, time() + (86400 * 30), "/"); // 86400 = 1 day
            }
            else{

                $_SESSION['ib_ct'] = $auth;

            }


            $app->emit('client_auth_successful');
            r2(U.'client/dashboard/');



        }
        else{
            r2(U.'client/login/','e',$_L['Invalid Username or Password']);
        }




        break;


    case 'auto_login':
        Event::trigger('client/auto_login/');



        break;


    case 'register_post':

       // sleep(3);

        if($config['allow_customer_registration'] == 0){
            abort('404');
        }

        if(!isset($_SESSION['recaptcha_verified'])){
            $_SESSION['recaptcha_verified'] = false;
        }

        if($config['recaptcha'] == 1){


            if(!$_SESSION['recaptcha_verified']){

                if(Ib_Recaptcha::isValid($config['recaptcha_secretkey']) == false){

                    ib_die($_L['Recaptcha Verification Failed']);

                }
                else{

                    $_SESSION['recaptcha_verified'] = true;

                }

            }



        }

        $msg = '';

        $data = array();

        Event::trigger('client/register_post/');



        $data['account'] = _post('fullname');
        $data['email'] = _post('email');
        $data['password'] = _post('password');
        $data['password2'] = _post('password2');

        $o_password = $data['password'];

        if($data['account'] == ''){
            $msg .= 'Fullname is required <br>';
        }

        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            $msg .= $_L['Invalid Email'].' <br>';
        }

        if($data['email'] != '') {
            $f = ORM::for_table('crm_accounts')->where('email',$data['email'])->find_one();

            if($f){
                $msg .= $_L['Email already exist'].' <br>';
            }
        }



        if($data['password'] != ''){



            if($data['password'] != $data['password2']){
                $msg .= 'Passwords does not match'. '<br>';
            }


            $data['password'] = Password::_crypt($data['password']);


        }
        else{

            $msg .= 'Password is required <br>';

        }

        // API call for extra fields



        //

        // optional params

        $data['phone'] = _post('phone');
        $data['address'] = _post('address');
        $data['city'] = _post('city');
        $data['zip'] = _post('zip');
        $data['state'] = _post('');
        $data['country'] = _post('country');
        $data['company'] = _post('company');
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['email_verified'] = 'No';
        $ip = get_client_ip();
        $data['signed_up_ip'] = $ip;
        $isp = gethostbyaddr($ip);
        if(!$isp){

            $isp = '';

        }

        $data['isp'] = $isp;
        $data['balance'] = '0.00';
        $data['status'] = 'Active';
        $data['notes'] = '';
        $data['token'] = '';
        $data['img'] = '';
        $data['web'] = '';
        $data['facebook'] = '';
        $data['google'] = '';
        $data['linkedin'] = '';
        $data['twitter'] = '';
        $data['skype'] = '';
//        $data[''] = '';


//        $ = _post('');



        Event::trigger('client_register_post_data_posted');


        if($msg == ''){

            // create client




            // try to guess location



            //

            $d = ORM::for_table('crm_accounts')->create();

            $d->account = $data['account'];
            $d->email = $data['email'];
            $d->phone = $data['phone'];
            $d->address = $data['address'];
            $d->city = $data['city'];
            $d->zip = $data['zip'];
            $d->state = $data['state'];
            $d->country = $data['country'];
            $d->tags = '';

            //others
            $d->fname = '';
            $d->lname = '';
            $d->company = $data['company'];
            $d->jobtitle = '';
            $d->cid = '0';
            $d->o = '0';
            $d->balance = $data['balance'];
            $d->status = $data['status'];
            $d->notes = $data['notes'];
            $d->password = $data['password'];
            $d->token = '';
            $d->ts = '';
            $d->img = $data['img'];
            $d->web = $data['web'];
            $d->facebook = $data['facebook'];
            $d->google = $data['google'];
            $d->linkedin = $data['linkedin'];

            // v 4.2

            $d->gname = '';
            $d->gid = 0;

            $d->signed_up_ip = $ip;
            $d->isp = $data['isp'];

            //

            $d->created_at = $data['created_at'];

            //



            $d->save();
            $cid = $d->id();

            $data['id'] = $cid;

            _log($_L['New Contact Added'].' '.$data['account'].' [CID: '.$cid.']','Portal Registration');


            $send_email = Ib_Email::send_client_welcome_email($data);

            $auth = Contacts::login($data['email'],$o_password);

            if($auth){

                // store authentication key in the cookies

                setcookie('ib_ct', $auth, time() + (86400 * 30), "/"); // 86400 = 1 day



            }

            r2(U.'client/dashboard/');

            Event::trigger('client/client_registered',$data);




        }

        else{

           // echo $msg;
            r2(U.'client/register/','e',$msg);

        }






        break;


    case 'dashboard':

        $dashboard_summary_extras = '';
        $dashboard_extra_row_1 = '';
        $c = Contacts::details();

        Event::trigger('client/dashboard/');

        $app->emit('client/dashboard/');

        $ui->assign('_application_menu', 'dashboard');
        $ui->assign('_st', $_L['Dashboard']);
        $ui->assign('_title', $config['CompanyName'].' - '.$_L['Dashboard']);

        $cf = ORM::for_table('crm_customfields')->where('ctype','crm')->order_by_asc('id')->find_many();
        $ui->assign('cf',$cf);




        $ui->assign('user',$c);

        $cid = $c->id;

        $d = ORM::for_table('sys_transactions')
            ->where_any_is(array(
                array('payerid' => $cid),
                array('payeeid' => $cid)))->limit(5)->order_by_desc('id')
            ->find_many();

        // show only invoice related transactions

       // $d = ORM::for_table('sys_transactions')->where('payerid',$cid)->where_not_equal('iid','0')->find_array();

        $ui->assign('t',$d);

        $d = ORM::for_table('sys_invoices')->where('userid',$c->id)->limit(5)->order_by_desc('id')->find_array();

        $ui->assign('d',$d);

        $d = ORM::for_table('sys_quotes')->where('userid',$c->id)->limit(5)->order_by_desc('id')->find_array();

        $ui->assign('q',$d);

        // Orders

        $orders = Order::where('cid',$c->id)->orderBy('id','desc')->limit(5)->get();

        //  aSign: \''.$config['currency_code'].' \',

        $js_add_fund = '';

        $ds = ORM::for_table('sys_tickets')->where('userid', $c->id)->order_by_desc('id')->find_array();
        $ui->assign('ds', $ds);

        $ui->assign('xjq', '
        
        $( ".mmnt" ).each(function() {
                    //   alert($( this ).html());
                    var ut = $( this ).html();
                    $( this ).html(moment.unix(ut).fromNow());
                });
        
        ');
        

        if($config['add_fund'] == '1'){
            $js_add_fund = ' $(".add_fund").click(function (e) {
        e.preventDefault();

        bootbox.prompt({
            title: "Enter Amount",
            value: "",
            buttons: {
        \'cancel\': {
            label: \'Cancel\'
        },
        \'confirm\': {
            label: \'OK\'
        }
    },
            callback: function(result) {
                if (result === null) {

                } else {

$.redirect(base_url + "client/add_fund/",{ amount: result});

                }
            }
        });

    });

';
        }

        $ui->assign('xjq',' $(\'.amount\').autoNumeric(\'init\', {

    
    dGroup: '.$config['thousand_separator_placement'].',
    aPad: '.$config['currency_decimal_digits'].',
    pSign: \''.$config['currency_symbol_position'].'\',
    aDec: \''.$config['dec_point'].'\',
    aSep: \''.$config['thousands_sep'].'\',
    vMax: \'9999999999999999.00\',
                vMin: \'-9999999999999999.00\'

    });
    
    '.$js_add_fund.'
    
    
    ');

        $ui->assign('xfooter',Asset::js(array('js/redirect')));

        $ui->assign('dashboard_summary_extras',$dashboard_summary_extras);
        $ui->assign('dashboard_extra_row_1',$dashboard_extra_row_1);


        view('client_dashboard',[
            'orders' => $orders
        ]);



        break;

    case 'invoices':


        Event::trigger('client/invoices/');


	    $app->emit('client/invoices/');


        $ui->assign('_application_menu', 'invoices');
        $ui->assign('_st', $_L['Invoices']);
        $ui->assign('_title', $config['CompanyName'].' - '.$_L['Invoices']);

        $c = Contacts::details();

        $ui->assign('user',$c);

        $d = ORM::for_table('sys_invoices')->where('userid',$c->id)->order_by_desc('id')->find_array();

        $count_paid = ORM::for_table('sys_invoices')->where('userid',$c->id)->where('status','Paid')->count();

        if($count_paid == ''){
            $count_paid = 0;
        }

        $count_unpaid = ORM::for_table('sys_invoices')->where('userid',$c->id)->where('status','Unpaid')->count();

        if($count_unpaid == ''){
            $count_unpaid = 0;
        }

        $count_partially_paid = ORM::for_table('sys_invoices')->where('userid',$c->id)->where('status','Partially Paid')->count();

        if($count_partially_paid == ''){
            $count_partially_paid = 0;
        }

        $count_cancelled = ORM::for_table('sys_invoices')->where('userid',$c->id)->where('status','Cancelled')->count();

        if($count_cancelled == ''){
            $count_cancelled = 0;
        }


        $total_paid_amount = ORM::for_table('sys_invoices')->where('userid',$c->id)->where('status','Paid')->sum('total');

        if($total_paid_amount == ''){
            $total_paid_amount = '0';
        }

        $ui->assign('total_paid_amount',$total_paid_amount);

        // -------------------------------------------------

        $total_unpaid_amount = ORM::for_table('sys_invoices')->where('userid',$c->id)->where('status','Unpaid')->sum('total');

        if($total_unpaid_amount == ''){
            $total_unpaid_amount = '0';
        }

        $ui->assign('total_unpaid_amount',$total_unpaid_amount);

        // -------------------------------------------------


        $total_partially_paid_amount = ORM::for_table('sys_invoices')->where('userid',$c->id)->where('status','Partially Paid')->sum('total');

        if($total_partially_paid_amount == ''){
            $total_partially_paid_amount = '0';
        }

        $ui->assign('total_partially_paid_amount',$total_partially_paid_amount);

        // -------------------------------------------------


        $total_cancelled_amount = ORM::for_table('sys_invoices')->where('userid',$c->id)->where('status','Cancelled')->sum('total');

        if($total_cancelled_amount == ''){
            $total_cancelled_amount = '0';
        }

        $ui->assign('total_cancelled_amount',$total_cancelled_amount);

        // -------------------------------------------------

        $balance = $c->balance;

        $due_amount = $total_unpaid_amount-$balance;

        $ui->assign('due_amount',$due_amount);
        $ui->assign('d',$d);

        $ui->assign('total_invoice',count($d));




        $jsvar = '

        _L[\'Paid\'] = \''.$_L['Paid'].'\';
        _L[\'Unpaid\'] = \''.$_L['Unpaid'].'\';
        _L[\'Partially Paid\'] = \''.$_L['Partially Paid'].'\';
        _L[\'Cancelled\'] = \''.$_L['Cancelled'].'\';
        _L[\'Data View\'] = \''.$_L['Data View'].'\';
        _L[\'Refresh\'] = \''.$_L['Refresh'].'\';
        _L[\'Reset\'] = \''.$_L['Reset'].'\';
        _L[\'Cancel\'] = \''.$_L['Cancel'].'\';
        _L[\'Save as Image\'] = \''.$_L['Save as Image'].'\';
        _L[\'Click to Save\'] = \''.$_L['Click to Save'].'\';
        _L[\'Average\'] = \''.$_L['Average'].'\';
        _L[\'Line\'] = \''.$_L['Line'].'\';
        _L[\'Bar\'] = \''.$_L['Bar'].'\';
        
       
        
        var ib_customer_name = \''.$c->account.'\';
        var ib_count_paid = \''.$count_paid.'\';
        var ib_count_unpaid = \''.$count_unpaid.'\';
        var ib_count_partially_paid = \''.$count_partially_paid.'\';
        var ib_count_cancelled = \''.$count_cancelled.'\';
        
        
        var ib_c1 = \'#4CAF50\';
        var ib_c2 = \'#c62828\';
        var ib_c3 = \'#9E9D24\';
        var ib_c4 = \'#546E7A\';



        ';


        $ui->assign('jsvar',$jsvar);

        $xfooter = Asset::js(array('chart/echarts.min','client/invoices'));

        $ui->assign('xfooter',$xfooter);

        //  aSign: \''.$config['currency_code'].' \',


        $ui->assign('xjq',' $(\'.amount\').autoNumeric(\'init\', {

   
    dGroup: '.$config['thousand_separator_placement'].',
    aPad: '.$config['currency_decimal_digits'].',
    pSign: \''.$config['currency_symbol_position'].'\',
    aDec: \''.$config['dec_point'].'\',
    aSep: \''.$config['thousands_sep'].'\'
,
vMax: \'9999999999999999.00\',
                vMin: \'-9999999999999999.00\'
    });');


        view('client_invoices');


        break;

    case 'quotes':
        Event::trigger('client/quotes/');
        $ui->assign('_application_menu', 'quotes');
        $ui->assign('_st', $_L['Quotes']);
        $ui->assign('_title', $config['CompanyName'].' - '.$_L['Quotes']);

        $c = Contacts::details();

        $ui->assign('user',$c);

        $d = ORM::for_table('sys_quotes')->where('userid',$c->id)->find_array();

        $ui->assign('d',$d);

        $ui->assign('total_quotes',count($d));

        $ui->assign('xjq',' $(\'.amount\').autoNumeric(\'init\', {

    aSign: \''.$config['currency_code'].' \',
    dGroup: '.$config['thousand_separator_placement'].',
    aPad: '.$config['currency_decimal_digits'].',
    pSign: \''.$config['currency_symbol_position'].'\',
    aDec: \''.$config['dec_point'].'\',
    aSep: \''.$config['thousands_sep'].'\',
vMax: \'9999999999999999.00\',
                vMin: \'-9999999999999999.00\'

    });');

        view('client_quotes');


        break;

    case 'transactions':
        Event::trigger('client/transactions/');
        $ui->assign('_application_menu', 'transactions');
        $ui->assign('_st', $_L['Transactions']);
        $ui->assign('_title', $config['CompanyName'].' - '.$_L['Transactions']);

        $c = Contacts::details();

        $cid = $c->id;

        $ui->assign('user',$c);

        $d = ORM::for_table('sys_transactions')
            ->where_any_is(array(
                array('payerid' => $cid),
                array('payeeid' => $cid)))
            ->find_many();
        $ui->assign('d',$d);

        $ti = ORM::for_table('sys_transactions')
            ->where('payerid',$cid)
            ->sum('cr');
        if($ti == ''){
            $ti = '0';
        }
        $ui->assign('ti',$ti);
        $te = ORM::for_table('sys_transactions')
            ->where('payeeid',$cid)
            ->sum('dr');
        if($te == ''){
            $te = '0';
        }

        $ui->assign('total_quotes',count($d));

        $ui->assign('xjq',' $(\'.amount\').autoNumeric(\'init\', {

    aSign: \''.$config['currency_code'].' \',
    dGroup: '.$config['thousand_separator_placement'].',
    aPad: '.$config['currency_decimal_digits'].',
    pSign: \''.$config['currency_symbol_position'].'\',
    aDec: \''.$config['dec_point'].'\',
    aSep: \''.$config['thousands_sep'].'\',
vMax: \'9999999999999999.00\',
                vMin: \'-9999999999999999.00\'

    });');

       view('client_transactions');



        break;


    case 'profile':
        Event::trigger('client/profile/');
        $ui->assign('_application_menu', 'profile');
        $ui->assign('_st', $_L['Profile']);
        $ui->assign('_title', $config['CompanyName'].' - '.$_L['Profile']);

        $c = Contacts::details();

        $ui->assign('user',$c);

        $ui->assign('d',$c);

        $ui->assign('countries',Countries::all($c->country));

        $ui->assign('xfooter',Asset::js(array('contacts/client_profile_edit')));

        $cf = ORM::for_table('crm_customfields')->where('ctype','crm')->order_by_asc('id')->find_many();
        $ui->assign('cf',$cf);


        view('client_profile');



        break;


    case 'profile-picture-upload':

        $c = Contacts::details();

        if(APP_STAGE == 'Demo'){
            r2(U.'client/profile/','e','Sorry, this option is disabled in the demo mode.');
        }



        $uploader   =   new Uploader();
        $uploader->setDir('storage/contacts/');
       // $uploader->sameName(true);
        $uploader->setExtensions([
            'jpg',
            'jpeg',
            'png'
        ]);  //allowed extensions list//
        if($uploader->uploadFile('file')){

            //txtFile is the filebrowse element name //
            $uploaded  =   $uploader->getUploadName(); //get uploaded file name, renames on upload//

            $path = 'storage/contacts/'.$uploaded;
            $cropped_path = 'storage/contacts/contact_'.$c->id.'_'.$uploaded;

            // open file a image resource
            $img = Image::make($path);

            $img->crop(300, 300);

            $img->save($cropped_path);

            $c->img = $cropped_path;

            $c->save();

            r2(U.'client/profile/','s',$_L['Data Updated']);

        } else{//upload failed
            _msglog('e',$uploader->getMessage()); //get upload error message
        }

        break;


    case 'remove-profile-picture':

        $c = Contacts::details();
        if(APP_STAGE == 'Demo'){
            r2(U.'client/profile/','e','Sorry, this option is disabled in the demo mode.');
        }

        $c->img = '';

        $c->save();

        r2(U.'client/profile/','s',$_L['Data Updated']);

        break;


    case 'profile_edit_post':
        Event::trigger('client/profile_edit_post/');
        $c = Contacts::details();
        $id = $c->id;
        $d = ORM::for_table('crm_accounts')->find_one($id);
        if($d){

            $account = _post('account');
            $company = _post('company');

            $email = _post('edit_email');




            $phone = _post('phone');
            $address = _post('address');
            $city = _post('city');
            $state = _post('state');
            $zip = _post('zip');
            $country = _post('country');

            $business_number = _post('business_number');

            $msg = '';

            if($account == ''){
                $msg .= $_L['Account Name is required']. ' <br>';
            }



            if($email != ($d['email'])){
                $f = ORM::for_table('crm_accounts')->where('email',$email)->find_one();

                if($f){
                    $msg .= $_L['Email already exist'].' <br>';
                }
            }

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $msg .= $_L['Invalid Email'].' <br>';
            }




            $password = _post('password');




            if($msg == ''){


                $d = ORM::for_table('crm_accounts')->find_one($id);
                $d->account = $account;
                $d->company = $company;


                $d->email = $email;

                $d->phone = $phone;
                $d->address = $address;
                $d->city = $city;
                $d->zip = $zip;
                $d->state = $state;
                $d->country = $country;

                $d->business_number = $business_number;

                if($password != ''){

                    $d->password = Password::_crypt($password);

                }

                $d->save();





                _msglog('s',$_L['account_updated_successfully']);

                echo $id;
            }
            else{
                echo $msg;
            }

        }
        else{
            r2(U.$myCtrl.'/list', 'e', $_L['Account_Not_Found']);
        }


        break;






    case 'logout':

        Event::trigger('client/logout/');
        $c = Contacts::details();

        session_destroy();

        Contacts::logout_using_token($c->token);


        setcookie('ib_ct', 'expired', 1, "/");

        r2(U.'client/login/','s','You have successfully logged out.');



        break;

    case 'where':

        r2(U.'client/login/');

        break;


    case 'q_accept':

        $id = route(2);

        $d = ORM::for_table('sys_quotes')->find_one($id);
        if($d) {
            $token = $routes['3'];
            $token = str_replace('token_', '', $token);
            $vtoken = $d['vtoken'];
            if ($token != $vtoken) {
                echo 'Sorry Token does not match!';
                exit;
            }

            $d->stage = 'Accepted';
            $d->save();

            // Send email confirmations

            $eml = Quote::gen_email($id,'accepted');


            Notify_Email::_send($eml['name'],$eml['email'],$eml['subject'],$eml['body']);



            $sms = Quote::genSMS($id,'accepted');



            SMS::send($sms['to'],$sms['sms']);

            //

            // Send to admins

            $users = User::all();

            foreach ($users as $u){

                if($u->email_notify == '1'){

                    $message = 'Quote- '.$d->id.' has been Accepted. You can view this quote- '.U . 'client/q/' . $d->id . '/token_' . $d->vtoken;

                    Notify_Email::_send($config['CompanyName'],$u->username,$config['CompanyName'].' Quote Accpeted',$message);

                }

                if($u->sms_notify == '1'){

                    $sms = Quote::genSMS($id,'accepted_admin_notify');

                    SMS::send($u->phonenumber,$sms['sms']);

                }


            }

            r2(U.'client/q/'.$id.'/token_'.$vtoken.'/');


        }





        break;

    case 'q_decline':

        $id = route(2);

        $d = ORM::for_table('sys_quotes')->find_one($id);
        if($d) {
            $token = $routes['3'];
            $token = str_replace('token_', '', $token);
            $vtoken = $d['vtoken'];
            if ($token != $vtoken) {
                echo 'Sorry Token does not match!';
                exit;
            }

            $d->stage = 'Lost';
            $d->save();


            // Send email confirmations

            $eml = Quote::gen_email($id,'cancelled');

            Notify_Email::_send($eml['name'],$eml['email'],$eml['subject'],$eml['body']);

            $sms = Quote::genSMS($id,'cancelled');

            SMS::send($sms['to'],$sms['sms']);

            // Send to admins

            $users = User::all();

            foreach ($users as $u){

                if($u->email_notify == '1'){

                    $message = 'Quote- '.$d->id.' has been cancelled. You can view this quote- '.U . 'client/q/' . $d->id . '/token_' . $d->vtoken;

                    Notify_Email::_send($config['CompanyName'],$u->username,$config['CompanyName'].' Quote Cancelled',$message);

                }

                if($u->sms_notify == '1'){

                    $sms = Quote::genSMS($id,'cancelled_admin_notify');

                    SMS::send($u->phonenumber,$sms['sms']);

                }


            }

            r2(U.'client/q/'.$id.'/token_'.$vtoken.'/');



        }


        break;


    case 'dl':


        require 'system/lib/mime.php';

        $req = route(2);

        $req_e = explode('_',$req);

        $id = $req_e[0];

        $token = $req_e[1];




        $doc = ORM::for_table('sys_documents')->find_one($id);

        if($doc){

            $db_token = $doc->file_dl_token;

            if($db_token != $token){
                i_close('Token does not match.');
            }

            $file_path = $doc->file_path;

            $file = 'storage/docs/'.$file_path;

            $ext = pathinfo($file_path, PATHINFO_EXTENSION);

            $file_name = $doc->title;

            $file_name = str_replace(' ','_',$file_name);

            $file_name = strtolower($file_name);

            $dl_file_name = $file_name.'.'.$ext;

            $c_type = mime_content_type($file);




            if (file_exists($file)) {
                $basename = basename($file);


                // $mime = ($mime = getimagesize($file)) ? $mime['mime'] : $mime;
                $mime = mime_content_type($file);
                $size = filesize($file);
                $fp   = fopen($file, "rb");
                if (!($mime && $size && $fp)) {
                    // Error.
                    return;
                }

                header("Content-type: " . $mime);
                header("Content-Length: " . $size);
              //  header("Content-Disposition: attachment; filename=" . $basename);
                header("Content-Disposition: attachment; filename=" . $dl_file_name);
                header('Content-Transfer-Encoding: binary');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                fpassthru($fp);
            }

        }
        else{
            i_close('Not Found');
        }


        break;


    case 'downloads':

        $ui->assign('_application_menu', 'downloads');
        $ui->assign('_st', $_L['Downloads']);
        $ui->assign('_title', $config['CompanyName'].' - '.$_L['Downloads']);

        $c = Contacts::details();

        $ui->assign('user',$c);

        $ids = array();

        $file_ids = ORM::for_table('ib_doc_rel')->where('rtype','contact')->where('rid',$c->id)->find_array();

        foreach ($file_ids as $f){

            $ids[] = $f['did'];

        }

        $file_ids = ORM::for_table('sys_documents')->select('id')->where('is_global','1')->find_array();

        foreach ($file_ids as $f){

            $ids[] = $f['id'];

        }



        if (!empty($ids)) {
            $ids = array_unique($ids);
            $d = ORM::for_table('sys_documents')->where_in('id', $ids)->find_many();

        }

        else{
            $d = array();
        }





        $ui->assign('d',$d);



        view('client_downloads');


        break;

    case 'orders':

        $ui->assign('_application_menu', 'orders');
        $ui->assign('_st', $_L['Orders']);
        $ui->assign('_title', $config['CompanyName'].' - '.$_L['Orders']);

        $c = Contacts::details();

        $ui->assign('user',$c);

        $d = ORM::for_table('sys_orders')->where('cid',$c->id)->find_array();
        $ui->assign('d',$d);



        $ui->assign('xjq',' $(\'.amount\').autoNumeric(\'init\', {

    
    dGroup: '.$config['thousand_separator_placement'].',
    aPad: '.$config['currency_decimal_digits'].',
    pSign: \''.$config['currency_symbol_position'].'\',
    aDec: \''.$config['dec_point'].'\',
    aSep: \''.$config['thousands_sep'].'\',
    vMax: \'9999999999999999.00\',
                vMin: \'-9999999999999999.00\'

    });');

        view('client_orders');


        break;

    case 'order_view':

        $ui->assign('_application_menu', 'orders');
        $ui->assign('_st', $_L['Orders']);
        $ui->assign('_title', $config['CompanyName'].' - '.$_L['Orders']);

        $c = Contacts::details();

        $ui->assign('user',$c);

        $xjq = '

    $(\'.amount\').autoNumeric(\'init\', {

    aSign: \''.$config['currency_code'].' \',
    dGroup: '.$config['thousand_separator_placement'].',
    aPad: '.$config['currency_decimal_digits'].',
    pSign: \''.$config['currency_symbol_position'].'\',
    aDec: \''.$config['dec_point'].'\',
    aSep: \''.$config['thousands_sep'].'\',
    vMax: \'999999999999.00\',
                vMin: \'-999999999999.00\'

    });

 ';

        $ui->assign('xjq', $xjq);

        $oid = route(2);
        $ordernum = route(3);

        $order = ORM::for_table('sys_orders')->find_one($oid);

        if($order){

            $db_ordernum = $order->ordernum;

            if($ordernum != $db_ordernum){
                i_close('Order number does not match.');
            }

            $ui->assign('order',$order);

            $orderItems = OrderItem::where('order_id',$order->id)->get();



            view('client_order_view',[
                'orderItems' => $orderItems
            ]);



        }


        break;

    case 'autologin':

        $token = route(2);

        $token_length = strlen($token);

        if($token_length < 20){
            i_close('Invalid Token.');
        }

        $d = ORM::for_table('crm_accounts')->where('autologin',$token)->find_one();

        if($d){

            $auth_key = Ib_Str::random_string(20).md5(time());

            $d->token = $auth_key;

            $d->save();

            // Autologin successful

            _log($_L['Autologin Successful'],'Client',$d->id);

            //

            setcookie('ib_ct', $auth_key, time() + (86400 * 30), "/"); // 86400 = 1 day
            $app->emit('client_auth_successful');
            r2(U.'client/dashboard/');

        }

        else{
            i_close('Token Expired.');
        }




        break;

    case 'upload':

       // $c = Contacts::details();


        $token = route(2);
        $iid = route(3);

        $inv = Invoice::find($iid);

        if($inv){

            $c = Contact::find($inv->userid);

            if(!$c){
                exit('Client Not Found');
            }

            if($inv->vtoken != $token){
                exit('Invoice Not Found');
            }

            $uploader   =   new Uploader();
            $uploader->setDir('storage/docs/');
            $uploader->sameName(false);
            $uploader->setExtensions(array('zip','jpg','jpeg','png','gif'));  //allowed extensions list//
            if($uploader->uploadFile('file')){   //txtFile is the filebrowse element name //
                $uploaded  =   $uploader->getUploadName(); //get uploaded file name, renames on upload//

                $file = $uploaded;
                $msg = 'Uploaded Successfully';
                $success = 'Yes';

                

            }else{//upload failed
                $file = '';
                $msg = $uploader->getMessage();
                $success = 'No';
            }

            $a = array(
                'success' => $success,
                'msg' =>$msg,
                'file' =>$file
            );

            _log('Client: '.$c->account.' [ '.$c->email.' ] Uploaded a File-'.$file,'Client',$c->id);

            header('Content-Type: application/json');

            echo json_encode($a);

        }





        break;


    case 'doc_payment_proof':

        $title = _post('title');
        $file_link = _post('file_link');
        $is_global = '0';
        $rid = _post('rid');
        $rtype = 'invoice';

        $did = Documents::assign($file_link,$title,$is_global,$rid,$rtype);

        if($did){
            echo $did;
        }
        else{
            ib_die($_L['All Fields are Required']);
        }


        break;

    case 'new-order':

        $ui->assign('_application_menu', 'orders');
        $ui->assign('_st', $_L['Orders']);
        $ui->assign('_title', $config['CompanyName'].' - '.$_L['Orders']);

        $c = Contacts::details();

        $ui->assign('user',$c);

        $ui->assign('xheader',Asset::css(array('css/ecommerce','modal')));
        $ui->assign('xfooter',Asset::js(array('modal')));

        // Find all items

        $ui->assign('items',ORM::for_table('sys_items')->find_array());

        view('client_new_order');


        break;

    case 'view-item':


        $id = route(2);

        $item = ORM::for_table('sys_items')->find_one($id);

        if($item){

            $ui->assign('_application_menu', 'orders');
            $ui->assign('_st', $item->name);

            $ui->assign('item',$item);
            $ui->assign('_title', $item->name);

            $c = Contacts::details();

            $ui->assign('user',$c);

            view('client_view_item');

        }




        break;


    case 'add_fund':

        if($config['add_fund'] != '1'){
            i_close('This feature is disabled');
        }

        $user = Contacts::details();
        $ui->assign('user',$user);

        $amount = _post('amount');

      //  if(v::numeric()->between($config['add_fund_minimum_deposit'], $config['add_fund_maximum_deposit'])->validate($amount)){
        if(is_numeric($amount) && $config['add_fund_minimum_deposit'] <= $amount && $amount <= $config['add_fund_maximum_deposit'] ){

           $invoice =  Invoice::forSingleItem($user->id,'Credit',$amount,1);

            if($invoice){
                r2(U.'client/iview/'.$invoice['id'].'/token_'.$invoice['vtoken']);
            }

        }
        else{

            _msglog('e','Amount shoule be between- '. $config['add_fund_minimum_deposit'].' to '. $config['add_fund_maximum_deposit']);

            r2(U.'client/dashboard/');

        }


        break;


    case 'pay_with_credit':


        if($config['add_fund'] != '1'){
        i_close('This feature is disabled');
        }


        $id  = $routes['2'];
        $d = ORM::for_table('sys_invoices')->find_one($id);
        if($d) {
            $token = $routes['3'];
            $token = str_replace('token_', '', $token);
            $vtoken = $d['vtoken'];
            if ($token != $vtoken) {
                echo 'Sorry Token does not match!';
                exit;
            }

            $a = ORM::for_table('crm_accounts')->find_one($d['userid']);

            $invoice_total = $d->total;
            $user_balance = $a->balance;

            if($user_balance == '0.00'){
                i_close('You do not have balance');
            }

            if(($d->status == 'Paid') || ($d->status == 'Cancelled')){
                i_close('Can not pay for Invoice Status: '.$d->status);
            }

            // create a transaction

            if($invoice_total > $user_balance){

                // Partially Paid

                $user_new_balance = '0.00';

                $paid_amount = $user_balance;

                $a->balance = $user_new_balance;

                $a->save();


//                $d->credit = $user_balance;
//                $d->status = 'Partially Paid';
//                $d->save();



            }

            else{


                $user_new_balance = $user_balance-$invoice_total;

                $a->balance = $user_new_balance;

                $paid_amount = $invoice_total;

                $a->save();

//                $invoice_total_new = $invoice_total-$user_balance;
//
//                $d->total = $invoice_total_new;
//                $d->status = 'Partially Paid';
//                $d->save();

            }


            // Add Transaction


            $msg = '';
            $account = 'Credit';
            $date = date('Y-m-d');
            $amount = $paid_amount;
            $amount = Finance::amount_fix($amount);
            $payerid = $a->id;
            $pmethod = 'Credit';
            $ref = 'Client Paid with Account Credit';

            $amount = str_replace($config['currency_code'], '', $amount);
            $amount = str_replace(',', '', $amount);

            $cat = _post('cats');
            $iid = $d->id;



            $description = 'Invoice: '.$d->id.' Payment from Credit';
            $msg = '';


            $i = $d;


            if ($msg == '') {

//                //find the current balance for this account
//                $a = ORM::for_table('sys_accounts')->where('account', $account)->find_one();
//                $cbal = $a['balance'];
//                $nbal = $cbal + $amount;
//                $a->balance = $nbal;
//                $a->save();

                $d = ORM::for_table('sys_transactions')->create();
                $d->account = $account;
                $d->type = 'Income';
                $d->payerid = $payerid;

                $d->amount = $amount;
                $d->category = $cat;
                $d->method = $pmethod;
                $d->ref = $ref;
                $d->tags = '';


                $d->description = $description;
                $d->date = $date;
                $d->dr = '0.00';
                $d->cr = $amount;
                $d->bal = '0.00';
                $d->iid = $iid;


                //others
                $d->payer = '';
                $d->payee = '';
                $d->payeeid = '0';
                $d->status = 'Cleared';
                $d->tax = '0.00';

                $d->aid = 0;
                $d->updated_at = date('Y-m-d H:i:s');
                //


                $d->save();
                $tid = $d->id();
                _log($_L['New Deposit'].': ' . $description . ' [TrID: ' . $tid . ' | Amount: ' . $amount . ']', 'Client', $a->id);
               // _msglog('s', 'Transaction Added Successfully');
                //now work with invoice

                if ($i) {
                    $pc = $i['credit'];
                    $it = $i['total'];
                    $dp = $it - $pc;
                    if (($dp == $amount) OR (($dp < $amount))) {
                        $i->status = 'Paid';

                    } else {

                        $i->status = 'Partially Paid';
                    }
                    $i->credit = $pc + $amount;
                    $i->save();

                }
               // echo $tid;
            } else {
               // echo '<div class="alert alert-danger fade in">' . $msg . '</div>';
            }


            r2(U.'client/iview/'.$i->id.'/token_'.$i->vtoken,'s',$_L['Payment Successful']);


        }


        break;



    case 'receipt':


        $transaction_id = route(2);

        $view_id = route(3);

        $transaction = Transaction::find($transaction_id);

        if($transaction){

            $tr_vid = $transaction->vid;

            if($view_id != $tr_vid){
                exit('Security Token Does not Match!');
            }


            $currency_symbol = $transaction->currency_symbol;

            $currency = Currency::where('iso_code',$currency_symbol)->first();

            if($currency){
                $currency_symbol = $currency->symbol;
            }
            else{
                $currency_symbol = $config['currency_code'];
            }



            $tr_url = U.'client/receipt/'.$transaction_id.'/'.$transaction->vid.'/render';
            $qr_url = U.'client/qr/url/'.base64_encode($tr_url);


            $device = route(4);

            if($device == 'render'){
                $tpl = 'client_receipt_mobile';
            }
            else{
                $tpl = 'client_receipt';
            }

            $contact = false;

            if($transaction->payerid != 0 || $transaction->payerid != '')
            {
                $contact = Contact::find($transaction->payerid);
            }

            if($transaction->payeeid != 0 || $transaction->payeeid != '')
            {
                $contact = Contact::find($transaction->payeeid);
            }

            view($tpl,[
                'transaction' => $transaction,
                'currency_symbol' => $currency_symbol,
                'qr_url' => $qr_url,
                'time_format' => $config['df'].' H:i:s',
                'contact' => $contact
            ]);

        }
        else{
            echo 'Transaction Not Found!';
        }



        break;

    case 'qr':

        $type = route(2);

        $data = route(3);

        $data = base64_decode($data);

        $qr = new BarcodeQR();

        if($type == 'url'){
            $qr->url($data);
        }


        $qr->draw(100);



        break;


    case 'modal_view_item':


        $item_id = route(2);

        $item_id = str_replace('item_','',$item_id);

        $item = Item::find($item_id);

        if($item){
            view('client_modal_view_item',[

                'item' => $item

            ]);
        }





        break;

    case 'ajax_shopping_cart':


        view('client_ajax_shopping_cart',[
            'cart' => Cart::details(),
            'items' => Cart::items()
        ]);


        break;

    case 'ajax_add_item':

        $item_id = route(2);
        $quantity = route(3);

        $added = Cart::addItem($item_id,$quantity);

        echo $item_id.' '.$quantity;



        break;



    case 'tickets':

        $req = route(2);


        $ui->assign('_application_menu', 'support');
        $ui->assign('_st', $_L['Tickets']);
        $ui->assign('_title', $config['CompanyName']);


        switch ($req) {


            case 'new':

                $c = Contacts::details();


                $ui->assign('user',$c);


                $ui->assign('xheader', Asset::css(array('dropzone/dropzone','sn/summernote','sn/summernote-bs3','modal')));

                $ui->assign('xfooter',
                    Asset::js(array('modal','dropzone/dropzone','sn/summernote.min'))
                );

                $ui->assign('jsvar','var files = [];');

                $deps = ORM::for_table('sys_ticketdepartments')->order_by_asc('sorder')->find_array();

                $ui->assign('deps',$deps);
                view('client_tickets_new',[

                ]);


                break;


            case 'upload_file':

                $c = Contacts::details();
                $uploader   =   new Uploader();
                $uploader->setDir('storage/tickets/');
                $uploader->sameName(false);
                $uploader->setExtensions(array('zip','jpg','jpeg','png','gif','doc','docx','pdf'));  //allowed extensions list//
                if($uploader->uploadFile('file')){   //txtFile is the filebrowse element name //
                    $uploaded  =   $uploader->getUploadName(); //get uploaded file name, renames on upload//

                    $file = $uploaded;
                    $msg = 'Uploaded Successfully';
                    $success = 'Yes';

                }else{//upload failed
                    $file = '';
                    $msg = $uploader->getMessage();
                    $success = 'No';
                }

                $a = array(
                    'success' => $success,
                    'msg' =>$msg,
                    'file' =>$file
                );

                header('Content-Type: application/json');

                echo json_encode($a);



                break;

            case 'download':

                require 'system/lib/mime.php';

                $title = route(3);
                $file_name = route(4);

                // $doc = ORM::for_table('sys_documents')->find_one($id);

 
                $file = APP_URL.'/storage/tickets/'.$file_name;

                $ext = pathinfo($file_name, PATHINFO_EXTENSION);
                $file_name = $title;
                $file_name = str_replace(' ', '_', $file_name);
                $file_name = strtolower($file_name);
                $dl_file_name = $file_name . '.' . $ext;

                // $c_type = mime_content_type($file);
// echo $file;
//  exit;
                if (file_exists($file)) {
                    $basename = basename($file);


                    // $mime = ($mime = getimagesize($file)) ? $mime['mime'] : $mime;
                    $mime = mime_content_type($file);
                    $size = filesize($file);
                    $fp   = fopen($file, "rb");
                    if (!($mime && $size && $fp)) {
                        // Error.
                        i_close('Not Found');
                        return;
                    }

                    header("Content-type: " . $mime);
                    header("Content-Length: " . $size);
                    header("Content-Disposition: attachment; filename=" . $dl_file_name);
                    header('Content-Transfer-Encoding: binary');
                    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                    fpassthru($fp);
                }
            
                break;

            case 'add_post':

                $c = Contacts::details();

                $tickets = new Tickets();

                $t = $tickets->create($c->id);


                header('Content-Type: application/json');

                echo json_encode($t);



                break;

            case 'view':

                $tid = route(3);

                $app->emit('client/tickets/view',[
                    'tid' => $tid
                ]);

                $c = Contacts::details();
                $ui->assign('user',$c);


                $d = ORM::for_table('sys_tickets')->where('tid',$tid)->where('userid',$c->id)->find_one();


                if($d){

                    // Admin details data

                    if ($d->ttotal == '') {
                        $timeSpent = 0;

                        $hh = '00';
                        $mm = '00';
                    } else {
                        $timeSpent = strtotime($d->ttotal) - strtotime('TODAY');
                        $timeSpent = (int)$timeSpent;

                        $hhmmss = $d->ttotal;
                        $hhmmss_split = explode(':', $hhmmss);
                        $hh = $hhmmss_split[0];
                        $mm = $hhmmss_split[1];
                    }

                    if ($d->admin != '0') {
                        $a = db_find_one('sys_users', $d->admin);
                    } else {
                        $a = false;
                    }
                    $ui->assign('a', $a);


                    $departments = ORM::for_table('sys_ticketdepartments')->select('id')->select('dname')->find_array();
                    $ui->assign('departments', $departments);
                    $deps = array();
                    $d_x = 0;
                    foreach ($departments as $dep) {
                        $deps[$d_x]['value'] = $dep['id'];
                        $deps[$d_x]['text'] = $dep['dname'];
                        $d_x++;
                    }
                    $jed = json_encode($deps);

                    $ads = ORM::for_table('sys_users')->select('id')->select('fullname')->find_array();

                    $ui->assign('ads', $ads);

                    $aas = array();
                    $a_x = 0;
                    foreach ($ads as $ad) {
                        $aas[$a_x]['value'] = $ad['id'];
                        $aas[$a_x]['text'] = $ad['fullname'];
                        $a_x++;
                    }


                    $jaa = json_encode($aas);

                    $dd = ORM::for_table('sys_ticketdepartments')->select('dname')->find_one($d->did);

                    if ($dd) {
                        $department = $dd->dname;
                    } else {
                        $department = '';
                    }

                    $ui->assign('department', $department);



                    $ui->assign('_st', $_L['Ticket'].' #'.$d->tid);

                    $ui->assign('d',$d);


                    // find all replies for this ticket

                    $replies = ORM::for_table('sys_ticketreplies')->where('tid',$d->id)->where('reply_type','Public')->find_array();
                    $ui->assign('replies',$replies);

                    $upload_files = array();
                    $download_files = array();

                    $ticket_files = $d->attachments;
                    if($ticket_files){
                        $ticket_file_array = explode(',', $ticket_files);
                        foreach($ticket_file_array as $key=>$tf){
                            $t = explode('.', $tf);
                            if ($key != 0) {
                                $message = 'Submission attachfile [' . $key . ']';
                            } else {
                                $message = 'Submission attachfile';
                            }
                            $attachment_file = array(
                                "id" => $d['id'],
                                "userid" => $d['userid'],
                                "account" => $d['account'],
                                "created_at" => $d['created_at'],
                                'message' => $message,
                                "replied_by" => '',
                                "attachment" => $tf,
                                "file_mime_type" => $t[1]
                            ); 
                            $upload_files[] = $attachment_file;
                        }
                    }
                    

                    foreach($replies as $rep){
                        if($rep['attachments'] != ''){
                            $attach_array = explode(',', $rep['attachments']);
                            foreach ($attach_array as $key=>$a){
                                $f = explode('.', $a);
                                if($key != 0){
                                    $message = $rep['message'].'['.$key.']';
                                }else{
                                    $message = $rep['message'];
                                }
                                $attachment_file = array(
                                    "id" => $rep['id'],
                                    "userid" => $rep['userid'],
                                    "account" => $rep['account'],
                                    "created_at" => $rep['created_at'],
                                    'message' => $message,
                                    "replied_by" => $rep['replied_by'],
                                    "attachment" => $a,
                                    "file_mime_type" => $f[1]
                                );
                                if($rep['admin'] == 0){
                                    $upload_files[] = $attachment_file;    
                                }else{
                                    $download_files[] = $attachment_file;
                                }
                            }
                        }
                        
                    }

                    $ui->assign('upload_files', $upload_files);
                    $ui->assign('download_files', $download_files);


                    $attachment_path = APP_URL. '/storage/tickets/';
                    $ui->assign('attachment_path', $attachment_path);
                

                    $ui->assign('xheader', Asset::css(array( 'footable/css/footable.core.min','redactor/redactor', 'dropzone/dropzone','sn/summernote','sn/summernote-bs3','sn/summernote-application','modal')));

                    $ui->assign('xfooter',
                        Asset::js(array( 'footable/js/footable.all.min','redactor/redactor', 'modal','dropzone/dropzone','sn/summernote.min','tickets/view', 'tinymce/tinymce.min', 'js/editor'))
                    );

                    $ui->assign('xjq','
        
                    $( ".mmnt" ).each(function() {
                                //   alert($( this ).html());
                                var ut = $( this ).html();
                                $( this ).html(moment.unix(ut).fromNow());
                            });
                    
                    ');

                    $ui->assign('jsvar','var files = [];');

                    $ui->assign('jsvar', '
                        var tid = ' . $d->id . ';
                        var departments = ' . $jed . ';
                        var agents = ' . $jaa . ';
                        var files = [];
                        ');

                    // find all replies

                    //  $ui->assign('_include','view');

                    $o_tickets = ORM::for_table('sys_tickets')->where('email', $d->email)->select('status')->select('subject')->select('urgency')->select('created_at')->select('id')->find_array();
                    $ui->assign('o_tickets', $o_tickets);


                    // check invoice exist for this ticket

                    $invoice = Invoice::where('ticket_id', $d->id)->first();

                    $predefined_replies = TicketPredefinedReply::orderBy('sorder', 'asc')
                        ->select(['id', 'title'])->get();




                    view( 'tickets_view', [
                        'invoice' => $invoice,
                        'ticket' => $d,
                        'timeSpent' => $timeSpent,
                        'predefined_replies' => $predefined_replies,
                        'hh' => $hh,
                        'mm' => $mm
                    ]);

                    // $ui->display('tickets_view.tpl');


                }
                else{

                    echo 'Ticket not found';

                }



                break;

            case 'all':

                $c = Contacts::details();
                $ui->assign('user',$c);
                $ds = ORM::for_table('sys_tickets')->where('userid',$c->id)->order_by_desc('id')->find_array();
                $ui->assign('ds',$ds);

                $ui->assign('xjq','
        
        $( ".mmnt" ).each(function() {
                    //   alert($( this ).html());
                    var ut = $( this ).html();
                    $( this ).html(moment.unix(ut).fromNow());
                });
        
        ');

                view('client_tickets_all');



                break;

            case 'add_reply':

                $c = Contacts::details();

                $tickets = new Tickets();

                $t = $tickets->add_reply();


                header('Content-Type: application/json');

                echo json_encode($t);


                break;

            case 'tasks_list':

                $tid = route(3);

                $tasks = ORM::for_table('sys_tasks')->where('rel_type', 'Ticket')->where('rel_id', $tid)->select('title')->select('id')->select('status')->order_by_desc('id')->find_array();


                $table_data = "<table class='table table-bordered table-hover sys_table'>
                                <thead>
                                    <tr>
                                        <th width='30px'>#</th>
                                        <th width='70%'>Task Name</th>
                                        <th style='text-align:center'> Status</th>
                                    </tr>
                                </thead>
                                <tbody>";

                foreach ($tasks as $key=>$task) {
                    if($task['status'] == 'Completed'){
                        $table_data .= "<tr><td>".($key+1)."</td><td>".$task['title']."</td><td style='color:green; text-align:center'>".$task['status']."</td></tr>";
                    }elseif($task['status'] == 'In Progress'){
                        $table_data .= "<tr><td>" . ($key + 1) . "</td><td>" . $task['title'] . "</td><td style='color:blue; text-align:center'>" . $task['status'] . "</td></tr>";
                    }else{
                        $table_data .= "<tr><td>" . ($key + 1) . "</td><td>" . $task['title'] . "</td><td style='color:red;text-align:center'>" . $task['status'] . "</td></tr>";
                    }
                   
                }

                $table_data.="</tbody></table>";

                if ($tasks) {
                   echo $table_data;
                } else {
                                       
                }

                break;


            case 'create':




                $rc = '';

                if($config['recaptcha'] == '1'){
                    $rc = '<script src=\'https://www.google.com/recaptcha/api.js\'></script>';
                }

                $ui->assign('xheader','    <style type="text/css">
        body {

            background-color: #FAFAFA;
            overflow-x: visible;
        }
        .paper {
            margin: 50px auto;

            border: 2px solid #DDD;
            background-color: #FFF;
            position: relative;
            width: 600px;
        }

    </style>'.$rc.Asset::css(array('dropzone/dropzone','redactor/redactor','modal')));

                $ui->assign('xfooter',
                    Asset::js(array('modal','dropzone/dropzone','redactor/redactor.min')).
                    $PluginManager->js('tickets/js/public')
                );

                $ui->assign('_include','client_create');

                $ui->display('wrapper_content.tpl');


                break;

            case 'create_post':

                header('Content-Type: application/json');
                $msg = '';

                if(!isset($_SESSION['recaptcha_verified'])){
                    $_SESSION['recaptcha_verified'] = false;
                }

                if($config['recaptcha'] == 1){


                    if(!$_SESSION['recaptcha_verified']){

                        if(Ib_Recaptcha::isValid($config['recaptcha_secretkey']) == false){

                            $msg .= $_L['Recaptcha Verification Failed'].'<br>';

                        }
                        else{

                            $_SESSION['recaptcha_verified'] = true;

                        }

                    }



                }




                $data = ib_posted_data();

                $email = $data['email'];



                $tickets = new Tickets();

                $t = $tickets->create();


                if($t['success'] == 'Yes'){
                    _msglog('s','Ticket - '.$t['tid'].' has been created successfully. Your login access sent to your email- '.$t['email'].' . Please check your Spam box too.');
                }


                echo json_encode($t);








                break;


            case 'notify':

                $ui->assign('_include','client_notify');

                $ui->display('wrapper_content.tpl');


                break;




        }



        break;


    case 'purchase_view':


        $today = date('Y-m-d H:i:s');

        $xfooter = Asset::js(array('numeric'));

        $id  = $routes['2'];
        $d = ORM::for_table('sys_purchases')->find_one($id);
        if($d){
            $token = $routes['3'];
            $token = str_replace('token_','',$token);
            $vtoken = $d['vtoken'];
            if($token != $vtoken){
                echo 'Sorry Token does not match!';
                exit;
            }


            $items = ORM::for_table('sys_purchaseitems')->where('invoiceid',$id)->order_by_asc('id')->find_many();
            $ui->assign('items',$items);
            //find related transactions
            $trs_c = ORM::for_table('sys_transactions')->where('purchase_id', $id)->count();

            $trs = ORM::for_table('sys_transactions')->where('purchase_id', $id)->order_by_desc('id')->find_many();
            $ui->assign('trs', $trs);
            $ui->assign('trs_c', $trs_c);
//find the user
            $a = ORM::for_table('crm_accounts')->find_one($d['userid']);
            $ui->assign('a',$a);
            $ui->assign('d',$d);

            $i_credit = $d['credit'];
            $i_due = '0.00';
            $i_total = $d['total'];
            if($d['credit'] != '0.00'){
                $i_due = $i_total - $i_credit;
            }
            else{
                $i_due =  $d['total'];
            }




            $ui->assign('i_due', $i_due);
            $pgs = ORM::for_table('sys_pg')->where('status','Active')->order_by_asc('sorder')->find_many();
            $ui->assign('pgs',$pgs);
            $cf = ORM::for_table('crm_customfields')->where('showinvoice','Yes')->order_by_asc('id')->find_many();
            $ui->assign('cf',$cf);

            $x_html = '';

            Event::trigger('view_invoice');

            $ui->assign('xfooter', $xfooter);

            $ui->assign('xjq',' $(\'.amount\').autoNumeric(\'init\', {

    aSign: \''.$config['currency_code'].' \',
    dGroup: '.$config['thousand_separator_placement'].',
    aPad: '.$config['currency_decimal_digits'].',
    pSign: \''.$config['currency_symbol_position'].'\',
    aDec: \''.$config['dec_point'].'\',
    aSep: \''.$config['thousands_sep'].'\',
    vMax: \'9999999999999999.00\',
                vMin: \'-9999999999999999.00\'

    });');


            $ui->assign('x_html',$x_html);

            $inv_files = Invoice::files($id);

            $inv_files_c = count($inv_files);

            $ui->assign('inv_files_c',$inv_files_c);

            $ui->assign('inv_files',$inv_files);

            //

            if(!isset($_SESSION['uid'])){

                $ip = get_client_ip();
                // log invoice access log

                $country = $_L['Unknown'];
                $city = $_L['Unknown'];
                $lat = '';
                $lon = '';

                if(isset($_SERVER['HTTP_REFERER'])){
                    $referer = $_SERVER['HTTP_REFERER'];
                }
                else{
                    $referer = '';
                }

                if(isset($_SERVER['HTTP_USER_AGENT'])){
                    $browser = $_SERVER['HTTP_USER_AGENT'];
                }
                else{
                    $browser = '';
                }

                if($config['maxmind_installed'] == 1){

                    $l_data = Ip2Location::getDetails($ip);

                    $country = $l_data['country'];
                    $city = $l_data['city'];
                    $lat = $l_data['lat'];
                    $lon = $l_data['lon'];


                }

                $ial = ORM::for_table('ib_invoice_access_log')->create();
                $ial->iid = $id;
                $ial->ip = $ip;
                $ial->browser = $browser;
                $ial->referer = $referer;
                $ial->country = $country;
                $ial->city = $city;
                $ial->viewed_at = $today;
                $ial->customer = $d->account;
                $ial->save();



            }


            //

            if($a->cid != '' || $a->cid != 0){
                $company = Company::find($a->cid);
            }
            else{
                $company = false;
            }

            view('client_purchase_view',[
                'company' => $company
            ]);

        }
        else{
            r2(U . 'customers/list', 'e', $_L['Account_Not_Found']);
        }


        break;


    case 'purchase_pdf':


        $id  = $routes['2'];
        $token = $routes['3'];

        Purchase::pdf($id,'inline',$token);



        break;


    case 'purchase_print':

        $id  = $routes['2'];
        $d = ORM::for_table('sys_purchases')->find_one($id);

        if($d){
            $token = $routes['3'];
            $token = str_replace('token_','',$token);
            $vtoken = $d['vtoken'];
            if($token != $vtoken){
                echo 'Sorry Token does not match!';
                exit;
            }


            //find all activity for this user
            $items = ORM::for_table('sys_purchaseitems')->where('invoiceid',$id)->order_by_asc('id')->find_many();

            $trs_c = ORM::for_table('sys_transactions')->where('purchase_id', $id)->count();

            $trs = ORM::for_table('sys_transactions')->where('purchase_id', $id)->order_by_desc('id')->find_many();

//find the user
            $a = ORM::for_table('crm_accounts')->find_one($d['userid']);

            $i_credit = $d['credit'];
            $i_due = '0.00';
            $i_total = $d['total'];
            if($d['credit'] != '0.00'){
                $i_due = $i_total-$i_credit;
            }
            else{
                $i_due =  $d['total'];
            }

// $i_due = number_format($i_due,2,$config['dec_point'],$config['thousands_sep']);

            $cf = ORM::for_table('crm_customfields')->where('showinvoice','Yes')->order_by_asc('id')->find_many();

            if($a->cid != '' || $a->cid != 0){
                $company = Company::find($a->cid);
            }
            else{
                $company = false;
            }


            require 'system/lib/invoices/purchase_print.php';

        }
        else{
            r2(U . 'customers/list', 'e', $_L['Account_Not_Found']);
        }


        break;


    case 'p_accept':


        $id = route(2);

        $d = ORM::for_table('sys_purchases')->find_one($id);
        if($d) {
            $token = $routes['3'];
            $token = str_replace('token_', '', $token);
            $vtoken = $d['vtoken'];
            if ($token != $vtoken) {
                echo 'Sorry Token does not match!';
                exit;
            }

            $d->stage = 'Accepted';
            $d->save();

            r2(U.'supplier/purchase_view/'.$id.'/token_'.$vtoken.'/');


        }


        break;


    case 'p_decline':


        $id = route(2);

        $d = ORM::for_table('sys_purchases')->find_one($id);
        if($d) {
            $token = $routes['3'];
            $token = str_replace('token_', '', $token);
            $vtoken = $d['vtoken'];
            if ($token != $vtoken) {
                echo 'Sorry Token does not match!';
                exit;
            }

            $d->stage = 'Declined';
            $d->save();

            r2(U.'supplier/purchase_view/'.$id.'/token_'.$vtoken.'/');


        }


        break;


    case 'uploads':

        $ui->assign('_application_menu', 'downloads');
        $ui->assign('_st', $_L['Uploads']);
        $ui->assign('_title', $config['CompanyName'].' - '.$_L['Uploads']);

        $c = Contacts::details();

        $files = Document::where('cid',$c->id)
            ->orderBy('id','desc')
            ->get();

        $upload_max_size = ini_get('upload_max_filesize');
        $post_max_size = ini_get('post_max_size');

        $ui->assign('upload_max_size',$upload_max_size);
        $ui->assign('post_max_size',$post_max_size);

        $ui->assign('xheader',Asset::css(array('modal','dropzone/dropzone')));
        $ui->assign('xfooter',Asset::js(array('modal','dropzone/dropzone')));

        view('client_uploads',[
            'user' => $c,
            'files' => $files
        ]);


        break;



    case 'document_upload':

        $c = Contacts::details();

        if(APP_STAGE == 'Demo'){
            exit;
        }



        $uploader   =   new Uploader();
        $uploader->setDir('storage/docs/');
        $uploader->sameName(false);

        $uploader->setExtensions([
            'zip',
            'pdf',
            'jpg',
            'png',
            'jpeg',
            'gif',
            'psd'
        ]);  //allowed extensions list//


        if($uploader->uploadFile('file')){   //txtFile is the filebrowse element name //
            $uploaded  =   $uploader->getUploadName(); //get uploaded file name, renames on upload//

            $file = $uploaded;
            $msg = $_L['Uploaded Successfully'];
            $success = 'Yes';

        }else{//upload failed
            $file = '';
            $msg = $uploader->getMessage();
            $success = 'No';
        }

        $a = array(
            'success' => $success,
            'msg' =>$msg,
            'file' =>$file
        );

        header('Content-Type: application/json');

        echo json_encode($a);

        break;



    case 'save_upload':

        $c = Contacts::details();

        $title = _post('title');
        $file_link = _post('file_link');

        if($title == '' || $file_link == '')
        {
            ib_die($_L['All Fields are Required']);
        }
        else{
            $token = Ib_Str::random_string(30);
            $ext = pathinfo($file_link, PATHINFO_EXTENSION);

            $document = new Document;

            $document->title = $title;
            $document->file_path = $file_link;
            $document->file_dl_token = $token;
            $document->file_mime_type = $ext;

            $document->is_global = 0;

            $document->cid = $c->id;

            $document->save();

            echo $document->id;

        }


        break;


    case 'save-invoice-signature':

        $invoice_id = _post('invoice_id');
        $view_token = _post('view_token');

        $invoice = Invoice::where('id',$invoice_id)
            ->where('vtoken',$view_token)
            ->first();



        if($invoice)
        {
            $invoice->signature_data_base64 = $_POST['signData'];
            $invoice->save();
        }

        break;

    case 'payment-stripe':

        $invoice_id = _post('invoice_id');
        $view_token = _post('view_token');

        $invoice = Invoice::where('id',$invoice_id)
            ->where('vtoken',$view_token)
            ->first();

        $payment_gateway = PaymentGateway::where('processor','stripe')
            ->first();



        if($invoice && $payment_gateway)
        {
            // Get client

            $contact = Contact::find($invoice->userid);

            $invoice_due_amount = getInvoiceDueAmount($invoice);

            \Stripe\Stripe::setApiKey($payment_gateway->c1);

            $amount = round($invoice_due_amount*100);
            $amount = (int) $amount;

            $token = $_POST['stripeToken'];
            $charge = \Stripe\Charge::create([
                'amount' => $amount,
                'currency' => $payment_gateway->c2,
                'description' => getInvoiceNumber($invoice),
                'source' => $token,
                'capture' => true,
            ]);

            if(isset($charge->status) && ($charge->status == 'succeeded'))
            {
                $invoice->status = 'Paid';
                $invoice->save();
            }

            r2(getInvoicePreviewUrl($invoice),'s',$_L['Payment Successful']);

        }





        break;



    default:
        echo 'action not defined';
}