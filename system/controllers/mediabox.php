<?php

_auth();

$action = route(1);

chdir('system/lib/filemanager');
$time = time();


$config = include 'config/config.php';

$_SESSION['RF']["verify"] = "RESPONSIVEfilemanager";

//TODO switch to array
extract($config, EXTR_OVERWRITE);

include 'include/utils.php';

$lang = $config['default_language'];
$languages = include 'lang/languages.php';



switch ($action){

    case 'execute':

        if ($_SESSION['RF']["verify"] != "RESPONSIVEfilemanager")
        {
            response(trans('forbiden').AddErrorLocation())->send();
            exit;
        }

        if (strpos($_POST['path'],'/')===0
            || strpos($_POST['path'],'../')!==FALSE
            || strpos($_POST['path'],'./')===0
            || strpos($_POST['path'],'..\\')!==FALSE
            || strpos($_POST['path'],'.\\')===0)
        {
            response(trans('wrong path'.AddErrorLocation()))->send();
            exit;
        }

        if (isset($_SESSION['RF']['language']) && file_exists('lang/' . basename($_SESSION['RF']['language']) . '.php'))
        {
           // $languages = include 'lang/languages.php';
            if(array_key_exists($_SESSION['RF']['language'],$languages)){
                include 'lang/' . basename($_SESSION['RF']['language']) . '.php';
            }else{
                response(trans('Lang_Not_Found').AddErrorLocation())->send();
                exit;
            }
        }
        else
        {
            response(trans('Lang_Not_Found').AddErrorLocation())->send();
            exit;
        }

        $ftp = ftp_con($config);

        $base = $current_path;
        $path = $base.$_POST['path'];
        $cycle = TRUE;
        $max_cycles = 50;
        $i = 0;
        while($cycle && $i<$max_cycles)
        {
            $i++;
            if ($path == $base)  $cycle=FALSE;

            if (file_exists($path."config.php"))
            {
                require_once $path."config.php";
                $cycle = FALSE;
            }
            $path = fix_dirname($path)."/";
        }

        $path = $current_path.$_POST['path'];
        $path_thumb = $thumbs_base_path.$_POST['path'];

        if($ftp){
            $path = $ftp_base_folder.$upload_dir.$_POST['path'];
            $path_thumb = $ftp_base_folder.$ftp_thumbs_dir.$_POST['path'];
        }

        if (isset($_POST['name']))
        {
            $name = fix_filename($_POST['name'],$config);
            if (strpos($name,'../') !== FALSE || strpos($name,'..\\') !== FALSE)
            {
                response(trans('wrong name').AddErrorLocation())->send();
                exit;
            }
        }

        $info = pathinfo($path);
        if (isset($info['extension']) && !(isset($_GET['action']) && $_GET['action']=='delete_folder') && !in_array(strtolower($info['extension']), $ext) && $_GET['action'] != 'create_file')
        {
            response(trans('wrong extension').AddErrorLocation())->send();
            exit;
        }

        if (isset($_GET['action']))
        {
            switch($_GET['action'])
            {
                case 'delete_file':
                    if ($delete_files){
                        if($ftp){
                            try{
                                $ftp->delete("/".$path);
                                @$ftp->delete("/".$path_thumb);
                            }catch(FtpClient\FtpException $e){
                                return;
                            }
                        }else{

                            unlink($path);
                            if (file_exists($path_thumb)){
                                unlink($path_thumb);
                            }
                        }

                        $info=pathinfo($path);
                        if (!$ftp && $relative_image_creation){
                            foreach($relative_path_from_current_pos as $k=>$path)
                            {
                                if ($path!="" && $path[strlen($path)-1]!="/") $path.="/";

                                if (file_exists($info['dirname']."/".$path.$relative_image_creation_name_to_prepend[$k].$info['filename'].$relative_image_creation_name_to_append[$k].".".$info['extension']))
                                {
                                    unlink($info['dirname']."/".$path.$relative_image_creation_name_to_prepend[$k].$info['filename'].$relative_image_creation_name_to_append[$k].".".$info['extension']);
                                }
                            }
                        }

                        if (!$ftp && $fixed_image_creation)
                        {
                            foreach($fixed_path_from_filemanager as $k=>$path)
                            {
                                if ($path!="" && $path[strlen($path)-1] != "/") $path.="/";

                                $base_dir=$path.substr_replace($info['dirname']."/", '', 0, strlen($current_path));
                                if (file_exists($base_dir.$fixed_image_creation_name_to_prepend[$k].$info['filename'].$fixed_image_creation_to_append[$k].".".$info['extension']))
                                {
                                    unlink($base_dir.$fixed_image_creation_name_to_prepend[$k].$info['filename'].$fixed_image_creation_to_append[$k].".".$info['extension']);
                                }
                            }
                        }
                    }
                    break;
                case 'delete_folder':
                    if ($delete_folders){

                        if($ftp){
                            deleteDir($path,$ftp,$config);
                            deleteDir($path_thumb,$ftp,$config);
                        }else{
                            if (is_dir($path_thumb))
                            {
                                deleteDir($path_thumb);
                            }

                            if (is_dir($path))
                            {
                                deleteDir($path);
                                if ($fixed_image_creation)
                                {
                                    foreach($fixed_path_from_filemanager as $k=>$paths){
                                        if ($paths!="" && $paths[strlen($paths)-1] != "/") $paths.="/";

                                        $base_dir=$paths.substr_replace($path, '', 0, strlen($current_path));
                                        if (is_dir($base_dir)) deleteDir($base_dir);
                                    }
                                }
                            }
                        }
                    }
                    break;
                case 'create_folder':
                    if ($create_folders)
                    {

                        $name = fix_filename($_POST['name'],$config);
                        $path .= $name;
                        $path_thumb .= $name;
                        create_folder(fix_path($path,$config),fix_path($path_thumb,$config),$ftp,$config);
                    }
                    break;
                case 'rename_folder':
                    if ($rename_folders){
                        if(!is_dir($path)) {
                            response(trans('wrong path'))->send();
                            exit;
                        }
                        $name=fix_filename($name,$config);
                        $name=str_replace('.','',$name);

                        if (!empty($name)){
                            if (!rename_folder($path,$name,$ftp,$config))
                            {
                                response(trans('Rename_existing_folder').AddErrorLocation())->send();
                                exit;
                            }
                            rename_folder($path_thumb,$name,$ftp,$config);
                            if (!$ftp && $fixed_image_creation){
                                foreach($fixed_path_from_filemanager as $k=>$paths){
                                    if ($paths!="" && $paths[strlen($paths)-1] != "/") $paths.="/";

                                    $base_dir=$paths.substr_replace($path, '', 0, strlen($current_path));
                                    rename_folder($base_dir,$name,$ftp,$config);
                                }
                            }
                        } else {
                            response(trans('Empty_name').AddErrorLocation())->send();
                            exit;
                        }
                    }
                    break;
                case 'create_file':
                    if ($create_text_files === FALSE) {
                        response(sprintf(trans('File_Open_Edit_Not_Allowed'), strtolower(trans('Edit'))).AddErrorLocation())->send();
                        exit;
                    }

                    if (!isset($editable_text_file_exts) || !is_array($editable_text_file_exts)){
                        $editable_text_file_exts = array();
                    }

                    // check if user supplied extension
                    if (strpos($name, '.') === FALSE){
                        response(trans('No_Extension').' '.sprintf(trans('Valid_Extensions'), implode(', ', $editable_text_file_exts)).AddErrorLocation())->send();
                        exit;
                    }

                    // correct name
                    $old_name = $name;
                    $name=fix_filename($name,$config);
                    if (empty($name))
                    {
                        response(trans('Empty_name').AddErrorLocation())->send();
                        exit;
                    }

                    // check extension
                    $parts = explode('.', $name);
                    if (!in_array(end($parts), $editable_text_file_exts)) {
                        response(trans('Error_extension').' '.sprintf(trans('Valid_Extensions'), implode(', ', $editable_text_file_exts)), 400)->send();
                        exit;
                    }

                    $content = $_POST['new_content'];

                    if($ftp){
                        $temp = tempnam('/tmp','RF');
                        file_put_contents($temp, $content);
                        $ftp->put("/".$path.$name, $temp, FTP_BINARY);
                        unlink($temp);
                        response(trans('File_Save_OK'))->send();
                    }else{
                        if (!checkresultingsize(strlen($content))) {
                            response(sprintf(trans('max_size_reached'),$MaxSizeTotal).AddErrorLocation())->send();
                            exit;
                        }
                        // file already exists
                        if (file_exists($path.$name)) {
                            response(trans('Rename_existing_file').AddErrorLocation())->send();
                            exit;
                        }

                        if (@file_put_contents($path.$name, $content) === FALSE) {
                            response(trans('File_Save_Error').AddErrorLocation())->send();
                            exit;
                        } else {
                            if (is_function_callable('chmod') !== FALSE){
                                chmod($path.$name, 0644);
                            }
                            response(trans('File_Save_OK'))->send();
                            exit;
                        }
                    }

                    break;
                case 'rename_file':
                    if ($rename_files){
                        $name=fix_filename($name,$config);
                        if (!empty($name))
                        {
                            if (!rename_file($path,$name,$ftp,$config))
                            {
                                response(trans('Rename_existing_file').AddErrorLocation())->send();
                                exit;
                            }

                            rename_file($path_thumb,$name,$ftp,$config);

                            if ($fixed_image_creation)
                            {
                                $info=pathinfo($path);

                                foreach($fixed_path_from_filemanager as $k=>$paths)
                                {
                                    if ($paths!="" && $paths[strlen($paths)-1] != "/") $paths.="/";

                                    $base_dir = $paths.substr_replace($info['dirname']."/", '', 0, strlen($current_path));
                                    if (file_exists($base_dir.$fixed_image_creation_name_to_prepend[$k].$info['filename'].$fixed_image_creation_to_append[$k].".".$info['extension']))
                                    {
                                        rename_file($base_dir.$fixed_image_creation_name_to_prepend[$k].$info['filename'].$fixed_image_creation_to_append[$k].".".$info['extension'],$fixed_image_creation_name_to_prepend[$k].$name.$fixed_image_creation_to_append[$k],$ftp,$config);
                                    }
                                }
                            }
                        } else {
                            response(trans('Empty_name').AddErrorLocation())->send();
                            exit;
                        }
                    }
                    break;
                case 'duplicate_file':
                    if ($duplicate_files)
                    {
                        $name=fix_filename($name,$config);
                        if (!empty($name))
                        {
                            if (!$ftp && !checkresultingsize(filesize($path))) {
                                response(sprintf(trans('max_size_reached'),$MaxSizeTotal).AddErrorLocation())->send();
                                exit;
                            }
                            if (!duplicate_file($path,$name,$ftp,$config))
                            {
                                response(trans('Rename_existing_file').AddErrorLocation())->send();
                                exit;
                            }

                            duplicate_file($path_thumb,$name,$ftp,$config);

                            if (!$ftp && $fixed_image_creation)
                            {
                                $info=pathinfo($path);
                                foreach($fixed_path_from_filemanager as $k=>$paths)
                                {
                                    if ($paths!="" && $paths[strlen($paths)-1] != "/") $paths.= "/";

                                    $base_dir=$paths.substr_replace($info['dirname']."/", '', 0, strlen($current_path));

                                    if (file_exists($base_dir.$fixed_image_creation_name_to_prepend[$k].$info['filename'].$fixed_image_creation_to_append[$k].".".$info['extension']))
                                    {
                                        duplicate_file($base_dir.$fixed_image_creation_name_to_prepend[$k].$info['filename'].$fixed_image_creation_to_append[$k].".".$info['extension'],$fixed_image_creation_name_to_prepend[$k].$name.$fixed_image_creation_to_append[$k]);
                                    }
                                }
                            }
                        } else {
                            response(trans('Empty_name').AddErrorLocation())->send();
                            exit;
                        }
                    }
                    break;

                case 'paste_clipboard':
                    if ( ! isset($_SESSION['RF']['clipboard_action'], $_SESSION['RF']['clipboard']['path'])
                        || $_SESSION['RF']['clipboard_action'] == ''
                        || $_SESSION['RF']['clipboard']['path'] == '')
                    {
                        response()->send();
                        exit;
                    }

                    $action = $_SESSION['RF']['clipboard_action'];
                    $data = $_SESSION['RF']['clipboard'];


                    if($ftp){
                        if($_POST['path']!=""){
                            $path.=DIRECTORY_SEPARATOR;
                            $path_thumb.=DIRECTORY_SEPARATOR;
                        }
                        $path_thumb .= basename($data['path']);
                        $path .= basename($data['path']) ;
                        $data['path_thumb'] = DIRECTORY_SEPARATOR.$config['ftp_base_folder'].$config['ftp_thumbs_dir'].$data['path'];
                        $data['path'] = DIRECTORY_SEPARATOR.$config['ftp_base_folder'].$config['upload_dir'].$data['path'];
                    }else{
                        $data['path_thumb'] = $thumbs_base_path.$data['path'];
                        $data['path'] = $current_path.$data['path'];
                    }

                    $pinfo = pathinfo($data['path']);

                    // user wants to paste to the same dir. nothing to do here...
                    if ($pinfo['dirname'] == rtrim($path, DIRECTORY_SEPARATOR)) {
                        response()->send();
                        exit;
                    }

                    // user wants to paste folder to it's own sub folder.. baaaah.
                    if (is_dir($data['path']) && strpos($path, $data['path']) !== FALSE){
                        response()->send();
                        exit;
                    }

                    // something terribly gone wrong
                    if ($action != 'copy' && $action != 'cut'){
                        response(trans('wrong action').AddErrorLocation())->send();
                        exit;
                    }
                    if($ftp){
                        if ($action == 'copy')
                        {
                            $tmp = time().basename($data['path']);
                            $ftp->get($tmp, $data['path'], FTP_BINARY);
                            $ftp->put(DIRECTORY_SEPARATOR.$path, $tmp, FTP_BINARY);
                            unlink($tmp);

                            if(url_exists($data['path_thumb'])){
                                $tmp = time().basename($data['path_thumb']);
                                @$ftp->get($tmp, $data['path_thumb'], FTP_BINARY);
                                @$ftp->put(DIRECTORY_SEPARATOR.$path_thumb, $tmp, FTP_BINARY);
                                unlink($tmp);
                            }

                        } elseif ($action == 'cut') {
                            $ftp->rename($data['path'], DIRECTORY_SEPARATOR.$path);
                            if(url_exists($data['path_thumb'])){
                                @$ftp->rename($data['path_thumb'], DIRECTORY_SEPARATOR.$path_thumb);
                            }
                        }
                    }else{
                        // check for writability
                        if (is_really_writable($path) === FALSE || is_really_writable($path_thumb) === FALSE){
                            response(trans('Dir_No_Write').'<br/>'.str_replace('../','',$path).'<br/>'.str_replace('../','',$path_thumb).AddErrorLocation())->send();
                            exit;
                        }

                        // check if server disables copy or rename
                        if (is_function_callable(($action == 'copy' ? 'copy' : 'rename')) === FALSE){
                            response(sprintf(trans('Function_Disabled'), ($action == 'copy' ? (trans('Copy')) : (trans('Cut')))).AddErrorLocation())->send();
                            exit;
                        }
                        if ($action == 'copy')
                        {
                            list($sizeFolderToCopy,$fileNum,$foldersCount) = folder_info($path,false);
                            if (!checkresultingsize($sizeFolderToCopy)) {
                                response(sprintf(trans('max_size_reached'),$MaxSizeTotal).AddErrorLocation())->send();
                                exit;
                            }
                            rcopy($data['path'], $path);
                            rcopy($data['path_thumb'], $path_thumb);
                        } elseif ($action == 'cut') {
                            rrename($data['path'], $path);
                            rrename($data['path_thumb'], $path_thumb);

                            // cleanup
                            if (is_dir($data['path']) === TRUE){
                                rrename_after_cleaner($data['path']);
                                rrename_after_cleaner($data['path_thumb']);
                            }
                        }
                    }

                    // cleanup
                    $_SESSION['RF']['clipboard']['path'] = NULL;
                    $_SESSION['RF']['clipboard_action'] = NULL;

                    break;
                case 'chmod':
                    $mode = $_POST['new_mode'];
                    $rec_option = $_POST['is_recursive'];
                    $valid_options = array('none', 'files', 'folders', 'both');
                    $chmod_perm = ($_POST['folder'] ? $chmod_dirs : $chmod_files);

                    // check perm
                    if ($chmod_perm === FALSE) {
                        response(sprintf(trans('File_Permission_Not_Allowed'), (is_dir($path) ? (trans('Folders')) : (trans('Files')) )).AddErrorLocation())->send();
                        exit;
                    }
                    // check mode
                    if (!preg_match("/^[0-7]{3}$/", $mode)){
                        response(trans('File_Permission_Wrong_Mode').AddErrorLocation())->send();
                        exit;
                    }
                    // check recursive option
                    if (!in_array($rec_option, $valid_options)){
                        response(trans("wrong option").AddErrorLocation())->send();
                        exit;
                    }
                    // check if server disabled chmod
                    if (!$ftp && is_function_callable('chmod') === FALSE){
                        response(sprintf(trans('Function_Disabled'), 'chmod').AddErrorLocation())->send();
                        exit;
                    }

                    $mode = "0".$mode;
                    $mode = octdec($mode);
                    if($ftp){
                        $ftp->chmod($mode, "/".$path);
                    }else{
                        rchmod($path, $mode, $rec_option);
                    }

                    break;
                case 'save_text_file':
                    $content = $_POST['new_content'];
                    // $content = htmlspecialchars($content); not needed
                    // $content = stripslashes($content);

                    if($ftp){
                        $tmp = time();
                        file_put_contents($tmp, $content);
                        try{
                            $ftp->put("/".$path, $tmp, FTP_BINARY);
                        }catch(FtpClient\FtpException $e){
                            echo $e->getMessage();
                        }
                        unlink($tmp);
                        response(trans('File_Save_OK'))->send();
                    }else{
                        // no file
                        if (!file_exists($path)) {
                            response(trans('File_Not_Found').AddErrorLocation())->send();
                            exit;
                        }

                        // not writable or edit not allowed
                        if (!is_writable($path) || $edit_text_files === FALSE) {
                            response(sprintf(trans('File_Open_Edit_Not_Allowed'), strtolower(trans('Edit'))).AddErrorLocation())->send();
                            exit;
                        }

                        if (!checkresultingsize(strlen($content))) {
                            response(sprintf(trans('max_size_reached'),$MaxSizeTotal).AddErrorLocation())->send();
                            exit;
                        }
                        if (@file_put_contents($path, $content) === FALSE) {
                            response(trans('File_Save_Error').AddErrorLocation())->send();
                            exit;
                        } else {
                            response(trans('File_Save_OK'))->send();
                            exit;
                        }
                    }

                    break;
                default:
                    response(trans('wrong action').AddErrorLocation())->send();
                    exit;
            }
        }


        break;

    case 'upload':


        if ($_SESSION['RF']["verify"] != "RESPONSIVEfilemanager")
        {
            response(trans('forbiden').AddErrorLocation(), 403)->send();
            exit;
        }

        include 'include/mime_type_lib.php';


        $ftp=ftp_con($config);
        if($ftp){
            $source_base = $config['ftp_base_folder'].$config['upload_dir'];
            $thumb_base = $config['ftp_base_folder'].$config['ftp_thumbs_dir'];

        }else{
            $source_base = $config['current_path'];
            $thumb_base = $config['thumbs_base_path'];
        }
        if(isset($_POST["fldr"])){
            $_POST['fldr'] = str_replace('undefined','',$_POST['fldr']);
            $storeFolder = $source_base.$_POST["fldr"];
            $storeFolderThumb = $thumb_base.$_POST["fldr"];
        }else{
            return;
        }

        if (strpos($_POST["fldr"],'../') !== FALSE
            || strpos($_POST["fldr"],'./') !== FALSE
            || strpos($_POST["fldr"],'..\\') !== FALSE
            || strpos($_POST["fldr"],'.\\') !== FALSE )
        {
            response(trans('wrong path'.AddErrorLocation()))->send();
            exit;
        }

        $path = $storeFolder;
        $cycle = TRUE;
        $max_cycles = 50;
        $i = 0;
//GET config
        while ($cycle && $i < $max_cycles)
        {
            $i++;
            if ($path == $config['current_path']) $cycle = FALSE;
            if (file_exists($path."config.php"))
            {
                $configTemp = include $path.'config.php';
                $config = $config + $configTemp;
                //TODO switch to array
                $cycle = FALSE;
            }
            $path = fix_dirname($path).'/';
        }

        require('UploadHandler.php');
        $messages = null;
        if(trans("Upload_error_messages")!=="Upload_error_messages"){
            $messages = trans("Upload_error_messages");
        }

        if(isset($_POST['url'])){
            $temp = tempnam('/tmp','RF');
            $ch = curl_init($_POST['url']);
            $fp = fopen($temp, 'wb');
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_exec($ch);
            curl_close($ch);
            fclose($fp);

            $_FILES['files'] = array(
                'name' => array(basename($_POST['url'])),
                'tmp_name' => array($temp),
                'size' => array(filesize($temp)),
                'type' => null
            );
        }
        $info = pathinfo($_FILES['files']['name'][0]);
        $mime_type = $_FILES['files']['type'][0];
        if (function_exists('mime_content_type')){
            $mime_type = mime_content_type($_FILES['files']['tmp_name'][0]);
        }elseif(function_exists('finfo_open')){
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime_type = finfo_file($finfo, $_FILES['files']['tmp_name'][0]);
        }else{
            include 'include/mime_type_lib.php';
            $mime_type = get_file_mime_type($_FILES['files']['tmp_name'][0]);
        }
        $extension = get_extension_from_mime($mime_type);

        if($extension=='so'){
            $extension = $info['extension'];
        }
        $_FILES['files']['name'][0] = fix_filename($info['filename'].".".$extension,$config);
// LowerCase
        if ($config['lower_case'])
        {
            $_FILES['files']['name'][0] = fix_strtolower($_FILES['files']['name'][0]);
        }
        if (!checkresultingsize($_FILES['files']['size'][0])) {
            $upload_handler->response['files'][0]->error = sprintf(trans('max_size_reached'),$MaxSizeTotal).AddErrorLocation();
            echo json_encode($upload_handler->response);
            exit();
        }

        $uploadConfig = array(
            'config' => $config,
            'storeFolder' => $storeFolder,
            'storeFolderThumb' => $storeFolderThumb,
            'ftp' => $ftp,
            'upload_dir'=> dirname('./UploadHandler.php').'/'.$storeFolder,
            'upload_url' => $config['base_url'].$config['upload_dir'].$_POST['fldr'],
            'mkdir_mode' => $config['folderPermission'],
            'accept_file_types' => '/\.('.implode('|',$config['ext']).')$/i',
            'max_file_size' => $config['MaxSizeUpload']*1024*1024,
            'correct_image_extensions' => true,
            'print_response' => false
        );

        if($ftp){
            if (!is_dir($config['ftp_temp_folder'])) {
                mkdir($config['ftp_temp_folder'], $config['folderPermission'], true);
            }
            if (!is_dir($config['ftp_temp_folder']."thumbs")) {
                mkdir($config['ftp_temp_folder']."thumbs", $config['folderPermission'], true);
            }
            $uploadConfig['upload_dir'] = $config['ftp_temp_folder'];
        }

        $upload_handler = new UploadHandler($uploadConfig,true, $messages);


        break;

    case 'ajax_calls':

        if ($_SESSION['RF']["verify"] != "RESPONSIVEfilemanager")
        {
            response(trans('forbiden').AddErrorLocation())->send();
            exit;
        }
       // $languages = include 'lang/languages.php';

        if (isset($_SESSION['RF']['language']) && file_exists('lang/' . basename($_SESSION['RF']['language']) . '.php'))
        {
            if(array_key_exists($_SESSION['RF']['language'],$languages)){
                include 'lang/' . basename($_SESSION['RF']['language']) . '.php';
            }else{
                response(trans('Lang_Not_Found').AddErrorLocation())->send();
                exit;
            }
        } else {
            response(trans('Lang_Not_Found').AddErrorLocation())->send();
            exit;
        }
        $ftp = ftp_con($config);

        if(isset($_GET['action']))
        {
            switch($_GET['action'])
            {
                case 'new_file_form':
                    echo trans('Filename') . ': <input type="text" id="create_text_file_name" style="height:30px"> <select id="create_text_file_extension" style="margin:0;width:100px;">';
                    foreach($config['editable_text_file_exts'] as $ext){
                        echo '<option value=".'.$ext.'">.'.$ext.'</option>';
                    }
                    echo '</select><br><hr><textarea id="textfile_create_area" style="width:100%;height:150px;"></textarea>';
                    break;
                case 'view':
                    if(isset($_GET['type']))
                    {
                        $_SESSION['RF']["view_type"] = $_GET['type'];
                    }
                    else
                    {
                        response(trans('view type number missing').AddErrorLocation())->send();
                        exit;
                    }
                    break;
                case 'filter':
                    if (isset($_GET['type']))
                    {
                        if (isset($remember_text_filter) && $remember_text_filter)
                        {
                            $_SESSION['RF']["filter"] = $_GET['type'];
                        }
                    }
                    else {
                        response(trans('view type number missing').AddErrorLocation())->send();
                        exit;
                    }
                    break;
                case 'sort':
                    if (isset($_GET['sort_by']))
                    {
                        $_SESSION['RF']["sort_by"] = $_GET['sort_by'];
                    }

                    if (isset($_GET['descending']))
                    {
                        $_SESSION['RF']["descending"] = $_GET['descending'];
                    }
                    break;
                case 'image_size': // not used
                    $pos = strpos($_POST['path'], $upload_dir);
                    if ($pos !== false)
                    {
                        $info = getimagesize(substr_replace($_POST['path'], $current_path, $pos, strlen($upload_dir)));
                        response($info)->send();
                        exit;
                    }
                    break;
                case 'save_img':
                    $info = pathinfo($_POST['name']);

                    if (
                        strpos($_POST['path'], '/') === 0
                        || strpos($_POST['path'], '../') !== false
                        || strpos($_POST['path'], '..\\') !== false
                        || strpos($_POST['path'], './') === 0
                        || (strpos($_POST['url'], 'http://s3.amazonaws.com/feather') !== 0 && strpos($_POST['url'], 'https://s3.amazonaws.com/feather') !== 0)
                        || $_POST['name'] != fix_filename($_POST['name'], $config)
                        || ! in_array(strtolower($info['extension']), array( 'jpg', 'jpeg', 'png' ))
                    )
                    {
                        response(trans('wrong data').AddErrorLocation())->send();
                        exit;
                    }
                    $image_data = get_file_by_url($_POST['url']);
                    if ($image_data === false)
                    {
                        response(trans('Aviary_No_Save').AddErrorLocation())->send();
                        exit;
                    }

                    if (!checkresultingsize(strlen($image_data))) {
                        response(sprintf(trans('max_size_reached'),$MaxSizeTotal).AddErrorLocation())->send();
                        exit;
                    }
                    if($ftp){

                        $temp = tempnam('/tmp','RF');
                        unlink($temp);
                        $temp .=".".substr(strrchr($_POST['url'],'.'),1);
                        file_put_contents($temp,$image_data);

                        $ftp->put($ftp_base_folder.$upload_dir . $_POST['path'] . $_POST['name'], $temp, FTP_BINARY);

                        create_img($temp,$temp,122,91);
                        $ftp->put($ftp_base_folder.$ftp_thumbs_dir. $_POST['path'] . $_POST['name'], $temp, FTP_BINARY);

                        unlink($temp);
                    }else{

                        file_put_contents($current_path . $_POST['path'] . $_POST['name'],$image_data);
                        create_img($current_path . $_POST['path'] . $_POST['name'], $thumbs_base_path.$_POST['path'].$_POST['name'], 122, 91);
                        // TODO something with this function cause its blowing my mind
                        new_thumbnails_creation(
                            $current_path.$_POST['path'],
                            $current_path.$_POST['path'].$_POST['name'],
                            $_POST['name'],
                            $current_path,
                            $config
                        );
                    }
                    break;
                case 'extract':
                    if (	strpos($_POST['path'], '/') === 0
                        || strpos($_POST['path'], '../') !== false
                        || strpos($_POST['path'], '..\\') !== false
                        || strpos($_POST['path'], './') === 0)
                    {
                        response(trans('wrong path'.AddErrorLocation()))->send();
                        exit;
                    }

                    if($ftp){
                        $path = $ftp_base_url.$upload_dir . $_POST['path'];
                        $base_folder = $ftp_base_url.$upload_dir . fix_dirname($_POST['path']) . "/";
                    }else{
                        $path = $current_path . $_POST['path'];
                        $base_folder = $current_path . fix_dirname($_POST['path']) . "/";
                    }

                    $info = pathinfo($path);

                    if($ftp){
                        $tempDir = tempdir();
                        $temp = tempnam($tempDir,'RF');
                        unlink($temp);
                        $temp .=".".$info['extension'];
                        $handle = fopen($temp, "w");
                        fwrite($handle, file_get_contents($path));
                        fclose($handle);
                        $path = $temp;
                        $base_folder = $tempDir."/";
                    }

                    $info = pathinfo($path);

                    switch ($info['extension'])
                    {
                        case "zip":
                            $zip = new ZipArchive;
                            if ($zip->open($path) === true)
                            {
                                //get total size
                                $sizeTotalFinal = 0;
                                for ($i = 0; $i < $zip->numFiles; $i++)
                                {
                                    $aStat = $zip->statIndex($i);
                                    $sizeTotalFinal += $aStat['size'];
                                }
                                if (!checkresultingsize($sizeTotalFinal)) {
                                    response(sprintf(trans('max_size_reached'),$MaxSizeTotal).AddErrorLocation())->send();
                                    exit;
                                }

                                //make all the folders
                                for ($i = 0; $i < $zip->numFiles; $i++)
                                {
                                    $OnlyFileName = $zip->getNameIndex($i);
                                    $FullFileName = $zip->statIndex($i);
                                    if (substr($FullFileName['name'], -1, 1) == "/")
                                    {
                                        create_folder($base_folder . $FullFileName['name']);
                                    }
                                }
                                //unzip into the folders
                                for ($i = 0; $i < $zip->numFiles; $i++)
                                {
                                    $OnlyFileName = $zip->getNameIndex($i);
                                    $FullFileName = $zip->statIndex($i);

                                    if ( ! (substr($FullFileName['name'], -1, 1) == "/"))
                                    {
                                        $fileinfo = pathinfo($OnlyFileName);
                                        if (in_array(strtolower($fileinfo['extension']), $ext))
                                        {
                                            copy('zip://' . $path . '#' . $OnlyFileName, $base_folder . $FullFileName['name']);
                                        }
                                    }
                                }
                                $zip->close();
                            } else {
                                response(trans('Zip_No_Extract').AddErrorLocation())->send();
                                exit;
                            }

                            break;

                        case "gz":
                            // No resulting size pre-control available
                            $p = new PharData($path);
                            $p->decompress(); // creates files.tar

                            break;

                        case "tar":
                            // No resulting size pre-control available
                            // unarchive from the tar
                            $phar = new PharData($path);
                            $phar->decompressFiles();
                            $files = array();
                            check_files_extensions_on_phar($phar, $files, '', $ext);
                            $phar->extractTo($base_folder, $files, true);

                            break;

                        default:
                            response(trans('Zip_Invalid').AddErrorLocation())->send();
                            exit;
                    }

                    if($ftp){
                        unlink($path);
                        $ftp->putAll($base_folder, "/".$ftp_base_folder . $upload_dir . fix_dirname($_POST['path']), FTP_BINARY);
                        deleteDir($base_folder);
                    }


                    break;
                case 'media_preview':
                    if($ftp){
                        $preview_file = $ftp_base_url.$upload_dir . $_GET['file'];
                    }else{
                        $preview_file = $current_path . $_GET["file"];
                    }
                    $info = pathinfo($preview_file);
                    ob_start();
                    ?>
                    <div id="jp_container_1" class="jp-video " style="margin:0 auto;">
                        <div class="jp-type-single">
                            <div id="jquery_jplayer_1" class="jp-jplayer"></div>
                            <div class="jp-gui">
                                <div class="jp-video-play">
                                    <a href="javascript:;" class="jp-video-play-icon" tabindex="1">play</a>
                                </div>
                                <div class="jp-interface">
                                    <div class="jp-progress">
                                        <div class="jp-seek-bar">
                                            <div class="jp-play-bar"></div>
                                        </div>
                                    </div>
                                    <div class="jp-current-time"></div>
                                    <div class="jp-duration"></div>
                                    <div class="jp-controls-holder">
                                        <ul class="jp-controls">
                                            <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
                                            <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
                                            <li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
                                            <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
                                            <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
                                            <li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
                                        </ul>
                                        <div class="jp-volume-bar">
                                            <div class="jp-volume-bar-value"></div>
                                        </div>
                                        <ul class="jp-toggles">
                                            <li><a href="javascript:;" class="jp-full-screen" tabindex="1" title="full screen">full screen</a></li>
                                            <li><a href="javascript:;" class="jp-restore-screen" tabindex="1" title="restore screen">restore screen</a></li>
                                            <li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
                                            <li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
                                        </ul>
                                    </div>
                                    <div class="jp-title" style="display:none;">
                                        <ul>
                                            <li></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="jp-no-solution">
                                <span>Update Required</span>
                                To play the media you will need to either update your browser to a recent version or update your <a href="https://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                            </div>
                        </div>
                    </div>
                    <?php if(in_array(strtolower($info['extension']), $ext_music)): ?>

                    <script type="text/javascript">
                        $(document).ready(function(){

                            $("#jquery_jplayer_1").jPlayer({
                                ready: function () {
                                    $(this).jPlayer("setMedia", {
                                        title:"<?php $_GET['title']; ?>",
                                        mp3: "<?php echo $preview_file; ?>",
                                        m4a: "<?php echo $preview_file; ?>",
                                        oga: "<?php echo $preview_file; ?>",
                                        wav: "<?php echo $preview_file; ?>"
                                    });
                                },
                                swfPath: "js",
                                solution:"html,flash",
                                supplied: "mp3, m4a, midi, mid, oga,webma, ogg, wav",
                                smoothPlayBar: true,
                                keyEnabled: false
                            });
                        });
                    </script>

                <?php elseif(in_array(strtolower($info['extension']), $ext_video)):	?>

                    <script type="text/javascript">
                        $(document).ready(function(){

                            $("#jquery_jplayer_1").jPlayer({
                                ready: function () {
                                    $(this).jPlayer("setMedia", {
                                        title:"<?php $_GET['title']; ?>",
                                        m4v: "<?php echo $preview_file; ?>",
                                        ogv: "<?php echo $preview_file; ?>",
                                        flv: "<?php echo $preview_file; ?>"
                                    });
                                },
                                swfPath: "js",
                                solution:"html,flash",
                                supplied: "mp4, m4v, ogv, flv, webmv, webm",
                                smoothPlayBar: true,
                                keyEnabled: false
                            });

                        });
                    </script>

                <?php endif;

                    $content = ob_get_clean();

                    response($content)->send();
                    exit;

                    break;
                case 'copy_cut':
                    if ($_POST['sub_action'] != 'copy' && $_POST['sub_action'] != 'cut')
                    {
                        response(trans('wrong sub-action').AddErrorLocation())->send();
                        exit;
                    }

                    if (strpos($_POST['path'],'../') !== FALSE
                        || strpos($_POST['path'],'./') !== FALSE
                        || strpos($_POST['path'],'..\\') !== FALSE
                        || strpos($_POST['path'],'.\\') !== FALSE )
                    {
                        response(trans('wrong path'.AddErrorLocation()))->send();
                        exit;
                    }

                    if (trim($_POST['path']) == '')
                    {
                        response(trans('no path').AddErrorLocation())->send();
                        exit;
                    }

                    $msg_sub_action = ($_POST['sub_action'] == 'copy' ? trans('Copy') : trans('Cut'));
                    $path = $current_path . $_POST['path'];

                    if (is_dir($path))
                    {
                        // can't copy/cut dirs
                        if ($copy_cut_dirs === false)
                        {
                            response(sprintf(trans('Copy_Cut_Not_Allowed'), $msg_sub_action, trans('Folders')).AddErrorLocation())->send();
                            exit;
                        }

                        list($sizeFolderToCopy,$fileNum,$foldersCount) = folder_info($path,false);
                        // size over limit
                        if ($copy_cut_max_size !== false && is_int($copy_cut_max_size)) {
                            if (($copy_cut_max_size * 1024 * 1024) < $sizeFolderToCopy) {
                                response(sprintf(trans('Copy_Cut_Size_Limit'), $msg_sub_action, $copy_cut_max_size).AddErrorLocation())->send();
                                exit;
                            }
                        }

                        // file count over limit
                        if ($copy_cut_max_count !== false && is_int($copy_cut_max_count))
                        {
                            if ($copy_cut_max_count < $fileNum)
                            {
                                response(sprintf(trans('Copy_Cut_Count_Limit'), $msg_sub_action, $copy_cut_max_count).AddErrorLocation())->send();
                                exit;
                            }
                        }

                        if (!checkresultingsize($sizeFolderToCopy)) {
                            response(sprintf(trans('max_size_reached'),$MaxSizeTotal).AddErrorLocation())->send();
                            exit;
                        }
                    } else {
                        // can't copy/cut files
                        if ($copy_cut_files === false)
                        {
                            response(sprintf(trans('Copy_Cut_Not_Allowed'), $msg_sub_action, trans('Files')).AddErrorLocation())->send();
                            exit;
                        }
                    }

                    $_SESSION['RF']['clipboard']['path'] = $_POST['path'];
                    $_SESSION['RF']['clipboard_action'] = $_POST['sub_action'];
                    break;
                case 'clear_clipboard':
                    $_SESSION['RF']['clipboard'] = null;
                    $_SESSION['RF']['clipboard_action'] = null;
                    break;
                case 'chmod':
                    if($ftp){
                        $path = $ftp_base_url . $upload_dir . $_POST['path'];
                        if (
                            ($_POST['folder']==1 && $chmod_dirs === false)
                            || ($_POST['folder']==0 && $chmod_files === false)
                            || (is_function_callable("chmod") === false) )
                        {
                            response(sprintf(trans('File_Permission_Not_Allowed'), (is_dir($path) ? trans('Folders') : trans('Files')), 403).AddErrorLocation())->send();
                            exit;
                        }
                        $info = $_POST['permissions'];
                    }else{
                        $path = $current_path . $_POST['path'];
                        if (
                            (is_dir($path) && $chmod_dirs === false)
                            || (is_file($path) && $chmod_files === false)
                            || (is_function_callable("chmod") === false) )
                        {
                            response(sprintf(trans('File_Permission_Not_Allowed'), (is_dir($path) ? trans('Folders') : trans('Files')), 403).AddErrorLocation())->send();
                            exit;
                        }

                        $perms = fileperms($path) & 0777;

                        $info = '-';

                        // Owner
                        $info .= (($perms & 0x0100) ? 'r' : '-');
                        $info .= (($perms & 0x0080) ? 'w' : '-');
                        $info .= (($perms & 0x0040) ?
                            (($perms & 0x0800) ? 's' : 'x' ) :
                            (($perms & 0x0800) ? 'S' : '-'));

                        // Group
                        $info .= (($perms & 0x0020) ? 'r' : '-');
                        $info .= (($perms & 0x0010) ? 'w' : '-');
                        $info .= (($perms & 0x0008) ?
                            (($perms & 0x0400) ? 's' : 'x' ) :
                            (($perms & 0x0400) ? 'S' : '-'));

                        // World
                        $info .= (($perms & 0x0004) ? 'r' : '-');
                        $info .= (($perms & 0x0002) ? 'w' : '-');
                        $info .= (($perms & 0x0001) ?
                            (($perms & 0x0200) ? 't' : 'x' ) :
                            (($perms & 0x0200) ? 'T' : '-'));

                    }


                    $ret = '<div id="files_permission_start">
			<form id="chmod_form">
				<table class="table file-perms-table">
					<thead>
						<tr>
							<td></td>
							<td>r&nbsp;&nbsp;</td>
							<td>w&nbsp;&nbsp;</td>
							<td>x&nbsp;&nbsp;</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>'.trans('User').'</td>
							<td><input id="u_4" type="checkbox" data-value="4" data-group="user" '.(substr($info, 1,1)=='r' ? " checked" : "").'></td>
							<td><input id="u_2" type="checkbox" data-value="2" data-group="user" '.(substr($info, 2,1)=='w' ? " checked" : "").'></td>
							<td><input id="u_1" type="checkbox" data-value="1" data-group="user" '.(substr($info, 3,1)=='x' ? " checked" : "").'></td>
						</tr>
						<tr>
							<td>'.trans('Group').'</td>
							<td><input id="g_4" type="checkbox" data-value="4" data-group="group" '.(substr($info, 4,1)=='r' ? " checked" : "").'></td>
							<td><input id="g_2" type="checkbox" data-value="2" data-group="group" '.(substr($info, 5,1)=='w' ? " checked" : "").'></td>
							<td><input id="g_1" type="checkbox" data-value="1" data-group="group" '.(substr($info, 6,1)=='x' ? " checked" : "").'></td>
						</tr>
						<tr>
							<td>'.trans('All').'</td>
							<td><input id="a_4" type="checkbox" data-value="4" data-group="all" '.(substr($info, 7,1)=='r' ? " checked" : "").'></td>
							<td><input id="a_2" type="checkbox" data-value="2" data-group="all" '.(substr($info, 8,1)=='w' ? " checked" : "").'></td>
							<td><input id="a_1" type="checkbox" data-value="1" data-group="all" '.(substr($info, 9,1)=='x' ? " checked" : "").'></td>
						</tr>
						<tr>
							<td></td>
							<td colspan="3"><input type="text" class="input-block-level" name="chmod_value" id="chmod_value" value="" data-def-value=""></td>
						</tr>
					</tbody>
				</table>';

                    if ((!$ftp && is_dir($path)) )
                    {
                        $ret .= '<div class="hero-unit" style="padding:10px;">'.trans('File_Permission_Recursive').'<br/><br/>
						<ul class="unstyled">
							<li><label class="radio"><input value="none" name="apply_recursive" type="radio" checked> '.trans('No').'</label></li>
							<li><label class="radio"><input value="files" name="apply_recursive" type="radio"> '.trans('Files').'</label></li>
							<li><label class="radio"><input value="folders" name="apply_recursive" type="radio"> '.trans('Folders').'</label></li>
							<li><label class="radio"><input value="both" name="apply_recursive" type="radio"> '.trans('Files').' & '.trans('Folders').'</label></li>
						</ul>
						</div>';
                    }

                    $ret .= '</form></div>';

                    response($ret)->send();
                    exit;

                    break;
                case 'get_lang':
                    if ( ! file_exists('lang/languages.php'))
                    {
                        response(trans('Lang_Not_Found').AddErrorLocation())->send();
                        exit;
                    }

                    $languages = include 'lang/languages.php';
                    if ( ! isset($languages) || ! is_array($languages))
                    {
                        response(trans('Lang_Not_Found').AddErrorLocation())->send();
                        exit;
                    }

                    $curr = $_SESSION['RF']['language'];

                    $ret = '<select id="new_lang_select">';
                    foreach ($languages as $code => $name)
                    {
                        $ret .= '<option value="' . $code . '"' . ($code == $curr ? ' selected' : '') . '>' . $name . '</option>';
                    }
                    $ret .= '</select>';

                    response($ret)->send();
                    exit;

                    break;
                case 'change_lang':
                    $choosen_lang = (!empty($_POST['choosen_lang']))? $_POST['choosen_lang']:"en_EN";

                    if(array_key_exists($choosen_lang,$languages)){
                        if ( ! file_exists('lang/' . $choosen_lang . '.php'))
                        {
                            response(trans('Lang_Not_Found').AddErrorLocation())->send();
                            exit;
                        }else{
                            $_SESSION['RF']['language'] = $choosen_lang;
                        }
                    }

                    break;
                case 'cad_preview':
                    if($ftp){
                        $selected_file = $ftp_base_url.$upload_dir . $_GET['file'];
                    }else{
                        $selected_file = $current_path . $_GET['file'];

                        if ( ! file_exists($selected_file))
                        {
                            response(trans('File_Not_Found').AddErrorLocation())->send();
                            exit;
                        }
                    }
                    if($ftp){
                        $url_file = $selected_file;
                    }else{
                        $url_file = $base_url . $upload_dir . str_replace($current_path, '', $_GET["file"]);
                    }

                    $cad_url = urlencode($url_file);
                    $cad_html = "<iframe src=\"//sharecad.org/cadframe/load?url=" . $url_file . "\" class=\"google-iframe\" scrolling=\"no\"></iframe>";
                    $ret = $cad_html;
                    response($ret)->send();
                    break;
                case 'get_file': // preview or edit
                    $sub_action = $_GET['sub_action'];
                    $preview_mode = $_GET["preview_mode"];

                    if ($sub_action != 'preview' && $sub_action != 'edit')
                    {
                        response(trans('wrong action').AddErrorLocation())->send();
                        exit;
                    }

                    if($ftp){
                        $selected_file = ($sub_action == 'preview' ? $ftp_base_url.$upload_dir . $_GET['file'] : $ftp_base_url.$upload_dir . $_POST['path']);
                    }else{
                        $selected_file = ($sub_action == 'preview' ? $current_path . $_GET['file'] : $current_path . $_POST['path']);

                        if ( ! file_exists($selected_file))
                        {
                            response(trans('File_Not_Found').AddErrorLocation())->send();
                            exit;
                        }
                    }

                    $info = pathinfo($selected_file);

                    if ($preview_mode == 'text')
                    {
                        $is_allowed = ($sub_action == 'preview' ? $preview_text_files : $edit_text_files);
                        $allowed_file_exts = ($sub_action == 'preview' ? $previewable_text_file_exts : $editable_text_file_exts);
                    }elseif($preview_mode == 'google') {
                        $is_allowed = $googledoc_enabled;
                        $allowed_file_exts = $googledoc_file_exts;
                    }

                    if ( ! isset($allowed_file_exts) || ! is_array($allowed_file_exts))
                    {
                        $allowed_file_exts = array();
                    }

                    if ( ! in_array($info['extension'], $allowed_file_exts)
                        || ! isset($is_allowed)
                        || $is_allowed === false
                        || (!$ftp && ! is_readable($selected_file))
                    )
                    {
                        response(sprintf(trans('File_Open_Edit_Not_Allowed'), ($sub_action == 'preview' ? strtolower(trans('Open')) : strtolower(trans('Edit')))).AddErrorLocation())->send();
                        exit;
                    }
                    if ($sub_action == 'preview')
                    {
                        if ($preview_mode == 'text')
                        {
                            // get and sanities
                            $data = file_get_contents($selected_file);
                            $data = htmlspecialchars(htmlspecialchars_decode($data));
                            $ret = '';

                            if ( ! in_array($info['extension'],$previewable_text_file_exts_no_prettify))
                            {
                                $ret .= '<script src="https://rawgit.com/google/code-prettify/master/loader/run_prettify.js?autoload=true&skin=sunburst"></script>';
                                $ret .= '<?prettify lang='.$info['extension'].' linenums=true?><pre class="prettyprint"><code class="language-'.$info['extension'].'">'.$data.'</code></pre>';
                            } else {
                                $ret .= '<pre class="no-prettify">'.$data.'</pre>';
                            }

                        }
                        elseif ($preview_mode == 'google') {
                            if($ftp){
                                $url_file = $selected_file;
                            }else{
                                $url_file = $base_url . $upload_dir . str_replace($current_path, '', $_GET["file"]);
                            }

                            $googledoc_url = urlencode($url_file);
                            $googledoc_html = "<iframe src=\"https://docs.google.com/viewer?url=" . $url_file . "&embedded=true\" class=\"google-iframe\"></iframe>";
                            $ret = $googledoc_html;
                        }
                    } else {
                        $data = stripslashes(htmlspecialchars(file_get_contents($selected_file)));
                        $ret = '<textarea id="textfile_edit_area" style="width:100%;height:300px;">'.$data.'</textarea>';
                    }

                    response($ret)->send();
                    exit;

                    break;
                default:
                    response(trans('no action passed').AddErrorLocation())->send();
                    exit;
            }
        } else {
            response(trans('no action passed').AddErrorLocation())->send();
            exit;
        }


        break;





















    default:


if (USE_ACCESS_KEYS == TRUE){
    if (!isset($_GET['akey'], $access_keys) || empty($access_keys)){
        die('Access Denied!');
    }

    $_GET['akey'] = strip_tags(preg_replace( "/[^a-zA-Z0-9\._-]/", '', $_GET['akey']));

    if (!in_array($_GET['akey'], $access_keys)){
        die('Access Denied!');
    }
}



if(isset($_POST['submit'])){
   // include 'upload.php';

    if ($_SESSION['RF']["verify"] != "RESPONSIVEfilemanager")
    {
        response(trans('forbiden').AddErrorLocation(), 403)->send();
        exit;
    }

    include 'include/mime_type_lib.php';


    $ftp=ftp_con($config);
    if($ftp){
        $source_base = $config['ftp_base_folder'].$config['upload_dir'];
        $thumb_base = $config['ftp_base_folder'].$config['ftp_thumbs_dir'];

    }else{
        $source_base = $config['current_path'];
        $thumb_base = $config['thumbs_base_path'];
    }
    if(isset($_POST["fldr"])){
        $_POST['fldr'] = str_replace('undefined','',$_POST['fldr']);
        $storeFolder = $source_base.$_POST["fldr"];
        $storeFolderThumb = $thumb_base.$_POST["fldr"];
    }else{
        return;
    }

    if (strpos($_POST["fldr"],'../') !== FALSE
        || strpos($_POST["fldr"],'./') !== FALSE
        || strpos($_POST["fldr"],'..\\') !== FALSE
        || strpos($_POST["fldr"],'.\\') !== FALSE )
    {
        response(trans('wrong path'.AddErrorLocation()))->send();
        exit;
    }

    $path = $storeFolder;
    $cycle = TRUE;
    $max_cycles = 50;
    $i = 0;
//GET config
    while ($cycle && $i < $max_cycles)
    {
        $i++;
        if ($path == $config['current_path']) $cycle = FALSE;
        if (file_exists($path."config.php"))
        {
            $configTemp = include $path.'config.php';
            $config = $config + $configTemp;
            //TODO switch to array
            $cycle = FALSE;
        }
        $path = fix_dirname($path).'/';
    }

    require('UploadHandler.php');
    $messages = null;
    if(trans("Upload_error_messages")!=="Upload_error_messages"){
        $messages = trans("Upload_error_messages");
    }

    if(isset($_POST['url'])){
        $temp = tempnam('/tmp','RF');
        $ch = curl_init($_POST['url']);
        $fp = fopen($temp, 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);

        $_FILES['files'] = array(
            'name' => array(basename($_POST['url'])),
            'tmp_name' => array($temp),
            'size' => array(filesize($temp)),
            'type' => null
        );
    }
    $info = pathinfo($_FILES['files']['name'][0]);
    $mime_type = $_FILES['files']['type'][0];
    if (function_exists('mime_content_type')){
        $mime_type = mime_content_type($_FILES['files']['tmp_name'][0]);
    }elseif(function_exists('finfo_open')){
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($finfo, $_FILES['files']['tmp_name'][0]);
    }else{
        include 'include/mime_type_lib.php';
        $mime_type = get_file_mime_type($_FILES['files']['tmp_name'][0]);
    }
    $extension = get_extension_from_mime($mime_type);

    if($extension=='so'){
        $extension = $info['extension'];
    }
    $_FILES['files']['name'][0] = fix_filename($info['filename'].".".$extension,$config);
// LowerCase
    if ($config['lower_case'])
    {
        $_FILES['files']['name'][0] = fix_strtolower($_FILES['files']['name'][0]);
    }
    if (!checkresultingsize($_FILES['files']['size'][0])) {
        $upload_handler->response['files'][0]->error = sprintf(trans('max_size_reached'),$MaxSizeTotal).AddErrorLocation();
        echo json_encode($upload_handler->response);
        exit();
    }

    $uploadConfig = array(
        'config' => $config,
        'storeFolder' => $storeFolder,
        'storeFolderThumb' => $storeFolderThumb,
        'ftp' => $ftp,
        'upload_dir'=> dirname('./UploadHandler.php').'/'.$storeFolder,
        'upload_url' => $config['base_url'].$config['upload_dir'].$_POST['fldr'],
        'mkdir_mode' => $config['folderPermission'],
        'accept_file_types' => '/\.('.implode('|',$config['ext']).')$/i',
        'max_file_size' => $config['MaxSizeUpload']*1024*1024,
        'correct_image_extensions' => true,
        'print_response' => false
    );

    if($ftp){
        if (!is_dir($config['ftp_temp_folder'])) {
            mkdir($config['ftp_temp_folder'], $config['folderPermission'], true);
        }
        if (!is_dir($config['ftp_temp_folder']."thumbs")) {
            mkdir($config['ftp_temp_folder']."thumbs", $config['folderPermission'], true);
        }
        $uploadConfig['upload_dir'] = $config['ftp_temp_folder'];
    }

    $upload_handler = new UploadHandler($uploadConfig,true, $messages);
}else{


    if (isset($_GET['lang']))
    {
        $lang = strip_tags($_GET['lang']);
        if(array_key_exists($lang,$languages)){
            $_SESSION['RF']['language'] = $lang;
        }
    }elseif(isset($_SESSION['RF']['language']) && $_SESSION['RF']['language'])
        $lang = strip_tags($_SESSION['RF']['language']);
    if(array_key_exists($lang,$languages)){
        $_SESSION['RF']['language'] = $lang;
    }
}


if (isset($_GET['fldr'])
    && !empty($_GET['fldr'])
    && strpos($_GET['fldr'],'../') === FALSE
    && strpos($_GET['fldr'],'./') === FALSE
    && strpos($_GET['fldr'],'..\\') === FALSE
    && strpos($_GET['fldr'],'.\\') === FALSE)
{
    $subdir = rawurldecode(trim(strip_tags($_GET['fldr']),"/") ."/");
    $_SESSION['RF']["filter"]='';
}
else { $subdir = ''; }

if($subdir == "")
{
    if(!empty($_COOKIE['last_position']) && strpos($_COOKIE['last_position'],'.') === FALSE){
        $subdir= trim($_COOKIE['last_position']);
    }
}
//remember last position
setcookie('last_position',$subdir,time() + (86400 * 7));

if ($subdir == "/") { $subdir = ""; }

// If hidden folders are specified
if(count($hidden_folders)){
    // If hidden folder appears in the path specified in URL parameter "fldr"
    $dirs = explode('/', $subdir);
    foreach($dirs as $dir){
        if($dir !== '' && in_array($dir, $hidden_folders)){
            // Ignore the path
            $subdir = "";
            break;
        }
    }
}

if ($show_total_size) {
    list($sizeCurrentFolder,$fileCurrentNum,$foldersCurrentCount) = folder_info($current_path,false);
}
/***
 *SUB-DIR CODE
 ***/
if (!isset($_SESSION['RF']["subfolder"]))
{
    $_SESSION['RF']["subfolder"] = '';
}
$rfm_subfolder = '';

if (!empty($_SESSION['RF']["subfolder"]) && strpos($_SESSION['RF']["subfolder"],'../') === FALSE && strpos($_SESSION['RF']["subfolder"],'..\\') === FALSE
    && strpos($_SESSION['RF']["subfolder"],'./') === FALSE && strpos($_SESSION['RF']["subfolder"],"/") !== 0
    && strpos($_SESSION['RF']["subfolder"],'.') === FALSE)
{
    $rfm_subfolder = $_SESSION['RF']['subfolder'];
}

if ($rfm_subfolder != "" && $rfm_subfolder[strlen($rfm_subfolder)-1] != "/") { $rfm_subfolder .= "/"; }

$ftp=ftp_con($config);

if (($ftp && !$ftp->isDir($ftp_base_folder.$upload_dir.$rfm_subfolder.$subdir)) || (!$ftp && !file_exists($current_path.$rfm_subfolder.$subdir)))
{
    $subdir = '';
    $rfm_subfolder = "";
}


$cur_dir		= $upload_dir.$rfm_subfolder.$subdir;
$cur_path		= $current_path.$rfm_subfolder.$subdir;
$thumbs_path	= $thumbs_base_path.$rfm_subfolder;
$parent			= $rfm_subfolder.$subdir;

if($ftp){
    $cur_dir = $ftp_base_folder.$cur_dir;
    $cur_path = str_replace(array('/..','..'),'',$cur_dir);
    $thumbs_path = str_replace(array('/..','..'),'',$ftp_base_folder.$ftp_thumbs_dir.$rfm_subfolder);
    $parent = $ftp_base_folder.$parent;
}

if(!$ftp){
    $cycle = TRUE;
    $max_cycles = 50;
    $i = 0;
    while($cycle && $i < $max_cycles){
        $i++;
        if ($parent=="./") $parent="";

        if (file_exists($current_path.$parent."config.php"))
        {
            $configTemp = include $current_path.$parent.'config.php';
            $config = $config + $configTemp;
            extract($config, EXTR_OVERWRITE);
            $cycle = FALSE;
        }

        if ($parent == "") $cycle = FALSE;
        else $parent = fix_dirname($parent)."/";
    }

    if (!is_dir($thumbs_path.$subdir))
    {
        create_folder(FALSE, $thumbs_path.$subdir);
    }
}
if (isset($_GET['callback']))
{
    $callback = strip_tags($_GET['callback']);
}
else $callback=0;
if (isset($_GET['popup']))
{
    $popup = strip_tags($_GET['popup']);
} else $popup=0;
//Sanitize popup
$popup=!!$popup;

if (isset($_GET['crossdomain']))
{
    $crossdomain = strip_tags($_GET['crossdomain']);
} else $crossdomain=0;

//Sanitize crossdomain
$crossdomain=!!$crossdomain;

//view type
if(!isset($_SESSION['RF']["view_type"]))
{
    $view = $default_view;
    $_SESSION['RF']["view_type"] = $view;
}

if (isset($_GET['view']))
{
    $view = fix_get_params($_GET['view']);
    $_SESSION['RF']["view_type"] = $view;
}

$view = $_SESSION['RF']["view_type"];

//filter
$filter = "";
if(isset($_SESSION['RF']["filter"]))
{
    $filter = $_SESSION['RF']["filter"];
}

if(isset($_GET["filter"]))
{
    $filter = fix_get_params($_GET["filter"]);
}

if (!isset($_SESSION['RF']['sort_by']))
{
    $_SESSION['RF']['sort_by'] = 'name';
}

if (isset($_GET["sort_by"]))
{
    $sort_by = $_SESSION['RF']['sort_by'] = fix_get_params($_GET["sort_by"]);
} else $sort_by = $_SESSION['RF']['sort_by'];


if (!isset($_SESSION['RF']['descending']))
{
    $_SESSION['RF']['descending'] = TRUE;
}

if (isset($_GET["descending"]))
{
    $descending = $_SESSION['RF']['descending'] = fix_get_params($_GET["descending"])==1;
} else {
    $descending = $_SESSION['RF']['descending'];
}

$boolarray = Array(false => 'false', true => 'true');

$return_relative_url = isset($_GET['relative_url']) && $_GET['relative_url'] == "1" ? true : false;

if (!isset($_GET['type'])){
    $_GET['type'] = 0;
}

$extensions=null;
if (isset($_GET['extensions'])){
    $extensions = json_decode(urldecode($_GET['extensions']));
    if($extensions){
        $ext = $extensions;
        $show_filter_buttons = false;
    }
}

if (isset($_GET['editor']))
{
    $editor = strip_tags($_GET['editor']);
} else {
    if($_GET['type']==0){
        $editor=false;
    } else {
        $editor='tinymce';
    }
}

if (!isset($_GET['field_id'])) $_GET['field_id'] = '';

$field_id = isset($_GET['field_id']) ? fix_get_params($_GET['field_id']) : '';
$type_param = fix_get_params($_GET['type']);

if ($type_param==1) 	 $apply = 'apply_img';
elseif($type_param==2) $apply = 'apply_link';
elseif($type_param==0 && $_GET['field_id']=='') $apply = 'apply_none';
elseif($type_param==3) $apply = 'apply_video';
else $apply = 'apply';

$get_params = array(
    'editor'    => $editor,
    'type'      => $type_param,
    'lang'      => $lang,
    'popup'     => $popup,
    'crossdomain' => $crossdomain,
    'extensions' => ($extensions) ? urlencode(json_encode($extensions)) : null ,
    'field_id'  => $field_id,
    'relative_url' => $return_relative_url,
    'akey' 		=> (isset($_GET['akey']) && $_GET['akey'] != '' ? $_GET['akey'] : 'key')
);
if(isset($_GET['CKEditorFuncNum'])){
    $get_params['CKEditorFuncNum'] = $_GET['CKEditorFuncNum'];
    $get_params['CKEditor'] = (isset($_GET['CKEditor'])? $_GET['CKEditor'] : '');
}
$get_params['fldr'] ='';

$get_params = http_build_query($get_params);
?>
<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="robots" content="noindex,nofollow">
    <title>Responsive FileManager</title>
    <link rel="shortcut icon" href="<?php echo APP_URL ?>/system/lib/filemanager/img/ico/favicon.ico">
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="<?php echo APP_URL ?>/system/lib/filemanager/css/jquery.fileupload.css">
    <link rel="stylesheet" href="<?php echo APP_URL ?>/system/lib/filemanager/css/jquery.fileupload-ui.css">
    <!-- CSS adjustments for browsers with JavaScript disabled -->
    <noscript><link rel="stylesheet" href="<?php echo APP_URL ?>/system/lib/filemanager/css/jquery.fileupload-noscript.css"></noscript>
    <noscript><link rel="stylesheet" href="<?php echo APP_URL ?>/system/lib/filemanager/css/jquery.fileupload-ui-noscript.css"></noscript>
    <link href="<?php echo APP_URL ?>/system/lib/filemanager/js/jPlayer/skin/blue.monday/jplayer.blue.monday.css" rel="stylesheet" type="text/css">
    <link href="<?php echo APP_URL ?>/system/lib/filemanager/css/style.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css" />
    <!--[if lt IE 8]><style>
        .img-container span, .img-container-mini span {
            display: inline-block;
            height: 100%;
        }
    </style><![endif]-->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo APP_URL ?>/system/lib/filemanager/js/plugins.js?v=<?php echo $version; ?>"></script>
    <script src="<?php echo APP_URL ?>/system/lib/filemanager/js/jPlayer/jquery.jplayer/jquery.jplayer.js"></script>
    <script src="<?php echo APP_URL ?>/system/lib/filemanager/js/modernizr.custom.js"></script>

    <?php
    if ($aviary_active){
        if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) { ?>
            <script src="https://dme0ih8comzn4.cloudfront.net/imaging/v3/editor.js"></script>
        <?php }else{ ?>
            <script src="http://feather.aviary.com/imaging/v3/editor.js"></script>
        <?php }} ?>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
    <![endif]-->

    <script>
        var ext_img=new Array('<?php echo implode("','", $ext_img)?>');
        var allowed_ext=new Array('<?php echo implode("','", $ext)?>');
        var image_editor=<?php echo $aviary_active?"true":"false";?>;
        if (image_editor) {
            var featherEditor = new Aviary.Feather({
                <?php
                foreach ($aviary_defaults_config as $aopt_key => $aopt_val) {
                    echo $aopt_key.": ".json_encode($aopt_val).",";
                } ?>
                onReady: function() {
                    hide_animation();
                },
                onSave: function(imageID, newURL) {
                    show_animation();
                    var img = document.getElementById(imageID);
                    img.src = newURL;
                    $.ajax({
                        type: "POST",
                        url: "<?php echo U ?>mediabox/ajax_calls/&action=save_img",
                        data: { url: newURL, path:$('#sub_folder').val()+$('#fldr_value').val(), name:$('#aviary_img').attr('data-name') }
                    }).done(function( msg ) {
                        featherEditor.close();
                        d = new Date();
                        $("figure[data-name='"+$('#aviary_img').attr('data-name')+"']").find('img').each(function(){
                            $(this).attr('src',$(this).attr('src')+"?"+d.getTime());
                        });
                        $("figure[data-name='"+$('#aviary_img').attr('data-name')+"']").find('figcaption a.preview').each(function(){
                            $(this).attr('data-url',$(this).data('url')+"?"+d.getTime());
                        });
                        hide_animation();
                    });
                    return false;
                },
                onError: function(errorObj) {
                    bootbox.alert(errorObj.message);
                    hide_animation();
                }

            });
        }
    </script>
    <script src="<?php echo APP_URL ?>/system/lib/filemanager/js/include.js?v=<?php echo $version; ?>"></script>
</head>
<body>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php echo APP_URL ?>/system/lib/filemanager/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo APP_URL ?>/system/lib/filemanager/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="<?php echo APP_URL ?>/system/lib/filemanager/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="<?php echo APP_URL ?>/system/lib/filemanager/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="<?php echo APP_URL ?>/system/lib/filemanager/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="<?php echo APP_URL ?>/system/lib/filemanager/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="<?php echo APP_URL ?>/system/lib/filemanager/js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="<?php echo APP_URL ?>/system/lib/filemanager/js/jquery.fileupload-ui.js"></script>

<input type="hidden" id="ftp" value="<?php echo !!$ftp; ?>" />
<input type="hidden" id="popup" value="<?php echo $popup;?>" />
<input type="hidden" id="callback" value="<?php echo $callback; ?>" />
<input type="hidden" id="crossdomain" value="<?php echo $crossdomain;?>" />
<input type="hidden" id="editor" value="<?php echo $editor;?>" />
<input type="hidden" id="view" value="<?php echo $view;?>" />
<input type="hidden" id="subdir" value="<?php echo $subdir;?>" />
<input type="hidden" id="field_id" value="<?php echo $field_id;?>" />
<input type="hidden" id="type_param" value="<?php echo $type_param;?>" />
<input type="hidden" id="upload_dir" value="<?php echo $upload_dir;?>" />
<input type="hidden" id="cur_dir" value="<?php echo $cur_dir;?>" />
<input type="hidden" id="cur_dir_thumb" value="<?php echo $thumbs_path.$subdir;?>" />
<input type="hidden" id="insert_folder_name" value="<?php echo trans('Insert_Folder_Name');?>" />
<input type="hidden" id="new_folder" value="<?php echo trans('New_Folder');?>" />
<input type="hidden" id="ok" value="<?php echo trans('OK');?>" />
<input type="hidden" id="cancel" value="<?php echo trans('Cancel');?>" />
<input type="hidden" id="rename" value="<?php echo trans('Rename');?>" />
<input type="hidden" id="lang_duplicate" value="<?php echo trans('Duplicate');?>" />
<input type="hidden" id="duplicate" value="<?php if($duplicate_files) echo 1; else echo 0;?>" />
<input type="hidden" id="base_url" value="<?php echo $base_url?>"/>
<input type="hidden" id="ftp_base_url" value="<?php echo $ftp_base_url?>"/>
<input type="hidden" id="fldr_value" value="<?php echo $subdir;?>"/>
<input type="hidden" id="sub_folder" value="<?php echo $rfm_subfolder;?>"/>
<input type="hidden" id="return_relative_url" value="<?php echo $return_relative_url == true ? 1 : 0;?>"/>
<input type="hidden" id="file_number_limit_js" value="<?php echo $file_number_limit_js;?>" />
<input type="hidden" id="sort_by" value="<?php echo $sort_by;?>" />
<input type="hidden" id="descending" value="<?php echo $descending?1:0;?>" />
<input type="hidden" id="current_url" value="<?php echo str_replace(array('&filter='.$filter,'&sort_by='.$sort_by,'&descending='.intval($descending)),array(''),$base_url.$_SERVER['REQUEST_URI']);?>" />
<input type="hidden" id="lang_show_url" value="<?php echo trans('Show_url');?>" />
<input type="hidden" id="copy_cut_files_allowed" value="<?php if($copy_cut_files) echo 1; else echo 0;?>" />
<input type="hidden" id="copy_cut_dirs_allowed" value="<?php if($copy_cut_dirs) echo 1; else echo 0;?>" />
<input type="hidden" id="copy_cut_max_size" value="<?php echo $copy_cut_max_size;?>" />
<input type="hidden" id="copy_cut_max_count" value="<?php echo $copy_cut_max_count;?>" />
<input type="hidden" id="lang_copy" value="<?php echo trans('Copy');?>" />
<input type="hidden" id="lang_cut" value="<?php echo trans('Cut');?>" />
<input type="hidden" id="lang_paste" value="<?php echo trans('Paste');?>" />
<input type="hidden" id="lang_paste_here" value="<?php echo trans('Paste_Here');?>" />
<input type="hidden" id="lang_paste_confirm" value="<?php echo trans('Paste_Confirm');?>" />
<input type="hidden" id="lang_files" value="<?php echo trans('Files');?>" />
<input type="hidden" id="lang_folders" value="<?php echo trans('Folders');?>" />
<input type="hidden" id="lang_files_on_clipboard" value="<?php echo trans('Files_ON_Clipboard');?>" />
<input type="hidden" id="clipboard" value="<?php echo ((isset($_SESSION['RF']['clipboard']['path']) && trim($_SESSION['RF']['clipboard']['path']) != null) ? 1 : 0);?>" />
<input type="hidden" id="lang_clear_clipboard_confirm" value="<?php echo trans('Clear_Clipboard_Confirm');?>" />
<input type="hidden" id="lang_file_permission" value="<?php echo trans('File_Permission');?>" />
<input type="hidden" id="chmod_files_allowed" value="<?php if($chmod_files) echo 1; else echo 0;?>" />
<input type="hidden" id="chmod_dirs_allowed" value="<?php if($chmod_dirs) echo 1; else echo 0;?>" />
<input type="hidden" id="lang_lang_change" value="<?php echo trans('Lang_Change');?>" />
<input type="hidden" id="edit_text_files_allowed" value="<?php if($edit_text_files) echo 1; else echo 0;?>" />
<input type="hidden" id="lang_edit_file" value="<?php echo trans('Edit_File');?>" />
<input type="hidden" id="lang_new_file" value="<?php echo trans('New_File');?>" />
<input type="hidden" id="lang_filename" value="<?php echo trans('Filename');?>" />
<input type="hidden" id="lang_file_info" value="<?php echo fix_strtoupper(trans('File_info'));?>" />
<input type="hidden" id="lang_edit_image" value="<?php echo trans('Edit_image');?>" />
<input type="hidden" id="lang_error_upload" value="<?php echo trans('Error_Upload');?>" />
<input type="hidden" id="lang_select" value="<?php echo trans('Select');?>" />
<input type="hidden" id="lang_extract" value="<?php echo trans('Extract');?>" />
<input type="hidden" id="transliteration" value="<?php echo $transliteration?"true":"false";?>" />
<input type="hidden" id="convert_spaces" value="<?php echo $convert_spaces?"true":"false";?>" />
<input type="hidden" id="replace_with" value="<?php echo $convert_spaces? $replace_with : "";?>" />
<input type="hidden" id="lower_case" value="<?php echo $lower_case?"true":"false";?>" />
<input type="hidden" id="show_folder_size" value="<?php echo $show_folder_size;?>" />
<input type="hidden" id="add_time_to_img" value="<?php echo $add_time_to_img;?>" />
<?php if($upload_files){ ?>
    <!-- uploader div start -->
    <div class="uploader">
        <div class="flex">
            <div class="text-center">
                <button class="btn btn-inverse close-uploader"><i class="icon-backward icon-white"></i> <?php echo trans('Return_Files_List')?></button>
            </div>
            <div class="space10"></div>
            <div class="tabbable upload-tabbable"> <!-- Only required for left/right tabs -->
                <div class="container1">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#baseUpload" data-toggle="tab"><?php echo trans('Upload_base');?></a></li>
                        <?php if($url_upload){ ?>
                            <li><a href="#urlUpload" data-toggle="tab"><?php echo trans('Upload_url');?></a></li>
                        <?php } ?>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="baseUpload">
                            <!-- The file upload form used as target for the file upload widget -->
                            <form id="fileupload" action="" method="POST" enctype="multipart/form-data">
                                <div class="container2">
                                    <div class="fileupload-buttonbar">
                                        <!-- The global progress state -->
                                        <div class="fileupload-progress fade">
                                            <!-- The global progress bar -->
                                            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                <div class="bar bar-success" style="width:0%;"></div>
                                            </div>
                                            <!-- The extended global progress state -->
                                            <div class="progress-extended"></div>
                                        </div>
                                        <div class="text-center">
                                            <!-- The fileinput-button span is used to style the file input field as button -->
                                            <span class="btn btn-success fileinput-button">
					                    <i class="glyphicon glyphicon-plus"></i>
					                    <span><?php echo trans('Upload_add_files');?></span>
					                    <input type="file" name="files[]" multiple="multiple">
					                </span>
                                            <button type="submit" class="btn btn-primary start">
                                                <i class="glyphicon glyphicon-upload"></i>
                                                <span><?php echo trans('Upload_start');?></span>
                                            </button>
                                            <!-- The global file processing state -->
                                            <span class="fileupload-process"></span>
                                        </div>
                                    </div>
                                    <!-- The table listing the files available for upload/download -->
                                    <div id="filesTable">
                                        <table role="presentation" class="table table-striped table-condensed small"><tbody class="files"></tbody></table>
                                    </div>
                                    <div class="upload-help"><?php echo trans('Upload_base_help');?></div>
                                </div>
                            </form>
                            <!-- The template to display files available for upload -->
                            <script id="template-upload" type="text/x-tmpl">
					{% for (var i=0, file; file=o.files[i]; i++) { %}
					    <tr class="template-upload fade">
					        <td>
					            <span class="preview"></span>
					        </td>
					        <td>
					            <p class="name">{%=file.relativePath%}{%=file.name%}</p>
					            <strong class="error text-danger"></strong>
					        </td>
					        <td>
					            <p class="size">Processing...</p>
					            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar bar-success" style="width:0%;"></div></div>
					        </td>
					        <td>
					            {% if (!i && !o.options.autoUpload) { %}
					                <button class="btn btn-primary start" disabled style="display:none">
					                    <i class="glyphicon glyphicon-upload"></i>
					                    <span>Start</span>
					                </button>
					            {% } %}
					            {% if (!i) { %}
					                <button class="btn btn-link cancel">
					                    <i class="icon-remove"></i>
					                </button>
					            {% } %}
					        </td>
					    </tr>
					{% } %}
					</script>
                            <!-- The template to display files available for download -->
                            <script id="template-download" type="text/x-tmpl">
					{% for (var i=0, file; file=o.files[i]; i++) { %}
					    <tr class="template-download fade">
					        <td>
					            <span class="preview">
					            	{% if (file.error) { %}
					                <i class="icon icon-remove"></i>
					                {% } else { %}
					                <i class="icon icon-ok"></i>
					                {% } %}
					            </span>
					        </td>
					        <td>
					            <p class="name">
					                {% if (file.url) { %}
					                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
					                {% } else { %}
					                    <span>{%=file.name%}</span>
					                {% } %}
					            </p>
					            {% if (file.error) { %}
					                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
					            {% } %}
					        </td>
					        <td>
					            <span class="size">{%=o.formatFileSize(file.size)%}</span>
					        </td>
					        <td></td>
					    </tr>
					{% } %}
					</script>
                        </div>
                        <?php if($url_upload){ ?>
                            <div class="tab-pane" id="urlUpload">
                                <br/>
                                <form class="form-horizontal">
                                    <div class="control-group">
                                        <label class="control-label" for="url"><?php echo trans('Upload_url');?></label>
                                        <div class="controls">
                                            <input type="text" class="input-block-level" id="url" placeholder="<?php echo trans('Upload_url');?>">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button class="btn btn-primary" id="uploadURL"><?php echo  trans('Upload_file');?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- uploader div end -->

<?php } ?>
<div class="container-fluid">

    <?php
    $class_ext = '';
    $src = '';
    if($ftp){
        try{
            $files = $ftp->scanDir($ftp_base_folder.$upload_dir.$rfm_subfolder.$subdir);
            if (!$ftp->isDir($ftp_base_folder.$ftp_thumbs_dir.$rfm_subfolder.$subdir)){
                create_folder(false,$ftp_base_folder.$ftp_thumbs_dir.$rfm_subfolder.$subdir,$ftp,$config);
            }
        }catch(FtpClient\FtpException $e){
            echo "Error: ";
            echo $e->getMessage();
            echo "<br/>Please check configurations";
            die();
        }
    }else{
        $files	= scandir($current_path.$rfm_subfolder.$subdir);
    }

    $n_files= count($files);

    //php sorting
    $sorted=array();
    //$current_folder=array();
    //$prev_folder=array();
    $current_files_number = 0;
    $current_folders_number = 0;

    foreach($files as $k=>$file){
        if($ftp){
            $date = strtotime($file['day']." ".$file['month']." ".date('Y')." ".$file['time']);
            $size = $file['size'];
            if($file['type']=='file'){
                $current_files_number++;
                $file_ext = substr(strrchr($file['name'],'.'),1);
            }else{
                $current_folders_number++;
                $file_ext=trans('Type_dir');
            }
            $sorted[$k]=array(
                'file'=>$file['name'],
                'file_lcase'=>strtolower($file['name']),
                'date'=>$date,
                'size'=>$size,
                'permissions' => $file['permissions'],
                'extension'=>strtolower($file_ext)
            );
        }else{


            if($file!="." && $file!=".."){
                if(is_dir($current_path.$rfm_subfolder.$subdir.$file)){
                    $date=filemtime($current_path.$rfm_subfolder.$subdir. $file);
                    $current_folders_number++;
                    if($show_folder_size){
                        list($size,$nfiles,$nfolders) = folder_info($current_path.$rfm_subfolder.$subdir.$file,false);
                    } else {
                        $size=0;
                    }
                    $file_ext=trans('Type_dir');
                    $sorted[$k]=array(
                        'file'=>$file,
                        'file_lcase'=>strtolower($file),
                        'date'=>$date,
                        'size'=>$size,
                        'permissions' =>'',
                        'extension'=>strtolower($file_ext)
                    );
                    if($show_folder_size){
                        $sorted[$k]['nfiles'] = $nfiles;
                        $sorted[$k]['nfolders'] = $nfolders;
                    }
                }else{
                    $current_files_number++;
                    $file_path=$current_path.$rfm_subfolder.$subdir.$file;
                    $date=filemtime($file_path);
                    $size=filesize($file_path);
                    $file_ext = substr(strrchr($file,'.'),1);
                    $sorted[$k]=array(
                        'file'=>$file,
                        'file_lcase'=>strtolower($file),
                        'date'=>$date,
                        'size'=>$size,
                        'permissions' =>'',
                        'extension'=>strtolower($file_ext)
                    );
                }
            }
        }
    }


    function filenameSort($x, $y) {
        return $x['file_lcase'] <  $y['file_lcase'];
    }
    function dateSort($x, $y) {
        return $x['date'] <  $y['date'];
    }
    function sizeSort($x, $y) {
        return $x['size'] <  $y['size'];
    }
    function extensionSort($x, $y) {
        return $x['extension'] <  $y['extension'];
    }

    switch($sort_by){
        case 'date':
            usort($sorted, 'dateSort');
            break;
        case 'size':
            usort($sorted, 'sizeSort');
            break;
        case 'extension':
            usort($sorted, 'extensionSort');
            break;
        default:
            usort($sorted, 'filenameSort');
            break;
    }

    if(!$descending){
        $sorted=array_reverse($sorted);
    }

    if($subdir!=""){
        $sorted = array_merge(array(array('file'=>'..')),$sorted);
    }
    $files=$sorted;

    ?>
    <!-- header div start -->
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="brand"><?php echo trans('Toolbar');?></div>
                <div class="nav-collapse collapse">
                    <div class="filters">
                        <div class="row-fluid">
                            <div class="span4 half">
                                <?php if($upload_files){ ?>
                                    <button class="tip btn upload-btn" title="<?php echo  trans('Upload_file');?>"><i class="rficon-upload"></i></button>
                                <?php } ?>
                                <?php if($create_text_files){ ?>
                                    <button class="tip btn create-file-btn" title="<?php echo  trans('New_File');?>"><i class="icon-plus"></i><i class="icon-file"></i></button>
                                <?php } ?>
                                <?php if($create_folders){ ?>
                                    <button class="tip btn new-folder" title="<?php echo  trans('New_Folder')?>"><i class="icon-plus"></i><i class="icon-folder-open"></i></button>
                                <?php } ?>
                                <?php if($copy_cut_files || $copy_cut_dirs){ ?>
                                    <button class="tip btn paste-here-btn" title="<?php echo trans('Paste_Here');?>"><i class="rficon-clipboard-apply"></i></button>
                                    <button class="tip btn clear-clipboard-btn" title="<?php echo trans('Clear_Clipboard');?>"><i class="rficon-clipboard-clear"></i></button>
                                <?php } ?>
                            </div>
                            <div class="span2 half view-controller">
                                <button class="btn tip<?php if($view==0) echo " btn-inverse";?>" id="view0" data-value="0" title="<?php echo trans('View_boxes');?>"><i class="icon-th <?php if($view==0) echo "icon-white";?>"></i></button>
                                <button class="btn tip<?php if($view==1) echo " btn-inverse";?>" id="view1" data-value="1" title="<?php echo trans('View_list');?>"><i class="icon-align-justify <?php if($view==1) echo "icon-white";?>"></i></button>
                                <button class="btn tip<?php if($view==2) echo " btn-inverse";?>" id="view2" data-value="2" title="<?php echo trans('View_columns_list');?>"><i class="icon-fire <?php if($view==2) echo "icon-white";?>"></i></button>
                            </div>
                            <div class="span6 entire types">
                                <span><?php echo trans('Filters');?>:</span>
                                <?php if($_GET['type']!=1 && $_GET['type']!=3 && $show_filter_buttons){ ?>
                                    <?php if(count($ext_file)>0 or false){ ?>
                                        <input id="select-type-1" name="radio-sort" type="radio" data-item="ff-item-type-1" checked="checked"  class="hide"  />
                                        <label id="ff-item-type-1" title="<?php echo trans('Files');?>" for="select-type-1" class="tip btn ff-label-type-1"><i class="icon-file"></i></label>
                                    <?php } ?>
                                    <?php if(count($ext_img)>0 or false){ ?>
                                        <input id="select-type-2" name="radio-sort" type="radio" data-item="ff-item-type-2" class="hide"  />
                                        <label id="ff-item-type-2" title="<?php echo trans('Images');?>" for="select-type-2" class="tip btn ff-label-type-2"><i class="icon-picture"></i></label>
                                    <?php } ?>
                                    <?php if(count($ext_misc)>0 or false){ ?>
                                        <input id="select-type-3" name="radio-sort" type="radio" data-item="ff-item-type-3" class="hide"  />
                                        <label id="ff-item-type-3" title="<?php echo trans('Archives');?>" for="select-type-3" class="tip btn ff-label-type-3"><i class="icon-inbox"></i></label>
                                    <?php } ?>
                                    <?php if(count($ext_video)>0 or false){ ?>
                                        <input id="select-type-4" name="radio-sort" type="radio" data-item="ff-item-type-4" class="hide"  />
                                        <label id="ff-item-type-4" title="<?php echo trans('Videos');?>" for="select-type-4" class="tip btn ff-label-type-4"><i class="icon-film"></i></label>
                                    <?php } ?>
                                    <?php if(count($ext_music)>0 or false){ ?>
                                        <input id="select-type-5" name="radio-sort" type="radio" data-item="ff-item-type-5" class="hide"  />
                                        <label id="ff-item-type-5" title="<?php echo trans('Music');?>" for="select-type-5" class="tip btn ff-label-type-5"><i class="icon-music"></i></label>
                                    <?php } ?>
                                <?php } ?>
                                <input accesskey="f" type="text" class="filter-input <?php echo (($_GET['type']!=1 && $_GET['type']!=3) ? '' : 'filter-input-notype');?>" id="filter-input" name="filter" placeholder="<?php echo fix_strtolower(trans('Text_filter'));?>..." value="<?php echo $filter;?>"/><?php if($n_files>$file_number_limit_js){ ?><label id="filter" class="btn"><i class="icon-play"></i></label><?php } ?>

                                <input id="select-type-all" name="radio-sort" type="radio" data-item="ff-item-type-all" class="hide"  />
                                <label id="ff-item-type-all" title="<?php echo trans('All');?>" <?php if($_GET['type']==1 || $_GET['type']==3){ ?>style="visibility: hidden;" <?php } ?> data-item="ff-item-type-all" for="select-type-all" style="margin-rigth:0px;" class="tip btn btn-inverse ff-label-type-all"><i class="icon-remove icon-white"></i></label>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- header div end -->

    <!-- breadcrumb div start -->

    <div class="row-fluid">
        <?php
        $link= U."mediabox&".$get_params;
        ?>
        <ul class="breadcrumb">
            <li class="pull-left"><a href="<?php echo $link?>/"><i class="icon-home"></i></a></li>
            <li><span class="divider">/</span></li>
            <?php
            $bc=explode("/",$subdir);
            $tmp_path='';
            if(!empty($bc))
                foreach($bc as $k=>$b){
                    $tmp_path.=$b."/";
                    if($k==count($bc)-2){
                        ?> <li class="active"><?php echo $b?></li><?php
                    }elseif($b!=""){ ?>
                        <li><a href="<?php echo $link.$tmp_path?>"><?php echo $b?></a></li><li><span class="divider"><?php echo "/";?></span></li>
                    <?php }
                }
            ?>

<!--            <li class="pull-right"><a class="btn-small" href="javascript:void('')" id="info"><i class="icon-question-sign"></i></a></li>-->
            <?php if($show_language_selection){ ?>
<!--                <li class="pull-right"><a class="btn-small" href="javascript:void('')" id="change_lang_btn"><i class="icon-globe"></i></a></li>-->
            <?php } ?>
            <li class="pull-right"><a id="refresh" class="btn-small" href="<?php echo U ?>mediabox&<?php echo $get_params.$subdir."&".uniqid() ?>"><i class="icon-refresh"></i></a></li>

            <li class="pull-right">
                <div class="btn-group">
                    <a class="btn dropdown-toggle sorting-btn" data-toggle="dropdown" href="#">
                        <i class="icon-signal"></i>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu pull-left sorting">
                        <li class="text-center"><strong><?php echo trans('Sorting') ?></strong></li>
                        <li><a class="sorter sort-name <?php if($sort_by=="name"){ echo ($descending)?"descending":"ascending"; } ?>" href="javascript:void('')" data-sort="name"><?php echo trans('Filename');?></a></li>
                        <li><a class="sorter sort-date <?php if($sort_by=="date"){ echo ($descending)?"descending":"ascending"; } ?>" href="javascript:void('')" data-sort="date"><?php echo trans('Date');?></a></li>
                        <li><a class="sorter sort-size <?php if($sort_by=="size"){ echo ($descending)?"descending":"ascending"; } ?>" href="javascript:void('')" data-sort="size"><?php echo trans('Size');?></a></li>
                        <li><a class="sorter sort-extension <?php if($sort_by=="extension"){ echo ($descending)?"descending":"ascending"; } ?>" href="javascript:void('')" data-sort="extension"><?php echo trans('Type');?></a></li>
                    </ul>
                </div>
            </li>
            <li><small class="hidden-phone">(<span id="files_number"><?php echo $current_files_number."</span> ".trans('Files')." - <span id='folders_number'>".$current_folders_number."</span> ".trans('Folders');?>)</small></li>
            <?php if($show_total_size){ ?>
                <li><small class="hidden-phone"><span title="<?php echo trans('total size').$MaxSizeTotal;?>"><?php echo trans('total size').": ".makeSize($sizeCurrentFolder).(($MaxSizeTotal !== false && is_int($MaxSizeTotal))? '/'.$MaxSizeTotal.' '.trans('MB'):'');?></span></small>
                </li>
            <?php } ?>
        </ul>
    </div>
    <!-- breadcrumb div end -->
    <div class="row-fluid ff-container">
        <div class="span12">
            <?php if( ($ftp && !$ftp->isDir($ftp_base_folder.$upload_dir.$rfm_subfolder.$subdir))  || (!$ftp && @opendir($current_path.$rfm_subfolder.$subdir)===FALSE)){ ?>
            <br/>
            <div class="alert alert-error">There is an error! The upload folder there isn't. Check your config.php file. </div>
            <?php }else{ ?>
            <h4 id="help"><?php echo trans('Swipe_help');?></h4>
            <?php if(isset($folder_message)){ ?>
            <div class="alert alert-block"><?php echo $folder_message;?></div>
            <?php } ?>
            <?php if($show_sorting_bar){ ?>
            <!-- sorter -->
            <div class="sorter-container <?php echo "list-view".$view;?>">
                <div class="file-name"><a class="sorter sort-name <?php if($sort_by=="name"){ echo ($descending)?"descending":"ascending"; } ?>" href="javascript:void('')" data-sort="name"><?php echo trans('Filename');?></a></div>
                <div class="file-date"><a class="sorter sort-date <?php if($sort_by=="date"){ echo ($descending)?"descending":"ascending"; } ?>" href="javascript:void('')" data-sort="date"><?php echo trans('Date');?></a></div>
                <div class="file-size"><a class="sorter sort-size <?php if($sort_by=="size"){ echo ($descending)?"descending":"ascending"; } ?>" href="javascript:void('')" data-sort="size"><?php echo trans('Size');?></a></div>
                <div class='img-dimension'><?php echo trans('Dimension');?></div>
                <div class='file-extension'><a class="sorter sort-extension <?php if($sort_by=="extension"){ echo ($descending)?"descending":"ascending"; } ?>" href="javascript:void('')" data-sort="extension"><?php echo trans('Type');?></a></div>
                <div class='file-operations'><?php echo trans('Operations');?></div>
            </div>
            <?php } ?>

            <input type="hidden" id="file_number" value="<?php echo $n_files;?>" />
            <!--ul class="thumbnails ff-items"-->
            <ul class="grid cs-style-2 <?php echo "list-view".$view;?>" id="main-item-container">
                <?php
                $jplayer_ext=array("mp4","flv","webmv","webma","webm","m4a","m4v","ogv","oga","mp3","midi","mid","ogg","wav");


                foreach ($files as $file_array) {
                    $file=$file_array['file'];
                    if($file == '.' || ( substr($file, 0, 1) == '.' && isset( $file_array[ 'extension' ] ) && $file_array[ 'extension' ] == strtolower(trans( 'Type_dir' ) )) || (isset($file_array['extension']) && $file_array['extension']!=strtolower(trans('Type_dir'))) || ($file == '..' && $subdir == '') || in_array($file, $hidden_folders) || ($filter!='' && $n_files>$file_number_limit_js && $file!=".." && stripos($file,$filter)===false)){
                        continue;
                    }
                    $new_name=fix_filename($file,$config);
                    if($ftp && $file!='..' && $file!=$new_name){
                        //rename
                        rename_folder($current_path.$subdir.$file,$new_name,$ftp,$config);
                        $file=$new_name;
                    }
                    //add in thumbs folder if not exist
                    if($file!='..'){
                        if(!$ftp && !file_exists($thumbs_path.$subdir.$file)){
                            create_folder(false,$thumbs_path.$subdir.$file,$ftp,$config);
                        }
                    }

                    $class_ext = 3;
                    if($file=='..' && trim($subdir) != '' ){
                        $src = explode("/",$subdir);
                        unset($src[count($src)-2]);
                        $src=implode("/",$src);
                        if($src=='') $src="/";
                    }
                    elseif ($file!='..') {
                        $src = $subdir . $file."/";
                    }

                    ?>
                    <li data-name="<?php echo $file ?>" class="<?php if($file=='..') echo 'back'; else echo 'dir';?>" <?php if(($filter!='' && stripos($file,$filter)===false)) echo ' style="display:none;"';?>><?php
                        $file_prevent_rename = false;
                        $file_prevent_delete = false;
                        if (isset($filePermissions[$file])) {
                            $file_prevent_rename = isset($filePermissions[$file]['prevent_rename']) && $filePermissions[$file]['prevent_rename'];
                            $file_prevent_delete = isset($filePermissions[$file]['prevent_delete']) && $filePermissions[$file]['prevent_delete'];
                        }
                        ?><figure data-name="<?php echo $file ?>" class="<?php if($file=="..") echo "back-";?>directory" data-type="<?php if($file!=".."){ echo "dir"; } ?>">
                            <?php if($file==".."){ ?>
                                <input type="hidden" class="path" value="<?php echo str_replace('.','',dirname($rfm_subfolder.$subdir));?>"/>
                                <input type="hidden" class="path_thumb" value="<?php echo dirname($thumbs_path.$subdir)."/";?>"/>
                            <?php } ?>
                            <a class="folder-link" href="<?php echo U ?>mediabox&<?php echo $get_params.rawurlencode($src)."&".($callback?'callback='.$callback."&":'').uniqid() ?>">
                                <div class="img-precontainer">
                                    <div class="img-container directory"><span></span>
                                        <img class="directory-img" data-src="<?php echo APP_URL ?>/system/lib/filemanager/img/<?php echo $icon_theme;?>/folder<?php if($file==".."){ echo "_back"; }?>.png" />
                                    </div>
                                </div>
                                <div class="img-precontainer-mini directory">
                                    <div class="img-container-mini">
                                        <span></span>
                                        <img class="directory-img" data-src="<?php echo APP_URL ?>/system/lib/filemanager/img/<?php echo $icon_theme;?>/folder<?php if($file==".."){ echo "_back"; }?>.png" />
                                    </div>
                                </div>
                                <?php if($file==".."){ ?>
                                <div class="box no-effect">
                                    <h4><?php echo trans('Back') ?></h4>
                                </div>
                            </a>

                        <?php }else{ ?>
                            </a>
                            <div class="box">
                                <h4 class="<?php if($ellipsis_title_after_first_row){ echo "ellipsis"; } ?>"><a class="folder-link" data-file="<?php echo $file ?>" href="<?php echo U ?>mediabox&<?php echo $get_params.rawurlencode($src)."&".uniqid() ?>"><?php echo $file;?></a></h4>
                            </div>
                            <input type="hidden" class="name" value="<?php echo $file_array['file_lcase'];?>"/>
                            <input type="hidden" class="date" value="<?php echo $file_array['date'];?>"/>
                            <input type="hidden" class="size" value="<?php echo $file_array['size'];?>"/>
                            <input type="hidden" class="extension" value="<?php echo trans('Type_dir');?>"/>
                            <div class="file-date"><?php echo date(trans('Date_type'),$file_array['date']);?></div>
                            <?php if($show_folder_size){ ?>
                                <div class="file-size"><?php echo makeSize($file_array['size']);?></div>
                                <input type="hidden" class="nfiles" value="<?php echo $file_array['nfiles'];?>"/>
                                <input type="hidden" class="nfolders" value="<?php echo $file_array['nfolders'];?>"/>
                            <?php } ?>
                            <div class='file-extension'><?php echo trans('Type_dir');?></div>
                            <figcaption>
                                <a href="javascript:void('')" class="tip-left edit-button rename-file-paths <?php if($rename_folders && !$file_prevent_rename) echo "rename-folder";?>" title="<?php echo trans('Rename')?>" data-folder="1" data-permissions="<?php echo $file_array['permissions']; ?>" data-path="<?php echo $rfm_subfolder.$subdir.$file;?>">
                                    <i class="icon-pencil <?php if(!$rename_folders || $file_prevent_rename) echo 'icon-white';?>"></i></a>
                                <a href="javascript:void('')" class="tip-left erase-button <?php if($delete_folders && !$file_prevent_delete) echo "delete-folder";?>" title="<?php echo trans('Erase')?>" data-confirm="<?php echo trans('Confirm_Folder_del');?>" data-path="<?php echo $rfm_subfolder.$subdir.$file;?>" >
                                    <i class="icon-trash <?php if(!$delete_folders || $file_prevent_delete) echo 'icon-white';?>"></i>
                                </a>
                            </figcaption>
                        <?php } ?>
                        </figure>
                    </li>
                    <?php
                }


                $files_prevent_duplicate = array();
                foreach ($files as $nu=>$file_array) {
                $file=$file_array['file'];

                if($file == '.' || $file == '..' || $file_array['extension']==trans('Type_dir') || in_array($file, $hidden_files) || !in_array(fix_strtolower($file_array['extension']), $ext) || ($filter!='' && $n_files>$file_number_limit_js && stripos($file,$filter)===false))
                    continue;

                $filename=substr($file, 0, '-' . (strlen($file_array['extension']) + 1));
                if(!$ftp){
                    $file_path=$current_path.$rfm_subfolder.$subdir.$file;
                    //check if file have illegal caracter

                    if($file!=fix_filename($file,$config)){
                        $file1=fix_filename($file,$config);
                        $file_path1=($current_path.$rfm_subfolder.$subdir.$file1);
                        if(file_exists($file_path1)){
                            $i = 1;
                            $info=pathinfo($file1);
                            while(file_exists($current_path.$rfm_subfolder.$subdir.$info['filename'].".[".$i."].".$info['extension'])) {
                                $i++;
                            }
                            $file1=$info['filename'].".[".$i."].".$info['extension'];
                            $file_path1=($current_path.$rfm_subfolder.$subdir.$file1);
                        }

                        $filename=substr($file1, 0, '-' . (strlen($file_array['extension']) + 1));
                        rename_file($file_path,fix_filename($filename,$config),$ftp,$config);
                        $file=$file1;
                        $file_array['extension']=fix_filename($file_array['extension'],$config);
                        $file_path=$file_path1;
                    }
                }else{
                    $file_path = $config['ftp_base_url'].$upload_dir.$rfm_subfolder.$subdir.$file;
                }

                $is_img=false;
                $is_video=false;
                $is_audio=false;
                $show_original=false;
                $show_original_mini=false;
                $mini_src="";
                $src_thumb="";
                if(in_array($file_array['extension'], $ext_img)){
                    $src = $file_path;
                    $is_img=true;

                    $img_width = $img_height = "";
                    if($ftp){
                        $mini_src = $src_thumb = $config['ftp_base_url'].$ftp_thumbs_dir.$subdir. $file;
                        $creation_thumb_path = "/".$config['ftp_base_folder'].$ftp_thumbs_dir.$subdir. $file;
                    }else{

                        $creation_thumb_path = $mini_src = $src_thumb = $thumbs_path.$subdir. $file;

                        if(!file_exists($src_thumb) ){
                            if(!create_img($file_path, $creation_thumb_path, 122, 91,'crop',$config)){
                                $src_thumb=$mini_src="";
                            }else{
                                new_thumbnails_creation($current_path.$rfm_subfolder.$subdir,$file_path,$file,$current_path,$config);
                            }
                        }
                        //check if is smaller than thumb
                        list($img_width, $img_height, $img_type, $attr)=@getimagesize($file_path);
                        if($img_width<122 && $img_height<91){
                            $src_thumb=$file_path;
                            $show_original=true;
                        }

                        if($img_width<45 && $img_height<38){
                            $mini_src=$current_path.$rfm_subfolder.$subdir.$file;
                            $show_original_mini=true;
                        }
                    }
                }
                $is_icon_thumb=false;
                $is_icon_thumb_mini=false;
                $no_thumb=false;
                if($src_thumb==""){
                    $no_thumb=true;
                    if(file_exists('img/'.$icon_theme.'/'.$file_array['extension'].".jpg")){
                        $src_thumb =APP_URL.'/system/lib/filemanager/img/'.$icon_theme.'/'.$file_array['extension'].".jpg";
                    }else{
                        $src_thumb = APP_URL.'/system/lib/filemanager/'.$icon_theme."/default.jpg";
                    }
                    $is_icon_thumb=true;
                }
                if($mini_src==""){
                    $is_icon_thumb_mini=false;
                }

                $class_ext=0;
                if (in_array($file_array['extension'], $ext_video)) {
                    $class_ext = 4;
                    $is_video=true;
                }elseif (in_array($file_array['extension'], $ext_img)) {
                    $class_ext = 2;
                }elseif (in_array($file_array['extension'], $ext_music)) {
                    $class_ext = 5;
                    $is_audio=true;
                }elseif (in_array($file_array['extension'], $ext_misc)) {
                    $class_ext = 3;
                }else{
                    $class_ext = 1;
                }
                if((!($_GET['type']==1 && !$is_img) && !(($_GET['type']==3 && !$is_video) && ($_GET['type']==3 && !$is_audio))) && $class_ext>0){
                ?>
                <li class="ff-item-type-<?php echo $class_ext;?> file"  data-name="<?php echo $file;?>" <?php if(($filter!='' && stripos($file,$filter)===false)) echo ' style="display:none;"';?>><?php
                    $file_prevent_rename = false;
                    $file_prevent_delete = false;
                    if (isset($filePermissions[$file])) {
                        if (isset($filePermissions[$file]['prevent_duplicate']) && $filePermissions[$file]['prevent_duplicate']) {
                            $files_prevent_duplicate[] = $file;
                        }
                        $file_prevent_rename = isset($filePermissions[$file]['prevent_rename']) && $filePermissions[$file]['prevent_rename'];
                        $file_prevent_delete = isset($filePermissions[$file]['prevent_delete']) && $filePermissions[$file]['prevent_delete'];
                    }
                    ?>		<figure data-name="<?php echo $file ?>" data-type="<?php if($is_img){ echo "img"; }else{ echo "file"; } ?>">
                        <a href="javascript:void('')" class="link" data-file="<?php echo $file;?>" data-function="<?php echo $apply;?>">
                            <div class="img-precontainer">
                                <?php if($is_icon_thumb){ ?><div class="filetype"><?php echo $file_array['extension'] ?></div><?php } ?>
                                <div class="img-container">
                                    <img class="<?php echo $show_original ? "original" : "" ?><?php echo $is_icon_thumb ? " icon" : "" ?>" data-src="<?php echo $src_thumb;?>">
                                </div>
                            </div>
                            <div class="img-precontainer-mini <?php if($is_img) echo 'original-thumb' ?>">
                                <div class="filetype <?php echo $file_array['extension'] ?> <?php if(in_array($file_array['extension'], $editable_text_file_exts)) echo 'edit-text-file-allowed' ?> <?php if(!$is_icon_thumb){ echo "hide"; }?>"><?php echo $file_array['extension'] ?></div>
                                <div class="img-container-mini">
                                    <?php if($mini_src!=""){ ?>
                                        <img class="<?php echo $show_original_mini ? "original" : "" ?><?php echo $is_icon_thumb_mini ? " icon" : "" ?>" data-src="<?php echo $mini_src;?>">
                                    <?php } ?>
                                </div>
                            </div>
                            <?php if($is_icon_thumb){ ?>
                                <div class="cover"></div>
                            <?php } ?>
                        </a>
                        <a href="javascript:void('')" class="link" data-file="<?php echo $file;?>" data-function="<?php echo $apply;?>">
                            <div class="box">
                                <h4 class="<?php if($ellipsis_title_after_first_row){ echo "ellipsis"; } ?>">
                                    <?php echo $filename;?></h4>
                            </div></a>
                        <input type="hidden" class="date" value="<?php echo $file_array['date'];?>"/>
                        <input type="hidden" class="size" value="<?php echo $file_array['size'] ?>"/>
                        <input type="hidden" class="extension" value="<?php echo $file_array['extension'];?>"/>
                        <input type="hidden" class="name" value="<?php echo $file_array['file_lcase'];?>"/>
                        <div class="file-date"><?php echo date(trans('Date_type'),$file_array['date'])?></div>
                        <div class="file-size"><?php echo makeSize($file_array['size'])?></div>
                        <div class='img-dimension'><?php if($is_img){ echo $img_width."x".$img_height; } ?></div>
                        <div class='file-extension'><?php echo $file_array['extension'];?></div>
                        <figcaption>
                            <form action="<?php echo APP_URL ?>/system/lib/filemanager/force_download.php" method="post" class="download-form" id="form<?php echo $nu;?>">
                                <input type="hidden" name="path" value="<?php echo $rfm_subfolder.$subdir?>"/>
                                <input type="hidden" class="name_download" name="name" value="<?php echo $file?>"/>

                                <a title="<?php echo trans('Download')?>" class="tip-right" href="javascript:void('')" onclick="$('#form<?php echo $nu;?>').submit();"><i class="icon-download"></i></a>
                                <?php if($is_img && $src_thumb!="" && $file_array['extension']!="tiff" && $file_array['extension']!="tif"){ ?>
                                    <a class="tip-right preview" title="<?php echo trans('Preview')?>" data-url="<?php echo $src;?>" data-toggle="lightbox" href="#previewLightbox"><i class=" icon-eye-open"></i></a>
                                <?php }elseif(($is_video || $is_audio) && in_array($file_array['extension'],$jplayer_ext)){ ?>
                                    <a class="tip-right modalAV <?php if($is_audio){ echo "audio"; }else{ echo "video"; } ?>"
                                       title="<?php echo trans('Preview')?>" data-url="<?php echo APP_URL ?>/system/lib/filemanager/<?php echo U ?>mediabox/ajax_calls/&action=media_preview&title=<?php echo $filename;?>&file=<?php echo $rfm_subfolder.$subdir.$file;?>"
                                       href="javascript:void('');" ><i class=" icon-eye-open"></i></a>
                                <?php }elseif(in_array($file_array['extension'],array('dwg', 'dxf', 'hpgl', 'plt', 'spl', 'step', 'stp', 'iges', 'igs', 'sat', 'cgm', 'svg'))){ ?>
                                    <a class="tip-right file-preview-btn" title="<?php echo trans('Preview')?>" data-url="<?php echo U ?>mediabox/ajax_calls/&action=cad_preview&title=<?php echo $filename;?>&file=<?php echo $rfm_subfolder.$subdir.$file;?>"
                                       href="javascript:void('');" ><i class=" icon-eye-open"></i></a>
                                <?php }elseif($preview_text_files && in_array($file_array['extension'],$previewable_text_file_exts)){ ?>
                                    <a class="tip-right file-preview-btn" title="<?php echo trans('Preview')?>" data-url="<?php echo U ?>mediabox/ajax_calls/&action=get_file&sub_action=preview&preview_mode=text&title=<?php echo $filename;?>&file=<?php echo $rfm_subfolder.$subdir.$file;?>"
                                       href="javascript:void('');" ><i class=" icon-eye-open"></i></a>
                                <?php }elseif($googledoc_enabled && in_array($file_array['extension'],$googledoc_file_exts)){ ?>
                                    <a class="tip-right file-preview-btn" title="<?php echo trans('Preview')?>" data-url="<?php echo U ?>mediabox/ajax_calls/&action=get_file&sub_action=preview&preview_mode=google&title=<?php echo $filename;?>&file=<?php echo $rfm_subfolder.$subdir.$file;?>"
                                       href="docs.google.com;" ><i class=" icon-eye-open"></i></a>
                                <?php }else{ ?>
                                    <a class="preview disabled"><i class="icon-eye-open icon-white"></i></a>
                                <?php } ?>
                                <a href="javascript:void('')" class="tip-left edit-button rename-file-paths <?php if($rename_files && !$file_prevent_rename) echo "rename-file";?>" title="<?php echo trans('Rename')?>" data-folder="0" data-permissions="<?php echo $file_array['permissions']; ?>" data-path="<?php echo $rfm_subfolder.$subdir .$file;?>">
                                    <i class="icon-pencil <?php if(!$rename_files || $file_prevent_rename) echo 'icon-white';?>"></i></a>

                                <a href="javascript:void('')" class="tip-left erase-button <?php if($delete_files && !$file_prevent_delete) echo "delete-file";?>" title="<?php echo trans('Erase')?>" data-confirm="<?php echo trans('Confirm_del');?>" data-path="<?php echo $rfm_subfolder.$subdir.$file;?>">
                                    <i class="icon-trash <?php if(!$delete_files || $file_prevent_delete) echo 'icon-white';?>"></i>
                                </a>
                            </form>
                        </figcaption>
                    </figure>
                </li>
            <?php
            }
            }

            ?></div>
        </ul>
        <?php } ?>
    </div>
</div>
</div>
<script>
    var files_prevent_duplicate = new Array();
    <?php
    foreach ($files_prevent_duplicate as $key => $value): ?>
    files_prevent_duplicate[<?php echo $key;?>] = '<?php echo $value;?>';
    <?php endforeach;?>
</script>

<!-- lightbox div start -->
<div id="previewLightbox" class="lightbox hide fade"  tabindex="-1" role="dialog" aria-hidden="true">
    <div class='lightbox-content'>
        <img id="full-img" src="">
    </div>
</div>
<!-- lightbox div end -->

<!-- loading div start -->
<div id="loading_container" style="display:none;">
    <div id="loading" style="background-color:#000; position:fixed; width:100%; height:100%; top:0px; left:0px;z-index:100000"></div>
    <img id="loading_animation" src="<?php echo APP_URL ?>/system/lib/filemanager/img/storing_animation.gif" alt="loading" style="z-index:10001; margin-left:-32px; margin-top:-32px; position:fixed; left:50%; top:50%"/>
</div>
<!-- loading div end -->

<!-- player div start -->
<div class="modal hide fade" id="previewAV">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3><?php echo trans('Preview');?></h3>
    </div>
    <div class="modal-body">
        <div class="row-fluid body-preview">
        </div>
    </div>

</div>
<!-- player div end -->
<img id='aviary_img' src='' class="hide"/>
<script>
    var ua = navigator.userAgent.toLowerCase();
    var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");
    if(isAndroid) {
        $('li').draggable({ disabled: true });
    }
</script>
</body>
</html>

<?php

}






