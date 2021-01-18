<?php  session_start(); 

require '../data.php';
if(isset($_POST['edit'])){

  $pass = $_POST['pass'];
  $id = $_SESSION['id'];
    
  $sql = "UPDATE `user` SET `password`='$pass' WHERE `user_id`='$id'";
    
  if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Password Change successfull');
            window.location.href='userindex.php';
      </script>";
      
    } else {
      echo "Error updating record: " . $conn->error;
    }
    $conn->close();
  }
  ?> 