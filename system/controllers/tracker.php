<?php
/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/



_auth();
$ui->assign('_application_menu', 'accounts');
$ui->assign('_title', $_L['Accounts'] . '- ' . $config['CompanyName']);
$ui->assign('_st', $_L['Accounts']);
$action = route(1,'assets');
$user = User::_info();
$ui->assign('user', $user);



switch ($action){



    case 'assets':






        break;


    case 's':

        is_dev();

        $t = new Schema('ib_visitor_logs');
        $t->add('token','varchar','100');
        $t->add('account','varchar','200');
        $t->add('email','varchar','100');
        $t->add('phone','varchar','50');
        $t->add('lid','int','11','0');
        $t->add('cid','int','11','0');
        $t->add('aid','int','11','0');
        $t->add('','varchar','');
        $t->add('','varchar','');
        $t->add('page_id','varchar','200');
        $t->add('page_title','varchar','200');




        break;


    case 'assets_s':

        $t = new Schema('ib_assets');
        $t->add('asset_name','varchar','200');
        $t->add('price','decimal','14,2','0.00');
        $t->add('date_purchased','date');
        $t->add('warranty_period','date');
        $t->add('image');
        $t->add('description');
        $t->add('created_at','timestamp');
        $t->add('updated_at','timestamp');
       // $t->save();
        echo $t->save('show_sql');


        break;

}