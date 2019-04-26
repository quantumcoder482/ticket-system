<?php

/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/


$ui->assign('_application_menu', 'accounts');
$ui->assign('_title', $_L['Store'].'- '. $config['CompanyName']);
$ui->assign('_st', $_L['Accounts']);
$action = $routes['1'];





switch ($action) {


    case 'add':

        $id = route(2);

        $added = Cart::addItem($id);

        r2(U.'cart/view/');


        break;

    case 'remove':

        $id = route(2);

        $removed = Cart::removeItem($id);

        r2(U.'cart/view/');

        break;

    case 'delete':

        $id = route(2);

        $deleted = Cart::deleteItem($id);

        r2(U.'cart/view/');

        break;


    case 'view':

        $ui->assign('cart',Cart::details());
        $ui->assign('items',Cart::items());
        view('cart_view');

        break;


    case 'clear':

        Cart::clearItems();
        r2(U.'client/new-order/');

        break;


    case 'checkout':



        if($config['order_method'] == 'create_invoice_later'){


            $order = Order::fromCart();

            if($order){
                r2(U.'client/order_view/'.$order['id'].'/'.$order['order_number'],'s','Thank you. Your order has been placed.');
            }

            else{
                r2(U.'client/orders');
            }

        }

        else{
            $iid = Invoice::fromCart();

            if($iid){
                $d = ORM::for_table('sys_invoices')->find_one($iid);
                $vtoken = $d->vtoken;
                r2(U.'client/iview/'.$iid.'/token_'.$vtoken);
            }

            else{
                r2(U.'client/login/');
            }
        }





        break;





    case 's':

        is_dev();

        $t = new Schema('sys_cart');
        $t->add('secret','varchar',100);
        $t->add('items');
        $t->add('total','decimal','16,2','0.00');
        $t->add('discount','decimal','16,2','0.00');
        $t->add('ip','varchar',100);
        $t->add('fullname','varchar',200);
        $t->add('phone','varchar',200);
        $t->add('email','varchar',200);
        $t->add('status','varchar',200);
        $t->add('browser','varchar',200);
        $t->add('country','varchar',200);
        $t->add('currency','varchar',200);
        $t->add('language','varchar',200);
        $t->add('coupon','varchar',200);
        $t->add('lat','varchar',50);
        $t->add('lon','varchar',50);
        $t->add('item_count','int','11','0');
        $t->add('cid','int','11','0');
        $t->add('aid','int','11','0');
        $t->add('lid','int','11','0');
        $t->add('currency_id','int','11','0');
        $t->add('company_id','int','11','0');
        $t->add('created_at','datetime');
        $t->add('updated_at','datetime');
        $t->add('expiry','datetime');
        $t->add('memo');
        $t->save();


        break;






    default:
        echo 'action not defined';
}