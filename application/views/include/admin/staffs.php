
            <div class="row">
                 <!--  page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Staff Management</h1>
                </div>
                 <!-- end  page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <div class="sumite"></div>
                          <?php echo anchor('hr/addstaff','Add New','class="btn btn-primary"');?>
                          <?php //echo form_submit(array('id'=>'username','name'=>'username','class'=>'form-control','placeholder'=>'E-mail',)); ?>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Family Name</th>
                                            <th>Photo</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($get_staff->result() as $row){
                                            
                                            echo '  <tr>
                                            <td>'.$i++.'</td>
                                            <td>'.$row->family_name.'</td>
                                            <td><img src=' . base_url() . 'assets/images/'.$row->photo.' class="image_staff" /></td>
                                            <td>'.$row->phone.'</td>
                                            <td class="center">'.$row->address.'</td>
                                            <td class="center">';
                                            if($row->sta_id != 3 || $row->sta_id != 5){
                                                echo anchor(base_url() . 'hr/deleteStaff/' . $row->sta_id . '.html', '<i class="fa fa-trash-o fa-lg"></i>', 'title="Delete" onclick="return confirmDelete()"');
						echo ' | ';
                                             }
                                             echo anchor(base_url() . 'hr/editstaff/' . $row->sta_id . '.html', '<i class="fa fa-pencil fa-fw"></i>');
													
                                            echo'</td>
                                        </tr>';
                                        }
                                        ?>
                                      
                                       
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
               
        </div>
        <!-- end page-wrapper -->

    </div>
        