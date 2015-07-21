
<div class="row">
	 <!--  page header -->
	<div class="col-lg-12">
		<h1 class="page-header">List Take Leave Request</h1>
	</div>
	 <!-- end  page header -->
</div>
<div class="row">
	<div class="col-lg-12">
		<!-- Advanced Tables -->
		<div class="panel panel-default">
			<div class="panel-heading">
			  <div class="sumite"></div>
			  <?php echo anchor('take_leave/adds','Add New','class="btn btn-primary"');?>
			  <?php //echo form_submit(array('id'=>'username','name'=>'username','class'=>'form-control','placeholder'=>'E-mail',)); ?>
			</div>
			
                         
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
                                                    <tr>
								<th>ID</th>
								<th>Staff Name</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Reason</th>
								<th>Approval By</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($take_leave_list->result() as $row_take_leave){
									$arr_str = array('id' =>$row_take_leave->tak_id,
													'fname' => $row_take_leave->family_name,
													'gname' => $row_take_leave->given_name,
													'sdate' => $row_take_leave->startdate,
													'edate' => $row_take_leave->enddate,
													'reason' => $row_take_leave->reason);
									echo "<tr>
										<td>".$row_take_leave->tak_id."</td>
										<td>".$row_take_leave->family_name." ".$row_take_leave->given_name."</td>
										<td>".$row_take_leave->startdate."</td>
										<td>".$row_take_leave->enddate."</td>
										<td>".$row_take_leave->reason."</td>
										<td style='text-align:center'>";
									if($this->session->userdata('use_type') == 'hr'){
									if($row_take_leave->approved != 0){
										echo "<input type='button' class='btn' value='Approve' disabled />";
                                                                                
									}else{
										echo anchor('take_leave/approval/'.$row_take_leave->tak_id, "Approval ");
                                                                                echo '  |  ';
									}
                                                                         
                                                                         }
                                                                         if($row_take_leave->approved == 0){
                                                                       echo anchor('take_leave/delete/'.$row_take_leave->tak_id,'<i class="fa fa-trash-o fa-lg"></i>','onclick="return confirmDelete()"');
									  echo '  |  ';
									echo anchor('take_leave/updates/'.$row_take_leave->tak_id,'<i class="fa fa-pencil fa-fw"></i>');
                                                                        
                                                                         }
									echo "
									</td>
									</tr>";
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div> 
