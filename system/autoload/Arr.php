<?php
// *************************************************************************
// *                                                                       *
// * iBilling -  Accounting, Billing Software                              *
// * Copyright (c) Sadia Sharmin. All Rights Reserved                      *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * Email: sadiasharmin3139@gmail.com                                                *
// * Website: http://www.sadiasharmin.com                                  *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * This software is furnished under a license and may be used and copied *
// * only  in  accordance  with  the  terms  of such  license and with the *
// * inclusion of the above copyright notice.                              *
// * If you Purchased from Codecanyon, Please read the full License from   *
// * here- http://codecanyon.net/licenses/standard                         *
// *                                                                       *
// *************************************************************************

Class Arr{

    public static function str_to_arr($str){
        $pieces = explode(',', $str);
        foreach ($pieces as $p){

        }
    }


    public static function arr_to_str($arr){
        $str = '';
        if(is_array($arr)){
            foreach($arr as $a){
                $str .= $a.',';
            }
            $str = rtrim($str,',');
        }
        return $str;
    }

}