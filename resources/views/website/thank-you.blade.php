@extends('layouts.console') 
@section('innercontent')
<?php //echo'<pre>';print_R( session('User_Session_Data.FirstName') );exit; ?> 
@include('includes.header')
<!-- breadcrumbs -->
<section class="w3l-inner-banner-main">
    <div class="about-inner contact ">
        <div class="container">   
            <div class="main-titles-head text-center">
            <h3 class="header-name ">
                
Appointment Confirmation
            </h3>
        </div>
</div>
</div>
<div class="breadcrumbs-sub">
<div class="container">   
<ul class="breadcrumbs-custom-path">
    <li class="right-side propClone"><a href="index.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a> <p></li>
    <li class="active ">
        Thank You
    </li>
</ul>
</div>
</div>
    </div>
</section>
<!-- breadcrumbs //-->
<section class="w3l-contact-info-main" id="contact">
    <div class="contact-sec	">
        <div class="container">

        <div>
    <?php if ($appointmentNumber): ?>
        <h4 class="w3ls_head">Thank you, <b><?php echo session('User_Session_Data.FirstName'); ?></b> for applying. Your Appointment no is <i class="bi bi-bookmark-check-fill"></i> <b><?php echo isset($appointmentNumber['AptNumber']) ? $appointmentNumber['AptNumber'] : 'N/A'; ?> </b></h4>
        <small style="color: red;">Note: Make a note of this appointment number or take a screenshot.</small>
    <?php else: ?>
        <p>Appointment information not available.</p>
    <?php endif; ?>
    
    <button type="submit" class="btn btn-contact">
        <a href="<?php echo WEBSITE_URL.'invoiceHistory' ?>" style="text-decoration: none; color: white;">
            Invoice History
        </a>
    </button>   
    <button type="submit" class="btn btn-contact">
        <a href="<?php echo WEBSITE_URL.'bookHistory' ?>" style="text-decoration: none; color: white;">
            Booking History
        </a>
    </button>
</div>

    </div>
</div>
</section>
@endsection