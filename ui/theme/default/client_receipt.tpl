<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Receipt</title>

    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.css">

    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.2.3/paper.css">

    <link rel="apple-touch-icon" sizes="180x180" href="{$app_url}apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{$app_url}favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{$app_url}favicon-16x16.png">

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>@page { size: A5 landscape }</style>

    <link href="https://fonts.googleapis.com/css?family=Asap+Condensed" rel="stylesheet">

    <!-- Custom styles for this document -->
    <link href='https://fonts.googleapis.com/css?family=Tangerine:700' rel='stylesheet' type='text/css'>
    <style>
        body   { font-family: 'Asap Condensed', sans-serif; }
        h1     { font-family: 'Tangerine', cursive; font-size: 40pt; line-height: 18mm}
        h2, h3 { font-family: 'Tangerine', cursive; font-size: 24pt; line-height: 7mm }
        h4     { font-size: 32pt; line-height: 14mm }
        h2 + p { font-size: 18pt; line-height: 7mm }
        h3 + p { font-size: 14pt; line-height: 7mm }
        li     { font-size: 11pt; line-height: 5mm }
        h1      { margin: 0 }
        h1 + ul { margin: 2mm 0 5mm }
        h2, h3  { margin: 0 3mm 3mm 0; float: left }
        h2 + p,
        h3 + p  { margin: 0 0 3mm 50mm }
        h4      { margin: 2mm 0 0 50mm; border-bottom: 2px solid black }
        h4 + ul { margin: 5mm 0 0 50mm }
        article { border: 2px dotted black; padding: 5mm 10mm;  }
    </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A5 landscape">

<!-- Each sheet element should have the class "sheet" -->
<!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
<section class="sheet padding-20mm">


    <article>

        <table style="width:100%">

            <tr>
                <td align="left">{$_L['Receipt']} # {$transaction->id}</td>
                <td align="right">{$config['CompanyName']} <br> {$_L['Date']}: {date( $config['df'], strtotime($transaction->date))}</td>

            </tr>

        </table>

        <hr>


        <h3>For:</h3>
        <p>{$transaction->description}</p>

        <h2>{if ($transaction->type) eq 'Expense'}Spent To: {else}Received from:{/if}</h2>
        <p>
            {if $contact} {$contact->account} {else} {$_L['n_a']} {/if}
        </p>



        <h4>{ib_money_format($transaction->amount,$config,$currency_symbol)}</h4>

        <table style="width:100%">

            <tr>
                <td align="left">
                    {$_L['Method']}: {$transaction->method} <br>
                    {{$_L['Ref']}}: {if $transaction->ref eq ''}n/a{else}{$transaction->ref}{/if}
                </td>
                <td align="right">
                    <img src="{$qr_url}">
                </td>

            </tr>

        </table>


        <hr>
        <p align="center" style="font-size: 14px;">Electronic Receipt. Generated On: {date( $time_format, time())}</p>
    </article>

</section>

</body>

</html>