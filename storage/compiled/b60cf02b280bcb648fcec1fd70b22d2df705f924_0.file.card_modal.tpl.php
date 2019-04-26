<?php
/* Smarty version 3.1.33, created on 2018-11-12 13:34:28
  from '/Users/razib/Documents/valet/suite/apps/snap/views/card_modal.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5be9c7b4dad0d3_65159533',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b60cf02b280bcb648fcec1fd70b22d2df705f924' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/apps/snap/views/card_modal.tpl',
      1 => 1542047659,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be9c7b4dad0d3_65159533 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!DOCTYPE html>
<html lang="en" >

<head>

    <meta charset="UTF-8">


    <title>Payment</title>
    <!-- Material Design fonts -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Bootstrap Material Design -->
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrap-material-design.css">
    <link rel="stylesheet" type="text/css" href="dist/css/ripples.min.css">


    <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/material-fullpalette.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/material.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/ripples.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/roboto.css'>

    <style>
        /* Uses bootstrap-material-design - https://fezvrasta.github.io/bootstrap-material-design */

        .panel {
           margin: 0;
        }

        .panel-body {
            margin: 0;
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
            background-image: linear-gradient(#2196f3, #2196f3), linear-gradient(#d2d2d2, #d2d2d2);
            animation: input-highlight 0.5s forwards;
            box-shadow: none;
            background-size: 0 2px, 100% 1px;
        }

        .panel{
            border-radius: 0;
        }

        .panel-heading{
            border-radius: 0;
        }
        .panel-primary > .panel-heading {
            background-color: #2196f3;
        }

        .form-group .form-control:focus, .form-group-default .form-control:focus {
            background-image: linear-gradient(#2196f3, #2196f3), linear-gradient(#d2d2d2, #d2d2d2);
        }

    </style>

    <?php echo '<script'; ?>
>
        window.console = window.console || function(t) {};
    <?php echo '</script'; ?>
>



    <?php echo '<script'; ?>
>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage("resize", "*");
        }
    <?php echo '</script'; ?>
>


</head>

<body translate="no" >

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Credit Card Payment</h3>
    </div>
    <form class="panel-body" id="checkout-form" onsubmit="do_when_clicking_submit_button()" action="#">
        <div class="row">
            <div class="form-group col-md-12">
                <label for="cardholder-name">Cardholder Name</label>
                <input type="text" class="form-control" id="cardholder-name" autofocus>
                <span class="helper-text"></span>
            </div>
            <!--Hosted Payment Field for CC number-->
            <div class="form-group col-xs-9">
                <label for="card-number">Card Number</label>
                <div class="input-group">
                    <div class="form-control" id="card-number" data-bluesnap="ccn"></div>
                    <div id="card-logo" class="input-group-addon"><img src="https://files.readme.io/d1a25b4-generic-card.png" height="20px"></div>
                </div>
                <span class="helper-text" id="ccn-help"></span>
            </div>
            <!--Hosted Payment Field for CC CVV-->
            <div class="form-group col-xs-3">
                <label for="cvv">CVV</label>
                <div class="form-control" id="cvv" data-bluesnap="cvv"></div>
                <span class="helper-text" id="cvv-help"></span>
            </div>

            <!--Hosted Payment Field for CC EXP-->
            <div class="form-group col-xs-6">
                <label for="exp-date">Exp. (MM/YY)</label>
                <div class="form-control" id="exp-date" data-bluesnap="exp"></div>
                <span class="helper-text" id="exp-help"></span>
            </div>
            <div class="form-group col-xs-6">
                <label for="cardholder-name">Postal Code</label>
                <input type="text" class="form-control" id="cardholder-name">
                <span class="helper-text"></span>
            </div>
        </div>

        <button class="btn btn-raised btn-info btn-lg col-md-4" type="submit" id="submit-button">Pay</button>

    </form>

</div>

<!--BlueSnap Hosted Payment Fields JavaScript file-->
<?php echo '<script'; ?>
 type="text/javascript" src="https://sandbox.bluesnap.com/source/web-sdk/bluesnap.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="//static.codepen.io/assets/common/stopExecutionOnTimeout-41c52890748cd7143004e05d3c5f786c66b19939c4500ce446314d1748483e13.js"><?php echo '</script'; ?>
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
 src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'><?php echo '</script'; ?>
>



<?php echo '<script'; ?>
 >
    /* Defining helper functions/objects */
    // changeImpactedElement: function that removes the provided class(es) and adds the provided class(es) to Hosted Payment Fields element
    function changeImpactedElement(tagId, removeClass, addClass) {
        removeClass = removeClass || "";
        addClass = addClass || "";
        $("[data-bluesnap=" + tagId + "]")
            .removeClass(removeClass)
            .addClass(addClass);
    }
    // getErrorText: function that takes error code (received from BlueSnap) and gets associated help text
    function getErrorText(errorCode) {
        switch (errorCode) {
            case "001":
                return "Please enter a valid card number";
            case "002":
                return "Please enter the CVV/CVC of your card";
            case "003":
                return "Please enter your card's expiration date";
            case "22013":
                return "Card type is not supported by merchant";
            case "400":
                return "Session expired please refresh page to continue";
            case "403":
            case "404":
            case "500":
                return "Internal server error please try again later";
            default:
                break;
        }
    }
    // cardUrl: object that stores card type code (received from BlueSnap) and associated card image URL
    var cardUrl = {
        "AmericanExpress": "https://files.readme.io/97e7acc-Amex.png",
        "CarteBleau": "https://files.readme.io/5da1081-cb.png",
        "DinersClub": "https://files.readme.io/8c73810-Diners_Club.png",
        "Discover": "https://files.readme.io/caea86d-Discover.png",
        "JCB": "https://files.readme.io/e076aed-JCB.png",
        "MaestroUK": "https://files.readme.io/daeabbd-Maestro.png",
        "MasterCard": "https://files.readme.io/5b7b3de-Mastercard.png",
        "Solo": "https://sandbox.bluesnap.com/services/hosted-payment-fields/cc-types/solo.png",
        "Visa": "https://files.readme.io/9018c4f-Visa.png"
    };

    /* Defining bsObj: object that stores Hosted Payment Fields
    event handlers, styling, placeholder text, etc. */
    var bsObj = {
        onFieldEventHandler: {
            onFocus: function(tagId) {
                // Handle focus
                changeImpactedElement(tagId, "", "hosted-field-focus");
            },
            onBlur: function(tagId) {
                // Handle blur
                changeImpactedElement(tagId, "hosted-field-focus");
            },
            onError: function(tagId, errorCode, errorDescription) {
                // Handle a change in validation by displaying help text
                $("#" + tagId + "-help").text(errorCode + " - " + errorDescription);
            },
            onType: function(tagId, cardType) {
                // get card type from cardType and display card image
                $("#card-logo > img").attr("src", cardUrl[cardType]);
            },
            onValid: function(tagId) {
                // Handle a change in validation by removing any help text
                $("#" + tagId + "-help").text("");
            }
        },
        style: {
            // Styling all inputs
            "input": {
                "font-size": "14px",
                "font-family":
                    "RobotoDraft,Roboto,Helvetica Neue,Helvetica,Arial,sans-serif",
                "line-height": "1.42857143",
                "color": "#555"
            },
            // Styling input state
            ":focus": {
                "color": "#555"
            }
        },
        ccnPlaceHolder: "1234 5678 9012 3456",
        cvvPlaceHolder: "123",
        expPlaceHolder: "MM / YY",
        expDropDownSelector: false //set to true for exp date dropdown
    }

    /* After DOM is loaded, calling bluesnap.hostedPaymentFieldsCreation: function that takes token and bsObj as inputs and initiates Hosted Payment Fields */
    $(document).ready(function() {
        bluesnap.hostedPaymentFieldsCreation(
            "229a3dc5e508d8a247dc2834e09dc71b423d88136a97f4b66d03b5e7eed881f6_",
            bsObj
        ); //insert your Hosted Payment Fields token
    });

    /* Calling bluesnap.submitCredentials: function that submits card data to
    BlueSnap and calls input function with card data object if submission was successful */
    function do_when_clicking_submit_button() {
        bluesnap.submitCredentials(
            function(callback) {
                if (null !== callback.error) {
                    var errorArray = callback.error;
                    for (i in errorArray) {
                        $("#" + errorArray[i].tagId + "-help").text(errorArray[i].errorCode + " - " + errorArray[i].errorDescription);
                    }
                } else {
                    var cardData = callback.cardData;
                    alert(
                        "the card type is " +
                        cardData.ccType +
                        " and last 4 digits are " +
                        cardData.last4Digits +
                        " and exp is " +
                        cardData.exp +
                        " after that I can call final submit"
                    );
                    // This is where you would perform final submission to your server
                }
            }
        );
    }
    //# sourceURL=pen.js
<?php echo '</script'; ?>
>


</body>

</html>

<?php }
}
