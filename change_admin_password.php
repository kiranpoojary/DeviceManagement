<!DOCTYPE html>
<html>
<head>
    <title>Add New Category</title>
    <!--
    <link href="http://localhost/DeviceManagement/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/DeviceManagement/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/DeviceManagement/bootstrap/js/sweetalert.min.js" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
-->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
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




             function error_report_success($tt,$txt,$ty)
    {
        swal({
            title: $tt,
            text: $txt,
            type: $ty,
            

        },
        function (isConfirm) {
            if (isConfirm) {
                window.location.href = "adminhomepage.php";
                
                }
        });
}

    </script>






 </head>
<body style="background: #EEFFEE;padding-bottom:10px">
    <form action="" method="post">
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="adminhomepage.php" style="margin-left: -60px">DeviceManagement</a>
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
    <center>
        <div style="background: #EEFFEE; border: 4px solid black" id="newcatadd" class="form-control col-md-6 col-md-offset-2">
            <br>
            <h2 class="style2"><u>Add New Category</u></h2> 
            <br>
            
            <input type="password" name="new"  Width="500px" placeholder="New Password" Visible="false" class="autosuggest form-control" required>
            <br />
            <br>
            
            <input type="password" name="cnew"  Width="500px" placeholder="Confirm Password" Visible="false" class="autosuggest form-control" required>
            <br />
            <br>
             <input type="submit" name="sub" value="Save Data" class="btn btn-lg btn-success btn-block"/>
             <br>
             <br>
        </div>
    </center>
    <br><br><br><br><br><br><br><br><br><br><br>
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
error_reporting(0);
session_start();
if($_SESSION ["expiry"]==1)
{
  header("refresh:0; url=index.php");

}
else  //isset($_POST["sub"]) &&
{

if(isset($_POST["sub"]) && !$_POST["new"]=="")
{
    $new=$_POST["new"];
    $newc=$_POST["cnew"];
    $uid=$_SESSION["uid"];
  
    if ($new == $newc)
    {
       
    //$con=mysqli_connect("localhost","root","","DeviceManagement");
    include('devicedb.php');
    if (!$con)
    {
        echo '<script type="text/javascript">',
     'error_report("Something Went Wrong","Error while Connecting to Database server", "error");',
     '</script>'; 
    }
    else
    {
        if(!mysqli_select_db($con,'DeviceManagement'))
        {
            echo '<script type="text/javascript">
                ','error_report("Something Went Wrong","Error while Connecting to Database", "error");','</script>'; 
        }
        else
        { $sql="UPDATE users SET password='$new' WHERE userid='$uid'";
            if(mysqli_query($con,$sql))
            {   $_SESSION["email"]=$var_email;
                $_SESSION["subject"]="Device Management";
                $_SESSION["body1"]="Your Device Management Account Updated";
                $_SESSION["uid"]=$var_uid;
                $_SESSION["psw"]="";
                echo '<script type="text/javascript">
                    ','error_report_success("Updated","User Details  Successfuly Updated ", "success");
                    ','</script>';
                
                
            }
            else
            {
                echo '<script type="text/javascript">
                    ','error_report("Something Went Wrong","Data Not Saved!. check wether device details are correctly inputed", "error");
                    ','</script>';
            }
        }
    }
}
else
{
     echo '<script type="text/javascript">
                    ','error_report("Mismatched!!","Password You entered are mismatches", "info");','</script>';

}
}
}

?>