<?php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Util {

    public static function parse_size($size) {
        $unit = preg_replace('/[^bkmgtpezy]/i', '', $size); // Remove the non-unit characters from the size.
        $size = preg_replace('/[^0-9\.]/', '', $size); // Remove the non-numeric characters from the size.
        if ($unit) {
            // Find the position of the unit in the ordered string which is the power of magnitude to multiply a kilobyte by.
            return round($size * pow(1024, stripos('bkmgtpezy', $unit[0])));
        }
        else {
            return round($size);
        }
    }

    public static function file_upload_max_size() {
        static $max_size = -1;

        if ($max_size < 0) {
            // Start with post_max_size.
            $post_max_size = self::parse_size(ini_get('post_max_size'));
            if ($post_max_size > 0) {
                $max_size = $post_max_size;
            }

            // If upload_max_size is less, then reduce. Except if upload_max_size is
            // zero, which indicates no limit.
            $upload_max = self::parse_size(ini_get('upload_max_filesize'));
            if ($upload_max > 0 && $upload_max < $max_size) {
                $max_size = $upload_max;
            }
        }
        return $max_size;
    }

    /**
     * @return array
     */
    public static function systemInfo()
    {
        global $config;

        if (class_exists('ZipArchive')) {
            $zip_info = '✅';
        }
        else{
            $zip_info = '❌ php ZipArchive class does not exist, backup and automatic updates will not work';
        }

        if (is_writable('./')) {
            $writable = '✅';
        } else {
            $writable = '❌ System can not write file in the disk.';
        }

        if (extension_loaded('mbstring')) {
            $mbstring = '✅';
        }
        else{
            $mbstring = '❌ mbstring is not enabled, PDF will not work.';
        }

        if (extension_loaded('gd')) {
            $gd = '✅';
        }
        else{
            $gd = '❌ mbstring is not enabled, PDF will not work.';
        }

        if(function_exists('curl_version'))
        {
            $curl = '✅';
        }
        else{
            $curl = '❌ curl is not enabled. api based service will not work.';
        }



        return [
            'app_name' => $config['CompanyName'],
            'app_build' => $config['build'],
            'php_version' => phpversion(),
            'os' => PHP_OS,
            'modules' => [
                'zip' => $zip_info,
                'mbstring' => $mbstring,
                'gd' => $gd,
                'curl' => $curl
            ],
            'write_permission' => $writable

        ];
    }

    /**
     * @param $taskId
     * @return array
     */
    public static function backupFiles($taskId=false)
    {

        $logger = false;

        try{

           if($taskId)
           {
               $backup_path = 'tmp/'.$taskId;
           }
           else{
               $backup_path = 'storage/backups/app';
           }

            if(!file_exists($backup_path))
            {
                mkdir($backup_path);
                $info = 'Backup folder created: '.$taskId;
            }
            else{
                $info = 'Existing backup folder found: '.$taskId;
            }


            $logger = new Logger('clx');
            $logger->pushHandler(new StreamHandler($backup_path.'/task.log', Logger::DEBUG));

            $logger->info($info);

            $logger->info('storage folder...');
            ExtendedZip::zipTree('storage', $backup_path.'/storage.zip', ZipArchive::CREATE);

            $logger->info('system folder...');
            ExtendedZip::zipTree('system', $backup_path.'/system.zip', ZipArchive::CREATE);

            $logger->info('ui folder...');
            ExtendedZip::zipTree('ui', $backup_path.'/ui.zip', ZipArchive::CREATE);

            $logger->info('=============== Done !');

            return [
                'success' => true,
                'message' => 'Files backup completed'
            ];

        } catch (Exception $e)
        {
            if($logger)
            {
                $logger->error($e->getMessage());
            }
            return [
                'success' => false,
                'errors' => [
                    'message' => $e->getMessage()
                ]
            ];
        }
    }

    /**
     * @param $taskId
     * @return array
     */
    public static function backupDatabase($taskId = false)
    {
        $logger = false;

        try{

            if($taskId)
            {
                $backup_path = 'tmp/'.$taskId;
                $sql_file = $backup_path.'/db.sql';
                $out_name = 'db';
                if(!file_exists($backup_path))
                {
                    mkdir($backup_path);
                    $info = 'Backup folder created: '.$taskId;
                }
                else{
                    $info = 'Existing backup folder found: '.$taskId;
                }
            }
            else{
                $backup_path = 'storage/backups/db';
                $out_name = date('Y-m-d-H-i-s').'_token_'._raid();
                $sql_file = $backup_path.'/'.$out_name.'.sql';
                $info = 'Creating backup: '.$sql_file;
            }




            $logger = new Logger('clx');
            $logger->pushHandler(new StreamHandler($backup_path.'/task.log', Logger::DEBUG));

            $logger->info($info);

            $backup = new Backup;



            $backupDB = $backup->backupDB($sql_file);

            if($backupDB['success'])
            {
                $logger->info('=============== Done !');
            }
            else{

                $logger->warning($backupDB['message']);

                $logger->warning('!!! Standard backup failed, trying with alternative methods...');

                $b = $backup->backupDatabaseMySqli($backup_path,$out_name);

                if($b){
                    $logger->info('=============== alternative backup successful !');
                    $logger->info('=============== Done !');
                    return [
                        'success' => true,
                        'message' => 'Database backup successful',
                    ];
                }
                else{
                    $logger->info('Database backup failed!');
                    return [
                        'success' => false,
                        'message' => 'An error occurred while backing up database.',
                    ];
                }
            }


            return $backupDB;


        } catch (Exception $e)
        {
            if($logger)
            {
                $logger->error($e->getMessage());
            }
            return [
                'success' => false,
                'errors' => [
                    'message' => $e->getMessage()
                ]
            ];
        }
    }

    /**
     * @param $taskId
     * @return array
     */
    public static function getTaskLog($taskId)
    {
        $log_path = 'tmp/'.$taskId.'/task.log';
        if(file_exists($log_path))
        {
            return [
                'success' => true,
                'contents' => file_get_contents($log_path)
            ];
        }
        else{
            return [
                'success' => false
            ];
        }

    }

    /**
     * @return array
     */
    public static function fileUpload()
    {
        $uploader   =   new Uploader();
        $uploader->setDir('./');
        $uploader->sameName(true);
        $uploader->setExtensions(array('zip'));  //allowed extensions list//
        if($uploader->uploadFile('file')){   //txtFile is the filebrowse element name //
            $uploaded  =   $uploader->getUploadName(); //get uploaded file name, renames on upload//
            return [
                'success' => true,
                'uploaded' => $uploaded
            ];

        }else{//upload failed
            return [
                'success' => false,
                'errors' => [
                    'file' => $uploader->getMessage()
                ]
            ];
        }
    }

    public static function extractFile($name,$deleteAfterUpload=true)
    {
        $msg = '';
        if (class_exists('ZipArchive')) {
            $zip = new ZipArchive;

            $res = $zip->open('./'.$name);
            if ($res === TRUE) {


                $zip->extractTo('./');


                if($deleteAfterUpload)
                {
                    if($zip->close()){
                        unlink('./'.$name);
                    }
                }
                //

            } else {
                $msg .= $name . ' - Invalid archive Or An error occured while unzipping the file! <br>';
            }
        }

        else{
            $msg .= 'PHP ZipArchive Class is not Available! <br>';
        }

        if($msg != ''){
            return [
                'success' => false,
                'errors' => [
                    'zip' => $msg
                ]
            ];
        }
        else{
            return [
                'success' => true
            ];
        }
    }

    public static function downloadFile($file_url,$file_name)
    {
        if(function_exists('ini_set')){

            ini_set('memory_limit', '512M');
            ini_set('max_execution_time', 300);
        }

        $h = new IBilling_Http();

        try{

            $r = $h->open($file_url)->setFileName($file_name)->then('download');

            return [
                'success' => true,
                'message' => 'File copied from remote! - '.$file_name
            ];


        } catch (Exception $e){

            return [
                'success' => false,
                'message' => $e->getMessage()
            ];



        }

    }

}