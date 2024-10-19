@extends('portal.layouts.console') 
@section('innercontent')
<?php // echo'<pre>';print_r($assignServiceAllRecord);exit; ?>
<!-- main content start-->
<div id="page-wrapper">
   <div class="main-page">
      <div class="tables">
         <h3 class="title1">Assign Services</h3>
         <div class="table-responsive bs-example widget-shadow">
            <h4>Assign Services:</h4>
            <form method="post">
               @csrf
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Service Name</th>
                        <th>Service Price</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; if($assignServiceAllRecord) {  ?>
                  <?php foreach($assignServiceAllRecord as $record) { //echo'<pre>';print_R($record); ?>
                     <tr>
                        <th scope="row"> {{ $i++ }} </th>
                        <td> {{ $record->ServiceName }} </td> 
                        <td> ₹ {{ $record->Cost }} </td> 
                        <td>
                           <input type="checkbox" name="sids[]" value="<?php echo $record->ID ?> " >
                           
                        </td>
                     </tr>
                  <?php } }?>
                     <tr>
                        <td colspan="4" align="center">
                           <button type="submit" name="submit" class="btn btn-primary">Submit</button>		
                        </td>
                     </tr>
                  </tbody>
               </table>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection