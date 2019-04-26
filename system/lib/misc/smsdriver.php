<?php

use Twilio\Rest\Client;

class RouteSmsSender
{
    var $host;
    var $port;
    /*
    * Username that is to be used for submission
    */
    var $strUserName;
    /*
    * password that is to be used along with username
    */
    var $strPassword;
    /*
    * Sender Id to be used for submitting the message
    */
    var $strSender;
    /*
    * Message content that is to be transmitted
    */
    var $strMessage;
    /*
    * Mobile No is to be transmitted.
    */
    var $strMobile;

    /*
* What type of the message that is to be sent
* <ul>
* <li>0:means plain text</li>
* <li>1:means flash</li>
* <li>2:means Unicode (Message content should be in Hex)</li>
* <li>6:means Unicode Flash (Message content should be in Hex)</li>
* </ul>
*/
    var $strMessageType;
    /*
    * Require DLR or not *
    <ul>
    * <li>0:means DLR is not Required</li>
    * <li>1:means DLR is Required</li>
    * </ul>
    */
    var $strDlr;
    private function sms__unicode($message){
        $hex1='';
        if (function_exists('iconv')) {
            $latin = @iconv('UTF-8', 'ISO-8859-1', $message);
            if (strcmp($latin, $message)) {
                $arr = unpack('H*hex', @iconv('UTF-8', 'UCS-2BE',
                    $message));
                $hex1 = strtoupper($arr['hex']);
            }
            if($hex1 ==''){
                $hex2='';
                $hex='';
                for ($i=0; $i < strlen($message); $i++)
                {
                    $hex = dechex(ord($message[$i]));
                    $len =strlen($hex);
                    $add = 4 - $len;
                    if($len < 4)
                    {
                        for($j=0;$j<$add;$j++)
                        { $hex="0".$hex;
                        }
                    }
                    $hex2.=$hex;
                }
                return $hex2;
            }
            else{
                return $hex1;

            }
        }
        else{
            print 'iconv Function Not Exists !';
        }
    } //Constructor..
    public function __construct($host,$port,$username,$password,$sender,
                                $message,$mobile, $msgtype,$dlr){
        $this->host=$host;
        $this->port=$port;
        $this->strUserName = $username;
        $this->strPassword = $password;
        $this->strSender= $sender;
        $this->strMessage=$message; //URL Encode The Message..
        $this->strMobile=$mobile;
        $this->strMessageType=$msgtype;
        $this->strDlr=$dlr;
    }
    public function Submit(){
        if($this->strMessageType=="2" || $this->strMessageType=="6") {
//Call The Function Of String To HEX.
            $this->strMessage = $this->sms__unicode($this->strMessage);
            try{
//Smpp http Url to send sms.
                //  $live_url="http://".$this->host.":".$this->port."/bulksms/bulksms?username=".
                $live_url=$this->host."/sendsms?username=".
                    $this->strUserName."&password=".
                    $this->strPassword."&type=".
                    $this->strMessageType.
                    "&dlr=".
                    $this->strDlr.
                    "&destination=".
                    $this->strMobile.
                    "&source=".
                    $this->strSender.
                    "&message=".
                    $this->strMessage. "";

                // $parse_url=file($live_url);

             //   http_response_code(500);
             //   dd($live_url);

                $parse_url= ib_http_request($live_url);

                return $parse_url;

            }catch(Exception $e){
                return 'Message:' .$e->getMessage();
            }
        } else
            $this->strMessage=urlencode($this->strMessage);

        try{
// http Url to send sms.
            $live_url=$this->host.":".
                $this->port."/sendsms?username=".
                $this->strUserName.
                "&password=".
                $this->strPassword.
                "&type=".
                $this->strMessageType.
                "&dlr=".
                $this->strDlr.
                "&destination=".
                $this->strMobile.
                "&source=".
                $this->strSender.
                "&message=".
                $this->strMessage."";

            //  $parse_url=file($live_url);

            $parse_url = ib_http_request($live_url);

            return $parse_url;

        }
        catch(Exception $e){
            return 'Message:' .$e->getMessage();
        }
    }
}

function spSendSMS($to,$message,$from='',$iid=0,$sms_type = 'text',$sms_route=''){

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


    switch ($sms_api_handler){

        case 'Twilio':

            //   $message = urlencode($message);

            $sid = $config['sms_auth_username'];
            $token = $config['sms_auth_password'];

            try{
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
            } catch (\Exception $e)
            {
                $resp = $e->getMessage();
            }

            break;


        case 'Nexmo':


            $apiKey = $config['sms_auth_username'];
            $apiSecret = $config['sms_auth_password'];

            $client = new Nexmo\Client(new Nexmo\Client\Credentials\Basic($apiKey, $apiSecret));



            try{
                $nexmoSend = $client->message()->send([
                    'to' => $to,
                    'from' => $from,
                    'text' => $message
                ]);
                $resp = "Sent message to " . $nexmoSend['to'] . ". Balance is now " . $nexmoSend['remaining-balance'];
            } catch (Exception $e){
                $resp = $e->getMessage();
            }

            break;

        case 'Routesms':

        case 'Alanood':

            $api_url = $config['sms_req_url'];
            $api_username = $config['sms_auth_username'];
            $api_password = $config['sms_auth_password'];

            switch ($sms_type)
            {
                case 'text':
                    $type_param = 0;

                    break;

                case 'flash':

                    $type_param = 1;

                    break;

                case 'unicode':

                    $type_param = 2;

                    break;

                case 'wap':

                    $type_param = 4;

                    break;

                default:
                    $type_param = 2;

            }

            $obj = new RouteSmsSender($api_url,"",$api_username,$api_password,$from,$message,$to,$type_param,"1");

            $resp = $obj->Submit ();


            break;


        case 'Textlocal_in':

            $api_username = $config['sms_auth_username'];
            $api_password = $config['sms_auth_password'];

            $textlocal = new Textlocal($api_username, $api_password);

            $numbers = array($to);
            $sender = $from;

            try {
                $result = $textlocal->sendSms($numbers, $message, $sender);
                _log($result);
            } catch (Exception $e) {
                _log($e->getMessage());
            }

            break;


        case 'Msg91':

            $api_username = $config['sms_auth_username'];

            $curl = curl_init();
            $sender = $from;

            if($sms_route == '')
            {
                $sms_route = 1;
            }


            curl_setopt_array($curl, array(
                CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?country=91&sender=$sender&mobiles=$to&authkey=$api_username&route=$sms_route&message=$message",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 300,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
            ));

            $resp = curl_exec($curl);
            $err = curl_error($curl);


            curl_close($curl);

            if ($err) {
                _log($err);
            }


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






            try{
                $resp = ib_http_request($sms_req_url,$sms_request_method,$params);
            } catch (Exception $e){
                $resp = $e->getMessage();
            }








            $sms->resp = $resp;

            $sms->save();




            break;


    }




    return $resp;



}