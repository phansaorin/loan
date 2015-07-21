<script type="text/javascript">
  
    function printPage(id) {
        //alert('successfully');
        var html="<fieldset>";
        html+= document.getElementById(id).innerHTML;
        html+="</fieldset>";

        var printWin = window.open('','','left=0,top=0,width=1,height=1,toolbar=0,scrollbars=0,status =0');
        printWin.document.write(html);
        printWin.document.close();
        printWin.focus();
        printWin.print();
        printWin.close();

        var html="<html>";
        html+="<head>";
       // html+="<style type='text/css'>.mytable{border:1px solid #ccc;}.mytable tr{background-color:#008000;color:#FFF;}</style>";
        html+="<link rel='Stylesheet' type='text/css' href='<?php echo base_url(); ?>bootstrap/css/bootstrap.css' media='print' />";
        html+="<link rel='Stylesheet' type='text/css' href='<?php echo base_url(); ?>bootstrap/css/bootstrap-responsive.css' media='print' />";
        html+="<link rel='Stylesheet' type='text/css' href='<?php echo base_url(); ?>bootstrap/css/style.css' media='print' />";
        html+="<link rel='Stylesheet' type='text/css' href='<?php echo base_url(); ?>bootstrap/css/demo_table_jui.css' media='print' />";
        html+="</head>";
        html+= document.getElementById(id).innerHTML;
        html+="</html>";
  
    }
</script>
 

    
       
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
                        <h5 style="float:right; padding: 5px;"><a href="#">
            <img src="<?php echo base_url(); ?>assets/images/print.png" align="center" onclick="return printPage('year');" id="image"  alt="Print Report" title="Print Report"/>
        </a>
                            </h5>
                        <fieldset id="year">
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
                                            <th>Position</th>
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
                                                <td>'.$row->pos_title.'</td>
                                            <td style="text-align:center;"><img src=' . base_url() . 'assets/images/'.$row->photo.' class="image_staff" /></td>
                                            <td>'.$row->phone.'</td>
                                            <td class="center">'.$row->address.'</td>
                                            <td class="center">';
                                            if($row->sta_id == 3 || $row->sta_id == 5){
                                            } else {
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
                            </fieldset>
                    </div>
                    <!--End Advanced Tables -->
               
        </div>
        <!-- end page-wrapper -->

    </div>
