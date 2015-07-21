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
 <?php echo '<legend><h3>Update staff</h3></legend>'; ?>

<table style="width:90%; margin: auto">
<?php
$photo = array('name' => 'userfile', 'value' => set_value('userfile'));
$document = array('name' => 'document', 'value' => set_value('document'));
$formclass = array('class' => 'form-horizontal');
//    echo form_open("hr/addstaff")
echo form_open_multipart('hr/editstaff/'.$this->uri->segment(3), $formclass);

?>
    <input type="hidden" name="file_photo" value="<?php echo $staff->photo;?>"/>
     <input type="hidden" name='file_doc' value="<?php echo $staff->related_file;?>"/>
    <tr>
        <td class="txt_label">Family Name  </td>
        <td>:</td>
        <td>
            <input type="text" required="" name="txt_fname" id="txt_fname" size="50" value="<?php echo $staff->family_name;?>" class="box"/>
            <i class="sms_erro"><?php echo form_error('txt_fname'); ?></i>
        </td>
        <td class="txt_label">Given Name </td>
         <td>:</td>
        <td><input type="text" name="txt_gname" value="<?php echo $staff->given_name;?>" class="box" /></td>
    </tr>
    <tr>
        <td class="txt_label">Gender </td>
        <td><span>:</span></td>
        <td>
         <select name="txt_gender" class="box">
               <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </td>
         <td class="txt_label">Phone Number</td>
     <td><span>:</span></td>
    <td><input type="text" name="txt_phone" size="100" value="<?php echo $staff->phone;?>" class="box"/></td>
    </tr>
      <tr>
        <td class="txt_label">Date Of Birth</td>
        <td><span>:</span></td>
        <td>
            <input type="text" required="" name="txt_dob" id="my-date-picker" class="datepicker box" value="<?php echo $staff->dob;?>"/>
        </td>
         <td class="txt_label">Start Working Date</td>
        <td><span>:</span></td>
        <td>
            <input type="text" required="" name="txt_swd" id="start-date-picker" class="datepicker box" value="<?php echo $staff->work_start;?>"/>
        </td>
            
    </tr>
    <tr>
        <td class="txt_label">Address</td>
        <td>:</td>
        <td>
            <textarea name="txt_add" class="box">
<?php echo $staff->address;?>
            </textarea>
        </td>
        
        <td class="txt_label">Current Address</td>
        <td>:</td>
        <td>
            <textarea name="txt_cur_add" class="box">
<?php echo $staff->cur_address;?>
            </textarea>
        </td>
    </tr>
    <tr>
        <td class="txt_label">Project Manager</td>
        <td>:</td>
         <td>
             
            <?php
    foreach ($manager->result() as $row){
        $fullname[$row->use_id] = $row->fullname;
      
    }
    echo form_dropdown('use_id', $fullname,$staff->use_id, 'class="box"');
				
   ?>
                
        </td>
          <td class="txt_label">Salary Rang</td>
        <td>:</td>
         <td>
             
              <?php
     foreach ($salary->result() as $row_sal){
        $salaries[$row_sal->sal_id] = $row_sal->amount;
    }
    echo form_dropdown('txt_sal', $salaries,$staff->use_id, 'class="box"');
				
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
        
        <td colspan="6" class="btn_save"> 
        <input type="submit" name="btn_submit" value="Save" class="btn btn-success" />
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