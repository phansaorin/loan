<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Management</title>
    <!-- Core CSS - Include with every page -->
   <link href="<?php echo base_url();?>assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
   <link href="<?php echo base_url(); ?>assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
   <link href="<?php echo base_url();?>assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
   <!--end plugins -->

    <!-- font-awesome-->
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/bootstrap-responsive.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/main-style.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" />
    <!-- Core Scripts - Include with every page -->
    <script src="<?php echo base_url();?>assets/plugins/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/pace/pace.js"></script>
    <script src="<?php echo base_url();?>assets/js/siminta.js"></script>
    <script src="<?php echo base_url();?>assets/js/flot-demo.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="<?php echo base_url();?>assets/js/morris-demo.js"></script>
    <script src="<?php echo base_url();?>assets/js/dashboard-demo.js"></script>
   
   </head>
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
        <?php //echo $this->load->view('partial/form');?>
         <!--  wrapper -->
    <div id="wrapper">
        <!--  page-wrapper -->
        <div id="page-wrapper">
          <div class="row">
             <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                  <div class="col-lg-12">
                    <div class="col-lg-6">Hello one</div>
                    <div class="col-lg-6">Hello one</div>
                  </div>
                 <center><h3>Loan Disturbment Voucher</h3></center> 
                  <div class="row" style="border: solid 1px;">
                                <div class="col-lg-6">
                                <form role="form">
                                        <div class="form-group">
                                            <label>CID</label>
                                            <input class="form-control" name="search_id_name" placeholder="search name,id">
                                        </div>
                                        <div class="form-group">
                                            <label>Please Name: Phan Saorin</label>
                                             
                                            <!-- <input class="form-control" placeholder="Enter text" name="lname"> -->
                                        </div>
                                        <div class="form-group">
                                            <label>Date Of Birth: 23-Aug-1993 Female</label>
                                            <!-- <input class="form-control" placeholder="Enter text" name="phone"> -->
                                        </div>
                                        <div class="form-group">
                                            <label>Address: NO,371Eo,Kan Chamka Mon, Cambodian</label>
                                            <input class="form-control" placeholder="Enter text" name="phone">
                                        </div>
                                        <div class="form-group">
                                            <label>Role</label>
                                            <select class="form-control">
                                                <option>IT Admin</option>
                                                <option>Hr Staff</option>
                                                <option>Project Manager</option>
                                            </select>
                                        </div>

                              
                       </div>
                            
                          
                            <!-- The end of col 6 -->
                            <div class="col-lg-6">
                                    <div class="form-group">
                                            <label>Owner Typer</label>
                                            <select class="form-control">
                                                <option>--Please select --</option>
                                                <option>Female</option>
                                                <option>Male</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Currency</label>
                                            <select class="form-control">
                                                <option>--Please select --</option>
                                                <option>KHR(រ)</option>
                                                <option>Dolla ($)</option>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <label>Mayment Freg</label>
                                            <select class="form-control">
                                                <option>--Please select --</option>
                                                <option>Weekly</option>
                                                <option>Monthly)</option>
                                            </select>
                                        </div>
                                     <div class="form-group">
                                            <label>Loan Amount</label>
                                            <input class="form-control" name="amount_loan" placeholder="4000">
                                        </div>
                                        <div class="form-group">
                                            <label>Amo In Word</label>
                                            <input class="form-control" placeholder="sixty dolla" name="amount_word">
                                        </div>
                            </div>
                            </div>
                </div>
              
          </div>
        </div>
    </div>