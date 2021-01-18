<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Booking Form</title>
</head>
<body class="body1">
<?php include 'headerindex.php';?>
<!-- *************form************** -->
<div class="container-fluid">    
    <p class="p3">Book a City Taxi to your Destination in town<br><span class="span2">Choose from a range of categories and prices</span></p>
        <form method="POST" id="login">
            <div class="col-sm-6 col-md-4 col-lg3">
                <table class="table">
                    <tr style="border-style: hidden;"><td>
                        <p class="p1">CITY-TAXI</p>
                        <hr style="height: 2px; background-color: black; width: 100%;">
                        <p class="p2">Your everyday travel partner<br>
                            <sapn class="span1">AC Cabs for point to point travel</sapn></p>
            <div class="row">
                <div class="col-sm-12">
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                            <span class="input-group-text">Pick-Up</span>
                        </div>
                        <select id="pick">
                            <option value="" hidden>Current Location</option>
                            <option value="Charbagh">Charbagh</option>
                            <option value="Indira Nagar">Indira Nagar</option>
                            <option value="BBD">BBD</option>
                            <option value="Barabanki">Barabanki</option>
                            <option value="Faizabad">Faizabad</option>
                            <option value="Basti">Basti</option>
                            <option value="Gorakhpur">Gorakhpur</option>
                        </select>
                        </div>  
                    </div>
                </div>
            </td></tr>

            <div class="row">
                <div class="col-sm-12">
                    <tr style="border-style: hidden;"><td>
                        <div class="input-group mb-1 ">
                            <div class="input-group-prepend">
                            <span class="input-group-text">Drop-Point</span>
                        </div>
                        <select id="drop">
                            <option value="" hidden>Drop Location</option>
                            <option value="Charbagh">Charbagh</option>
                            <option value="Indira Nagar">Indira Nagar</option>
                            <option value="BBD">BBD</option>
                            <option value="Barabanki">Barabanki</option>
                            <option value="Faizabad">Faizabad</option>
                            <option value="Basti">Basti</option>
                            <option value="Gorakhpur">Gorakhpur</option>
                        </select>
                        </div>
                    </td></tr>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <tr style="border-style: hidden;"><td>
                        <div class="input-group mb-1 ">
                            <div class="input-group-prepend">
                            <span class="input-group-text">Cab-Type</span>
                        </div>
                        <select id="cab">
                            <option value="" hidden>Select CAB</option>
                            <option value="CedMicro">CedMicro</option>
                            <option value="CedMini">CedMini</option>
                            <option value="CedRoyal">CedRoyal</option>
                            <option value="CedSUV">CedSUV</option>
                        </select>
                        </div>
                    </td></tr>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <tr style="border-style: hidden;"><td>
                        <div class="input-group mb-1 ">
                            <div class="input-group-prepend">
                            <span class="input-group-text">Luggage</span>
                        </div>
                        <input type="text" min="0" name="luggage" id="luggage"placeholder="Enter Weight in K.G" />
                        </div>
                    </td></tr>
                </div>
            </div>

            <tr style="border-style: hidden;"><td>
                <input type="submit" name="submit" data-target="#myModal" value="Calculate Fare" data-toggle="modal" />
                <!-- <p id="result"></p> -->
            </td></tr>
            </table>
        </div>
    </form>
</div>
<!-- ********************Modals************** -->
<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <p class="modal-title mod-title">Invoice<br><span style="font-size: 15px;">"Thanks for visiting!!..."</span></p>
                    <button type="button" class="close" data-dismiss="modal" style="color:aliceblue;">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" id="result1"></div>
            <!-- Modal footer -->
                <div class="modal-footer" style="background-color: black;">
                    <p class="mod-foot-text">Ced<span style="color: crimson;">Cab</span></p>
                    <button type="button" class="btn btn-danger"><a href="session.php">Book</a></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> 
</body>
<?php include 'footer.php';?>
</html>
<script>
    $(document).ready(function () {
        $('select').on('change', function() {
            $('option').prop('disabled', false);
            $('select').each(function() {
            var val = this.value;
            $('select').not(this).find('option').filter(function() {
            return this.value === val;
            }).prop('disabled', true);
        });
        });
        $('#cab').change(function () {
            if ($('#cab').val() == 'CedMicro') {
                $('#luggage').val("");
                $('#luggage').prop('disabled', true);
            } else {
                $('#luggage').prop('disabled', false);
            }
        });
            $('#luggage').keyup(function () {
                this.value = this.value.replace(/[^0-9\.]/g,'');
            });
        $('#login').submit(function (e) {
            e.preventDefault();
            var pick = $('#pick').val();
            var drop = $('#drop').val();
            var cab = $('#cab').val();
            var lugg = $('#luggage').val();
            
            if (pick == "" && drop == "" && cab == "") {
                document.getElementById('result1').innerHTML="Please Book Rides...";
                // alert("Please choose the given options for ride..");
            }
            else if(pick ==null && drop ==null && cab){
                document.getElementById('result1').innerHTML="Choose any source and destination";
                // alert('Choose any source and destination');
            }
            else if(pick && drop =="" && cab){
                document.getElementById('result1').innerHTML="Choose drop location";
                // alert('Choose drop location');
            }
            else if(pick =="" && drop && cab){
                document.getElementById('result1').innerHTML="Choose pick-point";
                // alert('Choose pick-point');
            }
            else if(pick && drop ==null){
                document.getElementById('result1').innerHTML="Select drop-point";
                // alert('Select drop point');
            }
            else if(drop && pick ==null){
                document.getElementById('result1').innerHTML="Select pick-point";
                // alert('Select pick-point');
            }
            else if(cab == "" && pick && drop){
                document.getElementById('result1').innerHTML="Plz Select any Cab- Type for your Ride";
                // alert('Plz Select any Cab-Type for your Ride');
            }
            else {
                $.ajax({
                    type: "POST",
                    url: "cab.php",
                    data: { 'pick': pick, 'drop': drop, 'cab': cab, 'lugg': lugg },
                    success: function (data) {
                        // console.log(data);
                        // alert(data);
                        // $('#result').html(data);
                        document.getElementById('result1').innerHTML=data;
                    }
                });
            }
        });
    });
</script>