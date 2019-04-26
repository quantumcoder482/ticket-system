<?php
/* Smarty version 3.1.33, created on 2018-11-05 06:34:40
  from '/Users/razib/Documents/valet/suite/ui/theme/default/reports_export.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5be02ad02708c4_98849792',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd3f28d015c16e2da9aafec3fc69a7e58940a5a69' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/reports_export.tpl',
      1 => 1541417677,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be02ad02708c4_98849792 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10849833235be02ad0263d61_54259762', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_294958465be02ad026fa67_53045909', 'script');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_10849833235be02ad0263d61_54259762 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_10849833235be02ad0263d61_54259762',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">
        <div class="col-md-12">
            <h3 class="ibilling-page-header"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Export'];?>
</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Customers'];?>
</h5>
                </div>
                <div class="ibox-content">
                    <h1><?php echo $_smarty_tpl->tpl_vars['total_customers']->value;?>
</h1>

                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/export-customers" class="btn btn-primary"><i class="fa fa-file-excel-o"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Export'];?>
</a>
                </div>
            </div>
        </div>


        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Transactions'];?>
</h5>
                </div>
                <div class="ibox-content">
                    <h1><?php echo $_smarty_tpl->tpl_vars['total_transactions']->value;?>
</h1>

                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/export-transactions" class="btn btn-primary"><i class="fa fa-file-excel-o"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Export'];?>
</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoices'];?>
</h5>
                </div>
                <div class="ibox-content">
                    <h1><?php echo $_smarty_tpl->tpl_vars['total_invoices']->value;?>
</h1>

                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/export-invoices" class="btn btn-primary"><i class="fa fa-file-excel-o"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Export'];?>
</a>
                </div>
            </div>
        </div>

                                                                                                            
                                                            </div>

<?php
}
}
/* {/block "content"} */
/* {block 'script'} */
class Block_294958465be02ad026fa67_53045909 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_294958465be02ad026fa67_53045909',
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
