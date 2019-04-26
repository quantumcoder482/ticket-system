<?php
/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

_auth();

$ui->assign('_title', $_L['Dashboard'].'- '. $config['CompanyName']);
$ui->assign('_st', $_L['Dashboard']);
$user = User::_info();
$ui->assign('user',$user);

$action = route(1,'view');


switch($action){

    case 'view':


        break;



    case 'update_picture':

        $upload = Upload::factory('storage/temp');
        $upload->file($_FILES['file']);

        //set max. file size (in mb)
        $upload->set_max_file_size(5);

        //set allowed mime types
        $upload->set_allowed_mime_types(array('image/jpg','image/png','image/gif','image/jpeg'));

        $results = $upload->upload();

        $file_name = $user->id.'_'.md5(time());

        $img = Image::make($results['full_path']);

        $img->resize(null, 100,function ($constraint) {
            $constraint->aspectRatio();
        })->save('storage/admins/'.$file_name.'_md.png');

        $img->resize(null, 36,function ($constraint) {
            $constraint->aspectRatio();
        })->save('storage/admins/'.$file_name.'_sm.png');

        $user->img = $file_name;
        $user->save();

        echo $user->id;



        break;


    case 'get_img_from_url':



        $file_name = $user->id.'_'.md5(time());

        $url = _post('url');

        $img = Image::make($url);

        $img->resize(null, 100,function ($constraint) {
            $constraint->aspectRatio();
        })->save('storage/admins/'.$file_name.'_md.png');

        $img->resize(null, 36,function ($constraint) {
            $constraint->aspectRatio();
        })->save('storage/admins/'.$file_name.'_sm.png');

        $user->img = $file_name;
        $user->save();

        echo $user->id;

        break;


    case 'update_admin':

        $request = Request::createFromGlobals()->request;


        $v = new V($request->all());

        $v->rule('required', ['fullname']);

        $u = User::find($user->id);

        if($v->validate()) {

            $u->fullname = $request->get('fullname');
            $u->phonenumber = $request->get('phonenumber');
            $u->notes = $request->get('notes');

            $u->save();

            echo $u->id;

        } else {
            api_response($v->errors());
        }



        break;



    case 'update_password':


        $request = Request::createFromGlobals()->request;


        $v = new V($request->all());

        $v->rule('required', ['password1','password2']);
        $v->rule('lengthMin','password1',6);
        $v->rule('equals','password1','password2');

        $u = User::find($user->id);

        if($v->validate()) {

            $u->password = Password::_crypt(trim($request->get('password')));


            $u->save();

            echo $u->id;

        } else {
            api_response($v->errors());
        }


        break;







}