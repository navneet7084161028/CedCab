<?php session_start();
if(!isset($_SESSION['user'])){
  header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>Change Password</title>
</head>
<body>
<?php include "adminheader.php"; ?>
       <!-- add location here -->
    <form style="margin-top:2%; margin-left:2%;" method="POST" action="passch.php">
    <?php require "../data.php";
    $id = $_SESSION['id'];
    $sql = "select * from user where user_id = '$id'";
    
    $result = mysqli_query($conn, $sql) or die("Query unsuccessfull");
  
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){  
    ?>
    <div class="form-group" style="width:50%">
	<label>UserName:</label><br>
    <input type="text" class="form-control" id="user" name="user" value="<?php echo $row['email_id']; ?>">
    </div>
    <div class="form-group" style="width:50%">
	<label>Password:</label><br>
    <input type="password" class="form-control" id="password" name="password" value="<?php echo $row['password']; ?>">
    </div>
    <div class="form-group" style="width:50%">
    <input type="submit" class="form-control btn-info" name="edit" value="UPDATE">
    <!-- <input type="submit" class="form-control btn-info" value="UPDATE"  name="edit"> -->
    </div>
</form>
<?php
      }
    }
  $conn->close();
 ?>

<?php include "adminfooter.php"; ?>
</body>
</html>


<!-- <a href="javascript:void(0)" id="ride-accept" data-id="177" class="btn btn-outline-success">accept</a> -->