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
						<h3 class="title1">Company Functions:</h3>
						<div class="form-three widget-shadow">
						<div class="row">
						<div class="col-md-6">
							<form class="form-horizontal" method="post" action="<?php echo url("save-function");?>" enctype="multipart/form-data">
							@csrf
								<div class="form-group">
									<label for="focusedinput">Function Name:</label>
									<input type="text" class="form-control1" id="name" name="name">
								
								</div>
								
								
								<div class="form-group">
								
									
										<input type="submit" class="btn btn-primary" value="Submit">
									
								</div>
								
							</form>
						</div>
						<div class="col-md-6">
						<table class="table table-striped">
							<tr>
								<td>Sr. No.</td>
								<td>Function </td>
								<td>Action</td>
							
							</tr>
							<?php $i=1;
							foreach($data as $dt)
							{?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $dt->company_function;?></td>
								<td>
								  <a href="<?php echo url("edit-function/".$dt->id);?>" class="btn btn-success">Edit</a>
								   <a href="<?php echo url("delete-function/".$dt->id);?>"  class="btn btn-danger">Delete</a>
								</td>
							</tr>
							<?php } ?>
						</table>
						</div>
						</div>
						<div class="cleartext"></div>
						</div>
					</div>
					
						
					
				</div>
			</div>
		</div>
					
				</div>
			</div>
		</div>
		

@endsection
	

