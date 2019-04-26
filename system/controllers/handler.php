<?php

/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

_auth();
$ui->assign('_application_menu', 'contacts');
$ui->assign('_title', $_L['Customers'].'- '. $config['CompanyName']);
$ui->assign('_st', $_L['Customers']);
$action = route(1);
$user = User::_info();
$ui->assign('user', $user);

Event::trigger('accounts');

switch ($action) {



    case 'email':

        $email = route(2);
       // $subject = route(3);

        $ui->assign('email',$email);

        view('modal_send_email');


        break;


    case 'send_email_post':


        $msg = '';

        $email = _post('to');

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            i_close($_L['Invalid Email']);
        }
        $email_e = explode('@',$email);
        $toname = $email_e[0];
        $subject = _post('subject');
        if($subject == ''){
            $msg .= $_L['Subject is Empty'].' <br>';
        }
        $message = $_POST['message'];
        if($message == ''){
            $msg .= $_L['Message is Empty'].' <br>';
        }
        if($msg == ''){
            //send email
            Notify_Email::_send($toname,$email,$subject,$message);
            _msglog('s',$_L['Email Sent']);
            echo '1';

        }
        else{
            echo $msg;
        }


        break;

    case 'bulk_email':

        $ui->assign('_title', $_L['Email'].'- '. $config['CompanyName']);
        $ui->assign('_st', $_L['Email']);

        if(!isset($_POST['ids'])){
        exit;
        }

        $ids_raw = $_POST['ids'];

        $ids = array();

        foreach ($ids_raw as $id_single){
            $id = str_replace('row_','',$id_single);
            array_push($ids,$id);
        }

        $ui->assign('jsvar', '
_L[\'Email Sent\'] = \''.$_L['Email Sent'].'\';
 ');

        $contacts = ORM::for_table('crm_accounts')->select('id')->select('account')->select('email')->where_id_in($ids)->find_array();

        $ui->assign('xheader', Asset::css(array('modal')));

        $ui->assign('xfooter', Asset::js(array('modal','js/filtertable','tinymce/tinymce.min','js/editor','js/handler_bulk_email'),$file_build));

        $ui->assign('contacts',$contacts);


        view('handler_bulk_email');



        break;

    case 'bulk_email_post':

        $emails = $_POST['emails'];
        $emails = explode("\n",$emails);

        $subject = $_POST['subject'];
        $msg = $_POST['msg'];

        if($subject == ''){
            echo $_L['Subject is Empty'];
            exit;
        }

        Ib_Email::bulk_email($emails,$subject,$msg,$user->username);

      //  echo $_L['Email Sent'];

        echo '1';


        break;


    case 'view_email_templates':

        $tpls = ORM::for_table('sys_email_templates')->select('id')->select('core')->select('tplname')->select('subject')->order_by_desc('id')->find_array();

        $ui->assign('tpls',$tpls);

        view('modal_view_email_templates');


        break;

    case 'json_eml_tpl':

        $id = route(2);
        $id = str_replace('es','',$id);

        $eml = ORM::for_table('sys_email_templates')->find_one($id);

        if($eml){

            $resp = array();
            $resp['subject'] = $eml->subject;
            $resp['message'] = $eml->message;

            api_response($resp);


        }


        break;


    case 'groups':

        $gs = ORM::for_table('crm_groups')->order_by_asc('sorder')->find_array();

        $opt = '';

        foreach ($gs as $g){
            $opt .= '<option value="'.$g['id'].'">'.$g['gname'].'</option>';
        }

        echo '<div class="form-group">
    <label for="input_assign_group">'.$_L['Group'].'</label>
    <select class="form-control" id="input_assign_group">
<option value="0">'.$_L['Select Group'].'...</option>
<option value="0">'.$_L['None'].'</option>
'.$opt.'
</select>
  </div>
  
';




        break;


    case 's':

        is_dev();

        ORM::execute('ALTER TABLE `sys_email_logs` ADD `rel_type` VARCHAR(100) NULL DEFAULT NULL, ADD `rel_id` INT(11) NOT NULL DEFAULT \'0\'');

        ORM::execute('ALTER TABLE `crm_accounts` ADD `options` TEXT NULL DEFAULT NULL AFTER `notes`');

        add_option('add_fund','0');
        add_option('add_fund_minimum_deposit','100');
        add_option('add_fund_maximum_deposit','2500');
        add_option('add_fund_maximum_balance','25000');
        add_option('add_fund_require_active_order','0');

        ORM::execute('ALTER TABLE `sys_invoices` ADD `is_credit_invoice` INT(1) NOT NULL DEFAULT \'0\'');

        echo 'ok';




        break;







    default:
        echo 'action not defined';
}