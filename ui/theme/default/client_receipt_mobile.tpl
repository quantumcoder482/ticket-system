<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<style>
    body {
        font-family: 'Helvetica Neue', Helvetica, "Segoe UI", Arial, sans-serif;
        font-size: 13px;
    }
</style>

<div class="container" style="margin-top: 40px;">
    <div class="row">
        <div class="col-md-6 col-xs-6">&nbsp;</div>
        <div class="col-md-6 col-xs-6" style="text-align: right;">Date : {date( $config['df'])}</div>
    </div>
</div>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-7 col-xs-7" style="text-align: right;">
            <img src="{$app_url}storage/system/{$config['logo_default']}" alt="Logo">
        </div>
        <div class="col-md-5 col-xs-5" style="text-align: right; padding-top: 20px;">
            <div style="font-size: 18px; font-weight: bold; padding-bottom: 6px;"> {$config['CompanyName']} </div>
            <div style="padding-bottom: 6px;"> {$config['caddress']}</div>
            {*<div> Post code : N4 1HU </div>*}
        </div>
    </div>
</div>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div style="text-align: center; font-size: 30px; font-weight: 300; letter-spacing: 3;"> TRANSACTION RECEIPT </div>
        <div style="text-align: center; font-size: 16px; font-weight: 500; letter-spacing: 1;"><b>{if ($transaction->type) eq 'Expense'}Expense Voucher {else}Deposit Voucher{/if} </b> </div>
    </div>
</div>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="title-section" style="font-size: 16px; letter-spacing: 1; border-bottom: 2px #666666 solid; padding-bottom: 10px;">{if ($transaction->type) eq 'Expense'}Spent TO {else}Recieved From{/if} </div>
        <table style="width: 100%; margin-top: 20px;">
            <thead style="letter-spacing: 1; font-weight: 300;">
            <tr>
                <td style="padding: 10px 0;"> NAME </td>
                {*<td style="text-align: center;"> SORT CODE </td>*}
                <td style="text-align: right;"> Transaction ID: # {$transaction->id}</td>
            </tr>
            </thead>
            <tbody style="font-size: 22px;">
            <tr>
                <td> {if $transaction->payer eq ''} n/a {else} {$transaction->payer} {/if} </td>
                {*<td style="text-align: center;"> 14-24-52 </td>*}
                <td style="text-align: right;"> &nbsp; </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <h4>For: {$transaction->description}</h4>
        <hr>
        <div class="title-section" style="font-size: 16px; letter-spacing: 1; border-bottom: 2px #666666 solid; padding-bottom: 10px;"> {$_L['Transaction Details']}  </div>
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-6 col-xs-6">
                <div style="letter-spacing: 1; font-weight: 300; padding: 10px 0;"> {$_L['Date']} </div>
                <div style="font-size: 22px; "> {date( $config['df'], strtotime($transaction->date))} </div>
            </div>
            <div class="col-md-6 col-xs-6" style="text-align: right;">
                <div style="letter-spacing: 1; font-weight: 300; padding: 10px 0;"> REFERENCE </div>
                <div style="font-size: 22px;"> {$_L['Method']}: {$transaction->method} <br>
                    {{$_L['Ref']}}: {if $transaction->ref eq ''}n/a{else}{$transaction->ref}{/if} </div>
            </div>
            <hr>
        </div>
        <hr style="border-top: 1px solid #666666;">
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-6 col-xs-6">
                <div style="letter-spacing: 1; font-weight: 300; padding: 10px 0;"> TRANSACTION AMOUNT </div>
                <div style="font-size: 22px;"> {ib_money_format($transaction->amount,$config,$currency_symbol)} </div>
            </div>
            {*<div class="col-md-6 col-xs-6" style="text-align: right;">*}
            {*<div style="letter-spacing: 1; font-weight: 300; padding: 10px 0;"> FEES </div>*}
            {*<div style="font-size: 22px;"> &#163;0.00 </div>*}
            {*</div>*}
            <hr>
        </div>
        <hr style="border-top: 1px solid #666666;">
    </div>
</div>

<div class="container" style="margin-top: 50px; font-weight: 300;">
    <div class="col-md-12" style="text-align: center;">
        <div> Electronic Receipt. Generated On: {date( $time_format, time())}. </div>
        <div> If you think something is incorrect, please contact us - <a href="mailto:{$config['sysEmail']}">{$config['sysEmail']}</a> </div>
    </div>
</div>