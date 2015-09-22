<?php $this->load->view("partial/header_top"); ?>
<?php //echo $controller_name; ?>
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
        <div>
        <div class="row">
          <div class="panel panel-default">
        <div class="panel-heading">
             <!--  page header -->
            <div class="col-lg-12">
                <h1 class="page-header list_page">Loan List</h1>
            </div>
             <!-- end  page header -->
            <div class="col-xs-12">
              <div class="form-group pull-right">
                <?php echo anchor('loan/addLoan', 'New', 'class="btn btn-xs btn-success"'); ?>
                <?php echo anchor('loans/approval', 'To Approve', 'class="btn btn-xs btn-primary"'); ?>
              </div>
            </div>
        </div>      
        <div class="row">
            <div class="col-lg-12 loan-contain">
              <div class="col-lg-12 filterable">
                <table class="table table-striped table-bordered table-hover">
                  <thead>
                      <tr class="filters">
                        <th>NO</th>
                        <th>Maturity Date</th>
                        <th>Loan Account</th>
                        <th>Duration</th>
                        <th>Loan Amount</th>
                        <th>First Repayment</th>
                        <th>Rate</th>
                        <th>Installment Amount</th> 
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php 
                  if (count($lists) > 0) {
                      $i = 1;
                      foreach ($lists->result() as $rows) {
                       ?>
                          <tr data-id="<?php echo $rows->id; ?>">
                              <td>
                                <?php echo $rows->id;//form_hidden('ids[]', $rows->id); ?>
                              </td>
                              <td><?php echo date('Y-m-d', strtotime($rows->maturity_date)); ?></td>
                              <td><?php echo $rows->loan_account; ?></td>
                              <td><?php echo $rows->duration_loan.' '.$rows->duration_loan_type; ?></td>
                              <td><?php echo $rows->loan_amount; ?></td>
                              <td><?php echo date('Y-m-d', strtotime($rows->first_repayment)); ?></td>
                              <td><?php echo round($rows->interest_rate, 2); ?></td>
                              <td><?php echo $rows->installment_amount; ?></td>
                              <td>
                                <span class="schedule btn btn-xs btn-warning">
                                  <i class="ace-icon fa fa-calendar bigger-120"></i>
                                </span>
                                <span class="view btn btn-xs btn-success">
                                  <i class="ace-icon fa fa-search bigger-120"></i>
                                </span>
                                <span class="edit btn btn-xs btn-info"> 
                                  <i class="ace-icon fa fa-pencil bigger-120"></i> 
                               </span>
                                <span class="voucher btn btn-xs btn-default"> 
                                  <i class="ace-icon fa fa-print"></i>
                                </span>
                                <span class="delete btn btn-xs btn-danger"> 
                                  <i class="ace-icon fa fa-times"></i>
                                </span>
                              </td>
                          </tr>
                      <?php 
                      $i++;
                      }
                  }
                  ?>                      
                </tbody>
              </table>
              </div>
            </div>
            <!-- end col-lg-12 -->

        </div>
          <!-- end wrapper -->  
      </div>
        <!-- end of panel -->
        </div></div>
        <!-- end wrapper -->
    </div>
</body>

<script type="text/javascript">
  $(document).ready(function() {
    var t, id, url;
    $('body').on('click', 'span.delete', function(event) {
      t = $(this)
      id = t.parents("tr").data('id')
      t.parents("tr").css({'color':'rgb(237, 122, 122)'})
      if (confirm("Are you sure you want to delete this row?")) {
        $.ajax({
          url: BASE_URL+"loans/delete",
          type: "POST",
          dataType: "JSON",
          data: {ids:id},
          success: function(resp) {
            console.log(resp)
            if (resp.success) {
              t.parents('tr').remove()
              $.notify(resp.message, "success")
            } else {
              $.notify(resp.message, "error")
            }
          },
          error: function(resp) {
            console.log(resp.responseText)
          }
        })
      } else {
        t.parents("tr").removeAttr('style')
      }
    })
    $('body').on('click', 'span.view', function() {
      t = $(this)
      id = t.parents("tr").data('id')
      window.location.href = BASE_URL+"loans/view_loan/"+id;
    })
    $('body').on('click', 'span.schedule', function() {
      t = $(this)
      id = t.parents("tr").data('id')
      window.location.href = BASE_URL+"loans/schedule/"+id;
    })
    $('body').on('click', 'span.voucher', function() {
      t = $(this)
      id = t.parents("tr").data('id')
      window.location.href = BASE_URL+"loans/loan_voucher/"+id;
    })
  })
</script>

</html>