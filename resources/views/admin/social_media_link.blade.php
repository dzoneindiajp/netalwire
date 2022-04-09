@extends('layouts.app')

@section('content')
<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					
					
					
					<div class="row">
						<h3 class="title1">Socail Media Link Settings:</h3>
						<div class="form-three widget-shadow">
                     
                     <div class="row">
                    <div class="col-lg-12">
                    <?php if(session('success'))
                    {?>		
                    <div class="alert alert-success alert-dismissible  show" role="alert">
                    <?php echo session('success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                    </div>
                    <?php } ?>
                    </div>
                    </div>
                    
                    	<form class="form-horizontal" method="post" action="{{route('update-social-link-settings')}}" enctype="multipart/form-data">
							@csrf 
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Facebook Link:</label>
									<div class="col-sm-8">
										<input type="text" name="facebook_link" class="form-control" value="{{$media_link->facebook_link??''}}">
									</div>
								<div class="col-sm-2">
									<select name="facebook_status" class="form-control">
							        <option value="1" @if($media_link->facebook_status==1) selected @endif>Active</option>
							         <option value="0" @if($media_link->facebook_status==0) selected @endif>InActive</option>
							     </select>

									</div>
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Instagram Link:</label>
									<div class="col-sm-8">
										<input type="text" name="instagram_link" class="form-control" value="{{$media_link->instagram_link??''}}">
							 
									</div>
								<div class="col-sm-2">
								<select name="instagram_status" class="form-control">
							         <option value="1" @if($media_link->instagram_status==1) selected @endif>Active</option>
							         <option value="0" @if($media_link->instagram_status==0) selected @endif>InActive</option>
							     </select>

									</div>
								</div>
								
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Twitter Link:</label>
									<div class="col-sm-8">
									<input type="text" name="pinterest_link" class="form-control" value="{{$media_link->pinterest_link??''}}" >
								</div>
								<div class="col-sm-2">
								<select name="pinterest_status" class="form-control">
							        <option value="1" @if($media_link->pinterest_status==1) selected @endif>Active</option>
							         <option value="0" @if($media_link->pinterest_status==0) selected @endif>InActive</option>
							     </select>

									</div>
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Linkedin Link:</label>
									<div class="col-sm-8">
										<input type="text" name="snapchat_link" class="form-control" value="{{$media_link->snapchat_link??''}}">
							 
									</div>
								<div class="col-sm-2">
									 <select name="snapchat_status" class="form-control">
							        <option value="1" @if($media_link->snapchat_status==1) selected @endif>Active</option>
							         <option value="0" @if($media_link->snapchat_status==0) selected @endif>InActive</option>
							     </select>

									</div>
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Youtube Link:</label>
									<div class="col-sm-8">
										<input type="text" name="youtube_link" class="form-control" value="{{$media_link->youtube_link??''}}">
									</div>
								<div class="col-sm-2">
									<select name="youtube_status" class="form-control">
							         <option value="1" @if($media_link->youtube_status==1) selected @endif>Active</option>
							         <option value="0" @if($media_link->youtube_status==0) selected @endif>InActive</option>
							     </select>

									</div>
								</div>
									
								
								<div class="form-group">
								
									<div class="col-sm-10" style="text-align:center">
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
