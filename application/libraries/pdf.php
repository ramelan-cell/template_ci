<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('fpdf/fpdf.php');

class Pdf extends FPDF{

	function __construct($orientation='L', $unit='mm', $size='A4')
	  {
	    parent::__construct($orientation,$unit,$size);
	}


	function Header(){   
		$PT = PT;
		$alamat = ALAMAT;
	    global $title ;
	    $lebar = $this->w;
	    $this->SetFont('Arial','B',12);
	 	$this->Image('assets/images/kami-sistem.png',10,10,15,15);
	    $w = $this->GetStringWidth($title );
	    $this->SetX(($lebar -$w)/2);
	    $this->Cell($w,9,$title  ,0,0,'C');
	    $this->ln();
	    $this->SetFont('Arial','I',7);
	    $this->Cell(0,5,"$PT"  ,0,0,'C');
	    $this->Ln(4);
	    $this->Cell(0,5,"$alamat"  ,0,0,'C');
	    $this->Rect(5, 5, 200, 287, 'D');
	    $this->Ln();
	    $this->SetLineWidth(1);
	    $this->line($this->GetX(), $this->GetY(), $this->GetX()+$lebar-20, $this->GetY());
	    $this->SetLineWidth(0);
	    $this->line($this->GetX(), $this->GetY(), $this->GetX()+$lebar-20, $this->GetY());
	    $this->Ln();
	}                


	function Footer() {               
	        $this->SetY(-15);   
	        $lebar = $this->w;   
	        $this->SetFont('Arial','I',8);           
	        $this->line($this->GetX(), $this->GetY(), $this->GetX()+$lebar-20, $this->GetY());
	        $this->SetY(-15);
	        $this->SetX(0);       
	        $this->Ln(1);
	        $hal = 'Page : '.$this->PageNo().'/{nb}' ;
	        $this->Cell($this->GetStringWidth($hal ),10,$hal );   
	        $datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
	        $tanggal  = 'Printed : '.date('d-m-Y  h:i-a').' ';
	        $this->Cell($lebar-$this->GetStringWidth($hal )-$this->GetStringWidth($tanggal)-20);   
	        $this->Cell($this->GetStringWidth($tanggal),10,$tanggal );   
	       
	}               


}