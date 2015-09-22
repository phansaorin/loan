 
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
            // if ($this->session->userdata('use_type') == 'admin') {
                ?>  
                <li>
                    <a href="#"><i class="fa fa-table fa-fw"></i>Loan Management<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <?php echo anchor('loans', 'Records Loan'); ?>
                        </li>
                    </ul>
                    <!-- second-level-items -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-file fa-fw"></i>Report Management<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <?php echo anchor('reports/summary_loan', 'Reports'); ?>
                        </li>
                    </ul>
                    <!-- second-level-items -->
                </li>
                <?php
                /* HR User Menu */
            // }?>
                <!-- End of Attendent -->
            
        </ul>
        <!-- end side-menu -->
    </div>
    <!-- end sidebar-collapse -->
</nav>
<!-- end navbar side -->