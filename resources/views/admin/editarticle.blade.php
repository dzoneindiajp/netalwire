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
						<h3 class="title1">Edit Article :</h3>
						<div class="form-three widget-shadow">
							<form class="form-horizontal" method="post" action="<?php echo url("updatearticle");?>" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="id" value="<?php echo $editarticle->id;?>">
							<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Select Type:</label>
									<div class="col-sm-4">
                                <select name="type_name" id="type_id" class="form-control" required>
                                <option value="">Select Type</option>
                                <option value="image" @if($editarticle->type_name=='image') selected @endif>Image</option>
                                <option value="video" @if($editarticle->type_name=='video') selected @endif>Video</option>
                                <option value="youtube" @if($editarticle->type_name=='youtube') selected @endif>Youtube</option>
								<option value="vimeo" @if($editarticle->type_name=='vimeo') selected @endif>Vimeo</option>
                                </select>
									</div>
								
								</div>
								
								<div class="form-group" id="doc_div" style="<?php echo (!in_array($editarticle->type_name, array('image','video'))) ? 'display:none' : '' ?>">
									<label for="focusedinput" class="col-sm-2 control-label">Upload Image/Video:</label>
									<div class="col-sm-4">
										<!--<input type="file" class="form-control1" id="image" name="image" placeholder="Default Input">-->
										
										<div id="doc_img_div">
                                    <input type="file" class="form-control1" id="image" name="image" onchange="validateimg(this,600,337)">
										 <p class="notice">(Preferred Image resolution in 600x337px Max 1 Mb)</p>
                                    </div>
                                    <div id="doc_video_div">
                                    <input type="file" class="form-control1" name="text_video" id="text_video"  accept=".mp4, .wmv, .mov, .avi, .mpg" onchange="validatevideo(this,50)">
                                    </div>
										
										
									<!--	<img src="<?php echo url("uploads/".$editarticle->image);?>" style="height:200px;">-->
										 
										 @if($editarticle->type_name=='image')
                                        <img src="<?php echo url("uploads/".$editarticle->image);?>" class="img-responsive" style="width:200px;height:200px;">
                                        @elseif($editarticle->type_name == 'video')
                                        <video width="200" height="200" controls>
                                        <source src="<?php echo url("uploads/".$editarticle->image);?>" type="video/mp4">
                                        <source src="<?php echo url("uploads/".$editarticle->image);?>" type="video/mp4">
                                        Your browser does not support the video tag.
                                        </video>
                                         @else
											<!----iframe width="320" height="240" src="<?php echo $editarticle->video_link;?>" frameborder="0" allowfullscreen></iframe---->
										
										 <div class="vid">
									   {!! $editarticle->video_link !!}
									   </div>
                                        @endif
										
										<input type="hidden" name="oldimg" value="<?php echo $editarticle->image?>">									
										</div>
								
								</div>
								
								<div class="form-group" id="video_div" style="<?php echo (!in_array($editarticle->type_name, array('youtube','vimeo'))) ? 'display:none' : '' ?>">
									<label for="focusedinput" class="col-sm-2 control-label">Video Link :</label>
									<div class="col-sm-4">
										<input type="text" name="video_link" class="form-control" value="<?php //echo $editarticle->video_link;?>" placeholder="Video Link">
										<p class="notice">(Please enter the embeded code)</p>
										
										@if($editarticle->type_name=='image')
                                        <img src="<?php echo url("uploads/".$editarticle->image);?>" class="img-responsive" style="width:200px;height:200px;">
                                        @elseif($editarticle->type_name == 'video')
                                        <video width="200" height="200" controls>
                                        <source src="<?php echo url("uploads/".$editarticle->image);?>" type="video/mp4">
                                        <source src="<?php echo url("uploads/".$editarticle->image);?>" type="video/mp4">
                                        Your browser does not support the video tag.
                                        </video>
                                         @else
                                      <!----iframe width="320" height="240" src="<?php echo $editarticle->video_link;?>" frameborder="0" allowfullscreen></iframe---->
								  
								   <div class="vid">
									   {!! $editarticle->video_link !!}
									   </div>
                                        @endif
										
									</div> 
								</div>
								
								<!--<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Upload Image:</label>
									<div class="col-sm-4">
										<input type="file" class="form-control1" id="image" name="image" placeholder="Default Input">
										<img src="<?php echo url("uploads/".$editarticle->image);?>" style="height:200px;">
										<input type="hidden" name="oldimg" value="<?php echo $editarticle->image?>">									
										</div>
								
								</div>-->
								
							<div class="form-group">
									<label class="col-sm-2 control-label">Short Description</label>
									<div class="col-sm-4">
										<input type="text" class="form-control1" name="short_desc" value="<?php echo $editarticle->short_description;?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Title</label>
									<div class="col-sm-4">
										<input type="text" class="form-control1" name="title" value="<?php echo $editarticle->title;?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Content</label>
									<div class="col-sm-8">
										<!--<input type="text" class="form-control1" name="content" value="<?php echo $editarticle->content;?>">-->
									<textarea class="form-control1" name="content" placeholder="Content" rows="10" ><?php echo $editarticle->content;?></textarea>

									</div>
								</div>
							
    						<div class="form-group">
    							<label for="focusedinput" class="col-sm-2 control-label">Redirection Url :</label>
    							<div class="col-sm-8">
    								<input type="text" name="redirection_url" class="form-control" value="{{$editarticle->redirection_url??''}}" placeholder="Redirection Url">
    								<p class="notice">(Redirection Url only for image)</p> 
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
       
       var type_name=$("#type_id").val();
       if (type_name== 'video') {
                 $("#notice").hide();
                 $("#doc_video_div").show();
                 $("#doc_img_div").hide();
                 }else{
                 $("#doc_video_div").hide();
                 $("#doc_img_div").show();   
                 }
       
    });
</script>	

<script>
@endsection
