<?php
/* Smarty version 3.1.33, created on 2018-12-12 05:33:28
  from '/Users/razib/Documents/valet/suite/ui/theme/default/modal_units.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c10e3f8de8e76_28924571',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b12a55871a7ff060293c5e1a7230e284ef440022' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/modal_units.tpl',
      1 => 1484209090,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c10e3f8de8e76_28924571 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>
        <?php if ($_smarty_tpl->tpl_vars['f_type']->value == 'edit') {?>
            <?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>

        <?php } else { ?>
            <?php echo $_smarty_tpl->tpl_vars['_L']->value['Create New'];?>

        <?php }?>
    </h3>
</div>
<div class="modal-body">

    <form class="form-horizontal" id="ib_modal_form">

        <div class="form-group"><label class="col-lg-4 control-label" for="name"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Name'];?>
<small class="red">*</small></label>

            <div class="col-lg-8"><input type="text" id="name" name="name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
">

            </div>


        </div>


        <div class="form-group"><label class="col-lg-4 control-label" for="type"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Type'];?>
</label>

            <div class="col-lg-8">

                <select class="form-control" id="type" name="type">
                    <option value="Piece" <?php if ($_smarty_tpl->tpl_vars['val']->value['name'] == 'Piece') {?>selected<?php }?>>Piece</option>
                    <option value="Weight" <?php if ($_smarty_tpl->tpl_vars['val']->value['name'] == 'Weight') {?>selected<?php }?>>Weight</option>
                    <option value="Time" <?php if ($_smarty_tpl->tpl_vars['val']->value['name'] == 'Time') {?>selected<?php }?>>Time</option>
                    <option value="Dimension" <?php if ($_smarty_tpl->tpl_vars['val']->value['name'] == 'Dimension') {?>selected<?php }?>>Dimension</option>

                    <option value="Surface" <?php if ($_smarty_tpl->tpl_vars['val']->value['name'] == 'Surface') {?>selected<?php }?>>Surface</option>

                    <option value="Volume" <?php if ($_smarty_tpl->tpl_vars['val']->value['name'] == 'Volume') {?>selected<?php }?>>Volume</option>


                </select>

            </div>


        </div>









        <?php if ($_smarty_tpl->tpl_vars['f_type']->value == 'edit') {?>
            <input type="hidden" name="uid" id="uid" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['uid'];?>
">
        <?php } else { ?>
            <input type="hidden" name="uid" id="uid" value="0">
        <?php }?>


        <input type="hidden" name="f_type" id="f_type" value="<?php echo $_smarty_tpl->tpl_vars['f_type']->value;?>
">

    </form>

</div>
<div class="modal-footer">



    <button type="button" data-dismiss="modal" class="btn btn-danger"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
</button>
    <button class="btn btn-primary modal_submit" type="submit" id="modal_submit"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
</div><?php }
}
