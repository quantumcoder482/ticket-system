<!DOCTYPE html>
<!--
Application Name: CloudOnex Business Suite
Version: 1.0.2
Website: https://www.cloudonex.com/
License: You must have a valid license purchased only from cloudonex.com in order to legally use this software.
-->
<html>

<head>



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$_title}</title>
    <link rel="shortcut icon" href="{$app_url}storage/icon/favicon.ico" type="image/x-icon" />
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

    {*<link href="{$app_url}ui/lib/fancybox/fancybox.min.css" rel="stylesheet">*}

    <link href="{$theme}default/css/app.css?v={$file_build}" rel="stylesheet">

    <link href="{$theme}default/css/{$config['nstyle']}.css" rel="stylesheet">


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

    {foreach $plugin_ui_header_client as $plugin_ui_header_add}
        {$plugin_ui_header_add}
    {/foreach}

    {$config['header_scripts']}



</head>

<body class="fixed-nav {if $config['mininav']}mini-navbar{/if}">
<section>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">

                <ul class="nav nav-highlight" id="side-menu">

                    <li class="nav-header" style="background: url({$app_url}ui/theme/default/img/user-info.jpg) no-repeat;">


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
                                <li><a href="{$_url}client/profile">{$_L['Edit Profile']}</a></li>


                                <li class="divider"></li>
                                <li><a href="{$_url}client/logout/">{$_L['Logout']}</a></li>
                            </ul>
                        </div>
                    </li>



                    {$client_extra_nav[0]}
                    <li {if $_application_menu eq 'dashboard'}class="active"{/if}><a href="{$_url}client/dashboard/">
                            <i class="icon-th-large-outline"></i>
                            <span class="nav-label">{$_L['Dashboard']}</span></a></li>
                    {$client_extra_nav[1]}






                    {if ($config['orders'] eq '1')}


                        <li {if $_application_menu eq 'orders'}class="active"{/if}><a href="#"><i class="fa fa-server"></i> <span class="nav-label">{$_L['Orders']}</span><span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">
                                <li><a href="{$_url}client/orders/" >{$_L['My Orders']}</a></li>
                                <li><a href="{$_url}client/new-order/" >{$_L['Place New Order']}</a></li>
                            </ul>
                        </li>

                    {/if}


                    {if ($config['documents'])}
                        <li {if $_application_menu eq 'downloads'}class="active"{/if}><a href="{$_url}client/downloads/"><i class="fa fa-file-o"></i> <span class="nav-label">
                                    {if $config['client_drive']}{$_L['Documents']} {else}{$_L['Downloads']}{/if}
                                </span></a></li>
                    {/if}


                        <li {if $_application_menu eq 'invoices'}class="active"{/if}><a href="{$_url}client/invoices/"><i class="icon-credit-card-1"></i> <span class="nav-label">{$_L['Invoices']}</span></a></li>
                        {$client_extra_nav[2]}


                    {if ($config['quotes'])}
                        <li {if $_application_menu eq 'quotes'}class="active"{/if}><a href="{$_url}client/quotes/"><i class="icon-article"></i> <span class="nav-label">{$_L['Quotes']}</span></a></li>
                    {/if}




                    {$client_extra_nav[3]}


                        <li {if $_application_menu eq 'transactions'}class="active"{/if}><a href="{$_url}client/transactions/"><i class="icon-database"></i> <span class="nav-label">{$_L['Transactions']}</span></a></li>



                    {if ($config['kb'])}

                        <li {if $_application_menu eq 'kb'}class="active"{/if}><a href="{$_url}kb/c/"><i class="fa fa-file-text-o"></i> <span class="nav-label">{$_L['Knowledgebase']}</span></a></li>

                    {/if}

                    {if ($config['support'] eq '1')}


                        <li {if $_application_menu eq 'support'}class="active"{/if}><a href="#"><i class="fa fa-life-ring"></i> <span class="nav-label">{$_L['Tickets']}</span><span class="fa arrow"></span></a>

                            <ul class="nav nav-second-level">
                                <li><a href="{$_url}client/tickets/new" >{$_L['Open New Ticket']}</a></li>
                                <li><a href="{$_url}client/tickets/all" >{$_L['Tickets']}</a></li>
                            </ul>
                        </li>

                    {/if}



                    {$client_extra_nav[4]}



                    <li {if $_application_menu eq 'profile'}class="active"{/if}><a href="{$_url}client/profile/"><i class="icon-user-1"></i> <span class="nav-label">{$_L['Profile']}</span></a></li>


                </ul>

            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-fixed-top white-bg" role="navigation" style="margin-bottom: 0">

                    {if ($config['top_bar_is_dark'])}

                        <img class="logo hidden-xs" style="max-height: 40px; width: auto;" src="{$app_url}storage/system/{$config['logo_inverse']}" alt="Logo">

                    {else}

                        <img class="logo hidden-xs" style="max-height: 40px; width: auto;" src="{$app_url}storage/system/{$config['logo_default']}" alt="Logo">

                    {/if}

                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2" href="#"><i class="fa fa-dedent"></i> </a>

                    </div>
                    <ul class="nav navbar-top-links navbar-right pull-right">





                        <li class="dropdown navbar-user">

                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">


                                {if $user['img'] eq ''}
                                    <img src="{$app_url}ui/lib/imgs/default-user-avatar.png" alt="">
                                {else}
                                    <img src="{$app_url}{$user['img']}" class="img-circle" alt="{$user['account']}">
                                {/if}

                                <span class="hidden-xs">{$_L['Welcome']} {$user['account']}</span> <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu animated fadeIn">
                                <li class="arrow"></li>
                                <li><a href="{$_url}client/profile/">{$_L['Edit Profile']}</a></li>

                                <li class="divider"></li>
                                <li><a href="{$_url}client/logout/">{$_L['Logout']}</a></li>

                            </ul>
                        </li>

                    </ul>

                </nav>
            </div>

            <div class="row wrapper white-bg page-heading">
                <div class="col-lg-12">
                    <h2 style="color: #2F4050; font-size: 16px; font-weight: 400; margin-top: 18px">{$_st} </h2>

                </div>

            </div>

            <div class="wrapper wrapper-content animated fadeIn">
                {if isset($notify)}
                {$notify}
{/if}





                {block name="content"}{/block}








                <div id="ajax-modal" class="modal container fade" tabindex="-1" style="display: none;"></div>
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
    </div>
</section>
<!-- BEGIN PRELOADER -->
{if ($config['animate']) eq '1'}
    <div class="loader-overlay">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
    </div>
{/if}
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



{if $config['language'] neq 'en'}

    <script src="{$app_url}ui/lib/moment/moment-with-locales.min.js"></script>

    <script>
        moment.locale('{getMomentLocale($clx_language_code)}');
    </script>

{else}

    <script src="{$app_url}ui/lib/moment/moment.min.js"></script>

{/if}

<script src="{$app_url}ui/assets/js/app.js?v={$file_build}_a"></script>


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



    });

</script>
{$config['footer_scripts']}
</body>

</html>
