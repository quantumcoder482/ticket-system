<?php
Class Tasks{

    public static function create($data){

        $today = date('Y-m-d H:i:s');

        if(!isset($data['title'])){
            return false;
        }

        $task_id = '';

        if(isset($data['task_id'])){
            $task_id = $data['task_id'];
        }

        $d = false;

        if($task_id != ''){
            $d = ORM::for_table('sys_tasks')->find_one($task_id);
        }



        if(!$d){
            $d = ORM::for_table('sys_tasks')->create();
        }

        $d->title = $data['title'];

        if(isset($data['rel_type'])){
            $d->rel_type = $data['rel_type'];
        }

        if(isset($data['description'])){
            $d->description = $data['description'];
        }

        if(isset($data['rel_id'])){
            $d->rel_id = $data['rel_id'];
        }


        if(isset($data['cid']) && $data['cid'] != '')
        {
            $d->cid = $data['cid'];
        }

        if(isset($data['tid']))
        {
            $d->tid = $data['tid'];
        }

        if(isset($data['start_date']) && $data['start_date'] != ''){
            $d->started = $data['start_date'];
        }

        if(isset($data['due_date']) && $data['due_date'] != ''){
            $d->due_date = $data['due_date'];
        }
        else{
            $d->due_date = date('Y-m-d');
        }

        if(isset($data['priority']) && $data['priority'] != '')
        {
            $d->priority = $data['priority'];
        }


        if(isset($data['rel_id'])){
            $d->rel_id = $data['rel_id'];
        }


        if(isset($data['status'])){
            $d->status = $data['status'];
        }
        else{
            $d->status = 'Not Started';
        }

        if(isset($data['aid'])){
            $d->aid = $data['aid'];

            $admin = ORM::for_table('sys_users')->find_one($data['aid']);

            if($admin){

                $d->created_by = $admin->fullname;

            }

        }

        $d->created_at = $today;


        $d->save();

        return $d->id;


    }

}