<?php

class Update{


    public static function dbChanges()
    {

        global $config;

        $current_build = 3;

        $s_version = $config['s_version'];

        $message = '';

        $updates = [


            1 => [

            ],
            2=> [

            ],

            3=> [

            ],

            4=> [

            ],

            5=> [

            ],

            6=> [

            ],

            7=> [

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




                    break;



                case 6:


                    break;

                case 7:


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

        return $resp;

    }


    public static function singleCommand()
    {
        if(function_exists('ini_set')){

            ini_set('memory_limit', '512M');
            ini_set('max_execution_time', 300);


        }


        global $config,$file_build;
        $message = '';

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


        if(!db_table_exist('app_password_manager')){
            ORM::execute('CREATE TABLE `app_password_manager` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8');
        }


        if(!db_table_exist('expense_types')){
            ORM::execute('CREATE TABLE `expense_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sorder` int(11) DEFAULT \'0\',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin');
        }

        if(!db_column_exist('sys_users','sms_notify')){

            // ALTER TABLE `sys_users` ADD `sms_notify` INT(1) NOT NULL DEFAULT '0', ADD `email_notify` INT(1) NOT NULL DEFAULT '0', ADD `slack_notify` INT(1) NOT NULL DEFAULT '0';
            // ORM::execute('ALTER TABLE `sys_invoices` ADD `quote_id` INT(11) NOT NULL DEFAULT \'0\' AFTER `vid`');
            ORM::execute('ALTER TABLE `sys_users` ADD `sms_notify` INT(1) NOT NULL DEFAULT \'0\', ADD `email_notify` INT(1) NOT NULL DEFAULT \'0\', ADD `slack_notify` INT(1) NOT NULL DEFAULT \'0\'');
        }


        if(!db_column_exist('sys_invoices','quote_id')){

            // ALTER TABLE `sys_users` ADD `sms_notify` INT(1) NOT NULL DEFAULT '0', ADD `email_notify` INT(1) NOT NULL DEFAULT '0', ADD `slack_notify` INT(1) NOT NULL DEFAULT '0';

            ORM::execute('ALTER TABLE `sys_invoices` ADD `quote_id` INT(11) NOT NULL DEFAULT \'0\' AFTER `vid`');


        }

        // ALTER TABLE `sys_tax` ADD `is_default` INT(1) NOT NULL DEFAULT '0'

        if(!db_column_exist('sys_tax','is_default')){

            // ALTER TABLE `sys_users` ADD `sms_notify` INT(1) NOT NULL DEFAULT '0', ADD `email_notify` INT(1) NOT NULL DEFAULT '0', ADD `slack_notify` INT(1) NOT NULL DEFAULT '0';


            ORM::execute('ALTER TABLE `sys_tax` ADD `is_default` INT(1) NOT NULL DEFAULT \'0\'');
        }

        // ALTER TABLE `sys_tax` ADD `created_at` TIMESTAMP NULL DEFAULT NULL, ADD `updated_at` TIMESTAMP NULL DEFAULT NULL

        if(!db_column_exist('sys_tax','created_at')){

            ORM::execute('ALTER TABLE `sys_tax` ADD `created_at` TIMESTAMP NULL DEFAULT NULL, ADD `updated_at` TIMESTAMP NULL DEFAULT NULL');
        }


        // ALTER TABLE `sys_invoiceitems` ADD `tax_name` VARCHAR(200) NULL DEFAULT NULL AFTER `taxed`, ADD `tax_rate` DECIMAL(16,2) NULL DEFAULT NULL AFTER `tax_name`

        if(!db_column_exist('sys_invoiceitems','tax_rate')){

            ORM::execute('ALTER TABLE `sys_invoiceitems` ADD `tax_name` VARCHAR(200) NULL DEFAULT NULL AFTER `taxed`, ADD `tax_rate` DECIMAL(16,2) NULL DEFAULT NULL AFTER `tax_name`');
        }


        if(!db_column_exist('sys_pg','account_id')){

            ORM::execute('ALTER TABLE `sys_pg` ADD `account_id` INT(11) UNSIGNED NULL DEFAULT NULL, ADD `created_at` TIMESTAMP NULL DEFAULT NULL, ADD `updated_at` TIMESTAMP NULL DEFAULT NULL');

            // Add all payment gateways




        }

        /*
         CREATE TABLE `relations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_id` int(11) NOT NULL,
  `target_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
         */

        if(!db_table_exist('relations')){
            ORM::execute('CREATE TABLE `relations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_id` int(11) NOT NULL,
  `target_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');
            $message .= 'Created relations table...'.PHP_EOL;

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
        addOption('show_country_flag','1');
        addOption('drive','1');

        addOption('tax_system','default');
        addOption('pos','1');
        addOption('password_manager','1');
        addOption('update_manager','1');

        addOption('business_location','default');

        addPermission('Password Manager','password_manager');


        if(!db_table_exist('credit_cards')){
            ORM::execute('CREATE TABLE `credit_cards` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contact_id` int(10) unsigned NOT NULL,
  `card_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_holder_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_number` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_month` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_year` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cvv` char(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');
            $message .= 'Created credit cards table...'.PHP_EOL;

        }

        if(!db_table_exist('clx_shared_preferences')){
            ORM::execute('CREATE TABLE `clx_shared_preferences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `relation_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation_id` int(10) unsigned NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');

            $message .= 'Created shared_preferences table...'.PHP_EOL;
        }



        if(!db_table_exist('clx_integrations')){

            ORM::execute('CREATE TABLE `clx_integrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT \'1\',
  `is_default` tinyint(1) NOT NULL DEFAULT \'0\',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');

            $message .= 'Created integrations table...'.PHP_EOL;
        }


        if(!db_column_exist('sys_invoices','ticket_id')){

            ORM::execute('ALTER TABLE `sys_invoices` ADD `ticket_id` INT(11) NULL DEFAULT 0 AFTER `quote_id`, ADD `title` VARCHAR(200) NULL DEFAULT NULL AFTER `account`');

            ORM::execute('ALTER TABLE `sys_purchases` ADD `title` VARCHAR(200) NULL DEFAULT NULL AFTER `account`');

            $message .= 'Invoice table updated...'.PHP_EOL;

            addOption('show_sidebar_header','1');
            addOption('top_bar_is_dark','1');

        }

        if(!db_column_exist('sys_accounts','owner_id')){

            ORM::execute('ALTER table sys_accounts add `owner_id` int(10) unsigned DEFAULT NULL after `status`');

        }



        updateOption('cache_id',time());

        ORM::execute('ALTER TABLE `sys_transactions` CHANGE `type` `type` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL');

        if(!db_column_exist('sys_tickets','c1')){

            ORM::execute('ALTER TABLE `sys_tickets` 
 ADD `c1` VARCHAR (255) NULL DEFAULT NULL,
 ADD `c2` VARCHAR(255) NULL DEFAULT NULL,
 ADD `c3` VARCHAR(255) NULL DEFAULT NULL,
 ADD `c4` VARCHAR(255) NULL DEFAULT NULL,
 ADD `c5` text');

            ORM::execute('ALTER TABLE `sys_invoices` ADD `c1` VARCHAR (255) NULL DEFAULT NULL,
 ADD `c2` VARCHAR(255) NULL DEFAULT NULL,
 ADD `c3` VARCHAR(255) NULL DEFAULT NULL,
 ADD `c4` VARCHAR(255) NULL DEFAULT NULL,
 ADD `c5` text,
 ADD `signature_data_source` text,
 ADD `signature_data_base64` text,
 ADD `signature_data_svg` text');

        }

        add_option('slack_webhook_url','');

        if(!db_column_exist('sys_transactions','currency_iso_code')){

            ORM::execute('ALTER TABLE `sys_transactions` ADD `account_id` INT(11) NOT NULL DEFAULT \'0\' AFTER `account`, ADD `currency_iso_code` CHAR(3) NULL DEFAULT NULL AFTER `iid`');

            ORM::execute('ALTER TABLE `sys_invoiceitems` ADD `tax_code` VARCHAR(200) NULL DEFAULT NULL AFTER `itemcode`, ADD `tax1` DECIMAL(16,4) NOT NULL DEFAULT \'0.00\' AFTER `taxamount`, ADD `tax2` DECIMAL(16,4) NOT NULL DEFAULT \'0.00\' AFTER `tax1`, ADD `tax3` DECIMAL(16,4) NOT NULL DEFAULT \'0.00\' AFTER `tax2`, ADD `discount_type` VARCHAR(100) NULL DEFAULT NULL AFTER `tax3`, ADD `discount_amount` DECIMAL(16,4) NOT NULL DEFAULT \'0.00\' AFTER `discount_type`');

            // Set all previous currency to home currency

            ORM::execute('UPDATE `sys_transactions` SET `currency_iso_code` =\''.$config['home_currency'].'\' WHERE `currency_iso_code` IS NULL');

            ORM::execute('ALTER TABLE `sys_invoices` ADD `currency_iso_code` CHAR(3) NULL DEFAULT NULL AFTER `currency`, ADD `tax1_total` DECIMAL(16,4) NOT NULL DEFAULT \'0.00\' AFTER `tax2`, ADD `tax2_total` DECIMAL(16,4) NOT NULL DEFAULT \'0.00\' AFTER `tax1_total`, ADD `tax3_total` DECIMAL(16,4) NOT NULL DEFAULT \'0.00\' AFTER `tax2_total`, ADD `tax_total` DECIMAL(16,4) NOT NULL DEFAULT \'0.00\' AFTER `tax3_total`');


            // Update Account Id

            $transactions = Transaction::all();

            $accounts = Account::all()->keyBy('account')->all();

            foreach ($transactions as $transaction)
            {
                if(isset($accounts[$transaction->account]))
                {
                    $transaction->account_id = $accounts[$transaction->account]->id;
                    $transaction->save();
                }
            }

            $currencies = Currency::all()->keyBy('id')->all();

            $invoices = Invoice::all();

            foreach ($invoices as $invoice)
            {
                if(isset($currencies[$invoice->currency]))
                {
                    $invoice->currency_iso_code = $currencies[$invoice->currency]->iso_code;
                    $invoice->save();
                }
            }



            ORM::execute('ALTER TABLE `sys_purchaseitems` ADD `tax_code` VARCHAR(200) NULL DEFAULT NULL AFTER `itemcode`, ADD `tax1` DECIMAL(16,4) NOT NULL DEFAULT \'0.00\' AFTER `taxamount`, ADD `tax2` DECIMAL(16,4) NOT NULL DEFAULT \'0.00\' AFTER `tax1`, ADD `tax3` DECIMAL(16,4) NOT NULL DEFAULT \'0.00\' AFTER `tax2`, ADD `discount_type` VARCHAR(100) NULL DEFAULT NULL AFTER `tax3`, ADD `discount_amount` DECIMAL(16,4) NOT NULL DEFAULT \'0.00\' AFTER `discount_type`');

            ORM::execute('ALTER TABLE `sys_purchases` ADD `currency_iso_code` CHAR(3) NULL DEFAULT NULL AFTER `currency`, ADD `tax1_total` DECIMAL(16,4) NOT NULL DEFAULT \'0.00\' AFTER `tax2`, ADD `tax2_total` DECIMAL(16,4) NOT NULL DEFAULT \'0.00\' AFTER `tax1_total`, ADD `tax3_total` DECIMAL(16,4) NOT NULL DEFAULT \'0.00\' AFTER `tax2_total`, ADD `tax_total` DECIMAL(16,4) NOT NULL DEFAULT \'0.00\' AFTER `tax3_total`');

            $invoices = Purchase::all();

            foreach ($invoices as $invoice)
            {
                if(isset($currencies[$invoice->currency]))
                {
                    $invoice->currency_iso_code = $currencies[$invoice->currency]->iso_code;
                    $invoice->save();
                }
            }

        }


        if(!db_column_exist('sys_invoices','is_same_state')){
            ORM::execute('ALTER TABLE `sys_invoices` ADD `is_same_state` TINYINT(1) NULL DEFAULT \'1\'');

            ORM::execute('ALTER TABLE `sys_items` ADD `tax_code` VARCHAR(200) NULL DEFAULT NULL');

        }


        if(!isset($config['number_pad']))
        {
            $message .= 'Adding support for codes..'.PHP_EOL;

            add_option('number_pad','5');

            add_option('customer_code_prefix','CUS-');
            add_option('customer_code_template','');
            add_option('customer_code_current_number','1');

            add_option('supplier_code_prefix','SUP-');
            add_option('supplier_code_template','');
            add_option('supplier_code_current_number','1');

            add_option('income_code_prefix','INC-');
            add_option('income_code_template','');
            add_option('income_code_current_number','1');

            add_option('expense_code_prefix','EXP-');
            add_option('expense_code_template','');
            add_option('expense_code_current_number','1');

            add_option('invoice_code_prefix','INV-');
            add_option('invoice_code_template','');
            add_option('invoice_code_current_number','1');

            add_option('quotation_code_prefix','QUOTE-');
            add_option('quotation_code_template','');
            add_option('quotation_code_current_number','1');

            add_option('purchase_code_prefix','PO-');
            add_option('purchase_code_template','');
            add_option('purchase_code_current_number','1');


            add_option('contact_display_name_string','Display Name');

            ORM::execute('ALTER TABLE `crm_accounts` ADD `code` VARCHAR(100) NULL DEFAULT NULL, ADD `display_name` VARCHAR(200) NULL DEFAULT NULL');
            ORM::execute('ALTER TABLE `sys_transactions` ADD `code` VARCHAR(100) NULL DEFAULT NULL');
            ORM::execute('ALTER TABLE `sys_purchases` ADD `code` VARCHAR(100) NULL DEFAULT NULL');
            ORM::execute('ALTER TABLE `sys_invoices` ADD `code` VARCHAR(100) NULL DEFAULT NULL');
            ORM::execute('ALTER TABLE `sys_quotes` ADD `code` VARCHAR(100) NULL DEFAULT NULL');

        }

        if(!isset($config['contact_extra_field']))
        {
            add_option('contact_extra_field','Display Name');
        }

        if(!isset($config['company_code_prefix']))
        {
            add_option('company_code_prefix','COMP-');
            add_option('company_code_template','');
            add_option('company_code_current_number','1');
            ORM::execute('ALTER TABLE `sys_companies` ADD `code` VARCHAR(100) NULL DEFAULT NULL AFTER `company_name`');
        }


        if(!isset($config['invoice_po_field']))
        {

        	ORM::execute('ALTER TABLE `crm_accounts` ADD `secondary_email` VARCHAR(200) NULL DEFAULT NULL, ADD `secondary_phone` VARCHAR(200) NULL DEFAULT NULL');


        }

        $message .= '... Done!'.PHP_EOL;

        return $message;

    }






}