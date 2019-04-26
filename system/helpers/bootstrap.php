<?php

// Copyright Razib

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new application instance
| which serves as the "glue" for all the components of this application.
|
*/





session_start();



require('system/data/constants.php');
require('system/helpers/bin.php');


$plugin_ui_header_admin = array();
$plugin_ui_header_admin_css = array();
$plugin_ui_header_client = array();
$plugin_ui_header_client_css = array();

$PluginManager = new Plugins();

$ui = ui();



foreach ($ps as $p) {
    $plugindir_path = 'apps/'.$p['c'];

    $ui->assign('plugin_directory',$plugindir_path);
    if(file_exists($plugindir_path))
    {


        if(file_exists($plugindir_path.'/boot.php')){

            require $plugindir_path.'/boot.php';

        }



    } else {
        $plugindir = $p['c'];
        //   trigger_error("Plugin directory '$plugindir' does not exists!", E_USER_WARNING);
        _msglog('e',"Plugin directory '$plugindir' does not exists! <a href='".U."settings/plugin_force_remove/$plugindir/' style='color: white; text-decoration: underline;'>[ Click Here ]</a> to Remove This Plugin Entry.");
    }
}

$hooks = glob('hooks/*{.php}', GLOB_BRACE);

if (count($hooks) != 0) {
    foreach ($hooks as $hook) {
        require_once($hook);
    }
}



$app->emit('routing_started',[&$_L,&$config,&$ui]);

require('system/helpers/plugged.php');









// variable initializations

$xheader = '';
$xfooter = '';
$xjq = '';

$pl_path = '';
//
$sys_render = 'system/controllers/' . $handler . '.php';
if (file_exists($sys_render)) {
    include($sys_render);
} else {

    // exit ("$sys_render");

//    @Since v 2.4 supports routing to plugin

    $p1 = false;
    $p2 = false;

    if (isset($routes[0]) AND ($routes[0]) != '') {
        $p1 = true;
    }

    if (isset($routes[1]) AND ($routes[1]) != '') {
        $p2 = true;
    }

    if ($p1 AND $p2) {



        $dir = $routes[0];
        $cont = $routes[1];
        $path = 'apps/' . $dir . '/' . $cont . '.php';
        $pl_path = 'apps/' . $dir . '/';
        if (file_exists($path)) {
            $_pd = 'apps/' . $dir;
            $ui->assign('_pd', 'apps/' . $dir);


            require $path;


        }


        else {

            abort();

        }

    }

    elseif ($p1 & !$p2){

        $dir = $routes['0'];

        $path = 'apps/' . $dir . '/default.php';

        if (file_exists($path)) {

            $_pd = 'apps/' . $dir;

            $ui->assign('_pd', 'apps/' . $dir);


            require $path;


        }

        else{
            abort();
        }

    }

    else {

        // Plugin not found.

        abort();

    }


}