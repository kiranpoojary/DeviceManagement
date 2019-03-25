<?php
$con=mysqli_connect("localhost","root","","DeviceManagement");
mysqli_select_db($con,'DeviceManagement');
	
?>
	
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="post">
		<select>
			<?php
			$result=mysqli_query($con,"select userid from users");
			while ($row=mysqli_fetch_array($result)) 
			{
			?>
			<option><?php echo $row["userid"];  ?></option>
			<?php	
			}
			 ?>
		</select>
		
	</form>

</body>
</html>