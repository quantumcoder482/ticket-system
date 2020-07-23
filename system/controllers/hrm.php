<?php
/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/
_auth();
$ui->assign('_application_menu', 'hrm');
$ui->assign('_title', $_L['HRM'] . '- ' . $config['CompanyName']);
$ui->assign('_st', $_L['HRM']);
$action = route(1,'employees');
$user = User::_info();
$ui->assign('user', $user);
Event::trigger('assets');

if (!has_access($user->roleid, 'hr', 'view')) {
    permissionDenied();
}

switch ($action) {

    case 'employees':

        if(!db_table_exist('employees')){
            r2(U.'hrm/schema');
        }


        $employees = Employee::all();




        view('employee_list',[
            'employees' => $employees,
        ]);

        break;

    case 'employee':

        $id = route(2);

        $departments = TicketDepartment::all();

        $employee = false;
        if($id != '')
        {
            $employee = Employee::find($id);
        }


        view('employee',[
            'employee' => $employee,
            'departments' => $departments
        ]);

        break;


    case 'employee-post':

        $validator = new Validator;
        $data = $request->all();
        $validation = $validator->validate($data, [
            'name' => 'required',
            'job_title' => 'required',
            'date_hired' => 'required|date',
            'pay_frequency' => 'required',
            'amount' => 'required',
            'email' => 'required|email'
        ]);


        if ($validation->fails()) {
            $message = '';
            foreach ($validation->errors()->all() as $key => $value)
            {
                $message .= $value.' <br> ';
            }
            responseWithError($message);
        } else {

            if(isset($data['employee_id']) && $data['employee_id'] != '')
            {
                $employee = Employee::find($data['employee_id']);
            }
            else{
                $employee = new Employee;
            }



            $employee->name = $data['name'];
            $employee->job_title = $data['job_title'];

            if(isset($data['file_link']) && $data['file_link'] != '')
            {
                $employee->image = $data['file_link'];
            }

            $employee->pay_frequency = $data['pay_frequency'];

            $employee->currency = $config['home_currency'];


            $amount = 0.00;

            if(isset($data['amount']) && $data['amount'] != '')
            {
                $amount = $data['amount'];
                $amount = Finance::amount_fix($amount);
                $employee->amount = $amount;
            }

            if(isset($data['address']) && $data['address'] != '')
            {
                $employee->address_line_1 = $data['address'];
            }


            if(isset($data['email']))
            {
                $employee->email = $data['email'];
            }

            if(isset($data['phone']))
            {
                $employee->phone = $data['phone'];
            }

            if(isset($data['city']))
            {
                $employee->city = $data['city'];
            }

            if(isset($data['state']))
            {
                $employee->state = $data['state'];
            }
            if(isset($data['zip']))
            {
                $employee->zip = $data['zip'];
            }

            if(isset($data['country']))
            {
                $employee->country = $data['country'];
            }

            if(isset($data['summary']))
            {
                $employee->summary = $data['summary'];
            }
            if(isset($data['facebook']))
            {
                $employee->facebook = $data['facebook'];
            }

            if(isset($data['linkedin']))
            {
                $employee->linkedin = $data['linkedin'];
            }
            if(isset($data['twitter']))
            {
                $employee->twitter = $data['twitter'];
            }
            if(isset($data['date_hired']))
            {
                $employee->date_hired = $data['date_hired'];
            }


            $employee->save();

            echo "Success!";
        }


        break;


    case 'attendance':

        $date = route(2,date('Y-m-d'));
        $employees = Employee::all();
        view('employee_attendance',[
            'date' => $date,
            'employees' => $employees
        ]);

        break;


    case 'payroll':
        $employees = Employee::all();
        view('employee_payroll',[
            'employees' => $employees
        ]);

        break;

    case 'run-payroll':

        r2(U.'hrm/payroll','s',$_L['Data Updated']);

        break;

    case 'upload-employee-image':

        if(APP_STAGE == 'Demo'){
            exit;
        }

        $uploader   =   new Uploader();
        $uploader->setDir('storage/employees/');
        $uploader->sameName(false);
        $uploader->setExtensions(array('jpg','jpeg','png','gif'));  //allowed extensions list//
        if($uploader->uploadFile('file')){
            $uploaded  =   $uploader->getUploadName();

            $file = $uploaded;
            $msg = $_L['Uploaded Successfully'];
            $success = 'Yes';

            // create thumb

            $image = new Img();

            // indicate a source image (a GIF, PNG or JPEG file)
            $image->source_path = 'storage/employees/'.$file;

            // indicate a target image
            // note that there's no extra property to set in order to specify the target
            // image's type -simply by writing '.jpg' as extension will instruct the script
            // to create a 'jpg' file
            $image->target_path = 'storage/employees/thumb'.$file;

            // since in this example we're going to have a jpeg file, let's set the output
            // image's quality
            $image->jpeg_quality = 100;

            // some additional properties that can be set
            // read about them in the documentation
            $image->preserve_aspect_ratio = true;
            $image->enlarge_smaller_images = true;
            $image->preserve_time = true;

            // resize the image to exactly 100x100 pixels by using the "crop from center" method
            // (read more in the overview section or in the documentation)
            //  and if there is an error, check what the error is about
            if (!$image->resize(200, 200, ZEBRA_IMAGE_CROP_CENTER)) {



                // if no errors
            } else {

                // echo 'Success!';

            }

            //


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

    case 'attendance':



        break;


    case 'modal_asset':

        view('modal_asset',[

        ]);

        break;


    case 'proficiencies':

        $proficiencies = [];

        view('hrm_proficiencies',[
            'proficiencies' => $proficiencies
        ]);

        break;
    
    case 'salary':

        $employees = ORM::for_table('sys_users')->find_array();


        $ui->assign('xheader', Asset::css(array('modal','s2/css/select2.min', 'dt/dt', 'fc/fc', 'fc/fc_ibilling','redactor/redactor', 'daterangepicker/daterangepicker', 'dp/dist/datepicker.min')));
        $ui->assign('xfooter', Asset::js(array('modal','s2/js/select2.min', 's2/js/i18n/' . lan() , 'js/redirect','dt/dt', 'fc/fc','redactor/redactor.min', 'daterangepicker/daterangepicker', 'numeric', 'dp/dist/datepicker.min')));
        $ui->assign('xjq', '
            $(\'.amount\').autoNumeric(\'init\', {
            dGroup: ' . $config['thousand_separator_placement'] . ',
            aPad: ' . $config['currency_decimal_digits'] . ',
            pSign: \'' . $config['currency_symbol_position'] . '\',
            aDec: \'' . $config['dec_point'] . '\',
            aSep: \'' . $config['thousands_sep'] . '\',
            vMax: \'9999999999999999.00\',
                        vMin: \'-9999999999999999.00\'

            });
            $(\'[data-toggle="tooltip"]\').tooltip();

        ');


        view('employee_salary',[
            'employees' => $employees,
        ]);
        break;

    case 'tr_list': 

        $columns = array();
        $columns[] = 'date';
        $columns[] = 'employee_id';
        $columns[] = 'pay_for';
        $columns[] = 'amount';
        $columns[] = 'request';
        $columns[] = 'status';
        $columes[] = '';


        $order_by = $_POST['order'];
        $o_c_id = $order_by[0]['column'];
        $o_type = $order_by[0]['dir'];
        $a_order_by = $columns[$o_c_id];

        $d = ORM::for_table('employee_salary')
            ->left_outer_join('sys_users', array('employees.id','=','employee_salary.employee_id'), 'employees');

        $d->select('employee_salary.*');
        $d->select('employees.fullname', 'employee_name');
        

        if($user->user_type != 'Admin'){
            $d->where_equal('employee_id', $user->id);
        }else {
            $employee_id = _post('employee');
            if($employee_id != ''){
                $d->where_equal('employee_id', $employee_id);
            }
        }
        

        $pay_for = _post('pay_for');
        if($pay_for != ''){
            $d->where_like('pay_for', "%$pay_for%");
        }

        $request = _post('request');
        if ($request != '') {
            $d->where_equal('request', $request);
        }

        $status = _post('status');
        if($status != ''){
            $d->where_equal('status', $status);
        }


        $daterange = _post('daterange');
        if ($daterange != '') {
            $salary_date_range = explode('-', $daterange);
            $from_date = trim($salary_date_range[0]);
            $to_date = trim($salary_date_range[1]);
            $d->where_gte('date', $from_date);
            $d->where_lte('date', $to_date);
        }


        // $x = $d->find_array();
        $iTotalRecords = $d->count();

        $iDisplayLength = intval($_REQUEST['length']);
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = intval($_REQUEST['start']);
        $sEcho = intval($_REQUEST['draw']);

        $records = array();
        $records["data"] = array();

        $end = $iDisplayStart + $iDisplayLength;
        $end = $end > $iTotalRecords ? $iTotalRecords : $end;

        if ($o_type == 'desc') {
            $d->order_by_desc($a_order_by);
        }
        else {
            $d->order_by_asc($a_order_by);
        }

        $d->limit($iDisplayLength);
        $d->offset($iDisplayStart);
        $x = $d->find_array();

        $i = $iDisplayStart;

        // print_r($x);

        foreach($x as $key => $xs) {

            $today = date('Y-m-d');

            if($xs['status'] == 'Processed'){
                $status_str = "<div class='label-default' style='margin:0 auto; font-size:85%; width:100px; text-align: center'>Processed</div>";
            }
            if($xs['status'] == 'Paid'){
                $status_str = "<div class='label-success' style='margin:0 auto; font-size:85%; width:100px; text-align: center'>Paid</div>";
            }
            if($xs['status'] == 'Not Processed'){
                $status_str = "<div class='label-danger' style='margin:0 auto; font-size:85%; width:100px; text-align: center'>Not Processed</div>";
            }

            // if($xs['employee_id']){
            //     $xs['employee'] = '<a href="'. U .'contacts/view/'.$xs['customer_id'].'/summary/">'.$xs['customer'].'</a>';
            // }else{
            //     $xs['employee'] = '-';
            // }

            // if($xs['agent_id']){
            //     $xs['agent'] = '<a href="'. U .'contacts/view/'.$xs['agent_id'].'/summary/">'.$xs['agent'].'</a>';
            // }else{
            //     $xs['agent'] = '-';
            // }

            //  $xs['serialnumber'] = '<a href="'. U .'voucher/app/list_voucher_page/'.$xs['voucher_format_id'].'/'.$xs['id'].'">'.$xs['prefix'].$xs['serialnumber'].'</a>';

            $manage_buttons = "";
            if($user->user_type == 'Admin'){
                $manage_buttons = '<a href="#" class="btn btn-warning btn-xs cedit" id="eid' . $xs['id'] . '"><i class="glyphicon glyphicon-pencil"></i> </a>'.' '.'<a href="#" class="btn btn-primary btn-xs cview" id="'.$xs['id'].'"><i class="fa fa-file-text-o"></i></a>'.' '.'<a href="#" class="btn btn-danger btn-xs cdelete" id="'.$xs['id'].'"><i class="fa fa-trash"></i></a>';
            }else {

                $state = $xs['status'] == "Not Processed" ? "" : "disabled";
                $check_state = $xs['request'] == "yes" ? "checked" : "";
                $manage_buttons = '<input type="checkbox" class="check-status" '.$check_state.' data-toggle="toggle" '.$state.' id="ch'.$xs['id'].'" data-size="mini" data-onstyle="success" data-offstyle="danger" >';
            }
            
            $records["data"][] = array(
                0 => $xs['date'],
                1 => $xs['employee_name'],
                2 => $xs['pay_for'],
                3 => '<span class="amount">'.$xs['amount'].'</span>',
                4 => $xs['request'],
                5 => $status_str,
                6 => $manage_buttons,
                7 => $xs['id']
            );
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;
        api_response($records);

        break;

    case 'update_status': 
        $id = _post('id');
        $value = _post('value');

        $id = str_replace('ch', '', $id);
        $d = ORM::for_table('employee_salary')->find_one($id);

        if($d){
            $d->request = $value;
            $d->save();
            echo $d->id();
        } else {
            echo "Some error occured";
        }
        break;

    case 'salary_post':

        $id = _post('sid');
        $date = _post('m_date');
        $employee_id = _post('m_employee_id');
        $pay_for = _post('m_pay_for');
        $request = _post('m_request');
        $status = _post('m_status');

        $amount=_post('m_amount','0.00');
        $amount = Finance::amount_fix($amount);
        
        if($id){
            $d = ORM::for_table('employee_salary')->find_one($id);
        } else {
            $d = ORM::for_table('employee_salary')->create();
        }
        
        $d->date = $date;
        $d->employee_id = $employee_id;
        $d->pay_for = $pay_for;
        $d->amount = $amount;
        $d->request = $request;
        $d->status = $status;
        
        $d->save();

        echo $d->id();

        break;

    case 'create_salary':
        
        $baseUrl = APP_URL;

        $employees = ORM::for_table('sys_users')->find_array();
        $payout_status = ['Not Processed', 'Processed', 'Paid'];

        $ui->assign('xheader', Asset::css(array('modal','s2/css/select2.min', 'dt/dt', 'fc/fc', 'fc/fc_ibilling','redactor/redactor', 'daterangepicker/daterangepicker')));
        $ui->assign('xfooter', Asset::js(array('modal','s2/js/select2.min', 's2/js/i18n/' . lan() , 'js/redirect','dt/dt', 'fc/fc','redactor/redactor.min', 'daterangepicker/daterangepicker','numeric')));
        $ui->assign('xjq', '
            $(\'.amount\').autoNumeric(\'init\', {
            dGroup: ' . $config['thousand_separator_placement'] . ',
            aPad: ' . $config['currency_decimal_digits'] . ',
            pSign: \'' . $config['currency_symbol_position'] . '\',
            aDec: \'' . $config['dec_point'] . '\',
            aSep: \'' . $config['thousands_sep'] . '\',
            vMax: \'9999999999999999.00\',
                        vMin: \'-9999999999999999.00\'

            });
            $(\'[data-toggle="tooltip"]\').tooltip();

        ');
        
        $type = 'create';
        $salary = array (
            'id' => "",
            'date' => "",
            'employee_id' => "",
            'pay_for' => "",
            'amount' => "",
            'status' => "",
            'request' => ""
        );

        view('modal_salary',[
            'employees' => $employees,
            'salary' => $salary,
            'payout_status' => $payout_status,
            'baseUrl' => $baseUrl,
            'type' => $type
        ]);

        break;
    
    case 'edit_salary':

        $id = route(2);
        $baseUrl = APP_URL;

        $id = str_replace('eid', '', $id);
        $d = ORM::for_table('employee_salary')->find_one($id);
     
        $employees = ORM::for_table('sys_users')->find_array();
        $payout_status = ['Not Processed', 'Processed', 'Paid'];

        $ui->assign('xheader', Asset::css(array('modal','s2/css/select2.min', 'dt/dt', 'fc/fc', 'fc/fc_ibilling','redactor/redactor', 'daterangepicker/daterangepicker')));
        $ui->assign('xfooter', Asset::js(array('modal','s2/js/select2.min', 's2/js/i18n/' . lan() , 'js/redirect','dt/dt', 'fc/fc','redactor/redactor.min', 'daterangepicker/daterangepicker','numeric')));
        $ui->assign('xjq', '
            $(\'.amount\').autoNumeric(\'init\', {
            dGroup: ' . $config['thousand_separator_placement'] . ',
            aPad: ' . $config['currency_decimal_digits'] . ',
            pSign: \'' . $config['currency_symbol_position'] . '\',
            aDec: \'' . $config['dec_point'] . '\',
            aSep: \'' . $config['thousands_sep'] . '\',
            vMax: \'9999999999999999.00\',
                        vMin: \'-9999999999999999.00\'

            });
            $(\'[data-toggle="tooltip"]\').tooltip();

        ');

        $type = 'edit';

        view('modal_salary',[
            'employees' => $employees,
            'salary' => $d,
            'payout_status' => $payout_status,
            'baseUrl' => $baseUrl,
            'type' => $type
        ]);

        break;

    case 'view_salary':

        $id = route(2);
        $baseUrl = APP_URL;

        $d = ORM::for_table('employee_salary')->find_one($id);

        $employees = ORM::for_table('sys_users')->find_array();
        $payout_status = ['Not Processed', 'Processed', 'Paid'];

        $ui->assign('xheader', Asset::css(array('modal','s2/css/select2.min', 'dt/dt', 'fc/fc', 'fc/fc_ibilling','redactor/redactor', 'daterangepicker/daterangepicker')));
        $ui->assign('xfooter', Asset::js(array('modal','s2/js/select2.min', 's2/js/i18n/' . lan() , 'js/redirect','dt/dt', 'fc/fc','redactor/redactor.min', 'daterangepicker/daterangepicker','numeric')));
        $ui->assign('xjq', '
            $(\'.amount\').autoNumeric(\'init\', {
            dGroup: ' . $config['thousand_separator_placement'] . ',
            aPad: ' . $config['currency_decimal_digits'] . ',
            pSign: \'' . $config['currency_symbol_position'] . '\',
            aDec: \'' . $config['dec_point'] . '\',
            aSep: \'' . $config['thousands_sep'] . '\',
            vMax: \'9999999999999999.00\',
                        vMin: \'-9999999999999999.00\'

            });
            $(\'[data-toggle="tooltip"]\').tooltip();

        ');

        $type = 'view';

        view('modal_salary',[
            'employees' => $employees,
            'salary' => $d,
            'payout_status' => $payout_status,
            'baseUrl' => $baseUrl,
            'type' => $type
        ]);

        break;

    case 'delete_salary':

        $id = route(2);
        $d = ORM::for_table('employee_salary')->find_one($id);

        if ($d) {
            $d->delete();
            r2(U . 'hrm/salary/', 's', 'Delete Successfully');
        }

        break;

    case 'delete_salaries':

         if(!isset($_POST['ids'])){
            exit;
        }

        $ids_raw = $_POST['ids'];

        $ids = array();

        foreach ($ids_raw as $id_single){
            $id = str_replace('row_','',$id_single);
            array_push($ids,$id);
        }

        $contacts = ORM::for_table('employee_salary')->where_id_in($ids)->delete_many();

        r2(U.'hrm/salary','s',$_L['Deleted Successfully']);

        break;
        
    case 'test':

        add_option('employee_proficiencies',1);

        break;

    case 'schema':

        $script = '<script>
    $(function() {
        var delay = 10000;
        var $serverResponse = $("#serverResponse");
        var interval = setInterval(function(){
   $serverResponse.append(\'.\');
}, 500);
        
        setTimeout(function(){ window.location = \''.U.'hrm/employees\'; }, delay);
    });
</script>';

        if(db_table_exist('employees')){
            HtmlCanvas::createTerminal('Already updated!',$script);
            exit;
        }

        $message = 'Updating scehma to support HRM... '.PHP_EOL;

        if(!db_table_exist('employees'))
        {
            ORM::execute('CREATE TABLE `employees` (
            `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
            `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `job_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `date_hired` date DEFAULT NULL,
            `department_id` int(10) unsigned DEFAULT NULL,
            `manager_id` int(10) unsigned DEFAULT NULL,
            `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `pay_frequency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `currency` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
            `amount` decimal(16,8) NOT NULL,
            `employee_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `legal_name_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `legal_name_first` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `legal_name_mi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `legal_name_last` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `banking_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `ssn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `date_of_birht` date DEFAULT NULL,
            `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `is_citizen` tinyint(1) NOT NULL DEFAULT \'1\',
            `ethnicity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `has_i9_form` tinyint(1) DEFAULT NULL,
            `work_authorization_expires` date DEFAULT NULL,
            `address_line_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `address_line_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `work_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `work_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `work_fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `cc_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `emergency_contact_name_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `emergency_contact_phone_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `emergency_contact_relation_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `emergency_contact_name_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `emergency_contact_phone_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `emergency_contact_relation_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `last_day_worked` date DEFAULT NULL,
            `last_day_on_benefits` date DEFAULT NULL,
            `last_day_on_payroll` date DEFAULT NULL,
            `termination_type` date DEFAULT NULL,
            `termination_reason` date DEFAULT NULL,
            `is_recommended` tinyint(1) DEFAULT NULL,
            `is_active` tinyint(1) NOT NULL DEFAULT \'1\',
            `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `google` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `skype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `summary` text COLLATE utf8mb4_unicode_ci,
            `deleted_at` timestamp NULL DEFAULT NULL,
            `created_at` timestamp NULL DEFAULT NULL,
            `updated_at` timestamp NULL DEFAULT NULL,
            PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');
        }

        if(!db_table_exist('attendances'))
        {
            ORM::execute('CREATE TABLE `attendances` (
            `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
            `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `employee_id` int(10) unsigned NOT NULL,
            `date` date NOT NULL,
            `is_present` tinyint(1) NOT NULL DEFAULT \'1\',
            `total_time` int(10) unsigned DEFAULT NULL,
            `created_at` timestamp NULL DEFAULT NULL,
            `updated_at` timestamp NULL DEFAULT NULL,
            PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');
        }


        if(!db_table_exist('expertise'))
        {
            ORM::execute('');
        }

        $message .= 'Tables were created...'.PHP_EOL;

        $message .= '---------------------------'.PHP_EOL;
        $message .= 'Redirecting, please wait...';


        HtmlCanvas::createTerminal($message,$script);

        break;

    default:
        echo 'action not defined';
}