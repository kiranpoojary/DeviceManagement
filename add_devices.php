<?php

include('devicedb.php');

/*
$con=mysqli_connect("localhost","root","","DeviceManagement");
mysqli_select_db($con,'DeviceManagement');
*/
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
    <!--
    <link href="http://localhost/DeviceManagement/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/DeviceManagement/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/DeviceManagement/bootstrap/js/sweetalert.min.js" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
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


</script>


   </head>
<body style="background: #EEFFEE;padding-bottom:10px">
    <form id="form1" action="" method="post">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="homepage.php" style="margin-left: -60px;">DeviceManagement</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                     <li class="nav-item active"><a class="nav-link" href="add_devices.php">Add_Device<span class="sr-only">
                    (current)</span> </a>
                </li> 
                 <li class="nav-item active"><a class="nav-link" href="add_category.php">Add_Category<span class="sr-only">
                    (current)</span> </a>
                </li>              
                </ul>
            </div>
        </div>
    </nav>
    <br />
    <br />
    <br />
    <br />
    <br />
    <center>
    <center><h2><span>Add Device Details</span></h2></center>
    <div style="margin: 40%;  margin-top: 40px; " >
        Device Category*
       <!-- <input  type="text" name="" ID="txtSearch" placeholder="Enter Item Category" Width="500px" class="autosuggest form-control">
        -->
        <select name="cat" class="autosuggest form-control">
            <?php
            $result=mysqli_query($con,"select devCategory from categories");
            while ($row=mysqli_fetch_array($result)) 
            {
            ?>
            <option><?php echo $row["devCategory"];  ?></option>
            <?php   
            }
             ?>
        </select>
        <br />
        Purchased From*
        <input type="text" name="pfrom"  placeholder="Purchase From"  Width="500px" class="form-control" required>
        <br>
        Purchase Date*
        <input type="Date" name="pdate"   class="form-control" Width="500px" required>
        <br />
        Company/Brand*
        <input type="text" name="Company" Class="form-control" Width="500px" placeholder="Device Company/Brand" required>
        <br>
        Waranty/Guarantee*
        <input type="text" name="Waranty" Class="form-control" Width="500px" placeholder="Enter Waranty/Quarantee in Months" required>
        <br />
        Model Number*
        <input type="text" name="model"  Class="form-control" Width="500px" placeholder="Enter Model No." required>
        <br />
        Serial Number*
        <input type="text" name="slno" TextMode="MultiLine" Class="form-control" Width="500px" placeholder="Serial No." required>
        <br>
        Installation Location*
        <input type="text" name="loc" TextMode="MultiLine" Class="form-control" Width="500px" placeholder="Room No.A00801/LAB3 etc." required>
        <br>
        <input type="submit" name="sub2" value="Save Data" class="btn btn-lg btn-success btn-block">
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
/*
$con=mysqli_connect("localhost","root","","DeviceManagement");
mysqli_select_db($con,'DeviceManagement');
*/
include('devicedb.php');
error_reporting(0);
session_start();
if(isset($_POST['sub2']))
        
{
    
   /*
    $con=mysqli_connect("localhost","root","","DeviceManagement");
    */
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
            $var_cat=$_POST["cat"];
            $var_pfrom=$_POST["pfrom"];
            $var_pudate=$_POST["pdate"];
            $var_comp=$_POST["Company"];
            $var_waranty=$_POST["Waranty"];
            $var_model=$_POST["model"];
            $var_slno=$_POST["slno"];
            $var_installedin=$_POST["loc"];
            
            //generate Device ID
            $sql = "SELECT lastAdded FROM categories where devCategory='$var_cat'";
            $result = $con->query($sql);
            if ($result->num_rows > 0)
            {
                // output data of each row
                while($row = $result->fetch_assoc())
                {
                    $last=$row["lastAdded"];
                }
            }
            //generate deviceID
            $last++; 
            $date  = strtotime($var_pudate);
            $day   = date('d',$date);
            $month = date('m',$date);
            $year  = date('Y',$date);        
            $id=$var_cat.$day.$month.$year."00".$last; 
           


           
            //insert query
            $sql="INSERT INTO alldevices VALUES ('$var_cat','$id','$var_slno','$var_model','$var_pudate','$var_comp','$var_pfrom',
            $var_waranty,'$var_installedin','Active')";
            if(mysqli_query($con,$sql))
            {
                $sql2="UPDATE categories SET lastAdded='$last' WHERE devCategory='$var_cat'";
                mysqli_query($con,$sql2);
                echo '<script type="text/javascript">',
                'error_report("Saved","New Device  Successfuly Saved ", "success");',  //dispaly id pending
                '</script>';
                
                
            }
            else
            {
                echo '<script type="text/javascript">',
                'error_report("Something Went Wrong","Data Not Saved!. check wether device already saved or not", "error");',
                '</script>';
            }
          
        }
    }
                   
}
?>

