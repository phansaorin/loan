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
                 <!--  page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Loan Voucher</h1>
                </div>
                 <!-- end  page header -->
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default" id="voucherPrint">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-5"><img src="http://localhost/loan/assets/images/logo.png" alt=""></div>
                                <div class="col-xs-2"></div>
                                <div class="col-xs-5 pull-right" id="rightTop">
                                  <table>
                                      <tr>
                                        <td><label for="form_no">ទំរងលេខ:     </label></td>
                                        <td><input readonly type="text" class="form-control" id="form_no"></td>
                                      </tr>
                                      <tr>
                                        <td><label for="ldv_no">LDV NO:       </label></td>
                                        <td><input readonly type="text" class="form-control" id="ldv_no"></td>
                                      </tr>
                                      <tr>
                                        <td><label for="loan_account">Loan Account: </label></td>
                                        <td>
                                          <span><?php echo $loan_info->loan_account; ?></span>
                                          <!-- <input readonly type="text" class="form-control" id="loan_account"> -->
                                        </td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                        <td>
                                        <p class="text-center">Admin Copy</p>
                                        <p class="text-center"><?php echo date('d-M-Y'); ?>/0557</p></td>
                                      </tr>

                                  </table>  
                                    
                                </div> <!-- the end of the col-lg-5 two-->
                            </div> <!-- the end of row header-->
                            <div>
                              <center>
                                <h5>សក្ដីប៍ត្របញ្ជេញឥណទាន​ <br/>LOAN DISBURSEMENT VOUCHER
                                    </h5>
                              </center><br/>
                            </div>
                            <div class="rows border_table">
                                <div class="col-xs-6 pull-left">
                                    <table>
                                      <tr>
                                        <td><label for="disbur_location">ទីកន្លែងផ្ដល់ប្រាក់/Disbur Location:</label></td>
                                        <td><input readonly type="text" class="form-control" id="disbur_location"></td>
                                      </tr>
                                      <tr>
                                        <td><label for="contract_no">កិច្ចសន្យាលេខ/Contract No:</label></td>
                                        <td><input readonly type="text" class="form-control" id="contract_no"></td>
                                      </tr>
                                      <tr>
                                        <td><label for="disbursement_date">ថ្អែចេញទុន/Disbursement Date: </label></td>
                                        <td><input readonly type="text" class="form-control" id="disbursement_date"></td>
                                      </tr>
                                      <tr>
                                        <td><label for="payer">អ្នកផ្ដល់ប្រាក់/Payer: </label></td>
                                        <td><input readonly type="text" class="form-control" id="payer"></td>
                                      </tr>
                                      <tr>
                                        <td class="text-top"><label for="signature">ហត្ថលេខា/Singature :</label></td>
                                        <td><textarea readonly class="form-control nature_width" id="signature"></textarea></td>
                                      </tr>
                                      <tr>
                                        <td><label for="loan_acount2">Loan Account: </label></td>
                                        <td><input readonly type="text" class="form-control" id="loan_acount2" value="<?php echo $loan_info->loan_account; ?>"></td>
                                      </tr>
                                      <tr>
                                        <td><label for="gl_code">លេខកូដគណនី/GL Code : </label></td>
                                        <td><input readonly type="text" class="form-control" id="gl_code"></td>
                                      </tr>
                                      <tr>
                                        <?php 
                                        $currency = strtoupper($loan_info->currency) == 'KHR' ? 'KHR' : 'USA ($)';

                                        ?>
                                        <td><label for="amount_received">ចំនួនទឹកប្រាក់បានទទួល/Amount receiverd: </label></td>
                                        <td><input readonly type="text" class="form-control" id="amount_received" value="<?php echo $loan_info->loan_amount.' '.$currency; ?>"></td>
                                      </tr>
                                      <tr>
                                        <td class="text-top"><label for="in_word">ជាអក្សរ/In word: </label></td>
                                        <td><textarea readonly class="form-control" id="in_word"><?php echo $loan_info->loan_amount_in_word; ?></textarea></td>
                                      </tr>

                                  </table>  
                                </div>
                                <!-- <div class="col-lg-2"></div> -->
                                <div class="col-xs-6">
                                    <table>
                                        <tr>
                                        <td><label for="payee">អ្នកទទួល/payee </label></td>
                                        <td><input readonly type="text" class="form-control" id="payee" value="<?php echo strtoupper($loan_info->last_name_english).' '.$loan_info->first_name_english; ?>"></td>
                                      </tr>
                                      <tr>
                                        <td><label for="gender">ភេទ/Gender </label></td>
                                        <td><input readonly type="text" class="form-control" id="gender" value="<?php echo $loan_info->gender; ?>"></td>
                                      </tr>
                                      <tr>
                                        <td class="text-top"><label for="address">អាស័យដ្ដាន/Address</label></td>
                                        <td><textarea readonly class="form-control nature_width" id="address" ><?php echo $loan_info->khan_district.', '.$loan_info->sangkat_commune.', '.$loan_info->village.', '.$loan_info->province; ?></textarea></td>
                                      </tr>
                                      <tr>
                                        <td class="text-top"><label for="fingerprint">ស្នាមមេដែអ្នកទទួល/Fingerprint</label></td>
                                        <td><textarea readonly class="form-control nature_width" id="fingerprint"></textarea></td>
                                      </tr>
                                    </table>  

                                </div>

                            </div>​ <!-- the end of row two-->
                            
                        </div>
                        <div class="row">
                          <div class="col-xs-4">
                            <p class="text-center">រៀបចំដោយ : រដ្ធបាលប្រចាំសាខា / Admin</p>
                            <br/><br/><br/>
                            <p class="text-center">...................................................</p>
                            <br/>
                            <p class="text-center">កាលបរិច្ចេកទ/ Date <?php echo date('d-M-Y'); ?></p>
                          </div>
                          <div class="col-xs-4">
                            <p class="text-center">ត្រួតពិនិត្យដោយ : ហេរញ្ញិកប្រចាំសាខា / Treasure</p>
                            <br/><br/><br/>
                            <p class="text-center">...................................................</p>
                            <br/>
                            <p class="text-center">កាលបរិច្ចេកទ/ Date <?php echo date('d-M-Y'); ?></p>
                          </div>
                          <div class="col-xs-4">
                            <p class="text-center">អនុម័តដោយនាយុកសាខា / Branch Manager</p>
                            <br/><br/><br/>
                            <p class="text-center">...................................................</p>
                            <br/>
                            <p class="text-center">កាលបរិច្ចេកទ/ Date <?php echo date('d-M-Y'); ?></p>
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