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

                <div class="row">
                     <!--  page header -->
                    <div class="col-lg-12">
                    <h1 class="page-header">Open loan account</h1>
                    </div>
                     <!-- end  page header -->
                </div>
                        <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-body">
                         <?php echo form_open('loans/save/'.$loan_id, "id = 'form_id'"); ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <h4>Customer Information</h4>
                                <div class="form-group">
                                    <label>CID</label>
                                    <input class="form-control" name="search_id_name" id="search_id_name" placeholder="search name,id" value="<?php echo $customer_info->CID; ?>" />
                                </div>
                                <div class="form-group">
                                    <label>Display Name: <span id="displayName"><?php echo $customer_info->cfne.' '.$customer_info->clne; ?></span></label>
                                </div>
                                <div class="form-group">
                                    <label>Date Of Birth: <span id="dob"><?php echo $dob = $customer_info->date_of_birth != "" ? date('d-M-Y', strtotime($customer_info->date_of_birth)) : ""; ?></span> <span id="gender"><?php echo ucfirst($customer_info->gender); ?></span></label>
                                </div>
                                <div class="form-group">
                                    <label>Address: <span id="address"><?php echo $customer_info->khan_district.', '.$customer_info->sangkat_commune.', '.$customer_info->village.', '.$customer_info->province; ?></span></label>
                                </div>
                            </div>         
                      
                            <!-- The end of col 6 -->
                            <div class="col-lg-6">
                                <h4>Loan Space</h4>
                                <div class="form-group">
                                    <label>Owner Typer <span class="note_start">*</span></label>
                                    <?php 
                                    $owner_types = array(
                                        ''=>'--Please select --', 
                                        'Single'=>'Single', 
                                        'Group'=>'Group'
                                    );
                                    echo form_dropdown('ownership_type', $owner_types, $loan_info->ownership_type, 'class="form-control important" id="ownership_type"');
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Loan Duration <span class="note_start">*</span></label>
                                    <input class="form-control important" placeholder="1" name="duration_loan" id="duration_loan" value="<?php echo $loan_info->duration_loan; ?>">
                                    <?php 
                                    $dur_types = array(
                                        ''=>'--Please select --', 
                                        'week'=>'Week(s)', 
                                        'month'=>'Month(s)', 
                                        'year'=>'Year(s)'
                                    );
                                    echo form_dropdown('duration_loan_type', $dur_types, $loan_info->duration_loan_type, 'class="form-control important" id="duration_loan_type"');
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Maturity Date <span class="note_start">*</span></label>
                                    <input class="form-control important date" placeholder="13-08-2015" name="maturity_date" id="maturity_date" value="<?php echo $maturity_date = $loan_info->maturity_date != "" ? date('m/d/Y', strtotime($loan_info->maturity_date)) : date('m/d/Y'); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Currency <span class="note_start">*</span></label>
                                    <?php 
                                    $currency = array(
                                        ''=>'--Please select --',
                                        'KHR'=>'KHR(រ)', 
                                        'Dolla'=>'Dolla ($)'
                                    );
                                    echo form_dropdown('currency', $currency, $loan_info->currency, 'class="form-control important" id="currency"');
                                    ?>
                                </div>
                                 <div class="form-group">
                                    <label>Payment Freg <span class="note_start">*</span></label>
                                    <?php 
                                    $repayment_freg = array(
                                        ''=>'--Please select --',
                                        'weekly'=>'Weekly', 
                                        'monthly'=>'Monthly'
                                    );
                                    echo form_dropdown('repayment_freg', $repayment_freg, $loan_info->repayment_freg, 'class="form-control important" id="repayment_freg"');
                                    ?>
                                </div>
                                 <div class="form-group">
                                    <label>Loan Amount <span class="note_start">*</span></label>
                                    <input class="form-control important" name="loan_amount" id="loan_amount" placeholder="4000" value="<?php echo $loan_info->loan_amount; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Amount In Word <span class="note_start">*</span></label>
                                    <input class="form-control important" placeholder="sixty dolla" name="loan_amount_in_word" id="loan_amount_in_word" value="<?php echo $loan_info->loan_amount_in_word; ?>">
                                </div>
                                <div class="form-group">
                                    <label>First Payment <span class="note_start">*</span></label>
                                    <input class="form-control important date" placeholder="13-08-2015" name="first_repayment" id="first_repayment" value="<?php echo $first_repayment = $loan_info->first_repayment != "" ? date('m/d/Y', strtotime($loan_info->first_repayment)) : date('m/d/Y'); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Repayment Type <span class="note_start">*</span></label>
                                    <?php 
                                    $repayment_type = array(
                                        ''=>'--Please select --',
                                        'Anuilty'=>'Anuilty'
                                    );
                                    echo form_dropdown('repayment_type', $repayment_type, $loan_info->repayment_type, 'class="form-control important" id="repayment_type"');
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6" style="margin-top:-188px;">
                                <h4>Installment</h4>
                                <div class="form-group">
                                    <label>Num Installment <span class="note_start">*</span></label>
                                    <input class="form-control important" name="renew_installment" id="renew_installment" placeholder="23" value="<?php echo $loan_info->renew_installment; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Interst Rate <span class="note_start">*</span></label>
                                    <input class="form-control important" placeholder="0.5" name="interest_rate" id="interest_rate" value="<?php echo number_format((float)$loan_info->interest_rate, 2, '.', ''); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Penalty Rate</label>
                                    <input class="form-control" placeholder="0.5" name="penalty_rate" id="penalty_rate" value="<?php echo number_format((float)$loan_info->penalty_rate, 2, '.', ''); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Installment Ammount <span class="note_start">*</span></label>
                                    <input class="form-control important" placeholder="2" name="installment_amount" id="installment_amount" value="<?php echo $loan_info->installment_amount; ?>">
                                </div>
                                <p style="color:red;">Note: * are require.</p>
                            </div>
                            
                            <div class="col-lg-6">
                                <h4>Project Detail</h4>
                                <div class="form-group">
                                    <label>Product Type</label>
                                    <?php 
                                    echo form_dropdown('product_type', $product_types, $loan_info->product_type_id, 'class="form-control" id="product_type"');
                                    ?>
                                    </div>
                                 <button type="submit" class="btn btn-primary btn_submit pull-right" id="btn_submit">Save</button>
                                 <button class="btn btn-default pull-right btnExit mr5" ><i class="ace-icon fa fa-undo bigger-120"></i> Back</button>
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
   </body>
</body>

<script type="text/javascript">
    $(document).ready(function() {
        $('.date').datepicker({
            // Set option
        });

        $('body').on('click', 'button.btnExit', function(event) {
            event.preventDefault()
            window.location.href = BASE_URL+"loans"
        })

        $('body').on('click', '#btn_submit', function(event) {
            event.preventDefault()
            var data = $(this).parents("form#form_id").serialize()
            var url = $(this).parents("form#form_id").attr('action')
            var isValid = true;  // Set the isValid to flag try initially
            $('.important').each(function() {   // Loop thru all the elements
                var valueInput = $(this).val();
                if(valueInput == "") {  // If not empty do nothing
                    var elem = '<span class="err">This field required</span>'
                    $(this).before(elem);
                    removeSpanError()
                    isValid = false; // If one loop is empty set the isValid flag to false
                }
            });
            if (isValid == false) {
                return false;
            };

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                dataType:'json',
                success: function(resp) {
                    console.log(resp);
                    if (resp.success) {
                        $.notify(resp.message, 'success')
                        window.location.href = BASE_URL + "loans/create/"+resp.loan_id
                    } else {
                        $.notify(resp.message, 'error')
                        return false;
                    }
                },
                error: function(resp) {
                    console.log(resp.responseText);
                }
            });

            return false;
        })
    })

    autoCompleted()

    function autoCompleted() {
        $('input[name="search_id_name"]').autocomplete({
          minLength: 1,
          source: function(req, response){
            $.ajax({
              url: "<?php echo site_url('loans/suggest_customer'); ?>",
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

            $.ajax({
              url: "<?php echo site_url('loans/get_customer_selected'); ?>",
              type: 'POST',
              data: {"id" : ui.item.id},
              dataType: "json",
              success: function(resp){
                if (resp.success) {
                  // window.location.href = BASE_URL + "loans/create"
                  $('input[name="search_id_name"]').val(resp.customer.CID)
                  $('span#displayName').text(resp.customer.cfne+" "+resp.customer.clne)
                  $('span#dob').text(resp.dob)
                  $('span#gender').text(resp.customer.gender)
                  $('span#address').text(resp.customer.khan_district+', '+resp.customer.sangkat_commune+', '+resp.customer.village+', '+resp.customer.province)


                };
              },
              error: function(resp) {
                console.log(resp.responseText)
              }
            });
          }
        });
    }

    function removeSpanError() {
        $('span.err').animate({ fontSize : '15px' }).delay(5000).fadeOut('slow');
    }

</script>

</html>