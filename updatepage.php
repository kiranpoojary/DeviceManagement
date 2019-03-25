<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
  <link href="http://localhost/DeviceManagement/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
  <link href="http://localhost/DeviceManagement/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>


<script type="text/javascript">
  function error_report($tt,$txt,$ty)
  {
    swal({
      title: $tt,
      text: $txt,
      type: $ty
    });
  }


  

function setLogout()
{
  window.location = "index.php";

}


</script>

</head>
  <body onload="error_report("Something Went Wrong","Error while Connecting to Database server", "error");">
    <form method="post">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#" style="margin-left: -60px;">DeviceManagement</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="#">Home <span class="sr-only">
                        (current)</span> </a></li>
                    <li class="nav-item"><a class="nav-link" href="add_devices.php">Add Device</a> </li>
                    <li class="nav-item"><a class="nav-link" href="add_maintenance.php">Add Maintain</a> </li>
                    <li class="nav-item"><a class="nav-link" href="updatepage.php">Settings</a> </li>
                    <li class="nav-item"><a class="nav-link" href="#">Print</a> </li>
                    <li class="nav-item"><a class="nav-link" href="javascript:setLogout()">Logout</a> </li>
                </ul>
            </div>
        </div>
    </nav>