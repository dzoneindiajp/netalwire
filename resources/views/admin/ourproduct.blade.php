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
						<h3 class="title1">Our Product :</h3>
						<div class="form-three widget-shadow">
							<form class="form-horizontal" method="post" action="<?php echo url("saveourproduct");?>" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Select Type:</label>
									<div class="col-sm-4">
                                <select name="type_name" id="type_id" class="form-control" required>
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
                                    <input type="file" class="form-control1" id="image" name="image" onchange="validateimg(this,600,516)">
											   <p class="notice">(Preferred Image resolution in 600x516px Max 1 Mb)</p>
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
									<label for="focusedinput" class="col-sm-2 control-label">Select Order:</label>
									<div class="col-sm-4">
										<select name="position" class="form-control">
										<option value="">Select Image Position</option>
										<?php for($i=1; $i<=10;$i++)
										{?>
										<option value="<?php echo $i;?>"><?php echo $i;?></option>
										<?php } ?>
										
										</select>
										
									</div>
								
								</div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label">Title</label>
									<div class="col-sm-4">
										<input type="text" class="form-control1" name="title" placeholder="Titile" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Content</label>
									<div class="col-sm-6">
										<textarea class="form-control" name="content" placeholder="Content" rows="10"></textarea>
									</div>
								</div>
								
								<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Redirection Url :</label>
							<div class="col-sm-8">
								<input type="text" name="redirection_url" class="form-control" placeholder="Redirection Url">
								<p class="notice">(Redirection Url only for image)</p> 
							</div> 
						</div>
								
								<div class="form-group">
								
									<div class="col-sm-10" style="text-align:right">
										<input type="submit" class="btn btn-primary" value="Submit">
									</div>
								</div>
								
							</form>
						</div>
					</div>
					
					<div class="row">
						<div class="dol-md-12">
							<table class="table table-striped">
							<tr>
							   <th>Sr. No.</th><th>Image</th><th>Title</th><th>Content</th><th>Status</th><th>Action</th>
							</tr>
							<?php $i=1;
							foreach($product as $pt)
							{?>
							<tr>
							   <td><?php echo $i++; ?></td><td>
							       <!--<img src="<?php echo url("thumbnail/".$pt->image);?>" class="img-responsive" style="max-width:300px">-->
							       
							        @if($pt->type_name=='image')
                                    <img src="<?php echo url("thumbnail/".$pt->image);?>" class="img-responsive" style="max-width:300px;height:200px;">
                                    @elseif($pt->type_name == 'video')
                                    <video width="300" height="200" controls>
                                    <source src="<?php echo url("uploads/".$pt->image);?>" type="video/mp4">
                                    <source src="<?php echo url("uploads/".$pt->image);?>" type="video/mp4">
                                    Your browser does not support the video tag.
                                    </video>
                                    @else
                                      <!-----iframe width="320" height="240" src="<?php echo $pt->video_link;?>" frameborder="0" allowfullscreen></iframe---->
								  
										<div class="vid">
										{!! $pt->video_link !!}
										</div>
                                    @endif
							       
							       </td>
							   <td ><?php echo $pt->title;?></td>
							   <td ><?php echo $pt->content;?></td>
							   <td >
							   <?php if($pt->status==1)
							   {?>
							   <a href="<?php echo url("update-product-status/0/".$pt->id);?>" class="btn btn-success">Active</a>
							   <?php }
								else{?>
								
								<a href="<?php echo url("update-product-status/1/".$pt->id);?>"   class="btn btn-danger">Inactive</a>
								<?php } ?>
							   
							   </td>
							   <td>
							   <a href="<?php echo url("editourproduct/".$pt->id);?>" class="btn btn-danger"><i class="fa fa-edit lg-x"></i></a>
							   
							   <a href="<?php echo url("deleteproduct/".$pt->id);?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger"><i class="fa fa-trash lg-x"></i></a>
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
            document.getElementById('image').value = "";
			
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
