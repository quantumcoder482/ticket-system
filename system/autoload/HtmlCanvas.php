<?php

Class HtmlCanvas {


    public static function createCanvas($text){

        echo '';

    }


    public static function createTerminal($text,$script=''){

        echo '<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Update</title>
    <link href="'.APP_URL.'/ui/theme/default/css/bootstrap.min.css" rel="stylesheet">
    <link href="'.APP_URL.'/ui/theme/default/css/style.css?ver=2.0.1" rel="stylesheet">
    <link href="'.APP_URL.'/ui/theme/default/css/component.css?ver=2.0.1" rel="stylesheet">
    <link href="'.APP_URL.'/ui/theme/default/css/custom.css" rel="stylesheet">
    <style>
        body {background:#ffffff}


        .main-box {
            width:700px;

            border-radius: 6px;
            margin:40px auto;
        }

        .response-box{
            border: none;
            -webkit-box-shadow: none;
            box-shadow: none;
            background: #323232;
            color: #ffffff;
            font-size: 11px;
            font-weight: normal;
            border-radius: 0;


        }

        .response-box:focus {
             border-color: #ffffff;
             -webkit-box-shadow: none;
             box-shadow: none;
        }

        .toolbar {
            min-height: 22px;
            box-shadow: inset 0 1px 0 #f5f4f5;
            background-color: #e8e6e8;
            background-image: -webkit-gradient(linear,left top,left bottom,color-stop(0,#e8e6e8),color-stop(100%,#d1cfd1));
            background-image: -webkit-linear-gradient(top,#e8e6e8 0,#d1cfd1 100%);
            background-image: linear-gradient(to bottom,#e8e6e8 0,#d1cfd1 100%);
        }

        .toolbar-header {
            border-bottom: 1px solid #c2c0c2;
        }
        .toolbar-actions:after, .toolbar-actions:before, .toolbar:after, .toolbar:before {
            display: table;
            content: " ";
        }

        .title {
            margin: 0;
            padding: 5px;
            font-size: 12px;
            font-weight: 400;
            color: #555;

            text-align: center;
            cursor: default;
        }



    </style>
</head>
<body>
<div class="main-box">
    <header class="toolbar toolbar-header">
        <h1 class="title">Terminal - Update</h1>


    </header>
    <div class="row">
        <div class="col-md-12">


            <textarea class="form-control response-box" id="serverResponse" rows="15">'.$text.'</textarea>


        </div>
    </div>

    <footer class="toolbar toolbar-footer">

    </footer>

</div>
<script src="'.APP_URL.'/ui/lib/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="'.APP_URL.'/ui/lib/bootstrap.min.js" type="text/javascript"></script>
<script src="'.APP_URL.'/ui/lib/bootbox.min.js" type="text/javascript"></script>
'.$script.'
</body>
</html>';

    }

}