<?php

/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

_auth();
$ui->assign('_application_menu', 'contacts');
$ui->assign('_title', 'Accounts- '. $config['CompanyName']);
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);
switch ($action) {
    case 'add':


        view('add-invoice');






        break;


    case 'view':

        break;

    case 'add-post':


        break;

    case 'list':
        $paginator = Paginator::bootstrap('sys_contacts');
        $d = ORM::for_table('sys_contacts')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_array();
        $ui->assign('d',$d);
        $ui->assign('paginator',$paginator);

        view('board');
        break;


    case 'edit-post':

        break;



    case 'post':

         $dt = urldecode('%D9%A2%D9%A0%D9%A1%D9%A7-%D9%A0%D9%A1-%D9%A2%D9%A9');

         echo date('Y-m-d',strtotime($dt));

        break;

    default:
        echo 'action not defined';
}