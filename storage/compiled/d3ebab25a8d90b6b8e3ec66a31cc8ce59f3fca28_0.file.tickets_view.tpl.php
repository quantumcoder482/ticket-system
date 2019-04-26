<?php
/* Smarty version 3.1.33, created on 2018-11-13 16:33:35
  from '/Users/razib/Documents/valet/suite/ui/theme/default/tickets_view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5beb432f6b8765_56665107',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd3ebab25a8d90b6b8e3ec66a31cc8ce59f3fca28' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/tickets_view.tpl',
      1 => 1542144813,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5beb432f6b8765_56665107 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11917027235beb432f67a013_26983871', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_client']->value));
}
/* {block "content"} */
class Block_11917027235beb432f67a013_26983871 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_11917027235beb432f67a013_26983871',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <!-- row -->
    <div class="row">
        <div class="col-md-12" id="create_ticket">

            <h3><?php echo $_smarty_tpl->tpl_vars['d']->value->subject;?>
</h3>




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
                    


                    <?php if ($_smarty_tpl->tpl_vars['user']->value['img'] == 'gravatar') {?>
                        <img src="http://www.gravatar.com/avatar/<?php echo md5(($_smarty_tpl->tpl_vars['user']->value['email']));?>
?s=30" class="img-time-line" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['fullname'];?>
">
                    <?php } elseif ($_smarty_tpl->tpl_vars['user']->value['img'] == '') {?>
                        <img class="img-time-line" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/imgs/default-user-avatar.png" alt="">
                    <?php } else { ?>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['user']->value['img'];?>
" class="img-time-line" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['account'];?>
">
                    <?php }?>

                    <div class="timeline-item">
                        
                        <h3 class="timeline-header"><a href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['d']->value->account;?>
</a></h3>

                        <div class="timeline-body">
                            <?php echo $_smarty_tpl->tpl_vars['d']->value->message;?>

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
                        <i class="fa fa-envelope bg-blue"></i>

                        <div class="timeline-item">
                            
                            <h3 class="timeline-header"><a href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['reply']->value['replied_by'];?>
</a></h3>

                            <div class="timeline-body">
                                <?php echo $_smarty_tpl->tpl_vars['reply']->value['message'];?>

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
                  <span>
                   <?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Reply'];?>

                  </span>
                </li>
                <li>
                    <?php if ($_smarty_tpl->tpl_vars['user']->value['img'] == 'gravatar') {?>
                        <img src="http://www.gravatar.com/avatar/<?php echo md5(($_smarty_tpl->tpl_vars['user']->value['email']));?>
?s=30" class="img-time-line" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['fullname'];?>
">
                    <?php } elseif ($_smarty_tpl->tpl_vars['user']->value['img'] == '') {?>
                        <img class="img-time-line" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/imgs/default-user-avatar.png" alt="">
                    <?php } else { ?>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['user']->value['img'];?>
" class="img-time-line" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['account'];?>
">
                    <?php }?>

                    <div class="timeline-item">



                        <div class="timeline-body">
                            <form id="create_ticket" class="form-horizontal push-10-t push-10" method="post">






                                <div class="form-group">
                                    <div class="col-xs-12">

                                        <textarea id="content"  class="form-control sysedit" name="content"></textarea>
                                        <div class="help-block"><a data-toggle="modal" href="#modal_add_item"><i class="fa fa-paperclip"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Attach File'];?>
</a> </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">

                                        <input type="hidden" name="attachments" id="attachments" value="">
                                        <input type="hidden" name="f_tid" id="f_tid" value="<?php echo $_smarty_tpl->tpl_vars['d']->value->id;?>
">

                                        <button class="btn btn-primary" id="ib_form_submit" type="submit"><i class="fa fa-send push-5-r"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
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
    <!-- /.row -->


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
                            <h3> <i class="fa fa-cloud-upload"></i>  Drop File Here</h3>
                            <br />
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

<?php
}
}
/* {/block "content"} */
}
