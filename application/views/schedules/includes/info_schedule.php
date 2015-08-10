<div class="row">
    <form role="form">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="inputCustomerName">Customer Name</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="inputCustomerName" id="inputCustomerName" placeholder="Customer Name" value="<?php echo $loan_info->last_name_english." ".$loan_info->first_name_english; ?>" readonly required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAccountNumber">Account Number Loan</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="inputAccountNumber" name="inputAccountNumber" placeholder="Account Number Loan" value="<?php echo $loan_info->loan_account; ?>" readonly required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAmountLoan">Amount Money Loan</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="inputAmountLoan" name="inputAmountLoan" placeholder="Amount Money Loan" value="<?php echo $loan_info->loan_amount; ?>" readonly required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputRateDaily">Rate Daily</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="inputRateDaily" name="inputRateDaily" placeholder="Rate Daily" value="<?php echo $loan_info->interest_rate; ?>" readonly required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputDurationLoan">Duration Loan</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="inputDurationLoan" name="inputDurationLoan" placeholder="Duration Loan" value="<?php echo $loan_info->duration_loan." ".$loan_info->duration_loan_type; ?>" readonly required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputDateFirstPay">Date First Pay</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="inputDateFirstPay" name="inputDateFirstPay" placeholder="Date First Pay" value="<?php echo $loan_info->first_repayment; ?>" readonly required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <div class="input-group">
                    <textarea name="address" id="address" class="form-control" rows="5" placeholder="Address" readonly required></textarea>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>

        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label for="inputAccountNumberServe">Account Number Serve</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="inputAccountNumberServe" id="inputAccountNumberServe" placeholder="Account Number Serve" readonly required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
            <div class="form-group">
                <label for="inputRatePaidTotal">Rate Paid Total</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="inputRatePaidTotal" name="inputRatePaidTotal" placeholder="Rate Paid Total" readonly required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputRatePaidTotalPriciple">Rate Paid Total + Priciple</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="inputRatePaidTotalPriciple" name="inputRatePaidTotalPriciple" placeholder="Rate Paid Total + Priciple" readonly required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAmountSavedTotal">Amount Saved Total</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="inputAmountSavedTotal" name="inputAmountSavedTotal" placeholder="Amount Saved Total" readonly required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                <div class="col-md-6">Signature of Creator</div>
                <div class="col-md-6">Finger Print of Customer</div>
                </div>
            </div>
            <!-- <div class="form-group">
                <label for="InputMessage">Enter Message</label>
                <div class="input-group">
                    <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" readonly required></textarea>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div> -->
            <!-- <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right"> -->
        </div>
    </form>
    <!-- <div class="clearfix"></div>
    <div class="col-lg-5 col-md-push-1">
        <div class="col-md-12">
            <div class="alert alert-success">
                <strong><span class="glyphicon glyphicon-ok"></span> Success! Message sent.</strong>
            </div>
            <div class="alert alert-danger">
                <span class="glyphicon glyphicon-remove"></span><strong> Error! Please check all page inputs.</strong>
            </div>
        </div>
    </div> -->
</div>

