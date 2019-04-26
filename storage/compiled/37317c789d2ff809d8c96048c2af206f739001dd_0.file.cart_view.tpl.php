<?php
/* Smarty version 3.1.33, created on 2018-11-13 15:42:03
  from '/Users/razib/Documents/valet/suite/ui/theme/default/cart_view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5beb371b3e9156_27075762',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '37317c789d2ff809d8c96048c2af206f739001dd' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/cart_view.tpl',
      1 => 1542141655,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5beb371b3e9156_27075762 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20552632745beb371b3c8491_57887058', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_paper']->value));
}
/* {block "content"} */
class Block_20552632745beb371b3c8491_57887058 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_20552632745beb371b3c8491_57887058',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="paper">
        <section class="panel">
            <div class="panel-body">
                <?php if (isset($_smarty_tpl->tpl_vars['notify']->value)) {?>
                    <?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

                <?php }?>

                <img class="logo" style="max-height: 40px; width: auto;" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/system/<?php echo $_smarty_tpl->tpl_vars['config']->value['logo_default'];?>
"
                     alt="Logo">

                <hr>

                <div class="row">

                    <div class="col-md-12">

                        <?php if ($_smarty_tpl->tpl_vars['cart']->value && $_smarty_tpl->tpl_vars['cart']->value->item_count > 0) {?>
                            <table id="cart_summary" class="table table-bordered stock-management-off">
                                <thead>
                                <tr>
                                    <th width="120px;"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Product'];?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Description'];?>
</th>
                                    <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Unit price'];?>
</th>
                                    <th width="100px;"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Quantity'];?>
</th>
                                    <th>&nbsp;</th>
                                    <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total'];?>
</th>
                                </tr>
                                </thead>

                                <tbody>


                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>

                                    <tr>
                                        <td>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
item/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                                                <img class="img-responsive" src="<?php echo Cart::getItemImage($_smarty_tpl->tpl_vars['item']->value['id']);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" >
                                            </a>
                                        </td>
                                        <td>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
item/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
                                        </td>
                                        <td>
                                            <?php echo ib_money_format($_smarty_tpl->tpl_vars['item']->value['price'],$_smarty_tpl->tpl_vars['config']->value);?>

                                        </td>

                                        <td class="cart_quantity text-center">

                                            <input class="form-control" size="2" type="text" autocomplete="off"  value="<?php echo $_smarty_tpl->tpl_vars['item']->value['qty'];?>
" disabled>
                                            <div style="margin-top: 10px;">
                                                <a class="btn btn-primary btn-xs" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
cart/add/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"> <span><i class="fa fa-plus"></i></span> </a>
                                                <a class="btn btn-danger btn-xs" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
cart/remove/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"> <span><i class="fa fa-minus"></i></span> </a>

                                            </div>
                                        </td>
                                        <td class="cart_delete text-center" data-title="Delete">
                                            <div>
                                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
cart/delete/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><i class="icon-trash"></i></a>
                                            </div>
                                        </td>
                                        <td> <?php echo ib_money_format($_smarty_tpl->tpl_vars['item']->value['price']*$_smarty_tpl->tpl_vars['item']->value['qty'],$_smarty_tpl->tpl_vars['config']->value);?>
 </td>

                                    </tr>




                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                                </tbody>

                                <tfoot>


                                <tr class="cart_total_price">
                                    <td rowspan="4" colspan="3" id="cart_voucher" class="cart_voucher">
                                    </td>
                                    <td colspan="2" class="text-right"><strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total'];?>
</strong></td>
                                    <td colspan="2"><strong><?php echo ib_money_format($_smarty_tpl->tpl_vars['cart']->value->total,$_smarty_tpl->tpl_vars['config']->value);?>
</strong></td>
                                </tr>
                                </tfoot>

                            </table>

                            <p class="cart_navigation clearfix">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
cart/checkout/" class="btn btn-primary pull-right" title="Proceed to checkout">
                                    <span><i class="fa fa-shopping-cart"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Proceed to checkout'];?>
</span>
                                </a>

                                                                                                                            </p>

                        <?php } else { ?>

                            <p><?php echo $_smarty_tpl->tpl_vars['_L']->value['Your Cart is empty'];?>
</p>

                        <?php }?>


                    </div>

                </div>


            </div>
        </section>

    </div>
<?php
}
}
/* {/block "content"} */
}
