<?php $this->load->view("partial/header_top"); ?>
<body>
      <!--  wrapper -->
       <div id="wrapper">
        <!-- start navbar top -->
        <?php $this->load->view('partial/header')?>
         <!-- end navbar top -->

        <!-- right navbar side -->
        <?php $this->load->view('partial/nav_right'); ?>
        <!-- right navbar side -->
        <!--  page-wrapper -->
         <!--  wrapper -->
    <div id="wrapper">
        <!--  page-wrapper -->
        <div id="page-wrapper">

            
            <div class="row">
                <div class="panel panel-default">
                  <div class="panel-heading">
                      <!--  page header -->
                      <div class="col-lg-12">
                      <h1 class="page-header">Loan Voucher</h1>
                      </div>
                      <!-- end  page header -->
                   </div>
               </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default" id="voucherPrint">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-3"><img src="http://localhost/loan/assets/images/logo.png" alt=""></div>
                                <div class="col-xs-5"><h2 class="text-center">តារាងសងប្រាក់</h2></div>
                                <div class="col-xs-4" id="invoice-no">
                                  	<span class="so-light-green">វិក័យប័ត្រលេខ:</span> <span class="fw-500"><?php echo $invoice_code; ?></span>
                                </div> <!-- the end of the col-lg-5 two-->
                            </div> <!-- the end of row header-->
                            <br/>
                            <div class="row">
                            	<div class="col-xs-4">
                            		<table class="tbl-voucher tbl-90">
                            			<tr>
                            				<td align="right" class="td-left">ឈ្មោះអតិថិជន: </td>
                            				<td class="td-value"><?php echo strtoupper($customer_info->clne).' '.ucfirst($customer_info->cfne); ?></td>
                            			</tr>
                            			<tr>
                            				<td align="right" class="td-left">កិច្ចសន្យាលេខ: </td>
                            				<td class="td-value"></td>
                            			</tr>
                            			<tr>
                            				<td align="right" class="td-left">គណនីលេខ: </td>
                            				<td class="td-value"></td>
                            			</tr>
                            			<tr>
                            				<td align="right" class="td-left">ថ្ងែខែឆ្នាំខ្ចីប្រាក់: </td>
                            				<td class="td-value"><?php echo $loan_first_date; ?></td>
                            			</tr>
                            			<tr>
                            				<td align="right" class="td-left">ចំនួនទឹកប្រាក់ខ្ចី: </td>
                            				<td class="td-value"><?php echo number_format((float)$loan_info->loan_amount, 0, '.', ','); ?></td>
                            			</tr>
                            		</table>	
                            	</div>
                                <div class="col-xs-4">
                                	<table class="tbl-voucher">
                            			<tr>
                            				<td align="right" class="td-left">អាសយដ្ឋាន: </td>
                            				<td class="td-value">Por Sen snay</td>
                            			</tr>
                            			<tr>
                            				<td align="right" class="td-left">CID:  </td>
                            				<td class="td-value"><?php echo $loan_info->loan_account; ?></td>
                            			</tr>
                            			<tr>
                            				<td align="right" class="td-left">ទូរស័ព្ទលេខ: </td>
                            				<td class="td-value"><?php echo $customer_info->cphone_number; ?></td>
                            			</tr>
                            			<tr>
                            				<td align="right" class="td-left">ថ្ងែខែឆ្នាំផុតកំណត់: </td>
                            				<td class="td-value"><?php echo $loan_deadline_date; ?></td>
                            			</tr>
                            			<tr>
                            				<td align="right" class="td-left">ភ្នាក់ងារបុគ្គលិក: </td>
                            				<td class="td-value">ហែម ឈីងឈីង</td>
                            			</tr>
                            		</table>	
                                </div>
                                <div class="col-xs-4" id="rightTop">
                                  	<table class="tbl-voucher tbl-voucher-right tbl-100">
                            			<tr>
                            				<td align="right" class="td-left">រយះពេលខ្ចី: </td>
                            				<td class="td-value"><?php echo $loan_info->duration_loan .' '. $loan_info->duration_loan_type; ?></td>
                            			</tr>
                            			<tr>
                            				<td align="right" class="td-left">ប្រភេទរូបិយប័ណ្ណ: </td>
                            				<td class="td-value"><?php echo $loan_info->currency; ?></td>
                            			</tr>
                            			<tr>
                            				<td align="right" class="td-left">ខ្ចីលើកទី: </td>
                            				<td class="td-value"><?php echo $loan_info->renew_installment; ?></td>
                            			</tr>
                            		</table>	
                                </div> <!-- the end of the col-lg-5 two-->
                            </div>
                        </div>
                        <div>
                        	<table class="table table-bordered table-hover tbl-voucher-schedule">
                        		<thead>
                                    <tr>
                                        <th>លរ</th>
                                        <th>ថ្ងែខែឆ្នាំបង់ប្រាក់</th>
                                        <th>ប្រាក់ដើមត្រូវបង់</th>
                                        <th>ការប្រាក់ត្រូវបង់</th>
                                        <th>សរុបប្រាក់ត្រូវបង់</th>
                                        <th>ប្រាក់ដើមនៅជំញាាក់</th>
                                        <th>ហត្ថលេខា</th>
                                    </tr>      
                                </thead>
                                <tbody>
                                    <?php 
                                    $rate = $loan_info->interest_rate;
                                    $total_pay_capital = 0;
                                    $total_pay_interest = 0;
                                    $total_pay_amount = 0;
                                    $total_rate = 0;
                                    if (count($data_payments) > 0) {
                                        $i = 1;
                                        foreach ($data_payments as $rows) { 
                                            $day = date('D', strtotime($rows['pay_date']));
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $days_in_khmer[$day].' '.date('d-M-Y', strtotime($rows['pay_date'])); ?></td>
                                                <td><?php echo number_format($rows['pay_capital'], 0, '.', ','); ?></td>
                                                <td><?php echo number_format(round($rows['beginning_balance'], 2), 0, '.', ','); ?></td>
                                                <td><?php echo number_format(round($rows['pay_interest'], 2), 0, '.', ','); ?></td>
                                                <td><?php echo number_format(round($rows['pay_amount'], 2), 0, '.', ','); ?></td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        <?php 
                                        $i++;
                                        $total_pay_capital += $rows['pay_capital'];
                                        $total_pay_interest += $rows['pay_interest'];
                                        $total_pay_amount += $rows['pay_amount'];
                                        }
                                    }
                                    ?>
                                </tbody>
                        	</table>
                        </div>
                        <div class="row note-div"​>
                        	<span class="note_voucher so-light-green">កំណត់សំគាល់ :</span> 
                        	<ul class="list-note">
                        		<li class="so-light-green">អតិថិជនត្រូវបង់ប្រាក់អោយបានទៀងទាត់តាមតារាងកាលវិភាគសងប្រាក់</li>
                        		<li class="so-light-green">ការមិនគោរពតាមកិច្ចសន្យារបស់អង្គការបន្ទាយស្រីឥណទាន(ប៊ី អ៊ែស អីុ) នឹងចាត់វិធានការណ៍តាមផ្លូវច្បាប់</li>
                        	</ul>
                        </div>
                        <div class="col-xs-12 div-signature">
                          <div class="col-xs-4">
                            <p class="text-center signation-top so-light-green">ហត្ថលេខាភាគីអោយខ្ចី</p>
                            <br/><br/><br/>
                            <p class="text-center">____________________________</p>
                            <p class="text-center so-light-green">ហែម ឈីងឈីង</p>
                          </div>
                          <div class="col-xs-4">
                            
                          </div>
                          <div class="col-xs-4">
                            <p class="text-center signation-top so-light-green">ស្នាមមេដៃស្ដាំកូនបំណុល</p>
                            <br/><br/><br/>
                            <p class="text-center">____________________________</p>
                            <p class="text-center so-light-green"><?php echo strtoupper($customer_info->clne).' '.ucfirst($customer_info->cfne); ?></p>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!--End Advanced Tables -->
               
                </div>
                <!-- end page-wrapper -->

            </div>
            <!-- end wrapper -->
            
            <div class="row">
              <div class="col-xs-12 form-group">
                <button class="btn btn-success pull-right" onclick="printDiv('voucherPrint')"><i class="ace-icon fa fa-print bigger-120"></i> Print</button>
                <button class="btn btn-default pull-right btnExit mr5" ><i class="ace-icon fa fa-undo bigger-120"></i> Back</button>
              </div>
              
            </div>
            <div class="row"></div>
          
       </div>
        <!-- end wrapper -->
   </div>
</body>

<script type="text/javascript">
  function printDiv(divId) {
    var printContents = document.getElementById(divId).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = "<html><head><title></title></head><body>" + printContents + "</body>";
    window.print();
    document.body.innerHTML = originalContents;
  }

  $(document).ready(function() {
    $('body').on('click', 'button.btnExit', function(event) {
      event.preventDefault()
      window.location.href = BASE_URL+"loans"
    })
  })
</script>

</html>