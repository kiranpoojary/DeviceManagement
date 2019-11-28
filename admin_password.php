<?php
error_reporting(0);
session_start();
if($_SESSION ["expiry"]==1)
{
  header("refresh:0; url=index.php");

}
else
{
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Add New Category</title>
    <head>
    <title>Home</title>
<!--

    <link href="http://localhost/DeviceManagement/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/DeviceManagement/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />  
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>
-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">


</head>
</head>
<body style="background: #EEFFEE;padding-bottom:10px">
    <form>
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="home.aspx" style="margin-left: -60px">DeviceManagement</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="homepage.php">Home <span class="sr-only">
                    (current)</span> </a></li>
                    <li class="nav-item active"><a class="nav-link" href="index.php">Logout <span class="sr-only">
                    (current)</span> </a></li>                  
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <br>
    Change admin  password here
     <div class="py-3 bg-dark text-white">
      <div class="container">
        <div class="row">
          <div class="col-md-7 text-center text-md-left">
            <p class="mb-md-0">© 2018 Your company. All rights reserved.</p>
          </div>
          <div class="col-md-5 text-center text-md-right">
            <p class="mb-0">Template By <a href="https://bootstrapious.com/" class="external text-white">Bootstrapious</a></p>
          </div>
        </div>
      </div>
    </div>
</form>
</body>
</html>