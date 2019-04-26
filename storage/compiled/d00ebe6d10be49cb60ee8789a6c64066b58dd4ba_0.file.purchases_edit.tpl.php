<?php
/* Smarty version 3.1.33, created on 2018-11-29 15:15:02
  from '/Users/razib/Documents/valet/suite/ui/theme/default/purchases_edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c0048c621b556_05405182',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd00ebe6d10be49cb60ee8789a6c64066b58dd4ba' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/purchases_edit.tpl',
      1 => 1543453728,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c0048c621b556_05405182 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>






<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6245229445c0048c61c9174_66636459', "style");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17594361525c0048c61ccca2_83071066', "content");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3120214145c0048c620c837_05312861', 'script');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "style"} */
class Block_6245229445c0048c61c9174_66636459 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'style' => 
  array (
    0 => 'Block_6245229445c0048c61c9174_66636459',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/mselect/multiple-select.css" rel="stylesheet">


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
        .pos_item{
            background: #f3f6f9;
            cursor: pointer;
        }
        .pos_item:hover{
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
class Block_17594361525c0048c61ccca2_83071066 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_17594361525c0048c61ccca2_83071066',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Users/razib/Documents/valet/suite/vendor/smarty/smarty/libs/plugins/modifier.replace.php','function'=>'smarty_modifier_replace',),));
?>

    <div class="row" id="ibox_form">


        <div class="col-md-12">
            <h3 class="ibilling-page-header"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Purchase'];?>
 <?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice'];?>
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

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="subject"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Subject'];?>
</label>
                                        <input type="text" class="form-control" name="subject" id="subject" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['subject'];?>
">

                                    </div>
                                    <hr>
                                </div>

                                <div class='row'>
                                    <div class="col-sm-6">
                                        <h3><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice'];?>
 - <?php echo $_smarty_tpl->tpl_vars['d']->value['invoicenum'];
if ($_smarty_tpl->tpl_vars['d']->value['cn'] != '') {?> <?php echo $_smarty_tpl->tpl_vars['d']->value['cn'];?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
 <?php }?></h3>
                                    </div>
                                    <div class='col-sm-6'>
                                        <div class="text-right">

                                            <input type="hidden" name="iid" id="iid" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
">
                                            <input type="hidden" id="_dec_point" name="_dec_point" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['dec_point'];?>
">
                                            <button class="btn btn-primary" id="submit"> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
                                            <button class="btn btn-info" id="save_n_close"> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Save n Close'];?>
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
                                                            <?php if ($_smarty_tpl->tpl_vars['i']->value['userid'] == ($_smarty_tpl->tpl_vars['cs']->value['id'])) {?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['cs']->value['account'];?>
 <?php if ($_smarty_tpl->tpl_vars['cs']->value['email'] != '') {?>- <?php echo $_smarty_tpl->tpl_vars['cs']->value['email'];
}?></option>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                            </select>

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
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['currencies']->value, 'currency');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['currency']->value) {
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['currency']->value['iso_code'];?>
"
                                                            <?php if ($_smarty_tpl->tpl_vars['i']->value['currency_iso_code'] == ($_smarty_tpl->tpl_vars['currency']->value['cname'])) {?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['currency']->value['cname'];?>
</option>
                                                    <?php
}
} else {
?>
                                                    <option value="0"><?php echo $_smarty_tpl->tpl_vars['config']->value['home_currency'];?>
</option>
                                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                            </select>

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

                                            <input type="text" class="form-control" id="invoicenum" name="invoicenum" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['invoicenum'];?>
">
                                        </div>

                                        <div class="form-group">
                                            <label for="cn"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice'];?>
 #</label>

                                            <input type="text" class="form-control" id="cn" name="cn" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['cn'];?>
">
                                            <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['invoice_number_help'];?>
</span>
                                        </div>

                                    </div>
                                    <div class='col-sm-4'>
                                        <?php if ($_smarty_tpl->tpl_vars['config']->value['invoice_receipt_number'] == '1') {?>
                                            <div class="form-group">
                                                <label for="receipt_number"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Receipt Number'];?>
</label>

                                                <input type="text" class="form-control" id="receipt_number" name="receipt_number" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['receipt_number'];?>
">
                                            </div>
                                        <?php } else { ?>
                                            <input type="hidden" name="receipt_number" id="receipt_number" value="">
                                        <?php }?>

                                        <div class="form-group">
                                            <label for="show_quantity_as"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Show quantity as'];?>
</label>

                                            <input type="text" class="form-control" id="show_quantity_as" name="show_quantity_as" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['show_quantity_as'];?>
">

                                        </div>

                                        <?php if ($_smarty_tpl->tpl_vars['i']->value['r'] != '0') {?>
                                            <div class="form-group">
                                                <label for="repeat"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Repeat Every'];?>
</label>

                                                <select class="form-control" name="repeat" id="repeat">
                                                    <option value="week1" <?php if ($_smarty_tpl->tpl_vars['i']->value['r'] == '+1 week') {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Week'];?>
</option>
                                                    <option value="weeks2" <?php if ($_smarty_tpl->tpl_vars['i']->value['r'] == '+2 weeks') {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Weeks_2'];?>
</option>
                                                    <option value="month1" <?php if ($_smarty_tpl->tpl_vars['i']->value['r'] == '+1 month') {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Month'];?>
</option>
                                                    <option value="months2" <?php if ($_smarty_tpl->tpl_vars['i']->value['r'] == '+2 months') {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Months_2'];?>
</option>
                                                    <option value="months3" <?php if ($_smarty_tpl->tpl_vars['i']->value['r'] == '+3 months') {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Months_3'];?>
</option>
                                                    <option value="months6" <?php if ($_smarty_tpl->tpl_vars['i']->value['r'] == '+6 months') {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Months_6'];?>
</option>
                                                    <option value="year1" <?php if ($_smarty_tpl->tpl_vars['i']->value['r'] == '+1 year') {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Year'];?>
</option>
                                                    <option value="years2" <?php if ($_smarty_tpl->tpl_vars['i']->value['r'] == '+2 years') {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Years_2'];?>
</option>
                                                    <option value="years3" <?php if ($_smarty_tpl->tpl_vars['i']->value['r'] == '+3 years') {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Years_3'];?>
</option>

                                                </select>
                                            </div>
                                        <?php } else { ?>
                                            <input type="hidden" name="repeat" id="repeat" value="0">
                                        <?php }?>

                                        <div class="form-group">
                                            <label for="add_discount"><a href="#" id="add_discount" class="btn btn-info btn-xs"
                                                                         style="margin-top: 5px;"><i
                                                            class="fa fa-minus-circle"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Set Discount'];?>
</a></label>
                                            <br>


                                            <input type="hidden" id="stax" name="stax" value="0.00">
                                            <input type="hidden" id="discount_amount" name="discount_amount"
                                                   value="<?php echo $_smarty_tpl->tpl_vars['i']->value['discount_value'];?>
">
                                            <input type="hidden" id="discount_type" name="discount_type"
                                                   value="<?php echo $_smarty_tpl->tpl_vars['i']->value['discount_type'];?>
">
                                            <input type="hidden" id="taxed_type" name="taxed_type" value="individual">

                                        </div>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="idate"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Date'];?>
</label>

                                            <input type="text" class="form-control" id="idate" name="idate" datepicker
                                                   data-date-format="yyyy-mm-dd" data-auto-close="true"
                                                   value="<?php echo $_smarty_tpl->tpl_vars['i']->value['date'];?>
"">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">

                                    </div>
                                    <div class="col-sm-4">
                                        <input type="hidden" id="ddate" name="ddate" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['duedate'];?>
">
                                    </div>
                                </div>

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
                                    <input type="text" class="form-control" id="ib_search_input" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Search'];?>
..." autofocus data-list=".list_pos_items"> </div>
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
                            <table class="table invoice-table" id="invoice_items">
                                <thead>
                                <tr>

                                    <th width="40%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Item Name'];?>
</th>
                                    <th width="10%"><?php if ($_smarty_tpl->tpl_vars['i']->value['show_quantity_as'] == '' || $_smarty_tpl->tpl_vars['i']->value['show_quantity_as'] == '1') {
echo $_smarty_tpl->tpl_vars['_L']->value['Qty'];
} else {
echo $_smarty_tpl->tpl_vars['i']->value['show_quantity_as'];
}?></th>
                                    <th width="15%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Price'];?>
</th>

                                    <th width="20%">Tax</th>

                                    <th width="15%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total'];?>
</th>


                                </tr>
                                </thead>
                                <tbody>

                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>

                                    <tr>  <td>
                                            <textarea class="form-control item_name" name="desc[]" rows="3"><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
</textarea>
                                            <input type="hidden" name="item_code[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['itemcode'];?>
"> </td> <td><input type="text" class="form-control qty" value="<?php if (($_smarty_tpl->tpl_vars['config']->value['dec_point']) == ',') {
echo smarty_modifier_replace($_smarty_tpl->tpl_vars['item']->value['qty'],'.',',');
} else {
echo $_smarty_tpl->tpl_vars['item']->value['qty'];
}?>" name="qty[]"></td> <td><input type="text" class="form-control item_price" name="amount[]" value="<?php if (($_smarty_tpl->tpl_vars['config']->value['dec_point']) == ',') {
echo smarty_modifier_replace($_smarty_tpl->tpl_vars['item']->value['amount'],'.',',');
} else {
echo $_smarty_tpl->tpl_vars['item']->value['amount'];
}?>"></td>  <td> <select class="form-control taxed" name="taxed[]" >
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['t']->value, 'ts');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ts']->value) {
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['ts']->value['rate'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['tax_rate'] == $_smarty_tpl->tpl_vars['ts']->value['rate']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['ts']->value['name'];?>
</option>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> </select></td>

                                        <td class="ltotal"><input type="text" class="form-control lvtotal" readonly="" value=""></td>
                                    </tr>

                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                                </tbody>
                            </table>

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
                            <tr>
                                <td><strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['TAX'];?>
 :</strong></td>
                                <td id="taxtotal" class="amount">0.00
                                </td>
                            </tr>
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
                                  placeholder="Supplier Notes..."><?php echo $_smarty_tpl->tpl_vars['i']->value['notes'];?>
</textarea>
                        <br>
                                                                                                                        



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
/* {block 'script'} */
class Block_3120214145c0048c620c837_05312861 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_3120214145c0048c620c837_05312861',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/mselect/multiple-select.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>

        String.prototype.trunc = String.prototype.trunc ||
            function(n){
                return (this.length > n) ? this.substr(0, n-1) + '&hellip;' : this;
            };

        $(document).ready(function () {

            
                        
            

            var c_qty;
            var c_price;
            var c_taxed;

            var lineTotal;

            var tax_val;

            var $discount_amount_total = $("#discount_amount_total");

            var $discount_amount = $("#discount_amount");
            var $discount_type  = $("#discount_type");


            function spEditor(selector) {

                $(selector).redactor({
                    paragraphize: false,
                    replaceDivs: false,
                    linebreaks: true ,
                    minHeight: 30 // pixels
                });

            }


            function spMultiSelect(selector){
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


            function calculateTotal() {




                var invTotal = 0;

                var totalTaxVal = 0;

                var tax_val;

                var lineTotalWithoutTax;

                var totalLineTotalWithoutTax = 0;






                $.each( $('.qty'), function( index, value ) {
//                    console.log(index);
//                    console.log(this.value);

                    c_qty = this.value;

                    c_price = $(this).closest('tr').find('.item_price').val();

                    if(c_qty === '' || c_price === ''){
                        return;
                    }


                    c_taxed = $(this).closest('tr').find('.taxed').val();

                    console.log(c_taxed);

                    lineTotal = c_price*c_qty;
                    lineTotal = parseFloat(lineTotal);

                    lineTotalWithoutTax = lineTotal;

                    if(c_taxed === '' || c_taxed === null){

                        tax_val = 0;

                    }
                    else{
                        c_taxed = parseFloat(c_taxed).toFixed(3);

                        tax_val = (lineTotal*c_taxed)/100;

                        console.log(tax_val);
                        console.log(lineTotal);

                        lineTotal = lineTotal + tax_val;
                    }



                    $(this).closest('tr').find('.lvtotal').val(lineTotal.toFixed(2));


                    invTotal += lineTotal;

                    totalTaxVal += tax_val;

                    totalLineTotalWithoutTax += lineTotalWithoutTax;


                });


                if($discount_type.val() === 'f' && $discount_amount.val() !== ''){
                    cDiscountVal = $discount_amount.val();
                }
                else if($discount_type.val() === 'p' && $discount_amount.val() !== ''){
                    var tCDiscountval = parseFloat($discount_amount.val());
                    cDiscountVal = (invTotal*tCDiscountval)/100;
                }
                else{

                }

                cDiscountVal = parseFloat(cDiscountVal);

                invTotal = invTotal-cDiscountVal;

                $total.html(invTotal.toFixed(2));
                $taxtotal.html(totalTaxVal.toFixed(2));
                $sub_total.html(totalLineTotalWithoutTax.toFixed(2));
                $discount_amount_total.html(cDiscountVal.toFixed(2));


            }

            calculateTotal();









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






            $invoice_items.on('change', '.taxed', function(){
                //   $('#taxtotal').html('dd');
                // var taxrate = $('#stax').val().replace(',', '.');
                // $(this).val(taxrate);

                calculateTotal();


            });


            $invoice_items.on('change', '.qty', function(){

                calculateTotal();

            });

            $invoice_items.on('change', '.item_price', function(){

                calculateTotal();

            });



            var item_remove = $('#item-remove');
            item_remove.hide();




            function update_address(){
                var _url = $("#_url").val();
                var cid = $('#cid').val();
                if(cid != ''){
                    $.post(_url + 'contacts/render-address/', {
                        cid: cid

                    })
                        .done(function (data) {
                            var adrs = $("#address");


                            adrs.html(data);

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
                .on("change", function(e) {
                    // mostly used event, fired to the original element when the value changes
                    // log("change val=" + e.val);
                    //  alert(e.val);

                    update_address();
                });






            item_remove.on('click', function(){
                $("#invoice_items tr.info").fadeOut(300, function(){
                    $(this).remove();

                });

            });

            var $modal = $('#ajax-modal');



            $('#item-add').on('click', function(){

                // create the backdrop and wait for next modal to be triggered
                $('body').modalmanager('loading');

                $modal.load( _url + 'ps/modal-list/', '', function(){
                    $modal.modal();
                });


            });

            /*
             / @since v 2.0
             */

            $('#contact_add').on('click', function(e){
                e.preventDefault();
                // create the backdrop and wait for next modal to be triggered
                $('body').modalmanager('loading');

                $modal.load( _url + 'contacts/modal_add/', '', function(){
                    $modal.modal();
                    $("#ajax-modal .country").select2({
                        theme: "bootstrap"
                    });
                });
            });

            var rowNum = 0;

            $('#blank-add').on('click', function(){
                rowNum++;
//                $invoice_items.find('tbody')
//                    .append(
//                        '<tr>  <td><textarea class="form-control item_name" name="desc[]" rows="3" id="i_' + rowNum + '"></textarea><input type="hidden" name="item_code[]" value=""></td> <td><input type="text" class="form-control qty" value="" name="qty[]"></td> <td><input type="text" class="form-control item_price" name="amount[]" value=""></td> <td class="ltotal"><input type="text" class="form-control lvtotal" readonly value=""></td> <td> <select class="form-control taxed" name="taxed[]"> <option value="Yes">Yes</option> <option value="No" selected>No</option></select></td></tr>'
//                    );



                $invoice_items.find('tbody')
                    .append(
                        '<tr>  <td><textarea class="form-control item_name" name="desc[]" rows="3" id="i_' + rowNum + '"></textarea> <input type="hidden" name="item_code[]" value=""> </td> <td><input type="text" class="form-control qty" value="" name="qty[]"></td> <td><input type="text" class="form-control item_price" name="amount[]" value=""></td>  <td> <select class="form-control taxed" name="taxed[]" id="t_' + rowNum + '"> <?php
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


                spEditor('#i_' + rowNum);



                spMultiSelect('#t_' + rowNum);

                //   calculateTotal();


            });

            $invoice_items.on('click', '.redactor-editor', function(){
                $("tr").removeClass("info");
                $(this).closest('tr').addClass("info");

                item_remove.show();
            });

            $modal.on('click', '.update', function(){
                var tableControl= document.getElementById('items_table');
                $modal.modal('loading');
                $modal.modal('loading');
                //$modal
                //    .modal('loading')
                //    .find('.modal-body')
                //    .prepend('<div class="alert alert-info fade in">' +
                //    'Updated!<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                //    '</div>');


                //  input type="text" class="form-control item_name" name="desc[]" value="' + item_name + '">
                // var obj = new Array();

                $('input:checkbox:checked', tableControl).each(function() {
                    rowNum++;
                    var item_code = $(this).closest('tr').find('td:eq(1)').text();
                    var item_name = $(this).closest('tr').find('td:eq(2)').text();

                    var item_price = $(this).closest('tr').find('td:eq(3)').text();



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

                    spEditor('#i_' + rowNum);

                    spMultiSelect('#t_' + rowNum);

                    calculateTotal();

                });

                //  console.debug(obj); // Write it to the console
                //  calculateTotal();


                $modal.modal('hide');

            });


            $modal.on('click', '.contact_submit', function(e){
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
                            if(is_recurring == 'yes'){
                                window.location = _url + 'invoices/add/recurring/' + data + '/';
                            }
                            else{
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
                            $("#cid").select2('data', { id: newID, text: newText });
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
                if( c_discount_type == "p" ){
                    p_checked = 'checked="checked"';
                }else{
                    f_checked = 'checked="checked"';
                }
                bootbox.dialog({
                        title: $("#_lan_set_discount").val(),
                        message: '<div class="row">  ' +
                        '<div class="col-md-12"> ' +
                        '<form class="form-horizontal" action="javascript:void(0);"> ' +
                        '<div class="form-group"> ' +
                        '<label class="col-md-4 control-label" for="set_discount">' + $("#_lan_discount").val() +'</label> ' +
                        '<div class="col-md-4"> ' +
                        '<input id="set_discount" name="set_discount" type="text" class="form-control input-md" value="' + c_discount + '"> ' +
                        '</div> ' +
                        '</div> ' +
                        '<div class="form-group"> ' +
                        '<label class="col-md-4 control-label" for="set_discount_type">' + $("#_lan_discount_type").val() +'</label> ' +
                        '<div class="col-md-4"> <div class="radio"> <label for="set_discount_type-0"> ' +
                        '<input type="radio" name="set_discount_type" id="set_discount_type-0" value="p" ' + p_checked + '> ' +
                        '' + $("#_lan_percentage").val() +' (%) </label> ' +
                        '</div><div class="radio"> <label for="set_discount_type-1"> ' +
                        '<input type="radio" name="set_discount_type" id="set_discount_type-1" value="f" ' + f_checked + '> ' + $("#_lan_fixed_amount").val() +' </label> ' +
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
                                    //calculateTotal();
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
                $.post(_url + 'purchases/edit-post/', $('#invform').serialize(), function(data){

                    var _url = $("#_url").val();
                    if ($.isNumeric(data)) {

                        window.location = _url + 'purchases/edit/' + data + '/';
                    }
                    else {
                        $('#ibox_form').unblock();
                        var body = $("html, body");
                        body.animate({ scrollTop:0 }, '1000', 'swing');
                        $("#emsgbody").html(data);
                        $("#emsg").show("slow");
                    }
                });
            });


            $("#save_n_close").click(function (e) {
                e.preventDefault();
                $('#ibox_form').block({ message: null });
                var _url = $("#_url").val();
                $.post(_url + 'purchases/edit-post/', $('#invform').serialize(), function(data){

                    var _url = $("#_url").val();
                    if ($.isNumeric(data)) {

                        window.location = _url + 'purchases/view/' + data + '/';
                    }
                    else {
                        $('#ibox_form').unblock();
                        var body = $("html, body");
                        body.animate({ scrollTop:0 }, '1000', 'swing');
                        $("#emsgbody").html(data);
                        $("#emsg").show("slow");
                    }
                });
            });


            <?php if ($_smarty_tpl->tpl_vars['pos']->value == 'pos') {?>

            function loadItems() {

                $block_items.html(block_msg);

                var item_name;

                $.getJSON( base_url + "items/all/", function( data ) {
                    var items = "";
                    var b_p;
                    $.each( data, function( key, val ) {

                        item_name = val.name;

                        item_name = item_name.trunc(12);


                        b_p = '<div class="col-lg-2 col-md-2 col-sm-3 col-xs-4"><div class="pos_item text-center" id="pos_item_'+ val.id +'" data-pos-item-name="'+val.name+'" data-pos-item-price="'+val.sales_price+'" data-id="'+ val.id +'" data-pos-item-number="'+ val.item_number +'"><img src="/storage/items/thumb'+ val.image +'" alt="'+ item_name +'" class="img-circle"><hr>'+ item_name +' <br>'+ val.sales_price +'  <hr></div> </div>';

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

            $block_items.on('click', '.pos_item', function(){

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

                item_sl = item_sl+1;


            });



            <?php }?>

        });
    <?php echo '</script'; ?>
>


<?php
}
}
/* {/block 'script'} */
}
