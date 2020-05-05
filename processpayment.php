<?php require_once('functions/alert.php');
require_once('functions/user.php');
require_once('functions/redirect.php');

if (isset($_GET['txref'])) {
    $ref = $_GET['txref'];
    $amount = $_SESSION['amount']; //Correct Amount from Server
    $currency = "NGN"; //Correct Currency from Server
    

    $query = array(
        "SECKEY" => "FLWSECK_TEST-babb91109955b718401a2e4b3fc8ba3b-X",
        "txref" => $ref
    );

    $data_string = json_encode($query);
            
    $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');                                                                      
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                              
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $response = curl_exec($ch);

    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header = substr($response, 0, $header_size);
    $body = substr($response, $header_size);

    curl_close($ch);

    $resp = json_decode($response, true);

    $paymentStatus = $resp['data']['status'];
    $chargeResponsecode = $resp['data']['chargecode'];
    $chargeAmount = $resp['data']['amount'];
    $chargeCurrency = $resp['data']['currency'];
    $transactionRef = $rep['data']['txref'];
    $customerFullname =  $rep['data']['full_name'];
    $customerEmail =  $rep['data']['customer_email'];

    $paymentDetails = [

        
        'full_name'=>$customerFullname,
        'customer_email'=>$customerEmail,
        'amount'=>$chargeAmount,
        'currency'=>$chargeCurrency,
        'txref'=>$transactionRef,
        'status'=>$paymentstatus,
        
        
    ];
    $_SESSION['$paymentDetails'] = $paymentDetails;

    if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {
     

      $subject = "Tansaction successful ";
      $message = " Your payment with Startng Hospital is successful, here is your Reference number : ".$transactionRef;

      file_put_contents("db/payments/". $paymentDetails['customer_email'] . ".json", json_encode($paymentDetails));
        

      send_mail($subject,$message,$customerEmail);
      
      $_SESSION["message"] = "Payment successful, Reference number will be sent to your mail.";
      redirect_to("patients.php");

    } else {
      
      redirect_to("fail.php");
    }
}
   