<?php

Class Ib_Email{


    protected $contents;
    protected $values = array();

    public static function _init()
    {
        global $config;
        $sysEmail = $config['sysEmail'];
        $sysCompany = $config['CompanyName'];
        $mail = new PHPMailer();
        $mail->CharSet = 'UTF-8';
        //check for smtp
        $e = ORM::for_table('sys_emailconfig')->find_one('1');
        if($e['method'] == 'smtp'){
            $mail->isSMTP();
            $mail->Host = $e['host'];
            $mail->SMTPAuth = true;
            $mail->Username = $e['username'];
            $mail->Password = $e['password'];
            $mail->SMTPSecure = $e['secure'];
            $mail->Port = $e['port'];
        }
        $mail->SetFrom($sysEmail, $sysCompany);
        $mail->AddReplyTo($sysEmail, $sysCompany);
        return $mail;
    }


    public static function _log($userid, $email, $subject, $message, $iid='0')
    {
        $date = date('Y-m-d H:i:s');
        $d = ORM::for_table('sys_email_logs')->create();
        $d->userid = $userid;
        $d->sender = '';
        $d->email = $email;
        $d->subject = $subject;
        $d->message = $message;
        $d->date = $date;
        $d->iid = $iid;
        $d->save();
        $id = $d->id();
        return $id;

    }


    public static function _send($name,$to,$subject,$message,$uid='0',$iid='0',$cc='',$bcc='',$attachment_path='',$attachment_file=''){
        $mail = self::_init();
        $mail->AddAddress($to, $name);

        if($cc != ''){
            $mail->AddAddress($cc);
        }

        if($bcc != ''){
            $mail->AddBCC($bcc);
        }

        if($attachment_path != ''){
            $mail->AddAttachment($attachment_path, $attachment_file,  'base64', 'application/pdf');
        }

        // check for attachment



        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        
        if(APP_STAGE == 'Demo'){

        }
        else{
            $mail->Send();
        }

        //add log
        self::_log($uid,$to,$subject,$message,$iid);


    }


    public static function bulk_email($emails,$subject,$msg,$to){

        $mail = self::_init();

        $mail->AddAddress($to);

        foreach($emails as $email){
            $mail->AddBCC($email);
        }

        $mail->Subject = $subject;
        $mail->MsgHTML($msg);

        
        if(APP_STAGE == 'Demo'){

        }
        else{
            if($mail->Send()){

                return true;

            }
            else{

                return false;
            }
        }



        return false;


    }





    public static function send_client_welcome_email($data,$send_password=false){

        $e = ORM::for_table('sys_email_templates')->where('tplname', 'Client:Client Signup Email')->find_one();

        if((!isset($data['account'])) || (!isset($data['email']))){

            return false;

        }

        if($e){

            global $config;

            $subject = new Template($e['subject']);
            $subject->set('business_name', $config['CompanyName']);
            $subj = $subject->output();

            $message = new Template($e['message']);
            $message->set('client_name', $data['account']);
            $message->set('client_email', $data['email']);

            if($send_password){
                $message->set('client_password', $data['password']);
            }
            else{
                $message->set('client_password', '---Encrypted---');
            }



            $message->set('business_name', $config['CompanyName']);
            $message->set('client_login_url', U.'client/login/');
            $message_o = $message->output();

          //  $mail = Notify_Email::_init();
          //  $mail->AddAddress($data['email'], $data['account']);
          //  $mail->Subject = $subj;
          //  $mail->MsgHTML($message_o);

            

            if(APP_STAGE == 'Demo'){
                return false;
            }
            else{

                if(isset($data['id']))
                {
                    $cid = $data['id'];
                }
                else{
                    $cid = '0';
                }
                Notify_Email::_send($data['account'], $data['email'], $subj, $message_o, $cid);
//                $send = $mail->Send();

//                return $send;
                return true;
            }





        }

        return false;

    }


    public static function sendEmail($to,$subject,$message){

        $mail = self::_init();
        $mail->AddAddress($to);
        $mail->Subject = $subject;
        $mail->MsgHTML($message);

        

        if(APP_STAGE == 'Demo'){
          //  return false;
        }
        else{
            $mail->Send();
        }


    }


}