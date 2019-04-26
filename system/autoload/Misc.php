<?php
Class Misc{

    public static function check_permission_by_role_id($rid,$pid,$action){

        $d = ORM::for_table('sys_staffpermissions')->where('rid',$rid)->where('pid',$pid)->find_one();




        if($d){

            switch ($action){

                case 'view':

                    if($d->can_view == 1){
                    return true;
                    }
                    else{
                        return false;
                    }

                    break;

                case 'edit':

                    if($d->can_edit == 1){
                        return true;
                    }
                    else{
                        return false;
                    }

                    break;

                case 'create':

                    if($d->can_create == 1){
                        return true;
                    }
                    else{
                        return false;
                    }

                    break;

                case 'delete':

                    if($d->can_delete == 1){
                        return true;
                    }
                    else{
                        return false;
                    }

                    break;

                case 'all_data':

                    if($d->all_data == 1){
                        return true;
                    }
                    else{
                        return false;
                    }

                    break;

                default:
                    return false;
            }

        }
        else{
            return false;
        }

    }

}