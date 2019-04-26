<?php
/* Smarty version 3.1.33, created on 2018-11-09 10:25:38
  from '/Users/razib/Documents/valet/suite/apps/wcsuite/views/x_products.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5be5a6f21f3027_45941297',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b8feef09f254d4dd1b57b8c66e8d34bcfa431a10' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/apps/wcsuite/views/x_products.tpl',
      1 => 1540193711,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be5a6f21f3027_45941297 (Smarty_Internal_Template $_smarty_tpl) {
?><form class="form-horizontal" method="post" action="">
    <div class="form-group">
        <div class="col-md-12">
            <div class="input-group">
                <div class="input-group-addon">
                    <span class="fa fa-search"></span>
                </div>
                <input type="text" name="name" id="foo_filter" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Search'];?>
..."/>

            </div>
        </div>

    </div>
</form>

<table class="table table-bordered table-hover sys_table footable" data-filter="#foo_filter" data-page-size="50">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Type</th>
        <th>
            Price
        </th>
        <th>Created at</th>
        <th class="text-right" width="120px;"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
    </tr>
    </thead>
    <tbody>

    <?php if ($_smarty_tpl->tpl_vars['products']->value) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
            <tr>
                <td  data-value="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
"> <?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
 </td>
                <td> <?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
 </td>
                <td> <?php echo $_smarty_tpl->tpl_vars['product']->value->type;?>
 </td>
                <td class="amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
"><?php if ($_smarty_tpl->tpl_vars['product']->value->price != '') {
echo $_smarty_tpl->tpl_vars['product']->value->price;?>
 <?php } else { ?> 0.00 <?php }?></td>
                <td data-value="<?php echo strtotime($_smarty_tpl->tpl_vars['product']->value->date_created);?>
"><?php echo date($_smarty_tpl->tpl_vars['config']->value['df'],strtotime($_smarty_tpl->tpl_vars['product']->value->date_created));?>
</td>

                <td class="text-right">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['product']->value->permalink;?>
" target="_blank" class="btn btn-primary">View</a>
                </td>
            </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php }?>

    </tbody>

    <tfoot>
    <tr>
        <td colspan="8">
            <ul class="pagination">
            </ul>
        </td>
    </tr>
    </tfoot>

</table><?php }
}
