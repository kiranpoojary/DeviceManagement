<?php
//error_reporting(0);
session_start();
if($_SESSION ["expiry"]==1)
{
  header("refresh:0; url=index.php");

}else
{
// Create connection
$con=mysqli_connect("localhost","root","","DeviceManagement");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
   <link href="http://localhost/DeviceManagement/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="http://localhost/DeviceManagement/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="http://localhost/DeviceManagement/bootstrap/js/sweetalert.min.js" rel="stylesheet" type="text/css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

<style type="text/css">
.changer
{
    border-style: solid;
    color: #808080;

    height: 280px;
    width: 570px;
}
</style>
    
<script type="text/javascript">      
function error_report($tt,$txt,$ty)
    {
        swal({
            title: $tt,
            text: $txt,
            type: $ty
        },
        function (isConfirm) {
            if (isConfirm) {
                window.location.href = "users.php";
                
                }
        });
}


function error_report2($tt,$txt,$ty)
    {
        swal({
            title: $tt,
            text: $txt,
            type: $ty
        },
        function (isConfirm) {
            if (isConfirm) {
                window.location.href = "userupdate.php";
                
                }
        });
}


    </script>
</head>
<body style="background: #EEFFEE;padding-bottom:10px">
    <form method="post" action="">
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="adminhomepage.php" style="margin-left: -60px">DeviceManagement</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="newusers.php">New User <span class="sr-only">
                    (current)</span> </a></li>
                    <li class="nav-item active"><a class="nav-link" href="adminhomepage.php">Home <span class="sr-only">
                    (current)</span> </a></li>
                                     
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <br>

 <?php

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT * FROM users";
$result = $con->query($sql);

if ($result->num_rows > 0)
{
    echo "<div class='container'>";
    echo "<h2>User Of Device Management</h2>";          
    echo "<table class='table table-hover'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Login ID</th>";
    echo "<th>Email</th>";
    echo "<th>Access Type</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while($row = $result->fetch_assoc())
    {
        echo "<tr>";
        echo "<td>".$row["userid"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td>".$row["privilage"]."</td>";
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


?> 

    <br>
    <br>
    <br>

    
      
<center>
   
                <div class=" changer" >
                    <center><br><br>
                        <h1 style="color: Green">Update User Info</h1>
                        <br>
                        <input style="width: 300px;border-color: #909090;" type="text" placeholder="Enter UserID" name="uid" class="form-control" autocomplete="off" required autofocus>
                    </center>
                    <br/>
                    
                    <center>
                       <input type="submit" name="update" value="UPDATE" style="width: 300px" class="btn btn-lg btn-success btn-block">
                    </center>
                    <br/>
                </div>
                </center>       
        

<br><br><br><br><br><br><br>

    
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





<?php
$con=mysqli_connect("localhost","root","","DeviceManagement");
mysqli_select_db($con,'DeviceManagement');

if (isset($_POST["update"]))
{ 
     
    
    if (!$con or !mysqli_select_db($con,'DeviceManagement')) 
    {
        echo '<script type="text/javascript">';
            echo 'error_report("failed...!","Not Connected To Database Server", "error");';
            echo '</script>';
              
    }
        
    else
    {
          
        $uid=$_POST["uid"]; 
        $result = $con->query("SELECT COUNT(*) FROM users  WHERE userid='$uid'");        
        $row = $result->fetch_assoc();
        $size = $row['COUNT(*)'];
        if ($size!=0) 
        {
            $_SESSION["uid"]=$uid;          
            echo '<script type="text/javascript">';
            echo 'window.location.href = "userupdate.php";';
            echo '</script>'; 
           
                       
        }
        else 
        {
            echo '<script type="text/javascript">';
            echo 'error_report("Invalid UserID","Please Enter Valid UserID", "error");';
            echo '</script>'; 
             
        }       
                
    }
              

}
    
?>

