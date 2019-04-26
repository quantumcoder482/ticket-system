<?php
Class Support{


    public static function scripts(){

        return '';

//        global $config,$user;
//
//
//
//        $xtra = '';
//
//        $local_ips = array(
//            '127.0.0.1',
//            '',
//            '::1'
//        );
//
//        if(isset($config['ib_installed_at'])){
//            $ib_installed_at = $config['ib_installed_at'];
//        }
//        else{
//            $ib_installed_at = time();
//            add_option('ib_installed_at',$ib_installed_at);
//        }
//
//
//        $purchase_code = $config['purchase_code'];
//
//        $strlen = strlen($purchase_code);
//
//        $has_purchase_code = false;
//
//        if($strlen == 36){
//
//            $has_purchase_code = true;
//
//        }
//
//
//        if(!in_array($_SERVER['REMOTE_ADDR'], $local_ips) && ($user->username != 'demo@example.com') && $has_purchase_code){
//
//
//            /* Hi There! */
//            // Well May be you are here and checking the codes
//            // You are a programmer & you don't need help & the help button in the about page
//            // Simply set the $xtra = '';
//
//
//
//            // is customer using CRM ?
//
//            $crm_accounts = ORM::for_table('crm_accounts')->count();
//
//            $total_transactions = ORM::for_table('sys_transactions')->count();
//            $total_invoices = ORM::for_table('sys_invoices')->count();
//
//            if($crm_accounts == ''){
//                $crm_accounts = 0;
//            }
//
//            if($total_transactions == ''){
//                $total_transactions = 0;
//            }
//
//            if($total_invoices == ''){
//                $total_invoices = 0;
//            }
//
//
//            $xtra = '<script>
//  window.intercomSettings = {
//    app_id: "gc1alhe8",
//    name: "'.$user->fullname.'",
//    email: "'.$user->username.'",
//    created_at: '.$ib_installed_at.',
//    crm_accounts: '.$crm_accounts.',
//    transactions: '.$total_transactions.',
//    invoices: '.$total_invoices.',
//    app_url: "'.APP_URL.'",
//    app_name: "ibilling",
//    purchase_code: "'.$purchase_code.'",
//    uid: '.$user->id.'
//  };
//</script>
//<script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic(\'reattach_activator\');ic(\'update\',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement(\'script\');s.type=\'text/javascript\';s.async=true;s.src=\'https://widget.intercom.io/widget/gc1alhe8\';var x=d.getElementsByTagName(\'script\')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent(\'onload\',l);}else{w.addEventListener(\'load\',l,false);}}})()</script>';
//        }
//
//
//        return $xtra;


    }



}