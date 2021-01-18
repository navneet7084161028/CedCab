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
<!-- add location here -->
<form style="margin-top:2%; margin-left:2%;">
    <div id="login" class="form-group" style="width:50%">
	      <label>Location:</label><br>
            <input type="text" class="form-control" id="location" name="location">
    </div>
    <div class="form-group" style="width:50%">
	      <label>Distance(KM):</label><br>
            <input type="text" class="form-control" id="distance" name="distance">
    </div>
    <div class="form-group" style="width:50%">
            <input type="submit" class="form-control btn-info" name="submit" value="ADD LOCATION">
    </div>
</form>
<?php include "adminfooter.php"; ?>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $('#login').submit(function(e){
    var location = $('#location').val();
    var distance = $('#distance').val();
    e.preventDefault();
    $.ajax({
      type:"POST",
      url:"locadd.php",
      data:{'location':location, 'distance':distance},
      success:function(data){
        console.log(data);
      }
    });
  });
});
</script>