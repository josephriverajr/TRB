<?php
session_start();
$username1 = $_SESSION["username"];
/*$id = $_SESSION["id"]*/;
require ("../database.php");
require('../personnel/fpdf181/fpdf.php');
$pdf = new FPDF('P','mm','Legal');

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
    $or_new_date = date_format($or_date,"m-d-yy");

$pdf->AddPage();
$pdf->SetFont('Arial','',12);
/*$pdf->Cell(40,10,'Hello World!');*/

$pdf->ln(5);

$pdf->Cell(0,10,'REPUBLIC OF THE PHILIPPINES',0,0,'C');
$pdf->ln(5);
$pdf->Cell(0,10,'CITY OF SAN JUAN, METRO MANILA',0,0,'C');
$pdf->ln(5);
$pdf->Cell(0,10,'OFFICE OF THE CITY MAYOR',0,0,'C');
$pdf->ln(5);
$pdf->Cell(0,10,'-oOo-',0,0,'C');
$pdf->ln(5);
$pdf->SetFont('Arial','',13);
$pdf->Cell(0,10,'AUTHORITY FOR TRICYCLE SERVICE',0,0,'C');
$pdf->ln(1);
$pdf->Cell(0,10,'_________________________________',0,0,'C');
$pdf->ln(12);

$pdf->SetFont('Arial','B',11);
$pdf->Cell(25,7,'APPLICANT:',0,0,'L');
$pdf->SetFont('Arial','',11);
$pdf->Cell(100,7,' '.$fullname,0,0,'L');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(25,7,'CASE NO:',0,0,'L');
$pdf->SetFont('Arial','',11);
$pdf->Cell(100,7,' '.$package->case_no,0,0,'L');

$pdf->ln(5);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(25,10,'ADDRESS:',0,0,'L');
$pdf->SetFont('Arial','U',11);
$pdf->Cell(70,10,' '.$full_add,0,0,'L');
$pdf->ln(5);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0,10,'Applicant is hereby granted AUTHORITY to operate a motorized tricycle for hire on the route',0,0,'L');
$pdf->ln(5);
$pdf->Cell(0,10,'                                       DON MAN TODA: ALL AREAS IN SAN JUAN METRO MANILA',0,0,'L');
$pdf->ln(5);
$pdf->Cell(0,10,'                                                                               EXCEPT IN GREENHILLS AND WEST CRAME',0,0,'L');
$pdf->ln(5);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,10,'Using One ( 1 ) tricycle described as follows:',0,0,'L');
$pdf->ln(10);

/*$pdf->SetFont('Arial','B',11);
$pdf->Cell(45,7,'             MAKE',0,0,'L');
$pdf->Cell(15,7,'             MOTOR NO.',0,0,'L');
$pdf->Cell(15,7,'             CHASIS NO.',0,0,'L');
$pdf->Cell(15,7,'             PLATE NO.',0,0,'L');
$pdf->ln(5);
$pdf->Cell(35,7,'              '.$package->make,0,0,'L');
$pdf->Cell(25,7,'              '.$package->motor_no,0,0,'L');
*/
// Set font
$pdf->SetFont('Arial','B',11);
$width_cell=array(45,45,45,45);

// Header starts ///
$pdf->Cell($width_cell[0],10,'MAKE',0,0,'C',false); // First header column
$pdf->Cell($width_cell[1],10,'MOTOR NO.',0,0,'C',false); // Second header column
$pdf->Cell($width_cell[2],10,'CHASIS NO.',0,0,'C',false); // Third header column
$pdf->Cell($width_cell[3],10,'PALTE NO.',0,1,'C',false); // Fourth header column
//TABLE ROWS
$pdf->Cell($width_cell[0],10,''.$package->make,0,0,'C',false); // First column of row 1
$pdf->Cell($width_cell[1],10,''.$package->motor_no,0,0,'C',false); // Second column of row 1
$pdf->Cell($width_cell[2],10,''.$package->chasis_no,0,0,'C',false); // Third column of row 1
$pdf->Cell($width_cell[3],10,''.$package->plate_no,0,1,'C',false); // Fourth column of row 1

$pdf->ln(1);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,10,'Subject to the following condition',0,0,'L');

//1
$pdf->ln(10);
$pdf->SetFont('Arial','',11);
$pdf->Cell(52,10,'            1.  This authority shall be valid ',0,0,'L');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(30,10,'             TWO (2) YEARS',0,0,'L');
$pdf->SetFont('Arial','',11);
$pdf->Cell(35,10,'             for from the date hereof:',0,0,'L');

//2
$pdf->ln(10);
$pdf->SetFont('Arial','',11);
$pdf->Cell(52,10,'            2.  Applicant shall charge the following fare rate per passenger per trip: P7.50:',0,0,'L');
$pdf->ln(5);
$pdf->Cell(52,10,'                For the first kilometer and P0.50 for every succeeding kilometer there after:',0,0,'L');


//3
$pdf->ln(10);
$pdf->SetFont('Arial','',11);
$pdf->Cell(52,10,'            3.  Applicant shall NOT operate along National Highway and/or outside his authority',0,0,'L');
$pdf->ln(5);
$pdf->Cell(52,10,'                 Routes',0,0,'L');


//4
$pdf->ln(10);
$pdf->SetFont('Arial','',11);
$pdf->Cell(52,10,'            4.  The passenger capacity of he tricycle shall be limited to three (3) only including the',0,0,'L');
$pdf->ln(5);
$pdf->Cell(52,10,'                 driver',0,0,'L');

//5
$pdf->ln(10);
$pdf->SetFont('Arial','',11);
$pdf->Cell(52,10,'            5.  The applicant shall hire licensed driver only:',0,0,'L');

//6
$pdf->ln(10);
$pdf->SetFont('Arial','',11);
$pdf->Cell(52,10,'            6.  The tricycle shall be registered with the Land Transportation Office San Juan',0,0,'L');
$pdf->ln(5);
$pdf->Cell(52,10,'                 agency:',0,0,'L');

//7
$pdf->ln(10);
$pdf->SetFont('Arial','',11);
$pdf->Cell(52,10,'            7.  Applican shall pay supervision and regulatory fee of P40.00 per unit on or before',0,0,'L');
$pdf->ln(5);
$pdf->Cell(52,10,'                 September 30th of every year:',0,0,'L');

//8
$pdf->ln(10);
$pdf->SetFont('Arial','',11);
$pdf->Cell(52,10,'            8.  Any authorized alteration, additon or deletion shall invalidate this authority:',0,0,'L');

//9
$pdf->ln(10);
$pdf->SetFont('Arial','',11);
$pdf->Cell(52,10,'            9.  Application shall comply with existing laws, rules and regulations for tricycle',0,0,'L');
$pdf->ln(5);
$pdf->Cell(52,10,'                 Service well as the conditions herein and the non-compliance therewith shall be',0,0,'L');
$pdf->ln(5);
$pdf->Cell(52,10,'                 Sufficient cause for the revocation or suspension of this authority.',0,0,'L');

$pdf->ln(15);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0,10,'SO ORDERED',0,0,'L');
$pdf->ln(5);
$pdf->SetFont('Arial','',11);
$pdf->Cell(80,10,'San Juan, Metro Manila,',0,0,'L');
$pdf->SetFont('Arial','BU',11);
$datenow =date("M d, yy");
$pdf->Cell(25,10,''.$datenow,0,0,'L');
$pdf->ln(10);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,10,'Approved:',0,0,'L');
$pdf->ln(5);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0,10,'By authority of Mayor FRANCIS J. ZAMORA:',0,0,'L');


$pdf->ln(15);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0,10,'ATTY. DENNIS ALBERT S. PAMINTUAN',0,0,'L');
$pdf->ln(5);
$pdf->SetFont('Arial','BI',11);
$pdf->Cell(120,10,'City Administrator',0,0,'L');
$pdf->Cell(250,10,'PBGEN, WILSON C. CAUBAT (RET)',0,0,'L');
$pdf->ln(5);
$pdf->Cell(140,10,' ',0,0,'L');
$pdf->Cell(250,10,'Chief, POSO',0,0,'L');
$pdf->ln(10);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0,10,'STICKER NO:   '.$package->sticker_no,0,0,'L');
$pdf->ln(5);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0,10, $package->toda.' '. 'TODA:   '.$package->toda_no,0,0,'L');

$pdf->ln(10);
$pdf->SetFont('Arial','BI',11);
$pdf->Cell(10,10,'CC:    ',0,0,'L');
$pdf->SetFont('Arial','I',11);
$pdf->Cell(10,10,'LTO San Juan     ',0,0,'L');

$pdf->ln(5);
$pdf->SetFont('Arial','BI',11);
$pdf->Cell(10,10,'       ',0,0,'L');
$pdf->SetFont('Arial','I',11);
$pdf->Cell(10,10,"Mayor's Office    ",0,0,'L');
$pdf->ln(5);
$pdf->SetFont('Arial','BI',11);
$pdf->Cell(10,10,'       ',0,0,'L');
$pdf->SetFont('Arial','I',11);
$pdf->Cell(10,10,"SangguniangPanlungsod File",0,0,'L');
}
$pdf->Output();



?>
