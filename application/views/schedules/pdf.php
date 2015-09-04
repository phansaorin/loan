<?php

tcpdf();
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "PDF Report";
$obj_pdf->SetTitle($title);
$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();
ob_start();
    // we can have any view part here like HTML, PHP etc
    $content = ob_get_contents();
    // Set some content to print
$content = <<<EOD
<div class="header">
	<div class="pull-left logo col-3 border " style="width: 20px;">
      <div>
        <table cellspacing="0" cellpadding="1" border="1">
            <tr>
                <td rowspan="3">Logo</td>
                <td></td>
                <td>Form Number:</td>
            </tr>
            <tr>
              <td rowspan="2"></td>
              <td>LDV No:</td>
            </tr>
            <tr>
               <td>Loan Account:</td>
            </tr>

        </table>
  </div>
  <center><h3 style="text-align:center;">LOAN DISBURSEMENT VOUCHE</h3></center>
</div>
	<div class="clearfix">
     <div border="1">
        <table>
          <tr>
              <td>
                  <table cellspacing="0" cellpadding="1">
                    <tr>
                        <td>Disbur.Location :</td>
                        <td border="1" width="110" height="20">Phom Penh</td>
                    </tr>
                    <tr>
                        <td>Contract NO :</td>
                        <td border="1">...</td>
                    </tr>
                    <tr>
                        <td>Disbursement Date :</td>
                        <td border="1">29-08-2015</td>
                    </tr>
                    <tr>
                        <td>Payer :</td>
                        <td border="1">admin</td>
                    </tr>
                    <tr>
                        <td>Signature :</td>
                        <td border="1" height="80">admin</td>
                    </tr>
                    <tr>
                        <td>LG Code :</td>
                        <td border="1">1234567</td>
                    </tr>
                    <tr>
                        <td>Amount receiverd :</td>
                        <td border="1">400.000.000 USA ($)</td>
                    </tr>
                    <tr>
                        <td>In Word :</td>
                        <td border="1">....</td>
                    </tr>
                    
                  </table>
              </td>
              <td>
                  <table>
                      <tr>
                            <td>Payee :</td>
                            <td border="1" width="110" height="10">....</td>
                        </tr>
                        <tr>
                            <td>Gender :</td>
                            <td border="1">Female</td>
                        </tr>
                        <tr>
                            <td>Address :</td>
                            <td border="1" width="110" height="100">Savy chum, reabrea</td>
                        </tr>
                        <tr>
                            <td>Fingerprint :</td>
                            <td border="1" height="80">.....</td>
                        </tr>
                  </table>
              </td>
          </tr>
         
        </table>
     </div>
     <div></div>
       <div class="pull-left logo col-3 border " style="width: 20px;">
          <table cellspacing="0" cellpadding="1" border="1">
              <tr>
                  <td>admn</td>
                  <td>transure</td>
                  <td>Branch manager</td>
                  
              </tr>
              

          </table>
        <div>
</div>
</div>
EOD;



// Style sheet
$content .= <<<EOD
	<style>
	table.table {
		border: 1px solide #DDD;
		padding: 5px;
	}
	table.table th {
		border: 1px solid #CCC;
		text-align: center;
		font-weight: bold;
	}
	table.table td {
	  border: 1px solid #CCC;
	}
	.pull-right {
		float: right;
	}
	.pull-left {
		float: left;
	}
	.clearfix {
		clear: both;
	}
	.col-3 {
		width: 30px;
		background-color: #eef;
	}
	.header, .border {s
		border: 1px solid #CCC;
	}
	</style>
EOD;
// $content .= '<style>'.file_get_contents(base_url().'css/pdf.css').'</style>';

ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
// $obj_pdf->writeHTML($buttom, true, false, false, false, '');
// $obj_pdf->writeHTML($tbl3, true, false, false, false, '');
// $obj_pdf->writeHTML($tbl, true, false, false, false, '');
// $obj_pdf->writeHTML($tbl4, true, false, false, false, '');
$obj_pdf->Output('output.pdf', 'I');