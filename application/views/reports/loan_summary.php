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
                <h1 class="page-header">View Loan</h1>
            </div>
             <!-- end  page header -->
        </div>

        <div class="col-md-offset-5">                   
            <div>
                <?php foreach ($summary_data as $name => $value) {
                    ?>
                        <!-- small box -->
                        <div class="infobox-blue infobox-dark col-md-3 text-center">
                            <div class="inner">
                                <h5><?php echo REPORTS_LOAN_COUNT; ?></h5>
                                <h3>
                                    <strong><?php echo $value; ?></strong>
                                </h3>
                            </div>
                        </div>     
                <?php } ?>
            </div>
        </div>  

        <div class="col-md-12">
            <div class="dd-handle">
                <b><?php echo $subtitle ?></b>
            </div>
            <div class="widget-content nopadding">
                <div class="table-responsive">
                    <table class="tablesorter table table-bordered  table-hover" id="sortable_table">
                        <thead>
                            <tr>
                                <?php foreach ($headers as $header) { ?>
                                    <th align="<?php echo $header['align']; ?>"><?php echo $header['data']; ?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <!--table for summary_s-->
                        <tbody>
                            <?php foreach ($data as $row) { ?>
                                <tr>
                                    <?php foreach ($row as $cell) { ?>
                                        <td align="<?php echo $cell['align']; ?>"><?php echo $cell['data']; ?></td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <div class="row col-md-12">
            <div class="col-lg-12 loan-contain">
              <div class="row">
                <div class="col-md-12 center" style="text-align: center;">

                <ul class="stat-boxes">
                    <li class="popover-visits">
                        <div class="left peity_bar_good">
                            <h5><?php echo "Sales"; ?></h5>
                        </div>
                        <div class="right">
                            <strong><?php echo "total sum";//$details_data['sales_total']; ?></strong>
                        </div>
                    </li>
                    
                    <!-- <li class="popover-visits">
                        <div class="left peity_bar_good">
                            <h5><?php echo "Return"; ?></h5>
                        </div>
                        <div class="right">
                            <strong><?php echo to_currency($details_data['returns_total']); ?></strong>
                        </div>
                    </li> -->
                    

                    
                    <!-- <li class="popover-visits">
                        <div class="left peity_bar_good">
                            <h5><?php echo lang('reports_taxes'); ?></h5>
                        </div>
                        <div class="right">
                            <strong><?php echo to_currency($details_data['taxes_total']); ?></strong>
                        </div>
                    </li> -->

                    <!-- <li class="popover-visits">
                        <div class="left peity_bar_good">
                            <h5><?php echo lang('reports_total'); ?></h5>
                        </div>
                        <div class="right">
                            <strong><?php echo to_currency($details_data['total']); ?></strong>
                        </div>
                    </li> -->
                    
                    <?php
                    // if($this->Employee->has_module_action_permission('reports','show_profit',$this->Employee->get_logged_in_employee_info()->person_id))
                    // {
                    ?>
                    <!-- <li class="popover-visits">
                        <div class="left peity_bar_good">
                            <h5><?php echo "Profit"; ?></h5>
                        </div>
                        <div class="right">
                            <strong><?php echo to_currency($details_data['profit']); ?></strong>
                        </div>
                    </li> -->
                    <?php //} ?>
                    </ul>
                </div>
                <!-- <br /> -->
            </div>
            <div class="row">
                <div class="form-group pull-right">
                    <div class="col-md-12 col-xs-10"> <!-- col-xs-offset-2: for to left-->
                        <input type="hidden" name="loan_id" value="<?php echo $loan_id; ?>" />
                        <button class="btn btn-default btnExit">Exit</button>
                    </div>
                </div>
            </div>
            <div class="row footer">&nbsp;</div>
            </div>
            <!-- end col-lg-12 -->

        </div>
          <!-- end wrapper -->  
      </div>
        <!-- end wrapper -->
    </div>
</body>

</html>