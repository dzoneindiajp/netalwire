 @extends('layouts.front')



@section('content')

     <div class="page-banner-section">
        <div class="breadcrumbs">
            <div class="container">
                <ul class="breadcrumb-items">
                    <li class="breadcrumb-item trail-begin"><a href="<?php echo url("/");?>" rel="home"><span itemprop="name">Home</span></a></li>
                    <li class="breadcrumb-item trail-end"><span itemprop="name">Blogs</span></li>
                </ul>
            </div>
        </div>
    <!--<div class="page-banner page-banner-image"
    style="background-image:url(<?php echo url("thumbnail/".$blog->banner_image);?>);">
        <div class="container">
            <div class="page-banner-wrap">
            <h1 class="page-banner-title">Blog Detail</h1>
            </div>
        </div>
    </div>-->
    
     @if($banner_images->blog_image && $banner_images->blog_image!==null && $banner_images->blog_img_status==1)
    <div class="page-banner page-banner-image"
    style="background-image:url(<?php echo url("thumbnail/".$banner_images->blog_image);?>);">
        @else
        <div class="page-banner page-banner-image" >
        @endif
        
        <div class="container">
            <div class="page-banner-wrap">
            <h1 class="page-banner-title">Blog Detail</h1>
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
<div class="container">
                <div class="page-header text-center">
                    <h1 class="page-title">Blog Details</h1>
                </div>
                <div class="row">
                    <div class="content-area col-lg-9 col-12">
                        <div class="post-outer">                
                            <div id="blog-1" class="single-blog-item">
                                <div class="single-blog-wrap">
                                    <div class="single-blog-image"> 
                                        <?php if($blog->type_name == 'image'){ ?> 
        						            <img src="<?php echo url("thumbnail/".$blog->image);?>" class="img-responsive">
        						        <?php }else if($blog->type_name == 'video'){ ?>
        							       <video width="100%" height="350" controls>
                                              <source src="<?php echo url("uploads/".$blog->image);?>" type="video/mp4">
                                              <source src="<?php echo url("uploads/".$blog->image);?>" type="video/mp4">
                                             Your browser does not support the video tag.
                                            </video>
        					            <?php }else if($blog->type_name == 'youtube' || $blog->type_name == 'vimeo'){ ?>
        							       <!----iframe width="100%" height="350" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" src="<?php echo $blog->video_link;?>" frameborder="0" allowfullscreen></iframe---->
										   
										  <div class="vid">{!! $blog->video_link !!}</div>
        						       <?php } ?> 
                                    </div>
                                    <div class="single-blog-summery">
                                        <h4 class="single-blog-title"><?= $blog->title;?></h4> 
                                        <div class="single-blog-content">
                                            <p><?= $blog->description;?> </p>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <!--blog-item-->
                        </div>
                    </div>
                    <!--content-area -->
                    <div id="sidebar" class="sidebar widget-area col-lg-3 col-12">                
                        <div class="widget widget-recent-entries">
                            <h3 class="widget-title">Recent Blogs</h3>
                            <ul>
                                
                                    <?php 
                                    foreach($blogs as $dt) { ?>
                                <li>
                                    <a href="<?php echo url("blog-detail/".$dt->slug);?>"><?= $dt->title;?> </a>
                                </li>
                                
                                <?php } ?>
                                 
                            </ul>                
                        </div> 
                    </div>
                    <!-- .sidebar .widget-area -->
                </div>
                <!--row-->
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