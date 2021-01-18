<?php session_start();

$pick = $_POST['pick'];
$drop = $_POST['drop'];
$cab = $_POST['cab'];
$weight = $_POST['lugg'];

$_SESSION['pick'] = $pick;
$_SESSION['drop'] = $drop;
$_SESSION['cab'] = $cab;
$_SESSION['weight'] = $weight;

echo "<br>Pick-Up Location is : ".$pick;
echo "<br>Drop Location is : ". $drop;

// Creating a associative array.
$distance = array(
    "Charbagh" => "0",
    "Indira Nagar" => "10",
    "BBD" => "30",
    "Barabanki" => "60",
    "Faizabad" => "100",
    "Basti" => "150",
    "Gorakhpur" => "210",
);

//calculating distance 
class Cab_distt{
    function disp($pick,$drop){
        global $temp,$temp1,$distt,$distance;
foreach($distance as $key => $value)
{
    if($key == $pick){
        $temp = $value;
    }
    else if($key == $drop){
        $temp1 = $value;
    }
}
$distt = abs($temp - $temp1);
$_SESSION['distance'] = $distt;
echo "<br>Calculated distance is : ".$distt."KM";
}
}
$obj1 = new Cab_distt();
$obj1-> disp($pick,$drop);

// **********Weight and Fare Calculations**********
class CabBooking
{
    function show($cab,$weight){
        global $total_fare, $distt,$cab,$d,$weight,$total_weight;

// Fare Calculation for CedMicro....
if($cab == 'CedMicro'){
    
    if($distt<=10){
        $total_fare = 50+($distt)*13.50;
    }
    if($distt>10 && $distt<=60){
        $d = $distt-10;
        $total_fare = (50+135)+($d)*12;
    }
    if($distt>60 && $distt<=160){
        $d=$distt-60; 
        $total_fare = (50+135+600)+($d)*10.20;
    }
    if($distt>=161){
        $d = $distt-160;
        $total_fare = (50+135+600+1020)+($d)*8.50;
    }
    echo "<br> Total fare is : "."Rs. ".abs($total_fare);
}

// // Fare calculations for CedMini
if($cab == 'CedMini'){
    if($weight>0 && $weight<=10){
        $total_weight = 50;
    }
    if($weight>10 && $weight<=20){
        $total_weight = 100;
    }
    if($weight>20){
        $total_weight = 200;
    }
//*************************** */
    if($distt<=10){
        $total_fare = 150+($distt)*14.50;
    }
    if($distt>10 && $distt<=60){
        $d=$distt-10;
        $total_fare = (150+145)+($d)*13;
    }
    if($distt>60 && $distt<=160){
        $d=$distt-60; 
        $total_fare = (150+145+650)+($d)*11.20;
    }
    if($distt>=161){
        $d = $distt-160;
        $total_fare = (150+145+650+1120)+($d)*9.50;
    }
    echo "<br>Total fare is : "."Rs. ".abs($total_fare)."<br>Total luggage charges is : "."Rs. ".$total_weight;
}

// Fare calculations for CedRoyal
if($cab == 'CedRoyal'){
    if($weight>0 && $weight<=10){
        $total_weight = 50;
    }
    if($weight>10 && $weight<=20){
        $total_weight = 100;
    }
    if($weight>20){
        $total_weight = 200;
    }
 //*************************** */   
    if($distt<=10){
        $total_fare = 200+($distt)*15.50;
    }
    if($distt>10 && $distt<=60){
        $d=$distt-10;
        $total_fare = (200+155)+($d)*14; 
    }
    if($distt>60 && $distt<=160){
        $d=$distt-60;
        $total_fare = (200+155+700)+($d)*12.20; 
    }
    if($distt>=161){
        $d = $distt-160;
        $total_fare = (200+155+700+1220)+($d)*10.50;
    }
    echo "<br> Total fare is : "."Rs. ".abs($total_fare)."<br>Total luggage charges is : "."Rs. ".$total_weight;
}

// Fare calculations for CedSUV
if($cab == 'CedSUV'){
    if($weight>0 && $weight<=10){
        $total_weight = 100;
    }
    if($weight>10 && $weight<=20){
        $total_weight = 200;
    }
    if($weight>20){
        $total_weight = 400;
    }
//********************** */
    if($distt <= 10){
        $total_fare = 250+($distt)*16.50;
    }
    if($distt>10 && $distt<=60){
        $d=$distt-10;
        $total_fare = (250+165)+($d)*15;
    }
    if($distt>60 && $distt<=160){
        $d=$distt-60;
        $total_fare = (250+165+750)+($d)*13.20;
    }
    if($distt>=161){
        $d = $distt-160;
        $total_fare = (250+165+750+1320)+($d)*11.50;
    }
    echo "<br> Total fare is : "."Rs. ".abs($total_fare)."<br>Total luggage charges is : "."Rs. ".$total_weight;
}
}
}
$obj = new CabBooking(); //object creation..
$obj-> show($cab,$weight); // function calling..

$p = $total_fare+$total_weight;
$_SESSION['total_fare'] = $p;
echo "<br>Overall total Riding Charges is : "."Rs. ".$p;
?>
