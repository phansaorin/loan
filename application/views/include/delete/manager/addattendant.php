
<div class="row">
    <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Check Attendent</h1>
    </div>

</div>
<h5>Attendent List On &raquo; <i class='sms_erro'><?php echo date('Y-m-d'); ?></i></h5>
<br/>
<div class="row">

    <div class="col-lg-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="sumite"></div>
               </div>
            <div class="panel-body">
                <div class="table-responsive">
                    
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Nº</th>
                                <th>Staff Name</th>
                                <th>Attendent</th>
                            </tr>
                        <input type="hidden" name='permission' value=""
                        </thead>
                        <tbody>
                            <?php
                            
                            $att = array(
    '0' => 'Come',
    '1' => 'Permission',
    '2' => 'No Permission'
);
                            echo form_open_multipart('hr/addattendent');
                            $i = 1;
                            foreach ($get_staff->result() as $row) {

                                echo '  <tr>
                                            <td>' . $i++ . '</td>
                                            <td>' . $row->family_name . '</td>
                                            
                                            <td class="center"> ';
                                 echo'<input type="hidden"  value="' .  $row->sta_id . '"  name="til_id[' .  $row->sta_id . ']" onkeypress="return isNumberKey(event)"/>';
                                 
                                  
                                 echo form_dropdown('txt_att['. $row->sta_id.']', $att ,set_value('txt_att['. $row->sta_id.']'));
                               echo '
                                     
</td>                       </tr>';
                            }
                           ?>
                                <tr>
        
        <td colspan="6" class="btn_save"> 
        <input type="submit" name="btn_submit" value="Save" class="btn btn-success" />
        <?php 
       echo anchor("hr/attendent/",'Cancel',array('class'=>'btn btn-danger')) ?>
        </td>
    </tr>
                               <?php
                            echo form_close(); ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!--End Advanced Tables -->

    </div>
    <!-- end page-wrapper -->

</div>
