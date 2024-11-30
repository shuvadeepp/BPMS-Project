@extends('layouts.console') 
@section('innercontent')
<?php //echo'<pre>';print_R( $aptDetails );exit; ?> 
@include('includes.header')
<!-- breadcrumbs -->
<section class="w3l-inner-banner-main">
    <div class="about-inner contact ">
        <div class="container">   
            <div class="main-titles-head text-center">
            <h3 class="header-name ">
                
 Booking History
            </h3>
            <p class="tiltle-para">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic fuga sit illo modi aut aspernatur tempore laboriosam saepe dolores eveniet.</p>
        </div>
</div>
</div>
<div class="breadcrumbs-sub">
<div class="container">   
<ul class="breadcrumbs-custom-path">
    <li class="right-side propClone"><a href="index.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a> <p></li>
    <li class="active ">
        Booking History</li>
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
                <div class="cont-details">
                   <div class="table-content table-responsive cart-table-content m-t-30">
                   <h4 style="padding-bottom: 20px;text-align: center;color: blue;">Appointment Details</h4>
                      
                    <table class="table table-bordered">
                        <tr>
                            <th>Appointment Number</th>
                            <td><?php  echo $aptDetails['AptNumber'];?></td>
                        </tr>
                        <tr>
                        <th>Name</th>
                            <td><?php  echo $aptDetails['FirstName'];?> <?php  echo $aptDetails['LastName'];?></td>
                        </tr> 
                        <tr>
                            <th>Email</th>
                            <td><?php echo $aptDetails['Email'];?></td>
                        </tr>
                        <tr>
                            <th>Mobile Number</th>
                            <td><?php echo $aptDetails['MobileNumber'];?></td>
                        </tr>
                        <tr>
                            <th>Appointment Date</th>
                            <td><?php echo $aptDetails['AptDate'];?></td>
                        </tr> 
                        <tr>
                            <th>Appointment Time</th>
                            <td><?php echo $aptDetails['AptTime'];?></td>
                        </tr> 
                        <tr>
                            <th>Apply Date</th>
                            <td><?php echo $aptDetails['BookingDate'];?></td>
                        </tr>  
                        <tr>
                            <th>Message</th>
                            <td><?php echo $aptDetails['Remark'];?></td>
                        </tr>  
                        <tr>
                            <th>Status</th> 
                            @if($aptDetails['Status'] == 1) 
                                <td><span class="badge badge-success"> Appointment Approved </span></td>
                            @elseif($aptDetails['Status'] == 2) 
                                <td><span class="badge badge-danger"> Appointment Rejected </span></td>
                            @elseif($aptDetails['approvedStatus'] == 1 && $aptDetails['Status'] == 3) 
                                <td><span class="badge badge-info"> Completed </span></td>
                            @else
                                <td><span class="badge badge-primary"> Not Updated Yet </span></td>
                            @endif
                        </tr>
                    </table>
                </div> 
            </div> 
        </div> 
    </div>
</div>
</section>
@endsection