@extends('layouts.front')
@section('content')
<?php 
use App\CMS;
$cor=new CMS;
?>
<div class="page-banner-section">
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumb-items">
                <li class="breadcrumb-item trail-begin"><?php echo $cor->getBreadCrumbs($slug);?></li>
            </ul>
        </div>
    </div>
    @if($cms->file_type=='image')
    <div class="page-banner page-banner-image" style="background-image:url('{{url('uploads/'.$cms->hero)}}');">
        <div class="container">
            <div class="page-banner-wrap">
                <h1 class="page-banner-title">
                    {{$cms->title}}
                </h1>
            </div>
        </div>
    </div>
    @elseif($cms->file_type=='video')
        <div class="container">
            <div class="page-banner-wrap">
                <h1 class="page-banner-title">
                    {{$cms->title}}
                </h1>
                <video width="200" height="200" controls>
                    <source src="{{url('uploads/'.$cms->hero)}}" type="video/mp4">
                    <source src="{{url('uploads/'.$cms->hero)}}" type="video/mp4">
                    Your browser does not support the video tag.
                 </video>
            </div>
        </div>
    @else
        <div class="container">
            <div class="page-banner-wrap">
                <h1 class="page-banner-title">
                    {{$cms->title}}
                </h1>
                <iframe width="1000" height="300" src="{{$cms->video_link}}" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    @endif
</div>
<!-- page-banner-section -->

<section class="site-content">

    <div class="content-wrapper">

        <div class="container">



            <div class="row">

                <div class="content-area col-12">



                    <div class="content-box  mb-5"> 

                        <h3 class="heading">
                            <?php echo $cms->title;?>
                        </h3>



                        <?php echo $cms->description;?>
                    </div>
                    <!-- blog and news part start-->
                    @if($cms->blog_status && $blogs)
                    <div class="case-studie-wrapper content-box">
                        <h3 class="heading">Blog(s) <a class="btn btn-primary btn-radius" href="{{url('blogs')}}" style="float: right;">View All</a>
                         </h3>
                        <div class="row">
                            <div class="case-studie-wrapper content-box">
                                <div class="row">
                                    @foreach($blogs as $dt)
                                    <div id="blog-1" class="blog-item col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="blog-wrap">
                                            <div class="blog-image">
                                                <a href="{{url('blog-detail/'.$dt->slug)}}">
                                                    <?php if($dt->type_name == 'image'){ ?> 
                                                        <img src="<?php echo url("thumbnail/".$dt->image);?>" class="img-responsive">
                                                    <?php }else if($dt->type_name == 'video'){ ?>
                                                       <video width="100%" height="350" controls>
                                                          <source src="<?php echo url("uploads/".$dt->image);?>" type="video/mp4">
                                                          <source src="<?php echo url("uploads/".$dt->image);?>" type="video/mp4">
                                                         Your browser does not support the video tag.
                                                        </video>
                                                    <?php }else if($dt->type_name == 'youtube' || $dt->type_name == 'vimeo'){ ?>
                                                       <iframe width="100%" height="350" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" src="<?php echo $dt->video_link;?>" frameborder="0" allowfullscreen></iframe>
                                                   <?php } ?>
                                                </a>
                                            </div>
                                            <div class="blog-summery">
                                                <h4 class="blog-title"><a href="{{url('blog-detail/'.$dt->slug)}}"><?= $dt->title;?></a></h4> 
                                                <div class="blog-content">
                                                    <p><?= $dt->description;?></p>
                                                </div>
                                                <a class="blog-more-link" href="{{url('blog-detail/'.$dt->slug)}}">Read More</a>
                                               
                                            </div>                                                 
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($cms->news_status && $news)
                    <div class="case-studie-wrapper content-box">
                        <h3 class="heading">News <a class="btn btn-primary btn-radius" href="{{url('news/list')}}" style="float: right;">View All</a>
                         </h3>
                        <div class="row">
                            <div class="case-studie-wrapper content-box">
                                <div class="row">
                                    @foreach($news as $op)
                                       <div class="news-item col-lg-4 col-md-4 col-sm-12 col-12 wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                                          <div class="news-wrap">
                                             <div class="news-image">
                                                <a href="<?php echo url('news-detail/'.$op->id);?>">
                                                   <?php if($op->type_name == 'image'){ ?> 
                                                   <img src="<?php echo url("thumbnail/".$op->image);?>" class="img-responsive" style="max-width:300px">
                                                   <?php }else if($op->type_name == 'video'){ ?>
                                                   <video width="320" height="240" controls>
                                                      <source src="<?php echo url("uploads/".$op->image);?>" type="video/mp4">
                                                      <source src="<?php echo url("uploads/".$op->image);?>" type="video/mp4">
                                                      Your browser does not support the video tag.
                                                   </video>
                                                   <?php }else if($op->type_name == 'youtube' || $op->type_name == 'vimeo'){ ?>
                                                   <iframe width="320" height="240" src="<?php echo $op->video_link;?>" frameborder="0" allowfullscreen></iframe>
                                                   <?php } ?> 
                                                </a>
                                             </div>
                                             <div class="news-summery">
                                                <h4 class="news-title"><?php echo $op->title;?></h4>
                                                <div class="news-content">
                                                   <p><?php echo $op->description;?> </p>
                                                </div>
                                                <a class="solution-more-link more-link" href="<?php echo url('news-detail/'.$op->id);?>">Read more  <i class="fa fa-angle-right"></i></a>
                                             </div>
                                          </div>
                                       </div>
                                       @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- blog and news part end-->
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