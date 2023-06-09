    <?php
        session_start();
        if(!isset($_SESSION['email']))
        {
           header('location: Login.php');
        }
        else
        {
        	// session_start();
			$host = "localhost:3306";
			$username = "root";
			$pass = "";
			$dbname = "ngo";

			$conn = mysqli_connect($host,$username,$pass,$dbname);

			if(!$conn)
			{
 				echo "Error". mysqli_connect_error();
			}
			
			$email = $_SESSION['email'];
    		$user = "SELECT * FROM users WHERE email='$email'";
    		$result_u = mysqli_query($conn, $user);

    		$row = mysqli_fetch_assoc($result_u);
    		$userid = $row['user_id'];
        }

    ?>
        

<!DOCTYPE html>
<html>
    <head>
		<title>Profile</title>
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
	</head>
    <body>
        <!-- Nav Bar -->
		<div class="container-fluid">
		    <nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: #B7B7B7">
		  		<a class="navbar-brand" href="index.php">
		  			<img src="logo1.svg" width="100" height="80" class="d-inline-block align-top" alt="events.php" loading="lazy">Kopila Nepal</a>
		  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">Know Us</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="aboutUs.php">Our Aim</a>
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
		<br>
		<!-- End of Navbar -->
		<!-- start of user page -->
		<div class="container-fluid text-left" style="padding-left:100px;">

			<h3>
				<?php 
				echo " Welcome " . $_SESSION['email'];
				?>
			</h3>
			<hr>
			<!-- <div>
					<h4 class="text-center">
					Associated with chapter: 
					</h4>
			</div> -->
			<div class="row">
				<div class="col-sm-12 col-md-6 d-flex justify-content-center">
						<div class="card bg-transparent img-wrapper" style="width: 25rem;">
							<img src="https://images.unsplash.com/photo-1526976668912-1a811878dd37?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" class="card-img-top" alt="..." style=" height:18rem;">
							<div class="card-body">
								<h5 class="card-title">Events volunteered at <i class="far fa-heart"></i></h5>
							</div>
							<ul class="list-group list-group-flush">
								<?php 
									$query5 = "SELECT * FROM volunteers WHERE user_id = $userid";
									// echo $query2;
									$result5 = mysqli_query($conn, $query5);

									if(mysqli_num_rows($result5) > 0)
									{

										while($row5 = mysqli_fetch_assoc($result5))
										{
								?>			
											<li class="list-group-item"><?php echo $row5["event_name"]; ?> (<?php echo $row5["chapter"]; ?>)</li>							

								<?php

										}
									}
								?>
							</ul>
							<div class="card-footer">Total events: 
								<?php 
								$query6 = "SELECT count(*) AS total_events FROM volunteers WHERE user_id = $userid";
								$result6 = mysqli_query($conn, $query6);
								$row6 = mysqli_fetch_assoc($result6);
								echo $row6['total_events'];
							?> 
							</div>
						</div>
				</div>
				<div class="col-sm-12 col-md-6 d-flex justify-content-center">
					<div class="card bg-transparent img-wrapper" style="width: 25rem;">
						<img src="https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=750&q=80" class="card-img-top" alt="..." style=" height:18rem;">
						<div class="card-body">
							<h5 class="card-title">Donations made <i class="far fa-heart"></i></h5>
						</div>
						<ul class="list-group list-group-flush">
							<?php 
									$query2 = "SELECT * FROM donation_amount WHERE user_id = $userid";
									// echo $query2;
									$result2 = mysqli_query($conn, $query2);

									if(mysqli_num_rows($result2) > 0)
									{

										while($row2 = mysqli_fetch_assoc($result2))
										{
								?>			
											<li class="list-group-item"> ₹ <?php echo $row2["total_amount"]; ?></li>							

								<?php

										}
									}
								?>
						</ul>
						<div class="card-footer"> Donation worth ₹  
							<?php 
								$query3 = "SELECT sum(total_amount) AS total_donation FROM donation_amount WHERE user_id = $userid";
								$result3 = mysqli_query($conn, $query3);
								$row3 = mysqli_fetch_assoc($result3);
								echo $row3['total_donation'];
							?> 

						</div>
					</div>
				</div>
			</div>
		</div>
    <!-- Footer -->
	<footer id="footer">
    <a href="https://www.facebook.com/kopilapokhara/"><i class="foot fab fa-facebook-f"></i></a>
    <a href="https://www.instagram.com/kopilanepalngo/?hl=en"><i class="foot fab fa-instagram"></i></a>
    <i class="foot fas fa-envelope" onclick="copyToClipboard('kopilanepal.org.np'),alert('contact info copied to clipboard')"></i>
    <i class="foot fas fa-phone-alt" onclick="copyToClipboard('922222222'),alert('contact info copied to clipboard')"></i>
    <p class="p-foot">© Copyright 2023 Shreya Shahi</p>
  </footer>
    <!-- End of Footer -->
    <!-- JS Scripts -->
        <script type="text/javascript" src="project.js"></script>
        
    </body>
    </html>

