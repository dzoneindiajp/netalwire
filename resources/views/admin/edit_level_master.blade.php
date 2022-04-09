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
						<h3 class="title1">Level Master:</h3>
						<div class="form-three widget-shadow">
						<div class="row">
						<div class="col-md-6">
							<form class="form-horizontal" method="post" action="<?php echo url("update-level");?>" enctype="multipart/form-data">
							@csrf
								<div class="form-group">
									<label for="focusedinput">Edit Level Name:</label>
									<input type="text" class="form-control1" id="name" name="name" value="<?php echo $data->level_name;?>">
									<input type="hidden" class="form-control1" id="id" name="id" value="<?php echo $data->id;?>">
								
								</div>
								
								
								<div class="form-group">
								
									
										<input type="submit" class="btn btn-primary" value="Submit">
									
								</div>
								
							</form>
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
	

