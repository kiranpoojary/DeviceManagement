<?php
$con=mysqli_connect("localhost","root","","testphpdb");
if (!$con) {
}
else
echo "connected to server";
echo "<br>";
if(!mysqli_select_db($con,'testphpdb'))
{
	echo "db not selected";
}
else
echo "db selected";
echo "<br>";
 $ID=$_POST["id"];
echo "<br>";
echo "<br>";
$sql = "DELETE FROM users WHERE ID=$ID";
if(mysqli_query($con,$sql))
{
	echo "$ID data deleted";
	echo "<br>";
}
else
echo "data not deleted";

#header("refresh:5; url=index.html");
?>
?