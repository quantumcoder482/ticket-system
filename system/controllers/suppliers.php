<?php
/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/
_auth();
$ui->assign('_application_menu', 'suppliers');
$ui->assign('_title', $_L['Suppliers'].' - '. $config['CompanyName']);

$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);


switch ($action) {

    case 'add':


        if(!has_access($user->roleid,'suppliers','create')){
            permissionDenied();
        }

        $ui->assign('countries',Countries::all($config['country'])); // may add this $config['country_code']




        // find all companies

        $companies = ORM::for_table('sys_companies')->select('id')->select('company_name')->order_by_desc('id')->find_array();

        $ui->assign('companies',$companies);

        // find all groups

        $gs = ORM::for_table('crm_groups')->order_by_asc('sorder')->find_array();

        $ui->assign('gs',$gs);


        $c_selected_id = route(3);




        if($c_selected_id){
            $ui->assign('c_selected_id',$c_selected_id);
        }
        else{
            $ui->assign('c_selected_id','');
        }


        $ui->assign('xheader', Asset::css(array('modal','s2/css/select2.min')));
        $ui->assign('xfooter', Asset::js(array('modal','s2/js/select2.min','s2/js/i18n/'.lan(),'add-contact')));
        $tags = Tags::get_all('Contacts');
        $ui->assign('tags',$tags);
        $ui->assign('xjq', '
 $("#country").select2({
 theme: "bootstrap"
 });
 ');

        $ui->assign('jsvar', '
_L[\'Working\'] = \''.$_L['Working'].'\';
_L[\'Company Name\'] = \''.$_L['Company Name'].'\';
_L[\'New Company\'] = \''.$_L['New Company'].'\';
 ');


        $currencies = M::factory('Models_Currency')->find_array();



        view('suppliers_add',[
            'currencies' => $currencies
        ]);


        break;


    case 'list':




        break;


    default:
        echo 'action not defined';
}