<?php
// *************************************************************************
// *                                                                       *
// * iBilling -  Accounting, Billing Software                              *
// * Copyright (c) Sadia Sharmin. All Rights Reserved                      *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * Email: sadiasharmin3139@gmail.com                                                *
// * Website: http://www.sadiasharmin.com                                  *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * This software is furnished under a license and may be used and copied *
// * only  in  accordance  with  the  terms  of such  license and with the *
// * inclusion of the above copyright notice.                              *
// * If you Purchased from Codecanyon, Please read the full License from   *
// * here- http://codecanyon.net/licenses/standard                         *
// *                                                                       *
// *************************************************************************

Class Ib_Internal{

    public static function get_moment_format($df){

        if($df == 'd/m/Y'){
            return 'DD/MM/YYYY';
        }

        elseif($df == 'd.m.Y'){
            return 'DD.MM.YYYY';
        }

        elseif($df == 'd-m-Y'){
            return 'DD-MM-YYYY';
        }

        elseif($df == 'm/d/Y'){
            return 'MM/DD/YYYY';
        }

        elseif($df == 'Y/m/d'){
            return 'YYYY/MM/DD';
        }

        elseif($df == 'Y-m-d'){
            return 'YYYY-MM-DD';
        }

        elseif($df == 'M d Y'){
            return 'MMM DD YYYY';
        }

        elseif($df == 'd M Y'){
            return 'DD MMM YYYY';
        }

        elseif($df == 'jS M y'){
            return 'Do MMM YY';
        }

        else{

            return 'dddd, MMMM Do YYYY';

        }

    }

    public static function autoLogin($username,$password,$where='admin',$r2='dashboard/'){

        global $_L;

        switch ($where){

            case 'admin':


                $d = ORM::for_table('sys_users')->where('username',$username)->find_one();
                if($d){
                    $d_pass = $d['password'];
                    if(Password::_verify($password,$d_pass) == true){
                        $_SESSION['uid'] = $d['id'];
                        $d->last_login = date('Y-m-d H:i:s');
                        $d->save();
                        //login log

                        _log($_L['Login Successful'].' '.$username,'Admin',$d['id']);

                        r2(U.$r2);

                    }
                    else{
                        _msglog('e','Invalid Username or Password');
                        _log($_L['Failed Login'].' '.$username,'Admin');
                        r2(U.'login');
                    }
                }
                else{

                    _msglog('e','Invalid Username or Password');

                    r2(U.'login/');
                }


                break;


            case 'client':
            case 'customer':

            $auth = Contacts::login($username,$password);

            if($auth){

                // store authentication key in the cookies

                setcookie('ib_ct', $auth, time() + (86400 * 30), "/"); // 86400 = 1 day

                if($r2 == 'dashboard/' || $r2 == 'dashboard'){
                    r2(U.'client/dashboard/');
                }
                else{
                    r2(U.$r2);
                }





            }
            else{
                r2(U.'client/login/','e',$_L['Invalid Username or Password']);
            }


                break;


        }

    }

}