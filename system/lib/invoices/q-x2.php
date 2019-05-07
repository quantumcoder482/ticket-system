<html>


<head>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font: 12px/1.4 dejavusanscondensed;
        }

        #page-wrap {
            width: 800px;
            margin: 0 auto;
        }

        table {
            border-collapse: collapse;
        }

        table td,
        table th {
            border: 1px solid black;
            padding: 5px;
        }


        #customer {
            overflow: hidden;
        }

        #logo {
            text-align: right;
            float: right;
            position: relative;
            margin-top: 25px;
            border: 1px solid #fff;
            max-width: 540px;
            overflow: hidden;
        }

        #meta {
            margin-top: 1px;
            width: 100%;
            float: right;
        }

        #meta td {
            text-align: right;
        }

        #meta td.meta-head {
            text-align: left;
            background: #eee;
        }

        #meta td textarea {
            width: 100%;
            height: 20px;
            text-align: right;
        }

        #items {
            clear: both;
            width: 100%;
            margin: 0 0 0 0;
            border: 1px solid black;
        }

        #items th {
            background: #eee;
        }

        #items textarea {
            width: 80px;
            height: 50px;
        }

        #items tr.item-row td {
            vertical-align: top;
        }

        #items td.description {
            width: 300px;
        }

        #items td.item-name {
            width: 175px;
        }

        #items td.description textarea,
        #items td.item-name textarea {
            width: 100%;
        }

        #items td.total-line {
            border-right: 0;
            text-align: right;
        }

        #items td.total-value {
            border-left: 0;
            padding: 10px;
        }

        #items td.total-value textarea {
            height: 20px;
            background: none;
        }

        #items td.balance {
            background: #eee;
        }

        #items td.blank {
            border: 0;
        }

        .paper {
            margin: 50px auto;
            width: 980px;
            border: 2px solid #DDD;
            background-color: #FFF;
            position: relative;
            font-size: 14px;
        }

        .panel {
            box-shadow: none;
            margin: 0px 25px;
        }

        hr {
            margin: 10px auto 10px;
            border-top: 2px solid #282C34;
        }


        div.signature hr {
            margin: 0;
            border-top: 1px solid #908989;
        }

        .static-title {
            margin: 0px auto 20px;
            text-align: center;
            font-size: 1.2em;
            font-weight: 600;
        }

        .title {
            margin: 5px 0px 5px;
            text-align: left;
            font-size: 1.1em;
            font-weight: 800;
            line-height: 1.5;
        }
    </style>

</head>

<body style="font-family:dejavusanscondensed">
    <section class="panel">

        <div class="panel-body">

            <div class="invoice">
                <header class="clearfix">
                    <div class="row" style="margin-top: 10px">
                        <table width="100%">
                            <tr>
                                <td style="border:0px; text-align:left">
                                    <div class="ib">
                                        <img src="<?php echo APP_URL; ?>/storage/system/<?php echo $config['logo_default']; ?>" alt="Logo" style="margin-bottom: 15px;">
                                    </div>
                                </td>
                                <td style="border:0px;" width="30%">
                                    <div class="ib">
                                        <?php echo $config['caddress']; ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <hr>
                </header>
                <div class="bill-info">

                    <div class="row">
                        <div class="col-md-12 mt-md">
                            <h4 class="static-title"><strong>ACCEPTANCE & COPYRIGHT AGREEMENT</strong></h4>
                        </div>
                    </div>

                    <div class="row">
                        <table width="100%">
                            <tr>
                                <td style="border:0px;">
                                    <div class="bill-to">
                                        <div>
                                            <?php if ($a['company'] != '') { ?>
                                                <?php echo $_L['ATTN'] . ':'; ?>
                                                <br>
                                                <?php echo $d['account']; ?>
                                                <br>
                                                <?php echo $a['company']; ?>
                                                <br>
                                            <?php } else { ?>
                                                <?php echo $_L['ATTN'] . ':'; ?>
                                                <br>
                                                <?php echo $d['account']; ?>
                                                <br>
                                            <?php } ?>

                                            <?php
                                            echo $a['address'] . '<br>' . $a['city'] . '<br>' . $a['state'] . ' - ' . $a['zip'] . '<br>' . $a['country'] . '<br>' . $_L['Phone'] . ':' . $a['phone'] . '<br>' . $_L['Email'] . ':' . $a['email'];
                                            // customfields output
                                            echo '<br>';
                                            ?>
                                        </div>
                                    </div>
                                </td>
                                <td style="border:0px" valign="top" width="40%">
                                    <div>

                                        <table width="100%">
                                            <tr>
                                                <td style="border:0px;" valign="top">
                                                    <div>
                                                        Submission ID:
                                                        <br>
                                                        Date Accepeted:
                                                        <br>
                                                        Month Published:
                                                        <br>
                                                        Copyright Status:
                                                        <br>
                                                    </div>
                                                </td>
                                                <td style="border:0px;" valign="top" width="45%">
                                                    <div>
                                                        <?php
                                                        if ($d['cn'] != '') {
                                                            echo $d['cn'];
                                                        } else {
                                                            echo $d['id'];
                                                        }
                                                        ?>
                                                        <br>
                                                        <?php echo date($config['df'], strtotime($d['datecreated'])); ?>
                                                        <br>
                                                        <?php echo date('F Y', strtotime($d['validuntil'])) ?>
                                                        <br>
                                                        <?php echo $d['stage']; ?>
                                                        <br>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <h4 class="title"><strong><?php echo $d['subject']; ?></strong></h4>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <?php echo $d['proposal']; ?>

                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="title"><strong>Copyright Agreement:</strong></h4>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-12" style="font-size:0.8em">

                        <?php echo $d['customernotes']; ?>

                    </div>
                </div>

                <div class="row">
                    <table width="100%" style="border:0px; margin:0px;">
                        <tr>
                            <td style="border:0px; width:25%"></td>
                            <td style="border:0px; width:110px">
                                <?php if ($d['stage'] == 'Accepted') { ?>
                                    <div class="signature">
                                        <p style="font-size:1.2em">Signature valid</p>
                                        <p style="font-size:0.9em">
                                            Digitally signed by<br>
                                            <?php echo $a['account']; ?><br>
                                            <?php echo date($config['df'], strtotime($d['dateaccepted'])); ?><br>
                                        </p>

                                    </div>

                                <?php } ?>
                            </td>
                            <td style="border:0px; width:40px; text-align:left">
                                <?php if ($d['stage'] == 'Accepted') { ?>
                                    <img src="<?php echo APP_URL; ?>/ui/assets/img/apply-icon.png" width="40px">
                                <?php } ?>
                            </td>
                            <td style="border:0px; width:50%"></td>
                            <td style="border:0px; width:110px">
                                <div class="signature">
                                    <p style="font-size:1.2em">Signature valid</p>
                                    <p style="font-size:0.9em">
                                        Digitally signed by<br>
                                        <?php echo $admin->fullname; ?><br>
                                        <?php echo date($config['df'], strtotime($d['datecreated'])); ?><br>
                                    </p>
                                </div>

                            </td>
                            <td style="border:0px; width:40px; text-align:left">
                                <img src="<?php echo APP_URL; ?>/ui/assets/img/apply-icon.png" width="40px">
                            </td>
                            <td style="border:0px; width:25%"></td>
                        </tr>
                        <tr>
                            <td style="border:0px; width:25%"></td>
                            <td colspan="2" style="border:0px; margin:0px">
                                <?php if ($d['stage'] == 'Accepted') { ?>
                                    <hr style="margin:0; border-top: 1px solid #908989;">
                                <?php } ?>
                            </td>
                            <td style="border:0px; width:50%"></td>
                            <td colspan="2" style="border:0px; margin:0px">
                                <hr style="margin:0; border-top: 1px solid #908989;">
                            </td>
                            <td style="border:0px; width:25%"></td>
                        </tr>
                    </table>

                </div>

            </div>

        </div>
    </section>
</body>

</html>