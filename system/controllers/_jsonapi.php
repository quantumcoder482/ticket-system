<?php

/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

$action = route(1);

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require 'application/helpers/ibilling_api.php';

switch ($action){





        case 'auth':


            $data = array();

            $data['msg'] = '';
            $data['token'] = '';
            $data['success'] = false;


            $username = _post('username');
            $password = _post('password');


            $d = ORM::for_table('sys_users')->where('username',$username)->find_one();
            if($d){
                $d_pass = $d['password'];
                if(Password::_verify($password,$d_pass) == true){

                        $_SESSION['uid'] = $d['id'];
                        $d->last_login = date('Y-m-d H:i:s');
                        $d->save();
                        //login log

                        _log('API: '.$_L['Login Successful'].' '.$username,'Admin',$d['id']);


                    if($d->at == ''){
                        $str = Ib_Str::random_string(20).$d->id;
                        $d->at = $str;
                        $d->save();
                    }

                    else{

                        $str = $d->at;

                    }





                    $data['msg'] = 'Login Successful';
                    $data['success'] = true;
                    $data['token'] = $str;




                }
                else{
                    $data['msg'] = 'Login Failed';
                    _log('API: '.$_L['Failed Login'].' '.$username,'Admin');
                }
            }
            else{
                $data['msg'] = 'Invalid Username or Password';
                _log('API Login: Invalid Username or Password');


            }

            echo json_encode($data);


      

        break;


    case 'dashboard':

        $data = array(

            'net_worth' => 1600

        );

        echo json_encode($data);



        break;


    case 'customers':

        $method = '';

        if($_SERVER['REQUEST_METHOD'] == 'POST'){



        }


        break;


    case 'listContacts':




        $data['msg'] = '';
        $data['success'] = false;
        $auth = ib_api_auth();

        if($auth['success']){

            $data = Contacts::all();

        }
        else{
            $data['msg'] = $auth['msg'];
            $data['success'] = false;
        }

        echo json_encode($data);




        break;



    case 'addContact':

        $data['msg'] = '';
        $data['success'] = false;
        $data['id'] = false;
        $auth = ib_api_auth();

        if($auth['success']){


            $c = ib_get_posted_data();


            $add = Contacts::add($c);

            if(is_numeric($add)){
                $data['msg'] = 'Contact Added Successfully';
                $data['success'] = true;
                $data['id'] = $add;
            }
            else{
                $data['msg'] = $add;
            }



        }
        else{
            $data['msg'] = $auth['msg'];
            $data['success'] = false;
        }

        echo json_encode($data);





        break;


    case 'contactDetails':

        $data['msg'] = '';
        $data['success'] = false;
        $auth = ib_api_auth();

        if($auth['success']){

            $id = route(2);

            $d = ORM::for_table('crm_accounts')->find_one($id);

            if($d){

                $data = (array) $d;
                $data['success'] = true;



            }
            else{

                $data['msg'] = 'Contact Not Found.';

            }


        }
        else{
            $data['msg'] = $auth['msg'];
            $data['success'] = false;
        }

        echo json_encode($data);



        break;


    case 'accounts':

        $method = $_SERVER['REQUEST_METHOD'];

        $data['msg'] = '';
        $data['success'] = false;
        $data['method'] = $method;
        $auth = ib_api_auth();

        if($auth['success']){

            switch ($method){

                case 'POST':


                    $data['success'] = true;
                    $data['id'] = 1;
                    $data['data'] = ib_get_posted_data();

                    break;


                case 'GET':


                    $id = route(2);

                    if($id == ''){

                        $data['result'] = ORM::for_table('sys_accounts')->find_array();
                        $data['success'] = true;
                        $tbal = ORM::for_table('sys_accounts')->sum('balance');
                        $data['total'] = $tbal;


                    }
                    else{

                        // show all






                    }




                    break;


            }


        }
        else{
            $data['msg'] = $auth['msg'];
            $data['success'] = false;
        }

        echo json_encode($data);




        break;


    case 'contacts':

        $method = $_SERVER['REQUEST_METHOD'];

        $data['msg'] = '';
        $data['success'] = false;
        $data['method'] = $method;
        $auth = ib_api_auth();

        if($auth['success']){

            switch ($method){

                case 'POST':


                    $data['success'] = true;
                    $data['id'] = 1;
                    $data['data'] = ib_get_posted_data();

                    break;


                case 'GET':


                    $id = route(2);

                    if($id == ''){

                        $data['result'] = ORM::for_table('crm_accounts')->find_one($id);
                        $data['success'] = true;
                        $tbal = ORM::for_table('sys_accounts')->sum('balance');
                        $data['total'] = $tbal;


                    }
                    else{

                        // show all

                        $data['result'] = ORM::for_table('crm_accounts')->find_array();
                        $data['success'] = true;




                    }




                    break;


            }


        }
        else{
            $data['msg'] = $auth['msg'];
            $data['success'] = false;
        }

        echo json_encode($data);




        break;



    case 'transactions':

        $method = $_SERVER['REQUEST_METHOD'];

        $data['msg'] = '';
        $data['success'] = false;
        $data['method'] = $method;
        $auth = ib_api_auth();

        $type = route(2);

        if($auth['success']){

            switch ($method){

                case 'POST':







                    break;


                case 'GET':


                    $id = route(2);

                    if($id == ''){

                        $data['result'] = ORM::for_table('sys_accounts')->find_array();
                        $data['success'] = true;
                        $tbal = ORM::for_table('sys_accounts')->sum('balance');
                        $data['total'] = $tbal;


                    }
                    else{

                        // show all






                    }




                    break;


            }






        }






        break;




    case 'test':

        $data['msg'] = '';
        $data['success'] = false;
        $auth = ib_api_auth();

        if($auth['success']){



        }
        else{
            $data['msg'] = $auth['msg'];
            $data['success'] = false;
        }

        echo json_encode($data);




        break;


    case 'invoices':




        break;





    // New


    case 'lead_create':


        $data = ib_posted_data();

        $lead = Leads::create($data);






        break;








}
