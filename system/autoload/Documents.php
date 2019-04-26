<?php
Class Documents{

    public static function assign($path,$title='',$is_global='0',$rid='',$rtype=''){

        if($is_global != '1'){
            $is_global = '0';
        }

        $ext = pathinfo($path, PATHINFO_EXTENSION);


        $token = Ib_Str::random_string(30);

        if($title == '' || $path == ''){


            return false;

        }



        $d = ORM::for_table('sys_documents')->create();
        $d->title = $title;
        $d->file_path = $path;
        $d->file_dl_token = $token;
        $d->file_mime_type = $ext;
        $d->created_at = date('Y-m-d H:i:s');
        $d->is_global = $is_global;
        $d->save();

        $did = $d->id();

        // check relation is posted




        if($rid != '' && $rtype != '' ){

            $r = ORM::for_table('ib_doc_rel')->create();

            $r->rtype = $rtype;
            $r->rid = $rid;
            $r->did = $did;

            $r->save();

        }

        //

        return $did;


    }

}