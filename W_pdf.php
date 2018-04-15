<?php
//include connection file 
include_once("W_connection.php");
include_once("W_fpdf.php");

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    //$this->Image('logo.png',10,-1,70);
    $this->SetFont('Arial','B',12);
    // Move to the right
    $this->Cell(1);
    // Title
    $this->Cell(190,10,'Bill',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(10,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$mysqli = new dbObj();
$connString =  $mysqli->getConnstring();
$display_heading = array('billid'=>'ID', 'orderid'=> 'OrderID', 'vehicletype'=> 'Vehical','goods'=> 'Goods', 'orderquantity'=>'OrderQuantity', 'rate' => 'Rate', 'amount' => 'Amount', 'taxes' => 'Taxes', 'totalamount' => 'TotalAmount');
$result = mysqli_query($connString, "SELECT billid, orderid, vehicletype, goods, orderquantity, rate, amount, taxes, totalamount FROM billinfo  order by billid desc limit 1") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM billinfo");

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','I',7);
foreach($header as $heading) {
$pdf->Cell(20,20,$display_heading[$heading['Field']],0,"center");
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(20,20,$column,0,0,'center');
}
$pdf->Output();
?>