<?php session_start();
if(!isset($_SESSION['user'])){
  header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>Cancel Ride</title>
</head>
<body>
<?php include "adminheader.php"; ?>

      <h2>Cancel Rides</h2>
      <table class="table table-dark" style="width:100%;text-align: center;margin: auto;">
    <thead>
    <?php
      require '../data.php';
      $sql = " select * from ride where status=0";
      $result = $conn->query($sql);
      ?>
    <tr>
      <th>From</th>
      <th>To</th>
      <th>CabType</th>
      <th>Ride Date</th>
      <th>TotalDistance(KM)</th>
      <th>Luggage(KG)</th>
      <th>TotalFare(Rs.)</th>
      <th>Action</th>
    </tr>
  </thead>
  <?php 
    if ($result->num_rows > 0) {
  // output data of each row
    while($row = $result->fetch_assoc()) {
  // if($row['status'] == 2){
  ?>
  <tbody>
    <tr>
      <td><?php echo $row["from"]  ?></td>
      <td><?php echo $row["to"] ?></td>
      <td><?php echo $row["cab_type"] ?></td>
      <td><?php echo $row["ride_date"] ?></td>
      <td><?php echo $row["total_distance"] ?></td>
      <td><?php echo $row["luggage"] ?></td>
      <td><?php echo $row["total_fare"] ?></td>
      <td><a href="#" id="ride-accept">Invoice</a></td>
    </tr>
  </tbody>
  <?
      // }
  }
}
else {
  echo "0 results";
}
$conn->close();
?>
</table>

<?php include "adminfooter.php"; ?>
</body>
</html>


