<?php $this->load->view("partial/header_top"); ?>
<?php echo $controller_name; ?>
<body>
      <!--  wrapper -->
       <div id="wrapper">
        <!-- start navbar top -->
        <?php $this->load->view('partial/header')?>
         <!-- end navbar top -->

        <!-- right navbar side -->
        <?php $this->load->view('partial/nav_right'); ?>
        <!-- right navbar side -->
        <!--  page-wrapper -->
         <!--  wrapper -->
    <div id="wrapper">
        <!--  page-wrapper -->
        <div id="page-wrapper">

            
            <div class="row">
                 <!--  page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Schedule Payment</h1>
                </div>
                 <!-- end  page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php $this->load->view("schedules/includes/info_schedule"); ?>
                            <div class="row">
                                <?php $this->load->view("schedules/includes/payment_schedule"); ?>
                            </div>

                            <div class="table-responsive">
                                
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
               
                </div>
                <!-- end page-wrapper -->

            </div>
            <!-- end wrapper -->
<?php //echo anchor('main/login_form','Login');?>
          
       </div>
        <!-- end wrapper -->
   </div>
</body>

</html>