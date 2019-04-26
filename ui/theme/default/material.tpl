<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="initial-scale=1.0, width=device-width" name="viewport">
    <title>Cards - Material</title>

    <!-- css -->
    <link href="ui/lib/material/css/base.min.css" rel="stylesheet">

    <!-- favicon -->
    <!-- ... -->

    <!-- ie -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    {if isset($xheader)}
        {$xheader}
    {/if}
</head>
<body class="avoid-fout">
<div class="avoid-fout-indicator avoid-fout-indicator-fixed">
    <div class="progress-circular progress-circular-alt progress-circular-center">
        <div class="progress-circular-wrapper">
            <div class="progress-circular-inner">
                <div class="progress-circular-left">
                    <div class="progress-circular-spinner"></div>
                </div>
                <div class="progress-circular-gap"></div>
                <div class="progress-circular-right">
                    <div class="progress-circular-spinner"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<header class="header">
    <ul class="nav nav-list pull-left">
        <li>
            <a data-toggle="menu" href="#menu">
                <span class="icon icon-lg">menu</span>
            </a>
        </li>
    </ul>
    <a class="header-logo" href="index.html">Material</a>
    <ul class="nav nav-list pull-right">
        <li>
            <a data-toggle="menu" href="#profile">
                <span class="access-hide">John Smith</span>
                <span class="avatar"><img alt="alt text for John Smith avatar" src="ui/lib/material/images/users/avatar-001.jpg"></span>
            </a>
        </li>
    </ul>
</header>
<nav class="menu" id="menu">
    <div class="menu-scroll">
        <div class="menu-wrap">
            <div class="menu-content">
                <a class="menu-logo" href="index.html">Material</a>
                <ul class="nav">
                    <li class="active">
                        <a href="ui-card.html">Cards</a>
                    </li>
                    <li>
                        <a href="ui-collapse.html">Collapsible Regions</a>
                    </li>
                    <li>
                        <a href="ui-dropdown.html">Dropdowns</a>
                    </li>
                    <li>
                        <a href="ui-modal.html">Modals &amp; Toasts</a>
                    </li>
                    <li>
                        <a href="ui-nav.html">Navs</a>
                    </li>
                    <li>
                        <a href="ui-progress.html">Progress Bars</a>
                    </li>
                    <li>
                        <a href="ui-tab.html">Tabs</a>
                    </li>
                    <li>
                        <a href="ui-tile.html">Tiles</a>
                    </li>
                </ul>
                <hr>
                <ul class="nav">
                    <li>
                        <a href="ui-button.html">Buttons</a>
                    </li>
                    <li>
                        <a href="ui-form.html">Form Elements</a>
                        <span class="menu-collapse-toggle collapsed" data-target="#form-elements" data-toggle="collapse"><i class="icon menu-collapse-toggle-close">close</i><i class="icon menu-collapse-toggle-default">add</i></span>
                        <ul class="menu-collapse collapse" id="form-elements">
                            <li>
                                <a href="ui-form-adv.html">Form Elements <small>(materialised)</small></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="ui-icon.html">Icons</a>
                    </li>
                    <li>
                        <a href="ui-table.html">Tables</a>
                    </li>
                </ul>
                <hr>
                <ul class="nav">
                    <li>
                        <a href="page-affix.html">Full-Width Page <small>(with fixed LHC/RHC)</small></a>
                    </li>
                    <li>
                        <a href="page-palette.html">Page Palettes</a>
                        <span class="menu-collapse-toggle collapsed" data-target="#page-palettes" data-toggle="collapse"><i class="icon menu-collapse-toggle-close">close</i><i class="icon menu-collapse-toggle-default">add</i></span>
                        <ul class="menu-collapse collapse" id="page-palettes">
                            <li>
                                <a href="page-palette-blue.html">Blue Palette</a>
                            </li>
                            <li>
                                <a href="page-palette-green.html">Green Palette</a>
                            </li>
                            <li>
                                <a href="page-palette-purple.html">Purple Palette</a>
                            </li>
                            <li>
                                <a href="page-palette-red.html">Red Palette</a>
                            </li>
                            <li>
                                <a href="page-palette-yellow.html">Yellow Palette</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<nav class="menu menu-right" id="profile">
    <div class="menu-scroll">
        <div class="menu-wrap">
            <div class="menu-top">
                <div class="menu-top-img">
                    <img alt="John Smith" src="ui/lib/material/images/samples/landscape.jpg">
                </div>
                <div class="menu-top-info">
                    <a class="menu-top-user" href="javascript:void(0)"><span class="avatar pull-left"><img alt="alt text for John Smith avatar" src="ui/lib/material/images/users/avatar-001.jpg"></span>John Smith</a>
                </div>
                <div class="menu-top-info-sub">
                    <small>Some additional information about John Smith</small>
                </div>
            </div>
            <div class="menu-content">
                <ul class="nav">
                    <li>
                        <a href="javascript:void(0)"><span class="icon icon-lg">account_box</span>Profile Settings</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><span class="icon icon-lg">add_to_photos</span>Upload Photo</a>
                    </li>
                    <li>
                        <a href="page-login.html"><span class="icon icon-lg">exit_to_app</span>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div class="content">
    <div class="content-heading">
        <div class="container">
            <h1 class="heading">Dashboard</h1>
        </div>
    </div>
    <div class="container">
        <section class="content-inner">
            <h2 class="content-sub-heading">Basic Cards</h2>
            <div class="card-wrap">
                <div class="row">







                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card card-blue-bg">
                            <div class="card-main">
                                <div class="card-inner">
                                    <p class="card-heading">Blue Card!</p>
                                    <p>
                                        Lorem ipsum dolor sit amet.<br>
                                        Consectetur adipiscing elit.
                                    </p>
                                </div>
                                <div class="card-action">
                                    <ul class="nav nav-list pull-left">
                                        <li>
                                            <a href="javascript:void(0)"><span class="icon">add</span></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)"><span class="icon">delete</span></a>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle dropdown-toggle-blue" data-toggle="dropdown"><span class="icon">settings</span></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="javascript:void(0)"><span class="icon margin-right-sm">loop</span>&nbsp;Lorem Ipsum</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"><span class="icon margin-right-sm">replay</span>&nbsp;Consectetur Adipiscing</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"><span class="icon margin-right-sm">shuffle</span>&nbsp;Sed Ornare</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card card-green-bg">
                            <div class="card-main">
                                <div class="card-inner">
                                    <p class="card-heading">Green Card!</p>
                                    <p>
                                        Lorem ipsum dolor sit amet.<br>
                                        Consectetur adipiscing elit.
                                    </p>
                                </div>
                                <div class="card-action">
                                    <ul class="nav nav-list pull-left">
                                        <li>
                                            <a href="javascript:void(0)"><span class="icon">add</span></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)"><span class="icon">delete</span></a>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle dropdown-toggle-green" data-toggle="dropdown"><span class="icon">settings</span></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="javascript:void(0)"><span class="icon margin-right-sm">loop</span>&nbsp;Lorem Ipsum</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"><span class="icon margin-right-sm">replay</span>&nbsp;Consectetur Adipiscing</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"><span class="icon margin-right-sm">shuffle</span>&nbsp;Sed Ornare</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card card-purple-bg">
                            <div class="card-main">
                                <div class="card-inner">
                                    <p class="card-heading">Purple Card!</p>
                                    <p>
                                        Lorem ipsum dolor sit amet.<br>
                                        Consectetur adipiscing elit.
                                    </p>
                                </div>
                                <div class="card-action">
                                    <ul class="nav nav-list pull-left">
                                        <li>
                                            <a href="javascript:void(0)"><span class="icon">add</span></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)"><span class="icon">delete</span></a>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle dropdown-toggle-purple" data-toggle="dropdown"><span class="icon">settings</span></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="javascript:void(0)"><span class="icon margin-right-sm">loop</span>&nbsp;Lorem Ipsum</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"><span class="icon margin-right-sm">replay</span>&nbsp;Consectetur Adipiscing</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"><span class="icon margin-right-sm">shuffle</span>&nbsp;Sed Ornare</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card card-red-bg">
                            <div class="card-main">
                                <div class="card-inner">
                                    <p class="card-heading">Red Card!</p>
                                    <p>
                                        Lorem ipsum dolor sit amet.<br>
                                        Consectetur adipiscing elit.
                                    </p>
                                </div>
                                <div class="card-action">
                                    <ul class="nav nav-list pull-left">
                                        <li>
                                            <a href="javascript:void(0)"><span class="icon">add</span></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)"><span class="icon">delete</span></a>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle dropdown-toggle-red" data-toggle="dropdown"><span class="icon">settings</span></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="javascript:void(0)"><span class="icon margin-right-sm">loop</span>&nbsp;Lorem Ipsum</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"><span class="icon margin-right-sm">replay</span>&nbsp;Consectetur Adipiscing</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"><span class="icon margin-right-sm">shuffle</span>&nbsp;Sed Ornare</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <h2 class="content-sub-heading">Cards with Rich Media Content</h2>
<div class="col-md-12 ct-chart" style="height: 400px"></div>
            <h2 class="content-sub-heading">Cards with Vertical Split Area</h2>

            <div class="table-responsive">
                <table class="table table-hover table-stripe" title="Table with Hover and Stripe Rows">
                    <thead>
                    <tr>
                        <th>Lorem ipsum dolor</th>
                        <th>Sit amet consectetur</th>
                        <th>Adipiscing elit duis</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Id augue sagittis</td>
                        <td>Eleifend metus eget</td>
                        <td>Lacinia eros curabitur</td>
                    </tr>
                    <tr>
                        <td>Ac ultrices tortor</td>
                        <td>Nunc pellentesque est</td>
                        <td>Et velit condimentum</td>
                    </tr>
                    <tr>
                        <td>Convallis etiam sit</td>
                        <td>Amet augue eu</td>
                        <td>Turpis tempor consectetur</td>
                    </tr>
                    <tr>
                        <td>Suspendisse potenti proin</td>
                        <td>Molestie odio volutpat</td>
                        <td>Risus tristique euismod</td>
                    </tr>
                    <tr>
                        <td>Vitae eu felis</td>
                        <td>Donec ac interdum</td>
                        <td>Purus ac vestibulum</td>
                    </tr>
                    <tr>
                        <td>Enim donec venenatis</td>
                        <td>Pellentesque ante non</td>
                        <td>Faucibus suspendisse potenti</td>
                    </tr>
                    <tr>
                        <td>Cras egestas ac</td>
                        <td>Nibh at ornare</td>
                        <td>Aliquam quis sapien</td>
                    </tr>
                    <tr>
                        <td>Et est imperdiet</td>
                        <td>Tempus proin viverra</td>
                        <td>Semper felis iaculis</td>
                    </tr>
                    <tr>
                        <td>Sagittis ex luctus</td>
                        <td>A duis mollis</td>
                        <td>Nulla non tristique</td>
                    </tr>
                    </tbody>
                </table>
            </div>


        </section>
    </div>
</div>

<div class="fbtn-container">
    <div class="fbtn-inner">
        <a class="fbtn fbtn-red fbtn-lg" data-toggle="dropdown"><span class="fbtn-text">Links</span><span class="fbtn-ori icon">add</span><span class="fbtn-sub icon">close</span></a>
        <div class="fbtn-dropdown">
            <a class="fbtn" href="https://github.com/Daemonite/material" target="_blank"><span class="fbtn-text">Fork me on GitHub</span><span class="fa fa-github"></span></a>
            <a class="fbtn fbtn-blue" href="https://twitter.com/daemonites" target="_blank"><span class="fbtn-text">Follow Daemon on Twitter</span><span class="fa fa-twitter"></span></a>
            <a class="fbtn fbtn-alt" href="http://www.daemon.com.au/" target="_blank"><span class="fbtn-text">Visit Daemon Website</span><span class="icon">link</span></a>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="ui/lib/material/js/base.min.js"></script>
{if isset($xfooter)}
    {$xfooter}
{/if}
<script>
    jQuery(document).ready(function() {
        // initiate layout and plugins

        {if isset($xjq)}
        {$xjq}
        {/if}

        new Chartist.Line('.ct-chart', {
            labels: [1, 2, 3, 4, 5, 6, 7, 8],
            series: [
                [5, 9, 7, 8, 5, 3, 5, 4]
            ]
        }, {
            low: 0,
            showArea: true
        });

    });



</script>
</body>
</html>
