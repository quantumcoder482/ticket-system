<?php
/* Smarty version 3.1.33, created on 2018-11-02 05:00:03
  from '/Users/razib/Documents/valet/suite/apps/wcsuite/views/x_dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bdc1213c652d5_75674094',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b89b4b5a9bc3dc4aae3d267e2888dac80dc8bba4' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/apps/wcsuite/views/x_dashboard.tpl',
      1 => 1540193545,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bdc1213c652d5_75674094 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
    <div class="col-md-4">
        <a class="dashboard-stat blue" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
wcsuite/app/orders">
            <div class="visual">
                <i class="fa fa-calculator"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span class="amount"><?php echo $_smarty_tpl->tpl_vars['total_order_amount']->value;?>
</span>
                </div>
                <div class="desc text-right"> Total Order Amount </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a class="dashboard-stat green" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
wcsuite/app/customers">
            <div class="visual">
                <i class="fa fa-cubes"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span class="amount"><?php echo $_smarty_tpl->tpl_vars['total_customers']->value;?>
</span>
                </div>
                <div class="desc text-right"> Total Customers </div>
            </div>
        </a>
    </div>

</div><?php }
}
