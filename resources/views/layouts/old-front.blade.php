<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="{{asset('/front/favicon.ico')}}" type="image/x-icon">
      <link rel="icon" href="favicon.ico" type="image/x-icon">
      <title>
          @php 
          $title = \App\Title::where('status','1')->first();
          @endphp
          @if($title == null)
          BVK Groups
          @else
          {{$title->title_name}}
          @endif
          </title>
      <!-- Fonts -->
      <link
         href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
         rel="stylesheet">
      <!-- CSS FIle-->
      <link rel="stylesheet" href="{{asset('/front/css/fontawesome.min.css')}}" type="text/css" />
      <link rel="stylesheet" href="{{asset('/front/css/animate.min.css')}}" type="text/css" />
      <link rel="stylesheet" href="{{asset('/front/css/fancybox.min.css')}}" type="text/css" />
      <link rel="stylesheet" href="{{asset('/front//css/slick.css')}}" type="text/css" />
      <link rel="stylesheet" href="{{asset('/front/css/bootstrap.min.css')}}" type="text/css" />
      <link rel="stylesheet" href="{{asset('/front/css/style.css')}}" type="text/css" />
      <link rel="stylesheet" href="{{asset('/front/css/responsive.css')}}" type="text/css" />
      <link rel="stylesheet" href="{{url('public/css/sweetalert.css')}}" type="text/css" />
      <link rel="stylesheet" href="{{url('public/css/select2.min.css')}}" type="text/css" />
      <!-- Js Library -->
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
   </head>
   <body>
      <div class="wrapper">
         <div class="website-information">
            <a href="javascrippt:void(0);" class="website-information-toggle"><i class="fa fa-plus"></i></a>
            <div class="website-information-wrapper">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="website-about">
                            @php
                            $contact = \App\Contact::orderBy('id')->first();
                            @endphp
                           <h2>{{$contact->name??'BVK GROUP'}}</h2>
                           <p>
                              <?php 
                                 if(isset($aboutcontent))
                                 {
                                 	echo $aboutcontent;
                                 }?>
                           </p>
                           <div class="website-getintouch">
                              <h4 class="website-getintoucht-title">Get In Touch</h4>
                              <p><i class="fas fa-map-marker-alt"></i><span>
                                 <?php echo $contact->address?><br>
                                 </span>
                              </p>
                              <p><i class="fas fa-mobile-alt"></i><span>
                                 <?php echo $contact->phone; ?>
                                 </span>
                              </p>
                              <p><i class="fas fa-envelope"></i><span>
                                 <?php echo $contact->email; ?>
                                 </span>
                              </p>
                              <p><i class="fas fa fa-calendar"></i><span>
                                 {{$contact->day}}
                                 </span>
                              </p>
                              <p><i class="fas fa-clock"></i><span>
                                 {{$contact->time}}
                                 </span>
                              </p>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="website-map">
                           <?php echo $contact->googlemap; ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php 
            use App\Dragmenu;
            $cor=new Dragmenu;
            ?>
         <header class="header-section">
            <div class="header fixed">
               <div class="header-outer header-fixed">
                  <div class="container-fluid">
                     <div class="header-row">
                        <div class="header-logo  navbar-expand-xl navbar-light">
                            @if($site_logo && $site_logo->site_logo!='' && $site_logo->site_logo_status==1)
                           <a class="logo-link" href="<?php echo url(" /");?>"><img class="logo"
                              src='{{ url("thumbnail/".$site_logo->site_logo) }}' alt="logo"></a>
                              @else
                              <a class="logo-link" href="<?php echo url(" /");?>"><img class="logo"
                              src="{{asset('/front/images/logo.png')}}" alt="logo"></a>
                              @endif
                              
                           <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                              data-target="#navbar" aria-controls="navbar" aria-expanded="false"
                              aria-label="Toggle navigation">
                           <span class="menu-bar-one"></span> <span class="menu-bar-two"></span> <span
                              class="menu-bar-three"></span>
                           </button>
                        </div>
                        <div class="header-menu navbar-expand-xl">
                           <nav class="nav-menu">
                              <div id="navbar" class="collapse navbar-collapse">
                                 <ul class="navbar-nav">
                                    <?php foreach($menu as $cm)
                                       {?>
                                    <li class="has-children">
                                        @if($cor->checkThirdParyUrl($cm->url_menu)=='true')
                                        <a href="<?php echo $cm->url_menu;?>" target="_blank">
                                        @else
                                     <a href="<?php echo url('pages/'.$cm->url_menu);?>">
                                         @endif
                                       <?php echo $cm->label_menu;?>
                                       </a>
                                       <?php if(count($cor->getSecondlevelMenu($cm->id))>=1)
                                          {
                                          ?>
                                       <ul class="sub-menu">
                                          <?php foreach($cor->getSecondlevelMenu($cm->id) as $sm)
                                             {
                                             	if($cm->url_menu=='career-at-bvk')
                                             	{?>
                                          <li><a href="<?php echo url("job");?>">Jobs</a></li>
                                          <?php }?>
                                          <li class="has-children">
                                             
                                                 
                                             @if($cor->checkThirdParyUrl($sm->url_menu)=='true')
                                                <a href="<?php echo $sm->url_menu;?>" target="_blank">
                                                @else
                                             <a href="<?php echo url('pages/'.$sm->url_menu);?>">
                                                 @endif
                                                 
                                             <?php echo $sm->label_menu;?>
                                             </a>
                                             <?php if(count($cor->getSecondlevelMenu($sm->id))>=1)
                                                {
                                                ?>
                                             <ul class="sub-menu-menu">
                                                <?php foreach($cor->getSecondlevelMenu($sm->id) as $cm)
                                                   {
                                                   	?>
                                                <li>
                                                    
                                                @if($cor->checkThirdParyUrl($cm->url_menu)=='true')
                                                    <a href="<?php echo $cm->url_menu;?>" target="_blank">
                                                    @else
                                                   <a href="<?php echo url('pages/'.$cm->url_menu);?>">
                                                 @endif
                                                 
                                                   <?php echo $cm->label_menu;?>
                                                   </a>
                                                </li>
                                                <?php } ?>
                                             </ul>
                                             <?php }
                                                } ?>
                                          </li>
                                       </ul>
                                       <?php }?>
                                    </li>
                                    <?php } ?>
                                    <li><a href="<?php echo url("contact-us");?>">Contact us</a></li>
                                    <li><a href="{{url('/signin')}}"><i class="fa fa-user-circle" aria-hidden="true"></i>
                                    @php
                                    $caption = \App\Caption::where('status','1')->first();
                                    @endphp
                                    @if($caption == null)
                                    My BVK Group
                                    @else
                                    {{$caption->caption_name}}
                                    @endif
                                    </a></li>
                                 </ul>
                              </div>
                           </nav>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </header>
         <main class="">
            @yield('content')
         </main>
         @php
         $heading = \App\footerMenuText::first();
         @endphp
         @if($heading != "")
         <footer class="footer-section" id="footer-section">
            <div class="footer">
               <div class="footer-top">
                  <div class="container-custom">
                     <div class="footer-widget-outer">
                        <div class="row">
                           <div class="col-lg-12 col-md-12 col-sma-12 col-12">
                              <div class="row">
                                 <div class="footer-column footer-1 col-lg-3 col-md-6 col-sm-6 col-12 wow animate__animated animate__fadeIn"
                                    data-wow-delay="0.2s">
                                    <div class="footer-widget">
                                       <h4 class="footer-widget-title">{{$footerMenuText->footer_one??''}}</h4>
                                       <div class="menu-container">
                                          <ul class="menu">
                                             <?php foreach($fm as $f)
                                                {
                                                	if($f->position==$footerMenuText->footer_one )
                                                	{?>
                                             <li><a href="<?php echo url("pages/".$f->link);?>" target="_self"><?php echo $f->link_title?></a></li>
                                             <?php }
                                                } ?>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="footer-column footer-2 col-lg-3 col-md-6 col-sm-6 col-12 wow animate__animated animate__fadeIn"
                                    data-wow-delay="0.3s">
                                    <div class="footer-widget">
                                       <h4 class="footer-widget-title">{{$footerMenuText->footer_two??''}}</h4>
                                       <div class="menu-container">
                                          <ul id="menu-about" class="menu">
                                             <?php foreach($fm as $f)
                                                {
                                                	if($f->position==$footerMenuText->footer_two)
                                                	{?>
                                             <li><a href="<?php echo url("pages/".$f->link);?>" target="_self"><?php echo $f->link_title?></a></li>
                                             <?php }
                                                } ?>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="footer-column footer-2  col-lg-3 col-md-6 col-sm-6 col-12 wow animate__animated animate__fadeIn"
                                    data-wow-delay="0.4s">
                                    <div class="footer-widget widget_nav_menu">
                                       <h4 class="footer-widget-title">{{$footerMenuText->footer_third??''}}</h4>
                                       <div class="menu-container">
                                          <ul class="menu">
                                             <?php 
                                                foreach($fm as $f){
                                                    if($f->position==$footerMenuText->footer_third){ ?>
                                             <li><a href="<?php echo url("pages/".$f->link);?>" target="_self"><?php echo $f->link_title?></a></li>
                                             <?php 
                                                }
                                                } ?>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="footer-column footer-1 col-lg-3 col-md-6 col-sm-6 col-12 wow animate__animated animate__fadeIn"
                                    data-wow-delay="0.5s">
                                    <div class="footer-widget">
                                       <h4 class="footer-widget-title">{{$footerMenuText->footer_four??''}}</h4>
                                       <div class="menu-container">
                                          <ul class="menu">
                                             <?php foreach($fm as $f)
                                                {
                                                	if($f->position==$footerMenuText->footer_four)
                                                	{?>
                                             <li><a href="<?php echo url("pages/".$f->link);?>" target="_self"><?php echo $f->link_title?></a></li>
                                             <?php }
                                                } ?>
                                             <li><a href="<?php echo url("blogs/");?>" target="_self">Blogs</a></li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="footer-bottom">
                  <div class="container-custom">
                     <div class="footer-bottom-outer">
                        <div class="row">
                           <div class="footer-bottom-left col-md-6 col-sm-12 col-12">
                              <div class="copyright">
                                 <p> <?php echo $contactcontent->copyright_text; ?> </p>
                              </div>
                           </div>
                           <div class="footer-bottom-right col-md-6 col-sm-12 col-12">
                              <div class="footer-social">
                                 <ul class="footer-social-icon">
                                    @if($SocialMediaLink->facebook_link!='' && $SocialMediaLink->facebook_link!==null && $SocialMediaLink->facebook_status==1)
                                    <li class="facebook">
                                       <a target="_blank" href="{{$SocialMediaLink->facebook_link}}"><i
                                          class="fab fa-facebook-f"></i></a>
                                    </li>
                                    @endif
                                    @if($SocialMediaLink->instagram_link!='' && $SocialMediaLink->instagram_link!==null && $SocialMediaLink->instagram_status==1)
                                    <li class="instagram"><a target="_blank" href="{{$SocialMediaLink->instagram_link}}"><i
                                       class="fab fa-instagram"></i></a></li>
                                    @endif
                                    @if($SocialMediaLink->pinterest_link!='' && $SocialMediaLink->pinterest_link!==null && $SocialMediaLink->pinterest_status==1)
                                    <li class="twitter"><a target="_blank" href="{{$SocialMediaLink->pinterest_link}}"><i
                                       class="fab fa-twitter"></i></a></li>
                                    @endif
                                    @if($SocialMediaLink->snapchat_link!='' && $SocialMediaLink->snapchat_link!==null && $SocialMediaLink->snapchat_status==1)
                                    <li class="linkedin"><a target="_blank" href="{{$SocialMediaLink->snapchat_link}}"><i
                                       class="fab fa-linkedin"></i></a></li>
                                    @endif
                                    @if($SocialMediaLink->youtube_link!='' && $SocialMediaLink->youtube_link!==null && $SocialMediaLink->youtube_status==1)
                                    <a href="{{$SocialMediaLink->youtube_link}}" target="_blanck" class="fa-2x text-white p-r-20 fa fa-youtube-play"></a>
                                    <li class="youtube"><a target="_blank" href="{{$SocialMediaLink->youtube_link}}"><i
                                       class="fab fa-youtube"></i></a></li>
                                    @endif
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </footer>
         @endif
         <!--=====================================================
            Footer Section End
            =========================================================-->
         <div class="modal fade" id="acceptmodal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                  <div class="modal-body">
                     <p>This site uses third-party website tracking technologies to provide and continually improve
                        our services, and to display advertisements according to users' interests. I agree and may
                        <a href="#uc-corner-modal-show">revoke or change</a> my consent at any time with effect for
                        the future.
                     </p>
                     <a class="btn btn-primary btn-block" onclick="clickCounter()">Accept</a>
                  </div>
               </div>
            </div>
         </div>
         <!-- acceptmodal -->
         <div class="aside-social">
            <ul class="aside-social-menu">
               <li class="search">
                  <a href="javascript:void(0);"><i class="fa fa-search"></i></a>
                  <div class="aside-searchbox">
                     <form action="<?php echo url("search");?>" method="post" autocomplete="off" id="searchform">@csrf
                        <input type="text" value="" name="search" id="search" placeholder="ENTER SEARCH TERM">
                        <button class="searchform-btn"><i class="fas fa-paper-plane"></i></button>
                     </form>
                  </div>
               </li>
               <li class="envelope">
                  <a href="javascript:void(0);"><i class="far fa-envelope"></i></a>
                  <div class="aside-mailbox">
                       @if($email_setting_arr->email_title)
                     <h5>{{$email_setting_arr->email_title}}</h5>
                     <?php if(!isset($cms))
                        {
                        	$subject="BVK Groups";
                        	
                        }
                        else{
                        	
                        	$subject=$cms->title;
                        }?>
                     <p>{!! $email_setting_arr->email_main_content !!}</p>
                     <hr>
                     @endif
                     @if($email_setting_arr->industrial_title)
                     <b>{{$email_setting_arr->industrial_title}}:</b>
                     <p><a href="mailto:{{$email_setting_arr->industrial_email}}?subject=<?php echo $subject;?>"><b>{{$email_setting_arr->industrial_email}}</b></a></p>
                     <hr>
                     @endif
                     @if($email_setting_arr->process_title)
                     <b>{{$email_setting_arr->process_title}}:</b>
                     <p><a href="mailto:{{$email_setting_arr->process_email}}?subject=<?php echo $subject;?>"><b>{{$email_setting_arr->process_email}}</b></a></p>
                     <hr>
                     @endif
                     @if($email_setting_arr->metal_title)
                     <b>{{$email_setting_arr->metal_title}}:</b>
                     <p><a href="mailto:{{$email_setting_arr->metal_email}}?subject=<?php echo $subject;?>"><b>{{$email_setting_arr->metal_email}}</b></a></p>
                     <hr>
                     @endif
                     @if($email_setting_arr->footer_title)
                     <b>{{$email_setting_arr->footer_title}}:</b>
                     <p><a title="Contact form" class="" href="https://metalwires.biz/contact-us/">{{$email_setting_arr->footer_content}}</a></p>
                     @endif
                  </div>
               </li>
               <li class="linkedin"><a target="_blank" href="#"><i class="fab fa-linkedin"></i></a></li>
            </ul>
         </div>
         <div class="scroll-top">
            <a class="scroll-to-top" href="javascript:void(0);" id="scrolltop"><i class="fa fa-angle-up"></i></a>
         </div>
         <div id="loader" class="loader"></div>
         <!-- <div class="whatsapp-call">
            <div class="d-none d-md-block">
                <a target="_blank" href="https://web.whatsapp.com/send?phone=+91123456789&amp;text=Hi, I had some queries." class="whatsapp"> <i class="fab fa-whatsapp"></i></a></div>
            <div class="d-md-none">
                <a target="_blank" href="https://api.whatsapp.com/send?phone=+91123456789&amp;text=Hi, I had some queries." class="whatsapp"> <i class="fab fa-whatsapp"></i> </a></div>
            </div> -->
      </div>
     
      <script>
         $(document).ready(function(){
             if(Number(localStorage.cookiescount)>=1){
                 $("div#footer_cookies").hide();
             }
         	if(Number(localStorage.clickcount)>=1)
         	{
         		 $("#acceptmodal").modal("hide");
         		
         	}
         	else{
         		$('#acceptmodal').modal({
         		   backdrop: 'static',
         		   keyboard: false,
         		   show: true
         	   }); 
         	}
         	
         });
         
         
         function clickCounter() {
         	$("#acceptmodal").modal("hide");
           if(typeof(Storage) != "undefined") {
             if (localStorage.clickcount) {
               localStorage.clickcount = Number(localStorage.clickcount)+1;
         	  
             } else {
               localStorage.clickcount = 1;
             }
            
           } else {
             
           }
         }
         function cookiesCounter() {
           if(typeof(Storage) !== "undefined") {
             if (localStorage.cookiescount) {
               localStorage.cookiescount = Number(localStorage.cookiescount)+1;
         	  $("div#footer_cookies").hide();
             } else {
               localStorage.cookiescount = 1;
               $("div#footer_cookies").hide();
             }
             
           } else {
             
           }
         }
         
         
      </script>
      <!-- Scripts FIle-->
      <script type="text/javascript" src="{{asset('/front/js/wow.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('/front/js/fancybox.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('/front/js/slick.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('/front/js/bootstrap.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('/front/js/function.js')}}"></script>
      <script type="text/javascript" src="{{url('public/js/sweetalert.js')}}"></script>
      <script type="text/javascript" src="{{url('public/js/select2.min.js')}}"></script>
      @include('layouts.common.sweetalert')
      @yield('js-script')
   </body>
</html>