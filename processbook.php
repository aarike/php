<?php session_start();
require_once('functions/user.php');
require_once('functions/alert.php');

$errorCount = 0;

$full_name = $_POST['full_name'] != "" ? $_POST['full_name'] :  $errorCount++;
$email = $_POST['email'] != "" ? $_POST['email'] :  $errorCount++;
$birthdate = $_POST['birthdate'] != "" ? $_POST['birthdate'] :  $errorCount++;
$date_appointment = $_POST['date_appointment'] != "" ? $_POST['date_appointment'] :  $errorCount++;
$time_appointment = $_POST['time_appointment'] != "" ? $_POST['time_appointment'] :  $errorCount++;
$nature_appointment = $_POST['nature_appointment'] != "" ? $_POST['nature_appointment'] :  $errorCount++;
$initial_complaint = $_POST['initial_complaint'] != "" ? $_POST['initial_complaint'] :  $errorCount++;

$_SESSION['full_name'] = $full_name;
$_SESSION['email'] = $email;
$_SESSION['birthdate'] = $birthdate;
$_SESSION['date_appointment'] = $date_appointment;  
$_SESSION['time_appointment'] = $time_appointment;
$_SESSION['nature_appointment'] = $nature_appointment;
$_SESSION['initial_complaint'] = $initial_complaint;


if($errorCount > 0){

    $session_error = "You have " . $errorCount . " error";
    
    if($errorCount > 1) {        
        $session_error .= "s";
    }

    $session_error .=   " in your form submission";
    $_SESSION["error"] = $session_error ;

    header("Location: book.php");

}else{

     $newUserId = ($countAllUsers-1);

     $userObject = [
        'id'=>$newUserId,
        'full_name'=> $full_name,
        'email'=>$email,
        'birthdate'=>$birthdate,
        'date_appointment'=>$date_appointment,
        'time_appointment'=>$time_appointment,
        'nature_appointment'=>$nature_appointment,
        'initial_complaint'=>$initial_complaint,
    ];


    
    file_put_contents("db/appointments/". $userObject['email'] . ".json", json_encode($userObject));


    $_SESSION["message"] = "Appiontment booked " . $full_name;
    header("Location: patients.php");
}

?>