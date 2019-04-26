<?php
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $table = 'account_balances';

    public static function addBalance($amount,$account_id,$currency_code){


        if($amount == '' || $amount == '0'){
            return false;
        }


        $curreny = Currency::where('iso_code',$currency_code)->first();

        if(!$curreny){
            return false;
        }

        $currency_id = $curreny->id;

        $bal = Balance::where('account_id',$account_id)->where('currency_id',$currency_id)->first();

        if($bal){
            $current_bal = $bal->balance;
            $new_bal = $current_bal+$amount;
            $bal->balance = $new_bal;
            $bal->save();

            return $new_bal;
        }
        else{
            // create record

            $bal = new Balance;
            $bal->account_id = $account_id;
            $bal->currency_id = $currency_id;
            $bal->balance = $amount;

            return $amount;
        }

    }


    public static function deductBalance($amount,$account_id,$currency_code){

        if($amount == '' || $amount == '0'){
            return false;
        }



        $curreny = Currency::where('iso_code',$currency_code)->first();

        if(!$curreny){
            return false;
        }

        $currency_id = $curreny->id;

        $bal = Balance::where('account_id',$account_id)->where('currency_id',$currency_id)->first();

        if($bal){
            $current_bal = $bal->balance;
            $new_bal = $current_bal-$amount;
            $bal->balance = $new_bal;
            $bal->save();

            return $new_bal;
        }
        else{
            // create record

            $bal = new Balance;
            $bal->account_id = $account_id;
            $bal->currency_id = $currency_id;
            $bal->balance = 0-$amount;

            return $amount;
        }

    }
}