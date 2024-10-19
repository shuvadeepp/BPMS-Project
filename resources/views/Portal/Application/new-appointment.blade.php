@extends('portal.layouts.console') 
@section('innercontent') 
<?php //echo'<pre>';print_r($arrAllRecords);exit; ?>
<!-- main content start-->
<div id="page-wrapper">
   <div class="main-page">
      <div class="tables">
         <h3 class="title1">New Appointment</h3>
         <div class="table-responsive bs-example widget-shadow">
            <h4>New Appointment:</h4>
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>#</th>
                     <th> Appointment Number</th>
                     <th>Name</th>
                     <th>Mobile Number</th>
                     <th>Appointment Date</th>
                     <th>Appointment Time</th>
                     <th>Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <th scope="row"> </th>
                     <td> </td>
                     <td> </td>
                     <td> </td>
                     <td> </td> 
                     <td> </td> 
                     <td> </td>
                     <td><a href=" " class="btn btn-primary">View</a>
                        <a href=" " class="btn btn-danger">Delete</a>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<!-- main content End-->
@endsection