<?php $this->load->view("partial/header_top"); ?>
<?php //echo $controller_name; ?>
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
                <h1 class="page-header">View Loan</h1>
            </div>
             <!-- end  page header -->
        </div>      
        <div class="row">
            <div class="col-lg-12 loan-contain">
              <div class="row">
                <?php if (count($data_payments) > 0) { ?>
                <div class="col-md-12 col-lg-12">
                    <div class="col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title cus-h3 cus-h3">Principle Owner Information</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>CID</td>
                                        <td><?php echo $CID = $loan_info->CID != "" ? $loan_info->CID : nbs(2); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Customer Name</td>
                                        <td><?php echo $loan_info->first_name_english.' '.$loan_info->last_name_english; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Date Of Birth</td>
                                        <td><?php echo date('Y-m-d', strtotime($loan_info->date_of_birth)); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender/Married</td>
                                        <td><?php echo $loan_info->gender.'/'.$loan_info->marrital_status; ?></td>
                                    </tr>
                                    <tr>
                                    <?php 
                                $address = $loan_info->khan_district.', '.$loan_info->sangkat_commune.', '.$loan_info->village.', '.$loan_info->province;
                                ?>
                                        <td>Address</td>
                                        <td><?php echo $address; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title cus-h3">Product Owner Information</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>Product Type</td>
                                        <td><?php echo $loan_info->product_type_title; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Currency</td>
                                        <td><?php echo $loan_info->currency; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Account Status</td>
                                        <td><?php echo $loan_info->account_status; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>  
                <div class="col-md-12">
                    <div class="panel with-nav-tabs panel-primary filterable">
                        <div class="panel-heading">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tabCustomerInfo" data-toggle="tab">Customer Info</a></li>
                                <li><a href="#tabLoanSpace" data-toggle="tab">Loan Space</a></li>
                                <li><a href="#tabRepayment" data-toggle="tab">Repayment</a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tabCustomerInfo">
                                    <table class="table">
                                        <tr>
                                            <td>Account Number:</td>
                                            <td><?php echo $loan_info->loan_account; ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="tabLoanSpace">
                                    <table class="table">
                                        <tr>
                                            <td>Loan Amount</td>
                                            <td><?php echo $loan_info->loan_amount; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Interest Rate</td>
                                            <td><?php echo $loan_info->interest_rate; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Penalty Rate</td>
                                            <td><?php echo $loan_info->penalty_rate; ?></td>
                                        </tr>
                                        <tr>
                                            <td>First Repayment</td>
                                            <td><?php echo date('Y-m-d', strtotime($loan_info->first_repayment)); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Maturity Date</td>
                                            <td><?php echo date('Y-m-d', strtotime($loan_info->maturity_date)); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Number of Installment</td>
                                            <td><?php echo $loan_info->renew_installment; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Repayment Freg</td>
                                            <td><?php echo $loan_info->repayment_freg; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Installment Amount</td>
                                            <td><?php echo $loan_info->installment_amount; ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="tabRepayment">
                                    <div class="table-responsive">                                        <?php $this->load->view('schedules/includes/table_schedule'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>  
            </div>
            <div class="row">
                <div class="form-group pull-right">
                    <div class="col-md-12 col-xs-10"> <!-- col-xs-offset-2: for to left-->
                        <input type="hidden" name="loan_id" value="<?php echo $loan_id; ?>" />
                        <button class="btn btn-default btnExit">Exit</button>
                    </div>
                </div>
            </div>
            <div class="row footer">&nbsp;</div>
            </div>
            <!-- end col-lg-12 -->

        </div>
          <!-- end wrapper -->  
      </div>
        <!-- end wrapper -->
    </div>
</body>

<script type="text/javascript">
  $(document).ready(function() {
    $('body').on('click', 'button.btnExit', function() {
      window.location.href = BASE_URL+"loan_approvals/list_loan"
    })
  })
</script>

</html>