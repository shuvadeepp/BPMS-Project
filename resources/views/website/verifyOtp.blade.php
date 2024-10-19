@extends('layouts.console') 
@section('innercontent')
<?php //echo'<pre>';print_R(  );exit; ?> 
@include('includes.header')
<!-- breadcrumbs -->
<section class="w3l-inner-banner-main">
    <div class="about-inner contact ">
        <div class="container">   
            <div class="main-titles-head text-center">
            <h3 class="header-name "> OTP </h3>
        </div>
</div>
</div>
<div class="breadcrumbs-sub">
<div class="container">   
<ul class="breadcrumbs-custom-path">
    <li class="right-side propClone"><a href="index.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a> <p></li>
    <li class="active ">
        OTP</li>
</ul>
</div>
</div>
    </div>
</section>
<!-- breadcrumbs //-->
<section class="w3l-contact-info-main" id="contact">
     
    <!-- otp code by suchitra palai date:- 26-01-2024 -->
    <section class="opt-sec">  
    <div id="container">
        <div class="center-content">
            <h1>Verify OTP</h1>
            <p>Enter the 4-digit OTP sent to your mobile number</p>
            <form >
                <div class="otp-input">
                    <input class="otp-box" type="text" maxlength="1" oninput="moveToNext(this)" />
                    <input class="otp-box" type="text" maxlength="1" oninput="moveToNext(this)" />
                    <input class="otp-box" type="text" maxlength="1" oninput="moveToNext(this)" />
                    <input class="otp-box" type="text" maxlength="1" oninput="moveToNext(this)" /> 
                </div>
                <!-- <div id="timer">( <span id="countdown">50</span>:<span id="seconds">00</span> s)</div> -->

                <button type="submit">Verify</button>
            </form>
            
            <div class="resend">
                <p>Didn't receive OTP?</p>
                <a href="#">Resend OTP</a>
            </div>
        </div>
    </div>
    </section>
    <!-- end -->
   
    </div>
</div>
<script>
    
//  startTimer();

function moveToNext(currentInput) {
    var maxLength = parseInt(currentInput.getAttribute('maxlength'));
    var currentInputIndex = Array.from(currentInput.parentElement.children).indexOf(currentInput);

    if (currentInput.value.length === maxLength) {
        var nextInput = currentInput.parentElement.children[currentInputIndex + 1];

        if (nextInput) {
            nextInput.focus();
        }
    }
}

// function startTimer() {
//     var countdownElement = document.getElementById('countdown');
//     var secondsElement = document.getElementById('seconds');
//     var countdown = 3000;

//     var timerInterval = setInterval(function () {
//         var minutes = Math.floor(countdown / 60);
//         var seconds = countdown % 60;

//         countdownElement.textContent = padZero(minutes);
//         secondsElement.textContent = padZero(seconds);

//         countdown--;

//         if (countdown < 0) {
//             clearInterval(timerInterval);
//             // Optionally, you can add logic to handle the end of the timer
//             alert('Time is up! Please request a new OTP.');
//         }
//     }, 1000);
// }

// function padZero(value) {
//     return value < 10 ? "0" + value : value;
// }

    /* ::::: SIGN UP VALIDATION ::::: */
    function validator () {

    }
    /* ::::: SIGN UP VALIDATION ::::: */
</script>
</section>
@endsection