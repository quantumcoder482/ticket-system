<?php

/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/


_auth();
$action = $routes[1];
$user = User::_info();
$ui->assign('user', $user);


switch ($action) {


    case 'no_file':

        echo '<?php'.PHP_EOL;


        break;

    case 'language.php':


        $contents = file_get_contents($ib_language_file_path);

        if ($contents === false) {
            ib_die('// Unable to Open File: '.$ib_language_file_path);
        } else {

            echo $contents;

        }




        break;

    case 'invoice_printer.php':

        $file_path = 'system/lib/invoices/render.php';


        $contents = file_get_contents($file_path);

        if ($contents === false) {
            ib_die('// Unable to Open File: '.$file);
        } else {

            echo $contents;

        }


        break;


    case 'invoice_pdf.php':


        $file_path = 'system/lib/invoices/pdf-x2.php';


        $contents = file_get_contents($file_path);

        if ($contents === false) {
            ib_die('// Unable to Open File: '.$file);
        } else {

            echo $contents;

        }


        break;


    case 'save':


        $file = _post('file');

        if($file == 'no_file'){

            i_close($_L['Please Choose a File']);

        }

        if(APP_STAGE == "Demo"){

            ib_die('Unable to Save file in Demo Mode');

        }

        $codes = $_POST['codes'];

        $available_files_to_edit = array(
           'language.php' => 'application/lan/' . $config['language'] . '/common.lan.php',
            'invoice_printer.php' => 'system/lib/invoices/render.php',
            'invoice_pdf.php' => 'system/lib/invoices/pdf-x2.php'

        );

        if(isset($available_files_to_edit[$file])){

            $path = $available_files_to_edit[$file];

            if(file_exists($path)){

                $fp = fopen($path, 'w');
                fwrite($fp, $codes);
                fclose($fp);

                echo $_L['Data Updated'];

            }
            else{

                echo 'Failed';

            }



        }
        else{
            i_close('Invalid File '.$file);
        }


        break;





    default:
        echo '// File not found.';
}