<?php
Class Leads{

    public static function display_all(){

    }

    public static function create($data=array()){


        $msg = '';

        $today = date('Y-m-d H:i:s');



        if(!isset($data['last_name']) || ($data['last_name'] == '')){

            $msg .= 'Last Name is required.';

        }


        if($msg == ''){

            $d = ORM::for_table('crm_leads')->create();

            if(isset($data['status']) && $data['status'] != ''){
                $d->status = $data['status'];
            }

            if(isset($data['oid']) && $data['oid'] != ''){
                $d->oid = $data['oid'];
                $d->o = getAdminName($data['oid']);

            }

            if(isset($data['salutation']) && $data['salutation'] != '' && $data['salutation'] != 'None'){
                $d->salutation = $data['salutation'];
            }

            if(isset($data['first_name']) && $data['first_name'] != ''){
                $d->first_name = $data['first_name'];
            }

            if(isset($data['middle_name']) && $data['middle_name'] != ''){
                $d->middle_name = $data['middle_name'];
            }

            if(isset($data['last_name']) && $data['last_name'] != ''){
                $d->last_name = $data['last_name'];
            }

            if(isset($data['suffix']) && $data['suffix'] != ''){
                $d->suffix = $data['suffix'];
            }

            if(isset($data['title']) && $data['title'] != ''){
                $d->title = $data['title'];
            }

//            if(isset($data['company_id']) && $data['company_id'] != ''){
//                $d->company_id = $data['company_id'];
//                $d->company = getCompanyName($data['company_id']);
//            }

            if (isset($data['company']) && $data['company'] != '') {

                if(is_numeric($data['company']))
                {
                    $company_find = Company::find($data['company']);

                    if($company_find)
                    {
                        $d->company = $company_find->company_name;
                        $d->company_id = $company_find->id;
                    }
                }


            }

            if(isset($data['website']) && $data['website'] != ''){
                $d->website = $data['website'];
            }

            if(isset($data['industry']) && $data['industry'] != ''){
                $d->industry = $data['industry'];
            }

            if(isset($data['employees']) && $data['employees'] != ''){
                $d->employees = $data['employees'];
            }

            if(isset($data['email'])){
                $d->email = $data['email'];
            }

            if(isset($data['phone']) && $data['phone'] != ''){
                $d->phone = $data['phone'];
            }

            if(isset($data['color']) && $data['color'] != ''){
                $d->color = $data['color'];
            }

            if(isset($data['source']) && $data['source'] != ''){
                $d->source = $data['source'];
            }

            if(isset($data['mobile']) && $data['mobile'] != ''){
                $d->mobile = $data['mobile'];
            }

            if(isset($data['added_from']) && $data['added_from'] != ''){
                $d->added_from = $data['added_from'];
            }

            if(isset($data['address']) && $data['address'] != ''){
                $d->address = $data['address'];
            }

            if(isset($data['street']) && $data['street'] != ''){
                $d->street = $data['street'];
            }

            if(isset($data['city']) && $data['city'] != ''){
                $d->city = $data['city'];
            }

            if(isset($data['state']) && $data['state'] != ''){
                $d->state = $data['state'];
            }

            if(isset($data['zip']) && $data['zip'] != ''){
                $d->zip = $data['zip'];
            }

            if(isset($data['country']) && $data['country'] != ''){
                $d->country = $data['country'];
            }

            if(isset($data['public']) && $data['public'] != ''){
                $d->public = $data['public'];
            }

            if(isset($data['memo']) && $data['memo'] != ''){
                $d->memo = $data['memo'];
            }

            if(isset($_SESSION['uid'])){
                $a = db_find_one('sys_users',$_SESSION['uid']);
                $d->aid = $a->id;
                $d->created_by = $a->fullname;

            }

            $d->created_at = $today;
            $d->updated_at = $today;


            $d->save();

            return $d->id;


        }

        else{

            return $msg;

        }


    }


    public static function convertToCustomer($lead_id){

        // find the lead

        $lead = ORM::for_table('crm_leads')->find_one($lead_id);

        if($lead){

            $data = array();

            $data['account'] = $lead->salutation.' '. $lead->first_name.' '. $lead->middle_name.' '. $lead->last_name;
            $data['phone'] = $lead->phone;
            $data['email'] = $lead->email;
            $data['address'] = $lead->street;
            $data['city'] = $lead->city;
            $data['zip'] = $lead->zip;
            $data['state'] = $lead->state;
            $data['country'] = $lead->country;
            $data['company'] = $lead->company;

            return Contacts::add($data);


        }

        else{

            return 'Lead not Found.';
        }


    }


    public static function updateMemo($lead_id,$memo){
        $lead = ORM::for_table('crm_leads')->find_one($lead_id);

        if($lead){

            $lead->memo = $memo;
            $lead->save();

        }


        return 'Data Updated';

    }


    public static function update($lead_id,$data){

        $d = ORM::for_table('crm_leads')->find_one($lead_id);

        $msg = '';


        if($d) {

            $today = date('Y-m-d H:i:s');

            if (!isset($data['last_name']) || ($data['last_name'] == '')) {

                $msg .= 'Last Name is required.';

            }


            if ($msg == '') {


                if (isset($data['status']) && $data['status'] != '') {
                    $d->status = $data['status'];
                }

                if (isset($data['oid']) && $data['oid'] != '') {
                    $d->oid = $data['oid'];
                    $d->o = getAdminName($data['oid']);

                }

                if (isset($data['salutation']) && $data['salutation'] != '' && $data['salutation'] != 'None') {
                    $d->salutation = $data['salutation'];
                }

                if (isset($data['first_name']) && $data['first_name'] != '') {
                    $d->first_name = $data['first_name'];
                }

                if (isset($data['middle_name']) && $data['middle_name'] != '') {
                    $d->middle_name = $data['middle_name'];
                }

                if (isset($data['last_name']) && $data['last_name'] != '') {
                    $d->last_name = $data['last_name'];
                }

                if (isset($data['suffix']) && $data['suffix'] != '') {
                    $d->suffix = $data['suffix'];
                }

                if (isset($data['title']) && $data['title'] != '') {
                    $d->title = $data['title'];
                }

                

                if (isset($data['company']) && $data['company'] != '') {

                    if(is_numeric($data['company']))
                    {
                        $company_find = Company::find($data['company']);

                        if($company_find)
                        {
                            $d->company = $company_find->company_name;
                            $d->company_id = $company_find->id;
                        }
                    }


                }

                if (isset($data['website']) && $data['website'] != '') {
                    $d->website = $data['website'];
                }

                if (isset($data['industry']) && $data['industry'] != '') {
                    $d->industry = $data['industry'];
                }

                if (isset($data['employees']) && $data['employees'] != '') {
                    $d->employees = $data['employees'];
                }

                if (isset($data['email']) && $data['email'] != '') {
                    $d->email = $data['email'];
                }

                if (isset($data['phone']) && $data['phone'] != '') {
                    $d->phone = $data['phone'];
                }

                if (isset($data['color']) && $data['color'] != '') {
                    $d->color = $data['color'];
                }

                if (isset($data['source']) && $data['source'] != '') {
                    $d->source = $data['source'];
                }

                if (isset($data['mobile']) && $data['mobile'] != '') {
                    $d->mobile = $data['mobile'];
                }

                if (isset($data['added_from']) && $data['added_from'] != '') {
                    $d->added_from = $data['added_from'];
                }

                if (isset($data['address']) && $data['address'] != '') {
                    $d->address = $data['address'];
                }

                if (isset($data['street']) && $data['street'] != '') {
                    $d->street = $data['street'];
                }

                if (isset($data['city']) && $data['city'] != '') {
                    $d->city = $data['city'];
                }

                if (isset($data['state']) && $data['state'] != '') {
                    $d->state = $data['state'];
                }

                if (isset($data['zip']) && $data['zip'] != '') {
                    $d->zip = $data['zip'];
                }

                if (isset($data['country']) && $data['country'] != '') {
                    $d->country = $data['country'];
                }

                if (isset($data['public']) && $data['public'] != '') {
                    $d->public = $data['public'];
                }

                if (isset($data['memo']) && $data['memo'] != '') {
                    $d->memo = $data['memo'];
                }


                $d->updated_at = $today;


                $d->save();

                return $d->id;

            }

            else{

                return $msg;

            }


        }

        else{

            return 'Lead Not Found.';

        }




    }


}