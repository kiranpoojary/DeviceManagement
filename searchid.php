<?php
session_start();
error_reporting(0);
//$connect = mysqli_connect("localhost", "root", "", "DeviceManagement");  
include('devicedb.php');
if(isset($_POST["query"]))  
{  

  $output = '';  
 $query = "SELECT devid FROM alldevices WHERE  devid LIKE '%".$_POST["query"]."%'"; 
 $result = mysqli_query($con, $query);  
  $output = '<ul class="list-unstyled" >';  
  if(mysqli_num_rows($result) > 0)  
  {  
    while($row = mysqli_fetch_array($result))  
    {  
      $output .= '<li>'.$row["devid"].'</li>';  
    }  
  }  
  else  
  {  
    $output .= '<li>Device ID Not Found</li>';  
  }  
  $output .= '</ul>';  
  echo $output;  
} 



else
  if(isset($_POST["m_query"]))
{

  $output2 = '';  
 $query = "SELECT maintenanceID FROM Maintenance WHERE  maintenanceID LIKE '%".$_POST["m_query"]."%'"; 
 $result = mysqli_query($connect, $query);  
  $output2 = '<ul class="list-unstyled" >';  
  if(mysqli_num_rows($result) > 0)  
  {  
    while($row = mysqli_fetch_array($result))  
    {  
      $output2 .= '<li>'.$row["maintenanceID"].'</li>';  
    }  
  }  
  else  
  {  
    $output2 .= '<li>Device ID Not Found</li>';  
  }  
  $output2 .= '</ul>';  
  echo $output2; 

} 
?>    


 