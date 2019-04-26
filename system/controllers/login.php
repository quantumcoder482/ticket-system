<?php
/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/


$do = route(1);

if($do == ''){

    $do = 'login-display';

}

switch($do){
    case 'post':
        $username = _post('username');
        $username = filter_var($username, FILTER_SANITIZE_STRING);
        $username = addslashes($username);
        $password = _post('password');
        $password = addslashes($password);

        $after = route(2);


//        if(!isset($config['build']) OR ($config['build'] < $file_build)){
//            $rd = U.'update/';
//        }

        if($after != ''){
            $after = str_replace('*','/',$after);
            $rd = U.$after.'/';
        }

        else{
            $rd = U.$config['redirect_url'].'/';
        }



        setcookie("ib_rd", $rd, time() + 3600, "/");

        if(!isset($_SESSION['recaptcha_verified'])){
            $_SESSION['recaptcha_verified'] = false;
        }

        if(isset($config['config_recaptcha_in_admin_login']) && $config['config_recaptcha_in_admin_login'] == 1 && $config['recaptcha'] == 1){


            if(!$_SESSION['recaptcha_verified']){

                if(Ib_Recaptcha::isValid($config['recaptcha_secretkey']) == false){

                    _msglog('e',$_L['Recaptcha Verification Failed']);

                    r2(U.'login/');

                }
                else{

                    $_SESSION['recaptcha_verified'] = true;

                }

            }



        }

        $auth = Admin::login($username,$password);

        if($auth){

            r2($rd);
        }
        else{

            r2(U.'login/');

        }

//        if($username != '' AND $password != ''){
//            $d = ORM::for_table('sys_users')->where('username',$username)->find_one();
//            if($d){
//                $d_pass = $d['password'];
//                if(Password::_verify($password,$d_pass) == true){
//                    //Now check if OTP is enabled
//                    if($d['otp'] == 'Yes'){
////                Otp::make($d['id']);
////                $_SESSION['tuid'] = $d['id'];
////
////                r2(U.'otp');
//                    }
//                    else{
//
//                        $_SESSION['uid'] = $d->id;
//                        $d->last_login = date('Y-m-d H:i:s');
//                        if(strlen($d->autologin) > 20){
//                            $str = $d->autologin;
//                        }
//                        else{
//                            $str = Ib_Str::random_string(20).$d->id;
//                        }
//
//                        $d->autologin = $str;
//                        $d->save();
//                        //login log
//
//                        setcookie('ib_at', $str, time() + (86400 * 180), "/"); // 86400 = 1 day
//
//
//                        _log($_L['Login Successful'].' '.$username,'Admin',$d['id']);
//
//                        setcookie("tplsub", 'default', time()+15552000);
//
//                        if(!isset($config['build']) OR ($config['build'] < $file_build)){
//                            r2(U.'update/');
//                        }
//
//                        r2($rd);
//                    }
//
//                }
//                else{
//                    _msglog('e',$_L['Invalid Username or Password']);
//                    _log($_L['Failed Login'].' '.$username,'Admin');
//                    r2(U.'login');
//                }
//            }
//            else{
//
//                _msglog('e',$_L['Invalid Username or Password']);
//
//                r2(U.'login/');
//            }
//        }
//
//        else{
//            _msglog('e',$_L['Invalid Username or Password']);
//
//            r2(U.'login/');
//        }


        break;

    case 'login-display':

        Event::trigger('admin/login/');

        Admin::isLogged();



        view('auth',[
            'type' => 'login',
            'box_title' => 'Login'
        ]);

        break;

    case 'forgot-pw':

        view('auth',[
            'type' => 'forgot_password',
            'box_title' => 'Forgot Password?'
        ]);

        break;

    case 'forgot-pw-post':
        $username = _post('username');
        $d = ORM::for_table('sys_users')->where('username', $username)->find_one();
        if ($d) {

            $xkey = _raid('10');
            $d->pwresetkey = $xkey;
            $d->keyexpire = time() + 3600;

            $d->save();

            $e = ORM::for_table('sys_email_templates')->where('tplname','Admin:Password Change Request')->find_one();

            $subject = new Template($e['subject']);
            $subject->set('business_name', $config['CompanyName']);
            $subj = $subject->output();
            $message = new Template($e['message']);
            $message->set('name', $d['fullname']);
            $message->set('business_name', $config['CompanyName']);
            $message->set('password_reset_link', U.'login/pwreset-validate/'.$d['id'].'/token_'.$xkey);
            $message->set('username', $d['username']);
            $message->set('ip_address', $_SERVER["REMOTE_ADDR"]);
            $message_o = $message->output();
            Notify_Email::_send($d['fullname'],$d['username'],$subj,$message_o);

            _msglog('s',$_L['Check your email to reset Password']);

            r2(U.'login/');

        } else {
            _msglog('e',$_L['User Not Found'].'!');

            r2(U.'login/forgot-pw/');
        }

        break;

    case 'pwreset-validate':

        $v_uid = $routes['2'];
        $v_token = $routes['3'];
        $v_token = str_replace('token_','',$v_token);

        $d = ORM::for_table('sys_users')->find_one($v_uid);

        if($d){

            $d_token = $d['pwresetkey'];
            if($v_token != $d_token){
                r2(U.'login/','e',$_L['Invalid Password Reset Key'].'!');
            }
            $keyexpire = $d['keyexpire'];
            $ctime = time();
            if ($ctime > $keyexpire) {
                r2(U.'login/','e',$_L['Password Reset Key Expired']);
            }
            $password = _raid('6');
            $npassword = Password::_crypt($password);

            $d->password = $npassword;
            $d->pwresetkey = '';
            $d->keyexpire = '0';
            $d->save();

            $e = ORM::for_table('sys_email_templates')->where('tplname','Admin:New Password')->find_one();

            $subject = new Template($e['subject']);
            $subject->set('business_name', $config['CompanyName']);
            $subj = $subject->output();
            $message = new Template($e['message']);
            $message->set('name', $d['fullname']);
            $message->set('business_name', $config['CompanyName']);
            $message->set('login_url', U.'login/');
            $message->set('username', $d['username']);
            $message->set('password', $password);
            $message_o = $message->output();
            Notify_Email::_send($d['fullname'],$d['username'],$subj,$message_o);

            _msglog('s',$_L['Check your email to reset Password'].'.');

            r2(U.'login/');

        }

        break;

    case 'where':

        r2(U.'login');


        break;

    case 'after':
        Admin::isLogged();
        $after = route(2);

        $ui->assign('after',$after);

        view('login');

        break;




    default:
        Admin::isLogged();
        view('login');
        break;
}

