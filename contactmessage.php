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
    if (isset($_POST["submit"]))
 {
    $name = $_POST['cname'];
    $email = $_POST['cemail'];
    $subject=$_POST['csubject'];
    $message =$_POST['cmessage'];
 }

    $querycf = "INSERT INTO `contactform`(`sname`, `semail`, `ssubject`, `smessage`) VALUES ('$name','$email','$subject','$message')";
    mysqli_query($conn,$querycf);
    header('location: index.php');
 ?>