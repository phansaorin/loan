
<fieldset>
 <?php echo '<legend><h3>New User</h3></legend>'; ?>

<table style="width:90%; margin: auto">
<?php

//    echo form_open("hr/addstaff")
echo form_open_multipart('hr/adduser');
?> 
    <tr>
        <td class="txt_label">Staff Name </td>
        <td><span>:</span></td>
        <td><?php
        
              foreach($get_staff->result() as $rows_data){
                  $staffRecord[$rows_data->sta_id] = $rows_data->family_name.' ('.$rows_data->given_name.')';
              }
            echo form_dropdown('sta_id', $staffRecord,  set_value('sta_id'), 'class="box"');
            ?>
        </td>
    </tr>
    <tr>
        <td class="txt_label">User Name</td>
        <td>:</td>
        <td>
            <input type="text" required="" name="txt_username" id="txt_username" size="50" value="<?php echo set_value('txt_username');?>" class="box"/>
            <i class="sms_erro"><?php echo form_error('txt_username'); ?></i>
        </td>
        
    </tr>
    <tr>
      <td class="txt_label">Password </td>
         <td>:</td>
         <td><input type="password" name="txt_password" value="<?php echo set_value('txt_password');?>" class="box" />
        <i class="sms_erro"><?php echo form_error('txt_password'); ?></i>
        </td>
    </tr>
    <tr>
        <td class="txt_label">Group Name </td>
        <td><span>:</span></td>
        <td><?php
          $groups[] = '-- Select --';
              foreach($group->result() as $rows){
                  $groups[$rows->gro_id] = $rows->gro_name;
              }
            echo form_dropdown('txt_group',$groups, set_value('txt_group'), 'class="box"');
            ?>
        </td>
    </tr>
    <tr>
        <td class="txt_label">Role Type </td>
        <td><span>:</span></td>
        <td><?php
             $roles[] = '-- Select --';
              foreach($role->result() as $rows){
                  $roles[$rows->role_id] = $rows->title;
              }
            echo form_dropdown('txt_role', $roles,  set_value('txt_role'), 'class="box"');
            ?>
        </td>
    </tr>
    <tr>
        
        <td colspan="6" class="btn_save"> 
        <input type="submit" name="btn_submit" value="Save" class="btn btn-success" />
        <?php 
       echo anchor("hr/users/",'Cancel',array('class'=>'btn btn-danger')) ?>
        </td>
    </tr>
<?php echo form_close(); ?>
</table>
</fieldset>
   