<?php  session_start();

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "cedcab";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn-> connect_error){
	die("connection failed: ".$conn-> connect_error);
  }

	$user = $_POST['user'];
  $pass = $_POST['pass'];

  $_SESSION['user']=$user;

	$sql = "select * from user where email_id='$user' and password='$pass'";
  $result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {

   $results=$row['user_id'];
   $result1=$row['name'];

   $_SESSION['id'] = $results;
   $_SESSION['name'] = $result1;

    if($user == $row["email_id"] && $pass==$row["password"] && $row['is_admin'] == 1)
    {
        echo "1"; 
    }
    else if($user == $row["email_id"] && $pass == $row["password"] && $row['is_admin'] == 0 && $row['status'] == 1)
    {
        echo "2";
    }
    else if($user == $row["email_id"] && $pass == $row["password"] && $row['is_admin'] == 0 && $row['status'] == 2){
      echo "3";
    }
    else if($user == $row["email_id"] && $pass == $row["password"] && $row['is_admin'] == 0 && $row['status'] == 0){
      echo "4";
    }
    
  }
} 
else {
  echo "5";
}
$conn->close();
?>