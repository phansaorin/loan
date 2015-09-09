<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title cus-h3">Customer Information</h3>
                <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="contacts">
                    <label>Account Number:</label>
                        <div class="form-group multiple-form-group input-group">
                            <div class="input-group-btn input-group-select">
                            </div>
                            <input type="text" name="searches" class="form-control" value="<?php echo $loan_info->loan_account; ?>">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-success btn-add">Search</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php if (count($data_payments) > 0) { ?>
    <div class="col-md-12 col-lg-12">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title cus-h3 cus-h3">Principle Owner Information</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
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
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
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
                    <li class="active"><a href="#tabLoanSpace" data-toggle="tab">Loan Space</a></li>
                    <li><a href="#tabRepayment" data-toggle="tab">Repayment</a></li>
                </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tabLoanSpace">
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
                        <div class="table-responsive">
                            <?php $this->load->view('schedules/includes/table_schedule'); ?>
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
            <button class="btn btn-danger btnDisapprove" <?php echo $disabled = strtolower($loan_info->account_status) == 'pending' ? 'disabled' : ""; ?>>Disapprove</button>
            <button class="btn btn-primary btnApprove">Approve</button>
            <button class="btn btn-default btnExit">Exit</button>
        </div>
    </div>
</div>
<div class="row footer">&nbsp;</div>