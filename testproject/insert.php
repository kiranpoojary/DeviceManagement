


<?php
$con=mysqli_connect("localhost","root","","testphpdb");
if (!$con) 
{
}
else
{
echo "connected to server";
echo "<br>";
if(!mysqli_select_db($con,'testphpdb'))
{
	echo "db not selected";
}
else
echo "db selected";
echo "<br>";
 $Name=$_POST["un"];
$Email=$_POST["em"];
echo "datas";
echo "<br>";
echo $Name;
echo $Email;
echo "<br>";
$sql="INSERT INTO users(Name,Email) VALUES ('$Name','$Email')";
if(mysqli_query($con,$sql))
{
	echo "data inserted";
	echo "<br>";
}
else
echo "data not inserted";
}
//header("refresh:5; url=index.html");
?>


