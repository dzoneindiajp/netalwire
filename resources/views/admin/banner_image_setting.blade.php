@extends('layouts.app')

@section('content')
<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					
					
					
					<div class="row">
						<h3 class="title1">Banner Images Settings:</h3>
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
                    
                    	<form class="form-horizontal" method="post" action="{{url('update-banner-images')}}" enctype="multipart/form-data">
							@csrf 
							<input type="hidden" name="id" value="{{$banner_image->id??''}}">
							
							<div class="form-group">
									<label for="focusedinput" class="col-sm-3 control-label">Site Logo:</label>
									<div class="col-sm-3">
									    <input type="file" name="site_logo" class="form-control" placeholder="Upload site logo" onchange="validateimg(this,250,200)">										<p class="notice">(Preferred Image resolution in 250x200px Max 1 Mb)</p>
										<input type="hidden" name="site_logo_old_img" value="{{$banner_image->site_logo??''}}">
									</div>
										<div class="col-sm-4">
										    @if($banner_image->site_logo)
									    <img src="<?php echo url("uploads/".$banner_image->site_logo);?>" style="height:100px; width: 200px;">
									    @endif
									</div>
								<div class="col-sm-2">
									<select name="site_logo_status" class="form-control">
							        <option value="1" @if($banner_image->site_logo_status==1) selected @endif>Active</option>
							         <option value="0" @if($banner_image->site_logo_status==0) selected @endif>InActive</option>
							     </select>

									</div>
								</div>
								
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-3 control-label">Blog Banner Image:</label>
									<div class="col-sm-3">
									    <input type="file" name="blog_image" class="form-control" onchange="validateimg(this,1920,350)">										<p class="notice">(Preferred Image resolution in 1920x350px Max 1 Mb)</p>
										<input type="hidden" name="blog_old_img" value="{{$banner_image->blog_image??''}}">
									</div>
										<div class="col-sm-4">
										    @if($banner_image->blog_image)
									    <img src="<?php echo url("uploads/".$banner_image->blog_image);?>" style="height:100px; width: 200px;">
									    @endif
									</div>
								<div class="col-sm-2">
									<select name="blog_img_status" class="form-control">
							        <option value="1" @if($banner_image->blog_img_status==1) selected @endif>Active</option>
							         <option value="0" @if($banner_image->blog_img_status==0) selected @endif>InActive</option>
							     </select>

									</div>
								</div>
								
							
								<div class="form-group">
									<label for="focusedinput" class="col-sm-3 control-label">Article Banner Image:</label>
									<div class="col-sm-3">
									    <input type="file" name="article_image" class="form-control" onchange="validateimg(this,1920,350)">										<p class="notice">(Preferred Image resolution in 1920x350px Max 1 Mb)</p>
										<input type="hidden" name="article_old_img" value="{{$banner_image->article_image??''}}">
									</div>
									<div class="col-sm-4">
										    @if($banner_image->article_image)
									    <img src="<?php echo url("uploads/".$banner_image->article_image);?>" style="height:100px; width: 200px;">
									    @endif
									</div>
									
								<div class="col-sm-2">
									<select name="article_img_status" class="form-control">
							        <option value="1" @if($banner_image->article_img_status==1) selected @endif>Active</option>
							         <option value="0" @if($banner_image->article_img_status==0) selected @endif>InActive</option>
							     </select>

									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-3 control-label">Job Banner Image:</label>
									<div class="col-sm-3">
									    <input type="file" name="job_image" class="form-control" onchange="validateimg(this,1920,350)">										<p class="notice">(Preferred Image resolution in 1920x350px Max 1 Mb)</p>
										<input type="hidden" name="job_old_img" value="{{$banner_image->job_image??''}}">
									</div>
									<div class="col-sm-4">
										    @if($banner_image->job_image)
									    <img src="<?php echo url("uploads/".$banner_image->job_image);?>" style="height:100px; width: 200px;">
									    @endif
									</div>
									
								<div class="col-sm-2">
									<select name="job_img_status" class="form-control">
							        <option value="1" @if($banner_image->job_img_status==1) selected @endif>Active</option>
							         <option value="0" @if($banner_image->job_img_status==0) selected @endif>InActive</option>
							     </select>

									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-3 control-label">News Banner Image:</label>
									<div class="col-sm-3">
									    <input type="file" name="news_image" class="form-control" onchange="validateimg(this,1920,350)">										<p class="notice">(Preferred Image resolution in 1920x350px Max 1 Mb)</p>
										<input type="hidden" name="news_old_img" value="{{ $banner_image->news_image??'' }}">
									</div>
									
									<div class="col-sm-4">
										    @if($banner_image->news_image)
									    <img src="<?php echo url("uploads/".$banner_image->news_image);?>" style="height:100px; width: 200px;">
									    @endif
									</div>
									
								<div class="col-sm-2">
									<select name="news_img_status" class="form-control">
							        <option value="1" @if($banner_image->news_img_status==1) selected @endif>Active</option>
							         <option value="0" @if($banner_image->news_img_status==0) selected @endif>InActive</option>
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
				<script>				function validateimg(ctrl,uwidth,uheight) { 		        var fileUpload = ctrl;        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif)$");        if (regex.test(fileUpload.value.toLowerCase())) {            if (typeof (fileUpload.files) != "undefined") {                var reader = new FileReader();                reader.readAsDataURL(fileUpload.files[0]);                reader.onload = function (e) {                    var image = new Image();                    image.src = e.target.result;                    image.onload = function () {                        var height = this.height;                        var width = this.width;						console.log(width+"ssdsd"+height);                        /*  if (height > uheight || width > uwidth) {                            alert("Please upload image with "+uwidth+"x"+uheight+" resolution.");							fileUpload.value="";                            return true;                        }else{                                                       return true;                        } */												if(height != uheight || width != uwidth) {							alert("Please upload image "+uwidth+"x"+uheight+" resolution.");							fileUpload.value="";							 							$(this).val('');							return false;						}else{						   var size = parseFloat(fileUpload.files[0].size / 1024).toFixed(2);							if(size > 1024){								alert("Please upload max 1MB size image.");																$(this).val('');								return false;							}else{								return true;							}						}                    };                }            } else {                alert("This browser does not support HTML5.");                return false;            }        } else {            alert("Please select a valid Image file.");				   $(this).val('');            return false;        }    }</script>

@endsection
