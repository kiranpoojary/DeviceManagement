<?php 
	
	$host='localhost';
	$username='root';
	$pass='';
	$db='DeviceManagement';

	$con=mysqli_connect($host,$username,$pass,$db);

	if(!$con) die("Connection refused").mysql_connect_error();
 ?>