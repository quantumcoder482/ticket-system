<?php
/* Smarty version 3.1.33, created on 2018-11-13 15:30:08
  from '/Users/razib/Documents/valet/suite/ui/theme/default/client_new_order.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5beb3450591fb8_62449428',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8ae2a3cd1f1895a8f1af195175376f2c47d35a44' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/client_new_order.tpl',
      1 => 1542140790,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5beb3450591fb8_62449428 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2070601955beb34505882a5_89456012', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13212202645beb3450590ce9_52332696', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_client']->value));
}
/* {block "content"} */
class Block_2070601955beb34505882a5_89456012 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2070601955beb34505882a5_89456012',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-md-9">
            <section class="panel panel-with-borders">
                <div class="panel-heading">
                    <h2>
                        <?php echo $_smarty_tpl->tpl_vars['_L']->value['Catalog'];?>

                    </h2>
                </div>
                <div class="panel-body">
                    <div class="ib-ecom--catalog">
                        <div class="row">

                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="ib-ecom--catalog--item">
                                        <div class="ib-ecom--catalog--item--img">

                                            <a id="item_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="view-item" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/view-item/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">

                                                <?php if ($_smarty_tpl->tpl_vars['item']->value['image'] != '') {?>
                                                    <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/items/thumb<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
">
                                                <?php } else { ?>
                                                    <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/imgs/item_placeholder.png">
                                                <?php }?>


                                            </a>
                                        </div>
                                        <div class="ib-ecom--catalog--item--title">
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/view-item/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
                                            <div class="ib-ecom--catalog--item--price">
                                                <?php echo ib_money_format($_smarty_tpl->tpl_vars['item']->value['sales_price'],$_smarty_tpl->tpl_vars['config']->value);?>

                                                                                                                                                                                            </div>
                                        </div>
                                                                                                                                                                                                                                                                                                                                                                    </div>
                                </div>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-body" id="load_shopping_cart">

                </div>
            </div>

        </div>
    </div>
<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_13212202645beb3450590ce9_52332696 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_13212202645beb3450590ce9_52332696',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
>
        $(function () {

            var $modal = $('#ajax-modal');

            var $load_shopping_cart = $("#load_shopping_cart");

            function loadShoppingCart() {

                $load_shopping_cart.html(block_msg);

                $.get( base_url + "client/ajax_shopping_cart", function( data ) {
                    $load_shopping_cart.html(data);
                });
            }

            loadShoppingCart();

            $('.view-item').click(function (e) {
                e.preventDefault();

                var item_id = this.id;

                $('body').modalmanager('loading');

                $modal.load( base_url + 'client/modal_view_item/' +  item_id, '', function(){
                    $modal.modal();



                });

            });


            $modal.on('click', '.add_to_cart', function(e) {

                e.preventDefault();



                var form_item_id = $('#form_item_id').val();
                var form_item_qty = $('#form_item_quantity').val();

                $.get( base_url + "client/ajax_add_item/"+form_item_id+'/'+form_item_qty, function( data ) {
                   // alert(data);
                    loadShoppingCart();
                });

                $modal.modal('toggle');


            });




        })
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
