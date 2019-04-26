<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{$_L['Login']} - {$_title}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="{$_theme}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{$_theme}/lib/fa/css/font-awesome.min.css" rel="stylesheet">


    <!-- ionicons -->
    <link href="{$_theme}/css/logincss.css" rel="stylesheet">

    {if $config['rtl'] eq '1'}
        <link href="{$_theme}/css/bootstrap-rtl.min.css" rel="stylesheet">
        <link href="{$_theme}/css/style-rtl.min.css" rel="stylesheet">
    {/if}

    {if isset($config['config_recaptcha_in_admin_login']) && $config['config_recaptcha_in_admin_login'] == 1}

        {if $config['recaptcha'] eq '1'}
            <script src='https://www.google.com/recaptcha/api.js'></script>
        {/if}

    {/if}

</head>

<body class="overflow-hidden light-background">
<div class="wrapper no-navigation preload">
    <div class="sign-in-wrapper">
        <div class="sign-in-inner">
            <div class="login-brand text-center">
                <img class="logo" src="{$app_url}storage/system/{$config['logo_default']}" alt="Logo">

            </div>
            {if isset($notify)}
                {$notify}
            {/if}
            <form class="login" method="post" action="{$_url}login/post/{if isset($after)}{$after}/{/if}">
                <div class="form-group m-bottom-md">
                    <input type="text" class="form-control" id="username" name="username" placeholder="{$_L['Email Address']}">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="{$_L['Password']}">
                </div>


                {if isset($config['config_recaptcha_in_admin_login']) && $config['config_recaptcha_in_admin_login'] == 1}

                    {if $config['recaptcha'] eq '1'}
                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="{$config['recaptcha_sitekey']}"></div>
                        </div>
                    {/if}

                {/if}

                <div class="m-top-md p-top-sm">

                    <button class="btn btn-success block full-width" name="login" type="submit">{$_L['Sign in']}</button>
                </div>

                <div class="m-top-md p-top-sm">
                    <div class="font-12 text-center m-bottom-xs">
                        <a href="{$_url}admin/forgot-pw/" class="font-12">{$_L['Forgot password']}</a>

                    </div>


                </div>
            </form>
        </div><!-- ./sign-in-inner -->
    </div><!-- ./sign-in-wrapper -->
</div><!-- /wrapper -->



<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!-- Jquery -->
<script src="{$_theme}/js/jquery-1.10.2.js"></script>

<!-- Bootstrap -->
<script src="{$_theme}/js/bootstrap.min.js"></script>


</body>
</html>
