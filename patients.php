<?php include_once('lib/header.php'); 


?>


<h3>Dashboard</h3>

Welcome,  <?php echo $_SESSION['fullname'] ?> you are logged in as (<?php echo $_SESSION['role'] ?>), and your ID is  <?php echo $_SESSION['loggedIn'] ?>. 

<p>
    <a class="p-2 text-dark" href="book.php">Book Appointment</a>|
    <a class="p-2 text-dark" href="pay.php">Pay Bill</a>
</p>


<?php include_once('lib/footer.php'); ?>



