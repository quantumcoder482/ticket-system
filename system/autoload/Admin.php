<?php
Class Admin{

    /**
     * retutn void
     */
    public static function isLogged(){

        if(isset($_COOKIE['ib_at'])) {

            $ib_at = $_COOKIE['ib_at'];

            if($ib_at == ''){
                return;
            }

            $d = ORM::for_table('sys_users')->where('autologin',$ib_at)->find_one();

            if($d){

                global $_L,$file_build,$config;

                $after = route(2);
                $rd = U.$config['redirect_url'].'/';

                if($after != ''){

                    $after = str_replace('*','/',$after);

                    $rd = U.$after.'/';



                }

                $_SESSION['uid'] = $d['id'];
                $d->last_login = date('Y-m-d H:i:s');
                $d->save();
                _log($_L['Login Successful'].' '.$d->username,'Admin',$d->id);


                r2($rd);
            }


        }



    }

    public static function login($username,$password){

        global $_L;

        if($username != '' AND $password != ''){
            $d = ORM::for_table('sys_users')->where('username',$username)->find_one();

            if($d){
                $d_pass = $d->password;
                if(Password::_verify($password,$d_pass) == true){

                    Event::trigger('admin/login/_verified',$d->id);

                    $_SESSION['uid'] = $d->id;
                    $_SESSION['language'] = $d->language;
                    $d->last_login = date('Y-m-d H:i:s');
                    if(strlen($d->autologin) > 20){
                        $str = $d->autologin;
                    }
                    else{
                        $str = Ib_Str::random_string(20).$d->id;
                    }

                    $d->autologin = $str;
                    $d->save();
                    //login log

                    setcookie('ib_at', $str, time() + (86400 * 180), "/");


                    _log($_L['Login Successful'].' '.$username,'Admin',$d['id']);

                    setcookie("tplsub", 'default', time()+15552000);

                    return true;

                }
                else{
                    _msglog('e',$_L['Invalid Username or Password']);
                    _log($_L['Failed Login'].' '.$username,'Admin');

                    return false;
                }
            }
            else{

                _msglog('e',$_L['Invalid Username or Password']);

                return false;
            }
        }

        else{
            _msglog('e',$_L['Invalid Username or Password']);

            return false;

        }



    }

    /**
     * return void
     */
    public static function logout(){

        if(isset($_COOKIE['ib_at'])) {

            $ib_at = $_COOKIE['ib_at'];



            $d = ORM::for_table('sys_users')->where('autologin',$ib_at)->find_one();

            if($d){

                setcookie('ib_at', 'expired', 1, "/");

                $d->autologin = '';
                $d->save();

            }


        }

    }

}