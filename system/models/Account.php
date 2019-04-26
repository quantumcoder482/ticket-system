<?php
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'sys_accounts';

    public static function getBalance($account_id, $currency_id){

        $balance = Balance::where('account_id',$account_id)->where('currency_id',$currency_id)->first();

        if($balance){
            return $balance->balance;
        }

        return '0.00';

    }

}