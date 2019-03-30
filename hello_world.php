<?php

include_once('fpdf181/fpdf.php');
if (isset($_POST["dev"]))
{
  
$k="kiranppp";
 
$pdf = new FPDF('P', 'pt', 'Letter');
$pdf->AddPage(); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(100, 16, $k);
// Line break
//$fpdf.Ln();
$pdf->Ln();
$pdf->Cell(150, 16, "Hello, World!");
$pdf->Cell(170, 16, "Hello, World!");
$pdf->Output();

}

if (isset($_POST["mntn"]))
{
  
$k="POOjary";
 
$pdf = new FPDF('P', 'pt', 'Letter');
$pdf->AddPage(); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(100, 16, $k);
// Line break
//$fpdf.Ln();
$pdf->Ln();
$pdf->Cell(150, 16, "Hello, World!");
$pdf->Cell(170, 16, "Hello, World!");
$pdf->Output();

}



?>


?>