<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<title>Login Page</title>
	<style>
	</style>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light  bg-warning sticky">
    <a class="navbar-brand " href="index.php" ><span class = "text-danger">Ced</span><span class="text-info">Cab</span></a>
    <a class="navbar-brand " href="signgui.php"><span class = "text-primary">SignUp</span></a>
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
<form style="margin-top:2%; margin-left:2%;">
    <div class="form-group" style="width:50%">
	    <label>Email:</label><br>
        <input type="text" class="form-control" id="user" name="user"  placeholder="Uername">
    </div>
    <div class="form-group" style="width:50%">
	    <label>Password:</label><br>
        <input type="password" class="form-control" id="pass" name="pass"  placeholder="Password">
    </div>
    <div class="form-group" style="width:50%">
        <input type="button" class="form-control btn-info" onclick="show()" name="submit" value="Login">
    </div>
</form>
<footer style="width:100%; height:10vh;background-color:black; margin-top:25%;opacity:.8">
    <div style="text-align:center;color:white;">
    <h4 style="padding-top:20px;">Copyrights © CedCab</h4>
    </div>
</footer>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

function show(){
    var user = $('#user').val();
    var pass = $('#pass').val();
    if(user == "" || pass == ""){
        alert("plz login form");
    }
    else{
    $.ajax({
        type:'POST',
        url:'logindb.php',
        data:{'user':user, 'pass':pass},
        success:function(data){
            // console.log(data);
            if(data=="1")
            {
                window.location.href="admin/adminindex.php";
            }
            else if(data=="2")
            {
                alert("login successfull wait for the admin approval");
                location.reload();
            }
            else if(data=="3"){
                window.location.href="user/userindex.php";
            }
            else if(data=="4")
            {
                alert("You are blocked by Admin");
                location.reload();
            }else if(data=="5")
            {
                alert("Wrong user name and password");
                location.reload();
            }
        }
    });
    }
}

</script>
