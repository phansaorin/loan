
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

                <?php
                if($get_staff->num_rows() > 0){
                    foreach ($get_att->result() as $get_row) 
                   
                if($get_row->check_date != date("Y-m-d")){
                    echo anchor('admin/addattendant', 'Check Attendent', 'class="btn btn-primary"');
                }     
                }else{
                    echo anchor('admin/addattendant', 'Check Attendent', 'class="btn btn-primary"');
                 
                }
                   
                ?>
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
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($get_staff->result() as $row) {
$total = $this->mod_staff->count_att($row->sta_id)+ $this->mod_staff->count_att_no($row->sta_id);
                                echo '  <tr>
                                            <td>' . $i++ . '</td>
                                            <td class="center">';
                                echo anchor('hr/detail/' . $row->sta_id, $row->family_name);
                                echo'</td>
                                                <td>' . $this->mod_staff->count_att($row->sta_id) . '</td>
                                                <td>' . $this->mod_staff->count_att_no($row->sta_id) . '</td>
                                                 <td>'.$total.'</td>   
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
