
            <div class="row">
                 <!--  page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Attendent Management</h1>
                </div>
                 <!-- end  page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <div class="sumite"></div>
                          <?php echo anchor('hr/attendant','Back','class="btn btn-primary"');?>
                          <?php //echo form_submit(array('id'=>'username','name'=>'username','class'=>'form-control','placeholder'=>'E-mail',)); ?>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nº</th>
                                            <th>Staff Name</th>
                                            <th>Permission</th>
                                            <th>No Permission</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($get_staff->result() as $row){
                                            
                                            echo '  <tr>
                                            <td>'.$i++.'</td>
                                            <td>'.$row->family_name.'</td>
                                            <td></td>
                                            
                                            <td class="center">';
                                             							
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
        