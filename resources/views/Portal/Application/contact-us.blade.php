@extends('portal.layouts.console') 
@section('innercontent')
<?php //echo'<pre>';print_r($contactusArrAllRecords);exit;?>
<!-- main content start-->
<div id="page-wrapper">
   <div class="main-page">
      <div class="forms">
         <h3 class="title1">Update Contact Us</h3>
         <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
               <h4>Update Contact Us:</h4>
            </div>
            <div class="form-body">
               <form method="post">
               @csrf
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
                <div class="form-group" hidden> 
                    <label for="pagetitle">Page Title</label> 
                    <input type="text" class="form-control" name="pagetitle" id="pagetitle" value="<?php echo !empty($contactusArrAllRecords['PageTitleOne']) ? $contactusArrAllRecords['PageTitleOne'] : '' ?>"> 
                </div>
                  <div class="form-group"> 
                    <label for="exampleInputEmail1">Email</label> 
                    <input type="text" class="form-control" name="email" id="email" value="<?php echo !empty($contactusArrAllRecords['Email']) ? $contactusArrAllRecords['Email'] : '' ?>"> 
                </div>
                <div class="form-group"> 
                    <label for="exampleInputEmail1">Mobile Number</label> 
                    <input type="text" class="form-control" name="mobnumber" id="mobnumber" value="<?php echo !empty($contactusArrAllRecords['MobileNumber']) ? $contactusArrAllRecords['MobileNumber'] : '' ?>"> 
                </div>
                  <div class="form-group"> 
                    <label for="exampleInputEmail1">Timing</label> 
                    <input type="text" class="form-control" name="timing" id="timing" value="<?php echo !empty($contactusArrAllRecords['Timing']) ? $contactusArrAllRecords['Timing'] : '' ?>"> </div>
                <div class="form-group"> 
                    <label for="exampleInputPassword1">Page Description</label> 
                    <textarea name="pagedes" id="pagedes" rows="5" class="form-control">  <?php echo !empty($contactusArrAllRecords['PageDescription']) ? htmlspecialchars($contactusArrAllRecords['PageDescription'], ENT_QUOTES) : '' ?> </textarea> 
                </div>
                <button type="submit" name="submit" class="btn btn-default">Update</button> 
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection