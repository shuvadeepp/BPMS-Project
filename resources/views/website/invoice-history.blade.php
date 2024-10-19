@extends('layouts.console') 
@section('innercontent')
<?php 
    //echo'<pre>';print_R( $invoiceData );exit; 
?> 
@include('includes.header')
<!-- breadcrumbs -->
<section class="w3l-inner-banner-main">
    <div class="about-inner contact ">
        <div class="container">   
            <div class="main-titles-head text-center">
            <h3 class="header-name ">
                
 Invoice History
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
        Invoice History</li>
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
                   <div class="table-content table-responsive cart-table-content">
                    <h4 style="padding-bottom: 20px;text-align: center;color: blue;">Invoice History</h4>
                    <div>
                        <button type="button" class="btn btn-danger" style="float: right; padding: 5px; margin: 0 10px 34px 0;">
                            <a href="<?php echo WEBSITE_URL.'bookAppointment' ?>" style="text-decoration: none; color: white;">
                                Book Appointment 
                            </a>
                        </button>
                        <button type="button" class="btn btn-danger" style="float: right; padding: 5px; margin-right: 10px; margin-top: -0px;">
                            <a href="<?php echo WEBSITE_URL.'bookHistory' ?>" style="text-decoration: none; color: white;">
                                Book History 
                            </a>
                        </button> 
                    </div> 
                        <table class="table" border="1">
                            <thead >
                                <tr> 
                                <th>#</th> 
                                <th>Invoice Id</th> 
                                <th>Customer Name</th>
                                <th>Customer Mobile Number</th>
                                <th>Invoice Date</th> 
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody> 
                            <?php $count=1; if(!empty($invoiceData)){ //echo'<pre>';print_r($invoiceData['FirstName']);exit; ?>
                                <?php foreach($invoiceData as $invoiceRow){  ?>
                        <tr> 
                            <th scope="row"><?php echo $count;?></th> 
                            <td><?php echo $invoiceRow['BillingId'];?></td>
                            <td><?php echo $invoiceRow['FirstName'];?> <?php echo $invoiceRow['LastName'];?></td>
                            <td><?php echo $invoiceRow['MobileNumber'];?></td>
                            <td><?php echo $invoiceRow['PostingDate'];?></td> 
                                <td><a href="<?php echo 'viewInvoice/' . encrypt($invoiceRow['BillingId'])?>" class="btn btn-primary">View</a></td>  
                        </tr>
                        <?php $count++; } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="7" align="center" style="font-weight: bold; color: red;">Sorry !!! No Invoice Updated.</td>
                            </tr>
                        <?php } ?>
                             
                            </tbody>
                        </table>
                    </div> </div>
                
    </div>
   
    </div></div>
</section>
@endsection