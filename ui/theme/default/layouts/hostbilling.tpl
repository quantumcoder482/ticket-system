<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$_title}</title>
    <link rel="shortcut icon" href="{$app_url}storage/icon/favicon.ico" type="image/x-icon" />


    <link href="{$theme}default/css/hostbilling.css?v=4" rel="stylesheet">


    {foreach $plugin_ui_header_admin as $plugin_ui_header_add}
        {$plugin_ui_header_add}
    {/foreach}

    {if $config['rtl'] eq '1'}
        <link href="{$theme}default/css/bootstrap-rtl.min.css" rel="stylesheet">
        <link href="{$theme}default/css/style-rtl.min.css" rel="stylesheet">
    {/if}

    {if isset($xheader)}
        {$xheader}
    {/if}

    {block name=style}{/block}

    {foreach $plugin_ui_header_admin_css as $plugin_ui_header_add_css}
        <link href="{$plugin_ui_header_add_css}" rel="stylesheet">
    {/foreach}



</head>

<body>

<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html"><img src="{$app_url}storage/system/hostbilling.png" alt=""></a>

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
                    <i class="icon-users position-left"></i> {$_L['Customers']} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu width-250">



                    {if has_access($user->roleid,'customers','create')}
                        <li><a href="{$_url}contacts/add/">{$_L['Add Customer']}</a></li>
                    {/if}

                    <li><a href="{$_url}contacts/list/">{$_L['List Customers']}</a></li>

                    {if has_access($user->roleid,'companies','view') && ($config['companies'])}
                        <li><a href="{$_url}contacts/companies/">{$_L['Companies']}</a></li>
                    {/if}


                    <li><a href="{$_url}contacts/groups/">{$_L['Groups']}</a></li>



                    {foreach $sub_menu_admin['crm'] as $sm_crm}

                        {$sm_crm}


                    {/foreach}



                </ul>
            </li>


            {if has_access($user->roleid,'sales')}

                {if ($config['invoicing'] eq '1') OR ($config['quotes'] eq '1')}

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-credit-card-1 position-left"></i> {$_L['Billing']} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu width-250">

                            {if $config['invoicing'] eq '1'}
                                <li><a href="{$_url}invoices/list/">{$_L['Invoices']}</a></li>
                                <li><a href="{$_url}invoices/add/">{$_L['New Invoice']}</a></li>



                                <li><a href="{$_url}invoices/list-recurring/">{$_L['Recurring Invoices']}</a></li>
                                <li><a href="{$_url}invoices/add/recurring/">{$_L['New Recurring Invoice']}</a></li>
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


            {if has_access($user->roleid,'orders') && ($config['orders'])}

                {if ($config['orders'] eq '1')}


                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-server position-left"></i> {$_L['Orders']} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu width-250">

                            <li><a href="{$_url}orders/list/">{$_L['List All Orders']}</a></li>
                            <li><a href="{$_url}orders/add/">{$_L['Add New Order']}</a></li>



                        </ul>
                    </li>



                {/if}

            {/if}

            {if has_access($user->roleid,'support') && ($config['support'])}

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-life-ring position-left"></i> {$_L['Support']} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu width-250">

                        <li><a href="{$_url}tickets/admin/create/">{$_L['Open New Ticket']}</a></li>
                        <li><a href="{$_url}tickets/admin/list/">{$_L['Tickets']}</a></li>
                        <li><a href="{$_url}tickets/admin/predefined_replies/">{$_L['Predefined Replies']}</a></li>
                        <li><a href="{$_url}tickets/admin/departments/">{$_L['Departments']}</a></li>

                        <li><a href="{$_url}kb/a/edit/">{$_L['New Article']}</a></li>
                        <li><a href="{$_url}kb/a/all/">{$_L['All Articles']}</a></li>

                    </ul>
                </li>



            {/if}


            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-article position-left"></i> {$_L['Apps']} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu width-250">

                    {if has_access($user->roleid,'documents') && ($config['documents'])}
                        <li><a href="{$_url}documents/">{$_L['Documents']}</a></li>
                    {/if}



                    {if has_access($user->roleid,'tasks') && ($config['tasks'])}
                        <li {if $_application_menu eq 'tasks'}class="active"{/if}><a href="{$_url}tasks">{$_L['Tasks']}</a></li>
                    {/if}



                    {if has_access($user->roleid,'calendar') && ($config['calendar'])}
                        <li><a href="{$_url}calendar/events/">{$_L['Calendar']}</a></li>
                    {/if}

                    {if ($config['password_manager']) && has_access($user->roleid,'password_manager')}
                        <li><a href="{$_url}password_manager">{$_L['Password Manager']}</a></li>
                    {/if}

                </ul>
            </li>


            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bar-chart-o position-left"></i> {$_L['Reports']} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu width-250">

                    <li><a href="{$_url}reports/sales/">{$_L['Invoices']}</a></li>
                    <li><a href="{$_url}util/activity/">{$_L['Activity Log']}</a></li>
                    <li><a href="{$_url}util/sent-emails/">{$_L['Email Message Log']}</a></li>
                    <li><a href="{$_url}util/invoice_access_log/">{$_L['Invoice Access Log']}</a></li>
                    <li><a href="{$_url}util/dbstatus/">{$_L['Database Status']}</a></li>
                    <li><a href="{$_url}util/cronlogs/">{$_L['CRON Log']}</a></li>
                    <li><a href="{$_url}util/sys_status/">{$_L['System Status']}</a></li>

                </ul>
            </li>


        </ul>

        <ul class="nav navbar-nav navbar-right">

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-cogs"></i>
                    <span class="visible-xs-inline-block position-right">{$_L['Settings']}</span>
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="{$_url}settings/app/">{$_L['General Settings']}</a></li>
                    <li><a href="{$_url}settings/users/">{$_L['Staff']}</a></li>
                    <li><a href="{$_url}settings/roles/">{$_L['Roles']}</a></li>

                    <li><a href="{$_url}ps/p-list/">{$_L['Products n Services']}</a></li>

                    <li><a href="{$_url}settings/localisation/">{$_L['Localisation']}</a></li>
                    <li><a href="{$_url}settings/currencies/">{$_L['Currencies']}</a></li>

                    <li><a href="{$_url}settings/pg/">{$_L['Payment Gateways']}</a></li>



                    <li><a href="{$_url}settings/emls/">{$_L['Email Settings']}</a></li>
                    <li><a href="{$_url}settings/email-templates/">{$_L['Email Templates']}</a></li>
                    <li><a href="{$_url}settings/customfields/">{$_L['Custom Contact Fields']}</a></li>
                    <li><a href="{$_url}settings/automation/">{$_L['Automation Settings']}</a></li>
                    <li><a href="{$_url}settings/api/">{$_L['API Access']}</a></li>

                </ul>
            </li>
        </ul>
    </div>
</div>

<section>
    <div id="wrapper">






        <div id="page-wrapper" class="page-bg">




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
        moment.locale('{$config['momentLocale']}');
    </script>

{else}

    <script src="{$app_url}ui/lib/moment/moment.min.js"></script>

{/if}

<script src="{$app_url}ui/assets/js/app.js?v={$file_build}"></script>






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



</body>

</html>
