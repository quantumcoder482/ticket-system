<?php
/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/
_auth();
$ui->assign('_title', $_L['Settings'].'- '. $config['CompanyName']);
$ui->assign('_st', $_L['Settings']);
$ui->assign('_application_menu', 'settings');

$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);
$ui->assign('_user', $user);



switch ($action) {
    case 'expense-categories':
        $ui->assign('content_inner',inner_contents($config['c_cache']));
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e',$_L['You do not have permission']);
        }

        $d = ORM::for_table('sys_cats')->where('type','Expense')->order_by_asc('sorder')->find_many();
        $ui->assign('d',$d);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/css/liststyle.css"/>
');
        $ui->assign('xjq', Reorder::js('sys_cats'));
        view('expense-categories');


        break;

    case 'expense-categories-post':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e',$_L['You do not have permission']);
        }
        $name = _post('name');
        if($name == ''){
            r2(U."settings/expense-categories",'e',$_L['name_error']);
        }
        //check categories already exist
        $c = ORM::for_table('sys_cats')->where('name',$name)->where('type','Expense')->find_one();
        if($c){
            r2(U."settings/expense-categories",'e',$_L['name_exist_error']);
        }
        if(APP_STAGE == 'Demo'){
            r2(U . 'settings/expense-categories', 'e', 'Sorry! This option is disabled in the demo mode.');
        }
        $d = ORM::for_table('sys_cats')->create();

        $d->name = $name;
        $d->type = 'Expense';
        $d->save();
        r2(U."settings/expense-categories",'s',$_L['added_successful']);
        break;

    case 'income-categories':
        $ui->assign('content_inner',inner_contents($config['c_cache']));

        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e',$_L['You do not have permission']);
        }

        $d = ORM::for_table('sys_cats')->where('type','Income')->order_by_asc('sorder')->find_many();
        $ui->assign('d',$d);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/css/liststyle.css"/>
');

        $ui->assign('xjq', Reorder::js('sys_cats'));
        view('income-categories');


        break;

    case 'income-categories-post':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e',$_L['You do not have permission']);
        }
        $name = _post('name');
        if($name == ''){
            r2(U."settings/income-categories",'e',$_L['name_error']);
        }
        $c = ORM::for_table('sys_cats')->where('name',$name)->where('type','Income')->find_one();
        if($c){
            r2(U."settings/income-categories",'e',$_L['name_exist_error']);
        }
        if(APP_STAGE == 'Demo'){
            r2(U . 'settings/income-categories', 'e', 'Sorry! This option is disabled in the demo mode.');
        }
        $d = ORM::for_table('sys_cats')->create();

        $d->name = $name;
        $d->type = 'Income';
        $d->save();
        r2(U."settings/income-categories",'s',$_L['added_successful']);
        break;

    case 'categories-manage':
        $ui->assign('content_inner',inner_contents($config['c_cache']));
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e',$_L['You do not have permission']);
        }

        $id = $routes[2];
        $d = ORM::for_table('sys_cats')->find_one($id);
        if($d){
            $ui->assign('c',$d);
            view('categories-edit');
        }






        break;

    case 'categories-edit-post':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e',$_L['You do not have permission']);
        }
        $id = _post('id');
        $d = ORM::for_table('sys_cats')->find_one($id);
        if(APP_STAGE == 'Demo'){
            r2(U . 'settings/expense-categories', 'e', 'Sorry! This option is disabled in the demo mode.');
        }
        if($d){
            $otype = $d['type'];
            $rd = strtolower($otype);
            $name = _post('name');
            $c = ORM::for_table('sys_cats')->where('name',$name)->where('type',$otype)->find_one();
            if($c){
                r2(U."settings/$rd-categories",'e',$_L['name_exist_error']);
            }
            $oname = $d['name'];
            $type = $d['type'];
            if($name == ''){
                r2(U."settings/categories-manage/$id",'e',$_L['name_error']);
            }
            else{
                $d->name = $name;
                $d->save();
                //update payee in transactions
                ORM::for_table('sys_transactions')->raw_execute("update sys_transactions set category='$name' where (category='$oname' AND type='$type')");
                r2(U."settings/categories-manage/$id",'s',$_L['edit_successful']);
            }
        }
        break;


    case 'categories-delete':

        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e',$_L['You do not have permission']);
        }
        $id = $routes[2];
        $d = ORM::for_table('sys_cats')->find_one($id);
        if($d){
            if(APP_STAGE == 'Demo'){
                r2(U . 'settings/expense-categories', 'e', 'Sorry! This option is disabled in the demo mode.');
            }
            //find all transaction in this category
            $name = $d['name'];
            $type = $d['type'];

            ORM::for_table('sys_transactions')->raw_query("update sys_transactions set category=:cat where category='$name' AND type='$type'", array('cat' => 'Uncategorized'));
            $d->delete();
            if($type == 'Income'){
                r2(U."settings/income-categories",'s',$_L['delete_successful']);
            }
            else{
                r2(U."settings/expense-categories",'s',$_L['delete_successful']);
            }


        }
        break;

    case 'payee':
        $ui->assign('content_inner',inner_contents($config['c_cache']));
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e',$_L['You do not have permission']);
        }

        $d = ORM::for_table('sys_payee')->order_by_asc('sorder')->find_many();
        $ui->assign('d',$d);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/css/liststyle.css"/>
');
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/js/jquery-ui-1.10.2.custom.min.js"></script>
');
        $ui->assign('xjq', Reorder::js('sys_payee'));
        view('payee');


        break;

    case 'payee-manage':
        $ui->assign('content_inner',inner_contents($config['c_cache']));
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e',$_L['You do not have permission']);
        }

        $id = $routes[2];
        $d = ORM::for_table('sys_payee')->find_one($id);
        if($d){
            $ui->assign('c',$d);
            view('payee-manage');
        }


        break;

    case 'payee-edit-post':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e',$_L['You do not have permission']);
        }
        if(APP_STAGE == 'Demo'){
            r2(U . 'settings/payee', 'e', 'Sorry! This option is disabled in the demo mode.');
        }
        $id = _post('id');
        $d = ORM::for_table('sys_payee')->find_one($id);
        if($d){
            $name = _post('name');
            $c = ORM::for_table('sys_payee')->where('name',$name)->find_one();
            if($c){
                r2(U."settings/payee",'e',$_L['name_exist_error']);
            }

            $oname = $d['name'];

            if($name == ''){
                r2(U."settings/payee-manage/$id",'e',$_L['name_error']);
            }
            else{
                $d->name = $name;
                $d->save();
                //update payee in transactions
                ORM::for_table('sys_transactions')->raw_query("update sys_transactions set payee=:payee where payee='$oname'", array('payee' => $name));
                r2(U."settings/payee-manage/$id",'s',$_L['edit_successful']);
            }
        }

        break;

    case 'payee-post':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e',$_L['You do not have permission']);
        }
        $name = _post('name');
        if(APP_STAGE == 'Demo'){
            r2(U . 'settings/payee', 'e', 'Sorry! This option is disabled in the demo mode.');
        }
        if($name == ''){
            r2(U."settings/payee",'e',$_L['name_error']);
        }

        $c = ORM::for_table('sys_payee')->where('name',$name)->find_one();
        if($c){
            r2(U."settings/payee",'e',$_L['name_exist_error']);
        }

        $d = ORM::for_table('sys_payee')->create();

        $d->name = $name;

        $d->save();
        r2(U."settings/payee",'s',$_L['added_successful']);
        break;


    case 'payee-delete':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e',$_L['You do not have permission']);
        }
        if(APP_STAGE == 'Demo'){
            r2(U . 'settings/payee', 'e', 'Sorry! This option is disabled in the demo mode.');
        }
        $id = $routes[2];
        $d = ORM::for_table('sys_payee')->find_one($id);
        if($d){


            $d->delete();


            r2(U."settings/payee",'s',$_L['delete_successful']);
        }
        break;


    case 'payer':
        $ui->assign('content_inner',inner_contents($config['c_cache']));

        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e',$_L['You do not have permission']);
        }
        $d = ORM::for_table('sys_payers')->order_by_asc('sorder')->find_many();
        $ui->assign('d',$d);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/css/liststyle.css"/>
');
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/js/jquery-ui-1.10.2.custom.min.js"></script>
');
        $ui->assign('xjq', Reorder::js('sys_payers'));
        view('payer');


        break;

    case 'payer-manage':
        $ui->assign('content_inner',inner_contents($config['c_cache']));
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e',$_L['You do not have permission']);
        }

        $id = $routes[2];
        $d = ORM::for_table('sys_payers')->find_one($id);
        if($d){
            $ui->assign('c',$d);
            view('payer-manage');
        }


        break;

    case 'payer-edit-post':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e',$_L['You do not have permission']);
        }
        if(APP_STAGE == 'Demo'){
            r2(U . 'settings/payer', 'e', 'Sorry! This option is disabled in the demo mode.');
        }
        $id = _post('id');
        $d = ORM::for_table('sys_payers')->find_one($id);
        if($d){
            $name = _post('name');
            $c = ORM::for_table('sys_payers')->where('name',$name)->find_one();
            if($c){
                r2(U."settings/payer",'e',$_L['name_exist_error']);
            }

            $oname = $d['name'];

            if($name == ''){
                r2(U."settings/payer-manage/$id",'e',$_L['name_error']);
            }
            else{
                $d->name = $name;
                $d->save();

                ORM::for_table('sys_transactions')->raw_query("update sys_transactions set payer=:payer where payer='$oname'", array('payer' => $name));
                r2(U."settings/payer-manage/$id",'s',$_L['edit_successful']);
            }
        }

        break;

    case 'payer-post':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e',$_L['You do not have permission']);
        }
        if(APP_STAGE == 'Demo'){
            r2(U . 'settings/payer', 'e', 'Sorry! This option is disabled in the demo mode.');
        }
        $name = _post('name');
        if($name == ''){
            r2(U."settings/payer",'e',$_L['name_error']);
        }

        $c = ORM::for_table('sys_payers')->where('name',$name)->find_one();
        if($c){
            r2(U."settings/payer",'e',$_L['name_exist_error']);
        }

        $d = ORM::for_table('sys_payers')->create();

        $d->name = $name;

        $d->save();
        r2(U."settings/payer",'s',$_L['added_successful']);
        break;

    case 'payer-delete':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e',$_L['You do not have permission']);
        }
        if(APP_STAGE == 'Demo'){
            r2(U . 'settings/payer', 'e', 'Sorry! This option is disabled in the demo mode.');
        }
        $id = $routes[2];
        $d = ORM::for_table('sys_payers')->find_one($id);
        if($d){


            $d->delete();


            r2(U."settings/payer",'s',$_L['delete_successful']);
        }
        break;
    case 'pmethods':
        $ui->assign('content_inner',inner_contents($config['c_cache']));
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e',$_L['You do not have permission']);
        }

        $d = ORM::for_table('sys_pmethods')->order_by_asc('sorder')->find_many();
        $ui->assign('d',$d);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/css/liststyle.css"/>
');
//        $ui->assign('xfooter', '
//<script type="text/javascript" src="' . $_theme . '/js/jquery-ui-1.10.4.min.js"></script>
//');
        $ui->assign('xjq', Reorder::js('sys_pmethods'));
        view('pmethods');


        break;

    case 'pmethods-manage':
        $ui->assign('content_inner',inner_contents($config['c_cache']));
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e',$_L['You do not have permission']);
        }

        $id = $routes[2];
        $d = ORM::for_table('sys_pmethods')->find_one($id);
        if($d){
            $ui->assign('c',$d);
            view('pmethods-manage');
        }


        break;

    case 'pmethods-edit-post':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e',$_L['You do not have permission']);
        }
        if(APP_STAGE == 'Demo'){
            r2(U . 'settings/pmethods', 'e', 'Sorry! This option is disabled in the demo mode.');
        }
        $id = _post('id');
        $d = ORM::for_table('sys_pmethods')->find_one($id);
        if($d){
            $name = _post('name');
            $c = ORM::for_table('sys_pmethods')->where('name',$name)->find_one();
            if($c){
                r2(U."settings/pmethods",'e',$_L['name_exist_error']);
            }

            $oname = $d['name'];

            if($name == ''){
                r2(U."settings/pmethods-manage/$id",'e',$_L['name_error']);
            }
            else{
                $d->name = $name;
                $d->save();

                ORM::for_table('sys_transactions')->raw_query("update sys_transactions set pmethod=:pmethod where pmethod='$oname'", array('pmethod' => $name));
                r2(U."settings/pmethods-manage/$id",'s',$_L['edit_successful']);
            }
        }

        break;

    case 'pmethods-post':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e',$_L['You do not have permission']);
        }
        if(APP_STAGE == 'Demo'){
            r2(U . 'settings/pmethods', 'e', 'Sorry! This option is disabled in the demo mode.');
        }
        $name = _post('name');
        if($name == ''){
            r2(U."settings/pmethods",'e',$_L['name_error']);
        }

        $c = ORM::for_table('sys_pmethods')->where('name',$name)->find_one();
        if($c){
            r2(U."settings/pmethods",'e',$_L['name_exist_error']);
        }

        $d = ORM::for_table('sys_pmethods')->create();

        $d->name = $name;

        $d->save();
        r2(U."settings/pmethods",'s',$_L['added_successful']);
        break;


    case 'pmethods-delete':
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e',$_L['You do not have permission']);
        }
        if(APP_STAGE == 'Demo'){
            r2(U . 'settings/pmethods', 'e', 'Sorry! This option is disabled in the demo mode.');
        }
        $id = $routes[2];
        $d = ORM::for_table('sys_pmethods')->find_one($id);
        if($d){


            $d->delete();


            r2(U."settings/pmethods",'s',$_L['delete_successful']);
        }
        break;


    case 'app':
        $ui->assign('content_inner',inner_contents($config['c_cache']));
        //find current invoice increment
        $tblsts = ORM::for_table('sys_invoices')->raw_query("show table status like 'sys_invoices'")->find_one();
        $ai = $tblsts['Auto_increment'];
        $ui->assign('ai',$ai);


        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e',$_L['You do not have permission']);
        }
        $timezonelist = Timezone::timezoneList();
        $ui->assign('tlist',$timezonelist);


        $version_number = '1.0.0';

        $v_arr = str_split($file_build);
        $version_number = implode('.',$v_arr);

        //find email settings

        $e = ORM::for_table('sys_emailconfig')->find_one('1');
        $ui->assign('e',$e);

        // find all animations



        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','redactor/redactor')));
        $ui->assign('xfooter', Asset::js(array('redactor/redactor.min','s2/js/select2.min','s2/js/i18n/'.lan(),'settings/general')));


        $ui->assign('xjq', '

$(\'#invoice_terms\').redactor(
{
minHeight: 150 // pixels
}
);


 ');

      //  $update_check = updateCheck($config['purchase_key']);

        view('app-settings',[
            'update_check' => '',
            'file_build' => $file_build,
            'version_number' => $version_number
        ]);

        break;

    case 'features':


        $ui->assign('content_inner',inner_contents($config['c_cache']));



        $status_purchase_invoice = Status::where('type','Purchase Invoice')->get();





        view('feature-settings',[
            'status_purchase_invoice' => $status_purchase_invoice
        ]);


        break;

    case 'users':
        $ui->assign('content_inner',inner_contents($config['c_cache']));
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e',$_L['You do not have permission']);
        }
//        $ui->assign('xfooter', '
//<script type="text/javascript" src="ui/lib/c/users.js"></script>
//');
        $d = ORM::for_table('sys_users')->find_many();
        $ui->assign('d',$d);
        view('users');

        break;

    case 'users-add':

        $ui->assign('xfooter',Asset::js('settings/staff'));
        $ui->assign('content_inner',inner_contents($config['c_cache']));
//        if($user['user_type'] != 'Admin'){
//            r2(U."dashboard",'e',$_L['You do not have permission']);
//        }


	    $departments = TicketDepartment::all();

        $roles = M::factory('Models_Role')->find_array();
        $ui->assign('roles',$roles);


        view('users-add',[
        	'departments' => $departments,
	        'employee' => false
        ]);

        break;

    case 'users-edit':



      //  $ui->assign('content_inner',inner_contents($config['c_cache']));

        $ui->assign('_application_menu', 'dashboard');

        $ui->assign('languages',IBilling_I18n::get_languages());



        $id  = $routes['2'];
        $d = ORM::for_table('sys_users')->find_one($id);
        if($d){

            if($user->id != $d->id){

                if(!has_access($user->roleid,'settings','edit')){

                    permissionDenied();

                }

            }

            $ui->assign('xheader', Asset::css(array('imgcrop/assets/css/croppic')));


            $ui->assign('xfooter', Asset::js(array('imgcrop/croppic')));

            $ui->assign('d',$d);

            // find user language

            if($d->language == ''){
                $selected_language = $config['language'];
            }
            else{
                $selected_language = $d->language;
            }

            $roles = M::factory('Models_Role')->find_array();
            $ui->assign('roles',$roles);

            view('users-edit',[
                'selected_language' => $selected_language
            ]);

        }
        else{
            r2(U . 'settings/users', 'e', $_L['Account_Not_Found']);
        }

        break;

    case 'users-delete':


        $id  = $routes['2'];
        //prevent self delete
        if(($user->id) == $id){
            r2(U . 'settings/users', 'e', 'Sorry You can\'t delete yourself');
        }
        $d = ORM::for_table('sys_users')->find_one($id);
        if($d){

            if($user->id != $d->id){

                if(!has_access($user->roleid,'settings','delete')){

                    permissionDenied();

                }

            }

            $d->delete();
            r2(U . 'settings/users', 's', 'User deleted Successfully');
        }
        else{
            r2(U . 'settings/users', 'e', $_L['Account_Not_Found']);
        }

        break;

    case 'users-post':



        $username = _post('username');
        $fullname = _post('fullname');
        $password = _post('password');
        $cpassword = _post('cpassword');
        $user_type = _post('user_type');

        if(!has_access($user->roleid,'settings','create')){

            permissionDenied();

        }


        $r = M::factory('Models_Role')->find_one($user_type);

        if($r){
            $role = $r->rname;
            $roleid = $user_type;
            $user_type = $r->rname;
        }
        else{
            $role = '';
            $roleid = 0;
            $user_type = 'Admin';
        }


        $msg = '';
        if(filter_var($username, FILTER_VALIDATE_EMAIL) == false){
            $msg .= $_L['notice_email_as_username']. '<br>';
        }

        if($password != $cpassword){
            $msg .= 'Passwords does not match'. '<br>';
        }
//check with same name account is exist
        $d = ORM::for_table('sys_users')->where('username',$username)->find_one();
        if($d){
            $msg .= $_L['account_already_exist']. '<br>';
        }


        // create Roles




        if($msg == ''){

            $password = Password::_crypt($password);
            // Add Account
            $d = ORM::for_table('sys_users')->create();
            $d->username = $username;
            $d->password = $password;
            $d->fullname = $fullname;
            $d->user_type = $user_type;

            //others
            $d->phonenumber = '';
            $d->last_login = date('Y-m-d H:i:s');
            $d->email = '';
            $d->creationdate = date('Y-m-d H:i:s');
            $d->pin = '';
            $d->img = '';
            $d->otp = 'No';
            $d->pin_enabled = 'No';
            $d->api = 'No';
            $d->pwresetkey = '';
            $d->keyexpire = '';
            $d->status = 'Active';
            $d->role = $role;
            $d->roleid = $roleid;


            //

            $d->save();
            r2(U . 'settings/users', 's', $_L['account_created_successfully']);
        }
        else{
            r2(U . 'settings/users-add', 'e', $msg);
        }

        break;


    case 'users-edit-post':


        $username = _post('username');
        $fullname = _post('fullname');
        $phonenumber = _post('phonenumber');
        $img = _post('picture');

        $img = str_replace(APP_URL.'/','',$img);
        $password = _post('password');
        $cpassword = _post('cpassword');

        $language = _post('user_language');

        $_SESSION['language'] = $language;


        $msg = '';

        if(filter_var($username, FILTER_VALIDATE_EMAIL) == false){
            $msg .= 'Please use a valid Email address as Username'. '<br>';
        }

        if($password != ''){

            if($password != $cpassword){
                $msg .= 'Passwords does not match'. '<br>';
            }
        }
        //find this user
        $id = _post('id');
        $d = ORM::for_table('sys_users')->find_one($id);
        if($d){

            if($user->id != $d->id){

                if(!has_access($user->roleid,'settings','edit')){

                    permissionDenied();

                }

            }

        }
        else{
            $msg .= 'Username Not Found'. '<br>';
        }
//check with same name account is exist
        if($d['username'] != $username){
            $c = ORM::for_table('sys_users')->where('username',$username)->find_one();
            if($c){
                $msg .= $_L['account_already_exist']. '<br>';
            }
        }



        if(APP_STAGE == 'Demo'){
            $msg .= 'Editing User is disabled in the Demo Mode!'. '<br>';
        }



        $user_type = _post('user_type');

        $r = M::factory('Models_Role')->find_one($user_type);

        if($r){
            $role = $r->rname;
            $roleid = $user_type;
            $user_type = $r->rname;
        }
        else{
            $role = '';
            $roleid = 0;
            $user_type = 'Admin';
        }


        if($msg == ''){




            $d->username = $username;

            $d->language = $language;
            if($password != ''){
                $password = Password::_crypt($password);
                $d->password = $password;
            }

            $d->fullname = $fullname;

            $d->fullname = $fullname;

            $d->phonenumber = $phonenumber;

            if(($user->id) != $id){

                $d->user_type = $user_type;
                $d->role = $role;
                $d->roleid = $roleid;
            }

            $d->img = $img;




            $d->save();
            r2(U . 'settings/users-edit/'.$id, 's', 'User Updated Successfully');
        }
        else{
            r2(U . 'settings/users-edit/'.$id, 'e', $msg);
        }

        break;

    case 'app-post':
        if(APP_STAGE == 'xDemo'){
            r2(U . 'settings/app', 'e', 'Sorry! This option is disabled in the demo mode.');
        }
        $company = _post('company');

        $pdf_font = _post('pdf_font');
        if($company == ''){
            r2(U.'settings/app','e',$_L['All Fields are Required']);
        }

        //check if email is posted as smtp

        if(APP_STAGE == 'Demo'){
            r2(U.'settings/app','e',$_L['disabled_in_demo']);
        }
        else{
            $d = ORM::for_table('sys_appconfig')->where('setting','CompanyName')->find_one();
            $d->value = $company;
            $d->save();




            $d = ORM::for_table('sys_appconfig')->where('setting','pdf_font')->find_one();
            $d->value = $pdf_font;
            $d->save();

            $caddress = $_POST['caddress'];
            $d = ORM::for_table('sys_appconfig')->where('setting','caddress')->find_one();
            $d->value = $caddress;
            $d->save();

            $show_quantity_as = $_POST['show_quantity_as'];
            $d = ORM::for_table('sys_appconfig')->where('setting','show_quantity_as')->find_one();
            $d->value = $show_quantity_as;
            $d->save();

            $invoice_terms = $_POST['invoice_terms'];
            $d = ORM::for_table('sys_appconfig')->where('setting','invoice_terms')->find_one();
            $d->value = $invoice_terms;
            $d->save();


            $i_driver = $_POST['i_driver'];
            $d = ORM::for_table('sys_appconfig')->where('setting','i_driver')->find_one();
            $d->value = $i_driver;
            $d->save();

            // default_landing_page v 4.1


            $default_landing_page = $_POST['default_landing_page'];
            $d = ORM::for_table('sys_appconfig')->where('setting','default_landing_page')->find_one();
            $d->value = $default_landing_page;
            $d->save();


            $dashboard = $_POST['dashboard'];
            $d = ORM::for_table('sys_appconfig')->where('setting','dashboard')->find_one();
            $d->value = $dashboard;
            $d->save();


//            $contentAnimation = $_POST['contentAnimation'];
//
//            update_option('contentAnimation',$contentAnimation);


            //set invoice numbering

            $iai = _post('iai');

            if(($iai != '') AND (is_numeric($iai))){
                //check it's bigger then current
                $tblsts = ORM::for_table('sys_invoices')->raw_query("show table status like 'sys_invoices'")->find_one();
                $ai = $tblsts['Auto_increment'];
                if($ai < $iai){
                    $set_ai = ORM::for_table('sys_invoices')->raw_execute("ALTER TABLE sys_invoices auto_increment = $iai");
                }
            }


            //

            $tax_system = _post('tax_system');

            if($tax_system != $config['tax_system']){
                updateOption('tax_system',$tax_system);
                Tax::taxReset($tax_system);
            }

            $business_location = _post('business_location');

            update_option('business_location',$business_location);

            $vat_number = _post('vat_number');

            update_option('vat_number',$vat_number);






            r2(U.'settings/app','s',$_L['Settings Saved Successfully']);
        }


        break;

    case 'eml-post':
        if(APP_STAGE == 'Demo'){
            r2(U.'settings/emls/','e',$_L['disabled_in_demo']);
        }



        $sysemail = _post('sysemail');
        if(filter_var($sysemail, FILTER_VALIDATE_EMAIL) == false){
            r2(U.'settings/emls/','e',$_L['Invalid System Email']);
        }

        $d = ORM::for_table('sys_appconfig')->where('setting','sysEmail')->find_one();
        $d->value = $sysemail;
        $d->save();
        $email_method = _post('email_method');
        $e = ORM::for_table('sys_emailconfig')->find_one('1');
        if($email_method == 'smtp'){

            $smtp_user = _post('smtp_user');
            $smtp_host = _post('smtp_host');
            $smtp_password = _post('smtp_password');
            $smtp_port = _post('smtp_port');
            $smtp_secure = _post('smtp_secure');
            if($smtp_user == '' OR $smtp_password == '' OR $smtp_port == '' OR $smtp_host == ''){
                r2(U.'settings/emls/','e',$_L['smtp_fields_error']);
            }
            else{
                $e->method = 'smtp';
                $e->host = $smtp_host;
                $e->username = $smtp_user;
                $e->password = $smtp_password;
                $e->apikey = '';
                $e->port = $smtp_port;
                $e->secure = $smtp_secure;
            }
        }
        else{
          //  $e->method = 'phpmail';
            // From v 4.5
            $e->method = $email_method;
        }
        $e->save();

        update_option('mailgun_api_key',_post('mailgun_api_key'));
        update_option('mailgun_domain',_post('mailgun_domain'));
        update_option('sparkpost_api_key',_post('sparkpost_api_key'));

        r2(U.'settings/emls/','s',$_L['Settings Saved Successfully']);



        break;

    case 'lc-post':


        if(APP_STAGE == 'Demo'){
            r2(U . 'settings/localisation/', 'e', 'Sorry! This option is disabled in the demo mode!');
        }



        $tzone = _post('tzone');
        $d = ORM::for_table('sys_appconfig')->where('setting','timezone')->find_one();
        $d->value = $tzone;
        $d->save();

        $country = _post('country');
        $d = ORM::for_table('sys_appconfig')->where('setting','country')->find_one();
        $d->value = $country;
        $d->save();

        $country_flag_code = strtolower(Countries::full2short($country));

        update_option('country_flag_code',$country_flag_code);

//        $dec_point = $_POST['dec_point'];
//        if(strlen($dec_point) == '1'){
//            $d = ORM::for_table('sys_appconfig')->where('setting','dec_point')->find_one();
//            $d->value = $dec_point;
//            $d->save();
//        }
//
//        $thousands_sep = $_POST['thousands_sep'];
//        if(strlen($thousands_sep) == '1'){
//            $d = ORM::for_table('sys_appconfig')->where('setting','thousands_sep')->find_one();
//            $d->value = $thousands_sep;
//            $d->save();
//        }

        $cformat = _post('cformat');

        if($cformat == '1'){
            $d = ORM::for_table('sys_appconfig')->where('setting','dec_point')->find_one();
            $d->value = '.';
            $d->save();
            $d = ORM::for_table('sys_appconfig')->where('setting','thousands_sep')->find_one();
            $d->value = '';
            $d->save();
        }
        elseif($cformat == '2'){
            $d = ORM::for_table('sys_appconfig')->where('setting','dec_point')->find_one();
            $d->value = '.';
            $d->save();
            $d = ORM::for_table('sys_appconfig')->where('setting','thousands_sep')->find_one();
            $d->value = ',';
            $d->save();
        }
        elseif($cformat == '3'){
            $d = ORM::for_table('sys_appconfig')->where('setting','dec_point')->find_one();
            $d->value = ',';
            $d->save();
            $d = ORM::for_table('sys_appconfig')->where('setting','thousands_sep')->find_one();
            $d->value = '';
            $d->save();
        }
        elseif($cformat == '4'){
            $d = ORM::for_table('sys_appconfig')->where('setting','dec_point')->find_one();
            $d->value = ',';
            $d->save();
            $d = ORM::for_table('sys_appconfig')->where('setting','thousands_sep')->find_one();
            $d->value = '.';
            $d->save();
        }
        else{

            $d = ORM::for_table('sys_appconfig')->where('setting','dec_point')->find_one();
            $d->value = '.';
            $d->save();
            $d = ORM::for_table('sys_appconfig')->where('setting','thousands_sep')->find_one();
            $d->value = ',';
            $d->save();

        }

        $currency_code = $_POST['currency_code'];

        $d = ORM::for_table('sys_appconfig')->where('setting','currency_code')->find_one();
        $d->value = $currency_code;
        $d->save();




//        $d = ORM::for_table('sys_appconfig')->where('setting','rtl')->find_one();
//        $d->value = $rtl;
//        $d->save();

        $lan = _post('lan');
        $d = ORM::for_table('sys_appconfig')->where('setting','language')->find_one();
        $d->value = $lan;
        $d->save();

        // change to rtl for certain languages

    if($lan == 'ar' || $lan == 'he'){

        updateOption('rtl',1);
    }

        update_option('momentLocale',Ib_I18n::momentLocale($lan));


        $df = _post('df');

        update_option('df',$df);



        $home_currency = _post('home_currency');
        $d = ORM::for_table('sys_appconfig')->where('setting','home_currency')->find_one();
        $d->value = $home_currency;
        $d->save();

        // check home currency is exist

    $current_home_currency = homeCurrency();

    if(!$current_home_currency){
        $c_create = new Currency;
        $c_create->cname = $home_currency;
        $c_create->iso_code = $home_currency;
        $c_create->symbol = $currency_code;
        $c_create->rate = 1.00000000;
        $c_create->isdefault = 1;
        $c_create->save();
    }

        $currency_decimal_digits = _post('currency_decimal_digits');
        $d = ORM::for_table('sys_appconfig')->where('setting','currency_decimal_digits')->find_one();
        $d->value = $currency_decimal_digits;
        $d->save();


        $currency_symbol_position = _post('currency_symbol_position');
        $d = ORM::for_table('sys_appconfig')->where('setting','currency_symbol_position')->find_one();
        $d->value = $currency_symbol_position;
        $d->save();

        $thousand_separator_placement = _post('thousand_separator_placement');
        $d = ORM::for_table('sys_appconfig')->where('setting','thousand_separator_placement')->find_one();
        $d->value = $thousand_separator_placement;
        $d->save();



        // reload lagnuage file

        r2(U.'settings/localisation/');



        break;

    case 'lc-charset-post':

        $coll = _post('coll');
        $chars = explode('_',$coll);
        $chars_name =  $chars[0];
//echo $chars_name;
//
//exit;

        $mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if( ! $mysqli->error ) {
            $sql = "SHOW TABLES";
            $show = $mysqli->query($sql);
            while ( $r = $show->fetch_array() ) {
                $tables[] = $r[0];
            }

            if( ! empty( $tables ) ) {

                foreach( $tables as $table )
                {
                    // $result     = $mysqli->query('SELECT * FROM '.$table);
                    $result     = $mysqli->query('ALTER TABLE '.$table." CONVERT TO CHARACTER SET $chars_name COLLATE $coll");
                    //   echo $table;

                }


            } else {

                //     $result = '<p>Error when executing database query to export.</p>'.$mysqli->error;

            }
        }

        r2(U.'settings/localisation/','s',$_L['Charset Saved Successfully']);
        break;

    case 'change-password':
        $ui->assign('_application_menu', 'dashboard');
        view('change-password');

        break;

    case 'change-password-post':

        $password = _post('password');
        if($password != ''){
            $d = ORM::for_table('sys_users')->where('username',$user['username'])->find_one();
            if($d){
                $d_pass = $d['password'];
                if(Password::_verify($password,$d_pass) == true){

                    $npass = _post('npass');
                    $cnpass = _post('cnpass');

                    if($npass != $cnpass){
                        r2(U.'settings/change-password','e',$_L['Both Password should be same']);
                    }



                    if(APP_STAGE == 'Demo'){
                        r2(U.'settings/change-password','e',$_L['disabled_in_demo']);
                    }
                    $npass = Password::_crypt($npass);
                    $d->password = $npass;
                    $d->save();
                    _msglog('s',$_L['Password changed successfully']);

                    r2(U.'login');

                }
                else{
                    r2(U.'settings/change-password','e',$_L['Incorrect Current Password']);
                }
            }
            else{

                r2(U.'settings/change-password','e',$_L['Incorrect Current Password']);
            }
        }
        else{
            r2(U.'settings/change-password','e',$_L['Incorrect Current Password']);
        }


        break;

    case 'networth_goal':

        $goal = _post('goal');

        $goal = Finance::amount_fix($goal);

        if((is_numeric($goal)) AND $goal != ''){
            $d = ORM::for_table('sys_appconfig')->where('setting','networth_goal')->find_one();
            $d->value = $goal;
            $d->save();
            _msglog('s',$_L['New Goal has been set']);
        }
        else{
            _msglog('e',$_L['Invalid Number']);
        }

        break;

    case 'email-templates':
        $d = ORM::for_table('sys_email_templates')->order_by_desc('id')->find_array();
        $ui->assign('d',$d);
//        $ui->assign('xheader', '
//<link rel="stylesheet" type="text/css" href="'.APP_URL.'/ui/lib/sn/summernote.css"/>
//<link rel="stylesheet" type="text/css" href="'.APP_URL.'/ui/lib/sn/summernote-bs3.css"/>
//<link rel="stylesheet" type="text/css" href="' . $_theme . '/css/modal.css"/>
//<link rel="stylesheet" type="text/css" href="'.APP_URL.'/ui/lib/sn/summernote-application.css"/>
//');
//        $ui->assign('xfooter', '
// <script type="text/javascript" src="' . $_theme . '/lib/modal.js"></script>
//  <script type="text/javascript" src="'.APP_URL.'/ui/lib/sn/summernote.min.js"></script>
// <script type="text/javascript" src="'.APP_URL.'/ui/lib/jslib/email-templates.js"></script>
//');

        $ui->assign('xheader',Asset::css(array('modal')));
        $ui->assign('xfooter',Asset::js(array('modal','js/filtertable','tinymce/tinymce.min','js/editor','jslib/email-templates')));
        view('email-templates');
        break;

    case 'email-templates-view':

        $sid = route(2,'');

        $create = true;



        if($sid != ''){
            $d = ORM::for_table('sys_email_templates')->find_one($sid);
            if($d){
                $create = false;
            }
            else{
                $create = true;
            }
        }




        if($create){
            $core = 'No';
            $tplname = '';
            $subject = '';
            $message = '';
            $modal_header = $_L['Add New Template'];
            $s_yes = 'selected="selected"';
            $s_no = '';
            $id = '';
        }
        else{
            $s_yes = '';
            $s_no = '';
            if(($d['send']) == 'No'){
                $s_no = 'selected="selected"';
            }

            if(($d['send']) == 'Yes'){
                $s_yes = 'selected="selected"';
            }

            $core = $d->core;
            $tplname = $d->tplname;
            $subject = $d->subject;
            $message = $d->message;
            $modal_header = ib_lan_get_line($d['tplname']);
            $id = $d->id;
        }


        echo '
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h3>'.$modal_header.'</h3>
</div>
<div class="modal-body">

<form class="form-horizontal" role="form" id="edit_form" method="post">

<div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
      '.(($core == 'Yes')?'<span class="label label-warning"> '.$_L['System'].' </span>':'<span class="label label-info"> '.$_L['Custom'].' </span>').'
    </div>
  </div>

<div class="form-group">
    <label for="tplname" class="col-sm-2 control-label">'.$_L['Name'].'</label>
    <div class="col-sm-10">
      <input type="text" id="tplname" name="tplname" class="form-control" value="'.$tplname.'" '.(($core == 'Yes')?'disabled':'').'>
    </div>
  </div>
  
<div class="form-group">
    <label for="subject" class="col-sm-2 control-label">'.$_L['Subject'].'</label>
    <div class="col-sm-10">
      <input type="text" id="subject" name="subject" class="form-control" value="'.$subject.'">
    </div>
  </div>


   <div class="form-group">
    <label for="message" class="col-sm-2 control-label">'.$_L['Message Body'].'</label>
    <div class="col-sm-10">
      <textarea id="message" name="message" class="form-control sysedit" rows="10">'.$message.'</textarea>
      <input type="hidden" id="sid" name="id" value="'.$id.'">
    </div>
  </div>
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">'.$_L['Send'].'</label>
    <div class="col-sm-10">
      <select name="send" id="send" class="form-control">
                              <option value="Yes" '.$s_yes.'>'.$_L['Yes'].'</option>
                              <option value="No" '.$s_no.'>'.$_L['No'].'</option>

                          </select>
    </div>
  </div>
</form>

</div>
<div class="modal-footer">
	

		<button type="button" data-dismiss="modal" class="btn">'.$_L['Close'].'</button>
		<button id="update" class="btn btn-primary">'.$_L['Save'].'</button>
</div>';



        break;

    case 'update-email-template':
        $id = _post('id');
        $message = $_POST['message'];
        $subject = $_POST['subject'];
        $tplname = $_POST['tplname'];
        $send = _post('send');

        if($id == ''){
            //create

            if($message == '' OR $subject == '' OR $tplname == ''){
                echo $_L['All Fields are Required'];
                exit;
            }

            $d = ORM::for_table('sys_email_templates')->create();

            $d->tplname = $tplname;
            $d->subject = $subject;
            $d->send = $send;
            $d->message = $message;
            $d->core = 'No';

            $d->save();


            echo $_L['added_successful'];

            //
            exit;
        }
        $d = ORM::for_table('sys_email_templates')->find_one($id);
        if(APP_STAGE == 'Demo'){
            echo 'Sorry! This option is disabled in the demo mode!';
            exit;
        }
        if($d){



            if($d->core == 'Yes'){
                $tplname = $d->tplname;
            }


            if($message == '' OR $subject == '' OR $tplname == ''){
                echo 'Invalid Data';
            }
            else{

                $d->tplname = $tplname;
                $d->subject = $subject;
                $d->send = $send;
                $d->message = $message;

                $d->save();
                echo $_L['edit_successful'];
            }

        }
        else{
            echo 'Sorry Data not Found';
        }

        break;

    case 'tags':
        $ui->assign('content_inner',inner_contents($config['c_cache']));

        $d = ORM::for_table('sys_tags')->find_many();
        $ui->assign('d',$d);

        $ui->assign('xjq', '
$(".cdelete").click(function (e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm("'.$_L['are_you_sure'].'", function(result) {
           if(result){
               var _url = $("#_url").val();
               window.location.href = _url + "delete/tags/" + id;
           }
        });
    });

 ');


        view('tags');


        break;



    case 'logo-post':
        if(APP_STAGE == 'Demo'){
            r2(U.'appearance/customize/','e',$_L['disabled_in_demo']);
        }
//        $validextentions = array("jpeg", "jpg", "png");
//        $temporary = explode(".", $_FILES["file"]["name"]);
//        $file_extension = end($temporary);
//        $file_name = '';
//        if(($_FILES["file"]["type"] == "image/png")){
//            $file_name = 'logo-tmp.png';
//        }
//        elseif(($_FILES["file"]["type"] == "image/jpg")){
//            $file_name = 'logo-tmp.jpg';
//        }
//        elseif(($_FILES["file"]["type"] == "image/jpeg")){
//            $file_name = 'logo-tmp.jpeg';
//        }
//        elseif(($_FILES["file"]["type"] == "image/gif")){
//            $file_name = 'logo-tmp.gif';
//        }
//        else{
//
//        }
//        if ((($_FILES["file"]["type"] == "image/png")
//                || ($_FILES["file"]["type"] == "image/jpg")
//                || ($_FILES["file"]["type"] == "image/jpeg"))
//            && ($_FILES["file"]["size"] < 1000000)//approx. 100kb files can be uploaded
//            && in_array($file_extension, $validextentions)){
//            move_uploaded_file($_FILES["file"]["tmp_name"], 'storage/system/'. $file_name);
//            $image = new Image();
//            $image->source_path = 'storage/system/'. $file_name;
//            $image->target_path = 'storage/system/logo.png';
//           // $image->resize('0','40',ZEBRA_IMAGE_BOXED,'-1');
//            $image->resize(0,0,ZEBRA_IMAGE_BOXED,'-1');
//
//            //now delete the tmp image
//
//            unlink('storage/system/'. $file_name);
//
////            r2(U.'settings/app','s',$_L['Settings Saved Successfully']);
//
//            r2(U.'appearance/customize/','s',$_L['Settings Saved Successfully']);
//        }
//
//        else{
//
//            r2(U.'appearance/customize/','e',$_L['Invalid Logo File']);
//
//        }


        $validextentions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["file"]["name"]);
        $file_extension = end($temporary);
        $file_name = '';
        if(($_FILES["file"]["type"] == "image/png")){
            $file_name = 'logo_'._raid(10).'.png';
        }
        elseif(($_FILES["file"]["type"] == "image/jpg")){
            $file_name = 'logo_'._raid(10).'.jpg';
        }
        elseif(($_FILES["file"]["type"] == "image/jpeg")){
            $file_name = 'logo_'._raid(10).'.jpeg';
        }
        elseif(($_FILES["file"]["type"] == "image/gif")){
            $file_name = 'logo_'._raid(10).'.gif';
        }
        else{

        }
        if ((($_FILES["file"]["type"] == "image/png")
                || ($_FILES["file"]["type"] == "image/jpg")
                || ($_FILES["file"]["type"] == "image/jpeg")
                || ($_FILES["file"]["type"] == "image/gif"))
            && ($_FILES["file"]["size"] < 1000000)//approx. 100kb files can be uploaded
            && in_array($file_extension, $validextentions)){
            move_uploaded_file($_FILES["file"]["tmp_name"], 'storage/system/'. $file_name);


            update_option('logo_default',$file_name);

            r2(U.'appearance/customize/','s',$_L['Settings Saved Successfully']);
        }

        else{

            r2(U.'appearance/customize/','e',$_L['Invalid Logo File']);

        }


        break;



    case 'logo-inverse-post':

        if(APP_STAGE == 'Demo'){
            r2(U.'appearance/customize/','e',$_L['disabled_in_demo']);
        }



        $validextentions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["file"]["name"]);
        $file_extension = end($temporary);
        $file_name = '';
        if(($_FILES["file"]["type"] == "image/png")){
            $file_name = 'logo_inverse_'._raid(10).'.png';
        }
        elseif(($_FILES["file"]["type"] == "image/jpg")){
            $file_name = 'logo_inverse_'._raid(10).'.jpg';
        }
        elseif(($_FILES["file"]["type"] == "image/jpeg")){
            $file_name = 'logo_inverse_'._raid(10).'.jpeg';
        }
        elseif(($_FILES["file"]["type"] == "image/gif")){
            $file_name = 'logo_inverse_'._raid(10).'.gif';
        }
        else{

        }
        if ((($_FILES["file"]["type"] == "image/png")
                || ($_FILES["file"]["type"] == "image/jpg")
                || ($_FILES["file"]["type"] == "image/jpeg")
                || ($_FILES["file"]["type"] == "image/gif"))
            && ($_FILES["file"]["size"] < 1000000)//approx. 100kb files can be uploaded
            && in_array($file_extension, $validextentions)){
            move_uploaded_file($_FILES["file"]["tmp_name"], 'storage/system/'. $file_name);


            update_option('logo_inverse',$file_name);

            r2(U.'appearance/customize/','s',$_L['Settings Saved Successfully']);
        }

        else{

            r2(U.'appearance/customize/','e',$_L['Invalid Logo File']);

        }


        break;


    case 'localisation':
        $ui->assign('content_inner',inner_contents($config['c_cache']));

        $tblsts = ORM::for_table('crm_accounts')->raw_query("show table status like 'crm_accounts'")->find_one();
        $col = $tblsts['Collation'];
        $ui->assign('col',$col);


        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e',$_L['You do not have permission']);
        }
        $ui->assign('countries',Countries::all($config['country'])); // may add this $config['country_code']
        $timezonelist = Timezone::timezoneList();
        $ui->assign('tlist',$timezonelist);

        $ui->assign('currencies',Currency::list_all('array'));


        $ui->assign('languages',IBilling_I18n::get_languages());

        $ui->assign('xheader', Asset::css(array('s2/css/select2.min')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),'locale')));



        $ui->assign('xjq', '');


        view('localisation');

        break;


    case 'emls':

        $ui->assign('content_inner',inner_contents($config['c_cache']));
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e',$_L['You do not have permission']);
        }


        //find email settings

        $e = ORM::for_table('sys_emailconfig')->find_one('1');
        $ui->assign('e',$e);

        // check mailgun api key is exist in the database

    if(isset($config['mailgun_api_key']))
    {
        $mailgun_api_key = $config['mailgun_api_key'];
    }
    else{
        add_option('mailgun_api_key','');
        $mailgun_api_key = '';
    }

        if(isset($config['mailgun_domain']))
        {
            $mailgun_domain = $config['mailgun_domain'];
        }
        else{
            add_option('mailgun_domain','');
            $mailgun_domain = '';
        }

        if(isset($config['sparkpost_api_key']))
        {
            $sparkpost_api_key = $config['sparkpost_api_key'];
        }

        else{
        add_option('sparkpost_api_key','');
        $sparkpost_api_key = '';
        }

    //


        $ui->assign('xjq', '

        function _check_e_method(){
        var emethod = $( "#email_method" ).val();
        if(emethod == "smtp"){
         
          $("#a_hide").show();
        }
        else{
        $("#a_hide").hide();
        }
        }
_check_e_method();
$( "#email_method" ).change(function() {
 _check_e_method();
});
 ');

        view('emls',[
            'mailgun_api_key' => $mailgun_api_key,
            'mailgun_domain' => $mailgun_domain,
            'sparkpost_api_key' => $sparkpost_api_key
        ]);

        break;


    case 'automation':
        $ui->assign('content_inner',inner_contents($config['c_cache']));
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e',$_L['You do not have permission']);
        }


        $cs = ORM::for_table('sys_schedule')->find_many();
        foreach($cs as $rcs)
        {
            $arcs[$rcs['cname']]=$rcs['val'];
        }
        $ui->assign('arcs',$arcs);

//        $ui->assign('xheader', '
//<link rel="stylesheet" type="text/css" href="ui/lib/bootstrap-switch/bootstrap-switch.css"/>
//');
//        $ui->assign('xfooter', '
//<script type="text/javascript" src="ui/lib/bootstrap-switch/bootstrap-switch.min.js"></script>
//');
//
//        $ui->assign('xjq', '
//            $(".sys_csw").bootstrapSwitch();
// ');


        view('automation');

        break;


    case 'pg':
        $ui->assign('content_inner',inner_contents($config['c_cache']));
        if($user['user_type'] != 'Admin'){
            r2(U."dashboard",'e',$_L['You do not have permission']);
        }




        $d = ORM::for_table('sys_pg')->order_by_asc('sorder')->find_many();
        $ui->assign('d',$d);

//        $ui->assign('xheader', Asset::css(array('s2/css/select2.min')));
//        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan())));


        view('pg');

        break;


    case 'pg-conf':
        $ui->assign('content_inner',inner_contents($config['c_cache']));
        $pg = $routes['2'];
        $d = ORM::for_table('sys_pg')->find_one($pg);
        if($d){


            $script_append = '';

            $label = array();

            $label['value'] = 'Value';
            $label['c1'] = '';
            $label['c2'] = '';
            $label['c3'] = '';
            $label['c4'] = '';
            $label['c5'] = '';
            $label['mode'] = false;

            $input = array();


            $input['value'] = '<input type="text" class="form-control" id="value" name="value" value="'.$d['value'].'">';
            $input['c1'] = '<input type="text" class="form-control" id="c1" name="c1" value="'.$d['c1'].'">';
            $input['c2'] = '<input type="text" class="form-control" id="c2" name="c2" value="'.$d['c2'].'">';
            $input['c3'] = '<input type="text" class="form-control" id="c3" name="c3" value="'.$d['c3'].'">';
            $input['c4'] = '<input type="text" class="form-control" id="c4" name="c4" value="'.$d['c4'].'">';
            $input['c5'] = '<input type="text" class="form-control" id="c5" name="c5" value="'.$d['c5'].'">';


            $help_txt = array();

            $help_txt['value'] = '';
            $help_txt['c1'] = '';
            $help_txt['c2'] = '';
            $help_txt['c3'] = '';
            $help_txt['c4'] = '';
            $help_txt['c5'] = '';
            $help_txt['mode'] = '';

            $extra_panel = '';

            $processor = $d->processor;

            switch($processor){

                case 'paypal':


                    $label['value'] = 'Paypal Email';
                    $label['c1'] = $_L['Currency Code'];
                    $label['c2'] = 'Conversion Rate';


                    break;

                case 'stripe':

                    $label['value'] = 'Publishable key';
                    $label['c1'] = 'Secret key';
                    $label['c2'] = $_L['Currency Code'];


                    break;


                case 'authorize_net':

                    $label['value'] = 'API Login ID';
                    $label['c1'] = 'Transaction Key';



                    break;


                case 'manualpayment':

//                    $ui->assign('xheader', Asset::css(array('redactor/redactor')));
//
//
//
//
//                    $script_append .= Asset::js(array('redactor/redactor.min'));
//
//                    $ui->assign('xjq', '
//$(\'#value\').redactor(
//                    {
//                        minHeight: 200 // pixels
//                    }
//                );
//');

                    $input['value'] = '<textarea id="value" class="form-control" rows="3">'.$d['value'].'</textarea>';

                    $label['value'] = 'Payment Instructions';


                    break;


                case 'braintree':

                    $label['value'] = 'Your Merchant ID';
                    $label['c1'] = $_L['Public Key'];
                    $label['c2'] = $_L['Private Key'];
                    $label['c3'] = $_L['Default Account'];
                    $label['c4'] = $_L['live or sandbox'];


                    break;

                case 'ccavenue':

                    $label['value'] = 'Merchant ID';
                    $label['c1'] = 'Working Key';
                    $label['c2'] = 'Currency ISO Code';
                    $label['c3'] = 'Access Code';


                    break;

                default:
                    $label['value'] = 'Value';


            }



            $ui->assign('label',$label);
            $ui->assign('input',$input);
            $ui->assign('help_txt',$help_txt);
            $ui->assign('extra_panel',$extra_panel);

            $icon_url = '';

            if(file_exists('apps/'.$processor.'/views/img/icon.png')){

                $icon_url = APP_URL.'/apps/'.$processor.'/views/img/icon.png';

            }

            $ui->assign('icon_url',$icon_url);

            Event::trigger('settings/pg_conf/label',array($processor));




//            $ui->assign('xfooter', '
//<script type="text/javascript" src="' . $_theme . '/lib/pg.js"></script>
//'.$script_append);
            $ui->assign('d',$d);
            view('pg-conf');

        }
        else{
            echo 'PG Not Found';
        }

        break;


    case 'pg-post':
        if(APP_STAGE == 'Demo'){
            r2(U.'settings/app','e',$_L['disabled_in_demo']);
        }
        $pg = _post('pgid');

        $d = ORM::for_table('sys_pg')->find_one($pg);
        if($d){
            $name = _post('name');
            if($name == ''){

                _msglog('e',$_L['name_error']);
                echo $pg;
                exit;
            }
            $d->name = $name;
          //  $d->settings = _post('settings');
            $d->value = _post('value');
            $d->status = _post('status');
            $d->c1 = _post('c1');
            $d->c2 = _post('c2');
            $d->c3 = _post('c3');
            $d->c4 = _post('c4');
            $d->c5 = _post('c5');
            $d->mode = _post('mode');
            $d->save();
            _msglog('s',$_L['Data Updated']);
            echo $pg;
        }
        else{
            echo 'PG Not Found';
        }

        break;

    case 'add-tax':
        $ui->assign('content_inner',inner_contents($config['c_cache']));
        view('add-tax');
        break;

    case 'add-tax-post':
        if(APP_STAGE == 'Demo'){
            r2(U.'settings/app','e',$_L['disabled_in_demo']);
        }
        $taxname = _post('taxname');
        $taxrate = _post('taxrate');
        $taxrate = Finance::amount_fix($taxrate);
        if($taxname == '' OR $taxrate ==''){
           // r2(U.'settings/add-tax/','e',$_L['All Fields are Required']);
            $taxrate = 0.00;
        }

        if(!is_numeric($taxrate)){
          //  r2(U.'settings/add-tax/','e',$_L['Invalid TAX Rate']);
            $taxrate = 0.00;
        }

        $d = ORM::for_table('sys_tax')->create();
        $d->name = $taxname;
        $d->rate = $taxrate;
        $d->save();
        r2(U.'tax/list/','s',$_L['New TAX Added']);
        break;

    case 'edit-tax':
        $ui->assign('content_inner',inner_contents($config['c_cache']));
        $tid = $routes['2'];
        $d = ORM::for_table('sys_tax')->find_one($tid);
        if($d){
            $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/numeric.js"></script>
');

            $ui->assign('d',$d);

            $ui->assign('ib_money_format_apply',true);

            Event::trigger('settings/edit-tax/');

            view('edit-tax');
        }
        else{
            r2(U.'tax/list/','e',$_L['TAX Not Found']);
        }

        break;

    case 'edit-tax-post':
        if(APP_STAGE == 'Demo'){
            r2(U.'settings/app','e',$_L['disabled_in_demo']);
        }
        $tid = _post('tid');
        $d = ORM::for_table('sys_tax')->find_one($tid);
        if($d){
            $taxname = _post('taxname');
            $taxrate = _post('taxrate');
            $taxrate = Finance::amount_fix($taxrate);
            if($taxname == '' OR $taxrate ==''){
                r2(U.'settings/edit-tax/'.$tid.'/','e','All Fields is Required.');
            }
            if(!is_numeric($taxrate)){
                r2(U.'settings/edit-tax/'.$tid.'/','e','Invalid TAX Rate.');
            }

            $d->name = $taxname;
            $d->rate = $taxrate;
            $d->save();
            r2(U.'settings/edit-tax/'.$tid.'/','s','TAX Saved.');
        }
        else{
            r2(U.'tax/list/','e',$_L['TAX Not Found']);
        }

        break;

    case 'consolekey_regen':

        $nkey = _raid('10');

        $d = ORM::for_table('sys_appconfig')->where('setting','ckey')->find_one();
        $d->value = $nkey;
        $d->save();
        r2(U.'settings/automation/','s',$_L['cron_new_key']);
        break;

    case 'automation-post':
        $accounting_snapshot = _post('accounting_snapshot');
        $d = ORM::for_table('sys_schedule')->where('cname', 'accounting_snapshot')->find_one();
        if ($accounting_snapshot == 'on') {
            $d->val = 'Active';
        } else {
            $d->val = 'Inactive';
        }
        $d->save();

        $recurring_invoice = _post('recurring_invoice');
        $d = ORM::for_table('sys_schedule')->where('cname', 'recurring_invoice')->find_one();
        if ($recurring_invoice == 'on') {
            $d->val = 'Active';
        } else {
            $d->val = 'Inactive';
        }
        $d->save();

        $notify = _post('notify');
        $notifyemail = _post('notifyemail');
        if($notify == 'on'){
            //need valid notify email
            if(filter_var($notifyemail, FILTER_VALIDATE_EMAIL) == false){
                r2(U.'settings/automation/','e',$_L['cron_notification']);
            }
        }
        $d = ORM::for_table('sys_schedule')->where('cname', 'notify')->find_one();
        if ($notify == 'on') {
            $d->val = 'Active';
        } else {
            $d->val = 'Inactive';
        }
        $d->save();


        $d = ORM::for_table('sys_schedule')->where('cname', 'notifyemail')->find_one();
        $d->val = $notifyemail;
        $d->save();

        r2(U.'settings/automation/','s',$_L['Settings Saved Successfully']);
        break;

    case 'plugins':

        $Parsedown = new Parsedown();

        $core_plugins = require 'system/data/core_plugins.php';

        $ui->assign('_application_menu', 'plugins');

        $ui->assign('content_inner',inner_contents($config['c_cache']));
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="'.APP_URL.'/ui/lib/dropzone/dropzone.css"/>
');
        $ui->assign('xfooter', '
<script type="text/javascript" src="'.APP_URL.'/ui/lib/dropzone/dropzone.js"></script>
');

        $pls = array_diff(scandir('apps'), array('..', '.','index.html'));
        $pl_html = '';
        foreach ($pls as $pl){
            $pl_path = 'apps/'.$pl.'/';
            $i = 0;
            if(file_exists($pl_path.'/manifest.php')){
                $i++;
                //

                $plugin = null;

                require($pl_path.'/manifest.php');

                $d = ORM::for_table('sys_pl')->where('c',$pl)->find_one();
                $btn = '';
                if($d){
                    //plugin was installed & active
                    $status = $d['status'];
                    if($status == '1'){
                        $btn .= ' <a href="'.U.'settings/plugin_deactivate/'.$pl.'/" class="btn btn-danger btn-sm cdelete"><i class="fa fa-minus-square-o"></i> Deactivate </a>';

                    }
                    else{
                        $btn .= ' <a href="'.U.'settings/plugin_activate/'.$pl.'/" class="btn btn-info btn-sm"><i class="fa fa-check"></i> Activate </a>';
                        $btn .= ' <a href="'.U.'settings/plugin_uninstall/'.$pl.'/" class="btn btn-danger btn-sm c_uninstall"><i class="fa fa-remove"></i> Uninstall </a>';
                    }

                    // check for update

                    $db_build = $d->build;

                    if(isset($plugin['build']) && ($plugin['build'] > $db_build)){

                        // add update button

                        $btn .= ' <a href="'.U.'settings/plugin_update/'.$pl.'/" class="btn btn-info btn-sm"><i class="fa fa-tasks"></i> Update </a>';


                    }


                }
                else{
                    //plugin need to be installed
                    $btn .= ' <a href="'.U.'settings/plugin_install/'.$pl.'/" class="btn btn-primary btn-sm cedit"><i class="fa fa-hdd-o"></i> Install </a>';
                    $btn .= ' <a href="'.U.'settings/plugin_delete/'.$pl.'/" class="btn btn-danger btn-sm cdelete"><i class="fa fa-trash"></i> Delete </a>';

                }



                $icon_url = APP_URL.'/storage/system/plug.png';

                if(file_exists($pl_path.'/views/img/icon.png')){

                    $icon_url = APP_URL.'/'.$pl_path.'/views/img/icon.png';

                }


                // check for update



                $pl_html .= ' <tr>
 <td>
 <img class="img-thumbnail" style="max-height: 64px;" src="'.$icon_url.'">
</td>

                <td class="project-title">
                    <a href="'.$plugin['url'].'" class="cedit" target="_blank">'.$plugin['name'].'</a>
                    <br>
                    <small>'.$plugin['version'].'</small>
                </td>
                <td>

                   '.$Parsedown->text($plugin['description']).'

                </td>

                <td class="project-actions">

                  <span class="pull-right">'.$btn.'</span>

                </td>
            </tr>';

            }
        }

        if($pl_html == ''){
            $pl_html = '<h4 class="text-center">'.$_L['No Plugins Available'].'</h4>';
        }

        $ui->assign('pl_html',$pl_html);

        view('pl-list',[
            'core_plugins' => $core_plugins
        ]);

        break;

    case 'plugin_upload':

        $uploader   =   new Uploader();
        $uploader->setDir('apps/');
        $uploader->sameName(true);
        $uploader->setExtensions(array('zip'));  //allowed extensions list//
        if($uploader->uploadFile('file')){   //txtFile is the filebrowse element name //
            $uploaded  =   $uploader->getUploadName(); //get uploaded file name, renames on upload//

        }else{//upload failed
         _msglog('e',$uploader->getMessage()); //get upload error message
        }

        break;

    case 'plugin_unzip':
        /*

        function doIt($callback) { $callback(); }

doIt(function() {
    // this will be done
});


        */
$msg = '';
        $name = _post('name');
        if (class_exists('ZipArchive')) {
            $zip = new ZipArchive;

            $res = $zip->open('apps/'.$name);
            if ($res === TRUE) {


                if(APP_STAGE == 'Demo'){
                    $msg .= $name . ' - Plugin Unzipping is Disabled in the Demo Mode! <br>';
                }

                else{
                    $zip->extractTo('apps/');
                }





if($zip->close()){
    unlink('apps/'.$name);
}
              //

            } else {
                $msg .= $name . ' - Invalid Plugin Package Or An error occured while unzipping the file! <br>';
            }
        }

else{
    $msg .= 'PHP ZipArchive Class is not Available! <br>';
}

if($msg != ''){
    _msglog('e',$msg);
}
else{
    _msglog('s',$_L['Plugin Added']);
}


        break;

    case 'plugin_activate':


        define('IB_INTERNAL', true);

        if(isset($routes['2']) AND $routes['2'] != ''){

            $pl = $routes['2'];
            $pl_path = 'apps/'.$pl.'/';

            $msg = '';
            $msg .= 'Activating Plugin...
';

            require($pl_path.'/manifest.php');

            if(APP_STAGE == 'Demo'){
                $msg .= 'Sorry, Activating Plugin is disabled in the demo mode...
';
            }
            else{
                if(file_exists($pl_path.'/activate.php')){

                    require($pl_path.'/activate.php');

                }

                $d = ORM::for_table('sys_pl')->where('c',$pl)->find_one();
                if($d){
                    $d->status = '1';

                    if(isset($plugin['build'])){
                        $d->build = $plugin['build'];
                    }

                    $d->save();
                    $msg .= 'Plugin Activated...
';

                }
            }


            $ui->assign('plugin',$plugin);
            $ui->assign('plugin_activity',$_L['Activating Plugin']);
            $ui->assign('msg',$msg);

            view('plugin-activity');


        }

        else{
            echo 'Plugin not Found';
        }

        break;


    case 'plugin_deactivate':

        define('IB_INTERNAL', true);

        if(isset($routes['2']) AND $routes['2'] != ''){

            $pl = $routes['2'];
            $pl_path = 'apps/'.$pl.'/';

            $msg = '';
            $msg .= 'Deactivating Plugin...
';

            require($pl_path.'/manifest.php');

            if(APP_STAGE == 'Demo'){
                $msg .= 'Sorry, Deactivating Plugin is disabled in the demo mode...
';
            }
            else{

                if(file_exists($pl_path.'/deactivate.php')){

                    require($pl_path.'/deactivate.php');

                }

                $d = ORM::for_table('sys_pl')->where('c',$pl)->find_one();
                if($d){
                    $d->status = '0';
                    $d->save();
                    $msg .= 'Plugin Deactivated...
';

                }

            }



            $ui->assign('plugin',$plugin);
            $ui->assign('plugin_activity',$_L['Deactivating Plugin']);
            $ui->assign('msg',$msg);
            view('plugin-activity');

        }

        else{
            echo 'Plugin not Found';
        }

        break;


    case 'plugin_install':

        define('IB_INTERNAL', true);

        if(isset($routes['2']) AND $routes['2'] != ''){

            $pl = $routes['2'];

            $pl_path = 'apps/'.$pl.'/';
            $msg = '';
            $msg .= 'Installing Plugin...
';
            require($pl_path.'/manifest.php');

            if(APP_STAGE == 'Demo'){
                $msg .= 'Sorry, Installing Plugin is disabled in the demo mode...
';
            }
            else{
                if(file_exists($pl_path.'/install.php')){


                    require($pl_path.'/install.php');

                }



                $msg .= 'Adding Plugin to the Plugin Database
';

                $c = ORM::for_table('sys_pl')->create();
                $c->c = $pl;
                $c->status = 1;

                if(isset($plugin['priority'])){
                    $c->sorder = $plugin['priority'];
                }

                // check build is exist

                if(isset($plugin['build'])){
                    $c->build = $plugin['build'];
                }
                else{
                    $c->build = 1;
                }

                //

                $c->c1 = '';
                $c->c2 = '';

                $c->save();

                $msg .= 'Plugin Added
';
            }


            $ui->assign('plugin',$plugin);
            $ui->assign('plugin_activity',$_L['Installing Plugin']);
            $ui->assign('msg',$msg);
            view('plugin-activity');

        }

        else{
            echo 'Install Script not Found';
        }

        break;


    case 'plugin_uninstall':

        define('IB_INTERNAL', true);

        if(isset($routes['2']) AND $routes['2'] != ''){

            $pl = $routes['2'];
            $pl_path = 'apps/'.$pl.'/';

            $msg = '';
            $msg .= 'Uninstalling Plugin...
';


            require($pl_path.'/manifest.php');

            if(APP_STAGE == 'Demo'){
                $msg .= 'Sorry, Uninstalling Plugin is disabled in the demo mode...
';
            }
            else{
                if(file_exists($pl_path.'/uninstall.php')){

                    require($pl_path.'/uninstall.php');

                }

                $msg .= 'Removing Plugin from Plugin Database...
';

                $d = ORM::for_table('sys_pl')->where('c',$pl)->find_one();
                if($d){
                    $d->delete();
                    $msg .= 'Plugin Uninstalled...
';

                }
            }



            $ui->assign('plugin',$plugin);
            $ui->assign('plugin_activity',$_L['Uninstalling Plugin']);
            $ui->assign('msg',$msg);
            view('plugin-activity');

        }

        else{
            echo 'Uninstall script not found';
        }

        break;


    case 'plugin_delete':

        define('IB_INTERNAL', true);

        if(isset($routes['2']) AND $routes['2'] != ''){

            $pl = $routes['2'];
            $pl_path = 'apps/'.$pl.'/';

            $msg = '';
            $msg .= 'Deleting Plugin...
';


            require($pl_path.'/manifest.php');

            if(APP_STAGE == 'Demo'){
                $msg .= 'Sorry, Deleting Plugin is disabled in the demo mode...
';
            }
            else{

                if(Sysfile::deleteDir($pl_path)){
                    $msg .= 'Plugin Directory Deleted Successfully
';
                }
                else{
                    $msg .= 'An Error Occurred while Deleting Plugin Directory. You may Delete this Plugin Manually - '.$pl_path.'
';
                }

            }




            $ui->assign('plugin',$plugin);
            $ui->assign('plugin_activity','Delete Plugin');
            $ui->assign('msg',$msg);
            view('plugin-activity');

        }

        else{
            echo 'Plugin not found';
        }

        break;


    case 'plugin_update':

        define('IB_INTERNAL', true);

        if(isset($routes[2]) AND $routes[2] != ''){

            $pl = $routes['2'];

            $pl_path = 'apps/'.$pl.'/';
            $msg = '';
            $msg .= 'Updating Plugin...
';
            require($pl_path.'/manifest.php');

            if(APP_STAGE == 'Demo'){
                $msg .= 'Sorry, Updating Plugin is disabled in the demo mode...
';
            }
            else{
                if(file_exists($pl_path.'/update.php')){


                    require($pl_path.'/update.php');

                }



                $msg .= 'Checking Build...
';

                $d = ORM::for_table('sys_pl')->where('c',$pl)->find_one();
                if($d){

                    if(isset($plugin['build'])){

                        $d->build = $plugin['build'];
                        $d->save();
                        $msg .= 'Build Updated to '.$plugin['build'].'
';
                    }

                }


                $msg .= 'done...
';
            }


            $ui->assign('plugin',$plugin);
            $ui->assign('plugin_activity',$_L['Installing Plugin']);
            $ui->assign('msg',$msg);
            view('plugin-activity');

        }

        else{
            echo 'Install Script not Found';
        }

        break;








    case 'customfields':

        $ui->assign('content_inner',inner_contents($config['c_cache']));
        $ui->assign('xheader', Asset::css(array('modal')));
        $ui->assign('xfooter', Asset::js(array('modal')));
        $cf = ORM::for_table('crm_customfields')->where('ctype','crm')->order_by_asc('id')->find_many();

        $ui->assign('cf',$cf);

        view('customfields');

        break;

    case 'customfields-post':

        $fieldname = _post('fieldname');
        $fieldtype = _post('fieldtype');
        $description = _post('description');
        $validation = _post('validation');
        $options = _post('options');
        $showinvoice = _post('showinvoice');
        if($showinvoice != 'Yes'){
            $showinvoice = 'No';
        }
        if($fieldname != ''){

            $d = ORM::for_table('crm_customfields')->create();
            $d->fieldname = $fieldname;
            $d->fieldtype = $fieldtype;
            $d->description = $description;
            $d->regexpr = $validation;
            $d->fieldoptions = $options;
            $d->ctype = 'crm';
            $d->relid = 0;
            $d->adminonly = '';
            $d->required = '';
            $d->showorder = '';
            $d->showinvoice = $showinvoice;
            $d->sorder = '0';
            $d->save();

            echo $d->id();
        }
        else{
            echo 'Name is Required';
        }

        break;

    case 'customfields-ajax-add':

        $ui->assign('content_inner',inner_contents($config['c_cache']));
        view('ajax-add-custom-field');

        break;


    case 'customfields-ajax-edit':

        $id = $routes[2];
        $id = str_replace('f','',$id);

        $d = ORM::for_table('crm_customfields')->find_one($id);
        if($d){
            $ui->assign('d',$d);
            view('ajax-edit-custom-field');
        }
        else{
            echo 'Not Found';
        }


        break;


    case 'customfield-edit-post':

        $id = _post('id');

        $fieldname = _post('fieldname');

        if($fieldname == ''){
            ib_die('Name is Required');
        }

        $d = ORM::for_table('crm_customfields')->find_one($id);
        if($d){

            $fieldtype = _post('fieldtype');
            $description = _post('description');
            $validation = _post('validation');
            $options = _post('options');
            $showinvoice = _post('showinvoice');
            if($showinvoice != 'Yes'){
                $showinvoice = 'No';
            }
            $d->fieldname = $fieldname;
            $d->fieldtype = $fieldtype;
            $d->description = $description;
            $d->regexpr = $validation;
            $d->fieldoptions = $options;
            $d->ctype = 'crm';
            $d->relid = 0;
            $d->adminonly = '';
            $d->required = '';
            $d->showorder = '';
            $d->showinvoice = $showinvoice;
            $d->sorder = '0';
            $d->save();
            echo $id;
        }
        else{
            echo 'Not Found';
        }


        break;

    case 'update_option':

        if(APP_STAGE == 'Demo'){
            _msglog('e','Sorry, this option is disabled in the demo mode.');
            ib_close();
        }

        $opt = _post('opt');
        $val = _post('val');

        $m = route(2);

        switch ($opt){

            case 'add_fund_minimum_deposit':
            case 'add_fund_maximum_deposit':

                if(is_numeric($val)){
                    update_option($opt,$val);
                    echo '1';
                }
                else{
                    i_close('Invalid Amount');
                }


                break;


            case 'tickets_assigned_sms_notification':

                if($val == 1)
                {
                    // check SMS template is exist

                    $tpl_name = 'Ticket Assigned: Admin Notification';

                    $sms_template = SMSTemplate::where('tpl',$tpl_name)->first();

                    if(!$sms_template)
                    {
                        $sms_template = new SMSTemplate;
                        $sms_template->tpl = $tpl_name;
                        $sms_template->sms = 'Ticket - {{ticket_id}} has been assigned to you.';
                        $sms_template->save();
                    }

                }

                update_option($opt,$val);
                echo '1';

                break;


            default:

                if($m != 'silent'){

                    _msglog('s',$_L['Settings Saved Successfully']);

                }

                if($opt == 'maxmind_installed' && $val == '1'){

                    if(!file_exists('storage/mmdb/GeoLite2-City.mmdb')){
                        _msglog('e','Maxmind database- GeoLite2-City.mmdb was not found in storage/mmdb/');
                        echo 'failed';
                        exit;
                    }

                }



                if(update_option($opt,$val)){
                    echo 'ok';
                }
                else{
                    echo 'failed';
                }


        }



        break;


//    API Support from Version 3

    case 'api':
        $ui->assign('content_inner',inner_contents($config['c_cache']));
        $d = ORM::for_table('sys_api')->find_many();

        $ui->assign('d',$d);
        $ui->assign('api_url',APP_URL);

        view('api');


        break;

    case 'api_post':

        $label = _post('label');
        if($label == ''){
           r2(U.'settings/api/','e','Label is Required');
        }
        else{

            $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
            $string = '';
            $random_string_length = '40';
            for ($i = 0; $i < $random_string_length; $i++) {
                $string .= $characters[rand(0, strlen($characters) - 1)];
            }

            $d = ORM::for_table('sys_api')->create();
            $d->label = $label;
            $d->ip = '';
            $d->apikey = $string;
            $d->save();
            r2(U.'settings/api/','s',$_L['API Access Added']);
        }

        break;


    case 'api_delete':

        $id = $routes[2];
        $d = ORM::for_table('sys_api')->find_one($id);
        if($d){


            $d->delete();


            r2(U."settings/api/",'s',$_L['delete_successful']);
        }

        break;

    case 'api_regen':

        $id = $routes[2];
        $d = ORM::for_table('sys_api')->find_one($id);
        if($d){

            $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
            $string = '';
            $random_string_length = '40';
            for ($i = 0; $i < $random_string_length; $i++) {
                $string .= $characters[rand(0, strlen($characters) - 1)];
            }

            $d->apikey = $string;
            $d->save();

            r2(U."settings/api/",'s','API Key Updated');
        }

        break;


    case 'plugin_force_remove':

        $pl = $routes[2];

        $d = ORM::for_table('sys_pl')->where('c',$pl)->find_one();
        if($d){
            $d->delete();
            r2(U."dashboard/",'s','Plugin Successfully Removed.');
        }

        r2(U."dashboard/",'s','Plugin Not Found.');

        break;

    case 'activate_license':


        view('settings_activate_license');


        break;

    case 'activate_license_post':


        $fullname = _post('fullname');
        $email = _post('email');
        $purchase_key = _post('purchase_key');

        if($fullname == '' || $email == '' || $purchase_key == ''){
            r2(U.'settings/activate_license/','e','All Fields are Required.');
        }

        if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
            r2(U.'settings/activate_license/','e','Invalid Email Address');
        }


        $arr = array(
            'app_url' => APP_URL,
            'fullname' => $fullname,
            'email' => $email,
            'purchase_key' => $purchase_key
        );



        $output = Syscurl::_post('https://www.stackpi.com/activate',$arr);


        $data = json_decode($output);


        if(isset($data->{'status'})){

            $status = $data->{'status'};

            $msg = $data->{'msg'};

            if($status == 'Active'){

                $license_key = $data->{'license_key'};


                update_option('purchase_code',$purchase_code);

                // Force Cache to regenerate

                update_option('c_cache',$license_key);

                r2(U.'dashboard/','s',$msg);

            }

            else{

                r2(U.'settings/activate_license/','e',$msg);

            }


        }
        else{
            r2(U.'settings/activate_license/','e','An Error Occured, Please try again later.');
        }





        break;


    case 'about':

        $ui->assign('app_stage', APP_STAGE);
        $ui->assign('_st', $_L['About']);

      //  $xtra = Support::scripts();


        $ui->assign('xfooter',Asset::js(array('progress')));

        view('about');


        break;

    case 'add_purchase_key':

        $purchase_key = $_POST['purchase_key'];

        update_option('purchase_key',$purchase_key);

        echo 'Purchase Key Saved.'.PHP_EOL;


        break;


    case 'check_update_post':

        $purchase_key = $_POST['purchase_key'];

//        if($purchase_code == ''){
//
//            ib_die('Please Add and Save a Purchase Code to Check Update');
//
//        }

        update_option('purchase_key',$purchase_key);

        $res = updateCheck($purchase_key);

        api_response($res);

//        $arr = array(
//            'action' => 'version-check',
//            'app_url' => APP_URL,
//            'fullname' => $user->fullname,
//            'email' => $user->username,
//            'build' => $config['build'],
//            'purchase_key' => $purchase_key
//        );
//
//        $remote_build = '';
//        $changelog = '';
//        $update_available = 'No';
//        $msg = '';
//
//
//        $raw = '';
//
//
//        try{
//
//            $raw = ib_http_request($update_server.'/update-app','POST',$arr);
//
//
//
//        } catch (Exception $e){
//
//            $msg = $e->getMessage();
//
//    }
//
//
//
//
//        $resp = json_decode($raw);
//
//        if (json_last_error() === JSON_ERROR_NONE) {
//
//            if(isset($resp->build)){
//
//                $remote_build = $resp->build;
//                $changelog = $resp->changelog;
//
//                if(($config['build']) < $remote_build){
//
//                    $update_available = 'Yes';
//
//                }
//
//            }
//
//        }
//        else{
//           $msg = 'Unable to Connect Update Server';
//        }
//
//
//        $a = array(
//
//            'remote_build' => $remote_build,
//            'changelog' => $changelog,
//            'update_available' => $update_available,
//            'msg' => $msg
//
//        );
//
//
//        header('Content-Type: application/json');
//
//        echo json_encode($a);
//
//        ib_close();



//
//        //  $update_server = 'http://envato.tryib.com/';
//        $update_server = 'http://localhost/ibilling/ibilling/';
//
//        $client = new GuzzleHttp\Client(['base_uri' => $update_server]);
//
//        try {
//
//            $response = $client->request('POST', '?ng=envato/jsonapi/version_check/', [
//                'body' => 'raw data'
//            ]);
//
//           if($response->getStatusCode() == 200){
//
//               $x = $response->getBody()->read(1024*1024);
//
//               $a = json_decode($x);
//
//               if($a){
//
//               }
//               else{
//                   echo 'Server Invalid Response';
//               }
//
//
//
//
//
//
//           }
//           else{
//               echo 'Unable to Connect Server';
//           }
//
//
//
//        } catch (Exception $e) {
//            echo 'Caught exception: ',  $e->getMessage(), "\n";
//
//        }










        break;

    case 'backup_logo':


        header('Content-Type: application/json');

        if(APP_STAGE == 'Demo'){

            $a = array(

                'continue' => 'No',
                'message' => 'This option is disabled in the demo mode.'

            );




            echo json_encode($a);

            ib_close();

        }

        $file = 'storage/system/logo.png';
        $newfile = './logo.png';



        $message = '';
        $continue = 'No';


        if (!copy($file, $newfile)) {
            $message = "failed to copy $file";
        }
        else{
            $message = "File Copied: $file ...";
            $continue = 'Yes';

        }

        $a = array(

            'continue' => $continue,
            'message' => $message

        );




        echo json_encode($a);

        ib_close();

        break;



    case 'backup_app':


        if(APP_STAGE == 'Demo'){

            $a = array(

                'continue' => 'No',
                'message' => 'This option is disabled in the demo mode.'

            );




            echo json_encode($a);

            ib_close();

        }


        $backup = new Backup;

        $backupDB = $backup->backupDB();

        $message = '';
        $continue = 'No';

        if($backupDB['success']){
            $continue = 'Yes';
            $message = $backupDB['message'];

        }
        else{
            $continue = 'No';
            $message = $backupDB['message'];
        }




        $a = array(

            'continue' => $continue,
            'message' => $message

        );


        api_response($a);



        break;

    case 'get_latest':



        $message = '';
        $continue = 'No';

        $purchase_key = $config['purchase_key'];

        if($purchase_key == ''){

            $a = array(

                'continue' => 'No',
                'message' => 'Purchase Code Not Found. Please save Purchase code before update...'

            );

            api_response($a);


        }

        // create download link

        $arr = array(
            'app_url' => APP_URL,
            'item_id' => 1,
            'purchase_key' => $purchase_key
        );


        $raw = ib_http_request($update_server.'/create-download-link','POST',$arr);




        $resp = json_decode($raw);



        if (json_last_error() === JSON_ERROR_NONE) {



            if (isset($resp->success)) {

                $success = $resp->success;
                if($success == true){

                    $a = array(

                        'continue' => 'Yes',
                        'message' => $resp->message,
                        'link' => $resp->link

                    );

                    api_response($a);

                }

                else{

                    $a = array(

                        'continue' => 'No',
                        'message' => $resp->message

                    );

                    api_response($a);

                }

            }

            else{

                $a = array(

                    'continue' => 'No',
                    'message' => 'Unable to communicate download server.'

                );

                api_response($a);

            }

        }

        else{

            $a = array(

                'continue' => 'No',
                'message' => $raw

            );

            api_response($a);

        }


//        if(!@copy('http://someserver.com/somefile.zip','./somefile.zip'))
//        {
//            $errors= error_get_last();
//            $a = array(
//
//                'continue' => 'No',
//                'message' => "COPY ERROR: ".$errors['type']. ' ' . $errors['message']
//
//            );
//
//            echo json_encode($a);
//
//            ib_close();
//        } else {
//            $a = array(
//
//                'continue' => 'Yes',
//                'message' => 'File copied from remote!'
//
//            );
//
//            echo json_encode($a);
//
//            ib_close();
//
//        }


        break;

    case 'dl_latest':

        if(function_exists('ini_set')){

            ini_set('memory_limit', '512M');
            ini_set('max_execution_time', 300);


        }

        header('Content-Type: application/json');
        $link = $_POST['link'];

        $a = array(

            'continue' => 'No',
            'message' => "Unable to Receive File from: ".$link

        );

//        if(!@copy($link,'./ibilling.zip'))
//        {
////            $errors= error_get_last();
////            $a = array(
////
////                'continue' => 'No',
////                'message' => "COPY ERROR: ".$errors['type']. ' ' . $errors['message']
////
////            );
////
////            echo json_encode($a);
////
////            ib_close();
//
//            $h = new IBilling_Http();
//
//
//            $r = $h->open($link)->setFileName('./ibilling.zip')->then('download');
//
//
//
//            $a = array(
//
//                'continue' => 'Yes',
//                'message' => 'File copied from remote!'
//
//            );
//
//            echo json_encode($a);
//
//            ib_close();
//
//        }
//
//
//        else {
//
//            // Try with ibilling Native downloader
//
//            $a = array(
//
//                'continue' => 'Yes',
//                'message' => 'File copied from remote!'
//
//            );
//
//            echo json_encode($a);
//
//            ib_close();
//
//        }


        // New method


        $h = new IBilling_Http();

        $latest_file = _raid(16).'.zip';

        update_option('latest_file',$latest_file);

        try{

            $r = $h->open($link)->setFileName($latest_file)->then('download');

            $a = array(

                'continue' => 'Yes',
                'message' => 'File copied from remote! - '.$latest_file

            );

            echo json_encode($a);

            ib_close();


        } catch (Exception $e){


            $a = array(

                'continue' => 'No',
                'message' => $e->getMessage()

            );

            echo json_encode($a);

            ib_close();

        }



        echo json_encode($a);

        ib_close();

        break;

    case 'dl_unzip':
        header('Content-Type: application/json');
        $msg = '';


        $file = $config['latest_file'];

        $path = './';


//        $a = array(
//            'continue' => 'No',
//            'message' => 'Unzipping will only work in Live Mode!'
//        );
//
//        echo json_encode($a);
//        ib_close();

        if(!file_exists($file)){
            $a = array(

                'continue' => 'No',
                'message' => 'File Not Found!'

            );

            echo json_encode($a);
            ib_close();
        }

        if (class_exists('ZipArchive')) {
            $zip = new ZipArchive;

            $res = $zip->open($file);
            if ($res === TRUE) {

                $zip->extractTo($path);


                if($zip->close()){

                    if(file_exists('./'.$config['latest_file'])){
                        unlink('./'.$config['latest_file']);
                    }

                }


            } else {

                $msg .= 'An error occured while unzipping the file'.PHP_EOL;
            }
        }

        else{
            $msg .= 'PHP ZipArchive Class is not Available!'.PHP_EOL;
        }

        if($msg != ''){

            if(file_exists('./'.$config['latest_file'])){
                unlink('./'.$config['latest_file']);
            }

            $a = array(

                'continue' => 'No',
                'message' => $msg

            );



        }
        else{

            $a = array(

                'continue' => 'Yes',
                'message' => 'File Extracted!'

            );

        }


        echo json_encode($a);


        break;

    case 'update_complete':

//        $directory = 'ui/compiled';
//        $files = array_diff(scandir($directory), array('..', '.','index.html'));
//
//        foreach ($files as $file){
//
//
//            echo 'Removing Cache File: '.$file.PHP_EOL;
//
//            unlink('ui/compiled/'.$file);
//
//
//            // removing install directory
//
//
//            $fs = new IBilling_FileSystem();
//
//            try {
//                $fs->deleteDir('install/');
//            } catch (Exception $e) {
//                echo '============================='.PHP_EOL;
//
//                echo 'Deleting installer directory is ignored.'.PHP_EOL;
//
//            }
//
//
//        }


//        if(file_exists('./logo.png')){
//
//            rename('./logo.png', 'storage/system/logo.png');
//
//            echo '============================='.PHP_EOL;
//
//            echo 'Logo Restored.'.PHP_EOL;
//
//            echo '============================='.PHP_EOL;
//
//        }




      //  echo ib_http_request(U.'update/ajax/').PHP_EOL;

        echo '============================='.PHP_EOL;

        echo 'Update Completed. You can save this log message for debug.'.PHP_EOL;

      //  update_option('ib_u_a', '0');


        break;

    case 'get_plugin':


        $msg = '';

        $pl_url = _post('pl_url');

        // check URL is correct

        if (filter_var($pl_url, FILTER_VALIDATE_URL) === false) {

            $msg .= 'Invalid URL.';

        }


        if($msg == ''){


            r2(U.'settings/plugins','s','No valid plugin header found.');

        }

        else{
            r2(U.'settings/plugins','e',$msg);
        }







        break;

    case 'url_rewrite':

        if(APP_STAGE == 'Demo'){
            r2(U.'dashboard/','e',$_L['disabled_in_demo']);
        }

        $set = route(2);

        if($set == 'yes'){

            $ui->assign('xfooter',Asset::js(array('settings/url_rewrite')));

//            $ui->assign('_st', $_L['Settings']);

            $ui->assign('msg','Please wait...');

            view('activity');


        }
        else{



            $fs = new IBilling_FileSystem();

            try {
                $fs->select('.htaccess')->delete();
                update_option('url_rewrite',0);
                r2(APP_URL.'/?ng=settings/app/','s',$_L['Settings Saved Successfully']);
            } catch (Exception $e) {
                update_option('url_rewrite',0);
                r2(APP_URL.'/?ng=settings/app/','s','An Error Occurred while removing .htaccess file. Error: '.$e->getMessage());
            }



        }



        break;

    case 'url_rewrite_enable':

        update_option('url_rewrite',1);

        echo 'URL rewrite enabled... <br> ';



        break;



    case 'url_rewrite_check':



        $resp = ib_http_request(U.'settings/url_rewrite_is_ok/');

        if($resp == 'ok'){

            // it's working

            echo 'ok';

        }
        else{

            // remove

            echo 'failed '.  U.'settings/url_rewrite_is_ok/';

        }


        break;

    case 'url_rewrite_is_ok':


        echo 'ok';


        break;

    case 'set_color':

        $available_color = array('light_blue','purple','indigo_blue');

        $color = route(2);

        if (in_array($color, $available_color)) {
            update_option('nstyle',$color);
        }

        switch ($color){

            case 'light_blue':

                update_option('graph_primary_color','2196f3');
                update_option('graph_secondary_color','eb3c00');

                break;


            case 'purple':

                update_option('graph_primary_color','7CB5EC');
                update_option('graph_secondary_color','434348');

                break;

            case 'indigo_blue':

                update_option('graph_primary_color','002868');
                update_option('graph_secondary_color','dc171d');

                break;


            default:

                update_option('graph_primary_color','2196f3');
                update_option('graph_secondary_color','eb3c00');

        }

        $logo_inverse_for = [
            'light_blue',
            'purple',
            'indigo_blue'
        ];

        if(in_array($color,$logo_inverse_for))
        {
            update_option('top_bar_is_dark',1);
        }
        else{
            update_option('top_bar_is_dark',0);
        }

        r2(U.'dashboard/');



        break;


    case 'recaptcha_post':


        if(APP_STAGE == 'Demo'){
            r2(U.'settings/app/','e',"This option is disabled in Demo.");
        }
        $data = ib_get_posted_data();

        update_option('recaptcha',$data['recaptcha']);
        update_option('recaptcha_sitekey',$data['recaptcha_sitekey']);
        update_option('recaptcha_secretkey',$data['recaptcha_secretkey']);

        r2(U.'settings/app','s',$_L['Settings Saved Successfully']);

        break;

    case 'custom_scripts':

        if(APP_STAGE == 'Demo'){
            r2(U.'appearance/customize/','e',"This option is disabled in Demo.");
        }

        update_option('header_scripts',$_POST['header_scripts']);
        update_option('footer_scripts',$_POST['footer_scripts']);


//        r2(U.'settings/app','s',$_L['Settings Saved Successfully']);

        r2(U.'appearance/customize/','s',$_L['Settings Saved Successfully']);


        break;


    case 'update_admin_note':

        $notes = $_POST['notes'];

        $user->notes = $notes;
        $user->save();

        echo $_L['Data Updated'];


        break;




    case 'roles':


        $roles = M::factory('Models_Role')->find_array();

        $ui->assign('roles',$roles);

        view('settings_roles');


        break;

    case 'add_role':

        $ui->assign('xfooter',Asset::js('settings/add_role'));

        $permissions = M::factory('Models_Permission')->find_array();
        $roles = M::factory('Models_Role')->find_array();

        $ui->assign('permissions',$permissions);
        $ui->assign('roles',$roles);

        view('settings_add_role');


        break;

    case 'add_role_post':

        $msg = '';

        $data = ib_posted_data();


        $rname = _post('rname');

        if($rname == 'Admin'){
            $msg .= 'Role name "Admin" is not allowed. <br>';
        }

        if($rname == ''){

            $msg .= 'Role name is required. <br>';

        }

        // check Role exist with the same name


        if(Models_Role::isExist($rname)){

            $msg .= 'Role already exist. Use Different Role Name. <br>';

        }


        if($msg == ''){

            $role = M::factory('Models_Role')->create();
            $role->rname = $rname;
            $role->save();

            $rid = $role->id();

            //

            $permissions = M::factory('Models_Permission')->find_array();

            foreach ($permissions as $p){

                $d = ORM::for_table('sys_staffpermissions')->create();

                $shortname = $p['shortname'];

                $d->rid = $rid;
                $d->pid = $p['id'];
                $d->shortname = $shortname;

                $view = $shortname.'_view';
                $edit = $shortname.'_edit';
                $create = $shortname.'_create';
                $delete = $shortname.'_delete';

                $all_data = $shortname.'_all_data';

                if(isset($data[$view])){
                    $d->can_view = 1;
                }
                else{
                    $d->can_view = 0;
                }

                if(isset($data[$edit])){
                    $d->can_edit = 1;
                }
                else{
                    $d->can_edit = 0;
                }

                if(isset($data[$create])){
                    $d->can_create = 1;
                }
                else{
                    $d->can_create = 0;
                }

                if(isset($data[$delete])){
                    $d->can_delete = 1;
                }
                else{
                    $d->can_delete = 0;
                }

                if(isset($data[$all_data])){
                    $d->all_data = 1;
                }
                else{
                    $d->all_data = 0;
                }

                $d->save();

            }

            r2(U.'settings/roles/','s',$_L['added_successful']);

        }

        else{
            r2(U.'settings/add_role/','e',$msg);
        }











        break;


    case 'edit_role':

        $id = route(2);

        $role = M::factory('Models_Role')->find_one($id);

        if($role){

            $permissions = M::factory('Models_Permission')->find_array();
            $ui->assign('permissions',$permissions);
            $ui->assign('role',$role);

            $sp = ORM::for_table('sys_staffpermissions')->where('rid',$id)->find_array();

            $ui->assign('xfooter',Asset::js('settings/add_role'));
            view('settings_edit_role');

        }
        else{
            echo 'Role Not Found.';
        }


        break;

    case 'edit_role_post':

        $id = _post('rid');

        $msg = '';

        $data = ib_posted_data();

        $role = M::factory('Models_Role')->find_one($id);

        $c_rname = $role->rname;

        if($role){

            $rid = $id;

            $rname = _post('rname');

            if($rname == 'Admin'){
                $msg .= 'Role name "Admin" is not allowed. <br>';
            }

            if($rname == ''){

                $msg .= 'Role name is required. <br>';

            }

            // check Role exist with the same name


            if($c_rname != $rname){

                if(Models_Role::isExist($rname)){

                    $msg .= 'Role already exist. Use Different Role Name. <br>';

                }

            }


            if($msg == ''){


                $role->rname = $rname;

                $role->save();

                $p = ORM::for_table('sys_staffpermissions')->where('rid',$id)->delete_many();

                $permissions = M::factory('Models_Permission')->find_array();

                foreach ($permissions as $p){

                    $d = ORM::for_table('sys_staffpermissions')->create();

                    $shortname = $p['shortname'];

                    $d->rid = $rid;
                    $d->pid = $p['id'];
                    $d->shortname = $shortname;

                    $view = $shortname.'_view';
                    $edit = $shortname.'_edit';
                    $create = $shortname.'_create';
                    $delete = $shortname.'_delete';

                    $all_data = $shortname.'_all_data';

                    if(isset($data[$view])){
                        $d->can_view = 1;
                    }
                    else{
                        $d->can_view = 0;
                    }

                    if(isset($data[$edit])){
                        $d->can_edit = 1;
                    }
                    else{
                        $d->can_edit = 0;
                    }

                    if(isset($data[$create])){
                        $d->can_create = 1;
                    }
                    else{
                        $d->can_create = 0;
                    }

                    if(isset($data[$delete])){
                        $d->can_delete = 1;
                    }
                    else{
                        $d->can_delete = 0;
                    }

                    if(isset($data[$all_data])){
                        $d->all_data = 1;
                    }
                    else{
                        $d->all_data = 0;
                    }

                    $d->save();

                }


                r2(U.'settings/edit_role/'.$id,'s',$_L['edit_successful']);

            }

            else{

                r2(U.'settings/edit_role/'.$id,'e',$msg);

            }


        }
        else{
            echo 'Role Not Found.';
        }


        break;


    case 'currencies':

        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');

        $ui->assign('_st', $_L['Currencies']);

        // Check Currency is available


        $currency = M::factory('Models_Currency');
        $currencies = $currency->find_array();



        if(!$currency->find_one()){


            // sync with home currency

            $n = $currency->create();

            $n->iso_code = $config['home_currency'];
            $n->cname = $config['home_currency'];
            $n->symbol = $config['currency_code'];
            $n->save();

        }

        $css_arr = array('modal');
        $js_arr = array('modal');

        $ui->assign('xheader', Asset::css($css_arr));
        $ui->assign('xfooter', Asset::js($js_arr));



        $ui->assign('currencies',$currencies);

        view('settings_currencies',[

        ]);



        break;

    case 'modal_add_currency':

        $home_currency = homeCurrency();

        $id = route(2);


        $currency = false;

        if($id != ''){

            $id = str_replace('ae','',$id);
            $id = str_replace('be','',$id);

            $currency = M::factory('Models_Currency')->find_one($id);

        }

        $val = array();

        if($currency){
            $f_type = 'edit';
            $val['code'] = $currency->cname;
            $val['symbol'] = $currency->symbol;
            $val['rate'] = $currency->rate;
            $val['cid'] = $currency->id;
        }
        else{
            $f_type = 'create';
            $val['code'] = '';
            $val['symbol'] = '';
            $val['rate'] = '1.0000';
            $val['cid'] = '0';
        }

        $ui->assign('f_type',$f_type);
        $ui->assign('val',$val);

        view('modal_add_currency',[
            'home_currency' => $home_currency
        ]);

        break;


    case 'add_currency_post':

        $msg = '';

        $iso_code = _post('iso_code');
        $cname = _post('iso_code');
        $symbol = _post('symbol');
        $rate = _post('rate');


        // check currency already exist

        // check create or not

        if(strlen($iso_code) != 3){
            $msg .= 'Invalid Currency Code <br>';
        }

//        if($symbol == ''){
//
//            $msg .= 'Currency Symbol is required <br>';
//
//        }

        if(!is_numeric($rate)){
            $msg .= 'Invalid Rate';
        }


        $f_type = _post('f_type');


        if($f_type == 'edit'){


            $cid = _post('cid');
            // $currency = M::factory('Models_Currency')->find_one($cid);

            $currency = Currency::find($cid);

            if($currency){

                $currency->cname = $iso_code;
                $currency->iso_code = $iso_code;
                $currency->symbol = '';
                $currency->rate = $rate;


                $currencies_total = Currency::count();
                $currencies = Currency::getAllCurrencies();


                if($currencies_total == 1){

                    update_option('home_currency', $iso_code);

                    if(isset($currencies[$iso_code])){
                        update_option('currency_code',$currencies[$iso_code]['symbol']);
                        update_option('dec_point',$currencies[$iso_code]['decimal_mark']);
                        update_option('thousands_sep',$currencies[$iso_code]['thousands_separator']);

                        if($currencies[$iso_code]['symbol_first'] == true)
                        {
                            update_option('currency_symbol_position','p');
                        }
                        else{
                            update_option('currency_symbol_position','s');
                        }
                    }

                }

                $currency->symbol = $currencies[$iso_code]['symbol'];
                $currency->save();

                $id = $currency->id;

                echo $id;

            }
            else{

                echo 'An Error Occurred';

            }


        }
        else{

            $check = M::factory('Models_Currency')->where('cname',$cname)->find_one();

            if($check){

                $msg .= 'Currency already exist <br>';

            }

            if($msg == ''){

                $currency = M::factory('Models_Currency')->create();

                $currencies = Currency::getAllCurrencies();

                $currency->cname = $iso_code;
                $currency->iso_code = $iso_code;
                if($currencies[$iso_code]){
                    $currency->symbol = $currencies[$iso_code]['symbol'];
                }
                $currency->rate = $rate;

                $currency->save();

                $id = $currency->id();

                echo $id;

            }
            else{

                echo $msg;

            }

        }

        break;


    case 'make_base_currency':

        $id = route(2);
        $id = str_replace('b','',$id);

        // find this currency

        $currency = M::factory('Models_Currency');

        $c = $currency->find_one($id);

        if($c){

            update_option('home_currency',$c->cname);


          //  update_option('currency_code',$c->symbol);

            $currencies = Currency::getAllCurrencies();

            if(isset($currencies[$c->cname])){
                update_option('currency_code',$currencies[$c->cname]['symbol']);
                update_option('dec_point',$currencies[$c->cname]['decimal_mark']);
                update_option('thousands_sep',$currencies[$c->cname]['thousands_separator']);

                if($currencies[$c->cname]['symbol_first'] == true)
                {
                    update_option('currency_symbol_position','p');
                }
                else{
                    update_option('currency_symbol_position','s');
                }
            }

            // flip the currency


        }


        r2(U.'settings/currencies/','s','Currency Updated Successfully.');


        break;


    case 'other-settings-post':

        $gmap_api_key = _post('gmap_api_key');
        $slack_webhook_url = _post('slack_webhook_url');

        update_option('gmap_api_key',$gmap_api_key);
        update_option('slack_webhook_url',$slack_webhook_url);

        update_option('customer_code_prefix',_post('customer_code_prefix'));
        update_option('income_code_prefix',_post('income_code_prefix'));
        update_option('customer_code_current_number',_post('customer_code_current_number'));
        update_option('income_code_current_number',_post('income_code_current_number'));
        update_option('expense_code_prefix',_post('expense_code_prefix'));
        update_option('expense_code_current_number',_post('expense_code_current_number'));
        update_option('contact_extra_field',_post('contact_extra_field'));

        update_option('invoice_code_prefix',_post('invoice_code_prefix'));
        update_option('invoice_code_current_number',_post('invoice_code_current_number'));
        update_option('purchase_code_prefix',_post('purchase_code_prefix'));
        update_option('purchase_code_current_number',_post('purchase_code_current_number'));
        update_option('quotation_code_prefix',_post('quotation_code_prefix'));
        update_option('quotation_code_current_number',_post('quotation_code_current_number'));


        r2(U.'settings/app/','s',$_L['Data Updated']);


        break;


    case 'units':
        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');
        $units = ORM::for_table('sys_units')->order_by_asc('sorder')->find_array();
        $ui->assign('units',$units);
        $ui->assign('_st', $_L['Units of measurement']);
        $ui->assign('xheader',Asset::css(array('modal')));
        $ui->assign('xfooter',Asset::js(array('modal','js/units')));
        view('settings_units');

        break;


    case 'modal_unit':

        $id = route(2);


        $unit = false;

        if($id != ''){

            $id = str_replace('ae','',$id);
            $id = str_replace('be','',$id);

            $unit = ORM::for_table('sys_units')->find_one($id);

        }

        $val = array();

        if($unit){
            $f_type = 'edit';
            $val['uid'] = $unit->id;
            $val['type'] = $unit->type;
            $val['name'] = $unit->name;
            $val['reference'] = $unit->reference;
            $val['conversion_factor'] = $unit->conversion_factor;

        }
        else{
            $f_type = 'create';
            $val['uid'] = '';
            $val['type'] = '';
            $val['name'] = '';
            $val['reference'] = '';
            $val['conversion_factor'] = '';
        }

        $ui->assign('f_type',$f_type);
        $ui->assign('val',$val);


        view('modal_units');

        break;


    case 'add_unit':

        $name = _post('name');
        $type = _post('type');
        $uid = _post('uid');

        if($name == '' || $type == ''){
            echo $_L['All Fields are Required'];
            exit;
        }

        $f_type = _post('f_type');

        if($f_type == 'edit'){
            $d = ORM::for_table('sys_units')->find_one($uid);
            $d->name = $name;
            $d->type = $type;
            $d->save();
            echo $d->id();
        }
        else{
            $d = ORM::for_table('sys_units')->create();
            $d->name = $name;
            $d->type = $type;
            $d->save();
            echo $d->id();
        }



        break;

    case 'clone_email_template':

        $id = route(2);

        $d = ORM::for_table('sys_email_templates')->find_one($id);
        if($d){

            $c = ORM::for_table('sys_email_templates')->create();

            $tplname = 'Custom';

            for ($x = 2; $x <= 30; $x++) {
                $e = ORM::for_table('sys_email_templates')->where('tplname',$d->tplname.': '.$x)->find_one();
                if($e){
                    continue;
                }
                else{
                    $tplname = $d->tplname.' '.$x;
                    break;
                }
            }

            $c->tplname = $tplname;
            $c->subject = $d->subject;
            $c->message = $d->message;
            $c->send = $d->send;
            $c->core = 'No';
            $c->hidden = $d->hidden;
            $c->save();

        }


        r2(U.'settings/email-templates','s',$_L['added_successful']);

        break;


    case 'expense-types':


        $e = ORM::for_table('expense_types')->order_by_asc('sorder')->find_array();

        $ui->assign('e',$e);

        $ui->assign('xfooter',Asset::js(array('js/expense_types')));

        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');

        view('settings_expense_types');





        break;


    case 'add_expense_type':

        $expense_type = _post('expense_type');

        if($expense_type == ''){
            echo 'Exepnese Type is required';
        }
        else{
            $e = new ExpenseType;
            $e->name = $expense_type;
            $e->save();

            echo $e->id;
        }





        break;


    case 'e_expense_type_edit':


        $id = _post('id');
        $id = str_replace('e','',$id);
        $e_expense_type = _post('e_expense_type');

        $d = ORM::for_table('expense_types')->find_one($id);

        if($d){

            // update all gname in contacts

            $o_name = $d->name;

            ORM::execute("update sys_transactions set sub_type='$e_expense_type' where sub_type='$o_name'");

            $d->name = $e_expense_type;

            $d->save();

            echo $d->id;



        }


        break;


    case 'tax-make-default':

        $id = route(2);

        $tax = Tax::find($id);

        if($tax){

            $prev_tax = Tax::where('is_default','1')->first();

            if($prev_tax){
                $prev_tax->is_default = 0;
                $prev_tax->save();
            }

            $tax->is_default = 1;

            $tax->save();

        }

        r2(U.'tax/list','s',$_L['Data Updated']);



        break;


    case 'set_build':

        $build = route(2);

        update_option('build',$build);

        echo 'ok';

        break;




    case 'set_notify':



        $opt = _post('opt');

        $val = _post('val');




        if($opt == 'email_notify'){
            $user->email_notify = $val;
        }
        elseif ($opt == 'sms_notify'){
            $user->sms_notify = $val;
        }
        else{

        }

        $user->save();

        echo 1;




        break;




//

    default:
        echo 'action not defined';
}