<?php
/* Smarty version 3.1.33, created on 2018-11-22 20:54:09
  from '/Users/razib/Documents/valet/suite/ui/theme/default/modal_task_create.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bf75dc1cf0f39_15038162',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b707be86760bc186eb2642e2674abdac64d3d9bd' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/modal_task_create.tpl',
      1 => 1540222310,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bf75dc1cf0f39_15038162 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="txt_modal_header">
        <?php if ($_smarty_tpl->tpl_vars['edit']->value) {?>
                        <?php echo $_smarty_tpl->tpl_vars['task']->value['title'];?>

        <?php } else { ?>
            <?php echo $_smarty_tpl->tpl_vars['_L']->value['Add New'];?>

        <?php }?>
    </h3>
</div>
<div class="modal-body">


    <form id="ib-modal-form" method="post">

                                        
        <div class="form-group">
            <label for="title"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Subject'];?>
</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $_smarty_tpl->tpl_vars['task']->value['title'];?>
">
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="start_date"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Start Date'];?>
</label>
                    <input type="text" class="form-control" id="start_date" name="start_date" value="<?php echo $_smarty_tpl->tpl_vars['task']->value['started'];?>
">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="due_date"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Due Date'];?>
</label>
                    <input type="text" class="form-control" id="due_date" name="due_date" value="<?php echo $_smarty_tpl->tpl_vars['task']->value['due_date'];?>
">
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class='form-group'>
                    <label for="cid">Related customer</label>

                    <select id="cid" name="cid" class="form-control">
                        <option value=""><?php echo $_smarty_tpl->tpl_vars['_L']->value['Select Contact'];?>
...</option>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['c']->value, 'cs');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cs']->value) {
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['cs']->value->id;?>
"
                                    <?php if ($_smarty_tpl->tpl_vars['task']->value['cid'] == ($_smarty_tpl->tpl_vars['cs']->value['id'])) {?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['cs']->value->account;?>
 <?php if ($_smarty_tpl->tpl_vars['cs']->value->email != '') {?>- <?php echo $_smarty_tpl->tpl_vars['cs']->value->email;
}?></option>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                    </select>

                </div>
            </div>
            <div class="col-md-6">

            </div>
        </div>

                                                                                                                                                                                                                                                    
        
                                                                                                                                                                                                                                                                                                                                                                                    


        <div class="form-group">
            <label for="subject"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Description'];?>
</label>
            <textarea class="form-control" id="description" name="description" rows="10"><?php echo $_smarty_tpl->tpl_vars['task']->value['description'];?>
</textarea>
        </div>


        <input type="hidden" id="status" name="status" value="<?php echo $_smarty_tpl->tpl_vars['task']->value['status'];?>
">
        <input type="hidden" id="task_id" name="task_id" value="<?php echo $_smarty_tpl->tpl_vars['task']->value['id'];?>
">
    </form>

</div>
<div class="modal-footer">


    <button type="button" data-dismiss="modal" class="btn btn-danger"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
</button>
    <button class="btn btn-primary modal_submit" type="submit" id="modal_submit"><i
                class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
</div><?php }
}
