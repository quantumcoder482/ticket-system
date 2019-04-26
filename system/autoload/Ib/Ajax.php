<?php

Class Ib_Ajax{

    public static function response($data=array()){

        header('Content-type: application/json');
        echo json_encode( $data );

    }


}