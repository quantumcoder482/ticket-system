{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content animated fadeInRight">
                <form id="invform" method="post">
                    <div class="ibox-content p-xl" id="ibox_form">
                        <div class="row">
                            <div class="alert alert-danger" id="emsg">
                                <span id="emsgbody"></span>
                            </div>
                            <div class="col-md-6">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label for="cid" class="col-sm-2 control-label">{$_L['Customer']}</label>

                                        <div class="col-sm-10">
                                            <select id="cid" name="cid" class="form-control">
                                                <option value="">{$_L['Select Contact']}...</option>
                                                {foreach $c as $cs}
                                                    <option value="{$cs['id']}"
                                                            {if $i['account'] eq $cs['account']}selected="selected" {/if}>{$cs['account']}</option>
                                                {/foreach}

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">{$_L['Address']}</label>

                                        <div class="col-sm-10">
                                            <textarea id="address" readonly class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="invoicenum"
                                               class="col-sm-2 control-label">{$_L['Invoice Prefix']}</label>

                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="invoicenum" name="invoicenum"
                                                   value="{$i['invoicenum']}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="cn"
                                               class="col-sm-2 control-label">{$_L['Invoice']} #</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="cn" name="cn" value="{$i['cn']}">
                                            <span class="help-block">{$_L['invoice_number_help']}</span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-horizontal">
                                    {if $i['r'] neq '0'}
                                        <div class="form-group">
                                            <label for="inputEmail3"
                                                   class="col-sm-4 control-label">{$_L['Repeat Every']}</label>

                                            <div class="col-sm-8">
                                                <select class="form-control" name="repeat" id="repeat">
                                                    <option value="daily" {if $i['r'] eq '+1 day'} selected{/if}>{$_L['Daily']}</option>
                                                    <option value="week1" {if $i['r'] eq '+1 week'} selected{/if}>{$_L['Week']}</option>
                                                    <option value="weeks2" {if $i['r'] eq '+2 weeks'} selected{/if}>{$_L['Weeks_2']}</option>
                                                    <option value="weeks3" {if $i['r'] eq '+3 weeks'} selected{/if}>{$_L['Weeks_3']}</option>
                                                    <option value="weeks4" {if $i['r'] eq '+4 weeks'} selected{/if}>{$_L['Weeks_4']}</option>
                                                    <option value="month1" {if $i['r'] eq '+1 month'} selected{/if}>{$_L['Month']}</option>
                                                    <option value="months2" {if $i['r'] eq '+2 months'} selected{/if}>{$_L['Months_2']}</option>
                                                    <option value="months3" {if $i['r'] eq '+3 months'} selected{/if}>{$_L['Months_3']}</option>
                                                    <option value="months6" {if $i['r'] eq '+6 months'} selected{/if}>{$_L['Months_6']}</option>
                                                    <option value="year1" {if $i['r'] eq '+1 year'} selected{/if}>{$_L['Year']}</option>
                                                    <option value="years2" {if $i['r'] eq '+2 years'} selected{/if}>{$_L['Years_2']}</option>
                                                    <option value="years3" {if $i['r'] eq '+3 years'} selected{/if}>{$_L['Years_3']}</option>

                                                </select>
                                            </div>
                                        </div>
                                    {else}
                                        <input type="hidden" name="repeat" id="repeat" value="0">
                                    {/if}
                                    <div class="form-group">
                                        <label for="inputEmail3"
                                               class="col-sm-4 control-label">{$_L['Invoice Date']}</label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="idate" name="idate" datepicker
                                                   data-date-format="yyyy-mm-dd" data-auto-close="true"
                                                   value="{$i['date']}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-4 control-label">{$_L['Due Date']}</label>

                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="ddate" name="ddate" datepicker
                                                   data-date-format="yyyy-mm-dd" data-auto-close="true"
                                                   value="{$i['duedate']}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tid" class="col-sm-4 control-label">{$_L['Sales TAX']}</label>

                                        <div class="col-sm-8">
                                            <select id="tid" name="tid" class="form-control">
                                                <option value="">None</option>
                                                {foreach $t as $ts}
                                                    <option value="{$ts['id']}"
                                                            {if $ts['name'] eq $i['taxname']}selected="selected" {/if} >{$ts['name']}
                                                        ({{number_format($ts['rate'],2,$config['dec_point'],$config['thousands_sep'])}}
                                                        %)
                                                    </option>
                                                {/foreach}

                                            </select>
                                            <input type="hidden" id="stax" name="stax" value="{$i['taxrate']}">
                                            <input type="hidden" id="discount_amount" name="discount_amount"
                                                   value="{$i['discount_value']}">
                                            <input type="hidden" id="discount_type" name="discount_type"
                                                   value="{$i['discount_type']}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="add_discount"
                                               class="col-sm-4 control-label">{$_L['Discount']}</label>

                                        <div class="col-sm-8">

                                            <a href="#" id="add_discount" class="btn btn-info btn-xs"
                                               style="margin-top: 5px;"><i
                                                        class="fa fa-minus-circle"></i> {$_L['Set Discount']}</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="table-responsive m-t">
                            <table class="table invoice-table" id="invoice_items">
                                <thead>
                                <tr>
                                    <th width="10%">{$_L['Item Code']}</th>
                                    <th width="55%">{$_L['Item Name']}</th>
                                    <th width="10%">{$_L['Qty']}</th>
                                    <th width="10%">{$_L['Price']}</th>
                                    <th width="15%">{$_L['Total']}</th>
                                    {*<th width="10%">Tax</th>*}
                                </tr>
                                </thead>
                                <tbody>
                                {foreach $items as $item}
                                    <tr>
                                        <td>{$item['itemcode']}</td>
                                        <td><input type="text" class="form-control item_name" name="desc[]"
                                                   value="{$item['description']}"></td>
                                        <td><input type="text" class="form-control qty"
                                                   value="{if ($config['dec_point']) eq ','}{$item['qty']|replace:'.':','}{else}{$item['qty']}{/if}"
                                                   name="qty[]"></td>
                                        <td><input type="text" class="form-control item_price" name="amount[]"
                                                   value="{if ($config['dec_point']) eq ','}{$item['amount']|replace:'.':','}{else}{$item['amount']}{/if}">
                                        </td>
                                        <td class="ltotal"><input type="text" class="form-control lvtotal" readonly=""
                                                                  value="{if ($config['dec_point']) eq ','}{{$item['total']}|replace:'.':','}{else}{{$item['total']}}{/if}">
                                        </td>
                                    </tr>
                                {/foreach}

                                {*  ======   <td> <select class="form-control taxed" name="taxed[]"> <option value="Yes" {if $item['taxed'] eq '1'}selected{/if}>Yes</option> <option value="No" {if $item['taxed'] eq '0'}selected{/if}>No</option></select></td>*}
                                {*<tr>*}
                                {*<td>PS 1000</td>*}
                                {*<td><div><strong>Angular JS &amp; Node JS Application</strong></div></td>*}
                                {*<td>*}
                                {*<textarea class="form-control" rows="3"></textarea></td>*}
                                {*<td><input type="text" class="form-control" placeholder="Text input"></td>*}
                                {*<td><input type="text" class="form-control" placeholder="Text input"></td>*}
                                {*<td><input type="text" class="form-control" placeholder="Text input"></td>*}
                                {*<td>$1033.20</td>*}
                                {*<td>Yes</td>*}
                                {*</tr>*}

                                </tbody>
                            </table>

                        </div>
                        <!-- /table-responsive -->
                        <button type="button" class="btn btn-primary" id="blank-add"><i class="fa fa-plus"></i> {$_L['Add blank Line']}
                        </button>
                        <button type="button" class="btn btn-primary" id="item-add"><i class="fa fa-search"></i> {$_L['Add Product OR Service']}
                        </button>
                        <button type="button" class="btn btn-danger" id="item-remove"><i class="fa fa-minus-circle"></i>
                            {$_L['Delete']}
                        </button>
                        <table class="table invoice-total">
                            <tbody>
                            <tr>
                                <td><strong>{$_L['Sub Total']} :</strong></td>
                                <td id="sub_total" class="amount" data-a-sign="" data-a-dec="{$config['dec_point']}"
                                    data-a-sep="" data-d-group="2">0.00
                                </td>
                            </tr>

                            <tr>
                                <td><strong>{$_L['Discount']} <span id="is_pt"></span> :</strong></td>
                                <td id="discount_amount_total" class="amount" data-a-sign="" data-a-dec="{$config['dec_point']}"
                                    data-a-sep="" data-d-group="2">0.00
                                </td>
                            </tr>


                            <tr>
                                <td><strong>{$_L['TAX']} :</strong></td>
                                <td id="taxtotal" class="amount" data-a-sign="" data-a-dec="{$config['dec_point']}"
                                    data-a-sep="" data-d-group="2">0.00
                                </td>
                            </tr>
                            <tr>
                                <td><strong>{$_L['TOTAL']} :</strong></td>
                                <td id="total" class="amount" data-a-sign="" data-a-dec="{$config['dec_point']}" data-a-sep=""
                                    data-d-group="2">0.00
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <textarea class="form-control" name="notes" id="notes" rows="3"
                                  placeholder="{$_L['Invoice Terms']}...">{$i['notes']}</textarea>
                        <br>

                        <div class="text-right">
                            <input type="hidden" name="iid" id="iid" value="{$i['id']}">
                            <input type="hidden" id="_dec_point" name="_dec_point" value="{$config['dec_point']}">
                            <button class="btn btn-primary" id="submit"><i class="fa fa-save"></i> {$_L['Save Invoice']}</button>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>

    {* lan variables *}

    <input type="hidden" id="_lan_set_discount" value="{$_L['Set Discount']}">
    <input type="hidden" id="_lan_discount" value="{$_L['Discount']}">
    <input type="hidden" id="_lan_discount_type" value="{$_L['Discount Type']}">
    <input type="hidden" id="_lan_percentage" value="{$_L['Percentage']}">
    <input type="hidden" id="_lan_fixed_amount" value="{$_L['Fixed Amount']}">
    <input type="hidden" id="_lan_btn_save" value="{$_L['Save']}">


{/block}