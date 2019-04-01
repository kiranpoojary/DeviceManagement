<?php
session_start();
$con=mysqli_connect("localhost","root","","DeviceManagement");
mysqli_select_db($con,'DeviceManagement');
error_reporting(0);
if($_SESSION ["expiry"]==1)
{
  header("refresh:0; url=index.php");

}
$uid=$_SESSION["uid"];

//select records
$sql = "SELECT * FROM users WHERE userid='$uid'  ";
$result = $con->query($sql);

if ($result->num_rows > 0)
{
    // output data of each row
    while($row = $result->fetch_assoc())
    {     
        $var_uid=$row["userid"];
        $var_email=$row["email"];
        $var_type=$row["privilage"];
    }
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
   
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

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
                window.location.href = "mail.php";
                
                }
        });
}




$(function() {
  var availableTags = ["User", "Admin"];
  $("#tags").autocomplete({
    source: availableTags,
    select: function(e, ui) {
      $('#tag').val(availableTags[availableTags.indexOf(ui.item.value)]);
    }
  });
});


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
    <center><h2><span>Update User Details</span></h2></center>
    <div style="margin: 40%;  margin-top: 40px; " >
     
        UserID*
        <input type="text" name="uid" value="<?php echo "$var_uid"; ?>"   placeholder="User ID"  Width="500px" class="form-control" required>
        <br>
        Email ID*
        <input type="email" pattern="[^ @]*@[^ @]*" size="35" name="eid" value="<?php echo "$var_email"; ?>" Class="form-control" Width="500px" placeholder="Email ID" required>
        <br />
        Select User Type
        <input id="tags" name="type" value="<?php echo "$var_type"; ?>" class="form-control" placeholder="User/Admin" required>
        <br><br>
        
        <input type="submit" name="up" value="UPDATE" class="btn btn-lg btn-success btn-block" >
        <input type="submit" name="del" value="REMOVE" class="btn btn-lg btn-success btn-block" >
    

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

$con=mysqli_connect("localhost","root","","DeviceManagement");
mysqli_select_db($con,'DeviceManagement');
error_reporting(0);
session_start();
if(isset($_POST['up']))       
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
            $var_uid=$_POST["uid"];
            $var_email=$_POST["eid"];
            $var_type=$_POST["type"];

            
            
           
           
            //update query 
            $sql="UPDATE users SET userid='$var_uid',email='$var_email',privilage='$var_type' WHERE userid='$uid'";
            if(mysqli_query($con,$sql))
            {   $_SESSION["email"]=$var_email;
                $_SESSION["subject"]="Device Management";
                $_SESSION["body1"]="Your Device Management Account Updated";
                $_SESSION["uid"]=$var_uid;
                $_SESSION["psw"]="";
                echo '<script type="text/javascript">',
                'error_report("Updated","User Details  Successfuly Updated ", "success");',  //dispaly id pending
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






if(isset($_POST['del']))       
{
    
    
    $con=mysqli_connect("localhost","root","","DeviceManagement");
    if (!$con)
    {
         echo '<script type="text/javascript">',
            'error_report("Something Went Wrong1","Error while Connecting to Database", "error");',
            '</script>';

    }
    else
    {
        if(!mysqli_select_db($con,'DeviceManagement'))
        {
            echo '<script type="text/javascript">',
            'error_report("Something Went Wrong2","Error while Connecting to Database", "error");',
            '</script>'; 
        }
        else
        {
            $sql="DELETE FROM users  WHERE userid='$var_uid'";
            if(mysqli_query($con,$sql))
            {
                $_SESSION["body1"]="Your Device Management Account Removed";
                echo '<script type="text/javascript">',
                'error_report("REMOVED","User Details  Successfuly Removed ", "success");',  //dispaly id pending
                '</script>';
            }
            else
            {
                echo '<script type="text/javascript">',
            'error_report("Something Went Wrong3","Error while Connecting to Database", "error");',
            '</script>'; 

            }
        }
    }
}
?>

