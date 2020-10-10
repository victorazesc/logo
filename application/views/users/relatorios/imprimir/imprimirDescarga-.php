<?php
//============================================================+
// File name   : imprimirOs.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).



require_once($_SERVER['DOCUMENT_ROOT'].'/tcpdf/tcpdf.php');
ini_set('memory_limit', '640M');
set_time_limit(0);
ini_set('memory_limit', '-1');

// create new PDF document
$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Victor Azevedo');
$pdf->SetTitle('Azevedo Segurança e Tecnologia 006');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData('tcpdf_logo.jpg', '60px', '', '');



// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);


// add a page
$pdf->AddPage();

   
$html = '
<br>                          <h3 style="text-align: center"><strong>RELATÓRIO DE DESCARGA</strong></h3>
            <br>    


                  <table border="1" cellpadding="5" >
                   
 <tr>
        <th style="width:30% font-size: 1.2em; padding: 5px;  font-weight: bold;">Protocolo</th>
        <th style="width:11% font-size: 1.2em; padding: 5px;  font-weight: bold;">Status</th>
        <th style="width:10% font-size: 1.2em; padding: 5px;  font-weight: bold;">Data</th>
        <th style="width:14% font-size: 1.2em; padding: 5px;  font-weight: bold;">Container</th>
        <th style="width:35% font-size: 1.2em; padding: 5px;  font-weight: bold;">OC</th>
    </tr>
                   ';

$encoding = 'UTF-8'; // ou ISO-8859-1...

$whereData ="";
$whereUnidade ="";
$whereStatus = "";

$dataInicial = $this->input->get('dataInicial');
$dataFinal = $this->input->get('dataFinal');
$unidade = $this->input->get('cliente');
$status = $this->input->get('status');


if($dataInicial != null){
        $whereData = "AND Data_chegada = '23-04-2020'";
        }
        if($unidade != null){
            $whereUnidade = "AND uniadade = ".$this->db->escape($unidade);
        }
        if($status != null){
            $whereStatus = "AND status = ".$this->db->escape($status);
        }
                
	 $query = $this->db->query("SELECT * FROM Eventos WHERE Data_chegada = '23-04-2020'");


foreach ($query->result() as $row)
{


         $html .= '<tr>
                <td style="width:30%">' . $row->protocolo . '</td>
                <td style="width:11%">' . $row->status . '</td>
                <td style="width:10%">' . $row->Data_chegada . '</td>
                <td style="width:14%">' . $row->container. '</td>
                <td style="width:35%">' . $row->oc . '</td>
            </tr>';

}


                          
$html .='
</table>


 <h5 style="text-align: right">Data do Relatório: '.date('d/m/Y').'</h5>

';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Produtos'.date('d/m/Y').'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+