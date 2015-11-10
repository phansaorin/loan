<div class="container" id="printSchedule1">
    <div class="panel panel-primary filterable">
        <div class="panel-heading">
            <h3 class="panel-title panel-title-schedule cus-h3">Schedule</h3>
        </div>
        <div class="table-responsive">
            <?php $this->load->view('schedules/includes/reschedule'); ?>
        </div>
    </div>
</div>

<div class="col-xs-12" id="printSchedule" style="display: none;">
	<div class="row">
        <div class="col-xs-3"><img src="<?php echo site_url("assets/images/logo.png"); ?>" alt=""></div>
        <div class="col-xs-5"><h2 class="text-center">តារាងសងប្រាក់</h2></div>
    </div>
    <div class="panel panel-primary filterable">
        <div class="panel-heading">
            <h3 class="panel-title panel-title-schedule cus-h3">Schedule</h3>
        </div>
        <div class="table-responsive">
            <?php $this->load->view('schedules/includes/table_schedule'); ?>
        </div>
    </div>
</div>