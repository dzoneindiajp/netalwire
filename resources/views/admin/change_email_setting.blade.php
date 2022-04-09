@extends('layouts.app')

@section('content')
<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					
					
					
					<div class="row">
						<h3 class="title1">Email Configration Setting:</h3>
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
                    
                    	<form class="form-horizontal" method="post" action="{{route('update-email-settings')}}" enctype="multipart/form-data">
							@csrf 
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Email Configration</label>
									<div class="col-sm-8">
										<input type="email" name="email_configration" class="form-control" value="{{$email_setting->send_email_configration??''}}" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Job Receiver Email Configration</label>
									<div class="col-sm-8">
										<input type="email" name="job_receiver_email" class="form-control" value="{{$email_setting->job_receiver_email??''}}" required>
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
