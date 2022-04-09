@extends('layouts.app')
@section('content')
<script type="text/javascript" src="<?php echo url("js/edit_nicEditIcons-latest.js")?>"></script> <script type="text/javascript">
   //<![CDATA[
    var area1,area2,area3,area4;
    function toggleArea1() {
        if(!area1) {
                area2 = new nicEditor({fullPanel : true}).panelInstance('contenttext',{hasPanel : true});
                area3 = new nicEditor({fullPanel : true}).panelInstance('contenttext2',{hasPanel : true});
                area4 = new nicEditor({fullPanel : true}).panelInstance('contenttext3',{hasPanel : true});
            }
       }
    	function addArea2() {

            area1 = new nicEditor({fullPanel : true}).panelInstance('googlemap');

            }

            function removeArea2() {

            area1.removeInstance('googlemap');

            }

             bkLib.onDomLoaded(function() { toggleArea1(); });

           //bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });

     //]]>

     

</script>

<div id="page-wrapper">

			<div class="main-page">

				<div class="forms">

					

					<div class="row">

						<h3 class="title1">Edit Contact content :</h3>

						<div class="form-three widget-shadow">

							<form class="form-horizontal" method="post" action="<?php echo url("contact/updatecontact");?>" enctype="multipart/form-data">

							@csrf

							

							<div class="form-group">

									<label for="focusedinput" class="col-sm-2 control-label">Upload Banner Image :</label>

									<div class="col-sm-4">

										<input type="file" class="form-control1" id="image" name="image" placeholder="Default Input" onchange="validateimg(this,1920,335)">
										<p class="notice">(Preferred Image resolution in 1920x335px Max 1 Mb)</p>

										<img src="<?php echo url("uploads/".$contact->image);?>" style="height:200px;">

										<input type="hidden" name="oldimg1" value="<?php echo $contact->image?>">									

										<input type="hidden" name="id" value="<?php echo $contact->id;?>">									</div>

								

								</div>

							

								<div class="form-group">

									<label class="col-sm-2 control-label">Name</label>

									<div class="col-sm-4">

										<input type="text" class="form-control1" name="name" value="<?php echo $contact->name ;?>">

									</div>

								</div>

								<div class="form-group">

									<label class="col-sm-2 control-label">Email</label>

									<div class="col-sm-4">

										<input type="email" class="form-control1" name="email" value="<?php echo $contact->email ;?>">

									</div>

								</div>

								<div class="form-group">

									<label class="col-sm-2 control-label">Mobile</label>

									<div class="col-sm-4">

										<input type="number" class="form-control1" name="mobile" value="<?php echo $contact->phone ;?>">

									</div>

								</div>

								<div class="form-group">

									<label class="col-sm-2 control-label">Address</label>

									<div class="col-sm-4">

										<input type="text" class="form-control1" name="address" value="<?php echo $contact->address ;?>">

									</div>

								</div>

										<div class="form-group">

										<label class="col-sm-2 control-label">Day</label>

									   <div class="col-sm-4">

										<input type="text" class="form-control1" name="day" value="<?php echo $contact->day ;?>">

										   </div>

										</div>

										<div class="form-group">

										<label class="col-sm-2 control-label">Time</label>

										<div class="col-sm-4">

										<input type="text" class="form-control" name="time"value="<?php echo $contact->time ;?>">





										</div>

										</div>

										<div class="form-group">

									<label class="col-sm-2 control-label">Google Map Code</label>

									<div class="col-sm-4">

										<textarea name="googlemap" id="googlemap" class="form-control"  rows="10" cols="10"><?php echo $contact->googlemap ;?></textarea>

									<!--	<input type="text" name="googlemap" class="form-control"  rows="10" cols="10" value="<?php echo $contact->googlemap ;?>">-->

                                    </div>

								</div>

								

								      <div class="form-group">

										<label class="col-sm-2 control-label">Main Heading1</label>

										<div class="col-sm-4">

										<input type="text" class="form-control" name="main_heading_one" value="<?php echo $contact->main_heading_one ;?>" >

										</div>

										</div>

										<div class="form-group">

										<label class="col-sm-2 control-label">Main Heading2</label>

										<div class="col-sm-4">

										<input type="text" class="form-control" name="main_heading_two" value="<?php echo $contact->main_heading_two ;?>" required>

										</div>

										</div>

										

								<div class="form-group">

									<label class="col-sm-2 control-label">Contact Content1</label>

									<div class="col-sm-4">

										<textarea name="contenttext" id="contenttext" class="form-control"  rows="10" cols="10"><?php echo $contact->contenttext ;?></textarea>

									</div>

								</div>

									<div class="form-group">

										<label class="col-sm-2 control-label">Main Heading3</label>

										<div class="col-sm-4">

										<input type="text" class="form-control" name="main_heading_third" value="<?php echo $contact->main_heading_third ;?>" required>

										</div>

										</div>

								<div class="form-group">

									<label class="col-sm-2 control-label">Contact Content2</label>

									<div class="col-sm-4">

										<textarea name="contenttext2" id="contenttext2" class="form-control" rows="10" cols="10"><?php echo $contact->contenttext2;?></textarea>

									</div>

								</div>

								<div class="form-group">

									<label for="focusedinput" class="col-sm-2 control-label">Contact Content2 Image</label>

									<div class="col-sm-4">

										<input type="file" class="form-control1" id="image1" name="image2cont" placeholder="Default Input" onchange="validateimg(this,600,337)">
										<p class="notice">(Preferred Image resolution in 600x337px Max 1 Mb)</p>

										<img src="<?php echo url("uploads/".$contact->image2);?>" style="height:200px;">

										<input type="hidden" name="oldimg2" value="<?php echo $contact->image2?>">									

										<!--<input type="hidden" name="id" value="<?php echo $contact->id;?>">-->									</div>

								 </div>

								 <div class="form-group">

										<label class="col-sm-2 control-label">Main Heading4</label>

										<div class="col-sm-4">

										<input type="text" class="form-control" name="main_heading_four" value="<?php echo $contact->main_heading_four ;?>" required>

										</div>

								  </div>

								<div class="form-group">

									<label class="col-sm-2 control-label">Contact Content3</label>

									<div class="col-sm-4">

										<textarea name="contenttext3" id="contenttext3" class="form-control" rows="10" cols="10"><?php echo $contact->contenttext3 ;?></textarea>

									</div>

								</div>

								<div class="form-group">

									<label for="focusedinput" class="col-sm-2 control-label">Contact Content3 Image</label>

									<div class="col-sm-4">

										<input type="file" class="form-control1" id="image1" name="image3cont" placeholder="Default Input" onchange="validateimg(this,600,337)">
										<p class="notice">(Preferred Image resolution in 600x337px Max 1 Mb)</p>

										<img src="<?php echo url("uploads/".$contact->image3);?>" style="height:200px;">

										<input type="hidden" name="oldimg3" value="<?php echo $contact->image3?>">									

										<!--<input type="hidden" name="id" value="<?php echo $contact->id;?>">-->									</div>

								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Copyright Text</label>
									<div class="col-sm-4">
										<input type="text" class="form-control1" id="copyright_text" name="copyright_text" placeholder="Enter Copyright Text" value="<?php echo $contact->copyright_text?>" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Contact Form 1 Heading 1</label>
									<div class="col-sm-4">
										<input type="text" class="form-control1" id="contact_form1_h1" name="contact_form1_h1" placeholder="Contact Form 1 Heading 1" value="{{$contact->contact_form1_h1??''}}" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Contact Form 1 Heading 2</label>
									<div class="col-sm-4">
										<input type="text" class="form-control1" id="contact_form1_h2" name="contact_form1_h2" placeholder="Contact Form 1 Heading 2" value="{{$contact->contact_form1_h2??''}}" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Contact Form 1 Heading 3</label>
									<div class="col-sm-4">
										<input type="text" class="form-control1" id="contact_form1_h3" name="contact_form1_h3" placeholder="Contact Form 1 Heading 3" value="{{$contact->contact_form1_h3??''}}" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Contact Form 1 Heading 4</label>
									<div class="col-sm-4">
										<input type="text" class="form-control1" id="contact_form1_h4" name="contact_form1_h4" placeholder="Contact Form 1 Heading 4" value="{{$contact->contact_form1_h4??''}}" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Contact Form 1 Heading 5</label>
									<div class="col-sm-4">
										<input type="text" class="form-control1" id="contact_form1_h5" name="contact_form1_h5" placeholder="Contact Form 1 Heading 5" value="{{$contact->contact_form1_h5??''}}" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Contact Form 2 Heading 1</label>
									<div class="col-sm-4">
										<input type="text" class="form-control1" id="contact_form2_h1" name="contact_form2_h1" placeholder="Contact Form 2 Heading 1" value="{{$contact->contact_form2_h1??''}}" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Contact Form 2 Heading 2</label>
									<div class="col-sm-4">
										<input type="text" class="form-control1" id="contact_form2_h2" name="contact_form2_h2" placeholder="Contact Form 2 Heading 2" value="{{$contact->contact_form2_h2??''}}" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Contact Form 2 Heading 3</label>
									<div class="col-sm-4">
										<input type="text" class="form-control1" id="contact_form2_h3" name="contact_form2_h3" placeholder="Contact Form 2 Heading 3" value="{{$contact->contact_form2_h3??''}}" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Contact Form 2 Heading 4</label>
									<div class="col-sm-4">
										<input type="text" class="form-control1" id="contact_form2_h4" name="contact_form2_h4" placeholder="Contact Form 2 Heading 4" value="{{$contact->contact_form2_h4??''}}" required>
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

					

					

					

				</div>

			</div>

		</div>

		

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
						
						if(height != uheight || width != uwidth) {
							alert("Please upload image "+uwidth+"x"+uheight+" resolution.");
							fileUpload.value="";
							return false;
						}else{
						   var size = parseFloat(fileUpload.files[0].size / 1024).toFixed(2);
							if(size > 1024){
								alert("Please upload max 1MB size image.");
								
								fileUpload.value="";
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
	
	</script>
		

		

@endsection

