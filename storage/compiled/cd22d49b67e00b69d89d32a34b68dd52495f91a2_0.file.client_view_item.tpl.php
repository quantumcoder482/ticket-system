<?php
/* Smarty version 3.1.33, created on 2018-11-13 15:35:51
  from '/Users/razib/Documents/valet/suite/ui/theme/default/client_view_item.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5beb35a789e933_07906203',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cd22d49b67e00b69d89d32a34b68dd52495f91a2' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/client_view_item.tpl',
      1 => 1542141319,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5beb35a789e933_07906203 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2307375345beb35a7898267_53011040', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_client']->value));
}
/* {block "content"} */
class Block_2307375345beb35a7898267_53011040 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2307375345beb35a7898267_53011040',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <section class="panel panel-with-borders">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="cui-ecommerce--catalog--item">
                        <div class="cui-ecommerce--catalog--item--img">
                            <div class="cui-ecommerce--catalog--item--like cui-ecommerce--catalog--item--like__selected">
                                <i class="icmn-heart3 cui-ecommerce--catalog--item--like--liked"><!-- --></i>
                                <i class="icmn-heart4 cui-ecommerce--catalog--item--like--unliked"><!-- --></i>
                            </div>
                            <a href="javascript: void(0);">
                                <?php if ($_smarty_tpl->tpl_vars['item']->value->image != '') {?>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/items/<?php echo $_smarty_tpl->tpl_vars['item']->value->image;?>
" class="img-responsive">
                                <?php } else { ?>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ui/lib/imgs/item_placeholder.png">
                                <?php }?>
                            </a>


                        </div>
                    </div>

                </div>
                <div class="col-lg-8">

                    <h3><?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
</h3>
                    <h4><?php echo ib_money_format($_smarty_tpl->tpl_vars['item']->value->sales_price,$_smarty_tpl->tpl_vars['config']->value);?>
</h4>

                    <hr>
                    <div class="cui-ecommerce--product--descr">
                        <?php echo $_smarty_tpl->tpl_vars['item']->value->description;?>

                    </div>
                    <hr>
                    <a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
cart/add/<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
">
                        <i class="fa fa-shopping-cart"></i>
                        <?php echo $_smarty_tpl->tpl_vars['_L']->value['Buy Now'];?>

                    </a>

                </div>
            </div>
        </div>
    </section>
<?php
}
}
/* {/block "content"} */
}
