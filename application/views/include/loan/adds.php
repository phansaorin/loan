 
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
    <!-- <link href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" /> -->
    <link href="<?php echo base_url();?>assets/css/bootstrap-responsive.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" />
    <!-- <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" /> -->
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
        <?php echo $this->load->view('partial/header')?>
         <!-- end navbar top -->

        <!-- right navbar side -->
        <?php echo $this->load->view('partial/nav_right'); ?>
        <!-- right navbar side -->
        <!--  page-wrapper -->
        <?php //echo $this->load->view('partial/form');?>
         <!--  wrapper -->
    <div id="wrapper">
        <!--  page-wrapper -->
        <div id="page-wrapper">

            
            <div class="row">
                 <!--  page header -->
                <div class="col-lg-12">
                    <!-- <h1 class="page-header"><?php echo $controller_name;?></h1> -->
                </div>
                 <!-- end  page header -->
            </div>
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h1 class="title-header"><?php echo $controller_name;?></h1>
                        </div>
                        <div class="panel-body">
                             <?php echo form_open('loan/addLoan',"id = 'form_id'"); ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4>Customer Information</h4>
                                        <div class="form-group">
                                            <label>CID</label>
                                            <input class="form-control" name="search_id_name" id="search_id_name" placeholder="search name,id">
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
                                            <!-- <input class="form-control" placeholder="Enter text" name="phone"> -->
                                        </div>
                                </div>         
                          
                            <!-- The end of col 6 -->
                            <div class="col-lg-6">
                                <h4>Loan Space</h4>
                                    <div class="form-group">
                                            <label>Owner Typer <span class="note_start">*</span></label>
                                            <select class="form-control" name="owner_type" id="owner_type">
                                                <option>--Please select --</option>
                                                <option>Female</option>
                                                <option>Male</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Currency <span class="note_start">*</span></label>
                                            <select class="form-control" name="currency" id="currency">
                                                <option>--Please select --</option>
                                                <option>KHR(រ)</option>
                                                <option>Dolla ($)</option>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <label>Payment Freg <span class="note_start">*</span></label>
                                            <select class="form-control" name="payment_freg" id="payment_freg">
                                                <option>--Please select --</option>
                                                <option>Weekly</option>
                                                <option>Monthly)</option>
                                            </select>
                                        </div>
                                     <div class="form-group">
                                            <label>Loan Amount <span class="note_start">*</span></label>
                                            <input class="form-control" name="amount_loan" id="amount_loan" placeholder="4000">
                                        </div>
                                        <div class="form-group">
                                            <label>Amo In Word <span class="note_start">*</span></label>
                                            <input class="form-control" placeholder="sixty dolla" name="amount_word" id="amount_word">
                                        </div>
                                        <div class="form-group">
                                            <label>First Payment <span class="note_start">*</span></label>
                                            <input class="form-control" placeholder="13-08-2015" name="fir_payment" id="fir_payment">
                                        </div>
                            </div>
                            </div>
                        <div class="row">
                            <div class="col-lg-6" style="margin-top:-188px;">
                                <h4>Installment</h4>

                                <div class="form-group">
                                            <label>Num Installment <span class="note_start">*</span></label>
                                            <input class="form-control" name="num_installment" id="num_installment" placeholder="4000">
                                        </div>
                                        <div class="form-group">
                                            <label>Interst Rate <span class="note_start">*</span></label>
                                            <input class="form-control" placeholder="sixty dolla" name="interes_rate" id="interes_rate">
                                        </div>
                                        <div class="form-group">
                                            <label>Installment Ammount <span class="note_start">*</span></label>
                                            <input class="form-control" placeholder="sixty dolla" name="installment_ammount" id="installment_ammount">
                                        </div>
                                        <p style="color:red;">Note: * are require.</p>
                            </div>
                            
                            <div class="col-lg-6">
                                <h4>Project Detail</h4>

                                <div class="form-group">
                                    <label>Product Type</label>
                                        <select class="form-control" name="product_type" id="product_type">
                                                <option>--Please select --</option>
                                                <option>400,001RIEL -600,00RIEL</option>
                                                <option>400,001RIEL -600,00RIEL)</option>
                                            </select>
                                        </div>
                                 <button type="submit" class="btn btn-primary btn_submit" id="btn_submit">Save</button>
                            </div>
                            
                            
                        </div>
                        <?php echo form_close(); ?>
                </div>
                     
     
            </div>
                    <!--End Advanced Tables --> 
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

          
       </div>
        <!-- end wrapper -->
        <script type="text/javascript">

        $('#btn_submit').click(function() {
          var data = $(this).parents("form#form_id").serialize()
          var url = $(this).parents("form#form_id").attr('action')

          $.ajax({
            url: url,
            type: 'POST',
            data: data,
            dataType:'json',
            success: function(resp) {
                console.log(resp);
                if (resp.success) {
                    window.location.href = '<?php echo site_url("loan/records"); ?>';
                } else {
                   // window.location.href = 'loan/create';
                    return false;
                }
            },
            error: function(resp) {
                console.log(resp.responseText);
            }
          });

          return false;
        });

</script>
   </body>
</body>

</html>