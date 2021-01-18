<?php session_start();
if(!isset($_SESSION['user'])){
  header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Information</title>
</head>
<body>
<?php include "userheader.php"; ?>

<!-- update information here -->
  <form style="margin-top:2%; margin-left:2%;" method="POST" action="edit.php">
    <?php require "../data.php";
      $id = $_SESSION['id'];
      $sql = "select * from user where user_id = '$id'";
      $result = mysqli_query($conn, $sql) or die("Query unsuccessfull");
  
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){  
    ?>
<table>
    <tr>
      <div class="form-group" style="width:50%">
	      <label>Email:</label><br>
          <input type="text" class="form-control" id="user" name="user" disabled placeholder="Uername">
      </div>
      <div class="form-group" style="width:50%">
	      <label>Name:</label><br>
          <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row['name']; ?>">
      </div>
      <div class="form-group" style="width:50%">
	      <label>Mobile:</label><br>
          <input type="number" class="form-control" id="num" name="num" value="<?php echo $row['mobile']; ?>">
      </div>
      <div class="form-group" style="width:50%">
        <input type="submit" class="form-control btn-info" value="UPDATE"  name="edit">
    </div>
</form>
</tr>
</table>
<?php
      }
    }
  $conn->close();
?>
<?php include "userfooter.php"; ?>
</body>
</html>
