<?php  include_once('lib/header.php'); 
    require_once('functions/redirect.php');
if(!isset($_SESSION['loggedIn']) ){
    //redirect to dashboard
    redirect_to("login.php");
}
?>
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <h3>Dashboard</h3> 
    </div>
   
    <div class="row h-100 justify-content-center align-items-center">
        <p class="text-success"><strong>Payment received successfully</strong></p>    
    </div>
    <div class="row h-100 justify-content-center align-items-center">
        <p>
            <a href="patients.php">Go Back</a>
        </p>    
    </div>
</div>

<?php include_once('lib/footer.php'); ?>
