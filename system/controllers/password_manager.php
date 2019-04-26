<?php
/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

_auth();
$ui->assign('_application_menu', 'util');
$ui->assign('_st', $_L['Password Manager']);
$ui->assign('_title', $_L['Password Manager'] . '- ' . $config['CompanyName']);
$action = route(1,'manage');
$user = User::_info();
$ui->assign('user', $user);
switch ($action) {


    case 'manage':



        $passwords = PasswordManager::all();

        $clients = Contact::select('id','account')->get();

        $cls = [];

        foreach ($clients as $cl)
        {
            $cls[$cl->id] = $cl->account;
        }



        view('password_manager',[
            'passwords' => $passwords,
            'cls' => $cls
        ]);

        break;

    case 'modal_password':



        $id = route(2);



        $edit = false;

        if($id == ''){


            $password = [
                'id' => '',
                'client_id' => '',
                'name' => '',
                'url' => '',
                'username' => '',
                'password' => '',
                'notes' => ''
            ];



        }

        else{

            $id = str_replace('pe_','',$id);

            $p = PasswordManager::find($id);

            if($p){
                $edit = true;
                $password = [
                    'id' => $p->id,
                    'client_id' => $p->client_id,
                    'name' => $p->name,
                    'url' => $p->url,
                    'username' => $p->username,
                    'password' => $p->password,
                    'notes' => $p->notes,
                ];
            }

        }

        $c = Contact::all();

        view('modal_password',[
            'edit' => $edit,
            'password' => $password,
            'c' => $c
        ]);


        break;


    case 'save':

        $id = _post('password_id');


        $name = _post('name');

        if($name == ''){
            exit($_L['name_error']);
        }

        if($id != ''){

            $p = PasswordManager::find($id);
            if($p){

                $p->client_id = _post('client_id');
                $p->name = _post('name');
                $p->url = _post('url');
                $p->username = _post('username');
                $p->password = _post('password');
                $p->notes = _post('notes');
                $p->save();
                $id = $p->id;
            }


        }
        else{
            $p = new PasswordManager;
            $p->client_id = _post('client_id');
            $p->name = _post('name');
            $p->url = _post('url');
            $p->username = _post('username');
            $p->password = _post('password');
            $p->notes = _post('notes');
            $p->save();
            $id = $p->id;
        }

        echo $id;


        break;


    case 'modal_view_password':


        $id = route(2);
        $id = str_replace('v_','',$id);

        $p = PasswordManager::find($id);

        if($p){

            view('modal_view_password',[
                'p' => $p
            ]);

        }


        break;



    default:
        echo 'action not defined';


}