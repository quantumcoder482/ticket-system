<?php
use Illuminate\Database\Eloquent\Model;

use Twilio\Rest\Client;

class SMS extends Model
{
    protected $table = 'app_sms';

    public static function send($to,$message,$from='',$iid=0)
    {
        global $config;

        $resp = '';


        $to = str_replace(' ','',$to);
        $to = str_replace('-','',$to);

        $sms_api_handler = $config['sms_api_handler'];

        $sms = new SMS;
        $sms->sms_from = $from;
        $sms->sms_to = $to;
        $sms->sms = $message;
        $sms->iid = $iid;
        $sms->driver = $sms_api_handler;

        $sms->save();


        if(APP_STAGE == 'Demo'){

            return 'This feature is disabled in the Demo mode.';

        }


        if($from == ''){
            $from = $config['sms_sender_name'];
        }

        switch ($sms_api_handler){

            case 'Twilio':

                //   $message = urlencode($message);

                $sid = $config['sms_auth_username'];
                $token = $config['sms_auth_password'];

                $client = new Client($sid, $token);

                //Use the client to do fun stuff like send text messages!
                $client->messages->create(
                    $to,
                    array(
                        // A Twilio phone number you purchased at twilio.com/console
                        'from' => $from,
                        // the body of the text message you'd like to send
                        'body' => $message
                    )
                );

                break;


            case 'Custom':


                $sms_request_method = $config['sms_request_method'];
                $sms_req_url = $config['sms_req_url'];

                $sms_http_params = $config['sms_http_params'];



                $tpl = new Template($sms_http_params);
                $tpl->set('to',$to);
                $tpl->set('from',$from);
                $tpl->set('message',$message);

                $parsed = $tpl->output();

                $params_r = explode(',',$parsed);

                $params = array();

                foreach ($params_r as  $v){

                    //  $params[$k] = $v;

                    $p_e = explode('==',$v);

                    $params[$p_e[0]] = rawurldecode($p_e[1]);

                }

                //  var_dump($params);
                //  exit;

                $resp = ib_http_request($sms_req_url,$sms_request_method,$params);


                $sms->resp = $resp;

                $sms->save();




                break;


        }




        return $resp;
    }

}