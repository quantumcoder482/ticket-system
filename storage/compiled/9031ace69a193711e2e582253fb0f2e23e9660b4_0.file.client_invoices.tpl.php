<?php
/* Smarty version 3.1.33, created on 2018-11-08 18:46:49
  from '/Users/razib/Documents/valet/suite/ui/theme/default/client_invoices.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5be4cae9011fe7_66968752',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9031ace69a193711e2e582253fb0f2e23e9660b4' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/client_invoices.tpl',
      1 => 1541720806,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be4cae9011fe7_66968752 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3797844795be4cae8f2c701_54444767', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_client']->value));
}
/* {block "content"} */
class Block_3797844795be4cae8f2c701_54444767 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_3797844795be4cae8f2c701_54444767',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    <div class="row" id="d_ajax_summary">

                        <div class="col-md-4">

                            <table class="table">

                                <tbody>
                                <tr><td><?php echo $_smarty_tpl->tpl_vars['_L']->value['Paid'];?>
: </td> <td><span class="amount"><?php echo $_smarty_tpl->tpl_vars['total_paid_amount']->value;?>
</span> </td></tr>
                                <tr><td><?php echo $_smarty_tpl->tpl_vars['_L']->value['Unpaid'];?>
: </td> <td><span class="amount"><?php echo $_smarty_tpl->tpl_vars['total_unpaid_amount']->value;?>
</span> </td></tr>
                                <tr><td><?php echo $_smarty_tpl->tpl_vars['_L']->value['Partially Paid'];?>
: </td> <td><span class="amount"><?php echo $_smarty_tpl->tpl_vars['total_partially_paid_amount']->value;?>
</span> </td></tr>
                                <tr><td><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancelled'];?>
: </td> <td><span class="amount"><?php echo $_smarty_tpl->tpl_vars['total_cancelled_amount']->value;?>
</span> </td></tr>
                                <tr><td>&nbsp; </td> <td></td></tr>


                                </tbody>
                            </table>

                            <h3><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total Unpaid Amount'];?>
: <span class="amount"><?php echo $_smarty_tpl->tpl_vars['total_unpaid_amount']->value;?>
</span></h3>

                            <?php if ($_smarty_tpl->tpl_vars['config']->value['add_fund']) {?>
                                <h3><?php echo $_smarty_tpl->tpl_vars['_L']->value['Balance'];?>
: <span class="amount"><?php echo $_smarty_tpl->tpl_vars['user']->value->balance;?>
</span></h3>
                                <h3><?php echo $_smarty_tpl->tpl_vars['_L']->value['Due'];?>
: <span class="amount"><?php echo $_smarty_tpl->tpl_vars['due_amount']->value;?>
</span></h3>
                            <?php }?>

                        </div>


                        <div class="col-md-8">


                            <div class="" style="height:350px" id="invoice_summary"></div>

                        </div>


                    </div>

                </div>
            </div>

        </div>

    </div>

    <div class="ibox float-e-margins">
        <div class="ibox-title">


            <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total'];?>
 : <?php echo $_smarty_tpl->tpl_vars['total_invoice']->value;?>
</h5>


        </div>
        <div class="ibox-content">

            <div class="table-responsive">

                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th>#</th>
                                                <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Date'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Due Date'];?>
</th>
                        <th>
                            <?php echo $_smarty_tpl->tpl_vars['_L']->value['Status'];?>

                        </th>
                                                <th class="text-right" width="100px"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
?>
                        <tr>
                            <td><a target="_blank"
                                   href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/iview/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/token_<?php echo $_smarty_tpl->tpl_vars['ds']->value['vtoken'];?>
/"><?php echo $_smarty_tpl->tpl_vars['ds']->value['invoicenum'];
if ($_smarty_tpl->tpl_vars['ds']->value['cn'] != '') {?> <?php echo $_smarty_tpl->tpl_vars['ds']->value['cn'];?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
 <?php }?></a>
                            </td>
                                                        <td class="amount"
                                data-a-sign="<?php if ($_smarty_tpl->tpl_vars['ds']->value['currency_symbol'] == '') {?> <?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['ds']->value['currency_symbol'];
}?> "><?php echo $_smarty_tpl->tpl_vars['ds']->value['total'];?>
</td>
                            <td><?php echo date($_smarty_tpl->tpl_vars['config']->value['df'],strtotime($_smarty_tpl->tpl_vars['ds']->value['date']));?>
</td>
                            <td><?php echo date($_smarty_tpl->tpl_vars['config']->value['df'],strtotime($_smarty_tpl->tpl_vars['ds']->value['duedate']));?>
</td>
                            <td>

                                <?php if ($_smarty_tpl->tpl_vars['ds']->value['status'] == 'Unpaid') {?>
                                    <span class="label label-danger"><?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['ds']->value['status']);?>
</span>
                                <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['status'] == 'Paid') {?>
                                    <span class="label label-success"><?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['ds']->value['status']);?>
</span>
                                <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['status'] == 'Partially Paid') {?>
                                    <span class="label label-info"><?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['ds']->value['status']);?>
</span>
                                <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['status'] == 'Cancelled') {?>
                                    <span class="label"><?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['ds']->value['status']);?>
</span>
                                <?php } else { ?>
                                    <?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['ds']->value['status']);?>

                                <?php }?>


                            </td>
                                                                                                                                                                                                                                <td class="text-right">
                                <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/iview/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/token_<?php echo $_smarty_tpl->tpl_vars['ds']->value['vtoken'];?>
/"
                                   class="btn btn-primary btn-xs"><i class="fa fa-check"></i> </a>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/ipdf/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/token_<?php echo $_smarty_tpl->tpl_vars['ds']->value['vtoken'];?>
/dl/"
                                   class="btn btn-primary btn-xs"><i class="fa fa-file-pdf-o"></i> </a>
                                <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
iview/print/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/token_<?php echo $_smarty_tpl->tpl_vars['ds']->value['vtoken'];?>
/"
                                   class="btn btn-primary btn-xs"><i class="fa fa-print"></i> </a>

                            </td>
                        </tr>
                        <?php
}
} else {
?>
                        <tr>
                            <td colspan="8">
                                <?php echo $_smarty_tpl->tpl_vars['_L']->value['No Data Available'];?>

                            </td>
                        </tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                    </tbody>


                </table>

            </div>


        </div>
    </div>


<?php
}
}
/* {/block "content"} */
}
