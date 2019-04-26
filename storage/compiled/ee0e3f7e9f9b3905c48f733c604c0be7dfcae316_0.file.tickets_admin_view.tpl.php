<?php
/* Smarty version 3.1.33, created on 2019-04-25 12:12:04
  from '/home/pscope/public_html/ui/theme/default/tickets_admin_view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cc156bccb39d2_80168673',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee0e3f7e9f9b3905c48f733c604c0be7dfcae316' => 
    array (
      0 => '/home/pscope/public_html/ui/theme/default/tickets_admin_view.tpl',
      1 => 1553599356,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cc156bccb39d2_80168673 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9914268935cc156bcc65fa2_32061695', "style");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19438873375cc156bcc69b64_06574400', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6469289195cc156bccab8c9_99389036', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "style"} */
class Block_9914268935cc156bcc65fa2_32061695 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'style' => 
  array (
    0 => 'Block_9914268935cc156bcc65fa2_32061695',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/s2/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/footable/css/footable.core.min.css" />
<?php
}
}
/* {/block "style"} */
/* {block "content"} */
class Block_19438873375cc156bcc69b64_06574400 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_19438873375cc156bcc69b64_06574400',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>





    <div class="row">
        <div class="col-md-4">
            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tickets/admin/list/" class="btn btn-primary btn-sm" style="margin-bottom: 15px;"><i
                        class="fa fa-long-arrow-left"></i> Back to the List</a>


            <div class="panel panel-default" id="t_options">


                <div class="panel-body">
                    <h3><?php echo $_smarty_tpl->tpl_vars['d']->value->subject;?>
</h3>
                    <hr>

                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#details"><i class="fa fa-th"></i> Details</a></li>
                        <li><a data-toggle="tab" href="#tasks"><i class="fa fa-tasks"></i> Tasks</a></li>

                    </ul>

                    <div class="tab-content">
                        <div id="details" class="tab-pane fade in active ib-tab-box">


                            <span class="label label-default inline-block"> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Priority'];?>
: <?php echo $_smarty_tpl->tpl_vars['d']->value->urgency;?>
 </span> &nbsp;

                            <span class="label label-default inline-block"> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Status'];?>
: <span id="inline_status"><?php echo $_smarty_tpl->tpl_vars['d']->value->status;?>
</span></span>
                            <hr>
                            <p><strong>Ticket:</strong> <?php echo $_smarty_tpl->tpl_vars['d']->value->tid;?>
</p>
                            <p><strong>Customer:</strong> <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/view/<?php echo $_smarty_tpl->tpl_vars['d']->value->userid;?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value->account;?>
</a></p>


                            <p>
                                <strong>Time:</strong> <span id="timeSpent"><?php if ($_smarty_tpl->tpl_vars['ticket']->value->ttotal == '') {?>00:00:00<?php } else {
echo $_smarty_tpl->tpl_vars['ticket']->value->ttotal;
}?></span>
                            </p>



                            <div class="form-group">

                                <div class="col-xs-6">
                                    <div class="form-group">
                                                                                <label>HH</label>
                                        <select class="form-control">
                                            <option>1</option>
                                            <option>3</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>MM</label>
                                        <select class="form-control">
                                            <option>5</option>
                                            <option>10</option>
                                            <option>15</option>
                                        </select>
                                    </div>
                                </div>

                            </div>



                                                                                                                                                                                                                        
                            <hr>




                            <a class="btn btn-primary" href="#" id="add_reply">Add Reply</a>

                            <?php if ($_smarty_tpl->tpl_vars['can_edit_sales']->value) {?>
                                <?php if ($_smarty_tpl->tpl_vars['invoice']->value) {?>
                                    <a class="btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/view/<?php echo $_smarty_tpl->tpl_vars['invoice']->value->id;?>
" id="add_reply">View invoice</a>
                                <?php } else { ?>
                                    <a class="btn btn-success" id="convertToInvoice" href="javascript:;">Create invoice</a>
                                <?php }?>
                            <?php }?>


                            <a class="cdelete btn btn-danger" href="#" id="t<?php echo $_smarty_tpl->tpl_vars['d']->value->id;?>
"><i class="icon-trash"></i> </a>

                            <hr>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material floating">
                                        <div class="form-material floating">
                                            <select class="form-control" id="editable_department" name="editable_department" size="1">
                                                <option value="None">None</option>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['departments']->value, 'dep');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dep']->value) {
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['dep']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['department']->value == $_smarty_tpl->tpl_vars['dep']->value['dname']) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['dep']->value['dname'];?>
</option>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                            </select>
                                            <label for="editable_department"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Department'];?>
</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material floating">
                                        <div class="form-group">
                                            <label>Assigned to</label>
                                            <select class="form-control" id="editable_assigned_to" name="editable_assigned_to" size="1">
                                                <option value="None">None</option>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ads']->value, 'ad');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ad']->value) {
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['ad']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['d']->value->aid == $_smarty_tpl->tpl_vars['ad']->value['id']) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['ad']->value['fullname'];?>
 State | City | Expertise</option>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                            </select>



                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material floating">
                                        <div class="form-material floating">
                                            <select class="form-control" id="editable_status" name="editable_status" size="1">
                                                <option value="Open" <?php if ($_smarty_tpl->tpl_vars['d']->value->status == 'Open') {?> selected<?php }?>>Open</option>
                                                <option value="On Hold" <?php if ($_smarty_tpl->tpl_vars['d']->value->status == 'On Hold') {?> selected<?php }?>>On Hold</option>
                                                <option value="Escalated" <?php if ($_smarty_tpl->tpl_vars['d']->value->status == 'Escalated') {?> selected<?php }?>>Escalated</option>
                                                <option value="Closed" <?php if ($_smarty_tpl->tpl_vars['d']->value->status == 'Closed') {?> selected<?php }?>>Closed</option>

                                            </select>
                                            <label for="editable_status">Status</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="editable_email" name="editable_email" value="<?php echo $_smarty_tpl->tpl_vars['d']->value->email;?>
">
                                        <label for="editable_cc">Email</label>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="editable_cc" name="editable_cc" value="<?php echo $_smarty_tpl->tpl_vars['d']->value->cc;?>
">
                                        <label for="editable_cc">CC</label>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="editable_bcc" name="editable_bcc" value="<?php echo $_smarty_tpl->tpl_vars['d']->value->bcc;?>
">
                                        <label for="editable_bcc">BCC</label>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="editable_phone" name="editable_phone" value="<?php if ($_smarty_tpl->tpl_vars['c']->value) {
echo $_smarty_tpl->tpl_vars['c']->value->phone;
}?>">
                                        <label for="editable_phone">Phone</label>
                                    </div>
                                </div>
                            </div>





                            <input type="hidden" name="tid" id="tid" value="<?php echo $_smarty_tpl->tpl_vars['d']->value->id;?>
">



                            <div class="row">
                                <div class="col-xs-12">
                                    <form>

                                        <hr>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Note</label>
                                            <textarea class="form-control" name="notes" id="notes" rows="3"
                                                      placeholder="Add Note..."><?php echo $_smarty_tpl->tpl_vars['d']->value->notes;?>
</textarea>
                                        </div>

                                        <button type="submit" id="btn_save_note" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>

                                    </form>
                                </div>
                            </div>


                            <hr>

                            <h4>Previous Conversations</h4>

                            <table class="table table-hover">

                                <tbody>

                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['o_tickets']->value, 'o_ticket');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['o_ticket']->value) {
?>

                                    <?php if ($_smarty_tpl->tpl_vars['o_ticket']->value['id'] == $_smarty_tpl->tpl_vars['d']->value->id) {?>
                                        <?php continue 1;?>
                                    <?php }?>

                                    <tr>
                                        <td>
                                            <em class="mmnt"><?php echo strtotime($_smarty_tpl->tpl_vars['o_ticket']->value['created_at']);?>
</em>
                                            <br>
                                            <p><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tickets/admin/view/<?php echo $_smarty_tpl->tpl_vars['o_ticket']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['o_ticket']->value['subject'];?>
</a></p>
                                            <span class="label label-default inline-block"> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Status'];?>
: <?php echo $_smarty_tpl->tpl_vars['d']->value->status;?>
 </span> &nbsp;
                                            <span class="label label-default inline-block"> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Priority'];?>
: <?php echo $_smarty_tpl->tpl_vars['d']->value->urgency;?>
 </span> &nbsp;

                                        </td>
                                    </tr>

                                    <?php
}
} else {
?>
                                    <tr>
                                        <td>

                                            No Data Available

                                        </td>
                                    </tr>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                                                                                                                                                
                                                                
                                </tbody>
                            </table>

                        </div>


                        <div id="tasks" class="tab-pane fade ib-tab-box">


                            <form id="ib_add_group" class="form-horizontal push-10-t push-10" method="post">

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material floating">
                                            <input class="form-control" type="text" id="task_subject" name="task_subject">
                                            <label for="task_subject">Task</label>

                                        </div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <button class="btn btn-primary" id="btn_add_task" type="submit"> Save</button>
                                        <div id="tasks_tools"  style="display: none;">
                                            <hr>
                                                                                                                                                                                
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-green no-shadow" id="btn_mark_tasks_completed" data-toggle="tooltip" data-placement="top" title="Mark as Completed"><i class="fa fa-check"></i></button>
                                                <button type="button" class="btn btn-primary no-shadow" id="btn_mark_tasks_not_started" data-toggle="tooltip" data-placement="top" title="Mark as Not Started"><i class="fa fa-clock-o"></i></button>
                                                <button type="button" class="btn btn-danger no-shadow" id="btn_delete_tasks" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                            </div>


                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div id="tasks_list">

                            </div>


                        </div>

                    </div>





                </div>

            </div>

        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12" id="create_ticket">


                    <!-- The time line -->
                    <ul class="timeline">
                        <!-- timeline time label -->
                        <li class="time-label">
                  <span class="mmnt">
                    <?php echo strtotime($_smarty_tpl->tpl_vars['d']->value->created_at);?>

                  </span>
                        </li>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <li>
                            

                            <?php if ($_smarty_tpl->tpl_vars['d']->value->admin != '0') {?>
                                <?php if ($_smarty_tpl->tpl_vars['user']->value['img'] == 'gravatar') {?>
                                    <img src="http://www.gravatar.com/avatar/<?php echo md5(($_smarty_tpl->tpl_vars['user']->value['email']));?>
?s=30"
                                         class="img-time-line" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['fullname'];?>
">
                                <?php } elseif ($_smarty_tpl->tpl_vars['user']->value['img'] == '') {?>
                                    <img class="img-time-line" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/imgs/default-user-avatar.png" alt="">
                                <?php } else { ?>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['user']->value['img'];?>
" class="img-time-line" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['account'];?>
">
                                <?php }?>

                            <?php } elseif (($_smarty_tpl->tpl_vars['c']->value)) {?>

                                <?php if ($_smarty_tpl->tpl_vars['c']->value->img == 'gravatar') {?>
                                    <img src="http://www.gravatar.com/avatar/<?php echo md5(($_smarty_tpl->tpl_vars['user']->value['email']));?>
?s=30"
                                         class="img-time-line" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['fullname'];?>
">
                                <?php } elseif ($_smarty_tpl->tpl_vars['c']->value->img == '') {?>
                                    <img class="img-time-line" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/imgs/default-user-avatar.png" alt="">
                                <?php } else { ?>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['c']->value->img;?>
" class="img-time-line" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['account'];?>
">
                                <?php }?>

                            <?php } else { ?>



                            <?php }?>


                            <div class="timeline-item">
                                

                                <h3 class="timeline-header"><a href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['d']->value->account;?>
</a></h3>

                                <div class="timeline-body">
                                    <?php echo $_smarty_tpl->tpl_vars['d']->value->message;?>

                                    <hr>

                                    <a href="#" class="btn btn-warning btn-xs t_edit" data-toggle="tooltip"
                                       data-placement="top" title="" data-original-title="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>
" id="et<?php echo $_smarty_tpl->tpl_vars['d']->value->id;?>
"><i
                                                class="glyphicon glyphicon-pencil"></i> </a>
                                </div>

                                <?php if (($_smarty_tpl->tpl_vars['d']->value->attachments) != '') {?>
                                    <div class="timeline-footer">
                                        <?php echo Tickets::gen_link_attachments($_smarty_tpl->tpl_vars['d']->value->attachments);?>

                                    </div>
                                <?php }?>


                            </div>
                        </li>

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['replies']->value, 'reply');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['reply']->value) {
?>
                            <li class="time-label">
                  <span class="mmnt">
                    <?php echo strtotime($_smarty_tpl->tpl_vars['reply']->value['created_at']);?>

                  </span>
                            </li>
                            <li>
                                

                                <?php if ($_smarty_tpl->tpl_vars['reply']->value['admin'] != '0') {?>
                                    <img src="<?php echo getAdminImage($_smarty_tpl->tpl_vars['reply']->value['admin'],30);?>
" class="img-time-line">
                                <?php } elseif (($_smarty_tpl->tpl_vars['c']->value)) {?>

                                    <?php if ($_smarty_tpl->tpl_vars['c']->value->img == '') {?>
                                        <img class="img-time-line" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/imgs/default-user-avatar.png"
                                             alt="">
                                    <?php } else { ?>
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['c']->value->img;?>
" class="img-time-line" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['account'];?>
">
                                    <?php }?>

                                <?php } else { ?>



                                <?php }?>

                                <div class="timeline-item">
                                    
                                    <h3 class="timeline-header"><a href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['reply']->value['replied_by'];?>
</a></h3>

                                    <div class="timeline-body" <?php if ($_smarty_tpl->tpl_vars['reply']->value['reply_type'] == 'internal') {?> style="background: #FFF6D9;" <?php }?>>
                                        <?php echo $_smarty_tpl->tpl_vars['reply']->value['message'];?>


                                        <hr>

                                        <a href="#" class="btn btn-warning btn-xs no-shadow reply_edit"
                                           data-toggle="tooltip" data-placement="top" title=""
                                           data-original-title="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>
" id="er<?php echo $_smarty_tpl->tpl_vars['reply']->value['id'];?>
"><i
                                                    class="glyphicon glyphicon-pencil"></i> </a> &nbsp;
                                        <a href="#" class="btn btn-danger btn-xs no-shadow reply_delete"
                                           data-toggle="tooltip" data-placement="top" title=""
                                           data-original-title="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
" id="dr<?php echo $_smarty_tpl->tpl_vars['reply']->value['id'];?>
"><i
                                                    class="glyphicon glyphicon-trash"></i> </a> &nbsp;

                                        <?php if ($_smarty_tpl->tpl_vars['reply']->value['reply_type'] == 'internal') {?> <a href="#" class="btn btn-primary btn-xs no-shadow reply_make_public"
                                                                                   data-toggle="tooltip" data-placement="top" title=""
                                                                                   data-original-title="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Public'];?>
" id="rp<?php echo $_smarty_tpl->tpl_vars['reply']->value['id'];?>
"><i
                                                    class="fa fa-globe"></i> </a> <?php }?>

                                    </div>

                                    <?php if (($_smarty_tpl->tpl_vars['reply']->value['attachments']) != '') {?>
                                        <div class="timeline-footer">
                                            <?php echo Tickets::gen_link_attachments($_smarty_tpl->tpl_vars['reply']->value['attachments']);?>

                                        </div>
                                    <?php }?>


                                </div>
                            </li>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <li class="time-label">
                  <span class="bg-green" id="section_add_reply">
                   Add Reply
                  </span>
                        </li>
                        <li>
                            <?php if ($_smarty_tpl->tpl_vars['user']->value['img'] == '') {?>
                                <img class="img-time-line" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/imgs/default-user-avatar.png" alt="">
                            <?php } else { ?>
                                <img src="<?php echo $_smarty_tpl->tpl_vars['user']->value['img'];?>
" class="img-time-line" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['account'];?>
">
                            <?php }?>

                            <div class="timeline-item">


                                <div class="timeline-body">
                                    <form class="form-horizontal push-10-t push-10" method="post">

                                        <ul class="nav nav-pills">
                                            <li class="active" id="reply_public"><a href="#">Public</a></li>
                                            <li id="reply_internal"><a href="#">Internal</a></li>

                                        </ul>

                                        <div class="form-group">
                                            <div class="col-xs-12">

                                            <textarea id="content" class="form-control sysedit"
                                                      name="content"></textarea>
                                                <div class="help-block">
                                                    <a data-toggle="modal" href="#modal_add_item"><i
                                                                class="fa fa-paperclip"></i> Attach File</a>
                                                    | <a data-toggle="modal" href="#modal_predefined_replies"><i
                                                                class="fa fa-align-left"></i> Predefined reply</a>
                                                </div>
                                            </div>
                                        </div>

                                                                                                                                                                                                                                                                                                                                                                                                                

                                        <div class="form-group">
                                            <div class="col-xs-12">

                                                <input type="hidden" name="attachments" id="attachments" value="">
                                                <input type="hidden" name="f_tid" id="f_tid" value="<?php echo $_smarty_tpl->tpl_vars['d']->value->id;?>
">
                                                <input type="hidden" name="cid" id="cid" value="<?php echo $_smarty_tpl->tpl_vars['d']->value->userid;?>
">

                                                <button class="btn btn-primary" id="ib_form_submit" type="submit"><i
                                                            class="fa fa-send push-5-r"></i> Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                                                                                                                                            </div>
                        </li>
                        <!-- END timeline item -->
                        <!-- timeline item -->

                        <!-- END timeline item -->
                        <!-- timeline time label -->

                        <!-- /.timeline-label -->
                        <!-- timeline item -->

                        <!-- END timeline item -->
                        <!-- timeline item -->

                        <!-- END timeline item -->
                        <li>
                            <i class="fa fa-life-ring bg-gray"></i>
                        </li>
                    </ul>
                </div>
                <!-- /.col -->
            </div>
        </div>
    </div>

    <div id="modal_add_item" class="modal fade" tabindex="-1" data-width="600" style="display: none;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Add File</h4>
        </div>
        <div class="modal-body">
            <div class="row">


                <div class="col-md-12">
                    <form action="" class="dropzone" id="upload_container">

                        <div class="dz-message">
                            <h3><i class="fa fa-cloud-upload"></i> Drop File Here</h3>
                            <br/>
                            <span class="note">Or Click to Upload</span>
                        </div>

                    </form>


                </div>


            </div>
        </div>
        <div class="modal-footer">

            <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>

        </div>
    </div>


    <div id="modal_predefined_replies" class="modal fade" tabindex="-1" data-width="800" style="display: none;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Predefined replies</h4>
        </div>
        <div class="modal-body">
            <div class="row">


                <div class="col-md-12">

                    <form class="form-horizontal" method="post" action="">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-search"></span>
                                    </div>
                                    <input type="text" name="name" id="foo_filter" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Search'];?>
..."/>

                                </div>
                            </div>

                        </div>
                    </form>

                    <table class="table table-bordered table-hover sys_table footable" data-filter="#foo_filter" data-page-size="50">
                        <thead>
                        <tr>
                            <th>Name</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['predefined_replies']->value, 'predefined_replie');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['predefined_replie']->value) {
?>
                            <tr>
                                <td><a href="javascript:;" onclick="setPreDefinedContent(event,'<?php echo $_smarty_tpl->tpl_vars['predefined_replie']->value->id;?>
');"><?php echo $_smarty_tpl->tpl_vars['predefined_replie']->value->title;?>
</a> </td>
                            </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                        </tbody>

                        <tfoot>
                        <tr>
                            <td>
                                <ul class="pagination">
                                </ul>
                            </td>
                        </tr>
                        </tfoot>

                    </table>
                </div>


            </div>
        </div>
        <div class="modal-footer">

            <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>

        </div>
    </div>

<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_6469289195cc156bccab8c9_99389036 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_6469289195cc156bccab8c9_99389036',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/footable/js/footable.all.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/easytimer.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/s2/js/select2.min.js"><?php echo '</script'; ?>
>


    <?php echo '<script'; ?>
>

        Dropzone.autoDiscover = false;
        $(function() {

            var _url = $("#_url").val();

            var $ib_form_submit = $("#ib_form_submit");

            var $create_ticket = $("#create_ticket");

            $('.footable').footable();
            ib_editor("#content",200);

            var $modal = $('#ajax-modal');

            var reply_type = 'public';


            var upload_resp;


            var ib_file = new Dropzone("#upload_container",
                {
                    url: _url + "tickets/client/upload_file/",
                    maxFiles: 10,
                    acceptedFiles: "image/jpeg,image/png,image/gif"
                }
            );

            ib_file.on("sending", function() {

                $ib_form_submit.prop('disabled', true);

            });


            // Ticket convert to invoice

            $('#convertToInvoice').on('click',function (e) {
                e.preventDefault();

                bootbox.confirm('Are you sure?', function (yes) {
                    if(yes)
                        {
                            window.location = '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/create-from-ticket/<?php echo $_smarty_tpl->tpl_vars['d']->value->id;?>
';
                        }
                });

            });


            ib_file.on("success", function(file,response) {

                $ib_form_submit.prop('disabled', false);

                upload_resp = response;

                if(upload_resp.success == 'Yes'){

                    toastr.success(upload_resp.msg);
                    // $file_link.val(upload_resp.file);
                    // files.push(upload_resp.file);
                    //
                    // console.log(files);

                    $('#attachments').val(function(i,val) {
                        return val + (!val ? '' : ',') + upload_resp.file;
                    });


                }
                else{
                    toastr.error(upload_resp.msg);
                }







            });



            $ib_form_submit.on('click', function(e) {
                e.preventDefault();
                $create_ticket.block({ message: block_msg });
                $.post( _url + "tickets/admin/add_reply/", {  message: tinyMCE.activeEditor.getContent(), reply_type: reply_type, attachments: $("#attachments").val(), f_tid: $("#f_tid").val()} )
                    .done(function( data ) {

                        if(data.success == "Yes"){
                            location.reload();
                        }

                        else {
                            $create_ticket.unblock();
                            toastr.error(data.msg);
                        }

                    });


            });


            $("#add_reply").on('click', function(e) {
                e.preventDefault();

                $('html, body').animate({
                    scrollTop: $("#section_add_reply").offset().top - 60
                }, 500);

                tinyMCE.activeEditor.focus();

            });

            $('#notes').redactor(
                {
                    minHeight: 150, // pixels
                    plugins: ['fontcolor']
                }
            );

            $("#btn_save_note").on('click', function(e) {
                e.preventDefault();

                $('#t_options').block({ message: null });

                $.post(base_url + 'tickets/admin/save_note', {
                    tid: $('#tid').val(),

                    notes: $('#notes').val()

                })
                    .done(function () {
                        toastr.success(_L['Saved Successfully']);
                        $('#t_options').unblock();

                    });

            });

            $(".cdelete").click(function (e) {
                e.preventDefault();
                var id = this.id;
                bootbox.confirm(_L['are_you_sure'], function(result) {
                    if(result){
                        window.location.href = base_url + "tickets/admin/delete/" + id;
                    }
                });
            });


            $(".t_edit").click(function (e) {
                e.preventDefault();
                var id = this.id;

                $('body').modalmanager('loading');


                $modal.load( base_url + 'tickets/admin/edit_modal/'+id, '', function(){

                    $modal.modal();

                    ib_editor("#edit_content",300,true,false);

                });
            });


            $(".reply_edit").click(function (e) {
                e.preventDefault();
                var id = this.id;

                $('body').modalmanager('loading');


                $modal.load( base_url + 'tickets/admin/edit_modal/'+id+'/reply', '', function(){

                    $modal.modal();

                    ib_editor("#edit_content",300,true,false);

                });
            });


            $(".c_view").click(function (e) {
                e.preventDefault();
                var id = this.id;

                $('body').modalmanager('loading');

                $modal.load( base_url + 'tickets/admin/view_modal/'+id, '', function(){

                    $modal.modal();

                });
            });


            $('[data-toggle="tooltip"]').tooltip();

            $modal.on('hidden.bs.modal', function () {
                location.reload();
            });

            $modal.on('click', '.update_ticket_message', function(e){

                e.preventDefault();

                $modal.modal('loading');

                $.post( _url + "tickets/admin/edit_modal_post/", {
                    tid: $('#edit_tid').val(),
                    type: $('#edit_type').val(),
                    message: tinyMCE.activeEditor.getContent()

                })
                    .done(function( data ) {

                        if ($.isNumeric(data)) {

                            location.reload();

                        }

                        else {
                            $modal.modal('loading');
                            toastr.error(data);
                        }

                    });

            });


            $(".reply_delete").click(function (e) {
                e.preventDefault();
                var id = this.id;
                bootbox.confirm(_L['are_you_sure'], function(result) {
                    if(result){
                        window.location.href = base_url + "tickets/admin/delete_reply/" + id;
                    }
                });
            });




            

            $("#editable_cc").on("blur",function(e){
                $.post(base_url + 'tickets/admin/update_cc',{id: tid, value: $(this).val()},function (data) {
                    if ($.isNumeric(data)) {

                        toastr.success(_L['Saved Successfully']);

                    }

                    else {

                        toastr.error(data);
                    }
                })
            });


            $("#editable_bcc").on("blur",function(e){
                $.post(base_url + 'tickets/admin/update_bcc',{id: tid, value: $(this).val()},function (data) {
                    if ($.isNumeric(data)) {

                        toastr.success(_L['Saved Successfully']);

                    }

                    else {

                        toastr.error(data);
                    }
                })
            });


            $("#editable_email").on("blur",function(e){
                $.post(base_url + 'tickets/admin/update_email',{id: tid, value: $(this).val()},function (data) {
                    if ($.isNumeric(data)) {

                        toastr.success(_L['Saved Successfully']);

                    }

                    else {

                        toastr.error(data);
                    }
                })
            });


            $("#editable_phone").on("blur",function(e){
                $.post(base_url + 'tickets/admin/update_phone',{id: tid, value: $(this).val()},function (data) {
                    if ($.isNumeric(data)) {

                        toastr.success(_L['Saved Successfully']);

                    }

                    else {

                        toastr.error(data);
                    }
                })
            });


            $("#editable_hour").on("blur",function(e){
                $.post(base_url + 'tickets/admin/update_hour',{id: tid, value: $(this).val()},function (data) {
                    if ($.isNumeric(data)) {

                        toastr.success(_L['Saved Successfully']);

                    }

                    else {

                        toastr.error(data);
                    }
                })
            });

            $("#editable_minute").on("blur",function(e){
                $.post(base_url + 'tickets/admin/update_minute',{id: tid, value: $(this).val()},function (data) {
                    if ($.isNumeric(data)) {

                        toastr.success(_L['Saved Successfully']);

                    }

                    else {

                        toastr.error(data);
                    }
                })
            });


            $("#editable_department").on("change",function(e){
                $.post(base_url + 'tickets/admin/update_department',{id: tid, value: $(this).val()},function (data) {
                    if ($.isNumeric(data)) {

                        toastr.success(_L['Saved Successfully']);

                    }

                    else {

                        toastr.error(data);
                    }
                })
            });


            $('#editable_assigned_to').select2({
                theme: "bootstrap",
            })
                .on("change", function (e) {

                    $.post(base_url + 'tickets/admin/update_assigned_to',{id: tid, value: $("#editable_assigned_to option:selected").val()},function (data) {
                        if ($.isNumeric(data)) {

                            toastr.success(_L['Saved Successfully']);

                        }

                        else {

                            toastr.error(data);
                        }
                    })
                });


            // $("#editable_assigned_to").on("change",function(e){
            //
            // });

            $("#editable_status").on("change",function(e){
                $.post(base_url + 'tickets/admin/update_status',{id: tid, value: $(this).val()},function (data) {
                    if ($.isNumeric(data)) {

                        toastr.success(_L['Saved Successfully']);

                        $("#inline_status").html($("#editable_status option:selected").text());

                    }

                    else {

                        toastr.error(data);
                    }
                })
            });

            



            var $reply_public = $("#reply_public");
            var $reply_internal = $("#reply_internal");


            $reply_public.click(function (e) {
                e.preventDefault();
                $(this).addClass('active');
                $reply_internal.removeClass('active');
                reply_type = 'public';
                tinymce.activeEditor.getBody().style.backgroundColor = '#FFFFFF';
            });


            $reply_internal.click(function (e) {
                e.preventDefault();
                $(this).addClass('active');
                $reply_public.removeClass('active');
                reply_type = 'internal';
                tinymce.activeEditor.getBody().style.backgroundColor = '#FFF6D9';
            });


            $(".reply_make_public").click(function (e) {
                e.preventDefault();
                var id = this.id;
                bootbox.confirm(_L['are_you_sure'], function(result) {
                    if(result){
                        window.location.href = base_url + "tickets/admin/reply_make_public/" + id;
                    }
                });
            });

            function loadTasks() {

                $("#tasks_list").html(block_msg);

                $.get( base_url + "tickets/admin/tasks_list/"+tid, function( data ) {

                    $("#tasks_list").html(data);

                    $('.i-checks').iCheck({
                        checkboxClass: 'icheckbox_square-blue',
                        radioClass: 'icheckbox_square-blue',
                        increaseArea: '20%' // optional
                    });

                    $('.i-checks').on('ifChanged', function (event) {

                        var i_check_id = $(this)[0].id;

                        if($(this).iCheck('update')[0].checked){

                            $.get(base_url + 'tickets/admin/set_task_completed/'+i_check_id,function () {
                                loadTasks();
                            });

                        }
                        else{

                            $.get(base_url + 'tickets/admin/set_task_not_started/'+i_check_id,function () {
                                loadTasks();
                            });

                        }

                    });

                });
            }


            loadTasks();


            $("#btn_add_task").click(function (e) {
                e.preventDefault();



                if($("#task_subject").val() == ''){

                    $("#task_subject").focus();

                }

                else {

                    $("#btn_add_task").prop('disabled', true);

                    $.post( base_url + "tasks/post/", { title: $("#task_subject").val(), rel_type: 'Ticket', tid: tid, rel_id: tid, cid: <?php echo $_smarty_tpl->tpl_vars['ticket']->value->userid;?>
, priority: '<?php echo $_smarty_tpl->tpl_vars['ticket']->value->urgency;?>
' })
                        .done(function( data ) {

                            $("#btn_add_task").prop('disabled', false);

                            if ($.isNumeric(data)) {

                                $("#task_subject").val('');

                                loadTasks();

                            }
                            else{
                                toastr.error(data);
                            }

                        });

                }
            });

            var task_id;

            function has_selected_task_items() {
                if($('.selected').length > 0){

                    $("#tasks_tools").show(200);

                }
                else{
                    $("#tasks_tools").hide(200);
                }
            }

            $("#tasks_list").on('click', '.task_item', function () {

                task_id = this.id;



                if($("#" + task_id).hasClass('selected')){
                    $("#" + task_id).removeClass('selected');
                }
                else{
                    $("#" + task_id).addClass('selected');
                }

                has_selected_task_items();


                // alert(task_id);


            });

            $("#btn_mark_tasks_completed").on('click',function (e) {
                e.preventDefault();
                var arrayOfIds = $.map($(".selected"), function(n, i){
                    return n.id;
                });

                $("#btn_mark_tasks_completed").prop('disabled', true);

                $.post( base_url + "tickets/admin/do_task/", { action: 'completed', ids: arrayOfIds })
                    .done(function( data ) {

                        $("#btn_mark_tasks_completed").prop('disabled', false);

                        loadTasks();

                        $("#tasks_tools").hide(200);

                    });

            });


            $("#btn_mark_tasks_not_started").on('click',function (e) {
                e.preventDefault();
                var arrayOfIds = $.map($(".selected"), function(n, i){
                    return n.id;
                });

                $("#btn_mark_tasks_completed").prop('disabled', true);

                $.post( base_url + "tickets/admin/do_task/", { action: 'not_started', ids: arrayOfIds })
                    .done(function( data ) {

                        $("#btn_mark_tasks_completed").prop('disabled', false);

                        loadTasks();

                        $("#tasks_tools").hide(200);

                    });

            });


            $("#btn_delete_tasks").on('click',function (e) {
                e.preventDefault();

                bootbox.confirm(_L['are_you_sure'], function(result) {
                    if(result){
                        var arrayOfIds = $.map($(".selected"), function(n, i){
                            return n.id;
                        });

                        $("#btn_delete_tasks").prop('disabled', true);

                        $.post( base_url + "tickets/admin/do_task/", { action: 'delete', ids: arrayOfIds })
                            .done(function( data ) {

                                $("#btn_delete_tasks").prop('disabled', false);

                                loadTasks();

                                $("#tasks_tools").hide(200);

                            });
                    }
                });



            });




            var timer = new Timer();
            var processing = false;

            $('#startButton').click(function () {
                timer.start({
                    startValues: [0,<?php echo $_smarty_tpl->tpl_vars['timeSpent']->value;?>
,0,0,0]
                });
            });

            $('#pauseButton').click(function () {
                timer.pause();
                if(processing === false)
                {
                    processing = true;
                    $.post( base_url + "tickets/admin/log_time", { total_time: timer.getTimeValues().toString(), ticket_id: '<?php echo $_smarty_tpl->tpl_vars['ticket']->value->id;?>
' })
                        .done(function( data ) {
                            processing = false;
                        });
                }
            });



            var $i = 0;

            timer.addEventListener('secondsUpdated', function (e) {
                $('#timeSpent').html(timer.getTimeValues().toString());

                $i++;

                if($i>10 && processing === false)
                    {
                      //  console.log(timer.getTimeValues());
                        processing = true;
                        $.post( base_url + "tickets/admin/log_time", { total_time: timer.getTimeValues().toString(), ticket_id: '<?php echo $_smarty_tpl->tpl_vars['ticket']->value->id;?>
' })
                            .done(function( data ) {
                                processing = false;
                                $i = 0;
                            });
                    }

            });

            timer.addEventListener('started', function (e) {
                $('#timeSpent').html(timer.getTimeValues().toString());
            });





        });

        function setPreDefinedContent(event,predefined_reply_id) {

            $('#modal_predefined_replies').modal('hide');

            $.get( "<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tickets/admin/get-predefined-reply/" + predefined_reply_id, function( data ) {
                tinyMCE.activeEditor.setContent(data);
            });


        }

    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
