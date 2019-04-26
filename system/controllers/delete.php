<?php

/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

_auth();
$ui->assign('_application_menu', 'accounts');
$ui->assign('_title', $_L['Delete'].'- '. $config['CompanyName']);
$action = $routes['1'];
$user = User::_info();

function clxDeleteInvoice($id)
{
    $d = ORM::for_table('sys_invoices')->find_one($id);
    if($d) {
//delete all invoice items

        $items = InvoiceItem::where('invoiceid', $id)->get();

        foreach ($items as $item) {
            if ($item->itemcode != '') {
                Inventory::increaseByItemNumber($item->itemcode, $item->qty);
            }

            $item->delete();

        }
        //  $x = ORM::for_table('sys_invoiceitems')->where('invoiceid',$id)->delete_many();

        $d->delete();

        // Delete Related Transactions

        $transactions = Transaction::where('iid', $id)->get();

        foreach ($transactions as $transaction) {
            $t = Transaction::remove($transaction->id);
        }
    }

    return true;
}


switch ($action) {

    case 'crm-user':

        if(!has_access($user->roleid,'customers','delete')){

            permissionDenied();

        }

        $id = $routes['2'];
        $id = str_replace('uid','',$id);
        $d = ORM::for_table('crm_accounts')->find_one($id);
        if($d){
            $username = $d->account;
//delete all activity
            $x = ORM::for_table('sys_activity')->where('cid',$id)->delete_many();
            $x = ORM::for_table('sys_invoices')->where('userid',$id)->delete_many();
            $x = ORM::for_table('sys_quotes')->where('userid',$id)->delete_many();
            $x = ORM::for_table('sys_orders')->where('cid',$id)->delete_many();
            $x = ORM::for_table('sys_staffpermissions')->where('rid',$id)->delete_many();
            $x = ORM::for_table('ib_doc_rel')->where('rtype','contact')->where('rid',$id)->delete_many();

            // Delete credit card info if exist

            $credit_card = CreditCard::where('contact_id',$id)->first();

            if($credit_card)
            {
                $credit_card->delete();
            }

            //

            #todo update payer and payee
            $d->delete();
            _log('Contact Deleted: '.$username,'Admin',$user->id);

            $gid = route(3);

            if(!$gid){
                r2(U.'contacts/list/','s',$_L['Contact Deleted Successfully']);
            }
            else{
                r2(U.'contacts/find_by_group/'.$gid.'/','s',$_L['Contact Deleted Successfully']);
            }



        }
        else{
            echo 'contact not found';
        }
        break;

    case 'ps':

        if(!has_access($user->roleid,'products_n_services','delete')){

            permissionDenied();

        }

        $id = $routes['2'];
        $id = str_replace('pid','',$id);
        $d = ORM::for_table('sys_items')->find_one($id);
        if($d){
            $type = $d['type'];
            $r = 'ps/s-list';
            if($type == 'Product'){
                $r = 'ps/p-list';
            }
            _log($type.' Deleted: '.$d['name'].' [ID: '.$d['id'].']','Admin',$user->id);

            $d->delete();

            r2(U.$r,'s', $type. ' ' .$_L['Deleted Successfully']);

        }
        else{
            echo 'not found';
        }
        break;

    case 'invoice':

        if(!has_access($user->roleid,'sales','delete')){

            permissionDenied();

        }

        $id = $routes['2'];
        $id = str_replace('iid','',$id);


        clxDeleteInvoice($id);


        r2(U.'invoices/list','s',$_L['Invoice Deleted Successfully']);


        break;

    case 'quote':

        if(!has_access($user->roleid,'sales','delete')){

            permissionDenied();

        }

        $id = $routes['2'];
        $id = str_replace('iid','',$id);
        $d = ORM::for_table('sys_quotes')->find_one($id);
        if($d){
//delete all invoice items
            $x = ORM::for_table('sys_quoteitems')->where('qid',$id)->delete_many();

            $d->delete();
            r2(U.'quotes/list/','s',$_L['Quote Deleted Successfully']);

        }
        else{
            echo 'Invoice not found';
        }
        break;

    case 'tags':
        $id = $routes['2'];
        $id = str_replace('iid','',$id);
        $d = ORM::for_table('sys_tags')->find_one($id);
        if($d){
//delete all invoice items


            $d->delete();
            r2(U.'settings/tags','s',$_L['Tag Deleted Successfully']);

        }
        else{
            echo 'Invoice not found';
        }
        break;

    case 'tax':
        $id = $routes['2'];
        $id = str_replace('t','',$id);
        $d = ORM::for_table('sys_tax')->find_one($id);
        if($d){

            $d->delete();
            r2(U.'tax/list/','s',$_L['TAX Deleted Successfully']);

        }
        else{
            echo 'TAX not found';
        }
        break;


    case 'customfield':

        $id = $routes[2];
        $id = str_replace('d','',$id);

        $d = ORM::for_table('crm_customfields')->find_one($id);
        if($d){

            $d->delete();
            r2(U.'settings/customfields/','s',$_L['Custom Field Deleted Successfully']);

        }
        else{
            echo 'Custom Field Not found';
        }

        break;

    case 'crm-group':

        //
        if(!has_access($user->roleid,'customers','delete')){

            permissionDenied();

        }
        $id = $routes[2];
        $id = str_replace('g','',$id);
        $d = ORM::for_table('crm_groups')->find_one($id);
        if($d){

            // find all contacts with this group

            $gname = $d->gname;

            ORM::execute("update crm_accounts set gid=0, gname='' where gid=$id");


            $d->delete();

            _log('Group Deleted: '.$gname,'Admin',$user->id);
            r2(U.'contacts/groups/','s',$_L['Group Deleted Successfully']);

        }
        else{
            echo 'contact not found';
        }

        break;





    case 'currency':

        $id = route(2);
        $id = str_replace('c','',$id);

        $currency = M::factory('Models_Currency');

        $c = $currency->find_one($id);

        if($c){

            if($c->cname == $config['home_currency']){

                r2(U.'settings/currencies/','e','You Can\'t Delete Home Currency');

            }


            // check currency is using


            $invoice = M::factory('Models_Invoice');

            $check = $invoice->where('currency',$id)->find_one();

            if($check){

                r2(U.'settings/currencies/','e','This Currency is in use, You Can\'t Delete.');

            }

            $c->delete();


            r2(U.'settings/currencies/','s','Currency Deleted Successfully.');

        }


        break;


    case 'company':
        if(!has_access($user->roleid,'customers','delete')){

            permissionDenied();

        }
        $id = route(2);
        $id = str_replace('c','',$id);

        $company = M::factory('Models_Company');

        $c = $company->find_one($id);

        if($c){

            $c->delete();

            r2(U.'contacts/companies/','s',$_L['Deleted Successfully']);

        }


        break;


    case 'event':

        $id = route(2);

        $calendar = M::factory('Models_Calendar')->find_one($id);

        if($calendar){

            $calendar->delete();

            r2(U.'calendar/events/','s',$_L['Deleted Successfully']);

        }




        break;


    case 'role':

        $id = route(2);

        $role = M::factory('Models_Role')->find_one($id);

        if($role){

            // check this role is using

            $users = M::factory('Models_User')->where('roleid',$id)->find_one();

            if($users){

                r2(U.'settings/roles/','e','This Role is in Use. You will have to assign User to another Role before deleting.');

            }
            else{

                // delete all permissions

                $p = ORM::for_table('sys_staffpermissions')->where('rid',$id)->delete_many();

                $role->delete();



                r2(U.'settings/roles/','s',$_L['Deleted Successfully']);

            }

        }




        break;

    case 'order':

        if(!has_access($user->roleid,'orders','delete')){

            permissionDenied();

        }

        $id = route(2);

        $id = str_replace('uid','',$id);

        $d = ORM::for_table('sys_orders')->find_one($id);

        if($d){

            // Check order has invoice

            if($d->iid != '' || $d->iid != 0)
            {

                clxDeleteInvoice($d->iid);

            }


            $d->delete();
        }

        r2(U.'orders/list/','s',$_L['Deleted Successfully']);

        break;


    case 'document':

        if(APP_STAGE == 'Demo'){
            r2(U.'documents/list/','e',$_L['disabled_in_demo']);
        }

        if(!has_access($user->roleid,'documents','delete')){

            permissionDenied();

        }

        $id = route(2);

        $id = str_replace('did','',$id);

        $d = ORM::for_table('sys_documents')->find_one($id);

        if($d){

            $file = 'storage/docs/'.$d->file_path;

            if (file_exists($file)) {

                unlink($file);

            }

            $d->delete();

            // now delete file relations


            $rel = ORM::for_table('ib_doc_rel')->where('did',$id)->delete_many();


        }

        r2(U.'documents/list/','s',$_L['Deleted Successfully']);


        break;


    case 'unit':

        $id = route(2);
        $id = str_replace('c','',$id);

        $unit = ORM::for_table('sys_units')->find_one($id);

        if($unit){

            $unit->delete();

            r2(U.'settings/units/','s',$_L['Deleted Successfully']);

        }


        break;


    case 'lead':

        $id = route(2);
        $id = str_replace('did','',$id);

        $lead = ORM::for_table('crm_leads')->find_one($id);

        if($lead){

            $lead->delete();


        }

        echo 'ok';


        break;

    case 'multiple':

        $type = _post('type');

        switch ($type){

            case 'customers':

                if(!has_access($user->roleid,'customers','delete')){

                    permissionDenied();

                }

                if(!isset($_POST['ids'])){
                    exit;
                }

                $ids_raw = $_POST['ids'];

                $ids = array();

                foreach ($ids_raw as $id_single){
                    $id = str_replace('row_','',$id_single);
                    array_push($ids,$id);
                }

                $contacts = ORM::for_table('crm_accounts')->where_id_in($ids)->delete_many();

                r2(U.'contacts/list/','s',$_L['Deleted Successfully']);



                break;

        }






        break;


    case 'email-templates':

        $id = route(2);
        $id = str_replace('ed','',$id);

        $d = ORM::for_table('sys_email_templates')->find_one($id);
        if($d){

            if($d->core == 'Yes'){
                r2(U.'settings/email-templates/','e','Unable to Delete System Email Templates');
            }
            else{
                $d->delete();
            }

        }

        r2(U.'settings/email-templates/','s',$_L['Deleted Successfully']);



        break;

    case 'tasks':

        $id = route(2);
        $id = str_replace('d_','',$id);

        $d = ORM::for_table('sys_tasks')->find_one($id);

        if($d){
            $d->delete();
            _msglog('s',$_L['Deleted Successfully']);
        }

        echo '1';


        break;


    case 'expense_type':

        $id = route(2);
        $id = str_replace('d_','',$id);

        $d = ORM::for_table('expense_types')->find_one($id);

        if($d){
            $d->delete();

        }

        r2(U.'settings/expense-types','s',$_L['Deleted Successfully']);


        break;


    case 'sms':

        $id = route(2);

        $sms = SMS::find($id);

        if($sms){
            $sms->delete();
        }

        r2(U.'sms/init/sent/','s',$_L['Deleted Successfully']);


        break;


    case 'purchase':


        if(!has_access($user->roleid,'sales','delete')){

            permissionDenied();

        }

        $id = $routes['2'];
        $id = str_replace('iid','',$id);
        $d = ORM::for_table('sys_purchases')->find_one($id);
        if($d){
//delete all invoice items
            $x = ORM::for_table('sys_purchaseitems')->where('invoiceid',$id)->delete_many();

            $d->delete();
            r2(U.'purchases/list','s',$_L['Deleted Successfully']);

        }
        else{
            echo 'Invoice not found';
        }


        break;


    case 'password':

        $id = route(2);

        $id = str_replace('c','',$id);

        $p = PasswordManager::find($id);

        if($p){
            $p->delete();
        }

        r2(U.'password_manager','s',$_L['Deleted Successfully']);

        break;



    case 'asset-category':

        $id = route(2);

        $asset_category = AssetCategory::find($id);

        if($asset_category)
        {
            $asset_category->delete();
        }

        r2(U.'assets/list','s',$_L['Deleted Successfully']);

        break;


    case 'asset':

        $id = route(2);

        $asset = AccountingAsset::find($id);

        if($id)
        {
            $asset->delete();
        }

        r2(U.'assets/list','s',$_L['Deleted Successfully']);


        break;


    case 'employee':

        if(APP_STAGE == 'Demo'){
            r2(U . 'hrm/employees', 'e', 'Sorry! This option is disabled in the demo mode.');
        }

        $id = route(2);

        $employee = Employee::find($id);

        if($employee)
        {
            $employee->delete();
        }


        r2(U.'hrm/employees','s',$_L['Deleted Successfully']);



        break;





    default:
        echo 'action not defined';
}