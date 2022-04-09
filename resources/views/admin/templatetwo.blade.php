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
				<h3 class="title1">CMS Template Two:</h3>
					<div class="row">
						<div class="form-three widget-shadow">
							<form class="form-horizontal" method="post" action="{{url('save_template_two')}}" enctype="multipart/form-data">
								@csrf
								<div class="form-group">
									<label  class="col-sm-2 control-label">Page Title:</label>
									<div class="col-sm-8">
										<input name="title" class="form-control" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Select Type:</label>
									<div class="col-sm-4">
										<select name="type" id="type_id" class="form-control" required>
										<option value="">Select Type</option>
										<option value="image">Image</option>
										
								<option value="video">Video</option>
										<option value="youtube">Youtube</option>
										<option value="vimeo">Vimeo</option>
										</select>
									</div>
								</div> 		
								<div class="form-group" id="doc_div" style="display:none">
							<label for="focusedinput" class="col-sm-2 control-label">Upload Image:</label>
							<div class="col-sm-4">
								   
								<div id="doc_img_div">
									<input type="file" class="form-control1" id="hero" name="hero" onchange="validateimg(this,1920,450)">
									<p class="notice" id="notice">(Preferred Image resolution in 1920x450px Max 1 Mb)</p>
								</div>
								<div id="doc_video_div">
									<input type="file" class="form-control1" name="text_video" id="text_video" accept=".mp4, .wmv, .mov, .avi, .mpg" onchange="validatevideo(this,50)">
									<p class="notice">(Max 50MB video size allowed)</p>
								</div>
							</div> 
						</div>
								<div class="form-group" id="video_div" style="display:none">
									<label for="focusedinput" class="col-sm-2 control-label">Video Link :</label>
									<div class="col-sm-4">
										<input type="text" name="video_link" class="form-control" placeholder="Video Link">
										<p class="notice">(Please enter the embeded code)</p> 
									</div> 
								</div>
								<!-- <div class="form-group">
									<label class="col-sm-2 control-label">Hero Image :</label>
									<div class="col-sm-8">
										<input type="file" required class="form-control1" name="hero" placeholder="Page Title" required onchange="validateimg(this,1920,450)"> 
								 <p class="notice">(Preferred Image resolution in 1920x450px Max 1 Mb)</p>
									</div>
								</div> -->
								<div class="form-group">
									<label class="col-sm-2 control-label">Description</label>
									<div class="col-sm-8">
										<textarea name="description" class="form-control"  rows="10"></textarea>
									</div>
								</div>
								  
								<div class="form-group">
									<label  class="col-sm-2 control-label">Meta Keywords:</label>
									<div class="col-sm-8">
										<input name="metakeywords" class="form-control" required>
									</div>
								</div>
								
							   <div class="form-group">
									<label  class="col-sm-2 control-label">Meta Description:</label>
									<div class="col-sm-8">
										<input name="metadescription" class="form-control" required>
									</div>
								</div>
							
							<div class="form-group">
									<label  class="col-sm-2 control-label">Page Status:</label>
									<div class="col-sm-8">
										<label class="radio-inline">
									      <input type="radio" name="status" checked value="1"> Active
									    </label>
									    <label class="radio-inline">
									      <input type="radio" name="status" value="0"> Inactive
									    </label>
									</div>
								</div>
								<!-- Page Related data blogs and news Start-->
								<div class="form-group">
									<label  class="col-sm-2 control-label">Blogs Status:</label>
									<div class="col-sm-8">
										<label class="radio-inline">
									      <input type="radio" name="blog_status" checked value="1"> Active
									    </label>
									    <label class="radio-inline">
									      <input type="radio" name="blog_status" value="0"> Inactive
									    </label>
									</div>
								</div>
								<div class="form-group">
									<label  class="col-sm-2 control-label">Blogs:</label>
									<div class="col-sm-10">
											<select id="search-blogs" class="search-tags form-control" name="blogs[]" multiple="multiple">
												<option value=""> Select Blogs</option>
											@foreach($blogs as $blog)
											<option value="{{$blog->id}}">{{$blog->title}}</option>
											@endforeach
											</select>
									</div>
								</div>
								<div class="form-group">
									<label  class="col-sm-2 control-label">News Status:</label>
									<div class="col-sm-8">
										<label class="radio-inline">
									      <input type="radio" name="news_status" checked value="1"> Active
									    </label>
									    <label class="radio-inline">
									      <input type="radio" name="news_status" value="0"> Inactive
									    </label>
									</div>
								</div>
								<div class="form-group">
									<label  class="col-sm-2 control-label">News:</label>
									<div class="col-sm-10">
											<select id="search-news" class="search-tags form-control" name="news[]" multiple="multiple">
											<option value=""> Select News</option>
											@foreach($news as $new)
											<option value="{{$new->id}}">{{$new->title}}</option>
											@endforeach
											</select>
									</div>
								</div>
								<!-- Page Related data blogs and news End-->
						 
								<div class="form-group">
								
									<div class="col-sm-10" style="text-align:right">
										<input type="submit" class="btn btn-primary" value="Submit">
									</div>
								</div>
							
							</div>
								
							</form>
						</div>
						
		<!--start code--->
 <div class="row">
            <h3 class="title1">View Template Two:</h3>
            <table id="example" class="table table-striped">
               <thead>
                  <tr>
                     <th>Sr. No.</th>
                     <th>Title</th>
                     <th>Description</th>
                     <th>Meta Keywords</th>
                     <th>Meta Description</th>
                     <th>Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $i=1;
                     foreach($template_two_pages as $dt)
                     {?>
                  <tr>
                     <td><?php echo $i++;?></td>
                     <td style="max-width:300px; word-break: break-all;"><?php echo $dt->title;?></td>
                     <td style="max-width:300px; word-break: break-all;" title='<?php echo strip_tags($dt->description);?>'><?php echo substr(strip_tags($dt->description),0,100);?> .....</td>
                     <td style="max-width:300px; word-break: break-all;"><?php echo $dt->metakeywords;?></td>
                     <td style="max-width:300px; word-break: break-all;"><?php echo $dt->metadescription;?></td>
                     <td>
                        <?php if($dt->status==1)
                           {?>
                        <a href="<?php echo url("update-page-status/0/".$dt->id);?>" class="btn btn-success">Active</a>
                        <?php }
                           else
                           {?>
                        <a href="<?php echo url("update-page-status/1/".$dt->id);?>" class="btn btn-danger">Deactive</a>
                        <?php } ?>
                     </td>
                     <td>
                        <?php if($dt->templateone_content=='')
                           {?>
                        <a href="<?php echo url("editpage/".$dt->id);?>"  class="btn btn-danger"><i class="fa fa-edit"></i></a>
                        <?php }
                           else{?>
                        <a href="<?php echo url("editpagett/".$dt->id);?>"  class="btn btn-danger"><i class="fa fa-edit"></i></a>
                        <?php } ?>
                        <a href="<?php echo url("deletepage/".$dt->id);?>"  onclick="editPage(this.id)" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                     </td>
                  </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
<!---end code-->

						
						
					</div>
					
					
					
				</div>
			</div>
		</div>
<link rel="stylesheet"  type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>		
@endsection
@section('js-script')
<script>
	function validateimg(ctrl,uwidth,uheight) { 
        var fileUpload = ctrl;
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif)$");
        if (regex.test(fileUpload.value.toLowerCase())) {
            if (typeof (fileUpload.files) != "undefined") {
                var reader = new FileReader();
                reader.readAsDataURL(fileUpload.files[0]);
                reader.onload = function (e) {
                    var image = new Image();
                    image.src = e.target.result;
                    image.onload = function () {
                        var height = this.height;
                        var width = this.width;
                        /* if (height > uheight || width > uwidth) {
                            alert("Please upload image with "+uwidth+"x"+uheight+" resolution.");
							fileUpload.value="";
                            return true;
                        }else{
                            return true;
                        } */
						
						if(height != uheight || width != uwidth) {
							alert("Please upload image "+uwidth+"x"+uheight+" resolution.");
							fileUpload.value="";
							$(".sbmt").prop('disabled', true);
							return false;
						}else{
						   var size = parseFloat(fileUpload.files[0].size / 1024).toFixed(2);
							if(size > 1024){
								alert("Please upload max 1MB size image.");
								$(".sbmt").prop('disabled', true);
								return false;
							}else{
								$(".sbmt").prop('disabled', false);
								return true;
							}
						}
                    };
                }
            } else {
                alert("This browser does not support HTML5.");
                return false;
            }
        } else {
            alert("Please select a valid Image file.");
$(".sbmt").prop('disabled', true);
            return false;
        }
    }
	
	function validatevideo(ctrl, file_size){			
			var fileUpload = ctrl;
			var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.mp4|.wmv|.mov|.avi|.mpg)$");
			if (regex.test(fileUpload.value.toLowerCase())) {
				if (typeof (fileUpload.files) != "undefined") {
					var size = Math.floor(fileUpload.files[0].size / 1000000);
					if(size >= 50){
						alert("Please upload max 50MB size video.");
						$(".sbmt").prop('disabled', true);
						return false;
					}else{
						$(".sbmt").prop('disabled', false);
						return true;
					}
				} else {
					alert("This browser does not support HTML5.");
					return false;
				}
			} else {
				alert("Please select a valid Image file.");
				document.getElementById('image').value = "";
				$(".sbmt").prop('disabled', false);
				return false;
			}
		}
		
	$(document).ready(function() {
		/* $("#type_id").change(function () {
	       if ($(this).val() == 'youtube' || $(this).val() == 'vimeo') {
	           $("#video_div").show();
	           $("#doc_div").hide();
	       } else {
	           if ($(this).val() == 'video') {
	            $("#notice").hide();
	           }
	           $("#doc_div").show();
	           $("#video_div").hide();
	       }
	   }); */
	   
	    $("#type_id").change(function () {
		   $(".sbmt").prop('disabled', false);
		   $("input[type=file]").val('');
		   if ($(this).val() == 'youtube' || $(this).val() == 'vimeo') {
			   $("#video_div").show();
			   $("#doc_div").hide();
		   } else {
			   
				if ($(this).val() == 'video') {
				$("#notice").hide();
				$("#doc_video_div").show();
				$("#doc_img_div").hide();
			   }else{
				$("#doc_video_div").hide();
				$("#doc_img_div").show(); 
					$("#notice").show();
			   }
			   $("#doc_div").show();
			   $("#video_div").hide();
		   }
	   });
	   
	   $('#search-blogs').select2({ })
   	$('#search-news').select2({ })
		// $('#search-blogs').select2({ 
	 //        placeholder:'Type Name of Blogs',
	 //        minimumInputLength: 1,
	 //        ajax: {
	 //            url: "{{url('/blog-news-search')}}",
	 //            type: "get",
	 //            dataType: 'json',
	 //            delay: 250,
	 //            data: function (params) {
	 //                var type='blog';
	 //                var query = {term: params.term,type: type}
	 //                return query;
	 //            },
	 //            processResults: function (data) {
	 //                return {
	 //                  results: data.data
	 //                };
	 //            },
	 //            cache: true
	 //        }
	 //   });
	 //   $('#search-news').select2({ 
	 //        placeholder:'Type Name of News',
	 //        minimumInputLength: 1,
	 //        ajax: {
	 //            url: "{{url('/blog-news-search')}}",
	 //            type: "get",
	 //            dataType: 'json',
	 //            delay: 250,
	 //            data: function (params) {
	 //                var type='news';
	 //                var query = {term: params.term,type: type}
	 //                return query;
	 //            },
	 //            processResults: function (data) {
	 //                return {
	 //                  results: data.data
	 //                };
	 //            },
	 //            cache: true
	 //        }
	 //   });
     	$(document).on('click','.preselected-tag-btn',function(){
         $(this).remove();
      })
    	$('#example').DataTable();
	});
</script>
@endsection
