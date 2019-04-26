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
Class Auth{


    public static function _admin(){
       $user = User::_info();
        if($user['user_type'] == 'Admin'){
            return true;
        }
        r2(U.'dashboard','e','Invalid Access');

    }

    public static function _reseller4(){
        $user = User::_info();
        if($user['user_type'] == 'Admin' OR $user['user_type'] == 'Reseller 4'){
            return true;
        }
        r2(U.'dashboard','e','Invalid Access');

    }

    public static function _reseller3(){
        $user = User::_info();
        if($user['user_type'] == 'Admin' OR $user['user_type'] == 'Reseller 4' OR $user['user_type'] == 'Reseller 3'){
            return true;
        }
        r2(U.'dashboard','e','Invalid Access');

    }

    public static function _reseller2(){
        $user = User::_info();
        if($user['user_type'] == 'Admin' OR $user['user_type'] == 'Reseller 4' OR $user['user_type'] == 'Reseller 3' OR $user['user_type'] == 'Reseller 2'){
            return true;
        }
        r2(U.'dashboard','e','Invalid Access');

    }
}