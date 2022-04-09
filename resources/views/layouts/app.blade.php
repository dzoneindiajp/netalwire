<!DOCTYPE HTML>
<html>

   <head>

      <title>BVK Groups:: Admin Panel</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">

      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

      <meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 

         SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

      <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

      <!-- Bootstrap Core CSS -->

      <link href="<?php echo url("css/bootstrap.css");?>" rel='stylesheet' type='text/css' />

      <!-- Custom CSS -->

      <link href="<?php echo url("css/style.css");?>" rel='stylesheet' type='text/css' />

      <!-- font-awesome icons CSS-->

      <link href="<?php echo url("css/font-awesome.css");?>" rel="stylesheet">

      <!-- //font-awesome icons CSS-->

      <!-- side nav css file -->

      <link href="<?php echo url("css/SidebarNav.min.css");?>" media='all' rel='stylesheet' type='text/css'/>

      <!-- side nav css file -->

      <!-- js-->

      <script src="<?php echo url("js/jquery-1.11.1.min.js");?>"></script>

      <script src="<?php echo url("js/modernizr.custom.js");?>"></script>

      <!--webfonts-->

      <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">

      <!--//webfonts-->

      <!-- Metis Menu -->

      <script src="<?php echo url("js/metisMenu.min.js");?>"></script>

      <script src="<?php echo url("js/custom.js");?>"></script>

      <link href="<?php echo url("css/custom.css");?>" rel="stylesheet">
      <link rel="stylesheet" href="{{url('public/css/sweetalert.css')}}" type="text/css" />
      <link rel="stylesheet" href="{{url('public/css/select2.min.css')}}" type="text/css" />

      <!--//Metis Menu -->

   </head>

   <?php $permissions=explode(',',Auth::user()->permissions);?>

   <body class="cbp-spmenu-push">

      <div class="main-content">

         <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">

            <!--left-fixed -navigation-->

            <aside class="sidebar-left">

               <nav class="navbar navbar-inverse">

                  <div class="navbar-header">

                     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">

                     <span class="sr-only">Toggle navigation</span>

                     <span class="icon-bar"></span>

                     <span class="icon-bar"></span>

                     <span class="icon-bar"></span>

                     </button>

                     <h1><a class="navbar-brand" href="<?php echo url("home");?>">BVK Group</a></h1>

                  </div>

                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                     <ul class="sidebar-menu">

                        <li class="treeview">

                           <a href="<?php echo url("home");?>">

                           <i class="fa fa-dashboard"></i> <span>Dashboard</span>

                           </a>

                        </li>

                        <?php if(in_array(1,$permissions) || in_array(2,$permissions) || in_array(3,$permissions) || in_array(4,$permissions) || in_array(5,$permissions) || in_array(6,$permissions) || in_array(7,$permissions) || in_array(8,$permissions))

                           {?>

                        <li class="treeview">

                           <a href="#">

                           <i class="fa fa-gear"></i>

                           <span>Landing Page</span>

                           <i class="fa fa-angle-left pull-right"></i>

                           </a>

                           <ul class="treeview-menu">

                              <?php if(in_array(1,$permissions))

                                 {?>

                              <li><a href="<?php echo url("home-block");?>"><i class="fa fa-angle-right"></i>Block 1</a></li>

                              <?php } ?>

                              <?php if(in_array(2,$permissions))

                                 {?>

                              <li><a href="<?php echo url("about-block");?>"><i class="fa fa-angle-right"></i>Block 2</a></li>

                              <?php }?>

                              <?php if(in_array(3,$permissions))

                                 {?>

                              <li><a href="<?php echo url("our-block");?>"><i class="fa fa-angle-right"></i>Block 3 </a></li>

                              <?php }?>

                              <?php if(in_array(4,$permissions))

                                 {?>

                              <li><a href="<?php echo url("block");?>"><i class="fa fa-angle-right"></i> Block 4</a></li>

                              <?php }?>

                              <?php if(in_array(5,$permissions))

                                 {?>

                              <li><a href="<?php echo url("ourproduct");?>"><i class="fa fa-angle-right"></i> Our Product</a></li>

                              <?php }?>

                              <?php if(in_array(6,$permissions))

                                 {?>

                              <li><a href="<?php echo url("news");?>"><i class="fa fa-angle-right"></i>News</a></li>

                              <?php }?>

                              <?php if(in_array(7,$permissions))

                                 {?>

                              <li><a href="<?php echo url("article");?>"><i class="fa fa-angle-right"></i> Article</a></li>

                              <?php }?>

                              <?php if(in_array(8,$permissions))

                                 {?>

                              <li><a href="<?php echo url("contact");?>"><i class="fa fa-angle-right"></i> Contact Us Configuration</a></li>

                              <?php }?>		    

                           </ul>

                        </li>

                        <?php } ?>

                        <?php if(in_array(9,$permissions) || in_array(10,$permissions) || in_array(11,$permissions) || in_array(12,$permissions) || in_array(13,$permissions))

                           {?>

                        <li class="treeview">

                           <a href="#">

                           <i class="fa fa-gear"></i>

                           <span>CMS</span>

                           <i class="fa fa-angle-left pull-right"></i>

                           </a>

                           <ul class="treeview-menu">

                              <?php if(in_array(9,$permissions))

                                 {?>

                              <li><a href="<?php echo url("page-title");?>"><i class="fa fa-angle-right"></i>CMS Template One</a></li>

                              <?php }?>

                              <?php if(in_array(10,$permissions))

                                 {?>

                              <li><a href="<?php echo url("templatetwo");?>"><i class="fa fa-angle-right"></i>CMS Template Two</a></li>

                              <?php }?>

                              <!--<li><a href="<?php echo url("view-pages");?>"><i class="fa fa-angle-right"></i>View Pages</a></li>-->

                              <li><a href="<?php echo url("menu-manager");?>"><i class="fa fa-angle-right"></i>Menu Manager</a></li>

                              <li><a href="<?php echo url("footer-menu-manager");?>"><i class="fa fa-angle-right"></i>Footer Menu</a></li>

                              <li><a href="{{ url('footer-text-settings') }}"><i class="fa fa-angle-right"></i>Change Footer Text</a></li>

                              <li><a href="<?php echo url("view-contact-us-form3");?>"><i class="fa fa-angle-right"></i>View Contact Us3</a></li>

                              <li><a href="{{ url('view-sales-contact-us-form') }}"><i class="fa fa-angle-right"></i>View Sales Contact</a></li>

                              <li><a href="{{ url('social-link-settings') }}"><i class="fa fa-angle-right"></i>Social Media Link</a></li>

                               <li><a href="{{ url('add-banner-images') }}"><i class="fa fa-angle-right"></i>Change Banner Images</a></li>

                               <li><a href="{{ url('contact-form-option') }}"><i class="fa fa-angle-right"></i>Contact form option </a></li>
                               <li><a href="{{ url('caption_manager') }}"><i class="fa fa-angle-right"></i>Caption Manager </a></li>
                                <li><a href="{{ url('title_manager') }}"><i class="fa fa-angle-right"></i>Title Manager </a></li>
                                <li><a href="{{ url('/signin_page_manager') }}"><i class="fa fa-angle-right"></i>SignIn Page Manager </a></li>

                           </ul>

                        </li>

                        <?php }?>

                        <?php if(in_array(14,$permissions) || in_array(15,$permissions))

                           {?>

                        <li class="treeview">

                           <a href="#">

                           <i class="fa fa-gear"></i>

                           <span>Jobs</span>

                           <i class="fa fa-angle-left pull-right"></i>

                           </a>

                           <ul class="treeview-menu">

                              <?php if(in_array(14,$permissions))

                                 {?>

                              <li><a href="<?php echo url("jobs");?>"><i class="fa fa-angle-right"></i> Add</a></li>

                              <?php }?>

                              <?php if(in_array(15,$permissions))

                                 {?>

                              <li><a href="<?php echo url("viewjob");?>"><i class="fa fa-angle-right"></i> View</a></li>

                              <li><a href="<?php echo url("company-function");?>"><i class="fa fa-angle-right"></i> Function Master</a></li>

                              <li><a href="<?php echo url("level-master");?>"><i class="fa fa-angle-right"></i> Level Master</a></li>

                              <?php }?>

                           </ul>

                        </li>

                        <?php } ?>

                        <li class="treeview">

                           <a href="#">

                           <i class="fa fa-gear"></i>

                           <span>Blog</span>

                           <i class="fa fa-angle-left pull-right"></i>

                           </a>

                           <ul class="treeview-menu">

                              <li><a href="<?php echo url("post-blog");?>"><i class="fa fa-angle-right"></i> Post</a></li>

                              <li><a href="<?php echo url("view-blog");?>"><i class="fa fa-angle-right"></i> View Post</a></li>

                           </ul>

                        </li>

                        <?php if(in_array(16,$permissions) || in_array(17,$permissions))

                           {?>

                        <li class="treeview">

                           <a href="#">

                           <i class="fa fa-gear"></i>

                           <span>Job Applied</span>

                           <i class="fa fa-angle-left pull-right"></i>

                           </a>

                           <ul class="treeview-menu">

                              <?php if(in_array(16,$permissions))

                                 {?>

                              <li><a href="<?php echo url("viewapplyjob");?>"><i class="fa fa-angle-right"></i> View Applied Job</a></li>

                              <?php }?>

                           </ul>

                        </li>

                        

                        <li class="treeview">

                           <a href="#">

                           <i class="fa fa-gear"></i>

                           <span>Setting</span>

                           <i class="fa fa-angle-left pull-right"></i>

                           </a>

                           <ul class="treeview-menu">

                              <?php if(in_array(21,$permissions))

                                 {?>

                              <li><a href="<?php echo url("email-settings");?>"><i class="fa fa-angle-right"></i>Send Email Configration</a></li>

                              <?php }?>

                              <?php if(in_array(22,$permissions))

                                 {?>

                              <li><a href="<?php echo url("email-content-settings");?>"><i class="fa fa-angle-right"></i>Email Content</a></li>

                              <?php }?>

                              <li><a href="<?php echo url("add-country");?>"><i class="fa fa-angle-right"></i>Country Listing</a></li>

                              <li><a href="<?php echo url("add-position");?>"><i class="fa fa-angle-right"></i>Position Listing</a></li>

                           </ul>

                        </li>

                        

                        

                        

                        <li class="treeview">

                           <a href="<?php echo url("media");?>">

                           <i class="fa fa-gear"></i> <span>Media</span>

                           </a>

                        </li>

                        <?php } ?>

                     </ul>

                  </div>

                  <!-- /.navbar-collapse -->

               </nav>

            </aside>

         </div>

         <div class="sticky-header header-section ">

            <div class="header-left">

               <!--toggle button start-->

               <button id="showLeftPush"><i class="fa fa-bars"></i></button>

               <!--toggle button end-->

               <div class="profile_details_left">

                  <!--notifications of menu start -->

                  <div class="clearfix"> </div>

               </div>

               <!--notification menu end -->

               <div class="clearfix"> </div>

            </div>

            <div class="header-right">

               <!--search-box-->

               <div class="search-box">

                  <form class="input">

                     <input class="sb-search-input input__field--madoka" placeholder="Search..." type="search" id="input-31" />

                     <label class="input__label" for="input-31">

                        <svg class="graphic" width="100%" height="100%" viewBox="0 0 404 77" preserveAspectRatio="none">

                           <path d="m0,0l404,0l0,77l-404,0l0,-77z"/>

                        </svg>

                     </label>

                  </form>

               </div>

               <!--//end-search-box-->

               <div class="profile_details">

                  <ul>

                     <li class="dropdown profile_details_drop">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

                           <div class="profile_img">

                              <span class="prfil-img"><img src="images/2.jpg" alt=""> </span> 

                              <div class="user-name">

                                 <p>{{Auth::user()->name}}</p>

                                 <span>Administrator</span>

                              </div>

                              <i class="fa fa-angle-down lnr"></i>

                              <i class="fa fa-angle-up lnr"></i>

                              <div class="clearfix"></div>

                           </div>

                        </a>

                        <ul class="dropdown-menu drp-mnu">

                           <li> <a href="<?php echo url("contact");?>"><i class="fa fa-cog"></i> Settings</a> </li>

                           <li>

                              <a class="dropdown-item" href="{{ route('logout') }}"

                                 onclick="event.preventDefault();

                                 document.getElementById('logout-form').submit();">

                              {{ __('Logout') }}

                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                                 @csrf

                              </form>

                           </li>

                        </ul>

                     </li>

                  </ul>

               </div>

               <div class="clearfix"> </div>

            </div>

            <div class="clearfix"> </div>

         </div>

         <main class="py-4">

            @yield('content')

         </main>

         <div class="footer">

            <p>&copy; <?php echo date("Y");?>. All Rights Reserved | Developed by <a href="https://dzoneindia.co.in/" target="_blank">Dzone India</a></p>

         </div>

         <!--//footer-->

      </div>

      <!-- new added graphs chart js-->

      <script src="<?php echo url("js/Chart.bundle.js");?>"></script>

      <script src="<?php echo url("js/utils.js");?>"></script>

      <script>

         var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

         var color = Chart.helpers.color;

         var barChartData = {

             labels: ["January", "February", "March", "April", "May", "June", "July"],

             datasets: [{

                 label: 'Dataset 1',

                 backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),

                 borderColor: window.chartColors.red,

                 borderWidth: 1,

                 data: [

                     randomScalingFactor(),

                     randomScalingFactor(),

                     randomScalingFactor(),

                     randomScalingFactor(),

                     randomScalingFactor(),

                     randomScalingFactor(),

                     randomScalingFactor()

                 ]

             }, {

                 label: 'Dataset 2',

                 backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),

                 borderColor: window.chartColors.blue,

                 borderWidth: 1,

                 data: [

                     randomScalingFactor(),

                     randomScalingFactor(),

                     randomScalingFactor(),

                     randomScalingFactor(),

                     randomScalingFactor(),

                     randomScalingFactor(),

                     randomScalingFactor()

                 ]

             }]

         

         };

         

         window.onload = function() {

             var ctx = document.getElementById("canvas").getContext("2d");

             window.myBar = new Chart(ctx, {

                 type: 'bar',

                 data: barChartData,

                 options: {

                     responsive: true,

                     legend: {

                         position: 'top',

                     },

                     title: {

                         display: true,

                         text: 'Chart.js Bar Chart'

                     }

                 }

             });

         

         };

         

         document.getElementById('randomizeData').addEventListener('click', function() {

             var zero = Math.random() < 0.2 ? true : false;

             barChartData.datasets.forEach(function(dataset) {

                 dataset.data = dataset.data.map(function() {

                     return zero ? 0.0 : randomScalingFactor();

                 });

         

             });

             window.myBar.update();

         });

         

         var colorNames = Object.keys(window.chartColors);

         document.getElementById('addDataset').addEventListener('click', function() {

             var colorName = colorNames[barChartData.datasets.length % colorNames.length];;

             var dsColor = window.chartColors[colorName];

             var newDataset = {

                 label: 'Dataset ' + barChartData.datasets.length,

                 backgroundColor: color(dsColor).alpha(0.5).rgbString(),

                 borderColor: dsColor,

                 borderWidth: 1,

                 data: []

             };

         

             for (var index = 0; index < barChartData.labels.length; ++index) {

                 newDataset.data.push(randomScalingFactor());

             }

         

             barChartData.datasets.push(newDataset);

             window.myBar.update();

         });

         

         document.getElementById('addData').addEventListener('click', function() {

             if (barChartData.datasets.length > 0) {

                 var month = MONTHS[barChartData.labels.length % MONTHS.length];

                 barChartData.labels.push(month);

         

                 for (var index = 0; index < barChartData.datasets.length; ++index) {

                     //window.myBar.addData(randomScalingFactor(), index);

                     barChartData.datasets[index].data.push(randomScalingFactor());

                 }

         

                 window.myBar.update();

             }

         });

         

         document.getElementById('removeDataset').addEventListener('click', function() {

             barChartData.datasets.splice(0, 1);

             window.myBar.update();

         });

         

         document.getElementById('removeData').addEventListener('click', function() {

             barChartData.labels.splice(-1, 1); // remove the label first

         

             barChartData.datasets.forEach(function(dataset, datasetIndex) {

                 dataset.data.pop();

             });

         

             window.myBar.update();

         });

      </script>

      <!-- new added graphs chart js-->

      <!-- Classie --><!-- for toggle left push menu script -->

      <script src="<?php echo url("js/classie.js");?>"></script>

      <script>

         var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),

         	showLeftPush = document.getElementById( 'showLeftPush' ),

         	body = document.body;

         	

         showLeftPush.onclick = function() {

         	classie.toggle( this, 'active' );

         	classie.toggle( body, 'cbp-spmenu-push-toright' );

         	classie.toggle( menuLeft, 'cbp-spmenu-open' );

         	disableOther( 'showLeftPush' );

         };

         

         

         function disableOther( button ) {

         	if( button !== 'showLeftPush' ) {

         		classie.toggle( showLeftPush, 'disabled' );

         	}

         }

      </script>

      <!-- //Classie --><!-- //for toggle left push menu script -->

      <!--scrolling js-->

      <script src="<?php echo url("js/jquery.nicescroll.js");?>"></script>

      <script src="<?php echo url("js/scripts.js");?>"></script>

      <!--//scrolling js-->

      <!-- side nav js -->

      <script src='<?php echo url("js/SidebarNav.min.js");?>' type='text/javascript'></script>

      <script>

         $('.sidebar-menu').SidebarNav()

      </script>

      <!-- //side nav js -->

      <!-- for index page weekly sales java script -->

      <script src="{{url('/')}}/js/SimpleChart.js"></script>

      <script>

         var graphdata1 = {

             linecolor: "#CCA300",

             title: "Monday",

             values: [

             { X: "6:00", Y: 10.00 },

             { X: "7:00", Y: 20.00 },

             { X: "8:00", Y: 40.00 },

             { X: "9:00", Y: 34.00 },

             { X: "10:00", Y: 40.25 },

             { X: "11:00", Y: 28.56 },

             { X: "12:00", Y: 18.57 },

             { X: "13:00", Y: 34.00 },

             { X: "14:00", Y: 40.89 },

             { X: "15:00", Y: 12.57 },

             { X: "16:00", Y: 28.24 },

             { X: "17:00", Y: 18.00 },

             { X: "18:00", Y: 34.24 },

             { X: "19:00", Y: 40.58 },

             { X: "20:00", Y: 12.54 },

             { X: "21:00", Y: 28.00 },

             { X: "22:00", Y: 18.00 },

             { X: "23:00", Y: 34.89 },

             { X: "0:00", Y: 40.26 },

             { X: "1:00", Y: 28.89 },

             { X: "2:00", Y: 18.87 },

             { X: "3:00", Y: 34.00 },

             { X: "4:00", Y: 40.00 }

             ]

         };

         var graphdata2 = {

             linecolor: "#00CC66",

             title: "Tuesday",

             values: [

               { X: "6:00", Y: 100.00 },

             { X: "7:00", Y: 120.00 },

             { X: "8:00", Y: 140.00 },

             { X: "9:00", Y: 134.00 },

             { X: "10:00", Y: 140.25 },

             { X: "11:00", Y: 128.56 },

             { X: "12:00", Y: 118.57 },

             { X: "13:00", Y: 134.00 },

             { X: "14:00", Y: 140.89 },

             { X: "15:00", Y: 112.57 },

             { X: "16:00", Y: 128.24 },

             { X: "17:00", Y: 118.00 },

             { X: "18:00", Y: 134.24 },

             { X: "19:00", Y: 140.58 },

             { X: "20:00", Y: 112.54 },

             { X: "21:00", Y: 128.00 },

             { X: "22:00", Y: 118.00 },

             { X: "23:00", Y: 134.89 },

             { X: "0:00", Y: 140.26 },

             { X: "1:00", Y: 128.89 },

             { X: "2:00", Y: 118.87 },

             { X: "3:00", Y: 134.00 },

             { X: "4:00", Y: 180.00 }

             ]

         };

         var graphdata3 = {

             linecolor: "#FF99CC",

             title: "Wednesday",

             values: [

               { X: "6:00", Y: 230.00 },

             { X: "7:00", Y: 210.00 },

             { X: "8:00", Y: 214.00 },

             { X: "9:00", Y: 234.00 },

             { X: "10:00", Y: 247.25 },

             { X: "11:00", Y: 218.56 },

             { X: "12:00", Y: 268.57 },

             { X: "13:00", Y: 274.00 },

             { X: "14:00", Y: 280.89 },

             { X: "15:00", Y: 242.57 },

             { X: "16:00", Y: 298.24 },

             { X: "17:00", Y: 208.00 },

             { X: "18:00", Y: 214.24 },

             { X: "19:00", Y: 214.58 },

             { X: "20:00", Y: 211.54 },

             { X: "21:00", Y: 248.00 },

             { X: "22:00", Y: 258.00 },

             { X: "23:00", Y: 234.89 },

             { X: "0:00", Y: 210.26 },

             { X: "1:00", Y: 248.89 },

             { X: "2:00", Y: 238.87 },

             { X: "3:00", Y: 264.00 },

             { X: "4:00", Y: 270.00 }

             ]

         };

         var graphdata4 = {

             linecolor: "Random",

             title: "Thursday",

             values: [

               { X: "6:00", Y: 300.00 },

             { X: "7:00", Y: 410.98 },

             { X: "8:00", Y: 310.00 },

             { X: "9:00", Y: 314.00 },

             { X: "10:00", Y: 310.25 },

             { X: "11:00", Y: 318.56 },

             { X: "12:00", Y: 318.57 },

             { X: "13:00", Y: 314.00 },

             { X: "14:00", Y: 310.89 },

             { X: "15:00", Y: 512.57 },

             { X: "16:00", Y: 318.24 },

             { X: "17:00", Y: 318.00 },

             { X: "18:00", Y: 314.24 },

             { X: "19:00", Y: 310.58 },

             { X: "20:00", Y: 312.54 },

             { X: "21:00", Y: 318.00 },

             { X: "22:00", Y: 318.00 },

             { X: "23:00", Y: 314.89 },

             { X: "0:00", Y: 310.26 },

             { X: "1:00", Y: 318.89 },

             { X: "2:00", Y: 518.87 },

             { X: "3:00", Y: 314.00 },

             { X: "4:00", Y: 310.00 }

             ]

         };

         var Piedata = {

             linecolor: "Random",

             title: "Profit",

             values: [

               { X: "Monday", Y: 50.00 },

             { X: "Tuesday", Y: 110.98 },

             { X: "Wednesday", Y: 70.00 },

             { X: "Thursday", Y: 204.00 },

             { X: "Friday", Y: 80.25 },

             { X: "Saturday", Y: 38.56 },

             { X: "Sunday", Y: 98.57 }

             ]

         };

         $(function () {

             $("#Bargraph").SimpleChart({

                 ChartType: "Bar",

                 toolwidth: "50",

                 toolheight: "25",

                 axiscolor: "#E6E6E6",

                 textcolor: "#6E6E6E",

                 showlegends: true,

                 data: [graphdata4, graphdata3, graphdata2, graphdata1],

                 legendsize: "140",

                 legendposition: 'bottom',

                 xaxislabel: 'Hours',

                 title: 'Weekly Profit',

                 yaxislabel: 'Profit in $'

             });

             $("#sltchartype").on('change', function () {

                 $("#Bargraph").SimpleChart('ChartType', $(this).val());

                 $("#Bargraph").SimpleChart('reload', 'true');

             });

             $("#Hybridgraph").SimpleChart({

                 ChartType: "Hybrid",

                 toolwidth: "50",

                 toolheight: "25",

                 axiscolor: "#E6E6E6",

                 textcolor: "#6E6E6E",

                 showlegends: true,

                 data: [graphdata4],

                 legendsize: "140",

                 legendposition: 'bottom',

                 xaxislabel: 'Hours',

                 title: 'Weekly Profit',

                 yaxislabel: 'Profit in $'

             });

             $("#Linegraph").SimpleChart({

                 ChartType: "Line",

                 toolwidth: "50",

                 toolheight: "25",

                 axiscolor: "#E6E6E6",

                 textcolor: "#6E6E6E",

                 showlegends: false,

                 data: [graphdata4, graphdata3, graphdata2, graphdata1],

                 legendsize: "140",

                 legendposition: 'bottom',

                 xaxislabel: 'Hours',

                 title: 'Weekly Profit',

                 yaxislabel: 'Profit in $'

             });

             $("#Areagraph").SimpleChart({

                 ChartType: "Area",

                 toolwidth: "50",

                 toolheight: "25",

                 axiscolor: "#E6E6E6",

                 textcolor: "#6E6E6E",

                 showlegends: true,

                 data: [graphdata4, graphdata3, graphdata2, graphdata1],

                 legendsize: "140",

                 legendposition: 'bottom',

                 xaxislabel: 'Hours',

                 title: 'Weekly Profit',

                 yaxislabel: 'Profit in $'

             });

             $("#Scatterredgraph").SimpleChart({

                 ChartType: "Scattered",

                 toolwidth: "50",

                 toolheight: "25",

                 axiscolor: "#E6E6E6",

                 textcolor: "#6E6E6E",

                 showlegends: true,

                 data: [graphdata4, graphdata3, graphdata2, graphdata1],

                 legendsize: "140",

                 legendposition: 'bottom',

                 xaxislabel: 'Hours',

                 title: 'Weekly Profit',

                 yaxislabel: 'Profit in $'

             });

             $("#Piegraph").SimpleChart({

                 ChartType: "Pie",

                 toolwidth: "50",

                 toolheight: "25",

                 axiscolor: "#E6E6E6",

                 textcolor: "#6E6E6E",

                 showlegends: true,

                 showpielables: true,

                 data: [Piedata],

                 legendsize: "250",

                 legendposition: 'right',

                 xaxislabel: 'Hours',

                 title: 'Weekly Profit',

                 yaxislabel: 'Profit in $'

             });

         

             $("#Stackedbargraph").SimpleChart({

                 ChartType: "Stacked",

                 toolwidth: "50",

                 toolheight: "25",

                 axiscolor: "#E6E6E6",

                 textcolor: "#6E6E6E",

                 showlegends: true,

                 data: [graphdata3, graphdata2, graphdata1],

                 legendsize: "140",

                 legendposition: 'bottom',

                 xaxislabel: 'Hours',

                 title: 'Weekly Profit',

                 yaxislabel: 'Profit in $'

             });

         

             $("#StackedHybridbargraph").SimpleChart({

                 ChartType: "StackedHybrid",

                 toolwidth: "50",

                 toolheight: "25",

                 axiscolor: "#E6E6E6",

                 textcolor: "#6E6E6E",

                 showlegends: true,

                 data: [graphdata3, graphdata2, graphdata1],

                 legendsize: "140",

                 legendposition: 'bottom',

                 xaxislabel: 'Hours',

                 title: 'Weekly Profit',

                 yaxislabel: 'Profit in $'

             });

         });

         

      </script>

      <!--for index page weekly sales java script -->

      <!-- Bootstrap Core JavaScript -->

      <script src="<?php echo url("js/bootstrap.js");?>"> </script>

      <!--Bootstrap Core JavaScript -->
      <!--Naushad Code -->
      <script type="text/javascript" src="{{url('public/js/sweetalert.js')}}"></script>
      <script type="text/javascript" src="{{url('public/js/select2.min.js')}}"></script>
      @include('layouts.common.sweetalert')
      @yield('js-script')
   </body>

</html>