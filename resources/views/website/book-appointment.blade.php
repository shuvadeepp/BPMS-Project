@extends('layouts.console') 
@section('innercontent')
<?php //echo'<pre>';print_R(  );exit; ?> 
@include('includes.header')
<!-- breadcrumbs //-->
<section class="w3l-inner-banner-main">
    <div class="about-inner contact ">
        <div class="container">   
            <div class="main-titles-head text-center">
            <h3 class="header-name ">
                
 Book Appointment
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
        Book Appointment</li>
</ul>
</div>
</div>
    </div>
</section>
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
                    <form method="post" id="appointment-form">
                        @csrf
                        <div style="padding-top: 30px;">
                            <label for="appointmentDate">Appointment Date</label> 
                            <input type="date" class="form-control appointment_date" placeholder="Appointment Date" name="appointmentDate" id='appointmentDate'>
                            <span style="color: red;" class="errMsg_appointmentDate errDiv"></span>
                        </div>
                        <div style="padding-top: 30px;">
                        
                            <label for="appointmentTime">Appointment Time</label> 
                            <input type="time" class="form-control appointment_time" placeholder="Appointment Time" name="appointmentTime" id='appointmentTime'></div>
                            <span style="color: red;" class="errMsg_appointmentTime errDiv"></span>
                        <div style="padding-top: 30px;">
                            <textarea class="form-control" id="appointmentMsg" name="appointmentMsg" placeholder="Appointment Message"></textarea>
                            <span style="color: red;" class="errMsg_appointmentMsg errDiv"></span>
                        </div>
                        <button type="submit" class="btn btn-contact" onclick="return validator();">Make an Appointmen</button>

                        <button type="submit" class="btn btn-contact">
                            <a href="<?php echo WEBSITE_URL.'bookHistory' ?>" style="text-decoration: none; color: white;">
                                Booking History
                            </a>
                        </button>
                        <button type="submit" class="btn btn-contact"> 
                            <a href="<?php echo WEBSITE_URL.'invoiceHistory' ?>" style="text-decoration: none; color: white;">
                                Invoice History
                            </a>
                        </button>
                    </form>
                </div>
    </div>
   
    </div></div>
    <script>
    function validator() {
        $('.errDiv').hide();
        $('.error-input').removeClass('error-input');
        if (!blankCheck('appointmentDate', 'Appointment Date can not be left blank'))
        return false;
        if (!blankCheck('appointmentTime', 'Appointment Time can not be left blank'))
        return false;
        if (!blankCheck('appointmentMsg', 'Appointment Message can not be left blank'))
        return false;  
        $('#appointment-form').submit();

    }
    $(function(){
        var dtToday = new Date(); 
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();

        var maxDate = year + '-' + month + '-' + day;
        $('#appointmentDate').attr('min', maxDate);
    });
    $(document).ready(function () { 
        var csrfToken = '{{ csrf_token() }}'; 
        commonPage(csrfToken);
    });
</script>
<script src="<?php echo PUBLIC_PATH ?>js/commonAjax.js"></script>
</section>
@endsection