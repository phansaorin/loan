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
                <h1 class="page-header">View Loan</h1>
            </div>
             <!-- end  page header -->
        </div>      
        <div class="row">
            <div class="col-lg-12 loan-contain">
              <div class="row">
              	<div class="col-md-12">
					<div class="widget-box">
						<div class="widget-title">
							<span class="icon">
								<i class="fa fa-align-justify"></i>									
							</span>
							<h5><?php echo form_label('Date Range', 'report_date_range_label', array('class'=>'required')); ?>
							</h5>
						</div>
						<div class="widget-content nopadding">
							<?php
							if(isset($error))
							{
								echo "<div class='error_message'>".$error."</div>";
							}
							?>
							<form  class="form-horizontal form-horizontal-mobiles">

								<div class="form-group">
									<?php echo form_label('Date Range', 'reports_date_range',array('class'=>'col-sm-3 col-md-3 col-lg-2 control-label  ')); ?>
									<div class="col-sm-9 col-md-9 col-lg-10">
										<input type="radio" name="report_type" id="simple_radio" value='simple' checked='checked'/> &nbsp;
										<?php echo form_dropdown('report_date_range_simple',$report_date_range_simple, '', 'id="report_date_range_simple"'); ?>
									</div>
								</div>
								<div class="form-group">
									<?php echo form_label('&nbsp;', 'reports_date_range',array('class'=>'col-sm-3 col-md-3 col-lg-2 control-label  ')); ?>
									
									<div class="col-sm-9 col-md-9 col-lg-10">
										<input type="radio" name="report_type" id="complex_radio" value='complex' />
										&nbsp;
										<?php echo form_dropdown('start_month',$months, $selected_month, 'id="start_month"'); ?>
										<div class="mobile_break">&nbsp;</div>
										<?php echo form_dropdown('start_day',$days, $selected_day, 'id="start_day"'); ?>
										<div class="mobile_break">&nbsp;</div>
										<?php echo form_dropdown('start_year',$years, $selected_year, 'id="start_year"'); ?>
										<div class="mobile_break">&nbsp;</div>
										<span class="forms_to">-</span>
										<div class="mobile_break">&nbsp;</div>
										<?php echo form_dropdown('end_month',$months, $selected_month, 'id="end_month"'); ?>
										<div class="mobile_break">&nbsp;</div>
										<?php echo form_dropdown('end_day',$days, $selected_day, 'id="end_day"'); ?>
										<div class="mobile_break">&nbsp;</div>
										<?php echo form_dropdown('end_year',$years, $selected_year, 'id="end_year"'); ?>
									</div>
								</div>
								<div class="form-actions">
									<?php
									echo form_button(array(
										'name'=>'generate_report',
										'id'=>'generate_report',
										'content'=>'Submit',
										'class'=>'btn btn-primary submit_button')
									);
									?>
								</div>

							</form>
						</div>
					</div>
				</div>
              </div>
            </div>
            <div class="row">
                <div class="form-group pull-right">
                    <div class="col-md-12 col-xs-10">
                        <!-- <input type="hidden" name="loan_id" value="<?php echo $loan_id; ?>" /> -->
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

<script type="text/javascript" language="javascript">
$(document).ready(function()
{
	$("#generate_report").click(function()
	{		
		
		if ($("#simple_radio").prop('checked'))
		{
			window.location = window.location+'/'+$("#report_date_range_simple option:selected").val();
		}
		else
		{
			var start_date = $("#start_year").val()+'-'+$("#start_month").val()+'-'+$('#start_day').val();
			var end_date = $("#end_year").val()+'-'+$("#end_month").val()+'-'+$('#end_day').val();
	
			window.location = window.location+'/'+start_date + '/'+ end_date;
		}
	});
	
	$("#start_month, #start_day, #start_year, #end_month, #end_day, #end_year").click(function()
	{
		$("#complex_radio").prop('checked', 'checked');
	});
	
	$("#report_date_range_simple").click(function()
	{
		$("#simple_radio").prop('checked', 'checked');
	});
	
});
</script>

</html>