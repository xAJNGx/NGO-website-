<?php
    session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>About Us</title>
  

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
                            <a class="nav-link"id="home" href="index.php">Home</a>
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
    <br><br>
    <!-- Page Heading -->
    <div id="js1">
        <div class="big-heading">
            <span style="padding-left: 0%;">About Us </span>
          
        </div>
    <!-- End of Page Heading -->
    
        <!-- About Us -->
        <div class="container">
            <div id="carouselExampleControls" class="carousel slide" data-interval='2000' data-ride="carousel ">
                <div class="carousel-inner">
                    <div class="carousel-item active"> 
                        <img class="d-block w-100" src="images/a.jpg" alt="First slide" >
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/b7.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/voluntered.jpg" alt="Third slide">
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <i class="fas fa-angle-left fa-2x" aria-hidden="true" style="color: #B7B7B7"></i>    
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <i class="fas fa-angle-right fa-2x" aria-hidden="true" style="color: #B7B7B7"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div id = "jumbo">
            Kopila-Nepal is a non-profit making, non-sectarian, non-governmental organization formally registered with District administration office of the government of Nepal in 2001.
            
            The organisation provides people a platform to serve the society and bridges the gap between the educated and the uneducated.

            Our volunteers educate and mentor childrens, help women who go through domestic violence.
                <br><br>
            <div class="container" id="js2" >
                <h3 class="big-heading" style="padding-left:25%">Vission Mission Goal</h3>
                <br>
                <div class="row">
                    <div class="col-md-6" style="text-align: justify;padding-top: 20px">
                        <p><b>Vision</b></p>
                        <p>
                            To help build a more influential, equal and socially conscious society.
                        </p>

                        <p><b>Mission</b></p>
                        <p>Kopila Nepal drives social change by fostering an environment where helpless people learn, grow and thrive.
                        
                        </p>

                        <p><b>Goal</b></p>
                        <p>
                        Kopila Nepal drives social change by fostering an environment where helpless people learn, grow and thrive.
                        </p>
                    </div>
                    <div class="col-md-6 ">
                        <img src="https://miro.medium.com/max/1200/0*UrelGhSwsS3wUASv.png" class="float-right" style="width: 400px;height: 400px;padding-bottom: 20px" >
                    </div>
                </div>
            </div>
        </div>
        <i class="fas fa-hand-point-up fa-3x" id="up-arrow" onclick="topFunction()" ></i>
    </div>
    <!--End of About Us Page -->

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
