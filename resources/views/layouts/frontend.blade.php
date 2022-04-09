<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('/front/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>BVK Groups</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet"> 
    <!-- CSS FIle-->
    <link rel="stylesheet" href="{{asset('/front/css/fontawesome.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('/front/css/animate.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('/front/css/fancybox.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('/front//css/slick.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('/front/css/bootstrap.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('/front/css/style.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('/front/css/responsive.css')}}" type="text/css" />
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
                                <h2>BVK GROUP</h2>
                                <p><?php echo $aboutcontent;?></p>
                                <div class="website-getintouch">
                                    <h4 class="website-getintoucht-title">Get In Touch</h4>
                                    <p><i class="fas fa-map-marker-alt"></i><span><?php echo $contactcontent->address?><br></span></p>
                                    <p><i class="fas fa-mobile-alt"></i><span><?php echo $contactcontent->phone; ?></span></p>
                                    <p><i class="fas fa-envelope"></i><span><?php echo $contactcontent->email; ?></span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="website-map">
                            <?php echo $contactcontent->googlemap; ?>
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
                            <div class="header-logo">
                                <a class="logo-link" href="<?php echo url("/");?>"><img class="logo" src="{{asset('/front/images/logo.png')}}" alt="logo"></a>
                            </div>

                            <div class="header-menu navbar-expand-lg navbar-dark">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                                    aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <nav class="nav-menu">
                                    <div id="navbar" class="collapse navbar-collapse">
<ul class="navbar-nav">
	<li class="current-menu-item"> <a href="<?php echo url("/");?>">Home</a></li>
		<?php foreach($menu as $cm)
		{?>
		<li class="has-children"><a href="<?php echo url('pages/'.$cm->url_menu);?>"><?php echo $cm->label_menu;?></a>   
			<?php if(count($cor->getSecondlevelMenu($cm->id))>=1)
			{
			?>                                           
				<ul class="sub-menu">
					<?php foreach($cor->getSecondlevelMenu($cm->id) as $sm)
					{?>
					<li class="has-children"><a href="<?php echo url('pages/'.$cm->url_menu);?>"><?php echo $sm->label_menu;?></a>
				<?php if(count($cor->getSecondlevelMenu($sm->id))>=1)
				{
				?> 
					<ul class="sub-menu-menu">
					<?php foreach($cor->getSecondlevelMenu($sm->id) as $cm)
					{?>
					<li><a href="<?php echo url('pages/'.$cm->url_menu);?>"><?php echo $cm->label_menu;?></a></li>
					<?php } ?>
					</ul> 
					<?php }
					} ?>													
				</li>


				</ul> 
		<?php }?>												
		</li>
		<?php } ?>

<li><a href="<?php echo url("job");?>">Jobs</a></li>

<li><a href="<?php echo url("contact-us");?>">Contact us</a></li>

</ul>
                                    </div>
                                </nav>
                            </div>
                    
                        </div>
                    </div>
                </div>               
            </div>
        </header>
		
         <main class="py-4">
            @yield('content')
        </main>   

        <footer class="footer-section" id="footer-section">
            <div class="footer">           
                <div class="footer-top">
                    <div class="container-custom">
                        <div class="footer-widget-outer">
                            <div class="row">
                                
                                <div class="footer-column footer-1  col-lg-3 col-md-6 col-sm-6 col-12 wow animate__animated animate__fadeIn" data-wow-delay="0.6s">
                                    <div class="footer-widget">
                                        <h4 class="footer-widget-title">About Us</h4>
                                        <div class="textwidget">
                                          <?php echo $aboutcontent;?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer-column footer-2 col-lg-3 col-md-6 col-sm-6 col-12 wow animate__animated animate__fadeIn" data-wow-delay="0.8s">
                                    <div class="footer-widget">
                                        <h4 class="footer-widget-title">Quick Links</h4>
                                        <div class="menu-about-container">
                                            <ul id="menu-about" class="menu">
                                                <li>
                                                    <a href="<?php echo url("/");?>">Home</a></li>
                                                <li>
                                                    <a href="#">About Us</a></li>
                                                <li>
                                                    <a href="#">FAQ</a></li>
                                                <li>
                                                    <a href="#">Blog</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer-column footer-2  col-lg-3 col-md-6 col-sm-6 col-12 wow animate__animated animate__fadeIn" data-wow-delay="0.9s">
                                    <div class="footer-widget widget_nav_menu">
                                        <h4 class="footer-widget-title">Information</h4>
                                        <div class="menu-my-account-container">
                                            <ul id="menu-my-account" class="menu">
                                                <li>
                                                    <a href="#">Terms & Conditions</a></li>
                                                <li>
                                                    <a href="#">Privacy Policy</a></li>
                                                <li>
                                                    <a href="<?php echo url("contact-us");?>">Contact Us</a></li>
                                                <li>
                                                    <a href="#">Reach Us</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                               <div class="footer-column footer-1 col-lg-3 col-md-6 col-sm-6 col-12 wow animate__animated animate__fadeIn" data-wow-delay="0.4s">
                                    <div class="footer-widget">
                                        <h4 class="footer-widget-title">Contact Us</h4>
										
										 <?php if($contact)
                                           {?>
                                        <div class="footer-contact">
                                            <p><i class="fas fa-map-marker-alt"></i><span><?php echo $contact->address;?><br></span></p>
                                            <p><i class="fas fa-mobile-alt"></i><span>+91 <?php echo $contact->phone;?></span></p>
                                            <p><i class="fas fa-envelope"></i><span><?php echo $contact->email;?> </span></p>
                                        </div>
										<?php } ?>
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
                                            <li class="facebook"><a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li class="instagram"><a target="_blank" href="#"><i class="fab fa-instagram"></i></a></li>
                                            <li class="twitter"><a target="_blank" href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li class="linkedin"><a target="_blank" href="#"><i class="fab fa-linkedin"></i></a></li>                                          
                                            <li class="youtube"><a target="_blank" href="#"><i class="fab fa-youtube"></i></a></li> 
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--=====================================================
                                 Footer Section End
          =========================================================-->

        <div class="aside-social">
            <ul class="aside-social-menu">
                <li class="facebook"><a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li class="instagram"><a target="_blank" href="#"><i class="fab fa-instagram"></i></a></li>
                <li class="twitter"><a target="_blank" href="#"><i class="fab fa-twitter"></i></a></li>
                <li class="linkedin"><a target="_blank" href="#"><i class="fab fa-linkedin"></i></a></li>                        
                <li class="youtube"><a target="_blank" href="#"><i class="fab fa-youtube"></i></a></li> 
            </ul>
        </div>  
        <div class="scroll-top">
            <a class="scroll-to-top" href="javascript:void(0);" id="scrolltop"><i class="fa fa-angle-up"></i></a>
        </div>
        
        <div id="loader" class="loader"></div>
        <div class="whatsapp-call">
            <div class="d-none d-md-block">
                <a target="_blank" href="https://web.whatsapp.com/send?phone=+91123456789&amp;text=Hi, I had some queries." class="whatsapp"> <i class="fab fa-whatsapp"></i></a></div>
            <div class="d-md-none">
                <a target="_blank" href="https://api.whatsapp.com/send?phone=+91123456789&amp;text=Hi, I had some queries." class="whatsapp"> <i class="fab fa-whatsapp"></i> </a></div>
        </div>

    </div>

    <!-- Scripts FIle-->
    <script type="text/javascript" src="{{asset('/front/js/wow.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/front/js/fancybox.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/front/js/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/front/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/front/js/function.js')}}"></script>

</body>
</html>