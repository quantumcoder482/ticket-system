<!DOCTYPE html>
<html lang="en" class="coming-soon">
<head>
    <meta charset="utf-8">
    <title>{$_title}</title>
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

    <link href="{$app_url}ui/lib/css/client_login.css" rel="stylesheet">

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
    {if $config['recaptcha'] eq '1'}
    <script src='https://www.google.com/recaptcha/api.js'></script>
    {/if}
</head>
<body class="focused-form">


<div class="container" id="registration-form">

    <a href="{$_url}client/login/" class="login-logo"><img src="{$app_url}storage/system/{$config['logo_default']}"></a>

    <div class="row">
        <div class="col-md-4 col-md-offset-4">



            <form method="post" action="{$_url}client/register_post/" id="iform">
                <div class="panel panel-default alt md-card">
                    <div class="panel-heading"><h2>{$_L['Register']}</h2></div>
                    <div class="panel-body">
                        <form action="" class="">
                            <div class="form-group">
                                <label for="fullname" class="control-label">Full Name</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name">
                            </div>

                            <div class="form-group">
                                <label for="email" class="control-label">Email Address</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="someone@example.com">
                            </div>


                            {*<div class="form-group">*}
                                {*<label for="phone" class="control-label">Phone</label>*}
                                {*<input type="text" class="form-control" id="phone" name="phone">*}
                            {*</div>*}

                            <div class="form-group">
                                <label for="password" class="control-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="******">
                            </div>
                            <div class="form-group">
                                <label for="password2" class="control-label">Confirm Password</label>
                                <input type="password" class="form-control" id="password2" name="password2" placeholder="******">
                            </div>

                            {foreach $extra_fields as $field}

                                <div class="form-group">
                                    <label for="{$field['id']}" class="control-label">{$field['label']}</label>
                                    <input type="text" class="form-control" id="{$field['id']}" name="{$field['name']}" {if isset($field['placeholder'])}placeholder="{$field['placeholder']}"{/if}>
                                    {if isset($field['help_block'])}<span class="help-block">{$field['help_block']}</span>{/if}
                                </div>



                            {/foreach}


                            {if $config['recaptcha'] eq '1'}
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="{$config['recaptcha_sitekey']}"></div>
                                </div>
                            {/if}


                        </form>
                    </div>
                    <div class="panel-footer">
                        <div class="clearfix">
                            <a href="{$_url}client/login/" class="pull-left mt-xs">Already Registered? Login</a>
                            <button type="submit" id="btn_form_action" class="btn btn-primary pull-right">Register</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
<script>
    jQuery(document).ready(function() {
        // initiate layout and plugins

        matForms();

        {if isset($xjq)}
        {$xjq}
        {/if}

    });

</script>

</body>
</html>