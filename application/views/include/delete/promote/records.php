<div class="row">
	 <!--  page header -->
	<div class="col-lg-12">
		<h1 class="page-header">List Salary Promotion Request</h1>
	</div>
	 <!-- end  page header -->
</div>
<div class="row">
	<div class="col-lg-12">
		<!-- Advanced Tables -->
		<div class="panel panel-default">
			<div class="panel-heading">
			  <?php echo anchor('promote/adds','Add New','class="btn btn-primary"');?>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>ID</th>
								<th>Staff Name</th>
								<th>Promoting Date</th>
								<th>Amount of Promotion</th>
								<th>Description</th>
								<th>Promoter</th>
                                                                <th>Approve By</th>
								<th>Manage Promotion</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($salary_promote_list->result() as $row_promote){
									echo "<tr >
										<td>".$row_promote->pro_id."</td>
										<td>".$row_promote->family_name." ".$row_promote->given_name."</td>
										<td>".$row_promote->duration."</td>
										<td style='color:red;text-align:center'>".$row_promote->amount.".USD</td>
										<td>".$row_promote->discription."</td>
										<td>".$row_promote->username."</td>
                                                                                <td style='text-align:center'>
                                                                                ";
                                                                        if($this->session->userdata('use_type') == 'admin'){
                                                                        if($row_promote->approve > 0){
                                                                           
                                                                            
                                                                              echo anchor('promote/approved/'.$row_promote->pro_id.'/'.$row_promote->approve,'Approved');  
                                                                            
                                                                         
                                                                         }else{
                                                                           echo anchor('promote/approved/'.$row_promote->pro_id.'/'.$row_promote->approve,'Un Aproval');
                                                                         
                                                                        }
                                                                        }else{
                                                                             if($row_promote->approve > 0){
                                                                               echo '<a href="#">Admin</a>';  
                                                                             }else{
                                                                                 echo '<a href="#">Not Approve</a>';
                                                                             }
                                                                            
                                                                            }
									echo "
</td>
										<td style='text-align:center'>";
                                                                        if($row_promote->approve == 0){
									echo anchor('promote/delete/'.$row_promote->pro_id,'<i class="fa fa-trash-o fa-fw"></i>');
                                                                       
                                                                         if($this->session->userdata('use_type') == 'manager'){
									 echo ' | ';
                                                                             echo anchor('promote/updates/'.$row_promote->pro_id,'<i class="fa fa-pencil fa-lg"></i>');
                                                                         }
                                                                        
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
