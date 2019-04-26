<?php
/* Smarty version 3.1.33, created on 2018-11-07 08:37:19
  from '/Users/razib/Documents/valet/suite/apps/snap/views/payments_make.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5be2ea8f012746_90581589',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9b29aef64496db56c33dfd144e2435c7852b7204' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/apps/snap/views/payments_make.tpl',
      1 => 1541597724,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be2ea8f012746_90581589 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en" >

<head>

    <meta charset="UTF-8">
    <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/icon/favicon.ico" type="image/x-icon" />

    <title>Payment</title>
    <!-- Material Design fonts -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <?php echo '<script'; ?>
 src="https://gateway.bluesnap.com/js/cse/v1.0.3/bluesnap.js"><?php echo '</script'; ?>
>

    <link rel='stylesheet prefetch' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/material-fullpalette.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/material.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/ripples.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/roboto.css'>
    <link rel='stylesheet prefetch' href='https://cdn.jsdelivr.net/npm/izitoast@1.3.0/dist/css/iziToast.min.css'>

    <style>
        /* Uses bootstrap-material-design - https://fezvrasta.github.io/bootstrap-material-design */

        .panel {
            max-width: 600px;
            margin: 2em auto;
        }

        .panel-body {
            margin-left: 15px;
            margin-right: 15px;
        }

        .panel-primary > .panel-heading {
            background-color: #DC682D;
        }

        .btn-info:hover:not(.btn-link):not(.btn-flat) {
            background-color: #e64a19;
        }

        .btn-info:not(.btn-link):not(.btn-flat) {
            background-color: #DC672D;
        }

        body {
            font-size: 15px;
        }

        label {
            font-weight: 400;
        }

        .helper-text {
            color: #E91E63;
            font-size: 12px;
            margin-top: 5px;
            height: 12px;
            display: block;
        }


        /* Hosted Payment Fields styles*/
        .hosted-field-focus {
            outline: none;
            background-image: linear-gradient(#009688, #009688), linear-gradient(#d2d2d2, #d2d2d2);
            animation: input-highlight 0.5s forwards;
            box-shadow: none;
            background-size: 0 2px, 100% 1px;
        }

        .form-group .form-control:focus, .form-group-default .form-control:focus {
            background-image: linear-gradient(#009688, #009688), linear-gradient(#d2d2d2, #d2d2d2);
        }

    </style>


</head>

<body translate="no" >

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Credit Card Payment</h3>
    </div>
    <form class="panel-body" id="checkout-form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
snap/payments/">
        <div class="row">

            <div class="col-md-12">

                <h4>Invoice- <?php echo $_smarty_tpl->tpl_vars['d']->value['invoicenum'];
if ($_smarty_tpl->tpl_vars['d']->value['cn'] != '') {?> <?php echo $_smarty_tpl->tpl_vars['d']->value['cn'];?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
 <?php }?></h4>

                <address style="margin-top: 10px;">
                    <?php if ($_smarty_tpl->tpl_vars['a']->value['company'] != '') {?>
                        <?php echo $_smarty_tpl->tpl_vars['a']->value['company'];?>


                        <br>

                        <?php if ($_smarty_tpl->tpl_vars['company']->value && $_smarty_tpl->tpl_vars['config']->value['show_business_number'] == '1') {?>

                            <?php if ($_smarty_tpl->tpl_vars['company']->value->business_number != '') {?>
                                <?php echo $_smarty_tpl->tpl_vars['config']->value['label_business_number'];?>
: <?php echo $_smarty_tpl->tpl_vars['company']->value->business_number;?>

                                <br>
                            <?php }?>
                        <?php }?>

                        <?php echo $_smarty_tpl->tpl_vars['_L']->value['ATTN'];?>
: <?php echo $_smarty_tpl->tpl_vars['d']->value['account'];?>

                        <br>
                    <?php } else { ?>
                        <?php echo $_smarty_tpl->tpl_vars['d']->value['account'];?>

                        <br>
                    <?php }?>
                    <?php echo $_smarty_tpl->tpl_vars['a']->value['address'];?>
 <br>
                    <?php echo $_smarty_tpl->tpl_vars['a']->value['city'];?>
 <br>
                    <?php echo $_smarty_tpl->tpl_vars['a']->value['state'];?>
 - <?php echo $_smarty_tpl->tpl_vars['a']->value['zip'];?>
 <br>
                    <?php echo $_smarty_tpl->tpl_vars['a']->value['country'];?>

                    <br>
                    <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Phone'];?>
:</strong> <?php echo $_smarty_tpl->tpl_vars['a']->value['phone'];?>


                    <?php if ($_smarty_tpl->tpl_vars['config']->value['fax_field'] != '0' && $_smarty_tpl->tpl_vars['a']->value['fax'] != '') {?>
                        <br>
                        <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Fax'];?>
:</strong> <?php echo $_smarty_tpl->tpl_vars['a']->value['fax'];?>

                    <?php }?>

                    <br>
                    <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email'];?>
:</strong> <?php echo $_smarty_tpl->tpl_vars['a']->value['email'];?>


                </address>

                <h4>You are paying- <?php echo ib_money_format($_smarty_tpl->tpl_vars['amount']->value,$_smarty_tpl->tpl_vars['config']->value,$_smarty_tpl->tpl_vars['d']->value['currency_symbol']);?>
</h4>
                <hr>
            </div>

            <div class="col-md-12">
                <div id="resultDiv" class="text-left">

                </div>
            </div>

            <div class="form-group col-md-12">
                <label for="cardholder-name">Cardholder Name</label>
                <input type="text" class="form-control" name="name" id="cardholder-name" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['account'];?>
">
                <span class="helper-text"></span>
            </div>
            <!--Hosted Payment Field for CC number-->
            <div class="form-group col-xs-9">
                <label for="card-number">Card Number</label>
                <div class="input-group">
                    <input class="form-control" name="creditCard" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Card number'" type="text" id="card-number" required="" data-bluesnap="encryptedCreditCard">
                    <div id="card-logo" class="input-group-addon"><img src="https://files.readme.io/d1a25b4-generic-card.png" height="20px"></div>
                </div>
                <span class="helper-text" id="ccn-help"></span>
            </div>
            <!--Hosted Payment Field for CC CVV-->
            <div class="form-group col-xs-3">
                <label for="cvv">CVV</label>
                <input class="form-control" type="text" name="cvv" id="cvv"  data-bluesnap="encryptedCvv">
                <span class="helper-text" id="cvv-help"></span>
            </div>

            <!--Hosted Payment Field for CC EXP-->
            <div class="form-group col-xs-6">
                <label for="exp">Exp. (MM/YY)</label>
                <input type="text" class="form-control" name="exp" id="exp" onfocus="this.placeholder = ''" onblur="this.placeholder = 'MM/YY'">
                <span class="helper-text" id="exp-help"></span>
            </div>

        </div>

        <button class="btn btn-raised btn-info btn-lg col-md-4" type="submit" id="btnSubmit">Pay Now</button>

    </form>

</div>

<?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/js/material.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/js/ripples.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src='https://cdn.jsdelivr.net/npm/axios@0.18.0/dist/axios.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src='https://cdn.jsdelivr.net/npm/izitoast@1.3.0/dist/js/iziToast.min.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src='https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js'><?php echo '</script'; ?>
>



<?php echo '<script'; ?>
>

    var bluesnap = new BlueSnap
    ("<?php echo $_smarty_tpl->tpl_vars['g']->value->c2;?>
");

    $(function () {
        var $btnSubmit = $('#submit-button');
        $("#checkout-form").on("submit", function(event){
            event.preventDefault();
            bluesnap.encrypt("checkout-form");
            $btnSubmit.attr('disabled',true);
            $btnSubmit.html('Please wait...');

            $.post( window.location, $("#checkout-form").serialize())
                .done(function( data ) {
                    console.log(data);
                    if(data.success)
                    {
                        // $('#resultDiv').html('<div class="alert alert-danger" role="alert">\n' +
                        //     data.message +
                        //     '</div>');

                        window.location = "<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/ipay_success/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
/token_<?php echo $_smarty_tpl->tpl_vars['d']->value['ptoken'];?>
";

                       // $("#checkout-form").hide();
                    }
                    else{
                        $('#resultDiv').html('<div class="alert alert-success" role="alert">\n' +
                            data.message +
                            '</div>');
                        $btnSubmit.attr('disabled',false);
                        $btnSubmit.html('Make Payment');
                    }
                }).fail(function(response) {
                console.log(response);
            });

        })
    });
<?php echo '</script'; ?>
>

</body>

</html>
<?php }
}
