
<div class="row">
	 <!--  page header -->
	<div class="col-lg-12">
		<h1 class="page-header">Add Take Leave Request</h1>
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
					<?php echo form_open('take_leave/add_take_leave'); ?>
							<div class="form-group">
								<label>Select Staff Name</label>
								<select class="box" name="sname">
									<?php
										foreach($user_staff->result() as $row_staff){
											echo "<option value='".$row_staff->sta_id."'>".$row_staff->family_name." ".$row_staff->given_name."</option>";
										}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>Start Date</label>
								<input class="box" name="sdate" id="start-date-picker" type="text">
							</div>
							<div class="form-group">
								<label>End Date</label>
								<input class="box" name="edate" id="my-date-picker" type="text">
							</div>
							<div class="form-group">
								<label>Reason</label>
								<textarea class="box" rows="3" name="reason"></textarea>
							</div>
							 <input type="submit" name="btn_submit" value="Save" class="btn btn-success" />
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>  
	</div>
</div>
</div>
<!--date picker-->
         <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
         <script>
        $(function() {
        $( "#datepicker" ).datepicker();
        });
        </script>
            <script type="text/javascript">
/* Initialise date picker */
$(document).ready(function()
{
	$("#my-date-picker").datepicker();
        $("#start-date-picker").datepicker();
}
);
</script>