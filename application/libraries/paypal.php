<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Paypal {
	// set these using the constructor
	private $USE_PROXY = false;
	private $PROXY_HOST = '127.0.0.1';
	private $PROXY_PORT = '808';
	private $API_username = "<API_USERNAME>";
	private $API_password = "<API_PASSWORD>";
	private $API_signature = "<API_SIGNATURE>";
	private $sandbox_flag = true;
	private $API_endpoint = "https://api-3t.sandbox.paypal.com/nvp";
	private $paypal_url = "https://www.sandbox.paypal.com/webscr?cmd=_express-checkout&token=";
	private $version = "93";
	// codeigniter master object
	private $CI;

	function __construct($credentials = array()) {
		$this->CI = & get_instance();
		$this->CI->load->library('session');
		if (isset($credentials['proxy'])) {
			$this->USE_PROXY = $credentials['proxy'];
		}
		if (isset($credentials['proxy_host'])) {
			$this->PROXY_HOST = $credentials['proxy_host'];
		}
		if (isset($credentials['proxy_port'])) {
			$this->PROXY_PORT = $credentials['proxy_port'];
		}
		if (isset($credentials['version'])) {
			$this->version = $credentials['version'];
		}
		if (isset($credentials['API_username'])) {
			$this->API_username = $credentials['API_username'];
		}
		if (isset($credentials['API_password'])) {
			$this->API_password = $credentials['API_password'];
		}
		if (isset($credentials['API_signature'])) {
			$this->API_signature = $credentials['API_signature'];
		}
		if (isset($credentials['sandbox_status'])) {
			$this->sandbox_flag = $credentials['sandbox_status'];
			if ($this->sandbox_flag === false) {
				$this->API_endpoint = "https://api-3t.paypal.com/nvp";
				$this->paypal_url = "https://www.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=";
			}
		}
	}
	function set_ec($ec_data = array(), $custom_data = false) {
		$nvpstr = '';
		if ($custom_data === false) {
			if (isset($ec_data['currency'])) {
				$nvpstr.= "&PAYMENTREQUEST_0_CURRENCYCODE=" . urlencode($ec_data['currency']);
			}
			if (isset($ec_data['desc'])) {
				$nvpstr.= "&PAYMENTREQUEST_n_DESC=" . urlencode($ec_data['desc']);
			}
			if (isset($ec_data['type'])) {
				$nvpstr.= "&PAYMENTREQUEST_0_PAYMENTACTION=" . urlencode($ec_data['type']);
			} else {
				$nvpstr.= "&PAYMENTREQUEST_0_PAYMENTACTION=Sale"; // defaults to Sale            
			}
			// Shipping
			if (isset($ec_data['SHIPTONAME'])) {
				$nvpstr.= "&SHIPTONAME=" . urlencode($ec_data['SHIPTONAME']);
			}
			if (isset($ec_data['SHIPTOSTREET'])) {
				$nvpstr.= "&SHIPTOSTREET=" . urlencode($ec_data['SHIPTOSTREET']);
			}
			if (isset($ec_data['SHIPTOSTREET2'])) {
				$nvpstr.= "&SHIPTOSTREET2=" . urlencode($ec_data['SHIPTOSTREET2']);
			}
			if (isset($ec_data['SHIPTOCITY'])) {
				$nvpstr.= "&SHIPTOCITY=" . urlencode($ec_data['SHIPTOCITY']);
			}
			if (isset($ec_data['SHIPTOSTATE'])) {
				$nvpstr.= "&SHIPTOSTATE=" . urlencode($ec_data['SHIPTOSTATE']);
			}
			if (isset($ec_data['SHIPTOZIP'])) {
				$nvpstr.= "&SHIPTOZIP=" . urlencode($ec_data['SHIPTOZIP']);
			}
			if (isset($ec_data['SHIPTOCOUNTRYCODE'])) {
				$nvpstr.= "&SHIPTOCOUNTRYCODE=" . urlencode($ec_data['SHIPTOCOUNTRYCODE']);
			}
			if (isset($ec_data['SHIPTOPHONENUM'])) {
				$nvpstr.= "&SHIPTOPHONENUM=" . urlencode($ec_data['SHIPTOPHONENUM']);
			}
			//
			if (isset($ec_data['return_URL'])) {
				$nvpstr.= "&RETURNURL=" . urlencode($ec_data['return_URL']);
			}
			$nvpstr.= "&custom=" . urlencode($ec_data['invnum']);
			$nvpstr.= "&cmd=" . urlencode('_UK');
			if (isset($ec_data['cancel_URL'])) {
				$nvpstr.= "&CANCELURL=" . urlencode($ec_data['cancel_URL']);
			}
			if (isset($ec_data['get_shipping'])) {
				$nvpstr.= ($ec_data['get_shipping'] === true) ? "&NOSHIPPING=2" : "&NOSHIPPING=1";
			} else {
				$nvpstr.= "&NOSHIPPING=0";
			}
			$shipping_amount = 0;
			if (isset($ec_data['shipping_amount'])) {
				$shipping_amount = (float)$ec_data['shipping_amount'];
				$nvpstr.= "&PAYMENTREQUEST_0_SHIPPINGAMT=" . urlencode(sprintf('%.2f', $shipping_amount));
			}
			$handling_amount = 0;
			if (isset($ec_data['handling_amount'])) {
				$handling_amount = (float)$ec_data['handling_amount'];
				$nvpstr.= "&PAYMENTREQUEST_0_HANDLINGAMT=" . urlencode(sprintf('%.2f', $handling_amount));
			}
			$tax_amount = 0;
			if (isset($ec_data['tax_amount'])) {
				$tax_amount = (float)$ec_data['tax_amount'];
				$nvpstr.= "&PAYMENTREQUEST_0_TAXAMT=" . urlencode(sprintf('%.2f', $tax_amount));
			}
			// setting the parameters for your products
			$total_amount = 0;
			foreach($ec_data['products'] as $k => $v) {
				if (isset($v['name'])) {
					$nvpstr.= "&L_PAYMENTREQUEST_0_NAME$k=" . urlencode($v['name']);
				}
				if (isset($v['desc'])) {
					$nvpstr.= "&L_PAYMENTREQUEST_0_DESC$k=" . urlencode($v['desc']);
				}
				if (isset($v['number'])) {
					$nvpstr.= "&L_PAYMENTREQUEST_0_NUMBER$k=" . urlencode($v['number']);
				}
				if (isset($v['quantity'])) {
					$nvpstr.= "&L_PAYMENTREQUEST_0_QTY$k=" . urlencode($v['quantity']);
				}
				if (isset($v['amount'])) {
					$nvpstr.= "&L_PAYMENTREQUEST_0_AMT$k=" . urlencode($v['amount']);
					if (isset($v['quantity'])) {
						$total_amount+= (float)($v['amount'] * (int)$v['quantity']);
					} else {
						$total_amount+= (float)$v['amount'];
					}
				} else {
					$nvpstr.= "&L_PAYMENTREQUEST_0_AMT$k=" . urlencode('0.00');
					$total_amount+= 0;
				}
			}
			$nvpstr.= "&PAYMENTREQUEST_0_ITEMAMT=" . urlencode(sprintf('%.2f', $total_amount));
			$nvpstr.= "&PAYMENTREQUEST_0_AMT=" . urlencode(sprintf('%.2f', $total_amount + $shipping_amount + $tax_amount + $handling_amount));
		} else {
			foreach($ec_data as $k => $v) {
				$nvpstr.= "&$k=" . urlencode($v);
			}
		}
		$resArray = $this->hash_call("SetExpressCheckout", $nvpstr);
		$ack = strtoupper($resArray["ACK"]);
		if ($ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING") {
			$resArray['ec_status'] = true;
		} else {
			$resArray['ec_status'] = false;
		}
		return $resArray;
	}
	function get_ec($token) {
		$nvpstr = "&TOKEN=" . $token;
		$resArray = $this->hash_call("GetExpressCheckoutDetails", $nvpstr);
		$ack = strtoupper($resArray["ACK"]);
		if ($ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING") {
			$resArray['ec_status'] = true;
		} else {
			$resArray['ec_status'] = false;
		}
		return $resArray;
	}

	function do_ec(
		$ec_details = array(
			'token' => '', 
			'payer_id' => '', 
			'currency' => '', 
			'amount' => '', 
			'IPN_URL' => '', 
			'type' => 'Sale')
	) {
		$nvpstr = '';
		if (isset($ec_details['token'])) {
			$nvpstr.= '&TOKEN=' . urlencode($ec_details['token']);
		}
		if (isset($ec_details['payer_id'])) {
			$nvpstr.= '&PAYERID=' . urlencode($ec_details['payer_id']);
		}
		if (isset($ec_details['type'])) {
			$nvpstr.= '&PAYMENTREQUEST_0_PAYMENTACTION=' . urlencode($ec_details['type']);
		}
		if (isset($ec_details['amount'])) {
			$nvpstr.= '&PAYMENTREQUEST_0_AMT=' . urlencode($ec_details['amount']);
		}
		if (isset($ec_details['currency'])) {
			$nvpstr.= '&PAYMENTREQUEST_0_CURRENCYCODE=' . urlencode($ec_details['currency']);
		}
		if (isset($ec_details['IPN_URL'])) {
			$nvpstr.= '&NOTIFYURL=' . urlencode($ec_details['IPN_URL']);
		}
		$nvpstr.= '&IPADDRESS=' . urlencode($_SERVER['SERVER_NAME']);
		$resArray = $this->hash_call("DoExpressCheckoutPayment", $nvpstr);
		$ack = strtoupper($resArray["ACK"]);
		if ($ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING") {
			$resArray['ec_status'] = true;
		} else {
			$resArray['ec_status'] = false;
		}
		return $resArray;
	}

	function hash_call($methodName, $nvpStr) {
		//setting the curl parameters.
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API_endpoint);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		//turning off the server and peer verification(TrustManager Concept).
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		//if USE_PROXY constant set to TRUE in Constants.php, then only proxy will be enabled.
		//Set proxy name to PROXY_HOST and port number to PROXY_PORT in constants.php
		if ($this->USE_PROXY) curl_setopt($ch, CURLOPT_PROXY, $this->PROXY_HOST . ':' . $this->PROXY_PORT);
		//NVPRequest for submitting to server
		$nvpreq = "METHOD=" . urlencode($methodName);
		$nvpreq.= "&VERSION=" . urlencode($this->version);
		$nvpreq.= "&PWD=" . urlencode($this->API_password);
		$nvpreq.= "&USER=" . urlencode($this->API_username);
		$nvpreq.= "&SIGNATURE=" . urlencode($this->API_signature) . $nvpStr;
		//setting the nvpreq as POST FIELD to curl
		curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);
		//getting response from server
		$response = curl_exec($ch);
		//convrting NVPResponse to an Associative Array
		$nvpResArray = $this->_deformatNVP($response);
		$nvpReqArray = $this->_deformatNVP($nvpreq);
		$this->CI->session->set_userdata(array('nvpReqArray' => $nvpReqArray));
		if (curl_errno($ch)) {
			// moving to display page to display curl errors
			$this->CI->session->set_userdata(array('curl_error_no' => curl_errno($ch)));
			$this->CI->session->set_userdata(array('curl_error_msg' => curl_error($ch)));
			//Execute the Error handling module to display errors.

		}
		//closing the curl
		curl_close($ch);
		return $nvpResArray;
	}

	/*--------------------------------------------------------------------------------
	* Purpose: Redirects to PayPal.com site.
	* Inputs:  NVP string.
	* Returns:
	* -------------------------------------------------------------------------------
	*/
	function redirect_to_paypal($token, $mobile = false) {
		$payPalURL = ($mobile === true) ? str_replace("_express-checkout", "_express-checkout-mobile", $this->paypal_url) : $this->paypal_url;
		// Redirect to paypal.com here
		$payPalURL = $this->paypal_url . $token;
		header("Location: " . $payPalURL);
		exit;
	}

	/* ----------------------------------------------------------------------------------
	* This function will take NVPString and convert it to an Associative Array and it will decode the response.
	* It is usefull to search for a particular key and displaying arrays.
	* @nvpstr is NVPString.
	* @nvpArray is Associative Array.
	* ----------------------------------------------------------------------------------
	*/
	function _deformatNVP($nvpstr) {
		$intial = 0;
		$nvpArray = array();
		while (strlen($nvpstr)) {
			//postion of Key
			$keypos = strpos($nvpstr, '=');
			//position of value
			$valuepos = strpos($nvpstr, '&') ? strpos($nvpstr, '&') : strlen($nvpstr);
			/*getting the Key and Value values and storing in a Associative Array */
			$keyval = substr($nvpstr, $intial, $keypos);
			$valval = substr($nvpstr, $keypos + 1, $valuepos - $keypos - 1);
			//decoding the respose
			$nvpArray[urldecode($keyval) ] = urldecode($valval);
			$nvpstr = substr($nvpstr, $valuepos + 1, strlen($nvpstr));
		}
		return $nvpArray;
	}
}
