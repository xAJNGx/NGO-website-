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
     echo "Error". mysqli_connect_error();
    }
    $email = $_SESSION['email'];
    $user = "SELECT * FROM users WHERE email='$email'";
    $result_u = mysqli_query($conn, $user);

    $row = mysqli_fetch_assoc($result_u);
    $userid = $row['user_id'];

    //isset checks if it is
    if (isset($_POST["submit"]))
    {
        $amount = $_POST['total_amount'];
    
        $query_d = "INSERT INTO `donation_amount`(`user_id`,`total_amount`) VALUES ('$userid','$amount')";
        echo $query_d;
      //make query and get result
        $result_d = mysqli_query($conn,$query_d);
        header('location: thankyou.php'); 

        // $_SESSION['email'] = $email;
        // header('location: index.php');
    }   
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<title>Donation</title>
	<!-- bootstrap scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <!-- Css stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="project.css">
    
    

    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">

   <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
   
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Ubuntu&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Nav Bar -->
    <div class="container-fluid">
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: #B7B7B7">
            <a class="navbar-brand" href="index.php">
                <img src="logo1.svg" width="100" height="50" alt="logo"
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

<!--Start of donation page-->

<div id="donation">
    <div class=" container-fluid">
        <h1 class="big-heading">Donation</h1>
        <div id="do-form">
            <form id="DonationForm" class="donate" action="donation.php" method="POST" name="donation">
                <div class=""><label for="selectAmount">Select donation amount (in Rupees)</label>
                    <div id="selectAmount">
                        <button id="amount-1" class="btn btn-outline-primary" onclick="changeValue(this)"
                        type="button" value="100">100</button>
                        <button id="amount-2" class="btn btn-outline-primary" onclick="changeValue(this)"
                        type="button" value="250">250</button>
                        <button id="amount-3" class="btn btn-outline-primary" onclick="changeValue(this)"
                        type="button" value="500">500</button>
                        <button id="amount-4" class="btn btn-outline-primary" onclick="changeValue(this)"
                        type="button" value="45">1000</button>
                    </div>
                </div>
                <div><span class=""><span>
                    <div class="">
                        <div><span>Rs </span><input class="donation_amount" type="text" id="type" name="total_amount" 
                            autocomplete="off" value="" placeholder="    Or enter amount" value="" /></div>
                        </div>
                    </div>
                    <a href="#" class="butsub" id="payment-button" >Donate Here</a>
                    <br>
                    <button id="tst_submit" name='submit' class="donation_submit btn btn-primary" type="submit"
                    aria-label="Submit" href="thankyou.php">End Transaction</button>
                </form>
            </div>
        </div>
        <!--end of donation page-->
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
        <script>
            var config = {
                // replace the publicKey with yours
                "publicKey": "test_public_key_3e791fdde81b4ef9acb4416916cacc5b",
                "productIdentity": "1234567890",
                "productName": "Dragon",
                "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
                "paymentPreference": [
                    "KHALTI",
                    "EBANKING",
                    "MOBILE_BANKING",
                   //  "CONNECT_IPS",
                 //  "SCT",
                    ],
                "eventHandler": {
                    onSuccess (payload) {
                        // hit merchant api for initiating verfication
                        console.log(payload);
                    },
                    onError (error) {
                        console.log(error);
                    },
                    onClose () {
                        console.log('widget is closing');
                    }
                }
            };

            var checkout = new KhaltiCheckout(config);
            var btn = document.getElementById("payment-button");
            btn.onclick = function () {
                // minimum transaction amount must be 10, i.e 1000 in paisa.
                checkout.show({amount: 1000});
            }
        </script>

        
        <script type="text/javascript" src="project.js"></script>
        <script>
            function changeValue(o) {
                document.getElementById('type').value = o.innerHTML;
            }
        </script>
        
        

    </body>

    </html>