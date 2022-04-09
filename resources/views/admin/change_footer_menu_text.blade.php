@extends('layouts.app')
@section('content')

<div id="page-wrapper">

			<div class="main-page">

				<div class="forms">

					<div class="row">

						<h3 class="title1">Change Footer Menu Text and Home Page Heading:</h3>

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
                    	<form class="form-horizontal" method="post" action="{{route('update-footer-text-settings')}}" enctype="multipart/form-data">

							@csrf 

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Footer Text one</label>
									<div class="col-sm-8">
										<input type="text" name="footer_one" class="form-control" value="{{$footer_text->footer_one??''}}" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Footer Text two</label>
									<div class="col-sm-8">
										<input type="text" name="footer_two" class="form-control" value="{{$footer_text->footer_two??''}}" required>
									</div>
								</div>
								<div class="form-group">

									<label for="focusedinput" class="col-sm-2 control-label">Footer Text third:</label>

									<div class="col-sm-8">

									<input type="text" name="footer_third" class="form-control" value="{{$footer_text->footer_third??''}}" required>

								</div>

								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Footer Text four:</label>
									<div class="col-sm-8">
										<input type="text" name="footer_four" class="form-control" value="{{$footer_text->footer_four??''}}" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Home Page H1</label>
									<div class="col-sm-8">
										<input type="text" name="home_page_h1" class="form-control" value="{{$footer_text->home_page_h1??''}}" placeholder="Home Page H1">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Home Page H2</label>
									<div class="col-sm-8">
										<input type="text" name="home_page_h2" class="form-control" value="{{$footer_text->home_page_h2??''}}" placeholder="Home Page H2">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Home Page H3</label>
									<div class="col-sm-8">
										<input type="text" name="home_page_h3" placeholder="Home Page H3" class="form-control" value="{{$footer_text->home_page_h3??''}}">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Home Page H4</label>
									<div class="col-sm-8">
										<input type="text" name="home_page_h4" placeholder="Home Page H4" class="form-control" value="{{$footer_text->home_page_h4??''}}">
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

