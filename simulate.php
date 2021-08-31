  
<?php
//simulate
    $url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate';
    
    $access_token = ''; // check file mpesa_accesstoken.php.    
    $ShortCode  = '600999'; // Shortcode. Same as the one on register_url.php
    $amount     = '12010'; // amount the client/we are paying to the paybill
    $msisdn     = '254708374149'; // phone number paying 
    $billRef    = 'BK1'; // This is anything that helps identify the specific transaction. Can be a clients ID, Account Number, Invoice amount, cart no.. etc

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer 81rIzhZpBHqaG71bYVCBfFQSaXfI'));


    $curl_post_data = array(
           'ShortCode' => $ShortCode,
           'CommandID' => 'CustomerPayBillOnline',
           'Amount' => $amount,
           'Msisdn' => $msisdn,
           'BillRefNumber' => $billRef
    );

    $data_string = json_encode($curl_post_data);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);


    $curl_response = curl_exec($curl);
    print_r($curl_response);

    $mpesaResponse = $curl_response ;

		// log the response
		$logFile = "M_PESAConfirmationResponse.txt";
		
		// write to file
		$log = fopen($logFile, "a");

		fwrite($log, $mpesaResponse);
		fclose($log);

    echo $curl_response;
?>