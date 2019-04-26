<?php
/* Smarty version 3.1.33, created on 2019-01-13 18:50:23
  from '/Users/razib/Documents/valet/suite/ui/theme/default/add-ps.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c3bcebf60a536_72515408',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a7d29bc9e5c41e66ab2fc9517b99ef809d1451e' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/add-ps.tpl',
      1 => 1547423420,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c3bcebf60a536_72515408 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15244330495c3bcebf5e39c3_22036841', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_15244330495c3bcebf5e39c3_22036841 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_15244330495c3bcebf5e39c3_22036841',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">

        <div class="col-lg-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>
                        <?php if ($_smarty_tpl->tpl_vars['type']->value == 'Product') {?>
                            <?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Product'];?>

                        <?php } else { ?>
                            <?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Service'];?>

                        <?php }?>


                    </h5>
                    <div class="ibox-tools">

                        <?php if ($_smarty_tpl->tpl_vars['type']->value == 'Product') {?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ps/p-list" class="btn btn-primary btn-xs"><?php echo $_smarty_tpl->tpl_vars['_L']->value['List Products'];?>
</a>

                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['type']->value == 'Service') {?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ps/s-list" class="btn btn-primary btn-xs"><?php echo $_smarty_tpl->tpl_vars['_L']->value['List Services'];?>
</a>
                        <?php }?>

                    </div>
                </div>
                <div class="ibox-content" id="ibox_form">
                    <div class="alert alert-danger" id="emsg">
                        <span id="emsgbody"></span>
                    </div>

                    <form class="form-horizontal" id="rform">

                        <div class="form-group"><label class="col-lg-2 control-label" for="name"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Name'];?>
*</label>

                            <div class="col-lg-10"><input type="text" id="name" name="name" class="form-control" autocomplete="off">

                            </div>
                        </div>

                        <?php if ($_smarty_tpl->tpl_vars['type']->value == 'Product') {?>

                            <div class="form-group"><label class="col-lg-2 control-label" for="cost_price"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cost Price'];?>
</label>

                                <div class="col-lg-10"><input type="text" id="cost_price" name="cost_price" class="form-control amount" autocomplete="off" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
 "  data-a-dec="<?php echo $_smarty_tpl->tpl_vars['config']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['config']->value['thousands_sep'];?>
" data-d-group="3">

                                </div>
                            </div>

                        <?php }?>

                        <div class="form-group"><label class="col-lg-2 control-label" for="sales_price"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Sales Price'];?>
</label>

                            <div class="col-lg-10">

                                <input type="text" id="sales_price" name="sales_price" class="form-control amount" autocomplete="off" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
 "  data-a-dec="<?php echo $_smarty_tpl->tpl_vars['config']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['config']->value['thousands_sep'];?>
" data-d-group="3">

                            </div>
                        </div>



                        <div class="form-group"><label class="col-lg-2 control-label" for="item_number"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Item Number'];?>
</label>

                            <div class="col-lg-10"><input type="text" id="item_number" value="<?php echo str_pad($_smarty_tpl->tpl_vars['nxt']->value,4,'0',STR_PAD_LEFT);?>
" name="item_number" class="form-control" autocomplete="off">

                            </div>
                        </div>



                        <div class="form-group">

                            <label class="col-lg-2 control-label" for="tax_code">
                                <?php if ($_smarty_tpl->tpl_vars['config']->value['tax_system'] == 'India') {?>
                                    HSN / SAC
                                    <?php } else { ?>
                                    <?php echo $_smarty_tpl->tpl_vars['_L']->value['Tax Code'];?>

                                <?php }?>
                            </label>

                            <div class="col-lg-10"><input type="text" id="tax_code" name="tax_code" class="form-control" autocomplete="off">

                            </div>
                        </div>


                        <?php if (isset($_smarty_tpl->tpl_vars['config']->value['item_has_variant'])) {?>

                            <?php if (isset($_smarty_tpl->tpl_vars['config']->value['item_variant_1_name']) && $_smarty_tpl->tpl_vars['config']->value['item_variant_1_name'] != '') {?>

                                <div class="form-group">

                                    <label class="col-lg-2 control-label" for="variant_1">
                                        <?php echo $_smarty_tpl->tpl_vars['config']->value['item_variant_1_name'];?>

                                    </label>

                                    <div class="col-lg-10"><input type="text" id="variant_1" name="variant_1" class="form-control" autocomplete="off">

                                    </div>
                                </div>

                            <?php }?>

                            <?php if (isset($_smarty_tpl->tpl_vars['config']->value['item_variant_2_name']) && $_smarty_tpl->tpl_vars['config']->value['item_variant_2_name'] != '') {?>

                                <div class="form-group">

                                    <label class="col-lg-2 control-label" for="variant_1">
                                        <?php echo $_smarty_tpl->tpl_vars['config']->value['item_variant_2_name'];?>

                                    </label>

                                    <div class="col-lg-10"><input type="text" id="variant_1" name="variant_2" class="form-control" autocomplete="off">

                                    </div>
                                </div>

                            <?php }?>

                        <?php }?>

                        <div class="form-group"><label class="col-lg-2 control-label" for="description"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Description'];?>
</label>

                            <div class="col-lg-10"><textarea id="description" class="form-control" rows="3"></textarea>

                            </div>
                        </div>

                        <hr>


                        <?php if ($_smarty_tpl->tpl_vars['type']->value == 'Product') {?>

                            <div class="form-group"><label class="col-lg-2 control-label" for="inventory"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Inventory To Add Subtract'];?>
</label>

                                <div class="col-lg-10"><input type="text" id="inventory" name="inventory" class="form-control" autocomplete="off">

                                </div>
                            </div>


                            <div class="form-group"><label class="col-lg-2 control-label" for="unit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Unit'];?>
</label>

                                <div class="col-lg-10">

                                    <select class="form-control" id="unit" name="unit">
                                        <option value="">...</option>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['units']->value, 'unit');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['unit']->value) {
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['unit']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['unit']->value['name'];?>
</option>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </select>

                                </div>
                            </div>

                            <div class="form-group"><label class="col-lg-2 control-label" for="inventory"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Weight'];?>
</label>

                                <div class="col-lg-10">

                                    <input type="text" id="inventory" name="inventory" class="form-control" autocomplete="off">

                                </div>
                            </div>

                        <?php }?>


                        <input type="hidden" id="type" name="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
                        <input type="hidden" name="file_link" id="file_link" value="">



                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">

                                <button class="btn btn-sm btn-primary" type="submit" id="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <?php echo $_smarty_tpl->tpl_vars['_L']->value['Image'];?>

                </div>
                <div class="ibox-content" id="ibox_form">

                    <form action="" class="dropzone" id="upload_container">

                        <div class="dz-message">
                            <h3> <i class="fa fa-cloud-upload"></i>  <?php echo $_smarty_tpl->tpl_vars['_L']->value['Drop File Here'];?>
</h3>
                            <br />
                            <span class="note"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Click to Upload'];?>
</span>
                        </div>

                    </form>

                </div>
            </div>
        </div>


    </div>
<?php
}
}
/* {/block "content"} */
}
