<?php

/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

_auth();
$fdate = _get('from');
$fdate = $fdate/1000;
$fdate = date('Y-m-d',$fdate);
$tdate = _get('to');
$tdate = $tdate/1000;
$tdate = date('Y-m-d',$tdate);
$out = array();
//find current month
$d = ORM::for_table('sys_repeating');
$d->where_gte('date', $fdate);
$d->where_lte('date', $tdate);
$d->where('type','Expense');
$d->where('status','Uncleared');
$x =  $d->find_array();
foreach($x as $xs){
    $date = $xs['date'];
$id = $xs['id'];
    $description = $xs['description'].' [Amount: '.$config['currency_code'].' '.number_format($xs['amount'],2,$config['dec_point'],$config['thousands_sep']).']';
    $url = U.'repeating/view/'.$xs['id'];
    $out[] = array(
        'id' => $id,
        'title' => $description,
        'url' => $url,
        'class' => 'event-important',
        'start' => strtotime($date).'000'
    );
}

echo json_encode(array('success' => 1, 'result' => $out));
exit;