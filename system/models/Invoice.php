<?php

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    protected $table = 'sys_invoices';


    public static function createInvoice($data)
    {
        global $config;

        // require contact_id
        // optional ticket_id items
        // items = name qty price

        $datetime = date("Y-m-d H:i:s");

        $today = date('Y-m-d');


        $discount_type = 'f';
        $discount_value = '0.00';

        $actual_discount = '0.00';



        $taxval = '0.00';

        $taxname = '';

        $taxrate = '0.00';

        $notes = '';

        $invoicenum = '';

        $r = '0';
        $nd = $today;

        $currency = 0;
        $currency_symbol = $config['currency_code'];
        $currency_rate = 1.0000;

        $u = ORM::for_table('crm_accounts')->find_one($data['contact_id']);

        $cid = $data['contact_id'];

        if(!$u){
            return false;
        }

        $ticket_id = 0;

        if(isset($data['ticket_id']))
        {
            $ticket_id = $data['ticket_id'];
        }

        $title = '';

        if(isset($data['title']))
        {
            $title = $data['title'];
        }

        $cn = '';

        if(isset($data['cn']))
        {
            $cn = $data['cn'];
        }

        $fTotal = 0.00;

        $vtoken = _raid(10);
        $ptoken = _raid(10);
        $d = ORM::for_table('sys_invoices')->create();
        $d->userid = $cid;
        $d->account = $u->account;
        $d->date = $today;
        $d->duedate = $today;
        $d->datepaid = $datetime;
        $d->subtotal = $fTotal;
        $d->discount_type = $discount_type;
        $d->discount_value = $discount_value;
        $d->discount = $actual_discount;
        $d->total = $fTotal;
        $d->tax = $taxval;
        $d->taxname = $taxname;
        $d->taxrate = $taxrate;
        $d->vtoken = $vtoken;
        $d->ptoken = $ptoken;
        $d->status = 'Unpaid';
        $d->notes = $notes;
        $d->r = $r;
        $d->nd = $nd;
        //others
        $d->invoicenum = $invoicenum;
        $d->cn = $cn;
        $d->tax2 = '0.00';
        $d->taxrate2 = '0.00';
        $d->paymentmethod = '';

        // Build 4550

        $d->currency = $currency;
        $d->currency_symbol = $currency_symbol;
        $d->currency_rate = $currency_rate;


        $d->ticket_id = $ticket_id;

        $d->title = $title;

        //
        $d->save();
        $invoiceid = $d->id();




        $current_items = $data['items'];


        foreach ($current_items as $e_i){

            $d = ORM::for_table('sys_invoiceitems')->create();
            $d->invoiceid = $invoiceid;
            $d->userid = $cid;
            $d->description = $e_i['name'];
            $d->qty = $e_i['qty'];
            $d->amount = $e_i['price'];
            $d->total = $e_i['price']*$e_i['qty'];



            $d->taxed = '0';


            //others
            $d->type = '';
            $d->relid = '0';
            $d->itemcode = '';
            $d->taxamount = '0.00';
            $d->duedate = date('Y-m-d');
            $d->paymentmethod = '';
            $d->notes = '';

            $d->save();
        }


        return $invoiceid;

    }

    public function scopePaid($query)
    {
        return $query->where('status', '=', 'Paid');
    }

    public function scopeUnpaid($query){
        return $query->where('status', '=', 'Unpaid');
    }




    public static function gen_email($iid, $etpl)
    {

        global $config;

        $d = ORM::for_table('sys_invoices')->find_one($iid);

        if ($etpl == 'created') {
            $e = ORM::for_table('sys_email_templates')->where('tplname', 'Invoice:Invoice Created')->find_one();
        } elseif ($etpl == 'reminder') {
            $e = ORM::for_table('sys_email_templates')->where('tplname', 'Invoice:Invoice Payment Reminder')->find_one();
        } elseif ($etpl == 'overdue') {
            $e = ORM::for_table('sys_email_templates')->where('tplname', 'Invoice:Invoice Overdue Notice')->find_one();
        } elseif ($etpl == 'confirm') {
            $e = ORM::for_table('sys_email_templates')->where('tplname', 'Invoice:Invoice Payment Confirmation')->find_one();
        } elseif ($etpl == 'refund') {
            $e = ORM::for_table('sys_email_templates')->where('tplname', 'Invoice:Invoice Refund Confirmation')->find_one();
        } else {
            $d = false;
            $e = false;
        }

        if ($d) {

            $a = ORM::for_table('crm_accounts')->find_one($d['userid']);
            if ($d['cn'] != '') {
                $dispid = $d['cn'];
            } else {
                $dispid = $d['id'];
            }
            $invoice_num = $d['invoicenum'] . $dispid;
            //parse template
            $total = $d['total'];
            $credit = $d['credit'];
            $due_amount = $total - $credit;
            $tax = $d['tax'];
            $taxrate = $d['taxrate'];
            $subtotal = $d['subtotal'];
            $subject = new Template($e['subject']);
            $subject->set('business_name', $config['CompanyName']);
            $subject->set('invoice_id', $invoice_num);
            $subj = $subject->output();
            $message = new Template($e['message']);
            $message->set('name', $a['account']);
            $message->set('customer_name', $a['account']);
            $message->set('client_name', $a['account']);
            $message->set('company', $a['company']);
            $message->set('business_name', $config['CompanyName']);
            $message->set('invoice_url', U . 'client/iview/' . $d['id'] . '/token_' . $d['vtoken']);
            $message->set('invoice_id', $invoice_num);
            $message->set('invoice_status', $d['status']);
            $message->set('invoice_amount_paid', number_format($credit, 2, $config['dec_point'], $config['thousands_sep']));
            $message->set('invoice_due_amount', number_format($due_amount, 2, $config['dec_point'], $config['thousands_sep']));
            $message->set('invoice_taxname', $d['taxname']);
            $message->set('invoice_tax_amount', number_format($tax, 2, $config['dec_point'], $config['thousands_sep']));
            $message->set('invoice_tax_rate', number_format($taxrate, 2, $config['dec_point'], $config['thousands_sep']));
            $message->set('invoice_subtotal', number_format($subtotal, 2, $config['dec_point'], $config['thousands_sep']));
            $message->set('invoice_due_date', date($config['df'], strtotime($d['duedate'])));
            $message->set('invoice_date', date($config['df'], strtotime($d['date'])));
            $message->set('invoice_amount', number_format($total, 2, $config['dec_point'], $config['thousands_sep']));
            $message_o = $message->output();

            $gen = array();

            $gen['cid'] = $a['id'];
            $gen['name'] = $a['account'];
            $gen['email'] = $a['email'];
            $gen['subject'] = $subj;
            $gen['body'] = $message_o;

            return $gen;



        }

        else{
            return false;
        }


    }




    public static function pdf($id,$r_type='',$token=''){

        global $app, $config,$_L,$pdf_tpl,$extraHtml;



        $d = ORM::for_table('sys_invoices')->find_one($id);
        if ($d) {

            if($token != ''){

                $token = str_replace('token_','',$token);
                $vtoken = $d->vtoken;
                if($token != $vtoken){
                    echo 'Sorry Token does not match!';
                    exit;
                }

            }

            //find all activity for this user
            $items = ORM::for_table('sys_invoiceitems')->where('invoiceid', $id)->order_by_asc('id')->find_many();

            $trs_c = ORM::for_table('sys_transactions')->where('iid', $id)->count();

            $trs = ORM::for_table('sys_transactions')->where('iid', $id)->order_by_desc('id')->find_many();

//find the user
            $a = ORM::for_table('crm_accounts')->find_one($d['userid']);
            $i_credit = $d['credit'];
            $i_due = '0.00';
            $i_total = $d['total'];
            if($d['credit'] != '0.00'){
                $i_due = $i_total - $i_credit;
            }
            else{
                $i_due =  $d['total'];
            }

//            $i_due = number_format($i_due,2,$config['dec_point'],$config['thousands_sep']);
            $cf = ORM::for_table('crm_customfields')->where('showinvoice', 'Yes')->order_by_asc('id')->find_many();


            // find the quote

            $quote = false;

            if($d->quote_id != '0'){
                $quote = ORM::for_table('sys_quotes')->find_one($d->quote_id);
            }


            //

            if($d['cn'] != ''){
                $dispid = $d['cn'];
            }
            else{
                $dispid = $d['id'];
            }

            $in = $d['invoicenum'].$dispid;

            if($a->cid != '' || $a->cid != 0){
                $company = Company::find($a->cid);
            }
            else{
                $company = false;
            }

//            define('_MPDF_PATH','system/lib/mpdf/');

//            require('system/lib/mpdf/mpdf.php');

            $pdf_c = '';
            $ib_w_font = 'dejavusanscondensed';
            if($config['pdf_font'] == 'default'){
                $pdf_c = 'c';
                $ib_w_font = 'Helvetica';
            }

//            $mpdf=new mPDF($pdf_c,'A4','','',20,15,15,25,10,10);

            $mpdf = new \Mpdf\Mpdf(
//                [
//                    'default_font' => 'centurygothick'
//                ]
            );

//            $mpdf->SetProtection(array('print'));
            $mpdf->SetTitle($config['CompanyName'].' Invoice');
            $mpdf->SetAuthor($config['CompanyName']);
            $mpdf->SetWatermarkText(ib_lan_get_line($d['status']));

            if($config['invoice_show_watermark'] == 1){

                $mpdf->showWatermarkText = true;
                $mpdf->watermark_font = $ib_w_font;
                $mpdf->watermarkTextAlpha = 0.1;

            }



            $mpdf->SetDisplayMode('fullpage');

            if($config['pdf_font'] == 'AdobeCJK'){
                $mpdf->useAdobeCJK = true;
                $mpdf->autoScriptToLang = true;
                $mpdf->autoLangToFont = true;

                if(isset($config['pdf_watermark_font']) && file_exists('vendor/mpdf/mpdf/ttfonts/'.$config['pdf_watermark_font']))
                {
                    $mpdf->watermark_font = $config['pdf_watermark_font'];
                }

            }

            $pdf_tpl = 'system/lib/invoices/pdf-x2.php';


//            $mpdf->showWatermarkText = false;
//            $pdf_tpl = 'system/lib/invoices/invoice-mb.php';
//            $pdf_tpl = 'system/lib/invoices/left-logo.php';










            ob_start();

            require $pdf_tpl;

            $html = ob_get_contents();


            ob_end_clean();

            $mpdf->WriteHTML($html);




            if ($r_type == 'dl') {
                $mpdf->Output(date('Y-m-d') . _raid(4) . '.pdf', 'D'); # D
            }

            elseif ($r_type == 'inline') {
                $mpdf->Output(date('Y-m-d') . _raid(4) . '.pdf', 'I'); # D
            }

            elseif ($r_type == 'store') {

                $mpdf->Output('storage/temp/Invoice_'.$in.'.pdf', 'F'); # D

            }

            else {
                $mpdf->Output(date('Y-m-d') . _raid(4) . '.pdf', 'I'); # D
            }




        }



    }


    public static function forSingleItem($cid,$item,$amount,$is_credit_invoice='0'){

        global $config;

        $datetime = date("Y-m-d H:i:s");

        $today = date('Y-m-d');


        $discount_type = 'f';
        $discount_value = '0.00';

        $actual_discount = '0.00';

        $fTotal = $amount;

        $taxval = '0.00';

        $taxname = '';

        $taxrate = '0.00';

        $notes = '';

        $invoicenum = '';

        $r = '0';
        $nd = $today;

        $cn = '';

        $currency = 0;
        $currency_symbol = $config['currency_code'];
        $currency_rate = 1.0000;

        $u = ORM::for_table('crm_accounts')->find_one($cid);

        if(!$u){
            return false;
        }

        $vtoken = _raid(10);
        $ptoken = _raid(10);
        $d = ORM::for_table('sys_invoices')->create();
        $d->userid = $cid;
        $d->account = $u->account;
        $d->date = $today;
        $d->duedate = $today;
        $d->datepaid = $datetime;
        $d->subtotal = $amount;
        $d->discount_type = $discount_type;
        $d->discount_value = $discount_value;
        $d->discount = $actual_discount;
        $d->total = $fTotal;
        $d->tax = $taxval;
        $d->taxname = $taxname;
        $d->taxrate = $taxrate;
        $d->vtoken = $vtoken;
        $d->ptoken = $ptoken;
        $d->status = 'Unpaid';
        $d->notes = $notes;
        $d->r = $r;
        $d->nd = $nd;
        //others
        $d->invoicenum = $invoicenum;
        $d->cn = $cn;
        $d->tax2 = '0.00';
        $d->taxrate2 = '0.00';
        $d->paymentmethod = '';

        // Build 4550

        $d->currency = $currency;
        $d->currency_symbol = $currency_symbol;
        $d->currency_rate = $currency_rate;

        $d->is_credit_invoice = $is_credit_invoice;


        //
        $d->save();
        $invoiceid = $d->id();




        // Add Invoice Items

        $sqty = 1;
        $samount = $amount;
        $ltotal = $amount;


        $d = ORM::for_table('sys_invoiceitems')->create();
        $d->invoiceid = $invoiceid;
        $d->userid = $cid;
        $d->description = $item;
        $d->qty = $sqty;
        $d->amount = $samount;
        $d->total = $ltotal;



        $d->taxed = '0';


        //others
        $d->type = '';
        $d->relid = '0';
        $d->itemcode = '';
        $d->taxamount = '0.00';
        $d->duedate = date('Y-m-d');
        $d->paymentmethod = '';
        $d->notes = '';



        $d->save();


        // return $invoiceid;

        $invoice = array();
        $invoice['id'] = $invoiceid;
        $invoice['vtoken'] = $vtoken;

        return $invoice;


    }


    public static function fromCart(){

        global $config;

        $datetime = date("Y-m-d H:i:s");

        $today = date('Y-m-d');


        $discount_type = 'f';
        $discount_value = '0.00';

        $actual_discount = '0.00';



        $taxval = '0.00';

        $taxname = '';

        $taxrate = '0.00';

        $notes = '';

        $invoicenum = '';

        $r = '0';
        $nd = $today;

        $cn = '';

        $currency = 0;
        $currency_symbol = $config['currency_code'];
        $currency_rate = 1.0000;

        if(isset($_COOKIE['ib_cart_secret'])) {

            $secret = $_COOKIE['ib_cart_secret'];

            // check cart exist

            $cart = ORM::for_table('sys_cart')->where('secret',$secret)->find_one();

            if($cart){

                $u = ORM::for_table('crm_accounts')->find_one($cart->cid);

                $cid = $cart->cid;

                if(!$u){
                    return false;
                }

                $fTotal = $cart->total;

                $vtoken = _raid(10);
                $ptoken = _raid(10);
                $d = ORM::for_table('sys_invoices')->create();
                $d->userid = $cid;
                $d->account = $u->account;
                $d->date = $today;
                $d->duedate = $today;
                $d->datepaid = $datetime;
                $d->subtotal = $fTotal;
                $d->discount_type = $discount_type;
                $d->discount_value = $discount_value;
                $d->discount = $actual_discount;
                $d->total = $fTotal;
                $d->tax = $taxval;
                $d->taxname = $taxname;
                $d->taxrate = $taxrate;
                $d->vtoken = $vtoken;
                $d->ptoken = $ptoken;
                $d->status = 'Unpaid';
                $d->notes = $notes;
                $d->r = $r;
                $d->nd = $nd;
                //others
                $d->invoicenum = $invoicenum;
                $d->cn = $cn;
                $d->tax2 = '0.00';
                $d->taxrate2 = '0.00';
                $d->paymentmethod = '';

                // Build 4550

                $d->currency = $currency;
                $d->currency_symbol = $currency_symbol;
                $d->currency_rate = $currency_rate;


                //
                $d->save();
                $invoiceid = $d->id();




                $current_items = $cart->items;
                $current_items_d = json_decode($current_items,true);

                foreach ($current_items_d as $e_i){

                    $d = ORM::for_table('sys_invoiceitems')->create();
                    $d->invoiceid = $invoiceid;
                    $d->userid = $cid;
                    $d->description = $e_i['name'];
                    $d->qty = $e_i['qty'];
                    $d->amount = $e_i['price'];
                    $d->total = $e_i['price']*$e_i['qty'];



                    $d->taxed = '0';


                    //others
                    $d->type = '';
                    $d->relid = '0';
                    $d->itemcode = '';
                    $d->taxamount = '0.00';
                    $d->duedate = date('Y-m-d');
                    $d->paymentmethod = '';
                    $d->notes = '';

                    $d->save();
                }


                $cart->delete();

                return $invoiceid;

            }

        }

        return false;


    }



    public static function files($invoice_id){

        $file_ids = ORM::for_table('ib_doc_rel')->where('rtype','invoice')->where('rid',$invoice_id)->find_array();


        $ids = array();

        foreach ($file_ids as $f){

            $ids[] = $f['did'];

        }

        if (!empty($ids)) {

            $d = ORM::for_table('sys_documents')->where_in('id', $ids)->find_many();

        }

        else{
            $d = array();
        }

        return $d;

    }



    public static function cloneInvoice($id)
    {


        $inv = ORM::for_table('sys_invoices')->find_one($id);

        if ($inv) {

            $vtoken = _raid(10);
            $ptoken = _raid(10);
            $d = ORM::for_table('sys_invoices')->create();
            $d->userid = $inv->userid;
            $d->account = $inv->account;
            $d->date = $inv->date;
            $d->duedate = $inv->duedate;
            $d->datepaid = $inv->datepaid;
            $d->subtotal = $inv->subtotal;
            $d->discount_type = $inv->discount_type;
            $d->discount_value = $inv->discount_value;
            $d->discount = $inv->discount;
            $d->total = $inv->total;
            $d->tax = $inv->tax;
            $d->taxname = $inv->taxname;
            $d->taxrate = $inv->taxrate;
            $d->vtoken = $vtoken;
            $d->ptoken = $ptoken;
            $d->status = 'Unpaid';
            $d->notes = $inv->notes;
            $d->r = $inv->r;
            $d->nd = $inv->nd;
            //others
            $d->invoicenum = $inv->invoicenum;
            $d->cn = $inv->cn;
            $d->tax2 = $inv->tax2;
            $d->taxrate2 = $inv->taxrate2;
            $d->paymentmethod = $inv->paymentmethod;

            // Build 4550

            $d->currency = $inv->currency;
            $d->currency_symbol = $inv->currency_symbol;
            $d->currency_rate = $inv->currency_rate;
            $d->save();
            $invoiceid = $d->id();

            $items = ORM::for_table('sys_invoiceitems')->where('invoiceid', $id)->order_by_asc('id')->find_array();
            foreach ($items as $item) {
                $t = ORM::for_table('sys_invoiceitems')->create();
                $t->invoiceid = $invoiceid;
                $t->userid = $item['userid'];
                $t->description = $item['description'];
                $t->qty = $item['qty'];
                $t->amount = $item['amount'];
                $t->total = $item['total'];
                $t->taxed = $item['taxed'];
                $t->type = '';
                $t->relid = '0';
                $t->itemcode = '';
                $t->taxamount = '0.00';
                $t->duedate = date('Y-m-d');
                $t->paymentmethod = '';
                $t->notes = '';
                $t->save();
            }

            return $invoiceid;



        }

        return false;

    }


    public static function genSMS($invoiceID,$tpl)
    {




        global $config;

        $invoice = self::find($invoiceID);

        if(!$invoice){
            return false;
        }

        $customer = Contact::find($invoice->userid);

        if(!$customer){
            return false;
        }


        switch ($tpl){
            case 'created':



                $tpl = SMSTemplate::where('tpl','Invoice Created')->first();

                break;

            case 'reminder':

                $tpl = SMSTemplate::where('tpl','Invoice Payment Reminder')->first();

                break;

            case 'refund':

                $tpl = SMSTemplate::where('tpl','Invoice Refund Confirmation')->first();

                break;

            case 'overdue':

                $tpl = SMSTemplate::where('tpl','Invoice Overdue Notice')->first();



                break;

            case 'confirm':

                $tpl = SMSTemplate::where('tpl','Invoice Payment Confirmation')->first();



                break;

            default:


                $tpl = false;

                break;
        }



        if ($invoice->cn != '') {
            $dispid = $invoice->cn;
        } else {
            $dispid = $invoice->id;
        }
        $invoice_num = $invoice->invoicenum . $dispid;

        $total = $invoice->total;
        $credit = $invoice->credit;
        $due_amount = $total - $credit;
        $tax = $invoice->tax;
        $taxrate = $invoice->taxrate;
        $subtotal = $invoice->subtotal;

        if($invoice && $tpl){
            $message = new Template($tpl->sms);

            $message->set('name', $customer->account);
            $message->set('customer_name', $customer->account);
            $message->set('client_name', $customer->account);
            $message->set('company', $customer->company);
            $message->set('business_name', $config['CompanyName']);
            $message->set('invoice_url', U . 'client/iview/' . $invoice->id . '/token_' . $invoice->vtoken);
            $message->set('invoice_id', $invoice_num);
            $message->set('invoice_status', $invoice->status);
            $message->set('invoice_amount_paid', number_format($credit, 2, $config['dec_point'], $config['thousands_sep']));
            $message->set('invoice_due_amount', number_format($due_amount, 2, $config['dec_point'], $config['thousands_sep']));
            $message->set('invoice_taxname', $invoice->taxname);
            $message->set('invoice_tax_amount', number_format($tax, 2, $config['dec_point'], $config['thousands_sep']));
            $message->set('invoice_tax_rate', number_format($taxrate, 2, $config['dec_point'], $config['thousands_sep']));
            $message->set('invoice_subtotal', number_format($subtotal, 2, $config['dec_point'], $config['thousands_sep']));
            $message->set('invoice_due_date', date($config['df'], strtotime($invoice->duedate)));
            $message->set('invoice_date', date($config['df'], strtotime($invoice->date)));
            $message->set('invoice_amount', number_format($total, 2, $config['dec_point'], $config['thousands_sep']));
            $message_o = $message->output();

            return [
                'to' => $customer->phone,
                'sms' => $message_o
            ];

        }
        else{
            return false;
        }

    }

    public static function fromTicket($ticket_id)
    {


        $ticket = Ticket::find($ticket_id);

        if(!$ticket)
        {
            return [
                'success' => false,
                'error' => 'Ticket not found'
            ];
        }

        // check invoice exist for this ticket

        $invoice_exist = Invoice::where('ticket_id',$ticket_id)->first();

        if($invoice_exist)
        {
//            r2(U . 'tickets/admin/view/'.$ticket_id, 'e', 'Invoice already exist for this ticket');
            return [
                'success' => false,
                'error' => 'Invoice already exist for this ticket.'
            ];
        }


        // Get all tasks

        $tasks = Task::where('rel_type','Ticket')
            ->where('rel_id',$ticket_id)
            ->get();

        // Last ticket reply



        $items = [];

        foreach ($tasks as $task)
        {
            $items[] = [
                'name' => $task->title,
                'qty' => 1,
                'price' => 0.00
            ];
        }

        $invoice = self::createInvoice([
            'contact_id' => $ticket->userid,
            'ticket_id' => $ticket_id,
           // 'title' => $ticket->tid,
            'cn' => $ticket->tid,
            'items' => $items
        ]);

        if($invoice)
        {
            return [
                'success' => true,
                'invoice' => $invoice
            ];
        }

        return [
            'success' => false,
            'error' => 'An error occurred'
        ];

    }


}