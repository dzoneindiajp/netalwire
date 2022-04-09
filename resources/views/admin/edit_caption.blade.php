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
						<h3 class="title1">Caption Manager</h3>
						<div class="form-three widget-shadow">
							<form class="form-horizontal" method="post" action="<?php echo url("/update_caption/{$data->id}");?>" enctype="multipart/form-data">
							@csrf
							
							  
								<div class="form-group"  id="doc_div">
								    
								<div class="form-group">
									<label class="col-sm-2 control-label">Caption</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="caption_name" name="caption_name" value="{{$data->caption_name}}" required>
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
					
				
		
<script>
		
	
	</script>
@endsection
