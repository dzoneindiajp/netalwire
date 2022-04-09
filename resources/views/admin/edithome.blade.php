@extends('layouts.app')

@section('content')
<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					
					<div class="inline-form widget-shadow">
						<div class="form-title">
							<h4>Edit Home Block :</h4>
						</div>
						<div class="form-body">
						<div data-example-id="simple-form-inline">
							<form class="form-inline" method="post" action="<?php echo url("savehomeblock");?>" enctype="multipart/form-data"> 
							@csrf
							<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								 <label>Upload Image:</label>
								 
								 
								<input type="file" class="form-control" name="image" onchange="validateimg(this,1600,602)"> 
								 <p class="notice">(Preferred Image resolution in 1600x602px Max 1 Mb)</p>
								</div> 
								</div> 
								<div class="col-md-6">
								<div class="form-group">
								 <label>Banner Text 1:</label>
								<input type="text" class="form-control" name="banner_text[]" required > 
								</div> 
								</div> 
								<div class="col-md-12">
								<div class="form-group">
								 <label>Banner Text 2:</label>
								<input type="text" class="form-control" name="banner_text[]" required > 
								</div> 
								</div> 
								<div class="col-md-12">
								<div class="form-group">
								 <label>Banner Text 3:</label>
								<input type="text" class="form-control" name="banner_text[]" required > 
								</div> 
								</div> 
								<div class="col-md-12">
								<div class="form-group">
								 <label>Banner Text 4:</label>
								<input type="text" class="form-control" name="banner_text[]" required > 
								</div> 
								</div> 
								<div class="col-md-12">
								<div class="form-group">
								 <label>Banner Text 5:</label>
								<input type="text" class="form-control" name="banner_text[]" required > 
								</div> 
								</div> 
								</div> 
								
								<button type="submit" class="btn btn-default">Submit</button> 
							</form> 
						</div>
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
					
                        if (height > uheight || width > uwidth) {
                            alert("Please upload image upto "+uwidth+"x"+uheight+" resolution.");
							fileUpload.value="";
                            return true;
                        }else{
                           
                            return true;
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
	
	</script>
@endsection
