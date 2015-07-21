
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Core CSS - Include with every page -->
   <link href="<?php echo base_url();?>assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
   <link href="<?php echo base_url(); ?>assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
   <!--end plugins -->

    <!-- font-awesome-->
     <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- end font-awesome -->
    <link href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/bootstrap-responsive.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/main-style.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" />
  
 
   </head>

<body class="body-Login-back">

    <div class="container">
       
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
              <?php //echo img('assets/images/1.png');?>
                </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">                  
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Log In</h3>
					<?php 
					session_start();  
					if(isset($_POST['btnSubmit'])){ 
					
						$sms =  $this->session->userdata('login_erro');
						
						
						?>
						<div class="alert">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Warning!</strong> <?php echo $sms;?>
						</div>
					<?php }else{
						echo '';
					} ?>
                    </div>
                    <div class="panel-body">
                       <?php echo form_open("login/login_form", array("role"=>"form")); ?>
                            <fieldset>
                                <div class="form-group">
                                    <?php echo form_input(array('id'=>'username','name'=>'username','class'=>'form-control','placeholder'=>'User Name',)); ?>
                                </div>
                                <div class="form-group">
                                    <?php echo form_password(array('id'=>'password','name'=>'password','placeholder'=>'Password','class'=>'form-control')); ?>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <?php echo form_submit("btnSubmit", "Login", "class='btn btn-lg btn-success btn-block'"); ?>
                                <?php //echo form_submit(array('name'=>'submit'),'Save'); ?>
                            </fieldset>
                        <?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>

</body>

</html>


















