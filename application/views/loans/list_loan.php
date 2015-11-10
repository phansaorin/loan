<?php $this->load->view("partial/header_top"); ?>
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
                <?php echo anchor('loans/create', 'New', 'class="btn btn-xs btn-success"'); ?>
                <?php echo anchor('loans/approval', 'To Approve', 'class="btn btn-xs btn-primary"'); ?>
              </div>
            </div>
        </div>      
        <div class="row">
            <div class="col-xs-12 loan-contain">
              <div class="col-xs-12 filterable table-responsive">
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
                        <th>Status</th>
                        <th>Approved?</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php 
                  if (count($lists) > 0) {
                      $i = 1;
                      foreach ($lists->result() as $rows) {
                        // Status of loan
                        $disabled_approve = 'disabled';
                        $is_proccesing = "is_proccesing";
                        if (is_null($rows->status)) {
                          $disabled_approve = '';
                          $is_proccesing = "";
                        }
                        // Account status approval
                        $account_status = false;
                        $disabled = 'disabled';
                        if ($rows->account_status == "approved") {
                          $account_status = true;
                          $disabled = "";
                        }
                       ?>
                          <tr data-id="<?php echo $rows->id; ?>">
                              <td>
                                <?php echo $i;//form_hidden('ids[]', $rows->id); ?>
                              </td>
                              <td><?php echo date('d-M-Y', strtotime($rows->maturity_date)); ?></td>
                              <td><?php echo $rows->loan_account; ?></td>
                              <td><?php echo $rows->duration_loan.' '.$rows->duration_loan_type; ?></td>
                              <td><?php echo $rows->loan_amount; ?></td>
                              <td><?php echo date('d-M-Y', strtotime($rows->first_repayment)); ?></td>
                              <td><?php echo round($rows->interest_rate, 2); ?></td>
                              <td><?php echo $rows->installment_amount; ?></td>
                              <td><?php echo form_dropdown('status', $status, $rows->status, 'class="form-control status" '.$disabled ); ?></td>
                              <td>
                              <?php 
                              if ($account_status) { ?>
                                <span class="disapprove btn btn-xs btn-danger <?php echo $is_proccesing; ?>" <?php echo $disabled_approve; ?>> 
                                  <i class="ace-icon fa fa-times"></i>
                                </span>
                              <?php
                              } else { ?>
                                <span class="approve btn btn-xs btn-success">
                                  <i class="ace-icon fa fa-check-circle bigger-120"></i>
                                </span>
                              <?php
                              } ?>
                              </td>
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
                               <span class="voucher-print btn btn-xs btn-default"> 
                                  <i class="ace-icon fa fa-print"></i>
                                </span>
                                <span class="delete btn btn-xs btn-danger"> 
                                  <i class="ace-icon fa fa-trash-o"></i>
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
              <div class="col-xs-12 text-center">
                <?php echo $pagination; ?>
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
    var t, id, url, sel_val;
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
    $('body').on('click', 'span.edit', function() {
      t = $(this)
      id = t.parents("tr").data('id')
      window.location.href = BASE_URL+"loans/create/"+id;
    })
    $('body').on('click', 'span.voucher-print', function() {
      t = $(this)
      id = t.parents("tr").data('id')
      window.location.href = BASE_URL+"loans/voucher_print/"+id;
    })
    $('body').on('click', 'span.approve', function() {
      t = $(this)
      id = t.parents("tr").data("id")
      if (confirm("Are you sure, you want to approve this account?")) {
        $.post(BASE_URL+"loans/approve_loan/"+id, function(resp) {
          t.parents("tr").find('select[name="status"]').removeAttr("disabled")
          t.removeClass("approve btn-success").addClass("disapprove btn-danger").find("i.ace-icon").removeClass('fa-check-circle').addClass("fa-times")
          $.notify(resp.message, resp.type)
        }, 'json');
      };
    })
    $('body').on('click', 'span.disapprove', function() {
      t = $(this)
      id = t.parents("tr").data("id")
      if (t.hasClass("is_proccesing")) {
        $.notify("You cannot disapprove on loan account which is proccesing", "warning")
        return false
      };
      if (confirm("Are you sure, you want to disapprove this account?")) {
        $.post(BASE_URL+"loans/disapprove_loan/"+id, function(resp) {
          t.parents("tr").find('select[name="status"]').prop("disabled", true)
          t.removeClass("disapprove btn-danger").addClass("approve btn-success").find("i.ace-icon").removeClass('fa-times').addClass("fa-check-circle")
          $.notify(resp.message, resp.type)
        }, 'json');
      }
    })
    $('body').on('change', 'select.status', function() {
      t = $(this)
      id = t.parents("tr").data('id')
      sel_val = t.val()
      if (confirm("Are you sure, you want to change the status?")) {
        $.post(BASE_URL+"loans/update_status/"+id, {status: sel_val}, function(resp) {
          if (sel_val.trim() != "") {
            t.parents("tr").find('span.disapprove').addClass("is_proccesing").attr("disabled", true)
          } else {
            t.parents("tr").find('span.disapprove').removeClass("is_proccesing").removeAttr("disabled")
          }
          $.notify(resp.message, resp.type)
        }, 'json')
        .fail(function(resp) {
          // console.log(resp.responseText)
        });
      }
    })
  })
</script>

</html>