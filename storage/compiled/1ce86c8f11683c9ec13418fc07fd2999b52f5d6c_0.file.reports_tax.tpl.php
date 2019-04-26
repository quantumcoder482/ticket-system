<?php
/* Smarty version 3.1.33, created on 2019-03-20 06:56:53
  from '/Users/razib/Documents/valet/suite/ui/theme/default/reports_tax.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c921c75e2efa7_49271487',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ce86c8f11683c9ec13418fc07fd2999b52f5d6c' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/reports_tax.tpl',
      1 => 1553079344,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c921c75e2efa7_49271487 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18796077065c921c75e2b9a0_12029146', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16526387255c921c75e2dcf1_62680207', 'script');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_18796077065c921c75e2b9a0_12029146 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_18796077065c921c75e2b9a0_12029146',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>




<?php
}
}
/* {/block "content"} */
/* {block 'script'} */
class Block_16526387255c921c75e2dcf1_62680207 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_16526387255c921c75e2dcf1_62680207',
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
