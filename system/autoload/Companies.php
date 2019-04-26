<?php
Class Companies{

    public static function countInvoices($company_id){

        $ret = '0';

        $customers = Contacts::findByCompany($company_id);

        if($customers){
            $ret = ORM::for_table('sys_invoices')->where_in('userid',$customers)->count();
            if($ret == ''){
                $ret = '0';
            }
        }

        return $ret;

    }

    public static function countQuotes($company_id){

        $ret = '0';

        $customers = Contacts::findByCompany($company_id);

        if($customers){
            $ret = ORM::for_table('sys_quotes')->where_in('userid',$customers)->count();
            if($ret == ''){
                $ret = '0';
            }
        }

        return $ret;

    }


    public static function countOrders($company_id){

        $ret = '0';

        $customers = Contacts::findByCompany($company_id);

        if($customers){
            $ret = ORM::for_table('sys_orders')->where_in('cid',$customers)->count();
            if($ret == ''){
                $ret = '0';
            }
        }

        return $ret;

    }


    public static function countTransactions($company_id){

        $ret = '0';

        $customers = Contacts::findByCompany($company_id);

        if($customers){
            $c_payer = ORM::for_table('sys_transactions')->where_in('payerid',$customers)->count();
            if($c_payer == ''){
                $c_payer = '0';
            }

            $c_payeeid = ORM::for_table('sys_transactions')->where_in('payeeid',$customers)->count();
            if($c_payeeid == ''){
                $c_payeeid = '0';
            }

            $ret = $c_payer+$c_payeeid;

        }

        return $ret;

    }


    public static function countCustomers($company_id){

        $ret = '0';

        $customers = Contacts::findByCompany($company_id);

        if($customers){
            $ret = count($customers);
        }

        return $ret;

    }


    public static function countDocuments($company_id){

        $ret = '0';

        $customers = Contacts::findByCompany($company_id);

        if($customers){
            $ret = ORM::for_table('sys_documents')->where_in('cid',$customers)->count();
            if($ret == ''){
                $ret = '0';
            }
        }

        return $ret;

    }


}