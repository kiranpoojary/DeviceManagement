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
    <title>Change Password</title>
    <link href="http://localhost/DeviceManagement/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/DeviceManagement/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/DeviceManagement/bootstrap/js/sweetalert.min.js" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

<script type="text/javascript">
    function error_report($tt,$txt,$ty)
    {
        swal({
            title: $tt,
            text: $txt,
            type: $ty
        });
    }
</script>

</head>

<body style="background: #EEFFEE;padding-bottom:10px">
    <form action="" method="post">
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="homepage.php" style="margin-left: -60px">DeviceManagement</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="homepage.php">Home <span class="sr-only">
                    (current)</span> </a></li>
                                      
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <center>
        <div style="background: #EEFFEE; border: 4px solid black" id="newcatadd" class="form-control col-md-6 col-md-offset-2">
            <br>
            <h2 class="style2"><u>Change Password</u></h2> 
            <br>

                Your UserID<span class="style3">*</span>
            <input type="Text" name="uid" Width="500px" placeholder="Enter New Categorys" autocomplete="off" Visible="false" class="autosuggest form-control" required>
            <br />
            
             <input type="submit" name="sub2" value="Request to Change" class="btn btn-lg btn-success btn-block">
             <br>
             <br>
        </div>
    </center>
    <br><br>
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




<!--start of php codes-->
<?php
error_reporting(0);
$con=mysqli_connect("localhost","root","","DeviceManagement");
if (!$con or !mysqli_select_db($con,'DeviceManagement')) 
    {
    //alert_user("Error while connecting to database");
    echo '<script type="text/javascript">','
    error_report("Something Went Wrong","Error while Connecting to Database server", "error");
    ','</script>'; 
    }
else
    {
        echo "inside else";
         if (isset($_POST["uid"]) && !empty($_POST["uid"])) 
            {
                
                $uid=$_POST["uid"];
                //authentication2
                $result = $con->query("SELECT COUNT(*) FROM users  WHERE userid='$uid'");
                $row = $result->fetch_assoc();
                $size = $row['COUNT(*)'];
                if ($size==1) 
                {
                    echo '<script type="text/javascript">','
                error_report("Check Mail","Check your Email for OTP", "success");','</script>';
                }
                else 
                {   
                    echo '<script type="text/javascript">','
                error_report("Wrong UserID","Entered UserID is invalid,please enter Valid UserID", "error");','</script>';
                }
                
            }
             
    }
$con->close();
?>

