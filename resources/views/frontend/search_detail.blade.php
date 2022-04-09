 @extends('layouts.front')



@section('content')

     <div class="page-banner-section">
        <div class="breadcrumbs">
            <div class="container">
                <ul class="breadcrumb-items">
                    <li class="breadcrumb-item trail-begin"><a href="<?php echo url("/");?>" rel="home"><span itemprop="name">Home</span></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo url("job");?>" rel="home"><span itemprop="name">Search</span></a></li>
                    <li class="breadcrumb-item trail-end"><span itemprop="name">Search Result</span></li>
                </ul>
            </div>
        </div>
    <!--<div class="page-banner page-banner-image"
    style="background-image:url(<?php echo url("thumbnail/".$jobs[0]->banner_image);?>);">
        <div class="container">
            <div class="page-banner-wrap">
            <h1 class="page-banner-title">Job details</h1>
            </div>
        </div>
    </div>-->
    
    @if($banner_images->job_image && $banner_images->job_image!==null && $banner_images->job_img_status==1)
    <div class="page-banner page-banner-image"
    style="background-image:url(<?php echo url("thumbnail/".$banner_images->job_image);?>);">
        @else
        <div class="page-banner page-banner-image" >
        @endif
        
        <div class="container">
            <div class="page-banner-wrap">
            <h1 class="page-banner-title">Job Opening</h1>
            </div>
        </div>
    </div>
    
    
        </div>
        <!-- page-banner-section -->

        <section class="site-content bg-white">

            <div class="container">



                <div class="content-wrapper">

                   

                    <div class="row">

                        <div class="content-area col-12">

                            <div class="page-content"> 

                            <!--<form action="<?php echo url("job");?>" method="post">

							@csrf

                                <div class="form-group-row">

                                    <div class="form-group">

                                        <label>Search by Keyword</label>

                                        <input type="text" class="form-control" id="title"

                                            name="title">

                                    </div>

                                    <div class="form-group">

                                        <label>Search by Location</label>

                                        <input type="text" class="form-control" id="location"

                                            name="location">

                                    </div>

                                    <div class="form-submit">

                                        <button class="btn btn-primary" type="submit">Search Jobs</button>

                                    </div>

                                </div>

                            </form> -->

							 

                            <div class="job-display">

							

                                <?php 

								   foreach($jobs as $job)

								   {

									   ?>

								       <div class="job-header">

								

										<h1 class="job-title"><?php echo $job->title;?></h1>

										<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#applynow">Apply now</a>

										</div>

										<p class="jobdate"><strong>Date: </strong><?php echo date("d-M-Y ",strtotime($job->created_at)); ?> </p>

										<p class="joblocation"><strong>Location:</strong> <span><?php echo $job->location?></span></p>

										<p class="jobcompany"><strong>Company: </strong><span><?php echo $job->company?></span></p>
										
										@if (!empty($job->company_function)) 
    									    <p class="jobcompany"><strong>Company Function: </strong><span><?php echo $job->company_function?></span></p>
									    @endif
	
	
										@if (!empty($job->company_function)) 
    									    <p class="jobcompany"><strong>Level: </strong><span><?php echo $job->level_name?></span></p>
									    @endif 

									   <div class="job">

                                    <p><strong>Description: </strong><?php echo $job->description?></p>



                                    <p><strong>Responsibility: </strong><?php echo $job->responsibility?></p>



                              </div>

				   

						 <?php } ?>

						 

								

							  <div class="text-right">

                                    <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#applynow">Apply now</a>

                                </div>

                            </div>

							

                            <!-- Modal -->

                            <div class="modal fade" id="applynow" tabindex="-1" role="dialog">

                                <div class="modal-dialog modal-dialog-centered" role="document">

                                <div class="modal-content">

                                    <div class="modal-header">

                                    <h5 class="modal-title">Apply Now</h5>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                        <span aria-hidden="true">&times;</span>

                                    </button>

                                    </div>

                                    <div class="modal-body">

                                        <form action="<?php echo url("job-apply");?>" method="post" enctype="multipart/form-data">  

										@csrf   

                                            <div class="row">

                                            <div class="form-group col-sm-6 col-12">

                                                <label>Name</label><input type="text" name="name" value="" size="40" class="form-control" aria-required="true" aria-invalid="false" required>

												<input type="hidden" name="id" value="<?php echo $job->id?>" size="40" class="form-control" aria-required="true" aria-invalid="false">

                                            </div>

                                            <div class="form-group col-sm-6 col-12">

                                                <label>Email</label><input type="email" name="email" value="" size="40" class="form-control" aria-required="true" aria-invalid="false" required>

                                            </div>

                                            <div class="form-group col-sm-6 col-12">

                                                <label>Phone</label><input type="tel" name="phone" value="" size="40" class="form-control" aria-required="true" aria-invalid="false">

                                            </div>

                                            <div class="form-group col-sm-6 col-12">

                                                <label >Upload Resume/ CV</label><input type="file" name="image" id="my_file_field" value="" size="40" accept=".pdf, .xlx, .csv" class="form-control" aria-required="true" aria-invalid="false" required>
                                                   <p class="notice" style="font-size: 12px;color: #b87906;font-weight: bold;">(pdf, xlx, csv files accept only)</p>
                                            </div>

                                            <div class="form-group col-sm-12 col-12">

                                                <label>Short Description</label><textarea name="description" cols="40" rows="10" class="form-control" aria-invalid="false"></textarea>

                                            </div>

                                            <div class="col-sm-12 col-12">

                                            <input type="submit" value="Submit" class="btn btn-primary form-submit"><span class="ajax-loader">

                                            </span></div>

                                            </div>

                                            </form>

                                    </div>                                   

                                </div>

                                </div>

                            </div>

                        </div>



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

	

	

  @endsection