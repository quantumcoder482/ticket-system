<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{$app_url}storage/icon/favicon.ico" type="image/x-icon" />
    <title>{$_title}</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ionicons@4.2.5/dist/css/ionicons.min.css">
    <link href="{$app_url}ui/theme/default/css/auth.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        body {
            background: #f8f9fa;
        }
    </style>

    {if $type == 'register' && $config['recaptcha'] eq '1'}
<script src='https://www.google.com/recaptcha/api.js'></script>
    {/if}

    {if isset($config['config_recaptcha_in_client_login']) && $config['config_recaptcha_in_client_login'] == 1 && $type == 'login'}

        {if $config['recaptcha'] eq '1'}
            <script src='https://www.google.com/recaptcha/api.js'></script>
        {/if}

    {/if}

</head>

<body>
<div class="main-wrapper">
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center">
        <div class="auth-box">
            <div id="loginform">
                <div class="logo" style="margin-bottom: 20px;">
                    <span class="db"><img src="{$app_url}storage/system/{$config['logo_default']}"></span>

                </div>
                <!-- Form -->
                <div class="row">
                    <div class="col-12">
                        {if $type == 'login'}
                            <form class="form-horizontal m-t-20" id="loginform" action="{$_url}client/auth/" method="post">
                                {if isset($notify)}
                                    {$notify}
                                {/if}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ion-ios-person"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" name="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ion-ios-unlock"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                                </div>

                                {if isset($config['config_recaptcha_in_client_login']) && $config['config_recaptcha_in_client_login'] == 1 && $type == 'login'}

                                    {if $config['recaptcha'] eq '1'}
                                        <div class="form-group mb-3">
                                            <div class="g-recaptcha" data-sitekey="{$config['recaptcha_sitekey']}"></div>
                                        </div>
                                    {/if}

                                {/if}


                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">{$_L['Remember me']}</label>
                                            <a href="{$_url}client/forgot_pw/" id="to-recover" class="text-dark float-right">{$_L['Forgot password']}</a>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                        <button class="btn btn-block btn-lg btn-info" type="submit">{$_L['Login']}</button>
                                    </div>
                                </div>

                                {if $config['allow_customer_registration'] eq '1'}
                                    <div class="form-group m-b-0 m-t-10">
                                        <div class="col-sm-12 text-center">
                                            {$_L['Dont have an account']} <a href="{$_url}client/register/" class="text-info m-l-5"><b>{$_L['Register']}</b></a>
                                        </div>
                                    </div>
                                {/if}

                            </form>

                            {elseif $type == 'register'}

                            <form class="form-horizontal m-t-20" id="loginform" method="post" action="{$_url}client/register_post/">
                                {if isset($notify)}
                                    {$notify}
                                {/if}

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ion-ios-person"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" name="fullname" placeholder="{$_L['Full_Name']}">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ion-ios-mail"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" name="email" placeholder="{$_L['Email']}">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ion-ios-unlock"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg" name="password" placeholder="{$_L['Password']}">
                                </div>



                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ion-ios-unlock"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg" name="password2" placeholder="{$_L['Confirm_Password']}">
                                </div>

                                {foreach $extra_fields as $field}


                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ion-md-more"></i></span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg" id="{$field['id']}" name="{$field['name']}" placeholder="{$field['label']}">
                                    </div>

                                {/foreach}

                                {if $config['recaptcha'] eq '1'}
                                    <div class="form-group mb-3">
                                        <div class="g-recaptcha" data-sitekey="{$config['recaptcha_sitekey']}"></div>
                                    </div>
                                {/if}


                                <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                        <button class="btn btn-block btn-lg btn-info" type="submit">{$_L['Register']}</button>
                                    </div>
                                </div>

                                <div class="form-group m-b-0 m-t-10">
                                    <div class="col-sm-12 text-center">
                                        {$_L['Already registered']}  <a href="{$_url}client/login/" class="text-info m-l-5"><b>{$_L['Login']}</b></a>
                                    </div>
                                </div>

                            </form>

                            {elseif $type == 'forgot_password'}

                            <form class="form-horizontal m-t-20" id="loginform" action="{$_url}client/forgot_pw_post/" method="post">
                                {if isset($notify)}
                                    {$notify}
                                {/if}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ion-ios-person"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" name="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                </div>

                                {if isset($config['config_recaptcha_in_client_login']) && $config['config_recaptcha_in_client_login'] == 1 && $type == 'login'}

                                    {if $config['recaptcha'] eq '1'}
                                        <div class="form-group mb-3">
                                            <div class="g-recaptcha" data-sitekey="{$config['recaptcha_sitekey']}"></div>
                                        </div>
                                    {/if}

                                {/if}

                                <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                        <button class="btn btn-block btn-lg btn-info" type="submit">{$_L['Reset Password']}</button>
                                    </div>
                                </div>

                                {if $config['allow_customer_registration'] eq '1'}
                                    <div class="form-group m-b-0 m-t-10">
                                        <div class="col-sm-12 text-center">
                                            {$_L['Dont have an account']} <a href="{$_url}client/register/" class="text-info m-l-5"><b>{$_L['Register']}</b></a>
                                        </div>
                                    </div>
                                {/if}

                            </form>

                        {/if}
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

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

<script src="{$app_url}ui/assets/js/app.js?v={$file_build}"></script>
</body>

</html>