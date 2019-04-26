<?php

/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

_auth();
$ui->assign('_application_menu', 'ps');


$ui->assign('_st', $_L['Inventory']);
$ui->assign('_title', $_L['Sales'].'- ' . $config['CompanyName']);
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);


switch ($action) {



    case 'dashboard':


        $last_12_months = lastTwelveMonths();

        $m = array();

        foreach ($last_12_months as $month){
          //  echo date('Y-m-d', strtotime($month)).' ';

            $first_day = date('Y-m-d', strtotime($month));
            $last_day = date('Y-m-t', strtotime($month));

            $m['display'][] = $month;
            $m['data'][] = Invoice::where('status','Paid')->whereBetween('datepaid',array($first_day,$last_day))->sum('total');

        }



        $total_items = Item::count();
        $total_invoice = Invoice::count();

        $total_invoice_items = InvoiceItem::sum('qty');
        $total_invoice_amount = ib_money_format(Invoice::sum('total'),$config);


        view('inventory_dashboard',[
            'total_items' => $total_items,
            'total_invoice' => $total_invoice,
            'total_invoice_items' => $total_invoice_items,
            'total_invoice_amount' => $total_invoice_amount,
            'm' => $m
        ]);


        break;



    case 'items':


        $items = Item::all();

        view('inventory_items', [
            'items' => $items
        ]);


        break;


    case 'barcode':




        $item_id = route(2);

        $item = Item::find($item_id);

        if($item){

            $name = substr($item->name, 0, 10);
            $sales_price = ib_money_format($item->sales_price,$config);
            $item_number = $item->item_number;

            $html = '
<table style="width:100%">
  <tr>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
  </tr>
    <tr>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
  </tr>
    <tr>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
  </tr>
    <tr>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
  </tr>
    <tr>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
  </tr>
    <tr>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
  </tr>
    <tr>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
  </tr>
    <tr>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
    <td align="center"><div style="text-align: center; font-family: ocrb;">'.$name.'<br>'.$sales_price.'<br><barcode code="'.$item_number.'" type="UPCA" height="0.5" seize="0.8" /><br> &nbsp;</div></td>
  </tr>
  
</table>
';

//            $mpdf=new mPDF('','A4','','',20,15,25,25,10,10);

            $mpdf = new \Mpdf\Mpdf();

            $mpdf->WriteHTML($html);

            $mpdf->Output();

        }







        break;





    default:
        echo 'action not defined';
}