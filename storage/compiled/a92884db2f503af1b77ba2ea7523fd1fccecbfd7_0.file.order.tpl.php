<?php
/* Smarty version 3.1.33, created on 2018-11-09 10:24:56
  from '/Users/razib/Documents/valet/suite/apps/wcsuite/views/order.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5be5a6c8438e72_95768168',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a92884db2f503af1b77ba2ea7523fd1fccecbfd7' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/apps/wcsuite/views/order.tpl',
      1 => 1541777089,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be5a6c8438e72_95768168 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5084356495be5a6c84351a4_05514136', "content");
?>

<?php }
/* {block "content"} */
class Block_5084356495be5a6c84351a4_05514136 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_5084356495be5a6c84351a4_05514136',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    <div class="row">

        <div class="col-md-3 ib_profile_width">
            <?php echo $_smarty_tpl->tpl_vars['menu']->value;?>

        </div>

        <div class="col-md-9">


            <div class="ibox float-e-margins animated fadeIn">
                <div class="ibox-title">
                    <h3>

                    </h3>
                </div>
                <div class="ibox-content">

                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>

                        <?php if (is_string($_smarty_tpl->tpl_vars['value']->value)) {?>
                            <strong><?php echo ucwords($_smarty_tpl->tpl_vars['key']->value);?>
:</strong> <?php echo $_smarty_tpl->tpl_vars['value']->value;?>
 <br>
                        <?php }?>


                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                </div>
            </div>



        </div>

    </div>
<?php
}
}
/* {/block "content"} */
}
