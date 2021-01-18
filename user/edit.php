<?php  session_start(); 

require '../data.php';
if(isset($_POST['edit'])){

  $uname = $_POST['fname'];
  $number = $_POST['num'];
  
  $id = $_SESSION['id'];
    
  $sql = "UPDATE `user` SET `name`='$uname' , `mobile`='$number' WHERE `user_id`='$id'";
    
    if ($conn->query($sql) === TRUE) {
      echo "<script>
            alert('Information update successfull');
            window.location.href='userindex.php';
        </script>";
    } else {
      echo "Error updating record: " . $conn->error;
    }
    $conn->close();
  }
?> 