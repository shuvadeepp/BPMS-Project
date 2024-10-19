@extends('layouts.console') 
@section('innercontent')
<?php //echo'<pre>';print_R(  );exit; ?> 
@include('includes.header')
<!-- breadcrumbs -->
<section class="w3l-inner-banner-main">
    <div class="about-inner contact ">
        <div class="container">   
            <div class="main-titles-head text-center">
            <h3 class="header-name "> Signup </h3>
        </div>
</div>
</div>
<div class="breadcrumbs-sub">
<div class="container">   
<ul class="breadcrumbs-custom-path">
    <li class="right-side propClone"><a href="index.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a> <p></li>
    <li class="active ">
        Signup</li>
</ul>
</div>
</div>
    </div>
</section>
<!-- breadcrumbs //-->
<section class="w3l-contact-info-main" id="contact">
    <div class="contact-sec	">
        <div class="container">

            <div class="d-grid contact-view" >
                <!-- ::::: Common Data binding Ajax ::::: -->
                    <div id="commonData"></div>
                <!-- ::::: Common Data binding Ajax ::::: -->
                <div class="map-content-9 mt-lg-0 mt-4">
                <!-- ::::: SERVER SIDE VALIDATION MESSAGE ::::: -->
                    @if($errors->any())
                        {!! implode('', $errors->all('<div class="alert alert-danger" role="alert">:message</div>')) !!} 
                    @endif
                        @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                <!-- ::::: SERVER SIDE VALIDATION MESSAGE ::::: -->
                    <h3>Register with us!!</h3>
                    <form method="post" name="signup" onsubmit="return checkpass();">
                        @csrf
                        <div> 
                            <input type="hidden" class="form-control" name="hdnRegStatus" id="hdnRegStatus" placeholder="Hidden" value="1"></div>
                           <div style="padding-top: 30px;">  
                        </div>
                        <div style="padding-top: 30px;"> 
                            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name">
                            <span style="color: red;" class="errMsg_firstname errDiv"></span>
                        </div>
                           <div style="padding-top: 30px;"> 
                            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name">
                            <span style="color: red;" class="errMsg_lastname errDiv"></span>
                        </div>
                        <div style="padding-top: 30px;"> 
                           <input type="text" class="form-control" name="mobilenumber" id="mobilenumber" placeholder="Mobile Number" pattern="[0-9]+" maxlength="10">
                           <span style="color: red;" class="errMsg_mobilenumber errDiv"></span>
                        </div>
                           <div style="padding-top: 30px;"> 
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email address">
                            <span style="color: red;" class="errMsg_email errDiv"></span>
                        </div>
                        <div style="padding-top: 30px;"> 
                           <input type="password" class="form-control" name="password" id="password" placeholder="Password" >
                           <span style="color: red;" class="errMsg_password errDiv"></span>
                       </div>
                       <div style="padding-top: 30px;"> 
                            <input type="password" class="form-control" name="repeatpassword" id="repeatpassword" placeholder="Repeat password" >
                            <span style="color: red;" class="errMsg_repeatpassword errDiv"></span>
                        </div>
                      
                        <button type="submit" class="btn btn-contact" onclick="return validator();"> Register Now </button>
                    </form>
                </div>
    </div>
   
    </div>
</div>
<script>
    /* ::::: SIGN UP VALIDATION ::::: */
    function validator () {
        $('.errDiv').hide();
        $('.error-input').removeClass('error-input');
        if (!blankCheck('firstname', 'First Name can not be left blank'))
        return false;
        if (!blankCheck('lastname', 'Last Name can not be left blank'))
        return false;
        if (!blankCheck('mobilenumber', 'Mobile Number can not be left blank'))
        return false;
        if (!blankCheck('email', 'email can not be left blank'))
        return false;
        if (!blankCheck('password', 'password can not be left blank'))
        return false;
        if (!blankCheck('repeatpassword', 'password can not be left blank'))
        return false;
    }
    /* ::::: SIGN UP VALIDATION ::::: */
    $(document).ready(function () { 
        var csrfToken = '{{ csrf_token() }}'; 
        commonPage(csrfToken);
    });
</script>
<script src="<?php echo PUBLIC_PATH ?>js/commonAjax.js"></script>
</section>
@endsection