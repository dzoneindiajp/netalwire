@extends('layouts.app')

@section('content')

<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					
					
					
					<div class="row">
						<h3 class="title1">Add Links:</h3>
						<div class="form-three widget-shadow">
							<form class="form-horizontal" method="post" action="<?php echo url("links/updatelinks");?>" enctype="multipart/form-data">
								@csrf
								<div class="form-group">
									<label  class="col-sm-2 control-label">Page Position:</label>
									<div class="col-sm-8">
										<label class="radio-inline">
										<input type="radio" name="position" <?php if($links->position==1){ echo "checked";}?> value="1"> Compliance
										</label>
										<label class="radio-inline">
										<input type="radio" name="position" value="0" <?php if($links->position==0){ echo "checked";}?>> Quick Link   
										</label>
									</div>
								</div> 
								
								<div class="form-group">
									<label  class="col-sm-2 control-label">Link Title:</label>
									<div class="col-sm-8">
										<input name="title" class="form-control" required max="20" value="<?php echo $links->title;?>">
									</div>
								</div>
								<div class="form-group">
									<label  class="col-sm-2 control-label">Link:</label>
									<div class="col-sm-8">
										<input name="link" class="form-control" required value="<?php echo $links->link;?>">
										<input name="id" class="form-control" required value="<?php echo $links->id;?>">
									</div>
								</div>
						
								
								<div class="form-group">
								
									<div class="col-sm-10" style="text-align:right">
										<input type="submit" class="btn btn-primary" value="Update">
									</div>
								</div>
								
							</form>
						</div>
					</div>					
					
				</div>
			</div>
		</div>
@endsection
