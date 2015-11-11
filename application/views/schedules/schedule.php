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
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <!--  page header -->
                      <div class="col-lg-12">
                      <h1 class="page-header">Schedule Payment</h1>
                      </div>
                      <!-- end  page header -->
                   </div>
              </div>
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
            <div class="row">
                <div class="form-group pull-right">
                    <div class="col-md-12 col-xs-10"> <!-- col-xs-offset-2: for to left-->
                        <button class="btn btn-success pull-right" onclick="printDiv('printSchedule')"><i class="ace-icon fa fa-print bigger-120"></i> Print</button>
                        <button class="btn btn-default btnExit pull-right mr5">Exit</button>
                    </div>
                </div>
            </div>
          
       </div>
        <!-- end wrapper -->
   </div>
</body>

<script type="text/javascript">
  function printDiv(divId) {
    var printContents = document.getElementById(divId).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = "<html><head><title></title></head><body>" + printContents + "</body>";
    window.print();
    document.body.innerHTML = originalContents;
  }

  $(document).ready(function() {
    $('body').on('click', 'button.btnExit', function() {
      window.location.href = BASE_URL+"loans"
    })
  })
</script>

</html>