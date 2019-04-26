<?php
Class Cart{

    public static function addItem($item_id,$qty=1){


        $cart_create = false;
        // check item is exist

        $item = ORM::for_table('sys_items')->find_one($item_id);

        if($item){

            $cid = '0';
            $ib_ct = false;

            $ip = get_client_ip();

            $today = date('Y-m-d H:i:s');

            if(isset($_COOKIE['ib_ct'])) {

                $ib_ct = $_COOKIE['ib_ct'];


            }

            elseif (isset($_SESSION['ib_ct'])){



                $ib_ct = $_SESSION['ib_ct'];

            }

            else{

                $cid = '0';

            }

            if($ib_ct){

                $d = ORM::for_table('crm_accounts')->where('token',$ib_ct)->find_one();

                if($d){

                    $cid = $d->id;

                }
            }



            //check cart cookie is exist

            if(isset($_COOKIE['ib_cart_secret'])) {

               $secret = $_COOKIE['ib_cart_secret'];

                // check cart exist

                $cart = ORM::for_table('sys_cart')->where('secret',$secret)->find_one();

                if($cart){

                    $cart_create = false;

                    setcookie('ib_cart_secret', $secret, time() + (86400 * 30), "/");
                    $current_items = $cart->items;
                    $current_items_d = json_decode($current_items,true);

                    // check item id exist

                    $e_found = false;

                    $items = array();

                    $i = 0;

                    $item_added = false;

                    $total = 0.00;



                    foreach ($current_items_d as $e_i){

                        $e_qty = $e_i['qty'];

                        $items[$i]['id'] = $e_i['id'];

                        $items[$i]['name'] = $e_i['name'];
                        $items[$i]['price'] = $e_i['price'];

                        if($e_i['id'] == $item_id){

                            // found
                            $items[$i]['qty'] = $e_qty+$qty;

                            $item_added = true;

                        }

                        else{

                            $items[$i]['qty'] = $e_qty;



                        }

                        $total += ($items[$i]['price'])*($items[$i]['qty']);


                        $i++;
                    }




                    if(!$item_added){

                        // add the item
                        $items[$i]['id'] = $item_id;
                        $items[$i]['name'] = $item->name;
                        $items[$i]['price'] = $item->sales_price;
                        $items[$i]['qty'] = $qty;
                        $total += ($item->sales_price)*$qty;



                    }

                    else{

//                        $item_count = $cart->item_count;

                    }

                    $items_json = json_encode($items);

                    $cart->items = $items_json;
                    $cart->total = $total;


                    $cart->ip = $ip;
                    $cart->cid = $cid;




                    $cart->updated_at = $today;

                    $cart->item_count = ($cart->item_count)+$qty;

                    $cart->save();

                    return $secret;



                }

                $cart_create = true;

            }

            $cart_create = true;

           if($cart_create){

               $secret = Ib_Str::random_string(20).md5(time());

               $cart = ORM::for_table('sys_cart')->create();

               $items = array();

               $items[0]['id'] = $item_id;
               $items[0]['name'] = $item->name;
               $items[0]['price'] = $item->sales_price;
               $items[0]['qty'] = $qty;

               $items_json = json_encode($items);

               $cart->items = $items_json;

               $cart->total = ($item->sales_price)*$qty;

               setcookie('ib_cart_secret', $secret, time() + (86400 * 30), "/");

               $cart->secret = $secret;

               $cart->item_count = $qty;

               $cart->ip = $ip;

               $cart->created_at = $today;
               $cart->updated_at = $today;

               $cart->cid = $cid;

               $cart->save();

               return $secret;

           }


            return false;

        }

        else{

            return false;

        }

    }

    public static function removeItem($item_id,$qty=1){

        if(isset($_COOKIE['ib_cart_secret'])) {

            $secret = $_COOKIE['ib_cart_secret'];

            $cart = ORM::for_table('sys_cart')->where('secret', $secret)->find_one();

            if ($cart) {

                $today = date('Y-m-d H:i:s');

                $current_items = $cart->items;
                $current_items_d = json_decode($current_items,true);

                $items = array();

                $i = 0;


                $total = 0.00;
                foreach ($current_items_d as $e_i){

                    $e_qty = $e_i['qty'];

                    if($e_i['id'] == $item_id){

                        $qty_check = $e_qty-$qty;

                        if($qty_check != 0){

                            $items[$i]['id'] = $e_i['id'];

                            $items[$i]['name'] = $e_i['name'];
                            $items[$i]['price'] = $e_i['price'];

                            $items[$i]['qty'] = $qty_check;

                        }


                    }

                    else{



                        $items[$i]['id'] = $e_i['id'];

                        $items[$i]['name'] = $e_i['name'];
                        $items[$i]['price'] = $e_i['price'];

                        $items[$i]['qty'] = $e_qty;

                    }

                    $total += ($items[$i]['price'])*($items[$i]['qty']);


                    $i++;
                }


                $items_json = json_encode($items);

                $cart->items = $items_json;
                $cart->total = $total;


                $cart->updated_at = $today;

                $cart->item_count = ($cart->item_count)-$qty;

                $cart->save();

                return $secret;

            }

            return false;

        }

        return false;

    }

    public static function deleteItem($item_id){

        if(isset($_COOKIE['ib_cart_secret'])) {

            $secret = $_COOKIE['ib_cart_secret'];

            $cart = ORM::for_table('sys_cart')->where('secret', $secret)->find_one();

            if ($cart) {

                $today = date('Y-m-d H:i:s');

                $current_items = $cart->items;
                $current_items_d = json_decode($current_items,true);

                $items = array();

                $i = 0;


                $total = 0.00;

                $decrease_qty = 0;

                foreach ($current_items_d as $e_i){

                    if($e_i['id'] != $item_id){
                        $e_qty = $e_i['qty'];
                        $items[$i]['id'] = $e_i['id'];
                        $items[$i]['name'] = $e_i['name'];
                        $items[$i]['price'] = $e_i['price'];
                        $items[$i]['qty'] = $e_qty;
                        $total += ($items[$i]['price'])*($items[$i]['qty']);
                        $i++;
                    }

                    else{
                        $decrease_qty = $e_i['qty'];
                    }



                }


                $items_json = json_encode($items);

                $cart->items = $items_json;
                $cart->total = $total;


                $cart->updated_at = $today;

                $cart->item_count = ($cart->item_count)-$decrease_qty;

                $cart->save();

                return $secret;

            }

            return false;

        }

        return false;

    }

    public static function getItemImage($item_id){

        $item = ORM::for_table('sys_items')->select('image')->find_one($item_id);

        $img = APP_URL.'/ui/lib/imgs/item_placeholder.png"';
        if($item){
            if($item->image != ''){
                $img = APP_URL.'/storage/items/thumb'.$item->image.'"';
            }
        }

        return $img;
    }

    public static function items(){

        $items = array();

        if(isset($_COOKIE['ib_cart_secret'])) {

            $secret = $_COOKIE['ib_cart_secret'];

            // check cart exist

            $cart = ORM::for_table('sys_cart')->where('secret',$secret)->find_one();

            if($cart){
                $current_items = $cart->items;
                $items = json_decode($current_items,true);
            }

        }

        return $items;

    }


    public static function hasItem(){

        if(isset($_COOKIE['ib_cart_secret'])) {

            $secret = $_COOKIE['ib_cart_secret'];

            // check cart exist

            $cart = ORM::for_table('sys_cart')->where('secret',$secret)->find_one();

            if($cart){

                $current_items = $cart->items;
                $current_items_d = json_decode($current_items,true);

                $count = count($current_items_d);

                if($count > 0){
                    return true;
                }


            }

        }

        return false;

    }


    public static function details(){

        if(isset($_COOKIE['ib_cart_secret'])) {

            $secret = $_COOKIE['ib_cart_secret'];

            // check cart exist

            $cart = ORM::for_table('sys_cart')->where('secret',$secret)->find_one();

            if($cart){

                return $cart;

            }

        }

        return false;

    }


    public static function clearItems()
    {
        if(isset($_COOKIE['ib_cart_secret'])) {

            $secret = $_COOKIE['ib_cart_secret'];

            // check cart exist

            $cart = ORM::for_table('sys_cart')->where('secret',$secret)->find_one();

            if($cart){

                $cart->delete();

                return true;

            }

        }

        return false;
    }


}