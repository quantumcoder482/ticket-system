<html>


<head>

    <style>

        * { margin: 0; padding: 0; }
        body {
            font: 14px/1.4  dejavusanscondensed;
        }
        #page-wrap { width: 800px; margin: 0 auto; }

        table { border-collapse: collapse; }
        table td, table th { border: 1px solid black; padding: 5px; }


        #customer { overflow: hidden; }

        #logo { text-align: right; float: right; position: relative; margin-top: 25px; border: 1px solid #fff; max-width: 540px; overflow: hidden; }

        #meta { margin-top: 1px; width: 100%; float: right; }
        #meta td { text-align: right;  }
        #meta td.meta-head { text-align: left; background: #eee; }
        #meta td textarea { width: 100%; height: 20px; text-align: right; }

        #items { clear: both; width: 100%; margin: 0 0 0 0; border: 1px solid black; }
        #items th { background: #eee; }
        #items textarea { width: 80px; height: 50px; }
        #items tr.item-row td {  vertical-align: top; }
        #items td.description { width: 300px; }
        #items td.item-name { width: 175px; }
        #items td.description textarea, #items td.item-name textarea { width: 100%; }
        #items td.total-line { border-right: 0; text-align: right; }
        #items td.total-value { border-left: 0; padding: 10px; }
        #items td.total-value textarea { height: 20px; background: none; }
        #items td.balance { background: #eee; }
        #items td.blank { border: 0; }



    </style>

</head>

<body style="font-family:dejavusanscondensed">

<div id="page-wrap">

    <table width="100%">
        <tr>
            <td style="border: 0;  text-align: left" width="62%">
                <span style="font-size: 18px; color: #2f4f4f"><strong><?php echo $_L['Quote']; ?> # <?php
                        if($d['cn'] != ''){
                            $dispid = $d['cn'];
                        }
                        else{
                            $dispid = $d['id'];
                        }
                        echo $d['invoicenum'].$dispid;
                        ?></strong></span>
            </td>
            <td style="border: 0;  text-align: right" width="62%"><div id="logo" style="font-size:18px">
                    <img id="image" src="<?php echo APP_URL; ?>/storage/system/<?php echo $config['logo_default']; ?>" alt="logo" />  <br> <br>
                    <?php echo $config['caddress']; ?>
                </div></td>
        </tr>



    </table>

    <hr>
    <div style="clear:both"></div>

    <div id="customer">

        <table id="meta">
            <tr>
                <td rowspan="5" style="border: 1px solid white; border-right: 1px solid black; text-align: left" width="62%"> <strong><?php echo $_L['Recipient']; ?>:</strong> <br>
                    <?php if($a['company'] != '') {
                        ?>
                        <?php echo $a['company']; ?> <br>
                        <?php echo $_L['ATTN']; ?>: <?php echo $a['account']; ?> <br>
                    <?php
                    }
                    else{
                        ?>
                        <?php echo $d['account']; ?> <br>
                    <?php
                    }
                    ?>
                    <?php echo $a['address']; ?> <br>
                    <?php echo $a['city']; ?> <?php echo $a['state']; ?> <?php echo $a['zip']; ?> <br>
                    <?php echo $a['country']; ?> <br>
                    <?php
                    if(($a['phone']) != ''){
                        echo 'Phone: '. $a['phone']. ' <br>';
                    }
                    if(($a['email']) != ''){
                        echo 'Email: '. $a['email']. ' <br>';
                    }
                    foreach ($cf as $cfs){
                        echo $cfs['fieldname'].': '. get_custom_field_value($cfs['id'],$a['id']). ' <br>';
                    }
                    ?></td>
                <td class="meta-head"><?php echo $_L['Quote']; ?> #</td>
                <td><?php echo $d['invoicenum'].$dispid; ?></td>
            </tr>
            <tr>

                <td class="meta-head"><?php echo $_L['Status']; ?></td>
                <td><?php
                    if($d['stage'] == 'Draft'){
                        echo $_L['Draft'];
                    }

                    elseif($d['stage'] == 'Delivered'){
                        echo $_L['Delivered'];
                    }

                    elseif($d['stage'] == 'On Hold'){
                        echo $_L['On Hold'];
                    }

                    elseif($d['stage'] == 'Accepted'){
                        echo $_L['Accepted'];
                    }

                    elseif($d['stage'] == 'Lost'){
                        echo $_L['Lost'];
                    }

                    elseif($d['stage'] == 'Dead'){
                        echo $_L['Dead'];
                    }

                    else{
                        echo $d['stage'];
                    }
                    ?></td>
            </tr>
            <tr>

                <td class="meta-head"><?php echo $_L['Date Created']; ?></td>
                <td><?php echo date($config['df'], strtotime($d['datecreated'])); ?></td>
            </tr>
            <tr>

                <td class="meta-head"><?php echo $_L['Expiry Date']; ?></td>
                <td><?php echo date($config['df'], strtotime($d['validuntil'])); ?></td>
            </tr>



                <tr>

                    <td class="meta-head"><?php echo $_L['Total']; ?></td>
                    <td><div class="due"><?php echo ib_money_format($d['total'],$config); ?></div></td>
                </tr>



        </table>

    </div>

    <br>

    <hr>

    <strong><?php echo $d->subject; ?></strong>



    <?php
    if($d['proposal'] != ''){

        ?>
        <hr>
        <div>

            <?php echo $d['proposal']; ?>
        </div>
        <hr>
    <?php
    }
    ?>

    <table id="items">

        <tr>
            <th width="65%"><?php echo $_L['Item']; ?></th>
            <th align="right"><?php echo $_L['Price']; ?></th>
            <th align="right"><?php echo $_L['Qty']; ?></th>
            <th align="right"><?php echo $_L['Total']; ?></th>

        </tr>



        <?php

        foreach ($items as $item){
            echo '  <tr class="item-row">


            <td class="description">'.$item['description'].'</td>
            <td align="right">'.ib_money_format($item['amount'],$config).'</td>
            <td align="right">'.$item['qty'].'</td>
            <td align="right"><span class="price">'.ib_money_format($item['total'],$config).'</span></td>
        </tr>';
        }

        ?>


        <tr>
            <td class="blank"> </td>
            <td colspan="2" class="total-line"><?php echo $_L['Sub Total']; ?></td>
            <td class="total-value"><div id="subtotal"><?php echo ib_money_format($d['subtotal'],$config); ?></div></td>
        </tr>
        <?php
        if(($d['discount']) != '0.00'){

            ?>
            <tr>
                <td class="blank"> </td>
                <td colspan="2" class="total-line"><?php echo $_L['Discount']; ?>

                    <?php
                    if($d['discount_type'] == 'p'){
                        echo '('.$d['discount_value'].')%';
                    }
                    ?>
                </td>
                <td class="total-value"><div id="subtotal"><?php echo ib_money_format($d['discount'],$config); ?></div></td>
            </tr>
        <?php
        }
        ?>
        <?php
        if (($d['tax1']) != '0.00' AND ($d['tax1']) != ''){
            ?>
            <tr>

                <td class="blank"> </td>
                <td colspan="2" class="total-line"><?php echo $d['taxname']; ?></td>
                <td class="total-value"><div id="total"><?php echo ib_money_format($d['tax1'],$config); ?></div></td>
            </tr>
        <?php
        }
        ?>


            <tr>
                <td class="blank"> </td>
                <td colspan="2" class="total-line balance"><?php echo $_L['Grand Total']; ?></td>
                <td class="total-value balance"><div class="due"><?php echo ib_money_format($d['total'],$config); ?></div></td>
            </tr>


    </table>

    <!--    related transactions -->



    <!--    end related transactions -->

    <?php
    if($d['customernotes'] != ''){

        ?>
        <hr>
        <div>

            <?php echo $d['customernotes']; ?>
        </div>
    <?php
    }
    ?>



</div>

</body>

</html>