@extends('layouts.console') 
@section('innercontent')
<?php // echo'<pre>';print_R( $aboutQuery );exit; ?> 
@include('includes.header')
<!-- breadcrumbs -->
<section class="w3l-inner-banner-main">
    <div class="about-inner contact ">
        <div class="container">   
            <div class="main-titles-head text-center">
            <h3 class="header-name ">
                
 Forgot Password
            </h3>
            <p class="tiltle-para ">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic fuga sit illo modi aut aspernatur tempore laboriosam saepe dolores eveniet.</p>
        </div>
</div>
</div>
<div class="breadcrumbs-sub">
<div class="container">   
<ul class="breadcrumbs-custom-path">
    <li class="right-side propClone"><a href="index.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a> <p></li>
    <li class="active ">
        Forgot Password</li>
</ul>
</div>
</div>
    </div>
</section>
<!-- breadcrumbs //-->
<section class="w3l-contact-info-main" id="contact">
    <div class="contact-sec	">
        <div class="container">

            <div class="d-grid contact-view">
                <div class="cont-details"> 
                    <div class="cont-top">
                        <div class="cont-left text-center">
                            <span class="fa fa-phone text-primary"></span>
                        </div>
                        <div class="cont-right">
                            <h6>Call Us</h6>
                            <p class="para"><a href="tel:+44 99 555 42">+<?php // echo $row['MobileNumber'];?></a></p>
                        </div>
                    </div>
                    <div class="cont-top margin-up">
                        <div class="cont-left text-center">
                            <span class="fa fa-envelope-o text-primary"></span>
                        </div>
                        <div class="cont-right">
                            <h6>Email Us</h6>
                            <p class="para"><a href="mailto:example@mail.com" class="mail"><?php  //echo $row['Email'];?></a></p>
                        </div>
                    </div>
                    <div class="cont-top margin-up">
                        <div class="cont-left text-center">
                            <span class="fa fa-map-marker text-primary"></span>
                        </div>
                        <div class="cont-right">
                            <h6>Address</h6>
                            <p class="para"> <?php // echo $row['PageDescription'];?></p>
                        </div>
                    </div>
                    <div class="cont-top margin-up">
                        <div class="cont-left text-center">
                            <span class="fa fa-map-marker text-primary"></span>
                        </div>
                        <div class="cont-right">
                            <h6>Time</h6>
                            <p class="para"> <?php // echo $row['Timing'];?></p>
                        </div>
                    </div>
                  </div>
                <div class="map-content-9 mt-lg-0 mt-4">
                    <!-- ::::: SERVER SIDE VALIDATION MESSAGE ::::: --> 
                    @if(session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                <!-- ::::: SERVER SIDE VALIDATION MESSAGE ::::: -->
                    <h3 style="padding-bottom: 10px;">Reset your password and Fill below details</h3>
                    <form method="post" id="update-form">
                        @csrf
                        <div>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter Your Email" required="true">
                            <span style="color: red;" class="errMsg_email errDiv"></span>
                        </div>
                        <div style="padding-top: 30px;">
                          <input type="text" class="form-control" name="contactno" id="contactno" placeholder="Contact Number" required="true" maxlength="10" pattern="[0-9]+">
                          <span style="color: red;" class="errMsg_contactno errDiv"></span>
                        </div>
                        <div style="padding-top: 30px;">
                          <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="New Password">
                          <span style="color: red;" class="errMsg_newpassword errDiv"></span>
                        </div>
                        <div style="padding-top: 30px;">
                           <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password">
                           <span style="color: red;" class="errMsg_confirmpassword errDiv"></span>
                        </div>
                        <div class="twice-two" style="padding-top: 30px;">
                          <a class="link--gray" style="color: blue;" href="<?php echo LOGIN_URL . 'login' ?>">signin</a>
                        
                        </div>
                        <button type="submit" class="btn btn-contact" onclick="return validator();">Update Password</button>
                    </form>
                </div>
            </div>
         </div>
      </div>
    <script>
        function validator() {
            $('.errDiv').hide();
            $('.error-input').removeClass('error-input');
            if (!blankCheck('email', 'Email ID can not be left blank'))
            return false;
            if (!blankCheck('contactno', 'Contact Number can not be left blank'))
            return false;
            if (!blankCheck('newpassword', 'New password can not be left blank'))
            return false;
            if (!blankCheck('confirmpassword', 'Confirm password can not be left blank'))
            return false;

            if (!matchpassword('newpassword', 'confirmpassword'))
            return false;
            $('#update-form').submit();

        }
    </script>
</section>
@endsection