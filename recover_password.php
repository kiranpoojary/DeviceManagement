<!DOCTYPE html>
<html>
<head>
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


<style type="text/css">
body
{
	margin: 0;
	padding: 0;
	background: url(http://localhost/DeviceManagement/images/login-page-background-12.jpg);
	background-size: cover;
}



#box
{
	height: 332px;
	width: 470px;
	top: 60%;
	left: 50%;
	position: absolute;
	transform: translate(-50%,-50%);
	box-sizing: border-box;
	border-radius: 10px;
	background-color: #000000;
	opacity: 0.65;
	padding: 70px 30px;
}

.imgcontainer 
{
	text-align: center;
	margin: 24px 0 12px 0;
}

/* Avatar image      */
img.avatar {
	width: 10%;
	border-radius: 50%;
}

</style>

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
                window.location.href = "recover_mail.php";
                
                }
        });
}
</script>

</head>
<body>
	<form action="" method="post">
		<table width="40%" bgcolor="0099CC" align="center">
			<br/><br/><br/>
			<center><h1 style="color:white">Recover Your Password</h1></center>
			<div class="imgcontainer">
				<img src="http://localhost/DeviceManagement/images/anyone.png" alt="Avatar" class="avatar">
			</div>
			<div id="box">
				<div class="container">
					<center>
						<input type="text" placeholder="Enter UserID" name="uid" class="form-control" autocomplete="off" required autofocus>
					</center>
					<br/>
					<br>
					<center>
						<input type="submit" name="sub" value="Recover Password" class="btn btn-lg btn-success btn-block">
					</center>
					<br/>
				</div>
				
				</div>
			</div>
		</table>
	</form>
</body>
</html>


<?php
error_reporting(0);
session_start();
$_SESSION ["expiry"]=1;
//$con=mysqli_connect("localhost","root","","DeviceManagement");
include('devicedb.php');
if (!$con or !mysqli_select_db($con,'DeviceManagement')) 
	{
	//alert_user("Error while connecting to database");
	echo '<script type="text/javascript">','error_report("Something Went Wrong","Error while Connecting to Database server", "error");
	','</script>'; 
	}
else
	{
		if (isset($_POST["uid"]) && !empty($_POST["uid"])) 
			{

				$uid=$_POST["uid"];
				$result = $con->query("SELECT COUNT(*) FROM users  WHERE userid='$uid'"); 
				$row = $result->fetch_assoc();
				$size = $row['COUNT(*)'];
				if ($size!=0) 
				{
						
					//query to determine maintainer or admin
					$sql = "SELECT * FROM users WHERE userid='$uid' ";
					$result = $con->query($sql);
					if ($result->num_rows > 0)
					{
						 // output data of each row
						while($row = $result->fetch_assoc())
						{
        					$var_uid=$row["userid"];
        					$var_psw=$row["password"];
        					$var_email=$row["email"];
        					$var_role=$row["privilage"];
        					
        				}
        				
        				$_SESSION["email"]=$var_email;
        				$_SESSION["psw"]=$var_psw;
  						$_SESSION["subject"]="Device Management";
  						$_SESSION["body1"]="Password Recovered";				
                		$_SESSION["uid"]=$var_uid;
                		echo '<script type="text/javascript">';echo 'error_report_success("Successfull!!","Please Check your Registered Email", "success");
						';echo '</script>';

        				
					}
				}
				//display invalid login credential alert
				else 		
				{  
					echo '<script type="text/javascript">';echo 'error_report("Invalid Credential!","Please Enter Valid  UserID", "error");
						';echo '</script>';
				}

				$con->close();
			
			}
	}
	
?>

