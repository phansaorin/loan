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

            
            <div class="row">
                 <!--  page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Loan List</h1>
                </div>
                 <!-- end  page header -->
            </div>      
            <div class="row">
                <div class="col-lg-12 loan-contain">
                  <div class="col-lg-12 filterable">
                    <table class="table">
                      <thead>
                          <tr class="filters">
                              <th><input type="text" class="form-control" placeholder="#" disabled></th>
                              <th><input type="text" class="form-control" placeholder="Maturity Date" disabled></th>
                              <th><input type="text" class="form-control" placeholder="Loan Account" disabled></th>
                              <!-- <th><input type="text" class="form-control" placeholder="Principle" disabled></th> -->
                              <th><input type="text" class="form-control" placeholder="Duration" disabled></th>
                              <th><input type="text" class="form-control" placeholder="Loan Amount" disabled></th>
                              <th><input type="text" class="form-control" placeholder="First Repayment" disabled></th>
                              <th><input type="text" class="form-control" placeholder="Rate" disabled></th>
                              <th><input type="text" class="form-control" placeholder="Installment Amount" disabled></th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php 
                      if (count($lists) > 0) {
                          $i = 1;
                          foreach ($lists->result() as $rows) {
                           ?>
                              <tr>
                                  <td><?php echo $i; ?></td>
                                  <td><?php echo date('Y-m-d', strtotime($rows->maturity_date)); ?></td>
                                  <td><?php echo $rows->loan_account; ?></td>
                                  <td><?php echo $rows->duration_loan.' '.$rows->duration_loan_type; ?></td>
                                  <td><?php echo $rows->loan_amount; ?></td>
                                  <td><?php echo date('Y-m-d', strtotime($rows->first_repayment)); ?></td>
                                  <td><?php echo round($rows->interest_rate, 2); ?></td>
                                  <td><?php echo $rows->installment_amount; ?></td>
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
        <!-- end wrapper -->
   </div>
</body>

</html>