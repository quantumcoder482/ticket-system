<?php
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'crm_accounts';

    public static function asArray()
    {
        return Contact::all()->keyBy('id')->toArray();
    }
}