<?php
include('\xampp\htdocs\fpdf186\fpdf.php');
$pdf=new FPDF('p','mm','A4');
$pdf->addPage();
$pdf->setFont('Arial','B',20);
$pdf->Cell(180,5,'Report',0,0,'C');
$pdf->Cell(50,5,'',0,1,);
$pdf->Cell(50,5,'',0,1,);
$pdf->Cell(50,5,'Name = '.'Bishal',0,0,);
// $pdf->Output('D','File.pdf');
$pdf->Output();
?>