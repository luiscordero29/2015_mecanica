<?php
tcpdf();  
// create new PDF document

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		$this->SetY(15);
		// Set font
		$this->SetFont('helvetica', 'B', 10);
		/*// Title
		$this->Cell(0, 0, 'Universidad Nacional Experimental', 0 , 1, 'C', 0, '', 0,  0, '', 0);
		$this->Cell(0, 0, 'de los Llanos Occidentales', 0 , 1, 'C', 0, '', 0,  0, '', 0);
		$this->Cell(0, 0, '"Ezequiel Zamora"', 0 , 1, 'C', 0, '', 0,  0, '', 0);
		$this->Cell(0, 0, '"Oficina de Planificación y Evaluación Institucional"', 0 , 1, 'C', 0, '', 0,  0, '', 0);
		$this->SetXY(170, 15);
		$this->Image(base_url().'assets/layout/images/logo.png', '', '', 20, 20, '', '', '', false, 300, '', false, false, 1, false, false, false);
		$this->SetXY(20, 12);
		$this->Image(base_url().'assets/layout/images/unellez.png', '', '', 22, 22, '', '', '', false, 300, '', false, false, 1, false, false, false);*/
	}

	// Page footer
    public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-20);
		// Set font
		$this->SetFont('helvetica', '', 8);
		// Page number
		$this->Cell(0, 0, '', 0, 1, 'L', 0, '', 0, false, 'T', 'M');
	}
}

$obj_pdf = new MYPDF('P', PDF_UNIT, 'Letter', true, 'UTF-8', false);

$obj_pdf->SetCreator(PDF_CREATOR);
$obj_pdf->SetAuthor('Ing. Luis Cordero');
$obj_pdf->SetTitle('REPORTE');
$obj_pdf->SetSubject('REPORTE');
$obj_pdf->SetKeywords('REPORTE');

// set default header data
$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$obj_pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$obj_pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$obj_pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// ---------------------------------------------------------

// set default font subsetting mode
$obj_pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
// Add a page
// This method has several options, check the source code documentation for more information.
$obj_pdf->AddPage();

$obj_pdf->SetFillColor(0, 0, 0, 0);

$obj_pdf->SetFont('helvetica', 'B', 14);
$obj_pdf->Cell(0, 0, 'DATOS PERSONALES', 1, 1, 'C', 1, '', 0,  0, '', 0);

$obj_pdf->SetFont('helvetica', 'B', 10);
$obj_pdf->Cell(45, 0, 'CEDULA DE IDENTIDAD', 1, 0, 'L', 1, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'APELLIDOS Y NOMBRES', 1, 1, 'L', 1, '', 0,  0, '', 0);

$obj_pdf->SetFont('helvetica', '', 10);
$obj_pdf->Cell(45, 0, ''.$row['identidad'], 1, 0, 'L', 1, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, ''.$row['apellidos'].' '.$row['nombres'], 1, 1, 'L', 1, '', 0,  0, '', 0);

$obj_pdf->SetFont('helvetica', 'B', 10);
$obj_pdf->Cell(60, 0, 'SEXO', 1, 0, 'L', 1, '', 0,  0, '', 0);
$obj_pdf->Cell(60, 0, 'TELEFONO', 1, 0, 'L', 1, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'ACTIVO', 1, 1, 'L', 1, '', 0,  0, '', 0);

$obj_pdf->SetFont('helvetica', '', 10);
$obj_pdf->Cell(60, 0, ''.$row['sexo'], 1, 0, 'L', 1, '', 0,  0, '', 0);
$obj_pdf->Cell(60, 0, ''.$row['telefono'], 1, 0, 'L', 1, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, ''.$row['activo'], 1, 1, 'L', 1, '', 0,  0, '', 0);

$obj_pdf->SetFont('helvetica', 'B', 10);
$obj_pdf->Cell(0, 0, 'CORREO', 1, 1, 'L', 1, '', 0,  0, '', 0);

$obj_pdf->SetFont('helvetica', '', 10);
$obj_pdf->Cell(0, 0, ''.$row['correo'], 1, 1, 'L', 1, '', 0,  0, '', 0);

$obj_pdf->SetFont('helvetica', 'B', 10);
$obj_pdf->Cell(0, 0, 'DIRECCION', 1, 1, 'L', 1, '', 0,  0, '', 0);

$obj_pdf->SetFont('helvetica', '', 10);
$obj_pdf->Cell(0, 0, ''.$row['direccion'], 1, 1, 'L', 1, '', 0,  0, '', 0);

$obj_pdf->SetFont('helvetica', 'B', 10);
$obj_pdf->Cell(0, 0, 'TELEFONO', 1, 1, 'L', 1, '', 0,  0, '', 0);

$obj_pdf->SetFont('helvetica', '', 10);
$obj_pdf->Cell(0, 0, ''.$row['telefono'], 1, 1, 'L', 1, '', 0,  0, '', 0);

$obj_pdf->SetFont('helvetica', 'B', 14);
$obj_pdf->Cell(0, 0, 'DATOS DEL VEHICULO', 1, 1, 'C', 1, '', 0,  0, '', 0);

$obj_pdf->SetFont('helvetica', 'B', 10);
$obj_pdf->Cell(25, 0, 'PLACA', 1, 0, 'L', 1, '', 0,  0, '', 0);
$obj_pdf->Cell(25, 0, 'AÑO', 1, 0, 'L', 1, '', 0,  0, '', 0);
$obj_pdf->Cell(43, 0, 'COLOR', 1, 0, 'L', 1, '', 0,  0, '', 0);
$obj_pdf->Cell(43, 0, 'MARCA', 1, 0, 'L', 1, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'MODELO', 1, 1, 'L', 1, '', 0,  0, '', 0);

$obj_pdf->SetFont('helvetica', '', 10);
$obj_pdf->Cell(25, 0, ''.$row['placa'], 1, 0, 'L', 1, '', 0,  0, '', 0);
$obj_pdf->Cell(25, 0, ''.$row['periodo'], 1, 0, 'L', 1, '', 0,  0, '', 0);
$obj_pdf->Cell(43, 0, ''.$row['color'], 1, 0, 'L', 1, '', 0,  0, '', 0);
$obj_pdf->Cell(43, 0, ''.$row['marca'], 1, 0, 'L', 1, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, ''.$row['modelo'], 1, 1, 'L', 1, '', 0,  0, '', 0);

$obj_pdf->SetFont('helvetica', 'B', 14);
$obj_pdf->Cell(0, 0, 'SERVICIO', 1, 1, 'C', 1, '', 0,  0, '', 0);

$obj_pdf->SetFont('helvetica', 'B', 10);
$obj_pdf->Cell(30, 0, 'FECHA', 1, 0, 'L', 1, '', 0,  0, '', 0);
$obj_pdf->Cell(30, 0, 'COSTO', 1, 0, 'L', 1, '', 0,  0, '', 0);
$obj_pdf->Cell(60, 0, 'MANTENIMIENTO', 1, 0, 'L', 1, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, 'AREA', 1, 1, 'L', 1, '', 0,  0, '', 0);

$obj_pdf->SetFont('helvetica', '', 10);
$obj_pdf->Cell(30, 0, ''.date("d/m/Y", strtotime($row['fecha'])), 1, 0, 'L', 1, '', 0,  0, '', 0);
$obj_pdf->Cell(30, 0, ''.$row['costo'], 1, 0, 'L', 1, '', 0,  0, '', 0);
$obj_pdf->Cell(60, 0, ''.$row['mantenimiento'], 1, 0, 'L', 1, '', 0,  0, '', 0);
$obj_pdf->Cell(0, 0, ''.$row['area'], 1, 1, 'L', 1, '', 0,  0, '', 0);

$obj_pdf->SetFont('helvetica', 'B', 10);
$obj_pdf->Cell(0, 0, 'DESCRIPCION', 1, 1, 'L', 1, '', 0,  0, '', 0);

$obj_pdf->SetFont('helvetica', '', 10);
$obj_pdf->MultiCell(0, 0, ''.$row['descripcion'], 1, 'L', 1, 1, '', '', true);

$obj_pdf->SetFont('helvetica', 'B', 10);
$obj_pdf->Cell(0, 0, 'OBSERVACION', 1, 1, 'L', 1, '', 0,  0, '', 0);

$obj_pdf->SetFont('helvetica', '', 10);
$obj_pdf->MultiCell(0, 0, ''.$row['observacion'], 1, 'L', 1, 1, '', '', true);

// Close and output PDF document
// This method has several options, check the source code documentation for more information.*/
$obj_pdf->Output('servicio_'.$row['id_servicio'].'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+


?>