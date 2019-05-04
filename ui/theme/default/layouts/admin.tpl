<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$_title}</title>


    <!-- <link rel="apple-touch-icon" sizes="180x180" href="{$app_url}apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{$app_url}favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{$app_url}favicon-16x16.png"> -->
    <link rel="shortcut icon" href="{$app_url}storage/icon/favicon.ico" type="image/x-icon" />
    <link href="{$theme}default/css/app.css?v={$file_build}" rel="stylesheet">

    {*<link href="{$theme}default/css/bootstrap.min.css" rel="stylesheet">*}
    {*<link href="{$assets}/css/font-awesome.min.css?ver={$file_build}" rel="stylesheet">*}
    {*<link href="{$app_url}ui/lib/icheck/skins/square/blue.css" rel="stylesheet">*}
    {*<link href="{$app_url}ui/lib/css/animate.css" rel="stylesheet">*}
    {*<link href="{$app_url}ui/lib/toggle/bootstrap-toggle.min.css" rel="stylesheet">*}
    {*<link href="{$app_url}ui/lib/flag-icon/css/flag-icon.min.css" rel="stylesheet">*}
    {*<link href="{$assets}fonts/open-sans/open-sans.css?ver=4.0.1" rel="stylesheet">*}
    {*<link href="{$theme}default/css/style.css?ver={$file_build}" rel="stylesheet">*}
    {*<link href="{$theme}default/css/component.css?ver={$file_build}" rel="stylesheet">*}
    {*<link href="{$theme}default/css/custom.css?ver={$file_build}" rel="stylesheet">*}
    {*<link href="{$app_url}ui/lib/icons/css/ibilling_icons.css" rel="stylesheet">*}
    {*<link href="{$theme}default/css/material.css" rel="stylesheet">*}
    {*<link href="{$app_url}ui/lib/notify/pnotify.min.css" rel="stylesheet">*}
    {*<link href="{$app_url}ui/lib/fancybox/fancybox.min.css" rel="stylesheet">*}

    <link href="{$theme}default/css/{$config['nstyle']}.css" rel="stylesheet">

    <style>
    .notification-counter {
        border-radius: 50%;
        position: absolute;
        top: 7px;
        right: 0px;
        font-size: 10px;
        font-weight: normal;
        width: 15px;
        height: 15px;
        line-height: 1.0em;
        text-align: center;
        padding: 2px;
        background-color: red;
        border: none;
        color: white;
    }
    </style>
    <script>
        window.clx = {
            base_url: '{$_url}',
            i18n: {
                yes: '{$_L['Yes']}',
                no: '{$_L['No']}',
                are_you_sure: '{$_L['are_you_sure']}'
            }
        }
    </script>


    {if isset($plugin_ui_header_admin)}
        {foreach $plugin_ui_header_admin as $plugin_ui_header_add}
            {$plugin_ui_header_add}
        {/foreach}
    {/if}


    {if $config['rtl'] eq '1'}
        <link href="{$theme}default/css/bootstrap-rtl.min.css" rel="stylesheet">
        <link href="{$theme}default/css/style-rtl.min.css" rel="stylesheet">
    {/if}

    {if isset($xheader)}
        {$xheader}
    {/if}

    {block name=style}{/block}

    {*{foreach $plugin_ui_header_admin_css as $plugin_ui_header_add_css}*}
        {*<link href="{$plugin_ui_header_add_css}" rel="stylesheet">*}
    {*{/foreach}*}



</head>

<body class="fixed-nav {if $config['mininav']}mini-navbar{/if}" id="ib_body">

<!-- Started Header Section -->


<section>
    <div id="wrapper">

        <!-- Navigation Button -->

        <nav class="navbar-default navbar-static-side" id="ib_navbar" role="navigation">
            <div class="sidebar-collapse">

                <ul class="nav nav-highlight" id="side-menu">

                    {if ($config['show_sidebar_header'])}

                        <li class="nav-header">


                            <div class="dropdown profile-element"> <span>

                                {if $user['img'] eq ''}
                                    <img src="{$app_url}ui/lib/imgs/default-user-avatar.png"  class="profile-img img-circle" style="max-width: 64px;" alt="">
                                {else}
                                    <img src="{$app_url}{$user['img']}" class="profile-img img-circle" style="max-width: 64px;" alt="{$user['fullname']}">
                                {/if}


                             </span>
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
                            <span class="clear profile-text"> <span class="block m-t-xs"> <strong class="font-bold">{$user['fullname']}</strong>
                             </span> <span class="text-muted text-xs block">{$_L['My Account']} <b class="caret"></b></span> </span> </a>

                                <ul class="dropdown-menu animated fadeIn m-t-xs">
                                    <li><a href="{$_url}settings/users-edit/{$user['id']}/">{$_L['Edit Profile']}</a></li>
                                    <li><a href="{$_url}settings/change-password/">{$_L['Change Password']}</a></li>

                                    <li class="divider"></li>
                                    <li><a href="{$_url}logout/">{$_L['Logout']}</a></li>
                                </ul>

                            </div>
                        </li>

                    {/if}



                    {$admin_extra_nav[0]}

                    {if has_access($user->roleid,'reports')}
                        <li {if $_application_menu eq 'dashboard'}class="active"{/if}><a href="{$_url}{$config['redirect_url']}/"><i class="fa fa-tachometer"></i> <span class="nav-label">{$_L['Dashboard']}</span></a></li>
                    {/if}


                    {if APP_STAGE eq 'Dev'}

                        <li {if $_application_menu eq 'dev'}class="active"{/if}><a href="{$_url}dev"><i class="fa fa-file-code-o"></i> <span class="nav-label">{$_L['Developer']}</span></a></li>

                    {/if}

                    {$admin_extra_nav[1]}

                    {if has_access($user->roleid,'customers')}
                        <li class="{if $_application_menu eq 'contacts'}active{/if}">
                            <a href="#"><i class="icon-users"></i> <span class="nav-label">{$_L['Customers']}</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                {if has_access($user->roleid,'customers','create')}
                                    <li><a href="{$_url}contacts/add/">{$_L['Add Customer']}</a></li>
                                {/if}
                                <li><a href="{$_url}contacts/list/">{$_L['List Customers']}</a></li>

                                {if has_access($user->roleid,'companies','view') && ($config['companies'])}
                                    <li><a href="{$_url}contacts/companies/">{$_L['Companies']}</a></li>
                                {/if}


                                <li><a href="{$_url}contacts/groups/">{$_L['Groups']}</a></li>

                                {if ($config['client_drive'])}
                                    <li><a href="{$_url}contacts/drive/">{$_L['Files']}</a></li>
                                {/if}


                                {foreach $sub_menu_admin['crm'] as $sm_crm}

                                    {$sm_crm}


                                {/foreach}
                            </ul>
                        </li>
                    {/if}



                    {*{if isset($config['client_has_sub_client']) && $config['client_has_sub_client'] == 1}*}

                        {*<li {if $_application_menu eq 'end_users'}class="active"{/if}><a href="#"><i class="fa fa-users"></i> <span class="nav-label">End users</span><span class="fa arrow"></span></a>*}

                            {*<ul class="nav nav-second-level">*}
                                {*<li><a href="{$_url}contacts/end_users/">End users</a></li>*}
                                {*<li><a href="{$_url}contacts/end_users/user/">Create new end user</a></li>*}
                            {*</ul>*}
                        {*</li>*}


                    {*{/if}*}


                    {$admin_extra_nav[2]}
                    {if has_access($user->roleid,'transactions')}
                        {if $config['accounting'] eq '1'}
                            <li class="{if $_application_menu eq 'transactions'}active{/if}">
                                <a href="#"><i class="fa fa-calculator"></i> <span class="nav-label">{$_L['Accounting']}</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li><a href="{$_url}transactions/deposit/">{$_L['New Deposit']}</a></li>
                                    <li><a href="{$_url}transactions/expense/">{$_L['New Expense']}</a></li>
                                    <li><a href="{$_url}transactions/transfer/">{$_L['Transfer']}</a></li>



                                    <li><a href="{$_url}transactions/list/">{$_L['View Transactions']}</a></li>




                                    {if has_access($user->roleid,'bank_n_cash')}

                                        <li><a href="{$_url}accounts/list/">{$_L['Accounts']}</a></li>

                                        <li><a href="{$_url}transactions/uncleared">{$_L['Uncleared Transactions']}</a></li>

                                        <li><a href="{$_url}accounts/add/">{$_L['New Account']}</a></li>


                                    {/if}

                                    <li><a href="{$_url}assets/list/">{$_L['Assets']}</a></li>






                                </ul>
                            </li>
                        {/if}
                    {/if}


                    {$admin_extra_nav[3]}


                    {if has_access($user->roleid,'sales')}

                        {if ($config['invoicing'] eq '1') OR ($config['quotes'] eq '1')}



                            <li class="{if $_application_menu eq 'invoices'}active{/if}">
                                <a href="#"><i class="icon-credit-card-1"></i> <span class="nav-label">{$_L['Sales']}</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">

                                    {if $config['invoicing'] eq '1'}
                                        <li><a href="{$_url}invoices/list/">{$_L['Invoices']}</a></li>
                                        <li><a href="{$_url}invoices/add/">{$_L['New Invoice']}</a></li>


                                        <li><a href="{$_url}invoices/add/1/0/pos">{$_L['POS']}</a></li>


                                        <li><a href="{$_url}invoices/list-recurring/">{$_L['Recurring Invoices']}</a></li>
                                        <li><a href="{$_url}invoices/add/recurring/">{$_L['New Recurring Invoice']}</a></li>
                                    {/if}

                                    {if isset($config['delivery_challans']) && ($config['delivery_challans'] == 1)}

                                        <li><a href="{$_url}sales/delivery_challans">{$_L['Delivery Challans']}</a></li>

                                    {/if}

                                    {if $config['quotes'] eq '1'}
                                        <li><a href="{$_url}quotes/list/">{$_L['Quotes']}</a></li>
                                        <li><a href="{$_url}quotes/new/">{$_L['Create New Quote']}</a></li>
                                    {/if}

                                    <li><a href="{$_url}invoices/payments/">{$_L['Payments']}</a></li>



                                    {foreach $sub_menu_admin['sales'] as $sm_sales}

                                        {$sm_sales}


                                    {/foreach}

                                </ul>
                            </li>

                        {/if}

                    {/if}


                    {if has_access($user->roleid,'suppliers') && ($config['suppliers'])}

                        <li class="{if $_application_menu eq 'suppliers'}active{/if}">
                            <a href="#"><i class="fa fa-cube"></i> <span class="nav-label">{$_L['Suppliers']}</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                {if has_access($user->roleid,'suppliers','create')}
                                    <li><a href="{$_url}contacts/add/supplier">{$_L['Add Supplier']}</a></li>
                                {/if}
                                <li><a href="{$_url}contacts/list/supplier">{$_L['List Suppliers']}</a></li>

                                {*{if has_access($user->roleid,'companies','view') && ($config['companies'])}*}
                                    {*<li><a href="{$_url}contacts/companies/suppliers">{$_L['Companies']}</a></li>*}
                                {*{/if}*}


                                {*<li><a href="{$_url}contacts/groups/">{$_L['Groups']}</a></li>*}


                            </ul>
                        </li>

                    {/if}



                    {if has_access($user->roleid,'purchase') && ($config['purchase'])}




                            <li class="{if $_application_menu eq 'purchase'}active{/if}">
                                <a href="#"><i class="fa fa-cubes"></i> <span class="nav-label">{$_L['Purchase']}</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">

                                    <li><a href="{$_url}purchases/list/">{$_L['Purchase Orders']}</a></li>
                                    <li><a href="{$_url}purchases/add/">{$_L['New Purchase Order']}</a></li>


                                </ul>
                            </li>



                    {/if}

                    {*{if has_access($user->roleid,'suppliers') && ($config['suppliers'])}*}

                        {*<li class="{if $_application_menu eq 'suppliers'}active{/if}">*}
                            {*<a href="#"><i class="icon-th-large-outline"></i> <span class="nav-label">{$_L['Suppliers']}</span><span class="fa arrow"></span></a>*}
                            {*<ul class="nav nav-second-level">*}

                                {*{if has_access($user->roleid,'suppliers','create')}*}
                                    {*<li><a href="{$_url}suppliers/add/">{$_L['Add Supplier']}</a></li>*}
                                {*{/if}*}
                                {*<li><a href="{$_url}suppliers/list/">{$_L['List Suppliers']}</a></li>*}

                            {*</ul>*}
                        {*</li>*}
                    {*{/if}*}


                    {if has_access($user->roleid,'leads','view') && ($config['leads'])}
                        <li {if $_application_menu eq 'leads'}class="active"{/if}><a href="{$_url}leads/"><i class="fa fa-address-card-o"></i> <span class="nav-label">{$_L['Leads']}</span></a></li>
                    {/if}


                    {if has_access($user->roleid,'sms') && ($config['sms'])}

                        <li class="{if $_application_menu eq 'sms'}active{/if}">
                            <a href="#"><i class="fa fa-envelope-o"></i> <span class="nav-label">{$_L['SMS']}</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li><a href="{$_url}sms/init/send/">{$_L['Send Single SMS']}</a></li>
                                <li><a href="{$_url}sms/init/bulk/">{$_L['Send Bulk SMS']}</a></li>
                                {*<li><a href="{$_url}sms/init/inbox/">{$_L['Inbox']}</a></li>*}
                                <li><a href="{$_url}sms/init/sent/">{$_L['Sent']}</a></li>
                                <li><a href="{$_url}sms/init/templates/">{$_L['SMS Templates']}</a></li>
                                {*<li><a href="{$_url}sms/init/notifications/">{$_L['Notifications']}</a></li>*}
                                {*<li><a href="{$_url}sms/init/drivers/">{$_L['SMS Drivers']}</a></li>*}
                                <li><a href="{$_url}sms/init/settings/">{$_L['Settings']}</a></li>


                            </ul>
                        </li>



                    {/if}


                    {if has_access($user->roleid,'support') && ($config['support'])}

                        <li class="{if $_application_menu eq 'support'}active{/if}">
                            <a href="#"><i class="fa fa-life-ring"></i> <span class="nav-label">{$_L['Support']}</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li><a href="{$_url}tickets/admin/create/">{$_L['Open New Ticket']}</a></li>
                                <li><a href="{$_url}tickets/admin/list/">{$_L['Tickets']}</a></li>
                                <li><a href="{$_url}tickets/admin/predefined_replies/">{$_L['Predefined Replies']}</a></li>
                                <li><a href="{$_url}tickets/admin/departments/">{$_L['Departments']}</a></li>


                            </ul>
                        </li>



                    {/if}



                    {if has_access($user->roleid,'kb') && ($config['kb'])}

                        <li class="{if $_application_menu eq 'kb'}active{/if}">
                            <a href="#"><i class="fa fa-file-text-o"></i> <span class="nav-label">{$_L['Knowledgebase']}</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li><a href="{$_url}kb/a/edit/">{$_L['New Article']}</a></li>
                                <li><a href="{$_url}kb/a/all/">{$_L['All Articles']}</a></li>



                            </ul>
                        </li>



                    {/if}






                    {if has_access($user->roleid,'orders') && ($config['orders'])}

                        {if ($config['orders'] eq '1')}



                            <li class="{if $_application_menu eq 'orders'}active{/if}">
                                <a href="#"><i class="fa fa-server"></i> <span class="nav-label">{$_L['Orders']}</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li><a href="{$_url}orders/list/">{$_L['List All Orders']}</a></li>
                                    <li><a href="{$_url}orders/add/">{$_L['Add New Order']}</a></li>

                                </ul>
                            </li>

                        {/if}

                    {/if}


                    {if has_access($user->roleid,'hrm') && ($config['hrm'])}

                        {if ($config['hrm'] eq '1')}

                            <li class="{if $_application_menu eq 'hrm'}active{/if}">
                                <a href="#"><i class="fa fa-users"></i> <span class="nav-label">{$_L['HRM']}</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li><a href="{$_url}hrm/employees">{$_L['Employees']}</a></li>
                                    <li><a href="{$_url}hrm/attendance">{$_L['Attendance']}</a></li>
                                    <li><a href="{$_url}hrm/payroll">{$_L['Payroll']}</a></li>


                                </ul>
                            </li>

                        {/if}

                    {/if}


                    {*{if has_access($user->roleid,'projects') && ($config['projects'])}*}
                        {*<li class="{if $_application_menu eq 'projects'}active{/if}">*}
                            {*<a href="#"><i class="fa fa-file-text-o"></i> <span class="nav-label">{$_L['Projects']}</span><span class="fa arrow"></span></a>*}
                            {*<ul class="nav nav-second-level">*}
                                {*<li><a href="{$_url}projects/list/">List Projects</a></li>*}
                                {*<li><a href="{$_url}projects/add/">Add New Project</a></li>*}

                            {*</ul>*}
                        {*</li>*}
                    {*{/if}*}



                    {*{if has_access($user->roleid,'hrm') && ($config['hrm'])}*}
                        {*<li class="{if $_application_menu eq 'hrm'}active{/if}">*}
                            {*<a href="#"><i class="icon-vcard"></i> <span class="nav-label">{$_L['HRM']}</span><span class="fa arrow"></span></a>*}
                            {*<ul class="nav nav-second-level">*}
                                {*<li><a href="{$_url}orders/list/">{$_L['List All Orders']}</a></li>*}
                                {*<li><a href="{$_url}orders/add/">{$_L['Add New Order']}</a></li>*}

                            {*</ul>*}
                        {*</li>*}
                    {*{/if}*}


                    {if has_access($user->roleid,'documents') && ($config['documents'])}
                        <li {if $_application_menu eq 'documents'}class="active"{/if}><a href="{$_url}documents/"><i class="fa fa-file-o"></i> <span class="nav-label">{$_L['Documents']}</span></a></li>
                    {/if}



                    {if has_access($user->roleid,'tasks') && ($config['tasks'])}
                        <li {if $_application_menu eq 'tasks'}class="active"{/if}><a href="{$_url}tasks"><i class="fa fa-tasks"></i> <span class="nav-label">{$_L['Tasks']}</span></a></li>
                    {/if}



                    {if has_access($user->roleid,'calendar') && ($config['calendar'])}
                        <li {if $_application_menu eq 'calendar'}class="active"{/if}><a href="{$_url}calendar/events/"><i class="fa fa-calendar"></i> <span class="nav-label">{$_L['Calendar']}</span></a></li>
                    {/if}




                    {$admin_extra_nav[4]}

                    {*{if has_access($user->roleid,'bank_n_cash')}*}
                        {*{if $config['accounting'] eq '1'}*}
                            {*<li class="{if $_application_menu eq 'accounts'}active{/if}">*}
                                {*<a href="#"><i class="fa fa-university"></i> <span class="nav-label">{$_L['Bank n Cash']}</span><span class="fa arrow"></span></a>*}
                                {*<ul class="nav nav-second-level">*}
                                    {*<li><a href="{$_url}accounts/add/">{$_L['New Account']}</a></li>*}

                                    {*<li><a href="{$_url}accounts/list/">{$_L['List Accounts']}</a></li>*}
                                    {*<li><a href="{$_url}accounts/balances/">{$_L['Account_Balances']}</a></li>*}

                                {*</ul>*}
                            {*</li>*}
                        {*{/if}*}

                    {*{/if}*}


                    {$admin_extra_nav[5]}

                    {if has_access($user->roleid,'products_n_services')}

                        {if ($config['invoicing'] eq '1') OR ($config['quotes'] eq '1')}
                            <li class="{if $_application_menu eq 'ps'}active{/if}">
                                <a href="#"><i class="fa fa-cube"></i> <span class="nav-label">{$_L['Products n Services']}</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                            {if $config['inventory'] eq '1'}
                                    {*<li><a href="{$_url}inventory/dashboard/">{$_L['Inventory']}</a></li>*}
                            {/if}
                                    <li><a href="{$_url}ps/p-list/">{$_L['Products']}</a></li>
                                    <li><a href="{$_url}ps/p-new/">{$_L['New Product']}</a></li>
                                    <li><a href="{$_url}ps/s-list/">{$_L['Services']}</a></li>
                                    <li><a href="{$_url}ps/s-new/">{$_L['New Service']}</a></li>


                                </ul>
                            </li>
                        {/if}

                    {/if}




                    {$admin_extra_nav[6]}

                    {if has_access($user->roleid,'reports')}



                            <li class="{if $_application_menu eq 'reports'}active{/if}">
                                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">{$_L['Reports']} </span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">



                        {if $config['accounting'] eq '1'}

                            <li><a href="{$_url}transactions/list/0/0/reports">{$_L['Transactions']}</a></li>
                            <li><a href="{$_url}reports/invoices/">{$_L['Invoices']}</a></li>
                            <li><a href="{$_url}reports/purchases/">{$_L['Purchases']}</a></li>
                            {*<li><a href="{$_url}reports/customers">{$_L['Customers']}</a></li>*}
                            {*<li><a href="{$_url}reports/suppliers">{$_L['Suppliers']}</a></li>*}
                                    <li><a href="{$_url}reports/statement/">{$_L['Account Statement']}</a></li>
                                    <li><a href="{$_url}reports/income/">{$_L['Income Reports']}</a></li>
                                    <li><a href="{$_url}reports/expense/">{$_L['Expense Reports']}</a></li>
                                    <li><a href="{$_url}reports/income-vs-expense/">{$_L['Income Vs Expense']}</a></li>

                                    <li><a href="{$_url}reports/by-date/">{$_L['Reports by Date']}</a></li>
                                    {*<li><a href="{$_url}reports/cats/">{$_L['Reports by Category']}</a></li>*}
                                    <li><a href="{$_url}transactions/list/0/income/reports">{$_L['All Income']}</a></li>
                                    <li><a href="{$_url}transactions/list/0/expense/reports">{$_L['All Expense']}</a></li>


                        {/if}



                                    <li><a href="{$_url}reports/sales/">{$_L['Sales']}</a></li>


                                    <li><a href="{$_url}reports/invoices_expense/">{$_L['Invoices Vs Expense']}</a></li>


                                    <li><a href="{$_url}reports/export/">{$_L['Export']}</a></li>

                                    <li><a href="{$_url}reports/tax/">{$_L['Tax']}</a></li>

                                    {foreach $sub_menu_admin['reports'] as $sm_report}

                                        {$sm_report}


                                    {/foreach}


                                </ul>
                            </li>

                    {/if}

                    {if has_access($user->roleid,'utilities')}

                        <li class="{if $_application_menu eq 'util'}active{/if}">
                            <a href="#"><i class="icon-article"></i> <span class="nav-label">{$_L['Utilities']} </span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{$_url}util/activity/">{$_L['Activity Log']}</a></li>
                                <li><a href="{$_url}util/sent-emails/">{$_L['Email Message Log']}</a></li>
                                <li><a href="{$_url}util/invoice_access_log/">{$_L['Invoice Access Log']}</a></li>
                                <li><a href="{$_url}util/admin_notification/">{$_L['Notifications']}</a></li>
                                <li><a href="{$_url}util/backups/">{$_L['Backup']}</a></li>
                                <li><a href="{$_url}util/dbstatus/">{$_L['Database Status']}</a></li>
                                <li><a href="{$_url}util/cronlogs/">{$_L['CRON Log']}</a></li>
                                <li><a href="{$_url}util/integrationcode/">{$_L['Integration Code']}</a></li>
                                <li><a href="{$_url}util/sys_status/">{$_L['System Status']}</a></li>
                                <li><a href="{$_url}terminal/">{$_L['Terminal']}</a></li>
                                {*<li><a id="app_media" href="javascript:;" data-src="{$_url}mediabox">{$_L['Media']}</a></li>*}

                                {if ($config['password_manager']) && has_access($user->roleid,'password_manager')}
                                    <li><a href="{$_url}password_manager">{$_L['Password Manager']}</a></li>
                                {/if}


                                <li><a href="{$_url}util/tools/">{$_L['Tools']}</a></li>
                            </ul>
                        </li>

                    {/if}



                    {if has_access($user->roleid,'appearance')}

                        <li class="{if $_application_menu eq 'appearance'}active{/if}" id="li_appearance">
                            <a href="#"><i class="icon-params"></i> <span class="nav-label">{$_L['Appearance']} </span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li><a href="{$_url}appearance/ui/">{$_L['User Interface']}</a></li>
                                <li><a href="{$_url}appearance/customize/">{$_L['Customize']}</a></li>

                                {foreach $sub_menu_admin['appearance'] as $sm_appearance}

                                    {$sm_appearance}


                                {/foreach}

                                <li><a href="{$_url}appearance/editor/">{$_L['Editor']}</a></li>

                                <li><a href="{$_url}appearance/themes/">{$_L['Themes']}</a></li>

                            </ul>
                        </li>

                    {/if}

                    {if has_access($user->roleid,'plugins') && ($config['plugins'])}
                        <li {if $_application_menu eq 'plugins'}class="active"{/if}><a href="{$_url}settings/plugins/"><i class="fa fa-plug"></i> <span class="nav-label">{$_L['Plugins']}</span></a></li>
                    {/if}


                    {if has_access($user->roleid,'settings')}
                        <li class="{if $_application_menu eq 'settings'}active{/if}" id="li_settings">
                            <a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">{$_L['Settings']} </span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{$_url}settings/app/">{$_L['General Settings']}</a></li>
                                <li><a href="{$_url}settings/users/">{$_L['Staff']}</a></li>
                                <li><a href="{$_url}settings/roles/">{$_L['Roles']}</a></li>
                                <li><a href="{$_url}settings/localisation/">{$_L['Localisation']}</a></li>
                                <li><a href="{$_url}settings/currencies/">{$_L['Currencies']}</a></li>

                                <li><a href="{$_url}settings/pg/">{$_L['Payment Gateways']}</a></li>

                                {if $config['accounting'] eq '1'}
                                    <li><a href="{$_url}settings/expense-categories/">{$_L['Expense Categories']}</a></li>
                                    <li><a href="{$_url}settings/expense-types/">{$_L['Expense Types']}</a></li>
                                    <li><a href="{$_url}settings/income-categories/">{$_L['Income Categories']}</a></li>
                                    <li><a href="{$_url}settings/units/">{$_L['Units']}</a></li>
                                    <li><a href="{$_url}settings/tags/">{$_L['Manage Tags']}</a></li>
                                    <li><a href="{$_url}settings/pmethods/">{$_L['Payment Methods']}</a></li>
                                    <li><a href="{$_url}tax/list/">{$_L['Sales Taxes']}</a></li>
                                {/if}


                                <li><a href="{$_url}settings/emls/">{$_L['Email Settings']}</a></li>
                                <li><a href="{$_url}settings/email-templates/">{$_L['Email Templates']}</a></li>
                                <li><a href="{$_url}settings/customfields/">{$_L['Custom Contact Fields']}</a></li>
                                <li><a href="{$_url}settings/automation/">{$_L['Automation Settings']}</a></li>
                                <li><a href="{$_url}settings/api/">{$_L['API Access']}</a></li>
                                {foreach $sub_menu_admin['settings'] as $sm_settings}

                                    {$sm_settings}


                                {/foreach}
                                <li><a href="{$_url}settings/features/">{$_L['Choose Features']}</a></li>


                                {*{if APP_MODE neq 'wl' }*}
                                    {*<li><a href="{$_url}settings/about/">{$_L['About']}</a></li>*}
                                {*{/if}*}





                            </ul>
                        </li>
                    {/if}




                </ul>

            </div>
        </nav>


        <div id="page-wrapper" class="page-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-fixed-top white-bg" role="navigation" style="margin-bottom: 0">

                    {if ($config['top_bar_is_dark'])}

                        <a href="{$_url}dashboard"><img class="logo hidden-xs" style="max-height: 40px; width: auto;" src="{$app_url}storage/system/{$config['logo_inverse']}" alt="Logo"></a>

                        {else}

                        <a href="{$_url}dashboard"><img class="logo hidden-xs" style="max-height: 40px; width: auto;" src="{$app_url}storage/system/{$config['logo_default']}" alt="Logo"></a>

                    {/if}


                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2" href="#"><i class="fa fa-dedent"></i> </a>

                    </div>
                    <ul class="nav navbar-top-links navbar-right pull-right">



                        <li class="hidden-xs">
                            <form class="navbar-form full-width" method="post" action="{$_url}contacts/list/">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="{$_L['Search Customers']}...">
                                    <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </li>


                        {if has_access($user->roleid,'reports')}

                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" id="get_activity" href="#" aria-expanded="true">
                                    <i class="fa fa-bell"></i>
                                    <span class="label label-warning notification-counter"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-alerts" id="activity_loaded">



                                    <li style="text-align: center;">
                                        <div class="md-preloader text-center"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" height="32" width="32" viewbox="0 0 75 75"><circle cx="37.5" cy="37.5" r="33.5" stroke-width="6"/></svg></div>
                                    </li>
                                </ul>
                            </li>

                        {/if}



                        <li class="dropdown navbar-user">

                            <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">


                                {if $user['img'] eq ''}
                                    <img src="{$app_url}ui/lib/imgs/default-user-avatar.png" alt="">
                                {else}
                                    <img src="{$app_url}{$user['img']}" class="img-circle" alt="{$user['fullname']}">
                                {/if}

                                <span class="hidden-xs">{$_L['Welcome']} {$user['fullname']}</span> <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu animated fadeIn">
                                <li class="arrow"></li>
                                <li><a href="{$_url}settings/users-edit/{$user['id']}/">{$_L['Edit Profile']}</a></li>
                                <li><a href="{$_url}settings/change-password/">{$_L['Change Password']}</a></li>
                                <li class="divider"></li>
                                <li><a href="{$_url}logout/">{$_L['Logout']}</a></li>

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



            <div class="wrapper wrapper-content {$config['contentAnimation']}">


                {if isset($notify)}{$notify}{/if}









                {block name="content"}{/block}











                <div id="ajax-modal" class="modal container fade-scale" tabindex="-1" style="display: none;"></div>
            </div>

            {if $tpl_footer}
                {if $config['hide_footer']}

                {else}
                    <div class="footer">
                        <div>
                            <strong>{$_L['Copyright']}</strong> &copy; {$config['CompanyName']}
                        </div>
                    </div>
                {/if}
            {/if}

        </div>

        <div id="right-sidebar">
            <div class="sidebar-container">

                <ul class="nav nav-tabs navs-3">

                    <li class="active"><a data-toggle="tab" href="#tab-1">
                            {$_L['Notes']}
                        </a></li>
                    {*<li><a data-toggle="tab" href="#tab-2">*}
                    {*{$_L['Team']}*}
                    {*</a></li>*}
                    <li class=""><a data-toggle="tab" href="#tab-3">
                            <i class="fa fa-gear"></i>
                        </a></li>
                </ul>

                <div class="tab-content">


                    <div id="tab-1" class="tab-pane active">

                        <div class="sidebar-title">
                            <h3> <i class="fa fa-file-text-o"></i> {$_L['Quick Notes']}</h3>

                        </div>

                        <div style="padding: 10px">

                            <form class="form-horizontal push-10-t push-10" method="post" onsubmit="return false;">

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material floating">
                                            <textarea class="form-control" id="ib_admin_notes" name="ib_admin_notes" rows="10">{$user->notes}</textarea>
                                            <label for="ib_admin_notes">{$_L['Whats on your mind']}</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <button class="btn btn-sm btn-success" type="submit" id="ib_admin_notes_save"><i class="fa fa-check"></i> {$_L['Save']}</button>
                                    </div>
                                </div>
                            </form>
                        </div>




                    </div>



                    <div id="tab-3" class="tab-pane">

                        <div class="sidebar-title">
                            <h3><i class="fa fa-gears"></i> {$_L['Settings']}</h3>

                        </div>

                        <div class="setings-item">
                            <h4>{$_L['Theme_Color']}</h4>

                            <ul id="ib_theme_color" class="ib_theme_color">

                                {*<li><a href="{$_url}settings/set_color/light/"><span class="light"></span></a></li>*}
                                {*<li><a href="{$_url}settings/set_color/blue/"><span class="blue"></span></a></li>*}
                                <li><a href="{$_url}settings/set_color/light_blue/"><span class="light_blue"></span></a></li>
                                {*<li><a href="{$_url}settings/set_color/dark/"><span class="dark"></span></a></li>*}
                                <li><a href="{$_url}settings/set_color/purple/"><span class="purple"></span></a></li>
                                <li><a href="{$_url}settings/set_color/indigo_blue/"><span class="purple"></span></a></li>
                            </ul>


                        </div>
                        <div class="setings-item">
                    <span>
                        {$_L['Fold Sidebar Default']}
                    </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="r_fold_sidebar" {if get_option('mininav') eq '1'}checked{/if} class="onoffswitch-checkbox" id="r_fold_sidebar">
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



{*<script src="{$app_url}ui/lib/cloudonex.js"></script>*}





{if $config['language'] neq 'en'}

    <script src="{$app_url}ui/lib/moment/moment-with-locales.min.js"></script>

    <script>
        moment.locale('{getMomentLocale($clx_language_code)}');
    </script>

{else}

    <script src="{$app_url}ui/lib/moment/moment.min.js"></script>

{/if}

<script src="{$app_url}ui/assets/js/app.js?v={$file_build}_a"></script>


{*<script src="{$app_url}ui/lib/fancybox/fancybox.min.js?ver={$file_build}"></script>*}

{*<script src="{$app_url}ui/lib/app.js?ver={$file_build}"></script>*}
{*<script src="{$app_url}ui/lib/toggle/bootstrap-toggle.min.js"></script>*}
{*<script type="text/javascript" src="{$app_url}ui/lib/notify/pnotify.min.js"></script>*}



<!-- iCheck -->
{*<script src="{$app_url}ui/lib/icheck/icheck.min.js"></script>*}
{*<script src="{$theme}default/js/theme.js?ver={$file_build}"></script>*}
{*<script src="{$app_url}ui/lib/admin.js?ver={$file_build}"></script>*}



{if isset($xfooter)}
    {$xfooter}
{/if}

{block name=script}{/block}

<script>
    jQuery(document).ready(function() {

        matForms();

        {if isset($xjq)}
        {$xjq}
        {/if}

        var _url = $("#_url").val();

        // $('.notification-counter').text('5');

        function notification(){
            $.get(_url+'util/notification_count', function(data){
                if(data != 0){
                    $('.notification-counter').text(data);
                }else{
                    $('.notification-counter').text('');
                }
            });
        }

        notification();

        setInterval(function(){
            notification();
        }, 30000);
    });

    

</script>



</body>

</html>
