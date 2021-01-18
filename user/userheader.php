<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
</head>
<body>
<nav class="navbar navbar-expand-sm  bg-warning navbar-dark">
  <a class="navbar-brand" href="../index.php"><span class="text-danger" style="font-size: 25px;font-weight: bold;">Ced</span><span class="text-info" style="font-size: 25px;font-weight: bold;">Cab</span></a>
    <ul class="navbar-nav ">
      <li class="nav-item ">
        <a class="nav-link active text-dark" href="userindex.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="../index.php">Book New Ride</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbardrop" data-toggle="dropdown"> Rides</a>
          <div class="dropdown-menu">
            <a class="dropdown-item text-dark" href="pendingride.php">Pending Rides</a>
            <a class="dropdown-item text-dark" href="completeride.php">Complete Rides</a>
            <a class="dropdown-item text-dark" href="allride.php">All Rides</a>
          </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbardrop" data-toggle="dropdown">Account</a>
          <div class="dropdown-menu">
            <a class="dropdown-item text-dark" href="updateinfo.php">Update Information</a>
            <a class="dropdown-item text-dark" href="changepass.php">Change Password</a>
          </div>
      </li>
        <p style="padding-left:5px;padding-top:6px;color:black;">Hii..&nbsp;<?php echo $_SESSION['user'];?></p>
    </ul>
        <form class="form-inline">
            <button class="btn btn-outline-success" type="button"><a href="../logout.php">LogOut</a></button>
        </form>
</nav>
</body>
</html>