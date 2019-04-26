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
Class Tags {
    public static function save($tags=array(),$type='Contacts'){

if(is_array($tags)){
    foreach($tags as $element)
    {
        $tg = ORM::for_table('sys_tags')->where('text',$element)->where('type',$type)->find_one();
        if(!$tg){
            $tc = ORM::for_table('sys_tags')->create();
            $tc->text = $element;
            $tc->type = $type;
            $tc->save();
        }
    }

    return true;
}

        else{
            return false;
        }

    }


    public static function get_all($type='Contacts'){
        return ORM::for_table('sys_tags')->where('type',$type)->find_many();
    }
}