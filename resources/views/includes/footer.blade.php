<section class="w3l-footer-29-main">
    <div class="footer-29 py-5">
      <div class="container py-lg-4">
        <div class="row footer-top-29">
          <div class="col-lg-4 col-md-6 col-sm-8 footer-list-29 footer-1">
            <h6 class="footer-title-29">Contact Us</h6>
            <ul>
              <?php

/* $ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) { */

?>
              <li>
                <span class="fa fa-map-marker"></span> <p>Bhubaneswar<?php  //echo $row['PageDescription'];?>.</p>
              </li>
              <li><span class="fa fa-phone"></span><a href="tel:+7-800-999-800"> +91-800-999-800<?php  //echo $row['MobileNumber'];?></a></li>
              <li><span class="fa fa-envelope-open-o"></span><a href="mailto:parlour@mail.com" class="mail">
                  <?php  //echo $row['Email'];?> admin@gmail.com </a></li><?php //} ?>
            </ul>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-4 footer-list-29 footer-2 ">
  
            <ul>
              <h6 class="footer-title-29">Useful Links</h6>
              <li><a href="index.php">Home</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="services.php"> Services</a></li>
              <li><a href="contact.php">Contact us</a></li>
            </ul>
          </div>
         
          <div class="col-lg-4 col-md-6 col-sm-7 footer-list-29 footer-4">
            <?php
/* 
$ret=mysqli_query($con,"select * from tblpage where PageType='aboutus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) { */

?>
            <h6 class="footer-title-29"><?php // echo $row['PageTitle'];?> </h6>
            <p><?php // echo $row['PageDescription'];?></p><?php //} ?>
  
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="w3l-footer-29-main w3l-copyright">
    <div class="container">
      <div class="row bottom-copies">
        <p class="col-lg-8 copy-footer-29">© <?php echo date("Y"); ?> Beauty Parlour Management System </p>
  
        <div class="col-lg-4 main-social-footer-29">
          <a href="#facebook" class="facebook"><span class="fa fa-facebook"></span></a>
          <a href="#twitter" class="twitter"><span class="fa fa-twitter"></span></a>
          <a href="#instagram" class="instagram"><span class="fa fa-instagram"></span></a>
          <a href="#linkedin" class="linkedin"><span class="fa fa-linkedin"></span></a>
        </div>
  
      </div>
    </div>
    
    <!-- BOOTSTRAP CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> 
    <!-- JQUERY CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- select2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- datepicker CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <!-- validation local CND -->
    <script src="{{ asset('public/js/validator.js') }}"></script>
    <script src="{{ asset('public/js/validatorchklist.js') }}"></script>
    <!-- Datatable -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
        $('#dataTable').DataTable({
            "lengthMenu": [ [ 10, 20, 30, -1], [ 10, 20, 30, "All"] ],
            });
        });
    </script>
    <!-- select2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('public/js/sweetAlert.js') }}"></script>
    <!-- Box navbar dynamic -->

    <!-- <script src="assets/js/jquery-3.3.1.min.js"></script> Common jquery plugin -->
    <!--bootstrap working-->
    <script src="<?php echo PUBLIC_PATH ?>js/bootstrap.min.js"></script>
    <!-- //bootstrap working-->
    <!-- disable body scroll which navbar is in active -->
    <script>
    $(function () {
      $('.navbar-toggler').click(function () {
        $('body').toggleClass('noscroll');
      })
    });
    </script>
    <!-- disable body scroll which navbar is in active -->
    <script src="<?php echo PUBLIC_PATH ?>js/classie.js"></script>

  </section>