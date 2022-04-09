@extends('layouts.front')
@section('content')
<style type="text/css">
   #demo_contact3 .error{
       color:#f11818!important;
   }
    #sales_contact_form .error{
       color:#f11818!important;
   }

</style>
<div class="page-banner-section">
   <div class="breadcrumbs">
      <div class="container">
         <ul class="breadcrumb-items">
            <li class="breadcrumb-item trail-begin"><a href="{{url('/')}}" rel="home"><span
               itemprop="name">Home</span></a></li>
            <li class="breadcrumb-item trail-end"><span itemprop="name">Contact Us</span></li>
         </ul>
      </div>
   </div>
   <!--<div class="page-banner page-banner-image"

      style="background-image:url(<?php echo url('front/images/banner-contact.jpg');?>);">-->
      <div class="page-banner page-banner-image"
      style="background-image:url({{url('thumbnail/'.$contactcontent->image)}});">
      <div class="container">
         <div class="page-banner-wrap">
            <h1 class="page-banner-title">Contact Us </h1>
         </div>
      </div>
   </div>
</div>
<!-- page-banner-section -->
<section class="site-content">
   <div class="content-wrapper">
      <div class="container">
         <div class="row">
            <div class="content-area col-12">
               <div class="content-box">
                  <h5>{{$contactcontent->main_heading_one?? ''}}</h5>
                  <h3 class="heading">{{$contactcontent->main_heading_two?? ''}}</h3>
                  <?php echo $contactcontent->contenttext;?>
               </div>
               <div class="content-box">
                  <div class="row">
                     <div class="col-md-6 col-sm-12 col-12 mb-4 ">
                        <h3 class="heading">{{$contactcontent->main_heading_third?? ''}}</h3>
                        <div class="row hideContant">
                           <div class="col-md-6 col-sm-12 col-12 mb-4">
                              <img src="<?php echo url("thumbnail/".$contactcontent->image2);?>" alt="">
                           </div>
                           <div class="col-md-6 col-sm-12 col-12 mb-4"  style=" word-break: break-word;">
                                 <?php echo $contactcontent->contenttext2;?>
                           </div>
                        </div>
                        <div class="row showContant"  style="display:none;">
                            <div class="col-md-12 col-sm-12 col-12 mb-4">
                              <h4 class="tpatom-heading tpatom-heading--small">Summary</h4>
                            </div>
                               <div class="col-md-6 col-sm-12 col-12 mb-4 showFormData">
                               </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-sm-12 col-12 mb-4">
                        <div class="form-area">
                        <!--start new code for sale contact form-->
                        <form name="sales_contact_form" method="post" action="{{url('save_sales_contact_process')}}" data-url="{{url('save_sales_contact_process')}}" id="sales_contact_form">
                        @csrf
                        <!--start step1-->
                        <section>
                        <h4 class="mb-4" id="contact_form1_h1">{{$contactcontent->contact_form1_h1?? 'Purpose of contact'}}</h4>
                        @if($contact_one)
                        @foreach($contact_one as $key=>$val)
                           <div class="custom-control custom-radio form-group">
                              <input name="sales_purpose_contact" type="radio" class="custom-control-input contact-option" data-id="sub-contact-option1" data-val="{{$val->id}}" id="reuest_quote{{$val->id}}" value="{{$val->option_name}}" required>
                              <label class="custom-control-label" for="reuest_quote{{$val->id}}"> {{$val->option_name}} </label>
                           </div>
                        @endforeach
                  @else
                  <div class="custom-control custom-radio form-group">
                     <input name="sales_purpose_contact" type="radio" class="custom-control-input" id="reuest_quote1" value="Request a quote" required>
                     <label class="custom-control-label" for="reuest_quote1">Request a quote </label>
                  </div>
                  @endif
                  <!--<div class="custom-control custom-radio form-group">
                      <input name="sales_purpose_contact" type="radio" id="reuest_product1" class="custom-control-input" value="Request for product information" required>
                     <label class="custom-control-label" for="reuest_product1">Request for product information </label>
                  </div>
                  <div class="custom-control custom-radio form-group">
                     <input name="sales_purpose_contact" type="radio" id="reuest_contact1" class="custom-control-input" value="Contact me" required>
                     <label class="custom-control-label" for="reuest_contact1">Contact me </label>
                  </div>-->
                  <div class="progressbar-wrapper">
                     <ul class="progressbar">
                        <li class="step1 step-box active ">
                           <div class="steps">
                              <span class="circle"><span>1</span></span>
                           </div>
                        </li>
                        <li class="step1 step-box">
                           <div class="steps">
                              <span class="circle"><span>2</span></span>
                           </div>
                        </li>
                        <li class="step1 step-box">
                           <div class="steps">
                              <span class="circle"><span>3</span></span>
                           </div>
                        </li>
                        <li class="step1 step-box">
                           <div class="steps">
                              <span class="circle"><span>4</span></span>
                           </div>
                        </li>
                        <li class="step1 step-box">
                           <div class="steps">
                              <span class="circle"><span>5</span></span>
                           </div>
                        </li>
                     </ul>
                     <p>Step 1 of 5</p>
                  </div>
                  <div class="form-button">
                     <!-- <button id="tab2" type="submit"
                        class="next btn btn-primary form-submit">Next</button> -->
                     <button type="button" class="page-next btn btn-primary form-submit">Next</button>
                  </div>
               </section>
               <!--end step1-->
               <!--start step2-->
               <section>
                  <h4 class="mb-4" id="contact_form1_h2">{{$contactcontent->contact_form1_h2?? 'Business area of interest'}}</h4>
                  @if($contact_one)
                  <div id="sub-contact-option1">
                  @foreach($contact_one as $key=>$val)
                  <div class="custom-control custom-radio form-group">
                     <input name="business_sales_area_interest" type="radio" class="custom-control-input" id="reuest_quote{{$val->id}}" value="{{$val->option_name}}" required>
                     <label class="custom-control-label" for="reuest_quote{{$val->id}}"> {{$val->option_name}} </label>
                  </div>
                  @endforeach
                  </div>
                  @else
                  <div class="custom-control custom-radio form-group">
                     <input name="business_sales_area_interest" type="radio" class="custom-control-input" id="reuest_quote2" value="Request a quote" required>
                     <label class="custom-control-label" for="reuest_quote2">Request a quote </label>
                  </div>
                  @endif
                  <div class="progressbar-wrapper">
                     <ul class="progressbar">
                        <li class="step1 step-box done">
                           <div class="steps">
                              <span class="circle"><span>1</span></span>
                           </div>
                        </li>
                        <li class="step1 step-box active">
                           <div class="steps">
                              <span class="circle"><span>2</span></span>
                           </div>
                        </li>
                        <li class="step1 step-box">
                           <div class="steps">
                              <span class="circle"><span>3</span></span>
                           </div>
                        </li>
                        <li class="step1 step-box">
                           <div class="steps">
                              <span class="circle"><span>4</span></span>
                           </div>
                        </li>
                        <li class="step1 step-box">
                           <div class="steps">
                              <span class="circle"><span>5</span></span>
                           </div>
                        </li>
                     </ul>
                     <p>Step 2 of 5</p>
                  </div>
                  <div class="form-button">
                     <!-- <button id="tab1" type="submit"
                        class="pervious btn btn-primary form-submit">Pervious</button>

                        <button id="tab2" type="submit"

                        class="next btn btn-primary form-submit">Next</button> -->

                     <button type="button" class="page-prev btn btn-danger form-submit pervious_step1">Pervious</button>
                     <button type="button" class="page-next btn btn-primary form-submit">Next</button>
                  </div>
               </section>
               <!--end step2-->
               <!--start step3-->
               <section>
                  <h4 class="mb-4" id="contact_form1_h3">{{$contactcontent->contact_form1_h3?? 'How can we help you?'}}</h4>
                  <div class="form-group">
                     <label>Message </label>
                     <textarea class="form-control" id="business_enquiry_message" rows="12"
                        name="sales_message" required></textarea>
                  </div>
                  <div class="progressbar-wrapper">
                     <ul class="progressbar">
                        <li class="step1 step-box done">
                           <div class="steps">
                              <span class="circle"><span>1</span></span>
                           </div>
                        </li>
                        <li class="step1 step-box done">
                           <div class="steps">
                              <span class="circle"><span>2</span></span>
                           </div>
                        </li>
                        <li class="step1 step-box active">
                           <div class="steps">
                              <span class="circle"><span>3</span></span>
                           </div>
                        </li>
                        <li class="step1 step-box">
                           <div class="steps">
                              <span class="circle"><span>4</span></span>
                           </div>
                        </li>
                        <li class="step1 step-box">
                           <div class="steps">
                              <span class="circle"><span>5</span></span>
                           </div>
                        </li>
                     </ul>
                     <p>Step 3 of 5</p>
                  </div>
                  <div class="form-button">
                     <!-- <button id="tab2" type="submit"

                        class="pervious btn btn-primary form-submit">Pervious</button>

                        <button id="tab3" type="submit"

                        class="next btn btn-primary form-submit">Next</button> -->

                     <button type="button" class="page-prev btn btn-danger form-submit pervious_step2">Pervious</button>

                     <button type="button" class="page-next btn btn-primary form-submit">Next</button>

                  </div>

               </section>

               <!--end step3-->

               <!--start step4-->

               <section>

                  <h4 class="mb-4" id="contact_form1_h4">{{$contactcontent->contact_form1_h4?? 'Contact information'}}</h4>
                  <div class="form-group">
                     <label class="label-focus">Name</label>
                     <input type="text" name="sales_name" id="sales_name" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label class="label-focus">Email</label>
                     <input type="email" name="sales_email" id="sales_email" class="form-control" >
                  </div>
                  <div class="form-group">
                     <label class="label-focus">Phone</label>
                     <input type="tel" name="sales_phone" id="sales_phone" class="form-control"  maxlength="10" pattern="[1-9]{1}[0-9]{9}" required>
                  </div>
                  <div class="form-group">
                     <label class="label-focus">Country/Location</label>
                     <select class="form-control" id="sales_country" name="sales_country" required>
                         <option value="">Select your country</option>
                        @foreach($country as $val)
                        <option value="{{$val->country_name}}">{{$val->country_name}}</option>
                         @endforeach
                     </select>
                  </div>
                  <div class="progressbar-wrapper">
                     <ul class="progressbar">
                        <li class="step1 step-box done">
                           <div class="steps">
                              <span class="circle"><span>1</span></span>
                           </div>
                        </li>
                        <li class="step1 step-box done">
                           <div class="steps">
                              <span class="circle"><span>2</span></span>
                           </div>
                        </li>
                        <li class="step1 step-box done">
                           <div class="steps">
                              <span class="circle"><span>3</span></span>
                           </div>
                        </li>
                        <li class="step1 step-box active">
                           <div class="steps">
                              <span class="circle"><span>4</span></span>
                           </div>
                        </li>
                        <li class="step1 step-box">
                           <div class="steps">
                              <span class="circle"><span>5</span></span>
                           </div>
                        </li>
                     </ul>
                     <p>Step 4 of 5</p>
                  </div>
                  <div class="form-button">
                     <!-- <button id="tab3" type="submit" class="pervious btn btn-primary form-submit">Pervious</button>
                     <button id="tab4" type="submit" class="next btn btn-primary form-submit">Next</button> -->
                     <button type="button" class="page-prev btn btn-danger form-submit pervious_step3">Pervious</button>
                     <button type="button" id="checkNumber" class="page-next btn btn-primary form-submit">Next</button>
                  </div>
               </section>
               <!--end step4-->
               <!--start step5-->
               <section>
                  <h4 class="mb-4" id="contact_form1_h5">{{$contactcontent->contact_form1_h5?? 'Company information'}}</h4>
                  <div class="form-group">
                     <label class="label-focus">Company</label>
                     <input type="text" name="sales_company" id="sales_company" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label class="label-focus">Position</label>
                     <select class="form-control" name="sales_position" id="sales_position" required>
                        <option value="">Select your position</option>
                        @foreach($position as $val)
                         <option value="{{$val->position_name}}">{{$val->position_name}}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="progressbar-wrapper">
                     <ul class="progressbar">
                        <li class="step1 step-box done">
                           <div class="steps">
                              <span class="circle"><span>1</span></span>
                           </div>
                        </li>
                        <li class="step1 step-box done">
                           <div class="steps">
                              <span class="circle"><span>2</span></span>
                           </div>
                        </li>
                        <li class="step1 step-box done">
                           <div class="steps">
                              <span class="circle"><span>3</span></span>
                           </div>
                        </li>
                        <li class="step1 step-box done">
                           <div class="steps">
                              <span class="circle"><span>4</span></span>
                           </div>
                        </li>
                        <li class="step1 step-box active">
                           <div class="steps">
                              <span class="circle"><span>5</span></span>
                           </div>
                        </li>
                     </ul>
                     <p>Step 5 of 5</p>
                  </div>
                  <div class="form-button">
                     <!-- <button id="tab4" type="submit"
                        class="pervious btn btn-primary form-submit">Pervious</button>
                        <button id="tab5" type="submit"
                        class="submit btn btn-primary form-submit">Submit</button> -->
                     <button type="button" class="page-prev btn btn-danger pervious_step4">Pervious</button>
                     <button type="button" class="page-next btn btn-success" id="sendSalesForm">Submit</button>
                  </div>
                   <div id="sales_contact_msg3" class="error"></div>
               </section>
               <!--end step5-->
            </form>
            <!--start thankyou code-->
            <div class="tab-pane active" role="tabpanel" id="thankSalesMessagefinal" style="display:none;">
               <div class="row no-gutters thankyou">
                  <div class="col-md-8 offset-md-2 text-center" auto_locator="contactUsThankYouMessage">
                     <div class="contact-us-thankyou-text" data-thankyou-text="Thank you for your query" auto_locator="contactUsThankYouPageMessage">
                        <h2 class="tpatom-heading tpatom-heading--">Thank you for your query</h2>
                     </div>
                     <div class="descriptionTextThankyou" auto_locator="contactUsThankYouPageDescription">
                           <p>We have now received your query and we will get back to you as soon as possible. Please click on the button below if you want to submit another request or if you have another query for us.</p>
                     </div>
                     <div class="button-group">
                        <button type="button" class="tpatom-btn tpatom-btn--primary newRequestBtn">
                           <a href="{{url('contact-us')}}" class="tp-next-btn__text">New Request</a>
                           <i class="tpatom-button__icon "></i>
                        </button>
                     </div>
                  </div>
               </div>
            </div>
            <!--end thankyou code--->
            <!--end new code for sale contact form-->
         </div>
      </div>
   </div>
</div>
<div class="content-box">
      <div class="row">
                     <div class="col-md-6 col-sm-12 col-12 mb-4">
                        <h3 class="heading">{{$contactcontent->main_heading_four?? ''}}</h3>
                        <div class="row hideContactContant">
                           <div class="col-md-6 col-sm-12 col-12 mb-4" style=" word-break: break-word;">
                              <img src="<?php echo url("thumbnail/".$contactcontent->image3);?>" alt="">
                           </div>
                           <div class="col-md-6 col-sm-12 col-12 mb-4" style=" word-break: break-word;">
                              <?php echo $contactcontent->contenttext3;?>
                           </div>
                        </div>
                         <div class="row showContactContant"  style="display:none;">
                            <div class="col-md-12 col-sm-12 col-12 mb-4">
                              <h4 class="tpatom-heading tpatom-heading--small">Summary</h4>
                            </div>
                               <div class="col-md-6 col-sm-12 col-12 mb-4 showContactFormData">
                               </div>
                               </div>
                     </div>

                     <div class="col-md-6 col-sm-12 col-12 mb-4">
                        <div class="form-area">
                           <form name="demo_contact3" id="demo_contact3">
                               @csrf
                              <section>
                                 <h4 class="mb-4" id="contact_form2_h1">{{$contactcontent->contact_form2_h1?? 'Purpose of contact'}}</h4>
                                  @if($contact_two)
                                    @foreach($contact_two as $key=>$val)
                                    <div class="custom-control custom-radio form-group">
                                       <input name="purpose_of_contact" type="radio" value="{{$val->option_name}}" data-id="sub-contact-option3" data-val="{{$val->id}}" class="custom-control-input contact-option"
                                       id="reuest_quote{{$val->id}}" required>
                                       <label class="custom-control-label" for="reuest_quote{{$val->id}}">{{$val->option_name}}</label>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="custom-control custom-radio form-group">
                                       <input name="purpose_of_contact" type="radio" value="Sustainability" class="custom-control-input"
                                       id="reuest_quote3" required>
                                       <label class="custom-control-label" for="reuest_quote3">Sustainability
                                       </label>
                                    </div>
                                    @endif
                                 <!--<div class="custom-control custom-radio form-group">
                                    <input name="purpose_of_contact" type="radio" value="Sustainability" class="custom-control-input"
                                       id="reuest_quote3" required>
                                    <label class="custom-control-label" for="reuest_quote3">Sustainability
                                    </label>
                                 </div>
                                 <div class="custom-control custom-radio form-group">
                                    <input name="purpose_of_contact" type="radio" value="Careers" class="custom-control-input"
                                       id="reuest_product3" required>
                                    <label class="custom-control-label" for="reuest_product3">Careers </label>
                                 </div>
                                 <div class="custom-control custom-radio form-group">
                                    <input name="purpose_of_contact" type="radio" value="General" class="custom-control-input"
                                       id="reuest_contact3" required>
                                    <label class="custom-control-label" for="reuest_contact3">General
                                    </label>
                                 </div>-->
                                 <div class="progressbar-wrapper">
                                    <ul class="progressbar">
                                       <li class="step1 step-box active ">
                                          <div class="steps">
                                             <span class="circle"><span>1</span></span>
                                          </div>
                                       </li>
                                       <li class="step1 step-box">
                                          <div class="steps">
                                             <span class="circle"><span>2</span></span>
                                          </div>
                                       </li>
                                       <li class="step1 step-box">
                                          <div class="steps">
                                             <span class="circle"><span>3</span></span>
                                          </div>
                                       </li>
                                       <li class="step1 step-box">
                                          <div class="steps">
                                             <span class="circle"><span>4</span></span>
                                          </div>
                                       </li>
                                    </ul>
                                    <p>Step 1 of 4</p>
                                 </div>
                                 <div class="form-button">
                                       <button type="button" class="page-next btn btn-primary form-submit">Next</button>
                                 </div>
                              </section>
                              <section>
                                 <h4 class="mb-4"  id="contact_form2_h2">{{$contactcontent->contact_form2_h2?? 'Business area of interest'}}</h4>
                                 <div id="sub-contact-option3">
                                 @foreach($contact_two as $key=>$val)
                                 <div class="custom-control custom-radio form-group">
                                    <input name="business_sales_area_interest" type="radio" class="custom-control-input" id="reuest_quote{{$val->id}}" value="{{$val->option_name}}" required>
                                    <label class="custom-control-label" for="reuest_quote{{$val->id}}"> {{$val->option_name}} </label>
                                 </div>
                                 @endforeach
                                 </div>
                                 <div class="progressbar-wrapper">
                                    <ul class="progressbar">
                                       <li class="step1 step-box done">
                                          <div class="steps">
                                             <span class="circle"><span>1</span></span>
                                          </div>
                                       </li>
                                       <li class="step1 step-box active">
                                          <div class="steps">
                                             <span class="circle"><span>2</span></span>
                                          </div>
                                       </li>
                                       <li class="step1 step-box">
                                          <div class="steps">
                                             <span class="circle"><span>3</span></span>
                                          </div>
                                       </li>
                                       <li class="step1 step-box">
                                          <div class="steps">
                                             <span class="circle"><span>4</span></span>
                                          </div>
                                       </li>
                                    </ul>
                                    <p>Step 2 of 4</p>
                                 </div>
                                 <div class="form-button">
                                    <button type="button" class="page-prev btn btn-danger form-submit pervious_step1">Pervious</button>
                                    <button type="button" class="page-next btn btn-primary form-submit">Next</button>
                                 </div>
                              </section>
                              <section>
                                 <h4 class="mb-4"  id="contact_form2_h3">{{$contactcontent->contact_form2_h3?? 'Contact information'}}</h4>
                                 <div class="form-group">
                                    <label class="label-focus">Name</label>
                                    <input type="text" name="name" id="contact_name" class="form-control" required>
                                 </div>
                                 <div class="form-group">
                                    <label class="label-focus">Email</label>
                                    <input type="email" name="email" id="contact_email" class="form-control" required>
                                 </div>
                                 <div class="form-group">
                                    <label class="label-focus">Phone</label>
                                    <input type="tel" name="mobile" id="contact_mobile" class="form-control" maxlength="10" pattern="[0-9]{10}" required >
                                 </div>
                                 <div class="form-group">
                                    <label class="label-focus">Country/Location</label>
                                    <select class="form-control" name="country2" id="country2" required>
                                        <option value="">Select your country</option>
                                        @foreach($country as $val)
                                        <option value="{{$val->country_name}}">{{$val->country_name}}</option>
                                        @endforeach
                                    </select>
                                 </div>
                                 <div class="progressbar-wrapper">
                                    <ul class="progressbar">
                                       <li class="step1 step-box done">
                                          <div class="steps">
                                             <span class="circle"><span>1</span></span>
                                          </div>
                                       </li>
                                       <li class="step1 step-box active">
                                          <div class="steps">
                                             <span class="circle"><span>2</span></span>
                                          </div>
                                       </li>
                                       <li class="step1 step-box">
                                          <div class="steps">
                                             <span class="circle"><span>3</span></span>
                                          </div>
                                       </li>
                                       <li class="step1 step-box">
                                          <div class="steps">
                                             <span class="circle"><span>4</span></span>
                                          </div>
                                       </li>
                                    </ul>
                                    <p>Step 3 of 4</p>
                                 </div>
                                 <div class="form-button">
                                    <button type="button" class="page-prev btn btn-danger form-submit contact_pervious_step2">Pervious</button>
                                    <button type="button" class="page-next btn btn-primary form-submit">Next</button>
                                 </div>
                              </section>
                              <section>
                                 <h4 class="mb-4" id="contact_form2_h4">{{$contactcontent->contact_form2_h4?? 'How can we help you?'}}</h4>
                                 <div class="form-group">
                                    <label>Message </label>
                                    <textarea class="form-control" id="EnquiryMessageText2" rows="12" name="message" required></textarea>
                                 </div>
                                 <div class="progressbar-wrapper">
                                    <ul class="progressbar">
                                       <li class="step1 step-box done">
                                          <div class="steps">
                                             <span class="circle"><span>1</span></span>
                                          </div>
                                       </li>
                                       <li class="step1 step-box done">
                                          <div class="steps">
                                             <span class="circle"><span>2</span></span>
                                          </div>
                                       </li>
                                       <li class="step1 step-box active">
                                          <div class="steps">
                                             <span class="circle"><span>3</span></span>
                                          </div>
                                       </li>
                                       <li class="step1 step-box">
                                          <div class="steps">
                                             <span class="circle"><span>4</span></span>
                                          </div>
                                       </li>
                                    </ul>
                                    <p>Step 4 of 4</p>
                                 </div>
                                 <div class="form-button">
                                    <button type="button" class="page-prev btn btn-danger contact_pervious_step3">Pervious</button>
                                    <button type="submit" class="page-next btn btn-success" id="sendForm">Submit</button>
                                 </div>
                                 <div id="contact_msg3" class="error"></div>
                              </section>
                           </form>
                           </div>
                           <!--start thankyou code-->
                           <div class="tab-pane active" role="tabpanel" id="thankMessagefinal" style="display:none;">
                              <div class="row no-gutters thankyou">
                                 <div class="col-md-8 offset-md-2 text-center" auto_locator="contactUsThankYouMessage">
                                    <div class="contact-us-thankyou-text" data-thankyou-text="Thank you for your query" auto_locator="contactUsThankYouPageMessage">
                                       <h2 class="tpatom-heading tpatom-heading--">Thank you for your query</h2>
                                    </div>
                                    <div class="descriptionTextThankyou" auto_locator="contactUsThankYouPageDescription">
                                       <p>We have now received your query and we will get back to you as soon as possible. Please click on the button below if you want to submit another request or if you have another query for us.</p>
                                    </div>
                                    <div class="button-group">
                                       <button type="button" class="tpatom-btn tpatom-btn--primary newRequestBtn">
                                          <a href="{{url('contact-us')}}" class="tp-next-btn__text">New Request</a>
                                          <i class="tpatom-button__icon "></i>
                                       </button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                          <!--end thankyou code--->
                        </div>
                        <!---end old code-->
                     </div>
                  </div>
               </div>
               <div class="contact-page-map col-12">
                  <div class="map-form">
                     <div class="form-group">
                        <label>Country/Location</label>
                        <select class="form-control" id="country">
                           <option>Select Country/Location</option>
                           <option value="india">India</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label>Office</label>
                        <select class="form-control" id="Office">
                           <option>Select Office</option>
                           <option>India</option>
                        </select>
                     </div>
                  </div>
                  <?php echo $contactcontent->googlemap;?>
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
<div id="contactloader" class=""></div>
<!--=====================================================
   Mainpage Section End
   
   =========================================================-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
@endsection
@section('js-script')
<script src="{{url('js/contact_custom.js')}}?v=1.1.0"></script>
<script>
   $(document).ready(function () {
      var csrf_token = '{{csrf_token()}}'; 
      // $(document).on("click", "#add-category-btn", function () {
      //     $("#editimageshow").css('display','none');
      //     $("#categoryid").val(0);
      //      $("#name").val('');
      //      $('.user-profile-modal-edit-header-title').text('Add Category');
      //     $("#category-modal").modal({
      //          backdrop: 'static',
      //          keyboard: false
      //      });
      // });   
         $(document).on("click", ".edit-data-btn", function () {
             var id = $(this).attr('data-id');
             var url = "{{url('contact-form-option/edit')}}";
             var data = {_token: csrf_token, id: id};
             $.ajax({
                 url: url,
                 data: data,
                 method: 'post',
                 success: function (data, status, xhr) {
                     $('#addEditModalLabel').text('Edit Option');
                     if (data.status == 1) {
                         var result = data.data;
                         $("#option_name").val(result.option_name);
                         $("#id").val(result.id);
                         $("#contact_position").val(result.contact_position);
                         $("#addEditModal").modal();
                     } else {
                        alert('details not found');
                     }
                 },
                 failure: function (status) {
                     console.log(status);
                 }
             });
             return false;
         });
         $(document).on('change','.contact-option',function(){
            // $('#contactloader').addClass('loader');
            var id = $(this).attr('data-val');
            var divid = $(this).attr('data-id');
            var url = "{{url('contact-option')}}";
            var data = {_token: csrf_token, id: id};
             $.ajax({
                 url: url,
                 data: data,
                 method: 'post',
                 success: function (data, status, xhr) {
                  // $('#contactloader').removeClass('loader');
                     console.log(data);
                     if (data.status == 1) {
                        $('#'+divid).html('');
                        $('#'+divid).html(data.data);
                     } else {
                        // alert('details not found');
                         $('#'+divid).html('');
                     }
                 },
                 failure: function (status) {
                     console.log(status);
                 }
             });
             return false;
         })
        });
        
        
        
        $(document).on('click' , '#checkNumber' , function(){
             
            
            var number= $("#sales_phone").val();
            if(number!= ''){
                if(number.length == 10 ){
                var mob = /^[1-9]{1}[0-9]{9}$/;
                var txtMobile = document.getElementById(txtMobId);
                if (mob.test(number) == false) {
                      swal({
                            title: "Failed",
                            text:'Please enter a valid mobile number',
                            type: "error",
                            timer: 3000,
                            showConfirmButton: false
                        });
                     
                //   return false;
                }else{
                   return true; 
                }
             }else{
                  swal({
                            title: "Failed",
                            text:'Please enter a valid mobile number',
                            type: "error",
                            timer: 3000,
                            showConfirmButton: true
                        });
                  }
             
          }
            
            
        }); 
        
    </script>
@endsection