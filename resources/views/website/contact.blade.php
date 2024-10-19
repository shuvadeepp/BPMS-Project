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
                Contact Us
            </h3>
        </div>
</div>
</div>
<div class="breadcrumbs-sub">
<div class="container">   
<ul class="breadcrumbs-custom-path">
    <li class="right-side propClone"><a href="index.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a> <p></li>
    <li class="active ">
        Contact</li>
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
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                    <form method="post">
                        @csrf
                        <div class="twice-four">
                            <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name">
                            <span style="color: red;" class="errMsg_fname errDiv"></span>
                            <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name">
                            <span style="color: red;" class="errMsg_lname errDiv"></span>
                        </div>
                        <div class="twice-two">
                           <input type="text" class="form-control" placeholder="Mobile Number" name="phone" id="phone" pattern="[0-9]+" maxlength="10">
                           <input type="email" name="emailId" id="emailId" class="form-control" class="form-control" placeholder="Email ID" >
                        </div>
                        <span style="color: red;" class="errMsg_phone errDiv"></span>
                        
                        <span style="color: red;" class="errMsg_emailId errDiv"></span>
                        <textarea class="form-control" id="message" name="message" placeholder="Message" required=""></textarea>
                        <span style="color: red;" class="errMsg_message errDiv"></span>

                        <button type="submit" class="btn btn-contact" onclick="return validator();">Send Message</button>
                    </form>
                </div>
    </div>
   
    </div></div>
    <script>
        function validator() {
            $('.errDiv').hide();
            $('.error-input').removeClass('error-input');
            if (!blankCheck('fname', 'First Name can not be blank'))
            return false;
            if (!blankCheck('lname', 'Last Name can not be blank'))
            return false;
            if (!blankCheck('phone', 'mobile Number can not be left blank'))
            return false; 
            if (!blankCheck('emailId', 'Email ID can not be left blank'))
            return false; 
            if (!blankCheck('message', 'Message can not be left blank'))
            return false; 
        }
        $(document).ready(function () { 
            var csrfToken = '{{ csrf_token() }}'; 
            commonPage(csrfToken);
        });
    </script>
<script src="<?php echo PUBLIC_PATH ?>js/commonAjax.js"></script>
</section>
@endsection