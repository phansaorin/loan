 

<fieldset>
 <?php echo '<legend><h3>New Project</h3></legend>'; ?>

<table style="width:90%; margin: auto">
<?php

echo form_open_multipart('hr/addprojects');

?>
      <tr>
        <td class="txt_label">Project Name</td>
        <td>:</td>
        <td>
            <input type="text" name="txt_project" id="txt_project" size="50" value="<?php echo set_value('txt_project');?>" class="box" required=""/>
        </td>
      </tr>
       <tr>
        <td class="txt_label">Company Name</td>
        <td>:</td>
        <td>
            <input type="text" name="txt_com" id="txt_project" size="50" value="<?php echo set_value('txt_com');?>" class="box" required=""/>
        </td>
      </tr>
       <tr>
        <td class="txt_label">Project Description</td>
        <td>:</td>
        <td>
            <textarea  name="txt_des" style="min-width: 320px;">
<?php echo set_value('txt_des');?>
            </textarea> </td>
      </tr>
      
       </tr>
      <tr>
        <td class="txt_label">Start Date</td>
        <td><span>:</span></td>
        <td>
            <input type="text" required="" name="txt_start" id="my-date-picker" class="datepicker box" value="<?php echo set_value('txt_dob');?>"/>
        <i class="sms_erro"><?php echo form_error('txt_start'); ?></i>
        </td>
      </tr><tr>
         <td class="txt_label">Finish Date</td>
        <td><span>:</span></td>
        <td>
            <input type="text" required="" name="txt_end" id="start-date-picker" class="datepicker box" value="<?php echo set_value('txt_swd');?>"/>
        <i class="sms_erro"><?php echo form_error('txt_end'); ?></i>
        </td>
            
    </tr>
      <tr>
        <td class="txt_label">Manager Response</td>
        <td>:</td>
         <td>
             <?php
                
                $user_types[] = '-- Select --';
                foreach ($user_type->result() as $rows){
                    $user_types[$rows->use_id] = $rows->username;
                }
                echo form_dropdown('txt_usertype',$user_types,set_value('txt_usertype'), 'class="box"');
                                            
              ?>

        </td>
    </tr>
    <tr>
        <td colspan="3" class="btn_save"> 
        <input type="submit" name="btn_submit" value="Save" class="btn btn-success" />
        <?php 
       echo anchor("hr/projects/",'Cancel',array('class'=>'btn btn-danger')) ?>
        </td>
    </tr>
<?php echo form_close(); ?>
</table>
</fieldset>
   <!--date picker-->
         <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
         <script>
        $(function() {
        $( "#datepicker" ).datepicker();
        });
        </script>
         <script type="text/javascript">
/* Initialise date picker */
$(document).ready(function()
{
	$("#my-date-picker").datepicker();
        $("#start-date-picker").datepicker();
}
);
</script>