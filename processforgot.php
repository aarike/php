<?php session_start();

$errorCount = 0; 

$email = $_POST['email'] != "" ?$_POST['email'] : $errorCount++;
$_SESSION['email'] = $email;

if($errorCount > 0){
    
     $session_error = "you have " . $errorCount . " error";
        
    if ($errorCount > 1) {
       $session_error .= "s";
    }
    
    $session_error .= " in your form submission";
    $_SESSION["error"] = $session_error;
        
    header("Location: forgot.php"); 
       
       
}else {

    $allUsers = scandir("db/users/");
    $countAllUsers = count($allUsers);

    for ($counter = 0; $counter < $countAllUsers ; $counter++) {

        $currentUser = $allUsers[$counter];

        if($currentUser == $email . ".json"){

            $subject = "Password Reset Link";
            $message = "A password reset has been initiated from your account, if you did not initiate this reset, please ignore this message, otherwise, visit: localhodt/snh/reset.php";
            $headers = "From: no-reply@snh.org" . "\r\n" .
            "CC: jummy@snh.org";
            
           $try = mail($email,$subject,$message,$headers);

           print_r($try);
           die();
            

           if($try){

            $_SESSION["error"] = "Password reset has been sent to your email: " . $lemail;
            header("Location: login.php");
           }else{

            $_SESSION["error"] = "Something went wrong, we could not send password reset to " . $email;
            header("Location: forgot.php");
           }
           
           die();


        }

    }

    $_SESSION["error"] = "Email not registered with us ERR: " . $email;
    header("Location: forgot.php");
}