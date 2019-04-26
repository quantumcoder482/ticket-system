<?php
use Illuminate\Database\Eloquent\Model;

class TransactionCategory extends Model
{
    protected $table = 'sys_cats';


    public static function expense(){

       return self::where('type','Expense')->get();

    }


    public static function sumExpenseCategory($cat_name){

       return Transaction::where('category',$cat_name)->sum('amount');

    }


}