@extends('layouts.front')



@section('content')



<div class="page-banner-section">
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumb-items">
                <li class="breadcrumb-item trail-begin"><a href="<?php echo url(" /");?>" rel="home"><span itemprop="name">Home</span></a></li>
                <li class="breadcrumb-item trail-end"><span itemprop="name"><?php echo $news_data->title;?> </span></li>
            </ul>
        </div>
    </div>
    <!--<div class="page-banner page-banner-image" >
        <div class="container">
            <div class="page-banner-wrap">
                <h1 class="page-banner-title">
                    <?php echo $news_data->title;?>
                </h1>
            </div>
        </div>
    </div>-->
     @if($banner_images->news_image && $banner_images->news_image!==null && $banner_images->news_img_status==1)
    <div class="page-banner page-banner-image"
    style="background-image:url(<?php echo url("thumbnail/".$banner_images->news_image);?>);">
        @else
        <div class="page-banner page-banner-image" >
        @endif
        <div class="container">
            <div class="page-banner-wrap">
            <h1 class="page-banner-title"><?php echo $news_data->title;?></h1>
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
                    <h3 class="heading">
                        <?php echo $news_data->title;?>
                    </h3>



                    <div class="content-box">

                        <div class="row">

                            <div class="col-lg-8 col-12">
                                <?php if($news_data->type_name == 'image'){ ?> 
						            <img src="<?php echo url("thumbnail/".$news_data->image);?>" class="img-responsive">
						        <?php }else if($news_data->type_name == 'video'){ ?>
							       <video width="100%" height="350" controls>
                                      <source src="<?php echo url("uploads/".$news_data->image);?>" type="video/mp4">
                                      <source src="<?php echo url("uploads/".$news_data->image);?>" type="video/mp4">
                                     Your browser does not support the video tag.
                                    </video>
					            <?php }else if($news_data->type_name == 'youtube' || $news_data->type_name == 'vimeo'){ ?>
							       <iframe width="100%" height="350" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" src="<?php echo $news_data->video_link;?>" frameborder="0" allowfullscreen></iframe>
						       <?php } ?>
                            </div>
                            <div class="col-lg-4 col-12">

                                <h3 class="">Webcast on food safety and Industry. 4.0</h3>

                                <p><?php echo $news_data->description;?><p>

                                

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

<!--=====================================================

                      Mainpage Section End

        =========================================================-->

@endsection