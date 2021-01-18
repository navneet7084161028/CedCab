<?php session_start();
if(!isset($_SESSION['user'])){
  header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>All User</title>
</head>
<body>
<?php include "adminheader.php"; ?>
<h2>All User</h2>
  <table class="table table-dark" style="width:100%;text-align: center;margin: auto;">
      <?php
          require '../data.php';
          $sql = " select * from user";
          $result = $conn->query($sql);
      ?>
    <thead>
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
    while($row = $result->fetch_assoc())
    {
  ?>
  <tbody>
    <tr>
      <td><?php echo $row["email_id"]  ?></td>
      <td><?php echo $row["name"] ?></td>
      <td><?php echo $row["dateofsignup"] ?></td>
      <td><?php echo $row["mobile"] ?></td>
      <td><a href="delete1.php?rid=<?php echo $row["user_id"] ?>" class="btn btn-outline-danger">Reject</a></td>
    </tr>
  </tbody>
  <?
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


