<?php
session_start();
$username1 = $_SESSION["username"];
/*$id = $_SESSION["id"]*/;
require ("../database.php");
require('../personnel/fpdf181/fpdf.php');
$pdf = new FPDF('P','mm','A4');

$con = mysqli_connect($servername, $username, $password, $database);
$userid = $_GET['userid'];
/* echo $userid;*/
$sql_insp = '';
/*
      $statement = $connection->prepare($sql_insp);
      $statement->execute();
      $or_payments = $statement->fetchAll(PDO::FETCH_OBJ);
*/

       $stmt = $connection->query('SELECT *
                                  FROM tricycle_operator
                                  INNER JOIN or_payments ON tricycle_operator.id_no = or_payments.id_no
                                  WHERE or_payments.id_no = '.$userid.' ');
    while ($package = $stmt->fetch(PDO::FETCH_OBJ))
    {

    $fname= $package->first_name;
    $mname= $package->middle_name;
    $lname= $package->last_name;
    $fullname= $fname.' '.$mname .'. '.$lname;
    $house_no = $package->house_no;
    $street = $package->street;
    $barangay = $package->barangay;
    $city= $package->city;
    $full_add =  $house_no .' '. $street .' '.$barangay.' '.$city;
    $or_date= date_create($package->or_date);
    $or_new_date = date_format($or_date,"yy-m-d");

$pdf->AddPage();
$pdf->SetFont('Arial','',12);
/*$pdf->Cell(40,10,'Hello World!');*/

// Insert a logo in the top-left corner at 300 dpi
$pdf->Image('../img/sj_logo.png',85,10,-800);
$pdf->ln(30);

$pdf->Cell(0,10,'REPUBLIC OF THE PHILIPPINES',0,0,'C');
$pdf->ln(6);
$pdf->Cell(0,10,'CITY OF SAN JUAN, METRO MANILA',0,0,'C');
$pdf->ln(6);
$pdf->Cell(0,10,'OFFICE OF THE CITY MAYOR',0,0,'C');
$pdf->ln(15);
$pdf->SetFont('Arial','',16);
$pdf->Cell(0,10,'TRICYCLE REGULATORY BOARD',0,0,'C');
$pdf->ln(15);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(50,7,'NAME OF APPLICANT:',0,0,'L');
$pdf->SetFont('Arial','',11);
$pdf->Cell(100,7,' '.$fullname,'B',0,'L');

$pdf->ln(10);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(50,10,'ADDRESS:',0,0,'L');
$pdf->SetFont('Arial','',11);
$pdf->Cell(100,7,' '.$full_add,'B',0,'L');
$pdf->ln(15);
$pdf->Cell(0,10,'ORDER OF PAYMENT',0,0,'C');
$pdf->ln(10);

$pdf->Cell(170,10,' '.$or_new_date,0,0,'R');
$pdf->ln(5);
$pdf->Cell(320,10,'DATE',0,0,'C');
$pdf->ln();
$pdf->Cell(180,10,'TO THE CITY TREASURER OF',0,0,'L');
$pdf->ln(5);
$pdf->Cell(320,10,'SAN JUAN CITY, METRO MANILA',0,0,'L');
$pdf->ln(10);
$pdf->Cell(100,10,'Please collect the amount Specified Below:',0,0,'C');
$pdf->ln(15);
$pdf->Cell(100,10,'           Registration Fee',0,0,'L');
$pdf->Cell(80,10,'            '.$num= number_format($package->reg_fee,2),0,0,'R');
$pdf->ln(5);
$pdf->Cell(100,10,'           MCH Franchise Permit',0,0,'L');
$pdf->Cell(80,10,'            '.$num= number_format($package->mch,2),0,0,'R');
$pdf->ln(5);
$pdf->Cell(100,10,'           Registration Sticker',0,0,'L');
$pdf->Cell(80,10,'            '.$num= number_format($package->reg_sticker,2),0,0,'R');
$pdf->ln(5);
$pdf->Cell(100,10,'           Petition',0,0,'L');
$pdf->Cell(80,10,'            '.$num= number_format($package->petition,2),0,0,'R');
$pdf->ln(5);
$pdf->Cell(100,10,'           Confirmation',0,0,'L');
$pdf->Cell(80,10,'            '.$num= number_format($package->confirmation,2),0,0,'R');
$pdf->ln(5);
$pdf->Cell(100,10,'           Inspection',0,0,'L');
$pdf->Cell(80,10,'            '.$num= number_format($package->inspection,2),0,0,'R');
$pdf->ln(5);
$pdf->Cell(100,10,'           Supervision Fee',0,0,'L');
$pdf->Cell(80,10,'            '.$num= number_format($package->supervision,2),0,0,'R');
$pdf->ln(5);
$pdf->Cell(100,10,'           Fare Rate Sticker',0,0,'L');
$pdf->Cell(80,10,'            '.$num= number_format($package->fare_sticker,2),0,0,'R');
$pdf->ln(5);
$pdf->Cell(100,10,'           Plate Sticker',0,0,'L');
$pdf->Cell(80,10,'            '.$num= number_format($package->plate_sticker,2),0,0,'R');
$pdf->ln(5);
$pdf->Cell(100,10,'           Others',0,0,'L');
$pdf->Cell(80,10,'            '.$package->others,0,0,'R');
$pdf->ln(10);
$pdf->Cell(100,10,'                        Total Amount----',0,0,'L');
$pdf->Cell(80,10,'            '.$package->total_amount,0,0,'R');

$pdf->ln(15);
$pdf->Cell(15,10,'TODA:',0,0,'L');
$pdf->Cell(10,10,' '.$package->toda.' #'.$package->toda_no,0,0,'L');
$pdf->ln(5);
$pdf->Cell(15,10,'PLATE #:',0,0,'L');
$pdf->Cell(10,10,'     '.$package->plate_no,0,0,'L');
$pdf->ln(5);
$pdf->Cell(15,10,'STICKER #:',0,0,'L');
$pdf->Cell(10,10,'        '.$package->sticker_no,0,0,'L');
$pdf->ln(15);
$pdf->Cell(0,10,'MARK LESTER E. DELGADO',0,0,'C');
$pdf->ln(5);
$pdf->Cell(0,10,'OIC, Transport Regulatory Board',0,0,'C');
}
$pdf->Output();



?>
