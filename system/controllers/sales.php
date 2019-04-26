<?php
/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

_auth();
$ui->assign('_application_menu', 'invoices');
$ui->assign('_st', $_L['Delivery Challans']);
$ui->assign('_title', $_L['Sales'] . '- ' . $config['CompanyName']);
$user = User::_info();
$ui->assign('user', $user);
Event::trigger('invoices');

if(has_access($user->roleid,'sales','all_data')){

    $sales_all_data = true;

}
else{

    $sales_all_data = false;

}

$action = route(1);

switch ($action) {


    case 'delivery_challans':

        if(!db_table_exist('delivery_notes'))
        {
            r2(U.'sales/update');
        }

        $delivery_notes = DeliveryNote::all();

        view('sales_delivery_notes',[
            'delivery_notes' => $delivery_notes
        ]);


        break;


    case 'delivery_challan':

        $delivery_note = false;
        $contacts = Contact::all();
        view('sales_delivery_note',[
            'delivery_note' => $delivery_note,
            'contacts' => $contacts
        ]);

        break;


    case 'update':

        $script = '<script>
    $(function() {
        var delay = 10000;
        var $serverResponse = $("#serverResponse");
        var interval = setInterval(function(){
   $serverResponse.append(\'.\');
}, 500);
        
        setTimeout(function(){ window.location = \''.U.'sales/delivery_challans\'; }, delay);
    });
</script>';

        if(db_table_exist('delivery_notes')){
            HtmlCanvas::createTerminal('Already updated!',$script);
            exit;
        }

        $message = 'Updating scehma to support Delivery Challans... '.PHP_EOL;


        ORM::execute('CREATE TABLE `delivery_notes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contact_id` int(10) unsigned DEFAULT NULL,
  `currency` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` decimal(16,8) NOT NULL DEFAULT \'0.00000000\',
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');

        ORM::execute('CREATE TABLE `delivery_note_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(10) unsigned DEFAULT NULL,
  `quantity` decimal(8,2) unsigned NOT NULL DEFAULT \'0.00\',
  `rate` decimal(16,8) unsigned NOT NULL DEFAULT \'0.00000000\',
  `tax_id` int(10) unsigned DEFAULT NULL,
  `tax_rate` decimal(16,8) unsigned NOT NULL DEFAULT \'0.00000000\',
  `total` decimal(16,8) unsigned NOT NULL DEFAULT \'0.00000000\',
  `discount_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` decimal(16,8) unsigned NOT NULL DEFAULT \'0.00000000\',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');

        $message .= 'Tables were created...'.PHP_EOL;

        $message .= '---------------------------'.PHP_EOL;
        $message .= 'Redirecting, please wait...';





        HtmlCanvas::createTerminal($message,$script);


        break;

    default:
        echo 'action not defined';

}