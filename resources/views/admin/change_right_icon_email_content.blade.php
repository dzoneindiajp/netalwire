@extends('layouts.app')
@section('content')
<div id="page-wrapper">
   <div class="main-page">
      <div class="forms">
         <div class="row">
            <h3 class="title1">Change Email Content:</h3>
            <div class="form-three widget-shadow">
               <div class="row">
                  <div class="col-lg-12">
                     <?php if(session('success'))
                        {?>		
                     <div class="alert alert-success alert-dismissible  show" role="alert">
                        <?php echo session('success'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                     </div>
                     <?php } ?>
                  </div>
               </div>
               <form class="form-horizontal" method="post" action="{{route('update-email-content-settings')}}" enctype="multipart/form-data">
                  @csrf 
                  <div class="form-group">
                     <label for="focusedinput" class="col-sm-2 control-label">Email Title</label>
                     <div class="col-sm-8">
                        <input type="text" name="email_title" class="form-control" value="{{$email_content->email_title??''}}" >
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="focusedinput" class="col-sm-2 control-label">Email Content</label>
                     <div class="col-sm-8">
                        <input type="text" name="email_main_content" class="form-control" value="{{$email_content->email_main_content??''}}">
                     </div>
                  </div>
                  
                  <div class="form-group">
                     <label for="focusedinput" class="col-sm-2 control-label">Industrial Title</label>
                     <div class="col-sm-8">
                        <input type="text" name="industrial_title" class="form-control" value="{{$email_content->industrial_title??''}}" >
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="focusedinput" class="col-sm-2 control-label">Industrial Email</label>
                     <div class="col-sm-8">
                        <input type="text" name="industrial_email" class="form-control" value="{{$email_content->industrial_email??''}}">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="focusedinput" class="col-sm-2 control-label">Process Title</label>
                     <div class="col-sm-8">
                        <input type="text" name="process_title" class="form-control" value="{{$email_content->process_title??''}}">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="focusedinput" class="col-sm-2 control-label">Process Email</label>
                     <div class="col-sm-8">
                        <input type="text" name="process_email" class="form-control" value="{{$email_content->process_email??''}}">
                     </div>
                  </div>
                  
                  <div class="form-group">
                     <label for="focusedinput" class="col-sm-2 control-label">Metal Title</label>
                     <div class="col-sm-8">
                        <input type="text" name="metal_title" class="form-control" value="{{$email_content->metal_title??''}}">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="focusedinput" class="col-sm-2 control-label">Metal Email</label>
                     <div class="col-sm-8">
                        <input type="text" name="metal_email" class="form-control" value="{{$email_content->metal_email??''}}">
                     </div>
                  </div>
                  
                  <div class="form-group">
                     <label for="focusedinput" class="col-sm-2 control-label">Footer Title</label>
                     <div class="col-sm-8">
                        <input type="text" name="footer_title" class="form-control" value="{{$email_content->footer_title??''}}">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="focusedinput" class="col-sm-2 control-label">Footer Content</label>
                     <div class="col-sm-8">
                        <input type="text" name="footer_content" class="form-control" value="{{$email_content->footer_content??''}}">
                     </div>
                  </div>
                  
                  <div class="form-group">
                     <div class="col-sm-10" style="text-align:center">
                        <input type="submit" class="btn btn-primary" value="Submit">
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection