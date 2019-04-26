<!DOCTYPE html>
<html>
<head>
    <!-- Title here -->
    <title>{$_title}</title>
    <!-- Description, Keywords and Author -->
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your,Keywords">
    <meta name="author" content="ResponsiveWebInc">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Styles -->
    <!-- Bootstrap CSS -->
    <link href="{$_theme}/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome CSS -->




    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{$_theme}/img/favicon.ico">

    <style type="text/css">
        @media print
        {
            .no-print, .no-print *
            {
                display: none !important;
            }
        }
    </style>
</head>


<body>
<div class="row">
    <div class="col-md-12">


        <div id="printable">
            <h4>{$account} {$_L['Statement']} [{date( $config['df'], strtotime($fdate))} - {date( $config['df'], strtotime($tdate))}]</h4>
            <table class="table table-condensed table-bordered" style="background: #ffffff">
                <th>{$_L['Date']}</th>




                <th>{$_L['Description']}</th>
                <th class="text-right">{$_L['Dr']}</th>
                <th class="text-right">{$_L['Cr']}</th>
                <th class="text-right">{$_L['Balance']}</th>

                {foreach $d as $ds}
                    <tr>
                        <td>{date( $config['df'], strtotime($ds['date']))}</td>
                        <td>{$ds['description']}</td>


                        <td class="text-right">{$config['currency_code']} {number_format($ds['dr'],2,$config['dec_point'],$config['thousands_sep'])}</td>
                        <td class="text-right">{$config['currency_code']} {number_format($ds['cr'],2,$config['dec_point'],$config['thousands_sep'])}</td>
                        <td class="text-right"><span {if $ds['bal'] < 0}class="text-red"{/if}>{$config['currency_code']} {number_format($ds['bal'],2,$config['dec_point'],$config['thousands_sep'])}</span></td>

                    </tr>
                {/foreach}



            </table>
        </div>
        <button type="button" id="actprint" class="btn btn-default btn-sm no-print">{$_L['Click Here to Print']}</button>
    </div> <!-- Widget-1 end-->

    <!-- Widget-2 end-->
</div>
<script src="{$_theme}/js/jquery-1.10.2.js"></script>
<!-- Bootstrap JS -->
<script src="{$_theme}/js/bootstrap.min.js"></script>
<!-- jQuery UI -->


<!-- Javascript for this page -->
{if isset($xfooter)}
    {$xfooter}
{/if}
<script>
    jQuery(document).ready(function() {
        // initiate layout and plugins
        $("#actprint").click(function() {
            window.print();
            return false;
        });

    });

</script>

</body>
</html>