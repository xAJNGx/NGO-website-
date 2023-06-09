<?php
session_start();
$host = "localhost:3306";
$username = "root";
$pass = "";
$dbname = "ngo";

$conn = mysqli_connect($host,$username,$pass,$dbname);

if(!$conn){
 echo "Error". mysqli_connect_error();
}
//isset checks if it is
if (isset($_POST["submit"])){
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $email =  $_POST['inputEmail'];
    $password =  $_POST['inputPassword'];
    $password2 =  $_POST['inputPassword2'];
    $dob =  $_POST['inputBirthday'];
    $contact =  $_POST['inputContact'];

    if($password != $password2)
    {
      echo '<script type="text/javascript">';
      echo ' alert("Please enter the same password.")';  //not showing an alert box.
      echo '</script>';
    }
    else
    {
      $passwordmd = password_hash($password, PASSWORD_DEFAULT);
      //write query for the info entered
      $query5 = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`, `dob`, `contact`) VALUES ('$firstname','$lastname','$email','$passwordmd','$dob','$contact')";
      //make query and get result
      $result5 = mysqli_query($conn,$query5);
      // $_SESSION['email'] = $email;
      header('location: Login.php');
    }
}

?>



<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
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
                            <a class="nav-link" id="home" href="index.php">Home</a>
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
                <span style="padding-left: 10%;">Registration</span>
              
            </div>
            <br>
    <!-- End of Page Heading -->
    <!-- Registration Form -->
        <form action="registrationpage.php" method="POST" name="registration">
            <div class="container">
                <div class="form-row d-flex justify-content-between">
                    <div class="form-group col-md-6">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" autocomplete="off">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" autocomplete="off">
                    </div>
                </div>

                <div class="form-row d-flex justify-content-between">
                    <div class="form-group col-md-4">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" autocomplete="off">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputContact">Contact Number</label>
                        <input type="text" class="form-control" id="inputContact" name="inputContact" placeholder="Contact" autocomplete="off">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputBirthday">Date of Birth</label>
                        <input type="date" class="form-control" id="inputBirthday" name="inputBirthday" autocomplete="off">
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <label for="inputPassword">Set Password</label>
                        <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword2">Confirm Password</label>
                        <input type="password" class="form-control" id="inputPassword2" name="inputPassword2" placeholder="Password" autocomplete="off">
                    </div>
                </div>
                <div style="padding-bottom: 15px;">
                    <a href="Login.php">Already a user? Log in!</a>
                </div>
                <button type="submit" name="submit" class="btn mb-5" style="background-color: #C0DBEA">
                    Sign up
                </button>
            </div>
        </form>
        <i class="fas fa-hand-point-up fa-3x" id="up-arrow" onclick="topFunction()" ></i>
    </div>
    <!-- End of Registration Page -->

    <!-- Footer -->
    <footer id="footer">
    <a href="https://www.facebook.com/kopilapokhara/"><i class="foot fab fa-facebook-f"></i></a>
    <a href="https://www.instagram.com/kopilanepalngo/?hl=en"><i class="foot fab fa-instagram"></i></a>
    <i class="foot fas fa-envelope" onclick="copyToClipboard('kopilanepal.org.np'),alert('contact info copied to clipboard')"></i>
    <i class="foot fas fa-phone-alt" onclick="copyToClipboard('922222222'),alert('contact info copied to clipboard')"></i>
    <p class="p-foot">© Copyright 2023 Kopila Nepal</p>
  </footer>
    <!-- End of Footer -->
    <!-- JS Scripts -->
        <script type="text/javascript" src="project.js"></script>
        <script>// Jquery form validation
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

                        inputPassword: {
                        required: true,
                        minlength: 5
                        },
                        inputBirthday : "required",
                        errorClass: "invalid",
                    },

                    // Specify validation error messages
                    messages: {
                        firstName: "**Please enter your firstname",
                        lastName: "**Please enter your lastname",
                        inputPassword: {
                        required: "**Please provide a password",
                        minlength: "**Your password must be at least 5 characters long"
                        },
                        inputEmail: "**Please enter a valid email address",
                        inputBirthday : "**Select Birthday",

                        inputContact : "** Please enter a valid contact number"
                    },
                    // Make sure the form is submitted to the destination defined
                    // in the "action" attribute of the form when valid
                    submitHandler: function(form) {
                      form.submit();
                    }
                });
            });C

        </script>
</body>
</html>
