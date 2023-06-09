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


$query = "SELECT * FROM events";
$result = mysqli_query($conn, $query);
$check_events = mysqli_num_rows($result) > 0;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Events</title>
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
                            <a class="nav-link"id="home" href="user_dashboard.php">Profile</a>
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
	<!-- Page Heading -->
	<br>
    <div id="js1">
        <div class="big-heading">
        	<span style="padding-left: 0%;"> Events </span>
          
        </div>
	<br>
    <!-- End of Page Heading -->
	<!-- Events -->
	<div class="container text-justify">
		<p>
			Event is an outreach program that serves multiple purposes for an organization. It can help raise awareness for a cause, act as a fundraising event, allows donor to engage with the grants beneficiary, and raise the spirit of giving.
		<p>
			Our events provide exciting and creative opportunities to engage with NL and our work nurturing and helping people from all walks of life, connecting with them through art and support our efforts across the world.
		</p>
		<p>
			Whether you’re an individual or a company, take a look below for more information on our events and how you can get involved. Please do get in touch with the team at contact@nurturinglives.org or on 922222222 for more information.
		</p>
	</div>
	
	<!-- <div class="big-heading">Upcoming Events</div> -->
	<div class="container-fluid mx-auto">
		<div class="row">

			<?php 
			if($check_events)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					if($row['date'] >= date("Y-m-d"))
					{
				?>	
					<div class="col-sm-6 col-md-4 col-lg-3">
	    				<div class="card bg-transparent img-wrapper">

	    			<img src= "<?php  echo $row['imageurl']; ?>"  class="card-img-top" alt="..."> 
	      			<div class="card-body">
	        			<h5 class="card-title"><?php echo  $row['name_of_event'];  ?> <a href="volunteer.php"><i class="far fa-heart"></i></a></h5>
	        			<p class="card-text"><?php echo $row['description']; ?></p>
	        			<b><i class="fas fa-calendar-alt"></i> <?php echo $row['date']; ?></b>
	      			</div>
	      			<div class="card-footer">
	      				<span>
	      					<a href="https://www.google.com/maps/place/<?php  echo $row['address']; ?>"><i class="fas fa-map-marker-alt"></i></a>
	      				</span><?php  echo $row['address']; ?> 
	      			</div>
	    		</div>
	  		</div>

	  		<?php
				}
			}
		}
	  		?>
	  	</div>
	  </div>
	  <?php
$query1 = "SELECT * FROM events";
$result1 = mysqli_query($conn, $query);
$check_events1 = mysqli_num_rows($result) > 0;

?>




	  		<div class="big-heading ">Past Events</div>
	<div class="container-fluid mx-auto">
		<div class="row">
			<?php 
			if($check_events1)
			{
				while($row1 = mysqli_fetch_assoc($result1))
				{
					
					if($row1['date'] < date("Y-m-d"))
					{
				?>	
	  		<div class="col-sm-6 col-md-4 col-lg-3">
	    		<div class="card bg-transparent img-wrapper">
	    			<img src="<?php echo $row1['imageurl']; ?>" class="card-img-top" alt="...">
	      			<div class="card-body">
	        			<h5 class="card-title"><?php echo  $row1['name_of_event'];  ?> </h5>
	        			<p class="card-text"><?php echo $row1['description']; ?></p>
	      			</div>
	      			<div class="card-footer">
	      				<?php  echo $row1['address']; ?>
	      			</div>
	    		</div>
	  		</div>
	  		<?php
	  			}		
				}
			}
	  		?>
	  		
		</div>
		<i class="fas fa-hand-point-up fa-3x" id="up-arrow" onclick="topFunction()" ></i>
    </div>

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
	  		