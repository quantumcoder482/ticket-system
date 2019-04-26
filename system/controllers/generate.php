<?php

/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

_auth();
$ui->assign('_title', $_L['Transactions'].'- '. $config['CompanyName']);
$ui->assign('_st', 'Transactions');
$ui->assign('_application_menu', 'transactions');
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);
$mdate = date('Y-m-d');
switch ($action) {

    case 'balance-sheet':

//      $d = ORM::for_table('sys_accounts')->where_not_equal('balance','0.00')->order_by_desc('balance')->find_many();
//      $tbal = ORM::for_table('sys_accounts')->where_not_equal('balance','0.00')->sum('balance');
//      $ui->assign('d',$d);
//      $ui->assign('tbal',$tbal);
//
//        $ui->assign('xfooter',Asset::js(array('numeric')));
//
//        $ui->assign('xjq', '
//
// $(\'.amount\').autoNumeric(\'init\', {
//
//    aSign: \''.$config['currency_code'].' \',
//    dGroup: '.$config['thousand_separator_placement'].',
//    aPad: '.$config['currency_decimal_digits'].',
//    pSign: \''.$config['currency_symbol_position'].'\',
//    aDec: \''.$config['dec_point'].'\',
//    aSep: \''.$config['thousands_sep'].'\'
//
//    });
//
// ');


        // find the home currency id

        $home_currency = Currency::where('iso_code',$config['home_currency'])->first();


        //   $net_worth = ORM::for_table('sys_accounts')->sum('balance');

        $net_worth = Balance::where('currency_id',$home_currency->id)->sum('balance');


        //   $net_worth = ORM::for_table('sys_accounts')->sum('balance');

        $net_worth = Balance::where('currency_id',$home_currency->id)->sum('balance');



        if($net_worth == ''){
            $net_worth = 0;
        }

        $accounts = Account::all();
        $currencies = Currency::all();


        view('accounts_balances',[
            'accounts' => $accounts,
            'currencies' => $currencies,
            'net_worth' => $net_worth
        ]);



        break;

    default:
        echo 'action not defined';
}