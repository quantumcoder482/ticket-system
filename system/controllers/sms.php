<?php
_auth();
$ui->assign('_application_menu', 'sms');
$ui->assign('_title', 'SMS' . ' - ' . $config['CompanyName']);
$ui->assign('_st', 'SMS');
$action = $routes['2'];
$user = User::_info();
$ui->assign('user', $user);

// SMS Driver

require 'system/lib/misc/smsdriver.php';

switch ($action)
{
    case 'send':
        if (isset($routes['3']) AND ($routes['3'] != ''))
        {
            $p_cid = $routes['3'];
            $p_d = ORM::for_table('crm_accounts')->find_one($p_cid);
            if ($p_d)
            {
                $ui->assign('p_cid', $p_cid);
            }
        }
        else
        {
            $ui->assign('p_cid', '');
        }

        $ui->assign('xheader', Asset::css(array(
            's2/css/select2.min',
            'modal'
        )));
        $ui->assign('xfooter', Asset::js(array(
            's2/js/select2.min',
            's2/js/i18n/' . lan() ,
            'modal',
            'sms/sms_counter',
            'sms/send'
        )));
        $c = ORM::for_table('crm_accounts')->select('phone')->where_not_equal('phone', '')->select('account')->select('company')->select('email')->order_by_desc('id')->find_many();
        $ui->assign('c', $c);
        view('sms_send');
        break;

    case 'send_post':
        $from = _post('from');
        $to = _post('sms_to');
        $message = $_POST['message'];
        $sms_type = _post('sms_type');
        $sms_route = _post('sms_route');
        $resp = '';
        $alert = '';
        if ($to == '')
        {
            $alert.= 'Please choose Phone Number for receiver <br />';
        }

        if ($from == '')
        {
            $alert.= 'Please choose Sender Number <br />';
        }

        if ($message == '')
        {
            $alert.= 'Message is empty <br />';
        }

        if ($alert == '')
        {

            $resp = spSendSMS($to, $message, $from, 0, $sms_type, $sms_route);
            echo '<div class="alert alert-success alert-dismissible" role="alert">
  
  <strong>Success!</strong> Message Sent. Message Server Response: ' . $resp . '
</div>';
        }
        else
        {
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
 
  <strong>Error: </strong> <br /> ' . $alert . '
</div>';
        }

        break;

    case 'bulk':
        $c = ORM::for_table('crm_accounts')->select('phone')->where_not_equal('phone', '')->select('account')->select('company')->select('email')->order_by_desc('id')->find_many();
        $ui->assign('c', $c);
        $ui->assign('xheader', Asset::css(array(
            'multi-select/multi-select'
        )));
        $ui->assign('xfooter', Asset::js(array(
            'multi-select/multi-select',
            'quicksearch',
            'sms/sms_counter',
            'sms/bulk'
        )));


        view('sms_bulk');
        break;

    case 'bulk_post':
        clxPerformLongProcess();
        $data = $request->all();
        $numbers = '';
        foreach($data['contacts'] as $number)
        {
            $numbers.= $number . ',';
        }

        $numbers = rtrim($numbers, ',');
        $resp = spSendSMS($numbers, $data['message'], $data['from']);
        $alert = $resp;
        echo '<div class="alert alert-danger alert-dismissible" role="alert">
 
  <strong>Error: </strong> <br /> ' . $alert . '
</div>';
        break;

    case 'inbox':
        $paginator = Paginator::bootstrap('app_sms');
        $d = ORM::for_table('app_sms')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('req_time')->find_many();
        $ui->assign('d', $d);
        $ui->assign('paginator', $paginator);
        view('sms_inbox');
        break;

    case 'sent':
        $paginator = Paginator::bootstrap('app_sms');
        $d = ORM::for_table('app_sms')->offset($paginator['startpoint'])->limit($paginator['limit'])->find_many();
        $ui->assign('d', $d);
        $ui->assign('paginator', $paginator);

        //        $ui->assign('_include','sent');
        //        $ui->display('wrapper.tpl');

        view('sms_sent');
        break;

    case 'templates':
        $templates = SMSTemplate::all();
        view('sms_templates', ['templates' => $templates]);
        break;

    case 'drivers':
        $d = ORM::for_table('app_sms_drivers')->find_array();
        $ui->assign('d', $d);
        view('sms_drivers');
        break;

    case 'notifications':
        view('sms_notifications');
        break;

    case 'delete_driver':
        $id = route(3);
        $d = ORM::for_table('app_sms_drivers')->find_one($id);
        if ($d)
        {
            $d->delete();
        }

        r2(U . 'sms/init/drivers/', 's', 'Deleted Successfully');
        break;

    case 'new_sms_driver':

        view('sms_new_sms_driver');
        break;

    case 'new_sms_driver_step_2':
        $handler = _post('handler');
        $ui->assign('handler', $handler);
        $h_name = ucwords($handler);
        $ui->assign('h_name', $h_name);
        $ui->assign('_st', 'Configure ' . $h_name);
        $l = array();
        switch ($handler)
        {
            case 'msg91':
                $l['api_key'] = 'Authentication key';
                break;
        }

        $ui->assign('l', $l);
        view('sms_new_sms_driver_step_2');
        break;

    case 'save_sms_driver':
        $dname = _post('dname');
        $handler = _post('handler');
        $weburl = _post('weburl');
        $description = _post('description');
        $url = _post('url');
        $incoming_url = _post('incoming_url');
        $method = _post('method');
        $username = _post('username');
        $password = _post('password');
        $api_key = _post('api_key');
        $api_secret = _post('api_secret');
        $route = _post('route');
        $sender_id = _post('sender_id');
        $placeholder = _post('placeholder');
        $status = _post('status');
        $is_active = _post('is_active');
        $d = ORM::for_table('app_sms_drivers')->create();
        $d->dname = $dname;
        $d->handler = $handler;
        $d->weburl = $weburl;
        $d->description = $description;
        $d->url = $url;
        $d->incoming_url = $incoming_url;
        $d->method = $method;
        $d->username = $username;
        $d->password = $password;
        $d->api_key = $api_key;
        $d->api_secret = $api_secret;
        $d->route = $route;
        $d->sender_id = $sender_id;
        $d->placeholder = $placeholder;
        $d->status = $status;
        $d->is_active = $is_active;
        $d->save();
        break;

    case 'edit':
        $id = route(3);
        $template = SMSTemplate::find($id);
        if ($template)
        {
            view('sms_template_edit', ['template' => $template]);
        }

        break;

    case 'edit_post':
        $id = _post('template_id');
        $message = _post('message');
        $template = SMSTemplate::find($id);
        if ($template)
        {
            $template->sms = $message;
            $template->save();
            echo $_L['Data Updated'];
        }

        break;

    case 'send_invoice':
        $to = _post('to');
        $from = _post('from');
        $invoice_id = _post('invoice_id');
        $message = _post('message');
        if ($to == '' || $from == '' || $invoice_id == '' || $message == '')
        {
            echo '<div class="alert alert-success fade in">All fields are required.</div>';
            exit;
        }

        spSendSMS($to, $message, $from, $invoice_id, 'text', 4);
        echo '<div class="alert alert-success fade in">SMS Sent!</div>';
        break;

    case 'send_quote':
        $to = _post('to');
        $from = _post('from');

        // $invoice_id = _post('invoice_id');

        $message = _post('message');
        spSendSMS($to, $message, $from);
        echo '<div class="alert alert-success fade in">SMS Sent!</div>';
        break;

    case 'settings':
        view('sms_settings');
        break;

    case 'save-sms-credentials':
        $sms_api_handler = _post('sms_api_handler');
        update_option('sms_api_handler', $sms_api_handler);
        $sms_auth_username = _post('sms_auth_username');
        update_option('sms_auth_username', $sms_auth_username);
        $sms_auth_password = _post('sms_auth_password');
        update_option('sms_auth_password', $sms_auth_password);
        $sms_sender_name = _post('sms_sender_name');
        update_option('sms_sender_name', $sms_sender_name);
        update_option('sms_req_url', _post('sms_req_url'));
        update_option('sms_request_method', _post('sms_request_method'));
        update_option('sms_http_params', $_POST['sms_http_params']);
        echo $_L['Data Updated'];
        break;

    case 's':
        is_dev();
        $t = new Schema('app_sms');
        $t->add('req_time', 'datetime');
        $t->add('sent_time', 'datetime');
        $t->add('sms_from');
        $t->add('sms_to');
        $t->add('sms');
        $t->add('driver');
        $t->add('resp');
        $t->add('status', 'varchar', 200);
        $t->add('stype', 'varchar', 200, 'Sent');
        $t->add('cid', 'int', 11);
        $t->add('aid', 'int', 11);
        $t->add('company_id', 'int', 11);
        $t->add('iid', 'int', 11);
        $t->add('trid', 'int', 11);
        $t->add('lid', 'int', 11);
        $t->add('oid', 'int', 11);
        $t->save();
        $t = new Schema('app_sms_drivers');
        $t->add('dname', 'varchar', 200);
        $t->add('handler', 'varchar', 200);
        $t->add('weburl', 'varchar', 200);
        $t->add('description');
        $t->add('url', 'varchar', 200);
        $t->add('incoming_url', 'varchar', 200);
        $t->add('method', 'varchar', 50);
        $t->add('username', 'varchar', 200);
        $t->add('password', 'varchar', 200);
        $t->add('api_key', 'varchar', 200);
        $t->add('api_secret', 'varchar', 200);
        $t->add('route', 'varchar', 200);
        $t->add('sender_id', 'varchar', 100);
        $t->add('balance', 'decimal', '14,2');
        $t->add('placeholder');
        $t->add('status', 'varchar', 100);
        $t->add('is_active', 'int', 1, '0');
        $t->add_primary_data('(`id`, `dname`, `handler`, `weburl`, `description`, `url`, `incoming_url`, `method`, `username`, `password`, `api_key`, `api_secret`, `route`, `sender_id`, `balance`, `placeholder`, `status`, `is_active`) VALUES (NULL, \'custom\', \'custom\', \'http://www.example.com\', \'Your Custom Gateway\', \'http://api.example.com\', \'http://www.example.com/incoming/\', \'GET\', \'your_username\', \'your_password\', \'your_api_key\', \'your_api_secret\', \'1\', \'CloudOnex\', \'1.00\', \'{{url}}/send.php?username={{username}}&password={{password}}&from={{from}}&to={{to}}&message={{message}}\', \'Sandbox\', \'0\'), (NULL, \'test\', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, \'0\')');
        $t->save();
        add_option('sms_request_method', 'GET');
        add_option('sms_auth_header', '');
        add_option('sms_req_url', '');
        add_option('sms_notify_admin_new_deposit', '0');
        add_option('sms_notify_customer_signed_up', '0');
        add_option('sms_notify_customer_invoice_created', '0');
        add_option('sms_notify_customer_invoice_paid', '0');
        add_option('sms_notify_customer_payment_received', '0');
        $t = new Schema('app_sms_templates');
        $t->add('tpl', 'varchar', '200');
        $t->add('sms');
        $t->add('status', 'varchar', 200);
        $t->save();
        break;

    default:
        echo 'action not defined';
}