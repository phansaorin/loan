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
        <div class="row">
            <div class="col-lg-12 loan-contain">
                <div class="row">
                    <div>Print div content</div>
                    <div id="divPrint" style="height:500px ; width:600px">
                       Name: Dilip Singh<br />
                       Address: Delhi<br />
                       Roll Id: DL1100
                       </div> 
                       <button onclick="printDiv('divPrint')">Print</button>
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

<script type="text/javascript">
       function printDiv(divId) {
           var printContents = document.getElementById(divId).innerHTML;
           var originalContents = document.body.innerHTML;
           document.body.innerHTML = "<html><head><title></title></head><body>" + printContents + "</body>";
           window.print();
           document.body.innerHTML = originalContents;
       }
 
  $(document).ready(function() {
    
  })
</script>

</html>