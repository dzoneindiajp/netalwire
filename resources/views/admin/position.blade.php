@extends('layouts.app')
@section('content')
<div id="page-wrapper">
   <div class="main-page">
      <div class="forms">
         <div class="row">
            <h3 class="title1">Position:</h3>
            <div class="form-three widget-shadow">
               <form class="form-horizontal" method="post" action="<?php echo url("save-position");?>" enctype="multipart/form-data">
                  @csrf 
                  <?php if(!empty($getPositionArr))
                     {?>
                  <input type="hidden" name="id" value="{{ $getPositionArr->id }}">
                  <?php } ?> 
                  <div class="form-group">
                     <label for="focusedinput" class="col-sm-2 control-label">Select Page:</label>
                     <div class="col-sm-4">
                        <input type="text" name="position_name" class="form-control" value="{{ $getPositionArr->position_name??'' }}" required>
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
                     <th>Position Name</th>
                     <th>Action</th>
                  </tr>
                  <?php $i=1; foreach($get_all_position as $f)
                     {?>
                  <tr>
                     <td><?php echo $i++; ?></td>
                     <td><?php echo $f->position_name?></td>
                     <td>
                        <a href="<?php echo url("add-position/".$f->id);?>"><span class="glyphicon glyphicon-edit"></span></a>
                        <a href="<?php echo url("delete-position/".$f->id);?>"><span class="glyphicon glyphicon-trash"></span></a>
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