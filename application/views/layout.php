<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?php echo $title; ?>
        </title>


        <?php
        echo link_tag('assets/plugins/bootstrap/bootstrap.css');
        echo link_tag('assets/plugins/pace/pace-theme-big-counter.css');
        echo link_tag('assets/plugins/morris/morris-0.4.3.min.css');
        echo link_tag('assets/font-awesome/css/font-awesome.css');
        echo link_tag('assets/css/bootstrap-responsive.min.css');
        echo link_tag('assets/css/bootstrap-responsive.css');
        echo link_tag('assets/css/bootstrap.css');
        echo link_tag('assets/css/bootstrap.min.css');
        echo link_tag('assets/css/main-style.css');
        echo link_tag('assets/css/font-awesome.css');
        echo link_tag('assets/css/style.css');
        echo link_tag('assets/css/date_picker_style.css');
        ?>

<script src="<?php echo base_url(); ?>assets/js/date_picker_script.js" 	type="text/javascript"></script>

        <!-- Core Scripts - Include with every page -->
        <script src="<?php echo base_url(); ?>assets/plugins/jquery-1.10.2.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/siminta.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/flot-demo.js"></script>
        <!-- Page-Level Plugin Scripts-->
        <script src="<?php echo base_url(); ?>assets/js/morris-demo.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/dashboard-demo.js"></script>
<script src="<?php echo base_url(); ?>assets/js/date_picker_script.js" 	type="text/javascript"></script>
    </head>
     
    <body>

        
        <div id="wrapper">
            
            <?php
$this->load->view('partial/header');

$this->load->view('partial/nav_right');

?>
        
         <div id="page-wrapper">

            <?php

				if(!$this->uri->segment(1))

				{
                                    $this->load->view("login/login_form");
                                    
                                }

				else

				{
                                    $this->load->view('include/'.$this->uri->segment(1).'/'.$this->uri->segment(2));



				}



				?>
           
                  
        <!-- end page-wrapper -->
</div>
    </div>
    </body>
<script type="text/javascript"> 
function confirmDelete() { 
 return confirm("Are you sure want to delete?");   
} 
</script>
    </html>