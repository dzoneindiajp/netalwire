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
							<form class="form-horizontal" method="post" action="<?php echo url("contact/save");?>" enctype="multipart/form-data">
							@csrf
							
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Upload Banner Image</label>
									<div class="col-sm-4">
										<input type="file" class="form-control1"id="image" name="image1" placeholder="Default Input" required  onchange="validateimg(this,1920,335)">
										 <p class="notice">(Preferred Image resolution in 1920x335px Max 1 Mb)</p>
									</div>
								
								</div>
								   
								<div class="form-group">
									<label class="col-sm-2 control-label">Name</label>
									<div class="col-sm-4">
										<input type="text" class="form-control1" name="name" placeholder="Name" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Email</label>
									<div class="col-sm-4">
										<input type="email" class="form-control1" name="email" placeholder="Email" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Mobile</label>
									<div class="col-sm-4">
										<input type="text" class="form-control1" name="mobile" placeholder="Mobile" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Address</label>
									<div class="col-sm-4">
										<input type="text" class="form-control1" name="address" placeholder="Address" required>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label">Day</label>
									<div class="col-sm-4">
										<input type="text" class="form-control1" name="day" placeholder="Day" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Time</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="time" placeholder="Time">
										
										
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Google Map Code</label>
									<div class="col-sm-4">
										<textarea name="googlemap" class="form-control"  rows="10" cols="10"></textarea>
										
										
									</div>
								</div>
								
								<div class="form-group">
										<label class="col-sm-2 control-label">Main Heading1</label>
										<div class="col-sm-4">
										<input type="text" class="form-control" name="main_heading_one" >
										</div>
							</div>
						<div class="form-group">
    						<label class="col-sm-2 control-label">Main Heading2</label>
    						<div class="col-sm-4">
    						<input type="text" class="form-control" name="main_heading_two" required>
    						</div>
						</div>
										
										
								<div class="form-group">
									<label class="col-sm-2 control-label">Contact Content1</label>
									<div class="col-sm-4">
										<textarea name="contenttext" class="form-control"  rows="10" cols="10"></textarea>
									</div>
								</div>
								
								<div class="form-group">
										<label class="col-sm-2 control-label">Main Heading3</label>
										<div class="col-sm-4">
										<input type="text" class="form-control" name="main_heading_third" required>
										</div>
										</div>
										
								<div class="form-group">
									<label class="col-sm-2 control-label">Contact Content2</label>
									<div class="col-sm-4">
										<textarea name="contenttext2" class="form-control"  rows="10" cols="10"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Contact Content2 Image</label>
									<div class="col-sm-4">
										<input type="file" class="form-control1"id="image" name="image2cont" placeholder="Default Input" required  onchange="validateimg(this,600,337)">
										<p class="notice">(Preferred Image resolution in 600x337px Max 1 Mb)</p>
                                      </div>
								 </div>
								 <div class="form-group">
										<label class="col-sm-2 control-label">Main Heading4</label>
										<div class="col-sm-4">
										<input type="text" class="form-control" name="main_heading_four" required>
										</div>
								  </div>
								  
								<div class="form-group">
									<label class="col-sm-2 control-label">Contact Content3</label>
									<div class="col-sm-4">
										<textarea name="contenttext3" class="form-control"  rows="10" cols="10"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Contact Content3 Image</label>
									<div class="col-sm-4">
										<input type="file" class="form-control1" id="image" name="image3cont" placeholder="Default Input" required  onchange="validateimg(this,600,337)">
										<p class="notice">(Preferred Image resolution in 600x337px Max 1 Mb)</p>
									</div>
								</div>
								
									<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Copyright Text</label>
									<div class="col-sm-4">
										<input type="text" class="form-control1" id="copyright_text" name="copyright_text" placeholder="Enter Copyright Text" required>
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
							   <th>Sr. No.</th><th>Image</th><th>Name</th><th>Email</th><th>Mobile</th><th>Address</th><th>Action</th>
							</tr>
							<?php $i=1;
							foreach($con as $co)
							{?>
							<tr>
							   <td><?php echo $i++; ?></td><td><img src="<?php echo url("thumbnail/".$co->image);?>" class="img-responsive" style="max-width:250px"></td>
							   
							   <td style="max-width:400px;"><?php echo $co->name;?></td>
							   <td style="max-width:400px;"><?php echo $co->email;?></td>
							   <td style="max-width:400px;"><?php echo $co->phone;?></td>
							   <td style="max-width:400px;"><?php echo $co->address;?></td>
							   
							   <td>
							   <a href="<?php echo url("editcontact/".$co->id);?>" class="btn btn-danger"><i class="fa fa-edit lg-x"></i></a>
							   
							   <a href="<?php echo url("deletecontact/".$co->id);?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger"><i class="fa fa-trash lg-x"></i></a>
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
            return false;
        }
    }
	
	</script>
@endsection
