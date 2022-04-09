@extends('layouts.app')

@section('content')
<script type="text/javascript" src="<?php echo url("js/edit_nicEditIcons-latest.js")?>"></script> <script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
  </script>
<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					
					
					
					<div class="row">
						<h3 class="title1">Edit News :</h3>
						<div class="form-three widget-shadow">
							<form class="form-horizontal" method="post" action="<?php echo url("updatenew");?>" enctype="multipart/form-data">
								
								<div class="form-group" >
									<label for="focusedinput" class="col-sm-2 control-label">Select Type:</label>
									<div class="col-sm-4">
										<select name="type" id="type_id" class="form-control" required>
										<option value="">Select Type</option>
										<option value="image" <?php if($ournew->type_name == 'image') { echo 'selected';} ?>>Image</option>
										<option value="video" <?php if($ournew->type_name == 'video') { echo 'selected';} ?>>Video</option>
										<option value="youtube" <?php if($ournew->type_name == 'youtube') { echo 'selected';} ?>>Youtube</option>
										<option value="vimeo" <?php if($ournew->type_name == 'vimeo') { echo 'selected';} ?>>Vimeo</option>
										</select>
									</div>
								
								</div> 
								
								
								<!------div class="form-group" id="doc_div" style="<?php echo (!in_array($ournew->type_name, array('image','video'))) ? 'display:none' : '' ?>">
									<label for="focusedinput" class="col-sm-2 control-label">Upload Image:</label>
									<div class="col-sm-4">
										<input type="file" class="form-control1" id="image" name="image" placeholder="Default Input">
										
										<input type="hidden" name="oldimg" value="<?php echo $ournew->image?>">									
										<input type="hidden" name="id" value="<?php echo $ournew->id;?>">									</div>
								
								</div------->
								
								<div class="form-group" id="doc_div" style="<?php echo (!in_array($ournew->type_name, array('image','video'))) ? 'display:none' : '' ?>">
									<label for="focusedinput" class="col-sm-2 control-label">Upload Image:</label>
									<div class="col-sm-4">
										<div id="doc_img_div" style="<?php echo ($ournew->type_name != 'image') ? 'display:none' : '' ?>">
											<input type="file" class="form-control1" id="image" name="image" onchange="validateimg(this,384,216)">
											<p class="notice" id="notice">(Preferred Image resolution in 384x216px Max 1 Mb)</p>
											
											
										<input type="hidden" name="oldimg" value="<?php echo $ournew->image?>">									
										<input type="hidden" name="id" value="<?php echo $ournew->id;?>">
										</div>
										<div id="doc_video_div" style="<?php echo ($ournew->type_name != 'video') ? 'display:none' : '' ?>">
											<input type="file" class="form-control1" name="text_video" id="text_video" accept=".mp4, .wmv, .mov, .avi, .mpg" onchange="validatevideo(this,50)">
										</div>
									</div> 
									
								</div>
								
								
								@csrf
								
								
							 
								<div class="form-group" id="video_div" style="<?php echo (!in_array($ournew->type_name, array('youtube','vimeo'))) ? 'display:none' : '' ?>">
									<label for="focusedinput" class="col-sm-2 control-label">Video Link :</label>
									<div class="col-sm-4">
										<input type="text" name="video_link" class="form-control" value="<?php //echo $ournew->video_link;?>" placeholder="Video Link">
										<p class="notice">(Please enter the embeded code)</p> 
									</div> 
								</div>
								
							 
								
								<div class="form-group">
									
									<div class="col-sm-2"></div>
									<div class="col-sm-10">
										 <?php if($ournew->type_name == 'image'){ ?> 
        							       <img src="<?php echo url("thumbnail/".$ournew->image);?>" class="img-responsive" style="max-width:300px">
        							       <?php }else if($ournew->type_name == 'video'){ ?>
            							       <video width="320" height="240" controls>
                                                  <source src="<?php echo url("uploads/".$ournew->image);?>" type="video/mp4">
                                                  <source src="<?php echo url("uploads/".$ournew->image);?>" type="video/mp4">
                                                 Your browser does not support the video tag.
                                                </video>
        						          <?php }else if($ournew->type_name == 'youtube' || $ournew->type_name == 'vimeo'){ ?>
            							       <!---iframe width="320" height="240" src="<?php echo $ournew->video_link;?>" frameborder="0" allowfullscreen></iframe---->
											   
											   <div class="vid">
												   {!! $ournew->video_link !!}
												   </div>
        							       <?php } ?> 	
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Title</label>
									<div class="col-sm-4">
										<input type="text" class="form-control1" name="title" value="<?php echo $ournew->title;?>">
									</div>
								</div>
								<div class="form-group">
									<label  class="col-sm-2 control-label">Description</label>
									<div class="col-sm-8">
										<textarea name="description" class="form-control" required rows="10"><?php echo $ournew->description;?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label  class="col-sm-2 control-label">Page Show:</label>
									<div class="col-sm-8">
										<label class="radio-inline">
										<input type="checkbox" name="is_home"  value="1" @if($ournew->is_home) checked @endif> Show on Home Page
										</label>
									</div>
								</div>
								<div class="form-group">
								
									<div class="col-sm-10" style="text-align:right">
										<input type="submit" class="btn btn-primary sbmt" value="Submit">
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
						console.log(width+"ssdsd"+height); 
                       /*  if (height > uheight || width > uwidth) {
                            alert("Please upload image with "+uwidth+"x"+uheight+" resolution.");
							fileUpload.value="";
                            return true;
                        }else{
                           
                            return true;
                        } */
						
						if(height != uheight || width != uwidth) {
							alert("Please upload image "+uwidth+"x"+uheight+" resolution.");
							fileUpload.value="";
							$(".sbmt").prop('disabled', true);
							return false;
						}else{
						   var size = parseFloat(fileUpload.files[0].size / 1024).toFixed(2);
							if(size > 1024){
								alert("Please upload max 1MB size image.");
								$(".sbmt").prop('disabled', true);
								return false;
							}else{
								$(".sbmt").prop('disabled', false);
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
			$(".sbmt").prop('disabled', true);
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
