<?php
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'sys_transactions';

    public static function totalAmount($type,$currency_id,$time='all',$all_data=true){

        global $user;

        $mdate = date('Y-m-d');
        $tdate = date('Y-m-d', strtotime('today - 30 days'));

        //first day of month
        $first_day_month = date('Y-m-01');
//
        $this_week_start = date('Y-m-d',strtotime( 'previous sunday'));
// 30 days before
        $before_30_days = date('Y-m-d', strtotime('today - 30 days'));
//this month
        $month_n = date('n');

        $total = self::where('type',$type);

      //  $total->where('currency',$currency_id);

        if($time == 'current_month'){
            $total->where('date','>=',$first_day_month)->where('date','<=',$mdate);
        }

        elseif ($time == 'current_week'){
            $total->where('date','>=',$this_week_start)->where('date','<=',$mdate);
        }

        elseif ($time == 'last_30_days'){
            $total->where('date','>=',$before_30_days)->where('date','<=',$mdate);
        }
        else{

        }

        if(!$all_data){
            $total->where('aid',$user->id);
        }

        if($type == 'Income'){
            return $total->sum('cr');
        }
        else{
            return $total->sum('dr');
        }


    }


    public static function remove($id){

        global $user,$config;

        if(!has_access($user->roleid,'transactions','delete')){

            permissionDenied();

        }

        //find the transaction
        $t = ORM::for_table('sys_transactions')->find_one($id);
        if($t){

            $a = ORM::for_table('sys_accounts')->where('account',$t['account'])->find_one();
            $cr = $t['cr'];
            $dr = $t['dr'];
            if($a){

                $cbal = $a['balance'];
                if($cr != '0.00'){
                    $nbal = $cbal-$cr;
                }
                else{
                    $nbal = $cbal+$dr;
                }

                $a->balance = $nbal;
                $a->save();



                $home_currency = Currency::where('iso_code', $config['home_currency'])->first();
                $account_balance = Balance::where('account_id', $a->id)->where('currency_id', $home_currency->id)->first();


                if ($account_balance) {

                    $cbal = $account_balance->balance;

                    if($cr != '0.00'){
                        $nbal = $cbal-$cr;
                    }
                    else{
                        $nbal = $cbal+$dr;
                    }
                    $account_balance->balance = $nbal;
                    $account_balance->save();
                }

            }

            // Check it is related to an invoice
            if($t->iid != 0)
            {
                $invoice = Invoice::find($t->iid);

                if($invoice)
                {
                    $transaction_amount = $t->amount;
                    $current_invoice_credit = $invoice->credit;
                    $new_invoice_credit = $current_invoice_credit-$transaction_amount;
                    $invoice->credit = $new_invoice_credit;
                    $invoice->save();
                }
            }


            // Check it is related to purchase

            if($t->purchase_id != 0 || $t->purchase_id != '')
            {
                $purchase = Purchase::find($t->purchase_id);

                if($purchase)
                {
                    $transaction_amount = $t->amount;
                    $current_purchase_credit = $purchase->credit;
                    $new_purchase_credit = $current_purchase_credit-$transaction_amount;
                    $purchase->credit = $new_purchase_credit;
                    $purchase->save();
                }
            }

            //

            $t->delete();
            return true;
        }

        else{
            return false;
        }

    }


    public static function deposit()
    {
        global $_L, $config, $user;
        $account = _post('account');
        $date = _post('date');
        $amount = _post('amount');
        /* @since v2. added support for ',' as decimal separator */
        $amount = Finance::amount_fix($amount);
        $payerid = _post('payer');
        $ref = _post('ref');
        $pmethod = _post('pmethod');
        $cat = _post('cats');
        $tags = $_POST['tags'];

        /* @since Build 4560. added support file attachments */

        $attachments = _post('attachments');


        if($payerid == ''){
            $payerid = '0';
        }
        $description = _post('description');
        $msg = '';
        if ($description == '') {
            $msg .= $_L['description_error'] . '<br>';
        }

        if ($account == '') {
            $msg .= $_L['Choose an Account'].' ' . '<br>';
        }


        if (is_numeric($amount) == false) {
            $msg .= $_L['amount_error'] . '<br>';
        }

        if ($msg == '') {

            Tags::save($tags,'Income');

            //find the current balance for this account
            $a = ORM::for_table('sys_accounts')->where('account',$account)->find_one();
            $cbal = $a['balance'];
            $nbal = $cbal+$amount;
            $a->balance=$nbal;
            $a->save();
            $d = ORM::for_table('sys_transactions')->create();
            $d->account = $account;
            $d->type = 'Income';
            $d->payerid =  $payerid;
            $d->tags =  Arr::arr_to_str($tags);
            $d->amount = $amount;
            $d->category = $cat;
            $d->method = $pmethod;
            $d->ref = $ref;

            $d->description = $description;
            // Build 4560
            $d->attachments = $attachments;
            $d->date = $date;
            $d->dr = '0.00';
            $d->cr = $amount;
            $d->bal = $nbal;

            //others
            $d->payer = '';
            $d->payee = '';
            $d->payeeid = '0';
            $d->status = 'Cleared';
            $d->tax = '0.00';
            $d->iid = 0;
            if($user){
                $d->aid = $user->id;
            }
            $d->updated_at = date('Y-m-d H:i:s');
            //

            // multi currency support

            $currency = _post('currency');

            $currency_find = Currency::find($currency);

            if(!$currency_find){
                $currency_find = Currency::where('iso_code',$config['home_currency'])->first();
            }

            

            //

            $d->save();
            $tid = $d->id();
            _log('New Deposit: '.$description.' [TrID: '.$tid.' | Amount: '.$amount.']','Admin',$user['id']);
            _msglog('s',$_L['Transaction Added Successfully']);
            return $tid;
        } else {
            return $msg;
        }
    }



    public static function rebuildCatData()
    {

        $transactions = Transaction::where('type','Income')->get();

        foreach ($transactions as $transaction){

            $tr_cat = $transaction->category;



            $category = TransactionCategory::where('type','Income')->where('name',$tr_cat)->first();

            if(!$category && $tr_cat != ''){

                $c = new TransactionCategory;
                $c->name = $tr_cat;
                $c->type = 'Income';
                $c->save();
            }


        }


        $transactions = Transaction::where('type','Expense')->get();

        foreach ($transactions as $transaction){

            $tr_cat = $transaction->category;

            $category = TransactionCategory::where('type','Expense')->where('name',$tr_cat)->first();

            if(!$category && $tr_cat != ''){

                $c = new TransactionCategory;
                $c->name = $tr_cat;
                $c->type = 'Expense';
                $c->save();
            }


        }



        $categories = TransactionCategory::where('type','Income')->get();

        foreach ($categories as $category){

            $total = categoryCalculateTotalByName($category->name,'Income');
            $category->total_amount = $total;
            $category->save();

           // echo $total;

            //   $message .= 'Category Balance Updated: '.$category->name.' -'.$total.PHP_EOL;

        }


        $categories = TransactionCategory::where('type','Expense')->get();

        foreach ($categories as $category){

            $total = categoryCalculateTotalByName($category->name,'Expense');
            $category->total_amount = $total;
            $category->save();



            //  $message .= 'Category Balance Updated: '.$category->name.' -'.$total.PHP_EOL;

        }
    }







}