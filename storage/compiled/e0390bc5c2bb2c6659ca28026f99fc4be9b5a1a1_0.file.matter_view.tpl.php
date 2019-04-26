<?php
/* Smarty version 3.1.33, created on 2019-01-08 19:25:55
  from '/Users/razib/Documents/valet/suite/apps/legal/views/matter_view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c353f939fa760_69751620',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0390bc5c2bb2c6659ca28026f99fc4be9b5a1a1' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/apps/legal/views/matter_view.tpl',
      1 => 1546993553,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c353f939fa760_69751620 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15402225965c353f939c9563_01866455', "style");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14481973205c353f939cb353_99345760', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20672879955c353f939f9a33_31039830', "script");
}
/* {block "style"} */
class Block_15402225965c353f939c9563_01866455 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'style' => 
  array (
    0 => 'Block_15402225965c353f939c9563_01866455',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/redactor/redactor.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/fc/fc.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/fc/fc_ibilling.css" />

<?php
}
}
/* {/block "style"} */
/* {block "content"} */
class Block_14481973205c353f939cb353_99345760 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_14481973205c353f939cb353_99345760',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="m-b-md">
                                    <h2><?php echo $_smarty_tpl->tpl_vars['matter']->value->title;?>
</h2>
                                </div>

                            </div>
                        </div>


                        <div class="row m-t-sm">
                            <div class="col-lg-12">
                                <div class="panel blank-panel">
                                    <div class="panel-heading">
                                        <div class="panel-options">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a class="nav-link active" href="#tab_dashboard" data-toggle="tab">Dashboard</a></li>
                                                <li><a class="nav-link" href="#tab_activities" data-toggle="tab">Activities</a></li>
                                                <li><a class="nav-link" href="#tab_calendar" data-toggle="tab">Calendar</a></li>
                                                <li><a class="nav-link" href="#tab_tasks" data-toggle="tab">Tasks</a></li>
                                                <li><a class="nav-link" href="#tab_documents" data-toggle="tab">Documents</a></li>
                                                <li><a class="nav-link" href="#tab_bills" data-toggle="tab">Bills</a></li>
                                                <li><a class="nav-link" href="#tab_transactions" data-toggle="tab">Transactions</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-body">

                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_dashboard">

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <dl class="row mb-0">
                                                            <div class="col-sm-4 text-sm-right"><dt>Description:</dt> </div>
                                                            <div class="col-sm-8 text-sm-left">
                                                                <?php echo $_smarty_tpl->tpl_vars['matter']->value->description;?>

                                                            </div>
                                                        </dl>
                                                        <dl class="row mb-0">
                                                            <div class="col-sm-4 text-sm-right"><dt>Responsible solicitor:</dt> </div>
                                                            <div class="col-sm-8 text-sm-left">
                                                            --
                                                            </div>
                                                        </dl>
                                                        <dl class="row mb-0">
                                                            <div class="col-sm-4 text-sm-right"><dt>Originating solicitor:</dt> </div>
                                                            <div class="col-sm-8 text-sm-left"> <dd class="mb-1">  --</dd></div>
                                                        </dl>
                                                        <dl class="row mb-0">
                                                            <div class="col-sm-4 text-sm-right"><dt>Client reference number:</dt> </div>
                                                            <div class="col-sm-8 text-sm-left"> <dd class="mb-1"><a href="#" class="text-navy"> n/a</a> </dd></div>
                                                        </dl>
                                                        <dl class="row mb-0">
                                                            <div class="col-sm-4 text-sm-right"> <dt>Location:</dt></div>
                                                            <div class="col-sm-8 text-sm-left"> <dd class="mb-1">—</dd></div>
                                                        </dl>

                                                    </div>
                                                    <div class="col-lg-6" id="cluster_info">

                                                        <dl class="row mb-0">
                                                            <div class="col-sm-4 text-sm-right">
                                                                <dt>Practice area:</dt>
                                                            </div>
                                                            <div class="col-sm-8 text-sm-left">
                                                                <dd class="mb-1">--</dd>
                                                            </div>
                                                        </dl>

                                                        <dl class="row mb-0">
                                                            <div class="col-sm-4 text-sm-right">
                                                                <dt>Status:</dt>
                                                            </div>
                                                            <div class="col-sm-8 text-sm-left">
                                                                <dd class="mb-1"> --</dd>
                                                            </div>
                                                        </dl>

                                                        <dl class="row mb-0">
                                                            <div class="col-sm-4 text-sm-right">
                                                                <dt>Open date:</dt>
                                                            </div>
                                                            <div class="col-sm-8 text-sm-left">
                                                                <dd class="mb-1"> --</dd>
                                                            </div>
                                                        </dl>

                                                    </div>
                                                </div>


                                                <?php if ($_smarty_tpl->tpl_vars['contact']->value) {?>

                                                    <h4>Client Details</h4>
                                                    <div class="hr-line-dashed"></div>

                                                    <p><strong><?php echo $_smarty_tpl->tpl_vars['contact']->value->account;?>
</strong></p>
                                                    <p>Email: <?php echo $_smarty_tpl->tpl_vars['contact']->value->email;?>
</p>
                                                    <p>Phone: <?php echo $_smarty_tpl->tpl_vars['contact']->value->phone;?>
</p>
                                                    <p>
                                                        Address: <br>
                                                        <?php echo $_smarty_tpl->tpl_vars['contact']->value->address;?>
 <br>
                                                        <?php echo $_smarty_tpl->tpl_vars['contact']->value->city;?>
 <br>
                                                        <?php echo $_smarty_tpl->tpl_vars['contact']->value->state;?>
 - <?php echo $_smarty_tpl->tpl_vars['contact']->value->zip;?>
 <br>
                                                    </p>

                                                    <p><strong>Notes</strong></p>

                                                    <div>
                                                        <?php echo $_smarty_tpl->tpl_vars['contact']->value->notes;?>

                                                    </div>


                                                <?php }?>



                                            </div>
                                            <div class="tab-pane" id="tab_activities">

                                                <form method="post">
                                                    <div class="form-group">
                                                        <label>Activity</label>
                                                        <textarea class="form-control" id="activity_text"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <button class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>

                                            </div>

                                            <div class="tab-pane" id="tab_calendar">

                                                <div id="calendar"></div>

                                            </div>

                                            <div class="tab-pane" id="tab_tasks">

                                            </div>

                                            <div class="tab-pane" id="tab_documents">
                                                <form class="form-horizontal" method="post" action="">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <span class="fa fa-search"></span>
                                                                </div>
                                                                <input type="text" name="name" id="foo_filter" class="form-control" placeholder="Search..."/>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </form>

                                                <table class="table table-bordered table-hover sys_table footable" id="footable_tbl"  data-filter="#foo_filter" data-page-size="50">
                                                    <thead>
                                                    <tr>

                                                        <th class="text-right" data-sort-ignore="true" width="20px;">Type</th>

                                                        <th>Title</th>


                                                        <th class="text-right" data-sort-ignore="true" width="200px;">Manage</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>


                                                    </tbody>

                                                    <tfoot>
                                                    <tr>
                                                        <td colspan="3">
                                                            <ul class="pagination">
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    </tfoot>

                                                </table>
                                            </div>

                                            <div class="tab-pane" id="tab_bills">

                                                <table class="table table-bordered table-hover sys_table">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Account'];?>
</th>
                                                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
</th>
                                                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Date'];?>
</th>
                                                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Due Date'];?>
</th>
                                                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Status'];?>
</th>
                                                        <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['invoices']->value, 'invoice');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['invoice']->value) {
?>
                                                        <tr>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['invoice']->value['invoicenum'];
if ($_smarty_tpl->tpl_vars['invoice']->value['cn'] != '') {?> <?php echo $_smarty_tpl->tpl_vars['invoice']->value['cn'];?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['invoice']->value['id'];?>
 <?php }?></td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['invoice']->value['account'];?>
</td>
                                                            <td class="amount" data-a-sign="<?php if ($_smarty_tpl->tpl_vars['invoice']->value['currency_symbol'] == '') {?> <?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['invoice']->value['currency_symbol'];
}?> "><?php echo $_smarty_tpl->tpl_vars['invoice']->value['total'];?>
</td>
                                                            <td><?php echo date($_smarty_tpl->tpl_vars['config']->value['df'],strtotime($_smarty_tpl->tpl_vars['invoice']->value['date']));?>
</td>
                                                            <td><?php echo date($_smarty_tpl->tpl_vars['config']->value['df'],strtotime($_smarty_tpl->tpl_vars['invoice']->value['duedate']));?>
</td>
                                                            <td><?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['invoice']->value['status']);?>
</td>
                                                            <td>
                                                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/view/<?php echo $_smarty_tpl->tpl_vars['invoice']->value['id'];?>
/" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['View'];?>
</a>
                                                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/edit/<?php echo $_smarty_tpl->tpl_vars['invoice']->value['id'];?>
/" class="btn btn-info btn-xs"><i class="fa fa-repeat"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>
</a>
                                                            </td>
                                                        </tr>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                                    </tbody>
                                                </table>

                                            </div>

                                            <div class="tab-pane" id="tab_transactions">
                                                <table class="table table-bordered sys_table">
                                                    <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date'];?>
</th>
                                                    <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Account'];?>
</th>
                                                    <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Type'];?>
</th>

                                                    <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
</th>

                                                    <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Description'];?>
</th>
                                                    <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Dr'];?>
</th>
                                                    <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cr'];?>
</th>
                                                    <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Balance'];?>
</th>
                                                    <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['transactions']->value, 'ds');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
?>
                                                        <tr class="<?php if ($_smarty_tpl->tpl_vars['ds']->value['cr'] == '0.00') {?>warning <?php } else { ?>info<?php }?>">
                                                            <td><?php echo date($_smarty_tpl->tpl_vars['config']->value['df'],strtotime($_smarty_tpl->tpl_vars['ds']->value['date']));?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
</td>
                                                            <td><?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['ds']->value['type']);?>
</td>

                                                            <td class="text-right amount" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['config']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['config']->value['thousands_sep'];?>
" data-a-pad="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_decimal_digits'];?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_symbol_position'];?>
" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
 " data-d-group="<?php echo $_smarty_tpl->tpl_vars['config']->value['thousand_separator_placement'];?>
"><?php echo $_smarty_tpl->tpl_vars['ds']->value['amount'];?>
</td>
                                                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['description'];?>
</td>

                                                            <td class="text-right amount" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['config']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['config']->value['thousands_sep'];?>
" data-a-pad="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_decimal_digits'];?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_symbol_position'];?>
" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
 " data-d-group="<?php echo $_smarty_tpl->tpl_vars['config']->value['thousand_separator_placement'];?>
"><?php echo $_smarty_tpl->tpl_vars['ds']->value['dr'];?>
</td>

                                                            <td class="text-right amount" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['config']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['config']->value['thousands_sep'];?>
" data-a-pad="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_decimal_digits'];?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_symbol_position'];?>
" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
 " data-d-group="<?php echo $_smarty_tpl->tpl_vars['config']->value['thousand_separator_placement'];?>
"><?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
 <?php echo $_smarty_tpl->tpl_vars['ds']->value['cr'];?>
</td>

                                                            <td class="text-right amount" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['config']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['config']->value['thousands_sep'];?>
" data-a-pad="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_decimal_digits'];?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_symbol_position'];?>
" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
 " data-d-group="<?php echo $_smarty_tpl->tpl_vars['config']->value['thousand_separator_placement'];?>
"><span <?php if ($_smarty_tpl->tpl_vars['ds']->value['bal'] < 0) {?>class="text-red"<?php }?>><?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
 <?php echo $_smarty_tpl->tpl_vars['ds']->value['bal'];?>
</span></td>

                                                            <td><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/manage/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</a></td>
                                                        </tr>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                </table>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_20672879955c353f939f9a33_31039830 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_20672879955c353f939f9a33_31039830',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/redactor/redactor.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="http://suite.test/ui/lib/fc/fc.js?ver=306"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>
        $(function () {
            $('#activity_text').redactor(
                {
                    minHeight: 200, // pixels
                    plugins: ['fontcolor']
                }
            );

            $('#calendar').fullCalendar();

        });
    <?php echo '</script'; ?>
>

<?php
}
}
/* {/block "script"} */
}
