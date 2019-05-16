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
            font-size: 16px;
        }
        .panel {
             box-shadow: none;
             margin:20px 50px;
        }

        hr {
            margin:20px auto 20px; 
            border-top:2px solid #282C34;
        }
        div.signature {
            width:150px;
            margin:auto;
        }
        div.signature p{
            margin: 0px;
            padding: 0px;
            text-align: left;
            font-size: 10px;
        }
        div.signature p:first-child{
            font-size: 18px;
        }
        div.signature hr{
            margin:0;
            border-top: 1px solid #908989;
        }

        .static-title {
            margin: 0px auto 20px; 
            text-align: center;
            font-size: 1.5em;
            font-weight: 600;
        }

        .title {
            margin: 10px 0px 10px;
            text-align: left;
            font-size: 1.2em;
            font-weight: 600;
            line-height: 1.5;
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

                        {if ($d['stage'] eq 'Accepted')}
                        <a href="{$_url}client/qpdf/{$d['id']}/token_{$d['vtoken']}" class="btn btn-primary ml-sm"><i class="fa fa-print"></i> {$_L['View PDF']}</a>
                        <a href="{$_url}client/qpdf/{$d['id']}/token_{$d['vtoken']}/dl/" class="btn btn-info ml-sm"><i class="fa fa-file-pdf-o"></i> {$_L['Download PDF']}</a>
                        {/if}

                        {if ($d['stage'] neq 'Accepted')}
                            <a href="{$_url}client/q_accept/{$d['id']}/token_{$d['vtoken']}" class="btn btn-green ml-sm">{$_L['Accept']}</a>
                        {/if}

                        {if ($d['stage'] neq 'Declined')}
                            <a href="{$_url}client/q_decline/{$d['id']}/token_{$d['vtoken']}" class="btn btn-danger ml-sm">{$_L['Decline']}</a>
                        {/if}

                    </div>

                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-8">
                            <div class="ib">
                                <img src="{$app_url}storage/system/{$config['logo_default']}" alt="Logo" style="margin-bottom: 15px;">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <address class="ib">
                                {$config['caddress']}
                            </address>
                        </div>
                    </div>
                    <hr>
                </header>
                <div class="bill-info"> 
                    
                    <div class="row">
                        <div class="col-md-12 mt-md">
                            <h4 class="static-title">ACCEPTANCE & COPYRIGHT AGREEMENT</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-7">
                            <div class="bill-to">
                                <address>
                                    {if $a['company'] neq ''}
                                        {$_L['ATTN']}:
                                        <br>
                                        {$d['account']}
                                        <br>
                                        {$a['company']}
                                        <br>
                                    {else}
                                        {$_L['ATTN']}:
                                        <br>
                                        {$d['account']}
                                        <br>
                                    {/if}

                                    {$a['address']} <br>
                                    {$a['city']} <br>
                                    {$a['state']} - {$a['zip']} <br>
                                    {$a['country']}
                                    <br>
                                    {$_L['Phone']}: {$a['phone']}
                                    <br>
                                    {$_L['Email']}: {$a['email']}
                                    {foreach $cf as $cfs}
                                        <br>
                                        {$cfs['fieldname']}:  {get_custom_field_value($cfs['id'],$a['id'])}
                                    {/foreach}

                                    {$x_html}
                                </address>

                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="bill-data text-left">

                                <div class="col-md-6">
                                    Submission ID:
                                    <br>
                                    Date Accepeted:
                                    <br>
                                    Month Published:
                                    <br>
                                    Copyright Status:
                                    <br>
                                </div>
                                <div class="col-md-6">
                                   {if $d['cn'] neq ''} {$d['cn']} {else} {$d['id']} {/if}
                                    <br>
                                    {date( $config['df'], strtotime($d['datecreated']))}
                                    <br>
                                    {date( 'F Y', strtotime($d['validuntil']))}
                                    <br>
                                    {$d['stage']}
                                    <br>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <h4 class="title">{$d['subject']}</h4>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        
                        {$d['proposal']}
                        
                    </div>
                   
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="title">Copyright Agreement:</h4>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-12" style="font-size:0.8em">

                        {$d['customernotes']}

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 text-center">
                        {if $d['stage'] eq 'Accepted'}
                        <div class="signature">
                            <p>Signature valid</p>
                            <p style="float:left">
                                Digitally signed by<br>
                                {$a->account}<br>
                                {date($config['df'], strtotime($d['dateaccepted']))}<br>
                            </p>
                            <p><img src="{$app_url}ui/assets/img/apply-icon.png" width="50px" height="43px"></p>
                            <hr>
                            
                        </div>
                        {/if}


                    </div>
                    <div class="col-md-6 text-center">
                        <div class="signature">
                            <p>Signature valid</p>
                            <p style="float:left">
                                Digitally signed by<br>
                                {$admin->fullname}<br>
                                {date($config['df'], strtotime($d['datecreated']))}<br>
                            </p>
                            <p><img src="{$app_url}ui/assets/img/apply-icon.png" width="50px" height="43pxs"></p>
                            <hr>
                         </div>
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
