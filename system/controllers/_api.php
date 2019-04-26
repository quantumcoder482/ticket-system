<?php

/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

$data = array();
$data['success'] = false;
$data['msg'] = '';
$ip = '';
$ref = '';
$agent = '';
if(isset($_SERVER['REMOTE_ADDR'])){
$ip = $_SERVER['REMOTE_ADDR'];
}
if(isset($_SERVER['HTTP_REFERER'])){
    $ref = $_SERVER['HTTP_REFERER'];
}
if(isset($_SERVER['HTTP_USER_AGENT'])){
    $agent = $_SERVER['HTTP_USER_AGENT'];
}
$data['ip'] = $ip;
$data['ref'] = $ref;
$data['agent'] = $agent;
$data['result'] = false;


if(isset($_POST['key']) AND ($_POST['key'] != '')){

    $key = $_POST['key'];

    $a = ORM::for_table('sys_api')->where('apikey',$key)->find_one();
    if($a){
        $data['success'] = true;

        $method = _post('method');

        switch ($method) {


            case 'get_contact_details_by_id':

               $id = _post('id');

                $d = ORM::for_table('crm_accounts')->where('id',$id)->limit(1)->find_array();
               if($d){
                   $data['result'] = $d;
                   api_response($data);
               }
               else{
                   $data['result'] = false;
                   $data['msg'] = 'Contact Not Found';
                   api_response($data);
               }

                break;


            case 'get_contact_details_by_email':

                $email = _post('email');

                $d = ORM::for_table('crm_accounts')->where('email',$email)->limit(1)->find_array();
                if($d){
                    $data['result'] = $d;
                    api_response($data);
                }
                else{
                    $data['result'] = false;
                    $data['msg'] = 'Contact Not Found';
                    api_response($data);
                }

                break;


            case 'get_contact_details_by_token':

                $token = _post('token');

                $d = ORM::for_table('crm_accounts')->where('token',$token)->limit(1)->find_array();
                if($d){
                    $data['result'] = $d;
                    api_response($data);
                }
                else{
                    $data['result'] = false;
                    $data['msg'] = 'Contact Not Found';
                    api_response($data);
                }

                break;


                case 'get_invoice_details_by_id':

                $id = _post('id');

                $d = ORM::for_table('sys_invoices')->where('id',$id)->limit(1)->find_array();
                if($d){
                    $data['result'] = $d;
                    api_response($data);
                }
                else{
                    $data['result'] = false;
                    $data['msg'] = 'Invoice Not Found';
                    api_response($data);
                }

                break;

            case 'get_contacts':


                $d = ORM::for_table('crm_accounts')->find_array();

                $data['result'] = $d;

                api_response($data);

                break;


            case 'add_contact':


               $v = array();


               $v['account'] = _post('account');
               $v['email'] = _post('email');
               $v['password'] = _post('password');
               $v['phone'] = _post('phone');
               $v['address'] = _post('address');
               $v['city'] = _post('city');
               $v['zip'] = _post('zip');
               $v['state'] = _post('state');
               $v['country'] = _post('country');
               $v['company'] = _post('company');
               $v['img'] = _post('img');
               $v['tags'] = _post('tags');

                $data['result'] = Contacts::add($v);
                $data['email'] = $v['email'];

                api_response($data);

                break;



            case 'get_invoices_by_contact_email':

                $email = _post('email');
                $cid = '';
                $i = false;

                $d = ORM::for_table('crm_accounts')->where('email',$email)->find_one();

                if($d){
                    $cid = $d['id'];
                    $i = ORM::for_table('sys_invoices')->where('userid',$d['id'])->find_array();
                }

                $data['result'] = $i;
                $data['email'] = $email;
                $data['cid'] = $cid;

                api_response($data);

                break;

            case 'get_invoices_by_contact_id':

                $id = _post('id');
                $cid = '';
                $i = false;

                $d = ORM::for_table('crm_accounts')->find_one($id);

                if($d){
                    $cid = $d['id'];
                    $i = ORM::for_table('sys_invoices')->where('userid',$d['id'])->find_array();
                }

                $data['result'] = $i;
                $data['id'] = $id;
                $data['email'] = $d['email'];
                $data['cid'] = $cid;

                api_response($data);

                break;


           case 'get_recent_invoices_by_contact_id':

                $id = _post('id');
                $cid = '';
                $i = false;

                $d = ORM::for_table('crm_accounts')->find_one($id);

                if($d){
                    $cid = $d['id'];
                    $i = ORM::for_table('sys_invoices')->where('userid',$d['id'])->limit(5)->find_array();
                }

                $data['result'] = $i;
                $data['id'] = $id;
                $data['email'] = $d['email'];
                $data['cid'] = $cid;

                api_response($data);

                break;


            case 'login':

                $email = _post('email');
                $password = _post('password');

                $l = Contacts::login($email,$password);

                if($l){
                    $data['token'] = $l;
                }
                else{

                    $data['token'] = false;

                }


                api_response($data);




                break;

            case 'logout':

                $token = _post('token');

                $l = Contacts::logout_using_token($token);

                if($l){
                    $data['logout'] = true;
                }
                else{
                    $data['logout'] = false;
                }

                api_response($data);

                break;

            case 'ib_info':

                foreach ($config as $key => $value){



                    $data[$key] = $value;
                }

                api_response($data);

                break;

            case 'plugin':


                $plugin = _post('plugin');

                $api_path = 'apps/'.$plugin.'/api.php';

                if(file_exists($api_path)){

                    $data['api_found'] = 'Yes';

                    include $api_path;

                }

                else{
                    $data['api_found'] = 'No';
                }


                api_response($data);



                break;



            default:
                $data['msg'] = 'Method Not Found';
                api_response($data);
        }

    }
    else{
        $data['msg'] = 'Invalid API Key';
        api_response($data);
    }

}
else{
    $data['msg'] = 'API Key is required';

    api_response($data);

}


