<?php
session_start();
error_reporting(0);
//$con=mysqli_connect("localhost","root","","DeviceManagement");
include('devicedb.php');
mysqli_select_db($con,'DeviceManagement');
if($_SESSION ["expiry"]==1)
{
  header("refresh:0; url=index.php");

}

$var_cat=$_SESSION["cat"];
$var_did=$_SESSION["id"];
$var_mid=$_SESSION["mid"];



?>

<!DOCTYPE html>
<html>
<head>
    <title>Maintenance</title>
    <!--
    <link href="http://localhost/DeviceManagement/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/DeviceManagement/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/DeviceManagement/bootstrap/js/sweetalert.min.js" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

    <style type="text/css">
    	ul{  
                background-color:#eee;  
                cursor:pointer;
              }  
         li{  
                padding:12px;  
              }        

    </style>
    <script language="JavaScript">
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
            type: $ty,
            

        },
        function (isConfirm) {
            if (isConfirm) {
                window.location.href = "get_maintenance.php";
                
                }
        });
}






        $(document).ready(function(){  
      $('#dev_id').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"searchid.php",  
                     method:"POST",
                     data:{query:query},  
                     success:function(data)  
                     {  
                          $('#IDList').fadeIn();  
                          $('#IDList').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', 'li', function(){  
           $('#dev_id').val($(this).text());  
           $('#IDList').fadeOut();
           return false;
      });  
 });  	


    </script>

</head>
<body style="background: #EEFFEE;padding-bottom:10px">
    <?php
    
    //select records
$sql = "SELECT * FROM maintenance WHERE devCategory='$var_cat' AND devid='$var_did' AND maintenanceID='$var_mid' ";
$result = $con->query($sql);
if ($result->num_rows > 0)
{
    // output data of each row
    while($row = $result->fetch_assoc())
    {
        
        $var_mdate=$row["maintainDate"];
        $var_issue=$row["issue"];
        $var_by=$row["repairedBy"];
        $var_sts=$row["status"];
        $var_warranty=$row["withWarranty"];
        $var_added=$row["added"];
        $var_aname=$row["addedName"];
        $var_addedsl=$row["addedsl"];
        $var_addedw=$row["addedWarranty"];
        $var_removed=$row["removed"];
        $var_rname=$row["removedName"];
        $var_rsl=$row["removedsl"];
        $var_bill=$row["billno"];
        $var_descr=$row["Description"];
        

    }
}

  


    ?>
    <form id="addm" method="post" action="">
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
    <center><h2><span>Enter Maintenance Details</span></h2></center>

<div style="margin: 40%;  margin-top: 40px;">
        Device Category*
        <input type="text" value="<?php echo "$var_cat"; ?>" name="catdrop" ID="cat" TextMode="MultiLine" Class="form-control" Width="500px" placeholder="Enter Device Category" disabled>
        <br />
        Item ID*          
        <input type="text" name="dev_id" value="<?php echo "$var_did"; ?>"  id="dev_id" class="form-control" placeholder="Enter Device ID" autocomplete="off" required=""  disabled/>    
        <br>
        Maintain Date*
        <input type="Date" name="mdate" value="<?php echo "$var_mdate"; ?>" ID="mdate" TextMode="Date" class="form-control" Width="500px">
        <br />
        Problem Reported*
        <input type="text" name="issue" value="<?php echo "$var_issue"; ?>"  ID="problem" TextMode="MultiLine" Class="form-control" Width="500px" placeholder="Reported Problem">
        <br>
        Repaired By*
        <input type="text" name="by" ID="repairedby" value="<?php echo "$var_by"; ?>" TextMode="MultiLine" Class="form-control" Width="500px" placeholder="Repaired By"></asp:TextBox>
        <br />
        Device State After Repair*
        <select name="status" ID="DropDownList1"  Width="500px" Class="form-control" > 
            <option >Active</option>
            <option>InActive</option>
        </select>
        <br />
        <div  class="">
            <input type="radio" name="radiogroup1"  value="1" name="ww" onclick="setVisibility('parts', 'none','desc1', 'inline');"; checked="">repaired with Waranty/guarantee
            <br>
            <input type="radio"  name="radiogroup1" value="0" name="ww" onclick="setVisibility('parts', 'inline','desc1', 'none');";>repaired without Waranty/guarantee        
        </div>
        <br />
        
        <div id="desc1" style="display: none;">
            Maintanance Description
            <input type="text" name="descr1" value="<?php echo "$var_descr"; ?>" ID="descr1" TextMode="MultiLine" Class="form-control" 
            Width="500px" placeholder="Final Description">
            <br />
            <input type="submit" name="sub"  onsubmit="return false" value="Save Data" class="btn btn-lg btn-success btn-block">
            <br>
        </div>

    
    <br>
    <br>
    <div id="parts" style="display:inline;">
    <div class="row">
        <div class="form-control col-md-6 col-md-offset-1 ">
            Parts Added<br>
            <input id="addyes" type="radio" name="added" onclick="enablingAddedParts();"> Yes
            <br>
            <input type="radio" name="added"  onclick="disablingAddedParts();" checked>No
            <br />
            Part Name
            <input type="text" ID="addpartname" value="<?php echo "$var_aname"; ?>" name="pname" Class="form-control" Width="500px" 
            placeholder="Enter Part Name" disabled>
            <br />
            Part Serial number
            <input type="text" ID="addserialno" value="<?php echo "$var_addedsl"; ?>" name="paddserialno" Class="form-control" Width="500px" 
            placeholder="Enter Part Serial number" disabled>
            <br />
            Part Warrenty
            <input type="text" ID="addwaranty" value="<?php echo "$var_addedw"; ?>" name="pwrnty" Class="form-control" Width="500px" 
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
            <input type="text" id="removedpart" value="<?php echo "$var_rname"; ?>" name="rname" Class="form-control"
            Width="500px" placeholder="Enter Part Name" disabled>
            <br>
            Part Serial number
            <input id="removedsrno" name="rsl" value="<?php echo "$var_rsl"; ?>" type="text" ID="TextBox10" Class="form-control"
            Width="500px" placeholder="Enter Part Serial number" disabled>
            <br />
        </div>
    </div>   
    <div ID="bill">Bill Number
            <input type="text" name="billno" value="<?php echo "$var_bill"; ?>"  ID="billno" Class="form-control"
            Width="500px" placeholder="Enter Bill No." visible="false">
        </div>
        <br>    
    <div id="hider2">
        Maintaninance Description
        <input type="text" ID="descr2" value="<?php echo "$var_descr"; ?>" name="descr2" runat="server" TextMode="MultiLine" Class="form-control" 
        Width="500px" placeholder="Final Description">
        <br>
        <input type="submit" name="sub2" onsubmit="return false" value="Save Data" class="btn btn-lg btn-success btn-block">
    </div>
</div>
</div>

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


$var_devid=$_POST["dev_id"];
$var_cat=$_POST["catdrop"];
$var_mdate=$_POST["mdate"];
$var_issue=$_POST["issue"];
$var_by=$_POST["by"];
$var_sts=$_POST["status"];
$wrnty="Yes";

//added and removed parsts
$var_added="No";
$var_aname="Nil";
$var_addedsl="Nil";
$var_addedw=0;
$var_removed="No";
$var_rname="Nil";
$var_rsl="Nil";
$var_bill="Nil";
$var_descr="Nil";




if (isset($_POST["sub"]))
{
	$var_descr=$_POST["descr1"];

	$sql="UPDATE maintenance SET maintainDate='$var_mdate',issue='$var_issue',repairedBy='$var_by',status='$var_sts',withWarranty='$wrnty',added='$var_added',addedName='$var_aname',addedsl='$var_addedsl',addedWarranty=$var_addedw,removed='$var_removed',removedName='$var_rname',removedsl='$var_rsl',billno='$var_bill',description='$var_descr' WHERE maintenanceID='$var_mid'";
	   //$sql="INSERT INTO maintenance(devCategory,devID) VALUES('$var_cat','$var_devid')";
        if(mysqli_query($con,$sql))
        {	
            echo '<script type="text/javascript">',
            'error_report("Data Saved","Maintenance Details Saved", "success");',
            '</script>';

        }
        else
        {
            echo '<script type="text/javascript">',
                'error_report("UPDATED","Maintenance Details Successfuly Updated", "success");',
                '</script>';
        }
}

$wrnty="Yes";
$var_aname="Nil";
$var_addedsl="Nil";
$var_addedw=0;
$var_rname="Nil";
$var_rsl="Nil";

if (isset($_POST["sub2"]))
{
	$wrnty="No";
	$var_aname=$_POST["pname"];
	if($var_aname!="Nil" && $var_aname!="" )
	{

		$var_added="Yes";
		$var_addedsl=$_POST["paddserialno"];
		$var_addedw=$_POST["pwrnty"];

	}
	else
	{
		$var_added="No";
		$var_aname="Nil";
		$var_addedsl="Nil";
		$var_addedw=0;
		

	}

	$var_rname=$_POST["rname"];
	if($var_rname!="Nil" && $var_rname!="")
	{
		$var_removed="Yes";
		$var_rsl=$_POST["rsl"];
		
	}
	else
	{
		$var_removed="No";
		$var_rname="Nil";
		$var_rsl="Nil";
		
	}
	$var_bill=$_POST["billno"];
	$var_descr=$_POST["descr2"];
$sql="UPDATE maintenance SET maintainDate='$var_mdate',issue='$var_issue',repairedBy='$var_by',status='$var_sts',withWarranty='$wrnty',added='$var_added',addedName='$var_aname',addedsl='$var_addedsl',addedWarranty=$var_addedw,removed='$var_removed',removedName='$var_rname',removedsl='$var_rsl',billno='$var_bill',description='$var_descr' WHERE maintenanceID='$var_mid'";
	if(mysqli_query($con,$sql))
            {	
            	echo '<script type="text/javascript">',
                'error_report("UPDATED","Maintenance Details Successfuly Updated", "success");',
                '</script>';

            }
            else
            {
            	 echo '<script type="text/javascript">',
                'error_report("Something Went Wrong","Data Not Saved!. check the all details are correct?", "error");',
                '</script>';
            }
	
}


?>


