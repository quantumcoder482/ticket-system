<?php

/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

if(APP_STAGE == 'Live'){
    r2(U.'login');
    exit;
}

$action = route(1);

switch ($action){

    case 'admin':
        // auto login to admin



        Ib_Internal::autoLogin('demo@example.com','123456');


        break;

    case 'client':


//        $d = ORM::for_table('crm_accounts')->where('password','$1$WN..nD2.$Vo9niDl/fUf0VhheEjmHe/')->find_one();

       // $d = ORM::for_table('crm_accounts')->find_one(294);

        Ib_Internal::autoLogin('client@example.com','123456','customer');



        break;


    case 'reset':

        Demo::reset();



        $currency = new Currency;
        $currency->cname = 'USD';
        $currency->iso_code = 'USD';
        $currency->symbol = '$';
        $currency->save();


        // find all categories

        $cats = TransactionCategory::all();

        foreach ($cats as $cat){
            $cat->total_amount = 0;
            $cat->save();
        }

        // remove the profile picture from the current user

        $user = User::find(1);

        $user->language = 'en';

        $user->fullname = 'John Doe';

        $user->img = '';

        $user->save();

        r2(U.'dashboard');

        break;



    case 'us':

        Demo::reset();
        Demo::makeReady('us');
        r2(U.'dashboard');



        break;


    case 'au':

        Demo::reset();
        Demo::makeReady('au');
        r2(U.'dashboard');



        break;


    case 'uae':

        Demo::reset();
        Demo::makeReady('uae');
        r2(U.'dashboard');



        break;




    case 'iq':

        Demo::reset();
        Demo::makeReady('iq');
        r2(U.'contacts/list/');

        break;


    case 'se':

        Demo::reset();
        Demo::makeReady('se');

        r2(U.'dashboard');




        break;

    case 'br':

        Demo::reset();
        Demo::makeReady('br');

        r2(U.'dashboard');

        break;


    case 'in':

        Demo::reset();
        Demo::makeReady('in');

        r2(U.'dashboard');

        break;


    case 'bd':

        Demo::reset();
        Demo::makeReady('bd');

        r2(U.'dashboard');

        break;


    case 'ma':

        Demo::reset();
        Demo::makeReady('ma');
        r2(U.'dashboard');

        break;

    case 'ca_quebec':

        Demo::reset();
        Demo::makeReady('ca_quebec');
        r2(U.'dashboard');

        break;




}

