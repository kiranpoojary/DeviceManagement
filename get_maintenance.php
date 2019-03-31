<?php
$con=mysqli_connect("localhost","root","","DeviceManagement");
mysqli_select_db($con,'DeviceManagement');
//error_reporting(0);
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
    <link href="http://localhost/DeviceManagement/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/DeviceManagement/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/DeviceManagement/bootstrap/js/sweetalert.min.js" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 

    <style type="text/css">
      ul{  
          background-color:#eee;  
          cursor:pointer;
        }  
      li
      {  
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


/*

        $(document).ready(function(){  
      $('#m_id').keyup(function(){  
           var m_query = $(this).val();  
           if(m_query != '')  
           {  
                $.ajax({  
                     url:"searchid.php",  
                     method:"POST",
                     data:{m_query:m_query},  
                     success:function(data)  
                     {  
                          $('#IDList2').fadeIn();  
                          $('#IDList2').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', 'li', function(){  
           $('#m_id').val($(this).text());  
           $('#IDList2').fadeOut();
           return false;
      });  
 });    
*/

    </script>

</head>
<body style="background: #EEFFEE;padding-bottom:10px">
    <form id="addm" method="post" action="">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="adminhomepage.php" style="margin-left: -60px;">DeviceManagement</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
           <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <a style="background-color: #393939" class="nav-link" href="adminhomepage.php">Home </a>                
                </ul>
            </div>
        </div>
    </nav>
    <br />
    <br />
    <br />
    <br />
    <br />
    <center>

  
    <div style="background: #EEFFEE; border: 4px solid black" id="newcatadd" class="form-control col-md-6 col-md-offset-2">
      <h2><span>Enter Device Details</span></h2>
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
    
          ?>
          </select> 

      </div>
        <br />
        <br />
        Item ID*
        <div class="" style="width:300px;">             
            <input type="text" name="dev_id"  id="dev_id" class="form-control" placeholder="Enter Device ID" autocomplete="off" required="" />  
            <div id="IDList"></div>  
           </div>
           `<br>
        Maintenance ID*
        <div class="" style="width:300px;">             
            <input type="text" name="m_id"  id="m_id" class="form-control" placeholder="Enter Device ID" autocomplete="off" required="" />  
            <div id="IDList2"></div>  
           </div>
           `<br>
           <br>  
           <input type="submit" name="sub2" onsubmit="return false" value="Continue" class="btn btn-lg btn-success btn-block">
           <br>
           
         </div>
      
        </center>

        <br><br>
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
if(isset($_POST['sub2']) && !empty($_POST['dev_id']))
{
  $cat=$_POST["catdrop"];
  $id=$_POST["dev_id"];
  $mid=$_POST["m_id"];


        //query to check user exist 
        $result = $con->query("SELECT COUNT(*) FROM maintenance  WHERE devid='$id'  AND maintenanceID='$mid'"); 
        $row = $result->fetch_assoc();
        $size = $row['COUNT(*)'];
        if ($size>0) 
        {
          //if device and maintenance exist
          $_SESSION["cat"]=$cat;
          $_SESSION["id"]=$id;
          $_SESSION["mid"]=$mid;

          echo "<script> location.href='updatemaintenance.php'; </script>";


        }
        //display invalid login credential alert
        else    
        {   
        
          echo '<script type="text/javascript">',
            'error_report("Invalid!..","Entered Category Or Device ID is Invalid", "error");',
            '</script>';

        }
        $con->close();






  
}




?>


