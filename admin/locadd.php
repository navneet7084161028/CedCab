<?php require "../data.php";

$location = $_POST['location'];
$distance = $_POST['distance'];
echo "$distance";
echo "$location";die;

$sql = "INSERT INTO  location(name, distance)
VALUES ('$location', '$distance')";
$result = $conn->query($sql); 

if($result == true){
    echo "Sign success.Now you can log in";
    
}else{
	echo "error generated";
}
$conn->close();




?>