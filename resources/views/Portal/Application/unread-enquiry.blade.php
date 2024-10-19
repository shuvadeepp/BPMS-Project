@extends('portal.layouts.console') 
@section('innercontent')
<?php // echo'<pre>'; print_r($unreadEnquiry);exit;?>
<!-- main content start-->
<div id="page-wrapper">
   <div class="main-page">
      <div class="tables">
         <h3 class="title1">Contact Message's</h3>
         <h4 class="title2">Unseen Enquiry's: </h4>
         <div class="table-responsive bs-example widget-shadow">
            <h4>View Enquiry:</h4>
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>S.No</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Enquiry Date</th>
                     <th>Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $i = 1; if(!empty($unreadEnquiry)) { ?>
                  <?php foreach($unreadEnquiry as $unread) { ?>
                  <tr class="gradeX">
                     <td scope="row"><b> {{ $i++ }} </b></td> 
                     <td> {{ $unread->FirstName . ' ' . $unread->LastName }} </td> 
                     <td> {{ $unread->Email }} </td> 
                     <td>
                        <span class="badge badge-primary"> {{ date('d M Y', strtotime($unread->EnquiryDate)) }} </span>
                     </td>
                     @if($unread->IsRead == 0)
                        <td style="color: red; font-weight: bold;"> Unseen </td>
                     @else
                        <td style="color: green; font-weight: bold;"> Seen </td>
                     @endif
                     <?php
                        $strParam   = encrypt(json_encode($unread->ID)); 
                        $strEnc = str_replace('=','',$strParam);     
                        // echo $strEnc;exit;
                     ?>
                     <td><a href="<?php echo ADMIN_MANAGEAPP . 'viewEnquiry/' . $strEnc ?>" class="btn btn-primary">View</a>
                        <a href="" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                     </td>
                  </tr>
                  <?php } } else { ?>
                     <td style="color: red;"> No Record Found </td>
                  <?php } ?>
               </tbody>
            </table>
            <nav aria-label="Page navigation example">
               <ul class="pagination justify-content-end">
                  {{ $unreadEnquiry->links() }}
               </ul>
            </nav>
         </div>
      </div>
   </div>
</div>
<!-- main content End-->
@endsection