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
                <a class="navbar-brand" href="adminhomepage.php" style="margin-left: -60px;">DeviceManagement</a>
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
                                
                </ul>
            </div>
        </div>
    </nav>
    <br />
    <br />
    <br />

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
<br><br><br>


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
    echo "<table style='margin-left: -140px;' class='table table-hover'>";
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
    
</form>
</body>
</html>