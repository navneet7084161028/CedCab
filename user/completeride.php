<?php session_start();
if(!isset($_SESSION['user'])){
  header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Complete Ride</title>
</head>
<body>
<?php include "userheader.php"; ?>

<!-- complete ride table start here -->
<h2>Complete Rides</h2>
  <table class="table table-dark" style="width: 100%;text-align: center;margin: auto;">
    <?php
      require '../data.php';
      $sql = " select * from ride ";
      $result = $conn->query($sql);
    ?>
    <thead>
    <tr>
      <th>From</th>
      <th>To</th>
      <th>CabType</th>
      <th>Ride Date</th>
      <th>TotalDistance(KM)</th>
      <th>Luggage(KG)</th>
      <th>TotalFare(Rs.)</th>
    </tr>
  </thead>
  <?php 
    if ($result->num_rows > 0) {
  // output data of each row
    while($row = $result->fetch_assoc()) {
      if($row['status'] == 2){
  ?>
  <tbody>
    <tr>
    <td> <?php echo $row["from"]  ?></td>
    <td> <?php echo $row["to"] ?></td>
    <td> <?php echo $row["cab_type"] ?></td>
    <td> <?php echo $row["ride_date"] ?></td>
    <td> <?php echo $row["total_distance"] ?></td>
    <td> <?php echo $row["luggage"] ?></td>
    <td> <?php echo $row["total_fare"] ?></td>
    </tr>
  </tbody>

<?
      }
  }
}
else {
  echo "0 results";
}
$conn->close();
?>
</table>
<?php include "userfooter.php"; ?>
</body>
</html>