@extends('portal.layouts.console') 
@section('innercontent')
<!-- main content start-->
<?php //echo'<pre>';print_r($appointmntAllArrRecords);exit; ?>
<div id="page-wrapper">
   <div class="main-page">
      <div class="tables">
         <h3 class="title1">All Appointment</h3>
         
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
            <h4>All Appointment:</h4>


            <form method="post">
            @csrf
                <label for=""> Filter :</label>
                <select class="form-select" name="filterStatus" id="filterStatus">
                    <option value="0">All List</option> 
                    <option value="1" {{ (isset($filterStatus) && $filterStatus == 1) ? 'selected' : '' }}> Accepted </option>
                    <option value="2" {{ (isset($filterStatus) && $filterStatus == 2) ? 'selected' : '' }}> Rejected </option>
                    <option value="3" {{ (isset($filterStatus) && $filterStatus == 3) ? 'selected' : '' }}> Complete </option>
                    
                </select>&nbsp;&nbsp;
                <button type="submit" class="btn btn-outline-primary">Search</button>
            </form><br>


            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>#</th>
                     <th> Appointment Number</th>
                     <th>Name</th>
                     <th>Mobile Number</th>
                     <th>Appointment Date</th>
                     <th>Appointment Time</th>
                     <th>Applied Date</th>
                     <th>Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                <?php $i = 1; if($appointmntAllArrRecords) { ?>
                <?php foreach($appointmntAllArrRecords as $appmnt) { // echo'<pre>';print_R($appmnt); ?>
                    <tr>
                        <th scope="row"> {{ $i++ }} </th>
                        <td> <b>{{ $appmnt->AptNumber }}</b> </td> 
                        <td> {{ !empty($appmnt->FullName) ? $appmnt->FullName : ' NA ' }} </td> 
                        <td> {{ !empty($appmnt->MobileNumber) ? $appmnt->MobileNumber : ' NA ' }} </td> 
                        <td> {{ date('d-m-Y', strtotime($appmnt->AptDate)) }} </td> 
                        <td> {{ date('h:i A', strtotime($appmnt->AptTime)) }} </td>  
                        <?php if($appmnt->Status == '1') { ?>
                            <td style="color: green; font-weight: bold;"> {{ date('h:i A', strtotime($appmnt->BookingDate)) }} </td>  
                        <?php }elseif($appmnt->Status == '2') { ?>
                            <td style="color: red; font-weight: bold;"> {{ date('h:i A', strtotime($appmnt->BookingDate)) }} </td>  
                        <?php }elseif($appmnt->Status == '') { ?>
                            <td style="font-weight: bold;"> {{ date('h:i A', strtotime($appmnt->BookingDate)) }} </td>  
                        <?php }elseif($appmnt->Status == 3) { ?>
                            <td style="color: gray; font-weight: bold;"> {{ date('h:i A', strtotime($appmnt->BookingDate)) }} </td>  
                        <?php } ?>
                        
                        <?php if($appmnt->Status == '1') { ?>
                        <td><span class="badge text-bg-success"> Approve </span></td>  
                        <?php }elseif($appmnt->Status == '2') { ?>
                        <td><span class="badge text-bg-danger">  Rejected  </span></td>  
                        <?php }elseif($appmnt->Status == '') { ?>
                        <td><span class="badge text-bg-warning ">  Not Updated Yet  </span></td>  
                        <?php }elseif($appmnt->Status == '3') { ?>
                            <td><span class="badge text-bg-warning ">  Completed  </span></td>  
                        <?php
                        }
                            $strParam   = encrypt(json_encode($appmnt->ID)); 
                            $strEnc = str_replace('=','',$strParam);     
                            // echo $strEnc;
                        ?>
                        @if(!empty($appmnt->FullName) && !empty($appmnt->MobileNumber))
                        <td><a href="<?php echo ADMIN_MANAGEAPP . 'viewAppointmnt/' . $strEnc ?>" class="btn btn-primary">View</a>
                            <a href="" class="btn btn-danger" onClick=" ">Delete</a>
                        </td> 
                        @endif
                    </tr>
                    <?php } } ?>
               </tbody>
            </table>
                <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    {{ $appointmntAllArrRecords->links() }}
                </ul>
                </nav>
         </div>
      </div>
   </div>
</div>
<!-- main content End-->
@endsection