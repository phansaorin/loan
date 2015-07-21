<script>
	$(function(){
	// disabling dates
	var nowTemp = new Date();
	var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

	var checkin = $('#sdate').datepicker({
	  format: 'yyyy-mm-dd',
	  onRender: function(date) {
		return date.valueOf() < now.valueOf() ? 'disabled' : '';
	  }
	}).on('changeDate', function(ev) {
	  if (ev.date.valueOf() > checkout.date.valueOf()) {
		var newDate = new Date(ev.date)
		newDate.setDate(newDate.getDate() + 1);
		checkout.setValue(newDate);
	  }
	  checkin.hide();
	  $('#edate')[0].focus();
	}).data('datepicker');
	var checkout = $('#edate').datepicker({
	  format: 'yyyy-mm-dd',
	  onRender: function(date) {
		return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
	  }
	}).on('changeDate', function(ev) {
	  checkout.hide();
	}).data('datepicker');
	});
</script>
<div class="row">
	 <!--  page header -->
	<div class="col-lg-12">
		<h1 class="page-header">Update Take Leave Request</h1>
	</div>
	 <!-- end  page header -->
</div>
<div class="row">
	<div class="col-lg-12">
		<!-- Advanced Tables -->
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-6">
					<?php foreach($update_take_leave->result() as $row_update_take_leave){ ?>
					<?php echo form_open('take_leave/do_update/'.$row_update_take_leave->tak_id); ?>
							<div class="form-group">
								<label>Select Staff Name</label>
								
								<select class="form-control" name="sname">
									<option value="">-- Select --</option>
									<?php
										$select = "";
										foreach($user_staff->result() as $row_staff){
											if ($row_staff->sta_id == $row_update_take_leave->sta_id) 
												$select = "selected";
											else
												$select = "";
											echo "<option ".$select." value='".$row_staff->sta_id."'>".$row_staff->family_name." ".$row_staff->given_name."</option>";
										}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>Start Date</label>
								<input class="span2 form-control" name="sdate" id="sdate" type="text" value="<?php echo $row_update_take_leave->startdate?>">
							</div>
							<div class="form-group">
								<label>End Date</label>
								<input class="span2 form-control" name="edate" id="edate" type="text" value="<?php echo $row_update_take_leave->enddate?>">
							</div>
							<div class="form-group">
								<label>Reason</label>
								<textarea class="form-control" rows="3" name="reason">
									<?php echo $row_update_take_leave->reason;?>
								</textarea>
							</div>
							<button type="submit" class="btn btn-primary">Update Take Leave</button>
					<?php echo form_close(); ?>
					<?php } ?>
				</div>
			</div>
		</div>  
	</div>
</div>
</div> 
