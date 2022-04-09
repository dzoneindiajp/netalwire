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
						<h3 class="title1">Jobs :</h3>
						<div class="form-three widget-shadow">
							<form class="form-horizontal" method="post" action="<?php echo url("savejob");?>" enctype="multipart/form-data">
							@csrf
							
							<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Banner Image :</label>
									<div class="col-sm-4">
										<input type="file" class="form-control1" id="image1" name="image1" placeholder="Default Input" onchange="validateimg(this,1920,350)">
										<p class="notice">(Preferred Image resolution in 1920x350px Max 1 Mb)</p>
									</div>
								</div>
								
							<div class="form-group">
								<label class="col-sm-2 control-label">Company Name</label>
									<div class="col-sm-4">
									    <input type="text" class="form-control1" name="company" placeholder="Company Name" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Company logo :</label>
									<div class="col-sm-8">
										<input type="file" required class="form-control1" name="logo" placeholder="Page Title" required onchange="validateimg(this,200,200)"> 
								 <p class="notice">(Preferred Image resolution in 200x200px Max 1 Mb)</p>
									</div>
								</div>
                                 
								 <div class="form-group">
									<label class="col-sm-2 control-label">Job Titile</label>
									<div class="col-sm-4">
										<input type="text" class="form-control1" name="title" placeholder="Job Titile" required>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label">Job Keyword</label>
									<div class="col-sm-4">
										<input type="text" class="form-control1" name="keyword" placeholder="Job Keyword" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Location</label>
									<div class="col-sm-4">
										<input type="text" class="form-control1" name="location" placeholder="Location" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Company Function</label>
									<div class="col-sm-4">
										<select name="company_function" required class="form-control">
										<option value="">Select Function</option>
										<?php foreach($company_functions as $cf)
										{?>
										<option value="<?php echo $cf->id?>"><?php echo $cf->company_function?></option>
										<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Level</label>
									<div class="col-sm-4">
										<select name="level" required class="form-control">
										<option value="">Select Level</option>
										<?php foreach($level as $cf)
										{?>
										<option value="<?php echo $cf->id?>"><?php echo $cf->level_name?></option>
										<?php } ?>
										</select>
									</div>
								</div>
								
								 
								 <div class="form-group">
									<label class="col-sm-2 control-label">Description Content</label>
									<div class="col-sm-8">
										<textarea name="description" class="form-control"  rows="10"></textarea>
									</div>
								</div>
								

								<div class="form-group">
									<label class="col-sm-2 control-label">Responsibility </label>
									<div class="col-sm-8">
										<textarea name="responsibility" class="form-control"  rows="10"></textarea>
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
								$(".sbmt").prop('disabled', true);
            alert("Please select a valid Image file.");
            return false;
        }
    }
	
	</script>	
@endsection
