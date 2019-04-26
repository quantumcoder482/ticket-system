<?php

$version = route(1);

if (isset($_SERVER['HTTP_ORIGIN'])) {
    // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
    // you want to allow, and if so:
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
}

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        // may also be using PUT, PATCH, HEAD etc
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}

switch ($version){

    case 'v2':

        if(isset($_GET['_METHOD']))
        {
            $method = $_GET['_METHOD'];
        }
        else{
            $method = $_SERVER['REQUEST_METHOD'];
        }

        header('Access-Control-Allow-Origin: *');

        apiAuth();

        $object = route(2);

        switch ($object){ 

            case 'customers':

                switch ($method){

                    case 'GET':

                        jsonResponse(Contact::orderBy('id','desc')->get()->toArray());


                        break;


                    case 'POST':




                        break;


                    case 'PUT':


                        break;


                    case 'DELETE':


                        break;


                    default:

                        jsonResponse([
                            'error' => true,
                            'message' => 'Unknown Method!'
                        ]);

                        break;
                }


                break;

            case 'customer':


                switch ($method){

                    case 'GET':


                        $id = route(3);

                        $contact = Contact::find($id)->toArray();

                        if($contact)
                        {
                            jsonResponse($contact);
                        }
                        else{
                            jsonResponse([
                                'error' => true,
                                'message' => 'Contact not found!'
                            ]);
                        }


                        break;


                    case 'POST':

                        $errors = [];

                        $account = _post('account');

                        $type_customer = _post('customer');
                        $type_supplier = _post('supplier');

                        $type = $type_customer.','.$type_supplier;
                        $type = trim($type,',');

                        if($type == ''){
                            $type = 'Customer';
                        }


                        //  $company = _post('company');

                        $company_id = _post('company_id');

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


                        $owner_id = _post('owner_id');

                        if($owner_id == '')
                        {
                            $owner_id = 0;
                        }

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



                        if($currency == ''){
                            $currency = '0';
                        }

                        if(isset($_POST['tags']) AND ($_POST['tags']) != ''){
                            $tags = $_POST['tags'];
                        }
                        else{
                            $tags = '';
                        }



                        if($account == ''){
                            $errors[] = $_L['Account Name is required'];
                        }


                        if($email != ''){

                            $f = ORM::for_table('crm_accounts')->where('email',$email)->find_one();

                            if($f){
                                $errors[] =  $_L['Email already exist'];
                            }
                        }


                        if($phone != ''){

                            $f = ORM::for_table('crm_accounts')->where('phone',$phone)->find_one();

                            if($f){
                                $errors[] =  $_L['Phone number already exist'];
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

                        $u_password = '';


                        if($password != ''){


                            $u_password = $password;
                            $password = Password::_crypt($password);


                        }






                        if(empty($errors)){

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
                            $d->o = $owner_id;
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


                            //

                            //

                            $drive = time().Ib_Str::random_string(12);

                            $d->drive = $drive;

                            //
                            $d->save();
                            $cid = $d->id();
                            _log($_L['New Contact Added'].' '.$account.' [CID: '.$cid.']','Admin',$owner_id);

                            //now add custom fields
                            $fs = ORM::for_table('crm_customfields')->where('ctype','crm')->order_by_asc('id')->find_array();
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

                            jsonResponse([
                                'error' => false,
                                'contact_id' => $cid,
                                'message' => $_L['account_created_successfully']
                            ]);



                        }
                        else{
                            jsonResponse([
                                'error' => true,
                                'message' => $errors
                            ]);
                        }


                        break;


                    case 'PUT':


                        break;


                    case 'DELETE':


                        break;


                    default:

                        jsonResponse([
                            'error' => true,
                            'message' => 'Unknown Method!'
                        ]);

                        break;
                }


                break;


            case 'transactions':

                switch ($method){

                    case 'GET':

                        jsonResponse(Contact::orderBy('id','desc')->get()->toArray());


                        break;


                    case 'POST':



                        break;


                    case 'PUT':


                        break;


                    case 'DELETE':


                        break;


                    default:

                        jsonResponse([
                            'error' => true,
                            'message' => 'Unknown Method!'
                        ]);

                        break;
                }


                break;


            case 'accounts':

                switch ($method){

                    case 'GET':

                        jsonResponse(Contact::orderBy('id','desc')->get()->toArray());


                        break;


                    case 'POST':



                        break;


                    case 'PUT':


                        break;


                    case 'DELETE':


                        break;


                    default:

                        jsonResponse([
                            'error' => true,
                            'message' => 'Unknown Method!'
                        ]);

                        break;
                }


                break;



            case 'users':


                switch ($method){

                    case 'GET':

                        jsonResponse(User::orderBy('id','desc')->get()->toArray());


                        break;




                    default:

                        jsonResponse([
                            'error' => true,
                            'message' => 'Unknown Method!'
                        ]);

                        break;
                }

                break;



            case 'user':

                switch ($method){

                    case 'GET':

                        $id = route(3);

                        $user = User::find($id)->toArray();

                        if($user)
                        {
                            jsonResponse($user);
                        }
                        else{
                            jsonResponse([
                                'error' => true,
                                'message' => 'User not found!'
                            ]);
                        }


                        break;


                    case 'POST':

                        $username = _post('username');
                        $fullname = _post('fullname');
                        $password = _post('password');
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

                        $errors = [];



//check with same name account is exist
                        $d = ORM::for_table('sys_users')->where('username',$username)->find_one();
                        if($d){
                            $errors[] = $_L['account_already_exist'];
                        }


                        // create Roles




                        if(empty($errors)){

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

                           // r2(U . 'settings/users', 's', $_L['account_created_successfully']);

                            jsonResponse([
                                'error' => false,
                                'user_id' => $d->id(),
                                'message' => $_L['account_created_successfully']
                            ]);

                        }
                        else{
                            jsonResponse([
                                'error' => true,
                                'message' => $errors
                            ]);
                        }


                        break;


                    case 'PUT':


                        break;


                    case 'DELETE':


                        break;


                    default:

                        jsonResponse([
                            'error' => true,
                            'message' => 'Unknown Method!'
                        ]);

                        break;
                }


                break;



            case 'invoice':

                switch ($method){

                    case 'GET':

                        $id = route(3);

                        $invoice = Invoice::find($id)->toArray();

                        if($invoice)
                        {
                            $items = InvoiceItem::where('invoiceid',$id)->get()->toArray();
                            jsonResponse([
                                'invoice' => $invoice,
                                'items' => $items
                            ]);
                        }
                        else{
                            jsonResponse([
                                'error' => true,
                                'message' => 'Invoice not found!'
                            ]);
                        }


                        break;


                    case 'POST':

                        $items = $_POST['items'];

                        $i = 0;

                        $description = [];
                        $item_number = [];
                        $qty = [];
                        $amount = [];
                        $tax_rate = [];

                        foreach ($items as $api_item)
                        {
                            $description[$i] = $api_item['description'];
                            $item_number[$i] = $api_item['item_code'];
                            $qty[$i] = $api_item['qty'];
                            $amount[$i] = $api_item['amount'];
                            $taxed[$i] = $api_item['taxed'];

                            $i++;
                        }

                        $cid = _post('cid');
                        $admin_id = _post('admin_id');

                        if($admin_id == ''){
                            $admin_id = 0;
                        }

                        // find user with cid

                        $u = ORM::for_table('crm_accounts')->find_one($cid);
                        $errors = [];
                        if ($cid == '') {
                            $errors[] = $_L['select_a_contact'];
                        }

                        $notes = _post('notes');

                        $show_quantity_as = _post('show_quantity_as');

                        // find currency

                        $currency_id = _post('currency');
                        $currency_find = Currency::where('iso_code',$currency_id)->first();
                        if ($currency_find) {
                            $currency = $currency_find->id;
                            $currency_symbol = $currency_find->symbol;
                            $currency_rate = $currency_find->rate;
                        }
                        else {
                            $currency = 0;
                            $currency_symbol = $config['currency_code'];
                            $currency_rate = 1.0000;
                        }

                        if (empty($amount)) {
                            $errors[] = $_L['at_least_one_item_required'];
                        }

                        $idate = _post('idate');
                        $its = strtotime($idate);
                        $duedate = _post('duedate');
                        $dd = '';
                        if ($duedate == 'due_on_receipt') {
                            $dd = $idate;
                        }
                        elseif ($duedate == 'days3') {
                            $dd = date('Y-m-d', strtotime('+3 days', $its));
                        }
                        elseif ($duedate == 'days5') {
                            $dd = date('Y-m-d', strtotime('+5 days', $its));
                        }
                        elseif ($duedate == 'days7') {
                            $dd = date('Y-m-d', strtotime('+7 days', $its));
                        }
                        elseif ($duedate == 'days10') {
                            $dd = date('Y-m-d', strtotime('+10 days', $its));
                        }
                        elseif ($duedate == 'days15') {
                            $dd = date('Y-m-d', strtotime('+15 days', $its));
                        }
                        elseif ($duedate == 'days30') {
                            $dd = date('Y-m-d', strtotime('+30 days', $its));
                        }
                        elseif ($duedate == 'days45') {
                            $dd = date('Y-m-d', strtotime('+45 days', $its));
                        }
                        elseif ($duedate == 'days60') {
                            $dd = date('Y-m-d', strtotime('+60 days', $its));
                        }
                        else {
                            $errors[] = 'Invalid Date';
                        }

                        if (!$dd) {
                            $errors[] = 'Date Parsing Error';
                        }

                        $repeat = _post('repeat');
                        $nd = $idate;
                        if ($repeat == '0') {
                            $r = '0';
                        }
                        elseif ($repeat == 'daily') {
                            $r = '+1 day';
                            $nd = date('Y-m-d', strtotime('+1 day', $its));
                        }
                        elseif ($repeat == 'week1') {
                            $r = '+1 week';
                            $nd = date('Y-m-d', strtotime('+1 week', $its));
                        }
                        elseif ($repeat == 'weeks2') {
                            $r = '+2 weeks';
                            $nd = date('Y-m-d', strtotime('+2 weeks', $its));
                        }
                        elseif ($repeat == 'weeks3') {
                            $r = '+3 weeks';
                            $nd = date('Y-m-d', strtotime('+3 weeks', $its));
                        }
                        elseif ($repeat == 'weeks4') {
                            $r = '+4 weeks';
                            $nd = date('Y-m-d', strtotime('+4 weeks', $its));
                        }
                        elseif ($repeat == 'month1') {
                            $r = '+1 month';
                            $nd = date('Y-m-d', strtotime('+1 month', $its));
                        }
                        elseif ($repeat == 'months2') {
                            $r = '+2 months';
                            $nd = date('Y-m-d', strtotime('+2 months', $its));
                        }
                        elseif ($repeat == 'months3') {
                            $r = '+3 months';
                            $nd = date('Y-m-d', strtotime('+3 months', $its));
                        }
                        elseif ($repeat == 'months6') {
                            $r = '+6 months';
                            $nd = date('Y-m-d', strtotime('+6 months', $its));
                        }
                        elseif ($repeat == 'year1') {
                            $r = '+1 year';
                            $nd = date('Y-m-d', strtotime('+1 year', $its));
                        }
                        elseif ($repeat == 'years2') {
                            $r = '+2 years';
                            $nd = date('Y-m-d', strtotime('+2 years', $its));
                        }
                        elseif ($repeat == 'years3') {
                            $r = '+3 years';
                            $nd = date('Y-m-d', strtotime('+3 years', $its));
                        }
                        else {
                            $errors[] = 'Date Parsing Error';
                        }

                        if(empty($errors)){

                           // $qty = $_POST['qty'];
                          //  $item_number = $_POST['item_code'];

//                            if (isset($_POST['taxed'])) {
//                                $taxed = $_POST['taxed'];
//                            }
//                            else {
//                                $taxed = false;
//                            }

                            $sTotal = '0';
                            $taxTotal = '0';
                            $i = '0';
                            $a = array();


                            $taxval = '0.00';
                            $taxname = '';
                            $taxrate = '0.00';


                            $taxed_amount = 0.00;
                            $lamount = 0.00;


                            foreach($amount as $samount) {
                                $samount = Finance::amount_fix($samount);
                                $a[$i] = $samount;

                                $sqty = $qty[$i];
                                $sqty = Finance::amount_fix($sqty);

                                $lTaxRate = $taxed[$i];
                                $lTaxRate = Finance::amount_fix($lTaxRate);


                                $sTotal+= $samount * ($sqty);
                                $lamount = $samount * ($sqty);

                                $lTaxVal = ($lamount*$lTaxRate)/100;

                                $taxed_amount += $lTaxVal;

                                $i++;
                            }




                            $invoicenum = _post('invoicenum');
                            $cn = _post('cn');
                            $fTotal = $sTotal;
                            $discount_amount = _post('discount_amount');
                            $discount_type = _post('discount_type');
                            $discount_value = '0.00';
                            if ($discount_amount == '0' OR $discount_amount == '') {
                                $actual_discount = '0.00';
                            }
                            else {
                                if ($discount_type == 'f') {
                                    $actual_discount = $discount_amount;
                                    $discount_value = $discount_amount;
                                }
                                else {
                                    $discount_type = 'p';
                                    $actual_discount = ($sTotal * $discount_amount) / 100;
                                    $discount_value = $discount_amount;
                                }
                            }

                            $actual_discount = number_format((float)$actual_discount, 2, '.', '');
                            $fTotal = $fTotal + $taxed_amount - $actual_discount;



                            $status = _post('status');
                            if ($status != 'Draft') {
                                $status = 'Unpaid';
                            }

                            $receipt_number = _post('receipt_number');

                            $datetime = date("Y-m-d H:i:s");
                            $vtoken = _raid(10);
                            $ptoken = _raid(10);
                            $d = ORM::for_table('sys_invoices')->create();
                            $d->userid = $cid;
                            $d->account = $u['account'];
                            $d->date = $idate;
                            $d->duedate = $dd;
                            $d->datepaid = $datetime;
                            $d->subtotal = $sTotal;
                            $d->discount_type = $discount_type;
                            $d->discount_value = $discount_value;
                            $d->discount = $actual_discount;
                            $d->total = $fTotal;
                            $d->tax = $taxed_amount;
                            $d->taxname = '';
                            $d->taxrate = 0.00;
                            $d->vtoken = $vtoken;
                            $d->ptoken = $ptoken;
                            $d->status = $status;
                            $d->notes = $notes;
                            $d->r = $r;
                            $d->nd = $nd;

                            $d->aid = $admin_id;

                            $d->show_quantity_as = $show_quantity_as;


                            $d->invoicenum = $invoicenum;
                            $d->cn = $cn;
                            $d->tax2 = '0.00';
                            $d->taxrate2 = '0.00';
                            $d->paymentmethod = '';



                            $d->currency = $currency;
                            $d->currency_symbol = $currency_symbol;
                            $d->currency_rate = $currency_rate;


                            $d->receipt_number = $receipt_number;


                            $d->save();
                            $invoiceid = $d->id();
                          //  $description = $_POST['desc'];

                            $i = '0';

                            foreach($description as $item) {


                                $samount = $a[$i];
                                $samount = Finance::amount_fix($samount);
                                if ($item == '' && $samount == '0.00') {
                                    $i++;
                                    continue;
                                }

                                $tax_rate = $taxed[$i];

                                $sqty = $qty[$i];
                                $sqty = Finance::amount_fix($sqty);
                                $ltotal = ($samount) * ($sqty);
                                $d = ORM::for_table('sys_invoiceitems')->create();
                                $d->invoiceid = $invoiceid;
                                $d->userid = $cid;
                                $d->description = $item;
                                $d->qty = $sqty;
                                $d->amount = $samount;
                                $d->total = $ltotal;



                                if($tax_rate == '' || $tax_rate == '0'){
                                    $tax_rate = 0.00;
                                    $d->taxed = '0';
                                }
                                else{
                                    $tax_rate = $taxed[$i];
                                    $d->taxed = '1';
                                }

                                $d->tax_rate = $tax_rate;

                                $d->type = '';
                                $d->relid = '0';
                                $d->itemcode = $item_number[$i];
                                $d->taxamount = '0.00';
                                $d->duedate = date('Y-m-d');
                                $d->paymentmethod = '';
                                $d->notes = '';



                                $d->save();

                                Inventory::decreaseByItemNumber($item_number[$i], $sqty);



                                $item_r = Item::where('name', $item)->first();
                                if ($item_r) {
                                    $item_r->sold_count = $item_r->sold_count + $sqty;
                                    $item_r->total_amount = $item_r->total_amount + $samount;
                                    $item_r->save();
                                }

                                $i++;
                            }



                            jsonResponse([
                                'error' => false,
                                'invoice_id' => $d->id(),
                                'message' => 'Invoice created successfully'
                            ]);

                        }
                        else {
                            jsonResponse([
                                'error' => true,
                                'message' => $errors
                            ]);
                        }


                        break;


                    case 'PUT':

                        $id = route(3);

                        $invoice = Invoice::find($id);

                        if($invoice)
                        {

                            parse_str(file_get_contents("php://input"),$params);

                            if(isset($params['status']))
                            {
                                $invoice->status = $params['status'];
                            }



                            $invoice->save();

                            jsonResponse([
                                'invoice_id' => $id,
                                'message' => 'Invoice updated!'
                            ]);
                        }
                        else{
                            jsonResponse([
                                'error' => true,
                                'message' => 'Invoice not found!'
                            ]);
                        }
                        break;


                    case 'DELETE':


                        break;


                    default:

                        jsonResponse([
                            'error' => true,
                            'message' => 'Unknown Method!'
                        ]);

                        break;
                }


                break;



            case 'roles':

                switch ($method){

                    case 'GET':

                        jsonResponse(DB::table('sys_roles')->get()->toArray());


                        break;


                    case 'POST':




                        break;


                    case 'PUT':


                        break;


                    case 'DELETE':


                        break;


                    default:

                        jsonResponse([
                            'error' => true,
                            'message' => 'Unknown Method!'
                        ]);

                        break;
                }


                break;



            case 'system':


                if(APP_STAGE == 'Demo')
                {
                    jsonResponse([
                        'error' => true,
                        'message' => 'Not available in demo!'
                    ]);
                }

                switch ($method){

                    case 'GET':

                        jsonResponse(Util::systemInfo());


                        break;


                    case 'POST':

                        $cmd = _post('cmd');

                        switch ($cmd)
                        {
                            case 'backup_files':

                                clxPerformLongProcess();

                                $taskId = _post('task_id');

                                if($taskId == '')
                                {
                                    jsonResponse([
                                        'error' => true,
                                        'message' => 'Please provide a task id.'
                                    ]);
                                }

                                $backup = Util::backupFiles($taskId);

                                jsonResponse($backup);


                                break;

                            case 'backup_database':


                                clxPerformLongProcess();
                                $taskId = _post('task_id');

                                if($taskId == '')
                                {
                                    jsonResponse([
                                        'error' => true,
                                        'message' => 'Please provide a task id.'
                                    ]);
                                }


                                $backup = Util::backupDatabase($taskId);

                                jsonResponse($backup);


                                break;

                            case 'task_log':
                                $taskId = _post('task_id');

                                if($taskId == '')
                                {
                                    jsonResponse([
                                        'error' => true,
                                        'message' => 'Please provide a task id.'
                                    ]);
                                }

                                jsonResponse(Util::getTaskLog($taskId));

                                break;

                            case 'upload_file':

                                $upload = Util::fileUpload();
                                jsonResponse($upload);

                                break;

                            case 'download_file':

                                $file_url = _post('file_url');
                                $file_name = _post('file_name');

                                $download = Util::downloadFile($file_url,$file_name);
                                jsonResponse($download);

                                break;

                            case 'unzip_file':

                                $file_name = _post('file_name');

                                $unzip = Util::extractFile($file_name);

                                jsonResponse($unzip);


                                break;


                            case 'schema_update':

                                $message = Update::singleCommand();
                                updateOption('build',$file_build);
                                jsonResponse([
                                    'success' => true,
                                    'message' => $message
                                ]);


                                break;


                        }


                        break;


                    case 'PUT':


                        break;


                    case 'DELETE':


                        break;


                    default:

                        jsonResponse([
                            'error' => true,
                            'message' => 'Unknown Method!'
                        ]);

                        break;
                }


                break;



            default:

                jsonResponse([
                    'error' => true,
                    'message' => 'Unknown resources requested!'
                ]);

                break;

        }




        break;


    case 'create-lead':

        $validator = new Validator;
        $data = $request->all();

        if(has_data($data,'last_name'))
        {
            $lead = new Lead;
            $create = Leads::create($data);
            jsonResponse([
                'success' => true
            ]);
        }
        else{
            jsonResponse([
                'success' => false,
                'errors' => [
                    'Last name is required'
                ]
            ]);
        }

        break;


    case 'client-auth':

        $validator = new Validator;
        $data = $request->all();
        $validation = $validator->validate($data, [
            'username' => 'required|email',
            'password' => 'required',
        ]);




        if ($validation->fails()) {
            jsonResponse([
                'success' => false,
                'errors' => $validation->errors()->all()
            ]);
        } else {
            $client = Contact::where('email',$data['username'])->first();

            if($client)
            {
                if(Password::_verify($data['password'],$client->password) == true){

                    if($client->autologin == '')
                    {
                        $token = Ib_Str::random_string(20).$id.time();
                        $client->autologin = $token;
                        $client->save();

                    }
                    else{
                        $token = $client->autologin;
                    }
                    jsonResponse([
                        'success' => true,
                        'client' => [
                            'name' => $client->account,
                            'email' => $client->email,
                            'image' => $client->img,
                            'api_key' => $token
                        ]
                    ]);
                }
                else{
                    jsonResponse([
                        'success' => false,
                        'errors' => [
                            'Invalid Password'
                        ]
                    ]);
                }
            }

            else{
                jsonResponse([
                    'success' => false,
                    'errors' => [
                        'Invalid username or password'
                    ]
                ]);
            }

        }

        break;



    case 'client':

        if(isset($_GET['_METHOD']))
        {
            $method = $_GET['_METHOD'];
        }
        else{
            $method = $_SERVER['REQUEST_METHOD'];
        }

        header('Access-Control-Allow-Origin: *');
        $client = clientApiAuth();



        $account = [
            'name' => $client->account,
            'email' => $client->email,
            'phone' => $client->phone,
	        'address' => $client->address,
	        'city' => $client->city,
	        'state' => $client->state,
	        'zip' => $client->zip,
	        'country' => $client->country,
	        'image' => $client->image
        ];

        $object = route(2);

        switch ($object) {

            case 'dashboard':

                switch ($method) {

                    case 'GET':

                        $invoices = Invoice::where('userid',$client->id)
                            ->orderBy('id','desc')
                            ->limit(5)
                            ->get();

                        $recent_invoices = [];

                        foreach ($invoices as $invoice)
                        {
                            $recent_invoices[] = [
                                'client' => $invoice->account,
                                'amount' => $invoice->total,
                                'amount_formatted' => formatCurrency($invoice->total,$invoice->currency_iso_code),
                                'issued_date' => $invoice->date,
                                'issued_date_formatted' => date( $config['df'], strtotime($invoice->date)),
                                'due_date' => $invoice->due_date,
                                'due_date_formatted' => date( $config['df'], strtotime($invoice->duedate)),
                                'status' => $invoice->status,
                                'preview_url' => getInvoicePreviewUrl($invoice)

                            ];
                        }

                        $recent_transactions = [];

                        jsonResponse([
                            'account' => $account,
                            'recent_invoices' => $recent_invoices,
                            'recent_transactions' => $recent_transactions,
                        ]);

                        break;


                    case 'POST':


                        break;


                    case 'PUT':


                        break;


                    case 'DELETE':


                        break;


                    default:

                        jsonResponse([
                            'error' => true,
                            'message' => 'Unknown Method!'
                        ]);

                        break;
                }


                break;


	        case 'invoices':

		        switch ($method) {

			        case 'GET':

				        $invoices = Invoice::where('userid',$client->id)
				                           ->orderBy('id','desc')
				                           ->limit(100)
				                           ->get();

				        $invoices_data = [];

				        foreach ($invoices as $invoice)
				        {
					        $invoices_data[] = [
						        'client' => $invoice->account,
						        'amount' => $invoice->total,
						        'amount_formatted' => formatCurrency($invoice->total,$invoice->currency_iso_code),
						        'issued_date' => $invoice->date,
						        'issued_date_formatted' => date( $config['df'], strtotime($invoice->date)),
						        'due_date' => $invoice->due_date,
						        'due_date_formatted' => date( $config['df'], strtotime($invoice->duedate)),
						        'status' => $invoice->status,
						        'preview_url' => getInvoicePreviewUrl($invoice)

					        ];
				        }

				        jsonResponse([
					        'account' => $account,
					        'invoices' => $invoices_data
				        ]);

				        break;

		        }

	        	break;


	        case 'quotes':

		        switch ($method) {

			        case 'GET':

				        $quotes = Quote::where('userid',$client->id)
				                           ->orderBy('id','desc')
				                           ->limit(1000)
				                           ->get();

				        $quotes_data = [];


				        foreach ($quotes as $quote)
				        {
					        $quotes_data[] = [
					        	'subject' => $quote->subject,
						        'total' => $quote->total,
						        'total_formatted' => formatCurrency($quote->total,$config['home_currency']),
						        'issued_date' => $quote->datecreated,
						        'valid_until_date' => $quote->validuntil,
						        'issued_date_formatted' => date( $config['df'], strtotime($quote->datecreated)),
						        'valid_until_date_formatted' => date( $config['df'], strtotime($quote->validuntil)),
						        'status' => $quote->status,
						        'preview_url' => U . 'client/q/' . $quote->id . '/token_' . $quote->vtoken

					        ];
				        }

				        jsonResponse([
					        'account' => $account,
					        'quotes' => $quotes_data
				        ]);

				        break;

		        }

		        break;

	        case 'transactions':

	        	switch ($method)
		        {
			        case 'GET':

			        	$transactions = Transaction::where('payerid',$client->id)
					        ->orWhere('payeeid',$client->id)
					        ->limit(1000)
					        ->get();

			        	$transactions_data = [];

			        	foreach ($transactions as $transaction)
				        {
				        	$transactions_data[] = [
				        		'date' => $transaction->date,
						        'date_formatted' => date( $config['df'], strtotime($transaction->date)),
						        'account' => $transaction->account,
						        'amount' => $transaction->amount,
						        'amount_formatted' => formatCurrency($transaction->amount,$config['home_currency']),
						        'description' => $transaction->description
					        ];
				        }

				        jsonResponse([
					        'account' => $account,
					        'transactions' => $transactions_data
				        ]);

			        	break;
		        }

	        	break;

	        case 'articles':
	        case 'kb':

	        switch ($method)
	        {
		        case 'GET':

			        $articles = Knowledgebase::where('status','Published')
			                                           ->where('is_public',1)

			                                           ->select('id','title','slug')
			                                           ->get();

			        $articles_data = [];

			        foreach ($articles as $article)
			        {
				        $articles_data[] = [
					        'id' => $article->id,
					        'title' => $article->title,
					        'slug' => $article->slug
				        ];
			        }

			        jsonResponse([
				        'account' => $account,
				        'articles' => $articles_data
			        ]);

			        break;
	        }

	        	break;


	        case 'tickets':

		        switch ($method)
		        {
			        case 'GET':

				        $tickets = Ticket::where('userid',$client->id)
				                                 ->select([
				                                 	'id',
					                                 'tid',
					                                 'did',
					                                 'aid',
					                                 'dname',
					                                 'account',
					                                 'email',
					                                 'created_at',
					                                 'updated_at',
					                                 'subject',
					                                 'status',
					                                 'urgency',
					                                 'admin',
					                                 'last_reply'
				                                 ])
				                                 ->get();

				        $tickets_data = [];

				        foreach ($tickets as $ticket)
				        {
					        $tickets_data[] = [
						        'id' => $ticket->id,
						        'ticket_id' => $ticket->tid,
						        'ticket_department_id' => $ticket->did,
						        'ticket_department_name' => $ticket->dname,
						        'email' => $ticket->email,
						        'created_at' => $ticket->created_at,
						        'created_at_formatted' => date( $config['df'], strtotime($ticket->created_at)),
						        'updated_at' => $ticket->updated_at,
						        'updated_at_formatted' => date( $config['df'], strtotime($ticket->updated_at)),
						        'subject' => $ticket->subject,
						        'status' => $ticket->status,
						        'urgency' => $ticket->urgency,
						        'last_reply' => $ticket->last_reply
					        ];
				        }

				        jsonResponse([
					        'account' => $account,
					        'tickets' => $tickets_data
				        ]);

				        break;
		        }

	        	break;


	        case 'orders':

		        switch ($method)
		        {
			        case 'GET':

				        $orders = Order::where('cid',$client->id)
				                         ->select([
					                         'id',
					                         'ordernum',
					                         'status',
					                         'date_added',
					                         'amount',
				                         ])
				                         ->get();

				        $orders_data = [];

				        foreach ($orders as $order)
				        {
					        $orders_data[] = [
						        'id' => $order->id,
						        'order_number' => $order->ordernum,
						        'status' => $order->status,
						        'date' => $order->date_added,
						        'date_formatted' => date( $config['df'], strtotime($order->date_added)),
						        'amount' => $order->amount,
						        'amount_formatted' => formatCurrency($order->amount,$config['home_currency']),
					        ];
				        }

				        jsonResponse([
					        'account' => $account,
					        'orders' => $orders_data
				        ]);

				        break;
		        }

		        break;


            case 'profile':
                switch ($method) {

                    case 'GET':

                        jsonResponse([
                            'account' => $account,
                        ]);

                        break;


                    case 'POST':


                        break;


                    case 'PUT':


                        break;


                    case 'DELETE':


                        break;


                    default:

                        jsonResponse([
                            'error' => true,
                            'message' => 'Unknown Method!'
                        ]);

                        break;
                }

                break;

	        case 'items':

		        switch ($method) {

			        case 'GET':

			        	$items = Item::select([
			        		'id',
					        'name',
					        'sales_price',
					        'item_number',
					        'type',
					        'image'
				        ])->orderBy('id','desc')->get();


			        	$items_data = [];

			        	foreach ($items as $item)
				        {
				        	$image = '';
				        	$image_thumbnail = '';

				        	if($item->image != '')
					        {
					        	$image = APP_URL.'/storage/items/'.$item->image;
					        }

					        if($item->image_thumbnail != '')
					        {
						        $image_thumbnail = APP_URL.'/storage/items/thumb_'.$item->image;
					        }

				        	$items_data[] = [
				        		'id' => $item->id,
						        'name' => $item->name,
						        'price' => $item->sales_price,
						        'type' => $item->type,
						        'image' => $image,
						        'image_thumbnail' => $image_thumbnail
					        ];
				        }

				        jsonResponse([
					        'account' => $account,
					        'items' => $items_data
				        ]);

				        break;


			        case 'POST':


				        break;


			        case 'PUT':


				        break;


			        case 'DELETE':


				        break;


			        default:

				        jsonResponse([
					        'error' => true,
					        'message' => 'Unknown Method!'
				        ]);

				        break;
		        }

	        	break;

            default:

                jsonResponse([
                    'error' => true,
                    'message' => 'Unknown request!'
                ]);

                break;
        }

        break;


    default:

        jsonResponse([
            'error' => true,
            'message' => 'Unknown API version!'
        ]);

        break;

}