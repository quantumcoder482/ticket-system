<?php
/* Smarty version 3.1.33, created on 2018-12-01 13:08:45
  from '/Users/razib/Documents/valet/suite/ui/theme/default/sales_delivery_challans.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c02ce2d074dd8_69356146',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f9931df35a1e06b047e1c9cc08b49d7dabe68d4d' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/sales_delivery_challans.tpl',
      1 => 1543686259,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c02ce2d074dd8_69356146 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4162889795c02ce2d0717c1_06794374', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5734836595c02ce2d0744f2_02138268', 'script');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_4162889795c02ce2d0717c1_06794374 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_4162889795c02ce2d0717c1_06794374',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">
        <div class="col-md-12">
            <h3 class="ibilling-page-header"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Delivery Challans'];?>
</h3>
        </div>
    </div>




<?php
}
}
/* {/block "content"} */
/* {block 'script'} */
class Block_5734836595c02ce2d0744f2_02138268 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_5734836595c02ce2d0744f2_02138268',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
>

    <?php echo '</script'; ?>
>


<?php
}
}
/* {/block 'script'} */
}
