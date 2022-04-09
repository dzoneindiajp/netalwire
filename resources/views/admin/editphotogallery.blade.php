@extends('layouts.app')

@section('content')
<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					
					
					
					<div class="row">
						<h3 class="title1">Edit Photo:</h3>
						<div class="form-three widget-shadow">
							<form class="form-horizontal" method="post" action="<?php echo url("updatephotogallery");?>" enctype="multipart/form-data">
							
								
								@csrf
								<div class="form-group">
									<label  class="col-sm-2 control-label">Select Photo:</label>
									<div class="col-sm-8">
										<input name="photo" type="file" value="" class="form-control">
										<input name="oldphoto" type="hidden" value="<?php echo $pg->photo?>" class="form-control" required >
										<input name="id" type="hidden" value="<?php echo $pg->id?>" class="form-control" required >
										
										<img src="<?php echo url("thumbnail/".$pg->photo);?>" style="width:200px;">
									</div>
								</div>
								
									<div class="form-group">
									<label  class="col-sm-2 control-label">Enter Caption:</label>
									<div class="col-sm-8">
										<input name="caption" type="text" value="<?php echo $pg->caption; ?>" class="form-control" required>
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
					
					
					
					
					
				</div>
			</div>
		</div>
		
		@endsection
