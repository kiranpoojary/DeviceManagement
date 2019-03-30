<?php

include_once('fpdf181/fpdf.php');
if (isset($_POST["devb"])&& !empty($_POST["dev"]))
{
  
$k="kiranppp";
 
$pdf = new FPDF('P', 'pt', 'Letter');
$pdf->AddPage(); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(100, 16, $k);
// Line break
$pdf->Ln();
$pdf->Cell(150, 16, "device Report");
$pdf->Cell(170, 16, "device Report!");
$pdf->Output();

}
else
{
	

if (isset($_POST["mntnb"]) && !empty($_POST["mntn"]))
{
  
$k="POOjary";
 
$pdf = new FPDF('P', 'pt', 'Letter');
$pdf->AddPage(); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(100, 16, $k);
// Line break
//$fpdf.Ln();
$pdf->Ln();
$pdf->Cell(150, 16, "maintenanace Report!");
$pdf->Cell(170, 16, "maintenance Report");
$pdf->Output();

}
else
{
$message = "wrong answer";
echo "<script type='text/javascript'>alert('$message');</script>";
header("refresh:0; url=adminhomepage.php");

}
}



?>