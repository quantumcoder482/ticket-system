<?php


$slug = route(1);

$ui->assign('_application_menu', 'kb');
$ui->assign('_title', $_L['Knowledgebase'].' - '. $config['CompanyName']);
$ui->assign('_st', $_L['Knowledgebase']);


if($slug == 'a'){


    $user = User::_info();
    $ui->assign('user', $user);

    function kbUniqueSlug($slug){

        $x = 1;



        $d = ORM::for_table('ib_kb')->where('slug',$slug)->find_one();

        if($d){

//        $lat_char = substr($slug, -1);
//
//        if(is_numeric($lat_char)){
//
//            $next = $lat_char+1;
//
//            $slug = substr_replace($slug, $next, -1);
//
//        }

            do {
                $x++;
                $slug = $slug.'-'.$x;
            } while (ORM::for_table('ib_kb')->where('slug',$slug)->find_one() == true);
        }

        return $slug;

    }

    $action = route(2);

    switch ($action){


        case 'edit':

            $ui->assign('kbs',ORM::for_table('ib_kb')->select('id')->order_by_desc('id')->select('title')->limit(10)->find_array());

            $val = array();


            $id = route(3);
            $d = false;
            if($id != ''){
                $d = ORM::for_table('ib_kb')->find_one($id);
            }

            $groups_rel = array();

            if($d){
                $val['title'] = $d->title;
                $val['description'] = $d->description;
                $val['id'] = $d->id;

                $groups_rel_db = ORM::for_table('ib_kb_rel')->where('kbid',$d->id)->find_array();

                foreach ($groups_rel_db as $gr){
                    array_push($groups_rel,$gr['gid']);
                }

            }
            else{
                $val['title'] = '';
                $val['description'] = '';
                $val['id'] = '';
            }

//        $ui->assign('jsvar','
//        _L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
//        _L[\'OK\'] = \''.$_L['OK'].'\';
//        _L[\'Cancel\'] = \''.$_L['Cancel'].'\';
//        ');

            $ui->assign('val',$val);

            $ui->assign('groups_rel',$groups_rel);

            $ui->assign('xfooter',Asset::js(array('tinymce/tinymce.min','js/editor','kb/edit')));

            view('kb_edit');


            break;


        case 'save':



            $title = _post('title');

            $slug = strtolower(Str::clean($title));



            if($title == ''){
                i_close('Title is required.');
            }

            $description = $_POST['description'];






            $id = _post('kbid');



            $nxt = false;
            $create = false;

            if($id == '' || $id == '0'){
                $d = ORM::for_table('ib_kb')->create();
                $nxt = true;
                $create = true;
            }
            else{
                $d = ORM::for_table('ib_kb')->find_one($id);
                if($d){
                    $nxt = true;
                }
            }


            if($nxt){

                $d->status = 'Published';
                $d->title = $title;
                $d->slug = $slug;
                $d->description = $description;

                $d->updated_at = date('Y-m-d H:i:s');

                if($create){
                    $d->created_by = $user->id;
                    $d->created_at = date('Y-m-d H:i:s');

                    $d->views = 0;
                    $d->slug = kbUniqueSlug($slug);

                }

                else{

                    if($slug != $d->slug){
                        $d->slug = kbUniqueSlug($slug);
                    }

                }

                $d->save();

                $kbid = $d->id();

                $del = ORM::for_table('ib_kb_rel')->where('kbid',$kbid)->delete_many();

                if(isset($_POST['groups'])){

                    $groups = $_POST['groups'];

                    foreach ($groups as $group){

                        $gid = str_replace('g_','',$group);



                        if(is_numeric($gid)){


                            $d = ORM::for_table('ib_kb_rel')->create();
                            $d->kbid = $kbid;
                            $d->gid = $gid;
                            $d->save();
                        }



                    }



                }


                echo $kbid;

            }
            else{

                echo 'An Error Occurred';

            }



            break;


        case 'a_view':


            $id = route(3);
            $id = str_replace('k','',$id);

            $d = ORM::for_table('ib_kb')->find_one($id);

            if($d){
                echo '<a class="btn btn-warning" href="'.U.'kb/a/edit/'.$d->id.'"><i class="fa fa-pencil"></i> '.$_L['Edit'].'</a> <button class="btn btn-danger" onclick="deleteKb('.$d->id.')"><i class="fa fa-trash"></i> '.$_L['Delete'].'</button> ';
                echo '<hr>';
                echo $d->description;
            }

            else{
                echo 'Article Not Found';
            }




            break;

        case 'delete':


            $id = route(3);

            $d = ORM::for_table('ib_kb')->find_one($id);

            if($d){
                $d->delete();
            }

            r2(U.'kb/a/all/','s',$_L['Deleted Successfully']);


            break;

        case 'ajax_groups':

            $kbid = route(3);

            $kbm = array();

            if($kbid != '' && $kbid != '0'){

                $g_rel = ORM::for_table('ib_kb_rel')->where('kbid',$kbid)->find_array();

                foreach ($g_rel as $g){
                    array_push($kbm,$g['gid']);
                }

            }


            $groups = ORM::for_table('ib_kb_groups')->order_by_desc('id')->find_array();

            foreach ($groups as $group){

                $checked = '';

                if(in_array($group['id'],$kbm)){
                    $checked = ' checked';
                }

                echo '<div class="checkbox">
                    <label>
                        <input type="checkbox" '.$checked.' class="ib_input_groups" id="g_'.$group['id'].'" name="groups" value="'.$group['id'].'">
                        <strong>'.$group['gname'].'</strong>
                    </label>
                </div>';

            }





            break;

        case 'group_create':

            $gname = _post('gname');

            if($gname != ''){

                $d = ORM::for_table('ib_kb_groups')->create();

                $d->gname = $gname;

                $d->save();

                echo $d->id();

            }

            else{
                echo 'An Error Occurred';
            }



            break;


        case 'all':


            $articles = ORM::for_table('ib_kb')->select('id')->select('title')->find_array();

            $ui->assign('articles',$articles);

            $ui->assign('xfooter',Asset::js(array('js/filtertable','kb/all')));

            view('kb_all');



            break;

        case 's':

            is_dev();

            $t = new Schema('ib_kb');
            $t->add('gid','int',11,0);
            $t->add('gname','varchar',200);
            $t->add('status','varchar',200); // Draft or Published
            $t->add('type','varchar',200); // public or private
            $t->add('groups');
            $t->add('title');
            $t->add('slug');
            $t->add('description');
            $t->add('created_by','int',11,0);
            $t->add('created_at','datetime');
            $t->add('updated_by','int',11,0);
            $t->add('updated_at','datetime');
            $t->add('views','int',11,0);
            $t->add('is_public','int',1,1);
            $t->add('sorder','int',11,0);

            $t->save();

            $t = new Schema('ib_kb_groups');
            $t->add('gname','varchar',200,0);
            $t->add('description');
            $t->add('status','varchar',200);
            $t->add('color','varchar',50);
            $t->add('pid','int',11,0);
            $t->add('sorder','int',11,0);
            $t->save();


            $t = new Schema('ib_kb_replies');
            $t->add('kbid','int',11,0);
            $t->add('cid','int',11,0);
            $t->add('pid','int',11,0);
            $t->add('status','varchar',200);
            $t->add('name','varchar',200);
            $t->add('phone','varchar',200);
            $t->add('email','varchar',200);
            $t->add('website','varchar',200);
            $t->add('ip','varchar',100);
            $t->add('date','date');
            $t->add('reply');
            $t->save();


            $t = new Schema('ib_kb_rel');
            $t->add('kbid','int',11,0);
            $t->add('gid','int',11,0);
            $t->save();


            break;

    }

}

elseif ($slug == 'c'){

    $action = route(2,'all');

    switch ($action){

        case 'all':

            $c = Contacts::details();
            $ui->assign('_application_menu', 'kb');
            $ui->assign('_st', $_L['Knowledgebase']);
            $ui->assign('_title', $config['CompanyName'].' - '.$_L['Knowledgebase']);

            $kb_all = Knowledgebase::where('status','Published')
                ->where('is_public',1)

                ->select('id','title','slug')
                ->get();


            view('kb_client',[
                'user' => $c,
                'articles' => $kb_all
            ]);

            break;

    }

}

else{

   // $article = ORM::for_table('ib_kb')->where('slug',$slug)->find_one();

    $article = Knowledgebase::where('slug',$slug)->first();

    if($article){

        $c = Contacts::details();

        // find Admin

        $adm = User::find($article->created_by);



        view('kb_client_view',[
            'user' => $c,
            'article' => $article,
            'adm' => $adm
        ]);


    }

    else{

        abort();

    }




}



