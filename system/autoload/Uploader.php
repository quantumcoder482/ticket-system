<?php

class Uploader
{
    public $destinationPath;
    public $errorMessage;
    public $extensions;
    public $allowAll;
    public $maxSize = 134217728;
    public $uploadName;
    public $sequence = '';
    public $name = 'Uploader';
    public $sameName = false;
    public $useTable    = false;

    function setDir($path){
        $this->destinationPath  =   $path;
        $this->allowAll =   false;
    }

    function allowAllFormats(){
        $this->allowAll =   true;
    }

    function setMaxSize($sizeMB){
        $this->maxSize  =   $sizeMB * (1024*1024);
    }

    function setExtensions($options){
        $this->extensions   =   $options;
    }

    function setSameFileName(){
        $this->sameFileName =   true;
        $this->sameName =   true;
    }
    function getExtension($string){
        try{
            $parts  =   explode(".",$string);
            $ext        =   strtolower($parts[count($parts)-1]);
        }catch(Exception $c){
            $ext    =   "";
        }
        return $ext;
    }

    function setMessage($message){
        $this->errorMessage =   $message;
    }

    function getMessage(){
        return $this->errorMessage;
    }

    function getUploadName(){
        return $this->uploadName;
    }
    function setSequence($seq){
        $this->sequence =   $seq;
    }

    function getRandom(){
//        return strtotime(date('Y-m-d H:i:s')).rand(1111,9999).rand(11,99).rand(111,999);
        $x = _raid().time();
        return $x;
    }
    function sameName($true){
        $this->sameName =   $true;
    }
    function uploadFile($fileBrowse){
        $result =   false;
        $size   =   $_FILES[$fileBrowse]["size"];
        $name   =   $_FILES[$fileBrowse]["name"];
        $ext    =   $this->getExtension($name);
        if(!is_dir($this->destinationPath)){
            $this->setMessage("Destination folder is not a directory ");
        }else if(!is_writable($this->destinationPath)){
            $this->setMessage("Destination is not writable !");
        }else if(empty($name)){
            $this->setMessage("File not selected ");
        }else if($size>$this->maxSize){
            $this->setMessage("Too large file !");
        }else if($this->allowAll || (!$this->allowAll && in_array($ext,$this->extensions))){

            if($this->sameName==false){
                $this->uploadName   =  $this->sequence."_".substr(md5(rand(1111,9999)),0,8).$this->getRandom().rand(1111,1000).rand(99,9999).".".$ext;
            }else{
                $this->uploadName=  $name;
            }
            if(move_uploaded_file($_FILES[$fileBrowse]["tmp_name"],$this->destinationPath.$this->uploadName)){
                $result =   true;
            }else{
                $this->setMessage("Upload failed , try later !");
            }
        }else{
            $this->setMessage("Invalid file format !");
        }
        return $result;
    }

    function deleteUploaded(){
        unlink($this->destinationPath.$this->uploadName);
    }

}