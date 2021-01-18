<?php session_start();
if(!isset($_SESSION['user'])){
  header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PendingUserRequest</title>
</head>
<body>
<?php include "adminheader.php"; ?>

      <h2>Pending User Request</h2>
      <table class="table table-dark" style="width:100%;text-align: center;margin: auto;">
    <thead>
    <?php
      require '../data.php';
      $sql = " select * from user where status=1";
      $result = $conn->query($sql);
      ?>
    <tr>
      <th>UserName</th>
      <th>Name</th>
      <th>DateSignup</th>
      <th>Mobile</th>
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
    <td><?php echo $row["email_id"]  ?></td>
      <td><?php echo $row["name"] ?></td>
      <td><?php echo $row["dateofsignup"] ?></td>
      <td><?php echo $row["mobile"] ?></td>
      <!-- <td><a href="#" id="ride-accept" class="btn btn-outline-success">Accept</a> -->
      <!-- <a href="#" id="ride-accept" class="btn btn-outline-danger">Reject</a></td> -->
      <td><a href="uaccept.php?rid=<?php echo $row["user_id"] ?>" class="btn btn-outline-success">Accept</a>
      <a href="ureject.php?rid=<?php echo $row["user_id"] ?>" class="btn btn-outline-danger">Reject</a></td>
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


