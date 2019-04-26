<?php
/* Smarty version 3.1.33, created on 2018-11-05 09:01:18
  from '/Users/razib/Documents/valet/suite/ui/theme/default/auth.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5be04d2e2de401_53186849',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3704c0390537c736ad285b8f92bb5b70f8894370' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/ui/theme/default/auth.tpl',
      1 => 1538137573,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be04d2e2de401_53186849 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $_smarty_tpl->tpl_vars['_L']->value['Login'];?>
 - <?php echo $_smarty_tpl->tpl_vars['_title']->value;?>
</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/lib/fa/css/font-awesome.min.css" rel="stylesheet">


    <!-- ionicons -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/logincss.css" rel="stylesheet">

    <?php if ($_smarty_tpl->tpl_vars['config']->value['rtl'] == '1') {?>
        <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/bootstrap-rtl.min.css" rel="stylesheet">
        <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/style-rtl.min.css" rel="stylesheet">
    <?php }?>

    <?php if (isset($_smarty_tpl->tpl_vars['config']->value['config_recaptcha_in_admin_login']) && $_smarty_tpl->tpl_vars['config']->value['config_recaptcha_in_admin_login'] == 1) {?>

        <?php if ($_smarty_tpl->tpl_vars['config']->value['recaptcha'] == '1') {?>
            <?php echo '<script'; ?>
 src='https://www.google.com/recaptcha/api.js'><?php echo '</script'; ?>
>
        <?php }?>

    <?php }?>


</head>

<body class="overflow-hidden light-background">
<div class="wrapper no-navigation preload">
    <div class="sign-in-wrapper">

        <div class="sign-in-inner">
            <div class="panel">
                <div class="panel-body">
                    <div class="login-brand text-center">
                        <img class="logo" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/system/<?php echo $_smarty_tpl->tpl_vars['config']->value['logo_default'];?>
" alt="Logo">

                    </div>
                    <?php if (isset($_smarty_tpl->tpl_vars['notify']->value)) {?>
                        <?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['type']->value == 'login') {?>
                        <form class="login" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
login/post/<?php if (isset($_smarty_tpl->tpl_vars['after']->value)) {
echo $_smarty_tpl->tpl_vars['after']->value;?>
/<?php }?>">
                            <div class="form-group m-bottom-md">
                                <input type="text" class="form-control" id="username" name="username" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Email Address'];?>
">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Password'];?>
">
                            </div>


                            <?php if (isset($_smarty_tpl->tpl_vars['config']->value['config_recaptcha_in_admin_login']) && $_smarty_tpl->tpl_vars['config']->value['config_recaptcha_in_admin_login'] == 1) {?>

                                <?php if ($_smarty_tpl->tpl_vars['config']->value['recaptcha'] == '1') {?>
                                    <div class="form-group">
                                        <div class="g-recaptcha" data-sitekey="<?php echo $_smarty_tpl->tpl_vars['config']->value['recaptcha_sitekey'];?>
"></div>
                                    </div>
                                <?php }?>

                            <?php }?>

                            <div class="m-top-md p-top-sm">

                                <button class="btn btn-success block full-width" name="login" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Sign in'];?>
</button>
                            </div>

                            <div class="m-top-md p-top-sm">
                                <div class="font-12 text-center m-bottom-xs">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
admin/forgot-pw/" class="font-12"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Forgot password'];?>
</a>

                                </div>


                            </div>
                        </form>

                    <?php } elseif ($_smarty_tpl->tpl_vars['type']->value == 'forgot_password') {?>

                        <form class="login" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
admin/forgot-pw-post/">
                            <div class="form-group m-bottom-md">
                                <input type="text" class="form-control" id="username" name="username" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Email Address'];?>
">
                            </div>


                            <div class="m-top-md p-top-sm">

                                <button class="btn btn-success block full-width" name="login" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Reset Password'];?>
</button>
                            </div>

                            <div class="m-top-md p-top-sm">
                                <div class="font-12 text-center m-bottom-xs">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
admin/" class="font-12"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Back To Login'];?>
</a>

                                </div>


                            </div>
                        </form>

                    <?php } else { ?>
                        <form class="login" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
login/post/<?php if (isset($_smarty_tpl->tpl_vars['after']->value)) {
echo $_smarty_tpl->tpl_vars['after']->value;?>
/<?php }?>">
                            <div class="form-group m-bottom-md">
                                <input type="text" class="form-control" id="username" name="username" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Email Address'];?>
">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Password'];?>
">
                            </div>



                            <div class="m-top-md p-top-sm">

                                <button class="btn btn-success block full-width" name="login" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Sign in'];?>
</button>
                            </div>

                            <div class="m-top-md p-top-sm">
                                <div class="font-12 text-center m-bottom-xs">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
admin/forgot-pw/" class="font-12"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Forgot password'];?>
</a>

                                </div>


                            </div>
                        </form>
                    <?php }?>
                </div>
            </div>
        </div>

        <!-- ./sign-in-inner -->
    </div><!-- ./sign-in-wrapper -->
</div><!-- /wrapper -->



<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!-- Jquery -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/jquery-1.10.2.js"><?php echo '</script'; ?>
>

<!-- Bootstrap -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/bootstrap.min.js"><?php echo '</script'; ?>
>


</body>
</html>
<?php }
}
