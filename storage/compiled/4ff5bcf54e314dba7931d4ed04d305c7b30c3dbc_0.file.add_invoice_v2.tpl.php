<?php
/* Smarty version 3.1.33, created on 2018-12-13 14:01:45
  from '/Users/razib/Documents/valet/suite/ui/theme/default/add_invoice_v2.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c12ac99830f32_83156256',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ff5bcf54e314dba7931d4ed04d305c7b30c3dbc' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/add_invoice_v2.tpl',
      1 => 1544727702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c12ac99830f32_83156256 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5663537005c12ac997ef5a0_86776065', "style");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14101986255c12ac997f1a45_22847146', "content");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14491059665c12ac9981de25_28393319', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "style"} */
class Block_5663537005c12ac997ef5a0_86776065 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'style' => 
  array (
    0 => 'Block_5663537005c12ac997ef5a0_86776065',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/mselect/multiple-select.css" rel="stylesheet">

    <?php if ($_smarty_tpl->tpl_vars['config']->value['edition'] == 't_event') {?>
        <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet">
    <?php }?>

    <style>

        .btn-default {
            color: #333;
            background-color: #fff;
            border-color: #ccc;
        }

        .btn-default:hover, .btn-default:focus, .btn-default:active, .btn-default.active {
            color: #333;
            background-color: #fff;
            border-color: #ccc;
        }

        <?php if ($_smarty_tpl->tpl_vars['pos']->value == 'pos') {?>
        .pos_item {
            background: #f3f6f9;
            cursor: pointer;
        }

        .pos_item:hover {
            background: #2196f3;
            color: #ffffff;
        }

        <?php }?>

    </style>
<?php
}
}
/* {/block "style"} */
/* {block "content"} */
class Block_14101986255c12ac997f1a45_22847146 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_14101986255c12ac997f1a45_22847146',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row" id="ibox_form">


        <div class="col-md-12">
            <h3 class="ibilling-page-header"><?php echo $_smarty_tpl->tpl_vars['_L']->value['New Invoice'];?>
</h3>
        </div>

        <form id="invform" method="post">
            <div class="col-md-12">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
            </div>


            <div class="col-md-12">


                <div class="panel panel-default">
                    <div class="panel-body">


                        <div class="row">
                            <div class="col-md-12">

                                <div class='row'>
                                    <div class="col-sm-6">
                                        <h3><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice'];?>
 # <?php echo predictNextRow('sys_invoices');?>
</h3>
                                    </div>
                                    <div class='col-sm-6'>
                                        <div class="text-right">
                                            <input type="hidden" id="_dec_point" name="_dec_point"
                                                   value="<?php echo $_smarty_tpl->tpl_vars['config']->value['dec_point'];?>
">
                                            <button class="btn btn-primary" id="submit"> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
                                            <button class="btn btn-info"
                                                    id="save_n_close"> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Save n Close'];?>
</button>

                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <hr>
                                    </div>
                                </div>



                                <div class='row'>

                                    <div class='col-sm-4'>
                                        <div class='form-group'>
                                            <label for="user_title"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Customer'];?>
</label>

                                            <select id="cid" name="cid" class="form-control">
                                                <option value=""><?php echo $_smarty_tpl->tpl_vars['_L']->value['Select Contact'];?>
...</option>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['c']->value, 'cs');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cs']->value) {
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['cs']->value['id'];?>
"
                                                            <?php if ($_smarty_tpl->tpl_vars['p_cid']->value == ($_smarty_tpl->tpl_vars['cs']->value['id'])) {?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['cs']->value['account'];?>
 <?php if ($_smarty_tpl->tpl_vars['cs']->value['email'] != '') {?>- <?php echo $_smarty_tpl->tpl_vars['cs']->value['email'];
}?></option>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                            </select>
                                            <span class="help-block"><a href="#"
                                                                        id="contact_add">| <?php echo $_smarty_tpl->tpl_vars['_L']->value['Or Add New Customer'];?>
</a> </span>
                                        </div>
                                    </div>
                                    <div class='col-sm-4'>
                                        <div class="form-group">
                                            <label for="status"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Status'];?>
</label>

                                            <select id="status" name="status" class="form-control">

                                                <option value="Published"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Published'];?>
</option>
                                                <option value="Draft"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Draft'];?>
</option>


                                            </select>

                                        </div>
                                    </div>
                                    <div class='col-sm-4'>
                                        <div class="form-group">
                                            <label for="currency"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Currency'];?>
</label>

                                            <select id="currency" name="currency" class="form-control">

                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['currencies']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"
                                                            <?php if ($_smarty_tpl->tpl_vars['config']->value['home_currency'] == ($_smarty_tpl->tpl_vars['key']->value)) {?>selected="selected" <?php }?> data-decimal-mark="<?php echo $_smarty_tpl->tpl_vars['value']->value['decimal_mark'];?>
" data-thousands-separator="<?php echo $_smarty_tpl->tpl_vars['value']->value['thousands_separator'];?>
" data-symbol="<?php echo $_smarty_tpl->tpl_vars['value']->value['symbol'];?>
" ><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</option>
                                                    <?php
}
} else {
?>
                                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                            </select>

                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="invoice_title"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Title'];?>
  <small><em>(<?php echo $_smarty_tpl->tpl_vars['_L']->value['optional'];?>
)</em></small></label>

                                            <input type="text" class="form-control" id="invoice_title" name="title">
                                        </div>
                                    </div>
                                </div>

                                <div class='row'>


                                    <div class='col-sm-4'>
                                        <div class="form-group">
                                            <label for="address"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Address'];?>
</label>

                                            <textarea id="address" readonly class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class='col-sm-4'>
                                        <div class="form-group">
                                            <label for="invoicenum"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Prefix'];?>
</label>

                                            <input type="text" class="form-control" id="invoicenum" name="invoicenum">
                                        </div>

                                        <div class="form-group">
                                            <label for="cn"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice'];?>
 #</label>

                                            <input type="text" class="form-control" id="cn" name="cn">
                                            <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['invoice_number_help'];?>
</span>
                                        </div>

                                    </div>
                                    <div class='col-sm-4'>
                                        <?php if ($_smarty_tpl->tpl_vars['config']->value['invoice_receipt_number'] == '1') {?>
                                            <div class="form-group">
                                                <label for="receipt_number"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Receipt Number'];?>
</label>

                                                <input type="text" class="form-control" id="receipt_number"
                                                       name="receipt_number">
                                            </div>
                                        <?php } else { ?>
                                            <input type="hidden" name="receipt_number" id="receipt_number" value="">
                                        <?php }?>

                                        <div class="form-group">
                                            <label for="show_quantity_as"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Show quantity as'];?>
</label>

                                            <input type="text" class="form-control" id="show_quantity_as"
                                                   name="show_quantity_as"
                                                   value="<?php if ($_smarty_tpl->tpl_vars['config']->value['show_quantity_as'] == '') {
echo $_smarty_tpl->tpl_vars['_L']->value['Qty'];
} else {
echo $_smarty_tpl->tpl_vars['config']->value['show_quantity_as'];
}?>">

                                        </div>

                                        <?php if ($_smarty_tpl->tpl_vars['recurring']->value) {?>
                                            <div class="form-group">
                                                <label for="repeat"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Repeat Every'];?>
</label>

                                                <select class="form-control" name="repeat" id="repeat">
                                                    <option value="daily"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Daily'];?>
</option>
                                                    <option value="week1"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Weekly'];?>
</option>
                                                    <option value="weeks2"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Weeks_2'];?>
</option>
                                                    <option value="weeks3"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Weeks_3'];?>
</option>
                                                    <option value="weeks4"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Weeks_4'];?>
</option>
                                                    <option value="month1" selected><?php echo $_smarty_tpl->tpl_vars['_L']->value['Month'];?>
</option>
                                                    <option value="months2"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Months_2'];?>
</option>
                                                    <option value="months3"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Months_3'];?>
</option>
                                                    <option value="months6"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Months_6'];?>
</option>
                                                    <option value="year1"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Year'];?>
</option>
                                                    <option value="years2"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Years_2'];?>
</option>
                                                    <option value="years3"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Years_3'];?>
</option>

                                                </select>
                                            </div>
                                        <?php } else { ?>
                                            <input type="hidden" name="repeat" id="repeat" value="0">
                                        <?php }?>



                                                                                                                                                                                                                                                                                                                                                                                                                                          

                                                                                                                                                                                
                                        


                                    </div>
                                </div>


                                <?php if ($_smarty_tpl->tpl_vars['config']->value['tax_system'] == 'India') {?>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="duedate">GSTIN</label>
                                                <input type="text" class="form-control" id="business_number" name="business_number">

                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="duedate">Place of Supply</label>
                                                <select id="place_of_supply" name="place_of_supply"
                                                        class="form-control">


                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['states']->value, 'state');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['state']->value) {
?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['state']->value['name'];?>
"
                                                            <?php if ($_smarty_tpl->tpl_vars['config']->value['business_location'] == $_smarty_tpl->tpl_vars['state']->value['name']) {?>
                                                                selected
                                                            <?php }?>
                                                            ><?php echo $_smarty_tpl->tpl_vars['state']->value['name'];?>
</option>
                                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



                                                </select>

                                            </div>
                                        </div>


                                    </div>
                                <?php }?>


                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="idate"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Date'];?>
</label>

                                            <input type="text" class="form-control" id="idate" name="idate" datepicker
                                                   data-date-format="yyyy-mm-dd" data-auto-close="true"
                                                   value="<?php echo $_smarty_tpl->tpl_vars['idate']->value;?>
">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="duedate"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Payment Terms'];?>
</label>

                                            <select class="form-control" name="duedate" id="duedate">
                                                <option value="due_on_receipt" selected><?php echo $_smarty_tpl->tpl_vars['_L']->value['Due On Receipt'];?>
</option>
                                                <option value="days3"><?php echo $_smarty_tpl->tpl_vars['_L']->value['days_3'];?>
</option>
                                                <option value="days5"><?php echo $_smarty_tpl->tpl_vars['_L']->value['days_5'];?>
</option>
                                                <option value="days7"><?php echo $_smarty_tpl->tpl_vars['_L']->value['days_7'];?>
</option>
                                                <option value="days10"><?php echo $_smarty_tpl->tpl_vars['_L']->value['days_10'];?>
</option>
                                                <option value="days15"><?php echo $_smarty_tpl->tpl_vars['_L']->value['days_15'];?>
</option>
                                                <option value="days30"><?php echo $_smarty_tpl->tpl_vars['_L']->value['days_30'];?>
</option>
                                                <option value="days45"><?php echo $_smarty_tpl->tpl_vars['_L']->value['days_45'];?>
</option>
                                                <option value="days60"><?php echo $_smarty_tpl->tpl_vars['_L']->value['days_60'];?>
</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">

                                    </div>
                                </div>






                                <?php echo $_smarty_tpl->tpl_vars['extraHtml']->value;?>



                            </div>
                        </div>

                        <div>


                                                        
                                                                                                                                                                                                                                
                            
                            

                        </div>

                    </div>
                </div>


            </div>

            <div class="col-md-12">


                <?php if ($_smarty_tpl->tpl_vars['pos']->value == 'pos') {?>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="ib-search-bar" style="margin-bottom: 30px;">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="ib_search_input"
                                           placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Search'];?>
..." autofocus data-list=".list_pos_items"></div>
                            </div>

                            <hr>

                            <div id="block_items" class="list_pos_items">


                            </div>


                        </div>
                    </div>
                <?php }?>


                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="table-responsive m-t">

                            <?php if ($_smarty_tpl->tpl_vars['config']->value['tax_system'] == 'India') {?>
                                <table class="table table-bordered invoice-table" id="invoice_items">


                                    <thead>


                                    <tr>

                                        <th rowspan="2"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Item Name'];?>
</th>
                                        <th rowspan="2">HSN / SAC</th>
                                        <th rowspan="2"><?php if ($_smarty_tpl->tpl_vars['config']->value['show_quantity_as'] == '') {
echo $_smarty_tpl->tpl_vars['_L']->value['Qty'];
} else {
echo $_smarty_tpl->tpl_vars['config']->value['show_quantity_as'];
}?></th>
                                        <th rowspan="2"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Price'];?>
</th>

                                        <th colspan="2"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Discount'];?>
</th>

                                        <th rowspan="2" style="width: 80px;">Rate</th>

                                        <th colspan="3" class="text-center">
                                            Tax Values (Rs.)
                                        </th>

                                        <th rowspan="2"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total'];?>
</th>


                                    </tr>

                                    <tr>

                                        <th colspan="2">
                                            <label class="radio-inline">
                                                <input class="discountType" id="discountTypeP" type="radio" name="discount_type" value="p" checked>%
                                            </label>
                                            <label class="radio-inline">
                                                <input class="discountType" id="discountTypeF" type="radio" name="discount_type" value="f">Rs
                                            </label>
                                        </th>


                                        <th>CGST</th>
                                        <th>SGST</th>
                                        <th>IGST</th>

                                    </tr>

                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <textarea class="form-control item_name" name="desc[]" rows="3"></textarea>
                                            <input type="hidden" name="item_code[]" value=""></td>
                                        <td><input type="text" class="form-control tax_code" value="" name="tax_code[]"></td>
                                        <td><input type="text" class="form-control qty" value="" name="qty[]"></td>
                                        <td><input type="text" class="form-control item_price" name="amount[]" value="">
                                        <td colspan="2"><input type="text" class="form-control item_discount" name="discount[]" value="">
                                        </td>

                                        <td><select class="form-control taxed" name="taxed[]">
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['t']->value, 'ts');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ts']->value) {
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['ts']->value['rate'];?>
"
                                                            <?php if ($_smarty_tpl->tpl_vars['ts']->value['is_default'] == '1') {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['ts']->value['name'];?>
</option>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> </select></td>

                                        <td>
                                            <input type="text" class="form-control cgst" name="cgst[]" disabled value="">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control sgst" name="sgst[]" disabled value="">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control igst" name="igst[]" disabled value="">
                                        </td>

                                        <td class="ltotal"><input type="text" class="form-control lvtotal" readonly=""
                                                                  value=""></td>
                                    </tr>

                                    </tbody>
                                </table>

                                <?php } else { ?>

                                <table class="table table-bordered invoice-table" id="invoice_items">
                                    <thead>
                                    <tr>

                                        <th width="30%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Item Name'];?>
</th>
                                        <th width="10%"><?php if ($_smarty_tpl->tpl_vars['config']->value['show_quantity_as'] == '') {
echo $_smarty_tpl->tpl_vars['_L']->value['Qty'];
} else {
echo $_smarty_tpl->tpl_vars['config']->value['show_quantity_as'];
}?></th>
                                        <th width="15%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Price'];?>
</th>

                                        <th colspan="2"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Discount'];?>
</th>

                                        <th width="20%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Tax'];?>
</th>

                                        <th width="15%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total'];?>
</th>


                                    </tr>
                                    <tr>
                                        <th colspan="3"></th>
                                        <th colspan="2">
                                            <label class="radio-inline">
                                                <input class="discountType" id="discountTypeP" type="radio" name="discount_type" value="p" checked> <span  data-toggle="tooltip" data-placement="top" title="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Percentage'];?>
">%</span>
                                            </label>
                                            <label class="radio-inline">
                                                <input class="discountType" id="discountTypeF" type="radio" name="discount_type" value="f"> <span data-toggle="tooltip" data-placement="top" title="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Fixed Amount'];?>
" id="fixedDiscountText">
                                                    <?php if (isset($_smarty_tpl->tpl_vars['currencies']->value[$_smarty_tpl->tpl_vars['config']->value['home_currency']])) {?>
                                                        <?php echo $_smarty_tpl->tpl_vars['currencies']->value[$_smarty_tpl->tpl_vars['config']->value['home_currency']]['symbol'];?>

                                                        <?php } else { ?>

                                                    <?php }?>
                                                </span>
                                            </label>
                                        </th>
                                        <th colspan="2"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <textarea class="form-control item_name" name="desc[]" rows="3"></textarea>
                                            <input type="hidden" name="item_code[]" value=""></td>
                                        <td><input type="text" class="form-control qty" value="" name="qty[]"></td>
                                        <td><input type="text" class="form-control item_price" name="amount[]" value=""></td>
                                        <td colspan="2"><input type="text" class="form-control item_discount" name="discount[]" value="">
                                        </td>
                                        <td><select class="form-control taxed" name="taxed[]">
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['t']->value, 'ts');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ts']->value) {
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['ts']->value['rate'];?>
"
                                                            <?php if ($_smarty_tpl->tpl_vars['ts']->value['is_default'] == '1') {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['ts']->value['name'];?>
</option>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> </select></td>

                                        <td class="ltotal"><input type="text" class="form-control lvtotal" readonly=""
                                                                  value=""></td>
                                    </tr>

                                    </tbody>
                                </table>

                            <?php }?>


                        </div>
                        <!-- /table-responsive -->
                        <button type="button" class="btn btn-primary" id="blank-add"><i
                                    class="fa fa-plus"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Add blank Line'];?>
</button>
                        <button type="button" class="btn btn-primary" id="item-add"><i
                                    class="fa fa-search"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Product OR Service'];?>
</button>
                        <button type="button" class="btn btn-danger" id="item-remove"><i
                                    class="fa fa-minus-circle"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
</button>
                        <br>
                        <br>
                        <hr>

                        <table class="table invoice-total">
                            <tbody>
                            <tr>
                                <td><strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Sub Total'];?>
 :</strong></td>
                                <td id="sub_total" class="amount">0.00
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Discount'];?>
 <span id="is_pt"></span> : </strong>


                                </td>
                                <td id="discount_amount_total" class="amount">0.00
                                </td>
                            </tr>
                            <?php if ($_smarty_tpl->tpl_vars['config']->value['tax_system'] == 'default') {?>
                                <tr>
                                    <td><strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['TAX'];?>
 :</strong></td>
                                    <td id="taxtotal" class="amount">0.00
                                    </td>
                                </tr>

                            <?php } elseif ($_smarty_tpl->tpl_vars['config']->value['tax_system'] == 'ca_quebec') {?>

                                <div id="taxValTr">
                                    <tr>
                                        <td><strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['TAX'];?>
 :</strong></td>
                                        <td id="taxtotal" class="amount">0.00
                                        </td>
                                    </tr>
                                </div>


                            <?php } elseif ($_smarty_tpl->tpl_vars['config']->value['tax_system'] == 'India') {?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
                                <div id="taxValTr">
                                    <tr>
                                        <td><strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['TAX'];?>
 :</strong></td>
                                        <td id="taxtotal" class="amount">0.00
                                        </td>
                                    </tr>
                                </div>
                            <?php }?>
                            <tr>
                                <td><strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['TOTAL'];?>
 :</strong></td>
                                <td id="total" class="amount">0.00
                                </td>
                            </tr>
                            </tbody>
                        </table>


                        <hr>
                        <textarea class="form-control" name="notes" id="notes" rows="3"
                                  placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Terms'];?>
..."><?php echo $_smarty_tpl->tpl_vars['config']->value['invoice_terms'];?>
</textarea>
                        <br>
                        <?php if ($_smarty_tpl->tpl_vars['recurring']->value) {?>
                            <input type="hidden" id="is_recurring" value="yes">
                        <?php } else { ?>
                            <input type="hidden" id="is_recurring" value="no">
                        <?php }?>


                    </div>
                </div>


            </div>


        </form>


    </div>
        <input type="hidden" id="_lan_set_discount" value="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Set Discount'];?>
">
    <input type="hidden" id="_lan_discount" value="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Discount'];?>
">
    <input type="hidden" id="_lan_discount_type" value="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Discount Type'];?>
">
    <input type="hidden" id="_lan_percentage" value="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Percentage'];?>
">
    <input type="hidden" id="_lan_fixed_amount" value="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Fixed Amount'];?>
">
    <input type="hidden" id="_lan_btn_save" value="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
">
    <input type="hidden" id="_lan_no_results_found" value="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No results found'];?>
">
<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_14491059665c12ac9981de25_28393319 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_14491059665c12ac9981de25_28393319',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php if ($_smarty_tpl->tpl_vars['config']->value['edition'] == 't_event') {?>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/clockpicker/bootstrap-clockpicker.min.js"><?php echo '</script'; ?>
>
    <?php }?>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/mselect/multiple-select.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>

        var selectedCurrency = document.getElementById('currency');
        var selectedCurrencyDecimalMark;
        var selectedCurrencyThousandsSeparator;
        var selectedCurrencySymbol;


        function parseAmount(amount) {

            if(amount === '')
                {
                    return 0.00;
                }


            selectedCurrencyDecimalMark = selectedCurrency.options[selectedCurrency.selectedIndex].getAttribute('data-decimal-mark');
            selectedCurrencyThousandsSeparator = selectedCurrency.options[selectedCurrency.selectedIndex].getAttribute('data-thousands-separator');

            if(selectedCurrencyDecimalMark == ',')
                {
                    amount = amount.replace(/\./g, '').replace(',', '.');
                    amount = !isNaN(parseFloat(amount)) && isFinite(amount);
                }

                return parseFloat(amount).toFixed(2);

        }

        parseAmount(100);

        function calculatePercentage(amount,percentage) {
            return (amount)*(percentage/100);
        }

        var is_same_state = false;

        <?php if ($_smarty_tpl->tpl_vars['config']->value['tax_system'] == 'India') {?>

        var $place_of_supply = $('#place_of_supply');

        function taxState() {
            if($place_of_supply.val() == '<?php echo $_smarty_tpl->tpl_vars['config']->value['business_location'];?>
')
            {
                is_same_state = true;
            }
            else
            {
                is_same_state = false;
            }
        }


        taxState();





        <?php }?>

        String.prototype.trunc = String.prototype.trunc ||
            function (n) {
                return (this.length > n) ? this.substr(0, n - 1) + '&hellip;' : this;
            };

        $(document).ready(function () {

            $('[data-toggle="tooltip"]').tooltip();

            
                        
            

            <?php if ($_smarty_tpl->tpl_vars['config']->value['edition'] == 't_event') {?>
            $('.clockpicker').clockpicker({
                donetext: 'Done'
            });
            <?php }?>

            var c_qty;
            var c_price;
            var c_taxed;
            var c_discount;

            var lineTotal;
            var lineDiscount;

            var tax_val;

            var $discount_amount_total = $("#discount_amount_total");

            var $discount_amount = $("#discount_amount");
            var $discount_type = $("#discount_type");


            function spEditor(selector) {

                $(selector).redactor({
                    paragraphize: false,
                    replaceDivs: false,
                    linebreaks: true,
                    minHeight: 30 // pixels
                });

            }


            function spMultiSelect(selector) {
                /*
                $(selector).multiselect(
                    {
                        allSelectedText: false,
                        nonSelectedText: 'None'
                    }
                );
                */


            }

            spMultiSelect('.taxed');


            var $total = $("#total");
            var $taxtotal = $("#taxtotal");
            var $sub_total = $("#sub_total");

            var cDiscountVal = 0;

            var $invoice_items = $('#invoice_items');

            var invTotal = 0;

            var totalTaxVal = 0;


            var lineTotalWithoutTax;

            var totalLineTotalWithoutTax = 0;

            var discount_type = 'p';



            function calculateTotal() {

                discount_type = document.querySelector('.discountType:checked').value;

                invTotal = 0;

                totalTaxVal = 0;

                tax_val = 0;

                lineTotalWithoutTax = 0;

                totalLineTotalWithoutTax = 0;

                var c_taxed_split;

                <?php if ($_smarty_tpl->tpl_vars['config']->value['tax_system'] == 'India') {?>


                $.each($('.qty'), function (index, value) {

                    c_qty = this.value;

                    c_price = $(this).closest('tr').find('.item_price').val();




                    if (c_qty === '' || c_price === '') {
                        return;
                    }


                    c_taxed = $(this).closest('tr').find('.taxed').val();

                    c_taxed_split = (c_taxed/2).toFixed(2);

                    lineTotal = c_price * c_qty;
                    lineTotal = parseFloat(lineTotal);

                    lineTotalWithoutTax = lineTotal;

                    if (c_taxed === '' || c_taxed === null) {

                        tax_val = 0;

                    }
                    else {
                        c_taxed = parseFloat(c_taxed).toFixed(3);

                        tax_val = (lineTotal * c_taxed) / 100;



                      //  console.log(c_taxed);
                      //  console.log(lineTotal);

                        lineTotal = lineTotal + tax_val;
                    }

                    if(is_same_state)
                    {
                        $(this).closest('tr').find('.cgst').val(tax_val/2);
                        $(this).closest('tr').find('.sgst').val(tax_val/2);
                        $(this).closest('tr').find('.igst').val(0);
                    }
                    else
                    {
                        $(this).closest('tr').find('.cgst').val(0);
                        $(this).closest('tr').find('.sgst').val(0);
                        $(this).closest('tr').find('.igst').val(tax_val/2);
                    }



                    //  console.log(c_taxed);


                    $(this).closest('tr').find('.lvtotal').val(lineTotal.toFixed(2));


                    invTotal += lineTotal;

                    totalTaxVal += tax_val;

                    totalLineTotalWithoutTax += lineTotalWithoutTax;


                });


                if ($discount_type.val() === 'f' && $discount_amount.val() !== '') {
                    cDiscountVal = $discount_amount.val();
                }
                else if ($discount_type.val() === 'p' && $discount_amount.val() !== '') {
                    var tCDiscountval = parseFloat($discount_amount.val());
                    cDiscountVal = (invTotal * tCDiscountval) / 100;
                }
                else {

                }

                cDiscountVal = parseFloat(cDiscountVal);

                invTotal = invTotal - cDiscountVal;

                $total.html(invTotal.toFixed(2));
                $taxtotal.html(totalTaxVal.toFixed(2));
                $sub_total.html(totalLineTotalWithoutTax.toFixed(2));
                $discount_amount_total.html(cDiscountVal.toFixed(2));

                <?php } else { ?>




                $.each($('.qty'), function (index, value) {
//                    console.log(index);
//                    console.log(this.value);


                    c_qty = this.value;

                    c_price = $(this).closest('tr').find('.item_price').val();
                    c_price = parseAmount(c_price);

                    c_discount = $(this).closest('tr').find('.item_discount').val();
                    c_discount = parseAmount(c_discount);

                   // console.log(c_discount);


                    if (c_qty === '' || c_price === '') {
                        return;
                    }


                    c_taxed = $(this).closest('tr').find('.taxed').val();

                    //  console.log(c_taxed);



                    lineTotal = c_price * c_qty;
                    lineTotal = parseFloat(lineTotal);

                    lineTotalWithoutTax = lineTotal;

                    if(discount_type == 'p')
                    {
                        lineDiscount = calculatePercentage(lineTotal,c_discount);
                    }
                    else {
                        lineDiscount = c_discount;
                    }

                    // console.log(lineDiscount);

                    lineTotal = (lineTotal-lineDiscount);


                    if (c_taxed === '' || c_taxed === null) {

                        tax_val = 0;

                    }
                    else {
                        c_taxed = parseFloat(c_taxed).toFixed(3);

                        tax_val = (lineTotal * c_taxed) / 100;



                      //  console.log(c_taxed);
                      //  console.log(lineTotal);

                        lineTotal = lineTotal + tax_val;
                    }



                    $(this).closest('tr').find('.lvtotal').val(lineTotal.toFixed(2));


                    invTotal += lineTotal;

                    totalTaxVal += tax_val;

                    totalLineTotalWithoutTax += lineTotalWithoutTax;


                });


                if ($discount_type.val() === 'f' && $discount_amount.val() !== '') {
                    cDiscountVal = $discount_amount.val();
                }
                else if ($discount_type.val() === 'p' && $discount_amount.val() !== '') {
                    var tCDiscountval = parseFloat($discount_amount.val());
                    cDiscountVal = (invTotal * tCDiscountval) / 100;
                }
                else {

                }

                cDiscountVal = parseFloat(cDiscountVal);

               // console.log(cDiscountVal);

                invTotal = invTotal - cDiscountVal;

                $total.html(invTotal.toFixed(2));
                $taxtotal.html(totalTaxVal.toFixed(2));
                $sub_total.html(totalLineTotalWithoutTax.toFixed(2));
                $discount_amount_total.html(cDiscountVal.toFixed(2));

                <?php }?>



            }

            calculateTotal();

            <?php if ($_smarty_tpl->tpl_vars['config']->value['tax_system'] == 'India') {?>

            $place_of_supply.on('change',function () {

                taxState();
                calculateTotal();

            });

            <?php }?>


            $('#discountTypeP').change(function () {
                calculateTotal();
            });

            $('#discountTypeF').change(function () {
                calculateTotal();
            });

            var $currency = $('#currency');
            var $fixedDiscountText = $('#fixedDiscountText');

            $currency.on('change',function () {
                selectedCurrencySymbol = selectedCurrency.options[selectedCurrency.selectedIndex].getAttribute('data-symbol');
                $fixedDiscountText.html(selectedCurrencySymbol);
            });


            var $block_items = $("#block_items");

            var _url = $("#_url").val();

            $('.amount').autoNumeric('init');
            $('#notes').redactor(
                {
                    minHeight: 200, // pixels
                    plugins: ['fontcolor']
                }
            );


            spEditor('.item_name');


            $invoice_items.on('change', '.taxed', function () {
                //   $('#taxtotal').html('dd');
                // var taxrate = $('#stax').val().replace(',', '.');
                // $(this).val(taxrate);

                calculateTotal();


            });


            $invoice_items.on('change', '.qty', function () {

                calculateTotal();

            });

            $invoice_items.on('change', '.item_price', function () {

                calculateTotal();

            });

            $invoice_items.on('change', '.item_discount', function () {

                calculateTotal();

            });


            var item_remove = $('#item-remove');
            item_remove.hide();


            function update_address() {
                var _url = $("#_url").val();
                var cid = $('#cid').val();
                if (cid != '') {
                    $.post(_url + 'contacts/json-single-contact/', {
                        cid: cid

                    })
                        .done(function (data) {
                            var adrs = $("#address");

                            adrs.html(data.address_full);

                            if (document.getElementById('business_number')) {
                                $('#business_number').val(data.business_number);
                            }

                        });
                }

            }

            update_address();

            $('#cid').select2({
                theme: "bootstrap",
                language: {
                    noResults: function () {
                        return $("#_lan_no_results_found").val();
                    }
                }
            })
                .on("change", function (e) {
                    // mostly used event, fired to the original element when the value changes
                    // log("change val=" + e.val);
                    //  alert(e.val);

                    update_address();
                });


            <?php if ($_smarty_tpl->tpl_vars['config']->value['tax_system'] == 'India') {?>

            var $place_to_supply = $("#place_of_supply");

            $place_to_supply.select2({
                theme: "bootstrap",
                language: {
                    noResults: function () {
                        return $("#_lan_no_results_found").val();
                    }
                }
            })
                .on("change", function (e) {

                });
            <?php }?>


            item_remove.on('click', function () {
                $("#invoice_items tr.info").fadeOut(300, function () {
                    $(this).remove();

                });

            });

            var $modal = $('#ajax-modal');


            $('#item-add').on('click', function () {

                // create the backdrop and wait for next modal to be triggered
                $('body').modalmanager('loading');

                $modal.load(_url + 'ps/modal-list/', '', function () {
                    $modal.modal();
                });


            });

            /*
             / @since v 2.0
             */

            $('#contact_add').on('click', function (e) {
                e.preventDefault();
                // create the backdrop and wait for next modal to be triggered
                $('body').modalmanager('loading');

                $modal.load(_url + 'contacts/modal_add/', '', function () {
                    $modal.modal();
                    $("#ajax-modal .country").select2({
                        theme: "bootstrap"
                    });
                });
            });

            var rowNum = 0;

            $('#blank-add').on('click', function () {
                rowNum++;


                <?php if ($_smarty_tpl->tpl_vars['config']->value['tax_system'] == 'India') {?>

                $invoice_items.find('tbody')
                    .append(
                        '<tr>  <td><textarea class="form-control item_name" name="desc[]" rows="3" id="i_' + rowNum + '"></textarea> <input type="hidden" name="item_code[]" value=""> </td> <td><input type="text" class="form-control tax_code" value="" name="tax_code[]"></td>'  +
                        ' <td><input type="text" class="form-control qty" value="" name="qty[]"></td> <td><input type="text" class="form-control item_price" name="amount[]" value=""></td> <td colspan="2"><input type="text" class="form-control item_discount" name="discount[]" value=""></td>  <td> <select class="form-control taxed" name="taxed[]" id="t_' + rowNum + '"> <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['t']->value, 'ts');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ts']->value) {
?>  <option value="<?php echo $_smarty_tpl->tpl_vars['ts']->value['rate'];?>
" <?php if ($_smarty_tpl->tpl_vars['ts']->value['is_default'] == '1') {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['ts']->value['name'];?>
</option> <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> </select></td> <td>\n' +
                        '                                            <input type="text" class="form-control cgst" disabled name="cgst[]" value="">\n' +
                        '                                        </td>\n' +
                        '                                        <td>\n' +
                        '                                            <input type="text" class="form-control sgst" disabled name="sgst[]" value="">\n' +
                        '                                        </td>\n' +
                        '                                        <td>\n' +
                        '                                            <input type="text" class="form-control igst" disabled name="igst[]" value="">\n' +
                        '                                        </td> <td class="ltotal"><input type="text" class="form-control lvtotal" readonly="" value=""></td>  </tr>'
                    );

                <?php } else { ?>

                $invoice_items.find('tbody')
                    .append(
                        '<tr>  <td><textarea class="form-control item_name" name="desc[]" rows="3" id="i_' + rowNum + '"></textarea> <input type="hidden" name="item_code[]" value=""> </td> <td><input type="text" class="form-control qty" value="" name="qty[]"></td> <td><input type="text" class="form-control item_price" name="amount[]" value=""></td> <td colspan="2"><input type="text" class="form-control item_discount" name="discount[]" value=""></td>  <td> <select class="form-control taxed" name="taxed[]" id="t_' + rowNum + '"> <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['t']->value, 'ts');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ts']->value) {
?>  <option value="<?php echo $_smarty_tpl->tpl_vars['ts']->value['rate'];?>
" <?php if ($_smarty_tpl->tpl_vars['ts']->value['is_default'] == '1') {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['ts']->value['name'];?>
</option> <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> </select></td> <td class="ltotal"><input type="text" class="form-control lvtotal" readonly="" value=""></td>  </tr>'
                    );

                <?php }?>



                spEditor('#i_' + rowNum);


                spMultiSelect('#t_' + rowNum);

                //   calculateTotal();


            });

            $invoice_items.on('click', '.redactor-editor', function () {
                $("tr").removeClass("info");
                $(this).closest('tr').addClass("info");

                item_remove.show();
            });

            $modal.on('click', '.update', function () {
                var tableControl = document.getElementById('items_table');
                $modal.modal('loading');
                $modal.modal('loading');


                $('input:checkbox:checked', tableControl).each(function () {
                    rowNum++;
                    var item_code = $(this).closest('tr').find('td:eq(1)').text();
                    var item_name = $(this).closest('tr').find('td:eq(2)').text();

                    var item_price = $(this).closest('tr').find('td:eq(3)').text();

                    <?php if ($_smarty_tpl->tpl_vars['config']->value['tax_system'] == 'India') {?>

                    $invoice_items.find('tbody')
                        .append(
                            '<tr>  <td><textarea class="form-control item_name" name="desc[]" rows="3" id="i_' + rowNum + '">' + item_name + '</textarea> <input type="hidden" name="item_code[]" value="' + item_code + '"> </td> <td><input type="text" class="form-control tax_code" value="" name="tax_code[]"></td>'  +
                            ' <td><input type="text" class="form-control qty" value="1" name="qty[]"></td> <td><input type="text" class="form-control item_price" name="amount[]" value="' + item_price + '"></td> <td><input type="text" class="form-control item_discount" value="0.00" name="discount[]"></td>  <td> <select class="form-control taxed" name="taxed[]" id="t_' + rowNum + '"> <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['t']->value, 'ts');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ts']->value) {
?>  <option value="<?php echo $_smarty_tpl->tpl_vars['ts']->value['rate'];?>
" <?php if ($_smarty_tpl->tpl_vars['ts']->value['is_default'] == '1') {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['ts']->value['name'];?>
</option> <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> </select></td> <td>\n' +
                            '                                            <input type="text" class="form-control cgst" disabled name="cgst[]" value="">\n' +
                            '                                        </td>\n' +
                            '                                        <td>\n' +
                            '                                            <input type="text" class="form-control sgst" disabled name="sgst[]" value="">\n' +
                            '                                        </td>\n' +
                            '                                        <td>\n' +
                            '                                            <input type="text" class="form-control igst" disabled name="igst[]" value="">\n' +
                            '                                        </td> <td class="ltotal"><input type="text" class="form-control lvtotal" readonly="" value=""></td>  </tr>'
                        );

                    <?php } else { ?>

                    $invoice_items.find('tbody')
                        .append(
                            '<tr>  <td><textarea class="form-control item_name" name="desc[]" rows="3" id="i_' + rowNum + '">' + item_name + '</textarea> <input type="hidden" name="item_code[]" value="' + item_code + '"></td> <td><input type="text" class="form-control qty" value="1" name="qty[]"></td> <td><input type="text" class="form-control item_price" name="amount[]" value="' + item_price + '"></td>  <td> <select class="form-control taxed" name="taxed[]" id="t_' + rowNum + '"> <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['t']->value, 'ts');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ts']->value) {
?>  <option value="<?php echo $_smarty_tpl->tpl_vars['ts']->value['rate'];?>
" <?php if ($_smarty_tpl->tpl_vars['ts']->value['is_default'] == '1') {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['ts']->value['name'];?>
</option> <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> </select></td> <td class="ltotal"><input type="text" class="form-control lvtotal" readonly="" value=""></td>  </tr>'
                        );

                    <?php }?>



                    spEditor('#i_' + rowNum);

                    spMultiSelect('#t_' + rowNum);

                    calculateTotal();

                });

                //  console.debug(obj); // Write it to the console
                //  calculateTotal();


                $modal.modal('hide');

            });


            $modal.on('click', '.contact_submit', function (e) {
                e.preventDefault();
                //  var tableControl= document.getElementById('items_table');
                $modal.modal('loading');

                var _url = $("#_url").val();
                $.post(_url + 'contacts/add-post/', {


                    account: $('#account').val(),
                    company: $('#company').val(),
                    address: $('#m_address').val(),


                    city: $('#city').val(),
                    state: $('#state').val(),
                    zip: $('#zip').val(),
                    country: $('#country').val(),
                    phone: $('#phone').val(),
                    email: $('#email').val()

                })
                    .done(function (data) {

                        var _url = $("#_url").val();
                        if ($.isNumeric(data)) {

                            // location.reload();
                            var is_recurring = $('#is_recurring').val();
                            if (is_recurring == 'yes') {
                                window.location = _url + 'invoices/add/recurring/' + data + '/';
                            }
                            else {
                                window.location = _url + 'invoices/add/1/' + data + '/';
                            }

                        }
                        else {


                            $modal
                                .modal('loading')
                                .find('.modal-body')
                                .prepend('<div class="alert alert-danger fade in">' + data +
                                    '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                    '</div>');
                            //  $("#cid").select2('data', { id: newID, text: newText });
                        }
                    });


            });


            $("#add_discount").click(function (e) {
                e.preventDefault();
                var s_discount_amount = $('#discount_amount');
                var c_discount = s_discount_amount.val();
                var c_discount_type = $('#discount_type').val();
                var p_checked = "";
                var f_checked = "";
                if (c_discount_type == "p") {
                    p_checked = 'checked="checked"';
                } else {
                    f_checked = 'checked="checked"';
                }
                bootbox.dialog({
                        title: $("#_lan_set_discount").val(),
                        message: '<div class="row">  ' +
                        '<div class="col-md-12"> ' +
                        '<form class="form-horizontal" action="javascript:void(0);"> ' +
                        '<div class="form-group"> ' +
                        '<label class="col-md-4 control-label" for="set_discount">' + $("#_lan_discount").val() + '</label> ' +
                        '<div class="col-md-4"> ' +
                        '<input id="set_discount" name="set_discount" type="text" class="form-control input-md" value="' + c_discount + '"> ' +
                        '</div> ' +
                        '</div> ' +
                        '<div class="form-group"> ' +
                        '<label class="col-md-4 control-label" for="set_discount_type">' + $("#_lan_discount_type").val() + '</label> ' +
                        '<div class="col-md-4"> <div class="radio"> <label for="set_discount_type-0"> ' +
                        '<input type="radio" name="set_discount_type" id="set_discount_type-0" value="p" ' + p_checked + '> ' +
                        '' + $("#_lan_percentage").val() + ' (%) </label> ' +
                        '</div><div class="radio"> <label for="set_discount_type-1"> ' +
                        '<input type="radio" name="set_discount_type" id="set_discount_type-1" value="f" ' + f_checked + '> ' + $("#_lan_fixed_amount").val() + ' </label> ' +
                        '</div> ' +
                        '</div> </div>' +
                        '</form> </div>  </div>',
                        buttons: {
                            success: {
                                label: $("#_lan_btn_save").val(),
                                className: "btn-success",
                                callback: function () {
                                    var discount_amount = $('#set_discount').val();
                                    var discount_type = $("input[name='set_discount_type']:checked").val();
                                    $('#discount_amount').val(discount_amount);
                                    $('#discount_type').val(discount_type);
                                    calculateTotal();
                                    //updateTax();
                                    //updateTotal();
                                }
                            }
                        }
                    }
                );
            });


            $(".progress").hide();
            $("#emsg").hide();
            $("#submit").click(function (e) {
                e.preventDefault();
                $('#ibox_form').block({ message: null });
                var _url = $("#_url").val();
                $.post(_url + 'invoices/add-post/', $('#invform').serialize(), function (data) {

                    var _url = $("#_url").val();
                    if ($.isNumeric(data)) {

                        window.location = _url + 'invoices/edit/' + data + '/';
                    }
                    else {
                        $('#ibox_form').unblock();
                        var body = $("html, body");
                        body.animate({ scrollTop: 0 }, '1000', 'swing');
                        $("#emsgbody").html(data);
                        $("#emsg").show("slow");
                    }
                });
            });


            $("#save_n_close").click(function (e) {
                e.preventDefault();
                $('#ibox_form').block({ message: null });
                var _url = $("#_url").val();
                $.post(_url + 'invoices/add-post/', $('#invform').serialize(), function (data) {

                    var _url = $("#_url").val();
                    if ($.isNumeric(data)) {

                        window.location = _url + 'invoices/view/' + data + '/';
                    }
                    else {
                        $('#ibox_form').unblock();
                        var body = $("html, body");
                        body.animate({ scrollTop: 0 }, '1000', 'swing');
                        $("#emsgbody").html(data);
                        $("#emsg").show("slow");
                    }
                });
            });


            <?php if ($_smarty_tpl->tpl_vars['pos']->value == 'pos') {?>

            function loadItems() {

                $block_items.html(block_msg);

                var item_name;

                $.getJSON(base_url + "items/all/", function (data) {
                    var items = "";
                    var b_p;
                    $.each(data, function (key, val) {

                        item_name = val.name;

                        item_name = item_name.trunc(12);


                        var image;

                        if(val.image == '') {
                            image = '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/imgs/item_placeholder.png';
                        }
                        else{
                            image = '/storage/items/thumb'+ val.image;
                        }


                        b_p = '<div class="col-lg-2 col-md-2 col-sm-3 col-xs-4"><div class="pos_item text-center" id="pos_item_'+ val.id +'" data-pos-item-name="'+val.name+'" data-pos-item-price="'+val.sales_price+'" data-id="'+ val.id +'" data-pos-item-number="'+ val.item_number +'"><img src="'+ image +'" alt="'+ item_name +'" class="img-circle"><hr>'+ item_name +' <br>'+ val.sales_price +'  <hr></div> </div>';

                        items = items + b_p;
                    });

                    $block_items.html(items);

                    $('#ib_search_input').hideseek({
                        highlight: true
                    });

                });

            }

            loadItems();

            var pos_item_name, pos_item_price, pos_item_id, pos_item_number;

            var item_sl = 1;

            $block_items.on('click', '.pos_item', function () {

                pos_item_number = $(this).data('pos-item-number');
                pos_item_name = $(this).data('pos-item-name');
                pos_item_price = $(this).data('pos-item-price');
                pos_item_id = $(this).data('id');


                $invoice_items.find('tbody')
                    .prepend(
                        '<tr>  <td><textarea class="form-control item_name" name="desc[]" rows="3" id="i_' + item_sl + '">' + pos_item_name + '</textarea> <input type="hidden" name="item_code[]" value="' + pos_item_number + '"></td> <td><input type="text" class="form-control qty" value="1" name="qty[]"></td> <td><input type="text" class="form-control item_price" name="amount[]" value="' + pos_item_price + '"></td>  <td> <select class="form-control taxed" name="taxed[]" id="t_' + rowNum + '"> <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['t']->value, 'ts');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ts']->value) {
?>  <option value="<?php echo $_smarty_tpl->tpl_vars['ts']->value['rate'];?>
" <?php if ($_smarty_tpl->tpl_vars['ts']->value['is_default'] == '1') {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['ts']->value['name'];?>
</option> <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> </select></td> <td class="ltotal"><input type="text" class="form-control lvtotal" readonly="" value=""></td>  </tr>>'
                    );

                spEditor('#i_' + pos_item_id);


                spMultiSelect('#t_' + rowNum);

                calculateTotal();

                item_sl = item_sl + 1;


            });



            <?php }?>

        });
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
