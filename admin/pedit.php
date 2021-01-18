<?php  session_start(); 

require '../data.php';
if(isset($_POST['edit'])){

    $number = $_POST['num'];
    $id = $_SESSION['id'];
    
    $sql = "UPDATE `user` SET `mobile`='$number' WHERE `user_id`='$id'";
    
    if ($conn->query($sql) === TRUE) {
      echo "<script>
        alert('Account Edited Success');
        window.location.href='adminindex.php';
      </script>";
    // echo "success";
      
    } else {
      echo "Error updating record: " . $conn->error;
    }
    $conn->close();
  }
    ?> 