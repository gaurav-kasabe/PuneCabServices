<?php

require('../fpdf.php');
$a=date("d.m.y").".txt";
$fh=fopen($a,'w') or die("Can't open file!");
require_once '../../configuration/mysql.php';
$query="SELECT * FROM contact";
$result=mysql_query($query);
$field_count=mysql_num_fields($result);
while($row=mysql_fetch_array($result))
{
	$i=0;
	$line="";
	while($i<$field_count)
	{
		$field=$row[$i];
		$line=$line.$field."|";
		$i++;
	}
	$line=$line.PHP_EOL;
	fwrite($fh,$line);
}
fclose($fh);
class PDF extends FPDF
{
// Load data
function LoadData($file)
{
	// Read file lines
	$lines = file($file);
	$data = array();
	foreach($lines as $line)
		$data[] = explode('|',trim($line));
	return $data;
}
function Header()
{
	// Logo
	$this->Image('../../images/logo.jpg',10,10,30);
	// Arial bold 15
	$this->SetFont('Arial','B',15);
//	$this->SetFont('Arial', '', 8);
	// Move to the right
	$this->Cell(80);
	// Title
	$this->Cell(30,10,'REPORT',1,0,'C');
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
	$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
	$this->Cell(0,10,'Powered By:AmiStar Tech.' ,0,0,'C');

}


// Colored table
function FancyTable($header, $data)
{
	// Colors, line width and bold font
	$this->SetFillColor(255,0,0);
	$this->SetTextColor(255);
	$this->SetDrawColor(128,0,0);
	$this->SetLineWidth(.3);
	$this->SetFont('','B');
	// Header
	$w = array(50, 25, 25, 25, 25, 25);
	for($i=0;$i<count($header);$i++)
	{
		if($i==1 || $i==6 || $i==7 || $i==8 || $i==10)
			$this->Cell(25,7,$header[$i],1,0,'C',true);
		else if($i==9)
			$this->Cell(25,7,$header[$i],1,0,'C',true);
		else if($i==11)
			$this->Cell(25,7,$header[$i],1,0,'C',true);
		else if($i==13)
			$this->Cell(25,7,$header[$i],1,0,'C',true);
		else
			$this->Cell(25,7,$header[$i],1,0,'C',true);
	}
	$this->Ln();
	// Color and font restoration
	$this->SetFillColor(224,235,255);
	$this->SetTextColor(0);
	$this->SetFont('Arial', '', 8);
	// Data
	$fill = false;
	foreach($data as $row)
	{
		$this->Cell(25,6,$row[1],'LR',0,'L',$fill);
		$this->Cell(25,6,$row[2],'LR',0,'L',$fill);
		$this->Cell(25,6,$row[3],'LR',0,'L',$fill);
		$this->Cell(25,6,$row[4],'LR',0,'L',$fill);
		$this->Cell(25,6,$row[5],'LR',0,'L',$fill);
		$this->Cell(25,6,$row[6],'LR',0,'L',$fill);
		$this->Cell(25,6,$row[7],'LR',0,'L',$fill);
		$this->Ln();
		$fill = !$fill;		
	}
	// Closing line
	$this->Cell(array_sum($w),0,'','T');
}
}

$pdf = new PDF();
// Column headings
$header = array('Full Name', 'Contact No', 'From', 'To', 'Date', 'Budget', 'Preference');
$pdf->SetFont('Arial', '', 8);
// Data loading
$data = $pdf->LoadData($a);
$pdf->SetFont('Arial', '', 10);
$pdf->AddPage();
$pdf->FancyTable($header,$data);
$pdf->Output();
?>