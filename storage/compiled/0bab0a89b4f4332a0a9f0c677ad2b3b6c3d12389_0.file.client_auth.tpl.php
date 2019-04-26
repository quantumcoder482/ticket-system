<?php
/* Smarty version 3.1.33, created on 2018-11-07 08:22:29
  from '/Users/razib/Documents/valet/suite/ui/theme/default/client_auth.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5be2e715e4e090_00015012',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0bab0a89b4f4332a0a9f0c677ad2b3b6c3d12389' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/client_auth.tpl',
      1 => 1541596894,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be2e715e4e090_00015012 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/icon/favicon.ico" type="image/x-icon" />
    <title><?php echo $_smarty_tpl->tpl_vars['_title']->value;?>
</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ionicons@4.2.5/dist/css/ionicons.min.css">
    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/theme/default/css/auth.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
    <style>
        body {
            background: #f8f9fa;
        }
    </style>

    <?php if ($_smarty_tpl->tpl_vars['type']->value == 'register' && $_smarty_tpl->tpl_vars['config']->value['recaptcha'] == '1') {
echo '<script'; ?>
 src='https://www.google.com/recaptcha/api.js'><?php echo '</script'; ?>
>
    <?php }?>

    <?php if (isset($_smarty_tpl->tpl_vars['config']->value['config_recaptcha_in_client_login']) && $_smarty_tpl->tpl_vars['config']->value['config_recaptcha_in_client_login'] == 1 && $_smarty_tpl->tpl_vars['type']->value == 'login') {?>

        <?php if ($_smarty_tpl->tpl_vars['config']->value['recaptcha'] == '1') {?>
            <?php echo '<script'; ?>
 src='https://www.google.com/recaptcha/api.js'><?php echo '</script'; ?>
>
        <?php }?>

    <?php }?>

</head>

<body>
<div class="main-wrapper">
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center">
        <div class="auth-box">
            <div id="loginform">
                <div class="logo" style="margin-bottom: 20px;">
                    <span class="db"><img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/system/<?php echo $_smarty_tpl->tpl_vars['config']->value['logo_default'];?>
"></span>

                </div>
                <!-- Form -->
                <div class="row">
                    <div class="col-12">
                        <?php if ($_smarty_tpl->tpl_vars['type']->value == 'login') {?>
                            <form class="form-horizontal m-t-20" id="loginform" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/auth/" method="post">
                                <?php if (isset($_smarty_tpl->tpl_vars['notify']->value)) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

                                <?php }?>
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

                                <?php if (isset($_smarty_tpl->tpl_vars['config']->value['config_recaptcha_in_client_login']) && $_smarty_tpl->tpl_vars['config']->value['config_recaptcha_in_client_login'] == 1 && $_smarty_tpl->tpl_vars['type']->value == 'login') {?>

                                    <?php if ($_smarty_tpl->tpl_vars['config']->value['recaptcha'] == '1') {?>
                                        <div class="form-group mb-3">
                                            <div class="g-recaptcha" data-sitekey="<?php echo $_smarty_tpl->tpl_vars['config']->value['recaptcha_sitekey'];?>
"></div>
                                        </div>
                                    <?php }?>

                                <?php }?>


                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Remember me'];?>
</label>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/forgot_pw/" id="to-recover" class="text-dark float-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Forgot password'];?>
</a>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                        <button class="btn btn-block btn-lg btn-info" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Login'];?>
</button>
                                    </div>
                                </div>

                                <?php if ($_smarty_tpl->tpl_vars['config']->value['allow_customer_registration'] == '1') {?>
                                    <div class="form-group m-b-0 m-t-10">
                                        <div class="col-sm-12 text-center">
                                            <?php echo $_smarty_tpl->tpl_vars['_L']->value['Dont have an account'];?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/register/" class="text-info m-l-5"><b><?php echo $_smarty_tpl->tpl_vars['_L']->value['Register'];?>
</b></a>
                                        </div>
                                    </div>
                                <?php }?>

                            </form>

                            <?php } elseif ($_smarty_tpl->tpl_vars['type']->value == 'register') {?>

                            <form class="form-horizontal m-t-20" id="loginform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/register_post/">
                                <?php if (isset($_smarty_tpl->tpl_vars['notify']->value)) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

                                <?php }?>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ion-ios-person"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" name="fullname" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Full_Name'];?>
">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ion-ios-mail"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" name="email" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Email'];?>
">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ion-ios-unlock"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg" name="password" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Password'];?>
">
                                </div>



                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ion-ios-unlock"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg" name="password2" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Confirm_Password'];?>
">
                                </div>

                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['extra_fields']->value, 'field');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['field']->value) {
?>


                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ion-md-more"></i></span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg" id="<?php echo $_smarty_tpl->tpl_vars['field']->value['id'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>
" placeholder="<?php echo $_smarty_tpl->tpl_vars['field']->value['label'];?>
">
                                    </div>

                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                <?php if ($_smarty_tpl->tpl_vars['config']->value['recaptcha'] == '1') {?>
                                    <div class="form-group mb-3">
                                        <div class="g-recaptcha" data-sitekey="<?php echo $_smarty_tpl->tpl_vars['config']->value['recaptcha_sitekey'];?>
"></div>
                                    </div>
                                <?php }?>


                                <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                        <button class="btn btn-block btn-lg btn-info" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Register'];?>
</button>
                                    </div>
                                </div>

                                <div class="form-group m-b-0 m-t-10">
                                    <div class="col-sm-12 text-center">
                                        <?php echo $_smarty_tpl->tpl_vars['_L']->value['Already registered'];?>
  <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/login/" class="text-info m-l-5"><b><?php echo $_smarty_tpl->tpl_vars['_L']->value['Login'];?>
</b></a>
                                    </div>
                                </div>

                            </form>

                            <?php } elseif ($_smarty_tpl->tpl_vars['type']->value == 'forgot_password') {?>

                            <form class="form-horizontal m-t-20" id="loginform" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/forgot_pw_post/" method="post">
                                <?php if (isset($_smarty_tpl->tpl_vars['notify']->value)) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

                                <?php }?>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ion-ios-person"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" name="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                </div>

                                <?php if (isset($_smarty_tpl->tpl_vars['config']->value['config_recaptcha_in_client_login']) && $_smarty_tpl->tpl_vars['config']->value['config_recaptcha_in_client_login'] == 1 && $_smarty_tpl->tpl_vars['type']->value == 'login') {?>

                                    <?php if ($_smarty_tpl->tpl_vars['config']->value['recaptcha'] == '1') {?>
                                        <div class="form-group mb-3">
                                            <div class="g-recaptcha" data-sitekey="<?php echo $_smarty_tpl->tpl_vars['config']->value['recaptcha_sitekey'];?>
"></div>
                                        </div>
                                    <?php }?>

                                <?php }?>

                                <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                        <button class="btn btn-block btn-lg btn-info" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Reset Password'];?>
</button>
                                    </div>
                                </div>

                                <?php if ($_smarty_tpl->tpl_vars['config']->value['allow_customer_registration'] == '1') {?>
                                    <div class="form-group m-b-0 m-t-10">
                                        <div class="col-sm-12 text-center">
                                            <?php echo $_smarty_tpl->tpl_vars['_L']->value['Dont have an account'];?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/register/" class="text-info m-l-5"><b><?php echo $_smarty_tpl->tpl_vars['_L']->value['Register'];?>
</b></a>
                                        </div>
                                    </div>
                                <?php }?>

                            </form>

                        <?php }?>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<?php echo '<script'; ?>
>

    var _L = [];


    _L['Save'] = '<?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
';
    _L['Submit'] = '<?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
';
    _L['Loading'] = '<?php echo $_smarty_tpl->tpl_vars['_L']->value['Loading'];?>
';
    _L['Media'] = '<?php echo $_smarty_tpl->tpl_vars['_L']->value['Media'];?>
';
    _L['OK'] = '<?php echo $_smarty_tpl->tpl_vars['_L']->value['OK'];?>
';
    _L['Cancel'] = '<?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
';
    _L['Close'] = '<?php echo $_smarty_tpl->tpl_vars['_L']->value['Close'];?>
';
    _L['Close'] = '<?php echo $_smarty_tpl->tpl_vars['_L']->value['Close'];?>
';
    _L['are_you_sure'] = '<?php echo $_smarty_tpl->tpl_vars['_L']->value['are_you_sure'];?>
';
    _L['Saved Successfully'] = '<?php echo $_smarty_tpl->tpl_vars['_L']->value['Saved Successfully'];?>
';
    _L['Empty'] = '<?php echo $_smarty_tpl->tpl_vars['_L']->value['Empty'];?>
';

    var app_url = '<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
';
    var base_url = '<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
';

    <?php if (($_smarty_tpl->tpl_vars['config']->value['animate']) == '1') {?>
    var config_animate = 'Yes';
    <?php } else { ?>
    var config_animate = 'No';
    <?php }?>
    <?php echo $_smarty_tpl->tpl_vars['jsvar']->value;?>

<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/assets/js/app.js?v=<?php echo $_smarty_tpl->tpl_vars['file_build']->value;?>
"><?php echo '</script'; ?>
>
</body>

</html><?php }
}
