@extends('layouts.console') 
@section('innercontent')
<?php //echo'<pre>';print_R(  );exit; ?> 
@include('includes.header')
<!-- breadcrumbs -->
<section class="w3l-inner-banner-main">
    <div class="about-inner contact ">
        <div class="container">   
            <div class="main-titles-head text-center">
            <h3 class="header-name ">
                
 Login Page
            </h3>
        </div>
</div>
</div>
<div class="breadcrumbs-sub">
<div class="container">   
<ul class="breadcrumbs-custom-path">
    <li class="right-side propClone"><a href="index.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a> <p></li>
    <li class="active ">
        Login</li>
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
                    <form method="post" name="loginFrm" id="loginFrm">
                        @csrf
                        <div>
                            <input type="text" class="form-control" name="emailcont" id="emailcont"  placeholder="Registered Email or Contact Number">
                            <span style="color: red;" class="errMsg_emailcont errDiv"></span> 
                        </div>
                        <div style="padding-top: 30px;">
                          <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password"> 
                          <span style="color: red;" class="errMsg_password errDiv"></span>
                        </div> 
                        <div class="twice-two" style="padding-top: 30px;">
                          <a class="link--gray" style="color: blue;" href="<?php echo LOGIN_URL . 'forgetPassword' ?>">Forgot Password?</a> 
                        </div>

                        <button type="submit" class="btn btn-contact" onclick="return validator();"> Login </button>
                    </form>
                </div>
        </div>
   
    </div>
</div>
<script>
    function validator() {
        $('.errDiv').hide();
        $('.error-input').removeClass('error-input');
        if (!blankCheck('emailcont', 'Email ID can not be left blank'))
        return false;
        if (!blankCheck('password', 'Password can not be left blank'))
        return false;  
        $('#loginFrm').submit(); 
    }

    $(document).ready(function () { 
        var csrfToken = '{{ csrf_token() }}'; 
        commonPage(csrfToken);
    });
</script>
<script src="<?php echo PUBLIC_PATH ?>js/commonAjax.js"></script>
</section>
@endsection