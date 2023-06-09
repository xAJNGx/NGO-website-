<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Remove an Event</title>
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
                <a class="navbar-brand" href="#">
                    <img src="logo1.svg" width="100" height="80" class="d-inline-block align-top" alt="" loading="lazy">Admin Page</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Operations</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="events_form.php">Add an Event</a>
                                <a class="dropdown-item" href="events_delete_form.php">Remove an Event</a>
                                <a class="dropdown-item" href="volunteers_info.php">Volunteer Information</a>
                                <a class="dropdown-item" href="donation_info.php">Donation Information</a>
                            </div>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" id="signup" href="index.php" onclick="return confirm('Are you sure to logout?');">Sign Out</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End of Navbar -->
                <br><br>
    <!-- Page Heading -->
    <div id="js1">
        <div class="big-heading">Remove an Event
        </div>
    <!-- End of Page Heading -->
    <!-- Login Page -->
        <form action="events_delete_middleware.php" method="post" name="registration">
            <div class="container" style="margin-top: 30px;">
                

                 <div class="form-row d-flex justify-content-center">
                    <div class="form-group col-md-7">
                        <label for="nameofevent" class="col-form-label">Name of event</label>
                        <input type="text" class="form-control" id="nameofevent" name="nameofevent" placeholder="Name of event">
                    </div>
                </div>

                 
                
                <button type="submit" name="sub" class="btn btn-danger mb-5">Remove</button> 
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

</body>
</html>