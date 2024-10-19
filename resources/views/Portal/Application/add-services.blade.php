@extends('portal.layouts.console') 
@section('innercontent')
<!-- main content start-->
<?php //print_r($editServiceData);exit; ?>
<div id="page-wrapper">
   <div class="main-page">
      <div class="forms">
         <h3 class="title1">{{ $buttonVal }}</h3>
         <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
               <h4>Parlour Services:</h4>
            </div>
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
            <div class="form-body">
               <form method="post" enctype="multipart/form-data">
               @csrf
                <p style="font-size:16px; color:red" align="center">  </p>
                <div class="form-group"> 
                    <label for="serviceName">Service Name</label> 
                    <input type="text" class="form-control" id="serviceName" name="serviceName" placeholder="Service Name" value="<?php echo !empty($editServiceData['ServiceName']) ? $editServiceData['ServiceName'] : '' ?>" > 
                    <span class="errMsg_serviceName errDiv" style="color: red;"></span>
                </div>
                <div class="form-group"> 
                    <label for="serviceDesc">Service Description</label> 
                    <textarea type="text" class="form-control" id="serviceDesc" name="serviceDesc" placeholder="Service Description" value=""><?php echo !empty($editServiceData['ServiceDescription']) ? $editServiceData['ServiceDescription']: ''; ?></textarea> 
                    <span class="errMsg_serviceDesc errDiv" style="color: red;"></span>
                </div>
                <div class="form-group"> 
                    <label for="serviceCost">Cost</label>  
                    <input type="text" class="form-control" id="serviceCost" name="serviceCost" placeholder="Service Name" value="<?php echo !empty($editServiceData['Cost']) ? $editServiceData['Cost'] : '' ?>" > 
                    <span class="errMsg_serviceCost errDiv" style="color: red;"></span>
                </div>
                <div class="form-group"> 
                    <label for="serviceImage">Images</label> 
                    <input type="hidden" class="form-control" id="hdnServiceImage" name="hdnServiceImage" value="<?php echo !empty($editServiceData['Image']) ? $editServiceData['Image'] : ''; ?>"> 
                    <input type="file" class="form-control" id="serviceImage" name="serviceImage"> 
                    <span class="errMsg_serviceImage errDiv" style="color: red;"></span>
                    <small style="color: red;">* Image types should be jpeg, png, or jpg. The maximum image size should be 1 Mb.</small>
                </div>
                  <button type="submit" name="submit" class="btn btn-default" onclick="return validator();"><?php echo $buttonVal; ?></button> 
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   /* :::::::::: FILE UPLOAD VALIDATION START :::::::::: */
   function validateFile(controlId, message, allowedExtensions) {
      const fileInput = document.getElementById(controlId);
      const file = fileInput.files[0];

      if (!file) {
         // Handle the case where no file is selected (already validated in your validator function)
         return true;
      }

      const allowedExtensionsArray = allowedExtensions.split(',');
      const fileExtension = file.name.split('.').pop().toLowerCase();

      if (!allowedExtensionsArray.includes(fileExtension)) {
         const errorMessage = `${message} (Only ${allowedExtensions} are allowed.)`;
         $('.errMsg_' + controlId).html(errorMessage).show();
         fileInput.value = ''; // Clear the file selection
         return false;
      }

   return true;
   }
/* :::::::::: FILE UPLOAD VALIDATION END :::::::::: */
   function validator(){
      $('.errDiv').hide();
      $('.error-input').removeClass('error-input');

      if (!blankCheck('serviceName', 'Service Name can not be blank'))
         return false;
      if (!blankCheck('serviceDesc', 'Service Description can not be blank'))
         return false;
      if (!blankCheck('serviceCost', 'Service Cost can not be blank'))
         return false;
      if (!validateNumber('serviceCost', 'Service Cost required only Number'))
         return false;
      if (!blankCheck('serviceImage', 'service Image can not be blank'))
         return false; 
      
      const serviceImage = $('#serviceImage').val();
      if (!serviceImage) { 
         return true;
      }

      if (!validateFile('serviceImage', 'Invalid file types. Upload only ', 'jpg,png,jpeg')) {
         return false;
      } 

   }
</script>
<!-- main content End-->
@endsection