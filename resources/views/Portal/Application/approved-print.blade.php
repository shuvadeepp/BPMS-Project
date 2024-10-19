@extends('portal.layouts.console') 
@section('innercontent')
<?php //echo'<pre>111';print_r($printAllRecord);exit;?>
<div id="page-wrapper">
   <div class="main-page">
      <div class="tables">
         <h3 class="title1">Invoice List</h3>
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
            <h4>Invoice List:</h4>
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Invoice Id</th>
                     <th>Customer Name	</th>
                     <th>Mobile No.</th>
                     <th>Invoice Date</th>
                     <!-- <th>Appintment No.</th>  -->
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
               <?php $i = 1; if($printAllRecord) { ?>
                <?php foreach($printAllRecord as $record) {  //echo'<pre>';print_R($record); ?>
                  <tr>
                     <th scope="row">{{ $i++ }}</th>
                     <td style="font-weight: bold;"> {{ $record->BillingId }} </td> 
                     <td> 
                        {{ !empty($record->FirstName) ? $record->FirstName . ' ' . $record->LastName : ' NA ' }} 
                       
                           <!-- <p style="font-weight: bold;">Your Invoice ID: <span style="color: red; font-weight: bold;"> </span></p>
                           <p style="font-weight: bold;">Invoice Date: <span style="color: red; font-weight: bold;"> </span></p> -->
                        
                     </td> 
                     
                     <td> {{ $record->MobileNumber }} </td>  
                     <td> {{ date('d-m-Y', strtotime($record->PostingDate)) }} </td>  
                     <?php 

                        // $strParam   = encrypt(json_encode($record->ID)); 
                        // $strEnc = str_replace('=','',$strParam);     
                        $strParambilling   = encrypt(json_encode($record->BillingId)); 
                        $strEncinvoice = str_replace('=','',$strParambilling);     
                        // echo $strEnc;
                     ?>
                     <td>  
                        <!-- <a href="<?php // echo ADMIN_MANAGEAPP . 'assignService/' . $strEnc ?>" class="btn btn-primary">Assign Services</a> -->
                   
                        <!-- <a href="" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?')">Delete</a> -->
                   
                           <a href="<?php  echo ADMIN_MANAGEAPP . 'printInvoice/' . $strEncinvoice ?>" class="btn btn-danger" title="Print invoice">  <i class="fa fa-print" aria-hidden="true"></i> Download </a>
                      
                     </td>
                  </tr>
                  <?php } } else { ?>
                    <td> No Record Found </td> 
                  <?php } ?>
               </tbody>
            </table>
            <nav aria-label="Page navigation example">
               <ul class="pagination justify-content-end">
                  {{ $printAllRecord->links() }}
               </ul>
            </nav>
         </div>
      </div>
   </div>
</div>
@endsection