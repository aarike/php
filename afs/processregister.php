<?php session_start();

$errorCount = 0; 

$first_name = $_POST['first_name'] != "" ?$_POST['first_name'] : $errorCount++;
$last_name = $_POST['last_name'] != "" ?$_POST['last_name'] : $errorCount++;
$email = $_POST['email'] != "" ?$_POST['email'] : $errorCount++;
$password = $_POST['password'] != "" ?$_POST['password'] : $errorCount++;
$gender = $_POST['gender'] != "" ?$_POST['gender'] : $errorCount++;
$designation = $_POST['designation'] != "" ?$_POST['designation'] : $errorCount++;
$department  = $_POST['department'] != "" ?$_POST['department'] : $errorCount++;

$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;
$_SESSION['email'] = $email;
$_SESSION['gender'] = $gender;
$_SESSION['designation'] = $designation;
$_SESSION['department'] = $department;


if($errorCount > 0){
    $session_error = "you have " . $errorCount . " error";
    
    if ($errorCount > 1) {
       $session_error .= "s";
    }

    $session_error .= " in your form submission";
    $_SESSION["error"] = $session_error;
    
   header("Location: register.php");
}else {
    
    $allUsers = scandir("db/users/");

    $countAllusers = count($allUsers);

    $newuserId = $countAllusers-1;


    $userObject = [
        "id" =>$newuserId,
        "first_name" =>$first_name,
        "last_name" =>$last_name,
        "email" =>$email,
        "password" =>password_hash($password, PASSWORD_DEFAULT),
        "gender" =>$gender,
        "designation" =>$designation,
        "department" =>$department
    ];

    
    for ($counter = 0; $counter < $countAllUsers ; $counter++) {

        $currentUser = $allUsers[$counter];

        if($currentUser == $email . ".json"){
            $_SESSION["error"] = "Registration Failed, User already exits ";
            header("Location: register.php");
            die();
        }

    }
    //save in the database;
    file_put_contents("db/users/". $email . ".json", json_encode($userObject));
    $_SESSION["message"] = "Registration Successful, you can now login " . $first_name;
    header("Location: login.php");
}

//validating email
if (!stristr($email,"@") OR !stristr($email,".")) {
    $_SESSION["error"] = "Email address is not correct.";
    header("Location: register.php");
}


//validating first name
if (!preg_match("/^[a-zA-Z]*$/",$first_name)) {
    $_SESSION["error"] = "Name can only contain letters and white space.";
    header("Location: register.php");
}

//validating last name
if (!preg_match("/^[a-zA-Z]*$/",$last_name)) {
    $_SESSION["error"] = "Name can only contain letters and white space.";
    header("Location: register.php");
}


?>