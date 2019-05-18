<?php

/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/




if(!isset($myCtrl)){
    $myCtrl = 'contacts';
}
_auth();
$ui->assign('_application_menu', 'contacts');
$ui->assign('_title', $_L['Customers'].' - '. $config['CompanyName']);
$ui->assign('_st', $_L['Contacts']);
$ui->assign('content_inner',inner_contents($config['c_cache']));
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);

$ui->assign('jsvar', '
_L[\'Working\'] = \''.$_L['Working'].'\';
_L[\'Submit\'] = \''.$_L['Submit'].'\';
 ');



switch ($action) {
    case 'add':

        Event::trigger('contacts/add/');



        $type = route(2);

        $title_type = $_L['Add Customer'];
        $contact_type = 'customer';

        $db_type = 'Customer';

        if($type == 'supplier'){
            $type_title = $_L['Add Supplier'];
            $contact_type = 'supplier';
            $db_type = 'Supplier';
            $ui->assign('_application_menu', 'suppliers');
            $predict_customer_number = predict_next_serial($config,'supplier');
        }
        else{
            $predict_customer_number = predict_next_serial($config,'customer');
        }

        if(!has_access($user->roleid,'customers','create')){
            permissionDenied();
        }

        $ui->assign('countries',Countries::all($config['country'])); // may add this $config['country_code']

        $fs = ORM::for_table('crm_customfields')->where('ctype','crm')->order_by_asc('id')->find_many();
        $ui->assign('fs',$fs);


        // find all companies

        $companies = ORM::for_table('sys_companies')->select('id')->select('company_name')->order_by_desc('id')->find_array();

        $ui->assign('companies',$companies);

        // find all groups

        $gs = ORM::for_table('crm_groups')->order_by_asc('sorder')->find_array();

        $ui->assign('gs',$gs);

        $g_selected_id = route(3);
        $c_selected_id = route(4);



        if($g_selected_id){
            $ui->assign('g_selected_id',$g_selected_id);
        }
        else{
            $ui->assign('g_selected_id','');
        }

        if($c_selected_id){
            $ui->assign('c_selected_id',$c_selected_id);
        }
        else{
            $ui->assign('c_selected_id','');
        }




//        $ui->assign('xheader', '
//<link rel="stylesheet" type="text/css" href="ui/lib/s2/css/select2.min.css"/>
//');
        $ui->assign('xheader', Asset::css(array('modal','s2/css/select2.min')));
        $ui->assign('xfooter', Asset::js(array('modal','s2/js/select2.min','s2/js/i18n/'.lan())));
        $tags = Tags::get_all('Contacts');
        $ui->assign('tags',$tags);


        $ui->assign('jsvar', '
_L[\'Working\'] = \''.$_L['Working'].'\';
_L[\'Company Name\'] = \''.$_L['Company Name'].'\';
_L[\'New Company\'] = \''.$_L['New Company'].'\';
 ');


        $currencies = M::factory('Models_Currency')->find_array();

        $ui->assign('currencies',$currencies);


       // $ui->display('add-contact.tpl');

        view('contacts_add',[
            'contact_type' => $contact_type,
            'title_type' => $title_type,
            'db_type' => $db_type,
            'predict_customer_number' => $predict_customer_number
        ]);



        break;

    case 'summary':

        $extra_html_0 = '';
        $extra_html_1 = '';
        $extra_html_2 = '';

        Event::trigger('contacts/summary/');


        $cid = _post('cid');
        $d = ORM::for_table('crm_accounts')->find_one($cid);
        if($d){
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

            $ui->assign('te',$te);
            $ui->assign('d',$d);

            $cf = ORM::for_table('crm_customfields')->where('ctype','crm')->order_by_asc('id')->find_many();
            $ui->assign('cf',$cf);

            // Find Profit

            if($ti > $te){

                $happened = $_L['Profit'];
                $css_class = 'green';

                $d_amount = $ti-$te;

            }
            else{
                $happened = $_L['Loss'];
                $css_class = 'danger';
                $d_amount = $te-$ti;
            }

            $ui->assign('happened',$happened);
            $ui->assign('css_class',$css_class);
            $ui->assign('d_amount',$d_amount);

           // $customer = $d;

            Event::trigger('contacts/summary_display/');

            $ui->assign('extra_html_0',$extra_html_0);
            $ui->assign('extra_html_1',$extra_html_1);
            $ui->assign('extra_html_2',$extra_html_2);

            view('ajax.contact-summary');

        }
        else{

        }


        break;

    case 'activity':

        Event::trigger('contacts/activity/');

        $cid = _post('cid');
        $d = ORM::for_table('crm_accounts')->find_one($cid);
        if($d){
            $ac = ORM::for_table('sys_activity')->where('cid',$cid)->limit(20)->order_by_desc('id')->find_many();
            $ui->assign('ac',$ac);

            view('ajax.contact-activity');
        }
        else{

        }


        break;


    case 'invoices':

        Event::trigger('contacts/invoices/');

        $cid = _post('cid');
        $ui->assign('cid',$cid);
        $d = ORM::for_table('crm_accounts')->find_one($cid);
        if($d){


            $total_invoice_amount = 0.00;
            $total_paid_amount = 0.00;
            $total_unpaid_amount = 0.00;

            $invoices = Invoice::where('userid',$cid)->get();

            $currencies = Currency::all()->keyBy('cname')->toArray();

            $home_currency = homeCurrency();



            foreach ($invoices as $invoice)
            {
                if($invoice->currency_iso_code != $home_currency->cname)
                {
                    $rate = 1;
                    if(isset($currencies[$invoice->currency_iso_code]))
                    {
                        $rate = $currencies[$invoice->currency_iso_code]['rate'];
                    }

                }
                else{
                    $rate = 1;
                    $total_invoice_amount += $invoice->total;
                }


                $invoice_total = $invoice->total;
                $total_invoice_amount += $invoice_total*$rate;

                if($invoice->status == 'Unpaid')
                {
                    $total_unpaid_amount += $invoice_total*$rate;
                }
                elseif ($invoice->status == 'Paid')
                {
                    $total_paid_amount += $invoice_total*$rate;
                }


            }


            view('ajax.contact-invoices',[
                'total_invoice_amount' => $total_invoice_amount,
                'total_paid_amount' => $total_paid_amount,
                'total_unpaid_amount' => $total_unpaid_amount,
                'invoices' => $invoices
            ]);


        }
        else{

        }


        break;


    case 'purchases':

        Event::trigger('contacts/purchases/');

        $cid = _post('cid');
        $ui->assign('cid',$cid);
        $d = ORM::for_table('crm_accounts')->find_one($cid);
        if($d){
            $i = ORM::for_table('sys_purchases')->where('userid',$cid)->find_many();

            $total_invoice_amount = Purchase::where('userid',$cid)->sum('total');
            $total_paid_amount = Purchase::where('userid',$cid)->paid()->sum('total');
            $total_unpaid_amount = Purchase::where('userid',$cid)->unpaid()->sum('total');





            $ui->assign('i',$i);

            view('ajax.contact-purchases',[
                'total_invoice_amount' => $total_invoice_amount,
                'total_paid_amount' => $total_paid_amount,
                'total_unpaid_amount' => $total_unpaid_amount
            ]);


        }
        else{

        }


        break;


    case 'quotes':

        Event::trigger('contacts/quotes/');

        $cid = _post('cid');
        $ui->assign('cid',$cid);
        $d = ORM::for_table('crm_accounts')->find_one($cid);
        if($d){
            $i = ORM::for_table('sys_quotes')->where('userid',$cid)->find_many();
            $ui->assign('i',$i);

            view('ajax.contact-quotes');

        }
        else{

        }


        break;

    case 'submissions':

        Event::trigger('contacts/submissions');

        $cid = _post('cid');
        $ui->assign('cid', $cid);

        $d = ORM::for_table('crm_accounts')->find_one($cid);
        if($d){
            $s = ORM::for_table('sys_tickets')->where('userid', $cid)->find_many();
            $ui->assign('s', $s);
            
            view('ajax.contact-submissions');
        }
        else 
        {

        }

        break;


    case 'transactions':

        Event::trigger('contacts/transactions/');

        $cid = _post('cid');
        $d = ORM::for_table('crm_accounts')->find_one($cid);
        if($d){
            $tr = ORM::for_table('sys_transactions')
                ->where_raw('(`payerid` = ? OR `payeeid` = ?)', array($cid, $cid))
                ->order_by_desc('id')->find_many();
            $ui->assign('tr',$tr);

            view('ajax.contact-transactions');

        }
        else{

        }


        break;

    case 'email':

        Event::trigger('contacts/email/');

        $cid = _post('cid');
        $d = ORM::for_table('crm_accounts')->find_one($cid);
        if($d){
            $e = ORM::for_table('sys_email_logs')
                ->where('userid',$cid)
                ->order_by_desc('id')->find_many();
            $ui->assign('d',$d);
            $ui->assign('e',$e);

            view('ajax.contact-emails');

        }
        else{

        }


        break;


    case 'edit':

        Event::trigger('contacts/edit/');

        if(!has_access($user->roleid,'customers','edit')){

            permissionDenied();

        }

        $cid = _post('cid');
        $d = ORM::for_table('crm_accounts')->find_one($cid);
        if($d){
            $fs = ORM::for_table('crm_customfields')->where('ctype','crm')->order_by_asc('id')->find_many();
            $ui->assign('fs',$fs);
            $ui->assign('countries',Countries::all($d['country']));
            $ui->assign('d',$d);
            $tags = Tags::get_all('Contacts');
            $ui->assign('tags',$tags);
            $dtags = explode(',',$d['tags']);
            $ui->assign('dtags',$dtags);

            // find all groups

            $gs = ORM::for_table('crm_groups')->order_by_asc('sorder')->find_array();

            $ui->assign('gs',$gs);

            $companies = ORM::for_table('sys_companies')->select('id')->select('company_name')->order_by_desc('id')->find_array();

            $ui->assign('companies',$companies);

            $g_selected_id = route(4);

            if($g_selected_id){
                $ui->assign('g_selected_id',$g_selected_id);
            }
            else{
                $ui->assign('g_selected_id','');
            }

            $c_selected_id = route(5);


            if($c_selected_id){
                $ui->assign('c_selected_id',$c_selected_id);
            }
            else{
                $ui->assign('c_selected_id','');
            }

            $currencies = M::factory('Models_Currency')->find_array();

            $ui->assign('currencies',$currencies);

            view('ajax.contact-edit');


        }
        else{

        }


        break;



    case 'add-activity-post':


        Event::trigger('contacts/add-activity-post/');

        $cid = _post('cid');
        $msg = $_POST['msg'];
        $icon = $_POST['icon'];
        $icon = trim($icon);



        $icon = str_replace('<a href="#"><i class="','',$icon);
        $icon = str_replace('"></i></a>','',$icon);
        if($icon == ''){
            $icon = 'fa fa-check';
        }

        if ($msg == '') {

            echo $_L['description_error'];
        }

        else{
            $d = ORM::for_table('sys_activity')->create();
            $d->cid = $cid;
            $d->msg = $msg;
            $d->icon = $icon;
            $d->stime = time();
            $d->sdate = date('Y-m-d');
            $d->o = $user->id;
            $d->oname = $user['fullname'];
            $d->save();

            echo $cid;
        }

        break;


    case 'activity-delete':

        Event::trigger('contacts/activity-delete/');

        $id = $routes['3'];
        $d = ORM::for_table('sys_activity')->find_one($id);
        $d->delete();
        $cid = $routes['2'];
        r2(U.$myCtrl.'/view/'.$cid.'/','s',$_L['Deleted Successfully']);
        break;

    case 'view':

        Event::trigger('contacts/view/');



        $id  = $routes['2'];


        $d = ORM::for_table('crm_accounts')->find_one($id);

        // check self data only



        $is_supplier = false;

        $po_count = 0;

        $ticket_count = 0;

        if($d){

            if(!has_access($user->roleid,'customers','all_data')){

                if($d->o != $user->id)
                {
                    permissionDenied();
                }

            }

            if($d->type == 'Supplier'){

                $is_supplier = true;

                $ui->assign('_application_menu', 'suppliers');

                $po_count = ORM::for_table('sys_purchases')->where('userid',$id)->count();

                if($po_count == ''){
                    $po_count = 0;
                }

            }



            $extra_tab = '';
            $extra_jq = '';

            $tab = route(3);

            if(!$tab){

                $tab = 'summary';

            }

            $ui->assign('tab',$tab);

            Event::trigger('contacts/view/_on_start');

            $ui->assign('extra_tab', $extra_tab);

            // invoice count

            $inv_count = ORM::for_table('sys_invoices')->where('userid',$id)->count();

            if($inv_count == ''){
                $inv_count = 0;
            }

            $ui->assign('inv_count',$inv_count);

            $quote_count = ORM::for_table('sys_quotes')->where('userid',$id)->count();

            if($quote_count == ''){
                $quote_count = 0;
            }

            $ui->assign('quote_count',$quote_count);

            $ticket_count = ORM::for_table('sys_tickets')->where('userid', $id)->count();

            $ui->assign('ticket_count', $ticket_count);


            //find all activity for this user
//            $ac = ORM::for_table('sys_activity')->where('cid',$id)->limit(20)->order_by_desc('id')->find_many();
//            $ui->assign('ac',$ac);





            $ui->assign('xheader', Asset::css(array('modal','s2/css/select2.min','imgcrop/assets/css/croppic', 'footable/css/footable.core.min')));




            $ui->assign('xfooter', Asset::js(array('modal','js/filtertable','js/redirect','tinymce/tinymce.min','js/editor','s2/js/select2.min','s2/js/i18n/'.lan(),'imgcrop/croppic','numeric', 'footable/js/footable.all.min'),$file_build));

            $ui->assign('xjq', '
 var cid = $(\'#cid\').val();
    var _url = $("#_url").val();
    var cb = function cb (){



            };




 '.
                $extra_jq);

            $ui->assign('d',$d);

            Event::trigger('contacts/view/_on_display');

            view('account-profile-alt',[
                'is_supplier' => $is_supplier,
                'po_count' => $po_count
            ]);

        }
        else{
            r2(U . 'customers/list/', 'e', $_L['Account_Not_Found']);
        }

        break;

    case 'add-post':



        $account = _post('account');

        $type_customer = _post('customer');
        $type_supplier = _post('supplier');

        $type = $type_customer.','.$type_supplier;
        $type = trim($type,',');

        if($type == ''){
            $type = 'Customer';
        }


      //  $company = _post('company');

        $company_id = _post('cid');

        $company = '';
        $cid = 0;

        $email = _post('email');
        $username = _post('username');
        $phone = _post('phone');
        $currency = _post('currency');

        $address = _post('address');
        $city = _post('city');
        $state = _post('state');
        $zip = _post('zip');
        $country = _post('country');


        $code = _post('code');




        if($company_id != ''){

            if($company_id != '0'){
                $company_db = db_find_one('sys_companies',$company_id);

                if($company_db){
                    $company = $company_db->company_name;
                    $cid = $company_id;
                }
            }


        }


        elseif (_post('company') != ''){


            // create compnay
            $company = _post('company');
            $c = new Company;

            $c->company_name = $company;
            $c->email = $email;
            $c->phone = $phone;


            $c->address1 = $address;
            $c->city = $city;
            $c->state = $state;
            $c->zip = $zip;
            $c->country = $country;

            $c->save();

            $cid = $c->id;


        }
        else{


        }







        if($currency == ''){
            $currency = '0';
        }

        if(isset($_POST['tags']) AND ($_POST['tags']) != ''){
            $tags = $_POST['tags'];
        }
        else{
            $tags = '';
        }


        $msg = '';

//check if tag is already exisit



        if($account == ''){
            $msg .= $_L['Account Name is required'].' <br>';
        }

//check account is already exist
//        $chk = ORM::for_table('crm_accounts')->where('account',$account)->find_one();
//        if($chk){
//            $msg .= 'Account already exist <br>';
//        }

        if($email != ''){
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $msg .= $_L['Invalid Email'].' <br>';
            }
            $f = ORM::for_table('crm_accounts')->where('email',$email)->find_one();

            if($f){
                $msg .= $_L['Email already exist'].' <br>';
            }
        }


        if($phone != ''){

            $f = ORM::for_table('crm_accounts')->where('phone',$phone)->find_one();

            if($f){
                $msg .= $_L['Phone number already exist'].' <br>';
            }
        }


        $gid = _post('group');

        if($gid != ''){
            $g = db_find_one('crm_groups',$gid);
            $gname = $g['gname'];
        }
        else{
            $gid = 0;
            $gname = '';
        }

        $password = _post('password');
        $cpassword = _post('cpassword');

        $u_password = '';


        if($password != ''){



            if($password != $cpassword){
                $msg .= 'Passwords does not match'. '<br>';
            }


            $u_password = $password;
            $password = Password::_crypt($password);


        }






        if($msg == ''){

            Tags::save($tags,'Contacts');

            $data = array();

            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');

          //  $type = _post('type');


            $d = ORM::for_table('crm_accounts')->create();

            $d->account = $account;
            $d->email = $email;
            $d->phone = $phone;
            $d->address = $address;
            $d->city = $city;
            $d->zip = $zip;
            $d->state = $state;
            $d->country = $country;
            $d->tags = Arr::arr_to_str($tags);

            //others
            $d->fname = '';
            $d->lname = '';
            $d->company = $company;
            $d->jobtitle = '';
            $d->cid = $cid;
            $d->o = $user->id;
            $d->balance = '0.00';
            $d->status = 'Active';
            $d->notes = '';
            $d->password = $password;
            $d->token = '';
            $d->ts = '';
            $d->img = '';
            $d->web = '';
            $d->facebook = '';
            $d->google = '';
            $d->linkedin = '';

            // v 4.2

            $d->gname = $gname;
            $d->gid = $gid;

            // build 4550

            $d->currency = $currency;

            //

            $d->created_at = $data['created_at'];

            $d->type = $type;

            //

            $d->business_number = _post('business_number');

            $d->fax = _post('fax');

            $drive = time().Ib_Str::random_string(12);

            $d->drive = $drive;

            $d->code = $code;

            //
            $d->save();
            $cid = $d->id();

            if($type == 'Supplier')
            {
                update_option('supplier_code_current_number',current_number_would_be($code));
            }
            else {
                update_option('customer_code_current_number',current_number_would_be($code));
            }

            _log($_L['New Contact Added'].' '.$account.' [CID: '.$cid.']','Admin',$user->id);

            //now add custom fields
            $fs = ORM::for_table('crm_customfields')->where('ctype','crm')->order_by_asc('id')->find_many();
            foreach($fs as $f){
                $fvalue = _post('cf'.$f['id']);
                $fc = ORM::for_table('crm_customfieldsvalues')->create();
                $fc->fieldid = $f['id'];
                $fc->relid = $cid;
                $fc->fvalue = $fvalue;
                $fc->save();
            }
            //

            Event::trigger('contacts/add-post/_on_finished');

            // send welcome email if needed

            $send_client_signup_email = _post('send_client_signup_email');


            if(($email != '') && ($send_client_signup_email == 'Yes') && ($u_password != '')){

                $email_data = array();
                $email_data['account'] = $account;
                $email_data['company'] = $company;
                $email_data['password'] = $u_password;
                $email_data['email'] = $email;

                $send_email = Ib_Email::send_client_welcome_email($email_data);



            }



            // Create Drive if this feature is enabled


            if($config['client_drive'] == '1'){

                if (!file_exists('storage/drive/customers/'.$drive.'/storage')) {
                    mkdir('storage/drive/customers/'.$drive.'/storage',0777,true);
                }

            }




            //

            echo $cid;



        }
        else{
            echo $msg;
        }
        break;

    case 'list':

        Event::trigger('contacts/list/');

        $show_company_column = false;
        $show_group_column = false;

        if(isset($config['contact_list_show_company_column']) && $config['contact_list_show_company_column'] == 1){
            $show_company_column = true;
        }

        if(isset($config['contact_list_show_group_column']) && $config['contact_list_show_group_column'] == 1){
            $show_group_column = true;
        }

        $type = route(2);

        if($type == 'supplier'){
            $ui->assign('_application_menu', 'suppliers');
        }

        $ui->assign('companies',db_find_array('sys_companies',array('id','company_name')));

        $ui->assign('xheader',Asset::css(array('popover/popover','select/select.min','s2/css/select2.min','dt/dt','modal')));


        $ui->assign('xfooter',Asset::js(array('popover/popover','js/redirect','select/select.min','s2/js/select2.min','s2/js/i18n/'.lan(),'dt/dt','modal')));

        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');

        view('contacts_list',[
            'type' => $type,
            'show_company_column' => $show_company_column,
            'show_group_column' => $show_group_column
        ]);


        break;


    case 'edit-post':

        Event::trigger('contacts/edit-post/');


        $id = _post('fcid');
        $d = ORM::for_table('crm_accounts')->find_one($id);
        if($d){

            $old_account = $d->account;



            $account = _post('account');
           // $company = _post('company');

            $company_id = _post('company_id');

            $company = '';
            $cid = 0;

            if($company_id != '' || $company_id != '0'){
                $company_db = db_find_one('sys_companies',$company_id);

                if($company_db){
                    $company = $company_db->company_name;
                    $cid = $company_id;
                }


            }

            $email = _post('edit_email');

            if(isset($_POST['tags'])){
                $tags = $_POST['tags'];
            }
            else{
                $tags = '';
            }

            $currency = _post('currency','0');

            if($currency == ''){
                $currency = '0';
            }

            $phone = _post('phone');
            $address = _post('address');
            $city = _post('city');
            $state = _post('state');
            $zip = _post('zip');
            $country = _post('country');

            $username = _post('username');


            $msg = '';

            if($account == ''){
                $msg .= $_L['Account Name is required']. ' <br>';
            }
//            if($tags != ''){
//                $pieces = explode(',', $tags);
//                foreach($pieces as $element)
//                {
//                    $tg = ORM::for_table('sys_tags')->where('text',$element)->where('type','Contacts')->find_one();
//                    if(!$tg){
//                        $tc = ORM::for_table('sys_tags')->create();
//                        $tc->text = $element;
//                        $tc->type = 'Contacts';
//                        $tc->save();
//                    }
//                }
//            }

            // Sadia ================= From V 2.4

            Tags::save($tags,'Contacts');


            //check email already exist




//            if($address == ''){
//                $msg .= 'Address is required <br>';
//            }
//            if($city == ''){
//                $msg .= 'City is required <br>';
//            }
//            if($state == ''){
//                $msg .= 'State is required <br>';
//            }
//            if($zip == ''){
//                $msg .= 'ZIP is required <br>';
//            }
//            if($country == ''){
//                $msg .= 'Country is required <br>';
//            }
                if($email != ''){

                if($email != ($d['email'])){
                    $f = ORM::for_table('crm_accounts')->where('email',$email)->find_one();

                    if($f){
                        $msg .= $_L['Email already exist'].' <br>';
                    }
                }
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $msg .= $_L['Invalid Email'].' <br>';
                }
            }
//            if($phone != ''){
//                if(!is_numeric($phone)){
//                    $msg .= $_L['Invalid Phone'].' <br>';
//                }
//            }

            $gid = _post('group');

            if($gid != ''){
                $g = db_find_one('crm_groups',$gid);
                $gname = $g['gname'];
            }
            else{
                $gid = 0;
                $gname = '';
            }

            $password = _post('password');




            if($msg == ''){


                $d = ORM::for_table('crm_accounts')->find_one($id);
                $d->account = $account;
                $d->company = $company;
                $d->cid = $company_id;


                $d->email = $email;
                $d->tags = Arr::arr_to_str($tags);
                $d->phone = $phone;
                $d->address = $address;
                $d->city = $city;
                $d->zip = $zip;
                $d->state = $state;
                $d->country = $country;

                $d->username = $username;

                // v 4.2

                $d->gname = $gname;
                $d->gid = $gid;

                // build 4550

                $d->currency = $currency;

                //

                $d->fax = _post('fax');

                $d->code = _post('code');

                if($config['show_business_number'])
                {
                    $d->business_number = _post('business_number');
                }


                if($password != ''){

                    $d->password = Password::_crypt($password);

                }

                $d->save();


                //delete existing records
                $exf = ORM::for_table('crm_customfieldsvalues')->where('relid',$id)->delete_many();
                $fs = ORM::for_table('crm_customfields')->order_by_asc('id')->find_many();
                foreach($fs as $f){
                    $fvalue = _post('cf'.$f['id']);
                    $fc = ORM::for_table('crm_customfieldsvalues')->create();
                    $fc->fieldid = $f['id'];
                    $fc->relid = $id;
                    $fc->fvalue = $fvalue;
                    $fc->save();
                }

                // check account name changed

                if($account != $old_account){

                    // change invoice account

//                    $inv = ORM::for_table('sys_invoices')->where('account',$old_account);
//                    $inv->account = $account;
//                    $inv->save();

                    $sql = "update sys_invoices set account='$account' where account='$old_account'";

                    ORM::execute($sql);



                }

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
    case 'delete':

        Event::trigger('contacts/delete/');


        $id = $routes['2'];
        if(APP_STAGE == 'Demo'){
            r2(U.$myCtrl.'/list/', 'e', 'Sorry! Deleting Account is disabled in the demo mode.');
        }
        $d = ORM::for_table('crm_accounts')->find_one($id);
        if($d){
            $d->delete();
            r2(U.$myCtrl.'/list/', 's', $_L['account_delete_successful']);
        }

        break;


    case 'more':

        Event::trigger('contacts/more/');

        $cid = _post('cid');
        $d = ORM::for_table('crm_accounts')->find_one($cid);
        if($d){
            $ui->assign('countries',Countries::all($d['country']));
            $ui->assign('d',$d);
            view('ajax.contact-more');
        }
        else{

        }


        break;

    case 'edit-more':

        Event::trigger('contacts/edit-more/');

        $id = _post('cid');
        $d = ORM::for_table('crm_accounts')->find_one($id);
        if($d){
            $img = _post('picture');
            $facebook = _post('facebook');
            $google = _post('google');
            $linkedin = _post('linkedin');

            $msg = '';


            $img = str_replace(APP_URL.'/','',$img);



            //check email already exist





            if($msg == ''){


                $d = ORM::for_table('crm_accounts')->find_one($id);

                $d->img = $img;
                $d->facebook = $facebook;
                $d->google = $google;
                $d->linkedin = $linkedin;
                $d->save();
                echo $d->id();
            }
            else{
                echo $msg;
            }

        }
        else{
            r2(U.$myCtrl.'/list/', 'e', $_L['Account_Not_Found']);
        }


        break;


    case 'edit-notes':

        Event::trigger('contacts/edit-notes/');

        $id = _post('cid');
        $d = ORM::for_table('crm_accounts')->find_one($id);
        if($d){

            $notes = _post('notes');

            $msg = '';



            //check email already exist





            if($msg == ''){


                $d = ORM::for_table('crm_accounts')->find_one($id);


                $d->notes = $notes;
                $d->save();
                echo $d->id();
            }
            else{
                echo $msg;
            }

        }
        else{
            r2(U.$myCtrl.'/list/', 'e', $_L['Account_Not_Found']);
        }


        break;

    case 'render-address':

        Event::trigger('contacts/render-address/');

        $cid = _post('cid');
        $d = ORM::for_table('crm_accounts')->find_one($cid);
        $address = $d['address'];
        $city = $d['city'];
        $state = $d['state'];
        $zip = $d['zip'];
        $country = $d['country'];
        echo "$address
$city
$state $zip
$country
";
        break;

    case 'json-single-contact':

        $cid = _post('cid');

        $contact = Contact::find($cid);

        $address_full = '';
        $business_number = '';

        if($contact)
        {
            $address = $contact->address;
            $city = $contact->city;
            $state = $contact->state;
            $zip = $contact->zip;
            $country = $contact->country;

            $address_full = "$address
$city
$state $zip
$country
";

            $business_number = $contact->business_number;
        }

        jsonResponse([
            'address_full' => $address_full,
            'business_number' => $business_number
        ]);

        break;


    case 'send_email':

        Event::trigger('contacts/send_email/');

        $msg = '';
        $cid = _post('cid');
        $d = ORM::for_table('crm_accounts')->find_one($cid);
        $email = $d['email'];
        $toname = $d['account'];
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
            Notify_Email::_send($toname,$email,$subject,$message,$cid);
            echo $cid;

        }
        else{
            echo $msg;
        }
        break;


    case 'modal_add':

        Event::trigger('contacts/modal_add/');

        $ui->assign('countries',Countries::all($config['country'])); // may add this $config['country_code']

        view('modal_add_contact');


        break;


    case 'set_view_mode':

        Event::trigger('contacts/set_view_mode/');

//        if(isset($routes['2']) AND ($routes['2'] != 'tbl')){
//            $mode = 'card';
//        }
//        else{
//            $mode = 'tbl';
//        }

        if(isset($routes[2]) AND ($routes[2] != '')){
            $mode = $routes['2'];
        }

        else{
            $mode = 'tbl';
        }

        $available_mode = array("tbl", "card", "search");
        if (in_array($mode, $available_mode)) {

            update_option('contact_set_view_mode',$mode);

        }

        r2(U.'contacts/list/');

        break;



    case 'export_csv':


        $fileName = 'contacts_'.time().'.csv';

        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header('Content-Description: File Transfer');
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename={$fileName}");
        header("Expires: 0");
        header("Pragma: public");

        $fh = @fopen( 'php://output', 'w' );

        $headerDisplayed = false;

       // $results = ORM::for_table('crm_Accounts')->find_array();
        $results = db_find_array('crm_accounts',array('id','account','company','phone','email','address','city','state','zip','country','balance','tags'));

        foreach ( $results as $data ) {
            // Add a header row if it hasn't been added yet
            if ( !$headerDisplayed ) {
                // Use the keys from $data as the titles
                fputcsv($fh, array_keys($data));
                $headerDisplayed = true;
            }

            // Put the data into the stream
            fputcsv($fh, $data);
        }
// Close the file
        fclose($fh);



        break;



    case 'dev_demo_data':


        // this only work with dev mode
        is_dev();





        break;

    case 'import_csv':


        $ui->assign('xheader', Asset::css(array('dropzone/dropzone')));


        $ui->assign('xfooter', Asset::js(array('dropzone/dropzone','contacts/import')));



        view('contacts_import');



        break;

    case 'csv_upload':

        $uploader   =   new Uploader();
        $uploader->setDir('storage/temp/');
       // $uploader->sameName(true);
        $uploader->setExtensions(array('csv'));  //allowed extensions list//
        if($uploader->uploadFile('file')){   //txtFile is the filebrowse element name //
            $uploaded  =   $uploader->getUploadName(); //get uploaded file name, renames on upload//

            $_SESSION['uploaded'] = $uploaded;

        }else{//upload failed
            _msglog('e',$uploader->getMessage()); //get upload error message
        }


        break;

    case 'csv_uploaded':


        if(isset($_SESSION['uploaded'])){

            $uploaded = $_SESSION['uploaded'];

          // _msglog('s',$uploaded);

//            $csvData = file_get_contents('storage/temp/'.$uploaded);
//            $lines = explode(PHP_EOL, $csvData);
//            $contacts = array();
//            foreach ($lines as $line) {
//                $contacts[] = str_getcsv($line);
//            }




            $csv = new parseCSV();
            $csv->auto('storage/temp/'.$uploaded);

            $contacts = $csv->data;



            $cn = 0;

            foreach($contacts as $contact){

                $data = array();
                $data['account'] = $contact['Full Name'];
                $data['email'] = $contact['Email'];
                $data['phone'] = $contact['Phone'];
                $data['address'] = $contact['Address'];
                $data['city'] = $contact['City'];
                $data['zip'] = $contact['Zip'];
                $data['state'] = $contact['State'];
                $data['country'] = $contact['Country'];
                $data['company'] = $contact['Company'];



                $save = Contacts::add($data);

                if(is_numeric($save)){

                    $cn++;

                }


            }


            _msglog('s',$cn.' Contacts Imported');

//            ob_start();
//            var_dump($contacts);
//            $result = ob_get_clean();
//
//            _msglog('s',$result);



        }
        else{

            _msglog('e','An Error Occurred while uploading the files');

        }


        break;


    case 'groups':

        // find all groups

        $gs = ORM::for_table('crm_groups')->order_by_asc('sorder')->find_array();

        $ui->assign('gs',$gs);

        $ui->assign('xfooter',Asset::js(array('contacts/groups')));

        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');

        view('crm_groups');



        break;


    case 'add_group':

        $group_name = _post('group_name');

        if($group_name != ''){

            //check same group already exist

            $c = ORM::for_table('crm_groups')->where('gname',$group_name)->find_one();

            if($c){

                ib_die('A Group with same name already exist');

            }

            $d = ORM::for_table('crm_groups')->create();
            $d->gname = $group_name;
            $d->color = '';
            $d->discount = '';
            $d->parent = '';
            $d->pid = 0;
            $d->exempt = '';
            $d->description = '';
            $d->separateinvoices = '';
            $d->sorder = 0;

           $d->save();

            echo $d->id();



        }
        else{

            echo 'Group Name is required';

        }



        break;


    case 'find_by_group':

        $gid = route(2);

        if($gid){

            $g = ORM::for_table('crm_groups')->find_one($gid);

            if($g){

                $d = ORM::for_table('crm_accounts')->where('gid',$gid)->order_by_desc('id')->find_array();

                $ids = array();

                foreach ($d as $id_single){
                    array_push($ids,$id_single['id']);
                }



                $ui->assign('d',$d);
                $ui->assign('gid',$gid);
               // $ui->assign('ids',$ids);

                $ui->assign('xfooter',Asset::js(array('js/redirect','js/group_email')));

                $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');

                $ui->assign('xjq',' $(".cdelete").click(function (e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm("'.$_L['are_you_sure'].'", function(result) {
           if(result){
               var _url = $("#_url").val();
               window.location.href = _url + "delete/crm-user/" + id + "/'.$gid.'/";
           }
        });
    });
    
        $("#send_group_email").click(function(e){
        e.preventDefault();
        $.redirect(base_url + "handler/bulk_email/",{ type: "customers", ids: '.json_encode($ids).'});
    });
    
');

                view('contacts_find_by_group');


            }

        }




        break;

    case 'group_edit':


        $id = _post('id');
        $id = str_replace('e','',$id);
        $gname = _post('gname');

        $d = ORM::for_table('crm_groups')->find_one($id);

        if($d){

            // update all gname in contacts

            $o_gname = $d->gname;

            ORM::execute("update crm_accounts set gname='$gname' where gname='$o_gname'");

            $d->gname = $gname;

            $d->save();

            echo $d->id;



        }





        break;

    case 'group_email':

        $gid = route(2);

        if($gid){

            // find group


            $ds = ORM::for_table('crm_accounts')->where('gid',$gid)->where_not_equal('email','')->select('account')->select('email')->order_by_desc('id')->find_array();

            $ui->assign('ds',$ds);

            $ui->assign('xheader', Asset::css(array('s2/css/select2.min','sn/summernote','sn/summernote-bs3','sn/summernote-application')));




            $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),'sn/summernote.min','contacts/group_email')));
            view('contacts_group_email');

        }


        break;


    case 'group_email_post':


//        $recipients = array(
//            'person1@domain.com' => 'Person One',
//            'person2@domain.com' => 'Person Two',
//            // ..
//        );
//        foreach($recipients as $email => $name)
//        {
//            $mail->AddAddress($email, $name);
//        }



        $emails = $_POST['emails'];
        $subject = $_POST['subject'];
        $msg = $_POST['msg'];


        Ib_Email::bulk_email($emails,$subject,$msg,$user->username);

        echo 'Mail Sent!';


//       if(Ib_Email::bulk_email($emails,$subject,$msg,$user->username)){
//
//           echo 'Mail Sent!';
//
//       }
//
//        else{
//
//            echo 'An Error Occurred while sending email.';
//
//        }




        break;


    case 'companies':


        $ui->assign('_title', $_L['Companies'].' - '. $config['CompanyName']);

        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');

      //  $ui->assign('_application_menu', 'companies');

        $ui->assign('_st', $_L['Companies']);

// find all companies

        $companies = Company::orderBy('id','desc')->get()->toArray();


        

        $ui->assign('xheader',Asset::css(array('modal','s2/css/select2.min','footable/css/footable.core.min')));
        $ui->assign('xfooter',Asset::js(array('modal','tinymce/tinymce.min','js/editor','numeric','s2/js/select2.min','s2/js/i18n/'.lan(),'footable/js/footable.all.min')));

        $ui->assign('companies',$companies);


        view('companies');


        break;

    case 'modal_add_company':

        $id = route(2);




        $company = false;

        if($id != ''){

            $id = str_replace('ae','',$id);
            $id = str_replace('be','',$id);
            $id = str_replace('me','',$id);

            $company = M::factory('Models_Company')->find_one($id);

        }

        $val = array();

        if($company){
            $f_type = 'edit';
            $val['company_name'] = $company->company_name;
            $val['code'] = $company->code;
            $val['url'] = $company->url;
            $val['email'] = $company->email;
            $val['phone'] = $company->phone;
            $val['logo_url'] = $company->logo_url;
            $val['cid'] = $id;
            $val['fax'] = $company->fax;
            $val['business_number'] = $company->business_numner;

            $val['address1'] = $company->address1;
            $val['city'] = $company->city;
            $val['zip'] = $company->zip;
            $val['state'] = $company->state;
            $val['country'] = $company->country;

            $countries = Countries::all($company->country);


//            $val[''] = $company->;
        }
        else{
            $f_type = 'create';
            $val['company_name'] = '';
            $val['code'] = predict_next_serial($config,'company');
            $val['url'] = 'http://';
            $val['email'] = '';
            $val['phone'] = '';
            $val['logo_url'] = '';
            $val['cid'] = '';
            $val['fax'] = '';
            $val['business_number'] = '';
            $val['address1'] = '';
            $val['city'] = '';
            $val['zip'] = '';
            $val['state'] = '';
            $val['country'] = '';
          //  $val[''] = '';

            $countries = Countries::all($config['country']);
        }

        $ui->assign('f_type',$f_type);
        $ui->assign('val',$val);


        view('modal_add_company',[
            'countries' => $countries
        ]);

        break;

    case 'add_company_post':


        $data = ib_posted_data();

        $code = _post('code');

        $logo_path = '';


        if($data['logo_url'] != ''){
            $logo = Image::make($data['logo_url']);

            $logo_path = md5(time()).'.png';

            if($logo){
                $logo->resize(null, 40,function ($constraint) {
                    $constraint->aspectRatio();
                })->save('storage/companies/'.$logo_path);
            }
        }

        $creating = false;
        if(isset($data['f_type']) && ($data['f_type'] == 'edit')){

            $company = Company::find($data['cid']);

            if(!$company){

                i_close('Company Not Found');

            }

        }
        else{

            $company = new Company;

            $creating = true;

        }

        if($data['company_name'] == ''){
            i_close($_L['Company Name is required']);
        }

        if(($data['email'] != '') && (!filter_var($data['email'], FILTER_VALIDATE_EMAIL))){
            i_close($_L['Invalid Email']);
        }

        if($data['url'] == 'http'){
            $data['url'] = '';
        }



        $company->company_name = $data['company_name'];

        $company->code = $code;

        $company->url = $data['url'];
        $company->email = $data['email'];
        $company->phone = $data['phone'];

        if(isset($data['business_number'])){
            $company->business_number = $data['business_number'];
        }


        $company->address1 = $data['address1'];
        $company->city = $data['city'];
        $company->state = $data['state'];
        $company->zip = $data['zip'];
        $company->country = $data['country'];


        $company->logo_url = $logo_path;

        
        $company->save();

        if($creating)
        {
            update_option('company_code_current_number',current_number_would_be($code));
        }

        echo $company->id;




        break;


    case 'modal_edit_activity':

        $id = route(2);

        $id = str_replace('activity_','',$id);

        $d = ORM::for_table('sys_activity')->find_one($id);

        if($d){
            $ui->assign('d',$d);
            view('modal_edit_activity');
        }
        

        break;


    case 'edit_activity_post':

        $edit_activity_id = _post('edit_activity_id');



        $d = ORM::for_table('sys_activity')->find_one($edit_activity_id);

        if($d){
            $message_text = $_POST['message_text'];
            $icon = $_POST['edit_activity_type'];
            $icon = str_replace('<a href="#"><i class="','',$icon);
            $icon = str_replace('"></i></a>','',$icon);
            if($icon == ''){
                $icon = 'fa fa-check';
            }
            $d->icon = $icon;
            $d->msg = $message_text;
            $d->save();
            echo $d->id();
        }


        break;


    case 'orders':

       // Event::trigger('contacts/orders/');

        $cid = _post('cid');
        $d = ORM::for_table('crm_accounts')->find_one($cid);
        if($d){
            $d = ORM::for_table('sys_orders')->where('cid',$cid)->find_array();
            $ui->assign('d',$d);
            view('contacts_orders');
        }
        else{

        }


        break;


    case 'files':

        Event::trigger('contacts/files/');

        $cid = _post('cid');

        $ui->assign('cid',$cid);

        // find all available files for this client

        $file_ids = ORM::for_table('ib_doc_rel')->where('rtype','contact')->where('rid',$cid)->find_array();


        $ids = array();

        foreach ($file_ids as $f){

            $ids[] = $f['did'];

        }

        if (!empty($ids)) {

            $d = ORM::for_table('sys_documents')->where_in('id', $ids)->find_many();

        }

        else{
            $d = array();
        }


        // select all files

        $files = ORM::for_table('sys_documents')->find_array();

        $ui->assign('files',$files);





        $ui->assign('d',$d);

        view('contacts_files');


        break;


    case 'assign_file':

        $cid = _post('cid');

        $did = _post('did');

        // find the customer

        // check if exist

        $check = ORM::for_table('ib_doc_rel')->where('rtype','contact')->where('rid',$cid)->where('did',$did)->find_one();

        if($check){
            i_close('This file is already available for this contact.');
        }

        $d = ORM::for_table('ib_doc_rel')->create();
        $d->rtype = 'contact';
        $d->rid = $cid;
        $d->did = $did;
        $d->save();

        echo $cid;


        break;


    case 'remove_file':

        $cid = route(2);
        $did = route(3);

        $d = ORM::for_table('ib_doc_rel')->where('rtype','contact')->where('rid',$cid)->where('did',$did)->find_one();

        if($d){
            $d->delete();
        }


        r2(U . 'contacts/view/'.$cid.'/files/', 's', $_L['Data Updated']);


        break;


    case 'gen_auto_login':

        $id = route(2);

        $d = ORM::for_table('crm_accounts')->find_one($id);

        if($d){

            $d->autologin = Ib_Str::random_string(20).$id.time();
            $d->save();
            r2(U.'contacts/view/'.$id.'/summary/','s',$_L['Created Successfully']);

        }
        else{
            echo 'Contact Not Found.';
        }



        break;


    case 'revoke_auto_login':

        $id = route(2);

        $d = ORM::for_table('crm_accounts')->find_one($id);

        if($d){

            $d->autologin = '';
            $d->save();

            r2(U.'contacts/view/'.$id.'/summary/','s',$_L['Data Updated']);


        }
        else{
            echo 'Contact Not Found.';
        }


        break;


    case 'modal_view_company':

        $id = route(2);
        $id = str_replace('ae','',$id);


        $extra_links = '';

        $company = ORM::for_table('sys_companies')->find_one($id);

        if($company){

            $ui->assign('company',$company);

            Event::trigger('contacts/modal_view_company/');

            $ui->assign('extra_links',$extra_links);

            view('modal_view_company');

        }

        else{

            echo 'Company Not Found';

        }




        break;


    case 'company_memo':

        $cid = _post('cid');

        $d = ORM::for_table('sys_companies')->find_one($cid);

        if($d){
            echo '<textarea class="form-control" id="v_memo" name="v_memo" rows="6">'.$d->notes.'</textarea> <button type="button" id="memo_update" class="btn btn-primary btn-block mt-sm act_memo_update">'.$_L['Save'].'</button>';
        }



        break;


    case 'company_update_notes':


        $id = _post('id');

        $d = ORM::for_table('sys_companies')->find_one($id);

        if($d){
            $memo = $_POST['memo'];
            $d->notes = $memo;
            $d->save();
        }

        echo $_L['Data Updated'];


        break;

    case 'company_customers':


        $cid = _post('cid');

        $customers = ORM::for_table('crm_accounts')->select('id')->select('account')->select('email')->select('phone')->where('cid',$cid)->find_array();


        $tr_customers = '';

        foreach ($customers as $customer){
            $tr_customers .= '<tr>
         <th scope="row"><a href="'.U.'contacts/view/'.$customer['id'].'">'.$customer['id'].'</a></th>
         <td><a href="'.U.'contacts/view/'.$customer['id'].'">'.$customer['account'].'</a></td>
         <td>'.$customer['email'].'</td>
         <td>'.$customer['phone'].'</td>
      </tr>';
        }

        if($tr_customers == ''){
            $tr_customers = '<tr><td colspan="4">'.$_L['No Data Available'].'</td></tr>';
        }



        echo '
<h4>'.$_L['Customers'].'</h4>
<hr>
<a class="btn btn-primary" href="'.U.'contacts/add/0/'.$cid.'">'.$_L['Add Customer'].'</a>
<hr>
<table class="table table-bordered">
   <thead>
      <tr>
         <th>#</th>
         <th>'.$_L['Name'].'</th>
         <th>'.$_L['Email'].'</th>
         <th>'.$_L['Phone'].'</th>
      </tr>
   </thead>
   <tbody>
      '.$tr_customers.'
   </tbody>
</table>';


        break;


    case 'company_summary':

        $cid = _post('cid');

        $cid = str_replace('ae','',$cid);


        $d = ORM::for_table('sys_companies')->find_one($cid);

        if($d){

            $url = $d->url;

            if($url == 'http://'){
                $url = '';
            }

            echo '<p>

                            <strong>'.$_L['Company Name'].': </strong>  '.$d->company_name.'<br>
                            <strong>'.$_L['URL'].': </strong>  '.$url.'<br>
                            <strong>'.$_L['Email'].': </strong>  '.(($d->email != '')?'<a href="#" class="send_email">'.$d->email.'</a>':'').'<br>
                            <strong>'.$_L['Phone'].': </strong>  '.$d->phone.'<br>
                         
                            
                            



                        </p>

                        

                        <a href="#" class="md-btn md-btn-primary cedit" id="me'.$d->id.'"><i class="fa fa-pencil"></i> '.$_L['Edit'].'</a>
                        
                        
                        <hr>
                        
                        <a href="#" class="md-btn md-btn-primary li_memo"><i class="fa fa-pencil"></i> '.$_L['Memo'].'</a>
                        
                        <hr>
                        
                        '.$d->notes.'
                        
                        ';

        }





        break;


    case 'company_invoices':


        $cid = _post('cid');
        $d = ORM::for_table('sys_companies')->find_one($cid);

        if($d){

            // find all customers with that company_id

            $customers = Contacts::findByCompany($cid);


          //  var_dump($invoices);



            if($customers){

                $invoices = ORM::for_table('sys_invoices')->where_in('userid',$customers)->find_array();

                $dt = '';

                foreach($invoices as $invoice){

                    $dt .= '<tr>
            <td><a href="'.U.'invoices/view/'.$invoice['id'].'/">'.$invoice['invoicenum'].' '.(($invoice['cn'] != '')?$invoice['cn']:$invoice['id']).'</a> </td>
            <td><a href="'.U.'contacts/view/'.$invoice['userid'].'/">'.$invoice['account'].'</a></td>
            <td class="amount" data-a-dec="." data-a-sep="," data-a-pad="true" data-p-sign="p" data-a-sign="$ " data-d-group="3">'.$invoice['total'].'</td>
            <td>'.$invoice['date'].'</td>
            <td>'.$invoice['duedate'].'</td>
            <td>'.$invoice['status'].'</td>
            <td>
                <a href="'.U.'invoices/view/'.$invoice['id'].'/" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> </a>
                <a href="'.U.'invoices/edit/'.$invoice['id'].'/" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
            </td>
        </tr>';
                }

                if($dt == ''){

                    $tds = '<tr><td colspan="7">'.$_L['No Data Available'].'</td> </tr>';

                }

                else{
                    $tds = $dt;
                }


            }

            else{
                $tds = '<tr><td colspan="7">'.$_L['No Data Available'].'</td> </tr>';
            }

            echo '<table class="table table-bordered table-hover sys_table">
    <thead>
    <tr>
        <th>#</th>
        <th>'.$_L['Customer'].'</th>
        <th>'.$_L['Amount'].'</th>
        <th>'.$_L['Invoice Date'].'</th>
        <th>'.$_L['Due Date'].'</th>
        <th>'.$_L['Status'].'</th>
        <th class="text-right">'.$_L['Manage'].'</th>
    </tr>
    </thead>
    <tbody>

            
           '.$tds.' 
    

    </tbody>
</table>';


        }


        break;

    case 'company_quotes':

        $cid = _post('cid');
        $d = ORM::for_table('sys_companies')->find_one($cid);

        if($d){

            // find all customers with that company_id

            $customers = Contacts::findByCompany($cid);


            //  var_dump($invoices);



            if($customers){

                $quotes = ORM::for_table('sys_quotes')->where_in('userid',$customers)->find_array();

                $dt = '';

                foreach($quotes as $quote){

                    $dt .= '<tr>
            <td>'.$quote['id'].' </td>
            <td><a href="'.U.'contacts/view/'.$quote['userid'].'/">'.$quote['account'].'</a></td>
            <td><a href="'.U.'quotes/view/'.$quote['id'].'/">'.$quote['subject'].'</a></td>
            <td class="amount" data-a-dec="." data-a-sep="," data-a-pad="true" data-p-sign="p" data-a-sign="$ " data-d-group="3">'.$quote['total'].'</td>
            <td>'.$quote['datecreated'].'</td>
            <td>'.$quote['validuntil'].'</td>
            <td>'.$quote['stage'].'</td>
            <td>
                <a href="'.U.'quotes/view/'.$quote['id'].'/" class="btn btn-primary btn-xs"><i class="fa fa-check"></i></a>
                <a href="'.U.'quotes/edit/'.$quote['id'].'/" class="btn btn-info btn-xs"><i class="fa fa-repeat"></i></a>
            </td>
        </tr>';
                }

                if($dt == ''){

                    $tds = '<tr><td colspan="7">'.$_L['No Data Available'].'</td> </tr>';

                }

                else{
                    $tds = $dt;
                }


            }

            else{
                $tds = '<tr><td colspan="7">'.$_L['No Data Available'].'</td> </tr>';
            }

            echo '<table class="table table-bordered table-hover sys_table">
    <thead>
    <tr>
        <th>#</th>
        <th>'.$_L['Customer'].'</th>
        <th>'.$_L['Subject'].'</th>
        <th>'.$_L['Amount'].'</th>
        <th>'.$_L['Date Created'].'</th>
        <th>'.$_L['Expiry Date'].'</th>
        <th>'.$_L['Stage'].'</th>
        <th class="text-right">'.$_L['Manage'].'</th>
    </tr>
    </thead>
    <tbody>

            
           '.$tds.' 
    

    </tbody>
</table>';


        }



        break;


    case 'company_orders':


        $cid = _post('cid');
        $d = ORM::for_table('sys_companies')->find_one($cid);

        if($d){

            // find all customers with that company_id

            $customers = Contacts::findByCompany($cid);


            //  var_dump($invoices);




            if($customers){

                $orders = ORM::for_table('sys_orders')->where_in('cid',$customers)->find_array();

                $dt = '';

                foreach($orders as $order){

                    $dt .= '<tr>
           
            <td><a href="'.U.'orders/view/'.$order['id'].'">'.$order['ordernum'].'</a> </td>
            <td>'.date( $config['df'], strtotime($order['date_added'])).'</td>
            <td><a href="'.U.'contacts/view/'.$order['cid'].'">'.$order['cname'].'</a> </td>
            <td>'.$order['amount'].'</td>
            <td>'.$order['status'].'</td>
            
            
        </tr>';
                }

                if($dt == ''){

                    $tds = '<tr><td colspan="6">'.$_L['No Data Available'].'</td> </tr>';

                }

                else{
                    $tds = $dt;
                }


            }

            else{
                $tds = '<tr><td colspan="6">'.$_L['No Data Available'].'</td> </tr>';
            }

            echo '<table class="table table-bordered table-hover sys_table">
    <thead>
    <tr>
        
                        <th>'.$_L['Order'].' #</th>
                        <th>'.$_L['Date'].'</th>
                        <th>'.$_L['Customer'].'</th>
                        <th>'.$_L['Total'].'</th>
                        <th>'.$_L['Status'].'</th>
                        
    </tr>
    </thead>
    <tbody>

            
           '.$tds.' 
    

    </tbody>
</table>';


        }




        break;




    case 'company_files':




        break;


    case 'company_transactions':


        $cid = _post('cid');
        $d = ORM::for_table('sys_companies')->find_one($cid);

        if($d){

            // find all customers with that company_id

            $customers = Contacts::findByCompany($cid);


            //  var_dump($invoices);



            if($customers){

                $transactions_payer = ORM::for_table('sys_transactions')->where_in('payerid',$customers)->find_array();
                $transactions_payee = ORM::for_table('sys_transactions')->where_in('payeeid',$customers)->find_array();

                $transactions = array_merge($transactions_payer,$transactions_payee);

                $dt = '';

                foreach($transactions as $transaction){

                    $dt .= '<tr>
            <td>'.$transaction['id'].' </td>
            <td>'.$transaction['date'].'</td>
            <td>'.$transaction['account'].'</td>
            <td>'.$transaction['type'].'</td>
          
            <td class="amount" data-a-dec="." data-a-sep="," data-a-pad="true" data-p-sign="p" data-a-sign="$ " data-d-group="3">'.$transaction['amount'].'</td>
            <td>'.$transaction['description'].'</td>
            <td>'.$transaction['dr'].'</td>
            <td>'.$transaction['cr'].'</td>
            <td>'.$transaction['bal'].'</td>
            <td>
                <a href="'.U.'transactions/manage/'.$transaction['id'].'/" class="btn btn-primary btn-xs"><i class="fa fa-check"></i></a>
                
            </td>
        </tr>';
                }

                if($dt == ''){

                    $tds = '<tr><td colspan="7">'.$_L['No Data Available'].'</td> </tr>';

                }

                else{
                    $tds = $dt;
                }


            }

            else{
                $tds = '<tr><td colspan="10">'.$_L['No Data Available'].'</td> </tr>';
            }

            echo '<table class="table table-bordered table-hover sys_table">
    <thead>
    <tr>
        <th>#</th>
        <th>'.$_L['Date'].'</th>
        <th>'.$_L['Account'].'</th>
        <th>'.$_L['Type'].'</th>
        <th>'.$_L['Amount'].'</th>
        <th>'.$_L['Description'].'</th>
        <th>'.$_L['Dr'].'</th>
        <th>'.$_L['Cr'].'</th>
        <th>'.$_L['Balance'].'</th>
        <th class="text-right">'.$_L['Manage'].'</th>
    </tr>
    </thead>
    <tbody>

            
           '.$tds.' 
    

    </tbody>
</table>';


        }


        break;



    case 'json_list':



        $show_company_column = false;
        $show_group_column = false;

        if(isset($config['contact_list_show_company_column']) && $config['contact_list_show_company_column'] == 1){
            $show_company_column = true;
        }

        if(isset($config['contact_list_show_group_column']) && $config['contact_list_show_group_column'] == 1){
            $show_group_column = true;
        }


        $columns = array();

        $columns[] = '';
        $columns[] = 'id';
        $columns[] = 'img';
        $columns[] = 'account';

        if($show_company_column)
        {
            $columns[] = 'company';
        }

        if($show_group_column)
        {
            $columns[] = 'gname';
        }

        $columns[] = 'email';
        $columns[] = 'phone';
        $columns[] = '';


        $order_by = $_POST['order'];



        $o_c_id = $order_by[0]['column'];
        $o_type = $order_by[0]['dir'];

        $a_order_by = $columns[$o_c_id];


        $d = ORM::for_table('crm_accounts');

        $d->select('id');
        $d->select('account');
        $d->select('code');
        $d->select('img');

        if($show_company_column)
        {
            $d->select('company');
        }


        if($show_group_column)
        {
            $d->select('gname');
        }

        $d->select('email');
        $d->select('phone');



        $account = _post('account');

        if($account != ''){

            $d->where_like('account',"%$account%");

        }


        $email = _post('email');

        if($email != ''){

            $d->where_like('email',"%$email%");

        }


        $company = _post('company');

        if($company != ''){

            $d->where_like('company',"%$company%");

        }

        $group = _post('group');

        if($group != ''){

            $d->where_like('gname',"%$group%");

        }

        $phone = _post('phone');

        if($phone != ''){

            $d->where_like('phone',"%$phone%");

        }

        $type = route(2);

        if($type == 'supplier'){
            $d->where_like('type',"%Supplier%");
        }
        else{
            $d->where_like('type',"%Customer%");
        }


        // check self data only

        if(!has_access($user->roleid,'customers','all_data')){


            $d->where('o',$user->id);


        }

        //



      //  $x = $d->find_array();



        $iTotalRecords =  $d->count();



        $iDisplayLength = intval($_REQUEST['length']);
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = intval($_REQUEST['start']);
        $sEcho = intval($_REQUEST['draw']);

        $records = array();
        $records["data"] = array();

        $end = $iDisplayStart + $iDisplayLength;
        $end = $end > $iTotalRecords ? $iTotalRecords : $end;


        if($o_type == 'desc'){
            $d->order_by_desc($a_order_by);
        }
        else{
            $d->order_by_asc($a_order_by);
        }





        $d->limit($iDisplayLength);
        $d->offset($iDisplayStart);
        $x = $d->find_array();



        $i = $iDisplayStart;

        $colors = Colors::colorNames();



        foreach ($x as $xs){

            $full_name = $xs['account'];

            if ($xs['img'] ==''){
                $css_bg = $colors[array_rand($colors)];



                $full_name_e = explode(' ',$full_name);

                $fn_count = count($full_name_e);

                if($fn_count == 0){
                    $first_name = '';
                }
                else{
                    $first_name = $full_name_e[0];
                }



                if($first_name == ''){
                    $first_name_letter = 'N';
                }
                else{
                    $first_name_letter = $first_name[0];
                }

                if(isset($full_name_e[1])){
                    $last_name = $full_name_e[1];
                    if(isset($last_name[0])){
                        $last_name_letter = $last_name[0];
                    }
                    else{
                        $last_name_letter = '';
                    }

                }
                else{
                    $last_name_letter = '';
                }

                $two_l = strtoupper(htmlentities($first_name_letter.$last_name_letter));

                if($two_l == ''){
                    $two_l = 'NA';
                }

                $img = '<span class="ib_avatar ib_bg_'.$css_bg.'">'.$two_l.'</span>';
            }
            else{
                $img = '<img src="'.APP_URL.'/'.$xs['img'].'" class="img-thumbnail img-responsive" style="max-height: 32px;" alt="'.$full_name.'">';
            }


            if($xs['phone'] == ''){
                $phone = $_L['n_a'];
            }
            else{
                $phone = $xs['phone'];
            }

            if($xs['code'] != '')
            {
                $contact_details = htmlentities($xs['account']).' <br> '.$xs['code'];

            }
            else{
                $contact_details = htmlentities($xs['account']);
            }

            if($show_group_column && $show_company_column)
            {
                $records["data"][] = [
                    0 => '<input id="row_'.$xs['id'].'" type="checkbox" value="" name=""  class="i-checks"/>',
                    1 => $xs['id'],
                    2 => '<a href="'.U.'contacts/view/'.$xs['id'].'">'.$img.'</a>',
                    3 => $contact_details,
                    4 => htmlentities($xs['company']),
                    5 => htmlentities($xs['gname']),
                    6 => htmlentities($xs['email']),
                    7 => htmlentities($xs['phone']),
                    8 =>  '
                <a href="'.U.'contacts/view/'.$xs['id'].'" class="btn btn-primary btn-xs cview" id="vid'.$xs['id'].'"><i class="fa fa-search"></i> </a>
                <a href="'.U.'contacts/view/'.$xs['id'].'/edit/" class="btn btn-warning btn-xs cedit" id="eid'.$xs['id'].'"><i class="glyphicon glyphicon-pencil"></i> </a>
                <a href="#" class="btn btn-danger btn-xs cdelete" id="uid'.$xs['id'].'"><i class="fa fa-trash"></i> </a>
                ',

                    9 => $xs['id'],

                    "DT_RowId" => 'dtr_'.$xs['id']
                ];
            }
            elseif ($show_company_column == false && $show_group_column == true)
            {
                $records["data"][] = [
                    0 => '<input id="row_'.$xs['id'].'" type="checkbox" value="" name=""  class="i-checks"/>',
                    1 => $xs['id'],
                    2 => '<a href="'.U.'contacts/view/'.$xs['id'].'">'.$img.'</a>',
                    3 => $contact_details,
                    4 => htmlentities($xs['gname']),
                    5 => htmlentities($xs['email']),
                    6 => htmlentities($xs['phone']),
                    7 =>  '
                <a href="'.U.'contacts/view/'.$xs['id'].'" class="btn btn-primary btn-xs cview" id="vid'.$xs['id'].'"><i class="fa fa-search"></i> </a>
                <a href="'.U.'contacts/view/'.$xs['id'].'/edit/" class="btn btn-warning btn-xs cedit" id="eid'.$xs['id'].'"><i class="glyphicon glyphicon-pencil"></i> </a>
                <a href="#" class="btn btn-danger btn-xs cdelete" id="uid'.$xs['id'].'"><i class="fa fa-trash"></i> </a>
                ',

                    9 => $xs['id'],

                    "DT_RowId" => 'dtr_'.$xs['id']
                ];
            }
            elseif ($show_company_column == true && $show_group_column == false)
            {
                $records["data"][] = [
                    0 => '<input id="row_'.$xs['id'].'" type="checkbox" value="" name=""  class="i-checks"/>',
                    1 => $xs['id'],
                    2 => '<a href="'.U.'contacts/view/'.$xs['id'].'">'.$img.'</a>',
                    3 => $contact_details,
                    4 => htmlentities($xs['company']),
                    5 => htmlentities($xs['email']),
                    6 => htmlentities($xs['phone']),
                    7 =>  '
                <a href="'.U.'contacts/view/'.$xs['id'].'" class="btn btn-primary btn-xs cview" id="vid'.$xs['id'].'"><i class="fa fa-search"></i> </a>
                <a href="'.U.'contacts/view/'.$xs['id'].'/edit/" class="btn btn-warning btn-xs cedit" id="eid'.$xs['id'].'"><i class="glyphicon glyphicon-pencil"></i> </a>
                <a href="#" class="btn btn-danger btn-xs cdelete" id="uid'.$xs['id'].'"><i class="fa fa-trash"></i> </a>
                ',

                    9 => $xs['id'],

                    "DT_RowId" => 'dtr_'.$xs['id']
                ];
            }
            else{
                $records["data"][] = [
                    0 => '<input id="row_'.$xs['id'].'" type="checkbox" value="" name=""  class="i-checks"/>',
                    1 => $xs['id'],
                    2 => '<a href="'.U.'contacts/view/'.$xs['id'].'">'.$img.'</a>',
                    3 => $contact_details,
                    4 => htmlentities($xs['email']),
                    5 => htmlentities($xs['phone']),
                    6 =>  '
                <a href="'.U.'contacts/view/'.$xs['id'].'" class="btn btn-primary btn-xs cview" id="vid'.$xs['id'].'"><i class="fa fa-search"></i> </a>
                <a href="'.U.'contacts/view/'.$xs['id'].'/edit/" class="btn btn-warning btn-xs cedit" id="eid'.$xs['id'].'"><i class="glyphicon glyphicon-pencil"></i> </a>
                <a href="#" class="btn btn-danger btn-xs cdelete" id="uid'.$xs['id'].'"><i class="fa fa-trash"></i> </a>
                ',

                    9 => $xs['id'],

                    "DT_RowId" => 'dtr_'.$xs['id']
                ];
            }








        }


        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;





       // var_dump($records);

     //   exit;

        api_response($records);





        break;

    case 'set_group':


        $ids_raw = $_POST['ids'];
        $gid = _post('gid');


        $g = ORM::for_table('crm_groups')->find_one($gid);

        if($g){

            $gid = $g->id;
            $gname = $g->gname;

        }

        else{
            $gid = '0';
            $gname = '';
        }


        foreach ($ids_raw as $id_single){
            $id = str_replace('row_','',$id_single);
            $c = ORM::for_table('crm_accounts')->select('id')->find_one($id);
            if($c){
                $c->gid = $gid;
                $c->gname = $gname;
                $c->save();
            }

        }


        echo $_L['Data Updated'];


        break;


    case 'add_fund':


        $amount = _post('amount');
        $cid = _post('cid');

        $customer = ORM::for_table('crm_accounts')->find_one($cid);

        if($customer){

//            if(v::numeric()->between(0, 999999999999)->validate($amount)){
//
//                $prev_balance = $customer->balance;
//
//                $new_balance = $prev_balance+$amount;
//
//                $customer->balance = $new_balance;
//                $customer->save();
//
//                _log('Amount '.$amount.' Added by Admin ['.$user->fullname.']'.' Customer - '.$customer->account.' Previous Balance: '.$prev_balance.' New Balance: '.$new_balance,'Client',$customer->id);
//
//            }



            if(is_numeric($amount)){
                $prev_balance = $customer->balance;

                $new_balance = $prev_balance+$amount;

                $customer->balance = $new_balance;
                $customer->save();

                _log($_L['Amount'].' '.$amount.' Added by Admin ['.$user->fullname.']'.' Customer - '.$customer->account.' Previous Balance: '.$prev_balance.' New Balance: '.$new_balance,'Client',$customer->id);

                r2(U.'contacts/view/'.$cid.'/summary/','s',$_L['added_successful']);

            }

            else{
                r2(U.'contacts/view/'.$cid.'/summary/','e',$_L['amount_error']);
            }





        }




        break;



    case 'return_fund':

        $amount = _post('amount');
        $cid = _post('cid');

        $customer = ORM::for_table('crm_accounts')->find_one($cid);

        if($customer){

            if(is_numeric($amount)){

                $prev_balance = $customer->balance;

                $new_balance = $prev_balance-$amount;

                $customer->balance = $new_balance;
                $customer->save();

                _log('Amount '.$amount.' Balance returned by Admin ['.$user->fullname.']'.' Customer - '.$customer->account.' Previous Balance: '.$prev_balance.' New Balance: '.$new_balance,'Client',$customer->id);

                r2(U.'contacts/view/'.$cid.'/summary/','s',$_L['added_successful']);

            }

            else{
                r2(U.'contacts/view/'.$cid.'/summary/','e',$_L['amount_error']);
            }



        }




        break;


    case 'log':

        $cid = _post('cid');

        $logs = ORM::for_table('sys_logs')->where('type','Client')->where('userid',$cid)->limit(1000)->order_by_desc('id')->find_array();




        $tr = '';

        foreach ($logs as $log){
            $tr .= '<tr>
            <td class="mnt"><span class="mmnt">'.strtotime($log['date']).'</span></td>
            <td>'.$log['ip'].'</td>
            <td>'.$log['description'].'</td>
           
        </tr>';
        }

        echo '<table class="table table-bordered table-hover sys_table">
    <thead>
    <tr>
        <th width="150px">'.$_L['Time'].'</th>
        <th width="150px">'.$_L['IP'].'</th>
        <th>'.$_L['Description'].'</th>
        
    </tr>
    </thead>
    <tbody>

        '.$tr.'
            
    

    </tbody>
</table>';


        break;


    case 'options':

        $ib_options = array();
        $ib_options['add_fund'] = false;

        echo json_encode($ib_options);





        break;


    case 'get_company_details':



        $cid = route(2);

        $company = Company::find($cid);

        if($company){
            api_response($company);
        }
        else{
            api_response([
                'message' => 'Company Not Found',
                'success' => false
            ]);
        }



        break;


    case 'client-password-manager':

        $cid = _post('cid');


        $passwords = PasswordManager::where('client_id',$cid)->get();

        view('profile_client_password_manager',[
            'passwords' => $passwords
        ]);


        break;


    case 'credit_card_info':

        $cid = _post('cid');

        $contact = Contact::find($cid);

        //

        $credit_card = CreditCard::where('contact_id',$cid)->first();

        view('profile_client_credit_card_info',[
            'cid' => $cid,
            'contact' => $contact,
            'credit_card' => $credit_card
        ]);


        break;


    case 'save_credit_card':


        $cid = _post('contact_id');



        $contact = Contact::find($cid);

        if($contact){

            $credit_card = CreditCard::where('contact_id',$cid)->first();

            if(!$credit_card){
                $credit_card = new CreditCard;
            }

            $credit_card->contact_id = $cid;
            $credit_card->card_type = '';
            $credit_card->card_holder_name = _post('card-holder-name');
            $credit_card->card_number = _post('card-number');
            $credit_card->expiry_month = _post('expiry-month');
            $credit_card->expiry_year = _post('expiry-year');
            $credit_card->cvv = _post('cvv');

            $credit_card->save();


            echo $contact->id;

        }


        break;



    case 'drive':


        $contacts = Contact::select('id','account')->get()->groupBy('id')->toArray();


        $ui->assign('xheader',Asset::css(array('footable/css/footable.core.min')));
        $ui->assign('xfooter',Asset::js(array('footable/js/footable.all.min')));

        $files = Document::where('cid','!=' , 0)
            ->orderBy('id','desc')
            ->get();

        view('contacts_drive',[
            'files' => $files,
            'contacts' => $contacts
        ]);



        break;



    default:
        echo 'action not defined';
}