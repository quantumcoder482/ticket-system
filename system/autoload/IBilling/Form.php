<?php
if(!defined('APP_RUN')) exit('No direct access allowed');

Class IBilling_Form{

    public $source;
    public $destination;
    public $permissions;

    public function __construct(){

        $this->permissions = 0755;
        $this->source = false;

    }


    public function select($source){

        if(file_exists($source)){
            $this->source = $source;
            return $this;
        }
        else{

            throw new Exception('File not Found!');

        }


    }



    public function copy(){

        return $this;

    }




}