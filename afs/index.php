<?php include_once('lib/header.php'); ?>

    <p>
	    <?php
		    if (isset($_SESSION['error']) && !empty($_SESSION['error'])) { 
				echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
					  
				session_destroy();
		    }
	    ?> 
    </p>

    Welcome to Ari's Studio : This is a slow Fashion <br><hr>
    <p>Your piece will be made to last.</p>
    
<?php include_once('lib/footer.php'); ?>