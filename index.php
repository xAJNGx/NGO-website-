<?php
    session_start();
    $host = "localhost:3306";
    $username = "root";
    $pass = "";
    $dbname = "ngo";
    $conn = mysqli_connect($host,$username,$pass,$dbname);
    if(!$conn)
    {
      echo "Error". mysqli_connect_error();
    }
    
 ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.3">
  <title>KOPILA NEPAL</title>

  <!-- bootstrap scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  <!-- Css stylesheets -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/index.css" type="text/css">

  <!-- font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Ubuntu&display=swap" rel="stylesheet">


<body>

  <section id="title">
    <!-- Title -->
    <div class="container1">
      <img src="images/ngo.jpg" alt="Snow" width=100%>
        <div class="centered  big-heading">Give back to the society by volunteering or donating.</div> 
    </div>
    <div class="container-fluid">


    <!-- Nav Bar -->
    <div class="container-fluid">
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color:  #B7B7B7">
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
    <!-- End of Navbar-->
  </section>

  <!-- Features -->
  <section id="features">
    <div class="row">
      <div class="col-lg-4 col-md-12 feature-box">
        <i class="fas fa-check-circle fa-3x fa-img"></i>
        <h3 class="feat">Verified</h3>
        <p class="fa-p">Goverment approved NGO.</p>
      </div>
      <div class="col-lg-4 col-md-12 feature-box">
        <i class="fas fa-peace fa-3x fa-img"></i>
        <h3 class="feat">Trustworthy</h3>
        <p class="fa-p">A non profit organization since 2001.</p>
      </div>
      <div class="col-lg-4 col-md-12 feature-box">
        <i class="fas fa-heart fa-3x fa-img"></i>
        <h3 class="feat" style="color:#132743;">Donate</h3>
        <p class="fa-p">Donate for them.</p>
      </div>
    </div>
  </section>

  <!-- Vision and Mission -->
  <section id="vision">
    <div class="">
      <h2 class="big-heading">Vision:</h2>
      <p class="vision-text">
        To help build a more influential, equal and socially conscious society.
      </p>
      <h2 class="big-heading">Mission:</h2>
      <p class="vision-text">
      Kopila Nepal drives social change by fostering an environment where young adults & children learn, lead and thrive.
      </p>
      <a type="button" class="btn btn-outline-light btn-lg download-button" href="aboutus.php">Learn More!</i></a>
    </div>
  </section>

  <!-- About Us Link -->
  <section id="AboutArea">
    <div class="row">
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="about_img">
            <img src="images/img4.jpg" class="img-fluid" alt="VOLUNTEERS">
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="about_content">
            <h2 class="about_heading">
              We are a nonprofit team <br>
              and we encourage you too
            </h2>
            <p class="vision-text">
              Kopila Nepal promotes the development and well-being of everyone
              so that they may individually and collectively reach their fullest potential.
            </p>
            <p class="vision-text">
              Our team works hard to find ways to create a level playing field for
              children with intellectual and developmental challenges, so that they
              too, can play a meaningful role in building tomorrow’s world.
            </p>
            <a type="button" class="btn btn-outline-success btn-md download-button" href="events.php">Learn more!</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- World Map -->
  <section id="wmap">
    <h3 class="big-heading">We are located here. <i class="fas fa-globe-asia"></i></h3>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4610.517503830985!2d83.96507867404233!3d28.211302070713536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3995950187750a83%3A0xa27faf2d6e8de5ac!2sKopila%20Nepal!5e0!3m2!1sen!2snp!4v1684309812395!5m2!1sen!2snp"
            width="600" height="300px" frameborder="0" style="border:0" title="worldmap"></iframe>
  </section>

  <!-- Count -->
  <section id="count">
    <div class="row">
      <div class="col-lg-5 col-md-12">
        <i class="fas fa-hands-helping fa-img fa-4x"></i>
        <br>
        <h1 class="count-text">
            <?php 
                $query = "SELECT count(distinct user_id) AS numbers_of_volunteer FROM volunteers";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                echo $row['numbers_of_volunteer'];
              ?>
      </h1>
        <p class="count-desc">VOLUNTEERS ENGAGED THIS YEAR</p>
      </div>
      <div class="col-lg-1 col-md-12">
        <i class="far fa-calendar-alt fa-img fa-4x"></i>
        <br>
        <h1 class="count-text">21</h1>
        <p class="count-desc">YEARS OF SERVICE</p>
      </div>
      <div class="col-lg-5 col-md-12">
        <i class="fas fa-money-check-alt fa-img fa-4x"></i>
        <br>
        <h1 class="count-text">
            <?php 
                $query = "SELECT sum(total_amount) AS total_donation FROM donation_amount";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                echo $row['total_donation'];
              ?> 
        </h1>
        <p class="count-desc">FUNDS RAISED THIS YEAR</p>
      </div>
    </div>
  </section>

  <section id="wmap">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-md-6">
								<div class="contact-wrap w-100 p-lg-5 p-4">
									<h3 class="big-heading">Send us a message</h3>
									<div id="form-message-warning" class="mb-4"></div> 
									<form action="contactmessage.php" method="POST" >
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="cname" id="cname" placeholder="Name">
												</div>
											</div>
											<div class="col-md-12"> 
												<div class="form-group">
													<input type="email" class="form-control" name="cemail" id="cemail" placeholder="Email">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="csubject" id="csubject" placeholder="Subject">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<textarea  class="form-control" name="cmessage" id="cmessage" cols="30" rows="6" placeholder="Message"></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" name="submit" value="Send Message" class="btn mb-5">
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-md-6 d-flex align-items-stretch">
								<div class="info-wrap w-100 p-lg-5 p-4 img">
									<h3 class="big-heading">Contact us</h3>
                  <br><br><br>
									<p class="vision-text">We're open for any suggestion or just to have a chat</p>
				        	<div class="dbox w-100 d-flex align-items-start">
                    <br>
				        		<div class="">
				        			<span class="fa fa-map-marker"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>Address:</span> KOPILA-Nepal PO Box 287 Bulaundi 6, Pokhara Nepal</p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-center">
				        		<div class="message">
				        			<span class="fa fa-phone"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>Phone:</span> <a href="tel://1234567920">+977 (0)61-463486; +977 (0)61-466403</a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-center">
				        		<div class="message">
				        			<span class="fa fa-paper-plane"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>Email:</span> <a href="#">kopilanepal@org.com</a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-center">
				        		<div class="message">
				        			<span class="fa fa-globe"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>Website</span> <a href="https://kopilanepal.org.np/">https://kopilanepal.org.np/</a></p>
					          </div>
				          </div>
			          </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
  <!-- start of arrow -->
  <i class="fas fa-hand-point-up fa-3x" id="up-arrow" onclick="topFunction()" ></i>
    </div>
    <!-- End of landing page Page -->


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
    <script src="index.js" charset="utf-8"></script>
    <script src="js/jquery.min.js"></script>
            
</body>

</html>
