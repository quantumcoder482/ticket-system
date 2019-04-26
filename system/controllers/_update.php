<?php
$action = route(1,'panel');
_auth();
$user = User::_info();
switch ($action){

    case 'panel':


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Update</title>
    <link href="<?php echo APP_URL ?>/ui/theme/default/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo APP_URL ?>/ui/theme/default/css/style.css?ver=2.0.1" rel="stylesheet">
    <link href="<?php echo APP_URL ?>/ui/theme/default/css/component.css?ver=2.0.1" rel="stylesheet">
    <link href="<?php echo APP_URL ?>/ui/theme/default/css/custom.css" rel="stylesheet">
    <style>
        body {background:#ffffff}


        .main-box {
            width:700px;

            border-radius: 6px;
            margin:40px auto;
        }

        .response-box{
            border: none;
            -webkit-box-shadow: none;
            box-shadow: none;
            background: #323232;
            color: #ffffff;
            font-size: 11px;
            font-weight: normal;
            border-radius: 0;


        }

        .response-box:focus {
             border-color: #ffffff;
             -webkit-box-shadow: none;
             box-shadow: none;
        }

        .toolbar {
            min-height: 22px;
            box-shadow: inset 0 1px 0 #f5f4f5;
            background-color: #e8e6e8;
            background-image: -webkit-gradient(linear,left top,left bottom,color-stop(0,#e8e6e8),color-stop(100%,#d1cfd1));
            background-image: -webkit-linear-gradient(top,#e8e6e8 0,#d1cfd1 100%);
            background-image: linear-gradient(to bottom,#e8e6e8 0,#d1cfd1 100%);
        }

        .toolbar-header {
            border-bottom: 1px solid #c2c0c2;
        }
        .toolbar-actions:after, .toolbar-actions:before, .toolbar:after, .toolbar:before {
            display: table;
            content: " ";
        }

        .title {
            margin: 0;
            padding: 5px;
            font-size: 12px;
            font-weight: 400;
            color: #555;

            text-align: center;
            cursor: default;
        }



    </style>
</head>
<body>
<div class="main-box">
    <header class="toolbar toolbar-header">
        <h1 class="title">Terminal - Update</h1>


    </header>
    <div class="row">
        <div class="col-md-12">


            <textarea class="form-control response-box" id="serverResponse" rows="15"></textarea>


        </div>
    </div>

    <footer class="toolbar toolbar-footer">

    </footer>

</div>
<script src="<?php echo APP_URL ?>/ui/lib/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo APP_URL ?>/ui/lib/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo APP_URL ?>/ui/lib/bootbox.min.js" type="text/javascript"></script>
<script>
    $(function () {

        var $statusLabel = $("#statusLabel");
        var $serverResponse = $("#serverResponse");

        $serverResponse.append('Checking for updates .... '+"\n");
        $serverResponse.append('Do not close your browser.... '+"\n");

        // var interval = setInterval(function(){
        //     $serverResponse.append('.');
        // }, 100);



        $.get('<?php echo U; ?>update/check_update',function (data) {


            if(data.update_available === 'Yes'){

                $serverResponse.append('An update is available.... '+"\n");
                $serverResponse.append('Waiting for confirmation.... '+"\n");

                bootbox.confirm({
                    message: "An update is available, Do you want to proceed update?",
                    buttons: {
                        confirm: {
                            label: 'Yes',
                            className: 'btn-success'
                        },
                        cancel: {
                            label: 'No',
                            className: 'btn-danger'
                        }
                    },
                    callback: function (result) {
                        if(result === true){
                            $serverResponse.append('Update confirmed.... '+"\n");
                            $serverResponse.append('Updating.... '+"\n");
                            $serverResponse.append('Creating database backup.... '+"\n");

                            $.get('<?php echo U; ?>update/backup_db',function (data) {

                                if(data.continue === 'Yes'){

                                    $serverResponse.append('Database backup complete- '+ data.file_path +"\n");
                                   // $serverResponse.append(data.message+"\n");

                                    $serverResponse.append('Downloading Latest version.... '+"\n");

                                    $.get('<?php echo U; ?>update/download_latest',function (data) {

                                        if(data.continue === 'Yes'){
                                            $serverResponse.append('Latest updates has been downloaded...'+"\n");
                                            $serverResponse.append('Unzipping...'+"\n");
                                            $.get('<?php echo U; ?>update/unzip',function (data) {
                                                if(data.continue === 'Yes'){
                                                    $serverResponse.append('Completed!'+"\n");
                                                    $serverResponse.append('Updating database schema...'+"\n");

                                                    setTimeout(function(){

                                                        $.get('<?php echo U; ?>update/schema',function (data) {


                                                            $serverResponse.append(data.message+"\n");


                                                            $serverResponse.append('Saving log....'+"\n");

                                                            $.post('<?php echo U; ?>update/save_log',{log : $serverResponse.val()},function (data) {
                                                                bootbox.confirm({
                                                                    message: "Update completed!",
                                                                    buttons: {
                                                                        confirm: {
                                                                            label: 'Go to Dashboard',
                                                                            className: 'btn-success'
                                                                        },
                                                                        cancel: {
                                                                            label: 'Close',
                                                                            className: 'btn-danger'
                                                                        }
                                                                    },
                                                                    callback: function (result) {
                                                                        if(result === true){
                                                                            window.location = '<?php echo U; ?>dashboard';
                                                                        }
                                                                    }
                                                                });
                                                            })


                                                        });

                                                    }, 5000);


                                                }
                                                else{
                                                    $serverResponse.append(data.message+"\n");
                                                }
                                            });

                                        }
                                        else{
                                            $serverResponse.append(data.message+"\n");
                                        }

                                    });

                                }
                                else{
                                    $serverResponse.append('Error: An error occurred while taking database backup!'+"\n");
                                    $serverResponse.append(data.message+"\n");
                                }

                            });



                        }
                        else{
                            window.location = '<?php echo U; ?>settings/app/';
                        }
                    }
                });
            }



        });




    })
</script>
</body>
</html>

<?php

        break;


    case 'check_update':



        $check = updateCheck();


        api_response($check);



        break;


    case 'backup_db':

        $backup = new Backup;

        $backupDB = $backup->backupDB();

        $message = '';
        $continue = 'No';
        $file_path = '';

        if($backupDB['success']){
            $continue = 'Yes';
            $message = $backupDB['message'];
            $file_path = $backupDB['file_path'];

        }
        else{
            $continue = 'No';
            $message = $backupDB['message'];
        }








        $a = array(

            'continue' => $continue,
            'message' => $message,
            'file_path' => $file_path

        );


        api_response($a);


        break;

    case 'download_latest':


        if(function_exists('ini_set')){

            ini_set('memory_limit', '512M');
            ini_set('max_execution_time', 300);


        }

        header('Content-Type: application/json');

        $link = $update_server.'/get_latest/'.$config['purchase_key'];

        $a = array(

            'continue' => 'No',
            'message' => "Unable to Receive File from: ".$link,
            'success' => false

        );





        $h = new IBilling_Http();

        $latest_file = _raid(16).'.zip';

        update_option('latest_file',$latest_file);

        try{

            $r = $h->open($link)->setFileName($latest_file)->then('download');

            $a = array(

                'continue' => 'Yes',
                'message' => 'File copied from remote! - '.$latest_file,
                'success' => true,
                'link' => $link

            );

            echo json_encode($a);

            ib_close();


        } catch (Exception $e){


            $a = array(

                'continue' => 'No',
                'message' => $e->getMessage(),
                'success' => false

            );

            echo json_encode($a);

            ib_close();

        }



        echo json_encode($a);

        ib_close();


        break;


    case 'unzip':


        $msg = '';


        $file = $config['latest_file'];

        $path = './';



        if(!file_exists($file)){
            $a = array(

                'continue' => false,
                'message' => 'File Not Found!',
                'success' => false

            );

            echo json_encode($a);
            ib_close();
        }

        if (class_exists('ZipArchive')) {
            $zip = new ZipArchive;

            $res = $zip->open($file);
            if ($res === TRUE) {

                $zip->extractTo($path);


                if($zip->close()){

                    if(file_exists('./'.$config['latest_file'])){
                        unlink('./'.$config['latest_file']);
                    }

                }


            } else {

                $msg .= 'An error occured while unzipping the file'.PHP_EOL;
            }
        }

        else{
            $msg .= 'PHP ZipArchive Class is not Available!'.PHP_EOL;
        }

        if($msg != ''){

            if(file_exists('./'.$config['latest_file'])){
                unlink('./'.$config['latest_file']);
            }

            $a = array(

                'continue' => false,
                'message' => $msg,
                'success' => false

            );



        }
        else{

            $a = array(

                'continue' => true,
                'message' => 'File Extracted!',
                'success' => true

            );

        }


        api_response($a);

        break;


    case 'save_log':

        $log = $_POST['log'];

        _log($log);

        echo 1;


        break;


    case 'gen':

        $check = updateCheck($config['purchase_key']);

        if($check['update_available'] == 'Yes') {

            $Parsedown = new Parsedown();

            $changelog = $Parsedown->text($check['changelog']);
            $message = '<p>An update is available.</p>
<hr>
<a href="'.U.'update" class="btn btn-primary">Update</a>
<hr>
<h4>Changelog</h4>
<hr>

<div class="well">
'.$changelog.'
</div>

<hr>



';

        }

        else{
            $message = '<p>You are using latest version!</p>';
        }

        echo $message;

        break;



    case 'schema':


        $message = Update::singleCommand();

        updateOption('build',$file_build);

        $message .= '---------------------------'.PHP_EOL;
        $message .= 'Redirecting, please wait...';



        $script = '<script>
    $(function() {
        var delay = 10000;
        var $serverResponse = $("#serverResponse");
        var interval = setInterval(function(){
   $serverResponse.append(\'.\');
}, 500);
        
        setTimeout(function(){ window.location = \''.U.'dashboard\'; }, delay);
    });
</script>';

        HtmlCanvas::createTerminal($message,$script);




        break;




}
