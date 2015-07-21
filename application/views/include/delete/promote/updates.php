
<div class="row">
	 <!--  page header -->
	<div class="col-lg-12">
		<h1 class="page-header">Update Salary Promotion</h1>
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
					<?php foreach($update_salary_promote->result() as $row_update_promote){ ?>
					<?php echo form_open('promote/updates/'.$row_update_promote->pro_id); ?>
							<div class="form-group">
								<label>Select Staff Name</label>
								<select class="form-control" name="sname">
									<option value="0">-- select --</option>
									<?php
										$select = "";
										foreach($user_staff->result() as $row_staff){
											if ($row_staff->sta_id == $row_update_promote->sta_id) 
												$select = "selected";
											else
												$select = "";
											echo "<option ".$select." value='".$row_staff->sta_id."'>".$row_staff->family_name." ".$row_staff->given_name."</option>";
										}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>Date Start Promotion(Duration)</label>
								<input class="form-control" name="sdate" id="my-date-picker" type="text" value="<?php echo $row_update_promote->duration?>">
								<input class="form-control" name="edate" id="start-date-picker" type="hidden">
							</div>
							<div class="form-group">
								<label>Amount of Promotion</label>
								<input class="form-control" name="amount" id="amount" type="text" value="<?php echo $row_update_promote->amount?>">
							</div>
							<div class="form-group">
								<label>Description</label>
								<textarea class="form-control" rows="3" name="description">
									 <?php echo $row_update_promote->discription?>
								</textarea>
							</div>
							 <input type="submit" name="btn_submit" value="Save" class="btn btn-success" />
                                                             <?php echo form_close(); ?>
					<?php } ?>
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