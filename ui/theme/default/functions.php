<?php


/*
 *
 * Create Menu dynamically for plugins and hooks
 *
 * @param string $name name of the menu
 * @param string $link link of the menu
 * @param string $c controller name to set menu active
 * @param string fontawesome or iBilling icon name
 * @param int $position position of the menu
 * @param array $submenu submenu items
 *
 * */

function add_menu_admin($name,$link='#',$c='',$icon='icon-leaf',$position=5,$submenu=array()){

    global $admin_extra_nav,$routes;

    $active = '';
    if((isset($routes['0'])) AND ($routes['0']) == $c){
        $active = 'active';

    }



    if(!empty($submenu)){

        $s = '';

        foreach($submenu as $menu){
            if(isset($menu['target'])){
                $target = 'target="'.$menu['target'].'"';
            }
            else{
                $target = '';
            }
            $s .= ' <li><a href="'.$menu['link'].'" '.$target.'>'.$menu['name'].'</a></li>';
        }

//        $admin_extra_nav[$position] .= '<li class="'.$active.'" id="li_'.$c.'">
//                    <a href="'.$link.'"><i class="'.$icon.'"></i> <span class="nav-label">'.$name.' </span><span class="fa arrow"></span></a>
//
//<ul class="nav nav-second-level">
//'.$s.'
//</ul>
//</li>';

        $admin_extra_nav[$position] .= '<li class="'.$active.'"> <a href="javascript:void(0);" class="waves-effect"><i class="'.$icon.'"></i> <span class="hide-menu"> '.$name.' <span class="fa arrow"></span></span></a>
                            <ul class="nav nav-second-level">
                                '.$s.'
                            </ul>
                        </li>';


    }
    else{
        // $admin_extra_nav[$position] .= '<li class="'.$active.'" id="li_'.$c.'"><a href="'.$link.'"><i class="'.$icon.'"></i> <span class="nav-label">'.$name.'</span></a></li>';
        $admin_extra_nav[$position] .= '<li class="waves-effect '.$active.'"> <a href="'.$link.'"  id="li_'.$c.'"><i class="'.$icon.'  fa-fw"></i> <span class="hide-menu">'.$name.'</span></a> </li>';
    }

}
