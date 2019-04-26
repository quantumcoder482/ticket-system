<?php
/* Smarty version 3.1.33, created on 2019-03-18 14:50:32
  from '/Users/razib/Documents/valet/suite/apps/bpr/views/admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c8fe878689e17_42578198',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b0ce24b90f5d493ac0d209c8650ed9399f9452ba' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/apps/bpr/views/admin.tpl',
      1 => 1552935030,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c8fe878689e17_42578198 (Smarty_Internal_Template $_smarty_tpl) {
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


    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
favicon-16x16.png">

    <link href="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
default/css/app.css?v=4" rel="stylesheet">



    <link href="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
default/css/<?php echo $_smarty_tpl->tpl_vars['config']->value['nstyle'];?>
.css" rel="stylesheet">

    <?php echo '<script'; ?>
>
        window.clx = {
            base_url: '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
',
            i18n: {
                yes: '<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
',
                no: '<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
',
                are_you_sure: '<?php echo $_smarty_tpl->tpl_vars['_L']->value['are_you_sure'];?>
'
            }
        }
    <?php echo '</script'; ?>
>


    <?php if (isset($_smarty_tpl->tpl_vars['plugin_ui_header_admin']->value)) {?>
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
    <?php }?>


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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11154548005c8fe87862a082_79685376', 'style');
?>


            


</head>

<body class="fixed-nav <?php if ($_smarty_tpl->tpl_vars['config']->value['mininav']) {?>mini-navbar<?php }?>" id="ib_body">

<!-- Started Header Section -->


<section>
    <div id="wrapper">

        <!-- Navigation Button -->

        <nav class="navbar-default navbar-static-side" id="ib_navbar" role="navigation">
            <div class="sidebar-collapse">

                <ul class="nav nav-highlight" id="side-menu">

                    <?php if (($_smarty_tpl->tpl_vars['config']->value['show_sidebar_header'])) {?>

                        <li class="nav-header">


                            <div class="dropdown profile-element"> <span>

                                <?php if ($_smarty_tpl->tpl_vars['user']->value['img'] == '') {?>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/imgs/default-user-avatar.png"  class="profile-img img-circle" style="max-width: 64px;" alt="">
                                <?php } else { ?>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;
echo $_smarty_tpl->tpl_vars['user']->value['img'];?>
" class="profile-img img-circle" style="max-width: 64px;" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['fullname'];?>
">
                                <?php }?>


                             </span>
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
                            <span class="clear profile-text"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_smarty_tpl->tpl_vars['user']->value['fullname'];?>
</strong>
                             </span> <span class="text-muted text-xs block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['My Account'];?>
 <b class="caret"></b></span> </span> </a>

                                <ul class="dropdown-menu animated fadeIn m-t-xs">
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/users-edit/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit Profile'];?>
</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/change-password/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Change Password'];?>
</a></li>

                                    <li class="divider"></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
logout/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Logout'];?>
</a></li>
                                </ul>

                            </div>
                        </li>

                    <?php }?>



                    <?php echo $_smarty_tpl->tpl_vars['admin_extra_nav']->value[0];?>


                    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'reports')) {?>
                        <li <?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'dashboard') {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;
echo $_smarty_tpl->tpl_vars['config']->value['redirect_url'];?>
/"><i class="fa fa-tachometer"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Dashboard'];?>
</span></a></li>
                    <?php }?>

                    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'support') && ($_smarty_tpl->tpl_vars['config']->value['support'])) {?>

                        <li class="<?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'support') {?>active<?php }?>">
                            <a href="#"><i class="fa fa-life-ring"></i> <span class="nav-label">Tickets</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
bpr/admin/create_ticket/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Open New Ticket'];?>
</a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tickets/admin/list/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Tickets'];?>
</a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tickets/admin/predefined_replies/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Predefined Replies'];?>
</a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tickets/admin/departments/">Brands</a></li>


                            </ul>
                        </li>



                    <?php }?>


                    <?php if (APP_STAGE == 'Dev') {?>

                        <li <?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'dev') {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
dev"><i class="fa fa-file-code-o"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Developer'];?>
</span></a></li>

                    <?php }?>

                    <?php echo $_smarty_tpl->tpl_vars['admin_extra_nav']->value[1];?>


                    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'customers')) {?>
                        <li class="<?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'contacts') {?>active<?php }?>">
                            <a href="#"><i class="icon-users"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Customers'];?>
</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

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

                                <?php if (($_smarty_tpl->tpl_vars['config']->value['client_drive'])) {?>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/drive/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Files'];?>
</a></li>
                                <?php }?>


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
                    <?php }?>


                    <li class="<?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'end_users') {?>active<?php }?>">
                        <a href="#"><i class="fa fa-users"></i> <span class="nav-label">End users</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
bpr/admin/end-users">End users</a></li>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
bpr/admin/end-user">Create new end user</a></li>

                        </ul>
                    </li>



                    <?php echo $_smarty_tpl->tpl_vars['admin_extra_nav']->value[2];?>

                    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'transactions')) {?>
                        <?php if ($_smarty_tpl->tpl_vars['config']->value['accounting'] == '1') {?>
                            <li class="<?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'transactions') {?>active<?php }?>">
                                <a href="#"><i class="fa fa-calculator"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Accounting'];?>
</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/deposit/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['New Deposit'];?>
</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/expense/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['New Expense'];?>
</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/transfer/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Transfer'];?>
</a></li>



                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/list/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['View Transactions'];?>
</a></li>

                                    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'bank_n_cash')) {?>

                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
accounts/add/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['New Account'];?>
</a></li>

                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
accounts/list/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['List Accounts'];?>
</a></li>


                                    <?php }?>

                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
assets/list/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Assets'];?>
</a></li>



                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
accounts/balances/transactions"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Balance Sheet'];?>
</a></li>


                                </ul>
                            </li>
                        <?php }?>
                    <?php }?>


                    <?php echo $_smarty_tpl->tpl_vars['admin_extra_nav']->value[3];?>



                    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'sales')) {?>

                        <?php if (($_smarty_tpl->tpl_vars['config']->value['invoicing'] == '1') || ($_smarty_tpl->tpl_vars['config']->value['quotes'] == '1')) {?>



                            <li class="<?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'invoices') {?>active<?php }?>">
                                <a href="#"><i class="icon-credit-card-1"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Sales'];?>
</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">

                                    <?php if ($_smarty_tpl->tpl_vars['config']->value['invoicing'] == '1') {?>
                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/list/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoices'];?>
</a></li>
                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/add/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['New Invoice'];?>
</a></li>


                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/add/1/0/pos"><?php echo $_smarty_tpl->tpl_vars['_L']->value['POS'];?>
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


                    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'suppliers') && ($_smarty_tpl->tpl_vars['config']->value['suppliers'])) {?>

                        <li class="<?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'suppliers') {?>active<?php }?>">
                            <a href="#"><i class="fa fa-cube"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Suppliers'];?>
</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'suppliers','create')) {?>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/add/supplier"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Supplier'];?>
</a></li>
                                <?php }?>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/list/supplier"><?php echo $_smarty_tpl->tpl_vars['_L']->value['List Suppliers'];?>
</a></li>


                            </ul>
                        </li>

                    <?php }?>



                    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'purchase') && ($_smarty_tpl->tpl_vars['config']->value['purchase'])) {?>




                        <li class="<?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'purchase') {?>active<?php }?>">
                            <a href="#"><i class="fa fa-cubes"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Purchase'];?>
</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
purchases/list/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Purchase Orders'];?>
</a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
purchases/add/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['New Purchase Order'];?>
</a></li>


                            </ul>
                        </li>



                    <?php }?>




                    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'leads','view') && ($_smarty_tpl->tpl_vars['config']->value['leads'])) {?>
                        <li <?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'leads') {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
leads/"><i class="fa fa-address-card-o"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Leads'];?>
</span></a></li>
                    <?php }?>


                    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'sms') && ($_smarty_tpl->tpl_vars['config']->value['sms'])) {?>

                        <li class="<?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'sms') {?>active<?php }?>">
                            <a href="#"><i class="fa fa-envelope-o"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['SMS'];?>
</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
sms/init/send/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Send Single SMS'];?>
</a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
sms/init/bulk/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Send Bulk SMS'];?>
</a></li>
                                                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
sms/init/sent/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Sent'];?>
</a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
sms/init/templates/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['SMS Templates'];?>
</a></li>
                                                                                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
sms/init/settings/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Settings'];?>
</a></li>


                            </ul>
                        </li>



                    <?php }?>






                    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'kb') && ($_smarty_tpl->tpl_vars['config']->value['kb'])) {?>

                        <li class="<?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'kb') {?>active<?php }?>">
                            <a href="#"><i class="fa fa-file-text-o"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Knowledgebase'];?>
</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
kb/a/edit/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['New Article'];?>
</a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
kb/a/all/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['All Articles'];?>
</a></li>



                            </ul>
                        </li>



                    <?php }?>






                    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'orders') && ($_smarty_tpl->tpl_vars['config']->value['orders'])) {?>

                        <?php if (($_smarty_tpl->tpl_vars['config']->value['orders'] == '1')) {?>



                            <li class="<?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'orders') {?>active<?php }?>">
                                <a href="#"><i class="fa fa-server"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Orders'];?>
</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
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





                                                                                                                        
                                                            


                                                                                                                        
                                                            

                    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'documents') && ($_smarty_tpl->tpl_vars['config']->value['documents'])) {?>
                        <li <?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'documents') {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
documents/"><i class="fa fa-file-o"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Documents'];?>
</span></a></li>
                    <?php }?>



                    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'tasks') && ($_smarty_tpl->tpl_vars['config']->value['tasks'])) {?>
                        <li <?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'tasks') {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tasks"><i class="fa fa-tasks"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Tasks'];?>
</span></a></li>
                    <?php }?>



                    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'calendar') && ($_smarty_tpl->tpl_vars['config']->value['calendar'])) {?>
                        <li <?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'calendar') {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
calendar/events/"><i class="fa fa-calendar"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Calendar'];?>
</span></a></li>
                    <?php }?>




                    <?php echo $_smarty_tpl->tpl_vars['admin_extra_nav']->value[4];?>




                    <?php echo $_smarty_tpl->tpl_vars['admin_extra_nav']->value[5];?>


                    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'products_n_services')) {?>

                        <?php if (($_smarty_tpl->tpl_vars['config']->value['invoicing'] == '1') || ($_smarty_tpl->tpl_vars['config']->value['quotes'] == '1')) {?>
                            <li class="<?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'ps') {?>active<?php }?>">
                                <a href="#"><i class="fa fa-cube"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Products n Services'];?>
</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <?php if ($_smarty_tpl->tpl_vars['config']->value['inventory'] == '1') {?>
                                                                            <?php }?>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ps/p-list/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Products'];?>
</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ps/p-new/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['New Product'];?>
</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ps/s-list/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Services'];?>
</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ps/s-new/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['New Service'];?>
</a></li>


                                </ul>
                            </li>
                        <?php }?>

                    <?php }?>




                    <?php echo $_smarty_tpl->tpl_vars['admin_extra_nav']->value[6];?>


                    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'reports')) {?>



                        <li class="<?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'reports') {?>active<?php }?>">
                            <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Reports'];?>
 </span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">



                                <?php if ($_smarty_tpl->tpl_vars['config']->value['accounting'] == '1') {?>

                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/list/0/0/reports"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Transactions'];?>
</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/invoices/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoices'];?>
</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/purchases/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Purchases'];?>
</a></li>
                                                                                                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/statement/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Account Statement'];?>
</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/income/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Income Reports'];?>
</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/expense/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Expense Reports'];?>
</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/income-vs-expense/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Income Vs Expense'];?>
</a></li>

                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/by-date/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Reports by Date'];?>
</a></li>
                                                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/list/0/income/reports"><?php echo $_smarty_tpl->tpl_vars['_L']->value['All Income'];?>
</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/list/0/expense/reports"><?php echo $_smarty_tpl->tpl_vars['_L']->value['All Expense'];?>
</a></li>


                                <?php }?>



                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/sales/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Sales'];?>
</a></li>


                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/invoices_expense/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoices Vs Expense'];?>
</a></li>


                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reports/export/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Export'];?>
</a></li>

                                
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sub_menu_admin']->value['reports'], 'sm_report');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['sm_report']->value) {
?>

                                    <?php echo $_smarty_tpl->tpl_vars['sm_report']->value;?>



                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                            </ul>
                        </li>

                    <?php }?>

                    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'utilities')) {?>

                        <li class="<?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'util') {?>active<?php }?>">
                            <a href="#"><i class="icon-article"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Utilities'];?>
 </span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
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
util/backups/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Backup'];?>
</a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
util/dbstatus/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Database Status'];?>
</a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
util/cronlogs/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['CRON Log'];?>
</a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
util/integrationcode/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Integration Code'];?>
</a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
util/sys_status/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['System Status'];?>
</a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
terminal/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Terminal'];?>
</a></li>
                                
                                <?php if (($_smarty_tpl->tpl_vars['config']->value['password_manager']) && has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'password_manager')) {?>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
password_manager"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Password Manager'];?>
</a></li>
                                <?php }?>


                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
util/tools/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Tools'];?>
</a></li>
                            </ul>
                        </li>

                    <?php }?>



                    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'appearance')) {?>

                        <li class="<?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'appearance') {?>active<?php }?>" id="li_appearance">
                            <a href="#"><i class="icon-params"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Appearance'];?>
 </span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
appearance/ui/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['User Interface'];?>
</a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
appearance/customize/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Customize'];?>
</a></li>

                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sub_menu_admin']->value['appearance'], 'sm_appearance');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['sm_appearance']->value) {
?>

                                    <?php echo $_smarty_tpl->tpl_vars['sm_appearance']->value;?>



                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
appearance/editor/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Editor'];?>
</a></li>

                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
appearance/themes/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Themes'];?>
</a></li>

                            </ul>
                        </li>

                    <?php }?>

                    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'plugins') && ($_smarty_tpl->tpl_vars['config']->value['plugins'])) {?>
                        <li <?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'plugins') {?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/plugins/"><i class="fa fa-plug"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Plugins'];?>
</span></a></li>
                    <?php }?>


                    <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'settings')) {?>
                        <li class="<?php if ($_smarty_tpl->tpl_vars['_application_menu']->value == 'settings') {?>active<?php }?>" id="li_settings">
                            <a href="#"><i class="fa fa-cogs"></i> <span class="nav-label"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Settings'];?>
 </span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
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
settings/localisation/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Localisation'];?>
</a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/currencies/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Currencies'];?>
</a></li>

                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/pg/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Payment Gateways'];?>
</a></li>

                                <?php if ($_smarty_tpl->tpl_vars['config']->value['accounting'] == '1') {?>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/expense-categories/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Expense Categories'];?>
</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/expense-types/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Expense Types'];?>
</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/income-categories/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Income Categories'];?>
</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/units/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Units'];?>
</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/tags/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage Tags'];?>
</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/pmethods/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Payment Methods'];?>
</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tax/list/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Sales Taxes'];?>
</a></li>
                                <?php }?>


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
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sub_menu_admin']->value['settings'], 'sm_settings');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['sm_settings']->value) {
?>

                                    <?php echo $_smarty_tpl->tpl_vars['sm_settings']->value;?>



                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/features/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Choose Features'];?>
</a></li>


                                                                                                




                            </ul>
                        </li>
                    <?php }?>




                </ul>

            </div>
        </nav>


        <div id="page-wrapper" class="page-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-fixed-top white-bg" role="navigation" style="margin-bottom: 0">

                    <?php if (($_smarty_tpl->tpl_vars['config']->value['top_bar_is_dark'])) {?>

                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
dashboard"><img class="logo hidden-xs" style="max-height: 40px; width: auto;" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/system/<?php echo $_smarty_tpl->tpl_vars['config']->value['logo_inverse'];?>
" alt="Logo"></a>

                    <?php } else { ?>

                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
dashboard"><img class="logo hidden-xs" style="max-height: 40px; width: auto;" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/system/<?php echo $_smarty_tpl->tpl_vars['config']->value['logo_default'];?>
" alt="Logo"></a>

                    <?php }?>


                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2" href="#"><i class="fa fa-dedent"></i> </a>

                    </div>
                    <ul class="nav navbar-top-links navbar-right pull-right">



                        <li class="hidden-xs">
                            <form class="navbar-form full-width" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/list/">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Search Customers'];?>
...">
                                    <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </li>


                        <?php if (has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'reports')) {?>

                            <li class="dropdown">
                                <a class="dropdown-toggle count-info" data-toggle="dropdown" id="get_activity" href="#" aria-expanded="true">
                                    <i class="fa fa-bell"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-alerts" id="activity_loaded">



                                    <li style="text-align: center;">
                                        <div class="md-preloader text-center"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" height="32" width="32" viewbox="0 0 75 75"><circle cx="37.5" cy="37.5" r="33.5" stroke-width="6"/></svg></div>
                                    </li>
                                </ul>
                            </li>

                        <?php }?>



                                                                                                                        
                                                
                        <?php if ($_smarty_tpl->tpl_vars['config']->value['show_country_flag'] == '1') {?>
                            <li class="dropdown">

                                <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown" id="set_language" aria-expanded="true">

                                    <span class="flag-icon flag-icon-<?php echo $_smarty_tpl->tpl_vars['config']->value['country_flag_code'];?>
"></span>

                                </a>
                                <ul class="dropdown-menu animated fadeIn" id="show_available_lan">
                                    <li style="text-align: center;">
                                        <div class="md-preloader text-center"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" height="32" width="32" viewbox="0 0 75 75"><circle cx="37.5" cy="37.5" r="33.5" stroke-width="6"/></svg></div>
                                    </li>


                                </ul>
                            </li>
                        <?php }?>

                        <li class="dropdown navbar-user">

                            <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">


                                <?php if ($_smarty_tpl->tpl_vars['user']->value['img'] == '') {?>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/imgs/default-user-avatar.png" alt="">
                                <?php } else { ?>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;
echo $_smarty_tpl->tpl_vars['user']->value['img'];?>
" class="img-circle" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['fullname'];?>
">
                                <?php }?>

                                <span class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Welcome'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['fullname'];?>
</span> <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu animated fadeIn">
                                <li class="arrow"></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/users-edit/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit Profile'];?>
</a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/change-password/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Change Password'];?>
</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
logout/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Logout'];?>
</a></li>

                            </ul>
                        </li>

                        <li>
                            <a class="right-sidebar-toggle">
                                <i class="fa fa-tasks"></i>
                            </a>
                        </li>




                    </ul>

                </nav>
            </div>



            <div class="wrapper wrapper-content <?php echo $_smarty_tpl->tpl_vars['config']->value['contentAnimation'];?>
">


                <?php if (isset($_smarty_tpl->tpl_vars['notify']->value)) {
echo $_smarty_tpl->tpl_vars['notify']->value;
}?>









                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9215123955c8fe87867cb06_03670132', "content");
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
_a"><?php echo '</script'; ?>
>




<?php if (isset($_smarty_tpl->tpl_vars['xfooter']->value)) {?>
    <?php echo $_smarty_tpl->tpl_vars['xfooter']->value;?>

<?php }?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9477290365c8fe878686ec8_68446057', 'script');
?>


<?php echo '<script'; ?>
>
    jQuery(document).ready(function() {
        // initiate layout and plugins


        matForms();

        <?php if (isset($_smarty_tpl->tpl_vars['xjq']->value)) {?>
        <?php echo $_smarty_tpl->tpl_vars['xjq']->value;?>

        <?php }?>

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

<?php echo '</script'; ?>
>



</body>

</html><?php }
/* {block 'style'} */
class Block_11154548005c8fe87862a082_79685376 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'style' => 
  array (
    0 => 'Block_11154548005c8fe87862a082_79685376',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'style'} */
/* {block "content"} */
class Block_9215123955c8fe87867cb06_03670132 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_9215123955c8fe87867cb06_03670132',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "content"} */
/* {block 'script'} */
class Block_9477290365c8fe878686ec8_68446057 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_9477290365c8fe878686ec8_68446057',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'script'} */
}
