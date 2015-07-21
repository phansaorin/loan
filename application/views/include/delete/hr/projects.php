 
<div class="row">
         <!--  page header -->
        <div class="col-lg-12">
                <h1 class="page-header">Project Management</h1>
        </div>
         <!-- end  page header -->
</div>
<div class="row">
        <div class="col-lg-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                        <div class="panel-heading">
                          <?php echo anchor('hr/addprojects','Add New','class="btn btn-primary"');?>
                        </div>
                        <div class="panel-body" >
                                <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                        <tr>
                                                                <th>ID</th>
                                                                <th>Project Name</th>
                                                                <th>Company Name</th>
                                                                <th>Response By</th>
                                                                <th>Start Date</th>
                                                                <th>End Date</th>
                                                                <th>Active</th>
                                                                <th>Action</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                        <?php
                                                                $i = 1;
                                                                foreach($get_project->result() as $rows){
                                                                         echo '  <tr>
                                                                          <td>'.$i++.'</td>
                                                                          <td>'.$rows->pro_name.'</td>
                                                                              <td>'.$rows->company.'</td>
                                                                          <td>'.$rows->username.'</td>
                                                                          <td>'.$rows->start_date.'</td>
                                                                          <td>'.$rows->end_date.'</td>
                                                                              <td></td>
                                                                          <td class="center">';
                                                                          echo anchor(base_url() . 'hr/deleteProject/' . $rows->pro_id . '.html', '<i class="fa fa-trash-o fa-lg"></i>','title="Delete" onclick="return confirmDelete()"');
                                                                          echo ' | '.anchor('hr/editproject/' . $rows->pro_id . '.html', '<i class="fa fa-pencil fa-fw"></i>','title="Eidt"');
                                                                          echo'</td>
                                                                      </tr>';
                                                                }
                                                        ?>
                                                </tbody>
                                        </table>
                                </div>
                        </div>
                </div>
        </div>
</div> 
