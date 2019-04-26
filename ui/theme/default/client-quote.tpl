<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{$_L['Quote']} - {$d['invoicenum']}{if $d['cn'] neq ''} {$d['cn']} {else} {$d['id']} {/if}</title>

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
    <link href="{$app_url}ui/lib/css/ribbon.css" rel="stylesheet">

    {if $config['rtl'] eq '1'}
        <link href="{$_theme}/css/bootstrap-rtl.min.css" rel="stylesheet">
        <link href="{$_theme}/css/style-rtl.min.css" rel="stylesheet">
    {/if}

    {if isset($xheader)}
        {$xheader}
    {/if}
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
            font-size: 14px;
        }

        .panel {

             box-shadow: none;

        }
    </style>
</head>

<body class="fixed-nav">

<div class="paper">

    <section class="panel">
        <div class="panel-body">

            <div class="invoice">
                <header class="clearfix">
                    <div class="text-right">

                        <br>

                        <a href="{$_url}client/qpdf/{$d['id']}/token_{$d['vtoken']}" class="btn btn-primary ml-sm"><i class="fa fa-print"></i> {$_L['View PDF']}</a>
                        <a href="{$_url}client/qpdf/{$d['id']}/token_{$d['vtoken']}/dl/" class="btn btn-info ml-sm"><i class="fa fa-file-pdf-o"></i> {$_L['Download PDF']}</a>



                        {if ($d['stage'] neq 'Accepted')}
                            <a href="{$_url}client/q_accept/{$d['id']}/token_{$d['vtoken']}" class="btn btn-green ml-sm">{$_L['Accept']}</a>
                        {/if}

                        {if ($d['stage'] neq 'Lost')}
                            <a href="{$_url}client/q_decline/{$d['id']}/token_{$d['vtoken']}" class="btn btn-danger ml-sm">{$_L['Decline']}</a>
                        {/if}





                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-md">
                            <h2 class="h2 mt-none mb-sm text-dark text-bold">{$config['CompanyName']}</h2>
                            <h4 class="h4 m-none text-dark text-bold">{$_L['Quote']} #{$d['invoicenum']}{if $d['cn'] neq ''} {$d['cn']} {else} {$d['id']} {/if}</h4>

                        </div>

                    </div>
                </header>
                <div class="bill-info">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="bill-to">
                                <p class="h5 mb-xs text-dark text-semibold"><strong>{$_L['Recipient']}:</strong></p>
                                <address>
                                    {if $a['company'] neq ''}
                                        {$a['company']}
                                        <br>
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

                                <div class="ib">
                                    <img src="{$app_url}storage/system/{$config['logo_default']}" alt="Logo" style="margin-bottom: 15px;">

                                </div>

                                <address class="ib mr-xlg">
                                    {$config['caddress']}
                                </address>

                                <p class="mb-none mt-lg">
                                    <span class="text-dark">{$_L['Date Created']}:</span>
                                    <span class="value">{date( $config['df'], strtotime($d['datecreated']))}</span>
                                </p>
                                <p class="mb-none">
                                    <span class="text-dark">{$_L['Expiry Date']}:</span>
                                    <span class="value">{date( $config['df'], strtotime($d['validuntil']))}</span>
                                </p>
                                <h2> {$_L['Total']}: {$config['currency_code']} {number_format($d['total'],2,$config['dec_point'],$config['thousands_sep'])} </h2>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <hr>

                        <strong>{$d['subject']}</strong>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        {$d['proposal']}
                        <hr>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table invoice-items">
                        <thead>
                        <tr class="h4 text-dark">
                            <th id="cell-id" class="text-semibold">#</th>
                            <th id="cell-item" class="text-semibold">{$_L['Item']}</th>

                            <th id="cell-price" class="text-center text-semibold">{$_L['Price']}</th>
                            <th id="cell-qty" class="text-center text-semibold">{$_L['Quantity']}</th>
                            <th id="cell-total" class="text-center text-semibold">{$_L['Total']}</th>
                        </tr>
                        </thead>
                        <tbody>
                        {foreach $items as $item}
                            <tr>
                                <td>{$item['itemcode']}</td>
                                <td class="text-semibold text-dark">{$item['description']}</td>

                                <td class="text-center nowrap">{$config['currency_code']} {number_format($item['amount'],2,$config['dec_point'],$config['thousands_sep'])}</td>
                                <td class="text-center nowrap">{$item['qty']}</td>
                                <td class="text-center nowrap">{$config['currency_code']} {number_format($item['total'],2,$config['dec_point'],$config['thousands_sep'])}</td>
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
                                    <td colspan="2">{$_L['Subtotal']}</td>
                                    <td class="text-left">{$config['currency_code']} {number_format($d['subtotal'],2,$config['dec_point'],$config['thousands_sep'])}</td>
                                </tr>
                                {if ($d['discount']) neq '0.00'}
                                    <tr>
                                        <td colspan="2">{$_L['Discount']}</td>
                                        <td class="text-left">{$config['currency_code']} {number_format($d['discount'],2,$config['dec_point'],$config['thousands_sep'])}</td>
                                    </tr>
                                {/if}
                                <tr>
                                    <td colspan="2">{$d['taxname']}</td>
                                    <td class="text-left">{$config['currency_code']} {number_format($d['tax1'],2,$config['dec_point'],$config['thousands_sep'])}</td>
                                </tr>

                                <tr class="h4">
                                    <td colspan="2">{$_L['Grand Total']}</td>
                                    <td class="text-left">{$config['currency_code']} {number_format($d['total'],2,$config['dec_point'],$config['thousands_sep'])}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        {$d['customernotes']}
                    </div>
                </div>
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


<script src="{$app_url}ui/lib/fancybox/fancybox.min.js?ver={$file_build}"></script>

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

        $('#app_media').fancybox({
            'width'		: 900,
            'height'	: 600,
            'type'		: 'iframe',
            'autoScale'    	: false,
            buttons : [

                'fullScreen',
                'close'
            ]
        });

    });

</script>
{$config['footer_scripts']}
</body>

</html>
