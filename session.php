<?php session_start();

if(!isset($_SESSION['user'])){
    header("location:login.php");
}else{
    // header("location:ridedb.php");
    echo "<script>
        alert('Thanks for Booking.. Please wait for admin approval..');
        window.location.href='ridedb.php';
      </script>";
}

?>