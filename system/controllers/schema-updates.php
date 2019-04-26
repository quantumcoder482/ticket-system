<?php



$current_build = 1001;

$s_version = $config['s_version'];

$message = '';

$updates = [


    1 => [

    ],
    2=> [

    ]


];

$max = max(array_keys($updates));

if($s_version != $max){

    // update the schemas


    $next_key = $s_version+1;


    foreach ($updates[$next_key] as $statement){
        DB::statement($statement);
    }


    switch ($next_key){


        case 1:



            break;



        case 2:



            break;


        case 3:



            break;



        case 4:


            break;



        case 5:

            $message .= 'Updating Permissions...'.PHP_EOL;
            addPermission('Purchase','purchase');
            addPermission('Suppliers','suppliers');
            addPermission('SMS','sms');
            addPermission('Support','support');
            addPermission('Knowledgebase','kb');
            $message .= 'Done!'.PHP_EOL;

            $message .= 'Adding SMS Templates...'.PHP_EOL;

            addSmsTemplate('Quote Accepted: Admin Notification','Quote - {{quote_id}} has been accepted. You can view this Quote- {{quote_url}}');

            addSmsTemplate('Quote Cancelled: Admin Notification','Quote - {{quote_id}} has been Cancelled. You can view this Quote- {{quote_url}}');


            $message .= 'Adding Drive Column...'.PHP_EOL;
            $t = new Schema('crm_accounts');
            $t->add_column();
            $t->add('drive','varchar',50);
            $x = $t->save();

            if($x === true){

                $message .= 'Done!'.PHP_EOL;
            }
            else{
                $message .= 'Column already exist, skipped!'.PHP_EOL;
            }



            addOption('invoice_receipt_number','0');
            addOption('allow_customer_registration','1');
            addOption('fax_field','0');
            addOption('show_business_number','0');
            addOption('label_business_number','Business Number');
            addOption('sms','1');
            addOption('sms_request_method','POST');
            addOption('sms_auth_header','');
            addOption('sms_req_url','');
            addOption('sms_notify_admin_new_deposit','0');
            addOption('sms_notify_customer_signed_up','0');
            addOption('sms_notify_customer_invoice_created','0');
            addOption('sms_notify_customer_invoice_paid','0');
            addOption('sms_notify_customer_payment_received','0');
            addOption('sms_api_handler','Nexmo');
            addOption('sms_auth_username','');
            addOption('sms_auth_password','');
            addOption('sms_sender_name','CLX');
            addOption('sms_http_params','');
            addOption('purchase_invoice_payment_status','0');
            addOption('quote_confirmation_email','1');
            addOption('client_drive','0');
            addOption('s_version','4');
            addOption('latest_file','');
            addOption('invoice_show_watermark','1');


            $t = new Schema('app_sms');
            $t->add('req_time','datetime');
            $t->add('sent_time','datetime');
            $t->add('sms_from');
            $t->add('sms_to');
            $t->add('sms');
            $t->add('driver');
            $t->add('resp');
            $t->add('status','varchar',200);
            $t->add('stype','varchar',200,'Sent');
            $t->add('cid','int',11);
            $t->add('aid','int',11);
            $t->add('company_id','int',11);
            $t->add('iid','int',11);
            $t->add('trid','int',11);
            $t->add('lid','int',11);
            $t->add('oid','int',11);
            $t->save();


            $t = new Schema('app_sms_drivers');
            $t->add('dname','varchar',200);
            $t->add('handler','varchar',200);
            $t->add('weburl','varchar',200);
            $t->add('description');
            $t->add('url','varchar',200);
            $t->add('incoming_url','varchar',200);
            $t->add('method','varchar',50);
            $t->add('username','varchar',200);
            $t->add('password','varchar',200);
            $t->add('api_key','varchar',200);
            $t->add('api_secret','varchar',200);
            $t->add('route','varchar',200);
            $t->add('sender_id','varchar',100);
            $t->add('balance','decimal','14,2');
            $t->add('placeholder');
            $t->add('status','varchar',100);
            $t->add('is_active','int',1,'0');
            $t->add_primary_data('(`id`, `dname`, `handler`, `weburl`, `description`, `url`, `incoming_url`, `method`, `username`, `password`, `api_key`, `api_secret`, `route`, `sender_id`, `balance`, `placeholder`, `status`, `is_active`) VALUES (NULL, \'custom\', \'custom\', \'http://www.example.com\', \'Your Custom Gateway\', \'http://api.example.com\', \'http://www.example.com/incoming/\', \'GET\', \'your_username\', \'your_password\', \'your_api_key\', \'your_api_secret\', \'1\', \'CloudOnex\', \'1.00\', \'{{url}}/send.php?username={{username}}&password={{password}}&from={{from}}&to={{to}}&message={{message}}\', \'Sandbox\', \'0\'), (NULL, \'test\', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, \'0\')');
            $t->save();


            $t = new Schema('app_sms_templates');
            $t->add('tpl','varchar','200');
            $t->add('sms');
            $t->add('status','varchar',200);
            $t->save();

           if(!db_table_exist('sys_purchases')){
               ORM::execute('CREATE TABLE `sys_purchases` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `userid` int(10) NOT NULL,
  `supplier_id` int(10) DEFAULT NULL,
  `supplier_name` varchar(200) DEFAULT NULL,
  `account` varchar(200) NOT NULL,
  `cn` varchar(100) NOT NULL DEFAULT \'\',
  `invoicenum` text NOT NULL,
  `date` date DEFAULT NULL,
  `duedate` date DEFAULT NULL,
  `datepaid` datetime DEFAULT NULL,
  `subtotal` decimal(18,2) NOT NULL,
  `discount_type` varchar(1) NOT NULL DEFAULT \'f\',
  `discount_value` decimal(14,2) NOT NULL DEFAULT \'0.00\',
  `discount` decimal(14,2) NOT NULL DEFAULT \'0.00\',
  `credit` decimal(10,2) NOT NULL DEFAULT \'0.00\',
  `taxname` varchar(100) DEFAULT NULL,
  `tax` decimal(10,2) DEFAULT NULL,
  `tax2` decimal(10,2) DEFAULT NULL,
  `total` decimal(18,2) NOT NULL DEFAULT \'0.00\',
  `taxrate` decimal(10,2) DEFAULT NULL,
  `taxrate2` decimal(10,2) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `paymentmethod` text NOT NULL,
  `notes` text NOT NULL,
  `vtoken` varchar(20) NOT NULL,
  `ptoken` varchar(20) NOT NULL,
  `r` varchar(100) NOT NULL DEFAULT \'0\',
  `nd` date DEFAULT NULL,
  `eid` int(10) NOT NULL DEFAULT \'0\',
  `ename` varchar(200) NOT NULL DEFAULT \'\',
  `vid` int(11) NOT NULL DEFAULT \'0\',
  `currency` int(11) NOT NULL DEFAULT \'0\',
  `currency_symbol` varchar(10) DEFAULT NULL,
  `currency_prefix` varchar(10) DEFAULT NULL,
  `currency_suffix` varchar(10) DEFAULT NULL,
  `currency_rate` decimal(11,4) NOT NULL DEFAULT \'1.0000\',
  `recurring` tinyint(1) NOT NULL DEFAULT \'0\',
  `recurring_ends` date DEFAULT NULL,
  `last_recurring_date` date DEFAULT NULL,
  `source` varchar(200) DEFAULT NULL,
  `sale_agent` int(11) NOT NULL DEFAULT \'0\',
  `last_overdue_reminder` date DEFAULT NULL,
  `allowed_payment_methods` text,
  `billing_street` varchar(200) DEFAULT NULL,
  `billing_city` varchar(100) DEFAULT NULL,
  `billing_state` varchar(100) DEFAULT NULL,
  `billing_zip` varchar(50) DEFAULT NULL,
  `billing_country` varchar(100) DEFAULT NULL,
  `shipping_street` varchar(200) DEFAULT NULL,
  `shipping_city` varchar(100) DEFAULT NULL,
  `shipping_state` varchar(100) DEFAULT NULL,
  `shipping_zip` varchar(100) DEFAULT NULL,
  `shipping_country` varchar(100) DEFAULT NULL,
  `q_hide` tinyint(1) NOT NULL DEFAULT \'0\',
  `show_quantity_as` varchar(100) DEFAULT NULL,
  `pid` int(11) NOT NULL DEFAULT \'0\',
  `is_credit_invoice` int(1) NOT NULL DEFAULT \'0\',
  `aid` int(11) NOT NULL DEFAULT \'0\',
  `aname` varchar(200) DEFAULT NULL,
  `business_id` int(11) DEFAULT NULL,
  `receipt_number` varchar(200) DEFAULT NULL,
  `stage` varchar(200) DEFAULT \'Pending\',
  `subject` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8');



               ORM::execute('CREATE TABLE `sys_purchaseitems` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `invoiceid` int(10) NOT NULL DEFAULT \'0\',
  `userid` int(10) NOT NULL,
  `type` text NOT NULL,
  `relid` int(10) NOT NULL,
  `itemcode` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `qty` varchar(20) NOT NULL DEFAULT \'1\',
  `amount` decimal(14,2) NOT NULL DEFAULT \'0.00\',
  `taxed` int(1) NOT NULL,
  `tax_rate` decimal(16,2) DEFAULT NULL,
  `tax_name` varchar(200) DEFAULT NULL,
  `taxamount` decimal(10,2) NOT NULL DEFAULT \'0.00\',
  `total` decimal(14,2) NOT NULL DEFAULT \'0.00\',
  `duedate` date DEFAULT NULL,
  `paymentmethod` text NOT NULL,
  `notes` text NOT NULL,
  `business_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8');




           }



           if(!db_table_exist('sys_status')){
               ORM::execute('CREATE TABLE `sys_status` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `sorder` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8');
           }


            break;



        case 6:


            break;


    }


    update_option('s_version',$next_key);

   // echo 'Updated to Schema: '.$next_key;

    $resp = [
        'continue' => true,
        'message' => $message.'Updated to Schema: '.$next_key
    ];


}
else{

    update_option('build',$current_build);

    $resp = [
        'continue' => false,
        'message' => 'No more update is available'
    ];
}

api_response($resp);





