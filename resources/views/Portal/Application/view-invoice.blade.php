@extends('portal.layouts.console') 
@section('innercontent')
<?php // echo'<pre>';print_r($arruserRecord);exit;?>
<div id="page-wrapper">
   <div class="main-page">
      <div class="tables" id="exampl">
         <h3 class="title1">Invoice Details</h3>
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
            <h4>Invoice #{{ $arruserRecord['BillingId'] }}</h4>
            <table class="table table-bordered" width="100%" border="1">
               <tr>
                  <th colspan="6">Customer Details</th>
               </tr>
               <tr>
                  <th>Name</th>
                  <td>  {{ $arruserRecord['FirstName'] . ' ' . $arruserRecord['LastName'] }} </td>
                  <th>Contact no.</th>
                  <td> {{ $arruserRecord['MobileNumber'] }} </td>
                  <th>Email </th>
                  <td> {{ $arruserRecord['Email'] }} </td>
               </tr>
               <tr>
                  <th>Registration Date</th>
                  <td> {{ date('d-m-Y', strtotime($arruserRecord['RegDate'])) }} </td>
                  <th>Invoice Date</th>
                  <td colspan="3"> {{ date('d-m-Y', strtotime($arruserRecord['invoicedate'])) }}  </td>
               </tr>
            </table>
            <table class="table table-bordered" width="100%" border="1">
                <tr>
                    <th colspan="3">Services Details</th>
                </tr>
                <tr>
                    <th>Sl#</th>
                    <th>Service</th>
                    <th>Cost</th>
                </tr>
                <?php $totalAmount=0; $count=1; foreach($arrAllRecord as $serviceInvoice){ ?>
                <tr>
                    <td><?php echo $count ?></td>
                    <th><?php echo $serviceInvoice['ServiceName'] ?></th>
                    <td> <i class="fa fa-inr"></i> <?php echo $itemCost = $serviceInvoice['Cost'] ?></td> 
                </tr>
                <?php $totalAmount+=$itemCost; $count++; } ?>
                <tr>
                    <th colspan="2" style="text-align:center">Grand Total</th>
                    <th> <i class="fa fa-inr"></i> <?php echo $totalAmount ?></th>
                </tr>
            </table>
            <p style="margin-top:1%"  align="center">
               <i class="fa fa-print fa-2x" style="cursor: pointer;"  OnClick="CallPrint(this.value)" ></i>
            </p>
         </div>
      </div>
   </div>
</div>
<script>
    function CallPrint(strid) {
      var prtContent = document.getElementById("exampl");
      var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
      WinPrint.document.write(prtContent.innerHTML);
      WinPrint.document.close();
      WinPrint.focus();
      WinPrint.print();
      WinPrint.close();
    }
</script>
@endsection