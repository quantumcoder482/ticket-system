<?php
use Brick\Money\Money;

@ini_set('memory_limit', '512M');
@ini_set('max_execution_time', 0);
@set_time_limit(0);


/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

is_dev();
$user = User::_info();
$ui->assign('user', $user);
$ui->assign('_application_menu', 'dev');
$action = route(1,'view');



  use Stichoza\GoogleTranslate\TranslateClient;

 // use Twilio\Rest\Client;

use RRule\RRule;

switch ($action){


    case 'view':

        view('dev',[

        ]);

        break;



}