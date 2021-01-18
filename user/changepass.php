<?php session_start();
if(!isset($_SESSION['user'])){
  header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Change Password</title>
</head>
<body>
<?php include "userheader.php"; ?>

<!-- update information here -->
<form style="margin-top:2%; margin-left:2%;" method="POST" action="edit1.php">
  <?php require "../data.php";
    $id = $_SESSION['id'];
    $sql = "select * from user where user_id = '$id'";
    $result = mysqli_query($conn, $sql) or die("Query unsuccessfull");
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){  
  ?>
    <div class="form-group" style="width:50%">
      <label>Email:</label><br>
        <input type="text" class="form-control" id="user" name="user" disabled placeholder="Uername">
    </div>
    <div class="form-group" style="width:50%">
	    <label>ChangePassword:</label><br>
        <input type="password" class="form-control" id="pass" name="pass" value="<?php echo $row['password']; ?>">
    </div>
    <div class="form-group" style="width:50%">
      <input type="submit" class="form-control btn-info" value="UPDATE"  name="edit">
    </div>
</form>
<?php
      }
    }
  $conn->close();
 ?>
<?php include "userfooter.php"; ?>
</body>
</html>