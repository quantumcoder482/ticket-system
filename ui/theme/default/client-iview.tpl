<!DOCTYPE html>
<!--
Application Name: CloudOnex Business Suite
Version: 1.0.2
Website: https://www.cloudonex.com/
License: You must have a valid license purchased only from cloudonex.com in order to legally use this software.
-->
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{$_L['INVOICE']} - {$d['invoicenum']}{if $d['cn'] neq ''} {$d['cn']} {else} {$d['id']} {/if}</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{$app_url}apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{$app_url}favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{$app_url}favicon-16x16.png">

    <link href="{$theme}default/css/app.css?v={$file_build}" rel="stylesheet">

    <link href="{$theme}default/css/{$config['nstyle']}.css" rel="stylesheet">

    {foreach $plugin_ui_header_client as $plugin_ui_header_add}
        {$plugin_ui_header_add}
    {/foreach}

    {if $config['rtl'] eq '1'}
        <link href="{$_theme}/css/bootstrap-rtl.min.css" rel="stylesheet">
        <link href="{$_theme}/css/style-rtl.min.css" rel="stylesheet">
    {/if}

    {if isset($xheader)}
        {$xheader}
    {/if}

    {block name=style}{/block}

    {$config['header_scripts']}
    <style type="text/css">
        body {

            background-color: #e9ebee;
            overflow-x: visible;
        }
        .paper {
            margin: 20px auto;
            width: 980px;
            /*border: 2px solid #DDD;*/
            background-color: #FFF;
            position: relative;

        }

        .fancybox-slide--iframe .fancybox-content {
            width  : 600px;
            max-width  : 80%;
            max-height : 80%;
            margin: 0;
        }

        .panel {

            /*box-shadow: none;*/

            -webkit-box-shadow: 0 10px 40px 0 rgba(18,106,211,.07), 0 2px 9px 0 rgba(18,106,211,.06);
            box-shadow: 0 10px 40px 0 rgba(18,106,211,.07), 0 2px 9px 0 rgba(18,106,211,.06);

        }

        .panel-body {
            padding: 25px;
        }

        {if isset($payment_gateways_by_processor['stripe'])}

        .StripeElement {
            background-color: white;
            height: 40px;
            padding: 10px 12px;
            border-radius: 4px;
            border: 1px solid transparent;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }

        {/if}




    </style>

    {if isset($payment_gateways_by_processor['stripe'])}
        <script src="https://js.stripe.com/v3/"></script>
    {/if}

</head>

<body class="fixed-nav">

<div class="paper">
    <section class="panel">
        <div class="panel-body">
            <div class="invoice">
                {if isset($notify)}
                    {$notify}
                {/if}
                <header class="clearfix">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-right">

                                <a href="{$_url}client/dashboard/" class="btn btn-primary ml-sm no-shadow no-border"><i class="fa fa-long-arrow-left"></i> {$_L['Back to Client Area']}</a>
                                <a href="{$_url}client/ipdf/{$d['id']}/token_{$d['vtoken']}/dl/" class="btn btn-primary buttons-pdf ml-sm"><i class="fa fa-file-pdf-o"></i> {$_L['Download PDF']}</a>
                                <a href="{$_url}client/ipdf/{$d['id']}/token_{$d['vtoken']}/view/" class="btn btn-primary buttons-excel ml-sm"><i class="fa fa-file-text-o"></i> {$_L['View PDF']}</a>
                                <a href="{$_url}iview/print/{$d['id']}/token_{$d['vtoken']}" target="_blank" class="btn btn-primary buttons-print ml-sm"><i class="fa fa-print"></i> {$_L['Printable Version']}</a>
                            </div>

                            <div class="hr-line-dashed"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mt-md">
                            <h2 class="h2 mt-none mb-sm text-dark text-bold">{$_L['INVOICE']}</h2>
                            <h4 class="h4 m-none text-dark text-bold">#{$d['invoicenum']}{if $d['cn'] neq ''} {$d['cn']} {else} {$d['id']} {/if}</h4>
                            {if $d['status'] eq 'Unpaid'}
                                <h3 class="alert alert-danger">{$_L['Unpaid']}</h3>
                                {elseif $d['status'] eq 'Paid'}
                                <h3 class="alert alert-success">{$_L['Paid']}</h3>
                            {elseif $d['status'] eq 'Partially Paid'}
                                <h3 class="alert alert-info">{$_L['Partially Paid']}</h3>
                                {else}
                                <h3 class="alert alert-info">{$d['status']}</h3>
                            {/if}

                            {if isset($d['title']) && $d['title'] != ''}
                                <h4>{$d['title']}</h4>
                                <hr>
                            {/if}

                            {if $config['invoice_receipt_number'] eq '1' && $d['receipt_number'] neq ''}
                                <h4>{$_L['Receipt Number']}: {$d['receipt_number']}</h4>
                                <hr>
                            {/if}




                        </div>
                        <div class="col-sm-6 text-right mt-md mb-md">

                            <div class="ib">
                                <img src="{$app_url}storage/system/{$config['logo_default']}" alt="Logo" style="margin-bottom: 15px;">

                            </div>

                            <address class="ib mr-xlg">
                                <strong>{$config['CompanyName']}</strong>
                                <br>
                                {$config['caddress']}
                            </address>

                        </div>
                    </div>
                </header>
                <div class="bill-info">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="bill-to">
                                <p class="h5 mb-xs text-dark text-semibold"><strong>{$_L['Invoiced To']}</strong></p>
                                <address>
                                    {if $a['company'] neq ''}
                                        {$a['company']}

                                        <br>

                                        {if $company && $config['show_business_number'] eq '1' }

                                            {if $company->business_number neq ''}
                                                {$config['label_business_number']}: {$company->business_number}
                                                <br>
                                            {/if}
                                        {/if}

                                        {$_L['ATTN']}: {$d['account']}
                                        <br>
                                    {else}
                                        {$d['account']}
                                        <br>
                                    {/if}
                                    {$a['address']} <br>
                                    {$a['city']} <br>
                                    {$a['state']} - {$a['zip']} <br>
                                    {$a['country']}
                                    <br>
                                    <strong>{$_L['Phone']}:</strong> {$a['phone']}

                                    {if $config['fax_field'] neq '0' && $a['fax'] neq ''}
                                        <br>
                                        <strong>{$_L['Fax']}:</strong> {$a['fax']}
                                    {/if}

                                    <br>
                                    <strong>{$_L['Email']}:</strong> {$a['email']}
                                    {foreach $cf as $cfs}
                                        {if $cfs['showinvoice'] == 'No'}
                                            {continue}
                                        {/if}
                                        <br>
                                        <strong>{$cfs['fieldname']}: </strong> {get_custom_field_value($cfs['id'],$a['id'])}
                                    {/foreach}
                                    {$x_html}
                                </address>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bill-data text-right">
                                <p class="mb-none">
                                    <span class="text-dark">{$_L['Invoice Date']}</span>
                                    <span class="value">{date( $config['df'], strtotime($d['date']))}</span>
                                </p>
                                <p class="mb-none">
                                    <span class="text-dark">{$_L['Due Date']}:</span>
                                    <span class="value">{date( $config['df'], strtotime($d['duedate']))}</span>
                                </p>

                                <h2> {$_L['Invoice Total']}: {ib_money_format($d['total'],$config,$d['currency_symbol'])} </h2>
                                {if ($d['credit']) neq '0.00'}
                                    <h2> {$_L['Total Paid']}: {ib_money_format($d['credit'],$config,$d['currency_symbol'])}</h2>
                                    <h2> {$_L['Amount Due']}: {ib_money_format($i_due,$config,$d['currency_symbol'])}</h2>
                                {/if}
                                {if (($d['status']) neq 'Paid') AND (ib_pg_count() neq '0' AND (($d['status']) neq 'Cancelled'))}
                                    <form class="form-inline" method="post" action="{$_url}client/ipay/{$d['id']}/token_{$d['vtoken']}">

                                        {if count($payment_gateways) == 1}
                                            {foreach $payment_gateways as $pg}
                                                <input type="hidden" id="paymentGateway" name="pg" value="{$pg->processor}">
                                            {/foreach}
                                            {else}
                                            <div class="form-group has-success">
                                                <select class="form-control" name="pg" id="paymentGateway">
                                                    {foreach $payment_gateways as $pg}
                                                        <option value="{$pg->processor}">{$pg->name}</option>
                                                    {/foreach}
                                                </select>
                                            </div>
                                        {/if}
                                        <button type="submit" id="btnPayNow" class="btn btn-primary ml-sm"><i class="fa fa-credit-card"></i> {$_L['Pay Now']}</button>
                                    </form>

                                    {if $a->balance > 0 && $d->is_credit_invoice neq 1}
                                        <hr>
                                        <h3> Your Current Balance: <span class="amount">{$a->balance}</span> </h3>
                                         <a class="btn btn-primary" href="{$_url}client/pay_with_credit/{$d->id}/token_{$d->vtoken}"> Pay with Credit</a>
                                        <hr>
                                    {/if}

                                {if isset($payment_gateways_by_processor['stripe'])}

                                    <div id="stripeDiv" style="display: none; margin-bottom: 25px; margin-top: 15px; padding: 15px; background: #f5f5f6;">


                                        <form action="{$_url}client/payment-stripe" method="post" id="payment-form">
                                            <div class="form-row">
                                                <label for="card-element">
                                                    Credit or debit card
                                                </label>
                                                <div id="card-element">
                                                    <!-- A Stripe Element will be inserted here. -->
                                                </div>

                                                <!-- Used to display form errors. -->
                                                <div id="card-errors" role="alert"></div>
                                            </div>

                                            <input type="hidden" name="invoice_id" value="{$d['id']}">
                                            <input type="hidden" name="view_token" value="{$d['vtoken']}">
                                            <button class="btn btn-primary" id="btnStripeSubmit" style="margin-top: 20px;">Submit Payment</button>

                                        </form>
                                    </div>

                                {/if}


                                {/if}

                                {*<a href="{$_url}client/ipay/{$d['id']}/token_{$d['vtoken']}" class="btn btn-info ml-sm"><i class="fa fa-credit-card"></i> Pay Now</a>*}

                            </div>
                        </div>
                    </div>
                </div>

                {if $quote}

                        <h4>{$_L['Quote']}: {$quote->id}</h4>

                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            {$quote->proposal}
                            <hr>
                        </div>
                    </div>
                {/if}

                <div class="table-responsive">

                    {if $config['tax_system'] == 'India'}

                        <table class="table table-bordered invoice-items">
                            <thead>
                            <tr class="text-dark">
                                <th id="cell-id" class="text-semibold">S/L</th>
                                <th id="cell-item" class="text-semibold">{$_L['Item']}</th>
                                <th class="text-semibold">HSN / SAC</th>
                                <th id="cell-price" class="text-center text-semibold">{$_L['Price']}</th>
                                <th id="cell-qty" class="text-center text-semibold">{if $d['show_quantity_as'] eq '' || $d['show_quantity_as'] eq '1'}{$_L['Qty']}{else}{$d['show_quantity_as']}{/if}</th>
                                <th class="text-right">Taxable Value</th>


                                {if $d['is_same_state']}

                                    <th class="text-right">CGST</th>
                                    <th class="text-right">SGST/UTGST</th>
                                    <th class="text-right">GST</th>

                                {else}

                                    <th class="text-right">IGST</th>

                                {/if}




                                <th id="cell-total" class="text-right text-semibold">{$_L['Total']}</th>
                            </tr>
                            </thead>
                            <tbody>

                            {foreach $items as $item}
                                <tr>
                                    <td>
                                        {if $item['itemcode'] != ''}
                                            {$item['itemcode']}
                                        {else}
                                            {counter}
                                        {/if}
                                    </td>
                                    <td class="text-semibold text-dark">{$item['description']}</td>
                                    <td class="text-semibold text-dark">{$item['tax_code']}</td>
                                    <td class="text-center amount" data-a-sign="{if $d['currency_symbol'] eq ''} {$config['currency_code']} {else} {$d['currency_symbol']}{/if} ">{$item['amount']}</td>
                                    <td class="text-center">{$item['qty']}</td>
                                    <td class="text-right">
                                        {if $item['discount_amount'] != '0.00'}

                                            Total: <span class="amount" data-a-sign="{$data_a_sign}" data-a-dec="{$data_a_dec}" data-a-sep="{$data_a_sep}" data-p-sign="{$data_p_sign}">{($item['amount']*$item['qty'])}</span>


                                            <br>
                                            Discount: <span class="amount" data-a-sign="{$data_a_sign}" data-a-dec="{$data_a_dec}" data-a-sep="{$data_a_sep}" data-p-sign="{$data_p_sign}">{$item['discount_amount']}</span>
                                            <br>
                                            Taxable amount: <span class="amount" data-a-sign="{$data_a_sign}" data-a-dec="{$data_a_dec}" data-a-sep="{$data_a_sep}" data-p-sign="{$data_p_sign}">{($item['amount']*$item['qty'])-$item['discount_amount']}</span>

                                        {else}
                                            <span class="amount" data-a-sign="{$data_a_sign}" data-a-dec="{$data_a_dec}" data-a-sep="{$data_a_sep}" data-p-sign="{$data_p_sign}">{($item['amount']*$item['qty'])}</span>

                                        {/if}


                                    </td>


                                    {if $d['is_same_state']}

                                        <td class="text-right">
                                            <span class="amount" data-a-sign="{$data_a_sign}" data-a-dec="{$data_a_dec}" data-a-sep="{$data_a_sep}" data-p-sign="{$data_p_sign}">{gstIndiaSplitTaxValue($item['total'],$item['tax_rate'])}</span>
                                            <br>
                                            @{round($item['tax_rate']/2,2)}%
                                        </td>
                                        <td class="text-right">
                                            <span class="amount" data-a-sign="{$data_a_sign}" data-a-dec="{$data_a_dec}" data-a-sep="{$data_a_sep}" data-p-sign="{$data_p_sign}">{gstIndiaSplitTaxValue($item['total'],$item['tax_rate'])}</span>
                                            <br>
                                            @{round($item['tax_rate']/2,2)}%
                                        </td>
                                        <td class="text-right">
                                            <span class="amount" data-a-sign="{$data_a_sign}" data-a-dec="{$data_a_dec}" data-a-sep="{$data_a_sep}" data-p-sign="{$data_p_sign}">{round($item['taxamount'],2)}</span> <br>
                                            @{round($item['tax_rate'],2)}%

                                        </td>

                                    {else}



                                        <td class="text-right">
                                            <span class="amount" data-a-sign="{$data_a_sign}" data-a-dec="{$data_a_dec}" data-a-sep="{$data_a_sep}" data-p-sign="{$data_p_sign}">{round(( ($item['tax_rate']*($item['qty'] * $item['amount'])) / 100),2)}</span> <br>
                                            @{round($item['tax_rate'],2)}%

                                        </td>

                                    {/if}




                                    <td class="text-right amount" data-a-sign="{$data_a_sign}" data-a-dec="{$data_a_dec}" data-a-sep="{$data_a_sep}" data-p-sign="{$data_p_sign}">{$item['total'] + $item['taxamount']}</td>
                                </tr>
                            {/foreach}
                            </tbody>
                        </table>

                    {else}

                        <table class="table table-bordered invoice-items">
                            <thead>
                            <tr class="text-dark">
                                <th id="cell-id" class="text-semibold">#</th>
                                <th id="cell-item" class="text-semibold">{$_L['Item']}</th>
                                <th id="cell-price" class="text-center text-semibold">{$_L['Price']}</th>
                                <th id="cell-qty" class="text-center text-semibold">{if $d['show_quantity_as'] eq '' || $d['show_quantity_as'] eq '1'}{$_L['Qty']}{else}{$d['show_quantity_as']}{/if}</th>
                                <th id="cell-total" class="text-center text-semibold">{$_L['Total']}</th>
                            </tr>
                            </thead>
                            <tbody>

                            {foreach $items as $item}
                                <tr>
                                    <td>{$item['itemcode']}</td>
                                    <td class="text-semibold text-dark">{$item['description']}</td>
                                    <td class="text-center amount">{formatCurrency($item['amount'],$d['currency_iso_code'])}</td>
                                    <td class="text-center">{numberFormatUsingCurrency($item['qty'],$d['currency_iso_code'],0)}</td>
                                    <td class="text-center amount">{formatCurrency($item['total'] + $item['taxamount'] + $item['discount_amount'],$d['currency_iso_code'])}</td>
                                </tr>
                            {/foreach}
                            </tbody>
                        </table>

                    {/if}



                </div>

                <div class="invoice-summary">
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-8">
                            <table class="table h5 text-dark">
                                <tbody>
                                <tr class="b-top-none">
                                    <td colspan="2">{$_L['Sub Total']}</td>
                                    <td class="text-left">{formatCurrency($d['subtotal'],$d['currency_iso_code'])}</td>
                                </tr>

                                {if ($d['discount']) neq '0.00'}
                                    <tr>
                                        <td colspan="2">{$_L['Discount']}</td>
                                        <td class="text-left">{formatCurrency($d['discount'],$d['currency_iso_code'])}</td>
                                    </tr>
                                {/if}

                                {if $config['tax_system'] == 'India'}
                                    <tr>
                                        <td colspan="2">GST</td>
                                        <td class="text-left">{formatCurrency($d['tax'],$d['currency_iso_code'])}</td>
                                    </tr>
                                {else}



                                    <tr>
                                        <td colspan="2">{$_L['TAX']}</td>
                                        <td class="text-left">{formatCurrency($d['tax'],$d['currency_iso_code'])}</td>
                                    </tr>



                                {/if}

                                {if ($d['credit']) neq '0.00'}
                                    <tr>
                                        <td colspan="2">{$_L['Total']}</td>
                                        <td class="text-left">{formatCurrency($d['total'],$d['currency_iso_code'])}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">{$_L['Total Paid']}</td>
                                        <td class="text-left">{formatCurrency($d['credit'],$d['currency_iso_code'])}</td>
                                    </tr>
                                    <tr class="h4">
                                        <td colspan="2">{$_L['Amount Due']}</td>
                                        <td class="text-left">{formatCurrency($i_due,$d['currency_iso_code'])}</td>
                                    </tr>
                                {else}
                                    <tr class="h4">
                                        <td colspan="2">{$_L['Grand Total']}</td>
                                        <td class="text-left">{formatCurrency($d['total'],$d['currency_iso_code'])}</td>
                                    </tr>
                                {/if}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {if ($trs_c neq '')}
                <h3>{$_L['Related Transactions']}</h3>
                <table class="table table-bordered sys_table">
                    <th>{$_L['Date']}</th>
                    <th>{$_L['Account']}</th>


                    <th class="text-right">{$_L['Amount']}</th>

                    <th>{$_L['Description']}</th>




                    {foreach $trs as $tr}
                        <tr class="{if $tr['cr'] eq '0.00'}warning {else}info{/if}">
                            <td>{date( $config['df'], strtotime($tr['date']))}</td>
                            <td>{$tr['account']}</td>


                            <td class="text-right">{ib_money_format($tr['amount'],$config,$d['currency_symbol'])}</td>
                            <td>{$tr['description']}</td>




                        </tr>
                    {/foreach}



                </table>
            {/if}

            {if $inv_files_c neq ''}

                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th class="text-right" data-sort-ignore="true" width="20px;">{$_L['Type']}</th>

                        <th>{$_L['File']}</th>

                        <th class="text-right" data-sort-ignore="true" width="170px;">{$_L['Download']}</th>
                    </tr>
                    </thead>
                    <tbody>

                    {foreach $inv_files as $ds}

                        <tr>

                            <td>
                                {if $ds['file_mime_type'] eq 'jpg' || $ds['file_mime_type'] eq 'png' || $ds['file_mime_type'] eq 'gif'}
                                    <i class="fa fa-file-image-o"></i>
                                {elseif $ds['file_mime_type'] eq 'pdf'}
                                    <i class="fa fa-file-pdf-o"></i>
                                {elseif $ds['file_mime_type'] eq 'zip'}
                                    <i class="fa fa-file-archive-o"></i>
                                {else}
                                    <i class="fa fa-file"></i>
                                {/if}
                            </td>


                            <td>

                                {$ds['title']}

                                {if $ds['file_mime_type'] eq 'jpg' || $ds['file_mime_type'] eq 'png' || $ds['file_mime_type'] eq 'gif'}

                                    <hr>

                                    <img src="{$app_url}storage/docs/{$ds['file_path']}" class="img-responsive" alt="{$ds['title']}">

                                {/if}

                            </td>

                            <td class="text-right">

                                <a href="{$_url}client/dl/{$ds['id']}_{$ds['file_dl_token']}/" class="md-btn md-btn-primary"><i class="fa fa-download"></i> {$_L['Download']}</a>

                            </td>


                        </tr>

                    {/foreach}

                    </tbody>



                </table>

            {/if}

            {if ($d['notes']) neq ''}
                <div class="well m-t">
                    {$d['notes']}
                </div>
            {/if}


            <div class="hr-line-dashed"></div>





                {if isset($config['invoice_client_can_attach_signature']) && $config['invoice_client_can_attach_signature'] == 1 }



                    {*{if $d['signature_data_base64']}*}
                        {*<div class="row">*}
                            {*<div class="col-md-12">*}
                                {*<img src="{$d['signature_data_base64']}" style="max-height: 50px;" alt="Red dot" />*}
                            {*</div>*}
                        {*</div>*}

                        {*<div class="hr-line-dashed"></div>*}
                    {*{/if}*}

                    <div class="row">
                        <div class="col-md-12">
                            <div id="signaturePadArea">

                            </div>
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="row">
                        <div class="col-md-6">
                            <h4>Sign above</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="button" id="clearSignature" class="btn btn-danger btn-sm">Clear signature</button>
                        </div>
                    </div>

                {/if}


        </div>
    </section>



</div>




<input type="hidden" id="_url" name="_url" value="{$_url}">
<input type="hidden" id="_df" name="_df" value="{$config['df']}">
<input type="hidden" id="_lan" name="_lan" value="{$config['language']}">
<!-- END PRELOADER -->
<!-- Mainly scripts -->

<script>

    var _L = [];


    _L['Save'] = '{$_L['Save']}';
    _L['Submit'] = '{$_L['Submit']}';
    _L['Loading'] = '{$_L['Loading']}';
    _L['Media'] = '{$_L['Media']}';
    _L['OK'] = '{$_L['OK']}';
    _L['Cancel'] = '{$_L['Cancel']}';
    _L['Close'] = '{$_L['Close']}';
    _L['Close'] = '{$_L['Close']}';
    _L['are_you_sure'] = '{$_L['are_you_sure']}';
    _L['Saved Successfully'] = '{$_L['Saved Successfully']}';
    _L['Empty'] = '{$_L['Empty']}';

    var app_url = '{$app_url}';
    var base_url = '{$base_url}';

    {if ($config['animate']) eq '1'}
    var config_animate = 'Yes';
    {else}
    var config_animate = 'No';
    {/if}
    {$jsvar}
</script>





{if $config['language'] neq 'en'}

    <script src="{$app_url}ui/lib/moment/moment-with-locales.min.js"></script>

    <script>
        moment.locale('{$config['momentLocale']}');
    </script>

{else}

    <script src="{$app_url}ui/lib/moment/moment.min.js"></script>

{/if}

<script src="{$app_url}ui/assets/js/app.js?v={$file_build}_a"></script>


{if isset($xfooter)}
    {$xfooter}
{/if}

{block name=script}{/block}

<script>
    $(function () {
        $('.amount').autoNumeric('init');
    });
</script>

{if isset($config['invoice_client_can_attach_signature']) && $config['invoice_client_can_attach_signature'] == 1 }

    <script src="{$app_url}ui/lib/jSignature.min.js"></script>

    <script>



        $(function () {

            var $signaturePadArea = $("#signaturePadArea");

            $signaturePadArea.jSignature({
                color:"#000",


            });

            {if $d['signature_data_base64'] != '' }

            $signaturePadArea.jSignature("setData","{$d['signature_data_base64']}");

            {/if}

            $signaturePadArea.bind('change', function(e){
                var signData = $signaturePadArea.jSignature("getData");
                $.post( "{$_url}client/save-invoice-signature", {
                    invoice_id: '{$d['id']}',
                    view_token: '{$d['vtoken']}',
                    signData: signData,
                });
            });


            $('#clearSignature').on('click',function () {
                $signaturePadArea.jSignature("reset");
            });



        });
    </script>

{/if}

<script>
    jQuery(document).ready(function() {
        // initiate layout and plugins

        matForms();

        {if isset($xjq)}
        {$xjq}
        {/if}

        if(document.getElementById('btnPayNow'))
            {
                var $paymentGateway = $('#paymentGateway');
                $('#btnPayNow').on('click',function (e) {
                    {$plugin_extra_js}

                    {if isset($payment_gateways_by_processor['stripe'])}

                    $stripeDiv = $('#stripeDiv');

                    if($paymentGateway.val() == 'stripe')

                        e.preventDefault();

                    $stripeDiv.show('slow');

                    {/if}

                });


                {if isset($payment_gateways_by_processor['stripe'])}

                // Create a Stripe client.
                var stripe = Stripe('{$payment_gateways_by_processor['stripe']['value']}');

// Create an instance of Elements.
            var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                    color: '#32325d',
                    lineHeight: '18px',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

// Create an instance of the card Element.
            var card = elements.create('card', { style: style });

// Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

// Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

// Handle form submission.
            var form = document.getElementById('payment-form');
            var $btnStripeSubmit = $('#btnStripeSubmit');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                $btnStripeSubmit.prop('disabled',true);
                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                        $btnStripeSubmit.prop('disabled',false);
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);

                    }
                });
            });

// Submit the form with the token ID.
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();



            }

            {/if}
            }


    });

</script>
{$config['footer_scripts']}
</body>

</html>
