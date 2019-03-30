<?php

include_once('fpdf181/fpdf.php');
if (isset($_POST["devb"])&& !empty($_POST["dev"]))
{

$con=mysqli_connect("localhost","root","","devicemanagement");
if (!$con or !mysqli_select_db($con,'DeviceManagement')) 
{
	$message = "Failed to connect server Databse";
echo "<script type='text/javascript'>alert('$message');</script>";
header("refresh:0; url=adminhomepage.php");
  
}
else
{
	$var_devid=$_POST["dev"];
//select records
$sql = "SELECT *  FROM alldevices where devid='$var_devid' ";
$result = $con->query($sql);

if ($result->num_rows > 0)
{
    // output data of each row
    while($row = $result->fetch_assoc())
    {
    	$var_cat=$row["devCategory"];
    	$var_devid=$row["devid"]; 
        $var_pfrom=$row["seller"];
        $var_pudate=$row["dop"];
        $var_comp=$row["company"];
        $var_waranty=$row["waranty"];
        $var_model=$row["model"];
        $var_slno=$row["serNo"];
        $var_installedin=$row["installedin"];
        $var_sts=$row["status"];


    }
}
}
$con->close();







class PDF extends FPDF 
{ 
    // Page header 
    function Header() 
    { 	
    	//$this->Rect( 10,10,200,282); 
        $this->Image('http://localhost/DeviceManagement/images/pes_logo.jpg', 20, 8, 20); 
        $this->Image('http://localhost/DeviceManagement/images/pes_logo.jpg', 160, 8, 20); 
          
        
// Set font format and font-size 
$this->SetFont('Times', 'B', 20); 
  

// Framed rectangular area 
$this->Cell(176, 5, 'Department Of MCA PES University', 0, 0, 'C'); 
  
// Set it new line 
$this->Ln(); 
  
// Set font format and font-size 
$this->SetFont('Times', 'B', 12); 
  
// Framed rectangular area 
$this->Cell(176, 10, 'BSK 3rd stage,Bangalore-560085', 0, 0, 'C'); 
  


    } 
       
    // Page footer 
    function Footer() 
    { 
        // Position at 1.5 cm from bottom 
        $this->SetY(-15);       
        // Set font-family and font-size of footer. 
        $this->SetFont('Arial', 'I', 8); 

        // set page number 
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . 
              '/{nb}', 0, 0, 'C'); 
    } 
} 
   
// Create new object. 
$pdf = new PDF(); 
$pdf->AliasNbPages(); 
// Add new pages. By default no pages available. 
$pdf->AddPage();  
// Set font format and font-size 
$pdf->SetFont('Times', 'BIU', 20);
$pdf->setXY(85,35);
$pdf->Cell(20,18,"Device Details",0,0,'C');

$pdf->Ln();

$pdf->Line(30,47,170,47);
$pdf->SetFont('Times', 'BI', 12);
$pdf->setXY(50,50);
$pdf->Cell(20, 26,"Device Category",0,0,'L');
$pdf->setXY(110,50);
$pdf->Cell(20, 26,": $var_cat",0,0,'L');

$pdf->Ln();

$pdf->setXY(50,65);
$pdf->Cell(20, 26,"Device ID",0,0,'L');
$pdf->setXY(110,65);
$pdf->Cell(20, 26,": $var_devid",0,0,'L');

$pdf->Ln();

$pdf->setXY(50,80);
$pdf->Cell(20, 26,"Serial No.",0,0,'L');
$pdf->setXY(110,80);
$pdf->Cell(20, 26,": $var_slno",0,0,'L');

$pdf->Ln();

$pdf->setXY(50,95);
$pdf->Cell(20, 26,"Device Model",0,0,'L');
$pdf->setXY(110,95);
$pdf->Cell(20, 26,": $var_model",0,0,'L');

$pdf->Ln();

$pdf->setXY(50,125);
$pdf->Cell(20, 26,"Device Brand",0,0,'L');
$pdf->setXY(110,125);
$pdf->Cell(20, 26,": $var_comp",0,0,'L');

$pdf->Ln();

$pdf->setXY(50,110);
$pdf->Cell(20, 26,"Date of Purchase",0,0,'L');
$pdf->setXY(110,110);
$pdf->Cell(20, 26,": $var_pudate",0,0,'L');

$pdf->Ln();

$pdf->setXY(50,140);
$pdf->Cell(20, 26,"Purchased From",0,0,'L');
$pdf->setXY(110,140);
$pdf->Cell(20, 26,": $var_pfrom",0,0,'L');

$pdf->Ln();

$pdf->setXY(50,155);
$pdf->Cell(20, 26,"waranty in Months",0,0,'L');
$pdf->setXY(110,155);
$pdf->Cell(20, 26,": $var_waranty",0,0,'L');

$pdf->Ln();

$pdf->setXY(50,170);
$pdf->Cell(20, 26,"installion Location",0,0,'L');
$pdf->setXY(110,170);
$pdf->Cell(20, 26,": $var_installedin",0,0,'L');

$pdf->Ln();

$pdf->setXY(50,185);
$pdf->Cell(20, 26,"Device Status",0,0,'L');
$pdf->setXY(110,185);
$pdf->Cell(20, 26,": $var_sts",0,0,'L');

$pdf->Output(); 
  
}

else  //if maintenance
{	

if (isset($_POST["mntnb"]) && !empty($_POST["mntn"]))
{
  
$con=mysqli_connect("localhost","root","","devicemanagement");
if (!$con or !mysqli_select_db($con,'DeviceManagement')) 
{
	$message = "Failed to connect server Databse";
echo "<script type='text/javascript'>alert('$message');</script>";
header("refresh:0; url=adminhomepage.php");
  
}
else
{
	$var_mid=$_POST["mntn"];
//select records
$sql = "SELECT *  FROM maintenance where maintenanceID='$var_mid' ";
$result = $con->query($sql);

if ($result->num_rows > 0)
{
    // output data of each row
    while($row = $result->fetch_assoc())
    {
    	$var_cat=$row["devCategory"];
    	$var_mdate=$row["maintainDate"];
        $var_issue=$row["issue"];
        $var_by=$row["repairedBy"];
        $var_sts=$row["status"];
        $var_warranty=$row["withWarranty"];
        $var_added=$row["added"];
        $var_aname=$row["addedName"];
        $var_addedsl=$row["addedsl"];
        $var_addedw=$row["addedWarranty"];
        $var_removed=$row["removed"];
        $var_rname=$row["removedName"];
        $var_rsl=$row["removedsl"];
        $var_bill=$row["billno"];
        $var_descr=$row["Description"];


    }
}
}
$con->close();
 




class PDF2 extends FPDF 
{ 
    // Page header 
    function Header() 
    { 	
    	//$this->Rect( 10,10,200,282); 
        $this->Image('http://localhost/DeviceManagement/images/pes_logo.jpg', 20, 8, 20); 
        $this->Image('http://localhost/DeviceManagement/images/pes_logo.jpg', 160, 8, 20); 
          
        
// Set font format and font-size 
$this->SetFont('Times', 'B', 20); 
  

// Framed rectangular area 
$this->Cell(176, 5, 'Department Of MCA PES University', 0, 0, 'C'); 
  
// Set it new line 
$this->Ln(); 
  
// Set font format and font-size 
$this->SetFont('Times', 'B', 12); 
  
// Framed rectangular area 
$this->Cell(176, 10, 'BSK 3rd stage,Bangalore-560085', 0, 0, 'C'); 
  


    } 
       
    // Page footer 
    function Footer() 
    { 
        // Position at 1.5 cm from bottom 
        $this->SetY(-15);       
        // Set font-family and font-size of footer. 
        $this->SetFont('Arial', 'I', 8); 

        // set page number 
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . 
              '/{nb}', 0, 0, 'C'); 
    } 
} 
   
// Create new object. 
$pdf = new PDF2(); 
$pdf->AliasNbPages(); 
// Add new pages. By default no pages available. 
$pdf->AddPage();  
// Set font format and font-size 
$pdf->SetFont('Times', 'BIU', 20);
$pdf->setXY(85,35);
$pdf->Cell(20,18,"Maintenance Details",0,0,'C');

$pdf->Ln();


$pdf->Line(30,47,170,47);
$pdf->SetFont('Times', 'BI', 12);
$pdf->setXY(50,50);
$pdf->Cell(20, 26,"Device Category",0,0,'L');
$pdf->setXY(110,50);
$pdf->Cell(20, 26,": $var_cat",0,0,'L');

$pdf->Ln();

$pdf->setXY(50,65);
$pdf->Cell(20, 26,"Device Maintenance ID",0,0,'L');
$pdf->setXY(110,65);
$pdf->Cell(20, 26,": $var_mid",0,0,'L');

$pdf->Ln();

$pdf->setXY(50,80);
$pdf->Cell(20, 26,"Maintenance Date.",0,0,'L');
$pdf->setXY(110,80);
$pdf->Cell(20, 26,": $var_mdate",0,0,'L');

$pdf->Ln();

$pdf->setXY(50,95);
$pdf->Cell(20, 26,"Problem Reported",0,0,'L');
$pdf->setXY(110,95);
$pdf->Cell(20, 26,": $var_issue",0,0,'L');

$pdf->Ln();

$pdf->setXY(50,110);
$pdf->Cell(20, 26,"Repaired by",0,0,'L');
$pdf->setXY(110,110);
$pdf->Cell(20, 26,": $var_by",0,0,'L');

$pdf->Ln();

$pdf->setXY(50,125);
$pdf->Cell(20, 26,"After Repair Status",0,0,'L');
$pdf->setXY(110,125);
$pdf->Cell(20, 26,": $var_sts",0,0,'L');

$pdf->Ln();

$pdf->SetFont('Times', 'BI', 12);
$pdf->setXY(50,140);
$pdf->Cell(20, 26,"Reapaired With Waranty",0,0,'L');
$pdf->setXY(110,140);
$pdf->Cell(20, 26,": $var_warranty",0,0,'L');

$pdf->Ln();

$pdf->setXY(50,155);
$pdf->Cell(20, 26,"Parts Added",0,0,'L');
$pdf->setXY(110,155);
$pdf->Cell(20, 26,": $var_added",0,0,'L');

$pdf->Ln();

$pdf->setXY(50,165);
$pdf->Cell(20, 26,"Added Part",0,0,'L');
$pdf->setXY(110,165);
$pdf->Cell(20, 26,": $var_aname",0,0,'L');

$pdf->Ln();

$pdf->setXY(50,180);
$pdf->Cell(20, 26,"Part SR No.",0,0,'L');
$pdf->setXY(110,180);
$pdf->Cell(20, 26,": $var_addedsl",0,0,'L');

$pdf->Ln();

$pdf->setXY(50,194);
$pdf->Cell(20, 26,"Added Part Waranty",0,0,'L');
$pdf->setXY(110,194);
$pdf->Cell(20, 26,": $var_addedw",0,0,'L');

$pdf->Ln();

$pdf->setXY(50,209);
$pdf->Cell(20, 26,"Parts Removed",0,0,'L');
$pdf->setXY(110,209);
$pdf->Cell(20, 26,": $var_removed",0,0,'L');

$pdf->Ln();

$pdf->SetFont('Times', 'BI', 12);
$pdf->setXY(50,224);
$pdf->Cell(20, 26,"Removed Part SL No.",0,0,'L');
$pdf->setXY(110,224);
$pdf->Cell(20, 26,": $var_rsl",0,0,'L');

$pdf->Ln();

$pdf->setXY(50,239);
$pdf->Cell(20, 26,"Bill No.",0,0,'L');
$pdf->setXY(110,239);
$pdf->Cell(20, 26,": $var_bill",0,0,'L');

$pdf->Ln();

$pdf->setXY(50,250);
$pdf->Cell(20, 26,"Description",0,0,'L');
$pdf->setXY(110,250);
$pdf->Cell(20, 26,": $var_descr",0,0,'L');

$pdf->output();



}
else
{
$message = "Please Enter Device ID/Maintenance ID";
echo "<script type='text/javascript'>alert('$message');</script>";
header("refresh:0; url=adminhomepage.php");

}
}

?>

