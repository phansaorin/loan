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
                    <h1 class="page-header">Loan Approval</h1>
                </div>
                 <!-- end  page header -->
            </div>      
            <div class="row">
                <div class="col-lg-12 loan-contain">
                  <?php $this->load->view("loan_approvals/includes/info_loan"); ?>
                  <div class="row">
                      <?php //$this->load->view("schedules/includes/payment_schedule"); ?>
                  </div>
                </div>
                <!-- end col-lg-12 -->

            </div>
            <!-- end wrapper -->  
       </div>
        <!-- end wrapper -->
   </div>
</body>

<script type="text/javascript">
  $(document).on('click', '.panel-heading span.clickable', function(e){
      var $this = $(this);
    if(!$this.hasClass('panel-collapsed')) {
      $this.parents('.panel').find('.panel-body').slideUp();
      // $this.parent('.panel').find('.panel-body').slideUp();
      $this.addClass('panel-collapsed');
      $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
    } else {
      $this.parents('.panel').find('.panel-body').slideDown();
      // $this.parent('.panel').find('.panel-body').slideDown();
      $this.removeClass('panel-collapsed');
      $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
    }
  })

  /*$('body').on('click', 'button.btnExit', function(event) {
    event.preventDefault()
    $.post(BASE_URL+"loan_approvals/exit_loan", function(resp) {
      console.log(resp)
    }, 'json');
  })*/
  
  // Approve loan account
  $('body').on('click', 'button.btnApprove', function(event) {
    event.preventDefault()
    var loan_id = $(this).parent().find("input[name='loan_id']").val()
    $.post(BASE_URL+"loan_approvals/approve_loan/"+loan_id, function(resp) {
      console.log(resp)
      $(this).parent().find('button.btnDisapprove').removeAttr("disabled")
      $.notify(resp.message, resp.type)
    }, 'json');
  })

  // Disapprove loan account
  $('body').on('click', 'button.btnDisapprove', function(event) {
    event.preventDefault()
    var loan_id = $(this).parent().find("input[name='loan_id']").val()
    $.post(BASE_URL+"loan_approvals/disapprove_loan/"+loan_id, function(resp) {
      console.log(resp)
      $(this).parent().find('button.btnDisapprove').attr("disabled")
      $.notify(resp.message, resp.type)
    }, 'json');
  })

  // Autocomplete
  autoCompleted();

  function autoCompleted() {
    $('input[name="searches"]').autocomplete({
      minLength: 1,
      source: function(req, response){
        $.ajax({
          url: "<?php echo site_url('loan_approvals/autocomplete'); ?>",
          type: 'POST',
          data: {"term" : req.term},
          dataType: "json",
          success: function(data){
              response(data)
          },
          error: function(resp) {
            console.log(resp.responseText)
          }
        });
      },
      select: function(event, ui){
        event.preventDefault()
        $(this).val(ui.item.label)
        // $('span[role="status"]').remove()

        $.ajax({
          url: "<?php echo site_url('loan_approvals/get_loan_selected'); ?>",
          type: 'POST',
          data: {"id" : ui.item.id},
          dataType: "json",
          success: function(resp){
            if (resp.success) {
              window.location.href = BASE_URL + "loan_approvals/approval/"+resp.id
            };
          },
          error: function(resp) {
            console.log(resp.responseText)
          }
        });
      }
    });
  }
</script>

</html>