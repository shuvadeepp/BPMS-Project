@extends('layouts.console') 
@section('innercontent')
<?php // echo'<pre>';print_R( $aboutQuery );exit; ?> 
@include('includes.header')
<style type="text/css">
   /* .clsCoverImgOne, .clsCoverImgTwo {
      filter: brightness(105%) grayscale(8%);
      border-radius: 6%;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
   }  */
</style>
<!-- breadcrumbs -->
<section class="w3l-inner-banner-main">
   <div class="about-inner about ">
      <div class="container">
         <div class="main-titles-head text-center">
            <h3 class="header-name ">
               About Us
            </h3>
         </div>
      </div>
   </div>
   <div class="breadcrumbs-sub">
      <div class="container">
         <ul class="breadcrumbs-custom-path">
            <li class="right-side propClone">
               <a href="index.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a> 
               <p>
            </li>
            <li class="active ">About</li>
         </ul>
      </div>
   </div>
   </div>
</section>
<!-- breadcrumbs //-->
<section class="w3l-content-with-photo-4"  id="about">
   <div class="content-with-photo4-block ">
      <div class="container">
         <div class="cwp4-two row">
            <div class="cwp4-image col-xl-6">
            @if (!empty($aboutQuery['CoverImgOne']))
               <td><img src="{{ STORAGE_PATH . 'AboutUs/' . $aboutQuery['CoverImgOne'] }}" alt="Cover Image" class="img-responsive about-me clsCoverImgOne"></td>
            @else
               <img src="<?php echo PUBLIC_PATH ?>images/b2.jpg" alt="product" class="img-responsive about-me clsCoverImgOne">
            @endif
               
            </div>
            <div class="cwp4-text col-xl-6 ">
               <div class="posivtion-grid">
                  <h3 class=""><?php  echo $aboutQuery['PageTitleOne'];?> </h3> 
                  <div class="hair-two-colums">
                     @foreach ($aboutTags as $tags)
                        <div class="hair-left">
                           <h5>{{ !empty($tags) ? $tags : '--' }}</h5>
                        </div>
                     @endforeach
                  </div>

                  <!-- <div class="hair-two-colums">
                     <div class="hair-left">
                        <h5>
                           Waxing
                        </h5>
                     </div>
                     <div class="hair-left">
                        <h5>Facial</h5>
                     </div>
                     <div class="hair-left">
                        <h5>Hair makeup</h5>
                     </div>
                     <div class="hair-left">
                        <h5>Massage</h5>
                     </div>
                     <div class="hair-left">
                        <h5>Menicure</h5>
                     </div>
                     <div class="hair-left">
                        <h5>Pedicure</h5>
                     </div>
                     <div class="hair-left">
                        <h5>Hair Cut</h5>
                     </div>
                     <div class="hair-left">
                        <h5>Body Spa</h5>
                     </div>
                  </div> -->
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="w3l-recent-work">
   <div class="jst-two-col">
      <div class="container">
         <div class="row">
            <div class="my-bio col-lg-6">
               <div class="hair-make"> 
                  <h5><a href="blog.html"><?php  echo $aboutQuery['PageTitleTwo'];?> </a></h5>
                  <p class="para mt-2"><?php echo $aboutQuery['PageDescription'];?> </p> 
               </div>
            </div>
            <div class="col-lg-6 ">
            @if (!empty($aboutQuery['CoverImgTwo']))
               <td><img src="{{ STORAGE_PATH . 'AboutUs/' . $aboutQuery['CoverImgTwo'] }}" alt="Cover Image" class="img-responsive about-me clsCoverImgTwo"></td>
            @else
               <img src="<?php echo PUBLIC_PATH ?>images/b3.jpg" alt="Cover Image" class="img-responsive about-me clsCoverImgTwo">
            @endif
               
            </div>
         </div>
      </div>
   </div>
</section>
@endsection