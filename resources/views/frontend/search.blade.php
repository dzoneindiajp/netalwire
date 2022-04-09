@extends('layouts.front')



@section('content')



<div class="page-banner-section">
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumb-items">
                <li class="breadcrumb-item trail-begin"><a href="<?php echo url(" /");?>" rel="home"><span itemprop="name">Home</span></a></li>
                <li class="breadcrumb-item trail-end"><span itemprop="name">Search</span></li>
            </ul>
        </div>
    </div>
    <!--<div class="page-banner page-banner-image"
    style="background-image:url(<?php echo url("thumbnail/".$job[0]->banner_image);?>);">
        <div class="container">
            <div class="page-banner-wrap">
            <h1 class="page-banner-title">Job Opening</h1>
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

            <div class="page-header text-center">

                <h1 class="page-title">

                    Current Opening </h1>

            </div>

            <div class="row">

                <div class="content-area col-12">

                    <div class="page-content">

                       <!-- <form action="" method="post">

                            <div class="form-group-row">

                                <div class="form-group">

                                    <label>Search by Keyword</label>

                                    <input type="text" class="form-control" id="keyword" name="keyword"
                                        value="{{ $keyword }}">
                                    @csrf

                                </div>

                                <div class="form-group">

                                    <label>Search by Location</label>
                                    <input type="text" class="form-control" id="location" name="location"
                                        value="{{ $location }}">

                                </div>


                                <div class="form-submit">

                                    <button class="btn btn-primary" type="submit">Search Jobs</button>

                                </div>

                                <div class="form-submit">

                                    <a href="{{ url("/job") }}" class="btn btn-primary" type="submit">Reset</a>

                                </div>

                            </div>

                        </form>-->

                        <div class="search-result">

                            <h4 class="search-result-title page-section-title">Search Result</h4>

                            <div class="search-result-form">

                                <form action="<?php echo url('filter');?>" method="post">

                                    @csrf

                                    <div class="form-row">

                                        <div class="form-group col-md-3">

                                            <input id="title" data-column="company" value="{{ $company }}"
                                                class="form-control" title="Filter: Company" type="text" name="company"
                                                maxlength="50" placeholder="Company" autocomplete="off">

                                        </div>
                                        <div class="form-group col-md-3">

                                            <input id="title" data-column="title" value="{{ $keyword }}"
                                                class="form-control" title="Filter: Title" type="text" name="title"
                                                maxlength="50" placeholder="Title" autocomplete="off">

                                        </div>

                                        <div class="form-group col-md-3">

                                            <input id="location" data-column="location" value="{{ $location }}"
                                                class="form-control" title="Filter: Location" type="text"
                                                name="location" maxlength="50" placeholder="Location"
                                                autocomplete="off">

                                        </div>
                                        <div class="form-group col-md-3">

                                            <select name="company_function" class="form-control">
                                                <option value="">Select Function</option>
                                                <?php foreach($company_functions as $cf)
										{?>
                                                <option value="<?php echo $cf->id?>" @if($company_select==$cf->id) selected @endif >
                                                    <?php echo $cf->company_function?>
                                                </option>
                                                <?php } ?>
                                            </select>

                                        </div>
                                        <div class="form-group col-md-3">

                                            <select name="level" class="form-control">
                                                <option value="">Select Level</option>
                                                <?php foreach($level as $cf)
										{?>
                                                <option value="<?php echo $cf->id?>" @if($level_selected==$cf->id) selected @endif>
                                                    <?php echo $cf->level_name?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12 text-right">
                                            <input type="submit" id="searchfilter-submit" value="Filter"
                                                class="btn btn-primary">
                                            <a href="<?php echo url("/job");?>" class="btn btn-primary"
                                                type="submit">Reset</a>
                                        </div>
                                </form>
                            </div>

                        </div>



                        <div class="search-result-body table-responsive">

                            <?php if(count($job)>=1)

					{?>

                            <table class="table table-bordered" id="example">

                                <thead>

                                    <tr>
                                        <th>Company</th>
                                        <th>Logo</th>
                                        <th>Title</th>
                                        <th>Location</th>
                                        <th>Company Function</th>
                                        <th>Level</th>
                                        <th>Date</th>
                                        <th width="90">Action</th>
                                    </tr>

                                </thead>

                                <tbody>

                                    <?php 
								    $i=1;
								  foreach($job as $jb) { ?>
                                    <tr>
                                        <td style="max-width:10%;">
                                            <?php echo $jb->company;?>
                                        </td>
                                        <td style="max-width:10%; text-align: center;"><img src="<?php echo url("uploads/".$jb->logo);?>" style="width: 100px; height: 80px;">
                                        </td>
                                        <td style="max-width:10%;">
                                            <?php echo $jb->title;?>
                                        </td>
                                        <td style="max-width:10%;">
                                            <?php echo $jb->location;?>
                                        </td>
                                        <td style="max-width:10%;">
                                            <?php echo $jb->company_function;?>
                                        </td>
                                        <td style="max-width:10%;">
                                            <?php echo $jb->level_name;?>
                                        </td>
                                        <td class="date">
                                            <?php echo date("d-M-Y ",strtotime($jb->created_at)); ?>
                                        </td>
                                        <td class="action"><a href="<?php echo url("job-details/".$jb->slug);?>"
                                                class="" title="View Details"> View </a></td>
                                    </tr>

                                    <?php } $i++; ?>





                                </tbody>

                            </table>

                            <?php }

                       else{

						    echo "<h1>No Result(s) Found!</h1>";  

					   } ?>

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