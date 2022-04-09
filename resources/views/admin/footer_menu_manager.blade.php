@extends('layouts.app')
@section('content')
<div id="page-wrapper">
   <div class="main-page">
      <div class="forms">
         <div class="row">
            <h3 class="title1">Footer Menu Manager:</h3>
            <div class="form-three widget-shadow">
               <form class="form-horizontal" method="post" action="<?php echo url("save-footer-menu");?>" enctype="multipart/form-data">
                  @csrf 
                  <div class="form-group">
                     <label for="focusedinput" class="col-sm-2 control-label">Select Position:</label>
                     <div class="col-sm-4">
                        <!--<select name="position" class="form-control" required>
                           <option value="">Select Position</option>
                           <option value="Products" <?php if(!empty($nfm) && $nfm->position == 'Products') { echo 'selected';} ?>>Products</option>
                           <option value="Quick Links" <?php if(!empty($nfm) && $nfm->position == 'Quick Links') { echo 'selected';} ?>>Quick Links</option>
                           <option value="Information" <?php if(!empty($nfm) && $nfm->position == 'Information') { echo 'selected';} ?>>Information</option>
                           <option value="News" <?php if(!empty($nfm) && $nfm->position == 'News') { echo 'selected';} ?>>News</option>
                        </select>-->
                        
                        <select name="position" class="form-control" required>
                           <option value="">Select Position</option>
                           <option value="{{$footer_menu_text->footer_one}}" @if(!empty($nfm) && $nfm->position == $footer_menu_text->footer_one) selected @endif >{{$footer_menu_text->footer_one}}</option>
                           <option value="{{$footer_menu_text->footer_two}}" @if(!empty($nfm) && $nfm->position == $footer_menu_text->footer_two) selected @endif >{{$footer_menu_text->footer_two}}</option>
                           <option value="{{$footer_menu_text->footer_third}}" @if(!empty($nfm) && $nfm->position == $footer_menu_text->footer_third) selected @endif >{{$footer_menu_text->footer_third}}</option>
                           <option value="{{$footer_menu_text->footer_four}}" @if(!empty($nfm) && $nfm->position == $footer_menu_text->footer_four) selected @endif >{{$footer_menu_text->footer_four}}</option>
                        </select>
                        
                     </div>
                  </div>
                  <?php if(!empty($nfm))
                     {?>
                  <input type="hidden" name="id" value="<?php echo $nfm->id;?>">
                  <?php } ?> 
                  <div class="form-group">
                     <label for="focusedinput" class="col-sm-2 control-label">Select Page:</label>
                     <div class="col-sm-4">
                        <select name="page" class="form-control" required>
                           <option value="">Select Page</option>
                           <?php  $link='';
                              foreach($cms as $cm)
                              { 
                                $value=$cm->title.'~'.$cm->slug;
                                 if(!empty($nfm))
                                 {
                              	   $link=$nfm->link_title.'~'.$nfm->link;
                              	   
                                 }
                              ?> 
                           <option value="<?php echo $value; ?>" <?php if($link==$value){ echo "selected";}?> id="<?php echo $link?>"><?php echo $cm->title?></option>
                           <?php } ?>
                        </select>
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
         <div class="row">
            <div class="dol-md-12">
               <table class="table table-striped">
                  <tr>
                     <th>Sr. No.</th>
                     <th>Position</th>
                     <th>Title</th>
                     <th>Link</th>
                     <th>Remove</th>
                  </tr>
                  <?php $i=1; foreach($fm as $f)
                     {?>
                  <tr>
                     <td><?php echo $i++; ?></td>
                     <td><?php echo $f->position?></td>
                     <td><?php echo $f->link_title?></td>
                     <td><?php echo $f->link?></td>
                     <td>
                        <a href="<?php echo url("footer-menu-manager/".$f->id);?>"><span class="glyphicon glyphicon-edit"></span></a>
                        <a href="<?php echo url("delete-footer-menu/".$f->id);?>"><span class="glyphicon glyphicon-trash"></span></a>
                     </td>
                  </tr>
                  <?php } ?>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection