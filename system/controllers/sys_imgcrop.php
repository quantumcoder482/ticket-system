<?php
/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/
_auth();
$ui->assign('_application_menu', 'contacts');
$ui->assign('_title', $_L['Accounts'].'- '. $config['CompanyName']);
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);
switch ($action) {

    case 'save':


        $imagePath = "storage/temp/";

        $allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
        $temp = explode(".", $_FILES["img"]["name"]);
        $extension = end($temp);

        if ( in_array($extension, $allowedExts))
        {
            if ($_FILES["img"]["error"] > 0)
            {
                $response = array(
                    "status" => 'error',
                    "message" => 'ERROR Return Code: '. $_FILES["img"]["error"],
                );
                echo "Return Code: " . $_FILES["img"]["error"] . "<br>";
            }
            else
            {

                $filename = $_FILES["img"]["tmp_name"];

                $fg = str_replace(APP_URL.'/','',$filename);

                list($width, $height) = getimagesize( $fg );

                move_uploaded_file($filename,  $imagePath . $_FILES["img"]["name"]);

                $response = array(
                    "status" => 'success',
                    "url" => APP_URL.'/'.$imagePath.$_FILES["img"]["name"],
                    "width" => $width,
                    "height" => $height
                );

            }
        }
        else
        {
            $response = array(
                "status" => 'error',
                "message" => 'something went wrong',
            );
        }

        print json_encode($response);

        break;


    case 'crop':
        $imgUrl = $_POST['imgUrl'];
        $imgInitW = $_POST['imgInitW'];
        $imgInitH = $_POST['imgInitH'];
        $imgW = $_POST['imgW'];
        $imgH = $_POST['imgH'];
        $imgY1 = $_POST['imgY1'];
        $imgX1 = $_POST['imgX1'];
        $cropW = $_POST['cropW'];
        $cropH = $_POST['cropH'];

        $jpeg_quality = 100;

        $output_filename = "storage/pics/croppedImg_".rand();

        $fg = str_replace(APP_URL.'/','',$imgUrl);

        $what = getimagesize($fg);

        switch(strtolower($what['mime']))
        {
            case 'image/png':
                $img_r = imagecreatefrompng($fg);
                $source_image = imagecreatefrompng($fg);
                $type = '.png';
                break;
            case 'image/jpeg':
                $img_r = imagecreatefromjpeg($fg);
                $source_image = imagecreatefromjpeg($fg);
                $type = '.jpeg';
                break;
            case 'image/gif':
                $img_r = imagecreatefromgif($fg);
                $source_image = imagecreatefromgif($fg);
                $type = '.gif';
                break;
            default: die('image type not supported');
        }

        $resizedImage = imagecreatetruecolor($imgW, $imgH);
        imagecopyresampled($resizedImage, $source_image, 0, 0, 0, 0, $imgW,
            $imgH, $imgInitW, $imgInitH);


        $dest_image = imagecreatetruecolor($cropW, $cropH);
        imagecopyresampled($dest_image, $resizedImage, 0, 0, $imgX1, $imgY1, $cropW,
            $cropH, $cropW, $cropH);


        imagejpeg($dest_image, $output_filename.$type, $jpeg_quality);

        $response = array(
            "status" => 'success',
            "url" => APP_URL.'/'.$output_filename.$type
        );


        print json_encode($response);
        break;


    default:
        echo 'action not defined';
}