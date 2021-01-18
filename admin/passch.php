<?php  session_start(); 

require '../data.php';
if(isset($_POST['edit'])){

    $uname = $_POST['user'];
    $pass = $_POST['password'];
    $id = $_SESSION['id'];
    
    $sql = "UPDATE `user` SET `email_id`='$uname', `password`='$pass' WHERE `user_id`='$id'";
    
    if ($conn->query($sql) === TRUE) {
      echo "<script>
        alert('Account Update Success');
        window.location.href='adminindex.php';
      </script>";
    // echo "success";
      
    } else {
      echo "Error updating record: " . $conn->error;
    }
    $conn->close();
  }
    ?> 