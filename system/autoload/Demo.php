<?php

use Faker\Provider\DateTime;

Class Demo {

    public static function reset(){

        global $file_build,$config;

        $current_url_rewrite = $config['url_rewrite'];

        $defaults = [
            'graph_primary_color' => '002868',
            'graph_secondary_color' => 'dc171d',
        ];

        DB::table('crm_accounts')->truncate();
        DB::table('account_balances')->truncate();
        DB::table('sys_accounts')->truncate();
        DB::table('crm_leads')->truncate();
        DB::table('sys_invoices')->truncate();
        DB::table('sys_invoiceitems')->truncate();
        DB::table('sys_quotes')->truncate();
        DB::table('sys_quoteitems')->truncate();
        DB::table('sys_api')->truncate();
        DB::table('crm_groups')->truncate();
        DB::table('sys_currencies')->truncate();
        DB::table('sys_transactions')->truncate();
        DB::table('sys_companies')->truncate();
        DB::table('sys_items')->truncate();
        DB::table('sys_logs')->truncate();
        DB::table('sys_orders')->truncate();
        DB::table('sys_tasks')->truncate();
        DB::table('sys_ticketreplies')->truncate();
        DB::table('sys_tickets')->truncate();
        DB::table('sys_ticketdepartments')->truncate();

        DB::table('app_sms')->truncate();
        DB::table('sys_purchases')->truncate();
        DB::table('sys_purchaseitems')->truncate();
        DB::table('crm_customfieldsvalues')->truncate();
        DB::table('expense_types')->truncate();
        DB::table('ib_kb')->truncate();
        DB::table('ib_kb_groups')->truncate();
        DB::table('ib_kb_rel')->truncate();
        DB::table('order_items')->truncate();
        DB::table('sys_cart')->truncate();
        DB::table('sys_email_logs')->truncate();


        DB::table('crm_customfields')->truncate();


        DB::table('sys_documents')->truncate();

        DB::table('sys_tags')->truncate();

        DB::table('sys_pl')->truncate();
        DB::table('sys_events')->truncate();
        DB::table('ib_doc_rel')->truncate();
        DB::table('sys_canned_responses')->truncate();

        DB::table('sys_emailconfig')->truncate();

        ORM::execute('INSERT INTO `sys_emailconfig` (`id`, `method`, `host`, `username`, `password`, `apikey`, `port`, `secure`)
VALUES
	(1, \'phpmail\', \'\', \'\', \'\', \'\', \'\', \'\');
');

        // plugins

        Schema::dropIfExists('app_wed_events');

        //

        Tax::taxReset();
        update_option('tax_system','default');


        $reset_configs = [

            'CompanyName' => 'CloudOnex LLC.',
            'theme' => 'default',
            'currency_code' => '$',
            'language' => 'en',
            'show-logo' => '1',
            'nstyle' => 'light_blue',
            'dec_point' => '.',
            'thousands_sep' => ',',
            'timezone' => 'America/New_York',
            'country' => 'United States',
            'country_code' => 'US',
            'df' => 'Y-m-d',
            'caddress' => 'CloudOnex <br>1101 Marina Villae Parkway, Suite 201<br>Alameda, California 94501<br>United State',
            'account_search' => '1',
            'redirect_url' => 'dashboard',
            'rtl' => '0',
            'ckey' => '0982995697',
            'networth_goal' => '350000',
            'sysEmail' => 'demo@example.com',
            'url_rewrite' => $current_url_rewrite,
            'build' => $file_build,
            'animate' => '0',
            'pdf_font' => 'dejavusanscondensed',
            'accounting' => '1',
            'invoicing' => '1',
            'quotes' => '1',
            'client_dashboard' => '1',
            'contact_set_view_mode' => 'search',
            'invoice_terms' => '',
            'console_notify_invoice_created' => '0',
            'i_driver' => 'v2',
            'purchase_key' => 'B5VE-SNP4-KB15-1179-7948',
            'c_cache' => '',
            'mininav' => '0',
            'hide_footer' => '1',
            'design' => 'default',
            'default_landing_page' => 'login',
            'recaptcha' => '0',
            'recaptcha_sitekey' => '',
            'recaptcha_secretkey' => '',
            'home_currency' => 'USD',
            'currency_decimal_digits' => 'true',
            'currency_symbol_position' => 'p',
            'thousand_separator_placement' => '3',
            'dashboard' => 'canvas',
            'header_scripts' => '',
            'footer_scripts' => '',
            'ib_key' => 'vLBLfhA6DNi1R2MFHO8IvFWr4Cn9665eHUF+L/sqAKM=',
            'ib_s' => 'PNhjeZ0sOFF3JNfzT2mLxvNNKPeh6ltqpE+G5LVSDSvgp/z79Sco7W4tJEoXYIl8',
            'ib_u_t' => '1512841700',
            'ib_u_a' => '0',
            'momentLocale' => 'en',
            'contentAnimation' => 'animated fadeIn',
            'calendar' => '1',
            'leads' => '1',
            'tasks' => '1',
            'orders' => '1',
            'show_quantity_as' => '',
            'gmap_api_key' => '',
            'license_key' => '5FEB-2E39-D4DF-24C0-5DF8-2090-AC98-5962',
            'local_key' => '',
            'ib_installed_at' => '1485170108',
            'maxmind_installed' => '1',
            'maxmind_db_version' => '',
            'add_fund' => '1',
            'add_fund_minimum_deposit' => '100',
            'add_fund_maximum_deposit' => '2500',
            'add_fund_maximum_balance' => '25000',
            'add_fund_require_active_order' => '0',
            'industry' => 'default',
            'sales_target' => '10000',
            'inventory' => '1',
            'secondary_currency' => '',
            'customer_custom_username' => '1',
            'documents' => '1',
            'projects' => '0',
            'purchase' => '1',
            'suppliers' => '1',
            'support' => '1',
            'hrm' => '1',
            'companies' => '1',
            'plugins' => '1',
            'country_flag_code' => 'us',
            'graph_primary_color' => $defaults['graph_primary_color'],
            'graph_secondary_color' => $defaults['graph_secondary_color'],
            'expense_type_1' => 'Personal',
            'expense_type_2' => 'Business',
            'edition' => 'default',
            'assets' => '1',
            'kb' => '1',
            'business_id_1' => '',
            'business_id_2' => '',
            'logo_default' => 'logo_2105025689.png',
            'logo_inverse' => 'logo_inverse_7627893866.png',
            'add_fund_client' => '0',
            'order_method' => 'create_invoice_later',
            'purchase_code' => '',
            'invoice_receipt_number' => '0',
            'allow_customer_registration' => '1',
            'fax_field' => '0',
            'show_business_number' => '1',
            'label_business_number' => 'Business Number',
            'sms' => '1',
            'sms_request_method' => 'POST',
            'sms_auth_header' => '',
            'sms_req_url' => '',
            'sms_notify_admin_new_deposit' => '0',
            'sms_notify_customer_signed_up' => '0',
            'sms_notify_customer_invoice_created' => '0',
            'sms_notify_customer_invoice_paid' => '0',
            'sms_notify_customer_payment_received' => '0',
            'sms_api_handler' => 'Nexmo',
            'sms_auth_username' => '',
            'sms_auth_password' => '',
            'sms_sender_name' => 'CLX',
            'sms_http_params' => '',
            'purchase_invoice_payment_status' => '0',
            'quote_confirmation_email' => '1',
            'client_drive' => '1',
            's_version' => '7',
            'latest_file' => '4618152936941418.zip',
            'invoice_show_watermark' => '1',
            'show_country_flag' => '0',
            'drive' => '0',
            'tax_system' => 'default',
            'password_manager' => 'default',
            'update_manager' => '1',
            'business_location' => '',

        ];

        foreach ($reset_configs as $k=>$v){
            updateOption($k,$v);
        }



    }


    private static function genPhone($country){

        $phone = '';

        $start = array('016','017','018','019');

        if($country == 'bd'){


            $phone = $start[array_rand($start)]._raid(8);

        }

        return $phone;

    }

    private static function genEmail($name){
        $email = '';

        $domain = array('gmail.com','yahoo.com','hotmail.com');

        $name = str_replace(' ','',$name);
        $name = str_replace('Mr','',$name);
        $name = str_replace('Mrs','',$name);
        $name = str_replace('.','',$name);

        $email = $name.'@'.$domain[array_rand($domain)];

        return $email;

    }

    public static function makeReady($country = ''){



        $today = date('Y-m-d');

        $today_time = date('Y-m-d H:i:s');


        $gname = 'Default';



        switch ($country){

            case 'se':


                $faker = Faker\Factory::create('sv_SE');


                $gname = 'Standard';



                // create companies


                $c_emails_types = ['sales','info','admin','hello','media','support','billing'];

                for ($i=0; $i < 144; $i++){

                    shuffle($c_emails_types);

                    $company = new Company;

                    $company_name = $faker->company;

                    $company_domain = strtolower($company_name);
                    $company_domain = str_replace(' ','',$company_domain);
                    $company_domain = str_replace('.','',$company_domain);
                    $company_domain = str_replace(',','',$company_domain);
                    $company_domain = str_replace('-','',$company_domain);
                    $company_domain = $company_domain.'.com';
                    $company_email = $c_emails_types[0].'@'.$company_domain;

                    $company->company_name = $faker->company;
                    $company->email = $company_email;
                    $company->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);

                    $company->url = 'http://www.'.$company_domain;

                    $company->save();


                }

                $customers = [
                    [
                        'name' => 'Loredana Roslund',
                        'company' => 'Elctrolux',
                        'email' => 'l.roslund@gmail.com'
                    ],
                    [
                        'name' => 'Leif Johansson',
                        'company' => 'PP Media',
                        'email' => 'johansson91@gmail.com'
                    ],
                    [
                        'name' => 'Luciana Carrion',
                        'company' => 'ICA',
                        'email' => 'luciana.carrion@yahoo.com'
                    ],
                    [
                        'name' => 'Pascale Gimenez',
                        'company' => 'Willey',
                        'email' => 'pagi789@gmail.com'
                    ],
                    [
                        'name' => 'Jacob Wallenberg',
                        'company' => 'Nordic POST',
                        'email' => 'jacob.ibm@gmail.com'
                    ],
                    [
                        'name' => 'Helena Stjernholm',
                        'company' => 'Lidl',
                        'email' => 'helena.stockholm@gmail.com'
                    ],
                    [
                        'name' => 'Jon Fredrik',
                        'company' => 'IKEA',
                        'email' => 'jfredrik@gmail.com'
                    ],
                    [
                        'name' => 'Jan Carlson',
                        'company' => 'Stockholm Line',
                        'email' => 'jan.carlson2000@gmail.com'
                    ],
                    [
                        'name' => 'Nora Denzel',
                        'company' => 'Uppsala Cykel',
                        'email' => 'nora.denzel@gmail.com'
                    ],
                    [
                        'name' => 'Börje Ekholm',
                        'company' => 'JP Sushi',
                        'email' => 'ekholm.lund@gmail.com'
                    ],
                    [
                        'name' => 'Eric A. Elzvik',
                        'company' => 'Foodora',
                        'email' => 'eric.uppsala@gmail.com'
                    ],
                    [
                        'name' => 'Kristin Skogen Lund',
                        'company' => 'G&G Coffee',
                        'email' => 'skogen89@yahoo.com'
                    ],
                    [
                        'name' => 'Kristin S. Rinne',
                        'company' => 'ICA Basic',
                        'email' => 'rinne4477@gmail.com'
                    ],
                    [
                        'name' => 'Kjell-Åke Soting',
                        'company' => 'Sky Travel',
                        'email' => 'soting873@gmail.com'
                    ],
                    [
                        'name' => 'Roger Svensson',
                        'company' => 'SM Union',
                        'email' => 'roger.svernsson1@gmail.com'
                    ],
                    [
                        'name' => 'Torbjörn Nyman',
                        'company' => 'Nordia',
                        'email' => 'nyman.se@gmail.com'
                    ],
                    [
                        'name' => 'Anders Ripa',
                        'company' => 'SEB',
                        'email' => 'ripaandres@gmail.com'
                    ],
                    [
                        'name' => 'Björn Elfgren',
                        'company' => 'Media Market',
                        'email' => 'elfgren@outlook.com'
                    ],
                    [
                        'name' => 'Birger Lund',
                        'company' => 'Elgiganten',
                        'email' => 'birget_uu@hotmail.com'
                    ],
                    [
                        'name' => 'Magnus Mandersson',
                        'company' => 'H&M Home',
                        'email' => 'magnus.m@uu.se'
                    ],
                    [
                        'name' => 'Per Wendschlag',
                        'company' => 'ICA Interior',
                        'email' => 'per_ul@outlook.com'
                    ],
                    [
                        'name' => 'Mathias Kamprad',
                        'company' => 'Uppsala Car House',
                        'email' => 'mathias.kamp@gmail.com'
                    ],
                    [
                        'name' => 'David Wadström',
                        'company' => 'iClub Stockholm',
                        'email' => 'davidwad@gmail.com'
                    ],
                    [
                        'name' => 'Oliwer Wadström',
                        'company' => 'Media Store',
                        'email' => 'oliwer@live.com'
                    ],
                    [
                        'name' => 'Johanna Felix',
                        'company' => 'Hem Store',
                        'email' => 'johanafelix@gmail.com'
                    ],
                    [
                        'name' => 'Petra Wadström',
                        'company' => 'Helena Flowers',
                        'email' => 'perta.w@su.se'
                    ],
                    [
                        'name' => 'Gunnar Åkerblom',
                        'company' => 'MCS Fashion',
                        'email' => 'gunnar83@gmail.com'
                    ],
                    [
                        'name' => 'Karin Åberg',
                        'company' => 'Ahlens',
                        'email' => 'karin.uppsala@gmail.com'
                    ]



                ];


                $group = new ContactGroup;
                $group->gname = $gname;
                $group->save();

                $currency = new Currency;
                $currency->cname = 'SEK';
                $currency->iso_code = 'SEK';
                $currency->symbol = 'kr';
                $currency->save();


                update_option('CompanyName','CloudOnex LLC.');
              //  update_option('nstyle','light_blue');
                update_option('currency_code','kr');
                update_option('country','Sweden');
                update_option('country_flag_code','se');
                update_option('timezone','Europe/Stockholm');
                update_option('df','d/m/Y');
                update_option('home_currency','SEK');
                update_option('momentLocale','sv');
                update_option('language','sv');
                update_option('caddress','StackPI <br>Solna Business Park, Svetsarvägen 15 2tr<br>SE-171 41 Solna <br> Sweden');

                update_option('graph_primary_color','2196f3');

                update_option('edition','default');

                update_option('networth_goal','350000');


                update_option('logo_default','logo_2105025689.png');
                update_option('logo_inverse','logo_inverse_7627893866.png');



                $user = User::find(1);

                $user->language = 'sv';

                $user->fullname = 'Eric	William';

                $user->save();

                $_SESSION['language'] = 'sv';

                $companies = Company::all()->toArray();

                foreach ($customers as $customer){

                    $c = new Contact;

                    $c->account = $customer['name'];
                    $c->email = $customer['email'];
                    $c->phone = '+467'._raid(8);
                    $c->company = $customer['company'];

                    $c->gid = 1;
                    $c->gname = $gname;

                    $c->save();

                }


                // create banks

                $banks = [
                    [
                        'name' => 'Kontanter'
                    ],
                    [
                        'name' => 'Swish'
                    ],
                    [
                        'name' => 'SEB'
                    ]
                    ,
                    [
                        'name' => 'ICA Banken'
                    ]
                    ,
                    [
                        'name' => 'Nordea'
                    ]
                ];



                foreach ($banks as $bank){

                    $account = new Account;
                    $account->account = $bank['name'];
                    $account->bank_name = $bank['name'];
                    $account->balance = _raid(5);
                    $account->save();

                    $balance = new Balance;

                    $balance->account_id = $account->id;
                    $balance->currency_id = 1;
                    $balance->balance = _raid(5);
                    $balance->save();

                }



                // Generate Transactions



                $tr_incomes = [
                    [

                        'description' => 'Försäljning',
                        'amount' => 5400

                    ],
                    [
                        'description' => 'Lön',
                        'amount' => 1800
                    ],
                    [
                        'description' => 'Mjukvaruutveckling',
                        'amount' => 2500
                    ],
                    [
                        'description' => 'Webbutveckling',
                        'amount' => 1500
                    ],
                    [
                        'description' => 'Konsulttjänster',
                        'amount' => 4000
                    ],
                    [
                        'description' => 'Intressera',
                        'amount' => 700
                    ]
                ];





                for ($i=0; $i < 293; $i++){

                    shuffle($banks);
                    shuffle($tr_incomes);





                    $transaction = new Transaction;
                    $transaction->account = $banks[0]['name'];
                    $transaction->description = $tr_incomes[0]['description'];
                    $transaction->amount = $tr_incomes[0]['amount'];
                    $transaction->cr = $tr_incomes[0]['amount'];
                    $transaction->date = $faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now');

                    $transaction->type = 'Income';

                    $transaction->vid = _raid(8);

                    $transaction->save();

                }



                // for categories chart

                $categories = TransactionCategory::expense();

                $cat_amounts = [297523,12189,3290,54782,323459,19220,2145,723,182,4198,5289,39902,2678,229,820,2678,9379,14890,3802,18903,5782,45782,27834,9492,2784,28549,3882,38290,932,56,28820,38400,922,39273,7123,81267,47200,37892,1792,3971,37293,2748,27849];

                $i = 0;

                foreach ($categories as $category){

                    $category->total_amount = $cat_amounts[$i];
                    $category->save();


                    $i++;

                }


                // Generate Expense


                $tr_expenses = [
                    [

                        'description' => 'Löner',
                        'amount' => 5400

                    ],
                    [
                        'description' => 'Frakt',
                        'amount' => 1800
                    ],
                    [
                        'description' => 'Resa',
                        'amount' => 2500
                    ],
                    [
                        'description' => 'Prenumeration',
                        'amount' => 1500
                    ],
                    [
                        'description' => 'Konsultation',
                        'amount' => 4000
                    ],
                    [
                        'description' => 'Bankavgifter',
                        'amount' => 700
                    ]
                ];





                for ($i=0; $i < 193; $i++){

                    shuffle($banks);
                    shuffle($tr_expenses);





                    $transaction = new Transaction;
                    $transaction->account = $banks[0]['name'];
                    $transaction->description = $tr_expenses[0]['description'];
                    $transaction->amount = $tr_expenses[0]['amount'];
                    $transaction->dr = $tr_expenses[0]['amount'];
                    $transaction->date = $faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now');

                    $transaction->type = 'Expense';

                    $transaction->vid = _raid(8);


                    $transaction->save();

                }



                // Create Some Invoice

                // find the first customer

                $customer = Contact::find(1);

               $invoice_items = [
                   [
                       'item' => 'Utfört arbete',
                       'price' => 4500,
                       'qty' => 1,
                       'notes' => ''
                   ],
                   [
                       'item' => 'Consulting',
                       'price' => 4500,
                       'qty' => 1,
                       'notes' => ''
                   ],
                   [
                       'item' => 'Konsulthjälp',
                       'price' => 4500,
                       'qty' => 1,
                       'notes' => ''
                   ],
                   [
                       'item' => '',
                       'price' => 4500,
                       'qty' => 1,
                       'notes' => ''
                   ],
                   [
                       'item' => '',
                       'price' => 4500,
                       'qty' => 1,
                       'notes' => ''
                   ],
                   [
                       'item' => '',
                       'price' => 4500,
                       'qty' => 1,
                       'notes' => ''
                   ],
                   [
                       'item' => '',
                       'price' => 4500,
                       'qty' => 1,
                       'notes' => ''
                   ],
                   [
                       'item' => '',
                       'price' => 4500,
                       'qty' => 1,
                       'notes' => ''
                   ]
               ];









                $leadStatus = LeadStatus::all()->toArray();

                $salutations = ['Mr.','Mrs.','Ms.'];


                for ($i=0; $i < 523; $i++){

                    shuffle($leadStatus);

                    shuffle($salutations);

                    shuffle($companies);

                    $lead = new Lead;

                    $lead->status = $leadStatus[0]['sname'];
                    $lead->salutation = $salutations[0];
                    $lead->first_name = $faker->firstName;
                    $lead->last_name = $faker->lastName;
                    $lead->company = $companies[0]['company_name'];
                    $lead->company_id = $companies[0]['id'];

                    $lead->title = $faker->jobTitle;

                    $lead->phone = '+467'._raid(8);

                    $lead->email = $faker->email;

                    $lead->save();


                }

                break;


            case 'iq':

                $faker = Faker\Factory::create('ar_SA');




                $customers = [
                    [
                        'name' => 'Ibrahim Ali',
                        'company' => 'Emaar Properties',
                        'email' => 'ibrahim.ali@gmail.com'
                    ],
                    [
                        'name' => 'Odai Ali',
                        'company' => 'Marka Holdings',
                        'email' => 'odaiali@live.com'
                    ],
                    [
                        'name' => 'Ali Ghzwan',
                        'company' => 'United Foods',
                        'email' => 'ali.ghazwan@gmail.com'
                    ],
                    [
                        'name' => 'Alaa Ayad',
                        'company' => 'Giga Store',
                        'email' => 'ayad91@outlook.com'
                    ],
                    [
                        'name' => 'Ruaa Najem',
                        'company' => 'Gulf Marketing',
                        'email' => 'ruaa.najem@live.com'
                    ],
                    [
                        'name' => 'Ali Hussien',
                        'company' => 'Smart Technology',
                        'email' => 'hussien.ali@outlook.com'
                    ],
                    [
                        'name' => 'Sarah Jamal',
                        'company' => 'Hilti ',
                        'email' => 'sarahjamal@gmail.com'
                    ],
                    [
                        'name' => 'Majeed Hatim',
                        'company' => 'Mashreq',
                        'email' => 'majeed.hatim@gmail.com'
                    ],
                    [
                        'name' => 'Mohammed Fathi',
                        'company' => 'Dana Gas',
                        'email' => 'fathi.mh@gmail.com'
                    ],
                    [
                        'name' => 'Manhal Ibrahem',
                        'company' => 'Waha Capital',
                        'email' => 'ibrahem89@gmail.com'
                    ],
                    [
                        'name' => 'Mohammed Moniem',
                        'company' => 'The National Bank',
                        'email' => 'mm.bg@iq.iq'
                    ],
                    [
                        'name' => 'Zaid Hatim',
                        'company' => 'Gulf Medical',
                        'email' => 'zaid.giganet@yahoo.com'
                    ],
                    [
                        'name' => 'Adel Ahmed',
                        'company' => 'Orient Insurance',
                        'email' => 'adel_ahmed@yahoo.com'
                    ],
                    [
                        'name' => 'Soori Ali',
                        'company' => 'National Cement Co.',
                        'email' => 'soori.ali@outlook.com'
                    ],
                    [
                        'name' => 'Abdul Aziz',
                        'company' => 'Union Refreshments',
                        'email' => 'abdulaziz@gmail.com'
                    ],
                    [
                        'name' => 'Mubarak Al Redha',
                        'company' => 'National Pharmacy',
                        'email' => 'maredha1@gmail.com'
                    ]

                ];


                $currency = new Currency;
                $currency->cname = 'USD';
                $currency->iso_code = 'USD';
                $currency->symbol = '$';
                $currency->save();

                // add additional currency

                $currency = new Currency;
                $currency->cname = 'IQD';
                $currency->iso_code = 'IQD';
                $currency->symbol = 'IQD';
                $currency->rate = 1250;
                $currency->save();



                update_option('CompanyName','GigaNet');
                update_option('nstyle','purple');
                update_option('currency_code','$');
                update_option('country','Iraq');
                update_option('country_flag_code','iq');

                update_option('timezone','Asia/Baghdad');
                update_option('df','d/m/Y');
                update_option('home_currency','USD');
                update_option('momentLocale','en');
                update_option('language','en');

                update_option('caddress','GigaNet <br>Al-Mansour- Amirat St.<br>Baghdad, Iraq<br> Phone: +964 (773) 2515-666');


                update_option('graph_primary_color','8D0672');

                update_option('edition','iqm');


                update_option('dec_point','.');
                update_option('thousands_sep',',');

                update_option('networth_goal','350000');

                update_option('logo_default','logo_2105025689.png');
                update_option('logo_inverse','logo_inverse_7627893866.png');

                $group = new ContactGroup;
                $group->gname = 'Default';
                $group->save();


                // create companies


                $c_emails_types = ['sales','info','admin','hello','media','support','billing'];

                for ($i=0; $i < 144; $i++){

                    shuffle($c_emails_types);

                    $company = new Company;

                    $company_name = $faker->company;

                    $company_domain = strtolower($company_name);
                    $company_domain = str_replace(' ','',$company_domain);
                    $company_domain = str_replace('.','',$company_domain);
                    $company_domain = str_replace(',','',$company_domain);
                    $company_domain = str_replace('-','',$company_domain);
                    $company_domain = $company_domain.'.com';
                    $company_email = $c_emails_types[0].'@'.$company_domain;

                    $company->company_name = $faker->company;
                    $company->email = $company_email;
                    $company->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);

                    $company->url = 'http://www.'.$company_domain;

                    $company->save();


                }

                // find the current user and update language

                $user = User::find(1);

                $user->language = 'en';

                $user->save();

                $_SESSION['language'] = 'en';

                $companies = Company::all()->toArray();

                // phone format - +964 (773) 2515-777

                foreach ($customers as $customer){

                    $c = new Contact;

                    $c->account = $customer['name'];
                    $c->email = $customer['email'];
                    $c->phone = '+964773'._raid(7);
                    $c->company = $customer['company'];

                    $c->gid = 1;
                    $c->gname = $gname;

                    $c->save();

                }


                // Create Bank Accounts


                $banks = [
                    [
                        'name' => 'Cash'
                    ],
                    [
                        'name' => 'HSBC Premier'
                    ],
                    [
                        'name' => 'Rafidain Bank'
                    ]
                    ,
                    [
                        'name' => 'Bank of Iraq'
                    ]
                    ,
                    [
                        'name' => 'Islamic Bank'
                    ]
                ];


                foreach ($banks as $bank){

                    $account = new Account;
                    $account->account = $bank['name'];
                    $account->bank_name = $bank['name'];
                    $account->save();

                }

                // Generate Transactions



                $tr_incomes = [
                    [

                        'description' => 'Sales',
                        'amount' => 5400

                    ],
                    [
                        'description' => 'Subscriptions',
                        'amount' => 1800
                    ],
                    [
                        'description' => 'Software Development',
                        'amount' => 2500
                    ],
                    [
                        'description' => 'Web Development',
                        'amount' => 1500
                    ],
                    [
                        'description' => 'Consultancy',
                        'amount' => 4000
                    ],
                    [
                        'description' => 'Interest',
                        'amount' => 700
                    ]
                ];


                $transactionMethod = TransactionMethod::all()->toArray();


                for ($i=0; $i < 293; $i++){

                    shuffle($banks);
                    shuffle($tr_incomes);


                    shuffle($transactionMethod);

                    $method = $transactionMethod[0]['name'];


                    if($method == 'Cash'){
                        $ref = 'Office / Store Desk';
                    }
                    elseif ($method == 'Check'){
                        $ref = 'Check Number- '._raid(4).'-'._raid(8);
                    }
                    elseif ($method == 'Credit Card'){
                        $ref = $faker->creditCardType.' - '.'****'._raid(4);
                    }
                    else{
                        $ref = 'Transaction ID- '.strtoupper(Ib_Str::random_string(17));
                    }


                    $transaction = new Transaction;
                    $transaction->account = $banks[0]['name'];
                    $transaction->description = $tr_incomes[0]['description'];
                    $transaction->amount = $tr_incomes[0]['amount'];
                    $transaction->cr = $tr_incomes[0]['amount'];
                    $transaction->date = $faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now');

                    $transaction->type = 'Income';

                    $transaction->vid = _raid(8);

                    $transaction->method = $method;


                    $transaction->save();

                }



                // for categories chart

                $categories = TransactionCategory::expense();

                $cat_amounts = [297523,12189,3290,54782,323459,19220,2145,723,182,4198,5289,39902,2678,229,820,2678,9379,14890,3802,18903,5782,45782,27834,9492,2784,28549,3882,38290,932,56,28820,38400,922,39273,7123,81267,47200,37892,1792,3971,37293,2748,27849];

                $i = 0;

                foreach ($categories as $category){

                    $category->total_amount = $cat_amounts[$i];
                    $category->save();


                    $i++;

                }


                // Generate Expense


                $tr_expenses = [
                    [

                        'description' => 'Salaries',
                        'amount' => 5400

                    ],
                    [
                        'description' => 'Freight',
                        'amount' => 1800
                    ],
                    [
                        'description' => 'Travel',
                        'amount' => 2500
                    ],
                    [
                        'description' => 'Phone',
                        'amount' => 1500
                    ],
                    [
                        'description' => 'Consultancy',
                        'amount' => 4000
                    ],
                    [
                        'description' => 'Bank Fees',
                        'amount' => 700
                    ]
                ];





                for ($i=0; $i < 193; $i++){

                    shuffle($banks);
                    shuffle($tr_expenses);


                    shuffle($transactionMethod);

                    $method = $transactionMethod[0]['name'];


                    if($method == 'Cash'){
                        $ref = 'Office / Store Desk';
                    }
                    elseif ($method == 'Check'){
                        $ref = 'Check Number- '._raid(4).'-'._raid(8);
                    }
                    elseif ($method == 'Credit Card'){
                        $ref = $faker->creditCardType.' - '.'****'._raid(4);
                    }
                    else{
                        $ref = 'Transaction ID- '.strtoupper(Ib_Str::random_string(17));
                    }


                    $transaction = new Transaction;
                    $transaction->account = $banks[0]['name'];
                    $transaction->description = $tr_expenses[0]['description'];
                    $transaction->amount = $tr_expenses[0]['amount'];
                    $transaction->dr = $tr_expenses[0]['amount'];
                    $transaction->date = $faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now');

                    $transaction->type = 'Expense';

                    $transaction->vid = _raid(8);

                    $transaction->method = $method;


                    $transaction->save();

                }


                $leadStatus = LeadStatus::all()->toArray();

                $salutations = ['Mr.','Mrs.','Ms.'];


                for ($i=0; $i < 523; $i++){

                    shuffle($leadStatus);

                    shuffle($salutations);

                    shuffle($companies);

                    $lead = new Lead;

                    $lead->status = $leadStatus[0]['sname'];
                    $lead->salutation = $salutations[0];
                    $lead->first_name = $faker->firstName;
                    $lead->last_name = $faker->lastName;
                    $lead->company = $companies[0]['company_name'];
                    $lead->company_id = $companies[0]['id'];

                    $lead->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);

                    $lead->title = $faker->jobTitle;

                    $lead->email = $faker->email;

                    $lead->save();


                }



                // for categories chart


                // add a customer for the Demo


                $customer = new Contact;

                $customer_name = 'Halima Fathi';

                $customer_email = 'client@example.com';

                $customer->account = $customer_name;

                $customer->img = 'storage/dev/user2.png';

                $customer->password = '$1$WN..nD2.$Vo9niDl/fUf0VhheEjmHe/';

                $customer->email = $customer_email;
                $customer->phone = '+964773'._raid(7);

                $customer->company = 'The Acme Inc.';

                $customer->balance = '0.00';

                $customer->cid = 1;

                $customer->gid = 1;

                $customer->gname = $gname;

                $customer->address = 'Al-Mansour- Amirat St.';
                $customer->city = 'Baghdad';
                $customer->state = 'Baghdad';
                $customer->zip = '10019';
                $customer->country = 'Iraq';
                $customer->lat = '40.762901';
                $customer->lon  = '-73.980733';



                $customer->save();

                $customer_id = $customer->id;

                $card_ref = $faker->creditCardType.' - '.'****'._raid(4);


                DB::insert('INSERT INTO sys_invoices (userid, account, cn, invoicenum, date, duedate, datepaid, subtotal, discount_type, discount_value, discount, credit, taxname, tax, tax2, total, taxrate, taxrate2, status, paymentmethod, notes, vtoken, ptoken, r, nd, eid, ename, vid, currency, currency_symbol, currency_prefix, currency_suffix, currency_rate, recurring, recurring_ends, last_recurring_date, source, sale_agent, last_overdue_reminder, allowed_payment_methods, billing_street, billing_city, billing_state, billing_zip, billing_country, shipping_street, shipping_city, shipping_state, shipping_zip, shipping_country, q_hide, show_quantity_as, pid, is_credit_invoice, aid, aname) VALUES ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 144.00, \'f\', 0.00, 0.00, 0.00, \'\', 0.00, 0.00, 144.00, 0.00, 0.00, \'Paid\', \'\', \'\', \'0738541991\', \'7715021517\', \'0\', \''.$today.'\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, \'\', 0, 1, 0, null), ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 2000.00, \'f\', 200.00, 200.00, 0.00, \'Sales Tax\', 300.00, 0.00, 2100.00, 15.00, 0.00, \'Unpaid\', \'\', \'\', \'4491605289\', \'9317090421\', \'0\', \''.$today.'\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, \'\', 0, 0, 0, null), ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 149.00, \'p\', 0.00, 0.00, 149.00, \'\', 0.00, 0.00, 149.00, 0.00, 0.00, \'Paid\', \'\', \'\', \'3559815740\', \'6479179633\', \'0\', \'2019-09-23\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, null, 0, 0, 0, null)');

                DB::insert('INSERT INTO sys_invoiceitems (invoiceid, userid, type, relid, itemcode, description, qty, amount, taxed, taxamount, total, duedate, paymentmethod, notes) 
VALUES (1, '.$customer_id.', \'\', 0, \'\', \'Credit\', \'1\', 144.00, 0, 0.00, 144.00, \''.$today.'\', \'\', \'\'),
  (2, '.$customer_id.', \'\', 0, \'\', \'API Integration\', \'1\', 400.00, 1, 0.00, 400.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'UI & UX Design\', \'1\', 400.00, 1, 0.00, 400.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'Project Research & Familiarization\', \'1\', 700.00, 1, 0.00, 700.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'Meeting, Preparation of Documents & Strategic Planning\', \'1\', 500.00, 1, 0.00, 500.00, \''.$today.'\', \'\', \'\'),
(3, '.$customer_id.', \'\', 0, \'\', \'Web Hosting / Yearly\', \'1\', 149.00, 0, 0.00, 149.00, \''.$today.'\', \'\', \'\')');


                DB::insert('INSERT INTO sys_transactions (account, type, sub_type, category, amount, payer, payee, payerid, payeeid, method, ref, status, description, tags, tax, date, dr, cr, bal, iid, currency, currency_symbol, currency_prefix, currency_suffix, currency_rate, base_amount, company_id, vid, aid, created_at, updated_at, updated_by, attachments, source, rid, pid, archived, trash, flag, c1, c2, c3, c4, c5) VALUES (\'Cash\', \'Income\', null, \'Uncategorized\', 144.00, \''.$customer_name.'\', \'\', '.$customer_id.', 0, \'Credit Card\', \''.$card_ref.'\', \'Cleared\', \'Invoice 1 Payment\', \'\', 0.00, \'2019-09-23\', 0.00, 144.00, 0.00, 1, 1, \'USD\', null, null, 1.0000, 0.0000, 0, '._raid(8).', 0, \'2019-09-23 15:19:56\', \'2019-09-23 09:19:56\', 0, null, null, 0, 0, 0, 0, 0, null, null, null, null, null), (\'JPMorgan Chase & Co.\', \'Income\', null, \'Uncategorized\', 149.00, \''.$customer_name.'\', \'\', '.$customer_id.', 0, \'Paypal\', \'Transaction ID- '.strtoupper(Ib_Str::random_string(17)).'\', \'Cleared\', \'Invoice 3 Payment\', \'\', 0.00, \'2019-09-23\', 0.00, 149.00, 0.00, 3, 1, \'USD\', null, null, 1.0000, 0.0000, 0, '._raid(8).', 0, \'2019-09-23 15:22:00\', \'2019-09-23 09:22:00\', 0, null, null, 0, 0, 0, 0, 0, null, null, null, null, null)');

                break;


            case 'no':

                $faker = Faker\Factory::create('nb_NO');

                // Asbjørn Abrahamsen





                break;

            case 'bd':

                // bn_BD

                $faker = Faker\Factory::create('bn_BD');

                $contacts = array(
                    'Chowdhury Azhar Uddin',
                    'Atique Hossain',
                    'Nazrul Islam',
                    'Shafiqul Islam',
                    'Zillur Rahman',
                    'Ishtiaque Abedin Zissan',
                    'Md Mizzanoor Rahaman',
                    'Syed Monowar Hossain',
                    'Ahmad Abdullah Zamil',
                    'Mohammad Mosharraf Hossain',
                    'Farzana Hafsa',
                    'Sanjay Paul',
                    'Abdul Talukdar',
                    'Rehnuma Mamun',
                    'Mehjabin Sultana Monjur',
                    'Mohammad Shafkat Amin',
                    'Sandip Bhowmick',
                    'Moshiur Rahman',
                    'MD. Z Hoque',
                    'Khan M Farhan Shahil',
                    'Hasibul Hasan Shishir',
                    'Tamzidul Hoque',
                    'Sakir Reza',
                    'Tahamidur Rahman',
                    'Nusrat Tinni',
                    'Tanzir Musabbir',
                    'Shuvashis Dey',
                    'Md. Shahidullah',
                    'Mehadi Hasan',
                    'Md. Ziaur Rahman',
                    'Mizanur Rahman',
                    'Nasreen Wadud',
                    'Azizur Rahman',
                    'Hamida Akhter ',
                    'Ziaul Kawser',
                    'Abdus Salam',
                    'Shakawet Hossain',
                    'Mohammad Shimul',
                    'Zafar Ahmed',
                    'Liaqat Ali Chowdhury ',
                    'Shohel Rana',
                    'Mohd. Athar Uddin',
                    'Md. Badrul Ahsan',
                    'A.K.M. Rafiqul Islam',
                    'Rezakul Haider',
                    'Mahfuza Khanam',
                    'M.A. Salam',
                    'Tanveer Rahman',
                    'Yusuf Pervez',
                    'Shahid Hossain',
                    'Mostafa Haider',
                    'Md. Anisur Rahman',
                    'Afroza Hossain',
                    'Md. Salahuddin Mahmud',
                    'Shafiqur Rahman',
                    'Ariful Islam',
                    'Abdus Sobhan',
                    'Kazi Sazzad',
                    'Sharif Hossain',
                    'Shafiqur Rahman',
                    'Ariful Islam',
                    'Naseem Ahmed',
                    'Salim Osman',
                    'Farid Uddin',
                    'Mahabobul Alam',
                    'Bodruzzaman Bhuiyan',
                    'Md Assaduzzaman',
                    'Md. Kowshour Alam',
                    'Syeda Shamima Akther',
                    'Nazim Uddin',
                    'Ifrana Ahmed',
                    'Helal Ahmed',
                    'Kazi Zahid Hasan',
                    'Shahidul Alam',
                    'Rayhan Kabir',
                    'Nasimul Haque',
                    'S M Nazmus Sakib',
                    'Eshan Ghosh',
                    'Allen Ahmed',
                    'Salah Uddin Rasel',
                    'Obidur Rahman',
                    'Sheik Sadman Sakib',
                    'Mamun Khan Sujon',
                    'Shahadat Hossain',
                    'Tasfim Ahmed',
                    'Sujan Das',
                    'Md Faisal Quadir',
                    'Tamim Afifa',
                    'Md. Minhaz Uddin',
                    'Mohammad Nazmul Huda',
                    'Nazmul Hossain Sajal',
                    'Md. Nurul Absur',
                    'Nazmus Sakib',
                    'Md. Mahsin Alam',
                    'Mir Wahidul Islam',
                    'Wasi Ahmed',
                    'Kazal Ahmed',
                    'Nayan Rezaul Islam',
                    'Md. Mushfiqur Rahman',
                    'Shahadat Hossain',
                    'Md Ziaul Hasan',
                    'Arafat Hossain',
                    'Sumon Biswas',
                    'Naimuddin Nipu',
                    'Sumsul Alam Bhuiyan',
                    'Syed Ahmed Taofique',
                    'Anowar Hossain',
                    'Saifur Rahman',
                    'Siraj Khan',
                    'Jewel Ahmed',
                    'Sohel Rana',
                    'Hasan Sarker',
                    'Rabya Akter',
                    'Khokon Munshi',
                    'Hridoy Khan',
                    'Reaz Ahmed',
                    'Rina Akter',
                    'Aman Ullah',
                    'Abdul Khalek',
                    'Mojibur Rahman',
                );




                $group = new ContactGroup;
                $group->gname = $gname;
                $group->save();

                $currency = new Currency;
                $currency->cname = 'BDT';
                $currency->iso_code = 'BDT';
                $currency->symbol = 'Tk';
                $currency->save();


                // create companies


                $c_emails_types = ['sales','info','admin','hello','media','support','billing'];

                for ($i=0; $i < 144; $i++){

                    shuffle($c_emails_types);

                    $company = new Company;

                    $company_name = $faker->company;

                    $company_domain = strtolower($company_name);
                    $company_domain = str_replace(' ','',$company_domain);
                    $company_domain = str_replace('.','',$company_domain);
                    $company_domain = str_replace(',','',$company_domain);
                    $company_domain = str_replace('-','',$company_domain);
                    $company_domain = $company_domain.'.com';
                    $company_email = $c_emails_types[0].'@'.$company_domain;

                    $company->company_name = $faker->company;
                   // $company->email = $company_email;
                    $company->email = '';
                    $company->phone = self::genPhone('bd');

                   // $company->url = 'http://www.'.$company_domain;
                    $company->url = '';

                    $company->save();


                }




                update_option('CompanyName','AmarBiz Limited');
                update_option('nstyle','light_blue');
                update_option('currency_code','Tk');
                update_option('country','Bangladesh');
                update_option('country_flag_code','bd');
                update_option('timezone','Asia/Dhaka');
                update_option('df','Y-m-d');
                update_option('home_currency','BDT');
                update_option('momentLocale','en');
                update_option('language','en');

                update_option('caddress','Flat A12, Road 7<br>Banani, Dhaka - 1213<br>Bangladesh');

                update_option('graph_primary_color','2196f3');

                update_option('edition','default');

                update_option('dec_point','.');
                update_option('thousands_sep',',');

                update_option('networth_goal','350000');


                update_option('logo_default','amarbiz.png');
                update_option('logo_inverse','amarbiz_white.png');



                $user = User::find(1);

                $user->language = 'en';

                $user->fullname = 'Tahsin Hassan';

                $user->img = 'storage/dev/user3.png';

                $user->save();

                $_SESSION['language'] = 'en';

                $companies = Company::all()->toArray();


                for ($i=0; $i < 293; $i++){

                    shuffle($contacts);

                    shuffle($companies);

                    $c = new Contact;

                  //  $name = $faker->name;
                    $name = $contacts[0];
                    $c->account = $name;
                    $c->email = $name.'@'.'gmail.com';
                   // $c->email = self::genEmail($name);
                    $c->phone = self::genPhone('bd');
                    //  $c->company = $faker->company;
                    $c->company = $companies[0]['company_name'];

                    $c->cid = $companies[0]['id'];

                    $c->gid = 1;
                    $c->gname = $gname;

                    $c->address = $faker->streetAddress;
                    $c->city = $faker->city;
                    $c->state = $faker->state;
                    $c->zip = $faker->postcode;
                    $c->country = $faker->country;
                    $c->lat = $faker->latitude;
                    $c->lon  = $faker->longitude;

                    $c->save();

                }






                // create banks

                $banks = [
                    [
                        'name' => 'BRAC Bank'
                    ],
                    [
                        'name' => 'DBBL'
                    ],
                    [
                        'name' => 'Standard Chartered'
                    ]
                    ,
                    [
                        'name' => 'Cash'
                    ]
                    ,
                    [
                        'name' => 'Office Cash'
                    ]
                ];



                foreach ($banks as $bank){

                    $account = new Account;
                    $account->account = $bank['name'];
                    $account->bank_name = $bank['name'];
                    $account->balance = _raid(5);
                    $account->save();

                    $balance = new Balance;

                    $balance->account_id = $account->id;
                    $balance->currency_id = 1;
                    $balance->balance = _raid(5);
                    $balance->save();

                }



                // Generate Transactions



                $tr_incomes = [
                    [

                        'description' => 'Sales',
                        'amount' => 5400

                    ],
                    [
                        'description' => 'Service',
                        'amount' => 1800
                    ],
                    [
                        'description' => 'Software Development',
                        'amount' => 2500
                    ],
                    [
                        'description' => 'Web Development',
                        'amount' => 1500
                    ],
                    [
                        'description' => 'Consultancy',
                        'amount' => 4000
                    ],
                    [
                        'description' => 'Interest',
                        'amount' => 700
                    ]
                ];




                $transactionMethod = TransactionMethod::all()->toArray();


                for ($i=0; $i < 723; $i++){

                    shuffle($banks);
                    shuffle($tr_incomes);
                    shuffle($transactionMethod);

                    $method = $transactionMethod[0]['name'];


                    if($method == 'Cash'){
                        $ref = 'Office / Store Desk';
                    }
                    elseif ($method == 'Check'){
                        $ref = 'Check Number- '._raid(4).'-'._raid(8);
                    }
                    elseif ($method == 'Credit Card'){
                        $ref = $faker->creditCardType.' - '.'****'._raid(4);
                    }
                    else{
                        $ref = 'Transaction ID- '.strtoupper(Ib_Str::random_string(17));
                    }



                    $transaction = new Transaction;
                    $transaction->account = $banks[0]['name'];
                    $transaction->description = $tr_incomes[0]['description'];
                    $transaction->amount = $tr_incomes[0]['amount'];
                    $transaction->cr = $tr_incomes[0]['amount'];
                    $transaction->date = $faker->dateTimeBetween($startDate = '-1 year', $endDate = '+3 month');

                    $transaction->type = 'Income';

                    $transaction->vid = _raid(8);

                    $transaction->ref = $ref;
                    $transaction->method = $method;

                    $transaction->save();

                }



                // for categories chart

                $categories = TransactionCategory::expense();

                $cat_amounts = [297523,12189,3290,54782,323459,19220,2145,723,182,4198,5289,39902,2678,229,820,2678,9379,14890,3802,18903,5782,45782,27834,9492,2784,28549,3882,38290,932,56,28820,38400,922,39273,7123,81267,47200,37892,1792,3971,37293,2748,27849];

                $i = 0;

                foreach ($categories as $category){

                    $category->total_amount = $cat_amounts[$i];
                    $category->save();


                    $i++;

                }


                // Generate Expense


                $tr_expenses = [
                    [

                        'description' => 'Salaries',
                        'amount' => 5400

                    ],
                    [
                        'description' => 'Freight',
                        'amount' => 1800
                    ],
                    [
                        'description' => 'Travel',
                        'amount' => 2500
                    ],
                    [
                        'description' => 'Phone',
                        'amount' => 1500
                    ],
                    [
                        'description' => 'Consultancy',
                        'amount' => 4000
                    ],
                    [
                        'description' => 'Bank Fees',
                        'amount' => 700
                    ]
                ];





                for ($i=0; $i < 393; $i++){

                    shuffle($banks);
                    shuffle($tr_expenses);

                    shuffle($transactionMethod);

                    $method = $transactionMethod[0]['name'];


                    if($method == 'Cash'){
                        $ref = 'Office / Store Desk';
                    }
                    elseif ($method == 'Check'){
                        $ref = 'Check Number- '._raid(4).'-'._raid(8);
                    }
                    elseif ($method == 'Credit Card'){
                        $ref = $faker->creditCardType.' - '.'****'._raid(4);
                    }
                    else{
                        $ref = 'Transaction ID- '.strtoupper(Ib_Str::random_string(17));
                    }




                    $transaction = new Transaction;
                    $transaction->account = $banks[0]['name'];
                    $transaction->description = $tr_expenses[0]['description'];
                    $transaction->amount = $tr_expenses[0]['amount'];
                    $transaction->dr = $tr_expenses[0]['amount'];
                    $transaction->date = $faker->dateTimeBetween($startDate = '-1 year', $endDate = '+3 months');

                    $transaction->type = 'Expense';

                    $transaction->vid = _raid(8);

                    $transaction->method = $method;

                    $transaction->ref = $ref;

                    $transaction->save();

                }


                $leadStatus = LeadStatus::all()->toArray();

                $salutations = ['Mr.','Mrs.','Ms.'];


                for ($i=0; $i < 327; $i++){

                    shuffle($leadStatus);

                    shuffle($salutations);

                    shuffle($companies);

                    $lead = new Lead;

                    $first_name = $faker->firstName;
                    $last_name = $faker->lastName;

                    $lead->status = $leadStatus[0]['sname'];
                    $lead->salutation = $salutations[0];
                    $lead->first_name = $first_name;
                    $lead->last_name = $last_name;
                    $lead->company = $companies[0]['company_name'];
                    $lead->company_id = $companies[0]['id'];

                    $lead->phone = self::genPhone('bd');

                    $lead->title = $faker->jobTitle;

                    $lead->email = self::genEmail($first_name.$last_name);

                    $lead->save();


                }



                // for categories chart


                // add a customer for the Demo


                $customer = new Contact;

                $customer_name = 'Md Zahir';

                $customer_email = 'zahir@laptopsheba.com';

                $customer->account = $customer_name;

                $customer->img = 'storage/dev/user2.png';

                $customer->password = '$1$WN..nD2.$Vo9niDl/fUf0VhheEjmHe/';

                $customer->email = $customer_email;
                $customer->phone = self::genPhone('bd');

                $customer->company = 'LaptopSheba';

                $customer->balance = '0.00';

                $customer->cid = 1;

                $customer->gid = 1;

                $customer->gname = $gname;

                $customer->address = '11th Floor, 18 Gulshan Avenue';
                $customer->city = 'Gulshan';
                $customer->state = 'Dhaka';
                $customer->zip = '1212';
                $customer->country = 'Bangladesh';
                $customer->lat = '23.792496';
                $customer->lon  = '90.407806';



                $customer->save();

                $customer_id = $customer->id;

                $card_ref = $faker->creditCardType.' - '.'****'._raid(4);


                DB::insert('INSERT INTO sys_invoices (userid, account, cn, invoicenum, date, duedate, datepaid, subtotal, discount_type, discount_value, discount, credit, taxname, tax, tax2, total, taxrate, taxrate2, status, paymentmethod, notes, vtoken, ptoken, r, nd, eid, ename, vid, currency, currency_symbol, currency_prefix, currency_suffix, currency_rate, recurring, recurring_ends, last_recurring_date, source, sale_agent, last_overdue_reminder, allowed_payment_methods, billing_street, billing_city, billing_state, billing_zip, billing_country, shipping_street, shipping_city, shipping_state, shipping_zip, shipping_country, q_hide, show_quantity_as, pid, is_credit_invoice, aid, aname) VALUES ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 144.00, \'f\', 0.00, 0.00, 0.00, \'\', 0.00, 0.00, 144.00, 0.00, 0.00, \'Paid\', \'\', \'\', \'0738541991\', \'7715021517\', \'0\', \''.$today.'\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, \'\', 0, 1, 0, null), ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 2000.00, \'f\', 200.00, 200.00, 0.00, \'Sales Tax\', 300.00, 0.00, 2100.00, 15.00, 0.00, \'Unpaid\', \'\', \'\', \'4491605289\', \'9317090421\', \'0\', \''.$today.'\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, \'\', 0, 0, 0, null), ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 149.00, \'p\', 0.00, 0.00, 149.00, \'\', 0.00, 0.00, 149.00, 0.00, 0.00, \'Paid\', \'\', \'\', \'3559815740\', \'6479179633\', \'0\', \'2019-09-23\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, null, 0, 0, 0, null)');

                DB::insert('INSERT INTO sys_invoiceitems (invoiceid, userid, type, relid, itemcode, description, qty, amount, taxed, taxamount, total, duedate, paymentmethod, notes) 
VALUES (1, '.$customer_id.', \'\', 0, \'\', \'Credit\', \'1\', 144.00, 0, 0.00, 144.00, \''.$today.'\', \'\', \'\'),
  (2, '.$customer_id.', \'\', 0, \'\', \'API Integration\', \'1\', 400.00, 1, 0.00, 400.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'UI & UX Design\', \'1\', 400.00, 1, 0.00, 400.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'Project Research & Familiarization\', \'1\', 700.00, 1, 0.00, 700.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'Meeting, Preparation of Documents & Strategic Planning\', \'1\', 500.00, 1, 0.00, 500.00, \''.$today.'\', \'\', \'\'),
(3, '.$customer_id.', \'\', 0, \'\', \'Web Hosting / Yearly\', \'1\', 149.00, 0, 0.00, 149.00, \''.$today.'\', \'\', \'\')');


                DB::insert('INSERT INTO sys_transactions (account, type, sub_type, category, amount, payer, payee, payerid, payeeid, method, ref, status, description, tags, tax, date, dr, cr, bal, iid, currency, currency_symbol, currency_prefix, currency_suffix, currency_rate, base_amount, company_id, vid, aid, created_at, updated_at, updated_by, attachments, source, rid, pid, archived, trash, flag, c1, c2, c3, c4, c5) VALUES (\'Cash\', \'Income\', null, \'Uncategorized\', 144.00, \''.$customer_name.'\', \'\', '.$customer_id.', 0, \'Credit Card\', \''.$card_ref.'\', \'Cleared\', \'Invoice 1 Payment\', \'\', 0.00, \'2019-09-23\', 0.00, 144.00, 0.00, 1, 1, \'USD\', null, null, 1.0000, 0.0000, 0, '._raid(8).', 0, \'2019-09-23 15:19:56\', \'2019-09-23 09:19:56\', 0, null, null, 0, 0, 0, 0, 0, null, null, null, null, null), (\'JPMorgan Chase & Co.\', \'Income\', null, \'Uncategorized\', 149.00, \''.$customer_name.'\', \'\', '.$customer_id.', 0, \'Paypal\', \'Transaction ID- '.strtoupper(Ib_Str::random_string(17)).'\', \'Cleared\', \'Invoice 3 Payment\', \'\', 0.00, \'2019-09-23\', 0.00, 149.00, 0.00, 3, 1, \'USD\', null, null, 1.0000, 0.0000, 0, '._raid(8).', 0, \'2019-09-23 15:22:00\', \'2019-09-23 09:22:00\', 0, null, null, 0, 0, 0, 0, 0, null, null, null, null, null)');




                DB::insert('INSERT INTO sys_items (name, unit, sales_price, inventory, weight, width, length, height, sku, upc, ean, mpn, isbn, sid, supplier, bid, brand, sell_account, purchase_account, inventory_account, taxable, location, item_number, description, type, track_inventroy, negative_stock, available, status, added, last_sold, e, sorder, gid, category_id, supplier_id, gname, product_id, size, start_date, end_date, expire_date, expire_days, image, flag, is_service, commission_percent, commission_percent_type, commission_fixed, trash, payterm, cost_price, unit_price, promo_price, setup, onetime, monthly, monthlysetup, quarterly, quarterlysetup, halfyearly, halfyearlysetup, annually, annuallysetup, biennially, bienniallysetup, triennially, trienniallysetup, has_domain, free_domain, email_rel, tags, sold_count, total_amount, created_at, updated_at) VALUES (\'iPhone X\', \'\', 150.00, -2.0000, 0.0000, 0.0000, 0.0000, 0.0000, null, null, null, null, null, 0, null, 0, null, 0, 0, 0, 0, null, \'0001\', \'\', \'Product\', \'No\', \'No\', 0, \'Active\', null, null, \'\', 0, 0, 0, 0, null, null, null, null, null, null, 0, \'_c4b43ae0870238150617433711107582.png\', 0, 0, 0.00, null, 0.00, 0, null, 110.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, null, null, 0, null, 8.0000, 155.0000, null, \'2019-10-04 18:46:13\'),
(\'Golf Hat\', \'\', 120.00, -2.0000, 0.0000, 0.0000, 0.0000, 0.0000, null, null, null, null, null, 0, null, 0, null, 0, 0, 0, 0, null, \'0002\', \'\', \'Product\', \'No\', \'No\', 0, \'Active\', null, null, \'\', 0, 0, 0, 0, null, null, null, null, null, null, 0, \'_7a0c1035255988150617492810876737.png\', 0, 0, 0.00, null, 0.00, 0, null, 70.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, null, null, 0, null, 9.0000, 108.0000, null, \'2019-10-04 18:46:13\'),
(\'Gift Card 250\', \'\', 250.00, -2.0000, 0.0000, 0.0000, 0.0000, 0.0000, null, null, null, null, null, 0, null, 0, null, 0, 0, 0, 0, null, \'0003\', \'\', \'Product\', \'No\', \'No\', 0, \'Active\', null, null, \'\', 0, 0, 0, 0, null, null, null, null, null, null, 0, \'_7ae11af2868642150642538311023612.png\', 0, 0, 0.00, null, 0.00, 0, null, 250.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, null, null, 0, null, 6.0000, 1500.0000, null, \'2019-10-04 18:46:13\')');


                break;


            case 'dk':

                // da_DK  Denmark

                $faker = Faker\Factory::create('da_DK');


                break;


            case 'de':
                // German
                $faker = Faker\Factory::create('de_DE');



                break;


            case 'sa':
                // Saudi Arabia

                $faker = Faker\Factory::create('ar_SA');


                break;


            case 'fr':

                $faker = Faker\Factory::create('fr_FR');

                break;


            case 'in':

                // PAN - XPDCE2940F


                // GSTIN - 22XPDCE2940F1Z5



                $states = Tax::indianStates();

                $faker = Faker\Factory::create('en_IN');

                // Rakesh Aditya

                $group = new ContactGroup;
                $group->gname = $gname;
                $group->save();

                $currency = new Currency;
                $currency->cname = 'INR';
                $currency->iso_code = 'INR';
                $currency->symbol = 'Rs.';
                $currency->save();


                // create companies


                $c_emails_types = ['sales','info','admin','hello','media','support','billing'];

                for ($i=0; $i < 144; $i++){

                    shuffle($c_emails_types);

                    $company = new Company;

                    $company_name = $faker->company;

                    $company_domain = strtolower($company_name);
                    $company_domain = str_replace(' ','',$company_domain);
                    $company_domain = str_replace('.','',$company_domain);
                    $company_domain = str_replace(',','',$company_domain);
                    $company_domain = str_replace('-','',$company_domain);
                    $company_domain = $company_domain.'.com';
                    $company_email = $c_emails_types[0].'@'.$company_domain;

                    $company->company_name = $faker->company;
                    $company->email = $company_email;
                    $company->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);

                    $company->url = 'http://www.'.$company_domain;

                    //

                    $company->address1 = $faker->streetAddress;


                    $state = $states[array_rand($states)];

                    //

                    $company->city = $state['name'];
                    $company->state = $state['name'];


                    $company->business_number = $state['tin'].strtoupper(Ib_Str::random_alpha(5))._raid(4).strtoupper(Ib_Str::random_alpha(1).'Z'._raid(1));


                    $company->save();


                }




                update_option('CompanyName','CloudOnex');
                update_option('nstyle','light_blue');
                update_option('currency_code','Rs.');
                update_option('country','India');
                update_option('country_flag_code','in');
                update_option('timezone','Asia/Kolkata');
                update_option('df','d/m/Y');
                update_option('home_currency','INR');
                update_option('momentLocale','en');
                update_option('language','en');
                update_option('caddress','CloudOnex <br>Bandra Kurla Complex (9th Floor)<br>G Block, Plot C 59, Mumbai 400 051<br>India');

                update_option('graph_primary_color','2196f3');

                update_option('edition','default');

                update_option('dec_point','.');
                update_option('thousands_sep',',');

                update_option('networth_goal','350000');

                update_option('logo_default','logo_2105025689.png');
                update_option('logo_inverse','logo_inverse_7627893866.png');


                $user = User::find(1);

                $user->language = 'en';

                $user->fullname = 'Rakesh Aditya';

                $user->img = 'storage/dev/user3.png';

                $user->save();

                $_SESSION['language'] = 'en';

                $companies = Company::all()->toArray();


                for ($i=0; $i < 293; $i++){

                    shuffle($companies);

                    $c = new Contact;

                    $c->account = $faker->name;
                    $c->email = $faker->email;
                    $c->phone = '+91'._raid(10);
                    //  $c->company = $faker->company;
                    $c->company = $companies[0]['company_name'];

                    $c->cid = $companies[0]['id'];

                    $c->gid = 1;
                    $c->gname = $gname;

                    $c->address = $faker->streetAddress;
                    $c->city = $faker->city;
                    $c->state = $faker->state;
                    $c->zip = $faker->postcode;
                    $c->country = $faker->country;
                    $c->lat = $faker->latitude;
                    $c->lon  = $faker->longitude;

                    $c->save();

                }






                // create banks

                $banks = [
                    [
                        'name' => 'HDFC Bank'
                    ],
                    [
                        'name' => 'ICICI Bank'
                    ],
                    [
                        'name' => 'Axis Bank'
                    ]
                    ,
                    [
                        'name' => 'Cash'
                    ]
                    ,
                    [
                        'name' => 'Office Cash'
                    ]
                ];



                foreach ($banks as $bank){

                    $account = new Account;
                    $account->account = $bank['name'];
                    $account->bank_name = $bank['name'];
                    $account->balance = _raid(5);
                    $account->save();

                    $balance = new Balance;

                    $balance->account_id = $account->id;
                    $balance->currency_id = 1;
                    $balance->balance = _raid(5);
                    $balance->save();

                }



                // Generate Transactions



                $tr_incomes = [
                    [

                        'description' => 'Sales',
                        'amount' => 5400

                    ],
                    [
                        'description' => 'Music Lessons',
                        'amount' => 1800
                    ],
                    [
                        'description' => 'Software Development',
                        'amount' => 2500
                    ],
                    [
                        'description' => 'Web Development',
                        'amount' => 1500
                    ],
                    [
                        'description' => 'Consultancy',
                        'amount' => 4000
                    ],
                    [
                        'description' => 'Interest',
                        'amount' => 700
                    ]
                ];




                $transactionMethod = TransactionMethod::all()->toArray();


                for ($i=0; $i < 723; $i++){

                    shuffle($banks);
                    shuffle($tr_incomes);
                    shuffle($transactionMethod);

                    $method = $transactionMethod[0]['name'];


                    if($method == 'Cash'){
                        $ref = 'Office / Store Desk';
                    }
                    elseif ($method == 'Check'){
                        $ref = 'Check Number- '._raid(4).'-'._raid(8);
                    }
                    elseif ($method == 'Credit Card'){
                        $ref = $faker->creditCardType.' - '.'****'._raid(4);
                    }
                    else{
                        $ref = 'Transaction ID- '.strtoupper(Ib_Str::random_string(17));
                    }



                    $transaction = new Transaction;
                    $transaction->account = $banks[0]['name'];
                    $transaction->description = $tr_incomes[0]['description'];
                    $transaction->amount = $tr_incomes[0]['amount'];
                    $transaction->cr = $tr_incomes[0]['amount'];
                    $transaction->date = $faker->dateTimeBetween($startDate = '-1 year', $endDate = '+3 month');

                    $transaction->type = 'Income';

                    $transaction->vid = _raid(8);

                    $transaction->ref = $ref;
                    $transaction->method = $method;

                    $transaction->save();

                }



                // for categories chart

                $categories = TransactionCategory::expense();

                $cat_amounts = [297523,12189,3290,54782,323459,19220,2145,723,182,4198,5289,39902,2678,229,820,2678,9379,14890,3802,18903,5782,45782,27834,9492,2784,28549,3882,38290,932,56,28820,38400,922,39273,7123,81267,47200,37892,1792,3971,37293,2748,27849];

                $i = 0;

                foreach ($categories as $category){

                    $category->total_amount = $cat_amounts[$i];
                    $category->save();


                    $i++;

                }


                // Generate Expense


                $tr_expenses = [
                    [

                        'description' => 'Salaries',
                        'amount' => 5400

                    ],
                    [
                        'description' => 'Freight',
                        'amount' => 1800
                    ],
                    [
                        'description' => 'Travel',
                        'amount' => 2500
                    ],
                    [
                        'description' => 'Phone',
                        'amount' => 1500
                    ],
                    [
                        'description' => 'Consultancy',
                        'amount' => 4000
                    ],
                    [
                        'description' => 'Bank Fees',
                        'amount' => 700
                    ]
                ];





                for ($i=0; $i < 393; $i++){

                    shuffle($banks);
                    shuffle($tr_expenses);

                    shuffle($transactionMethod);

                    $method = $transactionMethod[0]['name'];


                    if($method == 'Cash'){
                        $ref = 'Office / Store Desk';
                    }
                    elseif ($method == 'Check'){
                        $ref = 'Check Number- '._raid(4).'-'._raid(8);
                    }
                    elseif ($method == 'Credit Card'){
                        $ref = $faker->creditCardType.' - '.'****'._raid(4);
                    }
                    else{
                        $ref = 'Transaction ID- '.strtoupper(Ib_Str::random_string(17));
                    }




                    $transaction = new Transaction;
                    $transaction->account = $banks[0]['name'];
                    $transaction->description = $tr_expenses[0]['description'];
                    $transaction->amount = $tr_expenses[0]['amount'];
                    $transaction->dr = $tr_expenses[0]['amount'];
                    $transaction->date = $faker->dateTimeBetween($startDate = '-1 year', $endDate = '+3 months');

                    $transaction->type = 'Expense';

                    $transaction->vid = _raid(8);

                    $transaction->method = $method;

                    $transaction->ref = $ref;

                    $transaction->save();

                }


                $leadStatus = LeadStatus::all()->toArray();

                $salutations = ['Mr.','Mrs.','Ms.'];


                for ($i=0; $i < 327; $i++){

                    shuffle($leadStatus);

                    shuffle($salutations);

                    shuffle($companies);

                    $lead = new Lead;

                    $lead->status = $leadStatus[0]['sname'];
                    $lead->salutation = $salutations[0];
                    $lead->first_name = $faker->firstName;
                    $lead->last_name = $faker->lastName;
                    $lead->company = $companies[0]['company_name'];
                    $lead->company_id = $companies[0]['id'];

                    // +91 22 67000971

                    $lead->phone = '+91'._raid(10);

                    $lead->title = $faker->jobTitle;

                    $lead->email = $faker->email;

                    $lead->save();


                }



                // for categories chart


                // add a customer for the Demo


                $customer = new Contact;

                $customer_name = 'Ramesh Mathur';

                $customer_email = 'ramesh@The Acme Inc..com';

                $customer->account = $customer_name;

                $customer->img = 'storage/dev/user4.png';

                $customer->password = '$1$WN..nD2.$Vo9niDl/fUf0VhheEjmHe/';

                $customer->email = $customer_email;
                $customer->phone = '+91'._raid(10);

                $customer->company = 'The Acme Inc.';

                $customer->balance = '0.00';

                $customer->cid = 1;

                $customer->gid = 1;

                $customer->gname = $gname;

                $customer->address = '15th Dev Corpora (Near Cadbury Junction)';
                $customer->city = 'Thane';
                $customer->state = 'Mumbai';
                $customer->zip = '400601';
                $customer->country = 'India';
                $customer->lat = '19.218331';
                $customer->lon  = '72.978090';

                $customer->autologin = '11c8fe1bd9ys63ankjmi2941507125863';



                $customer->save();

                $customer_id = $customer->id;

                $card_ref = $faker->creditCardType.' - '.'****'._raid(4);


                DB::insert('INSERT INTO sys_invoices (userid, account, cn, invoicenum, date, duedate, datepaid, subtotal, discount_type, discount_value, discount, credit, taxname, tax, tax2, total, taxrate, taxrate2, status, paymentmethod, notes, vtoken, ptoken, r, nd, eid, ename, vid, currency, currency_symbol, currency_prefix, currency_suffix, currency_rate, recurring, recurring_ends, last_recurring_date, source, sale_agent, last_overdue_reminder, allowed_payment_methods, billing_street, billing_city, billing_state, billing_zip, billing_country, shipping_street, shipping_city, shipping_state, shipping_zip, shipping_country, q_hide, show_quantity_as, pid, is_credit_invoice, aid, aname) VALUES ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 144.00, \'f\', 0.00, 0.00, 0.00, \'\', 0.00, 0.00, 144.00, 0.00, 0.00, \'Paid\', \'\', \'\', \'0738541991\', \'7715021517\', \'0\', \''.$today.'\', 0, \'\', 0, 1, \'Rs.\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, \'\', 0, 1, 0, null), ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 2000.00, \'f\', 200.00, 200.00, 0.00, \'Sales Tax\', 300.00, 0.00, 2100.00, 15.00, 0.00, \'Unpaid\', \'\', \'\', \'4491605289\', \'9317090421\', \'0\', \''.$today.'\', 0, \'\', 0, 1, \'Rs.\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, \'\', 0, 0, 0, null), ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 149.00, \'p\', 0.00, 0.00, 149.00, \'\', 0.00, 0.00, 149.00, 0.00, 0.00, \'Paid\', \'\', \'\', \'3559815740\', \'6479179633\', \'0\', \'2019-09-23\', 0, \'\', 0, 1, \'Rs.\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, null, 0, 0, 0, null)');

                DB::insert('INSERT INTO sys_invoiceitems (invoiceid, userid, type, relid, itemcode, description, qty, amount, taxed, taxamount, total, duedate, paymentmethod, notes) 
VALUES (1, '.$customer_id.', \'\', 0, \'\', \'Credit\', \'1\', 144.00, 0, 0.00, 144.00, \''.$today.'\', \'\', \'\'),
  (2, '.$customer_id.', \'\', 0, \'\', \'API Integration\', \'1\', 400.00, 1, 0.00, 400.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'UI & UX Design\', \'1\', 400.00, 1, 0.00, 400.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'Project Research & Familiarization\', \'1\', 700.00, 1, 0.00, 700.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'Meeting, Preparation of Documents & Strategic Planning\', \'1\', 500.00, 1, 0.00, 500.00, \''.$today.'\', \'\', \'\'),
(3, '.$customer_id.', \'\', 0, \'\', \'Web Hosting / Yearly\', \'1\', 149.00, 0, 0.00, 149.00, \''.$today.'\', \'\', \'\')');


                DB::insert('INSERT INTO sys_transactions (account, type, sub_type, category, amount, payer, payee, payerid, payeeid, method, ref, status, description, tags, tax, date, dr, cr, bal, iid, currency, currency_symbol, currency_prefix, currency_suffix, currency_rate, base_amount, company_id, vid, aid, created_at, updated_at, updated_by, attachments, source, rid, pid, archived, trash, flag, c1, c2, c3, c4, c5) VALUES (\'Cash\', \'Income\', null, \'Uncategorized\', 144.00, \''.$customer_name.'\', \'\', '.$customer_id.', 0, \'Credit Card\', \''.$card_ref.'\', \'Cleared\', \'Invoice 1 Payment\', \'\', 0.00, \'2019-09-23\', 0.00, 144.00, 0.00, 1, 1, \'INR\', null, null, 1.0000, 0.0000, 0, '._raid(8).', 0, \'2019-09-23 15:19:56\', \'2019-09-23 09:19:56\', 0, null, null, 0, 0, 0, 0, 0, null, null, null, null, null), (\'JPMorgan Chase & Co.\', \'Income\', null, \'Uncategorized\', 149.00, \''.$customer_name.'\', \'\', '.$customer_id.', 0, \'Paypal\', \'Transaction ID- '.strtoupper(Ib_Str::random_string(17)).'\', \'Cleared\', \'Invoice 3 Payment\', \'\', 0.00, \'2019-09-23\', 0.00, 149.00, 0.00, 3, 1, \'INR\', null, null, 1.0000, 0.0000, 0, '._raid(8).', 0, \'2019-09-23 15:22:00\', \'2019-09-23 09:22:00\', 0, null, null, 0, 0, 0, 0, 0, null, null, null, null, null)');


                Tax::taxReset('India');
                update_option('tax_system','India');



                break;


            case 'gb':

                $faker = Faker\Factory::create('en_GB');

                break;

            case 'br':

                $def_currency_code = 'BRL';
                $def_currency_symbol = 'R$';

                // pt_BR
                $faker = Faker\Factory::create('pt_BR');


                $group = new ContactGroup;
                $group->gname = $gname;
                $group->save();

                $currency = new Currency;
                $currency->cname = 'BRL';
                $currency->iso_code = 'BRL';
                $currency->symbol = 'R$';
                $currency->save();


                // create companies


                $c_emails_types = ['sales','info','admin','hello','media','support','billing'];

                for ($i=0; $i < 144; $i++){

                    shuffle($c_emails_types);

                    $company = new Company;

                    $company_name = $faker->company;

                    $company_domain = strtolower($company_name);
                    $company_domain = str_replace(' ','',$company_domain);
                    $company_domain = str_replace('.','',$company_domain);
                    $company_domain = str_replace(',','',$company_domain);
                    $company_domain = str_replace('-','',$company_domain);
                    $company_domain = $company_domain.'.com.br';
                    $company_email = $c_emails_types[0].'@'.$company_domain;

                    $company->company_name = $faker->company;
                    $company->email = $company_email;
                    $company->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);

                    $company->url = 'http://www.'.$company_domain;

                    $company->save();


                }




                update_option('CompanyName','CloudOnex S.A.');
                update_option('nstyle','light_blue');
                update_option('currency_code','R$');
                update_option('country','Brazil');
                update_option('country_flag_code','br');
                update_option('timezone','America/Sao_Paulo');
                update_option('df','d-m-Y');
                update_option('home_currency','BRL');
                update_option('momentLocale','en');
                update_option('language','pt_br');
                update_option('caddress','CloudOnex <br>Paulista Avenue <br>854 Bela Vista, São Paulo, 01310-100<br>Brazil');

                update_option('graph_primary_color','2196f3');

                update_option('edition','default');

                update_option('dec_point',',');
                update_option('thousands_sep','.');

                update_option('networth_goal','350000');



                $user = User::find(1);

                $user->language = 'pt_br';

                $user->fullname = 'Francisco Jose';

                $user->img = 'storage/dev/user1.jpg';

                $user->save();

                $_SESSION['language'] = 'pt_br';

                $companies = Company::all()->toArray();


                for ($i=0; $i < 293; $i++){

                    shuffle($companies);

                    $c = new Contact;

                    $c->account = $faker->name;
                    $c->email = $faker->email;
                    $c->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);
                    //  $c->company = $faker->company;
                    $c->company = $companies[0]['company_name'];

                    $c->cid = $companies[0]['id'];

                    $c->gid = 1;
                    $c->gname = $gname;

                    $c->address = $faker->streetAddress;
                    $c->city = $faker->city;
                    $c->state = $faker->state;
                    $c->zip = $faker->postcode;
                    $c->country = $faker->country;
                    $c->lat = $faker->latitude;
                    $c->lon  = $faker->longitude;

                    $c->save();

                }






                // create banks

                $banks = [
                    [
                        'name' => 'Caixa Econômica Federal'
                    ],
                    [
                        'name' => 'HSBC'
                    ],
                    [
                        'name' => 'Banco J Safra'
                    ]
                    ,
                    [
                        'name' => 'Dinheiro'
                    ]
                    ,
                    [
                        'name' => 'Escritório'
                    ]
                ];




                foreach ($banks as $bank){

                    $account = new Account;
                    $account->account = $bank['name'];
                    $account->bank_name = $bank['name'];
                    $account->balance = _raid(5);
                    $account->save();

                    $balance = new Balance;

                    $balance->account_id = $account->id;
                    $balance->currency_id = 1;
                    $balance->balance = _raid(5);
                    $balance->save();

                }







                // Generate Transactions



                $tr_incomes = [
                    [

                        'description' => 'Vendas',
                        'amount' => 5400

                    ],
                    [
                        'description' => 'Lições de música',
                        'amount' => 1800
                    ],
                    [
                        'description' => 'Desenvolvimento de Software',
                        'amount' => 2500
                    ],
                    [
                        'description' => 'Desenvolvimento Web',
                        'amount' => 1500
                    ],
                    [
                        'description' => 'Consultoria',
                        'amount' => 4000
                    ],
                    [
                        'description' => 'Interesse',
                        'amount' => 700
                    ]
                ];




                $transactionMethod = TransactionMethod::all()->toArray();


                for ($i=0; $i < 723; $i++){

                    shuffle($banks);
                    shuffle($tr_incomes);
                    shuffle($transactionMethod);

                    $method = $transactionMethod[0]['name'];


                    if($method == 'Cash'){
                        $ref = 'Office / Store Desk';
                    }
                    elseif ($method == 'Check'){
                        $ref = 'Check Number- '._raid(4).'-'._raid(8);
                    }
                    elseif ($method == 'Credit Card'){
                        $ref = $faker->creditCardType.' - '.'****'._raid(4);
                    }
                    else{
                        $ref = 'Transaction ID- '.strtoupper(Ib_Str::random_string(17));
                    }



                    $transaction = new Transaction;
                    $transaction->account = $banks[0]['name'];
                    $transaction->description = $tr_incomes[0]['description'];
                    $transaction->amount = $tr_incomes[0]['amount'];
                    $transaction->cr = $tr_incomes[0]['amount'];
                    $transaction->date = $faker->dateTimeBetween($startDate = '-1 year', $endDate = '+3 month');

                    $transaction->type = 'Income';

                    $transaction->vid = _raid(8);

                    $transaction->ref = $ref;
                    $transaction->method = $method;

                    $transaction->save();

                }



                // for categories chart

                $categories = TransactionCategory::expense();

                $cat_amounts = [297523,12189,3290,54782,323459,19220,2145,723,182,4198,5289,39902,2678,229,820,2678,9379,14890,3802,18903,5782,45782,27834,9492,2784,28549,3882,38290,932,56,28820,38400,922,39273,7123,81267,47200,37892,1792,3971,37293,2748,27849];

                $i = 0;

                foreach ($categories as $category){

                    $category->total_amount = $cat_amounts[$i];
                    $category->save();


                    $i++;

                }


                // Generate Expense


                $tr_expenses = [
                    [

                        'description' => 'Salários',
                        'amount' => 5400

                    ],
                    [
                        'description' => 'Frete',
                        'amount' => 1800
                    ],
                    [
                        'description' => 'Viagem',
                        'amount' => 2500
                    ],
                    [
                        'description' => 'Telefone',
                        'amount' => 1500
                    ],
                    [
                        'description' => 'Consultoria',
                        'amount' => 4000
                    ],
                    [
                        'description' => 'Taxas bancárias',
                        'amount' => 700
                    ]
                ];





                for ($i=0; $i < 393; $i++){

                    shuffle($banks);
                    shuffle($tr_expenses);

                    shuffle($transactionMethod);

                    $method = $transactionMethod[0]['name'];


                    if($method == 'Cash'){
                        $ref = 'Secretária de escritório / loja';
                    }
                    elseif ($method == 'Check'){
                        $ref = 'Check Número- '._raid(4).'-'._raid(8);
                    }
                    elseif ($method == 'Cartão de crédito'){
                        $ref = $faker->creditCardType.' - '.'****'._raid(4);
                    }
                    else{
                        $ref = 'ID da transação- '.strtoupper(Ib_Str::random_string(17));
                    }




                    $transaction = new Transaction;
                    $transaction->account = $banks[0]['name'];
                    $transaction->description = $tr_expenses[0]['description'];
                    $transaction->amount = $tr_expenses[0]['amount'];
                    $transaction->dr = $tr_expenses[0]['amount'];
                    $transaction->date = $faker->dateTimeBetween($startDate = '-1 year', $endDate = '+3 months');

                    $transaction->type = 'Expense';

                    $transaction->vid = _raid(8);

                    $transaction->method = $method;

                    $transaction->ref = $ref;

                    $transaction->save();

                }


                $leadStatus = LeadStatus::all()->toArray();

                $salutations = ['Sr.','Sra.'];


                for ($i=0; $i < 327; $i++){

                    shuffle($leadStatus);

                    shuffle($salutations);

                    shuffle($companies);

                    $lead = new Lead;

                    $lead->status = $leadStatus[0]['sname'];
                    $lead->salutation = $salutations[0];
                    $lead->first_name = $faker->firstName;
                    $lead->last_name = $faker->lastName;
                    $lead->company = $companies[0]['company_name'];
                    $lead->company_id = $companies[0]['id'];

                    $lead->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);

                    $lead->title = $faker->jobTitle;

                    $lead->email = $faker->email;

                    $lead->save();


                }



                // for categories chart


                // add a customer for the Demo


                $customer = new Contact;

                $customer_name = 'Maria Ana';

                $customer_email = 'client@example.com';

                $customer->account = $customer_name;

                $customer->img = 'storage/dev/user2.png';

                $customer->password = '$1$WN..nD2.$Vo9niDl/fUf0VhheEjmHe/';

                $customer->email = $customer_email;
                $customer->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);

                $customer->company = 'The Acme Inc.';

                $customer->balance = '0.00';

                $customer->cid = 1;

                $customer->gid = 1;

                $customer->gname = $gname;

                $customer->address = 'Parque Cultural, 37 - 4º andar';
                $customer->city = 'Paulista';
                $customer->state = 'Sao Paulo';
                $customer->zip = '01311-902';
                $customer->country = 'Brazil';
                $customer->lat = '-7.918190';
                $customer->lon  = '-34.820760';



                $customer->save();

                $customer_id = $customer->id;

                $card_ref = $faker->creditCardType.' - '.'****'._raid(4);


                DB::insert('INSERT INTO sys_invoices (userid, account, cn, invoicenum, date, duedate, datepaid, subtotal, discount_type, discount_value, discount, credit, taxname, tax, tax2, total, taxrate, taxrate2, status, paymentmethod, notes, vtoken, ptoken, r, nd, eid, ename, vid, currency, currency_symbol, currency_prefix, currency_suffix, currency_rate, recurring, recurring_ends, last_recurring_date, source, sale_agent, last_overdue_reminder, allowed_payment_methods, billing_street, billing_city, billing_state, billing_zip, billing_country, shipping_street, shipping_city, shipping_state, shipping_zip, shipping_country, q_hide, show_quantity_as, pid, is_credit_invoice, aid, aname) VALUES ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 144.00, \'f\', 0.00, 0.00, 0.00, \'\', 0.00, 0.00, 144.00, 0.00, 0.00, \'Paid\', \'\', \'\', \'0738541991\', \'7715021517\', \'0\', \''.$today.'\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, \'\', 0, 1, 0, null), ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 2000.00, \'f\', 200.00, 200.00, 0.00, \'Sales Tax\', 300.00, 0.00, 2100.00, 15.00, 0.00, \'Unpaid\', \'\', \'\', \'4491605289\', \'9317090421\', \'0\', \''.$today.'\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, \'\', 0, 0, 0, null), ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 149.00, \'p\', 0.00, 0.00, 149.00, \'\', 0.00, 0.00, 149.00, 0.00, 0.00, \'Paid\', \'\', \'\', \'3559815740\', \'6479179633\', \'0\', \'2019-09-23\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, null, 0, 0, 0, null)');

                DB::insert('INSERT INTO sys_invoiceitems (invoiceid, userid, type, relid, itemcode, description, qty, amount, taxed, taxamount, total, duedate, paymentmethod, notes) 
VALUES (1, '.$customer_id.', \'\', 0, \'\', \'Credit\', \'1\', 144.00, 0, 0.00, 144.00, \''.$today.'\', \'\', \'\'),
  (2, '.$customer_id.', \'\', 0, \'\', \'API Integration\', \'1\', 400.00, 1, 0.00, 400.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'UI & UX Design\', \'1\', 400.00, 1, 0.00, 400.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'Project Research & Familiarization\', \'1\', 700.00, 1, 0.00, 700.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'Meeting, Preparation of Documents & Strategic Planning\', \'1\', 500.00, 1, 0.00, 500.00, \''.$today.'\', \'\', \'\'),
(3, '.$customer_id.', \'\', 0, \'\', \'Web Hosting / Yearly\', \'1\', 149.00, 0, 0.00, 149.00, \''.$today.'\', \'\', \'\')');


                DB::insert('INSERT INTO sys_transactions (account, type, sub_type, category, amount, payer, payee, payerid, payeeid, method, ref, status, description, tags, tax, date, dr, cr, bal, iid, currency, currency_symbol, currency_prefix, currency_suffix, currency_rate, base_amount, company_id, vid, aid, created_at, updated_at, updated_by, attachments, source, rid, pid, archived, trash, flag, c1, c2, c3, c4, c5) VALUES (\'Cash\', \'Income\', null, \'Uncategorized\', 144.00, \''.$customer_name.'\', \'\', '.$customer_id.', 0, \'Credit Card\', \''.$card_ref.'\', \'Cleared\', \'Invoice 1 Payment\', \'\', 0.00, \'2019-09-23\', 0.00, 144.00, 0.00, 1, 1, \'USD\', null, null, 1.0000, 0.0000, 0, '._raid(8).', 0, \'2019-09-23 15:19:56\', \'2019-09-23 09:19:56\', 0, null, null, 0, 0, 0, 0, 0, null, null, null, null, null), (\'JPMorgan Chase & Co.\', \'Income\', null, \'Uncategorized\', 149.00, \''.$customer_name.'\', \'\', '.$customer_id.', 0, \'Paypal\', \'Transaction ID- '.strtoupper(Ib_Str::random_string(17)).'\', \'Cleared\', \'Invoice 3 Payment\', \'\', 0.00, \'2019-09-23\', 0.00, 149.00, 0.00, 3, 1, \'USD\', null, null, 1.0000, 0.0000, 0, '._raid(8).', 0, \'2019-09-23 15:22:00\', \'2019-09-23 09:22:00\', 0, null, null, 0, 0, 0, 0, 0, null, null, null, null, null)');







                break;

            case 'pt':

                // pt_PT

                $faker = Faker\Factory::create('pt_PT');


                break;


            case 'tr':

                // tr_TR

                $faker = Faker\Factory::create('tr_TR');


                break;


            case 'au':

                $faker = Faker\Factory::create('en_AU');


                $group = new ContactGroup;
                $group->gname = $gname;
                $group->save();

                $currency = new Currency;
                $currency->cname = 'AUD';
                $currency->iso_code = 'AUD';
                $currency->symbol = '$';
                $currency->save();


                // create companies


                $c_emails_types = ['sales','info','admin','hello','media','support','billing'];

                for ($i=0; $i < 144; $i++){

                    shuffle($c_emails_types);

                    $company = new Company;

                    $company_name = $faker->company;

                    $company_domain = strtolower($company_name);
                    $company_domain = str_replace(' ','',$company_domain);
                    $company_domain = str_replace('.','',$company_domain);
                    $company_domain = str_replace(',','',$company_domain);
                    $company_domain = str_replace('-','',$company_domain);
                    $company_domain = $company_domain.'.com';
                    $company_email = $c_emails_types[0].'@'.$company_domain;

                    $company->company_name = $faker->company;
                    $company->email = $company_email;
                    $company->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);

                    $company->url = 'http://www.'.$company_domain;

                    $company->business_number = _raid(2).' '._raid(3).' '._raid(3).' '._raid(3);

                    $company->address1 = $faker->streetAddress;
                    $company->city = $faker->city;
                    $company->state = $faker->state;
                    $company->zip = $faker->postcode;
                    $company->country = $faker->country;

                    $company->save();


                }




                update_option('CompanyName','StackPI Australia Pty Limited');
                update_option('nstyle','light_blue');
                update_option('currency_code','$');
                update_option('country','Australia');
                update_option('country_flag_code','au');
                update_option('timezone','Australia/Melbourne');
                update_option('df','d/m/Y');
                update_option('home_currency','AUD');
                update_option('momentLocale','en');
                update_option('language','en');
                update_option('caddress','StackPI Australia Pty Limited <br>Level 19/180, 180 Lonsdale Street<br>Melbourne VIC 3000<br>Australia');

                update_option('graph_primary_color','2196f3');

                update_option('edition','default');

                update_option('dec_point','.');
                update_option('thousands_sep',',');

                update_option('networth_goal','350000');

                update_option('logo_default','logo_2105025689.png');
                update_option('logo_inverse','logo_inverse_7627893866.png');



                $user = User::find(1);

                $user->language = 'en';

                $user->fullname = 'Richard Williams';

                $user->img = 'storage/dev/user1.jpg';

                $user->save();

                $_SESSION['language'] = 'en';

                $companies = Company::all()->toArray();


                for ($i=0; $i < 293; $i++){

                    shuffle($companies);

                    $c = new Contact;

                    $c->account = $faker->name;
                    $c->email = $faker->email;
                    $c->phone = '+61 '._raid(5).' '._raid(4);
                    //  $c->company = $faker->company;
                    $c->company = $companies[0]['company_name'];

                    $c->cid = $companies[0]['id'];

                    $c->gid = 1;
                    $c->gname = $gname;

                    $c->address = $faker->streetAddress;
                    $c->city = $faker->city;
                    $c->state = $faker->state;
                    $c->zip = $faker->postcode;
                    $c->country = $faker->country;
                    $c->lat = $faker->latitude;
                    $c->lon  = $faker->longitude;

                    $c->save();

                }






                // create banks

                $banks = [
                    [
                        'name' => 'Commonwealth Bank'
                    ],
                    [
                        'name' => 'Westpac Bank'
                    ],
                    [
                        'name' => 'Standard Chartered'
                    ]
                    ,
                    [
                        'name' => 'Cash'
                    ]
                    ,
                    [
                        'name' => 'City Bank'
                    ]
                ];



                foreach ($banks as $bank){

                    $account = new Account;
                    $account->account = $bank['name'];
                    $account->bank_name = $bank['name'];
                    $account->balance = _raid(5);
                    $account->save();

                    $balance = new Balance;

                    $balance->account_id = $account->id;
                    $balance->currency_id = 1;
                    $balance->balance = _raid(5);
                    $balance->save();

                }



                // Generate Transactions



                $tr_incomes = [
                    [

                        'description' => 'Sales',
                        'amount' => 5400

                    ],
                    [
                        'description' => 'Music Lessons',
                        'amount' => 1800
                    ],
                    [
                        'description' => 'Software Development',
                        'amount' => 2500
                    ],
                    [
                        'description' => 'Web Development',
                        'amount' => 1500
                    ],
                    [
                        'description' => 'Consultancy',
                        'amount' => 4000
                    ],
                    [
                        'description' => 'Interest',
                        'amount' => 700
                    ]
                ];




                $transactionMethod = TransactionMethod::all()->toArray();


                for ($i=0; $i < 723; $i++){

                    shuffle($banks);
                    shuffle($tr_incomes);
                    shuffle($transactionMethod);

                    $method = $transactionMethod[0]['name'];


                    if($method == 'Cash'){
                        $ref = 'Office / Store Desk';
                    }
                    elseif ($method == 'Check'){
                        $ref = 'Check Number- '._raid(4).'-'._raid(8);
                    }
                    elseif ($method == 'Credit Card'){
                        $ref = $faker->creditCardType.' - '.'****'._raid(4);
                    }
                    else{
                        $ref = 'Transaction ID- '.strtoupper(Ib_Str::random_string(17));
                    }



                    $transaction = new Transaction;
                    $transaction->account = $banks[0]['name'];
                    $transaction->description = $tr_incomes[0]['description'];
                    $transaction->amount = $tr_incomes[0]['amount'];
                    $transaction->cr = $tr_incomes[0]['amount'];
                    $transaction->date = $faker->dateTimeBetween($startDate = '-1 year', $endDate = '+3 month');

                    $transaction->type = 'Income';

                    $transaction->vid = _raid(8);

                    $transaction->ref = $ref;
                    $transaction->method = $method;

                    $transaction->save();

                }



                // for categories chart

                $categories = TransactionCategory::expense();

                $cat_amounts = [297523,12189,3290,54782,323459,19220,2145,723,182,4198,5289,39902,2678,229,820,2678,9379,14890,3802,18903,5782,45782,27834,9492,2784,28549,3882,38290,932,56,28820,38400,922,39273,7123,81267,47200,37892,1792,3971,37293,2748,27849];

                $i = 0;

                foreach ($categories as $category){

                    $category->total_amount = $cat_amounts[$i];
                    $category->save();


                    $i++;

                }


                // Generate Expense


                $tr_expenses = [
                    [

                        'description' => 'Salaries',
                        'amount' => 5400

                    ],
                    [
                        'description' => 'Freight',
                        'amount' => 1800
                    ],
                    [
                        'description' => 'Travel',
                        'amount' => 2500
                    ],
                    [
                        'description' => 'Phone',
                        'amount' => 1500
                    ],
                    [
                        'description' => 'Consultancy',
                        'amount' => 4000
                    ],
                    [
                        'description' => 'Bank Fees',
                        'amount' => 700
                    ]
                ];





                for ($i=0; $i < 393; $i++){

                    shuffle($banks);
                    shuffle($tr_expenses);

                    shuffle($transactionMethod);

                    $method = $transactionMethod[0]['name'];


                    if($method == 'Cash'){
                        $ref = 'Office / Store Desk';
                    }
                    elseif ($method == 'Check'){
                        $ref = 'Check Number- '._raid(4).'-'._raid(8);
                    }
                    elseif ($method == 'Credit Card'){
                        $ref = $faker->creditCardType.' - '.'****'._raid(4);
                    }
                    else{
                        $ref = 'Transaction ID- '.strtoupper(Ib_Str::random_string(17));
                    }




                    $transaction = new Transaction;
                    $transaction->account = $banks[0]['name'];
                    $transaction->description = $tr_expenses[0]['description'];
                    $transaction->amount = $tr_expenses[0]['amount'];
                    $transaction->dr = $tr_expenses[0]['amount'];
                    $transaction->date = $faker->dateTimeBetween($startDate = '-1 year', $endDate = '+3 months');

                    $transaction->type = 'Expense';

                    $transaction->vid = _raid(8);

                    $transaction->method = $method;

                    $transaction->ref = $ref;

                    $transaction->save();

                }


                $leadStatus = LeadStatus::all()->toArray();

                $salutations = ['Mr.','Mrs.','Ms.'];


                for ($i=0; $i < 327; $i++){

                    shuffle($leadStatus);

                    shuffle($salutations);

                    shuffle($companies);

                    $lead = new Lead;

                    $lead->status = $leadStatus[0]['sname'];
                    $lead->salutation = $salutations[0];
                    $lead->first_name = $faker->firstName;
                    $lead->last_name = $faker->lastName;
                    $lead->company = $companies[0]['company_name'];
                    $lead->company_id = $companies[0]['id'];

                    $lead->phone = '+61 '._raid(5).' '._raid(4);

                    $lead->title = $faker->jobTitle;

                    $lead->email = $faker->email;

                    $lead->save();


                }



                // for categories chart


                // add a customer for the Demo


                $customer = new Contact;

                $customer_name = 'Sophie Olivia';

                $customer_email = 'client@example.com';

                $customer->account = $customer_name;

                $customer->img = 'storage/dev/user2.png';

                $customer->password = '$1$WN..nD2.$Vo9niDl/fUf0VhheEjmHe/';

                $customer->email = $customer_email;
                $customer->phone = '+61 '._raid(5).' '._raid(4);

                $customer->company = 'The Acme Inc.';

                $customer->balance = '0.00';

                $customer->cid = 1;

                $customer->gid = 1;

                $customer->gname = $gname;

                $customer->address = '486 Lower Heidelberg Road, Heidelberg';
                $customer->city = 'Victoria';
                $customer->state = 'Melbourne';
                $customer->zip = '3084';
                $customer->country = 'Australia';
                $customer->lat = '-37.752000';
                $customer->lon  = '145.070000';



                $customer->save();

                $customer_id = $customer->id;

                $card_ref = $faker->creditCardType.' - '.'****'._raid(4);


                DB::insert('INSERT INTO sys_invoices (userid, account, cn, invoicenum, date, duedate, datepaid, subtotal, discount_type, discount_value, discount, credit, taxname, tax, tax2, total, taxrate, taxrate2, status, paymentmethod, notes, vtoken, ptoken, r, nd, eid, ename, vid, currency, currency_symbol, currency_prefix, currency_suffix, currency_rate, recurring, recurring_ends, last_recurring_date, source, sale_agent, last_overdue_reminder, allowed_payment_methods, billing_street, billing_city, billing_state, billing_zip, billing_country, shipping_street, shipping_city, shipping_state, shipping_zip, shipping_country, q_hide, show_quantity_as, pid, is_credit_invoice, aid, aname) VALUES ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 144.00, \'f\', 0.00, 0.00, 0.00, \'\', 0.00, 0.00, 144.00, 0.00, 0.00, \'Paid\', \'\', \'\', \'0738541991\', \'7715021517\', \'0\', \''.$today.'\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, \'\', 0, 1, 0, null), ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 2000.00, \'f\', 200.00, 200.00, 0.00, \'Sales Tax\', 300.00, 0.00, 2100.00, 15.00, 0.00, \'Unpaid\', \'\', \'\', \'4491605289\', \'9317090421\', \'0\', \''.$today.'\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, \'\', 0, 0, 0, null), ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 149.00, \'p\', 0.00, 0.00, 149.00, \'\', 0.00, 0.00, 149.00, 0.00, 0.00, \'Paid\', \'\', \'\', \'3559815740\', \'6479179633\', \'0\', \'2019-09-23\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, null, 0, 0, 0, null)');

                DB::insert('INSERT INTO sys_invoiceitems (invoiceid, userid, type, relid, itemcode, description, qty, amount, taxed, taxamount, total, duedate, paymentmethod, notes) 
VALUES (1, '.$customer_id.', \'\', 0, \'\', \'Credit\', \'1\', 144.00, 0, 0.00, 144.00, \''.$today.'\', \'\', \'\'),
  (2, '.$customer_id.', \'\', 0, \'\', \'API Integration\', \'1\', 400.00, 1, 0.00, 400.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'UI & UX Design\', \'1\', 400.00, 1, 0.00, 400.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'Project Research & Familiarization\', \'1\', 700.00, 1, 0.00, 700.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'Meeting, Preparation of Documents & Strategic Planning\', \'1\', 500.00, 1, 0.00, 500.00, \''.$today.'\', \'\', \'\'),
(3, '.$customer_id.', \'\', 0, \'\', \'Web Hosting / Yearly\', \'1\', 149.00, 0, 0.00, 149.00, \''.$today.'\', \'\', \'\')');


                DB::insert('INSERT INTO sys_transactions (account, type, sub_type, category, amount, payer, payee, payerid, payeeid, method, ref, status, description, tags, tax, date, dr, cr, bal, iid, currency, currency_symbol, currency_prefix, currency_suffix, currency_rate, base_amount, company_id, vid, aid, created_at, updated_at, updated_by, attachments, source, rid, pid, archived, trash, flag, c1, c2, c3, c4, c5) VALUES (\'Cash\', \'Income\', null, \'Uncategorized\', 144.00, \''.$customer_name.'\', \'\', '.$customer_id.', 0, \'Credit Card\', \''.$card_ref.'\', \'Cleared\', \'Invoice 1 Payment\', \'\', 0.00, \'2019-09-23\', 0.00, 144.00, 0.00, 1, 1, \'USD\', null, null, 1.0000, 0.0000, 0, '._raid(8).', 0, \'2019-09-23 15:19:56\', \'2019-09-23 09:19:56\', 0, null, null, 0, 0, 0, 0, 0, null, null, null, null, null), (\'JPMorgan Chase & Co.\', \'Income\', null, \'Uncategorized\', 149.00, \''.$customer_name.'\', \'\', '.$customer_id.', 0, \'Paypal\', \'Transaction ID- '.strtoupper(Ib_Str::random_string(17)).'\', \'Cleared\', \'Invoice 3 Payment\', \'\', 0.00, \'2019-09-23\', 0.00, 149.00, 0.00, 3, 1, \'USD\', null, null, 1.0000, 0.0000, 0, '._raid(8).', 0, \'2019-09-23 15:22:00\', \'2019-09-23 09:22:00\', 0, null, null, 0, 0, 0, 0, 0, null, null, null, null, null)');



                DB::insert('INSERT INTO sys_items (name, unit, sales_price, inventory, weight, width, length, height, sku, upc, ean, mpn, isbn, sid, supplier, bid, brand, sell_account, purchase_account, inventory_account, taxable, location, item_number, description, type, track_inventroy, negative_stock, available, status, added, last_sold, e, sorder, gid, category_id, supplier_id, gname, product_id, size, start_date, end_date, expire_date, expire_days, image, flag, is_service, commission_percent, commission_percent_type, commission_fixed, trash, payterm, cost_price, unit_price, promo_price, setup, onetime, monthly, monthlysetup, quarterly, quarterlysetup, halfyearly, halfyearlysetup, annually, annuallysetup, biennially, bienniallysetup, triennially, trienniallysetup, has_domain, free_domain, email_rel, tags, sold_count, total_amount, created_at, updated_at) VALUES (\'T-Shirt with AmarBiz Logo\', \'\', 150.00, -2.0000, 0.0000, 0.0000, 0.0000, 0.0000, null, null, null, null, null, 0, null, 0, null, 0, 0, 0, 0, null, \'0001\', \'\', \'Product\', \'No\', \'No\', 0, \'Active\', null, null, \'\', 0, 0, 0, 0, null, null, null, null, null, null, 0, \'_c4b43ae0870238150617433711107582.png\', 0, 0, 0.00, null, 0.00, 0, null, 110.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, null, null, 0, null, 8.0000, 155.0000, null, \'2019-10-04 18:46:13\'),
(\'Golf Hat\', \'\', 120.00, -2.0000, 0.0000, 0.0000, 0.0000, 0.0000, null, null, null, null, null, 0, null, 0, null, 0, 0, 0, 0, null, \'0002\', \'\', \'Product\', \'No\', \'No\', 0, \'Active\', null, null, \'\', 0, 0, 0, 0, null, null, null, null, null, null, 0, \'_7a0c1035255988150617492810876737.png\', 0, 0, 0.00, null, 0.00, 0, null, 70.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, null, null, 0, null, 9.0000, 108.0000, null, \'2019-10-04 18:46:13\'),
(\'Gift Card 250\', \'\', 250.00, -2.0000, 0.0000, 0.0000, 0.0000, 0.0000, null, null, null, null, null, 0, null, 0, null, 0, 0, 0, 0, null, \'0003\', \'\', \'Product\', \'No\', \'No\', 0, \'Active\', null, null, \'\', 0, 0, 0, 0, null, null, null, null, null, null, 0, \'_7ae11af2868642150642538311023612.png\', 0, 0, 0.00, null, 0.00, 0, null, 250.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, null, null, 0, null, 6.0000, 1500.0000, null, \'2019-10-04 18:46:13\')');



                break;


            case 'id':
                $faker = Faker\Factory::create('id_ID');


                break;


            case 'ca':


                $faker = Faker\Factory::create();

                $group = new ContactGroup;
                $group->gname = $gname;
                $group->save();

                $currency = new Currency;
                $currency->cname = 'USD';
                $currency->iso_code = 'USD';
                $currency->symbol = '$';
                $currency->save();


                // create companies


                $c_emails_types = ['sales','info','admin','hello','media','support','billing'];

                for ($i=0; $i < 144; $i++){

                    shuffle($c_emails_types);

                    $company = new Company;

                    $company_name = $faker->company;

                    $company_domain = strtolower($company_name);
                    $company_domain = str_replace(' ','',$company_domain);
                    $company_domain = str_replace('.','',$company_domain);
                    $company_domain = str_replace(',','',$company_domain);
                    $company_domain = str_replace('-','',$company_domain);
                    $company_domain = $company_domain.'.com';
                    $company_email = $c_emails_types[0].'@'.$company_domain;

                    $company->company_name = $faker->company;
                    $company->email = $company_email;
                    $company->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);

                    $company->url = 'http://www.'.$company_domain;

                    $company->save();


                }




                update_option('CompanyName','CloudOnex LLC.');
                update_option('nstyle','light_blue');
                update_option('currency_code','$');
                update_option('country','United States');
                update_option('country_flag_code','us');
                update_option('timezone','America/New_York');
                update_option('df','Y-m-d');
                update_option('home_currency','USD');
                update_option('momentLocale','en');
                update_option('language','en');
                update_option('caddress','CloudOnex <br>1101 Marina Villae Parkway, Suite 201<br>Alameda, California 94501<br>United State');

                update_option('graph_primary_color','2196f3');

                update_option('edition','default');

                update_option('dec_point','.');
                update_option('thousands_sep',',');

                update_option('networth_goal','350000');

                update_option('logo_default','logo_2105025689.png');
                update_option('logo_inverse','logo_inverse_7627893866.png');



                $user = User::find(1);

                $user->language = 'en';

                $user->fullname = 'Richard Williams';

                $user->img = 'storage/dev/user1.jpg';

                $user->save();

                $_SESSION['language'] = 'en';

                $companies = Company::all()->toArray();


                for ($i=0; $i < 293; $i++){

                    shuffle($companies);

                    $c = new Contact;

                    $c->account = $faker->name;
                    $c->email = $faker->email;
                    $c->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);
                    //  $c->company = $faker->company;
                    $c->company = $companies[0]['company_name'];

                    $c->cid = $companies[0]['id'];

                    $c->gid = 1;
                    $c->gname = $gname;

                    $c->address = $faker->streetAddress;
                    $c->city = $faker->city;
                    $c->state = $faker->state;
                    $c->zip = $faker->postcode;
                    $c->country = $faker->country;
                    $c->lat = $faker->latitude;
                    $c->lon  = $faker->longitude;

                    $c->save();

                }






                // create banks

                $banks = [
                    [
                        'name' => 'JPMorgan Chase & Co.'
                    ],
                    [
                        'name' => 'HSBC'
                    ],
                    [
                        'name' => 'Standard Chartered'
                    ]
                    ,
                    [
                        'name' => 'Cash'
                    ]
                    ,
                    [
                        'name' => 'City Bank'
                    ]
                ];



                foreach ($banks as $bank){

                    $account = new Account;
                    $account->account = $bank['name'];
                    $account->bank_name = $bank['name'];
                    $account->balance = _raid(5);
                    $account->save();

                    $balance = new Balance;

                    $balance->account_id = $account->id;
                    $balance->currency_id = 1;
                    $balance->balance = _raid(5);
                    $balance->save();

                }



                // Generate Transactions



                $tr_incomes = [
                    [

                        'description' => 'Sales',
                        'amount' => 5400

                    ],
                    [
                        'description' => 'Music Lessons',
                        'amount' => 1800
                    ],
                    [
                        'description' => 'Software Development',
                        'amount' => 2500
                    ],
                    [
                        'description' => 'Web Development',
                        'amount' => 1500
                    ],
                    [
                        'description' => 'Consultancy',
                        'amount' => 4000
                    ],
                    [
                        'description' => 'Interest',
                        'amount' => 700
                    ]
                ];




                $transactionMethod = TransactionMethod::all()->toArray();


                for ($i=0; $i < 723; $i++){

                    shuffle($banks);
                    shuffle($tr_incomes);
                    shuffle($transactionMethod);

                    $method = $transactionMethod[0]['name'];


                    if($method == 'Cash'){
                        $ref = 'Office / Store Desk';
                    }
                    elseif ($method == 'Check'){
                        $ref = 'Check Number- '._raid(4).'-'._raid(8);
                    }
                    elseif ($method == 'Credit Card'){
                        $ref = $faker->creditCardType.' - '.'****'._raid(4);
                    }
                    else{
                        $ref = 'Transaction ID- '.strtoupper(Ib_Str::random_string(17));
                    }



                    $transaction = new Transaction;
                    $transaction->account = $banks[0]['name'];
                    $transaction->description = $tr_incomes[0]['description'];
                    $transaction->amount = $tr_incomes[0]['amount'];
                    $transaction->cr = $tr_incomes[0]['amount'];
                    $transaction->date = $faker->dateTimeBetween($startDate = '-1 year', $endDate = '+3 month');

                    $transaction->type = 'Income';

                    $transaction->vid = _raid(8);

                    $transaction->ref = $ref;
                    $transaction->method = $method;

                    $transaction->save();

                }



                // for categories chart

                $categories = TransactionCategory::expense();

                $cat_amounts = [297523,12189,3290,54782,323459,19220,2145,723,182,4198,5289,39902,2678,229,820,2678,9379,14890,3802,18903,5782,45782,27834,9492,2784,28549,3882,38290,932,56,28820,38400,922,39273,7123,81267,47200,37892,1792,3971,37293,2748,27849];

                $i = 0;

                foreach ($categories as $category){

                    $category->total_amount = $cat_amounts[$i];
                    $category->save();


                    $i++;

                }


                // Generate Expense


                $tr_expenses = [
                    [

                        'description' => 'Salaries',
                        'amount' => 5400

                    ],
                    [
                        'description' => 'Freight',
                        'amount' => 1800
                    ],
                    [
                        'description' => 'Travel',
                        'amount' => 2500
                    ],
                    [
                        'description' => 'Phone',
                        'amount' => 1500
                    ],
                    [
                        'description' => 'Consultancy',
                        'amount' => 4000
                    ],
                    [
                        'description' => 'Bank Fees',
                        'amount' => 700
                    ]
                ];





                for ($i=0; $i < 393; $i++){

                    shuffle($banks);
                    shuffle($tr_expenses);

                    shuffle($transactionMethod);

                    $method = $transactionMethod[0]['name'];


                    if($method == 'Cash'){
                        $ref = 'Office / Store Desk';
                    }
                    elseif ($method == 'Check'){
                        $ref = 'Check Number- '._raid(4).'-'._raid(8);
                    }
                    elseif ($method == 'Credit Card'){
                        $ref = $faker->creditCardType.' - '.'****'._raid(4);
                    }
                    else{
                        $ref = 'Transaction ID- '.strtoupper(Ib_Str::random_string(17));
                    }




                    $transaction = new Transaction;
                    $transaction->account = $banks[0]['name'];
                    $transaction->description = $tr_expenses[0]['description'];
                    $transaction->amount = $tr_expenses[0]['amount'];
                    $transaction->dr = $tr_expenses[0]['amount'];
                    $transaction->date = $faker->dateTimeBetween($startDate = '-1 year', $endDate = '+3 months');

                    $transaction->type = 'Expense';

                    $transaction->vid = _raid(8);

                    $transaction->method = $method;

                    $transaction->ref = $ref;

                    $transaction->save();

                }


                $leadStatus = LeadStatus::all()->toArray();

                $salutations = ['Mr.','Mrs.','Ms.'];


                for ($i=0; $i < 327; $i++){

                    shuffle($leadStatus);

                    shuffle($salutations);

                    shuffle($companies);

                    $lead = new Lead;

                    $lead->status = $leadStatus[0]['sname'];
                    $lead->salutation = $salutations[0];
                    $lead->first_name = $faker->firstName;
                    $lead->last_name = $faker->lastName;
                    $lead->company = $companies[0]['company_name'];
                    $lead->company_id = $companies[0]['id'];

                    $lead->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);

                    $lead->title = $faker->jobTitle;

                    $lead->email = $faker->email;

                    $lead->save();


                }



                // for categories chart


                // add a customer for the Demo


                $customer = new Contact;

                $customer_name = 'Maria Elizabeth';

                $customer_email = 'client@example.com';

                $customer->account = $customer_name;

                $customer->img = 'storage/dev/user2.png';

                $customer->password = '$1$WN..nD2.$Vo9niDl/fUf0VhheEjmHe/';

                $customer->email = $customer_email;
                $customer->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);

                $customer->company = 'The Acme Inc.';

                $customer->balance = '0.00';

                $customer->cid = 1;

                $customer->gid = 1;

                $customer->gname = $gname;

                $customer->address = '28th Floor, 1325 6th Avenue';
                $customer->city = 'New York';
                $customer->state = 'NY';
                $customer->zip = '10019';
                $customer->country = 'United States';
                $customer->lat = '40.762901';
                $customer->lon  = '-73.980733';


                $customer->autologin = 'za7poz6nxm84kujxj8ro2941551306314';

                $customer->save();

                $customer_id = $customer->id;

                $card_ref = $faker->creditCardType.' - '.'****'._raid(4);


                DB::insert('INSERT INTO sys_invoices (userid, account, cn, invoicenum, date, duedate, datepaid, subtotal, discount_type, discount_value, discount, credit, taxname, tax, tax2, total, taxrate, taxrate2, status, paymentmethod, notes, vtoken, ptoken, r, nd, eid, ename, vid, currency, currency_symbol, currency_prefix, currency_suffix, currency_rate, recurring, recurring_ends, last_recurring_date, source, sale_agent, last_overdue_reminder, allowed_payment_methods, billing_street, billing_city, billing_state, billing_zip, billing_country, shipping_street, shipping_city, shipping_state, shipping_zip, shipping_country, q_hide, show_quantity_as, pid, is_credit_invoice, aid, aname) VALUES ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 144.00, \'f\', 0.00, 0.00, 0.00, \'\', 0.00, 0.00, 144.00, 0.00, 0.00, \'Paid\', \'\', \'\', \'0738541991\', \'7715021517\', \'0\', \''.$today.'\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, \'\', 0, 1, 0, null), ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 2000.00, \'f\', 200.00, 200.00, 0.00, \'Sales Tax\', 300.00, 0.00, 2100.00, 15.00, 0.00, \'Unpaid\', \'\', \'\', \'4491605289\', \'9317090421\', \'0\', \''.$today.'\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, \'\', 0, 0, 0, null), ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 149.00, \'p\', 0.00, 0.00, 149.00, \'\', 0.00, 0.00, 149.00, 0.00, 0.00, \'Paid\', \'\', \'\', \'3559815740\', \'6479179633\', \'0\', \'2019-09-23\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, null, 0, 0, 0, null)');

                DB::insert('INSERT INTO sys_invoiceitems (invoiceid, userid, type, relid, itemcode, description, qty, amount, taxed, taxamount, total, duedate, paymentmethod, notes) 
VALUES (1, '.$customer_id.', \'\', 0, \'\', \'Credit\', \'1\', 144.00, 0, 0.00, 144.00, \''.$today.'\', \'\', \'\'),
  (2, '.$customer_id.', \'\', 0, \'\', \'API Integration\', \'1\', 400.00, 1, 0.00, 400.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'UI & UX Design\', \'1\', 400.00, 1, 0.00, 400.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'Project Research & Familiarization\', \'1\', 700.00, 1, 0.00, 700.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'Meeting, Preparation of Documents & Strategic Planning\', \'1\', 500.00, 1, 0.00, 500.00, \''.$today.'\', \'\', \'\'),
(3, '.$customer_id.', \'\', 0, \'\', \'Web Hosting / Yearly\', \'1\', 149.00, 0, 0.00, 149.00, \''.$today.'\', \'\', \'\')');


                DB::insert('INSERT INTO sys_transactions (account, type, sub_type, category, amount, payer, payee, payerid, payeeid, method, ref, status, description, tags, tax, date, dr, cr, bal, iid, currency, currency_symbol, currency_prefix, currency_suffix, currency_rate, base_amount, company_id, vid, aid, created_at, updated_at, updated_by, attachments, source, rid, pid, archived, trash, flag, c1, c2, c3, c4, c5) VALUES (\'Cash\', \'Income\', null, \'Uncategorized\', 144.00, \''.$customer_name.'\', \'\', '.$customer_id.', 0, \'Credit Card\', \''.$card_ref.'\', \'Cleared\', \'Invoice 1 Payment\', \'\', 0.00, \'2019-09-23\', 0.00, 144.00, 0.00, 1, 1, \'USD\', null, null, 1.0000, 0.0000, 0, '._raid(8).', 0, \'2019-09-23 15:19:56\', \'2019-09-23 09:19:56\', 0, null, null, 0, 0, 0, 0, 0, null, null, null, null, null), (\'JPMorgan Chase & Co.\', \'Income\', null, \'Uncategorized\', 149.00, \''.$customer_name.'\', \'\', '.$customer_id.', 0, \'Paypal\', \'Transaction ID- '.strtoupper(Ib_Str::random_string(17)).'\', \'Cleared\', \'Invoice 3 Payment\', \'\', 0.00, \'2019-09-23\', 0.00, 149.00, 0.00, 3, 1, \'USD\', null, null, 1.0000, 0.0000, 0, '._raid(8).', 0, \'2019-09-23 15:22:00\', \'2019-09-23 09:22:00\', 0, null, null, 0, 0, 0, 0, 0, null, null, null, null, null)');



                DB::insert('INSERT INTO sys_items (name, unit, sales_price, inventory, weight, width, length, height, sku, upc, ean, mpn, isbn, sid, supplier, bid, brand, sell_account, purchase_account, inventory_account, taxable, location, item_number, description, type, track_inventroy, negative_stock, available, status, added, last_sold, e, sorder, gid, category_id, supplier_id, gname, product_id, size, start_date, end_date, expire_date, expire_days, image, flag, is_service, commission_percent, commission_percent_type, commission_fixed, trash, payterm, cost_price, unit_price, promo_price, setup, onetime, monthly, monthlysetup, quarterly, quarterlysetup, halfyearly, halfyearlysetup, annually, annuallysetup, biennially, bienniallysetup, triennially, trienniallysetup, has_domain, free_domain, email_rel, tags, sold_count, total_amount, created_at, updated_at) VALUES (\'T-Shirt with AmarBiz Logo\', \'\', 150.00, -2.0000, 0.0000, 0.0000, 0.0000, 0.0000, null, null, null, null, null, 0, null, 0, null, 0, 0, 0, 0, null, \'0001\', \'\', \'Product\', \'No\', \'No\', 0, \'Active\', null, null, \'\', 0, 0, 0, 0, null, null, null, null, null, null, 0, \'_c4b43ae0870238150617433711107582.png\', 0, 0, 0.00, null, 0.00, 0, null, 110.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, null, null, 0, null, 8.0000, 155.0000, null, \'2019-10-04 18:46:13\'),
(\'Golf Hat\', \'\', 120.00, -2.0000, 0.0000, 0.0000, 0.0000, 0.0000, null, null, null, null, null, 0, null, 0, null, 0, 0, 0, 0, null, \'0002\', \'\', \'Product\', \'No\', \'No\', 0, \'Active\', null, null, \'\', 0, 0, 0, 0, null, null, null, null, null, null, 0, \'_7a0c1035255988150617492810876737.png\', 0, 0, 0.00, null, 0.00, 0, null, 70.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, null, null, 0, null, 9.0000, 108.0000, null, \'2019-10-04 18:46:13\'),
(\'Gift Card 250\', \'\', 250.00, -2.0000, 0.0000, 0.0000, 0.0000, 0.0000, null, null, null, null, null, 0, null, 0, null, 0, 0, 0, 0, null, \'0003\', \'\', \'Product\', \'No\', \'No\', 0, \'Active\', null, null, \'\', 0, 0, 0, 0, null, null, null, null, null, null, 0, \'_7ae11af2868642150642538311023612.png\', 0, 0, 0.00, null, 0.00, 0, null, 250.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, null, null, 0, null, 6.0000, 1500.0000, null, \'2019-10-04 18:46:13\')');


                //




            //


                break;



            case 'ma':


                $faker = Faker\Factory::create();

                $group = new ContactGroup;
                $group->gname = $gname;
                $group->save();

                $currency = new Currency;
                $currency->cname = 'MAD';
                $currency->iso_code = 'MAD';
                $currency->symbol = 'MAD';
                $currency->save();


                // create companies


                $c_emails_types = ['sales','info','admin','hello','media','support','billing'];

                for ($i=0; $i < 144; $i++){

                    shuffle($c_emails_types);

                    $company = new Company;

                    $company_name = $faker->company;

                    $company_domain = strtolower($company_name);
                    $company_domain = str_replace(' ','',$company_domain);
                    $company_domain = str_replace('.','',$company_domain);
                    $company_domain = str_replace(',','',$company_domain);
                    $company_domain = str_replace('-','',$company_domain);
                    $company_domain = $company_domain.'.com';
                    $company_email = $c_emails_types[0].'@'.$company_domain;

                    $company->company_name = $faker->company;
                    $company->email = $company_email;
                    $company->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);

                    $company->url = 'http://www.'.$company_domain;

                    $company->save();


                }




                update_option('CompanyName','StackPI Media Sarl');
                update_option('nstyle','light_blue');
                update_option('currency_code','MAD');
                update_option('country','Morocco');
                update_option('country_flag_code','ma');
                update_option('timezone','Africa/Casablanca');
                update_option('df','Y-m-d');
                update_option('home_currency','MAD');
                update_option('momentLocale','fr');
                update_option('language','fr');
                update_option('caddress','StackPI <br> 59, Boulevard Zerktouni<br> 3eme étage, N°8, 20000<br> Casablanca - Morocco');

                update_option('graph_primary_color','2196f3');

                update_option('edition','default');

                update_option('dec_point','.');
                update_option('thousands_sep',',');

                update_option('networth_goal','350000');

                update_option('logo_default','logo_2105025689.png');
                update_option('logo_inverse','logo_inverse_7627893866.png');



                $user = User::find(1);

                $user->language = 'fr';

                $user->fullname = 'Mohammed Said';

                $user->img = 'storage/dev/user1.jpg';

                $user->save();

                $_SESSION['language'] = 'fr';

                $companies = Company::all()->toArray();


                for ($i=0; $i < 293; $i++){

                    shuffle($companies);

                    $c = new Contact;

                    $c->account = $faker->name;
                    $c->email = $faker->email;
                    $c->phone = '+212 '._raid(3).' '._raid(3).' '._raid(3);
                    //  $c->company = $faker->company;
                    $c->company = $companies[0]['company_name'];

                    $c->cid = $companies[0]['id'];

                    $c->gid = 1;
                    $c->gname = $gname;

                    $c->address = $faker->streetAddress;
                    $c->city = $faker->city;
                    $c->state = $faker->state;
                    $c->zip = $faker->postcode;
                    $c->country = $faker->country;
                    $c->lat = $faker->latitude;
                    $c->lon  = $faker->longitude;

                    $c->save();

                }






                // create banks

                $banks = [
                    [
                        'name' => 'AttijariWafa Bank'
                    ],
                    [
                        'name' => 'CFG Bank'
                    ],
                    [
                        'name' => 'PayPal'
                    ]
                    ,
                    [
                        'name' => 'Cash'
                    ]
                    ,
                    [
                        'name' => 'Office Cash'
                    ]
                ];



                foreach ($banks as $bank){

                    $account = new Account;
                    $account->account = $bank['name'];
                    $account->bank_name = $bank['name'];
                    $account->balance = _raid(5);
                    $account->save();

                    $balance = new Balance;

                    $balance->account_id = $account->id;
                    $balance->currency_id = 1;
                    $balance->balance = _raid(5);
                    $balance->save();

                }



                // Generate Transactions



                $tr_incomes = [
                    [

                        'description' => 'Sales',
                        'amount' => 5400

                    ],
                    [
                        'description' => 'Music Lessons',
                        'amount' => 1800
                    ],
                    [
                        'description' => 'Software Development',
                        'amount' => 2500
                    ],
                    [
                        'description' => 'Web Development',
                        'amount' => 1500
                    ],
                    [
                        'description' => 'Consultancy',
                        'amount' => 4000
                    ],
                    [
                        'description' => 'Interest',
                        'amount' => 700
                    ]
                ];




                $transactionMethod = TransactionMethod::all()->toArray();


                for ($i=0; $i < 723; $i++){

                    shuffle($banks);
                    shuffle($tr_incomes);
                    shuffle($transactionMethod);

                    $method = $transactionMethod[0]['name'];


                    if($method == 'Cash'){
                        $ref = 'Office / Store Desk';
                    }
                    elseif ($method == 'Check'){
                        $ref = 'Check Number- '._raid(4).'-'._raid(8);
                    }
                    elseif ($method == 'Credit Card'){
                        $ref = $faker->creditCardType.' - '.'****'._raid(4);
                    }
                    else{
                        $ref = 'Transaction ID- '.strtoupper(Ib_Str::random_string(17));
                    }



                    $transaction = new Transaction;
                    $transaction->account = $banks[0]['name'];
                    $transaction->description = $tr_incomes[0]['description'];
                    $transaction->amount = $tr_incomes[0]['amount'];
                    $transaction->cr = $tr_incomes[0]['amount'];
                    $transaction->date = $faker->dateTimeBetween($startDate = '-1 year', $endDate = '+3 month');

                    $transaction->type = 'Income';

                    $transaction->vid = _raid(8);

                    $transaction->ref = $ref;
                    $transaction->method = $method;

                    $transaction->save();

                }



                // for categories chart

                $categories = TransactionCategory::expense();

                $cat_amounts = [297523,12189,3290,54782,323459,19220,2145,723,182,4198,5289,39902,2678,229,820,2678,9379,14890,3802,18903,5782,45782,27834,9492,2784,28549,3882,38290,932,56,28820,38400,922,39273,7123,81267,47200,37892,1792,3971,37293,2748,27849];

                $i = 0;

                foreach ($categories as $category){

                    $category->total_amount = $cat_amounts[$i];
                    $category->save();


                    $i++;

                }


                // Generate Expense


                $tr_expenses = [
                    [

                        'description' => 'Salaries',
                        'amount' => 5400

                    ],
                    [
                        'description' => 'Freight',
                        'amount' => 1800
                    ],
                    [
                        'description' => 'Travel',
                        'amount' => 2500
                    ],
                    [
                        'description' => 'Phone',
                        'amount' => 1500
                    ],
                    [
                        'description' => 'Consultancy',
                        'amount' => 4000
                    ],
                    [
                        'description' => 'Bank Fees',
                        'amount' => 700
                    ]
                ];





                for ($i=0; $i < 393; $i++){

                    shuffle($banks);
                    shuffle($tr_expenses);

                    shuffle($transactionMethod);

                    $method = $transactionMethod[0]['name'];


                    if($method == 'Cash'){
                        $ref = 'Office / Store Desk';
                    }
                    elseif ($method == 'Check'){
                        $ref = 'Check Number- '._raid(4).'-'._raid(8);
                    }
                    elseif ($method == 'Credit Card'){
                        $ref = $faker->creditCardType.' - '.'****'._raid(4);
                    }
                    else{
                        $ref = 'Transaction ID- '.strtoupper(Ib_Str::random_string(17));
                    }




                    $transaction = new Transaction;
                    $transaction->account = $banks[0]['name'];
                    $transaction->description = $tr_expenses[0]['description'];
                    $transaction->amount = $tr_expenses[0]['amount'];
                    $transaction->dr = $tr_expenses[0]['amount'];
                    $transaction->date = $faker->dateTimeBetween($startDate = '-1 year', $endDate = '+3 months');

                    $transaction->type = 'Expense';

                    $transaction->vid = _raid(8);

                    $transaction->method = $method;

                    $transaction->ref = $ref;

                    $transaction->save();

                }


                $leadStatus = LeadStatus::all()->toArray();

                $salutations = ['Mr.','Mrs.','Ms.'];


                for ($i=0; $i < 327; $i++){

                    shuffle($leadStatus);

                    shuffle($salutations);

                    shuffle($companies);

                    $lead = new Lead;

                    $lead->status = $leadStatus[0]['sname'];
                    $lead->salutation = $salutations[0];
                    $lead->first_name = $faker->firstName;
                    $lead->last_name = $faker->lastName;
                    $lead->company = $companies[0]['company_name'];
                    $lead->company_id = $companies[0]['id'];

                    $lead->phone = '+212 '._raid(3).' '._raid(3).' '._raid(3);

                    $lead->title = $faker->jobTitle;

                    $lead->email = $faker->email;

                    $lead->save();


                }



                // for categories chart


                // add a customer for the Demo


                $customer = new Contact;

                $customer_name = 'Maria Elizabeth';

                $customer_email = 'client@example.com';

                $customer->account = $customer_name;

                $customer->img = 'storage/dev/user2.png';

                $customer->password = '$1$WN..nD2.$Vo9niDl/fUf0VhheEjmHe/';

                $customer->email = $customer_email;
                $customer->phone = '+212 '._raid(3).' '._raid(3).' '._raid(3);

                $customer->company = 'The Acme Inc.';

                $customer->balance = '0.00';

                $customer->cid = 1;

                $customer->gid = 1;

                $customer->gname = $gname;

                $customer->address = '16, Avenue des FAR, 4°Etage, B16';
                $customer->city = 'Casablanca';
                $customer->state = 'Casablanca';
                $customer->zip = '10019';
                $customer->country = 'Morocco';
                $customer->lat = '40.762901';
                $customer->lon  = '-73.980733';



                $customer->save();

                $customer_id = $customer->id;

                $card_ref = $faker->creditCardType.' - '.'****'._raid(4);


                DB::insert('INSERT INTO sys_invoices (userid, account, cn, invoicenum, date, duedate, datepaid, subtotal, discount_type, discount_value, discount, credit, taxname, tax, tax2, total, taxrate, taxrate2, status, paymentmethod, notes, vtoken, ptoken, r, nd, eid, ename, vid, currency, currency_symbol, currency_prefix, currency_suffix, currency_rate, recurring, recurring_ends, last_recurring_date, source, sale_agent, last_overdue_reminder, allowed_payment_methods, billing_street, billing_city, billing_state, billing_zip, billing_country, shipping_street, shipping_city, shipping_state, shipping_zip, shipping_country, q_hide, show_quantity_as, pid, is_credit_invoice, aid, aname) VALUES ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 144.00, \'f\', 0.00, 0.00, 0.00, \'\', 0.00, 0.00, 144.00, 0.00, 0.00, \'Paid\', \'\', \'\', \'0738541991\', \'7715021517\', \'0\', \''.$today.'\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, \'\', 0, 1, 0, null), ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 2000.00, \'f\', 200.00, 200.00, 0.00, \'Sales Tax\', 300.00, 0.00, 2100.00, 15.00, 0.00, \'Unpaid\', \'\', \'\', \'4491605289\', \'9317090421\', \'0\', \''.$today.'\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, \'\', 0, 0, 0, null), ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 149.00, \'p\', 0.00, 0.00, 149.00, \'\', 0.00, 0.00, 149.00, 0.00, 0.00, \'Paid\', \'\', \'\', \'3559815740\', \'6479179633\', \'0\', \'2019-09-23\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, null, 0, 0, 0, null)');

                DB::insert('INSERT INTO sys_invoiceitems (invoiceid, userid, type, relid, itemcode, description, qty, amount, taxed, taxamount, total, duedate, paymentmethod, notes) 
VALUES (1, '.$customer_id.', \'\', 0, \'\', \'Credit\', \'1\', 144.00, 0, 0.00, 144.00, \''.$today.'\', \'\', \'\'),
  (2, '.$customer_id.', \'\', 0, \'\', \'API Integration\', \'1\', 400.00, 1, 0.00, 400.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'UI & UX Design\', \'1\', 400.00, 1, 0.00, 400.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'Project Research & Familiarization\', \'1\', 700.00, 1, 0.00, 700.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'Meeting, Preparation of Documents & Strategic Planning\', \'1\', 500.00, 1, 0.00, 500.00, \''.$today.'\', \'\', \'\'),
(3, '.$customer_id.', \'\', 0, \'\', \'Web Hosting / Yearly\', \'1\', 149.00, 0, 0.00, 149.00, \''.$today.'\', \'\', \'\')');


                DB::insert('INSERT INTO sys_transactions (account, type, sub_type, category, amount, payer, payee, payerid, payeeid, method, ref, status, description, tags, tax, date, dr, cr, bal, iid, currency, currency_symbol, currency_prefix, currency_suffix, currency_rate, base_amount, company_id, vid, aid, created_at, updated_at, updated_by, attachments, source, rid, pid, archived, trash, flag, c1, c2, c3, c4, c5) VALUES (\'Cash\', \'Income\', null, \'Uncategorized\', 144.00, \''.$customer_name.'\', \'\', '.$customer_id.', 0, \'Credit Card\', \''.$card_ref.'\', \'Cleared\', \'Invoice 1 Payment\', \'\', 0.00, \'2019-09-23\', 0.00, 144.00, 0.00, 1, 1, \'USD\', null, null, 1.0000, 0.0000, 0, '._raid(8).', 0, \'2019-09-23 15:19:56\', \'2019-09-23 09:19:56\', 0, null, null, 0, 0, 0, 0, 0, null, null, null, null, null), (\'JPMorgan Chase & Co.\', \'Income\', null, \'Uncategorized\', 149.00, \''.$customer_name.'\', \'\', '.$customer_id.', 0, \'Paypal\', \'Transaction ID- '.strtoupper(Ib_Str::random_string(17)).'\', \'Cleared\', \'Invoice 3 Payment\', \'\', 0.00, \'2019-09-23\', 0.00, 149.00, 0.00, 3, 1, \'USD\', null, null, 1.0000, 0.0000, 0, '._raid(8).', 0, \'2019-09-23 15:22:00\', \'2019-09-23 09:22:00\', 0, null, null, 0, 0, 0, 0, 0, null, null, null, null, null)');



                DB::insert('INSERT INTO sys_items (name, unit, sales_price, inventory, weight, width, length, height, sku, upc, ean, mpn, isbn, sid, supplier, bid, brand, sell_account, purchase_account, inventory_account, taxable, location, item_number, description, type, track_inventroy, negative_stock, available, status, added, last_sold, e, sorder, gid, category_id, supplier_id, gname, product_id, size, start_date, end_date, expire_date, expire_days, image, flag, is_service, commission_percent, commission_percent_type, commission_fixed, trash, payterm, cost_price, unit_price, promo_price, setup, onetime, monthly, monthlysetup, quarterly, quarterlysetup, halfyearly, halfyearlysetup, annually, annuallysetup, biennially, bienniallysetup, triennially, trienniallysetup, has_domain, free_domain, email_rel, tags, sold_count, total_amount, created_at, updated_at) VALUES (\'T-Shirt with AmarBiz Logo\', \'\', 150.00, -2.0000, 0.0000, 0.0000, 0.0000, 0.0000, null, null, null, null, null, 0, null, 0, null, 0, 0, 0, 0, null, \'0001\', \'\', \'Product\', \'No\', \'No\', 0, \'Active\', null, null, \'\', 0, 0, 0, 0, null, null, null, null, null, null, 0, \'_c4b43ae0870238150617433711107582.png\', 0, 0, 0.00, null, 0.00, 0, null, 110.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, null, null, 0, null, 8.0000, 155.0000, null, \'2019-10-04 18:46:13\'),
(\'Golf Hat\', \'\', 120.00, -2.0000, 0.0000, 0.0000, 0.0000, 0.0000, null, null, null, null, null, 0, null, 0, null, 0, 0, 0, 0, null, \'0002\', \'\', \'Product\', \'No\', \'No\', 0, \'Active\', null, null, \'\', 0, 0, 0, 0, null, null, null, null, null, null, 0, \'_7a0c1035255988150617492810876737.png\', 0, 0, 0.00, null, 0.00, 0, null, 70.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, null, null, 0, null, 9.0000, 108.0000, null, \'2019-10-04 18:46:13\'),
(\'Gift Card 250\', \'\', 250.00, -2.0000, 0.0000, 0.0000, 0.0000, 0.0000, null, null, null, null, null, 0, null, 0, null, 0, 0, 0, 0, null, \'0003\', \'\', \'Product\', \'No\', \'No\', 0, \'Active\', null, null, \'\', 0, 0, 0, 0, null, null, null, null, null, null, 0, \'_7ae11af2868642150642538311023612.png\', 0, 0, 0.00, null, 0.00, 0, null, 250.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, null, null, 0, null, 6.0000, 1500.0000, null, \'2019-10-04 18:46:13\')');



                break;


            case 'ca_quebec':


                $faker = Faker\Factory::create();

                $group = new ContactGroup;
                $group->gname = $gname;
                $group->save();

                $currency = new Currency;
                $currency->cname = 'CAD';
                $currency->iso_code = 'CAD';
                $currency->symbol = 'CA $';
                $currency->save();


                // create companies


                $c_emails_types = ['sales','info','admin','hello','media','support','billing'];

                for ($i=0; $i < 144; $i++){

                    shuffle($c_emails_types);

                    $company = new Company;

                    $company_name = $faker->company;

                    $company_domain = strtolower($company_name);
                    $company_domain = str_replace(' ','',$company_domain);
                    $company_domain = str_replace('.','',$company_domain);
                    $company_domain = str_replace(',','',$company_domain);
                    $company_domain = str_replace('-','',$company_domain);
                    $company_domain = $company_domain.'.com';
                    $company_email = $c_emails_types[0].'@'.$company_domain;

                    $company->company_name = $faker->company;
                    $company->email = $company_email;
                    $company->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);

                    $company->url = 'http://www.'.$company_domain;

                    $company->save();


                }




                update_option('CompanyName','CloudOnex LLC.');
                update_option('nstyle','light_blue');
                update_option('currency_code','$');
                update_option('country','United States');
                update_option('country_flag_code','us');
                update_option('timezone','America/New_York');
                update_option('df','Y-m-d');
                update_option('home_currency','CAD');
                update_option('momentLocale','en');
                update_option('language','en');
                update_option('caddress','CloudOnex <br>1101 Marina Villae Parkway, Suite 201<br>Alameda, California 94501<br>United State');

                update_option('graph_primary_color','2196f3');

                update_option('edition','default');

                update_option('dec_point','.');
                update_option('thousands_sep',',');

                update_option('networth_goal','350000');

                update_option('logo_default','logo_2105025689.png');
                update_option('logo_inverse','logo_inverse_7627893866.png');



                $user = User::find(1);

                $user->language = 'en';

                $user->fullname = 'Richard Williams';

                $user->img = 'storage/dev/user1.jpg';

                $user->save();

                $_SESSION['language'] = 'en';

                $companies = Company::all()->toArray();


                for ($i=0; $i < 293; $i++){

                    shuffle($companies);

                    $c = new Contact;

                    $c->account = $faker->name;
                    $c->email = $faker->email;
                    $c->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);
                    //  $c->company = $faker->company;
                    $c->company = $companies[0]['company_name'];

                    $c->cid = $companies[0]['id'];

                    $c->gid = 1;
                    $c->gname = $gname;

                    $c->address = $faker->streetAddress;
                    $c->city = $faker->city;
                    $c->state = $faker->state;
                    $c->zip = $faker->postcode;
                    $c->country = $faker->country;
                    $c->lat = $faker->latitude;
                    $c->lon  = $faker->longitude;

                    $c->save();

                }






                // create banks

                $banks = [
                    [
                        'name' => 'JPMorgan Chase & Co.'
                    ],
                    [
                        'name' => 'HSBC'
                    ],
                    [
                        'name' => 'Standard Chartered'
                    ]
                    ,
                    [
                        'name' => 'Cash'
                    ]
                    ,
                    [
                        'name' => 'City Bank'
                    ]
                ];



                foreach ($banks as $bank){

                    $account = new Account;
                    $account->account = $bank['name'];
                    $account->bank_name = $bank['name'];
                    $account->balance = _raid(5);
                    $account->save();

                    $balance = new Balance;

                    $balance->account_id = $account->id;
                    $balance->currency_id = 1;
                    $balance->balance = _raid(5);
                    $balance->save();

                }



                // Generate Transactions



                $tr_incomes = [
                    [

                        'description' => 'Sales',
                        'amount' => 5400

                    ],
                    [
                        'description' => 'Music Lessons',
                        'amount' => 1800
                    ],
                    [
                        'description' => 'Software Development',
                        'amount' => 2500
                    ],
                    [
                        'description' => 'Web Development',
                        'amount' => 1500
                    ],
                    [
                        'description' => 'Consultancy',
                        'amount' => 4000
                    ],
                    [
                        'description' => 'Interest',
                        'amount' => 700
                    ]
                ];




                $transactionMethod = TransactionMethod::all()->toArray();


                for ($i=0; $i < 723; $i++){

                    shuffle($banks);
                    shuffle($tr_incomes);
                    shuffle($transactionMethod);

                    $method = $transactionMethod[0]['name'];


                    if($method == 'Cash'){
                        $ref = 'Office / Store Desk';
                    }
                    elseif ($method == 'Check'){
                        $ref = 'Check Number- '._raid(4).'-'._raid(8);
                    }
                    elseif ($method == 'Credit Card'){
                        $ref = $faker->creditCardType.' - '.'****'._raid(4);
                    }
                    else{
                        $ref = 'Transaction ID- '.strtoupper(Ib_Str::random_string(17));
                    }



                    $transaction = new Transaction;
                    $transaction->account = $banks[0]['name'];
                    $transaction->description = $tr_incomes[0]['description'];
                    $transaction->amount = $tr_incomes[0]['amount'];
                    $transaction->cr = $tr_incomes[0]['amount'];
                    $transaction->date = $faker->dateTimeBetween($startDate = '-1 year', $endDate = '+3 month');

                    $transaction->type = 'Income';

                    $transaction->vid = _raid(8);

                    $transaction->ref = $ref;
                    $transaction->method = $method;

                    $transaction->save();

                }



                // for categories chart

                $categories = TransactionCategory::expense();

                $cat_amounts = [297523,12189,3290,54782,323459,19220,2145,723,182,4198,5289,39902,2678,229,820,2678,9379,14890,3802,18903,5782,45782,27834,9492,2784,28549,3882,38290,932,56,28820,38400,922,39273,7123,81267,47200,37892,1792,3971,37293,2748,27849];

                $i = 0;

                foreach ($categories as $category){

                    $category->total_amount = $cat_amounts[$i];
                    $category->save();


                    $i++;

                }


                // Generate Expense


                $tr_expenses = [
                    [

                        'description' => 'Salaries',
                        'amount' => 5400

                    ],
                    [
                        'description' => 'Freight',
                        'amount' => 1800
                    ],
                    [
                        'description' => 'Travel',
                        'amount' => 2500
                    ],
                    [
                        'description' => 'Phone',
                        'amount' => 1500
                    ],
                    [
                        'description' => 'Consultancy',
                        'amount' => 4000
                    ],
                    [
                        'description' => 'Bank Fees',
                        'amount' => 700
                    ]
                ];





                for ($i=0; $i < 393; $i++){

                    shuffle($banks);
                    shuffle($tr_expenses);

                    shuffle($transactionMethod);

                    $method = $transactionMethod[0]['name'];


                    if($method == 'Cash'){
                        $ref = 'Office / Store Desk';
                    }
                    elseif ($method == 'Check'){
                        $ref = 'Check Number- '._raid(4).'-'._raid(8);
                    }
                    elseif ($method == 'Credit Card'){
                        $ref = $faker->creditCardType.' - '.'****'._raid(4);
                    }
                    else{
                        $ref = 'Transaction ID- '.strtoupper(Ib_Str::random_string(17));
                    }




                    $transaction = new Transaction;
                    $transaction->account = $banks[0]['name'];
                    $transaction->description = $tr_expenses[0]['description'];
                    $transaction->amount = $tr_expenses[0]['amount'];
                    $transaction->dr = $tr_expenses[0]['amount'];
                    $transaction->date = $faker->dateTimeBetween($startDate = '-1 year', $endDate = '+3 months');

                    $transaction->type = 'Expense';

                    $transaction->vid = _raid(8);

                    $transaction->method = $method;

                    $transaction->ref = $ref;

                    $transaction->save();

                }


                $leadStatus = LeadStatus::all()->toArray();

                $salutations = ['Mr.','Mrs.','Ms.'];


                for ($i=0; $i < 327; $i++){

                    shuffle($leadStatus);

                    shuffle($salutations);

                    shuffle($companies);

                    $lead = new Lead;

                    $lead->status = $leadStatus[0]['sname'];
                    $lead->salutation = $salutations[0];
                    $lead->first_name = $faker->firstName;
                    $lead->last_name = $faker->lastName;
                    $lead->company = $companies[0]['company_name'];
                    $lead->company_id = $companies[0]['id'];

                    $lead->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);

                    $lead->title = $faker->jobTitle;

                    $lead->email = $faker->email;

                    $lead->save();


                }



                // for categories chart


                // add a customer for the Demo


                $customer = new Contact;

                $customer_name = 'Maria Elizabeth';

                $customer_email = 'client@example.com';

                $customer->account = $customer_name;

                $customer->img = 'storage/dev/user2.png';

                $customer->password = '$1$WN..nD2.$Vo9niDl/fUf0VhheEjmHe/';

                $customer->email = $customer_email;
                $customer->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);

                $customer->company = 'The Acme Inc.';

                $customer->balance = '0.00';

                $customer->cid = 1;

                $customer->gid = 1;

                $customer->gname = $gname;

                $customer->address = '28th Floor, 1325 6th Avenue';
                $customer->city = 'New York';
                $customer->state = 'NY';
                $customer->zip = '10019';
                $customer->country = 'United States';
                $customer->lat = '40.762901';
                $customer->lon  = '-73.980733';



                $customer->save();

                $customer_id = $customer->id;

                $card_ref = $faker->creditCardType.' - '.'****'._raid(4);


                DB::insert('INSERT INTO sys_invoices (userid, account, cn, invoicenum, date, duedate, datepaid, subtotal, discount_type, discount_value, discount, credit, taxname, tax, tax2, total, taxrate, taxrate2, status, paymentmethod, notes, vtoken, ptoken, r, nd, eid, ename, vid, currency, currency_symbol, currency_prefix, currency_suffix, currency_rate, recurring, recurring_ends, last_recurring_date, source, sale_agent, last_overdue_reminder, allowed_payment_methods, billing_street, billing_city, billing_state, billing_zip, billing_country, shipping_street, shipping_city, shipping_state, shipping_zip, shipping_country, q_hide, show_quantity_as, pid, is_credit_invoice, aid, aname) VALUES ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 144.00, \'f\', 0.00, 0.00, 0.00, \'\', 0.00, 0.00, 144.00, 0.00, 0.00, \'Paid\', \'\', \'\', \'0738541991\', \'7715021517\', \'0\', \''.$today.'\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, \'\', 0, 1, 0, null), ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 2000.00, \'f\', 200.00, 200.00, 0.00, \'Sales Tax\', 300.00, 0.00, 2100.00, 15.00, 0.00, \'Unpaid\', \'\', \'\', \'4491605289\', \'9317090421\', \'0\', \''.$today.'\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, \'\', 0, 0, 0, null), ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 149.00, \'p\', 0.00, 0.00, 149.00, \'\', 0.00, 0.00, 149.00, 0.00, 0.00, \'Paid\', \'\', \'\', \'3559815740\', \'6479179633\', \'0\', \'2019-09-23\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, null, 0, 0, 0, null)');

                DB::insert('INSERT INTO sys_invoiceitems (invoiceid, userid, type, relid, itemcode, description, qty, amount, taxed, taxamount, total, duedate, paymentmethod, notes) 
VALUES (1, '.$customer_id.', \'\', 0, \'\', \'Credit\', \'1\', 144.00, 0, 0.00, 144.00, \''.$today.'\', \'\', \'\'),
  (2, '.$customer_id.', \'\', 0, \'\', \'API Integration\', \'1\', 400.00, 1, 0.00, 400.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'UI & UX Design\', \'1\', 400.00, 1, 0.00, 400.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'Project Research & Familiarization\', \'1\', 700.00, 1, 0.00, 700.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'Meeting, Preparation of Documents & Strategic Planning\', \'1\', 500.00, 1, 0.00, 500.00, \''.$today.'\', \'\', \'\'),
(3, '.$customer_id.', \'\', 0, \'\', \'Web Hosting / Yearly\', \'1\', 149.00, 0, 0.00, 149.00, \''.$today.'\', \'\', \'\')');


                DB::insert('INSERT INTO sys_transactions (account, type, sub_type, category, amount, payer, payee, payerid, payeeid, method, ref, status, description, tags, tax, date, dr, cr, bal, iid, currency, currency_symbol, currency_prefix, currency_suffix, currency_rate, base_amount, company_id, vid, aid, created_at, updated_at, updated_by, attachments, source, rid, pid, archived, trash, flag, c1, c2, c3, c4, c5) VALUES (\'Cash\', \'Income\', null, \'Uncategorized\', 144.00, \''.$customer_name.'\', \'\', '.$customer_id.', 0, \'Credit Card\', \''.$card_ref.'\', \'Cleared\', \'Invoice 1 Payment\', \'\', 0.00, \'2019-09-23\', 0.00, 144.00, 0.00, 1, 1, \'USD\', null, null, 1.0000, 0.0000, 0, '._raid(8).', 0, \'2019-09-23 15:19:56\', \'2019-09-23 09:19:56\', 0, null, null, 0, 0, 0, 0, 0, null, null, null, null, null), (\'JPMorgan Chase & Co.\', \'Income\', null, \'Uncategorized\', 149.00, \''.$customer_name.'\', \'\', '.$customer_id.', 0, \'Paypal\', \'Transaction ID- '.strtoupper(Ib_Str::random_string(17)).'\', \'Cleared\', \'Invoice 3 Payment\', \'\', 0.00, \'2019-09-23\', 0.00, 149.00, 0.00, 3, 1, \'USD\', null, null, 1.0000, 0.0000, 0, '._raid(8).', 0, \'2019-09-23 15:22:00\', \'2019-09-23 09:22:00\', 0, null, null, 0, 0, 0, 0, 0, null, null, null, null, null)');



                DB::insert('INSERT INTO sys_items (name, unit, sales_price, inventory, weight, width, length, height, sku, upc, ean, mpn, isbn, sid, supplier, bid, brand, sell_account, purchase_account, inventory_account, taxable, location, item_number, description, type, track_inventroy, negative_stock, available, status, added, last_sold, e, sorder, gid, category_id, supplier_id, gname, product_id, size, start_date, end_date, expire_date, expire_days, image, flag, is_service, commission_percent, commission_percent_type, commission_fixed, trash, payterm, cost_price, unit_price, promo_price, setup, onetime, monthly, monthlysetup, quarterly, quarterlysetup, halfyearly, halfyearlysetup, annually, annuallysetup, biennially, bienniallysetup, triennially, trienniallysetup, has_domain, free_domain, email_rel, tags, sold_count, total_amount, created_at, updated_at) VALUES (\'T-Shirt with AmarBiz Logo\', \'\', 150.00, -2.0000, 0.0000, 0.0000, 0.0000, 0.0000, null, null, null, null, null, 0, null, 0, null, 0, 0, 0, 0, null, \'0001\', \'\', \'Product\', \'No\', \'No\', 0, \'Active\', null, null, \'\', 0, 0, 0, 0, null, null, null, null, null, null, 0, \'_c4b43ae0870238150617433711107582.png\', 0, 0, 0.00, null, 0.00, 0, null, 110.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, null, null, 0, null, 8.0000, 155.0000, null, \'2019-10-04 18:46:13\'),
(\'Golf Hat\', \'\', 120.00, -2.0000, 0.0000, 0.0000, 0.0000, 0.0000, null, null, null, null, null, 0, null, 0, null, 0, 0, 0, 0, null, \'0002\', \'\', \'Product\', \'No\', \'No\', 0, \'Active\', null, null, \'\', 0, 0, 0, 0, null, null, null, null, null, null, 0, \'_7a0c1035255988150617492810876737.png\', 0, 0, 0.00, null, 0.00, 0, null, 70.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, null, null, 0, null, 9.0000, 108.0000, null, \'2019-10-04 18:46:13\'),
(\'Gift Card 250\', \'\', 250.00, -2.0000, 0.0000, 0.0000, 0.0000, 0.0000, null, null, null, null, null, 0, null, 0, null, 0, 0, 0, 0, null, \'0003\', \'\', \'Product\', \'No\', \'No\', 0, \'Active\', null, null, \'\', 0, 0, 0, 0, null, null, null, null, null, null, 0, \'_7ae11af2868642150642538311023612.png\', 0, 0, 0.00, null, 0.00, 0, null, 250.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, null, null, 0, null, 6.0000, 1500.0000, null, \'2019-10-04 18:46:13\')');


                //


            Tax::taxReset('ca_quebec');



                //


                break;



            case 'custom':

                $faker = Faker\Factory::create();

                $group = new ContactGroup;
                $group->gname = $gname;
                $group->save();

                $currency = new Currency;
                $currency->cname = 'USD';
                $currency->iso_code = 'USD';
                $currency->symbol = '$';
                $currency->save();


                // create companies


                $c_emails_types = ['sales','info','admin','hello','media','support','billing'];

                for ($i=0; $i < 144; $i++){

                    shuffle($c_emails_types);

                    $company = new Company;

                    $company_name = $faker->company;

                    $company_domain = strtolower($company_name);
                    $company_domain = str_replace(' ','',$company_domain);
                    $company_domain = str_replace('.','',$company_domain);
                    $company_domain = str_replace(',','',$company_domain);
                    $company_domain = str_replace('-','',$company_domain);
                    $company_domain = $company_domain.'.com';
                    $company_email = $c_emails_types[0].'@'.$company_domain;

                    $company->company_name = $faker->company;
                    $company->email = $company_email;
                    $company->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);

                    $company->url = 'http://www.'.$company_domain;

                    $company->save();


                }




                update_option('CompanyName','CloudOnex LLC.');
                update_option('nstyle','light_blue');
                update_option('currency_code','$');
                update_option('country','United States');
                update_option('country_flag_code','us');
                update_option('timezone','America/New_York');
                update_option('df','Y-m-d');
                update_option('home_currency','USD');
                update_option('momentLocale','en');
                update_option('language','en');
                update_option('caddress','CloudOnex <br>1101 Marina Villae Parkway, Suite 201<br>Alameda, California 94501<br>United State');

                update_option('graph_primary_color','2196f3');

                update_option('edition','default');

                update_option('dec_point','.');
                update_option('thousands_sep',',');

                update_option('networth_goal','350000');

                update_option('logo_default','logo_2105025689.png');
                update_option('logo_inverse','logo_inverse_7627893866.png');



                $user = User::find(1);

                $user->language = 'en';

                $user->fullname = 'Richard Williams';

                $user->img = 'storage/dev/user1.jpg';

                $user->save();

                $_SESSION['language'] = 'en';

                $companies = Company::all()->toArray();


                for ($i=0; $i < 293; $i++){

                    shuffle($companies);

                    $c = new Contact;

                    $c->account = $faker->name;
                    $c->email = $faker->email;
                    $c->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);
                    //  $c->company = $faker->company;
                    $c->company = $companies[0]['company_name'];

                    $c->cid = $companies[0]['id'];

                    $c->gid = 1;
                    $c->gname = $gname;

                    $c->address = $faker->streetAddress;
                    $c->city = $faker->city;
                    $c->state = $faker->state;
                    $c->zip = $faker->postcode;
                    $c->country = $faker->country;
                    $c->lat = $faker->latitude;
                    $c->lon  = $faker->longitude;

                    $c->save();

                }






                // create banks

                $banks = [
                    [
                        'name' => 'JPMorgan Chase & Co.'
                    ],
                    [
                        'name' => 'HSBC'
                    ],
                    [
                        'name' => 'Standard Chartered'
                    ]
                    ,
                    [
                        'name' => 'Cash'
                    ]
                    ,
                    [
                        'name' => 'City Bank'
                    ]
                ];



                foreach ($banks as $bank){

                    $account = new Account;
                    $account->account = $bank['name'];
                    $account->bank_name = $bank['name'];
                    $account->balance = _raid(5);
                    $account->save();

                    $balance = new Balance;

                    $balance->account_id = $account->id;
                    $balance->currency_id = 1;
                    $balance->balance = _raid(5);
                    $balance->save();

                }



                // Generate Transactions



                $tr_incomes = [
                    [

                        'description' => 'Sales',
                        'amount' => 5400

                    ],
                    [
                        'description' => 'Music Lessons',
                        'amount' => 1800
                    ],
                    [
                        'description' => 'Software Development',
                        'amount' => 2500
                    ],
                    [
                        'description' => 'Web Development',
                        'amount' => 1500
                    ],
                    [
                        'description' => 'Consultancy',
                        'amount' => 4000
                    ],
                    [
                        'description' => 'Interest',
                        'amount' => 700
                    ]
                ];




                $transactionMethod = TransactionMethod::all()->toArray();

                $tr_cats = TransactionCategory::all()->toArray();


                for ($i=0; $i < 723; $i++){

                    shuffle($banks);
                    shuffle($tr_incomes);
                    shuffle($transactionMethod);
                    shuffle($tr_cats);

                    $method = $transactionMethod[0]['name'];


                    if($method == 'Cash'){
                        $ref = 'Office / Store Desk';
                    }
                    elseif ($method == 'Check'){
                        $ref = 'Check Number- '._raid(4).'-'._raid(8);
                    }
                    elseif ($method == 'Credit Card'){
                        $ref = $faker->creditCardType.' - '.'****'._raid(4);
                    }
                    else{
                        $ref = 'Transaction ID- '.strtoupper(Ib_Str::random_string(17));
                    }



                    $transaction = new Transaction;
                    $transaction->account = $banks[0]['name'];
                    $transaction->description = $tr_incomes[0]['description'];
                    $transaction->amount = $tr_incomes[0]['amount'];
                    $transaction->cr = $tr_incomes[0]['amount'];
                    $transaction->date = $faker->dateTimeBetween($startDate = '-1 year', $endDate = '+3 month');

                    $transaction->type = 'Income';

                    $transaction->vid = _raid(8);

                    $transaction->ref = $ref;
                    $transaction->method = $method;

                    //

                    $transaction->cat_id = $tr_cats[0]['id'];
                    $transaction->category = $tr_cats[0]['name'];

                    //

                    $transaction->save();

                }



                // for categories chart

//                $categories = TransactionCategory::expense();
//
//                $cat_amounts = [297523,12189,3290,54782,323459,19220,2145,723,182,4198,5289,39902,2678,229,820,2678,9379,14890,3802,18903,5782,45782,27834,9492,2784,28549,3882,38290,932,56,28820,38400,922,39273,7123,81267,47200,37892,1792,3971,37293,2748,27849];
//
//                $i = 0;
//
//                foreach ($categories as $category){
//
//                    $category->total_amount = $cat_amounts[$i];
//                    $category->save();
//
//
//                    $i++;
//
//                }


                // Generate Expense


                $tr_expenses = [
                    [

                        'description' => 'Salaries',
                        'amount' => 5400

                    ],
                    [
                        'description' => 'Freight',
                        'amount' => 1800
                    ],
                    [
                        'description' => 'Travel',
                        'amount' => 2500
                    ],
                    [
                        'description' => 'Phone',
                        'amount' => 1500
                    ],
                    [
                        'description' => 'Consultancy',
                        'amount' => 4000
                    ],
                    [
                        'description' => 'Bank Fees',
                        'amount' => 700
                    ]
                ];





                for ($i=0; $i < 393; $i++){

                    shuffle($banks);
                    shuffle($tr_expenses);

                    shuffle($transactionMethod);

                    $method = $transactionMethod[0]['name'];


                    if($method == 'Cash'){
                        $ref = 'Office / Store Desk';
                    }
                    elseif ($method == 'Check'){
                        $ref = 'Check Number- '._raid(4).'-'._raid(8);
                    }
                    elseif ($method == 'Credit Card'){
                        $ref = $faker->creditCardType.' - '.'****'._raid(4);
                    }
                    else{
                        $ref = 'Transaction ID- '.strtoupper(Ib_Str::random_string(17));
                    }




                    $transaction = new Transaction;
                    $transaction->account = $banks[0]['name'];
                    $transaction->description = $tr_expenses[0]['description'];
                    $transaction->amount = $tr_expenses[0]['amount'];
                    $transaction->dr = $tr_expenses[0]['amount'];
                    $transaction->date = $faker->dateTimeBetween($startDate = '-1 year', $endDate = '+3 months');

                    $transaction->type = 'Expense';

                    $transaction->vid = _raid(8);

                    $transaction->method = $method;

                    $transaction->ref = $ref;

                    $transaction->save();

                }


                $leadStatus = LeadStatus::all()->toArray();

                $salutations = ['Mr.','Mrs.','Ms.'];


                for ($i=0; $i < 327; $i++){

                    shuffle($leadStatus);

                    shuffle($salutations);

                    shuffle($companies);

                    $lead = new Lead;

                    $lead->status = $leadStatus[0]['sname'];
                    $lead->salutation = $salutations[0];
                    $lead->first_name = $faker->firstName;
                    $lead->last_name = $faker->lastName;
                    $lead->company = $companies[0]['company_name'];
                    $lead->company_id = $companies[0]['id'];

                    $lead->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);

                    $lead->title = $faker->jobTitle;

                    $lead->email = $faker->email;

                    $lead->save();


                }



                // for categories chart


                // add a customer for the Demo


                $customer = new Contact;

                $customer_name = 'Maria Elizabeth';

                $customer_email = 'client@example.com';

                $customer->account = $customer_name;

                $customer->img = 'storage/dev/user2.png';

                $customer->password = '$1$WN..nD2.$Vo9niDl/fUf0VhheEjmHe/';

                $customer->email = $customer_email;
                $customer->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);

                $customer->company = 'The Acme Inc.';

                $customer->balance = '0.00';

                $customer->cid = 1;

                $customer->gid = 1;

                $customer->gname = $gname;

                $customer->address = '28th Floor, 1325 6th Avenue';
                $customer->city = 'New York';
                $customer->state = 'NY';
                $customer->zip = '10019';
                $customer->country = 'United States';
                $customer->lat = '40.762901';
                $customer->lon  = '-73.980733';



                $customer->save();

                $customer_id = $customer->id;

                $card_ref = $faker->creditCardType.' - '.'****'._raid(4);


                DB::insert('INSERT INTO sys_invoices (userid, account, cn, invoicenum, date, duedate, datepaid, subtotal, discount_type, discount_value, discount, credit, taxname, tax, tax2, total, taxrate, taxrate2, status, paymentmethod, notes, vtoken, ptoken, r, nd, eid, ename, vid, currency, currency_symbol, currency_prefix, currency_suffix, currency_rate, recurring, recurring_ends, last_recurring_date, source, sale_agent, last_overdue_reminder, allowed_payment_methods, billing_street, billing_city, billing_state, billing_zip, billing_country, shipping_street, shipping_city, shipping_state, shipping_zip, shipping_country, q_hide, show_quantity_as, pid, is_credit_invoice, aid, aname) VALUES ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 144.00, \'f\', 0.00, 0.00, 0.00, \'\', 0.00, 0.00, 144.00, 0.00, 0.00, \'Paid\', \'\', \'\', \'0738541991\', \'7715021517\', \'0\', \''.$today.'\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, \'\', 0, 1, 0, null), ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 2000.00, \'f\', 200.00, 200.00, 0.00, \'Sales Tax\', 300.00, 0.00, 2100.00, 15.00, 0.00, \'Unpaid\', \'\', \'\', \'4491605289\', \'9317090421\', \'0\', \''.$today.'\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, \'\', 0, 0, 0, null), ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 149.00, \'p\', 0.00, 0.00, 149.00, \'\', 0.00, 0.00, 149.00, 0.00, 0.00, \'Paid\', \'\', \'\', \'3559815740\', \'6479179633\', \'0\', \'2019-09-23\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, null, 0, 0, 0, null)');

                DB::insert('INSERT INTO sys_invoiceitems (invoiceid, userid, type, relid, itemcode, description, qty, amount, taxed, taxamount, total, duedate, paymentmethod, notes) 
VALUES (1, '.$customer_id.', \'\', 0, \'\', \'Credit\', \'1\', 144.00, 0, 0.00, 144.00, \''.$today.'\', \'\', \'\'),
  (2, '.$customer_id.', \'\', 0, \'\', \'API Integration\', \'1\', 400.00, 1, 0.00, 400.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'UI & UX Design\', \'1\', 400.00, 1, 0.00, 400.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'Project Research & Familiarization\', \'1\', 700.00, 1, 0.00, 700.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'Meeting, Preparation of Documents & Strategic Planning\', \'1\', 500.00, 1, 0.00, 500.00, \''.$today.'\', \'\', \'\'),
(3, '.$customer_id.', \'\', 0, \'\', \'Web Hosting / Yearly\', \'1\', 149.00, 0, 0.00, 149.00, \''.$today.'\', \'\', \'\')');


                DB::insert('INSERT INTO sys_transactions (account, type, sub_type, category, amount, payer, payee, payerid, payeeid, method, ref, status, description, tags, tax, date, dr, cr, bal, iid, currency, currency_symbol, currency_prefix, currency_suffix, currency_rate, base_amount, company_id, vid, aid, created_at, updated_at, updated_by, attachments, source, rid, pid, archived, trash, flag, c1, c2, c3, c4, c5) VALUES (\'Cash\', \'Income\', null, \'Uncategorized\', 144.00, \''.$customer_name.'\', \'\', '.$customer_id.', 0, \'Credit Card\', \''.$card_ref.'\', \'Cleared\', \'Invoice 1 Payment\', \'\', 0.00, \'2019-09-23\', 0.00, 144.00, 0.00, 1, 1, \'USD\', null, null, 1.0000, 0.0000, 0, '._raid(8).', 0, \'2019-09-23 15:19:56\', \'2019-09-23 09:19:56\', 0, null, null, 0, 0, 0, 0, 0, null, null, null, null, null), (\'JPMorgan Chase & Co.\', \'Income\', null, \'Uncategorized\', 149.00, \''.$customer_name.'\', \'\', '.$customer_id.', 0, \'Paypal\', \'Transaction ID- '.strtoupper(Ib_Str::random_string(17)).'\', \'Cleared\', \'Invoice 3 Payment\', \'\', 0.00, \'2019-09-23\', 0.00, 149.00, 0.00, 3, 1, \'USD\', null, null, 1.0000, 0.0000, 0, '._raid(8).', 0, \'2019-09-23 15:22:00\', \'2019-09-23 09:22:00\', 0, null, null, 0, 0, 0, 0, 0, null, null, null, null, null)');



                DB::insert('INSERT INTO sys_items (name, unit, sales_price, inventory, weight, width, length, height, sku, upc, ean, mpn, isbn, sid, supplier, bid, brand, sell_account, purchase_account, inventory_account, taxable, location, item_number, description, type, track_inventroy, negative_stock, available, status, added, last_sold, e, sorder, gid, category_id, supplier_id, gname, product_id, size, start_date, end_date, expire_date, expire_days, image, flag, is_service, commission_percent, commission_percent_type, commission_fixed, trash, payterm, cost_price, unit_price, promo_price, setup, onetime, monthly, monthlysetup, quarterly, quarterlysetup, halfyearly, halfyearlysetup, annually, annuallysetup, biennially, bienniallysetup, triennially, trienniallysetup, has_domain, free_domain, email_rel, tags, sold_count, total_amount, created_at, updated_at) VALUES (\'T-Shirt with AmarBiz Logo\', \'\', 150.00, -2.0000, 0.0000, 0.0000, 0.0000, 0.0000, null, null, null, null, null, 0, null, 0, null, 0, 0, 0, 0, null, \'0001\', \'\', \'Product\', \'No\', \'No\', 0, \'Active\', null, null, \'\', 0, 0, 0, 0, null, null, null, null, null, null, 0, \'_c4b43ae0870238150617433711107582.png\', 0, 0, 0.00, null, 0.00, 0, null, 110.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, null, null, 0, null, 8.0000, 155.0000, null, \'2019-10-04 18:46:13\'),
(\'Golf Hat\', \'\', 120.00, -2.0000, 0.0000, 0.0000, 0.0000, 0.0000, null, null, null, null, null, 0, null, 0, null, 0, 0, 0, 0, null, \'0002\', \'\', \'Product\', \'No\', \'No\', 0, \'Active\', null, null, \'\', 0, 0, 0, 0, null, null, null, null, null, null, 0, \'_7a0c1035255988150617492810876737.png\', 0, 0, 0.00, null, 0.00, 0, null, 70.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, null, null, 0, null, 9.0000, 108.0000, null, \'2019-10-04 18:46:13\'),
(\'Gift Card 250\', \'\', 250.00, -2.0000, 0.0000, 0.0000, 0.0000, 0.0000, null, null, null, null, null, 0, null, 0, null, 0, 0, 0, 0, null, \'0003\', \'\', \'Product\', \'No\', \'No\', 0, \'Active\', null, null, \'\', 0, 0, 0, 0, null, null, null, null, null, null, 0, \'_7ae11af2868642150642538311023612.png\', 0, 0, 0.00, null, 0.00, 0, null, 250.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, null, null, 0, null, 6.0000, 1500.0000, null, \'2019-10-04 18:46:13\')');


                break;


            case 'uae':

                $faker = Faker\Factory::create();

                $group = new ContactGroup;
                $group->gname = $gname;
                $group->save();

                $currency = new Currency;
                $currency->cname = 'AED';
                $currency->iso_code = 'AED';
                $currency->symbol = 'AED';
                $currency->save();


                // create companies


                $c_emails_types = ['sales','info','admin','hello','media','support','billing'];

                for ($i=0; $i < 144; $i++){

                    shuffle($c_emails_types);

                    $company = new Company;

                    $company_name = $faker->company;

                    $company_domain = strtolower($company_name);
                    $company_domain = str_replace(' ','',$company_domain);
                    $company_domain = str_replace('.','',$company_domain);
                    $company_domain = str_replace(',','',$company_domain);
                    $company_domain = str_replace('-','',$company_domain);
                    $company_domain = $company_domain.'.com';
                    $company_email = $c_emails_types[0].'@'.$company_domain;

                    $company->company_name = $faker->company;
                    $company->email = $company_email;
                    $company->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);

                    $company->url = 'http://www.'.$company_domain;

                    $company->save();


                }




                update_option('CompanyName','CloudOnex LLC.');
                update_option('nstyle','light_blue');
                update_option('currency_code','AED ');
                update_option('country','United States');
                update_option('country_flag_code','us');
                update_option('timezone','America/New_York');
                update_option('df','Y-m-d');
                update_option('home_currency','AED');
                update_option('momentLocale','en');
                update_option('language','en');
                update_option('caddress','CloudOnex <br>1101 Marina Villae Parkway, Suite 201<br>Alameda, California 94501<br>United State');

                update_option('graph_primary_color','2196f3');

                update_option('edition','default');

                update_option('dec_point','.');
                update_option('thousands_sep',',');

                update_option('networth_goal','350000');

                update_option('logo_default','logo_2105025689.png');
                update_option('logo_inverse','logo_inverse_7627893866.png');



                $user = User::find(1);

                $user->language = 'en';

                $user->fullname = 'Richard Williams';

                $user->img = 'storage/dev/user1.jpg';

                $user->save();

                $_SESSION['language'] = 'en';

                $companies = Company::all()->toArray();


                for ($i=0; $i < 293; $i++){

                    shuffle($companies);

                    $c = new Contact;

                    $c->account = $faker->name;
                    $c->email = $faker->email;
                    $c->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);
                    //  $c->company = $faker->company;
                    $c->company = $companies[0]['company_name'];

                    $c->cid = $companies[0]['id'];

                    $c->gid = 1;
                    $c->gname = $gname;

                    $c->address = $faker->streetAddress;
                    $c->city = $faker->city;
                    $c->state = $faker->state;
                    $c->zip = $faker->postcode;
                    $c->country = $faker->country;
                    $c->lat = $faker->latitude;
                    $c->lon  = $faker->longitude;

                    $c->save();

                }






                // create banks

                $banks = [
                    [
                        'name' => 'United Emirates Bank'
                    ],
                    [
                        'name' => 'Abu Dhabi Commercial Bank'
                    ],
                    [
                        'name' => 'Abu Dhabi Islamic Bank'
                    ]
                    ,
                    [
                        'name' => 'First Gulf Bank'
                    ]
                    ,
                    [
                        'name' => 'National Bank of Fujairah'
                    ]
                ];



                foreach ($banks as $bank){

                    $account = new Account;
                    $account->account = $bank['name'];
                    $account->bank_name = $bank['name'];
                    $account->balance = _raid(5);
                    $account->save();

                    $balance = new Balance;

                    $balance->account_id = $account->id;
                    $balance->currency_id = 1;
                    $balance->balance = _raid(5);
                    $balance->save();

                }



                // Generate Transactions



                $tr_incomes = [
                    [

                        'description' => 'Sales',
                        'amount' => 5400

                    ],
                    [
                        'description' => 'Music Lessons',
                        'amount' => 1800
                    ],
                    [
                        'description' => 'Software Development',
                        'amount' => 2500
                    ],
                    [
                        'description' => 'Web Development',
                        'amount' => 1500
                    ],
                    [
                        'description' => 'Consultancy',
                        'amount' => 4000
                    ],
                    [
                        'description' => 'Interest',
                        'amount' => 700
                    ]
                ];




                $transactionMethod = TransactionMethod::all()->toArray();

                $tr_cats = TransactionCategory::where('type','Income')->get()->toArray();


                for ($i=0; $i < 723; $i++){

                    shuffle($banks);
                    shuffle($tr_incomes);
                    shuffle($transactionMethod);

                    shuffle($tr_cats);

                    $method = $transactionMethod[0]['name'];


                    if($method == 'Cash'){
                        $ref = 'Office / Store Desk';
                    }
                    elseif ($method == 'Check'){
                        $ref = 'Check Number- '._raid(4).'-'._raid(8);
                    }
                    elseif ($method == 'Credit Card'){
                        $ref = $faker->creditCardType.' - '.'****'._raid(4);
                    }
                    else{
                        $ref = 'Transaction ID- '.strtoupper(Ib_Str::random_string(17));
                    }



                    $transaction = new Transaction;
                    $transaction->account = $banks[0]['name'];
                    $transaction->description = $tr_incomes[0]['description'];
                    $transaction->amount = $tr_incomes[0]['amount'];
                    $transaction->cr = $tr_incomes[0]['amount'];
                    $transaction->date = $faker->dateTimeBetween($startDate = '-1 year', $endDate = '+3 month');

                    $transaction->type = 'Income';

                    $transaction->vid = _raid(8);

                    $transaction->ref = $ref;
                    $transaction->method = $method;

                    $transaction->cat_id = $tr_cats[0]['id'];
                    $transaction->category = $tr_cats[0]['name'];

                    $transaction->save();

                }



                // for categories chart









                // Generate Expense


                $tr_expenses = [
                    [

                        'description' => 'Salaries',
                        'amount' => 5400

                    ],
                    [
                        'description' => 'Freight',
                        'amount' => 1800
                    ],
                    [
                        'description' => 'Travel',
                        'amount' => 2500
                    ],
                    [
                        'description' => 'Phone',
                        'amount' => 1500
                    ],
                    [
                        'description' => 'Consultancy',
                        'amount' => 4000
                    ],
                    [
                        'description' => 'Bank Fees',
                        'amount' => 700
                    ]
                ];




                $tr_cats = TransactionCategory::where('type','Expense')->get()->toArray();

                for ($i=0; $i < 393; $i++){

                    shuffle($banks);
                    shuffle($tr_expenses);

                    shuffle($transactionMethod);

                    shuffle($tr_cats);

                    $method = $transactionMethod[0]['name'];


                    if($method == 'Cash'){
                        $ref = 'Office / Store Desk';
                    }
                    elseif ($method == 'Check'){
                        $ref = 'Check Number- '._raid(4).'-'._raid(8);
                    }
                    elseif ($method == 'Credit Card'){
                        $ref = $faker->creditCardType.' - '.'****'._raid(4);
                    }
                    else{
                        $ref = 'Transaction ID- '.strtoupper(Ib_Str::random_string(17));
                    }




                    $transaction = new Transaction;
                    $transaction->account = $banks[0]['name'];
                    $transaction->description = $tr_expenses[0]['description'];
                    $transaction->amount = $tr_expenses[0]['amount'];
                    $transaction->dr = $tr_expenses[0]['amount'];
                    $transaction->date = $faker->dateTimeBetween($startDate = '-1 year', $endDate = '+3 months');

                    $transaction->type = 'Expense';

                    $transaction->vid = _raid(8);

                    $transaction->method = $method;

                    $transaction->ref = $ref;

                    //

                    $transaction->cat_id = $tr_cats[0]['id'];
                    $transaction->category = $tr_cats[0]['name'];

                    //

                    $transaction->save();

                }

                Transaction::rebuildCatData();

                $categories = TransactionCategory::expense();

                $cat_amounts = [297523,12189,3290,54782,323459,19220,2145,723,182,4198,5289,39902,2678,229,820,2678,9379,14890,3802,18903,5782,45782,27834,9492,2784,28549,3882,38290,932,56,28820,38400,922,39273,7123,81267,47200,37892,1792,3971,37293,2748,27849];

                $i = 0;

                foreach ($categories as $category){

                    $category->total_amount = $cat_amounts[$i];
                    $category->save();


                    $i++;

                }


                $leadStatus = LeadStatus::all()->toArray();

                $salutations = ['Mr.','Mrs.','Ms.'];


                for ($i=0; $i < 327; $i++){

                    shuffle($leadStatus);

                    shuffle($salutations);

                    shuffle($companies);

                    $lead = new Lead;

                    $lead->status = $leadStatus[0]['sname'];
                    $lead->salutation = $salutations[0];
                    $lead->first_name = $faker->firstName;
                    $lead->last_name = $faker->lastName;
                    $lead->company = $companies[0]['company_name'];
                    $lead->company_id = $companies[0]['id'];

                    $lead->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);

                    $lead->title = $faker->jobTitle;

                    $lead->email = $faker->email;

                    $lead->save();


                }



                // for categories chart


                // add a customer for the Demo


                $customer = new Contact;

                $customer_name = 'Maria Elizabeth';

                $customer_email = 'client@example.com';

                $customer->account = $customer_name;

                $customer->img = 'storage/dev/user2.png';

                $customer->password = '$1$WN..nD2.$Vo9niDl/fUf0VhheEjmHe/';

                $customer->email = $customer_email;
                $customer->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);

                $customer->company = 'The Acme Inc.';

                $customer->balance = '0.00';

                $customer->cid = 1;

                $customer->gid = 1;

                $customer->gname = $gname;

                $customer->address = '28th Floor, 1325 6th Avenue';
                $customer->city = 'New York';
                $customer->state = 'NY';
                $customer->zip = '10019';
                $customer->country = 'United States';
                $customer->lat = '40.762901';
                $customer->lon  = '-73.980733';



                $customer->save();

                $customer_id = $customer->id;

                $card_ref = $faker->creditCardType.' - '.'****'._raid(4);


                DB::insert('INSERT INTO sys_invoices (userid, account, cn, invoicenum, date, duedate, datepaid, subtotal, discount_type, discount_value, discount, credit, taxname, tax, tax2, total, taxrate, taxrate2, status, paymentmethod, notes, vtoken, ptoken, r, nd, eid, ename, vid, currency, currency_symbol, currency_prefix, currency_suffix, currency_rate, recurring, recurring_ends, last_recurring_date, source, sale_agent, last_overdue_reminder, allowed_payment_methods, billing_street, billing_city, billing_state, billing_zip, billing_country, shipping_street, shipping_city, shipping_state, shipping_zip, shipping_country, q_hide, show_quantity_as, pid, is_credit_invoice, aid, aname) VALUES ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 144.00, \'f\', 0.00, 0.00, 0.00, \'\', 0.00, 0.00, 144.00, 0.00, 0.00, \'Paid\', \'\', \'\', \'0738541991\', \'7715021517\', \'0\', \''.$today.'\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, \'\', 0, 1, 0, null), ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 2000.00, \'f\', 200.00, 200.00, 0.00, \'Sales Tax\', 300.00, 0.00, 2100.00, 15.00, 0.00, \'Unpaid\', \'\', \'\', \'4491605289\', \'9317090421\', \'0\', \''.$today.'\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, \'\', 0, 0, 0, null), ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 149.00, \'p\', 0.00, 0.00, 149.00, \'\', 0.00, 0.00, 149.00, 0.00, 0.00, \'Paid\', \'\', \'\', \'3559815740\', \'6479179633\', \'0\', \'2019-09-23\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, null, 0, 0, 0, null)');

                DB::insert('INSERT INTO sys_invoiceitems (invoiceid, userid, type, relid, itemcode, description, qty, amount, taxed, taxamount, total, duedate, paymentmethod, notes) 
VALUES (1, '.$customer_id.', \'\', 0, \'\', \'Credit\', \'1\', 144.00, 0, 0.00, 144.00, \''.$today.'\', \'\', \'\'),
  (2, '.$customer_id.', \'\', 0, \'\', \'API Integration\', \'1\', 400.00, 1, 0.00, 400.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'UI & UX Design\', \'1\', 400.00, 1, 0.00, 400.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'Project Research & Familiarization\', \'1\', 700.00, 1, 0.00, 700.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'Meeting, Preparation of Documents & Strategic Planning\', \'1\', 500.00, 1, 0.00, 500.00, \''.$today.'\', \'\', \'\'),
(3, '.$customer_id.', \'\', 0, \'\', \'Web Hosting / Yearly\', \'1\', 149.00, 0, 0.00, 149.00, \''.$today.'\', \'\', \'\')');


                DB::insert('INSERT INTO sys_transactions (account, type, sub_type, category, amount, payer, payee, payerid, payeeid, method, ref, status, description, tags, tax, date, dr, cr, bal, iid, currency, currency_symbol, currency_prefix, currency_suffix, currency_rate, base_amount, company_id, vid, aid, created_at, updated_at, updated_by, attachments, source, rid, pid, archived, trash, flag, c1, c2, c3, c4, c5) VALUES (\'Cash\', \'Income\', null, \'Uncategorized\', 144.00, \''.$customer_name.'\', \'\', '.$customer_id.', 0, \'Credit Card\', \''.$card_ref.'\', \'Cleared\', \'Invoice 1 Payment\', \'\', 0.00, \'2019-09-23\', 0.00, 144.00, 0.00, 1, 1, \'USD\', null, null, 1.0000, 0.0000, 0, '._raid(8).', 0, \'2019-09-23 15:19:56\', \'2019-09-23 09:19:56\', 0, null, null, 0, 0, 0, 0, 0, null, null, null, null, null), (\'JPMorgan Chase & Co.\', \'Income\', null, \'Uncategorized\', 149.00, \''.$customer_name.'\', \'\', '.$customer_id.', 0, \'Paypal\', \'Transaction ID- '.strtoupper(Ib_Str::random_string(17)).'\', \'Cleared\', \'Invoice 3 Payment\', \'\', 0.00, \'2019-09-23\', 0.00, 149.00, 0.00, 3, 1, \'USD\', null, null, 1.0000, 0.0000, 0, '._raid(8).', 0, \'2019-09-23 15:22:00\', \'2019-09-23 09:22:00\', 0, null, null, 0, 0, 0, 0, 0, null, null, null, null, null)');



                DB::insert('INSERT INTO sys_items (name, unit, sales_price, inventory, weight, width, length, height, sku, upc, ean, mpn, isbn, sid, supplier, bid, brand, sell_account, purchase_account, inventory_account, taxable, location, item_number, description, type, track_inventroy, negative_stock, available, status, added, last_sold, e, sorder, gid, category_id, supplier_id, gname, product_id, size, start_date, end_date, expire_date, expire_days, image, flag, is_service, commission_percent, commission_percent_type, commission_fixed, trash, payterm, cost_price, unit_price, promo_price, setup, onetime, monthly, monthlysetup, quarterly, quarterlysetup, halfyearly, halfyearlysetup, annually, annuallysetup, biennially, bienniallysetup, triennially, trienniallysetup, has_domain, free_domain, email_rel, tags, sold_count, total_amount, created_at, updated_at) VALUES (\'T-Shirt with AmarBiz Logo\', \'\', 150.00, -2.0000, 0.0000, 0.0000, 0.0000, 0.0000, null, null, null, null, null, 0, null, 0, null, 0, 0, 0, 0, null, \'0001\', \'\', \'Product\', \'No\', \'No\', 0, \'Active\', null, null, \'\', 0, 0, 0, 0, null, null, null, null, null, null, 0, \'_c4b43ae0870238150617433711107582.png\', 0, 0, 0.00, null, 0.00, 0, null, 110.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, null, null, 0, null, 8.0000, 155.0000, null, \'2019-10-04 18:46:13\'),
(\'Golf Hat\', \'\', 120.00, -2.0000, 0.0000, 0.0000, 0.0000, 0.0000, null, null, null, null, null, 0, null, 0, null, 0, 0, 0, 0, null, \'0002\', \'\', \'Product\', \'No\', \'No\', 0, \'Active\', null, null, \'\', 0, 0, 0, 0, null, null, null, null, null, null, 0, \'_7a0c1035255988150617492810876737.png\', 0, 0, 0.00, null, 0.00, 0, null, 70.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, null, null, 0, null, 9.0000, 108.0000, null, \'2019-10-04 18:46:13\'),
(\'Gift Card 250\', \'\', 250.00, -2.0000, 0.0000, 0.0000, 0.0000, 0.0000, null, null, null, null, null, 0, null, 0, null, 0, 0, 0, 0, null, \'0003\', \'\', \'Product\', \'No\', \'No\', 0, \'Active\', null, null, \'\', 0, 0, 0, 0, null, null, null, null, null, null, 0, \'_7ae11af2868642150642538311023612.png\', 0, 0, 0.00, null, 0.00, 0, null, 250.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, null, null, 0, null, 6.0000, 1500.0000, null, \'2019-10-04 18:46:13\')');

                break;


            default:

                $faker = Faker\Factory::create();

                $group = new ContactGroup;
                $group->gname = $gname;
                $group->save();

                $currency = new Currency;
                $currency->cname = 'USD';
                $currency->iso_code = 'USD';
                $currency->symbol = '$';
                $currency->save();


                // create companies


                $c_emails_types = ['sales','info','admin','hello','media','support','billing'];

                for ($i=0; $i < 144; $i++){

                    shuffle($c_emails_types);

                    $company = new Company;

                    $company_name = $faker->company;

                    $company_domain = strtolower($company_name);
                    $company_domain = str_replace(' ','',$company_domain);
                    $company_domain = str_replace('.','',$company_domain);
                    $company_domain = str_replace(',','',$company_domain);
                    $company_domain = str_replace('-','',$company_domain);
                    $company_domain = $company_domain.'.com';
                    $company_email = $c_emails_types[0].'@'.$company_domain;

                    $company->company_name = $faker->company;
                    $company->email = $company_email;
                    $company->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);

                    $company->url = 'http://www.'.$company_domain;

                    $company->save();


                }




                update_option('CompanyName','CloudOnex LLC.');
                update_option('nstyle','indigo_blue');
                update_option('currency_code','$');
                update_option('country','United States');
                update_option('country_flag_code','us');
                update_option('timezone','America/New_York');
                update_option('df','Y-m-d');
                update_option('home_currency','USD');
                update_option('momentLocale','en');
                update_option('language','en');
                update_option('caddress','CloudOnex <br>1101 Marina Villae Parkway, Suite 201<br>Alameda, California 94501<br>United State');

                update_option('graph_primary_color','002868');

                update_option('edition','default');

                update_option('dec_point','.');
                update_option('thousands_sep',',');

                update_option('networth_goal','350000');

                update_option('logo_default','logo_2105025689.png');
                update_option('logo_inverse','logo_inverse_7627893866.png');



                $user = User::find(1);

                $user->language = 'en';

                $user->fullname = 'Richard Williams';

                $user->img = 'storage/dev/user1.jpg';

                $user->save();

                $_SESSION['language'] = 'en';

                $companies = Company::all()->toArray();


                for ($i=0; $i < 293; $i++){

                    shuffle($companies);

                    $c = new Contact;

                    $c->account = $faker->name;
                    $c->email = $faker->email;
                    $c->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);
                  //  $c->company = $faker->company;
                    $c->company = $companies[0]['company_name'];

                    $c->cid = $companies[0]['id'];

                    $c->gid = 1;
                    $c->gname = $gname;

                    $c->address = $faker->streetAddress;
                    $c->city = $faker->city;
                    $c->state = $faker->state;
                    $c->zip = $faker->postcode;
                    $c->country = $faker->country;
                    $c->lat = $faker->latitude;
                    $c->lon  = $faker->longitude;

                    $c->save();

                }






                // create banks

                $banks = [
                    [
                        'name' => 'JPMorgan Chase & Co.'
                    ],
                    [
                        'name' => 'HSBC'
                    ],
                    [
                        'name' => 'Standard Chartered'
                    ]
                    ,
                    [
                        'name' => 'Cash'
                    ]
                    ,
                    [
                        'name' => 'City Bank'
                    ]
                ];



                foreach ($banks as $bank){

                    $account = new Account;
                    $account->account = $bank['name'];
                    $account->bank_name = $bank['name'];
                    $account->balance = _raid(5);
                    $account->save();

                    $balance = new Balance;

                    $balance->account_id = $account->id;
                    $balance->currency_id = 1;
                    $balance->balance = _raid(5);
                    $balance->save();

                }



                // Generate Transactions



                $tr_incomes = [
                    [

                        'description' => 'Sales',
                        'amount' => 5400

                    ],
                    [
                        'description' => 'Music Lessons',
                        'amount' => 1800
                    ],
                    [
                        'description' => 'Software Development',
                        'amount' => 2500
                    ],
                    [
                        'description' => 'Web Development',
                        'amount' => 1500
                    ],
                    [
                        'description' => 'Consultancy',
                        'amount' => 4000
                    ],
                    [
                        'description' => 'Interest',
                        'amount' => 700
                    ]
                ];




                $transactionMethod = TransactionMethod::all()->toArray();

                $tr_cats = TransactionCategory::where('type','Income')->get()->toArray();


                for ($i=0; $i < 723; $i++){

                    shuffle($banks);
                    shuffle($tr_incomes);
                    shuffle($transactionMethod);

                    shuffle($tr_cats);

                    $method = $transactionMethod[0]['name'];


                    if($method == 'Cash'){
                        $ref = 'Office / Store Desk';
                    }
                    elseif ($method == 'Check'){
                        $ref = 'Check Number- '._raid(4).'-'._raid(8);
                    }
                    elseif ($method == 'Credit Card'){
                        $ref = $faker->creditCardType.' - '.'****'._raid(4);
                    }
                    else{
                        $ref = 'Transaction ID- '.strtoupper(Ib_Str::random_string(17));
                    }



                    $transaction = new Transaction;
                    $transaction->account = $banks[0]['name'];
                    $transaction->description = $tr_incomes[0]['description'];
                    $transaction->amount = $tr_incomes[0]['amount'];
                    $transaction->cr = $tr_incomes[0]['amount'];
                    $transaction->date = $faker->dateTimeBetween($startDate = '-1 year', $endDate = '+3 month');

                    $transaction->type = 'Income';

                    $transaction->vid = _raid(8);

                    $transaction->ref = $ref;
                    $transaction->method = $method;

                    $transaction->cat_id = $tr_cats[0]['id'];
                    $transaction->category = $tr_cats[0]['name'];

                    $transaction->save();

                }



                // for categories chart









                // Generate Expense


                $tr_expenses = [
                    [

                        'description' => 'Salaries',
                        'amount' => 5400

                    ],
                    [
                        'description' => 'Freight',
                        'amount' => 1800
                    ],
                    [
                        'description' => 'Travel',
                        'amount' => 2500
                    ],
                    [
                        'description' => 'Phone',
                        'amount' => 1500
                    ],
                    [
                        'description' => 'Consultancy',
                        'amount' => 4000
                    ],
                    [
                        'description' => 'Bank Fees',
                        'amount' => 700
                    ]
                ];




                $tr_cats = TransactionCategory::where('type','Expense')->get()->toArray();

                for ($i=0; $i < 393; $i++){

                    shuffle($banks);
                    shuffle($tr_expenses);

                    shuffle($transactionMethod);

                    shuffle($tr_cats);

                    $method = $transactionMethod[0]['name'];


                    if($method == 'Cash'){
                        $ref = 'Office / Store Desk';
                    }
                    elseif ($method == 'Check'){
                        $ref = 'Check Number- '._raid(4).'-'._raid(8);
                    }
                    elseif ($method == 'Credit Card'){
                        $ref = $faker->creditCardType.' - '.'****'._raid(4);
                    }
                    else{
                        $ref = 'Transaction ID- '.strtoupper(Ib_Str::random_string(17));
                    }




                    $transaction = new Transaction;
                    $transaction->account = $banks[0]['name'];
                    $transaction->description = $tr_expenses[0]['description'];
                    $transaction->amount = $tr_expenses[0]['amount'];
                    $transaction->dr = $tr_expenses[0]['amount'];
                    $transaction->date = $faker->dateTimeBetween($startDate = '-1 year', $endDate = '+3 months');

                    $transaction->type = 'Expense';

                    $transaction->vid = _raid(8);

                    $transaction->method = $method;

                    $transaction->ref = $ref;

                    //

                    $transaction->cat_id = $tr_cats[0]['id'];
                    $transaction->category = $tr_cats[0]['name'];

                    //

                    $transaction->save();

                }

                Transaction::rebuildCatData();

                $categories = TransactionCategory::expense();

                $cat_amounts = [297523,12189,3290,54782,323459,19220,2145,723,182,4198,5289,39902,2678,229,820,2678,9379,14890,3802,18903,5782,45782,27834,9492,2784,28549,3882,38290,932,56,28820,38400,922,39273,7123,81267,47200,37892,1792,3971,37293,2748,27849];

                $i = 0;

                foreach ($categories as $category){

                    $category->total_amount = $cat_amounts[$i];
                    $category->save();


                    $i++;

                }


                $leadStatus = LeadStatus::all()->toArray();

                $salutations = ['Mr.','Mrs.','Ms.'];


                for ($i=0; $i < 327; $i++){

                    shuffle($leadStatus);

                    shuffle($salutations);

                    shuffle($companies);

                    $lead = new Lead;

                    $lead->status = $leadStatus[0]['sname'];
                    $lead->salutation = $salutations[0];
                    $lead->first_name = $faker->firstName;
                    $lead->last_name = $faker->lastName;
                    $lead->company = $companies[0]['company_name'];
                    $lead->company_id = $companies[0]['id'];

                    $lead->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);

                    $lead->title = $faker->jobTitle;

                    $lead->email = $faker->email;

                    $lead->save();


                }



                // for categories chart


                // add a customer for the Demo


                $customer = new Contact;

                $customer_name = 'Maria Elizabeth';

                $customer_email = 'client@example.com';

                $customer->account = $customer_name;

                $customer->img = 'storage/dev/user2.png';

                $customer->password = '$1$WN..nD2.$Vo9niDl/fUf0VhheEjmHe/';

                $customer->email = $customer_email;
                $customer->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);

                $customer->company = 'The Acme Inc.';

                $customer->balance = '0.00';

                $customer->cid = 1;

                $customer->gid = 1;

                $customer->gname = $gname;

                $customer->address = '28th Floor, 1325 6th Avenue';
                $customer->city = 'New York';
                $customer->state = 'NY';
                $customer->zip = '10019';
                $customer->country = 'United States';
                $customer->lat = '40.762901';
                $customer->lon  = '-73.980733';

	            $customer->autologin = 'za7poz6nxm84kujxj8ro2941551306314';

                $customer->save();

                $customer_id = $customer->id;

                $card_ref = $faker->creditCardType.' - '.'****'._raid(4);


                DB::insert('INSERT INTO sys_invoices (userid, account, cn, invoicenum, date, duedate, datepaid, subtotal, discount_type, discount_value, discount, credit, taxname, tax, tax2, total, taxrate, taxrate2, status, paymentmethod, notes, vtoken, ptoken, r, nd, eid, ename, vid, currency, currency_symbol, currency_prefix, currency_suffix, currency_rate, recurring, recurring_ends, last_recurring_date, source, sale_agent, last_overdue_reminder, allowed_payment_methods, billing_street, billing_city, billing_state, billing_zip, billing_country, shipping_street, shipping_city, shipping_state, shipping_zip, shipping_country, q_hide, show_quantity_as, pid, is_credit_invoice, aid, aname) VALUES ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 144.00, \'f\', 0.00, 0.00, 0.00, \'\', 0.00, 0.00, 144.00, 0.00, 0.00, \'Paid\', \'\', \'\', \'0738541991\', \'7715021517\', \'0\', \''.$today.'\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, \'\', 0, 1, 0, null), ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 2000.00, \'f\', 200.00, 200.00, 0.00, \'Sales Tax\', 300.00, 0.00, 2100.00, 15.00, 0.00, \'Unpaid\', \'\', \'\', \'4491605289\', \'9317090421\', \'0\', \''.$today.'\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, \'\', 0, 0, 0, null), ('.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 149.00, \'p\', 0.00, 0.00, 149.00, \'\', 0.00, 0.00, 149.00, 0.00, 0.00, \'Paid\', \'\', \'\', \'3559815740\', \'6479179633\', \'0\', \'2019-09-23\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, null, 0, 0, 0, null)');

                DB::insert('INSERT INTO sys_invoiceitems (invoiceid, userid, type, relid, itemcode, description, qty, amount, taxed, taxamount, total, duedate, paymentmethod, notes) 
VALUES (1, '.$customer_id.', \'\', 0, \'\', \'Credit\', \'1\', 144.00, 0, 0.00, 144.00, \''.$today.'\', \'\', \'\'),
  (2, '.$customer_id.', \'\', 0, \'\', \'API Integration\', \'1\', 400.00, 1, 0.00, 400.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'UI & UX Design\', \'1\', 400.00, 1, 0.00, 400.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'Project Research & Familiarization\', \'1\', 700.00, 1, 0.00, 700.00, \''.$today.'\', \'\', \'\'),
(2, '.$customer_id.', \'\', 0, \'\', \'Meeting, Preparation of Documents & Strategic Planning\', \'1\', 500.00, 1, 0.00, 500.00, \''.$today.'\', \'\', \'\'),
(3, '.$customer_id.', \'\', 0, \'\', \'Web Hosting / Yearly\', \'1\', 149.00, 0, 0.00, 149.00, \''.$today.'\', \'\', \'\')');


                DB::insert('INSERT INTO sys_transactions (account, type, sub_type, category, amount, payer, payee, payerid, payeeid, method, ref, status, description, tags, tax, date, dr, cr, bal, iid, currency, currency_symbol, currency_prefix, currency_suffix, currency_rate, base_amount, company_id, vid, aid, created_at, updated_at, updated_by, attachments, source, rid, pid, archived, trash, flag, c1, c2, c3, c4, c5) VALUES (\'Cash\', \'Income\', null, \'Uncategorized\', 144.00, \''.$customer_name.'\', \'\', '.$customer_id.', 0, \'Credit Card\', \''.$card_ref.'\', \'Cleared\', \'Invoice 1 Payment\', \'\', 0.00, \'2019-09-23\', 0.00, 144.00, 0.00, 1, 1, \'USD\', null, null, 1.0000, 0.0000, 0, '._raid(8).', 0, \'2019-09-23 15:19:56\', \'2019-09-23 09:19:56\', 0, null, null, 0, 0, 0, 0, 0, null, null, null, null, null), (\'JPMorgan Chase & Co.\', \'Income\', null, \'Uncategorized\', 149.00, \''.$customer_name.'\', \'\', '.$customer_id.', 0, \'Paypal\', \'Transaction ID- '.strtoupper(Ib_Str::random_string(17)).'\', \'Cleared\', \'Invoice 3 Payment\', \'\', 0.00, \'2019-09-23\', 0.00, 149.00, 0.00, 3, 1, \'USD\', null, null, 1.0000, 0.0000, 0, '._raid(8).', 0, \'2019-09-23 15:22:00\', \'2019-09-23 09:22:00\', 0, null, null, 0, 0, 0, 0, 0, null, null, null, null, null)');



                DB::insert('INSERT INTO sys_items (name, unit, sales_price, inventory, weight, width, length, height, sku, upc, ean, mpn, isbn, sid, supplier, bid, brand, sell_account, purchase_account, inventory_account, taxable, location, item_number, description, type, track_inventroy, negative_stock, available, status, added, last_sold, e, sorder, gid, category_id, supplier_id, gname, product_id, size, start_date, end_date, expire_date, expire_days, image, flag, is_service, commission_percent, commission_percent_type, commission_fixed, trash, payterm, cost_price, unit_price, promo_price, setup, onetime, monthly, monthlysetup, quarterly, quarterlysetup, halfyearly, halfyearlysetup, annually, annuallysetup, biennially, bienniallysetup, triennially, trienniallysetup, has_domain, free_domain, email_rel, tags, sold_count, total_amount, created_at, updated_at) VALUES (\'Marvel T-shirt\', \'\', 150.00, -2.0000, 0.0000, 0.0000, 0.0000, 0.0000, null, null, null, null, null, 0, null, 0, null, 0, 0, 0, 0, null, \'0001\', \'\', \'Product\', \'No\', \'No\', 0, \'Active\', null, null, \'\', 0, 0, 0, 0, null, null, null, null, null, null, 0, \'_c4b43ae0870238150617433711107582.png\', 0, 0, 0.00, null, 0.00, 0, null, 110.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, null, null, 0, null, 8.0000, 155.0000, null, \'2019-10-04 18:46:13\'),
(\'Golf Hat\', \'\', 120.00, -2.0000, 0.0000, 0.0000, 0.0000, 0.0000, null, null, null, null, null, 0, null, 0, null, 0, 0, 0, 0, null, \'0002\', \'\', \'Product\', \'No\', \'No\', 0, \'Active\', null, null, \'\', 0, 0, 0, 0, null, null, null, null, null, null, 0, \'_7a0c1035255988150617492810876737.png\', 0, 0, 0.00, null, 0.00, 0, null, 70.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, null, null, 0, null, 9.0000, 108.0000, null, \'2019-10-04 18:46:13\'),
(\'Gift Card 250\', \'\', 250.00, -2.0000, 0.0000, 0.0000, 0.0000, 0.0000, null, null, null, null, null, 0, null, 0, null, 0, 0, 0, 0, null, \'0003\', \'\', \'Product\', \'No\', \'No\', 0, \'Active\', null, null, \'\', 0, 0, 0, 0, null, null, null, null, null, null, 0, \'_7ae11af2868642150642538311023612.png\', 0, 0, 0.00, null, 0.00, 0, null, 250.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, null, null, 0, null, 6.0000, 1500.0000, null, \'2019-10-04 18:46:13\')');


                ORM::execute('INSERT INTO `sys_quotes` (`subject`, `stage`, `validuntil`, `userid`, `invoicenum`, `cn`, `account`, `firstname`, `lastname`, `companyname`, `email`, `address1`, `address2`, `city`, `state`, `postcode`, `country`, `phonenumber`, `currency`, `subtotal`, `discount_type`, `discount_value`, `discount`, `taxname`, `taxrate`, `tax1`, `tax2`, `total`, `proposal`, `customernotes`, `adminnotes`, `datecreated`, `lastmodified`, `datesent`, `dateaccepted`, `vtoken`, `code`) VALUES
(\'Develop a new website for The Acme Inc.\', \'Draft\', \'2019-03-27\', 294, \'QUOTE-\', \'00001\', \'Maria Elizabeth\', \'\', \'\', \'\', \'\', \'\', \'\', \'\', \'\', \'\', \'\', \'\', 1, \'2800.00\', \'p\', \'0.00\', \'0.00\', \'\', \'0.00\', \'0.00\', \'0.00\', \'2800.00\', \'<p><strong>Project Background</strong></p><p>The Acme Inc, Newyork seeks a redesign of the existing website, www.example.com. The existing site\r\n</p><p>was built in 2019; and while it has served the company well, technology and expectations have change to enable the company to\r\n</p><p>build a better site to serve the customers.\r\n</p><p><strong>Requirements Gathering and Documentation</strong><strong></strong><br>\r\n</p><p>In this phase of the web design project we gather the project requirements and detail stakeholder needs to develop\r\n</p><p>formal solutions and document all of the company goals. It’s this research and discussion that help the project\r\n</p><p>process go smoothly and insure that we have all the requirements, needs and “wish list” items identified.\r\n</p>\', \'<p><strong>Why choose CloudOnex ?</strong>\r\n</p><p>CloudOnex has several competitive advantages that make our firm an ideal fit for the Acme Inc.<br>\r\n</p><p>1. We have creative ideas that will stand out and stick with your audience — CloudOnex has a unique understanding of logic fueled by intuitive creative thinking. Our perspective allows us to create ideas that resonate with your audience to make a lasting impact with your message.\r\n</p><p>2. You want design that communicates, not just pretty pictures — Our mission is to create materials that influence your\r\n</p><p>audience and further your goals, not just decorate a page. We use our understanding of strategic messaging and create\r\n</p><p>a synergy with the content and graphics to communication your message on multiple levels. The result is more than a\r\n</p><p>good-looking website. It’s an effective one.\r\n</p><p>3. You need flawless timely execution that produces results — Our experience in project management ensures that we\r\n</p><p>quickly grasp the issues, sweat the details and produce a website that exceeds your expectations and instills delight in\r\n</p><p>your users.\r\n</p>\', \'\', \'2019-02-27\', \'2019-02-27\', \'2019-02-27\', \'2019-02-27\', \'0434875755\', NULL)');

                ORM::execute('INSERT INTO `sys_quoteitems` (`qid`, `itemcode`, `description`, `qty`, `amount`, `discount`, `total`, `taxable`) VALUES
( 1, \'\', \' Strategy & Concept Development\', \'1\', \'800.00\', \'0.00\', \'800.00\', 0),
( 1, \'\', \'Web Site Design & Development\', \'1\', \'1200.00\', \'0.00\', \'1200.00\', 0),
( 1, \'\', \'Production Management & Implementation\', \'1\', \'800.00\', \'0.00\', \'800.00\', 0)');

                break;





        }



        // kb

	    ORM::execute('INSERT INTO `ib_kb` (`gid`, `gname`, `status`, `type`, `groups`, `title`, `slug`, `description`, `created_by`, `created_at`, `updated_by`, `updated_at`, `views`, `is_public`, `sorder`) VALUES
(NULL, NULL, \'Published\', NULL, NULL, \'What is CloudOnex Business Suite?\', \'what-is-cloudonex-business-suite\', \'CloudOnex business suite is a set of business software functions enabling the core business processes inside and beyond the boundaries of an organization. It comes with Billing, CRM, Accounting, Customer support everything is in one integrated system. It&rsquo;s extremely flexible &amp; modular. You can even create custom plugins, integrate with your existing system using the API. If you purchase open source edition, you are also permitted to edit the codes and add functionalities for your company.&nbsp;\', 1, \'2019-03-02 04:16:15\', NULL, \'2019-03-02 04:16:15\', 0, 1, NULL),
(NULL, NULL, \'Published\', NULL, NULL, \'How do I change Language ?\', \'how-do-i-change-language-\', \'To change language, Go to Your Profile &rarr; Edit Profile &amp; set your preferred language. You can also change the system language from Settings &rarr; Localization. Please note that some language is not translated. If you want to contribute with the translation, you can contact with us. If you improve the translation file, you can send us the translation file to us, so that we can include this on next update.\', 1, \'2019-03-02 04:16:45\', NULL, \'2019-03-02 04:16:45\', 0, 1, NULL)');

        ORM::execute('INSERT INTO `ib_kb_groups` (`gname`, `description`, `status`, `color`, `pid`, `sorder`, `created_at`, `updated_at`) VALUES
(\'General\', NULL, NULL, NULL, NULL, NULL, NULL, NULL)');

        ORM::execute('INSERT INTO `ib_kb_rel` (`kbid`, `gid`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL)');


        ORM::execute('INSERT INTO `sys_ticketdepartments` (`dname`, `description`, `email`, `hidden`, `delete_after_import`, `host`, `port`, `username`, `password`, `encryption`, `calendar_id`, `sorder`, `created_at`, `updated_at`)
VALUES
	(\'Sales\',NULL,\'\',0,0,\'\',\'\',\'\',\'\',\'no\',NULL,1,NULL,NULL),
	(\'Support\',NULL,\'\',0,0,\'\',\'\',\'\',\'\',\'no\',NULL,1,NULL,NULL),
	(\'Billing\',NULL,\'\',0,0,\'\',\'\',\'\',\'\',\'no\',NULL,1,NULL,NULL)');

        ORM::execute('INSERT INTO `sys_orders` (`ordernum`, `source`, `status`, `sales_person`, `branch_name`, `cname`, `cid`, `contract_id`, `bid`, `date_added`, `date_expiry`, `pid`, `stitle`, `sid`, `iid`, `aid`, `amount`, `recurring`, `setup_fee`, `billing_cycle`, `addon_ids`, `related_orders`, `description`, `upgrade_ids`, `xdata`, `xsecret`, `promo_code`, `promo_type`, `promo_value`, `payment_method`, `ipaddress`, `fraud_module`, `fraud_output`, `activation_subject`, `activation_message`, `trash`, `archived`, `c1`, `c2`, `c3`, `c4`, `c5`) VALUES
(\'2078952654\', NULL, \'Active\', NULL, NULL, \'Maria Elizabeth\', 294, NULL, NULL, \'2019-03-02\', NULL, 1, \'Marvel T-shirt\', NULL, 4, NULL, \'100.00\', \'0.00\', \'0.00\', \'One Time\', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, \'Test \', \'Test message\', 0, 0, NULL, NULL, NULL, NULL, NULL);
');

        ORM::execute('INSERT INTO `sys_invoices` (`userid`, `account`, `title`, `cn`, `invoicenum`, `date`, `duedate`, `datepaid`, `subtotal`, `discount_type`, `discount_value`, `discount`, `credit`, `taxname`, `tax`, `tax2`, `tax_total`, `total`, `taxrate`, `taxrate2`, `status`, `paymentmethod`, `notes`, `vtoken`, `ptoken`, `r`, `nd`, `eid`, `ename`, `vid`, `quote_id`, `ticket_id`, `currency`, `currency_iso_code`, `currency_symbol`, `currency_prefix`, `currency_suffix`, `currency_rate`, `recurring`, `recurring_ends`, `last_recurring_date`, `source`, `sale_agent`, `last_overdue_reminder`, `allowed_payment_methods`, `billing_street`, `billing_city`, `billing_state`, `billing_zip`, `billing_country`, `shipping_street`, `shipping_city`, `shipping_state`, `shipping_zip`, `shipping_country`, `q_hide`, `show_quantity_as`, `pid`, `is_credit_invoice`, `aid`, `aname`, `receipt_number`, `updated_at`, `created_at`, `workspace_id`, `parent_id`, `c1`, `c2`, `c3`, `c4`, `c5`, `signature_data_source`, `signature_data_base64`, `signature_data_svg`, `is_same_state`, `matter_id`, `code`) VALUES
( 294, \'Maria Elizabeth\', NULL, \'\', \'\', \'2019-03-02\', \'2019-03-02\', \'2019-03-02 05:35:20\', \'100.00\', \'f\', \'0.00\', \'0.00\', \'0.00\', \'\', \'0.00\', \'0.00\', \'0.0000\', \'100.00\', \'0.00\', \'0.00\', \'Unpaid\', \'\', \'\', \'8867200429\', \'7237898905\', \'0\', \'2019-03-02\', 0, \'\', 0, 0, 0, 0, NULL, \'$\', NULL, NULL, \'1.0000\', 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL);
');

        ORM::execute('INSERT INTO `sys_tickets` (`id`, `tid`, `did`, `aid`, `pid`, `sid`, `lid`, `oid`, `company_id`, `dname`, `userid`, `account`, `email`, `cc`, `bcc`, `created_at`, `updated_at`, `subject`, `message`, `status`, `urgency`, `admin`, `attachments`, `last_reply`, `flag`, `escalated`, `replying`, `is_spam`, `rating`, `client_read`, `admin_read`, `source`, `ttype`, `tstart`, `tend`, `ttotal`, `todo`, `tags`, `notes`, `c1`, `c2`, `c3`, `c4`, `c5`, `end_user_id`, `model`) VALUES
(1, \'HNM-29171301\', 2, NULL, NULL, NULL, NULL, NULL, NULL, \'Support\', 294, \'Maria Elizabeth\', \'client@example.com\', NULL, NULL, \'2019-03-02 04:44:38\', \'2019-03-02 04:44:57\', \'How do I record customer deposit for Invoice ?\', \'<span style=\"color: rgb(68, 68, 68);\">Hi,</span><br style=\"color: rgb(68, 68, 68);\"><span style=\"color: rgb(68, 68, 68);\">Can I record customer deposit for the invoice we send ?</span><br style=\"color: rgb(68, 68, 68);\"><span style=\"color: rgb(68, 68, 68);\">Thank you.</span>\', \'Closed\', \'Medium\', \'0\', \'\', \'Maria Elizabeth\', 0, NULL, NULL, 0, NULL, \'No\', \'No\', \'Web\', \'\', \'\', \'\', \'\', \'\', \'\', \'\', \'\', \'\', NULL, NULL, NULL, NULL, NULL);
');

        ORM::execute('INSERT INTO `sys_ticketreplies` (`id`, `tid`, `userid`, `account`, `reply_type`, `email`, `created_at`, `updated_at`, `message`, `replied_by`, `admin`, `attachments`, `client_read`, `admin_read`, `rating`) VALUES
(1, 1, 294, \'Richard Williams\', \'public\', \'\', \'2019-03-02 04:44:57\', \'2019-03-02 04:44:57\', \'Go to Invoice view page, click on the Add Payment button, Choose your Bank Account. It will automatically add Transaction with relation to invoice and your bank account. Your account balance will be also reflected.\', \'Richard Williams\', \'1\', \'\', \'\', \'\', NULL);
');

        // after demo ready


        if(APP_URL == 'http://demo.stackpi.com'){
            update_option('license_key','8F62-52BC-971C-6211-9B6A-FD03-EC51-9D42');
        }



        if(APP_URL == 'http://demo.cloudonex.com'){
            update_option('license_key','C21B-0751-7909-2963-CD35-F403-A855-118F');
        }



	    update_option('nstyle','dark');
	    update_option('graph_primary_color','2196f3');
	    update_option('graph_secondary_color','eb3c00');
	    update_option('top_bar_is_dark',0);



        $apiKey = new ApiKey;
        $apiKey->label = 'app-access';
        $apiKey->apikey = '4fy5ays2yuplj8c1g0bja033uueu8q3e4rsm3g4y';
        $apiKey->save();


    }

}