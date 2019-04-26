<?php
if(!defined('APP_RUN')) exit('No direct access allowed');

Class IBilling_Http{


    public $url;
    public $file_name;


    public function __construct(){

        $this->url = false;
        $this->file_name = false;

    }


    public function open($url){

        $this->url = $url;
        return $this;

    }

    public function setFileName($filename){

        $this->file_name = $filename;
        return $this;

    }


    public function then($what){

        switch ($what){

            case 'download':


                if(!$this->url){
                    throw new Exception('Please select a URL using open method');
                }

                if(!$this->file_name){
                    throw new Exception('You must choose a filename using setFileName() method.');
                }


                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $this->url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
                curl_setopt($ch,CURLOPT_USERAGENT,'CloudOnex HTTP Client');
                $data = curl_exec ($ch);

                if(curl_error($ch))
                {
                    throw new Exception(curl_error($ch));
                }

                curl_close ($ch);

                $file = fopen($this->file_name, "w+");
                fputs($file, $data);
                fclose($file);


                return true;


                break;

        }


        return false;


    }






}