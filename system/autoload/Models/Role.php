<?php
Class Models_Role extends M{

    public static $_table = 'sys_roles';


    public static function isExist($name){

       return ORM::for_table(self::$_table)->where('rname',$name)->find_one();

    }


}