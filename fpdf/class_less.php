<?php

class class_less extends FPDF {

	private $PG_W = 190;

	public function __construct($passInYourDataHere = NULL) {
		parent::__construct();		
		$this->LineItems();		
	}

	public function LineItems() {

		$header = array("รหัสวิชา", "ชื่อวิชา", "หน่วยกิต", "วัน-เวลาเรียน", "เวลาสอบ", );

		// Data
		while ($a = mysql_fetch_array($objQuery1)) {
		
		$data = array();
				
		$data[] = array(iconv('UTF-8','TIS-620',$a[msj_id]), iconv('UTF-8','TIS-620',$a[msj_name]), iconv('UTF-8','TIS-620',$a[msj_credit]), iconv('UTF-8','TIS-620',$a[msj_study]),iconv('UTF-8','TIS-620',$a[msj_exam]) );
		}
				
		/* Layout */


		

		// Headers and widths
		
		$w = array(20, 55, 15, 40, 38);

		for($i = 0; $i < count($header); $i++) {
			$this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
		}

		$this->Ln();

		// Mark start coords

		$x = $this->GetX();
		$y = $this->GetY();
		$i = 0;
		
		foreach($data as $row)
		{	
			$y1 = $this->GetY();
			$this->MultiCell($w[0], 6, $row[0], 'LRB');	
			$y2 = $this->GetY();
			$yH = $y2 - $y1;
						
			$this->SetXY($x + $w[0], $this->GetY() - $yH);
			
			$this->Cell($w[1], $yH, $row[1], 'LRB');
			$this->Cell($w[2], $yH, $row[2], 'LRB', 0, 'R');
			$this->Cell($w[3], $yH, $row[3], 'LRB', 0, 'R');
			$this->Cell($w[4], $yH, $row[4], 'LRB', 0, 'R');
\
						
			$this->Ln();
			
			$i++;
		}
		
		
	}


}