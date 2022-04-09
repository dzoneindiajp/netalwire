@extends('layouts.front')



@section('content')

<?php //echo "<pre>";

 //print_r($html);?>

<div class="page-banner-section">
	<div class="breadcrumbs">
		<div class="container">
			<ul class="breadcrumb-items">
				<li class="breadcrumb-item trail-begin"><a href="<?php echo url("/");?>" rel="home"><span itemprop="name">Home</span></a></li>
				<li class="breadcrumb-item trail-end"><span itemprop="name">Search Results</span></li>
			</ul>
		</div>
	</div>
	<div class="page-banner page-banner-image"
		style="background-image:url(<?php echo url('front/images/banner-contact.jpg');?>);">
		<div class="container">
			<div class="page-banner-wrap">
				<h1 class="page-banner-title">Search Results</h1>

			</div>
		</div>
	</div>
</div>
<!-- page-banner-section -->



<section class="site-content">

	<div class="content-wrapper">

		<div class="container">



			<div class="row">

				<div class="content-area col-12">



					<div class="content-box">

						<h5>Here is your search result</h5>

						<h3 class="heading">Search BVK Group</h3>

						<?php $i=1; 

							  if(count($html)>=1)

							  {

							  foreach($html as $sr)

							  {?>

						<div class="row searchresults">

							<div class="col-md-12">
								<div class="contentlocation"><b>Location:</b>
									<?php echo $sr['title'];?>
								</div>
							</div>

							<?php /* echo "<pre>";

							  print_r($sr['data']);

							  die; */?>

							<?php foreach($sr['data'] as $dt)

							  {

								  

								  ?>



							<div class="col-md-12 searchtitle">

								<?php if(isset($dt->slug))

							  {
							  if(strtolower($sr['title'])=='blog'){
							      $link="blog-detail/".$dt->slug;
							  }else if(strtolower($sr['title'])=='jobs'){
							      $link="job-details/".$dt->slug;
							  }else{
							      $link="pages/".$dt->slug;
							  }
							  
							  ?>

	                <b>Title</b>: <a href="<?php echo url($link);?>">
		             <?php echo $dt->title;?>
                 	 </a>

								<?php }

							else

							{?>

								<b>Title</b>:
								<?php echo $dt->title;?>



								<?php } ?>

							</div>

							<?php if(isset($dt->description))

							  {?>

							<div class="col-md-12 searchcontent">

								<b>Description</b>:
								<?php echo $dt->description;?>



							</div>

							<?php } ?>

							<?php if(isset($dt->content))

							  {?>

							<div class="col-md-12 searchcontent">

								<b>Content</b>:
								<?php echo $dt->content;?>



							</div>

							<?php } ?>

							<?php if(isset($dt->about_content))

							  {?>

							<div class="col-md-12 searchcontent">

								<b>Content</b>:
								<?php echo $dt->about_content;?>



							</div>

							<?php } ?>
							<?php if(isset($dt->responsibility))

							  {?>

							<div class="col-md-12 searchcontent">

								<b>Responsibility</b>:
								<?php echo $dt->responsibility;?>



							</div>

							<?php } ?>
							<?php if(isset($dt->company))

							  {?>

							<div class="col-md-12 searchcontent">

								<b>Company</b>:
								<?php echo $dt->company;?>



							</div>

							<?php } ?>
							





							<?php $i++; } ?>

						</div>

						<?php 

							  }

							  }

							else{  ?>



						<div class="norcords">No search result(s) found!</div>

						<?php }?>

					</div>


				</div>

				<!--content-area -->

			</div>

			<!--row-->

		</div>

		<!--container-->





	</div>

	<!--content-wrapper -->



</section>

<!--=====================================================

                      Mainpage Section End

        =========================================================-->

@endsection