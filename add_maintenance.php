<?php
/*
$con=mysqli_connect("localhost","root","","DeviceManagement");
*/
include('devicedb.php');
mysqli_select_db($con,'DeviceManagement');
error_reporting(0);
session_start();
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
            type: $ty
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
    <form id="addm" method="post" action="">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="homepage.php" style="margin-left: -60px;">HOME</a>
            
           
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

	$sql="INSERT INTO maintenance(devCategory,devID,maintainDate,issue,repairedBy,status,withWarranty,added,addedName,addedsl,addedWarranty,removed,removedName,removedsl,billno,description) VALUES('$var_cat','$var_devid','$var_mdate','$var_issue','$var_by','$var_sts','$wrnty','$var_added','$var_aname','$var_addedsl',$var_addedw,'$var_removed','$var_rname','$var_rsl','$var_bill','$var_descr')";
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
                'error_report("Something Went Wrong","Data Not Saved!. check wether device already saved or not", "error");',
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

	$sql="INSERT INTO maintenance(devCategory,devID,maintainDate,issue,repairedBy,status,withWarranty,added,addedName,addedsl,addedWarranty,removed,removedName,removedsl,billno,description) VALUES('$var_cat','$var_devid','$var_mdate','$var_issue','$var_by','$var_sts','$wrnty','$var_added','$var_aname','$var_addedsl',$var_addedw,'$var_removed','$var_rname','$var_rsl','$var_bill','$var_descr')";
	if(mysqli_query($con,$sql))
            {	
            	echo '<script type="text/javascript">',
                'error_report("Data Saved","Maintenance Details Saved", "success");',
                '</script>';

            }
            else
            {
            	 echo '<script type="text/javascript">',
                'error_report("Something Went Wrong","Data Not Saved!. check wether device already saved or not", "error");',
                '</script>';
            }
	
}


?>


