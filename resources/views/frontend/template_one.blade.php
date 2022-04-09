@extends('layouts.front')
@section('content')
<?php 
use App\CMS;
$cor=new CMS;

/* echo "<pre>"; print_r($cms); */
?>

<div class="page-banner-section">
    <!--<div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumb-items">
                <li class="breadcrumb-item trail-begin"><a href="<?php echo url(" /");?>" rel="home"><span itemprop="name">Home</span></a></li>
                <li class="breadcrumb-item trail-end"><span itemprop="name"><?php echo $cms->title;?> </span></li>
            </ul>
        </div>
    </div>-->
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
                <!----iframe width="1000" height="300" src="{{$cms->video_link}}" frameborder="0" allowfullscreen></iframe---->
				
				<div style="width:1000;height:300">
				 {!! $cms->video_link !!}
				</div>
            </div>
        </div>
    @endif
</div>
<?php $data=json_decode($cms->templateone_content);?>
<!-- page-banner-section -->
<section class="site-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="content-area col-12">
                    <h3 class="heading">
                        <?php echo $cms->title;?>
                    </h3>
                    <div class="feature-tab-section">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 px-md-0">
                                <ul class="nav feature-tab" id="myTab" role="tablist">
									@foreach($data as $i=>$dt)
                                    <li class="nav-item">
                                        <a class="nav-link <?php if($i==0){ echo " active";}?>" data-toggle="tab" href="{{$dt->slug}}" role="tab" aria-selected="false">
                                          <?php echo $dt->heading;?>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="feature-tabccontentcolumn col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="tab-content">
									@foreach($data as $i=>$dt)
                                    <div id="{{$dt->slug}}"
                                        class="tab-pane fade <?php if($i==0){ echo " show active";}?>">
                                        <div class="feature-tabcontent">
                                            <div class="feature-tabimg">
                                                <a @if($dt->url) href="{{$dt->url}}" @else href="#" @endif><img src="<?php echo url("uploads/".$dt->image);?>" alt=""></a>
                                            </div>
                                            <h4 class="detail-title">
                                                <?php echo $dt->heading;?>
                                            </h4>
                                            <?php echo $dt->content; ?>
                                            <a @if($dt->url) href="{{$dt->url}}" @else href="#" @endif>Read More</a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
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
                     <!--
                    <div class="content-box">

                        <div class="row">

                            <div class="col-lg-8 col-12">

                                <iframe width="100%" height="350" src="https://www.youtube.com/embed/V-N_hKnUIsc"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>

                            </div>

                            <div class="col-lg-4 col-12">

                                <h3 class="">Webcast on food safety and Industry. 4.0</h3>

                                <p>Tune in to hear more about food safety challenges in the changing world and some of
                                    the practical ways to prevent food safety issues and detect problems before they
                                    occur through digital technologies.

                                <p>

                                <p>Alex Bromage, Global Senior Food Safety and Quality Manager at Tetra Pak said, “It’s
                                    not a one-size-fits-all approach but working together as an industry with partners,
                                    there are opportunities to transform and to meet challenges of the rapidly changing
                                    world of the future. The most obvious food safety challenge that the industry is
                                    currently facing is COVID-19.</p>

                                <a href="#">View More</a>

                            </div>

                        </div>

                    </div>
                    <div class="post-wrapper">

                        <h3 class="heading text-center">Latest white papers</h3>

                        <div class="row">

                            <div class="post-item col-lg-12 col-md-12 col-sm-12 col-12 wow animate__animated animate__fadeInUp"
                                data-wow-delay="0.2s">

                                <div class="post-wrap">

                                    <div class="row">

                                        <div class="post-image-column col-lg-6 col-md-6 col-12">

                                            <div class="post-image"> <a href="#">

                                                    <img src="{{asset('/front/images/martin-lappann-tetra-pak.jpg')}}"
                                                        alt="" /> </a> </div>

                                        </div>

                                        <div
                                            class="post-summery-column col-lg-6 col-md-6 col-12 d-flex align-items-center">

                                            <div class="post-summery">

                                                <p class="post-subttile">CASE PAGE JULY 20 2020</p>

                                                <h4 class="post-title"> <a href="#"> COVID-19 and food safety</a> </h4>

                                                <div class="post-content">

                                                    <p>Should I wash food cartons after bringing them home from
                                                        shopping? The pandemic has radically changed our world. Find out
                                                        more about food safety and COVID-19</p>

                                                </div>

                                                <a class="btn btn-outline-primary btn-radius" href="#">Read More</a>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="post-item col-lg-12 col-md-12 col-sm-12 col-12 wow animate__animated animate__fadeInUp"
                                data-wow-delay="0.2s">

                                <div class="post-wrap">

                                    <div class="row flex-row-reverse">

                                        <div class="post-image-column col-lg-6 col-md-6 col-12">

                                            <div class="post-image"> <a href="#">

                                                    <img src="{{asset('/front/images/orange-juice-in-glass.jpg')}}"
                                                        alt="" /> </a> </div>

                                        </div>

                                        <div
                                            class="post-summery-column col-lg-6 col-md-6 col-12 d-flex align-items-center">

                                            <div class="post-summery">

                                                <p class="post-subttile">CASE PAGE JULY 20 2020</p>

                                                <h4 class="post-title"> <a href="#"> Juice, Nectars and Still drinks
                                                        using less water and energy</a> </h4>

                                                <div class="post-content">

                                                    <p>Should I wash food cartons after bringing them home from
                                                        shopping? The pandemic has radically changed our world. Find out
                                                        more about food safety and COVID-19</p>

                                                </div>

                                                <a class="btn btn-outline-primary btn-radius" href="#">Read More</a>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="post-item col-lg-12 col-md-12 col-sm-12 col-12 wow animate__animated animate__fadeInUp"
                                data-wow-delay="0.2s">

                                <div class="post-wrap">

                                    <div class="row">

                                        <div class="post-image-column col-lg-6 col-md-6 col-12">

                                            <div class="post-image"> <a href="#">

                                                    <img src="{{asset('/front/images/easy-pack-good-milk.jpg')}}"
                                                        alt="" /> </a> </div>

                                        </div>

                                        <div
                                            class="post-summery-column col-lg-6 col-md-6 col-12 d-flex align-items-center">

                                            <div class="post-summery">

                                                <p class="post-subttile">CASE PAGE JULY 20 2020</p>

                                                <h4 class="post-title"> <a href="#"> Shakarganj® launches all-purpose
                                                        UHT milk in Tetra Brik® Aseptic</a> </h4>

                                                <div class="post-content">

                                                    <p>Should I wash food cartons after bringing them home from
                                                        shopping? The pandemic has radically changed our world. Find out
                                                        more about food safety and COVID-19</p>

                                                </div>

                                                <a class="btn btn-outline-primary btn-radius" href="#">Read More</a>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="case-studie-wrapper">

                        <h3 class="heading">Highlighted case studies </h3>

                        <div class="row">

                            <div class="case-studie-item col-lg-4 col-md-4 col-sm-12 col-12 wow animate__animated animate__fadeInUp"
                                data-wow-delay="0.2s">

                                <div class="case-studie-wrap">

                                    <div class="case-studie-image"> <a href="#">

                                            <img src="{{asset('/front/images/boy_recycling.jpg')}}" alt="" /> </a>
                                    </div>

                                    <div class="case-studie-summery">

                                        <h4 class="case-studie-title"> Recognised with prestigious double ‘A’ score for
                                            global climate and forests stewardship</h4>

                                        <div class="case-studie-content">

                                            <p>It has been recognised for leadership in corporate sustainability by
                                                global environmental non-profit CDP, securing a place on its prestigious
                                                ‘A List’ for tackling climate change, as well as acting to protect
                                                forests </p>

                                        </div>

                                        <a class="solution-more-link more-link" href="#">Read more <i
                                                class="fa fa-angle-right"></i></a>

                                    </div>



                                </div>

                            </div>

                            <div class="case-studie-item col-lg-4 col-md-4 col-sm-12 col-12 wow animate__animated animate__fadeInUp"
                                data-wow-delay="0.2s">

                                <div class="case-studie-wrap">

                                    <div class="case-studie-image"> <a href="#">

                                            <img src="{{asset('/front/images/Tetra-Pak-Index-2020-cover.jpg')}}"
                                                alt="" /> </a> </div>

                                    <div class="case-studie-summery">

                                        <h4 class="case-studie-title"> Research study reveals food safety-environment
                                            dilemma fostered by COVID-19 pandemic </h4>

                                        <div class="case-studie-content">

                                            <p>It has been recognised for leadership in corporate sustainability by
                                                global environmental non-profit CDP, securing a place on its prestigious
                                                ‘A List’ for tackling climate change, as well as acting to protect
                                                forests </p>

                                        </div>

                                        <a class="solution-more-link more-link" href="#">Read more <i
                                                class="fa fa-angle-right"></i></a>

                                    </div>



                                </div>

                            </div>

                            <div class="case-studie-item col-lg-4 col-md-4 col-sm-12 col-12 wow animate__animated animate__fadeInUp"
                                data-wow-delay="0.2s">

                                <div class="case-studie-wrap">

                                    <div class="case-studie-image"> <a href="#">

                                            <img src="{{asset('/front/images/boy_recycling.jpg')}}" alt="" /> </a>
                                    </div>

                                    <div class="case-studie-summery">

                                        <h4 class="case-studie-title"> Stora Enso to explore the building of a recycling
                                            line for used beverage cartons </h4>

                                        <div class="case-studie-content">

                                            <p>It has been recognised for leadership in corporate sustainability by
                                                global environmental non-profit CDP, securing a place on its prestigious
                                                ‘A List’ for tackling climate change, as well as acting to protect
                                                forests </p>

                                        </div>

                                        <a class="solution-more-link more-link" href="#">Read more <i
                                                class="fa fa-angle-right"></i></a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                  -->

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