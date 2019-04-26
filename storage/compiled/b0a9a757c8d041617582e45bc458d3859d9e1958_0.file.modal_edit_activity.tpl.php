<?php
/* Smarty version 3.1.33, created on 2018-12-03 06:31:32
  from '/Users/razib/Documents/valet/suite/ui/theme/default/modal_edit_activity.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c051414a6a951_13408753',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b0a9a757c8d041617582e45bc458d3859d9e1958' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/modal_edit_activity.tpl',
      1 => 1543836688,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c051414a6a951_13408753 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>
        <?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>

    </h3>
</div>
<div class="modal-body">

    <section class="activity-post mb-xlg">
        <form method="get" action="/" id="ib_modal_edit_activity_form">
            <textarea name="message_text" id="edit_activity_message" class="edit_activity"  data-plugin-textarea-autosize="" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Activity'];?>
..." rows="1" style="overflow: hidden; word-wrap: break-word; resize: none; height: 200px;"><?php echo $_smarty_tpl->tpl_vars['d']->value->msg;?>
</textarea>
            <input type="hidden" id="edit_activity_type" name="edit_activity_type" value="<?php echo $_smarty_tpl->tpl_vars['d']->value->icon;?>
">
            <input type="hidden" id="edit_activity_id" name="edit_activity_id" value="<?php echo $_smarty_tpl->tpl_vars['d']->value->id;?>
">


        </form>
        <div class="compose-box-footer">
            <ul class="compose-toolbar">
                <li class="clickable <?php if ($_smarty_tpl->tpl_vars['d']->value->icon == 'fa fa-envelope-o') {?>action-active<?php }?>"><a href="#"><i class="fa fa-envelope-o"></i></a></li>
                <li class="clickable <?php if ($_smarty_tpl->tpl_vars['d']->value->icon == 'fa fa-phone') {?>action-active<?php }?>"><a href="#"><i class="fa fa-phone"></i></a></li>
                <li class="clickable <?php if ($_smarty_tpl->tpl_vars['d']->value->icon == 'fa fa-send-o') {?>action-active<?php }?>"><a href="#"><i class="fa fa-send-o"></i></a></li>
                <li class="clickable <?php if ($_smarty_tpl->tpl_vars['d']->value->icon == 'fa fa-file-pdf-o') {?>action-active<?php }?>"><a href="#"><i class="fa fa-file-pdf-o"></i></a></li>
                <li class="clickable <?php if ($_smarty_tpl->tpl_vars['d']->value->icon == 'fa fa-life-ring') {?>action-active<?php }?>"><a href="#"><i class="fa fa-life-ring"></i></a></li>
                <li class="clickable <?php if ($_smarty_tpl->tpl_vars['d']->value->icon == 'fa fa-credit-card') {?>action-active<?php }?>"><a href="#"><i class="fa fa-credit-card"></i></a></li>
                <li class="clickable <?php if ($_smarty_tpl->tpl_vars['d']->value->icon == 'fa fa-location-arrow') {?>action-active<?php }?>"><a href="#"><i class="fa fa-location-arrow"></i></a></li>
                <li class="clickable <?php if ($_smarty_tpl->tpl_vars['d']->value->icon == 'fa fa-reply') {?>action-active<?php }?>"><a href="#"><i class="fa fa-reply"></i></a></li>
                <li class="clickable <?php if ($_smarty_tpl->tpl_vars['d']->value->icon == 'fa fa-tasks') {?>action-active<?php }?>"><a href="#"><i class="fa fa-tasks"></i></a></li>
                <li class="clickable <?php if ($_smarty_tpl->tpl_vars['d']->value->icon == 'fa fa-truck') {?>action-active<?php }?>"><a href="#"><i class="fa fa-truck"></i></a></li>
            </ul>

        </div>
    </section>

</div>
<div class="modal-footer">



    <button type="button" data-dismiss="modal" class="modal_activity_edit_cancel btn btn-danger"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
</button>
    <button class="btn btn-primary modal_activity_submit" type="submit" id="modal_activity_submit"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
</div><?php }
}
