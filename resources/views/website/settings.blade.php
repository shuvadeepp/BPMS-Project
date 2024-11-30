@extends('layouts.console') 
@section('innercontent')
<?php 
    // echo'<pre>';print_R( $profileQuery );
?> 
@include('includes.header')
<!-- breadcrumbs -->
<section class="w3l-inner-banner-main">
    <div class="about-inner contact ">
        <div class="container">   
            <div class="main-titles-head text-center">
            <h3 class="header-name ">
                
 Change Password
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
        Change Password</li>
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
            <!-- ::::: Common Data binding Ajax ::::: -->
                <div id="commonData"></div>
            <!-- ::::: Common Data binding Ajax ::::: -->
                <div class="map-content-9 mt-lg-0 mt-4">
                <!-- ::::: SERVER SIDE VALIDATION MESSAGE ::::: -->
                    <!-- @if($errors->any())
                        {!! implode('', $errors->all('<div class="alert alert-danger" role="alert">:message</div>')) !!} 
                    @endif -->
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
                    <h3>Password change!!</h3>
                    <form method="post" name="changepassword" id="reset-form" onsubmit="return checkpass();">
                        @csrf
                        <div style="padding-top: 30px;">

                            <label for="currentpassword">Current Password</label> 
                            <input type="password" class="form-control" placeholder="Current Password" id="currentpassword" name="currentpassword" value=""></div>
                            <span style="color: red;" class="errMsg_currentpassword errDiv"></span>
                        <div style="padding-top: 30px;"> 
                            <label for="newpassword">New Password</label> 
                            <input type="password" class="form-control" placeholder="New Password" id="newpassword" name="newpassword" value="">
                            <span style="color: red;" class="errMsg_newpassword errDiv"></span>
                        </div>
                        <div style="padding-top: 30px;">
                           <label for="confirmpassword">Confirm Password</label>
                           <input type="password" class="form-control" placeholder="Confirm Password" id="confirmpassword" name="confirmpassword" value="">
                           <span style="color: red;" class="errMsg_confirmpassword errDiv"></span>

                        <button type="submit" class="btn btn-contact" onclick="return validator();">Save Change<i class="icon-feather-chevrons-right"></i></button>

                        <button type="button" class="btn btn-danger" style="float: right; padding: 13px; margin: 21px 2px 4px 1px;">
                            <a href="<?php echo WEBSITE_URL.'bookAppointment' ?>" style="text-decoration: none; color: white;">
                                Go Back 
                            </a>
                        </button> 

                    </form>
                </div>
            </div> 
        </div>
    </div>
    <script>
    function validator() {
        $('.errDiv').hide();
        $('.error-input').removeClass('error-input');
        if (!blankCheck('currentpassword', 'Current password can not be left blank'))
        return false;
        if (!blankCheck('newpassword', 'New password can not be left blank'))
        return false;
        if (!blankCheck('confirmpassword', 'Confirm password can not be left blank'))
        return false;
        if (!matchpassword('newpassword', 'confirmpassword'))
        return false;
        $('#reset-form').submit();

    }
    $(document).ready(function () { 
        var csrfToken = '{{ csrf_token() }}'; 
        commonPage(csrfToken);
    });
</script>
<script src="<?php echo PUBLIC_PATH ?>js/commonAjax.js"></script>
</section>
@endsection