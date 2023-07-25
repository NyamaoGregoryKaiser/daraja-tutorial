<?php
 		header("Content-Type: application/json");

     $response = '{
         "ResultCode": 0, 
         "ResultDesc": "Confirmation Received Successfully"
     }';
 
     // DATA
     $mpesaResponse = file_get_contents('php://input');
 
     // log the response
     $logFile = "M_PESAConfirmationResponse.json";
 
     // write to file
     $log = fopen($logFile, "a");
 
     fwrite($log, $mpesaResponse);
     fclose($log);
 
     echo $response;
     //process the mpesa json response data
$mpesaResponse = file_get_contents('M_PESAConfirmationResponse.json');
$callbackContent = json_decode($mpesaResponsepesallesponse);

$Resultcode = $callbackContent->Body->stkCallback->ResultCode; 
$CheckoutRequestID = $callbackContent->Body->stkCallback->CheckoutRequestID;
$Amount = $callbackContent->Body->stkCallback->CallbackMetadata->Item[0]->Value;
$MpesaReceiptNumber = $callbackContent->Body->stkCallback->CallbackMetadata->Item[1]->Value; 
$PhoneNumber = $callbackContent->Body->stkCallback->CallbackMetadata->Item[4]->Value; 
$formatedPhone = str_replace("254", "0", $Phonelumber);

if ($Resultcode == 0) {

// Connect to db
$conn- mysqli_connect("localhost","root","","daraja");