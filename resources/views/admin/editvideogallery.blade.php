@extends('layouts.app')

@section('content')
<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					
					
					
					<div class="row">
						<h3 class="title1">Edit Videos:</h3>
						<div class="form-three widget-shadow">
							<form class="form-horizontal" method="post" action="<?php echo url("updatevideogallery");?>" enctype="multipart/form-data">
							
								
								@csrf
								<div class="form-group">
									<label  class="col-sm-2 control-label">Enter Youtube URL:</label>
									<div class="col-sm-8">
										<input name="youtube" value="<?php echo $vg->video; ?>" class="form-control" required >
										<input name="id" value="<?php echo $vg->id; ?>" type="hidden" class="form-control" required >
									</div>
								</div>
								
								<div class="form-group">
									<label  class="col-sm-2 control-label">Enter Caption:</label>
									<div class="col-sm-8">
										<input name="caption" value="<?php echo $vg->caption; ?>" class="form-control" required>
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
