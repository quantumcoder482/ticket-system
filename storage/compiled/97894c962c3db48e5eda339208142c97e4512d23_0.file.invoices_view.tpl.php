<?php
/* Smarty version 3.1.33, created on 2018-12-24 07:47:08
  from '/Users/razib/Documents/valet/suite/ui/theme/default/invoices_view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c20d54cc81f26_18180673',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '97894c962c3db48e5eda339208142c97e4512d23' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/invoices_view.tpl',
      1 => 1545655625,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c20d54cc81f26_18180673 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11554744065c20d54cc02b24_20137119', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4146165795c20d54cc7db06_41977774', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_11554744065c20d54cc02b24_20137119 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_11554744065c20d54cc02b24_20137119',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Users/razib/Documents/valet/suite/vendor/smarty/smarty/libs/plugins/function.counter.php','function'=>'smarty_function_counter',),));
?>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="exampleInputEmail1"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Unique Invoice URL'];?>
:</label>
                <input type="text" class="form-control" id="invoice_public_url" onClick="this.setSelectionRange(0, this.value.length)" value="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/iview/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
/token_<?php echo $_smarty_tpl->tpl_vars['d']->value['vtoken'];?>
">
            </div>
        </div>
        <div class="col-lg-12"  id="application_ajaxrender">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice'];?>
 - <?php echo $_smarty_tpl->tpl_vars['d']->value['invoicenum'];
if ($_smarty_tpl->tpl_vars['d']->value['cn'] != '') {?> <?php echo $_smarty_tpl->tpl_vars['d']->value['cn'];?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
 <?php }?> </h5>
                    <input type="hidden" name="iid" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
" id="iid">


                    <div class="btn-group  pull-right" role="group" aria-label="...">





                        <div class="btn-group" role="group">
                            <button type="button" class="btn  btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>  <?php echo $_smarty_tpl->tpl_vars['_L']->value['Send Email'];?>

                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#" id="mail_invoice_created"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Created'];?>
</a></li>
                                <li><a href="#" id="mail_invoice_reminder"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Payment Reminder'];?>
</a></li>
                                <li><a href="#" id="mail_invoice_overdue"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Overdue Notice'];?>
</a></li>
                                <li><a href="#" id="mail_invoice_confirm"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Payment Confirmation'];?>
</a></li>
                                <li><a href="#" id="mail_invoice_refund"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Refund Confirmation'];?>
</a></li>
                            </ul>
                        </div>

                        <div class="btn-group" role="group">
                            <button type="button" class="btn  btn-inverse btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>  <?php echo $_smarty_tpl->tpl_vars['_L']->value['SMS'];?>

                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#" id="sms_invoice_created"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Created'];?>
</a></li>
                                <li><a href="#" id="sms_invoice_reminder"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Payment Reminder'];?>
</a></li>
                                <li><a href="#" id="sms_invoice_overdue"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Overdue Notice'];?>
</a></li>
                                <li><a href="#" id="sms_invoice_confirm"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Payment Confirmation'];?>
</a></li>
                                <li><a href="#" id="sms_invoice_refund"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Refund Confirmation'];?>
</a></li>
                            </ul>
                        </div>

                        <div class="btn-group" role="group">
                            <button type="button" class="btn  btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-ellipsis-v"></i>  <?php echo $_smarty_tpl->tpl_vars['_L']->value['Mark As'];?>

                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <?php if ($_smarty_tpl->tpl_vars['d']->value['status'] != 'Paid') {?>
                                    <li><a href="#" id="mark_paid"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Paid'];?>
</a></li>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['d']->value['status'] != 'Unpaid') {?>
                                    <li><a href="#" id="mark_unpaid"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Unpaid'];?>
</a></li>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['d']->value['status'] != 'Partially Paid') {?>
                                    <li><a href="#" id="mark_partially_paid"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Partially Paid'];?>
</a></li>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['d']->value['status'] != 'Cancelled') {?>
                                    <li><a href="#" id="mark_cancelled"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancelled'];?>
</a></li>
                                <?php }?>

                            </ul>
                        </div>

                        <?php if ($_smarty_tpl->tpl_vars['config']->value['accounting'] == '1') {?>
                            <button type="button" class="btn  btn-danger btn-sm" id="add_payment"><i class="fa fa-plus"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Payment'];?>
</button>
                        <?php }?>

                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/iview/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
/token_<?php echo $_smarty_tpl->tpl_vars['d']->value['vtoken'];?>
" target="_blank" class="btn btn-primary  btn-sm"><i class="fa fa-paper-plane-o"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Preview'];?>
</a>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/edit/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
" class="btn btn-warning  btn-sm"><i class="fa fa-pencil"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>
</a>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn  btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-file-pdf-o"></i>
                                <?php echo $_smarty_tpl->tpl_vars['_L']->value['PDF'];?>

                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/ipdf/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
/token_<?php echo $_smarty_tpl->tpl_vars['d']->value['vtoken'];?>
/view/" target="_blank"><?php echo $_smarty_tpl->tpl_vars['_L']->value['View PDF'];?>
</a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/ipdf/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
/token_<?php echo $_smarty_tpl->tpl_vars['d']->value['vtoken'];?>
/dl/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Download PDF'];?>
</a></li>
                            </ul>
                        </div>

                        <a data-toggle="modal" href="#modal_add_item" class="btn btn-sm btn-green"><i class="fa fa-paperclip"></i> </a>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/clone/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
/" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Clone'];?>
"><i class="fa fa-files-o"></i> </a>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
iview/print/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
/token_<?php echo $_smarty_tpl->tpl_vars['d']->value['vtoken'];?>
" target="_blank" class="btn btn-inverse  btn-sm"><i class="fa fa-print"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Print'];?>
</a>


                    </div>

                </div>
                <div class="ibox-content">

                    <div class="invoice">
                        <header class="clearfix">
                            <div class="row">
                                <div class="col-sm-6 mt-md">
                                    <h2 class="h2 mt-none mb-sm text-dark text-bold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['INVOICE'];?>
</h2>
                                    <h4 class="h4 m-none text-dark text-bold">#<?php echo $_smarty_tpl->tpl_vars['d']->value['invoicenum'];
if ($_smarty_tpl->tpl_vars['d']->value['cn'] != '') {?> <?php echo $_smarty_tpl->tpl_vars['d']->value['cn'];?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
 <?php }?></h4>
                                    <?php if ($_smarty_tpl->tpl_vars['d']->value['status'] == 'Unpaid') {?>
                                        <h3 class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Unpaid'];?>
</h3>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['d']->value['status'] == 'Paid') {?>
                                        <h3 class="alert alert-success"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Paid'];?>
</h3>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['d']->value['status'] == 'Partially Paid') {?>
                                        <h3 class="alert alert-info"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Partially Paid'];?>
</h3>
                                    <?php } else { ?>
                                        <h3 class="alert alert-info"><?php echo $_smarty_tpl->tpl_vars['d']->value['status'];?>
</h3>
                                    <?php }?>

                                    <?php if (isset($_smarty_tpl->tpl_vars['d']->value['title']) && $_smarty_tpl->tpl_vars['d']->value['title'] != '') {?>
                                        <h4><?php echo $_smarty_tpl->tpl_vars['d']->value['title'];?>
</h4>
                                        <hr>
                                    <?php }?>

                                    <?php if ($_smarty_tpl->tpl_vars['config']->value['invoice_receipt_number'] == '1' && $_smarty_tpl->tpl_vars['d']->value['receipt_number'] != '') {?>
                                        <h4><?php echo $_smarty_tpl->tpl_vars['_L']->value['Receipt Number'];?>
: <?php echo $_smarty_tpl->tpl_vars['d']->value['receipt_number'];?>
</h4>
                                        <hr>
                                    <?php }?>


                                </div>
                                <div class="col-sm-6 text-right mt-md mb-md">

                                    <div class="ib">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/system/<?php echo $_smarty_tpl->tpl_vars['config']->value['logo_default'];?>
" alt="Logo" style="margin-bottom: 15px;">
                                    </div>

                                    <address class="ib mr-xlg">
                                        <strong><?php echo $_smarty_tpl->tpl_vars['config']->value['CompanyName'];?>
</strong>
                                        <br>
                                        <?php echo $_smarty_tpl->tpl_vars['config']->value['caddress'];?>


                                        <?php if (isset($_smarty_tpl->tpl_vars['config']->value['vat_number'])) {?>

                                            <?php if ($_smarty_tpl->tpl_vars['config']->value['tax_system'] == 'India') {?>

                                                <br>
                                                <strong>GSTIN:</strong> <?php echo $_smarty_tpl->tpl_vars['config']->value['vat_number'];?>


                                            <?php } else { ?>

                                                <br>
                                                <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Vat number'];?>
:</strong> <?php echo $_smarty_tpl->tpl_vars['config']->value['vat_number'];?>


                                            <?php }?>

                                        <?php }?>


                                    </address>

                                </div>
                            </div>
                        </header>
                        <div class="bill-info">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="bill-to">
                                        <p class="h5 mb-xs text-dark text-semibold"><strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoiced To'];?>
:</strong></p>
                                        <address>
                                            <?php if ($_smarty_tpl->tpl_vars['a']->value['company'] != '') {?>
                                                <?php echo $_smarty_tpl->tpl_vars['a']->value['company'];?>

                                                <br>

                                                <?php if ($_smarty_tpl->tpl_vars['company']->value && $_smarty_tpl->tpl_vars['config']->value['show_business_number'] == '1') {?>

                                                    <?php if ($_smarty_tpl->tpl_vars['company']->value->business_number != '') {?>
                                                        <?php echo $_smarty_tpl->tpl_vars['config']->value['label_business_number'];?>
: <?php echo $_smarty_tpl->tpl_vars['company']->value->business_number;?>

                                                        <br>
                                                    <?php }?>
                                                <?php }?>

                                                <?php echo $_smarty_tpl->tpl_vars['_L']->value['ATTN'];?>
: <?php echo $_smarty_tpl->tpl_vars['d']->value['account'];?>

                                                <br>
                                            <?php } else { ?>
                                                <?php echo $_smarty_tpl->tpl_vars['d']->value['account'];?>

                                                <br>
                                            <?php }?>

                                            <?php echo $_smarty_tpl->tpl_vars['a']->value['address'];?>
 <br>
                                            <?php echo $_smarty_tpl->tpl_vars['a']->value['city'];?>
 <br>
                                            <?php echo $_smarty_tpl->tpl_vars['a']->value['state'];?>
 - <?php echo $_smarty_tpl->tpl_vars['a']->value['zip'];?>
 <br>
                                            <?php echo $_smarty_tpl->tpl_vars['a']->value['country'];?>

                                            <br>
                                            <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Phone'];?>
:</strong> <?php echo $_smarty_tpl->tpl_vars['a']->value['phone'];?>


                                            <?php if ($_smarty_tpl->tpl_vars['config']->value['fax_field'] != '0' && $_smarty_tpl->tpl_vars['a']->value['fax'] != '') {?>
                                                <br>
                                                <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Fax'];?>
:</strong> <?php echo $_smarty_tpl->tpl_vars['a']->value['fax'];?>

                                            <?php }?>

                                            <br>
                                            <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email'];?>
:</strong> <?php echo $_smarty_tpl->tpl_vars['a']->value['email'];?>


                                            <?php if ($_smarty_tpl->tpl_vars['config']->value['tax_system'] == 'India') {?>

                                                <br>
                                                <strong>GSTIN:</strong> <?php echo $_smarty_tpl->tpl_vars['a']->value['business_number'];?>


                                            <?php }?>


                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cf']->value, 'cfs');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cfs']->value) {
?>
                                                <?php if ($_smarty_tpl->tpl_vars['cfs']->value['showinvoice'] == 'No') {?>
                                                    <?php continue 1;?>
                                                <?php }?>
                                                <br>
                                                <strong><?php echo $_smarty_tpl->tpl_vars['cfs']->value['fieldname'];?>
: </strong> <?php echo get_custom_field_value($_smarty_tpl->tpl_vars['cfs']->value['id'],$_smarty_tpl->tpl_vars['a']->value['id']);?>

                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                            <?php echo $_smarty_tpl->tpl_vars['x_html']->value;?>

                                        </address>





                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="bill-data text-right">
                                        <p class="mb-none">
                                            <span class="text-dark"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Date'];?>
:</span>
                                            <span class="value"><?php echo date($_smarty_tpl->tpl_vars['config']->value['df'],strtotime($_smarty_tpl->tpl_vars['d']->value['date']));?>
</span>
                                        </p>
                                        <p class="mb-none">
                                            <span class="text-dark"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Due Date'];?>
:</span>
                                            <span class="value"><?php echo date($_smarty_tpl->tpl_vars['config']->value['df'],strtotime($_smarty_tpl->tpl_vars['d']->value['duedate']));?>
</span>
                                        </p>
                                        <h2> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Total'];?>
: <?php echo formatCurrency($_smarty_tpl->tpl_vars['d']->value['total'],$_smarty_tpl->tpl_vars['d']->value['currency_iso_code']);?>
 </h2>
                                        <?php if (($_smarty_tpl->tpl_vars['d']->value['credit']) != '0.00') {?>
                                            <h2> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Total Paid'];?>
:  <span class="amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['data_a_sign']->value;?>
" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['data_a_dec']->value;?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['data_a_sep']->value;?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['data_p_sign']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['credit'];?>
</span> </h2>
                                                                                        <h2> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount Due'];?>
: <span class="amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['data_a_sign']->value;?>
" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['data_a_dec']->value;?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['data_a_sep']->value;?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['data_p_sign']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i_due']->value;?>
</span> </h2>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <?php echo $_smarty_tpl->tpl_vars['extraHtml']->value;?>






                        <?php if ($_smarty_tpl->tpl_vars['quote']->value) {?>

                            <h4><?php echo $_smarty_tpl->tpl_vars['_L']->value['Quote'];?>
: <?php echo $_smarty_tpl->tpl_vars['quote']->value->id;?>
</h4>

                            <div class="row">
                                <div class="col-md-12">
                                    <hr>
                                    <?php echo $_smarty_tpl->tpl_vars['quote']->value->proposal;?>

                                    <hr>
                                </div>
                            </div>
                        <?php }?>

                        <div class="table-responsive">


                            <?php if ($_smarty_tpl->tpl_vars['config']->value['tax_system'] == 'India') {?>

                                <table class="table table-bordered invoice-items">
                                    <thead>
                                    <tr class="text-dark">
                                        <th id="cell-id" class="text-semibold">S/L</th>
                                        <th id="cell-item" class="text-semibold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Item'];?>
</th>
                                        <th class="text-semibold">HSN / SAC</th>
                                        <th id="cell-price" class="text-center text-semibold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Price'];?>
</th>
                                        <th id="cell-qty" class="text-center text-semibold"><?php if ($_smarty_tpl->tpl_vars['d']->value['show_quantity_as'] == '' || $_smarty_tpl->tpl_vars['d']->value['show_quantity_as'] == '1') {
echo $_smarty_tpl->tpl_vars['_L']->value['Qty'];
} else {
echo $_smarty_tpl->tpl_vars['d']->value['show_quantity_as'];
}?></th>
                                        <th class="text-right">Taxable Value</th>


                                        <?php if ($_smarty_tpl->tpl_vars['d']->value['is_same_state']) {?>

                                            <th class="text-right">CGST</th>
                                            <th class="text-right">SGST/UTGST</th>
                                            <th class="text-right">GST</th>

                                        <?php } else { ?>

                                            <th class="text-right">IGST</th>

                                        <?php }?>




                                        <th id="cell-total" class="text-right text-semibold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total'];?>
</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                                        <tr>
                                            <td>
                                                <?php if ($_smarty_tpl->tpl_vars['item']->value['itemcode'] != '') {?>
                                                    <?php echo $_smarty_tpl->tpl_vars['item']->value['itemcode'];?>

                                                <?php } else { ?>
                                                    <?php echo smarty_function_counter(array(),$_smarty_tpl);?>

                                                <?php }?>
                                            </td>
                                            <td class="text-semibold text-dark"><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
</td>
                                            <td class="text-semibold text-dark"><?php echo $_smarty_tpl->tpl_vars['item']->value['tax_code'];?>
</td>
                                            <td class="text-center amount" data-a-sign="<?php if ($_smarty_tpl->tpl_vars['d']->value['currency_symbol'] == '') {?> <?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['d']->value['currency_symbol'];
}?> "><?php echo $_smarty_tpl->tpl_vars['item']->value['amount'];?>
</td>
                                            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['item']->value['qty'];?>
</td>
                                            <td class="text-right">
                                                <?php if ($_smarty_tpl->tpl_vars['item']->value['discount_amount'] != '0.00') {?>

                                                    Total: <span class="amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['data_a_sign']->value;?>
" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['data_a_dec']->value;?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['data_a_sep']->value;?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['data_p_sign']->value;?>
"><?php echo ($_smarty_tpl->tpl_vars['item']->value['amount']*$_smarty_tpl->tpl_vars['item']->value['qty']);?>
</span>


                                                        <br>
                                                        Discount: <span class="amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['data_a_sign']->value;?>
" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['data_a_dec']->value;?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['data_a_sep']->value;?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['data_p_sign']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['discount_amount'];?>
</span>
                                                    <br>
                                                    Taxable amount: <span class="amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['data_a_sign']->value;?>
" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['data_a_dec']->value;?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['data_a_sep']->value;?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['data_p_sign']->value;?>
"><?php echo ($_smarty_tpl->tpl_vars['item']->value['amount']*$_smarty_tpl->tpl_vars['item']->value['qty'])-$_smarty_tpl->tpl_vars['item']->value['discount_amount'];?>
</span>

                                                <?php } else { ?>
                                                    <span class="amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['data_a_sign']->value;?>
" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['data_a_dec']->value;?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['data_a_sep']->value;?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['data_p_sign']->value;?>
"><?php echo ($_smarty_tpl->tpl_vars['item']->value['amount']*$_smarty_tpl->tpl_vars['item']->value['qty']);?>
</span>

                                                <?php }?>


                                            </td>


                                            <?php if ($_smarty_tpl->tpl_vars['d']->value['is_same_state']) {?>

                                                <td class="text-right">
                                                    <span class="amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['data_a_sign']->value;?>
" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['data_a_dec']->value;?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['data_a_sep']->value;?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['data_p_sign']->value;?>
"><?php echo gstIndiaSplitTaxValue($_smarty_tpl->tpl_vars['item']->value['total'],$_smarty_tpl->tpl_vars['item']->value['tax_rate']);?>
</span>
                                                    <br>
                                                    @<?php echo round($_smarty_tpl->tpl_vars['item']->value['tax_rate']/2,2);?>
%
                                                </td>
                                                <td class="text-right">
                                                    <span class="amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['data_a_sign']->value;?>
" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['data_a_dec']->value;?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['data_a_sep']->value;?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['data_p_sign']->value;?>
"><?php echo gstIndiaSplitTaxValue($_smarty_tpl->tpl_vars['item']->value['total'],$_smarty_tpl->tpl_vars['item']->value['tax_rate']);?>
</span>
                                                    <br>
                                                    @<?php echo round($_smarty_tpl->tpl_vars['item']->value['tax_rate']/2,2);?>
%
                                                </td>
                                                <td class="text-right">
                                                    <span class="amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['data_a_sign']->value;?>
" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['data_a_dec']->value;?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['data_a_sep']->value;?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['data_p_sign']->value;?>
"><?php echo round($_smarty_tpl->tpl_vars['item']->value['taxamount'],2);?>
</span> <br>
                                                    @<?php echo round($_smarty_tpl->tpl_vars['item']->value['tax_rate'],2);?>
%

                                                </td>

                                            <?php } else { ?>



                                                <td class="text-right">
                                                    <span class="amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['data_a_sign']->value;?>
" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['data_a_dec']->value;?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['data_a_sep']->value;?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['data_p_sign']->value;?>
"><?php echo round((($_smarty_tpl->tpl_vars['item']->value['tax_rate']*($_smarty_tpl->tpl_vars['item']->value['qty']*$_smarty_tpl->tpl_vars['item']->value['amount']))/100),2);?>
</span> <br>
                                                    @<?php echo round($_smarty_tpl->tpl_vars['item']->value['tax_rate'],2);?>
%

                                                </td>

                                            <?php }?>




                                            <td class="text-right amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['data_a_sign']->value;?>
" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['data_a_dec']->value;?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['data_a_sep']->value;?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['data_p_sign']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['total']+$_smarty_tpl->tpl_vars['item']->value['taxamount'];?>
</td>
                                        </tr>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </tbody>
                                </table>

                            <?php } else { ?>

                                <table class="table table-bordered invoice-items">
                                    <thead>
                                    <tr class="text-dark">
                                        <th id="cell-id" class="text-semibold">#</th>
                                        <th id="cell-item" class="text-semibold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Item'];?>
</th>
                                        <th id="cell-price" class="text-center text-semibold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Price'];?>
</th>
                                        <th id="cell-qty" class="text-center text-semibold"><?php if ($_smarty_tpl->tpl_vars['d']->value['show_quantity_as'] == '' || $_smarty_tpl->tpl_vars['d']->value['show_quantity_as'] == '1') {
echo $_smarty_tpl->tpl_vars['_L']->value['Qty'];
} else {
echo $_smarty_tpl->tpl_vars['d']->value['show_quantity_as'];
}?></th>
                                        <th id="cell-total" class="text-center text-semibold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total'];?>
</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['itemcode'];?>
</td>
                                            <td class="text-semibold text-dark"><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
</td>
                                            <td class="text-center amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['data_a_sign']->value;?>
" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['data_a_dec']->value;?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['data_a_sep']->value;?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['data_p_sign']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['amount'];?>
</td>
                                            <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['item']->value['qty'];?>
</td>
                                            <td class="text-center amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['data_a_sign']->value;?>
" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['data_a_dec']->value;?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['data_a_sep']->value;?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['data_p_sign']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['total']+$_smarty_tpl->tpl_vars['item']->value['taxamount']+$_smarty_tpl->tpl_vars['item']->value['discount_amount'];?>
</td>
                                        </tr>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </tbody>
                                </table>

                            <?php }?>



                        </div>

                        <div class="invoice-summary">
                            <div class="row">
                                <div class="col-sm-4 col-sm-offset-8">
                                    <table class="table h5 text-dark">
                                        <tbody>
                                        <tr class="b-top-none">
                                            <td colspan="2"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Subtotal'];?>
</td>
                                            <td class="text-left amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['data_a_sign']->value;?>
" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['data_a_dec']->value;?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['data_a_sep']->value;?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['data_p_sign']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['subtotal'];?>
</td>
                                        </tr>
                                        <?php if (($_smarty_tpl->tpl_vars['d']->value['discount']) != '0.00') {?>
                                            <tr>
                                                <td colspan="2"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Discount'];?>
</td>
                                                <td class="text-left amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['data_a_sign']->value;?>
" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['data_a_dec']->value;?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['data_a_sep']->value;?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['data_p_sign']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['discount'];?>
</td>
                                            </tr>
                                        <?php }?>

                                        <?php if ($_smarty_tpl->tpl_vars['config']->value['tax_system'] == 'India') {?>
                                            <tr>
                                                <td colspan="2">GST Total</td>
                                                <td class="text-left amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['data_a_sign']->value;?>
" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['data_a_dec']->value;?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['data_a_sep']->value;?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['data_p_sign']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['tax'];?>
</td>
                                            </tr>
                                        <?php } else { ?>

                                            <tr>
                                                <td colspan="2"><?php echo $_smarty_tpl->tpl_vars['_L']->value['TAX'];?>
</td>
                                                <td class="text-left amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['data_a_sign']->value;?>
" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['data_a_dec']->value;?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['data_a_sep']->value;?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['data_p_sign']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['tax'];?>
</td>
                                            </tr>

                                        <?php }?>

                                        <?php if (($_smarty_tpl->tpl_vars['d']->value['credit']) != '0.00') {?>
                                            <tr>
                                                <td colspan="2"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total'];?>
</td>
                                                <td class="text-left amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['data_a_sign']->value;?>
" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['data_a_dec']->value;?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['data_a_sep']->value;?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['data_p_sign']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['total'];?>
</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total Paid'];?>
</td>
                                                <td class="text-left amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['data_a_sign']->value;?>
" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['data_a_dec']->value;?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['data_a_sep']->value;?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['data_p_sign']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['credit'];?>
</td>
                                            </tr>
                                            <tr class="h4">
                                                <td colspan="2"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount Due'];?>
</td>
                                                                                                <td class="text-left amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['data_a_sign']->value;?>
" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['data_a_dec']->value;?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['data_a_sep']->value;?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['data_p_sign']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i_due']->value;?>
</td>
                                            </tr>
                                        <?php } else { ?>
                                            <tr class="h4">
                                                <td colspan="2"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Grand Total'];?>
</td>
                                                <td class="text-left amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['data_a_sign']->value;?>
" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['data_a_dec']->value;?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['data_a_sep']->value;?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['data_p_sign']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['total'];?>
</td>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if (($_smarty_tpl->tpl_vars['trs_c']->value != '')) {?>
                        <h3><?php echo $_smarty_tpl->tpl_vars['_L']->value['Related Transactions'];?>
</h3>
                        <table class="table table-bordered sys_table">
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Account'];?>
</th>


                            <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
</th>

                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Description'];?>
</th>




                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['trs']->value, 'tr');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tr']->value) {
?>
                                <tr class="<?php if ($_smarty_tpl->tpl_vars['tr']->value['cr'] == '0.00') {?>warning <?php } else { ?>info<?php }?>">
                                    <td><?php echo date($_smarty_tpl->tpl_vars['config']->value['df'],strtotime($_smarty_tpl->tpl_vars['tr']->value['date']));?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['tr']->value['account'];?>
</td>


                                    <td class="text-right amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['data_a_sign']->value;?>
" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['data_a_dec']->value;?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['data_a_sep']->value;?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['data_p_sign']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['tr']->value['amount'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['tr']->value['description'];?>
</td>


                                </tr>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



                        </table>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['inv_files_c']->value != '') {?>

                        <table class="table table-bordered table-hover sys_table">
                            <thead>
                            <tr>
                                <th class="text-right" data-sort-ignore="true" width="20px;"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Type'];?>
</th>

                                <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['File'];?>
</th>

                                <th class="text-right" data-sort-ignore="true" width="100px;"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['inv_files']->value, 'ds');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
?>

                                <tr>

                                    <td>
                                        <?php if ($_smarty_tpl->tpl_vars['ds']->value['file_mime_type'] == 'jpg' || $_smarty_tpl->tpl_vars['ds']->value['file_mime_type'] == 'png' || $_smarty_tpl->tpl_vars['ds']->value['file_mime_type'] == 'gif') {?>
                                            <i class="fa fa-file-image-o"></i>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['file_mime_type'] == 'pdf') {?>
                                            <i class="fa fa-file-pdf-o"></i>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['file_mime_type'] == 'zip') {?>
                                            <i class="fa fa-file-archive-o"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-file"></i>
                                        <?php }?>
                                    </td>


                                    <td>

                                        <?php echo $_smarty_tpl->tpl_vars['ds']->value['title'];?>


                                        <?php if ($_smarty_tpl->tpl_vars['ds']->value['file_mime_type'] == 'jpg' || $_smarty_tpl->tpl_vars['ds']->value['file_mime_type'] == 'png' || $_smarty_tpl->tpl_vars['ds']->value['file_mime_type'] == 'gif') {?>

                                            <div class="hr-line-dashed"></div>

                                            <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/docs/<?php echo $_smarty_tpl->tpl_vars['ds']->value['file_path'];?>
" class="img-responsive" alt="<?php echo $_smarty_tpl->tpl_vars['ds']->value['title'];?>
">

                                        <?php }?>

                                    </td>

                                    <td class="text-right">

                                        <a data-toggle="tooltip" data-placement="top" title="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Download'];?>
" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/dl/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['ds']->value['file_dl_token'];?>
/" class="btn btn-primary"><i class="fa fa-download"></i> </a>

                                        <a data-toggle="tooltip" data-placement="top" title="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
" onclick="confirmThenGoToUrl(event,'delete/document/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
');" href="javascript:;" class="btn btn-danger"><i class="fa fa-trash"></i> </a>

                                    </td>


                                </tr>

                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                            </tbody>



                        </table>

                    <?php }?>

                    <?php if (($_smarty_tpl->tpl_vars['d']->value['notes']) != '') {?>
                        <div class="well m-t">
                            <?php echo $_smarty_tpl->tpl_vars['d']->value['notes'];?>

                        </div>
                    <?php }?>

                    <?php if (($_smarty_tpl->tpl_vars['emls_c']->value != '')) {?>
                        <hr>
                        <h3><?php echo $_smarty_tpl->tpl_vars['_L']->value['Related Emails'];?>
</h3>
                        <table class="table table-bordered sys_table">
                            <th width="20%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Subject'];?>
</th>







                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['emls']->value, 'eml');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['eml']->value) {
?>
                                <tr>
                                    <td><?php echo date($_smarty_tpl->tpl_vars['config']->value['df'],strtotime($_smarty_tpl->tpl_vars['eml']->value['date']));?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['eml']->value['subject'];?>
</td>
                                </tr>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



                        </table>
                    <?php }?>


                    <?php if (count($_smarty_tpl->tpl_vars['access_logs']->value) != 0) {?>
                        <hr>
                        <h3><?php echo $_smarty_tpl->tpl_vars['_L']->value['Customer'];?>
 : <?php echo $_smarty_tpl->tpl_vars['_L']->value['Access Log'];?>
</h3>
                        <table class="table table-bordered sys_table">
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Time'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['IP'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Country'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['City'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Browser'];?>
</th>

                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['access_logs']->value, 'log');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['log']->value) {
?>
                                <tr>
                                    <td><?php echo date(($_smarty_tpl->tpl_vars['config']->value['df']).(' H:i:s'),strtotime($_smarty_tpl->tpl_vars['log']->value['viewed_at']));?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['log']->value['ip'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['log']->value['country'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['log']->value['city'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['log']->value['browser'];?>
</td>
                                </tr>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



                        </table>
                    <?php }?>



                </div>


            </div>
        </div>
    </div>

    <div id="modal_add_item" class="modal fade" tabindex="-1" data-width="760" style="display: none;">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title"><?php echo $_smarty_tpl->tpl_vars['_L']->value['New Document'];?>
</h4>
        </div>
        <div class="modal-body">
            <div class="row">

                <div class="col-md-12">

                    <form>
                        <div class="form-group">
                            <label for="doc_title"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Title'];?>
</label>
                            <input type="text" class="form-control" id="doc_title" name="doc_title">

                        </div>



                    </form>

                    <form action="" class="dropzone" id="upload_container">

                        <div class="dz-message">
                            <h3> <i class="fa fa-cloud-upload"></i>  <?php echo $_smarty_tpl->tpl_vars['_L']->value['Drop File Here'];?>
</h3>
                            <br />
                            <span class="note"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Click to Upload'];?>
</span>
                        </div>

                    </form>
                    <hr>
                    <h4><?php echo $_smarty_tpl->tpl_vars['_L']->value['Server Config'];?>
:</h4>
                    <p><?php echo $_smarty_tpl->tpl_vars['_L']->value['Upload Maximum Size'];?>
: <?php echo $_smarty_tpl->tpl_vars['upload_max_size']->value;?>
</p>
                    <p><?php echo $_smarty_tpl->tpl_vars['_L']->value['POST Maximum Size'];?>
: <?php echo $_smarty_tpl->tpl_vars['post_max_size']->value;?>
</p>

                </div>






            </div>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="file_link" id="file_link" value="">
            <button type="button" data-dismiss="modal" class="btn btn-danger"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Close'];?>
</button>
            <button type="button" id="btn_add_file" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
        </div>

    </div>

    <input type="hidden" id="_lan_msg_confirm" value="<?php echo $_smarty_tpl->tpl_vars['_L']->value['are_you_sure'];?>
">
    <input type="hidden" id="admin_email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
">


<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_4146165795c20d54cc7db06_41977774 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_4146165795c20d54cc7db06_41977774',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/sms/sms_counter.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>


        Dropzone.autoDiscover = false;
        $(document).ready(function () {

            $.fn.modal.defaults.width = '700px';

            var _url = $("#_url").val();

            var $modal = $('#ajax-modal');


            var sysrender = $('#application_ajaxrender');

            $('.amount').autoNumeric('init');

            var iid = $("#iid").val();
            sysrender.on('click', '#add_payment', function(e){
                e.preventDefault();


                $('body').modalmanager('loading');

                $modal.load( _url + 'invoices/add-payment/' + iid, '', function(){
                    $modal.modal();

                    $(".datepicker").datepicker();
                    $("#account").select2({
                        theme: "bootstrap"
                    });
                    $("#cats").select2({
                        theme: "bootstrap"
                    });
                    $("#pmethod").select2({
                        theme: "bootstrap"
                    });

                    <?php if ($_smarty_tpl->tpl_vars['config']->value['edition'] == 'iqm') {?>

                    var $amount = $("#amount");

                    var c2_amount = $("#c2_amount");

                    var c1_amount = $("#c1_amount");

                    var c_rate = <?php echo $_smarty_tpl->tpl_vars['currency_rate']->value;?>
;


                    function total_c() {

                        var total_amount_c1 = isNaN(parseInt(c1_amount.val())) ? 0 :(c1_amount.val());

                        total_amount_c1 = parseFloat(total_amount_c1);

                        var total_amount_c2 = isNaN(parseInt(c2_amount.val()/ c_rate)) ? 0 :(c2_amount.val()/ c_rate);

                        total_amount_c2 = parseFloat(total_amount_c2);

                        var total_amount_c = total_amount_c1 + total_amount_c2;

                        $amount.val(total_amount_c);
                    }

                    c2_amount.keyup(function(){

                        total_c();


                    });


                    c1_amount.keyup(function(){

                        total_c();


                    });



                    <?php }?>


                });

            });


            sysrender.on('click', '#mail_invoice_created', function(e){
                e.preventDefault();
                var iid = $("#iid").val();

                $('body').modalmanager('loading');

                $modal.load( _url + 'invoices/mail_invoice_/' + iid + '/created', '', function(){
                    $modal.modal();
                    $('.sysedit').summernote({

                    });
                });


            });

            sysrender.on('click', '#mail_invoice_reminder', function(e){
                e.preventDefault();
                var iid = $("#iid").val();

                $('body').modalmanager('loading');

                $modal.load( _url + 'invoices/mail_invoice_/' + iid + '/reminder', '', function(){
                    $modal.modal();
                    $('.sysedit').summernote({

                    });
                });

            });

            sysrender.on('click', '#mail_invoice_overdue', function(e){
                e.preventDefault();
                var iid = $("#iid").val();

                $('body').modalmanager('loading');


                $modal.load( _url + 'invoices/mail_invoice_/' + iid + '/overdue', '', function(){
                    $modal.modal();
                    $('.sysedit').summernote({

                    });
                });


            });

            sysrender.on('click', '#mail_invoice_confirm', function(e){
                e.preventDefault();
                var iid = $("#iid").val();

                $('body').modalmanager('loading');

                $modal.load( _url + 'invoices/mail_invoice_/' + iid + '/confirm', '', function(){
                    $modal.modal();
                    $('.sysedit').summernote({

                    });
                });

            });

            sysrender.on('click', '#mail_invoice_refund', function(e){
                e.preventDefault();
                var iid = $("#iid").val();

                $('body').modalmanager('loading');
                $modal.load( _url + 'invoices/mail_invoice_/' + iid + '/refund', '', function(){
                    $modal.modal();
                    $('.sysedit').summernote({

                    });
                });
            });



            sysrender.on('click', '#sms_invoice_created', function(e){
                e.preventDefault();
                var iid = $("#iid").val();

                $('body').modalmanager('loading');

                $modal.load( _url + 'invoices/sms_invoice_/' + iid + '/created', '', function(){
                    $modal.modal();
                    $('#message').countSms('#sms-counter');
                });


            });

            sysrender.on('click', '#sms_invoice_reminder', function(e){
                e.preventDefault();
                var iid = $("#iid").val();

                $('body').modalmanager('loading');

                $modal.load( _url + 'invoices/sms_invoice_/' + iid + '/reminder', '', function(){
                    $modal.modal();
                    $('#message').countSms('#sms-counter');
                });


            });

            sysrender.on('click', '#sms_invoice_overdue', function(e){
                e.preventDefault();
                var iid = $("#iid").val();

                $('body').modalmanager('loading');

                $modal.load( _url + 'invoices/sms_invoice_/' + iid + '/overdue', '', function(){
                    $modal.modal();
                    $('#message').countSms('#sms-counter');
                });


            });

            sysrender.on('click', '#sms_invoice_confirm', function(e){
                e.preventDefault();
                var iid = $("#iid").val();

                $('body').modalmanager('loading');

                $modal.load( _url + 'invoices/sms_invoice_/' + iid + '/confirm', '', function(){
                    $modal.modal();
                    $('#message').countSms('#sms-counter');
                });


            });

            sysrender.on('click', '#sms_invoice_refund', function(e){
                e.preventDefault();
                var iid = $("#iid").val();

                $('body').modalmanager('loading');

                $modal.load( _url + 'invoices/sms_invoice_/' + iid + '/refund', '', function(){
                    $modal.modal();
                    $('#message').countSms('#sms-counter');
                });


            });




            $modal.on('click', '#btnModalSMSSend', function(){
                $modal.modal('loading');


                $.post(base_url + 'sms/init/send_invoice', {


                    message: $('#message').val(),
                    to: $("#sms_to").val(),
                    from: $("#sms_from").val(),
                    invoice_id: $("#smsInvoiceId").val()

                }).done(function (data) {

                    $modal
                        .modal('loading')
                        .find('.modal-body')
                        .prepend(data);
                });

            });



            $modal.on('click', '#send', function(){
                $modal.modal('loading');

                var attach_pdf = 'No';

                if($("#attach_pdf").prop('checked') == true){
                    attach_pdf = 'Yes';
                }



                var _url = $("#_url").val();
                $.post(_url + 'invoices/send_email', {


                    message: $('.sysedit').code(),
                    subject: $('#subject').val(),

                    toname: $('#toname').val(),
                    i_cid: $('#i_cid').val(),
                    i_iid: $('#i_iid').val(),
                    toemail: $('#toemail').val(),
                    ccemail: $('#ccemail').val(),
                    bccemail: $('#bccemail').val(),
                    attach_pdf: attach_pdf

                }).done(function (data) {
                    var _url = $("#_url").val();
                    $modal
                        .modal('loading')
                        .find('.modal-body')
                        .prepend(data);
                });

            });

            $modal.on('click', '#save_payment', function(){
                $modal.modal('loading');

                var _url = $("#_url").val();
                $.post(_url + 'invoices/add-payment-post', $("#form_add_payment").serialize())

                    .done(function (data) {

                        var _url = $("#_url").val();
                        if ($.isNumeric(data)) {
                            location.reload();
                        }
                        else {
                            $modal
                                .modal('loading')
                                .find('.modal-body')
                                .prepend(data);
                        }
                    });

            });

            $("#mark_paid").click(function (e) {
                e.preventDefault();


                bootbox.confirm($("#_lan_msg_confirm").val(), function(result) {
                    if(result){
                        var iid = $("#iid").val();
                        $.post(  _url + "invoices/markpaid", { iid: iid })
                            .done(function( data ) {
                                location.reload();
                            });
                    }
                });

            });


            $("#mark_unpaid").click(function (e) {
                e.preventDefault();


                bootbox.confirm($("#_lan_msg_confirm").val(), function(result) {
                    if(result){
                        var iid = $("#iid").val();
                        $.post(  _url + "invoices/markunpaid", { iid: iid })
                            .done(function( data ) {
                                location.reload();
                            });
                    }
                });

            });

            $("#mark_cancelled").click(function (e) {
                e.preventDefault();
                bootbox.confirm($("#_lan_msg_confirm").val(), function(result) {
                    if(result){
                        var iid = $("#iid").val();
                        $.post(  _url + "invoices/markcancelled", { iid: iid })
                            .done(function( data ) {
                                location.reload();
                            });
                    }
                });

            });

            $("#mark_partially_paid").click(function (e) {
                e.preventDefault();
                bootbox.confirm($("#_lan_msg_confirm").val(), function(result) {
                    if(result){
                        var iid = $("#iid").val();
                        $.post(  _url + "invoices/markpartiallypaid", { iid: iid })
                            .done(function( data ) {
                                location.reload();
                            });
                    }
                });

            });



            $modal.on('click', '#send_bcc_to_admin', function(e){

                e.preventDefault();


                $("#bccemail").val($("#admin_email").val());

            });

            $modal.on('hidden.bs.modal', function () {
                location.reload();
            });



            // attach file






            $('[data-toggle="tooltip"]').tooltip();

            var $btn_add_file = $("#btn_add_file");

            var $file_link = $("#file_link");

            var upload_resp;




            var ib_file = new Dropzone("#upload_container",
                {
                    url: _url + "documents/upload/",
                    maxFiles: 1
                }
            );


            ib_file.on("sending", function() {

                $btn_add_file.prop('disabled', true);

            });

            ib_file.on("success", function(file,response) {

                $btn_add_file.prop('disabled', false);

                upload_resp = response;

                if(upload_resp.success == 'Yes'){

                    toastr.success(upload_resp.msg);
                    $file_link.val(upload_resp.file);


                }
                else{
                    toastr.error(upload_resp.msg);
                }


            });




            var $doc_title = $("#doc_title");


            $btn_add_file.on('click', function(e) {
                e.preventDefault();


                $.post( _url + "documents/post/", { title: $doc_title.val(), file_link: $file_link.val(), rid: iid, rtype: 'invoice' })
                    .done(function( data ) {

                        if ($.isNumeric(data)) {

                            location.reload();

                        }

                        else {
                            toastr.error(data);
                        }




                    });


            });



        });



    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
