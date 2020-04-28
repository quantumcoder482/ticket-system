<?php
/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/
_auth();
$ui->assign('_title', $_L['Utilities'].'- '. $config['CompanyName']);
$ui->assign('_st', $_L['Utilities']);
$ui->assign('_application_menu', 'util');
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);

use Intervention\Image\ImageManager;
use function GuzzleHttp\json_encode;


switch ($action) {

    case 'admin_notification':

        $notification_type = route(2)?:'public';

        $notifications = ORM::for_table('sys_ticketreplies')
            ->left_outer_join('crm_accounts', array('crm_accounts.id', '=', 'sys_ticketreplies.userid'))
            ->left_outer_join('sys_tickets', array('sys_tickets.id', '=', 'sys_ticketreplies.tid'))
            ->left_outer_join('sys_users', array('sys_users.id', '=', 'sys_tickets.aid'))
            ->select('sys_ticketreplies.*')
            ->select('sys_tickets.tid', 'ticket_id')
            ->select('sys_users.fullname', 'assigned_name');

        if($notification_type == 'public'){
            $notifications = $notifications->select('crm_accounts.img', 'img')->where('reply_type', 'public')->where('admin', 0)->where('sys_tickets.aid', $user['id'])->where_not_equal('staff_read', 'yes');
        }
        if($notification_type == "internal"){
            $notifications = $notifications->select('sys_users.img', 'img')->where('reply_type', 'internal')->where_not_equal('admin', $user['id'])->where('sys_tickets.aid', $user['id'])->where_not_equal('staff_read', 'yes');
        }

        $notifications = $notifications->order_by_desc('sys_ticketreplies.id')->find_many();


        $ui->assign('xheader', Asset::css(array('modal', 'dp/dist/datepicker.min', 'footable/css/footable.core.min', 'dropzone/dropzone', 'redactor/redactor', 's2/css/select2.min')));
        $ui->assign('xfooter', Asset::js(array(
            'modal', 'dp/dist/datepicker.min', 'footable/js/footable.all.min', 'dropzone/dropzone', 'redactor/redactor.min', 'numeric', 's2/js/select2.min',
            's2/js/i18n/' . lan(),
        )));


        view('util-admin-notification', [
            'notifications' => $notifications,
            'notification_type' => $notification_type
        ]);


        break;

    case 'mark_all_read':

        $notification_type = route(2);
        $assigned_ticket_list = array();
        $assigned_tickets = ORM::for_table('sys_tickets')->where('aid', $user['id'])->find_array();
        foreach($assigned_tickets  as $at){
            $assigned_ticket_list[] = $at['id'];
        }

        if($notification_type == 'public'){
            $ticket_replies = ORM::for_table('sys_ticketreplies')
                ->where_not_equal('staff_read', 'yes')
                ->where('reply_type', 'public')
                ->where('admin', 0)
                ->find_many();
        }

        if($notification_type == 'internal'){
            $ticket_replies = ORM::for_table('sys_ticketreplies')
                ->where_not_equal('staff_read', 'yes')
                ->where('reply_type', 'internal')
                ->where_not_equal('admin', $user['id'])
                ->find_many();
        }

        if ($ticket_replies) {
            foreach ($ticket_replies as $t) {
                if(in_array($t->tid, $assigned_ticket_list)){
                    $t->staff_read = 'yes';
                    if($notification_type == 'public'){
                        $t->admin_read = 'yes';
                    }
                    $t->save();
                }
            }
        }
        echo '1';

        break;

    case 'notification_count':
        $d = ORM::for_table('sys_ticketreplies')
            ->left_outer_join('sys_tickets', array('sys_tickets.id', '=', 'sys_ticketreplies.tid'))
            ->where('reply_type', 'public')
            ->where_not_equal('staff_read', 'yes')
            ->where('admin', 0)
            ->where('sys_tickets.aid', $user['id'])
            ->count();

        echo $d;

        break;

    case 'inter_notification_count':
        $d = ORM::for_table('sys_ticketreplies')
            ->left_outer_join('sys_tickets', array('sys_tickets.id', '=', 'sys_ticketreplies.tid'))
            ->where('reply_type', 'internal')
            ->where_not_equal('staff_read', 'yes')
            ->where_not_equal('admin', $user['id'])
            ->where('sys_tickets.aid', $user['id'])
            ->count();
        echo $d;
        break;

    case 'notification-ajax':

        $d = ORM::for_table('sys_ticketreplies')
            ->left_outer_join('sys_tickets', array('sys_tickets.id', '=', 'sys_ticketreplies.tid'))
            ->select('sys_ticketreplies.*')
            ->select('sys_tickets.tid', 'ttid')
            ->where('reply_type', 'public')
            ->where('admin', 0)
            ->where_not_equal('staff_read','yes')
            ->where('sys_tickets.aid', $user['id'])
            ->order_by_desc('sys_ticketreplies.id')
            ->limit(5)
            ->find_many();

        $html = '';
        $df = $config['df'].' H:i:s';

        foreach($d as $ds){
            $path = U. 'tickets/admin/view/'.$ds['tid'].'/comments';
            $message = ' has replied';
            $icon = "<i class='fa fa-commenting-o' style='font-size: 2rem'></i>&nbsp;";
            if($ds['attachments'] != ""){
                $path = U. 'tickets/admin/view/'.$ds['tid'].'/downloads';
                $message = ' has attached file';
                $icon = "<i class='fa fa-paperclip' style='font-size: 2rem'></i>&nbsp;";
            }

            $html .= ' <li>
                            <a href="'.$path.'">
                                <div>
                                    '.$icon.'
                                    <span style="color:#2196F3">'.$ds['account'].'</span>'.$message.' 
                                    <span class="pull-right text-muted small">'.date( $df, strtotime($ds['updated_at'])).'</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>';
        }

        $html .= '<li>
                        <div class="text-center link-block">
                            <a href="'.U.'util_staff/admin_notification/public">
                                <strong>'.$_L['See All Activity'].' </strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </li>';

        echo $html;

        break;

    case 'inter-notification-ajax':

        $d = ORM::for_table('sys_ticketreplies')
            ->left_outer_join('sys_tickets', array('sys_tickets.id', '=', 'sys_ticketreplies.tid'))
            ->select('sys_ticketreplies.*')
            ->select('sys_tickets.tid', 'ttid')
            ->where('reply_type', 'internal')
            ->where_not_equal('staff_read', 'yes')
            ->where_not_equal('admin', $user['id'])
            ->where('sys_tickets.aid', $user['id'])
            ->order_by_desc('sys_ticketreplies.id')
            ->limit(5)
            ->find_many();

        $html = '';
        $df = $config['df'].' H:i:s';

        foreach($d as $ds){
            $html .= ' <li>
                            <a href="'.U. 'tickets/admin/view/'.$ds['tid'].'/comments'.'">
                                <div>
                                    <i class="fa fa-commenting-o" style="font-size: 2rem"></i>&nbsp;
                                    <span style="color:#2196F3">'.$ds['account']. '</span> has replied
                                    <span class="pull-right text-muted small">'.date( $df, strtotime($ds['updated_at'])).'</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>';
        }

        $html .= '<li>
                    <div class="text-center link-block">
                        <a href="'.U.'util_staff/admin_notification/internal">
                            <strong>'.$_L['See All Activity'].' </strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </li>';

        echo $html;

        break;

    default:
        echo 'action not defined';
}