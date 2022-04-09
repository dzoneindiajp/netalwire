@extends('layouts.app')

@section('content')
<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					
					
					
					<div class="row">
						<h3 class="title1">Add Videos:</h3>
						<div class="form-three widget-shadow">
							<form class="form-horizontal" method="post" action="<?php echo url("savevideogallery");?>" enctype="multipart/form-data">
							
								
								@csrf
								<div class="form-group">
									<label  class="col-sm-2 control-label">Enter Youtube URL:</label>
									<div class="col-sm-8">
										<input name="youtube" value="" class="form-control" required>
									</div>
								</div>
								
								<div class="form-group">
									<label  class="col-sm-2 control-label">Enter Caption:</label>
									<div class="col-sm-8">
										<input name="caption" value="" class="form-control" required>
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
					<?php foreach($vg as $v)
					{
						 $link=explode("v=",$v->video);?>
					<div class="col-md-4 videogallery">
					    <?php if($v->caption!='')
					    {?>
					    <h4><?php echo $v->caption; ?></h4>
					    <?php } 
					    else
					    {?>
					     <h4>&nbsp;</h4>
					    <?php }?>
					<iframe  class="video-frame" src="https://www.youtube.com/embed/<?php echo $link[0];?>?rel=1&modestbranding=1" width="100%" height="250" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					
					<a href="<?php echo url("editvideogallery/".$v->id);?>" class="btn btn-primary" >Edit Video</a>
					<a href="<?php echo url("deletevideogalllery/".$v->id);?>" class="btn btn-danger"  onclick="return confirm('Are you sure to delete?')">Delete Video</a>
					
					</div>
					<?php }?>
					</div>
					
					
				</div>
			</div>
		</div>
		
		@endsection
