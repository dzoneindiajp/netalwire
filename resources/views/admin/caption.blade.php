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
							<form class="form-horizontal" method="post" action="<?php echo url("caption_manager");?>" enctype="multipart/form-data">
							@csrf
							
							  
								<div class="form-group"  id="doc_div">
								    
								<div class="form-group">
									<label class="col-sm-2 control-label">Caption</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="caption_name" name="caption_name" required>
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
						<div class="dol-md-12">
							<table class="table table-striped">
							<tr>
							    @php
							    $i = 0;
							    @endphp
							   <th>Sr. No.</th><th>Caption</th><th>Action</th><th>Action</th><th>Action</th>
							</tr>
							<tr>
							@forelse($caption as $cap)
							@php $i++; @endphp
						        <td>{{$i}}</td>
							    <td>
							        {{$cap->caption_name}}
							    </td>
							   <td>
							   <a href="<?php echo url("edit_caption/".$cap->id);?>" class="btn btn-primary"><i class="fa fa-edit lg-x"></i></a>
							   </td>
							   @if($cap->status == 1)
							   <td>
							   <a href="<?php echo url("deactive_caption/".$cap->id);?>" class="btn btn-danger">Deactive</a>
							   </td>
							   @endif
							   @if($cap->status == 0)
							   <td>
							   <a href="<?php echo url("active_caption/".$cap->id);?>" class="btn btn-success">Active</a>
							   </td>
							   @endif
							   <td>
							   <a href="<?php echo url("delete_caption/".$cap->id);?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger"><i class="fa fa-trash lg-x"></i></a>
							   </td>
							</tr>
						@empty
						<p>Hello</p>
						@endforelse
							</table>
						</div>
					</div>
					
				
		
<script>
		
	
	</script>
@endsection
