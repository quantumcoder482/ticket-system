<?php
/* Smarty version 3.1.33, created on 2019-01-22 08:44:15
  from '/Users/razib/Documents/valet/suite/apps/wcsuite/views/customer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c471e2f2934e9_37326543',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff0a11c5bc5142d9ade5f52a54ecc96d3c4800bc' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/apps/wcsuite/views/customer.tpl',
      1 => 1541776693,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c471e2f2934e9_37326543 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19090988015c471e2f28dc43_99843391', "content");
?>

<?php }
/* {block "content"} */
class Block_19090988015c471e2f28dc43_99843391 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_19090988015c471e2f28dc43_99843391',
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
                        <?php if (isset($_smarty_tpl->tpl_vars['data']->value->first_name)) {?>
                            <?php echo $_smarty_tpl->tpl_vars['data']->value->first_name;?>

                        <?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['data']->value->last_name)) {?>
                            <?php echo $_smarty_tpl->tpl_vars['data']->value->last_name;?>

                        <?php }?>
                    </h3>
                </div>
                <div class="ibox-content">

                    <?php if (isset($_smarty_tpl->tpl_vars['data']->value->avatar_url)) {?>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value->avatar_url;?>
">
                    <?php }?>
                    <?php if (isset($_smarty_tpl->tpl_vars['data']->value->email)) {?>
                        <?php echo $_smarty_tpl->tpl_vars['data']->value->email;?>

                    <?php }?>



                </div>
            </div>



        </div>

    </div>
<?php
}
}
/* {/block "content"} */
}
