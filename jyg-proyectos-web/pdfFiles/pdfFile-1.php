<?php

/**
 * 
 * http://fpdf.org/
 * Tutoriales -> Tutorial 1
 * 
 * http://localhost/php/pdfFiles/pdfFile-1.php
 */

require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
//$pdf->Cell(40,10,utf8_decode('¡Hola, Mundo!'));
$pdf->Cell(40, 10, iconv('UTF-8', 'ISO-8859-15', "¡Hola, Mundo Roldán pingüino!"));
$pdf->Ln(20);
$pdf->Cell(60, 10, 'Hecho con FPDF.', 0, 1, 'C');

$pdf->Output();
