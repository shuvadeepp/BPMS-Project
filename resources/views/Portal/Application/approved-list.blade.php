@extends('portal.layouts.console') 
@section('innercontent')
<div id="page-wrapper">
   <div class="main-page">
      <div class="tables">
         <h3 class="title1">Approved List</h3>
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
         <div class="table-responsive bs-example widget-shadow">
            <h4>Approved List:</h4>
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Name</th>
                     <th>Appointment No.</th>
                     <th>Mobile Number</th>
                     <th>Email</th>
                     <th>Approved Date</th> 
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
               <?php $i = 1; if($arrAllRecord) { ?>
                <?php foreach($arrAllRecord as $record) {  //echo'<pre>';print_R($record); ?>
                  <tr>
                     <th scope="row">{{ $i++ }}</th>
                     <td> 
                        {{ !empty($record->FirstName) ? $record->FirstName . ' ' . $record->LastName : ' NA ' }} 
                       
                           <!-- <p style="font-weight: bold;">Your Invoice ID: <span style="color: red; font-weight: bold;"> </span></p>
                           <p style="font-weight: bold;">Invoice Date: <span style="color: red; font-weight: bold;"> </span></p> -->
                        
                     </td> 
                     <td> {{ $record->AptNumber }} </td> 
                     <td> {{ $record->MobileNumber }} </td> 
                     <td> {{ $record->Email }} </td> 
                     <td> {{ date('d-m-Y', strtotime($record->BookingDate)) }} </td>  
                     <?php 

                        $strParam   = encrypt(json_encode($record->ID)); 
                        $strEnc = str_replace('=','',$strParam);  
                        $strBillIdParam   = encrypt(json_encode($record->billGenerateId));  
                        $strBillIdEnc = str_replace('=','',$strBillIdParam);    
                        // $strParambilling   = encrypt(json_encode($record->BillingId)); 
                        // $strEncinvoice = str_replace('=','',$strParambilling);     
                        // echo $strBillIdEnc;
                     ?>
                     <td>  
                        @if($record->approvedStatus != 1)
                        <a href="<?php echo ADMIN_MANAGEAPP . 'assignService/' . $strEnc ?>" class="btn btn-primary">Assign Services</a>
                        @else
                        <a href="<?php echo ADMIN_MANAGEAPP . 'printInvoice/' . $strBillIdEnc ?>" class="btn btn-success">Generate Receipt</a>
                        @endif 
                     </td>
                  </tr>
                  <?php } } else { ?>
                    <td> No Record Found </td> 
                  <?php } ?>
               </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    {{ $arrAllRecord->links() }}
                </ul>
            </nav>
         </div>
      </div>
   </div>
</div>
@endsection