@extends('layouts.app')



@section('content')

<script type="text/javascript" src="<?php echo url("js/nicEdit-latest.js")?>"></script> <script type="text/javascript">

//<![CDATA[

        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });

  //]]>

  </script>

<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
				<h3 class="title1">Post A Blog:</h3>
					<div class="row">
						<div class="form-three widget-shadow">
							<form class="form-horizontal" method="post" action="{{url('post-blog')}}" enctype="multipart/form-data">
								@csrf
							<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Banner Image:</label>
									<div class="col-sm-8">
										<input type="file" class="form-control1"id="image1" name="image1" placeholder="Default Input" onchange="validateimg(this,1920,350)">
										<p class="notice">(Preferred Image resolution in 1920x350px Max 1 Mb)</p>
									</div>
								</div>
								<div class="form-group">
									<label  class="col-sm-2 control-label">Title:</label>
									<div class="col-sm-8">
										<input name="title" class="form-control" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Description</label>
									<div class="col-sm-8">
										<textarea name="description" class="form-control"  rows="10"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label  class="col-sm-2 control-label">Meta Keywords:</label>
									<div class="col-sm-8">
										<input name="metakeywords" class="form-control" required>
									</div>
								</div>
							    <div class="form-group">

									<label  class="col-sm-2 control-label">Meta Description:</label>
									<div class="col-sm-8">
										<input name="metadescription" class="form-control" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Select Type:</label>
									<div class="col-sm-4">
										<select name="type" id="type_id" class="form-control" required>
										<option value="">Select Type</option>
										<option value="image">Image</option>
										<option value="video">Video</option>
										<option value="youtube">Youtube</option>
										<option value="vimeo">Vimeo</option>
										</select>
									</div>
								</div> 
								<div class="form-group" id="doc_div" style="display:none"> 
									<label for="focusedinput" class="col-sm-2 control-label">Upload Image:</label>
									<div class="col-sm-4">
										<div id="doc_img_div">
											<input type="file" class="form-control1" id="image" name="image" onchange="validateimg(this,500,281)">
											   <p class="notice" id="notice">(Preferred Image resolution in 500x281px Max 1 Mb)</p>
										</div>
										<div id="doc_video_div">
											<input type="file" class="form-control1" name="text_video" id="text_video" accept=".mp4, .wmv, .mov, .avi, .mpg" onchange="validatevideo(this,50)">
										</div>
									</div> 
									
								</div>
								<div class="form-group" id="video_div" style="display:none">
									<label for="focusedinput" class="col-sm-2 control-label">Video Link :</label>
									<div class="col-sm-4">
										<input type="text" name="video_link" class="form-control" placeholder="Video Link">
										<p class="notice">(Please enter the embeded code)</p> 
									</div> 
								</div>
							   <!-- <div class="form-group">
									<label  class="col-sm-2 control-label">Upload Image:</label>
									<div class="col-sm-8">
										<input name="image" type="file" class="form-control" required onchange="validateimg(this,500,281)">
										 <p class="notice">(Preferred Image resolution in 500x281px Max 1 Mb)</p>
									</div>
								</div>-->
							<div class="form-group">
								<label  class="col-sm-2 control-label">Page Status:</label>
								<div class="col-sm-8">
									<label class="radio-inline">
									<input type="radio" name="status" checked value="1"> Active
									</label>
									<label class="radio-inline">
									<input type="radio" name="status" value="0"> Inactive
									</label>
								</div>
							</div>
							<div class="form-group">
								<label  class="col-sm-2 control-label">Page Show:</label>
								<div class="col-sm-8">
									<label class="radio-inline">
									<input type="checkbox" name="is_home"  value="1"> Show on Home Page
									</label>
								</div>
							</div>
								<div class="form-group">
										<div class="col-sm-10" style="text-align:right">
										<input type="submit" class="btn btn-primary" value="Submit">
									</div>
								</div>
							</div>
								
							</form>

						</div>

					</div>

					

					

					

				</div>

			</div>

		</div>

	

	<script>

		

		function validateimg(ctrl,uwidth,uheight) { 

		

        var fileUpload = ctrl;

        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif)$");

        if (regex.test(fileUpload.value.toLowerCase())) {

            if (typeof (fileUpload.files) != "undefined") {

                var reader = new FileReader();

                reader.readAsDataURL(fileUpload.files[0]);

                reader.onload = function (e) {

                    var image = new Image();

                    image.src = e.target.result;

                    image.onload = function () {

                        var height = this.height;

                        var width = this.width;

						 

                        /* if (height > uheight || width > uwidth) {

                            alert("Please upload image with "+uwidth+"x"+uheight+" resolution.");

							fileUpload.value="";

                            return true;

                        }else{

                           

                            return true;

                        } */
						
						if(height != uheight || width != uwidth) {
							alert("Please upload image "+uwidth+"x"+uheight+" resolution.");
							fileUpload.value="";
							return false;
						}else{
						   var size = parseFloat(fileUpload.files[0].size / 1024).toFixed(2);
							if(size > 1024){
								alert("Please upload max 1MB size image.");
								return false;
							}else{
								return true;
							}
						}

                    };

                }

            } else {

                alert("This browser does not support HTML5.");

                return false;

            }

        } else {
            alert("Please select a valid Image file.");

            return false;

        }

    }

	
function validatevideo(ctrl, file_size){			
			var fileUpload = ctrl;
			var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.mp4|.wmv|.mov|.avi|.mpg)$");
			if (regex.test(fileUpload.value.toLowerCase())) {
				if (typeof (fileUpload.files) != "undefined") {
					var size = Math.floor(fileUpload.files[0].size / 1000000);
					if(size >= 50){
						alert("Please upload max 50MB size video.");
						$(".sbmt").prop('disabled', true);
						return false;
					}else{
						$(".sbmt").prop('disabled', false);
						return true;
					}
				} else {
					alert("This browser does not support HTML5.");
					return false;
				}
			} else {
				alert("Please select a valid Image file.");
				document.getElementById('image').value = "";
				$(".sbmt").prop('disabled', false);
				return false;
			}
		}
	</script>	

	

<script>

$(document).ready(function () {

   /* $("#type_id").change(function () {

       if ($(this).val() == 'youtube' || $(this).val() == 'vimeo') {

           $("#video_div").show();

           $("#doc_div").hide();

       } else {

           if ($(this).val() == 'video') {

            $("#notice").hide();

           }

           $("#doc_div").show();

           $("#video_div").hide();

       }

   }); */
   
   
   $("#type_id").change(function () {
	   $(".sbmt").prop('disabled', false);
	   $("input[type=file]").val('');
       if ($(this).val() == 'youtube' || $(this).val() == 'vimeo') {
           $("#video_div").show();
           $("#doc_div").hide();
       } else {
           
            if ($(this).val() == 'video') {
            $("#notice").hide();
            $("#doc_video_div").show();
            $("#doc_img_div").hide();
           }else{
            $("#doc_video_div").hide();
            $("#doc_img_div").show(); 
				$("#notice").show();
           }
           $("#doc_div").show();
           $("#video_div").hide();
       }
   });

});

</script>

@endsection

