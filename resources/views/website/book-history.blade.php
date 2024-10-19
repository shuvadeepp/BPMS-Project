@extends('layouts.console') 
@section('innercontent')
<?php //echo'<pre>';print_R( encrypt($bookinData[0]['uId']) );exit; ?> 
@include('includes.header')
<!-- breadcrumbs -->
<section class="w3l-inner-banner-main">
    <div class="about-inner contact ">
        <div class="container">   
            <div class="main-titles-head text-center">
            <h3 class="header-name ">
                
 Booking History
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
                    <h4 style="padding-bottom: 20px;text-align: center;color: blue;">Appointment History</h4>
                    <div>
                        <button type="button" class="btn btn-danger" style="float: right; padding: 5px; margin-right: 10px; margin-top: -0px;">
                            <a href="<?php echo WEBSITE_URL.'invoiceHistory' ?>" style="text-decoration: none; color: white;">
                                Invoice History
                            </a>
                        </button> 
                        <button type="button" class="btn btn-danger" style="float: right; padding: 5px; margin: 0 10px 34px 0;">
                            <a href="<?php echo WEBSITE_URL.'bookAppointment' ?>" style="text-decoration: none; color: white;">
                                Book Appointment 
                            </a>
                        </button> 
                    </div>
                        <table border="2" class="table table-bordered">
                            <thead class="gray-bg" >
                                <tr>
                                <th>#</th>
                                <th>Appointment Number</th>
                                <th>Appointment Date</th>
                                <th>Appointment Time</th>
                                <th>Appointment Status</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <?php $count=1; if(!empty($bookinData)){ ?>
                                <?php foreach($bookinData as $bookData){ ?>
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td>{{ $bookData['AptNumber'] }}</td>
                                    <td>{{ date('d M Y',strtotime($bookData['AptDate'])) }}</td> 
                                    <td>{{ $bookData['AptTime'] }}</td> 
                                    <td> 
                                        <?php if($bookData['Status'] == ''){ ?>
                                            <span class="badge badge-pill badge-secondary"> 
                                                Waiting for confirmation
                                            </span> 
                                        <?php } else if($bookData['Status'] == 1) { ?>
                                            <span class="badge badge-pill badge-success"> 
                                                Your booking has been confirmed
                                            </span>
                                        <?php } else if($bookData['Status'] == 2) { ?>
                                            <span class="badge badge-pill badge-danger"> 
                                                Your booking has been rejected
                                            </span>
                                        <?php }  ?>
                                    </td>   
                                    <td>
                                        <!-- <a href="appointment-detail.php?aptnumber=<?php //echo $row['AptNumber'];?>" class="btn btn-primary">View</a> -->
                                        <a href="<?php echo 'appointment_Detail/' . encrypt($bookData['AptNumber'])?>" class="btn btn-primary">View</a>
                                    </td>       
                                </tr> 
                                <?php $count++; } ?>
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="7" align="center">Sorry !!! No Record Found.</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div> 
                </div>   
            </div> 
        </div>
    </div>
</section>
@endsection