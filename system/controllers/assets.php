<?php
/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/
_auth();
$ui->assign('_application_menu', 'transactions');
$ui->assign('_title', $_L['Assets'] . '- ' . $config['CompanyName']);
$ui->assign('_st', $_L['Assets']);
$action = route(1,'list');
$user = User::_info();
$ui->assign('user', $user);
Event::trigger('assets');

if (!has_access($user->roleid, 'transactions', 'view')) {
    permissionDenied();
}

switch ($action) {

    case 'list':

        if(!db_table_exist('assets')){
            r2(U.'assets/schema');
        }

        $categories = AssetCategory::all();

        $category_id = route(2);

        $selected_category = false;
        if($category_id != '')
        {
            $selected_category = AssetCategory::find($category_id);
        }

        $assets_db = AccountingAsset::orderBy('id','desc');

        $category_id = route(2);

        if($category_id != '')
        {
            $assets_db->where('category_id',$category_id);
        }

        $assets = $assets_db->get();

        $assets_value = $assets_db->sum('price');

        view('assets_list',[
            'categories' => $categories,
            'selected_category' => $selected_category,
            'assets' => $assets,
            'assets_value' => $assets_value
        ]);

        break;

    case 'asset':

        $id = route(2);

        $asset = false;
        if($id != '')
        {
            $asset = AccountingAsset::find($id);
        }

        $categories = AssetCategory::all();

        view('asset',[
            'categories' => $categories,
            'asset' => $asset
        ]);

        break;


    case 'asset-post':

        $validator = new Validator;
        $data = $request->all();
        $validation = $validator->validate($data, [
            'name' => 'required',
        ]);


        if ($validation->fails()) {
            $message = '';
            foreach ($validation->errors()->all() as $key => $value)
            {
                $message .= $value.' <br> ';
            }
            responseWithError($message);
        } else {

            if(isset($data['asset_id']) && $data['asset_id'] != '')
            {
                $asset = AccountingAsset::find($data['asset_id']);
            }
            else{
                $asset = new AccountingAsset;
            }

            $asset->name = $data['name'];
            $asset->asset = '';
            $asset->brand = '';

            $price = 0.00;

            if(isset($data['price']) && $data['price'] != '')
            {
                $price = $data['price'];
                $price = Finance::amount_fix($price);
            }

            if(isset($data['date_purchased']))
            {
                $asset->date_purchased = $data['date_purchased'];
            }
            if(isset($data['serial']))
            {
                $asset->serial = $data['serial'];
            }

            if(isset($data['supported_until']))
            {
                $asset->supported_until = $data['supported_until'];
            }

            if(isset($data['category_id']) && $data['category_id'] != '')
            {
                $asset->category_id = $data['category_id'];
            }

            if(isset($data['notes']))
            {
                $asset->notes = $data['notes'];
            }

            $asset->price = $price;
            $asset->save();

            echo "Success!";
        }


        break;


    case 'category-post':

        $category_name = _post('category');


        if($category_name != '')
        {
            $category = new AssetCategory;
            $category->parent_id = 0;
            $category->name = $category_name;
            $category->api_name = '';
            $category->plural = '';
            $category->slug = '';
            $category->prefix = '';
            $category->sl = '';
            $category->save();

        }

        break;


    case 'modal_asset':

        view('modal_asset',[

        ]);

        break;

    case 'schema':

        $script = '<script>
    $(function() {
        var delay = 10000;
        var $serverResponse = $("#serverResponse");
        var interval = setInterval(function(){
   $serverResponse.append(\'.\');
}, 500);
        
        setTimeout(function(){ window.location = \''.U.'assets/list\'; }, delay);
    });
</script>';

        if(db_table_exist('assets')){
            HtmlCanvas::createTerminal('Already updated!',$script);
            exit;
        }

        $message = 'Updating scehma to support assets... '.PHP_EOL;

        ORM::execute('CREATE TABLE `assets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `asset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_purchased` date DEFAULT NULL,
  `supported_until` date DEFAULT NULL,
  `price` decimal(16,4) DEFAULT NULL,
  `depreciation` decimal(16,4) DEFAULT NULL,
  `serial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `category_id` int(10) unsigned DEFAULT NULL,
  `employee_id` int(10) unsigned DEFAULT NULL,
  `contact_id` int(10) unsigned DEFAULT NULL,
  `location_id` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');

        ORM::execute('CREATE TABLE `asset_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL DEFAULT \'0\',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT \'1\',
  `is_default` tinyint(1) NOT NULL DEFAULT \'0\',
  `sort_order` int(10) unsigned NOT NULL DEFAULT \'1\',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');

        $message .= 'Tables were created...'.PHP_EOL;

        $message .= '---------------------------'.PHP_EOL;
        $message .= 'Redirecting, please wait...';





        HtmlCanvas::createTerminal($message,$script);



        break;

    default:
        echo 'action not defined';
}