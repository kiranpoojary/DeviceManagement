<?php
session_start();
$con=mysqli_connect("localhost","root","","DeviceManagement");
mysqli_select_db($con,'DeviceManagement');
error_reporting(0);
if($_SESSION ["expiry"]==1)
{
  header("refresh:0; url=index.php");

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link href="http://localhost/DeviceManagement/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/DeviceManagement/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/DeviceManagement/bootstrap/js/sweetalert.min.js" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
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
    <form id="form1" action="" method="post">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="adminhomepage.php" style="margin-left: -60px;">DeviceManagement</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
           
        </div>
    </nav>
    <br />
    <br />
    <br />
    <br />
    <br />
    <center>
    <center><h2><span>Add New User</span></h2></center>
    <div style="margin: 40%;  margin-top: 40px; " >
        
        UserID*
        <input type="text" name="uid"  placeholder="User ID"  Width="500px" class="form-control" required>
        <br>
        Email ID
        <input type="email" pattern="[^ @]*@[^ @]*" placeholder="Email ID" name="email" Class="form-control" Width="500px" placeholder="Device Company/Brand" required>
        <br>
        Select User Type
        <select name="type" ID="DropDownList1"  Width="500px" Class="form-control" > 
            <option >User</option>
            <option>Admin</option>
        </select>
        <br><br><br>
        <input type="submit" name="sub2" value="Create User" class="btn btn-lg btn-success btn-block">
    </div>
</center>
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
if (isset($_POST["sub2"]))
{
    $var_uid=$_POST["uid"];
    $var_psw=sprintf("%06d", mt_rand(1, 999999));
    $var_email=$_POST["email"];
    $var_type=$_POST["type"];
    $sql="INSERT INTO users (userid,password,email,privilage) VALUES ('$var_uid','$var_psw','$var_email','$var_type')";
            if(mysqli_query($con,$sql))
            {
                $_SESSION["email"]=$var_email;
                $_SESSION["subject"]="Device Management";
                $_SESSION["body1"]="You are Registered to Device Management of PES University";
                $_SESSION["uid"]=$var_uid;
                $_SESSION["psw"]=$var_psw;
                echo '<script type="text/javascript">',
                'error_report("Saved","New Device Category Successfuly Saved ", "success");',
                '</script>';
                header("refresh:0; url=mail.php");
          
            }
            else
            {
              
                echo '<script type="text/javascript">',
                'error_report("Something Went Wrong","UserID already exist", "error");',
                '</script>';
            }
      

}
 
?>

