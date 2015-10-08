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
                                <div class="col-xs-5"><img src="http://localhost/loan/assets/images/logo.png" alt=""></div>
                                <div class="col-xs-4"><h4>តារាងសង់ប្រាក់</h4></div>
                                <div class="col-xs-3 pull-right" id="rightTop">
                                  	វិក័យប័ត្រលេខ : <?php echo $invoice_code; ?>
                                </div> <!-- the end of the col-lg-5 two-->
                            </div> <!-- the end of row header-->
                            <br/><br/>
                            <div class="row">
                            	<div class="col-xs-5">
                            		<table>
                            			<tr>
                            				<td>ឈ្មោះអតិជន : </td>
                            				<td><?php echo strtoupper($customer_info->clne).' '.ucfirst($customer_info->cfne); ?></td>
                            			</tr>
                            			<tr>
                            				<td>កិច្ចសន្យាលេខ : </td>
                            				<td></td>
                            			</tr>
                            			<tr>
                            				<td>គណនីលេខ: </td>
                            				<td></td>
                            			</tr>
                            			<tr>
                            				<td>ថ្ងែខែឆ្នាំខ្ចីប្រាក់: </td>
                            				<td><?php echo $loan_first_date; ?></td>
                            			</tr>
                            			<tr>
                            				<td>ចំនួនទឹកប្រាក់ខ្ចី: </td>
                            				<td><?php echo number_format((float)$loan_info->loan_amount, 0, '.', ','); ?></td>
                            			</tr>
                            		</table>	
                            	</div>
                                <div class="col-xs-4">
                                	<table>
                            			<tr>
                            				<td>អាស័យដ្ឋាន : </td>
                            				<td>Por Sen snay</td>
                            			</tr>
                            			<tr>
                            				<td>CID : </td>
                            				<td><?php echo $loan_info->loan_account; ?></td>
                            			</tr>
                            			<tr>
                            				<td>ទូរស័ព្ទលេខ: </td>
                            				<td><?php echo $customer_info->cphone_number; ?></td>
                            			</tr>
                            			<tr>
                            				<td>ថ្ងែខែឆ្នាំផុតកំណត់: </td>
                            				<td><?php echo $loan_deadline_date; ?></td>
                            			</tr>
                            			<tr>
                            				<td>ភ្នាក់ងារបុគ្គលិក: </td>
                            				<td>ហែម ឈីងឈីង</td>
                            			</tr>
                            		</table>	

                                </div>
                                <div class="col-xs-3 pull-right" id="rightTop">
                                  	<table>
                            			<tr>
                            				<td>រយះពេលខ្លី : </td>
                            				<td><?php echo $loan_info->duration_loan .' '. $loan_info->duration_loan_type; ?></td>
                            			</tr>
                            			<tr>
                            				<td>ប្រភេទរូបិយបណ្ណ័ : </td>
                            				<td><?php echo $loan_info->currency; ?></td>
                            			</tr>
                            			<tr>
                            				<td>ខ្ចីលើកទី: </td>
                            				<td><?php echo $loan_info->renew_installment; ?></td>
                            			</tr>
                            			
                            		</table>	
                                </div> <!-- the end of the col-lg-5 two-->
                            </div>
                        </div>
                        <br/>
                        <div>
                        	<table class="table table-striped table-bordered table-hover">
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
                        <div class="row"​ style="margin-left:5px;">
                        	កំណត់សំគាល់ : 
                        	<ul>
                        		<li>អតិថិជនត្រូវបង់ប្រាក់អោយបានទៀងទាត់តាមតារាងកាលវិភាគសងប្រាក់</li>
                        		<li>ការមិនគោរពតាមកិច្ចសន្យារបស់អង្គការ នឹងចាត់វិធានការណ៍តាមផ្លូវច្បាប់</li>
                        	</ul>

                        </div>
                        <div class="row">
                          <div class="col-xs-4">
                            <p class="text-center">ហត្ថលេខាភាគីអោយខ្ចី</p>
                            <br/><br/><br/>
                            <p class="text-center">...................................................</p>
                            <br/>
                            <p class="text-center">ហែម ឈីងឈីង</p>
                          </div>
                          <div class="col-xs-4">
                            
                          </div>
                          <div class="col-xs-4">
                            <p class="text-center">ស្នាមមេដៃស្ដាំកូនបំណុល</p>
                            <br/><br/><br/>
                            <p class="text-center">...................................................</p>
                            <br/>
                            <p class="text-center"><?php echo strtoupper($customer_info->clne).' '.ucfirst($customer_info->cfne); ?></p>
                          </div>
                        </div>
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