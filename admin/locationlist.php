<?php session_start();
if(!isset($_SESSION['user'])){
  header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Location List</title>
</head>
<body>
<?php include "adminheader.php"; ?>

      <!-- <h2>Location List</h2> -->
      <table class="table table-dark" style="width:100%;text-align: center;margin: auto;">
      <?php
      require '../data.php';
      $sql = " select * from location";
      $result = $conn->query($sql);
      ?>
    <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Distance</th>
      <th>isavailable</th>
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
      <td><?php echo $row["id"]  ?></td>
      <td><?php echo $row["name"] ?></td>
      <td><?php echo $row["distance"] ?></td>
      <td><?php echo $row["isavailable"] ?></td>
      <!-- <td><a href="#" id="ride-accept" class="btn btn-outline-success">Edit</a> -->
      <!-- <a href="#" id="ride-accept" class="btn btn-outline-danger">Delete</a></td> -->
      <td><a href="ldelete.php?rid=<?php echo $row["id"] ?>" class="btn btn-outline-danger">Delete</a></td>
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


