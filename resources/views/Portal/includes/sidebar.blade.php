<div class=" sidebar" role="navigation">
   <div class="navbar-collapse">
      <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
         <ul class="nav" id="side-menu">
            <li>
               <a href="<?php echo ADMIN_MANAGEAPP; ?>"><i class="fa fa-home nav_icon"></i>Dashboard</a>
            </li>
            <li>
              <a href="<?php echo ADMIN_MANAGEAPP . 'addServices'; ?>">
                <i class="fa fa-cogs nav_icon"></i>Services<span class="fa arrow"></span> 
              </a>
               <ul class="nav nav-second-level collapse">
                  <li>
                     <a href="<?php echo ADMIN_MANAGEAPP . 'addServices'; ?>">Add Services</a>
                  </li>
                  <li>
                     <a href="<?php echo ADMIN_MANAGEAPP . 'viewServices'; ?>">Manage Services</a>
                  </li>
               </ul>
               <!-- /nav-second-level -->
            </li>
            <li class="">
               <a href="<?php echo ADMIN_MANAGEAPP . 'aboutUs'; ?>"><i class="fa fa-book nav_icon"></i>Pages <span class="fa arrow"></span></a>
               <ul class="nav nav-second-level collapse">
                  <li>
                     <a href="<?php echo ADMIN_MANAGEAPP . 'aboutUs'; ?>">About Us</a>
                  </li>
                  <li>
                     <a href="<?php echo ADMIN_MANAGEAPP . 'contactUs'; ?>">Contact Us</a>
                  </li>
               </ul>
               <!-- /nav-second-level -->
            </li>
            <li>
               <a href="<?php echo ADMIN_MANAGEAPP . 'allAppointments'; ?>"><i class="fa fa-check-square-o nav_icon"></i>Appointment<span class="fa arrow"></span></a>
               <ul class="nav nav-second-level collapse">
                  <li>
                     <a href="<?php echo ADMIN_MANAGEAPP . 'allAppointments'; ?>">All Appointment</a>
                  </li> 
               </ul>
               <!-- //nav-second-level -->
            </li>
            <li>
               <a href="<?php echo ADMIN_MANAGEAPP . 'unreadEnquiry'; ?>"><i class="fa fa-check-square-o nav_icon"></i>Contact Us Message<span class="fa arrow"></span></a>
               <ul class="nav nav-second-level collapse">
                  <!-- <li><a href="">Read Enquiry</a></li> -->
                  <li><a href="<?php echo ADMIN_MANAGEAPP . 'unreadEnquiry'; ?>">Unread Enquiry</a></li>
               </ul>
               <!-- //nav-second-level -->
            </li> 
            <li>
               <a href="<?php echo ADMIN_MANAGEAPP . 'approvedList'; ?>"><i class="fa fa-check-square-o nav_icon"></i>Approved List<span class="fa arrow"></span></a>
               <ul class="nav nav-second-level collapse">
                  <li>
                     <a href="<?php echo ADMIN_MANAGEAPP . 'approvedList'; ?>">Approved List</a>
                  </li> 
                  <li>
                     <a href="<?php echo ADMIN_MANAGEAPP . 'approvedPrint'; ?>">Print Invoice</a>
                  </li> 
               </ul>
               <!-- //nav-second-level -->
            </li>
            <!-- <li>
               <a href="#"><i class="fa fa-check-square-o nav_icon"></i>Reports<span class="fa arrow"></span></a>
               <ul class="nav nav-second-level collapse">
                  <li><a href="bwdates-reports-ds.php"> B/w dates</a></li>
                  <li><a href="sales-reports.php">Sales Reports</a></li>
               </ul> -->
               <!-- //nav-second-level 
             </li> -->
            <!-- <li>
               <a href="invoices.php" class="chart-nav"><i class="fa fa-file-text-o nav_icon"></i>Invoices</a>
            </li> -->
            <p style="text-align: center; color: black;">-- Under progress --</p><br>
            <li>
               <a href="search-appointment.php" class="chart-nav"><i class="fa fa-search nav_icon"></i>Search Appointment</a>
            </li>
            <li>
               <a href="search-invoices.php" class="chart-nav"><i class="fa fa-search nav_icon"></i>Search Invoice</a>
            </li> 
         </ul>
         <div class="clearfix"> </div>
         <!-- //sidebar-collapse -->
      </nav>
   </div>
</div>