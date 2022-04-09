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
    style="background-image:url(<?php echo url("thumbnail/".$blogs[0]->banner_image);?>);">
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
            <h1 class="page-banner-title">Blog List</h1>
            </div>
        </div>
    </div>
    
</div>
<!-- page-banner-section -->



<section class="site-content bg-white">

    <div class="container">



        <div class="content-wrapper">

            <div class="page-header text-center">

                <h1 class="page-title">Blogs</h1>

            </div>

            <div class="row">

                <div class="content-area col-12">

                    <div class="page-content"> 

<div class="row">
                    <div class="content-area col-12">
                        <div class="content-section">
                            <div class="blog-list">
                                <div class="row">
                                    @foreach($blogs as $dt)
                                    <div id="blog-1" class="blog-item col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="blog-wrap">
                                            <div class="blog-image">
                                                <a href="<?php echo url("blog-detail/".$dt->slug);?>">
                                                    <?php if($dt->type_name == 'image'){ ?> 
                    						            <img src="<?php echo url("thumbnail/".$dt->image);?>" class="img-responsive">
                    						        <?php }else if($dt->type_name == 'video'){ ?>
                    							       <video width="100%" height="350" controls>
                                                          <source src="<?php echo url("uploads/".$dt->image);?>" type="video/mp4">
                                                          <source src="<?php echo url("uploads/".$dt->image);?>" type="video/mp4">
                                                         Your browser does not support the video tag.
                                                        </video>
                    					            <?php }else if($dt->type_name == 'youtube' || $dt->type_name == 'vimeo'){ ?>
                    							       <!-----iframe width="100%" height="350" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" src="<?php echo $dt->video_link;?>" frameborder="0" allowfullscreen></iframe---->
													   
													   <div class="vid">{!! $dt->video_link !!}</div>
                    						       <?php } ?>
                                                </a>
                                            </div>
                                            <div class="blog-summery">
                                                <h4 class="blog-title"><a href="<?php echo url("blog-detail/".$dt->slug);?>"><?= $dt->title;?></a></h4> 
                                                <div class="blog-content">
                                                    <p><?= $dt->description;?></p>
                                                </div>
                                                <a class="blog-more-link" href="<?php echo url("blog-detail/".$dt->slug);?>">Read More</a>
                                               
                                            </div>                                                 
                                        </div>
                                    </div>
                                 	@endforeach
                                </div> 
                                <!-- pagination -->
                                <div>{{$blogs->links()}}</div>
                            </div>   
                        </div>
                    </div>
                    <!--content-area-->
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

<style>
    
/*====================================================================
						Blog Pages Css
=======================================================================*/
.blog-item {
	margin-bottom: 30px;
	display: flex;
}
.blog-wrap {
	position: relative;
	background-color: #fff;
	width: 100%;
	box-shadow: 0 10px 10px rgba(0,0,0,0.10);
	-webkit-transition: all 0.5s ease 0s;
	transition: all 0.5s ease 0s;
}
.blog-item:hover .blog-wrap {
	box-shadow: 0 20px 10px rgba(0,0,0,0.10);
}
.blog-image {
	position: relative;
	margin-bottom: 0;
	padding-right: 20px;	
}
.blog-image::before {
	content: "";
	position: absolute;
	top: 20px;
	right: 0;
	background-color: #89afa1;
	left: 20px;
	height: 100%;
	opacity: 0.2;
}
.blog-image a {
	display: block;
	position: relative;
	overflow: hidden;
}
.blog-image img {
	width: 100%;	
}
.blog-item:hover .blog-image img {
	-webkit-transform: scale(1.05);
	transform: scale(1.05);
}
.blog-summery {
	padding: 15px 15px 15px;
	border-left: 3px solid #e0e0e0;
	position: relative;
}
.blog-summery::after {
	position: absolute;
	content: "";
	z-index: 1;
	bottom: 0;
	right: 0;
	width: 0;
	height: 0;
	border-style: solid;
	border-width: 0 0 30px 30px;
	border-color: transparent transparent #216159 transparent;
}
.blog-meta {
	color: #808080;
	font-size: 13px;
	font-style: italic;
	margin-bottom: 10px;
}
.blog-meta a {
	color: #808080;
}
.blog-meta .fa,  .blog-meta .fas {
	margin-right: 3px;
	color: #216159;
}
.blog-labels {
	position: relative;
}
.blog-labels a {
	/* background-color: #222222; */
	color: #216159;
	/* padding: 2px 0; */
	display: inline-block;
	margin: 0 3px 3px;
	font-size: 13px;
}
.blog-labels a:first-child {
	margin-left: 0;
}
.blog-title {
	margin-bottom: 10px;
	text-transform: uppercase;
	font-weight: 800;
}
.blog-title a {
	color: #363636;
	text-transform: uppercase;
}
.blog-content {
	margin-bottom: 15px;
}
.blog-content > p {
	color: #676767;
	line-height: 24px;	
	display: -webkit-box;
	-webkit-line-clamp: 3;
	-webkit-box-orient: vertical;
	overflow: hidden;
}
.blog-share-icon {
	border-top: 1px dashed #e0e0e0;
	display: table;
	padding: 10px 0 0;
	width: 100%;
	margin-top: 15px;
}
.share-title {
	display: table-cell;
	vertical-align: middle;
}
.share-icon {
	display: table-cell;
	text-align: right;
	vertical-align: middle;
}
.share-icon a {
	background-color: #808080;
	color: #fff;
	display: inline-block;
	font-size: 16px;
	height: 35px;
	padding-top: 6px;
	text-align: center;
	width: 35px;
	border-radius: 100%;
	margin-right: 7px;
}
.share-icon a.facebook {
	background-color: #3b5998;
}
.share-icon a.twitter {
	background-color: #00bdec;
}
.share-icon a.youtube {
	background-color: #c4302b;
}
.share-icon a.instagram {
	background-color: #8a3ab9;
}
.share-icon a.lindkedin {
	background-color: #0e76a8;
}
.share-icon a.pinterest {
	background-color: #c92228;
}
.share-icon a.whatsapp {
	background-color: #53ec67;
}
.share-icon a:hover {
	-webkit-transform: rotate(360deg);
	transform: rotate(360deg);
	background-color: #216159;
	color: #fff;
}
</style>

@endsection