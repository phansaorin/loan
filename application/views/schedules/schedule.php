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
    updateTotalReschedule()
    $('body').on('click', 'button.btnExit', function() {
      window.location.href = BASE_URL+"loans"
    })
    $('body').on('change', 'select[name="paid"]', function(event) {
      event.preventDefault()
      var $this = $(this)
      var paid = $this.val()
      var id = $this.data('pay-id')
      var loan_id = $("input[name='loan_id']").val()
      $.post(BASE_URL+"loans/paid/"+loan_id, {paid : paid, id : id}, function(resp) {
        $this.parents('tr').removeClass("tr-schedule").addClass("success")
        $.notify(resp.message, resp.type)
      }, 'json');
    })
    $('body').on('click', 'button[name="btn_reschedule"]', function(event) {
      event.preventDefault()
      var $this = $(this)
      $this.attr("target", "_blank")
      var loan_id = $this.data("loan-id")
      var total_reschedule = $("input[name='total_reschedule']").val()
      if (confirm("Are you sure you want to re-schedule?")) {
        if (confirm("Are you sure you want to pay-off before re-schedule?")) {
          $.post(BASE_URL+"loans/reschedule", {total_reschedule : total_reschedule, loan_id : loan_id}, function(resp) {
            window.location.href = BASE_URL+"loans/clone_data/"+loan_id
          }, 'json');
        } else {
          $.post(BASE_URL+"loans/reschedule", {total_reschedule : total_reschedule, loan_id : loan_id}, function(resp) {
            window.location.href = BASE_URL+"loans/clone_data/"+loan_id
          }, 'json');
        }
      };
    })
    $('body').on('click', 'button[name="btn_pay_off"]', function(event) {
      event.preventDefault()
      var $this = $(this)
      var url = $this.data("url")
      var loan_id = $this.data("loan-id")
      if (confirm("Are you sure you want to pay-off this loan?")) {
        $.post(url, {loan_id : loan_id}, function(resp) {
          window.location.href = BASE_URL+"loans/schedule/"+loan_id
        }, 'json');
      };
    })
  })

  function updateTotalReschedule() {
    var total_reschedule = $(".reschedule").find("tbody tr.tr-schedule").first().find("input[name='pay_amount']").val()
    $("input[name='total_reschedule']").val(total_reschedule)
    setTimeout(updateTotalReschedule, 100)
  }
</script>

</html>