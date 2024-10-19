@extends('portal.layouts.console') 
@section('innercontent')
<?php // echo'<pre>'; print_r($arrAllRecord);exit;?> 
<!-- main content start-->
<div id="page-wrapper">
   <div class="main-page">
      <div class="tables">
         <h3 class="title1">View Enquiry</h3> 
         <div class="table-responsive bs-example widget-shadow">
            <label for="">Status :</label>
         <span style="color: green; font-weight: bold; text-align: right;">  <small>   Seen </small></span>
            <table class="table table-bordered mg-b-0" style="font-size: 20px;">
               <tr style="color: blue;font-size: 30px;text-align: center;" >
                  <td colspan="4">View Enquiry</td>
               </tr>
               <tr>
                  <th>Name</th>
                  <td> {{ $arrAllRecord[0]->FirstName . ' ' . $arrAllRecord[0]->LastName }} </td>
                  <th>Email</th>
                  <td> {{ $arrAllRecord[0]->Email }} </td>
               </tr>
               <tr>
                  <th>Contact No.</th>
                  <td> {{ $arrAllRecord[0]->Phone }} </td>
                  <th>Query Date</th>
                  <td> {{ date('d M Y', strtotime($arrAllRecord[0]->EnquiryDate)) }} </td>
               </tr>
               <tr>
                  <th>Message</th>
                  <td colspan="4"> {{ $arrAllRecord[0]->Message }} </td>
               </tr>
            </table>
         </div>
      </div>
   </div>
</div>
<!-- main content End-->
@endsection