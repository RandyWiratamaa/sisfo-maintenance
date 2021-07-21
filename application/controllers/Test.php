<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';

use SMSGatewayMe\Client\ApiClient;
use SMSGatewayMe\Client\Configuration;
use SMSGatewayMe\Client\Api\MessageApi;
use SMSGatewayMe\Client\Model\SendMessageRequest;

class Test extends CI_Controller {
	
    public function index() {
        $this->load->library('email');

				$config = array(
					'protocol'		=> 'smtp',
					'smtp_host'		=> 'smtp.gmail.com',
					'smtp_crypto'	=> 'ssl',
					'smtp_port'		=> 465,
					'smtp_user'		=> 'lappengaduan123@gmail.com',
					'smtp_pass'		=> 'ku3%P^d,5jEmcLK',
					'mailtype'		=> 'html',
                    'charset'		=> 'utf-8',
                    'newline'       => "\r\n",
					'mailtype'		=> 'html',
					'wordwrap'		=> TRUE,
					'validation'	=> TRUE
				);

                $this->email->initialize($config);
                
                $this->email->from('lappengaduan123@gmail.com', 'Layanan Pengaduan Tv Kabel');
				$this->email->to('randywiratama1@gmail.com');
				$this->email->subject('Please verify email for Login !');
                $this->email->message("<p>Hii </p>");
                
                $this->email->send();
                echo $this->email->print_debugger();
	}

	public function sms()
	{
		// $userkey = "bcd4ef197eb7";
		// $passkey = "dqzqu2jqiw";
		// $telepon = "089630213020";
		// $message = "TESTING SMS GATEWAY BY RANDY WIRATAMA";
		// $url = "https://reguler.zenziva.net/apps/smsapi.php";
		// $curlHandle = curl_init();
		// curl_setopt($curlHandle, CURLOPT_URL, $url);
		// curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 
		// 'userkey='.$userkey.'&passkey='.$passkey.'&nohp='.$telepon.'&pesan='.urlencode($message));
		// curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		// curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
		// curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 0);
		// curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
		// curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
		// curl_setopt($curlHandle, CURLOPT_POST, 1);
		// $results = curl_exec($curlHandle);
		// curl_close($curlHandle);
		// $XMLdata = new SimpleXMLElement($results);
		// $status = $XMLdata->message[0]->text;
		// print_r($XMLdata);
		// echo $status;

		$url = 'https://websms.co.id/api/smsgateway?user=$username&pass=$password&to=$to&msg=$msg';

		$header = array(
		'Accept: application/json',
		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		$result = curl_exec($ch);

		echo $result;
	}

	// public function whatsapp()
	// {
	// 	$key_demo='db63f52c1a00d33cf143524083dd3ffd025d672e255cc688';
	// 	$url='http://149.28.156.46:8000/demo/send_message';
	// 	$data = array(
	// 	"no_wa"=> '+6282391440599',
	// 	"key"   =>$key_demo,
	// 	"message" =>'DEMO AKUN WOOWA. tes woowa api v3.0 mohon di abaikan'
	// 	);

	// 	$ch = curl_init($url);
	// 	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// 	curl_setopt($ch, CURLOPT_VERBOSE, 0);
	// 	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
	// 	curl_setopt($ch, CURLOPT_TIMEOUT, 360);
	// 	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	// 	'Authorization: Basic dXNtYW5ydWJpYW50b3JvcW9kcnFvZHJiZWV3b293YToyNjM3NmVkeXV3OWUwcmkzNDl1ZA=='
	// 	));
	// 	echo $res=curl_exec($ch);
	// 	curl_close($ch);
	// }

}
