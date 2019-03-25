<?php
$con=mysqli_connect("localhost","root","","DeviceManagement");
mysqli_select_db($con,'DeviceManagement');
//error_reporting(0);
session_start();
if($_SESSION ["expiry"]==1)
{
  header("refresh:0; url=index.php");

}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
    <link href="http://localhost/DeviceManagement/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/DeviceManagement/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/DeviceManagement/bootstrap/js/sweetalert.min.js" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 

    <style type="text/css">
      

    </style>
  </head>
<body style="background: #EEFFEE;padding-bottom:10px">
    <form id="addm" method="post" action="">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="homepage.php" style="margin-left: -60px;">DeviceManagement</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="get_device.php">UpdateDevice<span class="sr-only">
                    (current)</span> </a></li> 
                    <li class="nav-item active"><a class="nav-link" href="get_maintenance.php">UpdateMaintenanace<span class="sr-only">
                    (current)</span> </a></li>
                    <li class="nav-item active"><a class="nav-link" href="homepage.php">Home <span class="sr-only">
                    (current)</span> </a></li>
                    <li class="nav-item active"><a class="nav-link" href="homepage.php">Home <span class="sr-only">
                    (current)</span> </a></li>
                    <li class="nav-item active"><a class="nav-link" href="adminhomepage.php">Home <span class="sr-only">
                    (current)</span> </a></li>              
                </ul>
            </div>
        </div>
    </nav>
    <br />
    <br />
    <br />
    
</form>
</body>
</html>