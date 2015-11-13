<div class="container">
    <div class="row">
        <div class="col-xs-3 pull-right">
            <div class="form-group pull-right">
                <?php
                echo form_hidden("loan_id", $loan_info->loan_id);
                echo form_button("btn_pay_off", 'Pay Off', 'class="btn btn-success" data-loan-id="'. $loan_info->loan_id .'" data-url="'. site_url("loans/pay_off") .'"').nbs(2);
                echo form_button("btn_reschedule", 'Reschedule', 'class="btn btn-warning pull-right" data-loan-id="'. $loan_info->loan_id .'"');
                ?>
            </div>
        </div>
        <div class="clearboth"></div>
    </div>
    <div class="panel panel-primary filterable">
        <div class="panel-heading">
            <h3 class="panel-title panel-title-schedule cus-h3">Schedule</h3>
        </div>
        <div class="table-responsive">
            <?php $this->load->view('schedules/includes/reschedule'); ?>
        </div>
    </div>
</div>