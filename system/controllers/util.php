<?php
/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/
_auth();
$ui->assign('_title', $_L['Utilities'].'- '. $config['CompanyName']);
$ui->assign('_st', $_L['Utilities']);
$ui->assign('_application_menu', 'util');
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);

use Intervention\Image\ImageManager;

if(!has_access($user->roleid,'utilities')){
    permissionDenied();
}

switch ($action) {

    case 'activity':


        $ui->assign('xjq', '
	 $("#clear_logs").click(function (e) {
        e.preventDefault();
        bootbox.confirm("This will delete all logs older than 30 days. Are you sure?", function(result) {
           if(result){
               var _url = $("#_url").val();
               $.get( _url+"util/clear_logs", function( data ) {
location.reload();
});
           }
        });
    });

 ');

        $paginator = Paginator::bootstrap('sys_logs');
        $d = ORM::for_table('sys_logs')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('date')->find_many();
        $ui->assign('d',$d);
        $ui->assign('paginator',$paginator);


        view('util-activity');
        break;

    case 'ajax_logs':

        $table = 'sys_logs';

// Table's primary key
        $primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
        $df = $config['df'].' H:i:s';

        $columns = array(
            array( 'db' => 'id', 'dt' => 0 ),
            array(
                'db'        => 'date',
                'dt'        => 1,
                'formatter' => function( $d, $row) {
                    global $df;
                    return date( $df, strtotime($d));


                }
            ),
            array( 'db' => 'type',   'dt' => 2 ),
            array( 'db' => 'description',     'dt' => 3 ),
            array( 'db' => 'userid',     'dt' => 4 ),
            array( 'db' => 'ip',     'dt' => 5 ),

        );

// SQL server connection information
        $sql_details = array(
            'user' => DB_USER,
            'pass' => DB_PASSWORD,
            'db'   => DB_NAME,
            'host' => DB_HOST
        );


        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
         * If you just want to use the basic configuration for DataTables with PHP
         * server-side, there is no need to edit below this line.
         */

        // require( 'ssp.class.php' );

        $dt = Ssp::simple( $_GET, $sql_details, $table, $primaryKey, $columns );
        $x= json_encode(
            $dt
        );

        echo $x;

        break;

    case 'clear_logs':
        $b30 = date('Y-m-d H:i:s',strtotime('-30 days', time()));
        $d = ORM::for_table('sys_logs')
            ->where_lte('date', $b30)
            ->delete_many();
        _msglog('s',$_L['Logs has been deleted']);

        break;


    case 'sent-emails':

        $paginator = Paginator::bootstrap('sys_email_logs');
        $d = ORM::for_table('sys_email_logs')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('date')->find_many();
        $ui->assign('d',$d);
        $ui->assign('paginator',$paginator);


        view('util-sent-emails');
        break;

    case 'cronlogs':

        $paginator = Paginator::bootstrap('sys_schedulelogs','','','','','','','','',5);
        $d = ORM::for_table('sys_schedulelogs')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('date')->find_many();
        $ui->assign('d',$d);
        $ui->assign('paginator',$paginator);


        view('util_cron_logs');
        break;

    case 'ajax_sent-emails':

        $table = 'sys_email_logs';
        $df = $config['df'].' H:i:s';
// Table's primary key
        $primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
        $columns = array(
            array( 'db' => 'id', 'dt' => 0 ),
            array(
                'db'        => 'date',
                'dt'        => 1,
                'formatter' => function( $d, $row) {
                    global $df;
                    return date( $df, strtotime($d));


                }
            ),

            array( 'db' => 'email',     'dt' => 2 ),
            array( 'db' => 'subject',     'dt' => 3 ),
            array(
                'db'        => 'id',
                'dt'        => 4,
                'formatter' => function( $d, $row ) {
                    //  return date( 'jS M y', strtotime($d));
                    //
                    return '<a href="'.U.'util/view-email/'.$d.'/" class="btn btn-primary btn-outline btn-xs"><i class="fa fa-envelope-o"></i> View</a>';
                }
            )

        );

// SQL server connection information
        $sql_details = array(
            'user' => DB_USER,
            'pass' => DB_PASSWORD,
            'db'   => DB_NAME,
            'host' => DB_HOST
        );


        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
         * If you just want to use the basic configuration for DataTables with PHP
         * server-side, there is no need to edit below this line.
         */

        // require( 'ssp.class.php' );

        $x= json_encode(
            Ssp::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
        );
        //  Dev::_log($x);
        header('Content-Type: application/json');
        echo $x;

        break;




    case 'dbstatus':
        $dbc = new mysqli(DB_HOST,DB_USER ,DB_PASSWORD,DB_NAME);
        if ($result = $dbc->query('SHOW TABLE STATUS')) {
            $size = 0;
            $decimals = 2;
            $tables = array();
            while($row = $result->fetch_array()){
                $size += $row["Data_length"] + $row["Index_length"];
                $total_size = ($row[ "Data_length" ] + $row[ "Index_length" ]) / 1024;
                $tables[$row['Name']]['size'] = number_format($total_size,'0');
                $tables[$row['Name']]['rows'] = $row[ "Rows" ];
                $tables[$row['Name']]['name'] = $row[ "Name" ];
            }

            $mbytes = number_format($size/(1024*1024),$decimals,$config['dec_point'],$config['thousands_sep']);

            $ui->assign('tables',$tables);
            $ui->assign('dbsize',$mbytes);
            view('dbstatus');

        }
        break;

    case 'dbbackup':

        try {
            // open the connection to the database - $host, $user, $password, $database should already be set
            $mysqli = new mysqli(DB_HOST,DB_USER ,DB_PASSWORD,DB_NAME);

            // did it work?
            if ($mysqli->connect_errno) {
                throw new Exception("Failed to connect to MySQL: " . $mysqli->connect_error);
            }

            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Content-Type: application/force-download');
            header('Content-Type: application/octet-stream');
            header('Content-Type: application/download');
            header('Content-Disposition: attachment;filename="backup_'.date('Y-m-d_h_i_s') . '.sql"');
            header('Content-Transfer-Encoding: binary');

            // start buffering output
            // it is not clear to me whether this needs to be done since the headers have already been set.
            // However in the PHP 'header' documentation (http://php.net/manual/en/function.header.php) it says that "Headers will only be accessible and output when a SAPI that supports them is in use."
            // rather than the possibility of falling through a real time window there seems to be no problem buffering the output anyway
            ob_start();
            $f_output = fopen("php://output", 'w');

            // put a few comments into the SQL file
            print("-- pjl SQL Dump\n");
            print("-- Server version:".$mysqli->server_info."\n");
            print("-- Generated: ".date('Y-m-d h:i:s')."\n");
            print('-- Current PHP version: '.phpversion()."\n");
            print('-- Host: '.$db_host."\n");
            print('-- Database:'.$db_name."\n");

            //get a list of all the tables
            $aTables = array();
            $strSQL = 'SHOW TABLES';            // I put the SQL into a variable for debuggin purposes - better that "check syntax near '), "
            if (!$res_tables = $mysqli->query($strSQL))
                throw new Exception("MySQL Error: " . $mysqli->error . 'SQL: '.$strSQL);

            while($row = $res_tables->fetch_array()) {
                $aTables[] = $row[0];
            }

            // Don't really need to do this (unless there is loads of data) since PHP will tidy up for us but I think it is better not to be sloppy
            // I don't do this at the end in case there is an Exception
            $res_tables->free();

            //now go through all the tables in the database
            foreach($aTables as $table)
            {
                print("-- --------------------------------------------------------\n");
                print("-- Structure for '". $table."'\n");
                print("--\n\n");

                // remove the table if it exists
                //  print('DROP TABLE IF EXISTS '.$table.';');

                // ask MySQL how to create the table
                $strSQL = 'SHOW CREATE TABLE '.$table;
                if (!$res_create = $mysqli->query($strSQL))
                    throw new Exception("MySQL Error: " . $mysqli->error . 'SQL: '.$strSQL);
                $row_create = $res_create->fetch_assoc();

                print("\n".$row_create['Create Table'].";\n");


                print("-- --------------------------------------------------------\n");
                print('-- Dump Data for `'. $table."`\n");
                print("--\n\n");
                $res_create->free();

                // get the data from the table
                $strSQL = 'SELECT * FROM '.$table;
                if (!$res_select = $mysqli->query($strSQL))
                    throw new Exception("MySQL Error: " . $mysqli->error . 'SQL: '.$strSQL);

                // get information about the fields
                $fields_info = $res_select->fetch_fields();

                // now we can go through every field/value pair.
                // for each field/value we build a string strFields/strValues
                while ($values = $res_select->fetch_assoc()) {

                    $strFields = '';
                    $strValues = '';
                    foreach ($fields_info as $field) {
                        if ($strFields != '') $strFields .= ',';
                        $strFields .= "`".$field->name."`";

                        // put quotes round everything - MYSQL will do type convertion (I hope) - also strip out any nasty characters
                        if ($strValues != '') $strValues .= ',';
                        $strValues .= '"'.preg_replace('/[^(\x20-\x7F)\x0A]*/','',$values[$field->name].'"');
                    }

                    // now we can put the values/fields into the insert command.
                    print("INSERT INTO ".$table." (".$strFields.") VALUES (".$strValues.");\n");
                }
                print("\n\n\n");

                $res_select->free();

            }


        } catch (Exception $e) {
            print($e->getMessage());
        }


        fclose($f_output);
        print(ob_get_clean());
        $mysqli->close();

        break;


    case 'view-email':

        $id = $routes['2'];

        $d = ORM::for_table('sys_email_logs')->find_one($id);
        if($d){

            $ui->assign('d',$d);
            view('view-email');

        }
        else{

        }


        break;


    case 'activity-ajax':

        $d = ORM::for_table('sys_logs')->order_by_desc('id')->limit(5)->find_many();
        $html = '';
        $df = $config['df'].' H:i:s';
        foreach($d as $ds){
            $html .= ' <li>
                                <a href="javascript:void(0)">
                                    <div>
                                        '.$ds['description'].'
                                        <span class="pull-right text-muted small">'.date( $df, strtotime($ds['date'])).'</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>';
        }

        $html .= '<li>
                                <div class="text-center link-block">
                                    <a href="'.U.'util/activity/">
                                        <strong>'.$_L['See All Activity'].' </strong>
                                       <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>';
        echo $html;

        break;

    case 'terminal':


        $ui->assign('xheader',Asset::css(array('terminal/terminal')));
        $ui->assign('xfooter',Asset::js(array('terminal/terminal','terminal/ib')));
        view('terminal');


        break;

    case 'sys_status':

        $ui->assign('pinfo',Ib_System::info());

        $xjq = "function displayTime() {
    var time = moment().format('D MMMM YYYY H:mm:ss');
    $('#clock').html(time);
    setTimeout(displayTime, 1000);
}
 displayTime();";

        $ui->assign('xjq',$xjq);
        $ui->assign('app_stage',APP_STAGE);

        view('util_sys_status');


        break;

    case 'sys_status_dl':


        $pdf = new Ib_Pdf();

        $pdf->from(Ib_System::info())->setFileName('server_info')->download();


        break;


    case 'integrationcode':


        $xheader = Asset::css(array('prism/prism'));
        $xfooter = Asset::js(array('prism/prism'));


        $ui->assign('xheader',$xheader);
        $ui->assign('xfooter',$xfooter);

        $s_client_login = '<form method="post" action="'.U.'client/auth/">
<input type="email" class="form-control" name="username" placeholder="'.$_L['Email Address'].'"/>
<input type="password" class="form-control" name="password" placeholder="'.$_L['Password'].'"/>
<button type="submit" class="btn btn-primary">Login</button>
</form>';

        $s_client_register = '<a href="'.U.'client/register/">'.$_L['Register'].'</a>';

        $form_client_login = htmlentities($s_client_login);
        $form_client_register = htmlentities($s_client_register);

        $ui->assign('form_client_login',$form_client_login);
        $ui->assign('form_client_register',$form_client_register);


        view('util_integrationcode');



        break;

    case 'invoice_access_log':

        $paginator = Paginator::bootstrap('ib_invoice_access_log');
        $d = ORM::for_table('ib_invoice_access_log')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('viewed_at')->find_array();
        $ui->assign('d',$d);
        $ui->assign('paginator',$paginator);


        view('util_invoice_access_log');


        break;

    case 'media':




        $folders = array_diff(scandir('./storage/'), array('..', '.','index.html','.DS_Store'));

        $current_path = route(2);

        $imgs = array();

        if($current_path != ''){
            $files = glob("./storage/$current_path/*.*");
            for ($i=0; $i<count($files); $i++)
            {
                $image = $files[$i];
                $supported_file = array(
                    'gif',
                    'jpg',
                    'jpeg',
                    'png'
                );

                $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
                if (in_array($ext, $supported_file)) {
                    $imgs[] = $image;
                } else {
                    continue;
                }
            }
        }




        view('util_media',[
            'folders' => $folders,
            'imgs' => $imgs
        ]);




        break;

    case 'tools':




        view('util_tools');



        break;

    case 'import':


        $importFrom = _post('importFrom');
        $fromUrl = _post('fromUrl');
        $apiKey = _post('apiKey');

        $_SESSION['fromUrl'] = $fromUrl;
        $_SESSION['apiKey'] = $apiKey;

        $import_appConfig = _post('appConfig');

        $import_customers = _post('customers');
        $import_groups = _post('groups');
        $import_companies = _post('companies');

        $import_invoices = _post('invoices');
        $import_invoice_items = _post('invoice_items');

        $import_quotes = _post('quotes');
        $import_quote_items = _post('quote_items');

        $import_accounts = _post('accounts');
        $import_transactions = _post('transactions');
        $import_currencies = _post('currencies');
        $import_items = _post('items');


        $message = '';

        switch ($importFrom){

            case 'iBilling':

                $message .= 'Import Started...'.PHP_EOL;


                $data = ib_http_request($fromUrl.'/?ng=jsonexport','POST',[
                    'dataType' => 'auth',
                    'apiKey' => $apiKey
                ]);

                $authCheck = json_decode($data);




                if(isset($authCheck->success) && $authCheck->success == false){

                    $message .= '====== '.$authCheck->message.' ======='.PHP_EOL;

                    echo $message;

                    exit;

                }


                // check the home currency






                if($import_appConfig == 'yes'){



                    $message .= '====== Importing Configuration ======='.PHP_EOL;



                    $data = ib_http_request($fromUrl.'/?ng=jsonexport','POST',[
                        'dataType' => 'appConfig',
                        'apiKey' => $apiKey
                    ]);

                    $appConfig = json_decode($data);





                    foreach ($appConfig as $c => $val){



                        if($c == 'theme' || $c == 'nstyle' || $c == 'license_key' || $c == 'url_rewrite'){
                            continue;
                        }
                        else{




                            update_option($c,$val);


                                $message .= 'Config: '.$c.' => '.$val.PHP_EOL;
                                $message .= '_____________________________________'.PHP_EOL;


                            }


                        }

                    $message .= '====== Config Import Finished ======='.PHP_EOL;


                    // Try to import logos





                    }



                if($import_currencies == 'yes'){

                    // Drop previous currencies

                    Currency::truncate();

                    $message .= '====== Importing Currencies ======='.PHP_EOL;


                    $data = ib_http_request($fromUrl.'/?ng=jsonexport','POST',[
                        'dataType' => 'currencies',
                        'apiKey' => $apiKey
                    ]);

                    $currencies = json_decode($data);



                    foreach ($currencies as $currency){



                        $d = new Currency;

                        if(isset($currency->cname)){
                            $d->cname = $currency->cname;
                        }

                        if(isset($currency->iso_code)){
                            $d->iso_code = $currency->iso_code;
                        }

                        if(isset($currency->symbol)){
                            $d->symbol = $currency->symbol;
                        }

                        if(isset($currency->rate)){
                            $d->rate = $currency->rate;
                        }

                        if(isset($currency->isdefault)){
                            $d->isdefault = $currency->isdefault;
                        }

                        $d->save();



                    }

                    $message .= '====== Config Import Finished ======='.PHP_EOL;




                }


                $currency = homeCurrency();

                if(!$currency){

                    // create home currency

                    $currency = new Currency;

                    $currency->cname = $config['home_currency'];
                    $currency->iso_code = $config['home_currency'];
                    $currency->symbol = $config['currency_code'];
                    $currency->isdefault = 1;

                    $currency->save();

                    $home_currency_id = $currency->id;

                }

                $home_currency_id = $currency->id;





                if($import_customers == 'yes'){

                    $customer_count = 0;





                    $data = ib_http_request($fromUrl.'/?ng=jsonexport','POST',[
                        'dataType' => 'customers',
                        'apiKey' => $apiKey
                    ]);


                    $customers = json_decode($data);


                    $message .= '====== Importing Customers ======='.PHP_EOL;

//                    var_dump($customers);
//                    exit;



                    foreach ($customers as $customer){


//                        http_response_code(500);
//                        dd($customer);

//                        if($customer->email == ''){
//                            continue;
//                        }
//                        else{
//                            // check customer already exist
//
//                            $customer_exist = Contact::where('email',$customer->email)->first();
//
//                            if(!$customer_exist){
//
//                                $d = new Contact;
//
//                                if(isset($customer->id)){
//                                    $d->id = $customer->id;
//                                }
//
//                                if(isset($customer->account)){
//                                    $d->account = $customer->account;
//                                }
//
//                                if(isset($customer->email)){
//                                    $d->email = $customer->email;
//                                }
//
//                                if(isset($customer->phone)){
//                                    $d->phone = $customer->phone;
//                                }
//
//                                if(isset($customer->address)){
//                                    $d->address = $customer->address;
//                                }
//
//                                if(isset($customer->city)){
//                                    $d->city = $customer->city;
//                                }
//
//                                if(isset($customer->zip)){
//                                    $d->zip = $customer->zip;
//                                }
//
//                                if(isset($customer->state)){
//                                    $d->state = $customer->state;
//                                }
//
//                                if(isset($customer->country)){
//                                    $d->country = $customer->country;
//                                }
//
//                                if(isset($customer->company)){
//                                    $d->company = $customer->company;
//                                }
//
//
//
//                                if(isset($customer->balance)){
//                                    $d->balance = $customer->balance;
//                                }
//
//                                if(isset($customer->notes)){
//                                    $d->notes = $customer->notes;
//                                }
//
//                                if(isset($customer->password)){
//                                    $d->password = $customer->password;
//                                }
//
//                                if(isset($customer->token)){
//                                    $d->token = $customer->token;
//                                }
//
//                                if(isset($customer->gname)){
//                                    $d->gname = $customer->gname;
//                                }
//
//                                if(isset($customer->gid)){
//                                    $d->gid = $customer->gid;
//                                }
//
//
//
//                                if(isset($customer->currency)){
//                                    $d->currency = $customer->currency;
//                                }
//
//                                if(isset($customer->facebook)){
//                                    $d->facebook = $customer->facebook;
//                                }
//
//                                if(isset($customer->google)){
//                                    $d->google = $customer->google;
//                                }
//
//                                if(isset($customer->linkedin)){
//                                    $d->linkedin = $customer->linkedin;
//                                }
//
////                                if(isset($customer->)){
////                                    $d-> = $customer->;
////                                }
//
//                                $d->save();
//
//
//
//                                $message .= 'Customer: '.$customer->account.' Imported.'.PHP_EOL;
//                                $message .= '_____________________________________'.PHP_EOL;
//
//                                $customer_count++;
//                            }
//
//
//
//
//                        }


                        $d = new Contact;

                        if(isset($customer->id)){
                            $d->id = $customer->id;
                        }

                        if(isset($customer->account)){
                            $d->account = $customer->account;
                        }

                        if(isset($customer->email)){
                            $d->email = $customer->email;
                        }

                        if(isset($customer->phone)){
                            $d->phone = $customer->phone;
                        }

                        if(isset($customer->address)){
                            $d->address = $customer->address;
                        }

                        if(isset($customer->city)){
                            $d->city = $customer->city;
                        }

                        if(isset($customer->zip)){
                            $d->zip = $customer->zip;
                        }

                        if(isset($customer->state)){
                            $d->state = $customer->state;
                        }

                        if(isset($customer->country)){
                            $d->country = $customer->country;
                        }

                        if(isset($customer->company)){
                            $d->company = $customer->company;
                        }



                        if(isset($customer->balance)){
                            $d->balance = $customer->balance;
                        }

                        if(isset($customer->notes)){
                            $d->notes = $customer->notes;
                        }

                        if(isset($customer->password)){
                            $d->password = $customer->password;
                        }

                        if(isset($customer->token)){
                            $d->token = $customer->token;
                        }

                        if(isset($customer->gname)){
                            $d->gname = $customer->gname;
                        }

                        if(isset($customer->gid)){
                            $d->gid = $customer->gid;
                        }



                        if(isset($customer->currency)){
                            $d->currency = $customer->currency;
                        }

                        if(isset($customer->facebook)){
                            $d->facebook = $customer->facebook;
                        }

                        if(isset($customer->google)){
                            $d->google = $customer->google;
                        }

                        if(isset($customer->linkedin)){
                            $d->linkedin = $customer->linkedin;
                        }

//                                if(isset($customer->)){
//                                    $d-> = $customer->;
//                                }

                        $d->save();



                        $message .= 'Customer: '.$customer->account.' Imported.'.PHP_EOL;
                        $message .= '_____________________________________'.PHP_EOL;

                        $customer_count++;

                    }

                    $message .= '... '.$customer_count.' Customer Imported!'.PHP_EOL;
                    $message .= '====== Customers Import Finished ======='.PHP_EOL;

                    //


                    $sLogoUrl = $fromUrl.'/application/storage/system/logo.png';

                    $message .= '..... Importing old logo'.PHP_EOL;

                    try {

                        $file_name = 'logo_'._raid(10).'.png';

                        $img = Image::make($sLogoUrl)->save('storage/system/'.$file_name);

                        update_option('logo_default',$file_name);

                        $message .= '====== Logo Imported ======='.PHP_EOL;


                    } catch (Exception $e){

                        $message .= 'warn: Importing logo failed.'.PHP_EOL;
                        $message .= $e->getMessage().PHP_EOL;

                    }


                    //

                }

                if($import_companies == 'yes'){

                    $company_count = 0;

                    $message .= '====== Importing Companies ======='.PHP_EOL;



                    $data = ib_http_request($fromUrl.'/?ng=jsonexport','POST',[
                        'dataType' => 'companies',
                        'apiKey' => $apiKey
                    ]);

                    $companies = json_decode($data);



                    foreach ($companies as $company){




                        if($company->company_name == ''){
                            continue;
                        }
                        else{
                            // check customer already exist

                            $company_exist = Company::where('company_name',$company->company_name)->first();

                            if(!$company_exist){

                                $d = new Company;

                                if(isset($company->id)){
                                    $d->id = $company->id;
                                }

                                if(isset($company->company_name)){
                                    $d->company_name = $company->company_name;
                                }

                                if(isset($company->url)){
                                    $d->url = $company->url;
                                }

                                if(isset($company->logo_url)){
                                    $d->logo_url = $company->logo_url;
                                }

                                if(isset($company->email)){
                                    $d->email = $company->email;
                                }

                                if(isset($company->phone)){
                                    $d->phone = $company->phone;
                                }





                                $d->save();



                                $message .= 'Company: '.$company->company_name.' Imported.'.PHP_EOL;
                                $message .= '_____________________________________'.PHP_EOL;

                                $company_count++;
                            }


                        }

                    }

                    $message .= '... '.$company_count.' Company Imported!'.PHP_EOL;
                    $message .= '====== Companies Import Finished ======='.PHP_EOL;
                }


                if($import_groups == 'yes'){

                    $group_count = 0;

                    $message .= '====== Importing Groups ======='.PHP_EOL;



                    $data = ib_http_request($fromUrl.'/?ng=jsonexport','POST',[
                        'dataType' => 'groups',
                        'apiKey' => $apiKey
                    ]);

                    $groups = json_decode($data);



                    foreach ($groups as $group){




                        if($group->gname == ''){
                            continue;
                        }
                        else{
                            // check customer already exist

                            $group_exist = ContactGroup::where('gname',$group->gname)->first();

                            if(!$group_exist){

                                $d = new ContactGroup;

                                if(isset($group->gname)){
                                    $d->gname = $group->gname;
                                }







                                $d->save();



                                $message .= 'Group: '.$group->gname.' Imported.'.PHP_EOL;
                                $message .= '_____________________________________'.PHP_EOL;

                                $group_count++;
                            }


                        }

                    }

                    $message .= '... '.$group_count.' Group Imported!'.PHP_EOL;
                    $message .= '====== Groups Import Finished ======='.PHP_EOL;
                }




                if($import_items == 'yes'){

                    $item_count = 0;

                    $message .= '====== Importing Items ======='.PHP_EOL;



                    $data = ib_http_request($fromUrl.'/?ng=jsonexport','POST',[
                        'dataType' => 'items',
                        'apiKey' => $apiKey
                    ]);

                    $items = json_decode($data);



                    foreach ($items as $item){


                        $d = new Item;


                        // other variables



                        if(isset($item->name)){
                            $d->name = $item->name;
                        }

                        if(isset($item->sales_price)){
                            $d->sales_price = $item->sales_price;
                        }

                        if(isset($item->item_number)){
                            $d->item_number = $item->item_number;
                        }

                        if(isset($item->description)){
                            $d->description = $item->description;
                        }

                        if(isset($item->type)){
                            $d->type = $item->type;
                        }

                        if(isset($item->unit)){
                            $d->unit = $item->unit;
                        }



                        if(isset($item->weight)){
                            $d->weight = $item->weight;
                        }

                        if(isset($item->inventory)){
                            $d->inventory = $item->inventory;
                        }

                        if(isset($item->e)){
                            $d->e = $item->e;
                        }

                        if(isset($item->cost_price)){
                            $d->cost_price = $item->cost_price;
                        }








                        $d->save();



                        $message .= 'Item: '.$item->name.' ...'.PHP_EOL;
                        $message .= '_____________________________________'.PHP_EOL;

                        $item_count++;

                    }

                    $message .= '... '.$item_count.' Item Imported!'.PHP_EOL;
                    $message .= '====== Items Import Finished ======='.PHP_EOL;
                }



                if($import_invoices == 'yes'){

                    $invoice_count = 0;

                    $message .= '====== Importing Invoices ======='.PHP_EOL;



                    $data = ib_http_request($fromUrl.'/?ng=jsonexport','POST',[
                        'dataType' => 'invoices',
                        'apiKey' => $apiKey
                    ]);

                    $invoices = json_decode($data);



                    foreach ($invoices as $invoice) {


                        $d = new Invoice;


                        if(isset($invoice->id)){
                            $d->id = $invoice->id;
                        }


                        if(isset($invoice->userid)){
                            $d->userid = $invoice->userid;
                        }

                        if(isset($invoice->account)){
                            $d->account = $invoice->account;
                        }

                        if(isset($invoice->date)){
                            $d->date = $invoice->date;
                        }

                        if(isset($invoice->duedate)){
                            $d->duedate = $invoice->duedate;
                        }

                        if(isset($invoice->datepaid) && ($invoice->datepaid != '0000-00-00 00:00:00')){
                            $d->datepaid = $invoice->datepaid;
                        }

                        if(isset($invoice->subtotal)){
                            $d->subtotal = $invoice->subtotal;
                        }

                        if(isset($invoice->discount_type)){
                            $d->discount_type = $invoice->discount_type;
                        }

                        if(isset($invoice->discount_value)){
                            $d->discount_value = $invoice->discount_value;
                        }

                        if(isset($invoice->discount)){
                            $d->discount = $invoice->discount;
                        }

                        if(isset($invoice->total)){
                            $d->total = $invoice->total;
                        }

                        if(isset($invoice->tax)){
                            $d->tax = $invoice->tax;
                        }

                        if(isset($invoice->taxname)){
                            $d->taxname = $invoice->taxname;
                        }

                        if(isset($invoice->taxrate)){
                            $d->taxrate = $invoice->taxrate;
                        }

                        if(isset($invoice->vtoken)){
                            $d->vtoken = $invoice->vtoken;
                        }

                        if(isset($invoice->ptoken)){
                            $d->ptoken = $invoice->ptoken;
                        }

                        if(isset($invoice->status)){
                            $d->status = $invoice->status;
                        }

                        if(isset($invoice->notes)){
                            $d->notes = $invoice->notes;
                        }

                        if(isset($invoice->r)){
                            $d->r = $invoice->r;
                        }

                        if(isset($invoice->nd)){
                            $d->nd = $invoice->nd;
                        }

                        if(isset($invoice->invoicenum)){
                            $d->invoicenum = $invoice->invoicenum;
                        }

                        if(isset($invoice->cn)){
                            $d->cn = $invoice->cn;
                        }

                        if(isset($invoice->tax2)){
                            $d->tax2 = $invoice->tax2;
                        }

                        if(isset($invoice->taxrate2)){
                            $d->taxrate2 = $invoice->taxrate2;
                        }

                        if(isset($invoice->paymentmethod)){
                            $d->paymentmethod = $invoice->paymentmethod;
                        }

                        if(isset($invoice->currency)){
                            $d->currency = $invoice->currency;
                        }

                        if(isset($invoice->currency_symbol)){
                            $d->currency_symbol = $invoice->currency_symbol;
                        }

                        if(isset($invoice->currency_rate)){
                            $d->currency_rate = $invoice->currency_rate;
                        }

                        if(isset($invoice->receipt_number)){
                            $d->receipt_number = $invoice->receipt_number;
                        }



                        $d->save();


                    }

                    $message .= '... '.$invoice_count.' Invoice Imported!'.PHP_EOL;
                    $message .= '====== Invoices Import Finished ======='.PHP_EOL;
                }




                if($import_invoice_items == 'yes'){

                    $invoice_item_count = 0;

                    $message .= '====== Importing Invoice Items ======='.PHP_EOL;



                    $data = ib_http_request($fromUrl.'/?ng=jsonexport','POST',[
                        'dataType' => 'invoice_items',
                        'apiKey' => $apiKey
                    ]);

                    $invoice_items = json_decode($data);



                    foreach ($invoice_items as $invoice_item) {


                        $d = new InvoiceItem;

                        if (isset($invoice_item->id)) {
                            $d->id = $invoice_item->id;
                        }

                        if (isset($invoice_item->invoiceid)) {
                            $d->invoiceid = $invoice_item->invoiceid;
                        }

                        if (isset($invoice_item->userid)) {
                            $d->userid = $invoice_item->userid;
                        }

                        if (isset($invoice_item->description)) {
                            $d->description = $invoice_item->description;
                        }

                        if (isset($invoice_item->qty)) {
                            $d->qty = $invoice_item->qty;
                        }

                        if (isset($invoice_item->amount)) {
                            $d->amount = $invoice_item->amount;
                        }

                        if (isset($invoice_item->total)) {
                            $d->total = $invoice_item->total;
                        }

                        if (isset($invoice_item->taxed)) {
                            $d->taxed = $invoice_item->taxed;
                        }

                        if (isset($invoice_item->type)) {
                            $d->type = $invoice_item->type;
                        }

                        if (isset($invoice_item->relid)) {
                            $d->relid = $invoice_item->relid;
                        }

                        if (isset($invoice_item->itemcode)) {
                            $d->itemcode = $invoice_item->itemcode;
                        }

                        if (isset($invoice_item->taxamount)) {
                            $d->taxamount = $invoice_item->taxamount;
                        }

                        if (isset($invoice_item->duedate)) {
                            $d->duedate = $invoice_item->duedate;
                        }

                        if (isset($invoice_item->paymentmethod)) {
                            $d->paymentmethod = $invoice_item->paymentmethod;
                        }

                        if (isset($invoice_item->notes)) {
                            $d->notes = $invoice_item->notes;
                        }


                        $d->save();


                        $message .= 'Invoice Item: ' . $invoice_item->description . ' ...' . PHP_EOL;
                        $message .= '_____________________________________' . PHP_EOL;

                        $invoice_item_count++;



                    }

                    $message .= '... '.$invoice_item_count.' Invoice Item Imported!'.PHP_EOL;
                    $message .= '====== Invoice Items Import Finished ======='.PHP_EOL;
                }


                if($import_quotes == 'yes'){

                    $quote_count = 0;

                    $message .= '====== Importing Quotes ======='.PHP_EOL;



                    $data = ib_http_request($fromUrl.'/?ng=jsonexport','POST',[
                        'dataType' => 'quotes',
                        'apiKey' => $apiKey
                    ]);

                    $quotes = json_decode($data);



                    foreach ($quotes as $quote) {

                        $quote_count++;

                        $d = ORM::for_table('sys_quotes')->create();

                        if(isset($quote->id)){
                            $d->id = $quote->id;
                        }



                        if(isset($quote->subject))
                        {
                            $d->subject = $quote->subject;
                        }

                        if(isset($quote->stage))
                        {
                            $d->stage = $quote->stage;
                        }

                        if(isset($quote->validuntil))
                        {
                            $d->validuntil = $quote->validuntil;
                        }

                        if(isset($quote->userid))
                        {
                            $d->userid = $quote->userid;
                        }

                        if(isset($quote->account))
                        {
                            $d->account = $quote->account;
                        }

                        if(isset($quote->invoicenum))
                        {
                            $d->invoicenum = $quote->invoicenum;
                        }

                        if(isset($quote->cn))
                        {
                            $d->cn = $quote->cn;
                        }

                        if(isset($quote->firstname))
                        {
                            $d->firstname = $quote->firstname;
                        }

                        if(isset($quote->lastname))
                        {
                            $d->lastname = $quote->lastname;
                        }

                        if(isset($quote->companyname))
                        {
                            $d->companyname = $quote->companyname;
                        }

                        if(isset($quote->email))
                        {
                            $d->email = $quote->email;
                        }

                        if(isset($quote->address1))
                        {
                            $d->address1 = $quote->address1;
                        }

                        if(isset($quote->address2))
                        {
                            $d->address2 = $quote->address2;
                        }

                        if(isset($quote->city))
                        {
                            $d->city = $quote->city;
                        }

                        if(isset($quote->state))
                        {
                            $d->state = $quote->state;
                        }

                        if(isset($quote->postcode))
                        {
                            $d->postcode = $quote->postcode;
                        }

                        if(isset($quote->country))
                        {
                            $d->country = $quote->country;
                        }

                        if(isset($quote->phonenumber))
                        {
                            $d->phonenumber = $quote->phonenumber;
                        }

                        if(isset($quote->currency))
                        {
                            $d->currency = $quote->currency;
                        }

                        if(isset($quote->subtotal))
                        {
                            $d->subtotal = $quote->subtotal;
                        }

                        if(isset($quote->discount_type))
                        {
                            $d->discount_type = $quote->discount_type;
                        }

                        if(isset($quote->discount_value))
                        {
                            $d->discount_value = $quote->discount_value;
                        }



                        if(isset($quote->discount))
                        {
                            $d->discount = $quote->discount;
                        }

                        if(isset($quote->taxname))
                        {
                            $d->taxname = $quote->taxname;
                        }

                        if(isset($quote->taxrate))
                        {
                            $d->taxrate = $quote->taxrate;
                        }

                        if(isset($quote->tax1))
                        {
                            $d->tax1 = $quote->tax1;
                        }

                        if(isset($quote->tax2))
                        {
                            $d->tax2 = $quote->tax2;
                        }

                        if(isset($quote->total))
                        {
                            $d->total = $quote->total;
                        }

                        if(isset($quote->proposal))
                        {
                            $d->proposal = $quote->proposal;
                        }

                        if(isset($quote->customernotes))
                        {
                            $d->customernotes = $quote->customernotes;
                        }

                        if(isset($quote->adminnotes))
                        {
                            $d->adminnotes = $quote->adminnotes;
                        }

                        if(isset($quote->datecreated) && ($quote->datecreated != '0000-00-00 00:00:00'))
                        {
                            $d->datecreated = $quote->datecreated;
                        }

                        if(isset($quote->lastmodified) && ($quote->lastmodified != '0000-00-00 00:00:00'))
                        {
                            $d->lastmodified = $quote->lastmodified;
                        }

                        if(isset($quote->datesent) && ($quote->datesent != '0000-00-00 00:00:00'))
                        {
                            $d->datesent = $quote->datesent;
                        }

                        if(isset($quote->dateaccepted) && ($quote->dateaccepted != '0000-00-00 00:00:00'))
                        {
                            $d->dateaccepted = $quote->dateaccepted;
                        }

                        if(isset($quote->vtoken))
                        {
                            $d->vtoken = $quote->vtoken;
                        }



                        $d->save();

                        $message .= 'Quote: ' . $quote->id . ' ...' . PHP_EOL;
                        $quote_count++;

                    }

                    $message .= '... '.$quote_count.' Quote Imported!'.PHP_EOL;
                    $message .= '====== Quotes Import Finished ======='.PHP_EOL;
                }


                if($import_quote_items == 'yes'){

                    $quote_item_count = 0;

                    $message .= '====== Importing Quote Items ======='.PHP_EOL;



                    $data = ib_http_request($fromUrl.'/?ng=jsonexport','POST',[
                        'dataType' => 'quote_items',
                        'apiKey' => $apiKey
                    ]);

                    $quote_items = json_decode($data);



                    foreach ($quote_items as $quote_item) {



                        $d = ORM::for_table('sys_quoteitems')->create();

                        if (isset($quote_item->id)) {
                            $d->id = $quote_item->id;
                        }

                        if (isset($quote_item->qid)) {
                            $d->qid = $quote_item->qid;
                        }

                        if (isset($quote_item->description)) {
                            $d->description = $quote_item->description;
                        }

                        if (isset($quote_item->qty)) {
                            $d->qty = $quote_item->qty;
                        }

                        if (isset($quote_item->amount)) {
                            $d->amount = $quote_item->amount;
                        }

                        if (isset($quote_item->discount)) {
                            $d->discount = $quote_item->discount;
                        }

                        if (isset($quote_item->total)) {
                            $d->total = $quote_item->total;
                        }

                        if (isset($quote_item->taxable)) {
                            $d->taxable = $quote_item->taxable;
                        }

                        if (isset($quote_item->itemcode)) {
                            $d->itemcode = $quote_item->itemcode;
                        }


                        $d->save();




                        $message .= 'Quote Item: ' . $quote_item->description . ' ...' . PHP_EOL;
                        $message .= '_____________________________________' . PHP_EOL;

                        $quote_item_count++;



                    }

                    $message .= '... '.$quote_item_count.' Invoice Item Imported!'.PHP_EOL;
                    $message .= '====== Quote Items Import Finished ======='.PHP_EOL;
                }


                if($import_accounts == 'yes'){

                    // Import Categories


                    $t_old = TransactionCategory::truncate();


                    //

                    $data = ib_http_request($fromUrl.'/?ng=jsonexport','POST',[
                        'dataType' => 'categories',
                        'apiKey' => $apiKey
                    ]);

                    $categories = json_decode($data);


                    foreach ($categories as $category){

                        $c = new TransactionCategory;

                        $c->name = $category->name;
                        $c->type = $category->type;
                        $c->sorder = $category->sorder;

                        $c->save();

                        $message .= 'Category: '.$category->name.' ...'.PHP_EOL;

                    }

                    //



                    $account_count = 0;

                    $message .= '====== Importing Bank Accounts ======='.PHP_EOL;



                    $data = ib_http_request($fromUrl.'/?ng=jsonexport','POST',[
                        'dataType' => 'accounts',
                        'apiKey' => $apiKey
                    ]);

                    $accounts = json_decode($data);

                    $currency = homeCurrency();



                    foreach ($accounts as $account){





                        if($account->account == ''){
                            continue;
                        }
                        else{
                            // check customer already exist

                            $account_exist = Account::where('account',$account->account)->first();

                            if(!$account_exist){

                                $d = new Account;




                                if(isset($account->account)){
                                    $d->account = $account->account;
                                }

                                if(isset($account->description)){
                                    $d->description = $account->description;
                                }

                                if(isset($account->balance)){
                                    $d->balance = $account->balance;
                                }


                                if(isset($account->bank_name)){
                                    $d->bank_name = $account->bank_name;
                                }

                                if(isset($account->account_number)){
                                    $d->account_number = $account->account_number;
                                }

                                if(isset($account->currency)){
                                    $d->currency = $account->currency;
                                }

                                if(isset($account->branch)){
                                    $d->branch = $account->branch;
                                }

                                if(isset($account->address)){
                                    $d->address = $account->address;
                                }

                                if(isset($account->contact_person)){
                                    $d->contact_person = $account->contact_person;
                                }

                                if(isset($account->contact_phone)){
                                    $d->contact_phone = $account->contact_phone;
                                }

                                if(isset($account->website)){
                                    $d->website = $account->website;
                                }

                                if(isset($account->ib_url)){
                                    $d->ib_url = $account->ib_url;
                                }

                                if(isset($account->notes)){
                                    $d->notes = $account->notes;
                                }

                                if(isset($account->sorder)){
                                    $d->sorder = $account->sorder;
                                }

                                if(isset($account->e)){
                                    $d->e = $account->e;
                                }

                                if(isset($account->token)){
                                    $d->token = $account->token;
                                }

                                if(isset($account->status)){
                                    $d->status = $account->status;
                                }


                                $d->save();

                                $account_id = $d->id;



                                $b = new Balance;
                                $b->account_id = $account_id;
                                $b->currency_id = $home_currency_id;
                                $b->balance = $account->balance;
                                $b->save();

                                $message .= 'Account: '.$account->account.' ...'.PHP_EOL;
                                $message .= '_____________________________________'.PHP_EOL;

                                $message .= '.... Updating Account Balance'.PHP_EOL;



                                $account_count++;
                            }


                        }

                    }

                    $message .= '... '.$account_count.' Account Imported!'.PHP_EOL;
                    $message .= '====== Accounts Import Finished ======='.PHP_EOL;


                    // Updating the Account Balances










                }




                if($import_transactions == 'yes'){

                    $transaction_count = 0;

                    $message .= '====== Importing Transactions ======='.PHP_EOL;



                    $data = ib_http_request($fromUrl.'/?ng=jsonexport','POST',[
                        'dataType' => 'transactions',
                        'apiKey' => $apiKey
                    ]);

                    $transactions = json_decode($data);



                    foreach ($transactions as $transaction){

                        $d = new Transaction;




                        if(isset($transaction->account)){
                            $d->account = $transaction->account;
                        }

                        if(isset($transaction->type)){
                            $d->type = $transaction->type;
                        }

                        if(isset($transaction->payerid)){
                            $d->payerid = $transaction->payerid;
                        }

                        if(isset($transaction->tags)){
                            $d->tags = $transaction->tags;
                        }

                        if(isset($transaction->amount)){
                            $d->amount = $transaction->amount;
                        }

                        if(isset($transaction->category)){
                            $d->category = $transaction->category;
                        }

                        if(isset($transaction->method)){
                            $d->method = $transaction->method;
                        }

                        if(isset($transaction->ref)){
                            $d->ref = $transaction->ref;
                        }

                        if(isset($transaction->attachments)){
                            $d->attachments = $transaction->attachments;
                        }

                        if(isset($transaction->description)){
                            $d->description = $transaction->description;
                        }

                        if(isset($transaction->date)){
                            $d->date = $transaction->date;
                        }

                        if(isset($transaction->dr)){
                            $d->dr = $transaction->dr;
                        }

                        if(isset($transaction->cr)){
                            $d->cr = $transaction->cr;
                        }

                        if(isset($transaction->bal)){
                            $d->bal = $transaction->bal;
                        }

                        if(isset($transaction->payer)){
                            $d->payer = $transaction->payer;
                        }

                        if(isset($transaction->payee)){
                            $d->payee = $transaction->payee;
                        }
                        if(isset($transaction->payeeid)){
                            $d->payeeid = $transaction->payeeid;
                        }
                        if(isset($transaction->status)){
                            $d->status = $transaction->status;
                        }

                        if(isset($transaction->tax)){
                            $d->tax = $transaction->tax;
                        }

                        if(isset($transaction->iid)){
                            $d->iid = $transaction->iid;
                        }

                        if(isset($transaction->aid)){
                            $d->aid = $transaction->aid;
                        }

                        if(isset($transaction->vid)){
                            $d->vid = $transaction->vid;
                        }









                        $d->save();



                        $message .= 'Transaction: '.$transaction->description.' ...'.PHP_EOL;
                        $message .= '_____________________________________'.PHP_EOL;

                        $transaction_count++;

                    }

                    $message .= '... '.$transaction_count.' Transaction Imported!'.PHP_EOL;
                    $message .= '====== Transactions Import Finished ======='.PHP_EOL;


                    // Update Category Balance

                    $categories = TransactionCategory::where('type','Income')->get();

                    foreach ($categories as $category){

                        $total = categoryCalculateTotalByName($category->name,'Income');
                        $category->total_amount = $total;
                        $category->save();

                        $message .= 'Category Balance Updated: '.$category->name.' -'.$total.PHP_EOL;

                    }


                    $categories = TransactionCategory::where('type','Expense')->get();

                    foreach ($categories as $category){

                        $total = categoryCalculateTotalByName($category->name,'Expense');
                        $category->total_amount = $total;
                        $category->save();

                        $message .= 'Category Balance Updated: '.$category->name.' -'.$total.PHP_EOL;

                    }


                    // Update sales count


                    $items = InvoiceItem::all();

                    foreach ($items as $item){




                    }


                    //





                }



                echo $message;








                break;
        }



        break;


    case 'rebuild_cat_summary':





        break;



    case 'rebuild_item_sales':

        



        break;


    case 'clear-financial-data-cache':


        Transaction::rebuildCatData();

        Item::rebuildSalesData();

        r2(U.'util/tools','s',$_L['Data Updated']);


        break;


    case 'backup-database':


        $backup = new Backup;

        $backupDB = $backup->backupDB();

        $message = '';
        $continue = 'No';

        if($backupDB['success']){
            $continue = 'Yes';
            $message = $backupDB['message'];

            r2(U.'util/tools','s','Backup created. <a href="'.APP_URL.'/'.$backupDB['file_path'].'">Click Here to Download</a>');

        }
        else{
            $message = $backupDB['message'];
            r2(U.'util/tools','e',$message);
        }


        break;


    case 'backups':

        require_once('system/lib/directory_list/DirectoryLister.php');

        $lister = new DirectoryLister();

        $files = $lister->listDirectory('storage/backups/db');



        view('util_backups',[
            'files' => $files
        ]);


        break;


    case 'backup_files':

        require_once('system/lib/directory_list/DirectoryLister.php');

        $lister = new DirectoryLister();

        $files = $lister->listDirectory('storage/backups/app');

        view('util_backups_files',[
            'files' => $files
        ]);

        break;


    case 'do-backup-db':

        if(APP_STAGE == 'Demo')
        {
            r2(U.'util/backups','e','Sorry, this feature is disabled in the Demo mode!');
        }

        clxPerformLongProcess();

        Util::backupDatabase();

        r2(U.'util/backups','s',$_L['Created Successfully']);

        break;


    case 'do-backup-files':

        if(APP_STAGE == 'Demo')
        {
            r2(U.'util/backup_files','e','Sorry, this feature is disabled in the Demo mode!');
        }


        clxPerformLongProcess();

        $out_name = date('Y-m-d-H-i-s').'_'._raid();

        try{
            ExtendedZip::zipTree('./', 'storage/backups/app/'.$out_name.'.zip', ZipArchive::CREATE);
            r2(U.'util/backup_files','s',$_L['Created Successfully']);
        } catch (\Exception $e)
        {
            r2(U.'util/backup_files','e',$e->getMessage());
        }




        break;


    case 'delete-backup-db':

        if(APP_STAGE == 'Demo')
        {
            r2(U.'util/backups','e','Sorry, this feature is disabled in the Demo mode!');
        }

        $path = route(2);

        $path = str_replace('storage:backups:db:','',$path);


        if(file_exists('storage/backups/db/'.$path))
        {
            unlink('storage/backups/db/'.$path);
            r2(U.'util/backups','s',$_L['delete_successful']);
        }
        else{
            exit('Invalid file path!');
        }



        break;

    case 'delete-backup-files':

        if(APP_STAGE == 'Demo')
        {
            r2(U.'util/backups','e','Sorry, this feature is disabled in the Demo mode!');
        }

        $path = route(2);

        $path = str_replace('storage:backups:app:','',$path);


        if(file_exists('storage/backups/app/'.$path))
        {
            unlink('storage/backups/app/'.$path);
            r2(U.'util/backup_files','s',$_L['delete_successful']);
        }
        else{
            exit('Invalid file path!');
        }



        break;


    default:
        echo 'action not defined';
}