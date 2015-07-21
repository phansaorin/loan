
<fieldset>
 <?php echo '<legend><h3>New Group</h3></legend>'; ?>

<table style="width:90%; margin: auto">
<?php
$photo = array('name' => 'userfile', 'value' => set_value('userfile'));
$document = array('name' => 'document', 'value' => set_value('document'));
$formclass = array('class' => 'form-horizontal');
//    echo form_open("hr/addstaff")
echo form_open_multipart('hr/editgroup/'.$this->uri->segment(3));

?>
    <tr>
        <td class="txt_label">Group Name  </td>
        <td>:</td>
        <td>
            <input type="text" required="" name="txt_group" id="txt_fname" size="50" value="<?php echo $edit_group->gro_name;?>" class="box"/>
        </td>
        </tr>
 
    <tr>
        
        <td colspan="3" class="btn_save"> 
        <input type="submit" name="btn_submit" value="Save" class="btn btn-success" />
        <?php 
       echo anchor("hr/group/",'Cancel',array('class'=>'btn btn-danger')) ?>
        </td>
    </tr>
<?php echo form_close(); ?>
</table>
</fieldset>
   