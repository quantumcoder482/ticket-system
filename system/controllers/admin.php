<?php
/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/
$do = route(1);

if ($do == '') {
    $do = 'login-display';
}

switch ($do) {
    case 'post':
        $username = _post('username');
        $password = _post('password');
        $after = route(2);
        $rd = U . $config['redirect_url'] . '/';
        if ($after != '') {
            $after = str_replace('*', '/', $after);
            $rd = U . $after . '/';
        }

        $auth = Admin::login($username, $password);
        if ($auth) {
            if (!isset($config['build']) OR ($config['build'] < $file_build)) {
                r2(U . 'updating/');
            }

            r2($rd);
        }
        else {
            r2(U . 'login/');
        }

        break;

    case 'login-display':

        // added param after

        view('auth', ['type' => 'login', 'box_title' => 'Login']);
        break;

    case 'forgot-pw':

        view('auth', ['type' => 'forgot_password', 'box_title' => 'Forgot Password?']);

        break;

    case 'forgot-pw-post':
        $username = _post('username');
        $d = ORM::for_table('sys_users')->where('username', $username)->find_one();
        if ($d) {
            $xkey = _raid('10');
            $d->pwresetkey = $xkey;
            $d->keyexpire = time() + 3600;
            $d->save();
            $e = ORM::for_table('sys_email_templates')->where('tplname', 'Admin:Password Change Request')->find_one();
            $subject = new Template($e['subject']);
            $subject->set('business_name', $config['CompanyName']);
            $subj = $subject->output();
            $message = new Template($e['message']);
            $message->set('name', $d['fullname']);
            $message->set('business_name', $config['CompanyName']);
            $message->set('password_reset_link', U . 'login/pwreset-validate/' . $d['id'] . '/token_' . $xkey);
            $message->set('username', $d['username']);
            $message->set('ip_address', $_SERVER["REMOTE_ADDR"]);
            $message_o = $message->output();
            Notify_Email::_send($d['fullname'], $d['username'], $subj, $message_o);
            _msglog('s', $_L['Check your email to reset Password']);
            r2(U . 'login/');
        }
        else {
            _msglog('e', $_L['User Not Found'] . '!');
            r2(U . 'login/forgot-pw/');
        }

        break;

    case 'pwreset-validate':
        $v_uid = $routes['2'];
        $v_token = $routes['3'];
        $v_token = str_replace('token_', '', $v_token);
        $d = ORM::for_table('sys_users')->find_one($v_uid);
        if ($d) {
            $d_token = $d['pwresetkey'];
            if ($v_token != $d_token) {
                r2(U . 'login/', 'e', $_L['Invalid Password Reset Key'] . '!');
            }

            $keyexpire = $d['keyexpire'];
            $ctime = time();
            if ($ctime > $keyexpire) {
                r2(U . 'login/', 'e', $_L['Password Reset Key Expired']);
            }

            $password = _raid('6');
            $npassword = Password::_crypt($password);
            $d->password = $npassword;
            $d->pwresetkey = '';
            $d->keyexpire = '0';
            $d->save();
            $e = ORM::for_table('sys_email_templates')->where('tplname', 'Admin:New Password')->find_one();
            $subject = new Template($e['subject']);
            $subject->set('business_name', $config['CompanyName']);
            $subj = $subject->output();
            $message = new Template($e['message']);
            $message->set('name', $d['fullname']);
            $message->set('business_name', $config['CompanyName']);
            $message->set('login_url', U . 'login/');
            $message->set('username', $d['username']);
            $message->set('password', $password);
            $message_o = $message->output();
            Notify_Email::_send($d['fullname'], $d['username'], $subj, $message_o);
            _msglog('s', $_L['Check your email to reset Password'] . '.');
            r2(U . 'login/');
        }

        break;

    case 'where':
        r2(U . 'login');
        break;

    case 'after':
        $after = route(2);
        $ui->assign('after', $after);
        view('login');
        break;

    default:
        view('login');
        break;
}