<?php

// session_start();
// include "navbar.php";
include "includes/connect.inc.php";
require 'fpdf/fpdf.php';
$sql="SELECT * FROM meeting WHERE flag=0";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
$pdf = new FPDF('P','mm','A3');
$pdf->AddPage();
$pdf->setMargins(25, 45, 11.6);
$pdf->SetFont('Arial', 'B', 20);
$pdf->Image("logo.png", 115, 130, 80, 40, 'PNG');
$pdf->Cell(290, 340, $row['count']." - SENATE MEETING", 0, 0,'C');
$pdf->Cell(-280, 355, "Venue - ".$row['venue'], 0, 0,'C');
$pdf->Cell(280, 370, "Date - ".$row['date'], 0, 0,'C');
$pdf->Cell(-280, 385, "Time - ".$row['time'], 0, 0,'C');
// $pdf->Output('agenda/'.$row['id'].'front.pdf','F');

$pdf->setMargins(25, 45, 11.6);
$pdf->AddPage();
$pdf->SetFont('Arial', 'BU', 30);
$pdf->Cell(240,11,'INDEX',0,1,'C');
$pdf->SetX(12.6);
$pdf->Ln(10);

$pdf->SetFont('Times','B',22);
$pdf->Cell(40,2,'Sr No',0);
$pdf->Cell(40,2,'Title',0);
$pdf->Ln();
$pdf->Cell(70,12,'___________________________________________________________________',0);

$c=1;

$pdf->SetFont('Times','B',14);
$sql1="SELECT title FROM agenda WHERE meeting_id=".$row['id'];
$res1=mysqli_query($conn,$sql1);
// $row1=mysqli_fetch_array($res1);
// foreach($res1 as $row) {
//     $pdf->Ln();
//     foreach($row as $column)
//     $pdf->Cell(40,12,$column,1);
//     }

while($row1=mysqli_fetch_array($res1))
{
    $pdf->Ln();
    $pdf->Cell(40,12,$c++,0);

    $pdf->Cell(40,12,$row1['title'],0);
}
$pdf->Output('agenda/'.$row['id'].'front.pdf','F');
header("Location: generate.php");
        exit();
?>