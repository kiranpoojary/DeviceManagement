<?php
$con=mysqli_connect("localhost","root","","DeviceManagement");
mysqli_select_db($con,'DeviceManagement');
error_reporting(0);
if($_SESSION ["expiry"]==1)
{
  header("refresh:0; url=index.php");

}
$var_date="jhj";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 


<script type="text/javascript">

function setVisibility(id1,visibility1,id2,visibility2)
        {
            document.getElementById(id1).style.display = visibility1;
            document.getElementById(id2).style.display=visibility2;
            document.getElementByID('itcode').disabled = true;
            
            
        }   


        function disablingAddedParts()
        {
            document.getElementById('addpartname').disabled = true;
            document.getElementById('addserialno').disabled = true;
            document.getElementById('addwaranty').disabled = true;
        }   

         function enablingAddedParts()
        {
            document.getElementById('addpartname').disabled = false;
            document.getElementById('addserialno').disabled = false;
            document.getElementById('addwaranty').disabled = false;

        } 

        function disablingRemovedParts()
        {
            document.getElementById('removedpart').disabled = true;
            document.getElementById('removedsrno').disabled = true;                      
        } 

        function enablingRemovedParts()
        {
            document.getElementById('removedpart').disabled = false;
            document.getElementById('removedsrno').disabled = false;                      
        } 

        function error_report($tt,$txt,$ty)
    {
        swal({
            title: $tt,
            text: $txt,
            type: $ty
        });
    }




function setDeviceVisible()
{
 document.getElementById("hider1").style.display="inline";
 document.getElementById("hider2").style.display="none";
 document.getElementById("dinfo").style.display="none";
} 

function setMaintenanceVisible()
{
  document.getElementById("hider1").style.display="none";
  document.getElementById("hider2").style.display="inline";
  document.getElementById("dinfo").style.display="none";
}

function setDV()
{
  
  var result="<?php setDeviceInfo();?>";
  document.getElementById("hider1").style.display="none";
  document.getElementById("dinfo").style.display="inline";
  return false;


}


function setLogout()
{
  window.location = "index.php";

}

</script>

</head>
  <body style="background: #EEFFEE;padding-bottom:10px">
    <form method="post" action="function.php">
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="homepage.php" style="margin-left: -60px">DeviceManagement</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="admin_password.php">Change Password<span class="sr-only">
                    (current)</span> </a></li>
                     <li class="nav-item active"><a class="nav-link" href="javascript:setDeviceVisible()">update_device<span class="sr-only">
                    (current)</span> </a></li>
                     <li class="nav-item active"><a class="nav-link" href="javascript:setMaintenanceVisible()">update_maintenanace<span class="sr-only">
                    (current)</span> </a></li>
                     <li class="nav-item active"><a class="nav-link" href="javascript:setLogout()">Users<span class="sr-only">
                    (current)</span> </a></li>
                                    
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <br>






 <center>
  <div id="hider1" style="display:none;">
    <h3><b>UPDATE DEVICE INFORMATION</b></h3>
    <div style="margin: 40%;  margin-top: 40px;" >
      Select Device Category*
      <div class="container" style="width:300px;">
        <select  name="catdrop" id="kk" class="autosuggest form-control" style="height: 30px">
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
        <br>
      </div>

      <div class="" style="width:300px;">             
        <input type="text" name="dev_id"  id="dev_id" class="form-control" placeholder="Enter Device ID" autocomplete="off" required="" />  
        <div id="IDList"></div>  
      </div>
        <br>
      <input type="button" value="hit" class="btn btn-lg btn-success btn-block" onclick="setDV();"/> 
    </div>
  </div>
  </center>




<!-- dispalying device information -->
          <div style="align-content: center; display: none" id="dinfo">
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
        Device ID*
        <input type="text" name="pfrom"  placeholder="Purchase From"  Width="500px" value="<?=$var_date?>" class="form-control" required>
        
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
        <input type="button" name="sub2" value="Update" class="btn btn-lg btn-success btn-block">
    </div>
</div>






<div style="display: none;align-content: center;" id="hider2">
   <center><h2><span>Enter Maintenance Details</span></h2></center>

<div style="margin: 40%;  margin-top: 40px;">
        Device Category*
        <div class="" style="width:300px;">
          <select  name="catdrop" id="kk" class="autosuggest form-control" style="height: 35px">
          <?php
          $result=mysqli_query($con,"select devCategory from categories");
          while ($row=mysqli_fetch_array($result)) 
          {
          ?>
          <option><?php echo $row["devCategory"];  ?></option>
          <?php   
          }
    //$a=$_POST["catdrop"];
        //$_SESSION["cc"]=$a;

          ?>
          </select>         
      </div>
        <br />
        Item ID*
        <div class="" style="width:300px;">             
            <input type="text" name="dev_id"  id="dev_id" class="form-control" placeholder="Enter Device ID" autocomplete="off" required="" />  
            <div id="IDList"></div>  
           </div>
        <br>
        Maintain Date*
        <input type="Date" name="mdate" ID="mdate" TextMode="Date" class="form-control" Width="500px">
        <br />
        Problem Reported*
        <input type="text" name="issue" ID="problem" TextMode="MultiLine" Class="form-control" Width="500px" placeholder="Reported Problem">
        <br>
        Repaired By*
        <input type="text" name="by" ID="repairedby" TextMode="MultiLine" Class="form-control" Width="500px" placeholder="Repaired By"></asp:TextBox>
        <br />
        Device State After Repair*
        <select name="status" ID="DropDownList1"  Width="500px" Class="form-control" > 
            <option >Active</option>
            <option>InActive</option>
        </select>
        <br />
        <div  class="">
            <input type="radio" name="radiogroup1" value="1" name="ww" onclick="setVisibility('parts', 'none','desc1', 'inline');"; checked="">repaired with Waranty/guarantee
            <br>
            <input type="radio"  name="radiogroup1" value="0" name="ww" onclick="setVisibility('parts', 'inline','desc1', 'none');";>repaired without Waranty/guarantee        
        </div>
        <br />
        
        <div id="desc1">
            Maintanance Description
            <input type="text" name="descr1" ID="descr1" TextMode="MultiLine" Class="form-control" 
            Width="500px" placeholder="Final Description">
            <br />
            <input type="submit" name="sub" onsubmit="return false" value="Save Data" class="btn btn-lg btn-success btn-block">
            <br>
        </div>

    
    <br>
    <br>
    <div id="parts" style="display:none;">
    <div class="row">
        <div class="form-control col-md-6 col-md-offset-1 ">
            Parts Added<br>
            <input id="addyes" type="radio" name="added" onclick="enablingAddedParts();"> Yes
            <br>
            <input type="radio" name="added" onclick="disablingAddedParts();" checked>No
            <br />
            Part Name
            <input type="text" ID="addpartname" name="pname" Class="form-control" Width="500px" 
            placeholder="Enter Part Name" disabled>
            <br />
            Part Serial number
            <input type="text" ID="addserialno" name="paddserialno" Class="form-control" Width="500px" 
            placeholder="Enter Part Serial number" disabled>
            <br />
            Part Warrenty
            <input type="text" ID="addwaranty" name="pwrnty" Class="form-control" Width="500px" 
            placeholder="Enter Part Warrenty" disabled >
            <br />
        </div>
        <br />
        <div id="removed" class="form-control col-md-6 col-md-offset-2" >
            Parts removed
            <br>
            <input type="radio" name="removed" onclick="enablingRemovedParts();"> Yes
            <br>
            <input type="radio" name="removed" onclick="disablingRemovedParts();" checked>No
            <br />
            Part Name
            <input type="text" id="removedpart" name="rname" Class="form-control"
            Width="500px" placeholder="Enter Part Name" disabled>
            <br>
            Part Serial number
            <input id="removedsrno" name="rsl" type="text" ID="TextBox10" Class="form-control"
            Width="500px" placeholder="Enter Part Serial number" disabled>
            <br />
        </div>
    </div>   
    <div ID="bill">Bill Number
            <input type="text" name="billno"  ID="billno" Class="form-control"
            Width="500px" placeholder="Enter Bill No." visible="false">
        </div>
        <br>    
    <div id="hider2">
        Maintaninance Description
        <input type="text" ID="descr2" name="descr2" runat="server" TextMode="MultiLine" Class="form-control" 
        Width="500px" placeholder="Final Description">
        <br>
        <input type="submit" name="sub2" onsubmit="return false" value="Save Data" class="btn btn-lg btn-success btn-block">
    </div>
</div>
</div>
  
</div>



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




<?php

function setDeviceInfo()
{

 session_start();
 $_SESSION["cat"]=$_POST["cat"];
//header("refresh:0; url=homepage.php");

}

?>
