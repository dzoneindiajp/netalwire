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
					
					
					
					<div class="row">
						<h3 class="title1">News :</h3>
						<div class="form-three widget-shadow">
							<form class="form-horizontal" method="post" action="<?php echo url("savenews");?>" enctype="multipart/form-data">
							@csrf
							
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
											<input type="file" class="form-control1" id="image" name="image" onchange="validateimg(this,384,216)">
											<p class="notice" id="notice">(Preferred Image resolution in 384x216px Max 1 Mb)</p>
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
								<div class="form-group">
									<label class="col-sm-2 control-label">Title</label>
									<div class="col-sm-8">
										<input type="text" name="title" class="form-control" placeholder="Title">
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label"> Description</label>
									<div class="col-sm-8">
										<textarea name="description" class="form-control"  rows="10"></textarea>
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
										<input type="submit" class="btn btn-primary sbmt" value="Submit">
									</div>
								</div>
								
							</form>
						</div>
					</div>
					
					<div class="row">
						<div class="dol-md-12">
							<table class="table table-striped">
							<tr>
							   <th>Sr. No.</th><th>Image</th><th>Title</th><th>Content</th><th>Is Home</th><th>Action</th>
							</tr>
							<?php $i=1;
							foreach($new as $nw)
							{?>
							<tr>
							   <td><?php echo $i++; ?></td>
							   <td>
							       <?php if($nw->type_name == 'image'){ ?> 
							       <img src="<?php echo url("thumbnail/".$nw->image);?>" class="img-responsive" style="max-width:300px">
							       <?php }else if($nw->type_name == 'video'){ ?>
    							       <video width="320" height="240" controls>
                                          <source src="<?php echo url("uploads/".$nw->image);?>" type="video/mp4">
                                          <source src="<?php echo url("uploads/".$nw->image);?>" type="video/mp4">
                                         Your browser does not support the video tag.
                                        </video>
						          <?php }else if($nw->type_name == 'youtube' || $nw->type_name == 'vimeo'){ ?>
    							       <!-----iframe width="320" height="240" src="<?php echo $nw->video_link;?>" frameborder="0" allowfullscreen></iframe----->
									   
									   <div class="vid">
									   {!! $nw->video_link !!}
									   </div>
							       <?php } ?>
						      </td>
							  <td><?php echo $nw->title;?></td>
							  <td><?php echo $nw->description;?></td>
							  <td>@if($nw->is_home) Yes @else No @endif</td>
							  <td>
							   <?php if($nw->status==1)
							   {?>
							   <a href="<?php echo url("update-news-status/0/".$nw->id);?>" class="btn btn-success">Active</a>
							   <?php }
								else{?>
								
								<a href="<?php echo url("update-news-status/1/".$nw->id);?>"   class="btn btn-danger">Inactive</a>
								<?php } ?>
							   
							   </td>
							   <td>
							   <a href="<?php echo url("editnew/".$nw->id);?>" class="btn btn-danger"><i class="fa fa-edit lg-x"></i></a>
							   
							   <a href="<?php echo url("deletenew/".$nw->id);?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger"><i class="fa fa-trash lg-x"></i></a>
							   </td>
							</tr>
							<?php } ?>
							</table>
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
