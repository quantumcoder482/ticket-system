<?php
/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/
_auth();
$ui->assign('_application_menu', 'orders');
$ui->assign('_title', $_L['Orders'].'- '. $config['CompanyName']);
$ui->assign('_st', $_L['Orders']);
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);

Event::trigger('orders');

switch ($action) {

    case 'list':

        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');

        $mode_css = '';
        $mode_js = '';

            $mode_css = Asset::css('footable/css/footable.core.min');

            $mode_js = Asset::js(array('footable/js/footable.all.min','numeric','orders/list'));

            $d = ORM::for_table('sys_orders')->order_by_desc('id')->find_many();


        $ui->assign('d',$d);
        $ui->assign('xheader',$mode_css);
        $ui->assign('xfooter',$mode_js);

        $xjq = '

    $(\'.amount\').autoNumeric(\'init\', {

    aSign: \''.$config['currency_code'].' \',
    dGroup: '.$config['thousand_separator_placement'].',
    aPad: '.$config['currency_decimal_digits'].',
    pSign: \''.$config['currency_symbol_position'].'\',
    aDec: \''.$config['dec_point'].'\',
    aSep: \''.$config['thousands_sep'].'\',
    vMax: \'9999999999999999.00\',
                vMin: \'-9999999999999999.00\'

    });

 ';

        $ui->assign('xjq', $xjq);

        view('orders_list');

        break;


    case 'add':


        // find all customers




        $c = ORM::for_table('crm_accounts')->select('id')->select('account')->select('company')->select('email')->order_by_desc('id')->find_many();
        $ui->assign('c', $c);

        // find all products

        $p = ORM::for_table('sys_items')->select('id')->select('name')->find_array();

        $ui->assign('p',$p);

        if (isset($routes['3']) AND ($routes['3'] != '')) {
            $p_cid = $routes['3'];
            $p_d = ORM::for_table('crm_accounts')->find_one($p_cid);
            if ($p_d) {
                $ui->assign('p_cid', $p_cid);
            }
        } else {
            $ui->assign('p_cid', '');
        }

        $css_arr = array('s2/css/select2.min','modal','dp/dist/datepicker.min');


        $mode_js = Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),'dp/dist/datepicker.min','dp/i18n/'.$config['language'],'numeric','modal'));
        $ui->assign('xheader',Asset::css($css_arr));

        $ui->assign('xfooter',$mode_js);

        $ui->assign('xjq', '
        
        function ib_amount() {
    
}
 $(\'.amount\').autoNumeric(\'init\', {

    aSign: \''.$config['currency_code'].' \',
    dGroup: '.$config['thousand_separator_placement'].',
    aPad: '.$config['currency_decimal_digits'].',
    pSign: \''.$config['currency_symbol_position'].'\',
    aDec: \''.$config['dec_point'].'\',
    aSep: \''.$config['thousands_sep'].'\',
    vMax: \'9999999999999999.00\',
                vMin: \'-9999999999999999.00\'

    });

 ');

       view('orders_add');

        break;

    case 'post':


        $pid = _post('pid');


        $cid = _post('cid');
        $status = _post('status');
        $billing_cycle = _post('billing_cycle');

        $amount = _post('price');
        $amount = Finance::amount_fix($amount);

       // $items = $_POST['items'];

        if($pid == '' || $cid == ''){

            i_close($_L['All Fields are Required']);

        }

        $p = ORM::for_table('sys_items')->find_one($pid);

        if(!$p){

            i_close($_L['Item Not Found']);

        }

        // find the customer

        $c = ORM::for_table('crm_accounts')->find_one($cid);

        if(!$c){
            i_close($_L['User Not Found']);
        }


        $today = date('Y-m-d');

        // create invoice

        $generate_invoice = _post('generate_invoice');

        if($generate_invoice == 'Yes'){


            $invoice = Invoice::forSingleItem($cid,$p->name,$amount);

            $iid = $invoice['id'];

        }

        else{
            $iid = 0;
        }



        $order = ORM::for_table('sys_orders')->create();

        $order->stitle = $p->name;
        $order->pid = $pid;
        $order->cid = $cid;
        $order->cname = $c->account;
        $order->date_added = $today;
        $order->amount = $amount;
        $order->ordernum = _raid(10);
        $order->status = $status;
        $order->billing_cycle = $billing_cycle;
        $order->iid = $iid;
        $order->save();



        echo $order->id();




        break;


    case 'view':


        $oid = route(2);

        // find the orders

        $order = ORM::for_table('sys_orders')->find_one($oid);

        if($order){

            $ui->assign('jsvar', '
_L[\'data_updated\'] = \''.$_L['Data Updated'].'\';
_L[\'email_sent\'] = \''.$_L['Email Sent'].'\';
 ');




            $ui->assign('xfooter', Asset::js(array('tinymce/tinymce.min','numeric','orders/view'),2));

            $ui->assign('order',$order);

            $xjq = '

    $(\'.amount\').autoNumeric(\'init\', {

    aSign: \''.$config['currency_code'].' \',
    dGroup: '.$config['thousand_separator_placement'].',
    aPad: '.$config['currency_decimal_digits'].',
    pSign: \''.$config['currency_symbol_position'].'\',
    aDec: \''.$config['dec_point'].'\',
    aSep: \''.$config['thousands_sep'].'\',
    vMax: \'9999999999999999.00\',
                vMin: \'-9999999999999999.00\'

    });

 ';

            $ui->assign('xjq', $xjq);

            view('orders_view');

        }
        else{
            i_close('Order Not Found');
        }


        break;

    case 'set':

        $id = route(2);
        $status = route(3);

        $allowed_status = array('Pending','Active','Cancelled','Fraud','Processing');

        if(in_array($status,$allowed_status)){

        }
        else{
            $msg = 'Invalid Status';
        }

        $d = ORM::for_table('sys_orders')->find_one($id);

        if($d){

            $d->status = $status;
            $d->save();

            $msg = $_L['Data Updated'];


        }

        else{
            $msg = 'Order not found';
        }


        r2(U.'orders/view/'.$id.'/','s',$msg);



        break;



    case 'save_activation':

        $oid = _post('oid');

        $activation_subject = $_POST['activation_subject'];

        $activation_message = $_POST['activation_message'];

        $send_email = _post('send_email');

        if($activation_message == '' || $activation_message == ''){
            i_close($_L['All Fields are Required']);
        }




        $d = ORM::for_table('sys_orders')->find_one($oid);

        if($d){

            $cid = $d->cid;

            $d->activation_subject = $activation_subject;
            $d->activation_message = $activation_message;

            $d->save();


            if($send_email == 'yes'){

                // Send Email

                $client = ORM::for_table('crm_accounts')->find_one($cid);

                if($client){

                    if($client->email != ''){
                        Ib_Email::_send($client->account,$client->email,$activation_subject,$activation_message,$cid);
                    }

                }





            }




            echo $d->id();

        }

        else{

            echo 'Order not found';

        }



        break;


    case 'module':

        $id = route(2);



        $d = ORM::for_table('sys_orders')->find_one($id);

        if($d){

            Event::trigger('orders/modules/');

            r2(U.'orders/view/'.$id.'/','s',$_L['Data Updated']);


        }

        else{
            $msg = 'Order not found';
        }





        break;








    default:
        echo 'action not defined';
}