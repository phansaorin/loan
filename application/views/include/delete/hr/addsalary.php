
<fieldset>
 <?php echo '<legend><h3>Salary New</h3></legend>'; ?>

<table style="width:90%; margin: auto">
<?php

echo form_open_multipart('hr/addsalary');

?>
    <tr>
        <td class="txt_label">Amount Salary  </td>
        <td>:</td>
        <td>
            <input type="text" name="txt_sal" required="" id="txt_fname" size="50" value="<?php echo set_value('txt_sal');?>" class="box" required=""/>
        </td>
        </tr>
  <tr>
        <td class="txt_label">Salary Description </td>
        <td>:</td>
        <td>
            <textarea name="txt_des" class="box">
                <?php echo set_value('txt_des');?>
            </textarea>
             </td>
        </tr>
    <tr>
        
        <td colspan="3" class="btn_save"> 
        <input type="submit" name="btn_submit" value="Save" class="btn btn-success" />
        <?php 
       echo anchor("hr/salary/",'Cancel',array('class'=>'btn btn-danger')) ?>
        </td>
    </tr>
<?php echo form_close(); ?>
</table>
</fieldset>
   