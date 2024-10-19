@extends('portal.layouts.console') 
@section('innercontent')
<?php // echo'<pre>';print_r($aboutusArrAllRecords);exit; ?>
 

<!-- main content start-->
<div id="page-wrapper">
<div class="main-page">
   <div class="forms">
      <h3 class="title1">Update About Us</h3>
      <div class="form-grids row widget-shadow" data-example-id="basic-forms">
         <div class="form-title">
            <h4>Update About Us:</h4>
         </div>
         <div class="form-body">
            <form method="post" enctype="multipart/form-data">
            @csrf
            <p style="font-size:16px; color:red" align="center"> 
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
            </p>
            <div class="form-group"> 
                    <label for="pagetitle_one">Page Title 1: </label> 
                    <input type="text" class="form-control" name="pagetitle_one" id="pagetitle_one" value="<?php echo !empty($aboutusArrAllRecords['PageTitleOne']) ? $aboutusArrAllRecords['PageTitleOne'] : '' ?>"> 
                    <span class="errMsg_pagetitle_one errDiv" style="color: red;"></span>
                </div>
               <div class="form-group"> 
                    <label for="pagetitle_two">Page Title 2: </label> 
                    <input type="text" class="form-control" name="pagetitle_two" id="pagetitle_two" value="<?php echo !empty($aboutusArrAllRecords['PageTitleTwo']) ? $aboutusArrAllRecords['PageTitleTwo'] : '' ?>"> 
                    <span class="errMsg_pagetitle_two errDiv" style="color: red;"></span>
                </div>
               <div class="form-group"> 
                    <label for="pagedes">Page Description: </label>
                    <textarea name="pagedes" id="pagedes" rows="5" class="form-control"> <?php echo !empty($aboutusArrAllRecords['PageType']) ? htmlspecialchars($aboutusArrAllRecords['PageDescription'],ENT_QUOTES) : '' ?> </textarea> 
                    <span class="errMsg_pagedes errDiv" style="color: red;"></span>
               </div>

               <div class="form-group"> 
                    <label for="tagParlourMenu">Add Palour Menu: </label>
                    <input type="text" class="form-control" name="tagParlourMenu" id="tagParlourMenu" data-role="tagsinput" value="<?php echo $tagMenus; ?>" placeholder="You can add muliple menu"> 
                    <small style="color: red;">* Maximum 8 menu items are available for addition.</small><br>
                    <span class="errMsg_tagParlourMenu errDiv" style="color: red;"></span>
               </div>

               <div class="form-group"> 
                    <input type="hidden" class="form-control" id="hdnAboutusCoverImg_One" name="hdnAboutusCoverImg_One" value="<?php echo !empty($aboutusArrAllRecords['CoverImgOne']) ? $aboutusArrAllRecords['CoverImgOne'] : ''; ?>"> 
                    <label for="aboutusCoverImg_One">Upload Cover Image 1:  </label>
                    <span class="errMsg_aboutusCoverImg_One errDiv" style="color: red;"></span>
                    <input type="file" class="form-control" id="aboutusCoverImg_One" name="aboutusCoverImg_One">  
                    <small style="color: red;">* Image types should be jpeg, png, or jpg. The maximum image size should be 1 Mb.</small><br>
                    <small >Uploaded Image: </small>
                    <img src="{{ STORAGE_PATH . 'AboutUs/' . $aboutusArrAllRecords['CoverImgOne'] }}" alt="Service Image" height="50" width="100">
               </div>
               <div class="form-group"> 
                    <input type="hidden" class="form-control" id="hdnAboutusCoverImg_Two" name="hdnAboutusCoverImg_Two" value="<?php echo !empty($aboutusArrAllRecords['CoverImgTwo']) ? $aboutusArrAllRecords['CoverImgTwo'] : ''; ?>">  
                    <label for="aboutusCoverImg_Two">Upload Cover Image 2: </label>
                    <span class="errMsg_aboutusCoverImg_Two errDiv" style="color: red;"></span>
                    <input type="file" class="form-control" id="aboutusCoverImg_Two" name="aboutusCoverImg_Two"> 
                    <small style="color: red;">* Image types should be jpeg, png, or jpg. The maximum image size should be 1 Mb.</small><br>
                    <small>Uploaded Image: </small>
                    <img src="{{ STORAGE_PATH . 'AboutUs/' . $aboutusArrAllRecords['CoverImgTwo'] }}" alt="Service Image" height="50" width="100">
               </div>
 
               <button type="submit" name="submit" class="btn btn-default" onclick="return validator();">Update</button> 
            </form>
         </div>
      </div>
   </div>
</div>   

<script>
   $(document).ready(function() {
      $("#tagParlourMenu").tagsinput({
         maxTags: 8
      }); 
   }); 
   
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

      if (!blankCheck('pagetitle_one', 'Page title one can not be blank'))
         return false;
      if (!blankCheck('pagetitle_two', 'Page title two can not be blank'))
         return false;

      if (!blankCheck('pagedes', 'Page description can not be blank'))
         return false;
      if (!blankCheck('pagetitle_two', 'Page title two can not be blank'))
         return false;

      if (!blankCheck('tagParlourMenu', 'Palour Menu can not be blank'))
         return false;

      if (!blankCheck('aboutusCoverImg_One', 'Cover Image One can not be blank'))
         return false;
      if (!blankCheck('aboutusCoverImg_Two', 'Cover Image Two can not be blank'))
         return false;

      

      const aboutusCoverImg_One = $('#aboutusCoverImg_One').val();
      if (!aboutusCoverImg_One) { 
         return true;
      }

      if (!validateFile('aboutusCoverImg_One', 'Invalid file types. Upload only ', 'jpg,png,jpeg')) {
         return false;
      } 

      const aboutusCoverImg_Two = $('#aboutusCoverImg_Two').val();
      if (!aboutusCoverImg_Two) { 
         return true;
      }

      if (!validateFile('aboutusCoverImg_Two', 'Invalid file types. Upload only ', 'jpg,png,jpeg')) {
         return false;
      } 
   }
</script>
@endsection