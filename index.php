<?php include_once('lib/header.php'); ?>

    <p>
	    <?php
		    if (isset($_SESSION['error']) && !empty($_SESSION['error'])) { 
				echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
					  
				session_destroy();
		    }
	    ?> 
    </p>

    Welcome to SNH: Hospital for the ignorant <br><hr>
    <p>This is a specialist hospital to cure ignorance!</p>
	<p>Come as you are, it is completely free!</p>
    
<?php include_once('lib/footer.php'); ?>