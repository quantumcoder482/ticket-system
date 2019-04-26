<?php

dieIfNotPOST();

//$message = [
//    'success' => false,
//    'message' => 'Invalid API Key'
//];
//
//
//
//$apiKey = _post('api_key');
//
//if(!isValidApiKey($apiKey)){
//
//    api_response($message);
//
//}



$action = route(1);

switch ($action)
{

    case 'check_version':




        $message = [
            'build' => $config['build'],
            'schema_version' => $config['s_version']
        ];

        api_response($message);



        break;


    case 'backup_db':

        $backup = new Backup;

        $backupDB = $backup->backupDB();

        $message = '';
        $continue = 'No';

        if($backupDB['success']){
            $continue = 'Yes';
            $message = $backupDB['message'];

        }
        else{
            $continue = 'No';
            $message = $backupDB['message'];
        }








        $a = array(

            'continue' => $continue,
            'message' => $message

        );


        api_response($a);


        break;


    case 'download_latest_file':

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


    case 'extract_latest_file':

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


        echo json_encode($a);

        break;


    case 'update_schema':


        $u = Update::dbChanges();

        api_response($u);




        break;


    case 'set_build':



        updateOption('build',$file_build);




        break;



}




