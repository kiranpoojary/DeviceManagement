<!DOCTYPE html>
<html>
<head>
    <title>Add New Category</title>
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
                <a class="navbar-brand" href="home.aspx" style="margin-left: -60px">DeviceManagement</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="homepage.php">Home <span class="sr-only">
                    (current)</span> </a></li>
                     <li class="nav-item active"><a class="nav-link" href="add_devices.php">Add Devices <span class="sr-only">
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
    <center>
        <div style="background: #EEFFEE; border: 4px solid black" id="newcatadd" class="form-control col-md-6 col-md-offset-2">
            <br>
            <h2 class="style2"><u>Add New Category</u></h2> 
            <br>

                Category Name<span class="style3">*</span>
            <input type="Text" name="newcatval"  Width="500px" placeholder="Enter New Categorys" Visible="false" class="autosuggest form-control" required>
            <br />
            <br>
             <input type="submit" name="sub" value="Save Data" class="btn btn-lg btn-success btn-block"/>
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


<?php
error_reporting(0);
session_start();
if($_SESSION ["expiry"]==1)
{
  header("refresh:0; url=index.php");

}
else  //isset($_POST["sub"]) &&
{

if(isset($_POST["sub"]) && !$_POST[newcatval]=="")
{
    
    $con=mysqli_connect("localhost","root","","DeviceManagement");
    if (!$con)
    {

    }
    else
    {
        if(!mysqli_select_db($con,'DeviceManagement'))
        {
            echo '<script type="text/javascript">',
            'error_report("Something Went Wrong","Error while Connecting to Database", "error");',
            '</script>'; 
        }
        else
        {
            //set column variable of database table
            $cat=strtoupper($_POST["newcatval"]);
            $zero=0;
            //insert query
            $sql="INSERT INTO categories(devCategory,lastAdded) VALUES ('$cat',$zero)";
            if(mysqli_query($con,$sql))
            {
                echo '<script type="text/javascript">',
                'error_report("Saved","New Device Category Successfuly Saved ", "success");',
                '</script>';
                
            }
            else
            {
                echo '<script type="text/javascript">',
                'error_report("Something Went Wrong","Data Not Saved!. check wether category already exist or not", "error");',
                '</script>';
            }
        }
    }
}
}
?>