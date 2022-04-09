@extends('layouts.app')

@section('content')
<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					
					
					
					<div class="row">
						<h3 class="title1">Add Photos:</h3>
						<div class="form-three widget-shadow">
							<form class="form-horizontal" method="post" action="<?php echo url("savephotogallery");?>" enctype="multipart/form-data">
							
								
								@csrf
								<div class="form-group">
									<label  class="col-sm-2 control-label">Select Photo:</label>
									<div class="col-sm-8">
										<input name="photo" type="file" value="" class="form-control" required>
									</div>
								</div>
								
									<div class="form-group">
									<label  class="col-sm-2 control-label">Enter Caption:</label>
									<div class="col-sm-8">
										<input name="caption" type="text" value="" class="form-control" required>
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
					<?php foreach($pg as $p)
					{
						?>
					<div class="col-md-4">
					    <?php if($p->caption!='')
					    {?>
					    <h4><?php echo $p->caption; ?></h4>
					    <?php } 
					    else
					    {?>
					     <h4>&nbsp;</h4>
					    <?php }?>
					<img src="<?php echo url("thumbnail/".$p->photo);?>" class="img-responsive">
					
					<a href="<?php echo url("editphotogallery/".$p->id);?>" class="btn btn-primary" >Edit Photo</a>
					<a href="<?php echo url("deletephotogallery/".$p->id);?>" class="btn btn-danger"  onclick="return confirm('Are you sure to delete?')">Delete Photo</a>
					
					</div>
					<?php }?>
					</div>
					
					
				</div>
			</div>
		</div>
		
		@endsection
