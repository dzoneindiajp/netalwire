@extends('layouts.app')

@section('content')

<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					
					
					
					<div class="row">
						<h3 class="title1">Add Links:</h3>
						<div class="form-three widget-shadow">
							<form class="form-horizontal" method="post" action="<?php echo url("links/savelinks");?>" enctype="multipart/form-data">
								@csrf
								<div class="form-group">
									<label  class="col-sm-2 control-label">Page Position:</label>
									<div class="col-sm-8">
										<label class="radio-inline">
										<input type="radio" name="position" checked value="1"> Compliance
										</label>
										<label class="radio-inline">
										<input type="radio" name="position" value="0"> Quick Link   
										</label>
									</div>
								</div> 
								
								<div class="form-group">
									<label  class="col-sm-2 control-label">Link Title:</label>
									<div class="col-sm-8">
										<input name="title" class="form-control" required>
									</div>
								</div>
								<div class="form-group">
									<label  class="col-sm-2 control-label">Link:</label>
									<div class="col-sm-8">
										<input name="link" class="form-control" required>
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
					  <table class="table table-striped">
					  <tr>
					  <th>Sr. No.</th>
					  <th>Link Title</th>
					  <th>Link</th>
					  <th>Position</th> 
					  <th>Action</th>
					  
					  </tr>
					  
					  
					  <?php $i=1; foreach($links as $ln)
					  {?>
					  <tr>
					  <td><?php echo $i++;?></td>
					  <td><?php echo $ln->title; ?></td>
					  <td><a href='<?php echo $ln->link; ?>' target="_blanks"><?php echo $ln->link; ?></a></td>
					  <td><?php if($ln->position==1){ echo "Complaince";}if($ln->position==0){ echo "Quick Link";}?></td> 
					  <td>
					  <a href="<?php echo url("edit-links/".$ln->id);?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
					  <a href="<?php echo url("delete-links/".$ln->id);?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
					  </td>
					  
					  </tr>
					  
					  <?php } ?>
					  </table>
					
					
					</div>
					
					
					
				</div>
			</div>
		</div>
@endsection
