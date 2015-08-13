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