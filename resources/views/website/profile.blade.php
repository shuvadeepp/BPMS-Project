@extends('layouts.console') 
@section('innercontent')
<?php 
    // echo'<pre>';print_R( $profileQuery );
?> 
@include('includes.header')
<!-- breadcrumbs -->
<section class="w3l-inner-banner-main">
    <div class="about-inner contact ">
        <div class="container">   
            <div class="main-titles-head text-center">
            <h3 class="header-name ">
                
 Profile
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
        profile</li>
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
                    <h3>User Profile!!</h3>
                    <form method="post" name="signup" onsubmit="return checkpass();">
                        @csrf
                        <div style="padding-top: 30px;">
                            <label>First Name</label>
                            
                            <input type="text" class="form-control" name="firstname" value="<?php echo $profileQuery['FirstName'] ?>" required="true"></div>
                            <div style="padding-top: 30px;">
                            <label>Last Name</label>
                            
                            <input type="text" class="form-control" name="lastname" value="<?php echo $profileQuery['LastName'] ?>" required="true">
                        </div>
                        <div style="padding-top: 30px;">
                           <label>Mobile Number</label>
                           
                           <input type="text" class="form-control" name="mobilenumber" value="<?php echo $profileQuery['MobileNumber'] ?>"></div>
                           <div style="padding-top: 30px;">
                           <label>Email address</label> 
                           <input type="text" class="form-control" name="email" value="<?php echo $profileQuery['Email'] ?>"  readonly="true">
                        </div>
                         <div style="padding-top: 30px;">
                            <label>Registration Date</label> 
                           <input type="text" class="form-control" name="regdate" value="<?php echo $profileQuery['RegDate'] ?>"  readonly="true">
                        </div> 
                        <button type="submit" class="btn btn-contact" name="submit">Save Change</button>
                    </form>
                </div>
            </div> 
        </div>
    </div>   
<script> 
    $(document).ready(function () { 
        var csrfToken = '{{ csrf_token() }}'; 
        commonPage(csrfToken);
    });
</script>
<script src="<?php echo PUBLIC_PATH ?>js/commonAjax.js"></script>
</section>
@endsection