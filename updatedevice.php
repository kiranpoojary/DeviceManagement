<?php
session_start();
//$con=mysqli_connect("localhost","root","","DeviceManagement");
include('devicedb.php');

mysqli_select_db($con,'DeviceManagement');
error_reporting(0);
if($_SESSION ["expiry"]==1)
{
  header("refresh:0; url=index.php");

}
$id=$_SESSION["id"];
$cat=$_SESSION["cat"];

//select records
$sql = "SELECT * FROM alldevices WHERE devCategory='$cat' AND devid='$id' ";
$result = $con->query($sql);

if ($result->num_rows > 0)
{
    // output data of each row
    while($row = $result->fetch_assoc())
    {

       
        $var_pfrom=$row["seller"];
        $var_pudate=$row["dop"];
        $var_comp=$row["company"];
        $var_waranty=$row["waranty"];
        $var_model=$row["model"];
        $var_slno=$row["serNo"];
        $var_installedin=$row["installedin"];
        $var_sts=$row["status"];


    }
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
        },
        function (isConfirm) {
            if (isConfirm) {
                window.location.href = "get_device.php";
                
                }
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
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                     <li class="nav-item active"><a class="nav-link" href="adminhomepage.php">Add_Device<span class="sr-only">
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
    <center><h2><span>Update Device Details</span></h2></center>
    <div style="margin: 40%;  margin-top: 40px; " >
     
        Device Category*
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
        <input type="text" name="pfrom" value="<?php echo "$var_pfrom"; ?>"   placeholder="Purchase From"  Width="500px" class="form-control" required>
        <br>
        Purchase Date*
        <input type="Date" name="pdate" value="<?php echo "$var_pudate"; ?>"   class="form-control" Width="500px" required>
        <br />
        Company/Brand*
        <input type="text" name="Company" value="<?php echo "$var_comp"; ?>" Class="form-control" Width="500px" placeholder="Device Company/Brand" required>
        <br>
        Waranty/Guarantee*
        <input type="text" name="Waranty" value="<?php echo "$var_waranty"; ?>" Class="form-control" Width="500px" placeholder="Enter Waranty/Quarantee in Months" required>
        <br />
        Model Number*
        <input type="text" name="model" value="<?php echo "$var_model"; ?>"  Class="form-control" Width="500px" placeholder="Enter Model No." required>
        <br />
        Serial Number*
        <input type="text" name="slno" value="<?php echo "$var_slno"; ?>" TextMode="MultiLine" Class="form-control" Width="500px" placeholder="Serial No." required>
        <br>
        Installation Location*
        <input type="text" name="loc" value="<?php echo "$var_installedin"; ?>" TextMode="MultiLine" Class="form-control" Width="500px" placeholder="Room No.A00801/LAB3 etc." required>
        <br>
        <input type="submit" name="sub2" value="UPDATE" class="btn btn-lg btn-success btn-block">
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

//$con=mysqli_connect("localhost","root","","DeviceManagement");
include('devicedb.php');
mysqli_select_db($con,'DeviceManagement');
error_reporting(0);
session_start();
if(isset($_POST['sub2']))
        
{
    
    
    //$con=mysqli_connect("localhost","root","","DeviceManagement");
    include('devicedb.php');
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

            
            
           
           
            //update query
            $sql="UPDATE alldevices SET seller='$var_pfrom',dop='$var_pudate',company='$var_comp',waranty=$var_waranty,model='$var_model',serNo='$var_slno',installedin='$var_installedin' WHERE devCategory='$cat' AND devid='$id'";
            if(mysqli_query($con,$sql))
            {
                echo '<script type="text/javascript">',
                'error_report("Updated","Device Details  Successfuly Updated ", "success");',  //dispaly id pending
                '</script>';
                
                
            }
            else
            {
                echo '<script type="text/javascript">',
                'error_report("Something Went Wrong","Data Not Saved!. check wether device details are correctly inputed", "error");',
                '</script>';
            }
          
        }
    }

    
                   
}

?>

