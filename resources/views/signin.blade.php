<!DOCTYPE html>
<html lang="en">
    
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="{{url('/')}}/front/favicon.ico" type="image/x-icon">
      <link rel="icon" href="favicon.ico" type="image/x-icon">
      <title>BVK Groups</title>
      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
      <!-- CSS FIle-->
      <link rel="stylesheet" href="{{url('/')}}/front/css/fontawesome.min.css" type="text/css">
      <link rel="stylesheet" href="{{url('/')}}/front/css/animate.min.css" type="text/css">
      <link rel="stylesheet" href="{{url('/')}}/front/css/fancybox.min.css" type="text/css">
      <link rel="stylesheet" href="{{url('/')}}/front//css/slick.css" type="text/css">
      <link rel="stylesheet" href="{{url('/')}}/front/css/bootstrap.min.css" type="text/css">
      <link rel="stylesheet" href="{{url('/')}}/front/css/style.css" type="text/css">
      <link rel="stylesheet" href="{{url('/')}}/front/css/responsive.css" type="text/css">
      <!-- Js Library -->
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
   </head>

<body>

<div class="header-logo  navbar-expand-xl navbar-light">
<a class="logo-link" href="{{url('/')}}/ "><img class="logo" src="{{url('/')}}/thumbnail/1620371125_img4_.png" alt="logo"></a>
</div>
    
    
    

  <section class="myform-area" style="background-image:url('{{$data->background}}');background-size:cover;background-repeat: no-repeat;">
              <div class="container">
                  <div class="row justify-content-center">
                      <div class="col-lg-10">
                          <div class="form-area login-form">
                              
                              <div class="form-input">
                                   @if($data != null)
                                  <h2>{{$data->heading1}}</h2>
                                  @else
                                  <h2>Login to My BVK Group</h2>
                                   @endif
                                  <form action="{{url('/')}}">
                                      <div class="form-group">
                                          <label>Username</label>
                                          <input type="text"  id="" name="name" required>                                          
                                      </div>
                                      <div class="form-group">
                                          <label>password</label>
                                          <input type="password" id="" name="password" required>                                          
                                      </div>
                                      <div class="form-group">
                                          <span class="form-remember">
                                            <input type="checkbox">Remember Me
                                          </span>
                                        </div>
                                      <div class="myform-button">
                                          <button class="myform-btn">Login</button>
                                      </div>
                                  </form>
                              </div>
                              <div class="form-content" style="background-color:#FFFFFF;background-size:cover;background-repeat: no-repeat;">
                                  <div class="mt-5">
                                  @if($data != null)
                                  <h2>{{$data->heading2}}</h2>
                                  <p>{{$data->content1}}</p>
                                  @else
                                  <h2>Do you have any questions?</h2>
                                  <p>Did you forget your password or have any other questions regarding your BVK Group account, please use the links below.</p>
                                 @endif
                                  <ul>
                                      <li><a href="#">Change Password? <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></li>
                                      <li><a href="#">Reset Password <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></li>
                                      <li><a href="{{url('contact-us')}}">Contact BVK Groups <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></li>
                                      <li><a href="{{url('/')}}">BVK Groups <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></li>
                                  </ul>
                                  
                                  <div class="cfe-copyright">
                <br>By logging in you agree to the Site <a class="ping-input-link ping-pass-change account-actions" style="text-decoration: underline" href="#">Privacy Policy</a> and Disclaimers<br>


                
                
                <br>Copyright © 1999-2022 BVK Groups All Rights Reserved.
            </div>
                                  
                                  
                              </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>    



</body>
</html>