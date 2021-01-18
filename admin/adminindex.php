<?php session_start();
if(!isset($_SESSION['user'])){
  header("location:../login.php");
}

include "../data.php";
$pending=0;
$sql="SELECT *from ride where status=1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
    
      $pending++;
  }
  }  else {
    echo "0 results";
  }
  $conn->close();
?>

<?php
include "../data.php";

$complete=0;

$sql="SELECT *from ride where status=2";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
    
      $complete++;
  }
  }  else {
    echo "0 results";
  }
  $conn->close();
?>

<?php
include "../data.php";
$cancel=0;
$sql="SELECT *from ride where status=0";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
    
      $cancel++;
  }
  }  else {
    echo "0 results";
  }
  $conn->close();
?>

<?php
include "../data.php";

$admincount=0;
$earn=0;
$sql="SELECT *from ride";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
      $earn=$earn+$row['total_fare'];
      $admincount++;
  }
  }  else {
    echo "0 results";
  }
  $conn->close();
?>

<?php
include "../data.php";

$unblock=0;
$sql="SELECT *from user where status=1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
    
      $unblock++;
  }
  }  else {
    echo "0 results";
  }
  $conn->close();

?>

<?php
include "../data.php";

$block=0;
$sql="SELECT *from ride where status=0";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
    
      $block++;
  }
  }  else {
    echo "0 results";
  }
  $conn->close();

?>

<?php
include "../data.php";

$alluser=0;

$sql="SELECT *from user";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
    
      $alluser++;
  }
  }  else {
    echo "0 results";
  }
  $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  
    <title>AdminDashboard</title>
    
</head>
<body>
<?php include "adminheader.php"; ?>
<!-- card start here -->
<div class="container-fluid" style="margin-top:2%;">
    <div class="row">
        <div class="col-sm-3">
          <div class="card bg-info">
            <div class="card-body">
              <h5 class="card-title">Rides Request</h5>
              <p class="card-text"><?php echo $pending;?></p>
              <a href="riderequest.php" class="btn btn-outline-warning btn-block">Rides Request</a>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card bg-info">
            <div class="card-body">
              <h5 class="card-title">Complete Rides</h5>
              <p class="card-text"><?php echo $complete;?></p>
              <a href="completeride.php" class="btn btn-outline-warning btn-block">Complete Rides</a>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
            <div class="card bg-info">
              <div class="card-body">
                <h5 class="card-title">Canceled Rides</h5>
                <p class="card-text"><?php echo $cancel;?></p>
                <a href="cancelride.php" class="btn btn-outline-warning btn-block">Canceled Rides</a>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="card bg-info">
              <div class="card-body">
                <h5 class="card-title">All Rides</h5>
                <p class="card-text"><?php echo $admincount; ?></p>
                <a href="allride.php" class="btn btn-outline-warning btn-block">All Rides</a>
              </div>
            </div>
          </div>
      </div>
</div>

<div class="container-fluid" style="margin-top:2%;">
    <div class="row">
        <div class="col-sm-3">
          <div class="card bg-info">
            <div class="card-body">
              <h5 class="card-title">Pending User Request</h5>
              <p class="card-text"><?php echo $unblock; ?></p>
              <a href="pendingrequest.php" class="btn btn-outline-warning btn-block">Pending User Request</a>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card bg-info">
            <div class="card-body">
              <h5 class="card-title">Block User</h5>
              <p class="card-text"><?php echo $block;?></p>
              <a href="#" class="btn btn-outline-warning btn-block">Block User</a>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
            <div class="card bg-info">
              <div class="card-body">
                <h5 class="card-title">All User</h5>
                <p class="card-text"><?php echo $alluser; ?></p>
                <a href="alluser.php" class="btn btn-outline-warning btn-block">All User</a>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="card bg-info">
              <div class="card-body">
                <h5 class="card-title">Total Earning</h5>
                <p class="card-text"><?php echo $earn; ?></p>
                <a href="#" class="btn btn-outline-warning btn-block">Total  Earning</a>
              </div>
            </div>
          </div>
      </div>
</div>
<!-- footer strat here -->
<?php include "adminfooter.php"; ?>
</body>
</html>