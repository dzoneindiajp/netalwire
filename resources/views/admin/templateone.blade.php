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
			<div class="row" >
				<h3 class="title1">Template :</h3>
				<div class="form-three widget-shadow">
					<form class="form-horizontal" method="post" action="{{url(
					'save_template_one')}}" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label class="col-sm-2 control-label">Page Title :</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" name="title" placeholder="Page Title" required>
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
									<input type="file" class="form-control1" id="hero" name="hero" onchange="validateimg">
									<p class="notice" id="notice">(Preferred Image resolution in 1920x450px Max 1 Mb)</p>
								</div>
								<div id="doc_video_div">
									<input type="file" class="form-control1" name="text_video" id="text_video" accept=".mp4, .wmv, .mov, .avi, .mpg" onchange="validatevideo(this,50)">
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
							<label class="col-sm-2 control-label">Meta Keywords :</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" name="metakeywords" placeholder="Meta Keywords" required>
							</div>
						</div>	
						<div class="form-group">
							<label class="col-sm-2 control-label">Meta Content :</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" name="metacontent" placeholder="Meta Content" required>
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
							<label class="col-sm-2 control-label">Heading :</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" name="heading1" placeholder="Heading" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Url :</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" name="url1" placeholder="{{url('/')}}" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Page Content</label>
							<div class="col-sm-8">
								<textarea name="content1" class="form-control"  rows="10"></textarea>
							</div>
						</div>
						<!--<div class="form-group">-->
						<!--	<label for="focusedinput" class="col-sm-2 control-label">Upload Image :</label>-->
						<!--	<div class="col-sm-8">-->
						<!--		<input type="file" class="form-control1" id="image1" name="image1" placeholder="Default Input" required onchange="validateimg"> -->
						<!-- 		<p class="notice">(Preferred Image resolution in 800x450px Max 1 Mb)</p>-->
						<!--	</div>-->
						<!--</div>-->
						<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Select Type:</label>
							<div class="col-sm-4">
								<select name="type" id="type_id2" class="form-control" required>
								<option value="">Select Type</option>
								<option value="image">Image</option>
								<option value="video">Video</option>
								<option value="youtube">Youtube</option>
								<option value="vimeo">Vimeo</option>
								</select>
							</div>
						</div> 		
						<div class="form-group" id="doc_div2" style="display:none">
							<label for="focusedinput" class="col-sm-2 control-label">Upload Image:</label>
							<div class="col-sm-4">
								   
								<div id="doc_img_div2">
									<input type="file" class="form-control1" id="image1" name="image1" onchange="validateimg">
									<p class="notice" id="notice2">(Preferred Image resolution in 1920x450px Max 1 Mb)</p>
								</div>
								<div id="doc_video_div2">
									<input type="file" class="form-control1" name="text_video1" id="text_video1" accept=".mp4, .wmv, .mov, .avi, .mpg" onchange="validatevideo(this,50)">
								</div>
							</div> 
						</div>
						<div class="form-group" id="video_div2" style="display:none">
							<label for="focusedinput" class="col-sm-2 control-label">Video Link :</label>
							<div class="col-sm-4">
								<input type="text" name="video_link" class="form-control" placeholder="Video Link">
								<p class="notice">(Please enter the embeded code)</p> 
							</div> 
						</div>
						<div id='TextBoxesGroup'>
							<input type="hidden" id="counter" name="counter" value="1">
							<div id="TextBoxDiv1">						
							</div>
						</div>	
						<input type='button' value='Addtemplate' class="btn btn-success" id='addButton' />
						<input type='button' value='Removetemplate' class="btn btn-danger"  id='removeButton' />
						<div class="form-group">
						      <div class="col-sm-10" style="text-align:right">
								<input type="submit" class="btn btn-primary" value="Submit">
							</div>
						</div>
					</form>
				</div>
			</div>		
			<!--start code--->
 			<div class="row">
           	 	<h3 class="title1">View Template One:</h3>
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
                     foreach($template_one_pages as $dt)
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
						$(this).val('');
						return false;
					}else{
						return true;
					}
				} else {
					alert("This browser does not support HTML5.");
					return false;
				}
			} else {
				alert("Please select a valid Image file.");
				document.getElementById('image').value = ""; 
				
				$(this).val('');
				return false;
			}
		}
    
	</script>
<link rel="stylesheet"  type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>	
@endsection
@section('js-script')
<script type="text/javascript">
	$(document).ready(function () {
	var counter = 2;
	$("#addButton").click(function () {
		if (counter > 10) {
			alert("Only 10 textboxes allow");
			return false;
		}
		var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxDiv' + counter);
				newTextBoxDiv.after().html('<div class="form-group"><label class="col-sm-2 control-label">Heading '+counter+' :</label><div class="col-sm-8"><input type="text" class="form-control1" name="heading'+counter+'" placeholder="Heading" required></div></div><div class="form-group"><label class="col-sm-2 control-label">Url '+counter+' :</label><div class="col-sm-8"><input type="text" class="form-control1" name="url'+counter+'" placeholder="Url"></div></div><div class="form-group"><label class="col-sm-2 control-label">Page Content  '+counter+'</label><div class="col-sm-8"><textarea name="content'+counter+'" class="form-control"  rows="10"></textarea></div></div><div class="form-group"><label for="focusedinput" class="col-sm-2 control-label">Upload Image '+counter+' :</label><div class="col-sm-8"><input type="file" class="form-control1" id="image'+counter+'" name="image'+counter+'" placeholder="Default Input" required onchange="validateimg(this,800,450)"> 								 <p class="notice">(Preferred Image resolution in 800x450px Max 1 Mb)</p></div></div>');  

			newTextBoxDiv.appendTo("#TextBoxesGroup");
			$("#counter").val(counter);
			counter++;
	});
	$("#removeButton").click(function () {
		if (counter == 1) {
			alert("No more textbox to remove");
			return false;
		}
		counter--;
		$("#TextBoxDiv" + counter).remove();
		$("#counter").val(counter);
	});
	$("input[name='template']").click(function(){
		var id=$(this).val();
			if(id==1){		  
				$("#advancepage").hide();
				$("#normalpage").show();
			}else{
				$("#advancepage").show();
				$("#normalpage").hide();
			}		   
	});	
	
	 $("#type_id").change(function () {
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
	   
	$("#type_id2").change(function () {
	     if ($(this).val() == 'youtube' || $(this).val() == 'vimeo') {
			   $("#video_div2").show();
			   $("#doc_div2").hide();
			   
	     } else {
	         
	         if ($(this).val() == 'video') {
				$("#notice2").hide();
				$("#doc_video_div2").show();
				$("#doc_img_div2").hide();
	         }else{
				$("#doc_video_div2").hide();
				$("#doc_img_div2").show(); 
					$("#notice2").show();
			 }
			  $("#doc_div2").show();
			  $("#video_div2").hide();
		   }
	         
	});
	   
   	$('#search-blogs').select2({ })
   	$('#search-news').select2({ })
   	
     	$(document).on('click','.preselected-tag-btn',function(){
         $(this).remove();
      })
	$('#example').DataTable();

});

</script>
@endsection

