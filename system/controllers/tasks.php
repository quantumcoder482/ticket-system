<?php
/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/
_auth();
$ui->assign('_application_menu', 'tasks');
$ui->assign('_title', $_L['Tasks'].'- '. $config['CompanyName']);
$ui->assign('_st', $_L['Tasks']);

$action = route(1,'list');

$user = User::_info();
$ui->assign('user', $user);

Event::trigger('accounts');

switch ($action) {

    case 'list':

        $mdate = date('Y-m-d');
        $ui->assign('mdate', $mdate);

        $contacts = Contact::select(['id','account'])->get()->groupBy('id')->all();
        $tickets = Ticket::select(['id','tid'])->get()->groupBy('id')->all();



        $lang_code = Ib_I18n::get_code($config['language']);

        $ui->assign('jsvar', '
        _L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 var ib_lang = \''.$lang_code.'\';
var ib_rtl = false;
var ib_calendar_first_day = 0;
var ib_date_format_picker = \''.ib_js_date_format($config['df'],'picker').'\';
var ib_date_format_moment = \''.ib_js_date_format($config['df']).'\';
 ');

       // $tasks = ORM::for_table('sys_tasks')->select('title')->select('aid')->select('status')->select('id')->find_array();
        $tasks_not_started = ORM::for_table('sys_tasks')
            ->select('title')
            ->select('aid')
            ->select('cid')
            ->select('tid')
            ->select('priority')
            ->where('status','Not Started')
            ->select('id')
            ->select('created_at')
            ->select('due_date')
            ->select('created_by')
            ->order_by_desc('id')
            ->find_array();
        $ui->assign('tasks_not_started',$tasks_not_started);
        // ==================================================================

        $tasks_in_progress = ORM::for_table('sys_tasks')
            ->select('title')
            ->select('aid')
            ->select('cid')
            ->select('tid')
            ->select('priority')
            ->where('status','In Progress')
            ->select('id')
            ->select('created_at')
            ->select('due_date')
            ->select('created_by')
            ->order_by_desc('id')
            ->find_array();
        $ui->assign('tasks_in_progress',$tasks_in_progress);
        // ==================================================================

        $tasks_completed = ORM::for_table('sys_tasks')
            ->select('title')
            ->select('aid')
            ->select('cid')
            ->select('tid')
            ->select('priority')
            ->where('status','Completed')
            ->select('id')
            ->select('created_at')
            ->select('due_date')
            ->select('created_by')
            ->order_by_desc('id')
            ->find_array();
        $ui->assign('tasks_completed',$tasks_completed);
        // ==================================================================

        $tasks_deferred = ORM::for_table('sys_tasks')
            ->select('title')
            ->select('aid')
            ->select('cid')
            ->select('tid')
            ->select('priority')
            ->where('status','Deferred')
            ->select('id')->select('created_at')
            ->select('due_date')
            ->select('created_by')
            ->order_by_desc('id')
            ->find_array();

        $ui->assign('tasks_deferred',$tasks_deferred);
        // ==================================================================

        $tasks_waiting = ORM::for_table('sys_tasks')
            ->select('title')
            ->select('aid')
            ->select('cid')
            ->select('tid')
            ->select('priority')
            ->where('status','Waiting')
            ->select('id')
            ->select('created_at')
            ->select('due_date')
            ->select('created_by')
            ->order_by_desc('id')
            ->find_array();
        $ui->assign('tasks_waiting',$tasks_waiting);
        // ==================================================================


        $ui->assign('xheader',Asset::css(array('modal','select/select.min','s2/css/select2.min','datetime','dragula/dragula','css/kanban')));
        $ui->assign('xfooter',Asset::js(array('modal','tinymce/tinymce.min','js/editor','select/select.min','s2/js/select2.min','s2/js/i18n/'.lan(),'datetime','dragula/dragula')));



        view('tasks',[
            'contacts' => $contacts,
            'tickets' => $tickets
        ]);

        break;

    case 'create':

        $id = route(2);

        $customers_all_data = has_access($user->roleid,'customers','all_data');

        $c = ORM::for_table('crm_accounts')->select('id')->select('account')->select('company')->select('email')->order_by_desc('id');

        if(!$customers_all_data)
        {
            $c->where('o',$user->id);
        }


        $c = $c->find_many();

        $edit = false;

//        $related_to = array(
//          'Customer',
//          'Project',
//          'Invoice',
//          'Order',
//          'Estimate',
//          'Contract',
//          'Ticket',
//          'Expense',
//          'Lead',
//          'Proposal'
//        );

        $relations = array(
            'Customer',
            'Invoice',
            'Quote',
            'Lead',
        );

        $app->emit('internalRelatedTo',[&$relations]);

        $mdate = date('Y-m-d');

        if($id == ''){


            $task = array();

            $task['id'] = '';
            $task['cid'] = '';
            $task['title'] = '';
            $task['description'] = '';
            $task['status'] = 'Not Started';
            $task['priority'] = '';
            $task['created_at'] = '';
            $task['created_by'] = '';
            $task['updated_at'] = '';
            $task['updated_by'] = '';
            $task['due_date'] = '';
            $task['is_public'] = '';
            $task['started'] = $mdate;
            $task['due_date'] = $mdate;



        }

        else{

            $id = str_replace('e_','',$id);

            $task = ORM::for_table('sys_tasks')->find_one($id);

            if($task){
                $edit = true;
            }

        }



        $ui->assign('edit',$edit);
        $ui->assign('task',$task);
        $ui->assign('relations',$relations);
        $ui->assign('val',$task);



        view('modal_task_create',[
            'c' => $c
        ]);



        break;

    case 'post':



        $title = _post('title');

        $msg = '';

        if($title == ''){
            $msg .= 'Title is required';
        }

        if($msg == ''){

            $data = ib_posted_data();

            $data['aid'] = $user->id;
            $data['created_by'] = $user->fullname;

            $task = Tasks::create($data);

            if($task){
              
                $t_data = ORM::for_table('sys_tasks')->find_one($task);
                $client_phone_number = '';

                if($t_data->rel_type == 'Ticket'){

                    if ($t_data->cid != 0) {
                        $client = ORM::for_table('crm_accounts')->find_one($t_data->cid);
                       
                        if($client){
                            
                            $client_phone_number = $client->phone;
                            
                            if ($client->fname != '' && $client->lname != '') {
                                $client_name = trim($client->fname) . ' ' . trim($client->lname);
                            } else {
                                $client_name = $client->account;
                            }
                        }
                    }else{
                        $client_name = '';
                    }

                    if ($t_data->tid != 0){
                        $ticket = ORM::for_table('sys_tickets')->find_one($t_data->tid);
                        if($ticket){
                            $ticket_id = $ticket->tid;
                            $ticket_subject = $ticket->subject;
                            $ticket_priority = $ticket->urgency;
                            $department = $ticket->dname;
                            
                        }
                    }

                    if($data['task_id']){
                        $eml = ORM::for_table('sys_email_templates')->where('tplname', 'Ticket Task Updated - Client')->where('send', 'Yes')->find_one();
                    } else {
                        $eml = ORM::for_table('sys_email_templates')->where('tplname', 'Ticket New Task Created - Client')->where('send', 'Yes')->find_one();
                    }
                    

                    $email = $ticket->email;

                    if ($eml) {

                        $client_view_link = U . 'client/tickets/view/' . $ticket->id . '/';
                        $eml_subject = new Template($eml->subject);
                        $eml_subject->set('business_name', $config['CompanyName']);
                        $eml_subject->set('subject', $ticket->subjet);
                        $eml_subject->set('ticket_subject', $ticket->subject);
                        $eml_subject->set('ticket_id', '#' . $ticket->tid);
                        $subj = $eml_subject->output();

                        $eml_message = new Template($eml->message);
                        $eml_message->set('client_name', $client_name);
                        $eml_message->set('client_email', $email);
                        $eml_message->set('priority', $ticket->priority);
                        $eml_message->set('urgency', $ticket->urgency);
                        $eml_message->set('ticket_subject', $ticket->subject);
                        $eml_message->set('status', $ticket->urgency);
                        $eml_message->set('ticket_status', $ticket->status);
                        $eml_message->set('ticket_urgency', $ticket->urgency);
                        $eml_message->set('ticket_priority', $ticket->urgency);
                        $eml_message->set('ticket_id', $ticket->tid);
                        $eml_message->set('ticket_message', $ticket->message);
                        $eml_message->set('business_name', $config['CompanyName']);
                        $eml_message->set('ticket_link', $client_view_link);
                        $eml_message->set('department', $ticket->dname);

                        $eml_message->set('task_name', $t_data->title);
                        $eml_message->set('task_status', $t_data->status);
                        $eml_message->set('task_comments', $t_data->description);

                        // $eml_message->set('processing', $urgency);
                        $message_o = $eml_message->output();

                        if ($reply_type != 'internal') {
                            Notify_Email::_send($ticket->account, $email, $subj, $message_o, $cid = $ticket->userid);
                        }

                        // SMS 

                        if ($client_phone_number != '') {
                            require 'system/lib/misc/smsdriver.php';

                            if($data['task_id']){
                                $tpl = SMSTemplate::where('tpl', 'Task Status: Client Notification')->first();
                            } else {
                                $tpl = SMSTemplate::where('tpl', 'Ticket task created: Client Notification')->first();
                            }
                            

                            if ($tpl) {
                                $message = new Template($tpl->sms);
                                $message->set('ticket_id', $ticket->tid);
                                $message->set('task_name', $t_data->title);
                                $message->set('task_status', $t_data->status);
                                $message_o = $message->output();
                                spSendSMS($client_phone_number, $message_o, 'PSCOPE', 0, 'text', 4);
                            }
                        }

                    }

                }


                echo $task;


            }
            else{
                echo 'An error occurred';
            }

        }

        else{

            echo $msg;

        }




        break;

    case 'set_status':

        $id = _post('task_id');
        $id = str_replace('item_','',$id);


        $d = ORM::for_table('sys_tasks')->find_one($id);

        $target = _post('target');

        switch ($target){

            case 'not_started':


                $status = 'Not Started';

                break;

            // =========================================

            case 'in_progress':

                $status = 'In Progress';


                break;

            // =========================================

            case 'completed':


                $status = 'Completed';

                break;

            // =========================================

            case 'deferred':


                $status = 'Deferred';

                break;

            // =========================================

            case 'waiting_on_someone':

                $status = 'Waiting';


                break;

            // =========================================

            default:

                $status = 'Not Started';

        }

        if($d){

            $d->status = $status;

            $d->save();


            // Email function

            $t_data = ORM::for_table('sys_tasks')->find_one($d->id());
            $client_phone_number = '';

            if ($t_data->rel_type == 'Ticket') {

                if ($t_data->cid != 0) {
                    $client = ORM::for_table('crm_accounts')->find_one($t_data->cid);
                    if ($client) {
                        
                        $client_phone_number = $client->phone;

                        if ($client->fname != '' && $client->lname != '') {
                            $client_name = trim($client->fname) . ' ' . trim($client->lname);
                        } else {
                            $client_name = $client->account;
                        }
                    }
                } else {
                    $client_name = '';
                }

                if ($t_data->tid != 0) {
                    $ticket = ORM::for_table('sys_tickets')->find_one($t_data->tid);
                    if ($ticket) {
                        $ticket_id = $ticket->tid;
                        $ticket_subject = $ticket->subject;
                        $ticket_priority = $ticket->urgency;
                        $department = $ticket->dname;
                    }
                }

                $eml = ORM::for_table('sys_email_templates')->where('tplname', 'Ticket Task Updated - Client')->where('send', 'Yes')->find_one();

                $email = $ticket->email;

                if ($eml) {

                    $client_view_link = U . 'client/tickets/view/' . $ticket->id . '/';
                    $eml_subject = new Template($eml->subject);
                    $eml_subject->set('business_name', $config['CompanyName']);
                    $eml_subject->set('subject', $ticket->subjet);
                    $eml_subject->set('ticket_subject', $ticket->subject);
                    $eml_subject->set('ticket_id', '#' . $ticket->tid);
                    $subj = $eml_subject->output();

                    $eml_message = new Template($eml->message);
                    $eml_message->set('client_name', $client_name);
                    $eml_message->set('client_email', $email);
                    $eml_message->set('priority', $ticket->priority);
                    $eml_message->set('urgency', $ticket->urgency);
                    $eml_message->set('ticket_subject', $ticket->subject);
                    $eml_message->set('status', $ticket->urgency);
                    $eml_message->set('ticket_status', $ticket->status);
                    $eml_message->set('ticket_urgency', $ticket->urgency);
                    $eml_message->set('ticket_priority', $ticket->urgency);
                    $eml_message->set('ticket_id', $ticket->tid);
                    $eml_message->set('ticket_message', $ticket->message);
                    $eml_message->set('business_name', $config['CompanyName']);
                    $eml_message->set('ticket_link', $client_view_link);
                    $eml_message->set('department', $ticket->dname);

                    $eml_message->set('task_name', $t_data->title);
                    $eml_message->set('task_status', $t_data->status);
                    $eml_message->set('task_comments', $t_data->description);

                    // $eml_message->set('processing', $urgency);
                    $message_o = $eml_message->output();

                    if ($reply_type != 'internal') {
                        
                        Notify_Email::_send($ticket->account, $email, $subj, $message_o, $cid = $ticket->userid);
                        // SMS 

                        if ($client_phone_number != '') {
                            require 'system/lib/misc/smsdriver.php';

                            $tpl = SMSTemplate::where('tpl', 'Task Status: Client Notification')->first();

                            if ($tpl) {
                                $message = new Template($tpl->sms);
                                $message->set('ticket_id', $ticket->tid);
                                $message->set('task_name', $t_data->title);
                                $message->set('task_status', $t_data->status);
                                $message_o = $message->output();
                                spSendSMS($client_phone_number, $message_o, 'PSCOPE', 0, 'text', 4);
                            }
                        }
                    }
                    
                }
            }

            echo $d->id();

        }



        break;


    case 'view':

        $id = route(2);
        $id = str_replace('v_','',$id);

        $d = ORM::for_table('sys_tasks')->find_one($id);

        if($d){

            $ui->assign('d',$d);


            $contact_id = $d->cid;
            $ticket_id = $d->tid;

            $contact = false;
            $ticket = false;

            if($contact_id != '' || $contact_id != 0)
            {
                $contact = Contact::find($contact_id);
            }

            if($ticket_id != '' || $ticket_id != 0)
            {
                $ticket = Ticket::find($ticket_id);
            }

            view('modal_task_view',[
                'contact' => $contact,
                'ticket' => $ticket
            ]);


        }


        break;



    default:
        echo 'action not defined';
}