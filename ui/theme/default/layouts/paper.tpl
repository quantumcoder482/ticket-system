<!DOCTYPE html>



<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{$_title}</title>
    <link rel="shortcut icon" href="{$app_url}storage/icon/favicon.ico" type="image/x-icon" />


    <link href="{$_theme}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{$assets}/css/font-awesome.min.css?ver={$file_build}" rel="stylesheet">
    <link href="{$_theme}/lib/icheck/skins/all.css" rel="stylesheet">
    <link href="{$app_url}ui/lib/css/animate.css" rel="stylesheet">
    <link href="{$app_url}ui/lib/toggle/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="{$_theme}/css/style.css?ver=2.0.1" rel="stylesheet">
    <link href="{$_theme}/css/component.css?ver=2.0.1" rel="stylesheet">
    <link href="{$_theme}/css/custom.css" rel="stylesheet">


    <link href="{$app_url}ui/lib/icons/css/ibilling_icons.css" rel="stylesheet">


    <link href="{$_theme}/css/material.css" rel="stylesheet">

    <link href="{$_theme}/css/{$config['nstyle']}.css" rel="stylesheet">

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

    {$config['header_scripts']}
    <style type="text/css">
        body {

            background-color: #FAFAFA;
            overflow-x: visible;
        }
        .paper {
            margin: 50px auto;
            max-width: 980px;
            border: 2px solid #DDD;
            background-color: #FFF;
            position: relative;

        }
    </style>
</head>

<body class="fixed-nav">


{block name="content"}{/block}



<script src="{$_theme}/js/jquery-1.10.2.js"></script>
<script src="{$_theme}/js/jquery-ui-1.10.4.min.js"></script>
<script>
    var _L = [];
    var base_url = '{$base_url}';
    var config_animate = 'No';
    {if ($config['animate']) eq '1'}
    var config_animate = 'Yes';
    {/if}
    {$jsvar}
</script>
<script src="{$_theme}/js/bootstrap.min.js"></script>
<script src="{$_theme}/js/jquery.metisMenu.js"></script>
<script src="{$_theme}/js/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<script src="{$_theme}/lib/moment.js"></script>
<script src="{$app_url}/ui/lib/blockui.js"></script>
<script src="{$app_url}/ui/lib/toggle/bootstrap-toggle.min.js"></script>

<script src="{$app_url}/ui/lib/numeric.js"></script>

<script src="{$app_url}/ui/lib/app.js"></script>

<script src="{$_theme}/js/theme.js"></script>

{if ($config['animate']) eq '1'}
    <script src="{$_theme}/js/pace.min.js"></script>
{/if}
<script src="{$_theme}/lib/progress.js"></script>
<script src="{$_theme}/lib/bootbox.min.js"></script>

<!-- iCheck -->
<script src="{$_theme}/lib/icheck/icheck.min.js"></script>
{if isset($xfooter)}
    {$xfooter}
{/if}
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