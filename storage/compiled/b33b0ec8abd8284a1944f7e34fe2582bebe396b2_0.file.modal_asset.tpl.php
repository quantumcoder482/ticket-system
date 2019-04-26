<?php
/* Smarty version 3.1.33, created on 2018-11-05 12:44:27
  from '/Users/razib/Documents/valet/suite/ui/theme/default/modal_asset.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5be0817b0fe218_16402653',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b33b0ec8abd8284a1944f7e34fe2582bebe396b2' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/modal_asset.tpl',
      1 => 1541439863,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be0817b0fe218_16402653 (Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>
        Add an asset
    </h3>
</div>
<div class="modal-body">



    <form class="form-horizontal" id="ib_modal_form">


        <div class="row">
            <div class="col-md-6">



                <div class="form-group">
                    <label class="col-md-12" for="company_name"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Name'];?>
<small class="red">*</small></label>

                    <div class="col-md-12"><input type="text" id="company_name" name="company_name" class="form-control" value="">

                    </div>


                </div>












            </div>

            <div class="col-md-6">

            </div>
        </div>



    </form>

</div>
<div class="modal-footer">



    <button type="button" data-dismiss="modal" class="btn btn-danger"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
</button>
    <button class="btn btn-primary modal_submit" type="submit" id="modal_submit"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
</div><?php }
}
