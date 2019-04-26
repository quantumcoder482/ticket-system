<?php

Class Ib_Recaptcha
{

    public static function isValid($secret_key){
        try {

            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $data = array(
                'secret' => $secret_key,
                'response' => $_POST['g-recaptcha-response'],
                'remoteip' => $_SERVER['REMOTE_ADDR']
            );
            $options = array(
                'http' => array(
                    'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method' => 'POST',
                    'content' => http_build_query($data)
                )
            );

            $context = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
            return json_decode($result)->success;
        } catch (Exception $e) {
            _log($e->getMessage());
            return null;
        }
    }

}