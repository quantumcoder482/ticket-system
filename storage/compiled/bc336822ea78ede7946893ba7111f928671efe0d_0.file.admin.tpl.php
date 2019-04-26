<?php
/* Smarty version 3.1.33, created on 2018-11-16 17:42:08
  from '/Users/razib/Documents/valet/suite/apps/hostbilling/views/admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bef47c0e7ec85_41202587',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc336822ea78ede7946893ba7111f928671efe0d' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/apps/hostbilling/views/admin.tpl',
      1 => 1542408126,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bef47c0e7ec85_41202587 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_smarty_tpl->tpl_vars['_title']->value;?>
</title>
    <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/icon/favicon.ico" type="image/x-icon" />


    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
apps/hostbilling/views/css/hostbilling.css?v=4" rel="stylesheet">


    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plugin_ui_header_admin']->value, 'plugin_ui_header_add');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['plugin_ui_header_add']->value) {
?>
        <?php echo $_smarty_tpl->tpl_vars['plugin_ui_header_add']->value;?>

    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    <?php if ($_smarty_tpl->tpl_vars['config']->value['rtl'] == '1') {?>
        <link href="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
default/css/bootstrap-rtl.min.css" rel="stylesheet">
        <link href="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
default/css/style-rtl.min.css" rel="stylesheet">
    <?php }?>

    <?php if (isset($_smarty_tpl->tpl_vars['xheader']->value)) {?>
        <?php echo $_smarty_tpl->tpl_vars['xheader']->value;?>

    <?php }?>

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20266261615bef47c0e47ec0_57234309', 'style');
?>


    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plugin_ui_header_admin_css']->value, 'plugin_ui_header_add_css');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['plugin_ui_header_add_css']->value) {
?>
        <link href="<?php echo $_smarty_tpl->tpl_vars['plugin_ui_header_add_css']->value;?>
" rel="stylesheet">
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



</head>

<body>

<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html"><img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/system/hostbilling.png" alt=""></a>

        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">


        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown language-switch">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="../../../../global_assets/images/flags/gb.png" class="position-left" alt="">
                    English
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                    <li><a class="deutsch"><img src="../../../../global_assets/images/flags/de.png" alt=""> Deutsch</a></li>
                    <li><a class="ukrainian"><img src="../../../../global_assets/images/flags/ua.png" alt=""> Українська</a></li>
                    <li><a class="english"><img src="../../../../global_assets/images/flags/gb.png" alt=""> English</a></li>
                    <li><a class="espana"><img src="../../../../global_assets/images/flags/es.png" alt=""> España</a></li>
                    <li><a class="russian"><img src="../../../../global_assets/images/flags/ru.png" alt=""> Русский</a></li>
                </ul>
            </li>



            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="https://res.cloudinary.com/stackb/image/upload/v1539966703/stackpie/user_placeholder.png" alt="">
                    <span>Victoria</span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
                    <li><a href="#"><i class="icon-coins"></i> My balance</a></li>
                    <li><a href="#"><span class="badge badge-warning pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
                    <li><a href="#"><i class="icon-switch2"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<div class="navbar navbar-default" id="navbar-second">
    <ul class="nav navbar-nav no-border visible-xs-block">
        <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
    </ul>

    <div class="navbar-collapse collapse" id="navbar-second-toggle">
        <ul class="nav navbar-nav">
            <li class="active"><a href="index.html"><i class="fa fa-tachometer position-left"></i> Dashboard</a></li>





            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-users position-left"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Customers'];?>
 <span class="caret"></span>
                </a>

                <ul class="dropdown-menu width-250">



                    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'customers','create')) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/add/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Customer'];?>
</a></li>
                    <?php }?>

                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/list/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['List Customers'];?>
</a></li>

                    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'companies','view') && ($_smarty_tpl->tpl_vars['config']->value['companies'])) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/companies/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Companies'];?>
</a></li>
                    <?php }?>


                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/groups/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Groups'];?>
</a></li>



                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sub_menu_admin']->value['crm'], 'sm_crm');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['sm_crm']->value) {
?>

                        <?php echo $_smarty_tpl->tpl_vars['sm_crm']->value;?>



                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



                </ul>
            </li>


            <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'sales')) {?>

                <?php if (($_smarty_tpl->tpl_vars['config']->value['invoicing'] == '1') || ($_smarty_tpl->tpl_vars['config']->value['quotes'] == '1')) {?>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-credit-card-1 position-left"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Billing'];?>
 <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu width-250">

                            <?php if ($_smarty_tpl->tpl_vars['config']->value['invoicing'] == '1') {?>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/list/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoices'];?>
</a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/add/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['New Invoice'];?>
</a></li>



                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/list-recurring/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Recurring Invoices'];?>
</a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/add/recurring/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['New Recurring Invoice'];?>
</a></li>
                            <?php }?>

                            <?php if ($_smarty_tpl->tpl_vars['config']->value['quotes'] == '1') {?>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
quotes/list/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Quotes'];?>
</a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
quotes/new/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Create New Quote'];?>
</a></li>
                            <?php }?>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/payments/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Payments'];?>
</a></li>

                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sub_menu_admin']->value['sales'], 'sm_sales');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['sm_sales']->value) {
?>

                                <?php echo $_smarty_tpl->tpl_vars['sm_sales']->value;?>



                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



                        </ul>
                    </li>




                <?php }?>

            <?php }?>


            <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'orders') && ($_smarty_tpl->tpl_vars['config']->value['orders'])) {?>

                <?php if (($_smarty_tpl->tpl_vars['config']->value['orders'] == '1')) {?>


                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-server position-left"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Orders'];?>
 <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu width-250">

                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
orders/list/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['List All Orders'];?>
</a></li>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
orders/add/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Add New Order'];?>
</a></li>



                        </ul>
                    </li>



                <?php }?>

            <?php }?>

            <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'support') && ($_smarty_tpl->tpl_vars['config']->value['support'])) {?>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-life-ring position-left"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Support'];?>
 <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu width-250">

                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tickets/admin/create/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Open New Ticket'];?>
</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tickets/admin/list/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Tickets'];?>
</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tickets/admin/predefined_replies/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Predefined Replies'];?>
</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tickets/admin/departments/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Departments'];?>
</a></li>

                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
kb/a/edit/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['New Article'];?>
</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
kb/a/all/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['All Articles'];?>
</a></li>

                    </ul>
                </li>



            <?php }?>


            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-article position-left"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Apps'];?>
 <span class="caret"></span>
                </a>

                <ul class="dropdown-menu width-250">

                    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'documents') && ($_smarty_tpl->tpl_vars['config']->value['documents'])) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
documents/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Documents'];?>
</a></li>
                    <?php }?>



                    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'tasks') && ($_smarty_tpl->tpl_vars['config']->value['tasks'])) {?>
                        <li <?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'tasks') {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tasks"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Tasks'];?>
</a></li>
                    <?php }?>



                    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'calendar') && ($_smarty_tpl->tpl_vars['config']->value['calendar'])) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
calendar/events/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Calendar'];?>
</a></li>
                    <?php }?>

                    <?php if (($_smarty_tpl->tpl_vars['config']->value['password_manager']) && has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'password_manager')) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
password_manager"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Password Manager'];?>
</a></li>
                    <?php }?>

                </ul>
            </li>


            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bar-chart-o position-left"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Reports'];?>
 <span class="caret"></span>
                </a>

                <ul class="dropdown-menu width-250">

                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/sales/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoices'];?>
</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
util/activity/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Activity Log'];?>
</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
util/sent-emails/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email Message Log'];?>
</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
util/invoice_access_log/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Access Log'];?>
</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
util/dbstatus/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Database Status'];?>
</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
util/cronlogs/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['CRON Log'];?>
</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
util/sys_status/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['System Status'];?>
</a></li>

                </ul>
            </li>


        </ul>

        <ul class="nav navbar-nav navbar-right">

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-cogs"></i>
                    <span class="visible-xs-inline-block position-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Settings'];?>
</span>
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/app/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['General Settings'];?>
</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/users/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Staff'];?>
</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/roles/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Roles'];?>
</a></li>

                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ps/p-list/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Products n Services'];?>
</a></li>

                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/localisation/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Localisation'];?>
</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/currencies/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Currencies'];?>
</a></li>

                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/pg/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Payment Gateways'];?>
</a></li>



                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/emls/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email Settings'];?>
</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/email-templates/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email Templates'];?>
</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/customfields/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Custom Contact Fields'];?>
</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/automation/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Automation Settings'];?>
</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/api/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['API Access'];?>
</a></li>

                </ul>
            </li>
        </ul>
    </div>
</div>

<section>
    <div id="wrapper">






        <div id="page-wrapper" class="page-bg">




            <div class="wrapper wrapper-content <?php echo $_smarty_tpl->tpl_vars['config']->value['contentAnimation'];?>
">


                <?php if (isset($_smarty_tpl->tpl_vars['notify']->value)) {
echo $_smarty_tpl->tpl_vars['notify']->value;
}?>









                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15046943075bef47c0e70cb2_82592803', "content");
?>












                <div id="ajax-modal" class="modal container fade-scale" tabindex="-1" style="display: none;"></div>
            </div>

            <?php if ($_smarty_tpl->tpl_vars['tpl_footer']->value) {?>
                <?php if ($_smarty_tpl->tpl_vars['config']->value['hide_footer']) {?>

                <?php } else { ?>
                    <div class="footer">
                        <div>
                            <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Copyright'];?>
</strong> &copy; <?php echo $_smarty_tpl->tpl_vars['config']->value['CompanyName'];?>

                        </div>
                    </div>
                <?php }?>
            <?php }?>

        </div>

        <div id="right-sidebar">
            <div class="sidebar-container">

                <ul class="nav nav-tabs navs-3">

                    <li class="active"><a data-toggle="tab" href="#tab-1">
                            <?php echo $_smarty_tpl->tpl_vars['_L']->value['Notes'];?>

                        </a></li>
                                                                                <li class=""><a data-toggle="tab" href="#tab-3">
                            <i class="fa fa-gear"></i>
                        </a></li>
                </ul>

                <div class="tab-content">


                    <div id="tab-1" class="tab-pane active">

                        <div class="sidebar-title">
                            <h3> <i class="fa fa-file-text-o"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Quick Notes'];?>
</h3>

                        </div>

                        <div style="padding: 10px">

                            <form class="form-horizontal push-10-t push-10" method="post" onsubmit="return false;">

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material floating">
                                            <textarea class="form-control" id="ib_admin_notes" name="ib_admin_notes" rows="10"><?php echo $_smarty_tpl->tpl_vars['user']->value->notes;?>
</textarea>
                                            <label for="ib_admin_notes"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Whats on your mind'];?>
</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <button class="btn btn-sm btn-success" type="submit" id="ib_admin_notes_save"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
                                    </div>
                                </div>
                            </form>
                        </div>




                    </div>



                    <div id="tab-3" class="tab-pane">

                        <div class="sidebar-title">
                            <h3><i class="fa fa-gears"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Settings'];?>
</h3>

                        </div>

                        <div class="setings-item">
                            <h4><?php echo $_smarty_tpl->tpl_vars['_L']->value['Theme_Color'];?>
</h4>

                            <ul id="ib_theme_color" class="ib_theme_color">

                                                                                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/set_color/light_blue/"><span class="light_blue"></span></a></li>
                                                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/set_color/purple/"><span class="purple"></span></a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/set_color/indigo_blue/"><span class="purple"></span></a></li>
                            </ul>


                        </div>
                        <div class="setings-item">
                    <span>
                        <?php echo $_smarty_tpl->tpl_vars['_L']->value['Fold Sidebar Default'];?>

                    </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="r_fold_sidebar" <?php if (get_option('mininav') == '1') {?>checked<?php }?> class="onoffswitch-checkbox" id="r_fold_sidebar">
                                    <label class="onoffswitch-label" for="r_fold_sidebar">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>



        </div>

    </div>
</section>

<input type="hidden" id="_url" name="_url" value="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
">
<input type="hidden" id="_df" name="_df" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['df'];?>
">
<input type="hidden" id="_lan" name="_lan" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['language'];?>
">
<!-- END PRELOADER -->
<!-- Mainly scripts -->

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








<?php if ($_smarty_tpl->tpl_vars['config']->value['language'] != 'en') {?>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/moment/moment-with-locales.min.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>
        moment.locale('<?php echo $_smarty_tpl->tpl_vars['config']->value['momentLocale'];?>
');
    <?php echo '</script'; ?>
>

<?php } else { ?>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/moment/moment.min.js"><?php echo '</script'; ?>
>

<?php }?>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/assets/js/app.js?v=<?php echo $_smarty_tpl->tpl_vars['file_build']->value;?>
"><?php echo '</script'; ?>
>






<?php if (isset($_smarty_tpl->tpl_vars['xfooter']->value)) {?>
    <?php echo $_smarty_tpl->tpl_vars['xfooter']->value;?>

<?php }?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20514330895bef47c0e7bbd2_41146017', 'script');
?>


<?php echo '<script'; ?>
>
    jQuery(document).ready(function() {
        // initiate layout and plugins


        matForms();

        <?php if (isset($_smarty_tpl->tpl_vars['xjq']->value)) {?>
        <?php echo $_smarty_tpl->tpl_vars['xjq']->value;?>

        <?php }?>



    });

<?php echo '</script'; ?>
>



</body>

</html>
<?php }
/* {block 'style'} */
class Block_20266261615bef47c0e47ec0_57234309 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'style' => 
  array (
    0 => 'Block_20266261615bef47c0e47ec0_57234309',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'style'} */
/* {block "content"} */
class Block_15046943075bef47c0e70cb2_82592803 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_15046943075bef47c0e70cb2_82592803',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "content"} */
/* {block 'script'} */
class Block_20514330895bef47c0e7bbd2_41146017 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_20514330895bef47c0e7bbd2_41146017',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'script'} */
}
