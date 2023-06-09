<?php
    session_start();
    if(!isset($_SESSION['email']))
    {

        header('location: Login.php');
    }
	else
	{
		$host = "localhost:3306";
		$username = "root";
		$pass = "";
		$dbname = "ngo";

		$conn = mysqli_connect($host,$username,$pass,$dbname);


		if(!$conn)
		{
			echo "connection error" . mysqli_connect_error();  
		}
		else
		{
   			echo "successful";
		}

		$query = "SELECT * FROM events where date >= CURDATE()";
		$result = mysqli_query($conn, $query);
		$check_events = mysqli_num_rows($result) > 0;

		$email = $_SESSION['email'];
	    $user = "SELECT * FROM users WHERE email='$email'";
	    $result_u = mysqli_query($conn, $user);
	    $row = mysqli_fetch_assoc($result_u);
	    $userid = $row['user_id'];



	    if (isset($_POST["sub"]))
    	{
	        $chapter = $_POST['inputChapter'];
	        $event = $_POST['inputEvent'];
	    
	        $query_d = "INSERT INTO `volunteers`(`user_id`,`chapter`, `event_name`) VALUES ('$userid','$chapter', '$event')";
	        echo $query_d;
	      //make query and get result
	        $result_d = mysqli_query($conn,$query_d);
	        echo "inserted successfully";
   		}   



	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Volunteer</title>
        <!-- bootstrap scripts -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

        <!-- Css stylesheets -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel="stylesheet" href="project.css">

        <!-- font awesome -->
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">

        <!-- Google Fonts -->
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Ubuntu&display=swap" rel="stylesheet">

        <!-- Jquery CDN -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

	        <style>
	          	.error{
	            	color: red;
	          	}
	        </style>
    </head>
    <body>
		<!-- Nav Bar -->
		<div class="container-fluid">
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: #B7B7B7">
            <a class="navbar-brand" href="index.php">
                <img src="logo1.svg" width="100" height="80" alt="logo"
                    loading="lazy">Kopila Nepal</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <?php if( isset($_SESSION['email']) && !empty($_SESSION['email']) )
                        {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" id="home" href="user_dashboard.php">Profile</a>
                        </li>
                        <?php } else 
                        {
                        ?>
                        
                        <li class="nav-item">
                            <a class="nav-link" id= "home" href="index.php">Home</a>
                        </li>

                        <?php } ?>
    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Know Us</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="aboutus.php">Our Aim</a>
                            <a class="dropdown-item" href="events.php">Events</a>
                            <a class="dropdown-item" href="volunteer.php">Volunteer Now!</a>
                            </div>
                        </li>
                        <?php if( isset($_SESSION['email']) && !empty($_SESSION['email']) )
                       {
                        ?>
                    <li class="nav-item">
                <a class="nav-link" id="signout" href="logout.php" onclick="return confirm('Are you sure to logout?');">Sign Out</a>
              </li>
            <?php }else{ ?>
              <li class="nav-item">
                <a class="nav-link" id="signup" href="Login.php">Sign Up/Login</a>
              </li>
            <?php } ?>
              
              <li class="nav-item">
                <a class="nav-link" id="donate" href="donation.php">DONATE!</a>
              </li>
                        
                        
                  
                </ul>
            </div>
        </nav>
    </div>
		<!-- End of Navbar -->
				<br>
    <!-- Page Heading -->
        <div id="js1">
            <div class="big-heading">
            	<span style="padding-left: 6%;"> Volunteer Now! </span>
               
            </div>
    <!-- End of Page Heading -->
    <!-- Volunteer Page -->
		    <form action="volunteer.php" method="post" name="registration">
		        <div class="container"> 
		            </div>
		            <div class="form-group col-md-4">
		            <label for="inputEvent">Events</label>
		            <select class="custom-select form-control" id="inputEvent" name="inputEvent"> 
		            	<?php 
						if($check_events)
						{
							while($row = mysqli_fetch_assoc($result))
							{
								
							?>	 
		                <option><?php echo $row['name_of_event']; ?></option> 
		                <?php
				  					
							}
						}
				  		?>
		            </select> 
		        </div>
		        </div>
		        <button type="submit" class="btn mb-5"  name = "sub"  style="background-color: #C0DBEA">
		            Register
		        </button>
		        </div>
		    </form>
	    	<i class="fas fa-hand-point-up fa-3x" id="up-arrow" onclick="topFunction()" ></i>
	    </div>
    <!-- End of Volunteer Page -->

    <!-- Footer -->
	<footer id="footer">
    <a href="https://www.facebook.com/kopilapokhara/"><i class="foot fab fa-facebook-f"></i></a>
    <a href="https://www.instagram.com/kopilanepalngo/?hl=en"><i class="foot fab fa-instagram"></i></a>
    <i class="foot fas fa-envelope" onclick="copyToClipboard('kopilanepal.org.np'),alert('contact info copied to clipboard')"></i>
    <i class="foot fas fa-phone-alt" onclick="copyToClipboard('922222222'),alert('contact info copied to clipboard')"></i>
    <p class="p-foot">© Copyright 2023 Kopila Nepal</p>
  </footer>
    <!-- JS Scripts -->
        <script type="text/javascript" src="project.js"></script> 
        <script>
    		$(function() {
			  	// Initialize form validation on the registration form.
			 	// It has the name attribute "registration"
			  	$("form[name='registration']").validate({
    

    			// Specify validation rules
			    rules: {
			      	// The key name on the left side is the name attribute
			      	// of an input field. Validation rules are defined
			      	// on the right side
			      	firstName: "required",
			      	lastName: "required",
			      	inputContact : {
			        required : true,
			        minlength : 7
			    	},
			      	inputEmail: {
			        	required: true,
				        // Specify that email should be validated
				        // by the built-in "email" rule
				        email: true
			      	},
			      	inputAddress: {
				        required: true,
				        minlength: 5
				    },
				    inputBirthday : "required",
				    inputEvent : "required",
				    errorClass: "invalid",
			    },
			    // Specify validation error messages
			    messages: {
			      	firstName: "**Please enter your firstname",
			      	lastName: "**Please enter your lastname",
			      	inputAddress: {
			        	required: "**Please provide an address",
			        	minlength: "**Your address must be at least 5 characters long"
			      	},
			      	inputEmail: "**Please enter a valid email address",
			      	inputBirthday : "**Select Birthday",
			      	inputEvent : "Select an event",
			      	inputContact : "** Please enter a valid contact number"
			    },
			    // Make sure the form is submitted to the destination defined
			    // in the "action" attribute of the form when valid
			    submitHandler: function(form) {
			      	form.submit();
			    }
			});
		});
	</script>

</body>
</html>