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
						<h3 class="title1">Contact :</h3>
						<div class="form-three widget-shadow">
							<form class="form-horizontal" method="post" action="{{url('/update_signin/'.$data->id)}}" enctype="multipart/form-data">
							@csrf
							
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Update Background Image</label>
									<div class="col-sm-4">
									    <img src="{{url('').$data->background}}" class="img-responsive" style="max-width:300px">
									    <br>
										<input type="file" class="form-control1" id="image" name="image1" placeholder="Default Input" required  onchange="validateimg(this,1920,520)">
										
									</div>
								
								</div>
								   
								<div class="form-group">
									<label class="col-sm-2 control-label">Heading1</label>
									<div class="col-sm-4">
										<input type="text" class="form-control1" name="heading1" placeholder="Heading1" value="{{$data->heading1}}" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Heading2</label>
									<div class="col-sm-4">
										<input type="text" class="form-control1" name="heading2" placeholder="Heading2" value="{{$data->heading2}}" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Contant 1</label>
									<div class="col-sm-4">
										<textarea name="contant1" class="form-control"  rows="10" cols="10">{{$data->content1}}</textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Contant 2</label>
									<div class="col-sm-4">
										<textarea name="contant2" class="form-control"  rows="10" cols="10">{{$data->content2}}</textarea>
									</div>
								</div>
								<div class="form-group ml-5">
								<div class="col-sm-4">
									<input type="submit" name="submit" value="Update" class="btn btn-success">
									</div>
								</div>
							</form>
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

		</script>		
	@endsection			