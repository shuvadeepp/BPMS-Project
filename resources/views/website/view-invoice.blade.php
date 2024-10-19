@extends('layouts.console') 
@section('innercontent')
<?php 
    // echo'<pre>';print_R( $userDetailsQuery );
?> 
@include('includes.header')
<!-- Breadcrumbs -->
<section class="w3l-inner-banner-main">
    <div class="about-inner contact">
        <div class="container">
            <div class="main-titles-head text-center">
                <h3 class="header-name">Invoice History</h3>
                @if (session('success'))
                    <div class="alert alert-success">
                        <b>{{ session('success') }}</b>
                    </div>
                @endif 
                @if (session('error'))
                    <div class="alert alert-danger">
                        <b>{{ session('error') }}</b>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <p class="tiltle-para">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic fuga sit illo modi aut aspernatur tempore laboriosam saepe dolores eveniet.</p>
            </div>
        </div>
    </div>
    <div class="breadcrumbs-sub">
        <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li class="right-side propClone"><a href="index.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a> <p></li>
                <li class="active">Invoice History</li>
            </ul>
        </div>
    </div>
</section>
<!-- Breadcrumbs -->

<section class="w3l-contact-info-main" id="contact">
    <div class="contact-sec	">
        <div class="container">
            <div>
                <div class="cont-details">
                    <div class="table-content table-responsive cart-table-content m-t-30" id="exampl">
                        <h3 class="title1">Invoice Details</h3>

                        <div class="table-responsive bs-example widget-shadow">
                        <button type="button" class="btn btn-danger" style="float: right; padding: 5px; margin: 0 0 34px 0;">
                            <a href="<?php echo WEBSITE_URL.'invoiceHistory' ?>" style="text-decoration: none; color: white;">
                                <i class="bi bi-arrow-left-circle-fill"></i><b> Back </b> 
                            </a>
                        </button>
                            <h4>Invoice #<?php echo $userDetailsQuery['BillingId']?></h4>
                            <table class="table table-bordered" width="100%" border="1">
                                <tr>
                                    <th colspan="6">Customer Details</th>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td><?php echo $userDetailsQuery['FirstName'] . ' ' . $userDetailsQuery['LastName']; ?></td>
                                    <th>Contact no.</th>
                                    <td><?php echo $userDetailsQuery['MobileNumber']; ?></td>
                                    <th>Email </th>
                                    <td><?php echo $userDetailsQuery['Email']; ?></td>
                                </tr>
                                <tr>
                                    <th>Registration Date</th>
                                    <?php 
                                        $RegDate = $userDetailsQuery['RegDate'];
                                        $RegDate = new DateTime($RegDate);
                                    ?>
                                    <td><?php echo $RegDate->format('d-m-Y h:i:s A'); ?></td>
                                    <th>Invoice Date</th>
                                    <?php 
                                        $invoiceDate = $userDetailsQuery['invoicedate'];
                                        $invoiceDate = new DateTime($invoiceDate);
                                    ?>
                                    <td colspan="3"><?php echo $invoiceDate->format('d-m-Y'); ?></td>
                                </tr>
                            </table>
                        </div>

                        <table class="table table-bordered" width="100%" border="1">
                            <tr>
                                <th colspan="3">Services Details</th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Service</th>
                                <th>Cost</th>
                            </tr>
                            <?php $totalAmount=0; $count=1; foreach($calculateAmountQuery as $productData){ ?>
                            <tr>
                                <td><?php echo $count ?></td>
                                <th><?php echo $productData['ServiceName'] ?></th>
                                <td> <i class="fa fa-inr"></i> <?php echo $itemCost = $productData['Cost'] ?></td> 
                            </tr>
                            <?php $totalAmount+=$itemCost; $count++; } ?>
                            <tr>
                                <th colspan="2" style="text-align:center">Grand Total</th>
                                <th> <i class="fa fa-inr"></i> <?php echo $totalAmount ?></th>
                            </tr>
                        </table>
                        <p style="margin-top:1%" align="center">
                            <i class="fa fa-print fa-2x" style="cursor: pointer; color: green;" OnClick="CallPrint(this.value)" title="Print receipt"></i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function CallPrint(strid) {
            var prtContent = document.getElementById("exampl");
            var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(prtContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
        }
    </script>
</section>

@endsection