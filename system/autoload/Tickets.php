<?php
Class Tickets{


    public function get_department($did){

        $dname = '';

        $d = ORM::for_table('sys_ticketdepartments')->find_one($did);

        if($d){
            $dname = $d->dname;
        }

        return $dname;

    }

    public static function sendReplyNotification($tid,$message){

        $d = ORM::for_table('sys_tickets')->find_one($tid);

        if($d){

            if($d->email == ''){
                return false;
            }

            Ib_Email::_send($d->account,$d->email,'[TID '.$d->tid.']'.$d->subject,$message,$d->userid,$d->aid,$d->cc,$d->bcc);
        }

        return false;

    }


    public function create($cid=0,$admin=0,$flag=0,$source='Web',$data=false,$extras = false,$ticket_prefix=false){

        global $config;
        $msg = '';

        $ib_now = date('Y-m-d H:i:s');

        /*        if(!$ticket_prefix)
            {
                $ticket_prefix = strtoupper(Ib_Str::random_alpha(3));
            }

            $tid = $ticket_prefix.'-'._raid(8);
        */

        $d = ORM::for_table('sys_tickets')->order_by_desc('id')->find_one();

        if(!$d || is_numeric($d->tid) == false){
            $tid = 1001;
        }else {
            $tid = $d->tid + 1;
        }

        if(isset($data['did']))
        {
        	if($data['did'] == '')
	        {
	        	$did = 0;
	        }
	        else{
		        $did = $data['did'];
	        }

        }
        else{
            $did = _post('department');
        }

        $dname = $this->get_department($did);

        $account = '';
        $email = '';
        $last_reply = '';
        $client_phone_number = '';


        if($cid != 0){
            $d = ORM::for_table('crm_accounts')->find_one($cid);

            if($d){
                $account = $d->account;
                $email = $d->email;
                $last_reply = $d->account;
                $client_phone_number = $d->phone;

            }
        }
        else{

            // create lead

            $account = _post('account');

            $first_name = '';
            $middle_name = '';
            $last_name = '';


            $email = _post('email');
            $last_reply = $account;
          
            if($account == ''){
            // $msg .= 'Full Name is required. <br>';
            // return array(
            // "success" => "No",
            // "msg" => $msg
            // );

                $account = Ib_Str::randomName();
            }

            $account_e = explode(' ',$account);

            if(isset($account_e[0])){
                $first_name = $account_e[0];

            }

            if(isset($account_e[1])){
                $last_name = $account_e[1];
            }

            if(isset($account_e[3])){
                $middle_name = $last_name;
                $last_name = $account_e[3];
            }

            if($last_name == ''){
                $last_name = $first_name;
            }


            //            if($email == ''){
            //                $msg .= 'Email is required. <br>';
            //                return array(
            //                    "success" => "No",
            //                    "msg" => $msg
            //                );
            //            }

            $e_user = ORM::for_table('crm_accounts')->where('email',$email)->find_one();

            if($e_user && $email != ''){
                $cid = $e_user->id;
            }
            else{
                //                if($account == ''){
                //                    $msg .= 'Full Name is required. <br>';
                //                }
                //                if($email == ''){
                //                    $msg .= 'Email is required. <br>';
                //                }

                //                $c_add['account'] = $account;
                //                $c_add['email'] = $email;

                $l_add['first_name'] = $first_name;
                $l_add['last_name'] = $last_name;
                $l_add['middle_name'] = $middle_name;
                $l_add['email'] = _post('email');
                $l_add['phone'] = _post('phone');




                //                if($msg == ''){
                //                    $cid = Contacts::add($c_add,true,true);
                //                    if(!is_numeric($cid)){
                //                        return array(
                //                            "success" => "No",
                //                            "msg" => $cid
                //                        );
                //                    }
                //                }
                //                else{
                //                    return array(
                //                        "success" => "No",
                //                        "msg" => $msg
                //                    );
                //                }




            }

        }

        if(isset($data['message']))
        {
            $message = $data['message'];
        }
        else{
            $message = ib_post('message');
        }

        if(isset($data['subject']))
        {
            $subject = $data['subject'];
        }
        else{
            $subject = ib_post('subject');
        }

        if($subject == ''){
            $msg .= 'Subject is required. <br>';
        }else {
            $check_subject = ORM::for_table('sys_tickets')->where('subject', $subject)->find_one();
            if($check_subject) {
                $msg .= 'This manuscript title already submitted. <br>';
            }
        }

        if($message == ''){
            $msg .= 'Message is required. <br>';
        }

        if( ib_post('attachments') == ''){
            $msg .= 'Attachments is required. <br>';
        }

        if(isset($data['urgency']))
        {
            $urgency = $data['urgency'];
        }
        else{
            $urgency = _post('urgency');
        }


        if($msg == ''){

            // upload file path change

            $upload_path = 'storage/tickets/'.$tid;
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, true);
            }
            $attachment_array = explode(',', ib_post('attachments'));
            foreach($attachment_array as $a){
                $origin_path = 'storage/tickets/'.$a;
                $new_path = 'storage/tickets/' . $tid.'/'.$a;
                $fileMoved = rename($origin_path, $new_path);
            }

            $d = ORM::for_table('sys_tickets')->create();
            $d->tid = $tid;
            $d->did = $did;
            $d->dname = $dname;
            $d->userid = $cid;
            $d->account = $account;
            $d->email = $email;
            $d->created_at = $ib_now;
            $d->updated_at = $ib_now;
            $d->subject = $subject;
            $d->message = $message;
            $d->status = 'Open';
            $d->urgency = $urgency;
            $d->admin = $admin;
            $d->attachments = ib_post('attachments');
            $d->last_reply = $last_reply;
            $d->flag = $flag;
            $d->is_spam = 0;
            $d->client_read = 'No';
            $d->admin_read = 'No';
            $d->source = $source;
            $d->ttype = _post('ttype'); //  Question Incident Problem Feature Request
            $d->tstart = '';
            $d->tend = '';
            $d->ttotal = '';
            $d->todo = '';
            $d->tags = '';
            $d->notes = '';
            $d->c1 = _post('c1');
            $d->c2 = _post('c2');

            $dep = ORM::for_table('sys_ticketdepartments')->find_one($did);
            $dname = $dep['dname'];

            if($extras)
            {
                foreach ($extras as $key => $value)
                {
                    $d->$key = $value;
                }
            }

            $d->save();

            $ticket_id = $d->id();
            // create tasks if enabled

            // if(isset($config['create_task_from_ticket']) && $config['create_task_from_ticket'] == 1)
            // {
            //     Tasks::create([
            //         'title' => $subject,
            //         'description' => $message,
            //         'cid' => $cid,
            //         'priority' => $urgency,
            //         'rel_type' => 'Ticket',
            //         'rel_id' => $ticket_id,
            //         'tid' => $ticket_id
            //     ]);
            // }

            $ret_val = array(

                "success" => "Yes",
                "msg" => "Ticket Created Successfully",
                "account" => $account,
                "email" => $email,
                "subject" => $subject,
                "body" => $message,
                "id" => $d->id(),
                "tid" => $tid

            );

                            // Send Email to Client


                //            $eml = ORM::for_table('sys_email_templates')->where('tplname','Tickets:Client Ticket Created')->where('send','Yes')->find_one();
                //            if($eml){
                //
                //
                //
                //                $eml_subject = new Template($eml->subject);
                //                $eml_subject->set('business_name', $config['CompanyName']);
                //                $eml_subject->set('subject', $subject);
                //                $eml_subject->set('ticket_subject', $subject);
                //                $subj = $eml_subject->output();
                //
                //                $eml_message = new Template($eml->message);
                //                $eml_message->set('client_name', $account);
                //                $eml_message->set('client_email', $email);
                //                $eml_message->set('priority', $urgency);
                //                $eml_message->set('urgency', $urgency);
                //                $eml_message->set('ticket_urgency', $urgency);
                //                $eml_message->set('ticket_priority', $urgency);
                //                $eml_message->set('ticket_id', '#'.$tid);
                //                $eml_message->set('message', $message);
                //                $eml_message->set('business_name', $config['CompanyName']);
                //                $message_o = $eml_message->output();
                //
                //                $mail = Notify_Email::_init();
                //                $mail->AddAddress($email, $account);
                //                $mail->Subject = $subj;
                //                $mail->MsgHTML($message_o);
                //
                //                if(APP_STAGE == 'Live'){
                //                    $mail->Send();
                //                }
                //
                //
                //            }

            $eml = ORM::for_table('sys_email_templates')->where('tplname','Tickets:Client Ticket Created')->where('send','Yes')->find_one();
            if($eml){

                $client_view_link = U.'client/tickets/view/'.$d->id.'/';

                $eml_subject = new Template($eml->subject);
                $eml_subject->set('business_name', $config['CompanyName']);
                $eml_subject->set('subject', $subject);
                $eml_subject->set('ticket_subject', $subject);
                $eml_subject->set('ticket_id', '#'.$tid);
                $subj = $eml_subject->output();

                $eml_message = new Template($eml->message);
                $eml_message->set('client_name', $account);
                $eml_message->set('client_email', $email);
                $eml_message->set('priority', $urgency);
                $eml_message->set('urgency', $urgency);
                $eml_message->set('subject', $subject);
                $eml_message->set('ticket_subject', $subject);
                $eml_message->set('status', $urgency);
                $eml_message->set('ticket_status', $d->status);
                $eml_message->set('ticket_urgency', $urgency);
                $eml_message->set('ticket_priority', $urgency);
                $eml_message->set('ticket_id', '#'.$tid);
                $eml_message->set('message', $message);
                $eml_message->set('business_name', $config['CompanyName']);
                $eml_message->set('ticket_link',$client_view_link);
                $eml_message->set('department', $dname);
                $eml_message->set('processing', $urgency);
                $message_o = $eml_message->output();

                Notify_Email::_send($account, $email, $subj, $message_o, $cid);

            }


            $eml = ORM::for_table('sys_email_templates')->where('tplname','Tickets:Admin Ticket Created')->where('send','Yes')->find_one();

            if($eml){

                $admin_view_link = U.'tickets/admin/view/'.$d->id;

                $eml_subject = new Template($eml->subject);
                $eml_subject->set('business_name', $config['CompanyName']);
                $eml_subject->set('subject', $subject);
                $eml_subject->set('ticket_subject', $subject);
                $eml_subject->set('ticket_id', '#' . $tid);
                $subj = $eml_subject->output();

                $eml_message = new Template($eml->message);
                $eml_message->set('client_name', $account);
                $eml_message->set('client_email', $email);
                $eml_message->set('priority', $urgency);
                $eml_message->set('urgency', $urgency);
                $eml_message->set('status', $urgency);
                $eml_message->set('ticket_status', $d->status);
                $eml_message->set('ticket_urgency', $urgency);
                $eml_message->set('ticket_priority', $urgency);
                $eml_message->set('ticket_subject', $subject);
                $eml_message->set('ticket_id', '#'.$tid);
                $eml_message->set('message', $message);
                $eml_message->set('business_name', $config['CompanyName']);
                $eml_message->set('admin_view_link',$admin_view_link);
                $eml_message->set('department', $dname);
                $eml_message->set('processing', $urgency);
                $message_o = $eml_message->output();

                // $mail = Notify_Email::_init();

                $d = ORM::for_table('sys_ticketdepartments')->find_one($did);


                if(isset($d->email) && ($d->email != ''))
                {
                    Notify_Email::_send('', $d->email, $subj, $message_o, $cid);
                }
            }

            // SMS to Client

            

            if ($client_phone_number != '') {

                require 'system/lib/misc/smsdriver.php';

                $tpl = SMSTemplate::where('tpl', 'Ticket Created: Client Notification')->first();

                if ($tpl) {
                    $message = new Template($tpl->sms);
                    $message->set('ticket_id', $tid);
                    $message_o = $message->output();
                    spSendSMS($client_phone_number, $message_o, 'PSCOPE',0,'text',4);
                }
            }



            // Create a default Task if enabled

            /*
            if(isset($config['ticket_create_task_automatically']) && $config['ticket_create_task_automatically'] == 1)
            {
                $data['aid'] = $admin;

                $user = User::find($admin);

                if($user)
                {
                    $data['created_by'] = $user->fullname;
                }

                $task = Tasks::create($data);
            }
            */

            Event::trigger('tickets/created/',$ret_val);



        }
        else{

            $ret_val = array(

                "success" => "No",
                "msg" => $msg


            );
        }


        return $ret_val;



    }

    public static function gen_link_attachments($attachments){

        $html = '';

        $a = explode(',',$attachments);

        foreach ($a as $l){

            $html .= '<img src="'.APP_URL.'/storage/tickets/'.$l.'" class="img-thumbnail" alt="Cinque Terre" width="300"> ';

        }

        return $html;

    }


    public function add_reply($admin=0,$sendEmail=true)
    {
        global $config;
        $msg = '';
        $is_admin = false;

        $ib_now = date('Y-m-d H:i:s');

        $tid = _post('f_tid');

        $ret_val = array(
            "success" => "No"
        );

        $account = '';
        $email = '';
        $last_reply = false;
        $replied_by = '';
        $reply_type = _post('reply_type','public');


        $message = ib_post('message');
        if ($message == '') {
            $msg .= 'Message is required. <br>';
        }

        $t = ORM::for_table('sys_tickets')->find_one($tid);
        if ($t) {
            $t->updated_at = $ib_now;

            $t->save();

            $cid = $t->userid;

        }
        else{
            $cid = 0;
        }

        $adm = ORM::for_table('sys_users')->find_one($admin);
        if ($adm) {
            $is_admin = true;
            $email = $t->email;
            $account = $t->account;
            $replied_by = $adm->fullname;

            $last_reply = $adm->fullname;
            $reply_account = $adm->fullname;
            $reply_email = $adm->email;

        } else {
            $d = ORM::for_table('sys_ticketdepartments')->find_one($t->did);
            // $dep_user = ORM::for_table('sys_users')->where('username', $d->email)->find_one();
            // $email = $dep_user->username;
            // $account = $dep_user->fullname;

            $email = $d->email;
            $account = '';

            $reply_account = $t->account;
            $reply_email = $t->email;
            $last_reply = $t->account;

        }

        if ($msg == '') {

            if(ib_post('attachments')){

                $upload_path = 'storage/tickets/' . $t->tid;
                if (!is_dir($upload_path)) {
                    mkdir($upload_path, 0777, true);
                }

                $attachment_array = explode(',', ib_post('attachments'));
                foreach ($attachment_array as $a) {
                    $origin_path = 'storage/tickets/' . $a;
                    $new_path = $upload_path . '/' . $a;
                    $fileMoved = rename($origin_path, $new_path);
                }
            }

            $d = ORM::for_table('sys_ticketreplies')->create();
            $d->tid = $tid;
            $d->userid = $cid;
            $d->account = $reply_account;
            $d->reply_type = $reply_type;
            $d->email = $reply_email;
            $d->created_at = $ib_now;
            $d->updated_at = $ib_now;
            $d->message = $message;
            $d->replied_by = $last_reply;
            $d->admin = $admin;
            $d->attachments = ib_post('attachments');
            $d->client_read = '';
            $d->admin_read = '';
            $d->save();

            $ret_val = array(

                "success" => "Yes",
                "msg" => "Ticket Updated Successfully",
                "id" => $d->id(),
                "tid" => $tid

            );

            if ($sendEmail) {

                if ($is_admin) {

                    // Send reply to client

                    if(ib_post('attachments')){

                        $eml = ORM::for_table('sys_email_templates')->where('tplname', 'Ticket Attachment - Client')->where('send', 'Yes')->find_one();

                    } else {

                        $eml = ORM::for_table('sys_email_templates')->where('tplname', 'Tickets:Admin Response')->where('send', 'Yes')->find_one();

                    }

                    $email = $t->email;

                    if($eml){

                        $client_view_link = U.'client/tickets/view/'.$tid.'/';

                        $eml_subject = new Template($eml->subject);
                        $eml_subject->set('business_name', $config['CompanyName']);
                        $eml_subject->set('subject', $t->subject);
                        $eml_subject->set('ticket_subject', $t->subject);
                        $eml_subject->set('ticket_id', '#' . $t->tid);
                        $subj = $eml_subject->output();

                        $eml_message = new Template($eml->message);
                        $eml_message->set('client_name', $account);
                        $eml_message->set('client_email', $email);
                        $eml_message->set('priority', $t->urgency);
                        $eml_message->set('urgency', $t->urgency);
                        $eml_message->set('ticket_subject', $t->subject);
                        $eml_message->set('status', $t->urgency);
                        $eml_message->set('ticket_status', $t->status);
                        $eml_message->set('ticket_urgency', $t->urgency);
                        $eml_message->set('ticket_priority', $t->urgency);
                        $eml_message->set('ticket_id', $t->tid);
                        $eml_message->set('ticket_message', $message);
                        $eml_message->set('business_name', $config['CompanyName']);
                        $eml_message->set('ticket_link',$client_view_link);
                        $eml_message->set('department', $t->dname);
                        // $eml_message->set('processing', $urgency);
                        $message_o = $eml_message->output();

                        if($reply_type != 'internal')
                        {
                            Notify_Email::_send($t->account, $email, $subj, $message_o, $cid);
                        }



                    }


                } else {

                    // Send notification to admin

                    if (ib_post('attachments')) {

                        $eml = ORM::for_table('sys_email_templates')->where('tplname', 'Ticket Attachment - Client')->where('send', 'Yes')->find_one();

                    } else {

                        $eml = ORM::for_table('sys_email_templates')->where('tplname', 'Tickets:Client Response')->where('send', 'Yes')->find_one();

                    }


                    if(APP_STAGE == 'Dev')
                    {
                        Logger::write('Sending email to admin.');
                    }

                    if($eml){

                        if(APP_STAGE == 'Dev')
                        {
                            Logger::write('Sending email to admin..');
                        }

                        $client_view_link = U.'client/tickets/view/'.$tid.'/';

                        $ticket_link = U.'tickets/admin/view/'.$t->id;

                        $eml_subject = new Template($eml->subject);
                        $eml_subject->set('business_name', $config['CompanyName']);
                        $eml_subject->set('subject', $t->subject);
                        $eml_subject->set('ticket_subject', $t->subject);
                        $eml_subject->set('ticket_id', '#' . $t->tid);
                        $subj = $eml_subject->output();

                        $eml_message = new Template($eml->message);
                        $eml_message->set('client_name', $t->account);
                        $eml_message->set('client_email', $email);
                        $eml_message->set('priority', $t->urgency);
                        $eml_message->set('urgency', $t->urgency);
                        $eml_message->set('ticket_subject', $t->subject);
                        $eml_message->set('status', $t->urgency);
                        $eml_message->set('ticket_status', $t->status);
                        $eml_message->set('ticket_urgency', $t->urgency);
                        $eml_message->set('ticket_priority', $t->urgency);
                        $eml_message->set('ticket_id', $t->tid);
                        $eml_message->set('ticket_message', $message);
                        $eml_message->set('business_name', $config['CompanyName']);
                        $eml_message->set('ticket_link',$ticket_link);
                        $eml_message->set('department', $t->dname);
                        $message_o = $eml_message->output();

                        // Find all admins

                        // $admins = ORM::for_table('sys_users')->find_many();
                        // foreach ($admins as $admin)
                        // {
                        //    Notify_Email::_send($admin->fullname, $admin->username, $subj, $message_o, $cid);
                        // }

                        $d = ORM::for_table('sys_ticketdepartments')->find_one($t->did);

                        if (ib_post('attachments')) {

                            Notify_Email::_send($t->account, $t->email, $subj, $message_o, $cid);

                        } else {

                            if ($d && $d->email != '' && $reply_type == 'public') {
                                Notify_Email::_send($d->dname, $d->email, $subj, $message_o, $cid);
                            }

                        }

                        
                    }

                }

                // Ib_Email::_send($account,$email,'['.$t->tid.'] '.$t->subject,$message,$cid,'0',$t->cc,$t->bcc);

                // Mailer::send(array($t->email => $t->account),'[TID '.$t->tid.'] '.$t->subject,$message,'Ticket',$d->id());

            }

        } else {
            $ret_val = array(
                "success" => "No",
                "msg" => $msg
            );
        }

        return $ret_val;

    }



    public static function addPredefinedReply($data=array()){

        $msg = '';
        $id = '';
        $success = 'No';

        if(!isset($data['title']) || $data['title'] == ''){

            $msg .= 'Title is required. <br>';

        }

        if(!isset($data['message']) || $data['message'] == ''){

            $msg .= 'Message is required. <br>';

        }

        if($msg == ''){

            $d = ORM::for_table('sys_canned_responses')->create();

            $d->title = $data['title'];
            $d->message = $data['message'];
            $d->save();

            $success = 'Yes';

            $id = $d->id();

            $msg = 'Added Successfully';

        }


        return array(
            "success" => $success,
            "msg" => $msg,
            "id" => $id
        );
    }


    public static function deletePredefinedReply($id){

        $d = ORM::for_table('sys_canned_responses')->find_one($id);

        if($d){

            $d->delete();

            return true;

        }

        return false;

    }


    public static function departments(){
        $ds = ORM::for_table('sys_ticketdepartments')->select('dname','value')->find_array();
        return $ds;

    }


}