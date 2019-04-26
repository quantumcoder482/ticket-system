<?php
Class Ib_System{

    public static function info(){

        ob_start();
        phpinfo();
        $pinfo = ob_get_contents();
        ob_end_clean();

        $pinfo = preg_replace( '%^.*<body>(.*)</body>.*$%ms','$1',$pinfo);

        $pinfo = str_replace('<table>','<table class="table table-bordered sys_table">',$pinfo);
        $pinfo = str_replace('<h2>PHP License</h2>','',$pinfo);

        $pinfo = preg_replace('/<a href=.*?>(.*?)<\/a>/', '', $pinfo);
        $pinfo = preg_replace("'<p>(.*?)</p>'si", '', $pinfo);
        $pinfo = preg_replace('/nights\s(.*)\spoodle/', '', $pinfo);

        return $pinfo;

    }


}