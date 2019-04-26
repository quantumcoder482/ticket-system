<?php
/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/
_auth();

$ui->assign('_application_menu', 'transactions');
$ui->assign('_title', $_L['Accounts'] . '- ' . $config['CompanyName']);
$ui->assign('_st', $_L['Accounts']);
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);
Event::trigger('accounts');
switch ($action) {
    case 'balances':

        if(has_access($user->roleid,'bank_n_cash','all_data')){

            $all_data = true;

        }
        else{
            $all_data = false;
        }
        $parent_menu = route(2);
        if ($parent_menu == 'transactions') {
            $ui->assign('_application_menu', 'transactions');
        }
        $home_currency = Currency::where('iso_code', $config['home_currency'])->first();
        $net_worth = Balance::where('currency_id', $home_currency->id)->sum('balance');
        $net_worth = Balance::where('currency_id', $home_currency->id)->sum('balance');
        if ($net_worth == '') {
            $net_worth = 0;
        }
        if($all_data)
        {
            $accounts = Account::all();
        } else{
            $accounts = Account::where('owner_id',$user->id)->get();
        }
        $currencies = Currency::all();
        view('accounts_balances', ['accounts' => $accounts, 'currencies' => $currencies, 'net_worth' => $net_worth]);
        break;

    case 'add':

        $currencies_all = Currency::getAllCurrencies();

        $ui->assign('xfooter', Asset::js(array(
            'numeric'
        )));

        // find other currencies

        $currencies = Currency::all();
        $ui->assign('currencies', $currencies);
        view('accounts_add',[
            'currencies_all' => $currencies_all
        ]);
        break;

    case 'add-post':

        $account = _post('account');
        $description = _post('description');
        $msg = '';
        if ($account == '') {
            $msg.= $_L['account_title_length_error'] . '<br />';
        }

        // check with same name account is exist

        $d = ORM::for_table('sys_accounts')->where('account', $account)->find_one();
        if ($d) {
            $msg.= $_L['account_already_exist'] . '<br />';
        }

        $ex_msg = '';
        $ib_url = _post('ib_url');
        if ($ib_url != '') {
            if (filter_var($ib_url, FILTER_VALIDATE_URL) === FALSE) {
                $ex_msg.= '. Error: Invalid URL. URL Not Updated.';
                $ib_url = '';
            }
        }

        if ($msg == '') {

            $d = ORM::for_table('sys_accounts')->create();
            $d->account = $account;
            $d->description = $description;
            $d->balance = '0.00';

            // From Version 4

            $d->bank_name = '';
            $d->account_number = _post('account_number');
            $d->currency = '';
            $d->branch = '';
            $d->address = '';
            $d->contact_person = _post('contact_person');
            $d->contact_phone = _post('contact_phone');
            $d->website = '';
            $d->ib_url = $ib_url;
            $d->created = date('Y-m-d H:i:s');
            $d->notes = '';
            $d->sorder = 1;
            $d->e = '';
            $d->token = '';
            $d->status = '';
            $d->owner_id = $user->id;
            $d->save();
            $account_id = $d->id;

            $currencies = Currency::all();
            foreach($currencies as $currency) {
                $balance = _post('balance_' . $currency->iso_code);
                $balance = createFromCurrency($balance,$currency->iso_code);
                if (is_numeric($balance) == false) {
                    $balance = '0.00';
                }

                if($balance != 0.00)
                {
                    $transaction = new Transaction;
                    $transaction->account = $account;
                    $transaction->account_id = $account_id;
                    $transaction->type = 'Equity';
                    $transaction->payerid = 0;
                    $transaction->tags = '';
                    $transaction->amount = $balance;
                    $transaction->category = '';
                    $transaction->cat_id = 0;
                    $transaction->method = '';
                    $transaction->ref = '';
                    $transaction->description = 'Opening balance';
                    $transaction->attachments = '';
                    $transaction->date = date('Y-m-d');
                    $transaction->dr = '0.00';
                    $transaction->cr = $balance;
                    $transaction->bal = $balance;
                    $transaction->payer = '';
                    $transaction->payee = '';
                    $transaction->payeeid = '0';
                    $transaction->status = 'Cleared';
                    $transaction->tax = '0.00';
                    $transaction->iid = 0;
                    $transaction->aid = $user->id;
                    $transaction->vid = _raid(8);
                    $transaction->updated_at = date('Y-m-d H:i:s');
                    $transaction->source = 'Opening balance';

                    $transaction->currency_iso_code = $currency->iso_code;

                    $transaction->save();
                }

            }



            r2(U . 'accounts/list', 's', $_L['account_created_successfully'] . $ex_msg);
        }
        else {
            r2(U . 'accounts/add', 'e', $msg);
        }

        break;

    case 'list':

        if(has_access($user->roleid,'bank_n_cash','all_data')){

            $all_data = true;

        }
        else{
            $all_data = false;
        }

//        $d = ORM::for_table('sys_accounts');
//
//        if(!$all_data)
//        {
//            $d->where('owner_id',$user->id);
//        }
//
//        $d = $d->find_many();
//
//        $ui->assign('d', $d);

        $balances = getBalances();

       // dd($balances);


        view('accounts-manage',[
            'balances' => $balances
        ]);


        break;

    case 'edit':
        $id = $routes['2'];
        $d = ORM::for_table('sys_accounts')->find_one($id);

        if ($d) {
            $balances = Balance::where('account_id',$d->id)->get();
            $ui->assign('d', $d);

            $currencies = Currency::all()->groupBy('id')->all();
            view('account-edit',[
                'balances' => $balances,
                'currencies' => $currencies
            ]);
        }
        else {
            r2(U . 'accounts/list', 'e', $_L['Account_Not_Found']);
        }

        break;

    case 'edit-post':
        $account = _post('account');
        $description = _post('description');
        $id = _post('id');
        $today = date('Y-m-d H:i:s');
        $msg = '';
        if ($account == '') {
            $msg.= $_L['account_title_length_error'] . '<br />';
        }

        $ex_msg = '';
        $ib_url = _post('ib_url');
        if ($ib_url != '') {
            if (filter_var($ib_url, FILTER_VALIDATE_URL) === FALSE) {
                $ex_msg.= '. Error: Invalid URL. URL Not Updated.';
                $ib_url = '';
            }
        }

        if ($msg == '') {
            $d = ORM::for_table('sys_accounts')->find_one($id);
            if ($d) {
                $oaccount = $d['account'];
                $d->account = $account;
                $d->description = $description;

                // From Version 4
                // From Version 4

                $d->bank_name = '';
                $d->account_number = _post('account_number');
                $d->currency = '';
                $d->branch = '';
                $d->address = '';
                $d->contact_person = _post('contact_person');
                $d->contact_phone = _post('contact_phone');
                $d->website = '';
                $d->ib_url = $ib_url;

                //  $d->created = $today;

                $d->notes = '';
                $d->sorder = 1;
                $d->e = '';
                $d->token = '';
                $d->status = '';
                $d->save();


                // now update all transactions with the new name

                $b = ORM::for_table('sys_transactions')->where('account', $oaccount)->find_result_set()->set('account', $account)->save();

                r2(U . 'accounts/list', 's', $_L['account_updated_successfully'] . $ex_msg);
            }
            else {
                r2(U . 'accounts/list', 'e', $_L['Account_Not_Found']);
            }
        }
        else {
            r2(U . 'accounts/add', 'e', $msg);
        }

        break;

    case 'delete':


        if (!has_access($user->roleid, 'bank_n_cash', 'delete')) {
            permissionDenied();
        }

        $id = $routes['2'];
        $id = str_replace('did', '', $id);
        if (APP_STAGE == 'Demo') {
            r2(U . 'accounts/list', 'e', 'Sorry! Deleting Account is disabled in the demo mode.');
        }

        $d = ORM::for_table('sys_accounts')->find_one($id);
        if ($d) {
            $d->delete();

            //Delete the balance table

            $balances = Balance::where('account_id',$id)->get();

            foreach ($balances as $b){

                $b->delete();

            }


            //


            r2(U . 'accounts/list', 's', $_L['account_delete_successful']);
        }

        break;


    case 'add-equity':

        $currencies_all = Currency::getAllCurrencies();
        $currencies = Currency::all();


        $account_id = route(2);

        $account = Account::find($account_id);

        if($account)
        {
            view('accounts_equity',[
                'account' => $account,
                'currencies_all' => $currencies_all,
                'currencies' => $currencies
            ]);
        }

        break;


    case 'equity-post':

        $account_id = _post('account_id');
        $currencies = Currency::all();

        $account = Account::find($account_id);


        foreach($currencies as $currency) {
            $balance = _post('balance_' . $currency->iso_code);
            $balance = createFromCurrency($balance,$currency->iso_code);
            if (is_numeric($balance) == false) {
                $balance = '0.00';
            }

            if($balance != 0.00)
            {
                $transaction = new Transaction;
                $transaction->account = $account->account;
                $transaction->account_id = $account_id;
                $transaction->type = 'Equity';
                $transaction->payerid = 0;
                $transaction->tags = '';
                $transaction->amount = $balance;
                $transaction->category = '';
                $transaction->cat_id = 0;
                $transaction->method = '';
                $transaction->ref = '';
                $transaction->description = 'Opening balance';
                $transaction->attachments = '';
                $transaction->date = date('Y-m-d');
                $transaction->dr = '0.00';
                $transaction->cr = $balance;
                $transaction->bal = $balance;
                $transaction->payer = '';
                $transaction->payee = '';
                $transaction->payeeid = '0';
                $transaction->status = 'Cleared';
                $transaction->tax = '0.00';
                $transaction->iid = 0;
                $transaction->aid = $user->id;
                $transaction->vid = _raid(8);
                $transaction->updated_at = date('Y-m-d H:i:s');
                $transaction->source = 'Opening balance';

                $transaction->currency_iso_code = $currency->iso_code;

                $transaction->save();
            }

        }

        break;

    case 'clear-cache':


        $accounts = Account::all();

        $home_currency = Currency::where('iso_code', $config['home_currency'])->first();

        foreach ($accounts as $account)
        {
            $transactions = Transaction::where('account',$account->account)->get();

            $total_equity = 0;
            $total_income = 0;
            $total_expense = 0;

            foreach ($transactions as $transaction)
            {
                if($transaction->type == 'Income')
                {
                    $total_income += $transaction->amount;
                }
                elseif ($transaction->type == 'Expense')
                {
                    $total_expense += $transaction->amount;
                }
                elseif ($transaction->type == 'Equity')
                {
                    $total_equity += $transaction->amount;
                }
            }

            $balance = ($total_income+$total_equity)-$total_expense;

            $account->balance = $balance;
            $account->save();

            // Update the balance table

            $account_balance = Balance::where('account_id',$account->id)
                ->where('currency_id',$home_currency->id)
                ->first();

            if($account_balance)
            {
                $account_balance->balance = $balance;
                $account_balance->save();
            }

        }

        r2(U.'accounts/balances/transactions','s',$_L['Data Updated']);

        break;



    default:
        echo 'action not defined';
}