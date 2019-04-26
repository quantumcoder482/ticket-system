<?php
/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/
_auth();
$ui->assign('_application_menu', 'ps');
$ui->assign('_title', $_L['Products n Services'].'- '. $config['CompanyName']);
$ui->assign('_st', $_L['Products n Services']);
$action = $routes['1'];
$user = User::_info();
$ui->assign('user', $user);

if (!has_access($user->roleid, 'products_n_services', 'view')) {
    permissionDenied();
}

switch ($action) {

    case 'modal-list':


        if (!has_access($user->roleid, 'products_n_services', 'view')) {
            permissionDenied();
        }


        $d = ORM::for_table('sys_items')->order_by_asc('name')->find_array();

        echo '


<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h3>'.$_L['Products n Services'].'</h3>
</div>
<div class="modal-body">
<input type="text" id="myInput" onkeyup="filterPS()" placeholder="Search for Product Name..">
<table class="table table-striped" id="items_table">
      <thead>
        <tr>
          <th width="10%">#</th>
          <th width="20%">'.$_L['Item Code'].'</th>
          <th width="55%">'.$_L['Item Name'].'</th>

          <th width="15%">'.$_L['Price'].'</th>
        </tr>
      </thead>
      <tbody>
       ';

        foreach($d as $ds){
            $price = number_format($ds['sales_price'],2,$config['dec_point'],$config['thousands_sep']);
            echo ' <tr>
          <td><input type="checkbox" class="si"></td>
          <td>'.$ds['id'].'</td>
          <td>'.$ds['name'].'</td>

          <td class="price">'.$price.'</td>
        </tr>';
        }

        echo '

      </tbody>
    </table>

</div>
<div class="modal-footer">

	<button type="button" data-dismiss="modal" class="btn">'.$_L['Close'].'</button>
	<button class="btn btn-primary update">'.$_L['Select'].'</button>
</div>
<style type="text/css">
#myInput {
    width: 100%; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 12px 20px 12px 40px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 12px; /* Add some space below the input */
}
</style>
<script type="text/javascript">
function filterPS() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("items_table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don\'t match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>
';

        break;


    case 'p-new':

        if (!has_access($user->roleid, 'products_n_services', 'create')) {
            permissionDenied();
        }

        $units = ORM::for_table('sys_units')->order_by_asc('sorder')->find_array();
        $ui->assign('units',$units);

        $ui->assign('type','Product');
        $ui->assign('xheader', Asset::css(array('modal','dropzone/dropzone','redactor/redactor')));
        $ui->assign('xfooter', Asset::js(array('modal','dropzone/dropzone','redactor/redactor.min','numeric','jslib/add-ps')));

        $ui->assign('xjq', '
 $(\'.amount\').autoNumeric(\'init\');
 ');

        $max = ORM::for_table('sys_items')->max('id');
        $nxt = $max+1;
        $ui->assign('nxt',$nxt);

        view('add-ps');



        break;


    case 's-new':

        if (!has_access($user->roleid, 'products_n_services', 'create')) {
            permissionDenied();
        }

        $ui->assign('type','Service');
        $ui->assign('xheader', Asset::css(array('modal','dropzone/dropzone','redactor/redactor')));
        $ui->assign('xfooter', Asset::js(array('modal','dropzone/dropzone','redactor/redactor.min','numeric','jslib/add-ps')));

        $ui->assign('xjq', '
 $(\'.amount\').autoNumeric(\'init\');
 ');

        $max = ORM::for_table('sys_items')->max('id');
        $nxt = $max+1;
        $ui->assign('nxt',$nxt);
        view('add-ps');



        break;


    case 'add-post':

        if (!has_access($user->roleid, 'products_n_services', 'edit')) {
            permissionDenied();
        }

        $msg = '';


        $name = _post('name');
        $sales_price = _post('sales_price','0.00');
        $sales_price = Finance::amount_fix($sales_price);
        $item_number = _post('item_number');
        $description = _post('description');
        $type = _post('type');

        // other variables

        // check item number already exist

        if($item_number != ''){
            $check = ORM::for_table('sys_items')->where('item_number',$item_number)->find_one();
            if($check){
                $msg .= 'Item number already exist <br>';
            }
        }





        $inventory = _post('inventory');

        if(!is_numeric($inventory)){
            $inventory = '0';
        }

        $unit = _post('unit');

        $weight = _post('weight');

        if(!is_numeric($weight)){
            $weight = '0.0000';
        }







        if($name == ''){
            $msg .= 'Item Name is required <br>';
        }


        $tax_code = _post('tax_code');
        $sales_price = Finance::amount_fix($sales_price);

        if(!is_numeric($sales_price)){
            $sales_price = '0.00';
        }

        $cost_price = _post('cost_price','0.00');

        $cost_price = Finance::amount_fix($cost_price);

        if(!is_numeric($cost_price)){
            $cost_price = '0.00';
        }


        if($msg == ''){


            $d = ORM::for_table('sys_items')->create();
            $d->name = $name;
            $d->sales_price = $sales_price;
            $d->item_number = $item_number;
            $d->description = $description;
            $d->type = $type;
//others
            $d->unit = $unit;
            $d->weight = $weight;
            $d->inventory = $inventory;
            $d->e = '';

            // other variables

            $d->image = _post('file_link');
            $d->cost_price = $cost_price;

            $d->tax_code = $tax_code;



            $d->save();

            _msglog('s',$_L['Item Added Successfully']);

            echo $d->id();
        }
        else{
            echo $msg;
        }
        break;





    case 'p-list':

        if (!has_access($user->roleid, 'products_n_services', 'view')) {
            permissionDenied();
        }



        $paginator = Paginator::bootstrap('sys_items','type','Product');
        $d = ORM::for_table('sys_items')->where('type','Product')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        $ui->assign('d',$d);
        $ui->assign('type','Product');
        $ui->assign('paginator',$paginator);

        $ui->assign('xheader', Asset::css(array('modal','dropzone/dropzone','redactor/redactor')));
        $ui->assign('xfooter', Asset::js(array('clipboard.min','modal','dropzone/dropzone','redactor/redactor.min','numeric','js/ps_list')));

        view('ps-list');
        break;

    case 's-list':

        $paginator = Paginator::bootstrap('sys_items','type','Service');
        $d = ORM::for_table('sys_items')->where('type','Service')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        $ui->assign('d',$d);
        $ui->assign('type','Service');
        $ui->assign('paginator',$paginator);

        $ui->assign('xheader', Asset::css(array('modal','dropzone/dropzone','redactor/redactor')));
        $ui->assign('xfooter', Asset::js(array('clipboard.min','modal','dropzone/dropzone','redactor/redactor.min','numeric','js/ps_list')));


        view('ps-list');


        break;


    case 'edit-post':

        if (!has_access($user->roleid, 'products_n_services', 'edit')) {
            permissionDenied();
        }

        $msg = '';
        $id = _post('id');

        $name = _post('name');
        $sales_price = _post('sales_price','0.00');
        $sales_price = Finance::amount_fix($sales_price);
        $item_number = _post('item_number');
        $description = _post('description');
        $type = _post('type');

        // other variables




        $inventory = _post('inventory');

        $inventory = Finance::amount_fix($inventory);

        if(!is_numeric($inventory)){
            $inventory = '0';
        }

        $unit = _post('unit');

        $weight = _post('weight');

        if(!is_numeric($weight)){
            $weight = '0.0000';
        }





        $msg = '';

        if($name == ''){
            $msg .= 'Item Name is required <br>';
        }




        $sales_price = Finance::amount_fix($sales_price);

        if(!is_numeric($sales_price)){
            $sales_price = '0.00';
        }

        $cost_price = _post('cost_price','0.00');

        $cost_price = Finance::amount_fix($cost_price);

        if(!is_numeric($cost_price)){
            $cost_price = '0.00';
        }

        if($msg == ''){
            $d = ORM::for_table('sys_items')->find_one($id);
            if($d){

                if($item_number != '' && $item_number != $d->item_number){
                    $check = ORM::for_table('sys_items')->where('item_number',$item_number)->find_one();
                    if($check){
                        i_close('Item Number already exist.');
                    }
                }

                $d->name = $name;
                $d->item_number = $item_number;
                $d->sales_price = $sales_price;
                $d->description = $description;
                $d->unit = $unit;
                $d->weight = $weight;
                $d->inventory = $inventory;


                // other variables

                $d->image = _post('file_link');
                $d->cost_price = $cost_price;

                $d->save();
                echo $d->id();
            }
            else{
                echo 'Not Found';
            }


        }
        else{
            echo $msg;
        }


        break;
    case 'delete':

        if (!has_access($user->roleid, 'products_n_services', 'delete')) {
            permissionDenied();
        }

        $id = $routes['2'];
        if(APP_STAGE == 'Demo'){
            r2(U . 'accounts/list', 'e', 'Sorry! Deleting Account is disabled in the demo mode.');
        }
        $d = ORM::for_table('sys_accounts')->find_one($id);
        if($d){
            $d->delete();
            r2(U . 'accounts/list', 's', $_L['account_delete_successful']);
        }

        break;

    case 'edit-form':



        if(!has_access($user->roleid,'products_n_services','edit')){


            exit;

        }

        $id = $routes['2'];
        $d = ORM::for_table('sys_items')->find_one($id);

        if($d){
            $price = number_format(($d->sales_price),2,$config['dec_point'],$config['thousands_sep']);
            $has_img = '';
            if($d->image != ''){
                $has_img = '<hr>
<img src="'.APP_URL.'/storage/items/'.$d->image.'" class="img-responsive">
';
            }

            echo '
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h3>'.$_L['Edit'].'</h3>
</div>
<div class="modal-body">

<div class="row">
<div class="col-md-8">
<form class="form-horizontal" role="form" id="edit_form" method="post">
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">'.$_L['Name'].'</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="'.$d->name.'" name="name" id="name">
    </div>
  </div>
  <div class="form-group">
    <label for="rate" class="col-sm-2 control-label">'.$_L['Item Number'].'</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="item_number" value="'.$d->item_number.'" id="item_number">
      
    </div>
  </div>
  <div class="form-group">
    <label for="rate" class="col-sm-2 control-label">'.$_L['Sales Price'].'</label>
    <div class="col-sm-8">
      <input type="text" id="sales_price" name="sales_price" class="form-control amount" autocomplete="off" data-a-sign="'.$config['currency_code'].' "  data-a-dec="'.$config['dec_point'].'" data-a-sep="'.$config['thousands_sep'].'" data-d-group="2" value="'.$d->sales_price.'">
    </div>
  </div>
  
    <div class="form-group">
    <label for="cost_price" class="col-sm-2 control-label">'.$_L['Cost Price'].'</label>
    <div class="col-sm-8">
      <input type="text" id="cost_price" name="cost_price" class="form-control amount" autocomplete="off" data-a-sign="'.$config['currency_code'].' "  data-a-dec="'.$config['dec_point'].'" data-a-sep="'.$config['thousands_sep'].'" data-d-group="2" value="'.$d->cost_price.'">
    </div>
  </div>
  
    <div class="form-group">
    <label for="description" class="col-sm-2 control-label">'.$_L['Description'].'</label>
    <div class="col-sm-10">
      <textarea id="description" name="description" class="form-control" rows="3">'.$d->description.'</textarea>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inventory" class="col-sm-2 control-label">'.$_L['Inventory'].'</label>
    <div class="col-sm-10">
      <input type="text" id="inventory" name="inventory" class="form-control amount" autocomplete="off" data-a-sign=""  data-a-dec="'.$config['dec_point'].'" data-a-sep="'.$config['thousands_sep'].'" data-d-group="2" value="'.$d->inventory.'">
    </div>
  </div>
  
  
  
  

  
  <input type="hidden" name="id" value="'.$d->id.'">
  <input type="hidden" name="file_link" id="file_link" value="'.$d->image.'">
</form>
</div>
<div class="col-md-4">
<form action="" class="dropzone" id="upload_container">

                        <div class="dz-message">
                            <h3> <i class="fa fa-cloud-upload"></i>  '.$_L['Drop File Here'].'</h3>
                            <br />
                            <span class="note">'.$_L['Click to Upload'].'</span>
                        </div>
                        
                        <hr>
                        
                        

                    </form>
                 
                    '.$has_img.'
                    
</div>

</div>
<div class="row">
<div class="col-md-12">
<hr>

  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">'.$_L['URL'].'</div>
      <input type="text" class="form-control" value="'.U.'item/'.$d->id.'/"  onClick="this.setSelectionRange(0, this.value.length)" id="item_url" readonly>
      <div class="input-group-addon"><a href="javascript:void(0)" class="ib_btn_copy" data-clipboard-target="#item_url"><i class="fa fa-clipboard"></i> '.$_L['Copy'].'</a></div>
    </div>
  </div>
  
    <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">'.$_L['URL'].' : '.$_L['Add to Cart'].'</div>
      <input type="text" class="form-control" value="'.U.'cart/add/'.$d->id.'/"  onClick="this.setSelectionRange(0, this.value.length)" id="add_to_cart_url" readonly>
      <div class="input-group-addon"><a href="javascript:void(0)" class="ib_btn_copy" data-clipboard-target="#add_to_cart_url"><i class="fa fa-clipboard"></i> '.$_L['Copy'].'</a></div>
    </div>
  </div>

</div>
</div>

</div>
<div class="modal-footer">

	<button type="button" data-dismiss="modal" class="btn">'.$_L['Close'].'</button>
	<button id="update" class="btn btn-primary">'.$_L['Update'].'</button>
</div>';
        }
        else{
            echo 'not found';
        }



        break;




    case 'json_get':

        if (!has_access($user->roleid, 'products_n_services', 'view')) {
            permissionDenied();
        }

        header('Content-Type: application/json');

        $pid = route(2);

        $d = ORM::for_table('sys_items')->find_one($pid);

        if($d){

            $i = array();
            $i['sales_price'] = $d->sales_price;

            echo json_encode($i);

        }


        break;

    case 'cats':




        break;


    case 'upload':

        if (!has_access($user->roleid, 'products_n_services', 'create')) {
            permissionDenied();
        }

        if(APP_STAGE == 'Demo'){
            exit;
        }

        $uploader   =   new Uploader();
        $uploader->setDir('storage/items/');
        $uploader->sameName(false);
        $uploader->setExtensions(array('jpg','jpeg','png','gif'));  //allowed extensions list//
//        $uploader->allowAllFormats();  //allowed extensions list//
        if($uploader->uploadFile('file')){   //txtFile is the filebrowse element name //
            $uploaded  =   $uploader->getUploadName(); //get uploaded file name, renames on upload//

            $file = $uploaded;
            $msg = $_L['Uploaded Successfully'];
            $success = 'Yes';

            // create thumb

            $image = new Img();

            // indicate a source image (a GIF, PNG or JPEG file)
            $image->source_path = 'storage/items/'.$file;

            // indicate a target image
            // note that there's no extra property to set in order to specify the target
            // image's type -simply by writing '.jpg' as extension will instruct the script
            // to create a 'jpg' file
            $image->target_path = 'storage/items/thumb'.$file;

            // since in this example we're going to have a jpeg file, let's set the output
            // image's quality
            $image->jpeg_quality = 100;

            // some additional properties that can be set
            // read about them in the documentation
            $image->preserve_aspect_ratio = true;
            $image->enlarge_smaller_images = true;
            $image->preserve_time = true;

            // resize the image to exactly 100x100 pixels by using the "crop from center" method
            // (read more in the overview section or in the documentation)
            //  and if there is an error, check what the error is about
            if (!$image->resize(100, 100, ZEBRA_IMAGE_CROP_CENTER)) {



                // if no errors
            } else {

                // echo 'Success!';

            }

            //


        }else{//upload failed
            $file = '';
            $msg = $uploader->getMessage();
            $success = 'No';
        }

        $a = array(
            'success' => $success,
            'msg' =>$msg,
            'file' =>$file
        );

        header('Content-Type: application/json');

        echo json_encode($a);




        break;




    default:
        echo 'action not defined';
}