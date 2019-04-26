<?php
/* Smarty version 3.1.33, created on 2018-12-03 09:37:48
  from '/Users/razib/Documents/valet/suite/apps/hostbilling/views/admin_automation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c053fbcb77542_79579501',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13055067250d552ff8aab8363c081a8494bd7948' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/apps/hostbilling/views/admin_automation.tpl',
      1 => 1543847866,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c053fbcb77542_79579501 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13427918595c053fbcb74430_90370174', "content");
}
/* {block "content"} */
class Block_13427918595c053fbcb74430_90370174 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_13427918595c053fbcb74430_90370174',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-body">

                    <h3>Automation Settings</h3>

                    <table class="table table-hover">
                        <tbody>

                        <tr>
                            <td width="80%"><label for="config_accounting">Create hosting account on successfully </label></td>
                            <td> <input type="checkbox" <?php if (get_option('accounting') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_accounting"></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php
}
}
/* {/block "content"} */
}
