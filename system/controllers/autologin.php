<?php

/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

$username = 'demo@example.com';
$password = '123456';
if($username != '' AND $password != ''){
    $d = ORM::for_table('sys_users')->where('username',$username)->find_one();
    if($d){
        $d_pass = $d['password'];
        if(Password::_verify($password,$d_pass) == true){
            //Now check if OTP is enabled
            if($d['otp'] == 'Yes'){
                Otp::make($d['id']);
                $_SESSION['tuid'] = $d['id'];

                r2(U.'otp');
            }
            else{
                $_SESSION['uid'] = $d['id'];
                $d->last_login = date('Y-m-d H:i:s');
                $d->save();
                //login log

                _log('Login Successful '.$username,'Admin',$d['id']);

                $rd = $config['redirect_url'].'/';
//                if ((isset($routes['2'])) AND (($routes['2'] != ''))){
//                    $rd =  $routes['2'];
//                    exit($rd);
//                }

              //  r2(U.$rd);
                _msglog('s','
                ========== Please Read This Message Full ============== <br>
                Installation Successful! Please Set your Full Name, Username, Password. The Default Username is - demo@example.com And Password: 123456 Please change it From This Page.
                ');
                r2(U.'settings/users-edit/1/');
            }

        }
        else{
            _msglog('e','Invalid Username or Password');
            _log('Failed Login '.$username,'Admin');
            r2(U.'login');
        }
    }
    else{

        _msglog('e','Invalid Username or Password');

        r2(U.'login/');
    }
}

else{
    _msglog('e','Invalid Username or Password');

    r2(U.'login/');
}