<?php

Class Dashboard{

    public static function dataLastTwelveMonthsIncExp(){

        global $user;

        $all_data = true;
        if (!has_access($user->roleid, 'transactions', 'all_data')) {
            $all_data = false;
        }

        $months = array();

        global $_L;

        for ($i = 1; $i <= 11; $i++) {
            $months[] = date("M Y", strtotime( date( 'Y-m-01' )." -$i months"));
        }

        $months = array_reverse($months);

        $months[12] = date("M Y", strtotime( date( 'Y-m-01' )));


        $inc = array();
        $exp = array();
        $m = array();

        foreach($months as $month){

            $d_array = explode(' ',$month);

            $m_short = '';

            if(isset($d_array['0']))
            {
                $m_short = $d_array[0];
            }

            if(isset($_L[$m_short]))
            {
                $m_short = $_L[$m_short];
            }

            $y = '';
            if(isset($d_array[1]))
            {
                $y = $d_array[1];
            }



            $m[] = $m_short.' '.$y;

        }


        $i = 0;

        foreach($months as $month){

            $first_day_this_month = date("Y-m-d", strtotime("first day of $month"));
            $last_day_this_month = date("Y-m-d", strtotime("last day of $month"));


            $x = ORM::for_table('sys_transactions')->where('type','Income')->where_gte('date',$first_day_this_month)->where_lte('date',$last_day_this_month);

            if(!$all_data)
            {
                $x->where('aid',$user->id);
            }

            $inc[] = $x->sum('cr');


            if($inc[$i] == ''){
                $inc[$i] = '0.00';
            }

            $i++;

        }

        $i = 0;

        foreach($months as $month){

            $first_day_this_month = date("Y-m-d", strtotime("first day of $month"));
            $last_day_this_month = date("Y-m-d", strtotime("last day of $month"));


            $x = ORM::for_table('sys_transactions')->where('type','Expense')->where_gte('date',$first_day_this_month)->where_lte('date',$last_day_this_month);

            if(!$all_data)
            {
                $x->where('aid',$user->id);
            }

            $exp[] = $x->sum('dr');

            if($exp[$i] == ''){
                $exp[$i] = '0.00';
            }

            $i++;



        }

        $data = array(
            'Months' => $m,
            'Income' => $inc,
            'Expense' => $exp
        );


        return $data;


    }


    public static function dataIncExpD($select){

        global $user;

        $all_data = true;
        if (!has_access($user->roleid, 'transactions', 'all_data')) {
            $all_data = false;
        }

        $inc = array();
        $exp = array();

        $i = 1;

        for ($i = 0; $i <= 31; $i++) {

            $d_i = $i;
            $date_string = str_pad($d_i,2,'0',STR_PAD_LEFT);
            $d1 = date("Y-m-$date_string");

            $x = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d1);
            if(!$all_data)
            {
                $x->where('aid',$user->id);
            }
            $d1i = $x->sum('cr');
            if($d1i == ''){
                $d1i = '0.00';
            }

            $inc[] = $d1i;

            $x = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d1);
            if(!$all_data)
            {
                $x->where('aid',$user->id);
            }
            $d1e = $x->sum('dr');
            if($d1e == ''){
                $d1e = '0.00';
            }

            $exp[] = $d1e;

        }







//        $d1e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d1)->sum('dr');
//        if($d1e == ''){
//            $d1e = '0.00';
//        }
//
//
//        $d2 = date('Y-m-02');
//        $d2i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d2)->sum('cr');
//        if($d2i == ''){
//            $d2i = '0.00';
//        }
//
//
//
//        $d2e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d2)->sum('dr');
//        if($d2e == ''){
//            $d2e = '0.00';
//        }
//
//        $d3 = date('Y-m-03');
//        $d3i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d3)->sum('cr');
//        if($d3i == ''){
//            $d3i = '0.00';
//        }
//
//
//
//
//        $d3e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d3)->sum('dr');
//        if($d3e == ''){
//            $d3e = '0.00';
//        }
//
//        $d4 = date('Y-m-04');
//        $d4i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d4)->sum('cr');
//        if($d4i == ''){
//            $d4i = '0.00';
//        }
//
//
//
//        $d4e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d4)->sum('dr');
//        if($d4e == ''){
//            $d4e = '0.00';
//        }
//
//
//        $d5 = date('Y-m-05');
//        $d5i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d5)->sum('cr');
//        if($d5i == ''){
//            $d5i = '0.00';
//        }
//
//
//
//        $d5e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d5)->sum('dr');
//        if($d5e == ''){
//            $d5e = '0.00';
//        }
//
//        $d6 = date('Y-m-06');
//        $d6i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d6)->sum('cr');
//        if($d6i == ''){
//            $d6i = '0.00';
//        }
//
//
//
//        $d6e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d6)->sum('dr');
//        if($d6e == ''){
//            $d6e = '0.00';
//        }
//
//        $d7 = date('Y-m-07');
//        $d7i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d7)->sum('cr');
//        if($d7i == ''){
//            $d7i = '0.00';
//        }
//
//
//
//        $d7e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d7)->sum('dr');
//        if($d7e == ''){
//            $d7e = '0.00';
//        }
//
//        $d8 = date('Y-m-08');
//        $d8i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d8)->sum('cr');
//        if($d8i == ''){
//            $d8i = '0.00';
//        }
//
//
//
//        $d8e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d8)->sum('dr');
//        if($d8e == ''){
//            $d8e = '0.00';
//        }
//
//
//        $d9 = date('Y-m-09');
//        $d9i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d9)->sum('cr');
//        if($d9i == ''){
//            $d9i = '0.00';
//        }
//
//
//
//        $d9e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d9)->sum('dr');
//        if($d9e == ''){
//            $d9e = '0.00';
//        }
//
//        $d10 = date('Y-m-10');
//        $d10i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d10)->sum('cr');
//        if($d10i == ''){
//            $d10i = '0.00';
//        }
//
//
//
//        $d10e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d10)->sum('dr');
//        if($d10e == ''){
//            $d10e = '0.00';
//        }
//
//
//        $d11 = date('Y-m-11');
//        $d11i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d11)->sum('cr');
//        if($d11i == ''){
//            $d11i = '0.00';
//        }
//
//
//
//
//        $d11e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d11)->sum('dr');
//        if($d11e == ''){
//            $d11e = '0.00';
//        }
//
//
//
//
//        $d12 = date('Y-m-12');
//        $d12i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d12)->sum('cr');
//        if($d12i == ''){
//            $d12i = '0.00';
//        }
//
//
//
//
//        $d12e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d12)->sum('dr');
//        if($d12e == ''){
//            $d12e = '0.00';
//        }
//
//
//        $d13 = date('Y-m-13');
//        $d13i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d13)->sum('cr');
//        if($d13i == ''){
//            $d13i = '0.00';
//        }
//
//
//
//
//        $d13e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d13)->sum('dr');
//        if($d13e == ''){
//            $d13e = '0.00';
//        }
//
//
//        $d14 = date('Y-m-14');
//        $d14i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d14)->sum('cr');
//        if($d14i == ''){
//            $d14i = '0.00';
//        }
//
//
//
//
//        $d14e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d14)->sum('dr');
//        if($d14e == ''){
//            $d14e = '0.00';
//        }
//
//
//
//
//        $d15 = date('Y-m-15');
//        $d15i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d15)->sum('cr');
//        if($d15i == ''){
//            $d15i = '0.00';
//        }
//
//
//
//
//        $d15e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d15)->sum('dr');
//        if($d15e == ''){
//            $d15e = '0.00';
//        }
//
//
//        $d16 = date('Y-m-16');
//        $d16i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d16)->sum('cr');
//        if($d16i == ''){
//            $d16i = '0.00';
//        }
//
//
//
//        $d16e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d16)->sum('dr');
//        if($d16e == ''){
//            $d16e = '0.00';
//        }
//
//        $d17 = date('Y-m-17');
//        $d17i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d17)->sum('cr');
//        if($d17i == ''){
//            $d17i = '0.00';
//        }
//
//
//
//        $d17e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d17)->sum('dr');
//        if($d17e == ''){
//            $d17e = '0.00';
//        }
//
//        $d18 = date('Y-m-18');
//        $d18i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d18)->sum('cr');
//        if($d18i == ''){
//            $d18i = '0.00';
//        }
//
//
//
//
//        $d18e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d18)->sum('dr');
//        if($d18e == ''){
//            $d18e = '0.00';
//        }
//
//        $d19 = date('Y-m-19');
//        $d19i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d19)->sum('cr');
//        if($d19i == ''){
//            $d19i = '0.00';
//        }
//
//
//
//
//        $d19e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d19)->sum('dr');
//        if($d19e == ''){
//            $d19e = '0.00';
//        }
//
//
//        $d20 = date('Y-m-20');
//        $d20i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d20)->sum('cr');
//        if($d20i == ''){
//            $d20i = '0.00';
//        }
//
//
//
//
//        $d20e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d20)->sum('dr');
//        if($d20e == ''){
//            $d20e = '0.00';
//        }
//
//
//
//        $d21 = date('Y-m-21');
//        $d21i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d21)->sum('cr');
//        if($d21i == ''){
//            $d21i = '0.00';
//        }
//
//
//
//
//        $d21e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d21)->sum('dr');
//        if($d21e == ''){
//            $d21e = '0.00';
//        }
//
//        $d22 = date('Y-m-22');
//        $d22i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d22)->sum('cr');
//        if($d22i == ''){
//            $d22i = '0.00';
//        }
//        $d22e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d22)->sum('dr');
//        if($d22e == ''){
//            $d22e = '0.00';
//        }
//
//        $d23 = date('Y-m-23');
//        $d23i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d23)->sum('cr');
//        if($d23i == ''){
//            $d23i = '0.00';
//        }
//
//
//
//        $d23e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d23)->sum('dr');
//        if($d23e == ''){
//            $d23e = '0.00';
//        }
//
//        $d24 = date('Y-m-24');
//        $d24i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d24)->sum('cr');
//        if($d24i == ''){
//            $d24i = '0.00';
//        }
//
//
//
//
//        $d24e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d24)->sum('dr');
//        if($d24e == ''){
//            $d24e = '0.00';
//        }
//
//        $d25 = date('Y-m-25');
//        $d25i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d25)->sum('cr');
//        if($d25i == ''){
//            $d25i = '0.00';
//        }
//
//
//
//
//        $d25e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d25)->sum('dr');
//        if($d25e == ''){
//            $d25e = '0.00';
//        }
//
//        $d26 = date('Y-m-26');
//        $d26i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d26)->sum('cr');
//        if($d26i == ''){
//            $d26i = '0.00';
//        }
//
//
//
//
//        $d26e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d26)->sum('dr');
//        if($d26e == ''){
//            $d26e = '0.00';
//        }
//
//        $d27 = date('Y-m-27');
//        $d27i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d27)->sum('cr');
//        if($d27i == ''){
//            $d27i = '0.00';
//        }
//
//
//
//
//        $d27e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d27)->sum('dr');
//        if($d27e == ''){
//            $d27e = '0.00';
//        }
//
//
//        $d28 = date('Y-m-28');
//        $d28i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d28)->sum('cr');
//        if($d28i == ''){
//            $d28i = '0.00';
//        }
//
//
//
//
//        $d28e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d28)->sum('dr');
//        if($d28e == ''){
//            $d28e = '0.00';
//        }
//
//        $d29 = date('Y-m-29');
//        $d29i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d29)->sum('cr');
//        if($d29i == ''){
//            $d29i = '0.00';
//        }
//
//
//
//
//        $d29e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d29)->sum('dr');
//        if($d29e == ''){
//            $d29e = '0.00';
//        }
//
//        $d30 = date('Y-m-30');
//        $d30i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d30)->sum('cr');
//        if($d30i == ''){
//            $d30i = '0.00';
//        }
//
//
//
//
//        $d30e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d30)->sum('dr');
//        if($d30e == ''){
//            $d30e = '0.00';
//        }
//
//        $d31 = date('Y-m-31');
//        $d31i = ORM::for_table('sys_transactions')->where('type','Income')->where('date',$d31)->sum('cr');
//        if($d31i == ''){
//            $d31i = '0.00';
//        }
//
//
//
//
//        $d31e = ORM::for_table('sys_transactions')->where('type','Expense')->where('date',$d31)->sum('dr');
//        if($d31e == ''){
//            $d31e = '0.00';
//        }




        $data = array(
            'Income' => $inc,
            'Expense' => $exp
        );


        return $data;


    }


    public static function graphUpdate($user,$config){

        $ib_now = time();
        $ib_u_t = $config['ib_u_t'];
        $msg = '';


        $u_a_m = base64_decode('PGRpdiBjbGFzcz0iYWxlcnQgYWxlcnQtaW5mbyBmYWRlIGluIj48YnV0dG9uIGNsYXNzPSJjbG9zZSIgZGF0YS1kaXNtaXNzPSJhbGVydCIgaWQ9ImdfdG9wIj7DlzwvYnV0dG9uPkFuIFVwZGF0ZSBpcyBhdmFpbGFibGUuIEdvIHRvIFNldHRpbmdzIC0+IEFib3V0IHRvIFVwZGF0ZSBMYXRlc3QgVmVyc2lvbi48L2Rpdj4=');

        if($ib_u_t < $ib_now) {

            update_option('ib_u_t', $ib_now+86400);

            $raw = '';
            $p = base64_decode('cHVyY2hhc2VfY29kZQ==');

            $arr = array(
                'app_url' => APP_URL,
                'fullname' => $user->fullname,
                'email' => $user->username,
                'build' => $config['build'],
                $p => $config[$p]
            );


            $res = updateCheck($config['purchase_key']);

            if($res['update_available'] == 'Yes'){

            }
            else{

            }


            try{



               // $raw = ib_http_request('https://www.stackpi.com/update-check','POST',$arr);
                $raw = ib_http_request('http://www.stackpi.dev/update-check','POST',$arr);


            } catch (Exception $e){


//            $msg = $e->getMessage();

            }

            $resp = json_decode($raw);

            if (json_last_error() === JSON_ERROR_NONE) {

                if(isset($resp->build)){

                    $remote_build = $resp->build;


                    if(($config['build']) < $remote_build){


                        $msg = $u_a_m;
                        update_option('ib_u_a', '1');


                    }

                }

            }
            else{

            }
        }
        elseif ($config['ib_u_a'] == '1'){
            $msg = $u_a_m;
        }
        else{

        }

//        else{
//            $msg = 'Unable to Connect Update Server';
//        }


        $a = array(
            'msg' => $msg
        );


        return $a;





    }

    public static function dataIncVsExp($month=''){

        $mdate = date('Y-m-d');

        if($month == ''){
            $first_day_month = date('Y-m-01');
        }
        else{
            $first_day_month = $month;
        }

        $mi = ORM::for_table('sys_transactions')->where('type','Income')->where_gte('date',$first_day_month)->where_lte('date',$mdate)->sum('cr');
        if($mi == ''){
            $mi = '0.00';
        }

        $me = ORM::for_table('sys_transactions')->where('type','Expense')->where_gte('date',$first_day_month)->where_lte('date',$mdate)->sum('dr');
        if($me == ''){
            $me = '0.00';
        }


        return array(
            'Income' => $mi,
            'Expense' => $me
        );


    }



}