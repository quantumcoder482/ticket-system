<?php

/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

_auth();
$ui->assign('_title', $_L['Reports'].'- '. $config['CompanyName']);
$ui->assign('_pagehead', '<i class="fa fa-bar-chart-o lblue"></i> Reports');

$ui->assign('_application_menu', 'reports');
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);
$mdate = date('Y-m-d');
$tdate = date('Y-m-d', strtotime('today - 30 days'));

//first day of month
$first_day_month = date('Y-m-01');
//
$this_week_start = date('Y-m-d',strtotime( 'previous sunday'));
// 30 days before
$before_30_days = date('Y-m-d', strtotime('today - 30 days'));
//this month
$month_n = date('n');

switch ($action) {


    case 'printable':

        $fdate = _post('fdate');
        $tdate = _post('tdate');
        $account = _post('account');
        $stype = _post('stype');
        $d = ORM::for_table('sys_transactions');
        $d->where('account', $account);
        if($stype == 'credit'){
            $d->where('dr', '0.00');
        }
        elseif($stype == 'debit'){
            $d->where('cr', '0.00');
        }
        else{

        }
        $d->where_gte('date', $fdate);
        $d->where_lte('date', $tdate);
        $d->order_by_desc('id');
        $x =  $d->find_many();

        $ui->assign('d',$x);
        $ui->assign('fdate',$fdate);
        $ui->assign('tdate',$tdate);
        $ui->assign('account',$account);

        view('printable');
        break;

    case 'pdf':

        $fdate = _post('fdate');
        $tdate = _post('tdate');
        $account = _post('account');
        $stype = _post('stype');
        $d = ORM::for_table('sys_transactions');
        $d->where('account', $account);
        if($stype == 'credit'){
            $d->where('dr', '0.00');
        }
        elseif($stype == 'debit'){
            $d->where('cr', '0.00');
        }
        else{

        }
        $d->where_gte('date', $fdate);
        $d->where_lte('date', $tdate);
        $d->order_by_desc('id');
        $x =  $d->find_many();




        $aadmin= $user['fullname'];
        // $filename= date('Y-m-d')._raid(4).'.pdf';
        $title = $account. ' Statement ['.$fdate.' - '.$tdate.']';
        $title = str_replace('-',' ',$title);



        if ($x) {
            $html = '
<h4 id="heading">'.$account.' Statement ['.date( $config['df'], strtotime($fdate)).' - '.date( $config['df'], strtotime($tdate)).']</h4>
<table id="customers">
<tr>
<th>'.$_L['Date'].'</th>
<th>'.$_L['Description'].'</th>
<th>'.$_L['Dr'].'</th>
<th>'.$_L['Cr'].'</th>
<th>'.$_L['Balance'].'</th>
</tr>';
            $c = true;
            foreach ($x as $value) {


             //   $date = $value['date'];
                $date = date( $config['df'], strtotime($value['date']));

                $description = $value['description'];

                $dr = $value['dr'];
                $cr = $value['cr'];
                $bal = $value['bal'];



                $html .= "<tr".(($c = !$c)?' class="alt"':' class=""').">"."
<td>$date</td>
<td>$description</td>
<td>$dr</td>
<td>$cr</td>
<td>$bal</td>
</tr>";
            }
            $html .= '</table>';


            $mpdf = new \Mpdf\Mpdf();

            $ib_w_font = 'dejavusanscondensed';
            if($config['pdf_font'] == 'default'){
                $ib_w_font = 'Helvetica';
            }

            $mpdf->SetTitle($config['CompanyName'].' Statement');
            $mpdf->SetAuthor($config['CompanyName']);
            $mpdf->SetWatermarkText($d['status']);
            $mpdf->showWatermarkText = true;
            $mpdf->watermark_font = 'Helvetica';
            $mpdf->watermarkTextAlpha = 0.1;
            $mpdf->SetDisplayMode('fullpage');

            if($config['pdf_font'] == 'AdobeCJK'){
                $mpdf->useAdobeCJK = true;
                $mpdf->autoScriptToLang = true;
                $mpdf->autoLangToFont = true;
            }

            $style = '<style>
#heading
{
font-family: Helvetica, sans-serif;
width:100%;
border-collapse:collapse;
}
#customers
{
font-family: Helvetica, sans-serif;
width:100%;
border-collapse:collapse;
}
#customers td, #customers th
{
font-size:1.2em;
border:1px solid #98bf21;
padding:3px 7px 2px 7px;
}
#customers th
{
font-size:1.4em;
text-align:left;
padding-top:5px;
padding-bottom:4px;
background-color:#A7C942;
color:#fff;
}
#customers tr.alt td
{
color:#000;
background-color:#EAF2D3;
}
</style>
';

///////////////////////////////////////////////////html

            $nhtml = <<<EOF
$style
$html
EOF;
            //  exit ("$nhtml");

            $mpdf->WriteHTML($nhtml);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// reset pointer to the last page


// ---------------------------------------------------------

//Close and output PDF document
            $mpdf->Output(date('Y-m-d')._raid(4).'.pdf', 'D');

        }
        else{
            echo 'No Data';
        }

        break;


    default:
        echo 'action not defined';
}