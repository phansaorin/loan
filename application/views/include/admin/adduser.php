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
 <?php echo '<legend><h3 id="add_newuser">New User</h3></legend>'; ?>

<table style="width:90%; margin: auto">
<?php
$position = array(
   '' => 'Select now',
    '2' => 'Staff',
    '1' => 'Manager',
    '3'=>'Other'
);
$gender = array(
   '' => 'Select now',
    '2' => 'Male',
    '1' => 'Woman',
);
$document = array('name' => 'document', 'value' => set_value('document'));
$formclass = array('class' => 'form-horizontal');
//    echo form_open("hr/addstaff")
echo form_open_multipart('hr/addstaff', $formclass);

?>
    <tr>
        <td class="txt_label">User Name  </td>
        <td>:</td>
        <td>
            <input type="text" required="" name="username" id="username" size="50" value="<?php echo set_value('username');?>" class="box"/>
            <i class="sms_erro"><?php echo form_error('username'); ?></i>
        </td>
        
    </tr>
    <tr>
        <td class="txt_label">Group Name</td>
         <td>:</td>
        <td><input type="text" name="txt_gname" value="<?php echo set_value('txt_gname');?>" class="box" />
        <i class="sms_erro"><?php echo form_error('txt_gname'); ?></i>
        </td>
    </tr>
    <tr>
        <td class="txt_label">Title Name </td>
        <td><span>:</span></td>
        <td><?php
            echo form_dropdown('txt_title', $gender,  set_value('txt_title'), 'class="box"');
            ?>
        </td>
        
    </tr>
   
    <tr>
        <td class="txt_label">Position </td>
        <td><span>:</span></td>
        <td><?php echo form_dropdown('txt_pos', $position,  set_value('txt_pos'), 'class="box"');?></td>
    </tr>
    <tr>
        <td class="txt_label">Manager </td>
        <td><span>:</span></td>
        <td><?php
            echo form_dropdown('txt_pos', $position,  set_value('txt_pos'), 'class="box"');
            ?>
        </td>
        
    </tr>
    <tr>
        
        <td colspan="6" class="btn_save"> 
        <input type="submit" name="btn_submit" value="Save" class="btn btn-primary" />
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