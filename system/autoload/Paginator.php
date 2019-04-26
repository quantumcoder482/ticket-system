<?php
// *************************************************************************
// *                                                                       *
// * iBilling -  Accounting, Billing Software                              *
// * Copyright (c) Sadia Sharmin. All Rights Reserved                      *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * Email: sadiasharmin3139@gmail.com                                                *
// * Website: http://www.sadiasharmin.com                                  *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * This software is furnished under a license and may be used and copied *
// * only  in  accordance  with  the  terms  of such  license and with the *
// * inclusion of the above copyright notice.                              *
// * If you Purchased from Codecanyon, Please read the full License from   *
// * here- http://codecanyon.net/licenses/standard                         *
// *                                                                       *
// *************************************************************************
Class Paginator
{
    public static function bootstrap($table, $w1='',$c1='', $w2='', $c2= '', $w3='',$c3='', $w4='', $c4= '', $per_page = '50')
    {
global $routes;
        global $_L;
        $txt_next = $_L['Next'];
        $txt_last = $_L['Last'];
        $url = U.$routes['0'].'/'.$routes['1'].'/';
        $adjacents = "2";

//        if(isset($_GET['page']) AND $_GET['page'] != ''){
//            $page = $_GET['page'];
//        }
//
//        else{
//            $page = '1';
//        }


        //    exit($page);


        $page = (int)(!isset($routes['2']) ? 1 : $routes['2']);
        $pagination = "";

        if($w1 != ''){

            $totalReq = ORM::for_table($table)->where_like($w1,$c1)->count();


        }
        elseif($w2 != ''){
            $totalReq = ORM::for_table($table)->where_like($w1,$c1)->where($w2,$c2)->count();
        }

        elseif($w3 != ''){
            $totalReq = ORM::for_table($table)->where($w1,$c1)->where($w2,$c2)->where($w3,$c3)->count();
        }

        elseif($w4 != ''){
            $totalReq = ORM::for_table($table)->where($w1,$c1)->where($w2,$c2)->where($w3,$c3)->where($w4,$c4)->count();
        }

        else{
            $totalReq = ORM::for_table($table)->count();
        }


        $i = 0;

        $page = ($page == 0 ? 1 : $page);
        $start = ($page - 1) * $per_page;

        $prev = $page - 1;
        $next = $page + 1;
        $lastpage = ceil($totalReq / $per_page);

        $lpm1 = $lastpage - 1;
        $limit = $per_page;
        $startpoint = ($page * $limit) - $limit;

        if ($lastpage >= 1) {
            $pagination .= '<ul class="pagination pagination-xs">';
            // $pagination .= "<li class='disabled'>Page $page of $lastpage</li>";
            if ($lastpage < 7 + ($adjacents * 2)) {
                for ($counter = 1; $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<li class='active'><a href='javascript:void(0);'>$counter</a>
</li>";
                    else
                        $pagination .= "<li><a href='{$url}$counter'>$counter</a></li>";
                }
            } elseif ($lastpage > 5 + ($adjacents * 2)) {
                if ($page < 1 + ($adjacents * 2)) {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                        if ($counter == $page)
                            $pagination .= "<li class='active'><a href='javascript:void(0);'>$counter</a></li>";
                        else
                            $pagination .= "<li><a href='{$url}$counter'>$counter</a></li>";
                    }
                    $pagination .= "<li class='disabled'>...</li>";
                    $pagination .= "<li><a href='{$url}$lpm1'>$lpm1</a></li>";
                    $pagination .= "<li><a href='{$url}$lastpage'>$lastpage</a></li>";
                } elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                    $pagination .= "<li><a href='{$url}1'>1</a></li>";
                    $pagination .= "<li><a href='{$url}2'>2</a></li>";
                    $pagination .= "<li class='disabled'>...</li>";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                        if ($counter == $page)
                            $pagination .= "<li class='active'><a href='javascript:void(0);'>$counter</a></li>";
                        else
                            $pagination .= "<li><a href='{$url}$counter'>$counter</a></li>";
                    }
                    $pagination .= "<li class='disabled'>...</li>";
                    $pagination .= "<li><a href='{$url}$lpm1'>$lpm1</a></li>";
                    $pagination .= "<li><a href='{$url}$lastpage'>$lastpage</a></li>";
                } else {
                    $pagination .= "<li><a href='{$url}1'>1</a></li>";
                    $pagination .= "<li><a href='{$url}2'>2</a></li>";
                    $pagination .= "<li>..</li>";
                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                        if ($counter == $page)
                            $pagination .= "<li class='disabled'><a class='disabled'>$counter</a></li>";
                        else
                            $pagination .= "<li><a href='{$url}$counter'>$counter</a></li>";
                    }
                }
            }

            if ($page < $counter - 1) {
                $pagination .= "<li><a href='{$url}$next'>$txt_next</a></li>";
                $pagination .= "<li><a href='{$url}$lastpage'>$txt_last</a></li>";
            } else {
                $pagination .= "<li class='disabled'><a class='disabled'>$txt_next</a></li>";
                $pagination .= "<li class='disabled'><a class='disabled'>$txt_last</a></li>";
            }
            $pagination .= "</ul>";

            //  exit;
            if($totalReq == ''){
                $totalReq = '0';
            }



            if($page == ''){
                $page = '0';
            }



            ////////////////////////////////////////////////////////////////////////////////////////////
        }

        else{

        }


        $gen = array("startpoint" => $startpoint, "limit" => $limit, "found" => $totalReq, "page" => $page, "lastpage" => $lastpage, "contents" => $pagination);

        return $gen;
    }

}