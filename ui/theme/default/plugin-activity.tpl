<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Plugin</title>

    <link href="{$_theme}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{$_theme}/lib/fa/css/font-awesome.min.css" rel="stylesheet">
    <link href="{$_theme}/lib/icheck/skins/all.css" rel="stylesheet">
    <link href="{$app_url}ui/lib/css/animate.css" rel="stylesheet">
    <link href="{$_theme}/css/style.css" rel="stylesheet">
    <link href="{$_theme}/css/custom.css" rel="stylesheet">

    {if $config['rtl'] eq '1'}
        <link href="{$_theme}/css/bootstrap-rtl.min.css" rel="stylesheet">
        <link href="{$_theme}/css/style-rtl.min.css" rel="stylesheet">
    {/if}

    {if isset($xheader)}
        {$xheader}
    {/if}
    <style type="text/css">
        body {

            background-color: #FAFAFA;
            overflow-x: visible;
        }
        .paper {
            margin: 50px auto;

            border: 2px solid #DDD;
            background-color: #FFF;
            position: relative;
            width: 600px;
        }
    </style>
</head>

<body class="fixed-nav">

<div class="paper">
    <section class="panel">
        <div class="panel-body">
            <div class="invoice">
                {if isset($notify)}
                    {$notify}
                {/if}
                <header class="clearfix">
                    <div class="row">
                        <div class="col-sm-8 mt-md">

                            <h4 class="h4 m-none text-dark text-bold">{$plugin['name']}</h4>
                            <p><span  id="countmsg">Please Wait...</span> Or <a href="{$_url}settings/plugins/">Click Here.</a> </p>
                        </div>
                        <div class="col-sm-4 text-right mt-md mb-md">
                            <h4>{$plugin_activity}</h4>

                        </div>
                    </div>
                </header>

                <div class="bill-info">
                    <div class="row">

                        <div class="col-md-12">
                            <textarea class="form-control" rows="10">{$msg}</textarea>
                        </div>
                    </div>
                </div>



            </div>




        </div>
    </section>

</div>

<!-- Mainly scripts -->
<script src="{$_theme}/js/jquery-1.10.2.js"></script>

<script>
    $(document).ready(function() {
        var count = 20;
        var countdown = setInterval(function(){
            $("#countmsg").html("Redirecting in " + count + " seconds!");

            if (count == 0) {
                clearInterval(countdown);
                window.open('{$_url}settings/plugins/', "_self");

            }
            count--;
        }, 1000);
    });
</script>
<!-- iCheck -->
<script src="{$_theme}/lib/icheck/icheck.min.js"></script>
{if isset($xfooter)}
    {$xfooter}
{/if}
<script>
    jQuery(document).ready(function() {
        // initiate layout and plugins

        {if isset($xjq)}
        {$xjq}
        {/if}

    });

</script>
</body>

</html>
