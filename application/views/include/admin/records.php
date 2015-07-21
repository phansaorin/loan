
            <div class="row">
                 <!--  page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">User Management</h1>
                </div>
                 <!-- end  page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <div class="sumite"></div>
                          <?php echo anchor('admin/addUser','Add New','class="btn btn-primary"');?>
                          <?php //echo form_submit(array('id'=>'username','name'=>'username','class'=>'form-control','placeholder'=>'E-mail',)); ?>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>User Name</th>
                                            <th>Role Title</th>
                                            <th>Group Name</th>
                                            <th>Manager Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($get_user->result() as $row){
                                            
                                            echo '  <tr>
                                            <td>'.$i++.'</td>
                                            <td>'.$row->username.'</td>
                                            <td>'.$row->gro_name.'</td>
                                            <td class="center">'.$row->title.'</td>
                                            <td>'.$row->family_name.' '.$row->given_name.'</td>
                                            <td id="icon" class="center">';
                                             echo anchor(base_url() . 'admin/deleteUser/' . $row->use_id . '.html', '<i class="fa fa-trash-o fa-lg"></i>','title="Delete" onclick="return confirm(Are you sure want to delete?)"');
                                             echo '<span id="slas">|</span> '.anchor('hr/editUser/' . $row->use_id . '.html', '<i class="fa fa-pencil fa-fw"></i>','title="Eidt"');
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
        