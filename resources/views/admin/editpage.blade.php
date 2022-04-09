@extends('layouts.app')

@section('content')
<script type="text/javascript" src="<?php echo url("js/edit_nicEditIcons-latest.js")?>"></script> <script type="text/javascript">
   //<![CDATA[
           bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
     //]]>
     
</script>
<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<div class="row">
					   <h3 class="title1">Edit Template Two Page :</h3>
						<div class="form-three widget-shadow">
							<form class="form-horizontal" method="post" action="{{url('cms/updatepage')}}" enctype="multipart/form-data">
								@csrf
								<?php
								//'video'=>'Video' 
								$ftypes = array('image' =>'Image','youtube'=>'Youtube','vimeo'=>'Vimeo' );?>
								<div class="form-group">
									<label  class="col-sm-2 control-label">Page Title:</label>
									<div class="col-sm-8">
										<input name="title" class="form-control" required value="<?php echo $page->title;?>">
										<input type="hidden" name="id" class="form-control" required value="<?php echo $page->id;?>">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Select Type:</label>
									<div class="col-sm-4">
										<select name="type" id="type_id" class="form-control" required>
											@foreach($ftypes as $key=>$ftype)
											@if($key==$page->file_type)
											<option value="{{$key}}" selected>{{$ftype}}</option>
											@else
											<option value="{{$key}}">{{$ftype}}</option>
											@endif
											@endforeach
											
											<option value="video"  @if($page->file_type=='video') selected='selected' @endif >Video</option>
										</select>
									</div>
								</div>
								<div class="form-group" id="doc_div" @if($page->file_type!='image') style="display:none" @endif>
									<label class="col-sm-2 control-label">Hero Image :</label> 
									
									<div class="col-sm-8">
									<div id="doc_img_div">
											<input type="file" class="form-control1" name="hero" onchange="validateimg(this,1920,450)" id="hero" value="{{$page->hero??''}}"> 
											 <p class="notice">(Preferred Image resolution in 1920x450px Max 1 Mb)</p>
											 
											 @if($page->hero)
											 <img src="<?php echo url("uploads/".$page->hero);?>" style="height:200px;">
											 @endif
													<input type="hidden" name="oldimg" value="{{$page->hero??''}}">
										</div>
										<div id="doc_video_div">
										<input type="file" class="form-control1" name="text_video" id="text_video"  accept=".mp4, .wmv, .mov, .avi, .mpg" onchange="validatevideo(this,50)">
										</div>
									</div>
									
								</div>
								<div class="form-group" id="video_div" @if($page->file_type=='image' || $page->file_type=='video') style="display:none" @endif>
									<label for="focusedinput" class="col-sm-2 control-label">Video Link :</label>
									<div class="col-sm-4">
										<input type="text" name="video_link" class="form-control" placeholder="Video Link" value="{{$page->video_link??''}}">
										<p class="notice">(Please enter the embeded code)</p> 
									</div> 
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Description</label>
									<div class="col-sm-8">
										<textarea name="description" class="form-control" rows="10"><?php echo $page->description;?></textarea>
									</div>
								</div>
								  
								<div class="form-group">
									<label  class="col-sm-2 control-label">Meta Keywords:</label>
									<div class="col-sm-8">
										<input name="metakeywords" class="form-control" value="<?php echo $page->metakeywords;?>" required>
									</div>
								</div>
								
							    <div class="form-group">
									<label  class="col-sm-2 control-label">Meta Description:</label>
									<div class="col-sm-8">
										<input name="metadescription" class="form-control" value="<?php echo $page->metadescription;?>" required>
									</div>
								</div>
							
							<div class="form-group">
									<label  class="col-sm-2 control-label">Page Status:</label>
									<div class="col-sm-8">
										<label class="radio-inline">
									      <input type="radio" name="status" <?php if($page->status=='1'){ echo "checked";}?> value="1"> Active
									    </label>
									    <label class="radio-inline">
									      <input type="radio" name="status" <?php if($page->status=='0'){ echo "checked";}?> value="0"> Inactive
									    </label>
									</div>
								</div>
								<!-- Page Related data blogs and news Start-->
								<div class="form-group">
									<label  class="col-sm-2 control-label">Blogs Status:</label>
									<div class="col-sm-8">
										<label class="radio-inline">
									      <input type="radio" name="blog_status" @if($page->blog_status) checked @endif value="1"> Active
									    </label>
									    <label class="radio-inline">
									      <input type="radio" name="blog_status" value="0" @if(!$page->blog_status) checked @endif> Inactive
									    </label>
									</div>
								</div>
								<div class="form-group">
									<label  class="col-sm-2 control-label">Blogs:</label>
									<div class="col-sm-10">
										{{--<!--@if(isset($blogs) && $blogs)
						              	<div>
						                 @foreach($blogs as $bg)
						                 <button type="button" class="preselected-tag-btn">
						                    <span class="preselected-tag" data-id="slug{{$bg->id}}">{{$bg->title}} ×</span>
						                 <input type="hidden" name="blogs[]" id="slug{{$bg->id}}" value="{{$bg->id}}"/>
						                </button>
						                 @endforeach
						                </div>
						                 @endif-->--}}
										<select id="search-blogs" class="search-tags form-control" name="blogs[]" multiple="multiple">
											<option value=""> Select Blogs</option>
											@foreach($blogs as $blog)
											@if(isset($bids) && in_array($blog->id,$bids))
											<option value="{{$blog->id}}" selected>{{$blog->title}}</option>
											@else
											<option value="{{$blog->id}}">{{$blog->title}}</option>
											@endif
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label  class="col-sm-2 control-label">News Status:</label>
									<div class="col-sm-8">
										<label class="radio-inline">
									      <input type="radio" name="news_status" @if($page->news_status) checked @endif value="1"> Active
									    </label>
									    <label class="radio-inline">
									      <input type="radio" name="news_status" value="0" @if(!$page->news_status) checked @endif> Inactive
									    </label>
									</div>
								</div>
								<div class="form-group">
									<label  class="col-sm-2 control-label">News:</label>
									<div class="col-sm-10">
										{{--<!--@if(isset($news) && $news)
						              	<div>
						                 @foreach($news as $bg)
						                 <button type="button" class="preselected-tag-btn">
						                    <span class="preselected-tag" data-id="slug{{$bg->id}}">{{$bg->title}} ×</span>
						                 <input type="hidden" name="news[]" id="slug{{$bg->id}}" value="{{$bg->id}}"/>
						                </button>
						                 @endforeach
						                </div>
						                 @endif -->--}}
										<select id="search-news" class="search-tags form-control" name="news[]" multiple="multiple">
											<option value=""> Select News</option>
											@foreach($news as $new)
											@if(isset($nids) && in_array($new->id,$nids))
											<option value="{{$new->id}}" selected>{{$new->title}}</option>
											@else
											<option value="{{$new->id}}">{{$new->title}}</option>
											@endif
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
						
						
					
					
					
					
				</div>
			</div>
		</div>
		
		<script type="text/javascript">
 $(document).ready(function () {
	 bkLib.onDomLoaded(function() {
        new nicEditor({fullPanel : true, maxHeight:100}).panelInstance('myArea');
        $('.nicEdit-panelContain').parent().width('100%');
        $('.nicEdit-panelContain').parent().next().width('98%');
        $('.nicEdit-main').width('100%');
        });
 var counter = parseInt($("#counter").val())+1;
$("#addButton").click(function () {
           
            if (counter > 10) {
                alert("Only 10 textboxes allow");
                return false;
            }
            var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxDiv' + counter);
			newTextBoxDiv.after().html('<div class="form-group"><label  class="col-sm-2 control-label">Slider Image '+counter+':</label><div class="col-sm-8"><input name="sliderimage'+counter+'" id="sliderimage'+counter+'" type="file"  class="form-control"></div></div><div class="form-group"><label  class="col-sm-2 control-label">Slider Title '+counter+':</label><div class="col-sm-8"><input name="slidertitle'+counter+'"  id="slidertitle'+counter+'" type="text"  class="form-control"></div></div><div class="form-group"><label  class="col-sm-2 control-label">Slider Description '+counter+':</label><div class="col-sm-8"><input name="sliderdescription'+counter+'"  id="sliderdescription'+counter+'" type="text"  class="form-control"></div></div>');  
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
				  alert("asd");
				  var id=$(this).val();
				  if(id==1)
				  {
					  
					   $("#advancepage").hide();
					  $("#normalpage").show();
					  
				  }
				  else
				  {
					  $("#advancepage").show();
					  $("#normalpage").hide();
					  
				  }
				  
				  
			  });
        
    });



		
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
						console.log(width+"ssdsd"+height); 
                       /*  if (height > uheight || width > uwidth) {
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
								return false;
							}else{
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
						
						$("input[type=file]").val('');
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
				
				$("input[type=file]").val('');
				document.getElementById('image').value = "";
				return false;
			}
		}

	</script>
		
@endsection
@section('js-script')
<script>
	$(document).ready(function(){
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
		   /* $(".sbmt").prop('disabled', false); */
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
   	// 	$('#search-blogs').select2({ 
	   //      placeholder:'Type Name of Blogs',
	   //      minimumInputLength: 1,
	   //      ajax: {
	   //          url: "{{url('/blog-news-search')}}",
	   //          type: "get",
	   //          dataType: 'json',
	   //          delay: 250,
	   //          data: function (params) {
	   //              var type='blog';
	   //              var query = {term: params.term,type: type}
	   //              return query;
	   //          },
	   //          processResults: function (data) {
	   //              return {
	   //                results: data.data
	   //              };
	   //          },
	   //          cache: true
	   //      }
	   // });
	   // $('#search-news').select2({ 
	   //      placeholder:'Type Name of News',
	   //      minimumInputLength: 1,
	   //      ajax: {
	   //          url: "{{url('/blog-news-search')}}",
	   //          type: "get",
	   //          dataType: 'json',
	   //          delay: 250,
	   //          data: function (params) {
	   //              var type='news';
	   //              var query = {term: params.term,type: type}
	   //              return query;
	   //          },
	   //          processResults: function (data) {
	   //              return {
	   //                results: data.data
	   //              };
	   //          },
	   //          cache: true
	   //      }
	   // });
     	$(document).on('click','.preselected-tag-btn',function(){
         $(this).remove();
      })
	})
</script>
@endsection
