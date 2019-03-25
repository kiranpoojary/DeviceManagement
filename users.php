<?php
error_reporting(0);
session_start();
if($_SESSION ["expiry"]==1)
{
  header("refresh:0; url=index.php");

}else
{
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "DeviceManagement";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <link href="http://localhost/DeviceManagement/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/DeviceManagement/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />  
    <!-- JavaScript files-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>

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
        type: $ty,    
        },
        function (isConfirm)
        {
            if (isConfirm)
            {
                window.location.href = "users.php";
                
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

if ($result->num_rows > 0) {
    // output data of each row

echo "<div class='container'>";
  echo "<h2>User Of Device Management</h2>";          
  echo "<table class='table table-hover'>";
    echo "<thead>";
      echo "<tr>";
        echo "<th>Login ID</th>";
        echo "<th>Password</th>";
        echo "<th>Email</th>";
        echo "<th>Access Type</th>";
      echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["userid"]."</td>";
        echo "<td>".$row["password"]."</td>";
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
if (isset($_POST["update"]))
{
    print($_POST["uid"]);
    echo '<script type="text/javascript">',
     'error_report("Something Went Wrong","Error while Connecting to Database server", "error");',
     '</script>'; 
     
}

/*
error_reporting(0);
//session_start();
// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
if (!$con or !mysqli_select_db($con,'DeviceManagement')) 
    {
    //alert_user("Error while connecting to database");
    echo '<script type="text/javascript">',
     'error_report("Something Went Wrong","Error while Connecting to Database server", "error");',
     '</script>'; 
    }
    
else
    {

        if (isset($_POST["updateclick"]) && !empty($_POST["uid"])) 
        {

            $uid=$_POST["uid"];

            //query to check user exist 
            $result = $con->query("SELECT COUNT(*) FROM users  WHERE userid='$uid' "); 
                $row = $result->fetch_assoc();
                $size = $row['COUNT(*)'];
                if ($size!=0) 
                {                     
                    $sql = "SELECT * FROM users  WHERE userid='$uid' "; 
                    $result = $con->query($sql);
                    if ($result->num_rows > 0)
                    {
                        // output data of each row
                        while($row = $result->fetch_assoc())
                        {    
                            $var_pfrom=$row["userid"];
                            $var_pudate=$row["password"];
                            $var_comp=$row["email"];
                            $var_waranty=$row["privilage"];
                             
                           
                        }
                    }
                }
                //display invalid login credential alert
                else        
                {   
                    echo '<script type="text/javascript">';
                    echo 'error_report("Invalid Credential!","Please Enter Valid password and UserID", "error");';
                    echo '</script>'; 
                }
                $con->close();
            
            }
            else
            {
                 echo '<script type="text/javascript">';
                    echo 'error_report("Invalidfgh Credential!","Please Enter Valid password and UserID", "error");';
                    echo '</script>'; 

            }

    }
    */
    
?>

