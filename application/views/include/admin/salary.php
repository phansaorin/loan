
            <div class="row">
                 <!--  page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Salary Management</h1>
                </div>
                 <!-- end  page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <div class="sumite"></div>
                          <?php echo anchor('admin/addsalary','Add New','class="btn btn-primary"');?>
                          <?php //echo form_submit(array('id'=>'username','name'=>'username','class'=>'form-control','placeholder'=>'E-mail',)); ?>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nº</th>
                                            <th>Salary Rang</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($get_salary->result() as $row){
                                            
                                            echo '  <tr>
                                            <td>'.$i++.'</td>
                                            <td>'.$row->amount.'</td>
                                            <td class="center">';
                                             echo anchor(base_url() . 'admin/deleteSalary/' . $row->sal_id . '.html', '<i class="fa fa-trash-o fa-lg"></i>','title="Delete" onclick="return onclick="return confirmDelete()"');
                                             echo ' | '.anchor('admin/editsalary/' . $row->sal_id . '.html', '<i class="fa fa-pencil fa-fw"></i>','title="Eidt"');
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
        