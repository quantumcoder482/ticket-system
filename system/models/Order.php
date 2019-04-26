<?php
use Illuminate\Database\Eloquent\Model;

class Order extends Model{

    protected $table = 'sys_orders';

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






                //  $pid = _post('pid');
                //  $cid = _post('cid');
                $status = 'Pending';
                //  $billing_cycle = _post('billing_cycle');

                //  $amount = _post('price');
                $amount = $fTotal;



                // find the customer




                $order_number = _raid(10);

                $order = ORM::for_table('sys_orders')->create();

                $order->stitle = '';
                $order->pid = 0;
                $order->cid = $cid;
                $order->cname = $u->account;
                $order->date_added = $today;
                $order->amount = $amount;
                $order->ordernum = $order_number;
                $order->status = $status;
                $order->billing_cycle = 'One Time';
                $order->iid = 0;
                $order->save();

                $order_id =  $order->id();





                $current_items = $cart->items;
                $current_items_d = json_decode($current_items,true);

                foreach ($current_items_d as $e_i){



                    $order_item = new OrderItem;

                    $order_item->customer_id = $u->id;
                    $order_item->order_id = $order_id;
                    $order_item->item_name = $e_i['name'];
                    $order_item->quantity = $e_i['qty'];
                    $order_item->unit_price = $e_i['price'];
                    $order_item->total = $e_i['price']*$e_i['qty'];

                    $order_item->save();






                }


                $cart->delete();

                $o = [
                    'id' => $order_id,
                    'order_number' => $order_number
                ];

                return $o;

            }

        }

        return false;

    }

}