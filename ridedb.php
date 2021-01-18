<?php  session_start();
require 'data.php';

if(isset($_SESSION['user'])){

$pick = $_SESSION['pick'];
$drop = $_SESSION['drop'];
$cab = $_SESSION['cab'];
$weight = $_SESSION['weight'];
$distance = $_SESSION['distance'];
$total_fare = $_SESSION['total_fare'];

// echo date('Y-m-d H:i:s');die;
$sql = "INSERT INTO `ride`(`ride_date`, `from`, `to`, `cab_type`, `total_distance`, `luggage`, `total_fare`, `customer_user_id`) 
VALUES (now(),'$pick','$drop','$cab','$distance','$weight','$total_fare',5)";
// $result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    header("location:user/userindex.php");
    // echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
}
?>