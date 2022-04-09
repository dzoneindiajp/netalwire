@extends('layouts.app')

@section('content')

<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					
					
					
					<div class="row">
						<h3 class="title1">Add Product:</h3>
						<div class="form-three widget-shadow">
							<form class="form-horizontal" method="post" action="<?php echo url("product/updateproduct");?>" enctype="multipart/form-data">
								@csrf
								
								<div class="form-group">
									<label  class="col-sm-2 control-label">Select category:</label>
									<div class="col-sm-8">
										<select name="category" class="form-control">
										
										<option value="">Select Category</option>
										<?php foreach($productcategory as $pc)
										{?>
										<option value="<?php echo $pc->id; ?>" <?php if($product->category_id==$pc->id){ echo "selected";}?>><?php echo $pc->category_name; ?></option>
										<?php } ?>
										
										</select>
									</div>
								</div>
								<div class="form-group">
									<label  class="col-sm-2 control-label">Product Title:</label>
									<div class="col-sm-8">
										<input name="name" class="form-control" value="<?php echo $product->product_name;?>">
										<input name="id" type="hidden" class="form-control" value="<?php echo $product->id;?>">  
									</div>
								</div>
								
								<div class="form-group">
									<label  class="col-sm-2 control-label">Product Description:</label>
									<div class="col-sm-8">
										<input name="description" class="form-control" value="<?php echo $product->product_description;?>">
									</div>
								</div>
						       <div class="form-group">
								<label  class="col-sm-2 control-label">Select Product Template:</label>
								<div class="col-sm-8">
										<label class="radio-inline">
										<input type="radio" name="template" class="template" <?php if($product->template=='t1'){ echo "checked";}?> value="t1">Template 1
										</label>
										<label class="radio-inline">
										<input type="radio" name="template" <?php if($product->template=='t2'){ echo "checked";}?>  class="template" value="t2">Template 2
										</label>
										<label class="radio-inline">
										<input type="radio" name="template" <?php if($product->template=='t3'){ echo "checked";}?>  class="template"  value="t3">Template 3
										</label>
										 
										
								</div>
								</div>
								<?php if($product->template=='t1'){
									$t1tdata=json_decode($product->templatedata);
									
								}									?>
								<div class="template1" style="display:<?php if($product->template!='t1'){ echo "none";}?> ">
								    <h3>First Block</h3>
								    <div class="form-group">
									<label  class="col-sm-2 control-label">Base Image:</label>
									<div class="col-sm-8">
										<input name="t1b1baseimage" type="file" class="form-control" onchange="validateimg(this,1500,1000)">
										<p class="notice">(Preferred Image resolution in 1500x1000 Max 2 Mb)</p>
										<?php if(isset($t1tdata))
										{?>
										<img src="<?php echo url("uploads/".$t1tdata->t1b1baseimage);?>" style="width:100px;">
										<input type="hidden" name="oldt1b1baseimage" value="<?php echo $t1tdata->t1b1baseimage; ?>">
										<?php } ?>
									</div>
								</div>
								 <h3>Second Block</h3>
								  <div class="form-group">
									<label  class="col-sm-2 control-label">Heading:</label>
									<div class="col-sm-8">
										<input name="t1b2heading" class="form-control" value="<?php if(isset($t1tdata))
										{  echo $t1tdata->t1b2heading; }?>" >
									</div>
								</div>
								
								 <div class="form-group">
									<label  class="col-sm-2 control-label">Description:</label>
									<div class="col-sm-8">
										<input name="t1b2description" class="form-control" value="<?php if(isset($t1tdata))
										{  echo $t1tdata->t1b2description; }?>"> 
									</div>
								</div>
								
							
								<div class="form-group">
									<label  class="col-sm-2 control-label">Image 1:</label>
									<div class="col-sm-8">
										<input name="t1b2image1" type="file" class="form-control" onchange="validateimg(this,600,600)">
										<p class="notice">(Preferred Image resolution in 600x600 max 2 Mb)</p>
										<?php if(isset($t1tdata))
										{?>
										<img src="<?php echo url("uploads/".$t1tdata->t1b2image1);?>" style="width:100px;">
										<input type="hidden" name="oldt1b2image1" value="<?php echo $t1tdata->t1b2image1; ?>">
										<?php } ?>
										
									</div>
								</div>
								
								<div class="form-group">
									<label  class="col-sm-2 control-label">Image 2:</label>
									<div class="col-sm-8">
										<input name="t1b2image2" type="file" class="form-control" onchange="validateimg(this,600,600)">
										<p class="notice">(Preferred Image resolution in 600x600 max 2 Mb)</p>
										
										<?php if(isset($t1tdata))
										{?>
										<img src="<?php echo url("uploads/".$t1tdata->t1b2image2);?>" style="width:100px;">
										<input type="hidden" name="oldt1b2image2" value="<?php echo $t1tdata->t1b2image2; ?>">
										<?php } ?>
										
										
									</div>
								</div>
									<div class="form-group">
									<label  class="col-sm-2 control-label">Image 3:</label>
									<div class="col-sm-8">
										<input name="t1b2image3" type="file" class="form-control" onchange="validateimg(this,600,900)">
										<p class="notice">(Preferred Image resolution in 600x900 max 2 Mb)</p>
										
										<?php if(isset($t1tdata))
										{?>
										<img src="<?php echo url("uploads/".$t1tdata->t1b2image3);?>" style="width:100px;">
										<input type="hidden" name="oldt1b2image3" value="<?php echo $t1tdata->t1b2image2; ?>">
										<?php } ?>
										
										
									</div>
								</div>
								
								
								<h3>Third Block</h3>
								  <div class="form-group">
									<label  class="col-sm-2 control-label">Heading:</label>
									<div class="col-sm-8">
										<input name="t1b3heading" class="form-control" value="<?php if(isset($t1tdata))
										{ echo $t1tdata->t1b3heading; }?>">
									</div>
								</div>
								
								 <div class="form-group">
									<label  class="col-sm-2 control-label">Description:</label>
									<div class="col-sm-8">
										<input name="t1b3description" class="form-control" value="<?php if(isset($t1tdata))
										{ echo $t1tdata->t1b3description; }?>">
									</div>
								</div>
								
								
								
								<div class="form-group">
									<label  class="col-sm-2 control-label">Image 1:</label>
									<div class="col-sm-8">
										<input name="t1b3image1" type="file" class="form-control"  onchange="validateimg(this,1000,1500)">
										<p class="notice">(Preferred Image resolution in 1000x1500 max 2 Mb)</p>
										<?php if(isset($t1tdata))
										{?>
										<img src="<?php echo url("uploads/".$t1tdata->t1b3image1);?>" style="width:100px;">
										<input type="hidden" name="oldt1b3image1" value="<?php echo $t1tdata->t1b2image2; ?>">
										<?php } ?>
										
									</div>
								</div>
								
								<div class="form-group">
									<label  class="col-sm-2 control-label">Image 2:</label>
									<div class="col-sm-8">
										<input name="t1b3image2" type="file" class="form-control" onchange="validateimg(this,1000,1500)">
										<p class="notice">(Preferred Image resolution in 1000x1500 max 2 Mb)</p>
										<?php if(isset($t1tdata))
										{?>
										<img src="<?php echo url("uploads/".$t1tdata->t1b3image2);?>" style="width:100px;">
										<input type="hidden" name="oldt1b3image2" value="<?php echo $t1tdata->t1b2image2; ?>">
										<?php } ?>
									</div>
								</div>
									<div class="form-group">
									<label  class="col-sm-2 control-label">Image 3:</label>
									<div class="col-sm-8">
										<input name="t1b3image3" type="file" class="form-control" onchange="validateimg(this,1000,1500)">
										<p class="notice">(Preferred Image resolution in 1000x1500 max 2 Mb)</p>
										
										<?php if(isset($t1tdata))
										{?>
										<img src="<?php echo url("uploads/".$t1tdata->t1b3image3);?>" style="width:100px;">
										<input type="hidden" name="oldt1b3image3" value="<?php echo $t1tdata->t1b3image3; ?>">
										<?php } ?>
									</div>
								</div>
								    
								    
								    
								</div>
								
								
								
								<?php if($product->template=='t2'){
									$t2tdata=json_decode($product->templatedata);
								}									?>
								
								<div class="template2" style="display:<?php if($product->template!='t2'){ echo "none";}?>">
								    <h3>First Block</h3>
								    <div class="form-group">
									<label  class="col-sm-2 control-label">Base Image 1:</label>
									<div class="col-sm-8">
										<input name="t2b1baseimage1" type="file" class="form-control" onchange="validateimg(this,600,900)">
										<p class="notice">(Preferred Image resolution in 600x900 max 2 Mb)</p>
										<?php if(isset($t2tdata))
										{?>
										<img src="<?php echo url("uploads/".$t2tdata->t2b1baseimage1);?>" style="width:100px;">
										<input type="hidden" name="oldt2b1baseimage1" value="<?php echo $t2tdata->t2b1baseimage1; ?>">
										<?php } ?>
										
										
									</div>
								</div>
								<div class="form-group">
									<label  class="col-sm-2 control-label">Base Image 2:</label>
									<div class="col-sm-8">
										<input name="t2b1baseimage2" type="file" class="form-control" onchange="validateimg(this,600,900)">
										<p class="notice">(Preferred Image resolution in 600x900 max 2 Mb)</p>
										<?php if(isset($t2tdata))
										{?>
										<img src="<?php echo url("uploads/".$t2tdata->t2b1baseimage2);?>" style="width:100px;">
										<input type="hidden" name="oldt2b1baseimage2" value="<?php echo $t2tdata->t2b1baseimage2; ?>">
										<?php } ?>
									</div>
								</div>
								<div class="form-group">
									<label  class="col-sm-2 control-label">Base Image 3:</label>
									<div class="col-sm-8">
										<input name="t2b1baseimage3" type="file" class="form-control" onchange="validateimg(this,600,600)">
										<p class="notice">(Preferred Image resolution in 600x600 max 2 Mb)</p>
										<?php if(isset($t2tdata))
										{?>
										<img src="<?php echo url("uploads/".$t2tdata->t2b1baseimage3);?>" style="width:100px;">
										<input type="hidden" name="oldt2b1baseimage3" value="<?php echo $t2tdata->t2b1baseimage3; ?>">
										<?php } ?>
									</div>
								</div>
								 <h3>Second Block</h3>
								  <div class="form-group">
									<label  class="col-sm-2 control-label">Heading:</label>
									<div class="col-sm-8">
										<input name="t2b2heading" class="form-control" value="<?php if(isset($t2tdata))
										{ echo $t2tdata->t2b2heading; }?>">
									</div>
								</div>
								
								 <div class="form-group">
									<label  class="col-sm-2 control-label">Description:</label>
									<div class="col-sm-8">
										<input name="t2b2description" class="form-control" value="<?php if(isset($t2tdata))
										{ echo $t2tdata->t2b2description; }?>">
									</div>
								</div>
								
							
								<div class="form-group">
									<label  class="col-sm-2 control-label">Image 1:</label>
									<div class="col-sm-8">
										<input name="t2b2image1" type="file" class="form-control" onchange="validateimg(this,1000,1500)">
										<p class="notice">(Preferred Image resolution in 1000x1500 max 2 Mb)</p>
										<?php if(isset($t2tdata))
										{?>
										<img src="<?php echo url("uploads/".$t2tdata->t2b2image1);?>" style="width:100px;">
										<input type="hidden" name="oldt2b2image1" value="<?php echo $t2tdata->t2b2image1; ?>">
										<?php } ?>
									</div>
								</div>
								
							
								
								
								<h3>Third Block</h3>
								  <div class="form-group">
									<label  class="col-sm-2 control-label">Heading:</label>
									<div class="col-sm-8">
										<input name="t2b3heading" class="form-control" value="<?php if(isset($t2tdata))
										{ echo $t2tdata->t2b3heading; }?>">
									</div>
								</div>
								
								 <div class="form-group">
									<label  class="col-sm-2 control-label">Description:</label>
									<div class="col-sm-8">
										<input name="t2b3description" class="form-control" value="<?php if(isset($t2tdata))
										{ echo $t2tdata->t2b3description; }?>">
									</div>
								</div>
								
								
								
								<div class="form-group">
									<label  class="col-sm-2 control-label">Image 1:</label>
									<div class="col-sm-8">
										<input name="t2b3image1" type="file" class="form-control" onchange="validateimg(this,600,900)">
										<p class="notice">(Preferred Image resolution in 600x900 max 2 Mb)</p>
										<?php if(isset($t2tdata))
										{?>
										<img src="<?php echo url("uploads/".$t2tdata->t2b3image1);?>" style="width:100px;">
										<input type="hidden" name="oldt2b3image1" value="<?php echo $t2tdata->t2b3image1; ?>">
										<?php } ?>
									</div>
								</div>
								
								<div class="form-group">
									<label  class="col-sm-2 control-label">Image 2:</label>
									<div class="col-sm-8">
										<input name="t2b3image2" type="file" class="form-control" onchange="validateimg(this,600,900)">
										<p class="notice">(Preferred Image resolution in 600x900 max 2 Mb)</p>
										<?php if(isset($t2tdata))
										{?>
										<img src="<?php echo url("uploads/".$t2tdata->t2b3image2);?>" style="width:100px;">
										<input type="hidden" name="oldt2b3image2" value="<?php echo $t2tdata->t2b3image2; ?>">
										<?php } ?>
									</div>
								</div>
									<div class="form-group">
									<label  class="col-sm-2 control-label">Image 3:</label>
									<div class="col-sm-8">
										<input name="t2b3image3" type="file" class="form-control" onchange="validateimg(this,600,900)">
										<p class="notice">(Preferred Image resolution in 600x900 max 2 Mb)</p>
										<?php if(isset($t2tdata))
										{?>
										<img src="<?php echo url("uploads/".$t2tdata->t2b3image3);?>" style="width:100px;">
										<input type="hidden" name="oldt2b3image3" value="<?php echo $t2tdata->t2b3image3; ?>">
										<?php } ?>
									</div>
								</div>
								    
								    
								    
								</div>
								
								
								
								<?php if($product->template=='t3'){
									$t3tdata=json_decode($product->templatedata);
								}									?>
								<div class="template3" style="display:<?php if($product->template!='t3'){ echo "none";}?>">
								    <h3>First Block</h3>
								    <div class="form-group">
									<label  class="col-sm-2 control-label">Base Image 1:</label>
									<div class="col-sm-8">
										<input name="t3b1baseimage1" type="file" class="form-control" onchange="validateimg(this,1000,1500)">
										<p class="notice">(Preferred Image resolution in 1000x1500 max 2 Mb)</p>
										<?php if(isset($t3tdata))
										{?>
										<img src="<?php echo url("uploads/".$t3tdata->t3b1baseimage1);?>" style="width:100px;">
										<input type="hidden" name="oldt3b1baseimage1" value="<?php echo $t3tdata->t3b1baseimage1 ?>">
										<?php } ?>
									</div>
								</div>
								<div class="form-group">
									<label  class="col-sm-2 control-label">Base Image 2:</label>
									<div class="col-sm-8">
										<input name="t3b1baseimage2" type="file" class="form-control" onchange="validateimg(this,1000,1500)">
										<p class="notice">(Preferred Image resolution in 1000x1500 max 2 Mb)</p>
										<?php if(isset($t3tdata))
										{?>
										<img src="<?php echo url("uploads/".$t3tdata->t3b1baseimage2);?>" style="width:100px;">
										<input type="hidden" name="oldt3b1baseimage2" value="<?php echo $t3tdata->t3b1baseimage2 ?>">
										<?php } ?>
									</div>
								</div>
								
								 <h3>Second Block</h3>
								  <div class="form-group">
									<label  class="col-sm-2 control-label">Heading:</label>
									<div class="col-sm-8">
										<input name="t3b2heading" class="form-control" value="<?php if(isset($t3tdata))
										{ echo $t3tdata->t3b2heading; }?>">
									</div>
								</div>
								
								 <div class="form-group">
									<label  class="col-sm-2 control-label">Description:</label>
									<div class="col-sm-8">
										<input name="t3b2description" class="form-control" value="<?php if(isset($t3tdata))
										{ echo $t3tdata->t3b2description; }?>">
									</div>
								</div>
								
							
							
									<div class="form-group">
									<label  class="col-sm-2 control-label">Image 1:</label>
									<div class="col-sm-8">
										<input name="t3b2image1" type="file" class="form-control" onchange="validateimg(this,1000,1500)">
										<p class="notice">(Preferred Image resolution in 1000x1500 max 2 Mb)</p>
										<?php if(isset($t3tdata))
										{?>
										<img src="<?php echo url("uploads/".$t3tdata->t3b2image1);?>" style="width:100px;">
										<input type="hidden" name="oldt3b2image1" value="<?php echo $t3tdata->t3b2image1 ?>">
										<?php } ?>
									</div>
								</div>
								
								<div class="form-group">
									<label  class="col-sm-2 control-label">Image 2:</label>
									<div class="col-sm-8">
										<input name="t3b2image2" type="file" class="form-control" onchange="validateimg(this,1000,1500)">
										<p class="notice">(Preferred Image resolution in 1000x1500 max 2 Mb)</p>
										<?php if(isset($t3tdata))
										{?>
										<img src="<?php echo url("uploads/".$t3tdata->t3b2image2);?>" style="width:100px;">
										<input type="hidden" name="oldt3b2image2" value="<?php echo $t3tdata->t3b2image2 ?>">
										<?php } ?>
									</div>
								</div>
									<div class="form-group">
									<label  class="col-sm-2 control-label">Image 3:</label>
									<div class="col-sm-8">
										<input name="t3b2image3" type="file" class="form-control" onchange="validateimg(this,1000,1500)">
										<p class="notice">(Preferred Image resolution in 1000x1500 max 2 Mb)</p>
										<?php if(isset($t3tdata))
										{?>
										<img src="<?php echo url("uploads/".$t3tdata->t3b2image3);?>" style="width:100px;">
										<input type="hidden" name="oldt3b2image3" value="<?php echo $t3tdata->t3b2image3 ?>">
										<?php } ?>
									</div>
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
						console.log(width+"ssdsd"+height); 
                        if (height > uheight || width > uwidth) {
                            alert("Please upload image with "+uwidth+"x"+uheight+" resolution.");
							fileUpload.value="";
                            return true;
                        }else{
                           
                            return true;
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
		<script>
		    $(document).ready(function(){
		        $('input[name="template"]').click(function(){
		        if($(this).is(':checked'))
{
   var tmp=$(this).val();
   if(tmp=='t1')
   {
       $(".template1").show();
       $(".template2").hide();
       $(".template3").hide();
   }
    if(tmp=='t2')
   {
       $(".template1").hide();
       $(".template2").show();
       $(".template3").hide();
   }
    if(tmp=='t3')
   {
       $(".template1").hide();
       $(".template2").hide();
       $(".template3").show();
   }
}else
{
 // unchecked
}
		    }); })
		    
		    </script>
@endsection
