@extends('layouts.app')

@section('content')
<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					
					
					
					<div class="row">
						<h3 class="title1">Clients content :</h3>
						<div class="form-three widget-shadow">
							<form class="form-horizontal" method="post" action="<?php echo url("clients/savepara");?>" enctype="multipart/form-data">
								@csrf
								<div class="form-group">
									<label  class="col-sm-2 control-label">Description:</label>
									<div class="col-sm-8">
										<textarea name="description" class="form-control" required></textarea>
									</div>
								</div>
								<div class="form-group">
								
									<div class="col-sm-10" style="text-align:right">
										<input type="submit" class="btn btn-primary" value="Submit">
									</div>
								</div>
								
								</form>
								<h4>Add Clients Logo:</h4>
								<form class="form-horizontal" method="post" action="<?php echo url("clients/saveclients");?>" enctype="multipart/form-data">
								<div class="row">@csrf
											<label  class="col-sm-2 control-label">Title:</label>
											
											<div class="col-sm-2">
										       <input name="title" id="textbox1" class="form-control" required>
									        </div>
										
											<label  class="col-sm-1 ">Photo:</label>
											
											<div class="col-sm-4">
										       <input name="photo" type="file" id="textbox1" class="form-control" onchange="validateimg(this,600,516)" required>
											   <p class="notice">(Preferred Image resolution in 600x516px Max 1 Mb)</p>
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
					<h3>Client Para</h3>
						<table class="table table-striped">
						<tr>
							<th>Sr. No.</th>
							
							<th>Para</th>
							<th>Action</th>
						</tr>
						
						<?php $i=1;
						foreach($clients as $cl)
						{?>
						<tr>
							<td><?php echo $i++;?></td>
							
							<td style="max-width:400px"><?php echo $cl->para; ?></td>
							<td>
							<a href="<?php echo url("editclientpara/".$cl->id);?>" class="btn btn-primary">Edit</a>
					<a href="<?php echo url("deleteclient/".$cl->id);?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
							</td>
						</tr>
						<?php } ?>
						</table>
						
					</div>
					<div class="row">
					<h3>Client Logo</h3>
					<?php foreach($clientslogo as $dt)
					    {?>
					    <div class="col-md-3">
					        
					        <img src="<?php echo url("thumbnail/".$dt->logo);?>" class="img-responsive">
					        <h4 align="center"><?php echo $dt->title;?></h4>
					       
					        <a href="<?php echo url("editclientlogo/".$dt->id)?>" class="btn btn-primary">Edit</a>
					        <a href="<?php echo url("deleteclientlogo/".$dt->id)?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
					    </div>
					    <?php } ?>
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
