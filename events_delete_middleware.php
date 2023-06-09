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
if (isset($_POST["sub"])){
        $nameofevent = $_POST['nameofevent'];
    
      
    




    $query = "DELETE FROM events where name_of_event = '$nameofevent'";
    $result = mysqli_query($conn,$query);

    header('location: events_delete_form.php');

    // echo $query;

}
?>
