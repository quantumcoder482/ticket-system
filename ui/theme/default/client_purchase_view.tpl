<!DOCTYPE html>


<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{$_L['INVOICE']} - {$d['invoicenum']}{if $d['cn'] neq ''} {$d['cn']} {else} {$d['id']} {/if}</title>
    <link rel="shortcut icon" href="{$app_url}storage/icon/favicon.ico" type="image/x-icon" />
    <link href="{$theme}default/css/bootstrap.min.css" rel="stylesheet">
    <link href="{$assets}/css/font-awesome.min.css?ver={$file_build}" rel="stylesheet">
    <link href="{$app_url}ui/lib/icheck/skins/square/blue.css" rel="stylesheet">
    <link href="{$app_url}ui/lib/css/animate.css" rel="stylesheet">
    <link href="{$app_url}ui/lib/toggle/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="{$app_url}ui/lib/flag-icon/css/flag-icon.min.css" rel="stylesheet">
    <link href="{$assets}fonts/open-sans/open-sans.css?ver=4.0.1" rel="stylesheet">
    <link href="{$theme}default/css/style.css?ver={$file_build}" rel="stylesheet">
    <link href="{$theme}default/css/component.css?ver={$file_build}" rel="stylesheet">
    <link href="{$theme}default/css/custom.css?ver={$file_build}" rel="stylesheet">
    <link href="{$app_url}ui/lib/icons/css/ibilling_icons.css" rel="stylesheet">
    <link href="{$theme}default/css/material.css" rel="stylesheet">

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

    <style>
        .panel {

             box-shadow: none;

        }
    </style>

    {block name=style}{/block}

    {$config['header_scripts']}
    <style type="text/css">
        body {

            background-color: #FAFAFA;
            overflow-x: visible;
        }
        .paper {
            margin: 50px auto;
            width: 980px;
            border: 2px solid #DDD;
            background-color: #FFF;
            position: relative;

        }
    </style>
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

                    <div class="text-right">
                        {if ($d['stage'] neq 'Accepted')}
                            <a href="{$_url}supplier/p_accept/{$d['id']}/token_{$d['vtoken']}" class="btn btn-green ml-sm">{$_L['Accept']}</a>
                        {/if}

                        {if ($d['stage'] neq 'Declined')}
                            <a href="{$_url}supplier/p_decline/{$d['id']}/token_{$d['vtoken']}" class="btn btn-danger ml-sm">{$_L['Decline']}</a>
                        {/if}
                    </div>

                    <div class="row">
                        <div class="col-sm-6 mt-md">
                            <h2 class="h2 mt-none mb-sm text-dark text-bold">{$_L['Purchase']}</h2>
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
                                <p class="h5 mb-xs text-dark text-semibold"><strong>{$_L['Supplier']}</strong></p>
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

                                    <span class="text-dark">{$_L['Issued at']}</span>

                                    {*<span class="text-dark">Issued at</span>*}

                                    <span class="value">{date( $config['df'], strtotime($d['date']))}</span>
                                </p>

                                {*<p class="mb-none">*}
                                    {*<span class="text-dark">{$_L['Due Date']}:</span>*}
                                    {*<span class="value">{date( $config['df'], strtotime($d['duedate']))}</span>*}
                                {*</p>*}

                                <h2> {$_L['Invoice Total']}: {ib_money_format($d['total'],$config,$d['currency_symbol'])} </h2>
                                {if ($d['credit']) neq '0.00'}
                                    <h2> {$_L['Total Paid']}: {ib_money_format($d['credit'],$config,$d['currency_symbol'])}</h2>
                                    <h2> {$_L['Amount Due']}: {ib_money_format($i_due,$config,$d['currency_symbol'])}</h2>
                                {/if}
                                {if (($d['status']) neq 'Paid') AND (ib_pg_count() neq '0' AND (($d['status']) neq 'Cancelled'))}
                                    {*<form class="form-inline" method="post" action="{$_url}client/ipay/{$d['id']}/token_{$d['vtoken']}">*}

                                        {*<div class="form-group has-success">*}
                                            {*<select class="form-control" name="pg" id="pg">*}
                                                {*{foreach $pgs as $pg}*}
                                                    {*<option value="{$pg['processor']}">{$pg['name']}</option>*}
                                                {*{/foreach}*}
                                            {*</select>*}
                                        {*</div>*}
                                        {*<button type="submit" class="btn btn-primary ml-sm"><i class="fa fa-credit-card"></i> {$_L['Pay Now']}</button>*}
                                    {*</form>*}

                                    {if $a->balance > 0 && $d->is_credit_invoice neq 1}
                                        <hr>
                                        <h3> Your Current Balance: <span class="amount">{$a->balance}</span> </h3>
                                        <a class="btn btn-primary" href="{$_url}client/pay_with_credit/{$d->id}/token_{$d->vtoken}"> Pay with Credit</a>
                                        <hr>
                                    {/if}

                                {/if}

                                {*<a href="{$_url}client/ipay/{$d['id']}/token_{$d['vtoken']}" class="btn btn-info ml-sm"><i class="fa fa-credit-card"></i> Pay Now</a>*}

                            </div>
                        </div>
                    </div>

                    {if $d['subject'] neq ''}
                        <div class="row">
                            <div class="col-md-12">
                                <hr>

                                <strong>{$d['subject']}</strong>

                                <hr>

                            </div>
                        </div>
                    {/if}

                </div>

                <div class="table-responsive">
                    <table class="table invoice-items">
                        <thead>
                        <tr class="h4 text-dark">
                            <th id="cell-id" class="text-semibold">#</th>
                            <th id="cell-item" class="text-semibold">{$_L['Item']}</th>

                            <th id="cell-price" class="text-center text-semibold">{$_L['Price']}</th>
                            {*<th id="cell-qty" class="text-center text-semibold">{$_L['Quantity']}</th>*}
                            <th id="cell-qty" class="text-center text-semibold">{if $d['show_quantity_as'] eq '' || $d['show_quantity_as'] eq '1'}{$_L['Qty']}{else}{$d['show_quantity_as']}{/if}</th>
                            <th id="cell-total" class="text-center text-semibold">{$_L['Total']}</th>
                        </tr>
                        </thead>
                        <tbody>

                        {foreach $items as $item}
                            <tr>
                                <td>{$item['itemcode']}</td>
                                <td class="text-semibold text-dark">{$item['description']}</td>

                                <td class="text-center">{ib_money_format($item['amount'],$config,$d['currency_symbol'])}</td>
                                <td class="text-center">{$item['qty']}</td>
                                <td class="text-center">{ib_money_format($item['total'],$config,$d['currency_symbol'])}</td>
                            </tr>
                        {/foreach}

                        </tbody>
                    </table>
                </div>

                <div class="invoice-summary">
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-8">
                            <table class="table h5 text-dark">
                                <tbody>
                                <tr class="b-top-none">
                                    <td colspan="2">{$_L['Sub Total']}</td>
                                    <td class="text-left">{ib_money_format($d['subtotal'],$config,$d['currency_symbol'])}</td>
                                </tr>

                                {if ($d['discount']) neq '0.00'}
                                    <tr>
                                        <td colspan="2">{$_L['Discount']}
                                            {if $d['discount_type'] eq 'p'}({$d['discount_value']}%){/if}
                                        </td>
                                        <td class="text-left">{ib_money_format($d['discount'],$config,$d['currency_symbol'])}</td>
                                    </tr>
                                {/if}

                                <tr>
                                    <td colspan="2">{$_L['TAX']}</td>
                                    <td class="text-left">{ib_money_format($d['tax'],$config,$d['currency_symbol'])}</td>
                                </tr>
                                {if ($d['credit']) neq '0.00'}
                                    <tr>
                                        <td colspan="2">{$_L['Total']}</td>
                                        <td class="text-left">{ib_money_format($d['total'],$config,$d['currency_symbol'])}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">{$_L['Total Paid']}</td>
                                        <td class="text-left">{ib_money_format($d['credit'],$config,$d['currency_symbol'])}</td>
                                    </tr>
                                    <tr class="h4">
                                        <td colspan="2">{$_L['Amount Due']}</td>
                                        <td class="text-left">{ib_money_format($i_due,$config,$d['currency_symbol'])}</td>
                                    </tr>
                                {else}
                                    <tr class="h4">
                                        <td colspan="2">{$_L['Grand Total']}</td>
                                        <td class="text-left">{ib_money_format($d['total'],$config,$d['currency_symbol'])}</td>
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
            <div class="text-right">

                <br>
                <a href="{$_url}supplier/dashboard/" class="btn btn-primary ml-sm no-shadow no-border"><i class="fa fa-long-arrow-left"></i> Back to Supplier Area</a>
                <a href="{$_url}supplier/purchase_pdf/{$d['id']}/token_{$d['vtoken']}/dl/" class="btn btn-primary buttons-pdf ml-sm"><i class="fa fa-file-pdf-o"></i> {$_L['Download PDF']}</a>
                <a href="{$_url}supplier/purchase_pdf/{$d['id']}/token_{$d['vtoken']}/view/" class="btn btn-primary buttons-excel ml-sm"><i class="fa fa-file-text-o"></i> {$_L['View PDF']}</a>
                <a href="{$_url}supplier/purchase_print/{$d['id']}/token_{$d['vtoken']}" target="_blank" class="btn btn-primary buttons-print ml-sm"><i class="fa fa-print"></i> {$_L['Printable Version']}</a>
            </div>
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



<script src="{$app_url}ui/lib/cloudonex.js"></script>

{if $config['language'] neq 'en'}

    <script src="{$app_url}ui/lib/moment/moment-with-locales.min.js"></script>

    <script>
        moment.locale('{$config['momentLocale']}');
    </script>

{else}

    <script src="{$app_url}ui/lib/moment/moment.min.js"></script>

{/if}




<script src="{$app_url}ui/lib/app.js?ver={$file_build}"></script>
<script src="{$app_url}ui/lib/numeric.js?ver={$file_build}"></script>
<script src="{$app_url}ui/lib/toggle/bootstrap-toggle.min.js"></script>




<!-- iCheck -->
<script src="{$app_url}ui/lib/icheck/icheck.min.js"></script>
<script src="{$theme}default/js/theme.js?ver={$file_build}"></script>


{if isset($xfooter)}
    {$xfooter}
{/if}

{block name=script}{/block}

<script>
    jQuery(document).ready(function() {
        // initiate layout and plugins

        matForms();

        {if isset($xjq)}
        {$xjq}
        {/if}

    });

</script>
{$config['footer_scripts']}
</body>

</html>
