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
 $uname=$_POST["uname"];
 $uemail=$_POST["uemail"];
echo "<br>";
echo "<br>";

//authentication2
$result = $con->query("SELECT COUNT(*) FROM users  WHERE Name='$uname'  AND Email='$uemail'");
$row = $result->fetch_assoc();
$size = $row['COUNT(*)'];
if ($size==1) {
	echo "u can login now1";
}


//authentication
$result = $con->query("SELECT COUNT(*) FROM users  WHERE ID=$ID");
$row = $result->fetch_assoc();
$size = $row['COUNT(*)'];
if ($size==1) {
	echo "u can login now2";
}



//select records
$sql = "SELECT * FROM users WHERE ID=$ID";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

       echo "id: " . $row["ID"]. " - Name: " . $row["Name"]. "-Email : " . $row["Email"]. "<br>";
       $Email=$row["Email"];
       echo $Email;
      
      
    }
} else {
    echo "0 results";
}

*/
$con->close();
 header("refresh:5; url=select.html" );
#header("refresh:5; url=index.html");
?>
