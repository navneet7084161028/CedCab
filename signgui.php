<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>index</title>
    <style>
        label{
            font-size: 15px;
            font-weight: bolder;
        }
    </style>
</head>
<body>
<header>
<nav class="navbar navbar-expand-lg navbar-light  bg-warning sticky">
    <a class="navbar-brand " href="#" ><span class = "text-danger">Ced</span><span class="text-info">Cab</span></a>
    <a class="navbar-brand " href="login.php"><span class = "text-primary">SignIn</span></a>
    <a class="navbar-brand " href="index.php"><span class = "text-primary">CalculateFare</span></a>
        <button class="navbar-toggler bg-info" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Contact Us <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">About Us<span class="sr-only">(current)</span></a>
                </li>    
            </ul>                    
        </div>
    </nav>
</header>

<div class="container-fluid" style="margin-top:2%;">
<form>
<!-- email send -->
    <div id="login">
        <div class="form-group" style="width:50%">
        <label>Enter Your Email to register</label>
        <br>
        <input type="email" name="email" class="form-control"  id="email" required>
        <input type="button" name="submit" onclick="mail()" value="VerifyEmail">
        <p id="result"></p>
        </div>
    </div>
 <!-- email otp -->
        <div id="form" style="display: none;">
            <div class="form-group col-md-6">
                <input type="text" name="data" id="data">

                <input type="button" onclick="validate()" value="OTP">
            <p id="result1"></p>
            </div>
        </div>
    <div>
        <div class="form-group" style="width:50%">
                <labe>Name</label><br>
                <input type="text" name="uname" class="form-control" id="uname" required/>
        </div>

</div>
<!-- mobile login -->
<div id="login2">
    <div class="form-group" style="width:50%">
        <label>Number</label><br>
        <input type="number" name="number" class="form-control" id="number" required>

        <input type="button" name="submit" onclick="mobile()" value="VerifyNum">
        <p id="result3"></p>
    </div>
</div>
<!-- mobile otp -->
<div id="form1" style="display: none;">
    <div class="form-group col-md-6">
        <input type="number" name="number" id="num" required>
        
        <input type="button" onclick="send1()" value="num OTP">
        <p id="result4"></p>
    </div>
</div>
<div class="form-group" style="width:50%">
    <label>Password</label><br>
        <input type="password" name="password" class="form-control" id="password" required/><br>
        <input type="button" name="submit" class="form-control btn-info" onclick="signup()" value="SignUP">
        <p id="demo"></p>
<div>
</div>
</form>
</div>
<footer style="width:100%; height:10vh;background-color:black; margin-top:6%;opacity:.8">
<div style="text-align:center;color:white;"><h4 style="padding-top:20px;">Copyrights © CedCab</h4></div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function mail(){
        var email = $('#email').val();
        if(email == ""){
            alert('Enter your email');
        }else{
        $.ajax({
            type:"POST",
            url:"sendmail.php",
            data:{'email':email},
            success:function(data){
            console.log(data);
            // $('#result').text(data);
            alert("mail sent");
            $('#form').css("display","block");
            }
        });
        }
    }
    // email validation
    function validate(){
        var data = $('#data').val();
        if(data == ""){
            alert('enter your OTP');
        }else{
        $.ajax({
            url:'validate.php',
            type:'POST',
            data:{'data':data},
            success:function(data){
            console.log(data);
            // $('#result1').text(data);
            if(data == ['OTPMatch']){
                alert("OTP verified");
            $('#form').css("display","none");
            }else{
            $('#form').css("display","block");
            }
            //  window.location.href="home.php";
        }
    });
        }
}
    // mobile function to send number
    function mobile(){
        var number = $('#number').val();
        if(number == ""){
            alert('enter your number');
        }else{
        $.ajax({
            type:"POST",
            url:"numotp.php",
            data:{'number':number},
            success:function(data){
            console.log(data);
            // $('#result3').text(data);
            alert("mail sent");
            $('#form1').css("display","block");
            }
        });
        }
    };
// number validation
    function send1(){
        var num = $('#num').val();
        if(num ==""){
            alert('enter OTP')
        }else{
        $.ajax({
            url:'numvalidate.php',
            type:'POST',
            data:{'num':num},
            success:function(data){
            console.log(data);
            // $('#result4').text(data);
            if(data == "OTPMatch"){
                alert("OTP verified");
            $('#form1').css("display","none");
            }else{
            $('#form1').css("display","block");
            }
        //  window.location.href="home.php";
        }
    });
        }
};

    function signup(){
        var email = $('#email').val();
        var uname = $('#uname').val();
        var number = $('#number').val();
        var password = $('#password').val();
        if(email=="" || uname=="" || number=="" || password=="")
        {
            alert("plz Signup");
        }else{
        $.ajax({
            type:"POST",
            url:"signdb.php",
            data:{'email':email, 'uname':uname, 'number':number, 'password':password},
            success:function(data){
                console.log(data);
                $('#demo').html(data);
            }
        });
    }
}
</script>