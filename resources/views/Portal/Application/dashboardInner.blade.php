@section('innercontent')
<!-- main content start-->
<?php //echo'<pre>'; print_r($totCusCount->totCusCount);exit; ?>
<div id="page-wrapper" class="row calender widget-shadow">
<div class="main-page">
    

    <div class="row calender widget-shadow">
        <div class="row-one">
        <div class="col-md-4 widget">
            
            <div class="stats-left ">
                <h5>Total</h5>
                <h4>Customer</h4>
            </div>
            <div class="stats-right">
                <label> <?php echo $totCusCount; ?> </label>
            </div>
            <div class="clearfix"> </div>	
        </div>
        <div class="col-md-4 widget states-mdl">
            
            <div class="stats-left">
                <h5>Total</h5>
                <h4>Appointment</h4>
            </div>
            <div class="stats-right">
                <label> <?php echo $totAptmnt; ?> </label>
            </div>
            <div class="clearfix"> </div>	
        </div>
        <div class="col-md-4 widget states-last">
            
            <div class="stats-left">
                <h5>Total</h5>
                <h4>Accepted Apt</h4>
            </div>
            <div class="stats-right">
                <label> <?php echo $totAptmntAccpt; ?> </label>
            </div>
            <div class="clearfix"> </div>	
        </div>
        <div class="clearfix"> </div>	
    </div>
            
        </div>

    <div class="row calender widget-shadow">
        <div class="row-one">
        <div class="col-md-4 widget">
            
            <div class="stats-left ">
                <h5>Total</h5>
                <h4>Rejected Apt</h4>
            </div>
            <div class="stats-right">
                <label> <?php echo $totAptmntRejcted; ?> </label>
            </div>
            <div class="clearfix"> </div>	
        </div>
        <div class="col-md-4 widget states-mdl">

            <div class="stats-left">
                <h5>Total</h5>
                <h4>Services</h4>
            </div>
            <div class="stats-right">
                <label> <?php echo $totServices; ?> </label>
            </div>
            <div class="clearfix"> </div>	
        </div>
        <div class="col-md-4 widget states-last">
            
            <div class="stats-left">
                <h5>Today</h5>
                <h4>Sales</h4>
            </div>
            <div class="stats-right">
                <label>₹<?php echo $SaleStatus; ?> </label>
            </div>
            <div class="clearfix"> </div>	
        </div>
        <div class="clearfix"> </div>	
    </div>
            
        </div>

    <div class="row calender widget-shadow">
        <div class="row-one">
        <div class="col-md-4 widget"> 
            <div class="stats-left ">
                <h5>Yesterday</h5>
                <h4>Sales</h4>
            </div>
            <div class="stats-right">
                <label> ₹<?php echo $PrevSaleStatus; ?> </label>
            </div>
            <div class="clearfix"> </div>	
        </div>
        <div class="col-md-4 widget states-mdl"> 
            <div class="stats-left">
                <h5>Last Seven Days</h5>
                <h4>Sale</h4>
            </div>
            <div class="stats-right">
                <label> ₹<?php echo $lastSevenSale; ?> </label>
            </div>
            <div class="clearfix"> </div>	
        </div>
        <div class="col-md-4 widget states-last"> 
            <div class="stats-left">
                <h5>Last 30 Days</h5>
                <h4>Sales</h4>
            </div>
            <div class="stats-right">
                <label> ₹<?php echo $ThirtyDaysSaleStatus; ?> </label>
            </div>
            <div class="clearfix"> </div>	
        </div>
        <div class="clearfix"> </div>	
    </div>
            
        </div>
    </div>
    <div class="clearfix"> </div>
</div>
@endsection