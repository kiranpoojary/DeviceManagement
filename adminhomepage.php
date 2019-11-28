<?php
error_reporting(0);
session_start();
if($_SESSION ["expiry"]==1)
{
  header("refresh:0; url=index.php");

}
else
{
//$con=mysqli_connect("localhost","root","","DeviceManagement");
include('devicedb.php');
if (!$con or !mysqli_select_db($con,'DeviceManagement')) 
{
  //alert_user("Error while connecting to database");
  echo '<script type="text/javascript">',
  'error_report("Something Went Wrong","Error while Connecting to Database server", "error");',
  '</script>';
}
else
{
//select records
$sql = "SELECT * FROM company";
$result = $con->query($sql);

if ($result->num_rows > 0)
{
    // output data of each row
    while($row = $result->fetch_assoc())
    {

       $co=$row["coname"];
       $br=$row["branch"];
       $ctry=$row["country"];
       $st=$row["state"];  
       $dist=$row["district"];  
       $tlk=$row["taluk"];  
       $lm=$row["landmark"];
       $pin=$row["pin"];  
       $mob=$row["contact"];


    }
}
}
$con->close();
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
  <!--
<link href="http://localhost/DeviceManagement/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="http://localhost/DeviceManagement/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />  

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>

-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">


<script type="text/javascript">
  function error_report($tt,$txt,$ty)
  {
    swal({
      title: $tt,
      text: $txt,
      type: $ty
    });
  }

function setLogout()
{
  window.location = "index.php";

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

<style type="text/css">
  .bttn
  {
    background-color: #0000ff;
    border-radius: 20px;
    color: white;
    height: 50px;
    width: 200px;

  }

  .bttn:hover
  {
    background-color: #00ff0f;
    color: black;
    height: 60px;
    width: 220px;
    font-weight: 900;

  }
</style>
</head>
  <body>
    <form method="post" action="get_report.php">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#" style="margin-left: -60px;">DeviceManagement</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="adminhomepage.php">Home <span class="sr-only">
                        (current)</span> </a></li>
                    <li class="nav-item"><a class="nav-link" href="users.php">Users</a> </li>
                    <li class="nav-item"><a class="nav-link" href="admin_menu.php" >Update</a> </li>
                    <li class="nav-item"><a class="nav-link" href="change_admin_password.php">Change Password</a> </li>
                    <li class="nav-item"><a class="nav-link" href="javascript:setLogout()">Logout</a> </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Hero Section-->
    <section class="bg-light">
      <div class="container"> 
        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1">
            <h1>DeviceManagement</h1>
        	<h2><p class="lead" id="company"><center><?php echo $co;?></center></p></h2>
            <br>
            <label style="margin-left: 20px">Branch:</label> <label id="branch"><?php echo $br;?></label>
            <br>
            <label id="Landmark" style="margin-left: 20px"><?php echo $lm;?></label>,<label id="Dist"><?php echo $dist;?></label>(Dist),<label id="Tq"><?php echo $tlk;?></label>(Tq)
            <br>
			<label id="country"  style="margin-left: 20px"><?php echo $ctry;?></label> <label id="pin"><?php echo $pin;?></label> 
			<br>
			<label style="margin-left: 20px">Mob:</label><label id="mob"><?php echo $mob;?></label>
		
          </div>
          <div class="col-lg-6 order-1 order-lg-2"><img src="https://3.bp.blogspot.com/-_7vaKiNZPXk/XCWoF-0xj7I/AAAAAAAAAMk/Bx7Ne5WLEvINHPDoG1jwY6rGO2d62pprwCKgBGAs/s1600/ux-design.jpeg" alt="..." class="img-fluid"></div>
        </div>
      </div>
    </section>
    <br><br>
    <br><br>
  


    <?php

// Check connection
//$con=mysqli_connect("localhost","root","","DeviceManagement");
include('devicedb.php');
if (!$con or !mysqli_select_db($con,'DeviceManagement')) 
{
}
else
{

$sql = "SELECT * FROM users";
$result = $con->query($sql);

if ($result->num_rows > 0)
{
    echo "<div class='container'>";
    echo "<h2>User Of Device Management</h2>";          
    echo "<table class='table table-hover'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Login ID</th>";
    echo "<th>Email</th>";
    echo "<th>Access Type</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while($row = $result->fetch_assoc())
    {
        echo "<tr>";
        echo "<td>".$row["userid"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td>".$row["privilage"]."</td>";
        echo "</tr>";
      
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
}
else
{
    echo "0 results";
}
}


?>
<br><br><br><br>
<div class="row">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<div>
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
      </div><br>
  <input type="submit" name="catreport" value="Get Report"  class="bttn">
</div>   

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<div>
  <input style="width: 200px" type="text"  name="dev"  placeholder="Enter Device ID" class="form-control">
  <br>
  <input type="submit" name="devb" value="Get Device Report"  class="bttn">
</div>   

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<center>
<div>
  <input style="width: 200px" type="text" name="mntn" placeholder="Enter Maintenance ID" class="form-control">
  <br>
  <input type="submit" name="mntnb" value="Get Maintenance Report"  class="bttn">
</div>
</center>
</div>

<br><br><br><br>


    
    <!-- Footer-->
    <div class="py-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 mb-4 mb-lg-0">
            <h5>Ranked #1</h5>
            <ul class="contact-info list-unstyled">
              <li><a href="mailto:sales@landy.com" class="text-dark">#1 University in Karnataka (New Universities Under 5 Years) – KSURF.</a></li>
              <li><a href="tel:123456789" class="text-dark">+00 123 456 789</a></li>
            </ul>
            <p class="text-muted">Laborum aute enim consectetur eu laboris commodo.</p>
          </div>
          <div class="col-lg-4 col-md-6">
            <h5>INFORMATION ABOUT</h5>
            <ul class="links list-unstyled">
              <li> <a href="#" class="text-muted">PESU Programs</a></li>
              <li> <a href="#" class="text-muted">Admission</a></li>
              <li> <a href="#" class="text-muted">CET</a></li>
              <li> <a href="#" class="text-muted">PESSAT</a></li>
            </ul>
          </div>
          <div class="col-lg-4 col-md-6">
            <h5>IMPORTANT INFO</h5>
            <ul class="links list-unstyled">
              <li> <a href="#" class="text-muted">UGC Preforma</a></li>
              <li> <a href="#" class="text-muted">PESU Status Notification From UGC</a></li>
              <li> <a href="#" class="text-muted">PES University ACT</a></li>
              <li> <a href="#" class="text-muted">NIRF 2019</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="py-3 bg-dark text-white">
      <div class="container">
        <div class="row">
          <div class="col-md-7 text-center text-md-left">
            <p class="mb-md-0">© 2019 PES University. All rights reserved.</p>
          </div>
          <div class="col-md-5 text-center text-md-right">
            <p class="mb-0">www.pes.edu <a href="https://bootstrapious.com/" class="external text-white"></a></p>
          </div>
        </div>
      </div>
    </div>
    </form>
  </body>
</html>


