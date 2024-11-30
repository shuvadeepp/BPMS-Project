@extends('portal.layouts.console') 
@section('innercontent')
<!-- main content start-->
<?php // echo'<pre>';print_r($arrEditRecord);exit; ?>
<div id="page-wrapper">
   <div class="main-page">
      <div class="tables">
         <h3 class="title1">View Appointment</h3>
         <div class="table-responsive bs-example widget-shadow">
            <h4>View Appointment:</h4>
            <table class="table table-bordered">
               <tr>
                  <th>Appointment Number</th>
                  <td> <?php echo $arrEditRecord->AptNumber ?> </td>
               </tr>
               <tr>
                  <th>Name</th>
                  <td> <?php echo $arrEditRecord->FullName ?> </td>
               </tr>
               <tr>
                  <th>Email</th>
                  <td> <?php echo $arrEditRecord->Email ?> </td>
               </tr>
               <tr>
                  <th>Mobile Number</th>
                  <td> <?php echo $arrEditRecord->MobileNumber ?> </td>
               </tr>
               <tr>
                  <th>Appointment Date</th>
                  <td> <?php echo date('d-m-Y', strtotime($arrEditRecord->AptDate)) ?> </td>
               </tr>
               <tr>
                  <th>Appointment Time</th>
                  <td> <?php echo date('h:i A', strtotime($arrEditRecord->AptTime)) ?> </td>
               </tr>
               <tr>
                  <th>Apply Date</th>
                  <td> <?php echo date('d-m-Y', strtotime($arrEditRecord->BookingDate)) ?></td>
               </tr>
               <tr>
                  <th>Message</th>
                  <td> <?php echo $arrEditRecord->Message ?>  </td>
               </tr>
               <tr>
                  <th>Status</th>
                  <td> <span class="badge text-bg-warning "> <?php echo $arrEditRecord->BOOKSTATUS ?> </span> </td>
               </tr>
            </table>
            <table class="table table-bordered">
               <?php if($arrEditRecord->Status == "") { ?>
               <form name="submit" method="post" enctype="multipart/form-data">
                  @csrf
                  <tr>
                     <th>Remark :</th>
                     <td> 
                        <input type="text" name="remark" id="remark" class="form-control" value="<?php echo !empty($arrEditRecord) ? $arrEditRecord->Remark : '' ?>">
                        <span class="errMsg_remark errDiv" style="color: red;"></span>
                     </td>
                  </tr>
                  <tr>
                     <th>Status :</th>
                     <td>
                        <select name="status" class="form-control wd-450">
                           <option value="0">--Select--</option>
                           <option value="1"> Approved </option>
                           <option value="2"> Rejected </option>
                        </select>
                     </td>
                  </tr>
                  <tr align="center">
                     <td colspan="2"><button type="submit" class="btn btn-primary">Submit</button></td>
                  </tr>
               </form>
            </table>
            <?php } else { ?>
               <table class="table table-bordered">
                  <tr>
                     <th>Remark</th>
                     <td> <?php echo $arrEditRecord->Remark ?> </td>
                  </tr>
                  <!-- <tr>
                     <th>Status</th>
                     <td> <?php //echo $arrEditRecord->BOOKSTATUS ?> </td>
                  </tr> -->
                  <tr>
                     <th>Remark date</th>
                     <td> <?php echo date('d-m-Y', strtotime($arrEditRecord->BookingDate)) ?> </td>
                  </tr>
               </table>
            <?php } ?>
         </div>
      </div>
   </div>
</div>
<!-- main content End-->
@endsection