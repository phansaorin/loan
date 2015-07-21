
<fieldset>
 <?php echo '<legend><h3>New staff</h3></legend>'; ?>

<table style="width:90%; margin: auto">
<?php
$photo = array('name' => 'userfile', 'value' => set_value('userfile'));
$document = array('name' => 'document', 'value' => set_value('document'));
$formclass = array('class' => 'form-horizontal');
//    echo form_open("hr/addstaff")
echo form_open_multipart('hr/addstaff', $formclass);

?>
    <tr>
        <td class="txt_label">Family Name  </td>
        <td>:</td>
        <td>
            <input type="text" name="txt_fname" id="txt_fname" size="50" value="<?php echo set_value('txt_fname');?>" class="box"/>
        </td>
        <td class="txt_label">Given Name </td>
         <td>:</td>
        <td><input type="text" name="txt_gname" value="<?php echo set_value('txt_gname');?>" class="box" required/></td>
    </tr>
    <tr>
        <td class="txt_label">Gender </td>
        <td><span>:</span></td>
        <td>
         <select name="txt_gender" class="box">
                <option selected="selected" value="0">--Select Gender--</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </td>
         <td class="txt_label">Phone Number</td>
     <td><span>:</span></td>
    <td><input type="text" name="txt_phone" size="100" value="<?php echo set_value('txt_phone');?>" class="box"/></td>
    </tr>
      <tr>
        <td class="txt_label">Date Of Birth</td>
        <td><span>:</span></td>
        <td>
            <input type="text" name="txt_dob" id="my-date-picker" class="datepicker box" value="<?php echo set_value('txt_dob');?>"/>
        </td>
         <td class="txt_label">Start Working Date</td>
        <td><span>:</span></td>
        <td>
            <input type="text" name="txt_swd" id="start-date-picker" class="datepicker box" value="<?php echo set_value('txt_swd');?>"/>
        </td>
            
    </tr>
    <tr>
        <td class="txt_label">Address</td>
        <td>:</td>
        <td>
            <textarea name="txt_add" class="box"></textarea>
        </td>
        
        <td class="txt_label">Current Address</td>
        <td>:</td>
        <td>
            <textarea name="txt_cur_add" class="box"></textarea>
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
       echo anchor("hr/records/",'Cancel',array('class'=>'btn btn-danger')) ?>
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