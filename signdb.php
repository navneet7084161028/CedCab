<?php  session_start();
	require 'data.php';

$email = $_POST['email'];
$uname = $_POST['uname'];
$number = $_POST['number'];
$password = $_POST['password'];

$_SESSION['email'] = $email;
// $_SESSION['uname'] = $uname;
// $_SESSION['number'] = $number;

$status = 0;
$is = 0;

$sql = "INSERT INTO  user(email_id, name, dateofsignup, mobile, status, password, is_admin)
VALUES ('$email', '$uname', now(),'$number', $status, '$password', $is)";
$result = $conn->query($sql); 

if($result == true){
	echo "Sign success.Now you can log in";
}else{
	echo "error generated";
}
$conn->close();

?>