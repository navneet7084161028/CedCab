<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$servername="localhost";
$username="root";
$password="";
$dbname = "cedcab";

$con=mysqli_connect($servername,$username,$password,$dbname);

if(!$con)
{
die("connection failed".mysqli_connect_error());
}

$sno=$_GET['user_id'];

$sql="DELETE FROM user where user_id='$sno'";

if($con->query($sql)==true)
{
    header("location:adminindex.php");
    // echo "success";
}
else 
{
    echo "query error";
}

?>