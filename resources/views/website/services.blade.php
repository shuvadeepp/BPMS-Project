@extends('layouts.console') 
@section('innercontent')
<?php  //echo'<pre>';print_R( $serviceQuery );exit; ?> 
@include('includes.header')
<!-- breadcrumbs -->
<section class="w3l-inner-banner-main">
    <div class="about-inner services ">
        <div class="container">   
            <div class="main-titles-head text-center">
            <h3 class="header-name ">
                Our Service
            </h3>
        </div>
</div>
</div>
<div class="breadcrumbs-sub">
<div class="container">   
<ul class="breadcrumbs-custom-path">
    <li class="right-side propClone"><a href="index.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a> <p></li>
    <li class="active ">Services</li>
</ul>
</div>
</div>
    </div>
</section>
<!-- breadcrumbs //-->
<section class="w3l-recent-work-hobbies" > 
    <div class="recent-work ">
        <div class="container">
            <div class="row about-about"> 
                @if(!empty($serviceQuery))
                @foreach($serviceQuery as $serviceVal)
                <div class="col-lg-4 col-md-6 col-sm-6 propClone">
                 <img src="<?php if(!empty($serviceVal['Image'])){ echo STORAGE_PATH . '/Service/' . $serviceVal['Image']; } else { echo PUBLIC_PATH . 'images/4.jpg'; } ?>" alt="product" height="200" width="400" class="img-responsive about-me">
                    <div class="about-grids ">
                        <hr>
                        <h5 class="para"><?php echo $serviceVal['ServiceName'];?> </h5>
                        <p class="para "><?php echo $serviceVal['ServiceDescription'];?> </p>
                        <p class="para " style="color: hotpink;"> Cost of Service: &#8377; <?php  echo $serviceVal['Cost'];?> </p> 
                    </div>
                </div>
                @endforeach
                @else
                    <p style="color: red; text-align: center;">No Service Added</p>
                @endif
                <br />
            </div>
        </div>
    </div>
</section>
@endsection