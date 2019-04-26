{extends file="$layouts_admin"}


{block name="style"}
    <link href="{$app_url}ui/lib/mselect/multiple-select.css" rel="stylesheet">

    {if $config['edition'] eq 't_event'}
        <link href="{$app_url}ui/lib/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet">
    {/if}

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

        {if $pos eq 'pos'}
        .pos_item {
            background: #f3f6f9;
            cursor: pointer;
        }

        .pos_item:hover {
            background: #2196f3;
            color: #ffffff;
        }

        .redactor-toolbar {
            border: 1px solid #aaa;
            border-bottom: none;
        }
        .redactor-editor {
            border: 1px solid #aaa;
        }

        {/if}

    </style>
{/block}


{block name="content"}
    <div class="row" id="ibox_form">


        <div class="col-md-12">
            <h3 class="ibilling-page-header">{$_L['New Invoice']}</h3>
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
                                        <h3>
                                            {if $invoice}

                                                {$_L['Invoice']} - {$invoice->invoicenum}{if $invoice->cn neq ''} {$invoice->cn} {else} {$invoice->id} {/if}

                                            {else}
                                                {*{$_L['Invoice']} # {predictNextRow('sys_invoices')}*}
                                                {predict_next_serial($config,'invoice')}
                                            {/if}

                                        </h3>
                                    </div>
                                    <div class='col-sm-6'>
                                        <div class="text-right">

                                            {if $invoice}

                                                <input type="hidden" name="invoice_id" value="{$invoice->id}">

                                                {else}

                                                <input type="hidden" name="invoice_id" value="">

                                            {/if}

                                            <button class="btn btn-primary" id="submit"> {$_L['Save']}</button>
                                            <button class="btn btn-info"
                                                    id="save_n_close"> {$_L['Save n Close']}</button>

                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <hr>
                                    </div>
                                </div>



                                <div class='row'>

                                    <div class='col-sm-4'>
                                        <div class='form-group'>
                                            <label for="user_title">{$_L['Customer']}</label>

                                            <select id="cid" name="cid" class="form-control">
                                                <option value="">{$_L['Select Contact']}...</option>
                                                {foreach $c as $cs}
                                                    <option value="{$cs['id']}"
                                                            {if $p_cid eq ($cs['id'])}selected="selected" {/if}>{if $cs['company'] neq ''} {$cs['company']} - {/if} {$cs['account']} {if $cs['email'] neq ''}- {$cs['email']}{/if}</option>
                                                {/foreach}

                                            </select>
                                            <span class="help-block"><a href="#"
                                                                        id="contact_add">| {$_L['Or Add New Customer']}</a> </span>
                                        </div>
                                    </div>
                                    <div class='col-sm-4'>
                                        <div class="form-group">
                                            <label for="status">{$_L['Status']}</label>

                                            <select id="status" name="status" class="form-control">

                                                <option value="Published" {if $invoice && $invoice->status != 'Draft'}selected{/if}>{$_L['Published']}</option>
                                                <option value="Draft" {if $invoice && $invoice->status == 'Draft'}selected{/if}>{$_L['Draft']}</option>


                                            </select>

                                        </div>
                                    </div>
                                    <div class='col-sm-4'>
                                        <div class="form-group">
                                            <label for="currency">{$_L['Currency']}</label>

                                            <select id="currency" name="currency" class="form-control">

                                                {foreach $currencies as $key=>$value}
                                                    <option value="{$key}"


                                                            {if $invoice}
                                                                {if $invoice->currency_iso_code == $key}selected {/if}
                                                                {else}
                                                                {if $config['home_currency'] eq ($key)}selected {/if}
                                                            {/if}


                                                            data-decimal-mark="{$value['decimal_mark']}" data-thousands-separator="{$value['thousands_separator']}" data-symbol="{$value['symbol']}"

                                                            {if $value['symbol_first']}
                                                                data-symbol-first="yes"
                                                                {else}
                                                                data-symbol-first="no"
                                                            {/if}



                                                    >{$key}</option>
                                                    {foreachelse}
                                                {/foreach}

                                            </select>

                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="invoice_title">{$_L['Title']}  <small><em>({$_L['optional']})</em></small></label>

                                            <input type="text" class="form-control" id="invoice_title" name="title" {if $invoice}value="{$invoice->title}" {/if}>
                                        </div>
                                    </div>
                                </div>

                                <div class='row'>


                                    <div class='col-sm-4'>
                                        <div class="form-group">
                                            <label for="address">{$_L['Address']}</label>

                                            <textarea id="address" readonly class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class='col-sm-4'>
                                        <div class="form-group">
                                            <label for="invoicenum">{$_L['Invoice Prefix']}</label>

                                            <input type="text" class="form-control" id="invoicenum" name="invoicenum" {if $invoice}value="{$invoice->invoicenum}" {else} value="{$config['invoice_code_prefix']}" {/if}>
                                        </div>

                                        <div class="form-group">
                                            <label for="cn">{$_L['Invoice']} #</label>

                                            <input type="text" class="form-control" id="cn" name="cn" {if $invoice}value="{$invoice->cn}" {else} value="{str_pad($config['invoice_code_current_number'], $config['number_pad'], '0', STR_PAD_LEFT)}" {/if}>
                                            <span class="help-block">{$_L['invoice_number_help']}</span>
                                        </div>

                                    </div>
                                    <div class='col-sm-4'>
                                        {if $config['invoice_receipt_number'] eq '1'}
                                            <div class="form-group">
                                                <label for="receipt_number">{$_L['Receipt Number']}</label>

                                                <input type="text" class="form-control" id="receipt_number"
                                                       name="receipt_number" {if $invoice}value="{$invoice->receipt_number}" {/if}>
                                            </div>
                                        {else}
                                            <input type="hidden" name="receipt_number" id="receipt_number" value="">
                                        {/if}

                                        <div class="form-group">
                                            <label for="show_quantity_as">{$_L['Show quantity as']}</label>

                                            <input type="text" class="form-control" id="show_quantity_as"
                                                   name="show_quantity_as"

                                                   {if $invoice}
                                                       value="{$invoice->show_quantity_as}"
                                                       {else}

                                                       value="{if $config['show_quantity_as'] eq ''}{$_L['Qty']}{else}{$config['show_quantity_as']}{/if}"
                                                   {/if}

                                                   >

                                        </div>

                                        {if $recurring}
                                            <div class="form-group">
                                                <label for="repeat">{$_L['Repeat Every']}</label>

                                                <select class="form-control" name="repeat" id="repeat">
                                                    <option value="daily" {if $invoice && $invoice->r == '+1 day'} selected{/if}>{$_L['Daily']}</option>
                                                    <option value="week1" {if $invoice && $invoice->r == '+1 week'} selected{/if}>{$_L['Weekly']}</option>
                                                    <option value="weeks2" {if $invoice && $invoice->r == '+2 weeks'} selected{/if}>{$_L['Weeks_2']}</option>
                                                    <option value="weeks3" {if $invoice && $invoice->r == '+3 weeks'} selected{/if}>{$_L['Weeks_3']}</option>
                                                    <option value="weeks4" {if $invoice && $invoice->r == '+4 weeks'} selected{/if}>{$_L['Weeks_4']}</option>
                                                    <option value="month1" {if $invoice} {if $invoice->r == '+1 month'} selected{/if} {else} selected {/if}>{$_L['Month']}</option>
                                                    <option value="months2" {if $invoice && $invoice->r == '+2 months'} selected{/if}>{$_L['Months_2']}</option>
                                                    <option value="months3" {if $invoice && $invoice->r == '+3 months'} selected{/if}>{$_L['Months_3']}</option>
                                                    <option value="months6" {if $invoice && $invoice->r == '+6 months'} selected{/if}>{$_L['Months_6']}</option>
                                                    <option value="year1" {if $invoice && $invoice->r == '+1 year'} selected{/if}>{$_L['Year']}</option>
                                                    <option value="years2" {if $invoice && $invoice->r == '+2 years'} selected{/if}>{$_L['Years_2']}</option>
                                                    <option value="years3" {if $invoice && $invoice->r == '+3 years'} selected{/if}>{$_L['Years_3']}</option>

                                                </select>
                                            </div>
                                        {else}
                                            <input type="hidden" name="repeat" id="repeat" value="0">
                                        {/if}



                                    </div>
                                </div>


                                {if $config['tax_system'] eq 'India'}
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


                                                    {if $invoice}

                                                        <option value="{$config['business_location']}" {if $invoice->is_same_state == 1} selected{/if}>{$config['business_location']}</option>
                                                        <option value="other" {if $invoice->is_same_state == 0} selected{/if}>Other</option>

                                                    {else}

                                                        <option value="{$config['business_location']}">{$config['business_location']}</option>
                                                        <option value="other">Other</option>


                                                    {/if}


                                                    {*{foreach $states as $state}*}
                                                        {*<option value="{$state['name']}"*}
                                                                {*{if $invoice}*}
                                                                    {*{if $contact && $contact->state == $state['name']} selected{/if}*}
                                                                    {*{else}*}
                                                                    {*{if $config['business_location'] == $state['name']}*}
                                                                        {*selected*}
                                                                    {*{/if}*}
                                                                {*{/if}*}

                                                        {*>{$state['name']}</option>*}
                                                    {*{/foreach}*}



                                                </select>

                                            </div>
                                        </div>


                                    </div>
                                {/if}


                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="idate">{$_L['Invoice Date']}</label>

                                            <input type="text" class="form-control" id="idate" name="idate" datepicker
                                                   data-date-format="yyyy-mm-dd" data-auto-close="true"
                                            {if $invoice}
                                                value="{$invoice->date}"
                                                {else}
                                                value="{$idate}"
                                            {/if}
                                            >
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="duedate">{$_L['Payment Terms']}</label>

                                            {if $invoice}

                                                <input type="text" class="form-control" id="duedate" name="duedate" datepicker
                                                       data-date-format="yyyy-mm-dd" data-auto-close="true"
                                                       value="{$invoice->duedate}">

                                            {else}

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

                                            {/if}


                                        </div>
                                    </div>
                                    <div class="col-sm-4">

                                    </div>
                                </div>






                                {$extraHtml}


                            </div>
                        </div>



                    </div>
                </div>


            </div>

            <div class="col-md-12">


                {if $pos eq 'pos'}
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="ib-search-bar" style="margin-bottom: 30px;">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="ib_search_input"
                                           placeholder="{$_L['Search']}..." autofocus data-list=".list_pos_items"></div>
                            </div>

                            <hr>

                            <div id="block_items" class="list_pos_items">


                            </div>


                        </div>
                    </div>
                {/if}


                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="table-responsive m-t">

                            {if $config['tax_system'] == 'India'}
                                <table class="table table-bordered invoice-table" id="invoice_items">


                                    <thead>


                                    <tr>

                                        <th width="25%" rowspan="2">{$_L['Item Name']}</th>
                                        <th rowspan="2">HSN / SAC</th>
                                        <th rowspan="2">{if $config['show_quantity_as'] eq ''}{$_L['Qty']}{else}{$config['show_quantity_as']}{/if}</th>
                                        <th rowspan="2">{$_L['Price']}</th>

                                        <th colspan="2">{$_L['Discount']}</th>

                                        <th rowspan="2" style="width: 80px;">Rate</th>

                                        <th colspan="3" class="text-center">
                                            Tax Values (Rs.)
                                        </th>

                                        <th rowspan="2">{$_L['Total']}</th>


                                    </tr>

                                    <tr>

                                        <th colspan="2">

                                            {if $invoice}

                                                <label class="radio-inline">
                                                    <input class="discountType" id="discountTypeP" type="radio" name="discount_type" value="p"
                                                    {if $invoice->discount_type == 'p'}checked{/if}
                                                    >%
                                                </label>
                                                <label class="radio-inline">
                                                    <input class="discountType" id="discountTypeF" type="radio" name="discount_type" value="f" {if $invoice->discount_type == 'f'}checked{/if}>Rs
                                                </label>

                                                {else}

                                                <label class="radio-inline">
                                                    <input class="discountType" id="discountTypeP" type="radio" name="discount_type" value="p" checked>%
                                                </label>
                                                <label class="radio-inline">
                                                    <input class="discountType" id="discountTypeF" type="radio" name="discount_type" value="f">Rs
                                                </label>

                                            {/if}



                                        </th>


                                        <th>CGST</th>
                                        <th>SGST</th>
                                        <th>IGST</th>

                                    </tr>

                                    </thead>
                                    <tbody>

                                    {if $items}

                                        {foreach $items as $item}



                                            <tr>
                                                <td>
                                                    <textarea class="form-control item_name" name="desc[]" rows="3">{$item->description}</textarea>
                                                    <input type="hidden" name="item_code[]" value="{$item->itemcode}"></td>
                                                <td><input type="text" class="form-control tax_code" value="{$item->tax_code}" name="tax_code[]"></td>
                                                <td><input type="text" class="form-control qty" value="{numberFormatUsingCurrency($item->qty,$invoice->currency_iso_code)}" name="qty[]"></td>
                                                <td><input type="text" class="form-control item_price" name="amount[]" value="{numberFormatUsingCurrency($item->amount,$invoice->currency_iso_code)}">
                                                <td colspan="2"><input type="text" class="form-control item_discount" name="discount[]" value="{numberFormatUsingCurrency($item->discount_amount,$invoice->currency_iso_code)}">
                                                </td>

                                                <td>



                                                        <select class="form-control taxed" name="taxed[]">

                                                            {foreach $t as $ts}
                                                                <option value="{$ts['rate']}"
                                                                        {if $ts['rate'] eq $item['tax_rate']}selected{/if}>{$ts['name']}</option>
                                                            {/foreach}


                                                        </select>





                                                </td>

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

                                        {/foreach}

                                    {/if}


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
                                                {foreach $t as $ts}
                                                    <option value="{$ts['rate']}"
                                                            {if $ts['is_default'] eq '1'}selected{/if}>{$ts['name']}</option>
                                                {/foreach} </select></td>

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

                            {else}

                                <table class="table table-bordered invoice-table" id="invoice_items">
                                    <thead>
                                    <tr>

                                        <th width="30%">{$_L['Item Name']}</th>
                                        <th width="10%">{if $config['show_quantity_as'] eq ''}{$_L['Qty']}{else}{$config['show_quantity_as']}{/if}</th>
                                        <th width="15%">{$_L['Price']}</th>

                                        <th colspan="2">{$_L['Discount']}</th>

                                        <th width="20%">{$_L['Tax']}</th>

                                        <th width="15%">{$_L['Total']}</th>


                                    </tr>
                                    <tr>
                                        <th colspan="3"></th>
                                        <th colspan="2">

                                            {if $invoice}


                                                <label class="radio-inline">
                                                    <input class="discountType" id="discountTypeP" type="radio" name="discount_type" value="p" {if $invoice->discount_type == 'p'}checked{/if}> <span  data-toggle="tooltip" data-placement="top" title="{$_L['Percentage']}">%</span>
                                                </label>
                                                <label class="radio-inline">
                                                    <input class="discountType" id="discountTypeF" type="radio" name="discount_type" value="f" {if $invoice->discount_type == 'f'}checked{/if}> <span data-toggle="tooltip" data-placement="top" title="{$_L['Fixed Amount']}" id="fixedDiscountText">
                                                    {if isset($currencies[$config['home_currency']])}
                                                        {$currencies[$config['home_currency']]['symbol']}
                                                    {else}

                                                    {/if}
                                                </span>
                                                </label>

                                            {else}

                                                <label class="radio-inline">
                                                    <input class="discountType" id="discountTypeP" type="radio" name="discount_type" value="p" checked> <span  data-toggle="tooltip" data-placement="top" title="{$_L['Percentage']}">%</span>
                                                </label>
                                                <label class="radio-inline">
                                                    <input class="discountType" id="discountTypeF" type="radio" name="discount_type" value="f"> <span data-toggle="tooltip" data-placement="top" title="{$_L['Fixed Amount']}" id="fixedDiscountText">
                                                    {if isset($currencies[$config['home_currency']])}
                                                        {$currencies[$config['home_currency']]['symbol']}
                                                    {else}

                                                    {/if}
                                                </span>
                                                </label>

                                            {/if}



                                        </th>
                                        <th colspan="2"></th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    {if $items}

                                        {foreach $items as $item}

                                            <tr>
                                                <td>
                                                    <textarea class="form-control item_name" name="desc[]" rows="3">{$item->description}</textarea>
                                                    <input type="hidden" name="item_code[]" value="{$item->itemcode}"></td>
                                                <td><input type="text" class="form-control qty" value="{numberFormatUsingCurrency($item->qty,$invoice->currency_iso_code)}" name="qty[]"></td>
                                                <td><input type="text" class="form-control item_price" name="amount[]" value="{numberFormatUsingCurrency($item->amount,$invoice->currency_iso_code)}"></td>
                                                <td colspan="2"><input type="text" class="form-control item_discount" name="discount[]" value="{numberFormatUsingCurrency($item->discount_amount,$invoice->currency_iso_code)}">
                                                </td>
                                                <td><select class="form-control taxed" name="taxed[]">
                                                        {foreach $t as $ts}
                                                            <option value="{$ts['rate']}"
                                                                    {if $item->tax_rate eq $ts['rate']}selected{/if}>{$ts['name']}</option>
                                                        {/foreach} </select></td>

                                                <td class="ltotal"><input type="text" class="form-control lvtotal" readonly=""
                                                                          value=""></td>
                                            </tr>

                                        {/foreach}

                                    {/if}
                                    <tr>
                                        <td>
                                            <textarea class="form-control item_name" name="desc[]" rows="3"></textarea>
                                            <input type="hidden" name="item_code[]" value=""></td>
                                        <td><input type="text" class="form-control qty" value="" name="qty[]"></td>
                                        <td><input type="text" class="form-control item_price" name="amount[]" value=""></td>
                                        <td colspan="2"><input type="text" class="form-control item_discount" name="discount[]" value="">
                                        </td>
                                        <td><select class="form-control taxed" name="taxed[]">
                                                {foreach $t as $ts}
                                                    <option value="{$ts['rate']}"
                                                            {if $ts['is_default'] eq '1'}selected{/if}>{$ts['name']}</option>
                                                {/foreach} </select></td>

                                        <td class="ltotal"><input type="text" class="form-control lvtotal" readonly=""
                                                                  value=""></td>
                                    </tr>



                                    </tbody>
                                </table>

                            {/if}


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

                        <table class="table invoice-total">
                            <tbody>
                            <tr>
                                <td><strong>{$_L['Sub Total']} :</strong></td>
                                <td id="sub_total" class="amount">0.00
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>{$_L['Discount']} <span id="is_pt"></span> : </strong>


                                </td>
                                <td id="discount_amount_total" class="amount">0.00
                                </td>
                            </tr>
                            {if $config['tax_system'] eq 'default'}
                                <tr>
                                    <td><strong>{$_L['TAX']} :</strong></td>
                                    <td id="taxtotal" class="amount">0.00
                                    </td>
                                </tr>

                            {elseif $config['tax_system'] eq 'ca_quebec'}

                                <div id="taxValTr">
                                    <tr>
                                        <td><strong>{$_L['TAX']} :</strong></td>
                                        <td id="taxtotal" class="amount">0.00
                                        </td>
                                    </tr>
                                </div>


                            {elseif $config['tax_system'] eq 'India'}


                                <div id="taxValTr">
                                    <tr>
                                        <td><strong>{$_L['TAX']} :</strong></td>
                                        <td id="taxtotal" class="amount">0.00
                                        </td>
                                    </tr>
                                </div>
                            {/if}
                            <tr>
                                <td><strong>{$_L['TOTAL']} :</strong></td>
                                <td id="total" class="amount">0.00
                                </td>
                            </tr>
                            </tbody>
                        </table>


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


{block name="script"}

    {if $config['edition'] eq 't_event'}
        <script src="{$app_url}ui/lib/clockpicker/bootstrap-clockpicker.min.js"></script>
    {/if}

    <script src="{$app_url}ui/lib/mselect/multiple-select.js"></script>
    <script>

        String.prototype.replaceAll = function(search, replacement) {
            var target = this;
            return target.replace(new RegExp(search, 'g'), replacement);
        };

        String.prototype.trunc = String.prototype.trunc ||
            function (n) {
                return (this.length > n) ? this.substr(0, n - 1) + '&hellip;' : this;
            };

        var selectedCurrency;

        function getSelectedCurrencySymbol() {
            selectedCurrency = document.getElementById('currency');
            return selectedCurrency.options[selectedCurrency.selectedIndex].getAttribute('data-symbol');
        }

        function getSelectedCurrencyDecimalMark() {
            selectedCurrency = document.getElementById('currency');
            return selectedCurrency.options[selectedCurrency.selectedIndex].getAttribute('data-decimal-mark');
        }

        function getSelectedCurrencyThousandsSeparator() {
            selectedCurrency = document.getElementById('currency');
            return selectedCurrency.options[selectedCurrency.selectedIndex].getAttribute('data-thousands-separator');
        }

        function selectedCurrencyIsSymbolFirst() {
            selectedCurrency = document.getElementById('currency');
            if(selectedCurrency.options[selectedCurrency.selectedIndex].getAttribute('data-symbol-first') === 'yes')
            {
                return true;
            }
            else
            {
                return false;
            }

        }

        function clx_number_format(number, decimals, dec_point, thousands_sep) {

            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                toFixedFix = function (n, prec) {
                    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                    var k = Math.pow(10, prec);
                    return Math.round(n * k) / k;
                },
                s = (prec ? toFixedFix(n, prec) : Math.round(n)).toString().split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        function formatCurrency(amount) {
            var prefix = '';
            var suffix = '';
            if(selectedCurrencyIsSymbolFirst())
            {
                prefix = getSelectedCurrencySymbol() + ' ';
            }
            else
            {
                suffix = ' ' + getSelectedCurrencySymbol();
            }


            return prefix + clx_number_format(amount,2,getSelectedCurrencyDecimalMark(),getSelectedCurrencyThousandsSeparator()) + suffix;

        }


        function parseAmount(amount) {

            if(amount === '')
            {
                return 0.00;
            }


            if(getSelectedCurrencyDecimalMark() === ',')
            {
                amount = amount.split('.').join('');
                amount = amount.replace(',','.');
            }
            else{
                amount = amount.replace(',','');
            }


            return parseFloat(amount).toFixed(2);

        }



        function calculatePercentage(amount,percentage) {
            return (amount)*(percentage/100);
        }

        var is_same_state = false;

        {if $config['tax_system'] eq 'India'}

        var $place_of_supply = $('#place_of_supply');

        function taxState() {
            if($place_of_supply.val() == '{$config['business_location']}')
            {
                is_same_state = true;
            }
            else
            {
                is_same_state = false;
            }
        }


        taxState();





        {/if}



        $(document).ready(function () {

            $('[data-toggle="tooltip"]').tooltip();




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
                    minHeight: 30,
                    buttons: ['html', '|', 'formatting', '|', 'bold', 'italic', 'link', 'unorderedlist', 'orderedlist']
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



            var $invoice_items = $('#invoice_items');

            var invTotal = 0;

            var totalTaxVal = 0;


            var lineTotalWithoutTax;

            var totalLineTotalWithoutTax = 0;

            var discount_type = 'p';

            var totalDiscount;

            function calculateTotal() {

                discount_type = document.querySelector('.discountType:checked').value;

                invTotal = 0;

                totalTaxVal = 0;

                tax_val = 0;

                lineTotalWithoutTax = 0;

                totalLineTotalWithoutTax = 0;

                totalDiscount = 0;

                var c_taxed_split;



                {if $config['tax_system'] == 'India'}


                $.each($('.qty'), function (index, value) {

                    c_qty = this.value;

                    c_qty = parseAmount(c_qty);

                    c_price = $(this).closest('tr').find('.item_price').val();



                    c_price = parseAmount(c_price);


                    c_discount = $(this).closest('tr').find('.item_discount').val();
                    c_discount = parseAmount(c_discount);

                    if (c_qty === '' || c_price === '') {
                        return;
                    }




                    c_taxed = $(this).closest('tr').find('.taxed').val();

                    c_taxed_split = (c_taxed/2).toFixed(2);

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

                    lineTotal = (lineTotal-lineDiscount);



                    if (c_taxed === '' || c_taxed === null) {

                        tax_val = 0;

                    }
                    else {
                        c_taxed = parseFloat(c_taxed).toFixed(3);

                        tax_val = (lineTotal * c_taxed) / 100;


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




                    totalTaxVal += tax_val;

                    totalLineTotalWithoutTax += lineTotalWithoutTax;

                    totalDiscount += lineDiscount;


                });






                {else}




                $.each($('.qty'), function (index, value) {
//                    console.log(index);
//                    console.log(this.value);


                    c_qty = this.value;

                    c_qty = parseAmount(c_qty);

                    c_price = $(this).closest('tr').find('.item_price').val();



                    c_price = parseAmount(c_price);


                    c_discount = $(this).closest('tr').find('.item_discount').val();
                    c_discount = parseAmount(c_discount);

                    // console.log(c_discount);


                    if (c_qty === '' || c_price === '') {
                        return;
                    }


                    c_taxed = $(this).closest('tr').find('.taxed').val();



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




                    totalTaxVal += tax_val;

                    totalLineTotalWithoutTax += lineTotalWithoutTax;

                    totalDiscount += lineDiscount;

                });







                {/if}


                totalDiscount = parseFloat(totalDiscount);

                invTotal = totalLineTotalWithoutTax - totalDiscount + totalTaxVal;

                $total.html(formatCurrency(invTotal.toFixed(2)));
                $taxtotal.html(formatCurrency(totalTaxVal.toFixed(2)));
                $sub_total.html(formatCurrency(totalLineTotalWithoutTax.toFixed(2)));
                $discount_amount_total.html(formatCurrency(totalDiscount.toFixed(2)));


            }

            calculateTotal();

            {if $config['tax_system'] == 'India'}

            $place_of_supply.on('change',function () {

                taxState();
                calculateTotal();

            });

            {/if}


            $('#discountTypeP').change(function () {
                calculateTotal();
            });

            $('#discountTypeF').change(function () {
                calculateTotal();
            });

            var $currency = $('#currency');
            var $fixedDiscountText = $('#fixedDiscountText');

            $currency.on('change',function () {
                $fixedDiscountText.html(getSelectedCurrencySymbol());
                calculateTotal();
            });


            var $block_items = $("#block_items");

            var _url = $("#_url").val();



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


            {if $config['tax_system'] eq 'India'}

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
            {/if}


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


                {if $config['tax_system'] == 'India'}

                $invoice_items.find('tbody')
                    .append(
                        '<tr>  <td><textarea class="form-control item_name" name="desc[]" rows="3" id="i_' + rowNum + '"></textarea> <input type="hidden" name="item_code[]" value=""> </td> <td><input type="text" class="form-control tax_code" value="" name="tax_code[]"></td>'  +
                        ' <td><input type="text" class="form-control qty" value="" name="qty[]"></td> <td><input type="text" class="form-control item_price" name="amount[]" value=""></td> <td colspan="2"><input type="text" class="form-control item_discount" name="discount[]" value=""></td>  <td> <select class="form-control taxed" name="taxed[]" id="t_' + rowNum + '"> {foreach $t as $ts}  <option value="{$ts['rate']}" {if $ts['is_default'] eq '1'}selected{/if}>{$ts['name']}</option> {/foreach} </select></td> <td>\n' +
                        '                                            <input type="text" class="form-control cgst" disabled name="cgst[]" value="">\n' +
                        '                                        </td>\n' +
                        '                                        <td>\n' +
                        '                                            <input type="text" class="form-control sgst" disabled name="sgst[]" value="">\n' +
                        '                                        </td>\n' +
                        '                                        <td>\n' +
                        '                                            <input type="text" class="form-control igst" disabled name="igst[]" value="">\n' +
                        '                                        </td> <td class="ltotal"><input type="text" class="form-control lvtotal" readonly="" value=""></td>  </tr>'
                    );

                {else}

                $invoice_items.find('tbody')
                    .append(
                        '<tr>  <td><textarea class="form-control item_name" name="desc[]" rows="3" id="i_' + rowNum + '"></textarea> <input type="hidden" name="item_code[]" value=""> </td> <td><input type="text" class="form-control qty" value="" name="qty[]"></td> <td><input type="text" class="form-control item_price" name="amount[]" value=""></td> <td colspan="2"><input type="text" class="form-control item_discount" name="discount[]" value=""></td>  <td> <select class="form-control taxed" name="taxed[]" id="t_' + rowNum + '"> {foreach $t as $ts}  <option value="{$ts['rate']}" {if $ts['is_default'] eq '1'}selected{/if}>{$ts['name']}</option> {/foreach} </select></td> <td class="ltotal"><input type="text" class="form-control lvtotal" readonly="" value=""></td>  </tr>'
                    );

                {/if}



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

                    {if $config['tax_system'] == 'India'}

                    $invoice_items.find('tbody')
                        .append(
                            '<tr>  <td><textarea class="form-control item_name" name="desc[]" rows="3" id="i_' + rowNum + '">' + item_name + '</textarea> <input type="hidden" name="item_code[]" value="' + item_code + '"> </td> <td><input type="text" class="form-control tax_code" value="" name="tax_code[]"></td>'  +
                            ' <td><input type="text" class="form-control qty" value="1" name="qty[]"></td> <td><input type="text" class="form-control item_price" name="amount[]" value="' + item_price + '"></td> <td colspan="2"><input type="text" class="form-control item_discount" value="0.00" name="discount[]"></td>  <td> <select class="form-control taxed" name="taxed[]" id="t_' + rowNum + '"> {foreach $t as $ts}  <option value="{$ts['rate']}" {if $ts['is_default'] eq '1'}selected{/if}>{$ts['name']}</option> {/foreach} </select></td> <td>\n' +
                            '                                            <input type="text" class="form-control cgst" disabled name="cgst[]" value="">\n' +
                            '                                        </td>\n' +
                            '                                        <td>\n' +
                            '                                            <input type="text" class="form-control sgst" disabled name="sgst[]" value="">\n' +
                            '                                        </td>\n' +
                            '                                        <td>\n' +
                            '                                            <input type="text" class="form-control igst" disabled name="igst[]" value="">\n' +
                            '                                        </td> <td class="ltotal"><input type="text" class="form-control lvtotal" readonly="" value=""></td>  </tr>'
                        );

                    {else}

                    $invoice_items.find('tbody')
                        .append(
                            '<tr>  <td><textarea class="form-control item_name" name="desc[]" rows="3" id="i_' + rowNum + '">' + item_name + '</textarea> <input type="hidden" name="item_code[]" value="' + item_code + '"></td> <td><input type="text" class="form-control qty" value="1" name="qty[]"></td> <td><input type="text" class="form-control item_price" name="amount[]" value="' + item_price + '"></td> <td colspan="2"><input type="text" class="form-control item_discount" name="discount[]" value=""></td>  <td> <select class="form-control taxed" name="taxed[]" id="t_' + rowNum + '"> {foreach $t as $ts}  <option value="{$ts['rate']}" {if $ts['is_default'] eq '1'}selected{/if}>{$ts['name']}</option> {/foreach} </select></td> <td class="ltotal"><input type="text" class="form-control lvtotal" readonly="" value=""></td>  </tr>'
                        );

                    {/if}



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


            {if $pos eq 'pos'}

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
                            image = '{$app_url}ui/lib/imgs/item_placeholder.png';
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
                        '<tr>  <td><textarea class="form-control item_name" name="desc[]" rows="3" id="i_' + item_sl + '">' + pos_item_name + '</textarea> <input type="hidden" name="item_code[]" value="' + pos_item_number + '"></td> <td><input type="text" class="form-control qty" value="1" name="qty[]"></td> <td><input type="text" class="form-control item_price" name="amount[]" value="' + pos_item_price + '"></td>  <td> <select class="form-control taxed" name="taxed[]" id="t_' + rowNum + '"> {foreach $t as $ts}  <option value="{$ts['rate']}" {if $ts['is_default'] eq '1'}selected{/if}>{$ts['name']}</option> {/foreach} </select></td> <td class="ltotal"><input type="text" class="form-control lvtotal" readonly="" value=""></td>  </tr>>'
                    );

                spEditor('#i_' + pos_item_id);


                spMultiSelect('#t_' + rowNum);

                calculateTotal();

                item_sl = item_sl + 1;


            });



            {/if}

        });
    </script>
{/block}