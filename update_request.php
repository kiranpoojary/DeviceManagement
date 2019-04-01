<?php
error_reporting(0);
session_start();
if($_SESSION ["expiry"]==1)
{
  header("refresh:0; url=index.php");

}
else
{
$con=mysqli_connect("localhost","root","","DeviceManagement");
if (!$con or !mysqli_select_db($con,'DeviceManagement')) 
{
  //alert_user("Error while connecting to database");
  echo '<script type="text/javascript">',
  'error_report("Something Went Wrong","Error while Connecting to Database server", "error");',
  '</script>'; 
}
else
{
//select records
$sql = "SELECT * FROM company";
$result = $con->query($sql);

if ($result->num_rows > 0)
{
    // output data of each row
    while($row = $result->fetch_assoc())
    {

       $co=$row["coname"];
       $br=$row["branch"];
       $ctry=$row["country"];
       $st=$row["state"];  
       $dist=$row["district"];  
       $tlk=$row["taluk"];  
       $lm=$row["landmark"];
       $pin=$row["pin"];  
       $mob=$row["contact"];


    }
}
}
$con->close();
}
?>

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
  <body >
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
                    <li class="nav-item"><a class="nav-link" href="homepage.php">HOME</a> </li>
                    <li class="nav-item active"><a class="nav-link" href="update_request.php">Request for Update</a> </li>
                    <li class="nav-item"><a class="nav-link" href="javascript:setLogout()">Logout</a> </li>
                </ul>
            </div>
        </div>
    </nav>

    <br><br><br><br>
<div class="container">
 <h3> Enter Details About Update request(with device/maintenanceID)</h3>
          <center>
            <textarea rows="10" cols="120"  name="details" class="form-control" autocomplete="off" required/>
          </textarea>
          </center>
          <br/>
          <center>
            <input type="submit" name="sub" value="Request" class="btn btn-lg btn-success btn-block">
          </center>
          <br/>
        </div>
    <br><br><br><br>

    <?php

// Check connection
$con=mysqli_connect("localhost","root","","DeviceManagement");
if (!$con or !mysqli_select_db($con,'DeviceManagement')) 
{
}
else
{

$sql = "SELECT * FROM alldevices ORDER BY devCategory ";
$result = $con->query($sql);

if ($result->num_rows > 0)
{
    echo "<div class='container'>";
    echo "<h2>Installed Device Details</h2>";          
    echo "<table class='table table-hover'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Category</th>";
    echo "<th>Device ID</th>";
    echo "<th>Serial No.</th>";
    echo "<th>Model</th>";
    echo "<th>Date Of Purcahse</th>";
    echo "<th>Company/Brand</th>";
    echo "<th>Seller</th>";
    echo "<th>Waranty in months</th>";
    echo "<th>installed in</th>";
    echo "<th>status</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while($row = $result->fetch_assoc())
    {
        echo "<tr>";
        echo "<td>".$row["devCategory"]."</td>";
        echo "<td>".$row["devid"]."</td>";
        echo "<td>".$row["serNo"]."</td>";
        echo "<td>".$row["model"]."</td>";
        echo "<td>".$row["dop"]."</td>";
        echo "<td>".$row["company"]."</td>";
        echo "<td>".$row["seller"]."</td>";
        echo "<td>".$row["waranty"]."</td>";
        echo "<td>".$row["installedin"]."</td>";
        echo "<td>".$row["status"]."</td>";
        echo "</tr>";


      
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
}
else
{
    echo "0 results";
}
}


?>


<br><br><br><br>



  <?php

// Check connection
$con=mysqli_connect("localhost","root","","DeviceManagement");
if (!$con or !mysqli_select_db($con,'DeviceManagement')) 
{
}
else
{

$sql = "SELECT * FROM maintenance ORDER BY devCategory ";
$result = $con->query($sql);

if ($result->num_rows > 0)
{
    echo "<div class='container'>";
    echo "<h2>All Maintenance Details</h2>";          
    echo "<table class='table table-hover'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Category</th>";
    echo "<th>Device ID</th>";
    echo "<th>Maintenanace ID</th>";
    echo "<th>Date of Maintain</th>";
    echo "<th>Issue</th>";
    echo "<th>Repaired By</th>";
    echo "<th>Repaired Under Waranty</th>";
    echo "<th>Part Added</th>";
    echo "<th>Part Name</th>";
    echo "<th>Sl No.</th>";
    echo "<th>Waranty</th>";
    echo "<th>Parts Removed</th>";
    echo "<th>SL No.</th>";
    echo "<th>Bill No.</th>";
    echo "<th>Status</th>";
    echo "<th>Description</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while($row = $result->fetch_assoc())
    {
        echo "<tr>";
        echo "<td>".$row["devCategory"]."</td>";
        echo "<td>".$row["devid"]."</td>";
        echo "<td>".$row["maintenanceID"]."</td>";
        echo "<td>".$row["maintainDate"]."</td>";
        echo "<td>".$row["issue"]."</td>";
        echo "<td>".$row["repairedBy"]."</td>";
        echo "<td>".$row["withWarranty"]."</td>";
        echo "<td>".$row["added"]."</td>";
        echo "<td>".$row["addedName"]."</td>";
        echo "<td>".$row["addedsl"]."</td>";
        echo "<td>".$row["addedWarranty"]."</td>";
        echo "<td>".$row["removed"]."</td>";
        echo "<td>".$row["removedsl"]."</td>";
        echo "<td>".$row["billno"]."</td>";
        echo "<td>".$row["status"]."</td>";
        echo "<td>".$row["Description"]."</td>";
        
        echo "</tr>";


    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
}
else
{
   
}
}


?>



    
    <!-- Footer-->

    <div class="py-3 bg-dark text-white">
      <div class="container">
        <div class="row">
          <div class="col-md-7 text-center text-md-left">
            <p class="mb-md-0">© 2019 PES University. All rights reserved.</p>
          </div>
          <div class="col-md-5 text-center text-md-right">
            <p class="mb-0">www.pes.edu <a href="https://bootstrapious.com/" class="external text-white"></a></p>
          </div>
        </div>
      </div>
    </div>
    </form>
  </body>
</html>


<?php
if (isset($_POST["details"]) && !empty($_POST["details"])) 
{
  $_SESSION["uid"]=$_SESSION["uid"];
  $_SESSION["subject"]="Device Management";
  $_SESSION["body1"]="Update Request From ID:";
  $_SESSION["main"]=$_POST["details"];

  echo ("<script LANGUAGE='JavaScript'>
    window.location.href='request_mail.php';
    </script>");
}
else
{
   
}
?>
    

