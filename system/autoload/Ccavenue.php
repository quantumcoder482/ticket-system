<?php
/**
 * PHP implementation of CCAVENUE Payment Gateway Interface
 *
 * @package CCAVENUE
 * @author Rakesh Kumar Shardiwal <rakesh.shardiwal@gmail.com>
 */
class CCAVENUE {
    /**
     * @var VERSION - Package Version
     */
    public static $VERSION = 1.0;
    private $_worker;
    const GATEWAY_URL  = 'https://www.ccavenue.com/shopzone/cc_details.jsp';
	const STATUS_URL 	        = 'https://www.ccavenue.com/servlet/new_txn.OrderStatusTracker';
	const OLD_ORDER_STATUS_URL = 'https://mars.ccavenue.com/servlet/new_txn.OrderStatusTracker';
	private $ccavenue_fields = array(
        'Merchant_Id',
        'Currency',
        'Amount',
        'TxnType',
        'Order_Id',
        'actionID',
        'Redirect_Url',
        'Checksum',
        'billing_cust_name',
        'billing_cust_address',
        'billing_cust_country',
        'billing_cust_state',
        'billing_cust_city',
        'billing_zip_code',
        'billing_cust_tel',
        'billing_cust_email',
        'delivery_cust_name',
        'delivery_cust_address',
        'delivery_cust_country',
        'delivery_cust_state',
        'delivery_cust_tel',
        'delivery_cust_notes',
        'delivery_cust_city',
        'delivery_zip_code',
        'Merchant_Param',
    );
	/**
     *	DEFAULTS
     */
	public 	$actionid     = 'TXN',
        $txntype      = 'A',
        $button_label = 'Pay';
	/**
     *	Constructor
     *
     * Initializes CCAVENUE Payment Gateway
     *
     * @param $args - array or object of ccavenue parameters
     *
     *	$cc = new CCAVENUE( array(
     *		'working_key'  => 'working key',
     *		'merchant_id'  => 'merchant id',
     *		'currency' 	   => 'INR',
     *	) );
     *
     *	$cc->Redirect_Url = 'http://localhost/index.html';
     *	$cc->amount 			= 10;
     *	$cc->order_id 		= 'ORD_10';
     *
     *	$cc->billing_cust_name 			= 'Customer Name';
     *	$cc->billing_cust_address 	= 'Address';
     *	$cc->billing_cust_country 	= 'Country';
     *	$cc->billing_cust_state 		= 'State';
     *	$cc->billing_cust_city 			= 'City';
     *	$cc->billing_zip_code 			= 'Post Code';
     *	$cc->billing_cust_tel 			= 'Telephone Number';
     *	$cc->billing_cust_email 		= 'Email Address';
     *
     *	$cc->delivery_cust_name 		= 'Customer Name';
     *	$cc->delivery_cust_address 	= 'Address';
     *	$cc->delivery_cust_country 	= 'Country';
     *	$cc->delivery_cust_state 		= 'State';
     *	$cc->delivery_cust_city 		= 'City';
     *	$cc->delivery_zip_code 			= 'Post Code';
     *	$cc->delivery_cust_tel 			= 'Telephone Number';
     *
     *	$cc->delivery_cust_notes 		= 'Delivery Customer Note';
     *
     *	Custom button label
     *	$cc->button_label = 'Click to make payment';
     *
     *	$cc->generate_pay_button();
     *
     *	Get the payment status
     *	$cc->status();
     *
     */
	public function __construct($args) {
        if ( !$args ) {
            throw new Exception(
                'Error: Not enough parameters (
			Constructor array("working_key" => "xyz123", "merchant_id" => "OPD")
			) !!!\n');
        }
        foreach ($args as $key => $value) {
            $this->_add_attribute( strtolower($key), $value );
        }
        //include once the class file
        include_once('JsonRpcClient.php');
        //request the instance
        $this->_worker = new JsonRpcClient();
    }
	/**
     *	List CCAVENUE Parameters
     *
     *	@return ARRAY - CCAVENUE Fields
     *
     */
	public function list_params() {
        $fields = $this->ccavenue_fields;
        array_push( $fields, 'working_key' );
        return $fields;
    }
	/**
     *	Generate pay button
     *
     *	@return string - CCAVENUE form with button to pay
     *
     *	To change the button label, button_label => 'Make Payment';
     */
	public function generate_pay_button() {
        // Generate checksum
        $this->checksum = $this->getchecksum();
        $ccavenue_args = array();
        foreach ($this->ccavenue_fields as $field) {
            $object_field = strtolower($field);
            $ccavenue_args[ $field ] = $this->$object_field;
        }
        $ccavenue_args_array = array();
        foreach($ccavenue_args as $param => $value) {
            $ccavenue_args_array[] = "<input type='hidden' name='$param' value='$value'/>";;
        }
        $method       = $this->GATEWAY_URL;
        $button_label = $this->button_label;
        $form = "
			<form action='$method' method='post'>".
            implode( '', $ccavenue_args_array ) .
            "<div class='payment_buttons'>
			<input type='submit' class='button alt' value='$button_label'>
			</div>
			</form>
		";
        return $form;
    }
	/**
     *	Order Status Tracker
     *
     *	Don't relay on real-time parameters from Avenues
     *
     *	This method will return the order details of only the recent transactions not older than 30 minutes.
     *
     *	@param $is_old_order boolean - if you want to get older order status
     *
     *	Get Payment status
     *
     *	@return string - Y|N|B order status:
     *	Y - IF payment was successful
     *	N - IF payment was failed
     *	B - IF status is not cleared
     */
	public function status( $is_old_order=false )
    {
        $account = new stdClass;
        if ( $is_old_order ) {
            // This url will return the order details of only the recent transactions not older than 30 minutes.
            $account->url = $this->STATUS_URL;
        }
        else {
            // This url will return the order details of any transaction older by 45 minutes.
            $account->url = $this->OLD_ORDER_STATUS_URL;
        }
        $account->params = array(
            'Merchant_Id' => $this->merchant_id,
            'Order_Id'    => $this->order_id
        );
        $response 	   = $this->_api( $this->_prepareURL($account) );
        $all_response  = explode('&',$response);
        $response_hash = array();
        foreach ( $all_response as $r ) {
            $str  = explode('=',$r);
            $response_hash[ $str[0] ] = $str[1];
        }
        return $response_hash['AuthDesc'];
    }
	/**
     *	Get Checksum for CCAVENUE
     *
     * @return string - Checksum string:
     */
	public function getchecksum() {
        $fields = array(
            $this->merchant_id,
            $this->order_id,
            $this->amount,
            $this->redirect_url,
            $this->working_key
        );
        $str   = implode('|', $fields);
        $adler = $this->_adler32($str);
        return $adler;
    }
	private function _adler32($str) {
        $adler = 1;
        $BASE  = 65521;
        $s1    = $adler & 0xffff ;
        $s2    = ($adler >> 16) & 0xffff;
        for($i = 0 ; $i < strlen($str) ; $i++) {
            $s1 = ($s1 + Ord($str[$i])) % $BASE ;
            $s2 = ($s2 + $s1) % $BASE ;
        }
        return $this->_leftshift($s2 , 16) + $s1;
    }
	private function _leftshift($str , $num) {
        $str = DecBin($str);
        for( $i = 0 ; $i < (64 - strlen($str)) ; $i++)
            $str = "0".$str;
        for($i = 0 ; $i < $num ; $i++)
            $str = $str."0"; $str = substr($str , 1 );
        return $this->_cdec($str);
    }
	private function _cdec($num) {
        for ($n = 0 ; $n < strlen($num) ; $n++) {
            $temp = $num[$n];
            $dec = $dec + $temp*pow(2 , strlen($num) - $n - 1);
        }
        return $dec;
    }
	/*
		Make API Call and return the raw result
	*/
	private function _api($url, $post = false, $postData = array()) {
        $this->_worker->setURL($url);
        $result = $this->_worker->rawcall($postData, $post);
        return $result;
    }
	/*
		Prepare URL with params
	*/
	private function _prepareURL($requestData) {
        $url = $requestData->url;
        if (isset($requestData->params)) {
            $url .= "?";
            $extraParam = array();
            foreach ($requestData->params as $key => $value) {
                if (is_array($value)) {
                    foreach ($value as $val) {
                        $extraParam[] = $key . "=" . $val;
                    }
                }
                else {
                    $extraParam[] = $key . "=" . $value;
                }
            }
            $url .= implode("&", $extraParam);
        }
        return $url;
    }
	public function _add_attribute($propertyName, $propertyValue){
        $this->{$propertyName} = $propertyValue;
    }
}