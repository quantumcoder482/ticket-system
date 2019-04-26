<?php
if(!defined('APP_RUN')) exit('No direct access allowed');

Class IBilling_FileSystem{

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

    public function paste($destination){

        $file = '';

        if(is_file($this->source)){
            $file = basename($this->source);
        }

        $p = $this->xcopy($this->source,$destination.$file,$this->permissions);

        if($p){

            return true;

        }
        else{

            throw new Exception('Failed to Copy.');


        }

    }


    public function delete(){


        if($this->source && file_exists($this->source)){

            unlink($this->source);

        }
        else{

            throw new Exception('Failed to Delete.');

        }


    }



    public function xcopy($source, $dest, $permissions = 0755){
        if (is_link($source)) {
            return symlink(readlink($source), $dest);
        }
        if (is_file($source)) {
            return copy($source, $dest);
        }
        if (!is_dir($dest)) {
            mkdir($dest, $permissions);
        }
        $dir = dir($source);
        while (false !== $entry = $dir->read()) {
            if ($entry == '.' || $entry == '..') {
                continue;
            }
            $this->xcopy("$source/$entry", "$dest/$entry", $permissions);
        }
        $dir->close();
        return true;
    }

    public function createFile($file,$contents){

        $create = fopen($file, "w");
        if(!$create){
            throw new Exception('PHP fopen function is not enabled in this server.');
        }

        $written = fwrite($create, $contents);

        if(!$written){
            throw new Exception('Unable to write file, check directory permission.');
        }

        fclose($create);

        return true;


    }




    public function exist($file){

        if(file_exists($file)){
            return true;
        }
        else{
            return false;
        }

    }


    public function createFolder($path){
        if (!file_exists($path)) {
            mkdir($path);
            return true;
        }
        else{
            return false;
        }
    }


    public function deleteDir($path){
        if (! is_dir($path)) {
            throw new Exception("$path must be a directory");
        }
        if (substr($path, strlen($path) - 1, 1) != '/') {
            $path .= '/';
        }
        $files = glob($path . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                $this->deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($path);
    }


}