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
?>