<?php
    session_start();
    $host = "localhost:3306";
    $username = "root";
    $pass = "";
    $dbname = "ngo";

    $conn = mysqli_connect($host,$username,$pass,$dbname);

    if(!$conn){
    echo "connection error" . mysqli_connect_error();  
    }else{
        echo "successful";
    }

    if (isset($_POST["submit_admin"]))
    {
        $password = $_POST['inputAdminPass'];
        $email =  $_POST['inputAdminEmail'];
        echo $email;
            
        $query = "SELECT * FROM admin WHERE admin_email='$email' AND admin_pass='$password'";
        echo $query;

        $result = mysqli_query($conn, $query);

        $get = mysqli_fetch_assoc($result);

        if($get['admin_email'] == $email && $get['admin_pass'] == $password)
        {   
            // $_SESSION['email'] = $email;
                    
            // $_SESSION['success'] = "You are now logged in";
            header('location: volunteers_info.php');
                        
        }
        else 
        {
            echo "Password is incorrect.";
        }    
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
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

        <!-- JS Scripts -->
            <script type="text/javascript" src="project.js"></script> 

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
                    <img src="logo1.svg" width="100" height="80"  alt="" loading="lazy">Admin Page</a>
                </div>
            </nav>
        </div>
        <!-- End of Navbar -->
<br>
    <!-- Page Heading -->
    <div id="js1">
        <div class="big-heading">Admin Login
        </div>
    <!-- End of Page Heading -->
    <!-- Login Page -->
        <form action="adminlogin.php" method="POST" name="registration">
            <div class="container">
                <div class="form-row d-flex justify-content-center">
                    <div class="form-group col-md-7">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail3" name="inputAdminEmail" placeholder="Email">
                    </div>
                </div>

                <div class="form-row d-flex justify-content-center">
                    <div class="form-group col-md-7">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label> 
                        <input type="password" class="form-control" id="inputPassword3" name="inputAdminPass" placeholder="Password">
                    </div>
                </div>

                <div class="form-group form-check" >
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div>
            
                <button type="submit" name="submit_admin" class="btn mb-5" style="background-color: #70ADB5">Submit</button> 
            </div>
        </form>
        <i class="fas fa-hand-point-up fa-3x" id="up-arrow" onclick="topFunction()" ></i>
    </div>
    <!-- End of Login Page -->

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
          
          
                    inputEmail3: {
                        required: true,
                        // Specify that email should be validated
                        // by the built-in "email" rule
                        email: true
                    },
                    inputPassword3: {
                        required: true,
                        minlength: 5
                    },
          
                    errorClass: "invalid",
                    },
                    // Specify validation error messages
                    messages: {
                        inputPassword3: {
                        required: "**Please provide a password",
                        minlength: "**Your password must be at least 5 characters long"
                    },
                    inputEmail3: "**Please enter a valid email address",
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