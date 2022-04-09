@extends('layouts.app')

@section('content')
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
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
									<label for="focusedinput" class="col-sm-2 control-label">Upload Image:</label>
									<div class="col-sm-4">
										<input type="file" class="form-control1" id="image" name="image" onchange="validateimg(this,300,169)" required>
											   <p class="notice">(Preferred Image resolution in 300x169px Max 1 Mb)</p>
										
										
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
							   <th>Sr. No.</th><th>Image</th><th>Title</th><th>Content</th><th>Action</th>
							</tr>
							<?php $i=1;
							foreach($new as $nw)
							{?>
							<tr>
							   <td><?php echo $i++; ?></td><td><img src="<?php echo url("thumbnail/".$nw->image);?>" class="img-responsive" style="max-width:300px"></td>
							   <td ><?php echo $nw->title;?></td>
							  <td ><?php echo $nw->description;?></td>
							  
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
                        if (height > uheight || width > uwidth) {
                            alert("Please upload image with "+uwidth+"x"+uheight+" resolution.");
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
