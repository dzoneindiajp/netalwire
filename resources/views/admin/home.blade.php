@extends('layouts.app')

@section('content')
<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					
					<div class="inline-form widget-shadow">
						<div class="form-title">
							<h4>Home Block :</h4>
						</div>
						<div class="form-body">
						<div data-example-id="simple-form-inline">
							
							<div class="row">
<div class="col-md-6">
	<form class="form-inline" method="post" action="<?php echo url("savehomeblock");?>" enctype="multipart/form-data"> 
	@csrf
	
	<div class="form-group col-md-12">
				<label>Select Type:</label>
							<select name="type_name" id="type_id" class="form-control" required>
                                <option value="">Select Type</option>
                                <option value="image">Image</option>
                                <option value="video">Video</option>
                                <option value="youtube">Youtube</option>
								<option value="vimeo">Vimeo</option>
                                </select>
								
								</div>
	
		<div class="form-group col-md-12" id="doc_div" style="display:none">
		
			<!--<input type="file" class="form-control" name="image" onchange="validateimg(this,1600,602)">-->
			<div id="doc_img_div">
			    <label>Upload Image:</label>
			<input type="file" class="form-control" name="image" id="image"  onchange="validateimg(this,1600,602)">
			 <p class="notice">(Preferred Image resolution in 1600x602px Max 1 Mb)</p>
			 </div>
			 <div id="doc_video_div">
			     <label>Upload Video:</label>
			<input type="file" class="form-control" name="text_video" id="text_video"  accept=".mp4, .wmv, .mov, .avi, .mpg" onchange="validatevideo(this,50)">
			 </div>
		</div> 
		<div class="form-group col-md-12" id="video_div" style="display:none">
									<label for="focusedinput" class="col-sm-2 control-label">Video Link :</label>
									<div class="col-sm-4">
										<input type="text" name="video_link" class="form-control" placeholder="Video Link">
										<p class="notice">(Please enter the embeded code)</p> 
									</div> 
								</div>
								
	<div class="form-group col-md-12">
		<button type="submit" class="btn btn-default sbmt" disabled>Submit</button>
    </div>		
	</form> 

</div> 
	<div class="col-md-6">
	<?php if(count($slider)<1)
	{?>
	<form class="form-inline" method="post" action="<?php echo url("save-slider-text");?>" enctype="multipart/form-data"> 
	@csrf
		<div class="form-group">
		 <label>Banner Text 1:</label>
		<input type="text" class="form-control" name="banner_text[]" required value=""> 
		</div> 
		<div class="form-group">
		 <label>Banner Text 2:</label>
		<input type="text" class="form-control" name="banner_text[]"  > 
		</div>
		<div class="form-group">
		 <label>Banner Text 3:</label>
		<input type="text" class="form-control" name="banner_text[]"  > 
		</div>
		<div class="form-group">
		 <label>Banner Text 4:</label>
		<input type="text" class="form-control" name="banner_text[]"  > 
		</div>
		<div class="form-group">
		 <label>Banner Text 5:</label>
		<input type="text" class="form-control" name="banner_text[]"  > 
		</div>
	<button type="submit" class="btn btn-default">Submit</button>
	</form>
	<?php }
else{	?>

<form class="form-inline" method="post" action="<?php echo url("update-slider-text");?>" enctype="multipart/form-data"> 
	@csrf
	<?php $i=1; 
	foreach($slider as $sd)
	{?>
		<div class="form-group">
		 <label>Banner Text <?php echo $i;?>:</label>
		<input type="text" class="form-control" name="banner_text[]"  value="<?php echo $sd->slider_text?>"> 
		</div> 
	<?php $i++; }
	?>
	<?php for($k=$i;$k<=5;$k++)
	{?>
	<div class="form-group">
		 <label>Banner Text <?php echo $k;?>:</label>
		<input type="text" class="form-control" name="banner_text[]"  > 
		</div>
	<?php }?>
	<button type="submit" class="btn btn-default">Submit</button>
	</form>

<?php } ?>	
	</div> 
								 
								</div> 
								
								
						</div>
						</div>
					</div>
					
					<div class="row">
					
					<?php foreach($data as $dt)
					{?>
								<div class="col-md-4">
									<div class="col-md-12 vid">
									    @if($dt->type_name=='image')
										<img src="<?php echo url("image/".$dt->home_image);?>" class="img-responsive" style="max-width:400px;height:200px;">
										 @elseif($dt->type_name == 'video')
										<video width="320" height="240" controls>
                                          <source src="<?php echo url("image/".$dt->home_image);?>" type="video/mp4">
                                          <source src="<?php echo url("image/".$dt->home_image);?>" type="video/mp4">
                                         Your browser does not support the video tag.
                                        </video>
                                        @else
											  <!---iframe width="320" height="240" src="<?php echo $dt->video_link;?>" frameborder="0" allowfullscreen></iframe---->
											<div class="vid">
												{!! $dt->video_link !!}
											</div>
                                    
                                       @endif
										</div>

									<div class="col-md-6">
									<?php if($dt->status==0)
									{?>
									<a href="<?php echo url("updatehomeblock/1/".$dt->home_id);?>" class="btn btn-success">Active</a>
									<?php } else{?>
									<a href="<?php echo url("updatehomeblock/0/".$dt->home_id);?>" class="btn btn-danger">Inactive</a>
									<?php }?>
									</div>
									
									<div class="col-md-6" align="right">
									
									<a href="<?php echo url("deletehomeblock/".$dt->home_id);?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger">Delete</a>
									
									</div>
								</div>
					<?php } ?>
					</div>
					
				</div>
			</div>
		</div>
		
		<script>
		function validateimg(ctrl,uwidth,uheight){			
			var fileUpload = ctrl;
			var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif|.jpeg)$");
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
							
							/* if(height > uheight || width > uwidth) { */
							if(height != uheight || width != uwidth) {
								/* alert("Please upload image upto "+uwidth+"x"+uheight+" resolution."); */
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
					/* alert(fileUpload.files[0].size); */
					/* alert(Math.floor(fileUpload.files[0].size / 1000000) + 'MB'); */
					/* var size = parseFloat(fileUpload.files[0].size / 1024).toFixed(2); */
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
				
				$(".sbmt").prop('disabled', true);
				return false;
			}
		}
	
		
$(document).ready(function () {
   $("#type_id").change(function () {
       if ($(this).val() == 'youtube' || $(this).val() == 'vimeo') {
           $("#video_div").show();
           $("#doc_div").hide();
		   $(".sbmt").prop('disabled', false);
       } else {
           if ($(this).val() == 'video') {
            $("#notice").hide();
            $("#doc_video_div").show();
            $("#doc_img_div").hide();
           }else{
            $("#doc_video_div").hide();
            $("#doc_img_div").show();   
           }
           $("#doc_div").show();
           $("#video_div").hide();
       }
   });
});
	</script>
@endsection
