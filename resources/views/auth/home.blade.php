@extends('layouts.front')
@section('content')
<style>
   .no-gutters {
   margin-right: 0;
   margin-left: 0;
   height: 260px !important; 
   }
</style>
<!-- <div id="loader-wrapper">
   <div id="loader">
      <div class="text-center">
         <h3 class="text-white"><b>Welcome to</b></h3>
         <img src="<?php echo url("front/images/logo3.png");?>" height="150px"></a>
         <br>
         <i class="fa fa-spinner fa-pulse fa-3x fa-fw mt-5" style="color: #e86b33"></i>
         <span class="sr-only">Loading...</span>
      </div>
   </div>
   <div class="loader-section section-left"></div>
   <div class="loader-section section-right"></div>
</div> -->
<main  class="">
<div class="d-flex  " id="wrapper"   >
   <!-- Sidebar -->
   <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="list-group list-group-flush navigation"  id="mainNav">
         <a href="#" class=" active  navigation__link list-group-item pt-3 list-group-item-action bg-light">
         <img src="<?php echo url("front/images/icon/0.png");?>" class="nav-img" alt=""> <br>Home
         </a>
         <a href="#about" class=" navigation__link list-group-item pt-3 list-group-item-action bg-light">
         <img src="<?php echo url("front/images/icon/1.png");?>" class="nav-img" alt=""> <br>About Us
         </a>
         <a href="#business" class=" navigation__link list-group-item pt-3 list-group-item-action bg-light">
         <img src="<?php echo url("front/images/icon/2.png");?>" class="nav-img" alt=""> <br>Our Business
         </a>
         <a href="#team" class=" navigation__link list-group-item pt-3 list-group-item-action bg-light">
         <img src="<?php echo url("front/images/icon/4.png");?>" class="nav-img" alt=""> <br>We The People
         </a>
         <a href="#recognition" class=" navigation__link list-group-item pt-3 list-group-item-action bg-light">
         <img src="<?php echo url("front/images/icon/6.png");?>" class="nav-img" alt=""> <br>Recognition
         </a>
         <a href="#infra" class=" navigation__link list-group-item pt-3 list-group-item-action bg-light">
         <img src="<?php echo url("front/images/icon/5.png");?>" class="nav-img" alt=""> <br>Infrastructure
         </a>
         <a href="#compliance" class=" navigation__link list-group-item pt-3 list-group-item-action bg-light">
         <img src="<?php echo url("front/images/icon/7.png");?>" class="nav-img" alt=""> <br>Compliance
         </a>
         <a href="#contact" class=" navigation__link list-group-item pt-3 list-group-item-action bg-light">
         <img src="<?php echo url("front/images/icon/3.png");?>" class="nav-img" alt=""> <br>Contact Us
         </a>
      </div>
   </div>
   <!-- /#sidebar-wrapper -->
<!-- Page Content -->
<div id="page-content-wrapper" class="page-content-wrapper">
   <nav class="navbar page-section navbar-expand-md navbar-dark  ">
      <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
         <ul class="navbar-nav ml-auto">
            <li class="nav-item  ">
               <a class="nav-link px-1 underline" href="<?php echo url("/");?>">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
               <a class="nav-link px-1 underline" href="<?php echo url("products");?>">Products</a>
            </li>
         </ul>
      </div>
      <div class="mx-auto order-0"> 
         <a href="<?php echo url("/");?>"><img src="<?php echo url("front/images/logo1.png");?>" class="d-none d-md-none d-sm-none d-lg-block " height="65px"></a> 
         <a href="<?php echo url("/");?>"><img src="<?php echo url("front/images/logo2.png");?>" class="  d-lg-none " height="65px"> </a> 
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
         <span class="navbar-toggler-icon"></span>
         </button>
      </div>
      <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
         <ul class="navbar-nav ">
            <li class="nav-item   ">
               <a class="nav-link px-1 underline" href="#">Virtual Shows</a>
            </li>
            <li class="nav-item ">
               <a class="nav-link px-1 underline" href="#">Clients</a>
            </li>
            <li class="nav-item  ">
               <div class="nav-wrapper">
                  <div class="sl-nav">
                     <ul>
                        <li>
                           <b>English</b> <i class="fa fa-angle-down" aria-hidden="true"></i>
                           <div class="triangle"></div>
                           <ul>
                              <li><img src="<?php echo url("front/images/us.jpg");?>" width="15px">   <span class="active">English</span></li>
                              <li> <img src="<?php echo url("front/images/french.png");?>" width="15px"> <span>French</span></li>
                              <li> <img src="<?php echo url("front/images/spain.png");?>" width="15px"><span>Spanish</span></li>
                           </ul>
                        </li>
                     </ul>
                  </div>
               </div>
            </li>
         </ul>
      </div>
   </nav>
   <div class="page-section container-fluid p-0" >
      <?php if($home)
         {?>
      <video autoplay loop muted id="video-bg" width="100%">
         <source src="<?php echo url("video/".$home->home_video);?>" type="video/mp4">
      </video>
      <?php } ?>
   </div>
   <section id="about" class=" section-class container   " style="margin-top: -100px">
      <div class="sec-title centered page-section">
         <h2>ABOUT US</h2>
         <div class="separator"><span></span></div>
      </div>
      <?php if($about)
         {?>
      <div class="row align-items-center" >
         <div class="col-md-4 col-sm-12 col-12" >
            <img src="<?php echo url("thumbnail/".$about->about_image);?>" class="img-fluid"> 
         </div>
         <div class="col-md-8 col-sm-12 col-12"  style="text-align:justify;line-height:25px">
            <?php echo $about->about_content;?>
         </div>
      </div>
      <?php } ?>
   </section>
   <!-- <div class="traingle-bottom"></div> -->
   <section id="business" class=" section-class bg-sec-2    ">
      <div class="sec-title centered page-section">
         <h2>OUR BUSINESS</h2>
         <div class="separator"><span></span></div>
         <?php if($ourbusinesspara)
            {?>
         <p class="pt-4"><?php echo $ourbusinesspara->para;?></p>
         <?php } ?>
      </div>
      <div class="container-fluid">
         <div class="row justify-content-center pt-1">
            <!-- DEMO 3 Item-->
            <?php foreach($ourbusiness as $ob)
               {?>
            <div class="col-lg-3 col-md-3 col-sm-6 col-12   mb-3">
               <div class="hover hover-3 text-white rounded">
                  <img src="<?php echo url("thumbnail/".$ob->image);?>"  alt="" class="img-fluid">
                  <div class="hover-overlay"></div>
                  <div class="hover-3-content px-5 py-4">
                     <h3 class=" text-white hover-3-title text-uppercase font-weight-bold mb-1" style=";"><span class="font-weight-light"> </span><?php echo $ob->image_heading;?></h3>
                     <p class="hover-3-description small text-uppercase mb-0"><?php echo $ob->image_para;?></p>
                  </div>
               </div>
            </div>
            <?php } ?>
         </div>
      </div>
   </section>
   <!-- <div class="traingle-top"></div> -->
   <section id="team" class=" section-class-1 container-fluid    ">
      
      <div class="container-fluid">
         
        
         <div class="row ">

            <div class="sec-title centered page-section">
            <h2>WE THE PEOPLE</h2>
            <div class="separator"><span></span></div>
            <?php if($wethepeople)
               {?>
            <p class="pt-4" style="margin-left: 50px;
               margin-right: 50px;"><?php echo $wethepeople->description;?></p>
            <?php } ?>
             <?php if($wethepeople)
            {?>
         <img src="<?php echo url("uploads/".$wethepeople->banner);?>" class="img-fluid">
         <?php }?>
         </div>
            <?php foreach($weteam as $team)
               {?>
            <div class=" col-lg-6 col-md-6 col-sm-12 mb-4">
               <div class="">
                  <div class="media bg-team rounded">
                     <img class="align-self-center mr-3 team-pic" src="<?php echo url("uploads/".$team->photo);?>" alt="Generic placeholder image">
                     <div class="media-body py-1">
                        <h3 class="team-title"> <?php echo $team->name;?></h3>
                        <p class="mb-1"><?php echo $team->qualification;?></p>
                        <p class="mb-2"><?php echo $team->designation;?></p>
                        <p class="mb-2"><?php echo $team->description;?></p>
                     </div>
                  </div>
               </div>
            </div>
            <?php }?>
         </div>
      </div>
   </section>
   <!-- <div class="traingle-bottom"></div> -->
   <section id="recognition" class=" section-class bg-sec-2  container-fluid text-center">
      <div class="sec-title centered ">
         <h2>RECOGNITION</h2>
         <div class="separator"><span></span></div>
         <?php if(count($recognitions)>=1)
            {?>
         <p class="pt-4"><?php echo $recognitionpara[0]->para;?></p>
         <?php }?>
      </div>
      <div class="container-fluid page-section">
         <div class="row pt-2 justify-content-center">
            <?php foreach($recognitions  as $rec)
               {?>
            <div class="col-md-4 col-sm-6 mb-4">
               <div class="award-tile ">
                  <h3 class=" text-center "><?php echo $rec->title?></h3>
                  <div class="media p-3" >
                     <img class="mr-3    " src="<?php echo url("uploads/".$rec->photo);?>"  width="130px" alt="Generic placeholder image">
                     <div class="media-body">
                        <p class="card-text text-left"><?php echo $rec->description?></p>
                     </div>
                  </div>
               </div>
            </div>
            <?php } ?>
         </div>
      </div>
   </section>
   <!-- <div class="traingle-top"></div> -->
   <section id="infra" class=" section-class container-fluid text-center  ">
      <div class="sec-title centered page-section">
         <h2>INFRASTRUCTURE</h2>
         <div class="separator"><span></span></div>
         <?php if($infra)
            {?>
         <p class="pt-4"><?php echo $infra->para;?></p>
         <?php } ?>
      </div>
      <div class="container-fluid">
         <div class="row pt-4 justify-content-center align-items-center">
            <div class="col-md-12">
               <div> <?php if($infra)
                  {
                   $link=explode("v=",$infra->video);
                   ?><iframe width="90%" height="680" src="https://www.youtube.com/embed/<?php echo $link[1];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  <?php }?>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- <div class="traingle-bottom"></div> -->
   <section id="compliance" class=" section-class bg-sec-2 container-fluid text-center">
      <div class="sec-title centered page-section">
         <h2>COMPLIANCE</h2>
         <div class="separator"><span></span></div>
         <?php if($complaincepara)
            {?>
         <p class="pt-4"><?php echo $complaincepara->complaince_para; ?></p>
         <?php } ?>
      </div>
      <div class="container-fluid">
         <div class="row px-4">
            <?php foreach($complaince as $com)
               {?>
            <div class="col-lg-25 col-md-4 col-sm-6 col-12 mb-3   centerflipcards">
               <div class="square-flip">
                  <div class="square bg-white"  >
                     <div class="square-container">
                        <div class="align-center px-2 py-4">
                           <img src="<?php echo url("uploads/".$com->image);?>" class="img-fluid" alt="Avatar">
                        </div>
                     </div>
                     <div class="flip-overlay"></div>
                  </div>
                  <div class='square2'>
                     <div class="square-container2">
                        <div class="align-center">
                           <h4 class="text-white"><b><?php echo $com->title;?></b></h4>
                           <p class="text-white" style="font-style: 12px"><?php echo $com->description;?></p>
                        </div>
                     </div>
                     <div class="flip-overlay"></div>
                  </div>
               </div>
            </div>
            <?php } ?>
         </div>
      </div>
   </section>
   <!-- <div class="traingle-top"></div> -->
   <section id="contact" class=" section-class container-fluid text-center"   >
      <div class="container">
         <div class="sec-title centered page-section">
            <h2>CONTACT US</h2>
            <div class="separator"><span></span></div>
            <?php if($contact)
               {?>
            <p class="pt-4"><?php echo $contact->description; ?></p>
            <?php } ?>
         </div>
         <div class="row-70"></div>
         <div class="row">
            <div class="col-12 col-md-8 col-lg pt-5 m-auto pt-lg-0 ">
               <form>
                  <div class="row">
                     <div class="col">
                        <input type="Name" class="form-control" placeholder="Enter Full Name">
                     </div>
                  </div>
                  <div class="row mt-2">
                     <div class="col">
                        <input type="email" class="form-control" placeholder="Enter Subject">
                     </div>
                  </div>
                  <div class="row mt-2">
                     <div class="col">
                        <input type="email" class="form-control" placeholder="Enter Email">
                     </div>
                  </div>
                  <div class="row mt-2">
                     <div class="col">
                        <input type="Phone" class="form-control" placeholder="Enter Phone">
                     </div>
                  </div>
                  <div class="row mt-2">
                     <div class="col">
                        <textarea class="form-control" name="message" rows="4" placeholder="How can we help?"></textarea>
                     </div>
                  </div>
                  <div class="row mt-2">
                     <div class="col">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                     </div>
                  </div>
               </form>
            </div>
            <?php if($contact)
               {?>
            <div class="col-12 col-md-8 col-lg pt-5 m-auto pt-lg-0">
               <p class="text-left"><strong>Address:</strong></p>
               <p class="text-left">
                  <?php echo $contact->address;?>
               </p>
               <p class="text-left"><a href="mailto: <?php echo $contact->email1;?>"><i class="fa fa-envelope-open-o"></i>   <?php echo $contact->email1;?></a></p>
               <p class="text-left"> <a href="tel: <?php echo $contact->phone;?>"><i class="fa fa-phone"></i>  <?php echo $contact->phone;?></a></p>
               <p class="text-left"><a href="mailto:<?php echo $contact->email2;?>"><i class="fa fa-envelope-open-o"></i>  <?php echo $contact->email2;?></a></p>
               <p class="text-left"> <a href="tel: <?php echo $contact->phone2;?>"><i class="fa fa-phone"></i>  <?php echo $contact->phone2;?></a></p>
               <?php echo $contact->google;?>
            </div>
            <?php } ?>
         </div>
      </div>
   </section>

@endsection