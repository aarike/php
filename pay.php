<?php include_once('lib/header.php');
    require_once('functions/alert.php');
?>

<div class="row col-12">
    <h3>Online Bill Payment Form</h3>
    <p>StartNG Hospital’s online bill payment services allows you to securely submit payment by using your debit or credit card. After you have submitted payment, be sure and print a copy of the payment receipt for your own records.  The services are available 24 hours a day. </p>
</div>

    <div class="row col-8">
        
        <form method="POST" action="processpay.php">
        
            <p>
		        <?php print_alert(); ?> 
	        </p>
            <h2>Payment Information</h2>
      
            <p>
                <label class="label" for="first_name">First Name</label><br>
                <input  
                <?php              
                    if(isset($_SESSION['first_name'])){
                        echo "value=" . $_SESSION['first_name'];                                                             
                    }                
                ?>
                type="text" class="form-control" name="first_name" placeholder="First Name" required>
            </p>
            <p>
                <label class="label" for="last_name">Last Name</label><br>
                <input
                <?php              
                    if(isset($_SESSION['last_name'])){
                        echo "value=" . $_SESSION['last_name'];                                                             
                    }                
                ?>
                type="text" class="form-control" name="last_name" placeholder="Last Name" required>
            </p>
            <p>
                <label class="label" for="email">Email</label><br>
                <input
                
                <?php              
                    if(isset($_SESSION['email'])){
                        echo "value=" . $_SESSION['email'];                                                             
                    }                
                ?>

                type="text" class="form-control" name="email" placeholder="Email">
            </p>

            <p>
                <label class="label" for="amount">Amount</label><br>
                <input
                <?php              
                    if(isset($_SESSION['amount'])){
                        echo "value=" . $_SESSION['amount'];                                                             
                    }                
                ?>
                type="text" class="form-control" name="amount" placeholder="NGN">
            
            </p>
            <p>
	           <label class="label" for="message">Message Related To Payment</label><br>
               <?php              
                    if(isset($_SESSION['message'])){
                        echo "value=" . $_SESSION['message'];                                                             
                    }                
                ?>
		       <textarea name="message" cols="45" rows="5" placeholder="Write your message here..."></textarea> 
	        </p>

            <p>
                <button class="btn btn-sm btn-primary" type="submit" name= "pay">Submit</button>
            </p>
            <p>
                <a href="patients.php">Go Back</a>
            </p>

        </form>
    </div>

<?php include_once('lib/footer.php'); ?>