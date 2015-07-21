 
<!-- navbar side -->
<nav class="navbar-default navbar-static-side" role="navigation">
    <!-- sidebar-collapse -->
    <div class="sidebar-collapse">
        <!-- side-menu -->
        <ul class="nav" id="side-menu">
            <li>
                <!-- user image section-->
                <div class="user-section">
                    <div class="user-section-inner">
                        <?php echo img('assets/images/user.jpg'); ?>
                    </div>
                    <div class="user-info">
                        <div><strong>
                                <?php
                                echo $this->session->userdata('use_type');
                                ?> 
                            </strong></div>
                        <div class="user-text-online">
                        </div>
                    </div>
                </div>
                <!--end user image section-->
            </li>
            <!--<li class="sidebar-search">-->
            <!-- search section-->
            <!-- <div class="input-group custom-search-form">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div> -->
            <!--end search section-->
            <!--</li>-->
            <?php
            if ($this->session->userdata('use_type') == 'admin') {
                ?>  
                <!-- Start of User  -->
                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i>User Management<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <?php echo anchor('admin/records', 'Records user'); ?>
                        </li>
                        <li>
                            <?php echo anchor('admin/adduser', 'Add user'); ?>
                        </li>
                    </ul>

                </li>
                <!-- End of Staff -->

                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i>Loan Management<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <?php echo anchor('loan/records', 'Records Loan'); ?>
                        </li>
                        <li>
                            <?php echo anchor('loan/addLoan', 'Add Loan');//echo "<a href=''>Add Staffs</a>"; ?>
                        </li>
                    </ul>
                    <!-- second-level-items -->
                </li>
                <?php
                /* HR User Menu */
            }?>
                <!-- End of Attendent -->
            
        </ul>
        <!-- end side-menu -->
    </div>
    <!-- end sidebar-collapse -->
</nav>
<!-- end navbar side -->