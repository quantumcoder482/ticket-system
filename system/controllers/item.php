<?php

/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

$ui->assign('_title', $_L['Store'].'- '. $config['CompanyName']);
$id = route(1);

$item = ORM::for_table('sys_items')->find_one($id);

if($item){

    $ui->assign('item',$item);
    $ui->assign('_title', $item->name);
    $ui->assign('xheader',Asset::css(array('modal')));
    $ui->assign('xfooter',Asset::js(array('modal','js/cart')));

    view('cart_item');
}