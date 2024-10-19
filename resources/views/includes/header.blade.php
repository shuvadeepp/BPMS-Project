<?php //echo'<pre>';print_r(session('User_Session_Data'));exit; ?>

<section class=" w3l-header-4 header-sticky">
    <header class="absolute-top">
        <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <h1><a class="navbar-brand" href="index.php"> <!--<span class="fa fa-line-chart" aria-hidden="true"></span> -->
            BPMS
            </a></h1>
            <button class="navbar-toggler bg-gradient collapsed" type="button" data-toggle="collapse"
                data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="fa icon-expand fa-bars"></span>
        <span class="fa icon-close fa-times"></span>
            </button>
      
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo WEBSITE_URL ?>index"> Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo WEBSITE_URL ?>about">About</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo WEBSITE_URL ?>services">Services</a>
                    </li> 

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo WEBSITE_URL ?>contact">Contact</a>
                    </li>
                     
                    <?php if(!empty(session('User_Session_Data.ID')) && session('User_Session_Data.ID') > 0 && !empty(session('User_Session_Data.UserRegType')) > 2) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ADMIN_URL ?>adminLogin">Admin</a>
                        </li>
                    <?php } ?>
                    <?php if(empty(session('User_Session_Data.ID'))) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo ADMIN_URL ?>">Admin</a>
                        </li>
                    <?php } ?> 
                    <?php if(!empty(session('User_Session_Data.ID')) && session('User_Session_Data.ID') > 0) { ?>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="<?php echo LOGIN_URL ?>logout">Logout</a>
                        </li>   -->
                    <?php } else { ?>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo LOGIN_URL ?>signup">Signup</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo LOGIN_URL ?>login">Login</a>
                        </li> 
                    <?php } ?>
                    <?php //if (strlen($_SESSION['bpmsuid']>0)) {?>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="book-appointment.php">Book Salon</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="booking-history.php">Booking History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="invoice-history.php">Invoice History</a>
                    </li>
                                        <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                                        <li class="nav-item">
                        <a class="nav-link" href="change-password.php">Setting</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li> -->
                  <?php //} ?>
                </ul>
                <!-- <p style="color: whitesmoke; cursor: pointer;"><b>
                    <?php //echo (!empty(session('User_Session_Data.ID')) && session('User_Session_Data.ID') > 0) ? '<span style="padding: 12px;"><i class="bi bi-person-circle"></span></i>' . session('User_Session_Data.FirstName') . ' ' . session('User_Session_Data.LastName') : ''; ?>
                </b></p>  -->
                <!-- ::::: Dropdown helped By - Anurag Pradhan Dt-03-02-2024 ::::: -->
                <div class="dropdown">
                    <p class="dropbtn" style="color: whitesmoke; cursor: pointer;"><?php echo (!empty(session('User_Session_Data.ID')) && session('User_Session_Data.ID') > 0) ? '<span style="padding: 12px;"><i class="bi bi-person-circle"></span></i>' . session('User_Session_Data.FirstName') . ' ' . session('User_Session_Data.LastName') .' &#9662;' : ''; ?> </p>
                    <div class="dropdown-content">
                        <a class="dropdown-item" href="<?php echo WEBSITE_URL . 'profile' ?>"> Profile </a>  
                        <a class="dropdown-item" href="<?php echo WEBSITE_URL . 'settings'?>"> Setting </a>
                        <a class="dropdown-item" href="<?php echo LOGIN_URL ?>logout"> Logout </a>  
                    </div>
                </div>
                <!-- End -->
            </div>
        </div>

        </nav>
    </div>
      </header>
</section>
