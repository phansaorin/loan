
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
                                            <td>'.$row->phone.'</td>
                                            <td class="center">'.$row->address.'</td>
                                            <td class="center">';
                                             echo anchor(base_url() . 'admin/deleteStaff/' . $row->sta_id . '.html', '<i class="fa fa-trash-o fa-lg"></i>','title="Delete" onclick="return confirm(Are you sure want to delete?)"');
													
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
        