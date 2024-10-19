@extends('portal.layouts.console') 
@section('innercontent')
<!-- main content start-->
<?php //echo'<pre>';print_r($arrAllRecords);exit; ?>
<div id="page-wrapper">
   <div class="main-page">
      <div class="tables">
         <h3 class="title1">Manage Services</h3>
         <div class="table-responsive bs-example widget-shadow">
            <h4>Update Services:</h4>
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>Sl#</th>
                     <th>Service Name</th>
                     <th>Service Description</th>
                     <th>Service Cost</th>
                     <th>Service Image</th>
                     <th>Creation Date</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php  $i = 1; if (!empty($arrAllRecords)) { ?>
                  <?php foreach ($arrAllRecords as $AllRecords) { //echo'<pre>';print_r($AllRecords->ServiceName);exit; ?>
                     <tr>
                           <th scope="row">{{ $i++ }}</th>
                           <td>{{ $AllRecords->ServiceName }}</td>
                           <td width="380">{{ $AllRecords->ServiceDescription }}</td>
                           <td>{{ '₹' . $AllRecords->Cost }}</td>
                           @if (!empty($AllRecords->Image))
                              <td><img src="{{ STORAGE_PATH . 'Service/' . $AllRecords->Image }}" alt="Service Image" height="50" width="100"></td>
                           @else
                              <td><span class="badge text-bg-warning">No Image available</span></td>
                           @endif
                           <td><span class="badge text-bg-success">{{ date('d M Y', strtotime($AllRecords->CreationDate)) }}</span></td>
                           <?php
                              $strParam   = encrypt(json_encode($AllRecords->ID)); 
                              $strEnc = str_replace('=','',$strParam);     
                              // echo $strEnc;exit;
                            ?>
                           <td>
                              <a href="<?php echo ADMIN_MANAGEAPP . 'addServices/' . $strEnc ?>" class="btn btn-primary">Edit</a>
                              <a href="manage-services.php?delid= " class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                           </td>
                     </tr>
                  <?php } ?>
               <?php } else { ?>
                  <tr>
                     <td colspan="7" style="color: red;">No Record Found</td>
                  </tr>
               <?php } ?> 
               </tbody>
            </table>
            <nav aria-label="Page navigation example">
               <ul class="pagination justify-content-end">
                  {{ $arrAllRecords->links() }}
               </ul>
            </nav>
         </div>
      </div>
   </div>
</div>
<!-- main content End-->
@endsection