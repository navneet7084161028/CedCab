<?php session_start();
if(!isset($_SESSION['user'])){
  header("location:../login.php");
}
?>

<?php
include "../data.php";
// $s=$_SESSION['id'];
$usercount=0;
$expense=0;

$sql="SELECT *from ride";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
      $expense=$expense+$row['total_fare'];
      $usercount++;
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

<!DOCTYPE html>
<html lang="en">
<head>
  <title>UserDashboard</title>
</head>
<body>
<!-- navbar header -->
<header>
<?php include "userheader.php"; ?>
</header> 
<div class="container-fluid" style="margin-top:2%;">
    <div class="row">
        <div class="col-sm-3">
          <div class="card bg-info">
            <div class="card-body">
              <h5 class="card-title">Pending Rides</h5>
              <p class="card-text"><?php echo $pending;?></p>
              <a href="pendingride.php" class="btn btn-outline-warning btn-block">Pending Rides</a>
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
                <h5 class="card-title">All Rides</h5>
                <p class="card-text"><?php echo $usercount;?></p>
                <a href="allride.php" class="btn btn-outline-warning btn-block">All Rides</a>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="card bg-info">
              <div class="card-body">
                <h5 class="card-title">Total Expenses</h5>
                <p class="card-text"><?php echo $expense;?></p>
                <a href="#" class="btn btn-outline-warning btn-block">Total Expenses</a>
              </div>
            </div>
          </div>
      </div>
</div>
<?php include "userfooter.php"; ?>
</body>
</html>