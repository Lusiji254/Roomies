<?php
   $consumerKey = 'e3RI8Ni30ZQS2dyX6b1ph1K7Ph5rc5rW'; //Fill with your app Consumer Key
   $consumerSecret = '44AlR8UPcDIsWOgj';
 //$credentials = base64_encode('7bK5WMB7QYinPgvo994wpJnNt3gBPhJw:ucdX7GnrIv7Bndxj');
 $headers = ['Content-Type:application/json; charset=utf8'];
 $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

 $curl = curl_init($url);
 curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
 curl_setopt($curl, CURLOPT_HEADER, FALSE);
 curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
 $curl_response = curl_exec($curl);
 $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//check if  is ok
if($status == 200){
   //echo $curl_response;
 //decode response
 $dat = json_decode($curl_response,true);
 //fetch access token from response
 $access_token = $dat['access_token'];
   echo $access_token;
} else {
 //return error if authorization fails
 echo "Error ".$status;
}
 curl_close($curl);


//REGISTER_URL//
	$url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';

	//$access_token = ''; // check the mpesa_accesstoken.php file for this. No need to writing a new file here, just combine the code as in the tutorial.
	$shortCode = '600999'; // provide the short code obtained from your test credentials

	/* This two files are provided in the project. */
	$confirmationUrl = 'https://d1a9-197-156-137-145.ngrok.io/confirmation_url.php'; // path to your confirmation url. can be IP address that is publicly accessible or a url
	$validationUrl = 'https://d1a9-197-156-137-145.ngrok.io/validation_url.php'; // path to your validation url. can be IP address that is publicly accessible or a url



	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token)); //setting custom header


	$curl_post_data = array(
	  //Fill in the request parameters with valid values
	  'ShortCode' => $shortCode,
	  'ResponseType' => 'Completed',
	  'ConfirmationURL' => $confirmationUrl,
	  'ValidationURL' => $validationUrl
	);

	$data_string = json_encode($curl_post_data);

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

	$curl_response = curl_exec($curl);
	print_r($curl_response);

	echo $curl_response;
?>