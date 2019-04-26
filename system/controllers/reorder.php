<?php
/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

_auth();
$ui->assign('_title', $_L['Settings'].'- '. $config['CompanyName']);
$ui->assign('_pagehead', '<i class="fa fa-cogs lblue"></i> Settings');
$ui->assign('_st', $_L['Settings']);
$ui->assign('_application_menu', 'settings');
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);
$ui->assign('_user', $user);
if($user['user_type'] != 'Admin'){
    r2(U."dashboard",'e',$_L['You do not have permission']);
}
if (isset($routes['1'])) {
    $do = $routes['1'];
} else {
    $do = 'sys_cats';
}

switch ($do) {




    #################### All Ajax Post ###############################
    case 'reorder-post':
        $action = $_POST['action'];
        $updateRecordsArray = $_POST['recordsArray'];

        $listingCounter = 1;
        foreach ($updateRecordsArray as $recordIDValue) {

            $d = ORM::for_table($action)->find_one($recordIDValue);
            $d->sorder = $listingCounter;
            $d->save();
            $listingCounter = $listingCounter + 1;
        }

        echo '<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Success!</strong> New Positions are updated in database
</div>';
        break;

    case 'pg':



        $d = ORM::for_table('sys_pg')->order_by_asc('sorder')->find_many();
        $ui->assign('ritem','Payment Gateway');
        $ui->assign('d',$d);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/css/liststyle.css"/>
');
        $ui->assign('display_name','name');
        $ui->assign('xjq', Reorder::js('sys_pg'));

        view('reorder');

        break;


    case 'groups':

        $d = ORM::for_table('crm_groups')->order_by_asc('sorder')->find_many();
        $ui->assign('ritem',$_L['Groups']);
        $ui->assign('d',$d);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/css/liststyle.css"/>
');
        $ui->assign('display_name','gname');
        $ui->assign('xjq', Reorder::js('crm_groups'));
        view('reorder');

        break;

    case 'expense_types':



        $d = ORM::for_table('expense_types')->order_by_asc('sorder')->find_many();
        $ui->assign('ritem','Expense Types');
        $ui->assign('d',$d);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/css/liststyle.css"/>
');
        $ui->assign('display_name','name');
        $ui->assign('xjq', Reorder::js('expense_types'));
        view('reorder');

        break;


}