@extends('layouts.front')
@section('content')
<style>
   .about-content h1::after {
   float: left;
   margin: 0px 0px 0px -29px;

   position: absolute;

   left: 30px;

   right: -7px;

   bottom: 0px;

   /*width: 112px;*/

   width: 100%;

   height: 2px;

   /*background-color: #3a389b;*/

   background-color: #5e5e61;

   content: "";

   }

   .about-content h1::before {

   width: 0px!important;

   }
   
   .solution-image{
	   margin-left: 0px;
   }

</style>

<section class="home-site-content">

   <?php if(count($homeblock)>=1)

      {

      

      $slider=array();

      foreach($slidertext as $hb)
       {
          $slider[]=$hb->slider_text;

         }	
      ?>

   <div class="slider-section">
      
      <?php if($homeblock[0]->type_name=='image'){  ?>
        @if(count($slidertext) > 0)
			@if($slidertext != null)
			  <div class="slider-typetext">

				 <a href="" class="typewrite" data-period="3000" data-type='[ "<?php echo implode('", "',$slider)?>" ]'>

				 <span class="wrap"></span>

				 </a>

			  </div>
			 @endif
         @endif

      <?php }else{ ?>

      <style>

         .slider-images::before{

         height: unset!important;

         }

      </style>

      <?php }?>

		@if(count($homeblock) > 0)
      <div class="slider-carousel">

         <?php foreach($homeblock as $hb){ ?>

         <div class="slider-item">

            <div class="slider-images">

               <!--<img src="<?php echo url("image/".$hb->home_image);?>" />-->

               <?php if($hb->type_name=='image'){ ?>
				@if(trim($hb->home_image) != "")
					<img src="<?php echo url("image/".$hb->home_image);?>">
				@endif;
               <?php }elseif($hb->type_name == 'video'){ ?>
				@if(trim($hb->home_image) != "")
				   <video width="1320" height="540" controls>

					  <source src="<?php echo url("image/".$hb->home_image);?>" type="video/mp4">

					  <source src="<?php echo url("image/".$hb->home_image);?>" type="video/mp4">

					  Your browser does not support the video tag.

				   </video>
				@endif;
               <?php }else{ ?>
				@if(trim($hb->video_link) != "")
					<iframe width="1320" height="540" src="<?php echo $hb->video_link;?>" frameborder="0" allowfullscreen></iframe>
				@endif;
               <?php } ?>

            </div>

         </div>

         <?php } ?>

      </div>
	  @endif;
 
   </div>

   <?php } ?>   

   <!--=====================================================

      Slider  Section End

      =========================================================-->
<?php if($aboutblock)

               {?>
   <div class="about-section">

      <div class="container-custom">

         <div class="about-wrapper">

            

            <div class="row">

               <div class="col-lg-7 col-md-12 col-sm-12 col-12 pr-lg-5 d-flex align-items-center wow animate__animated animate__fadeInLeft" data-wow-delay="0.2s">

                  <div class="about-content-block">

                     <div class="about-content">

                        <h1><?php echo $aboutblock->title;?></h1>

                        <?php echo $aboutblock->about_content;?>

                     </div>

                  </div>

               </div>

               <div class="col-lg-5 col-md-12 col-sm-12 col-12 wow animate__animated animate__fadeInRight" data-wow-delay="0.2s">

                  <div class="about-image-block">

                      

                     <!--<div class="about-image">

                        <img src="<?php echo url("uploads/".$aboutblock->about_image);?>" alt="">  

                     </div>-->

                     

                     <div class="about-image">

                      @if($aboutblock->type_name == 'image')

                              @if($aboutblock->redirection_url && $aboutblock->redirection_url!='')

                              <a href="{{$aboutblock->redirection_url }}" target="_blank">

                                  <img src="{{ url("thumbnail/".$aboutblock->about_image) }}" class="img-responsive">

                                  </a>

                              @else

                           <img src="{{ url("thumbnail/".$aboutblock->about_image) }}" class="img-responsive">

                           @endif

                           @elseif($aboutblock->type_name == 'video')

                           <video width="420" height="360" controls>

                              <source src="{{ url("uploads/".$aboutblock->about_image) }}" type="video/mp4">

                              <source src="{{ url("uploads/".$aboutblock->about_image) }}" type="video/mp4">

                              Your browser does not support the video tag.

                           </video>

                           @elseif($aboutblock->type_name == 'youtube' || $aboutblock->type_name == 'vimeo')

                           <iframe width="420" height="360" src="{{ $aboutblock->video_link }}" frameborder="0" allowfullscreen></iframe>

                           @endif

                         </div>

                     

                     

                     

                     

                  </div>

               </div>

            </div>

           

         </div>

      </div>

   </div>
    <?php } ?>

   <!--=====================================================

      About Section End

      =========================================================-->

	@if(count($ourblock) > 0)
   <div class="solution-section">

      <div class="container-custom">

         <?php foreach($ourblock as $ob)

            {?>

         <div class="solution-end-wrapper">

            <div class="solution-end-image">

              <!-- <img src="<?php echo url("uploads/".$ob->image);?>" alt="">-->

               

               

               

                @if($ob->type_name == 'image')

                              @if($ob->redirection_url && $ob->redirection_url!='')

                              <a href="{{$ob->redirection_url }}" target="_blank">

                                  <img src="<?php echo url("uploads/".$ob->image);?>" alt="">

                                  </a>

                              @else

                           <img src="<?php echo url("uploads/".$ob->image);?>" alt="">

                           @endif

                           @elseif($ob->type_name == 'video')

                           <video width="100%" height="360" controls>

                              <source src="{{ url("uploads/".$ob->about_image) }}" type="video/mp4">

                              <source src="{{ url("uploads/".$ob->about_image) }}" type="video/mp4">

                              Your browser does not support the video tag.

                           </video>

                           @elseif($ob->type_name == 'youtube' || $ob->type_name == 'vimeo')

                           <iframe width="100%" height="360" src="{{ $ob->video_link }}" frameborder="0" allowfullscreen></iframe>

                           @endif

               

               

               

            </div>

            <div class="solution-end-content">

               <h3><?php echo $ob->title;?></h3>

               <?php echo $ob->about_content;?>

            </div>

         </div>

         <?php } ?>

         <div class="solution-wrapper">

            <div class="row">

               <?php

                  foreach($block as $wp)

                  

                  {?>

               <div class="solution-item col-lg-4 col-md-4 col-sm-12 col-12 wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">

                  <div class="solution-wrap">

                     <div class="solution-image">

                       <!-- <a href="#"><img src="<?php echo url("uploads/".$wp->image);?>" alt=""></a>-->

                            @php

                              $link='#';

                              @endphp

                        

                        @if($wp->type_name == 'image')

                              @if($wp->redirection_url && $wp->redirection_url!='')

                              @php

                              $link=$wp->redirection_url;

                              @endphp

                              <a href="{{$link }}" target="_blank">

                                  <img src="<?php echo url("uploads/".$wp->image);?>" alt="">

                                  </a>

                              @else

                           <a href="javascript:void();">

                               <img src="{{ url("uploads/".$wp->image) }}" alt="">

                               </a>

                           @endif

                           @elseif($wp->type_name == 'video')

                           <video width="100%" height="360" controls>

                              <source src="{{ url("uploads/".$wp->about_image) }}" type="video/mp4">

                              <source src="{{ url("uploads/".$wp->about_image) }}" type="video/mp4">

                              Your browser does not support the video tag.

                           </video>

                           @elseif($wp->type_name == 'youtube' || $wp->type_name == 'vimeo')

                           <iframe width="100%" height="360" src="{{ $wp->video_link }}" frameborder="0" allowfullscreen></iframe>

                           @endif

                        

                        

                     </div>

                     <div class="solution-summery">

                        <div>

                           <h4 class="solution-title"> <?php echo $wp->title;?></h4>

                        </div>

                        <?php echo $wp->description;?>

                        <a class="solution-more-link more-link" href="{{$link}}">Read more  <i class="fa fa-angle-right"></i></a>

                     </div>

                  </div>

               </div>

               <?php } ?>

            </div>

         </div>

      </div>

   </div>

	@endif;
   <!--=====================================================

      Solution Section End

      =========================================================-->
      
    @if(count($ourproduct)> 0 )

   <div class="product-section section">

      <div class="container-custom">

         <div class="section-header text-center">

            <h2 class="section-title">{{$heading->home_page_h1??'Our Products'}}</h2>

         </div>

         <div class="product-wrapper">

            <div class="product-row">

               <?php

                  foreach($ourproduct as $op)

                  

                  {?>

               <div class="product-item wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">

                  <div class="product-wrap">

                      

                      @if($op->redirection_url && $op->redirection_url!='')

                              

                      <a href="{{$op->redirection_url }}" target="_blank">

                        @else

                        <a href="javascript:void();">

                        @endif

                      

                        <div class="product-image">

                            

                            

                            <!--<img src="<?php echo url("uploads/".$op->image);?>">-->

                            

                             @if($op->type_name == 'image')

                                  <img src="<?php echo url("uploads/".$op->image);?>" alt="">

                                  

                           @elseif($op->type_name == 'video')

                           <video width="100%" height="360" controls>

                              <source src="{{ url("uploads/".$op->about_image) }}" type="video/mp4">

                              <source src="{{ url("uploads/".$op->about_image) }}" type="video/mp4">

                              Your browser does not support the video tag.

                           </video>

                           @elseif($op->type_name == 'youtube' || $op->type_name == 'vimeo')

                           <iframe width="100%" height="360" src="{{ $op->video_link }}" frameborder="0" allowfullscreen></iframe>

                           @endif

                        

                        

                        </div>

                        <div class="product-overlay-summery">

                           <div class="product-title"> <?php echo $op->title;?></div>

                           <div class="product-content"> <?php echo $op->content;?></div>

                        </div>

                     </a>

                  </div>

               </div>

               <?php } ?>

            </div>

         </div>

      </div>

   </div>
   
   @endif

   <!--=====================================================

      Product Section End

      =========================================================-->
      
      @if(count($news)> 0 )

   <div class="news-section section">
      <div class="container-custom">
         <div class="section-header section-header-withallbtn">
            <h2 class="section-title">{{$heading->home_page_h2??'News'}}</h2>
            <div class="view-all">
               <a class="btn btn-primary btn-radius" href="{{url('news/list')}}">View All</a>
            </div>
         </div>
         <div class="news-wrapper">
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
   
   
   @if(count($blogs)> 0 )
   <!-- Blog Section Start-->
   <div class="product-section section">
      <div class="container-custom">
         <div class="section-header section-header-withallbtn">
            <h2 class="section-title">{{$heading->home_page_h3??'Blogs'}}</h2>
            <div class="view-all">
               <a class="btn btn-primary btn-radius" href="{{url('blogs')}}">View All</a>
            </div>
         </div>
         <div class="news-wrapper">
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
   <!-- blogs section end-->
   <!--=====================================================
      News Section End
      =========================================================-->
   
       @if(count($articles)> 0 )
     
   <div class="articles-section section">
      <div class="container-custom">
         <div class="section-header text-center">
            <h2 class="section-title">{{$heading->home_page_h4??'Latest Cases & Articles'}}</h2>

         </div>

         <div class="articles-wrapper">

            <div class="row">

               <?php $i=1;
                  foreach($articles as $article){ 
                     if($i%2!=0)
                     { ?>
               <div class="articles-item col-lg-12 col-md-12 col-sm-12 col-12 wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                  <div class="articles-wrap">
                     <div class="row">
                        <div class="articles-image-column col-lg-6 col-md-6 col-12">
                           <div class="articles-image">
                            @if($article->redirection_url && $article->redirection_url!='')
                             @php
                             $link=$article->redirection_url;
                             @endphp
                            <a href="{{$link }}" target="_blank">
                            @else
                            @php
                             $link='';
                             @endphp
                            <a href="javascript:void();">
                            @endif
                              <?php 
                                 if($article->type_name == 'image'){ ?> 
                                 <img src="<?php echo url("uploads/".$article->image);?>" alt="" /> 
                                 <?php }else if($article->type_name == 'video'){ ?>
                                 <video width="200" height="200" controls>
                                    <source src="<?php echo url("uploads/".$article->image);?>" type="video/mp4">
                                    <source src="<?php echo url("uploads/".$article->image);?>" type="video/mp4">
                                    Your browser does not support the video tag.
                                 </video>
                                 <?php }else if($article->type_name == 'youtube' || $article->type_name == 'vimeo'){ ?>
                                 <iframe width="200" height="200" src="<?php echo $article->video_link;?>" frameborder="0" allowfullscreen></iframe>
                                 <?php } ?>
                              </a>
                           </div>
                        </div>
                        <div class="articles-summery-column col-lg-6 col-md-6 col-12 d-flex align-items-center pr-lg-5">
                           <div class="articles-summery">
                              <p class="articles-subttile"><?php echo $article->short_description;?></p>
                              <h4 class="articles-title"> <a href="{{$link }}"> <?php echo $article->title;?></a> </h4>
                              <div class="articles-content">
                                 <?php echo $article->content;?>
                              </div>
                              <!-- <a class="btn btn-outline-primary btn-radius" href="{{$link }}">Read More</a> -->
                           </div>
                        </div>
                     </div>

                  </div>

               </div>

               <?php }

                  else

                  

                  {?>

               <div class="articles-item col-lg-12 col-md-12 col-sm-12 col-12 wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">

                  <div class="articles-wrap">

                     <div class="row flex-row-reverse">

                        <div class="articles-image-column col-lg-6 col-md-6 col-12">

                           <div class="articles-image">

                              <a href="#">

                                 <?php 

                                    if($article->type_name == 'image'){ ?> 

                                 <img src="<?php echo url("uploads/".$article->image);?>" alt="" />

                                 <?php }else if($article->type_name == 'video'){ ?>

                                 <video width="200" height="200" controls>

                                    <source src="<?php echo url("uploads/".$article->image);?>" type="video/mp4">

                                    <source src="<?php echo url("uploads/".$article->image);?>" type="video/mp4">

                                    Your browser does not support the video tag.

                                 </video>

                                 <?php }else if($article->type_name == 'youtube' || $article->type_name == 'vimeo'){ ?>

                                 <iframe   src="<?php echo $article->video_link;?>" frameborder="0" allowfullscreen></iframe>

                                 <?php } ?>

                              </a>

                           </div>

                        </div>

                        <div class="articles-summery-column col-lg-6 col-md-6 col-12 d-flex align-items-center pl-lg-5">

                           <div class="articles-summery">

                              <p class="articles-subttile"><?php echo $article->short_description;?></p>

                              <h4 class="articles-title"> <a href="#"><?php echo $article->title;?></a> </h4>

                              <div class="articles-content">

                                 <p><?php echo $article->content;?></p>

                              </div>

                              <!-- <a class="btn btn-outline-primary btn-radius" href="#">Read More</a> -->

                           </div>

                        </div>

                     </div>

                  </div>

               </div>

               <?php } 

                  $i++;

                  

                  } ?>

            </div>

         </div>

      </div>

   </div>
 @endif
   <!--=====================================================

      Articles Section End

      =========================================================-->       

</section>

<!--=====================================================

   Mainpage Section End

   

   =========================================================-->

<div class="cookie-consent" id="footer_cookies" data-module="CookieConsent">

   <div class="cookie-consent-text">

      <p>We are using cookies. By continuing to use our website without changing the settings, you're agreeing to our use of cookies. <a href="javascript:void(0);" onclick="cookiesCounter()" title="Yes I'm sure.">Yes I'm sure.</a></p>

   </div>

</div>

@endsection