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
    <link href="http://localhost/DeviceManagement/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/DeviceManagement/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />  
    <!-- JavaScript files-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>
</head>
</head>
<body style="background: #EEFFEE;padding-bottom:10px">
    <form>
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="homepage.php" style="margin-left: -60px">DeviceManagement</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DeviceManagement";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

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
        echo "<td><button>update</button><td>";
        
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



$conn->close();
?> 

    <br>
    <br>
    <br>



    
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