<?php
/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/
$ui->assign('_application_menu', 'plugins');
$dir = $routes['1'];
$cont = $routes['2'];
$path = 'apps/'.$dir.'/'.$cont.'.php';
$pl_path = 'apps/'.$dir.'/';
if(file_exists($path)){
    $_pd = 'apps/'.$dir.'/';
    $ui->assign('_pd','apps/'.$dir.'/');
    require($path);

}
else{
//    echo $path;
    r2(U.'dashboard/','e',$_L['Plugin Not Found']);
}
