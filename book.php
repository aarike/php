<?php include_once('lib/header.php');
 require_once('functions/redirect.php');
if(!isset($_SESSION['loggedIn']) ){
    //redirect to dashboard
    redirect_to("book.php");
}

?>
<div class="container">
    <div class="row col-6">
        <h3>Book Appointment</h3>
    </div>
    <div class="row col-6">
        
        <form method="POST" action="processbook.php">   
            <p>
                <label class="label" for="full_name">Full Name</label><br>
                <input
                <?php              
                    if(isset($_SESSION['full_name'])){
                        echo "value=" . $_SESSION['full_name'];                                                             
                    }                
                ?>
                 type="text" class="form-control" name="full_name" placeholder="Full Name" required>
            </p>

            <p>
                <label class="label" for="email">Email</label><br>
   		        <input 
                   <?php              
                    if(isset($_SESSION['email'])){
                        echo "value=" . $_SESSION['email'];                                                             
                    }                
                ?>
                   type="text" class="form-control" name="email" placeholder="Email" required>
	        </p>
            <p>
                <label class="label" for="birthdate">Date of Birth</label><br>
                <input 
                <?php              
                    if(isset($_SESSION['birthdate'])){
                        echo "value=" . $_SESSION['birthdate'];                                                             
                    }                
                ?>
                type="date" class="form-control" name="birthdate">
	        </p>
        
            <p>
                <label class="label" for="date_appointment">Date of Appointment</label><br>
                <input 
                <?php              
                    if(isset($_SESSION['date_appointment'])){
                        echo "value=" . $_SESSION['date_appointment'];                                                             
                    }                
                ?>
                type="date" class="form-control" name="date_appointment">
            </p>
            <p>
                <label class="label" for="time_appointment">Time of Appointment</label><br>
                <input 
                <?php              
                    if(isset($_SESSION['time_appointment'])){
                        echo "value=" . $_SESSION['time_appointment'];                                                             
                    }                
                ?>
                type="time" class="form-control" name="time_appointment">
            </p> 

            <p>
                <label class="label" for="nature_appointment">Nature of Appointment</label><br>
                <select class="form-control" name="nature_appointment" required>
                
                    <option value="">Select One</option>
                    <option 
                    <?php              
                        if(isset($_SESSION['nature_appointment']) && $_SESSION['nature_appointment'] == 'Consultation'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >Consultation</option>
                    <option 
                    <?php              
                        if(isset($_SESSION['nature_appointment']) && $_SESSION['nature_appointment'] == 'Therapy Section'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >Therapy Section</option>
                    <option 
                    <?php              
                        if(isset($_SESSION['nature_appointment']) && $_SESSION['nature_appointment'] == 'General Surgery'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >General Surgery</option>
                    <option 
                    <?php              
                        if(isset($_SESSION['nature_appointment']) && $_SESSION['nature_appointment'] == 'Dental Care'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >Dental Care</option>
                    <option 
                    <?php              
                        if(isset($_SESSION['nature_appointment']) && $_SESSION['nature_appointment'] == 'Other'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >Other</option>
                </select>
            </p>    
            <p>
	           <label class="label" for="initial_complaint">Initial Complaint</label><br>
		       <textarea
               <?php              
                    if(isset($_SESSION['initial_complaint'])){
                        echo "value=" . $_SESSION['initial_complaint'];                                                             
                    }                
                ?>
                name="initial_complaint" cols="45" rows="5" placeholder="Write your complaint here..."></textarea> 
	        </p>

            <p>
                <button class="btn btn-sm btn-primary" type="submit">Submit Form</button>
            </p>

            <p>
                <a href="pay.php">Pay Bill</a> |
                <a href="patients.php">Go Back</a>
            </p>
        </form>
    </div>
</div>
<?php include_once('lib/footer.php'); ?>