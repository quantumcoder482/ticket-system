{extends file="$layouts_admin"}

{block name="content"}

    <style>
        .pos_item{
            background: #f3f6f9;
            cursor: pointer;
        }
        .pos_item:hover{
            background: #2196f3;
            color: #ffffff;
        }
    </style>
    <div class="row" id="ibox_form">



        <form id="invform" method="post">
            <div class="col-md-12">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
            </div>

            {*<input type="text" class="form-control item_name" name="desc[]" value="">*}
            <div class="col-lg-9 col-md-8">

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="ib-search-bar" style="margin-bottom: 30px;">
                            <div class="input-group">
                                <input type="text" class="form-control" id="ib_search_input" placeholder="{$_L['Search']}..." autofocus> </div>
                        </div>

                        <hr>

                        <div id="block_items">




                        </div>



                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="table-responsive m-t">
                            <table class="table invoice-table" id="invoice_items">
                                <thead>
                                <tr>

                                    <th width="50%">{$_L['Item Name']}</th>
                                    <th width="10%">{if $config['show_quantity_as'] eq ''}{$_L['Qty']}{else}{$config['show_quantity_as']}{/if}</th>
                                    <th width="15%">{$_L['Price']}</th>
                                    <th width="15%">{$_L['Total']}</th>
                                    <th width="10%">Tax</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>  <td><textarea class="form-control item_name" name="desc[]" rows="3"></textarea><input type="hidden" name="item_code[]" value=""> </td> <td><input type="text" class="form-control qty" value="" name="qty[]"></td> <td><input type="text" class="form-control item_price" name="amount[]" value=""></td> <td class="ltotal"><input type="text" class="form-control lvtotal" readonly="" value=""></td> <td> <select class="form-control taxed" name="taxed[]"> <option value="Yes">{$_L['Yes']}</option> <option value="No" selected="">{$_L['No']}</option></select></td></tr>

                                </tbody>
                            </table>

                        </div>
                        <!-- /table-responsive -->
                        <button type="button" class="btn btn-primary" id="blank-add"><i
                                    class="fa fa-plus"></i> {$_L['Add blank Line']}</button>
                        <button type="button" class="btn btn-primary" id="item-add"><i
                                    class="fa fa-search"></i> {$_L['Add Product OR Service']}</button>
                        <button type="button" class="btn btn-danger" id="item-remove"><i
                                    class="fa fa-minus-circle"></i> {$_L['Delete']}</button>
                        <br>
                        <br>
                        <hr>
                        <textarea class="form-control" name="notes" id="notes" rows="3"
                                  placeholder="{$_L['Invoice Terms']}...">{$config['invoice_terms']}</textarea>
                        <br>
                        {if $recurring}
                            <input type="hidden" id="is_recurring" value="yes">
                        {else}
                            <input type="hidden" id="is_recurring" value="no">
                        {/if}




                    </div>
                </div>



            </div>

            <div class="col-lg-3 col-md-4">

                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="text-right">
                            <input type="hidden" id="_dec_point" name="_dec_point" value="{$config['dec_point']}">
                            <button class="btn btn-primary" id="submit"><i class="fa fa-save"></i> {$_L['Save Invoice']}</button>
                            <button class="btn btn-info" id="save_n_close"><i class="fa fa-check"></i> {$_L['Save n Close']}</button>

                        </div>

                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-body">

                        <table class="table invoice-total">
                            <tbody>
                            <tr>
                                <td><strong>{$_L['Sub Total']} :</strong></td>
                                <td id="sub_total" class="amount">0.00
                                </td>
                            </tr>
                            <tr>
                                <td><strong>{$_L['Discount']} <span id="is_pt"></span> :</strong></td>
                                <td id="discount_amount_total" class="amount">0.00
                                </td>
                            </tr>
                            <tr>
                                <td><strong>{$_L['TAX']} :</strong></td>
                                <td id="taxtotal" class="amount">0.00
                                </td>
                            </tr>
                            <tr>
                                <td><strong>{$_L['TOTAL']} :</strong></td>
                                <td id="total" class="amount">0.00
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-body">

                        <div>



                            <div class="form-group">
                                <label for="cid">{$_L['Customer']}</label>

                                <select id="cid" name="cid" class="form-control">
                                    <option value="">{$_L['Select Contact']}...</option>
                                    {foreach $c as $cs}
                                        <option value="{$cs['id']}"
                                                {if $p_cid eq ($cs['id'])}selected="selected" {/if}>{$cs['account']} {if $cs['email'] neq ''}- {$cs['email']}{/if}</option>
                                    {/foreach}

                                </select>
                                <span class="help-block"><a href="#"
                                                            id="contact_add">| {$_L['Or Add New Customer']}</a> </span>
                            </div>


                            <div class="form-group">
                                <label for="status">{$_L['Status']}</label>

                                <select id="status" name="status" class="form-control">

                                    <option value="Published">{$_L['Published']}</option>
                                    <option value="Draft">{$_L['Draft']}</option>


                                </select>

                            </div>

                            <div class="form-group">
                                <label for="currency">{$_L['Currency']}</label>

                                <select id="currency" name="currency" class="form-control">

                                    {foreach $currencies as $currency}
                                        <option value="{$currency['id']}"
                                                {if $config['home_currency'] eq ($currency['cname'])}selected="selected" {/if}>{$currency['cname']}</option>
                                        {foreachelse}
                                        <option value="0">{$config['home_currency']}</option>
                                    {/foreach}

                                </select>

                            </div>

                            {$extra_fields}

                            <div class="form-group">
                                <label for="address">{$_L['Address']}</label>

                                <textarea id="address" readonly class="form-control" rows="5"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="invoicenum">{$_L['Invoice Prefix']}</label>

                                <input type="text" class="form-control" id="invoicenum" name="invoicenum">
                            </div>

                            <div class="form-group">
                                <label for="cn">{$_L['Invoice']} #</label>

                                <input type="text" class="form-control" id="cn" name="cn">
                                <span class="help-block">{$_L['invoice_number_help']}</span>
                            </div>

                            <div class="form-group">
                                <label for="show_quantity_as">{$_L['Show quantity as']}</label>

                                <input type="text" class="form-control" id="show_quantity_as" name="show_quantity_as" value="{if $config['show_quantity_as'] eq ''}{$_L['Qty']}{else}{$config['show_quantity_as']}{/if}">

                            </div>

                            {if $recurring}
                                <div class="form-group">
                                    <label for="repeat">{$_L['Repeat Every']}</label>

                                    <select class="form-control" name="repeat" id="repeat">
                                        <option value="week1">{$_L['Week']}</option>
                                        <option value="weeks2">{$_L['Weeks_2']}</option>
                                        <option value="month1" selected>{$_L['Month']}</option>
                                        <option value="months2">{$_L['Months_2']}</option>
                                        <option value="months3">{$_L['Months_3']}</option>
                                        <option value="months6">{$_L['Months_6']}</option>
                                        <option value="year1">{$_L['Year']}</option>
                                        <option value="years2">{$_L['Years_2']}</option>
                                        <option value="years3">{$_L['Years_3']}</option>

                                    </select>
                                </div>
                            {else}
                                <input type="hidden" name="repeat" id="repeat" value="0">
                            {/if}

                            <div class="form-group">
                                <label for="idate">{$_L['Invoice Date']}</label>

                                <input type="text" class="form-control" id="idate" name="idate" datepicker
                                       data-date-format="yyyy-mm-dd" data-auto-close="true"
                                       value="{$idate}">
                            </div>
                            <div class="form-group">
                                <label for="duedate">{$_L['Payment Terms']}</label>

                                <select class="form-control" name="duedate" id="duedate">
                                    <option value="due_on_receipt" selected>{$_L['Due On Receipt']}</option>
                                    <option value="days3">{$_L['days_3']}</option>
                                    <option value="days5">{$_L['days_5']}</option>
                                    <option value="days7">{$_L['days_7']}</option>
                                    <option value="days10">{$_L['days_10']}</option>
                                    <option value="days15">{$_L['days_15']}</option>
                                    <option value="days30">{$_L['days_30']}</option>
                                    <option value="days45">{$_L['days_45']}</option>
                                    <option value="days60">{$_L['days_60']}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tid">{$_L['Sales TAX']}</label>

                                <select id="tid" name="tid" class="form-control">
                                    <option value="">{$_L['None']}</option>
                                    {foreach $t as $ts}
                                        <option value="{$ts['id']}">{$ts['name']}
                                            ({{number_format($ts['rate'],2,$config['dec_point'],$config['thousands_sep'])}}
                                            %)
                                        </option>
                                    {/foreach}

                                </select>
                                <input type="hidden" id="stax" name="stax" value="0.00">
                                <input type="hidden" id="discount_amount" name="discount_amount" value="">
                                <input type="hidden" id="discount_type" name="discount_type" value="p">
                                <input type="hidden" id="taxed_type" name="taxed_type" value="individual">
                            </div>

                            <div class="form-group">
                                <label for="add_discount"><a href="#" id="add_discount" class="btn btn-info btn-xs"
                                                             style="margin-top: 5px;"><i
                                                class="fa fa-minus-circle"></i> {$_L['Set Discount']}</a></label>
                                <br>

                            </div>

                        </div>

                    </div>
                </div>


            </div>
        </form>


    </div>



    {* lan variables *}

    <input type="hidden" id="_lan_set_discount" value="{$_L['Set Discount']}">
    <input type="hidden" id="_lan_discount" value="{$_L['Discount']}">
    <input type="hidden" id="_lan_discount_type" value="{$_L['Discount Type']}">
    <input type="hidden" id="_lan_percentage" value="{$_L['Percentage']}">
    <input type="hidden" id="_lan_fixed_amount" value="{$_L['Fixed Amount']}">
    <input type="hidden" id="_lan_btn_save" value="{$_L['Save']}">

    <input type="hidden" id="_lan_no_results_found" value="{$_L['No results found']}">


{/block}