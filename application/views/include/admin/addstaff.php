<!--date picker-->
         <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
         <script>
        $(function() {
        $( "#datepicker" ).datepicker();
        });
        </script>
<fieldset>
 <?php echo '<legend><h3 id="new_sta">New staff</h3></legend>'; ?>

<table style="width:90%; margin: auto">
<?php
$photo = array('name' => 'userfile', 'value' => set_value('userfile'));
$gender = array(
   '' => 'Select now',
    'M' => 'Male',
    'F' => 'Female'
);
$position = array(
   '' => 'Select now',
    '2' => 'Staff',
    '1' => 'Manager',
    '3'=>'Other'
);
$document = array('name' => 'document', 'value' => set_value('document'));
$formclass = array('class' => 'form-horizontal');
//    echo form_open("hr/addstaff")
echo form_open_multipart('hr/addstaff', $formclass);

?>
    <tr>
        <td class="txt_label">Family Name  </td>
        <td>:</td>
        <td>
            <input type="text" required="" name="txt_fname" id="txt_fname" size="50" value="<?php echo set_value('txt_fname');?>" class="box"/>
            <i class="sms_erro"><?php echo form_error('txt_fname'); ?></i>
        </td>
        <td class="txt_label">Given Name </td>
         <td>:</td>
        <td><input type="text" name="txt_gname" value="<?php echo set_value('txt_gname');?>" class="box" />
        <i class="sms_erro"><?php echo form_error('txt_gname'); ?></i>
        </td>
    </tr>
    <tr>
        <td class="txt_label">Gender </td>
        <td><span>:</span></td>
        <td><?php
            echo form_dropdown('txt_gender', $gender,  set_value('txt_gender'), 'class="box"');
            ?>
        </td>
         <td class="txt_label">Phone Number</td>
     <td><span>:</span></td>
    <td><input type="text" name="txt_phone" size="100" value="<?php echo set_value('txt_phone');?>" class="box"/>
    <i class="sms_erro"><?php echo form_error('txt_phone'); ?></i>
    </td>
    </tr>
      <tr>
        <td class="txt_label">Date Of Birth</td>
        <td><span>:</span></td>
        <td>
            <input type="text" required="" name="txt_dob" id="my-date-picker" class="datepicker box" value="<?php echo set_value('txt_dob');?>"/>
        <i class="sms_erro"><?php echo form_error('txt_dob'); ?></i>
        </td>
         <td class="txt_label">Start Working Date</td>
        <td><span>:</span></td>
        <td>
            <input type="text" required="" name="txt_swd" id="start-date-picker" class="datepicker box" value="<?php echo set_value('txt_swd');?>"/>
        <i class="sms_erro"><?php echo form_error('txt_swd'); ?></i>
        </td>
            
    </tr>
    <tr>
        <td class="txt_label">Address</td>
        <td>:</td>
        <td>
            <textarea name="txt_add" class="box"><?php echo set_value('txt_add');?></textarea>
            <i class="sms_erro"><?php echo form_error('txt_add'); ?></i>
        </td>
        
        <td class="txt_label">Current Address</td>
        <td>:</td>
        <td>
            <textarea name="txt_cur_add" class="box"> <?php echo set_value('txt_cur_add');?></textarea>
            <i class="sms_erro"><?php echo form_error('txt_cur_add'); ?></i>
        </td>
    </tr>
    <tr>
        <td class="txt_label">Project Manager</td>
        <td>:</td>
         <td>
            <?php
    foreach ($manager->result() as $row){
       $fullname[$row->sta_id] = $row->family_name;
    }
    echo form_dropdown('use_id', $fullname,  set_value('use_id'), 'class="box"');
	
   ?>
                 
        </td>
          <td class="txt_label">Salary Rang</td>
        <td>:</td>
         <td>
             <?php
     foreach ($salary->result() as $row_sal){
        $salaries[$row_sal->sal_id] = $row_sal->amount;
    }
    echo form_dropdown('txt_sal', $salaries,set_value('txt_sal'), 'class="box"');
				
   ?>
        </td>
    </tr>
    <tr>
        <td class="txt_label">Photo</td>
        <td>:</td>
        <td>
          <?php 
          echo form_upload($photo); 
          ?>
        </td>
        <td class="txt_label">Document</td>
        <td>:</td>
        <td>
            <?php 
          echo form_upload($document); 
          ?>
        </td>
    </tr>
    <tr>
        <td class="txt_label">Position </td>
        <td><span>:</span></td>
        <td><?php
            echo form_dropdown('txt_pos', $position,  set_value('txt_pos'), 'class="box"');
            ?>
        </td>
    </tr>
    <tr>
        
        <td colspan="6" class="btn_save"> 
        <input type="submit" name="btn_submit" value="Save" id="btn_addsta" class="btn btn-primary" />
        <?php 
       echo anchor("hr/staffs/",'Cancel',array('class'=>'btn btn-danger')) ?>
        </td>
    </tr>
<?php echo form_close(); ?>
</table>
</fieldset>
    <script type="text/javascript">
/* Initialise date picker */
$(document).ready(function()
{
	$("#my-date-picker").datepicker();
        $("#start-date-picker").datepicker();
}
);
</script>