@extends('layouts.app')
@section('content')
<div id="page-wrapper">
   <div class="main-page">
      <div class="forms">
         <div class="row">
            <h3 class="title1">Contact Page option content:</h3>
            <div class="form-three widget-shadow">
               <!-- Button trigger modal -->
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEditModal">
                  Add Option
               </button>
            </div>
         </div>
         <div class="row">
            <div class="dol-md-12">
               <table class="table table-striped">
                  <tr>
                     <th>Sr. No.</th>
                     <th>Position</th>
                     <th>Title</th>
                     <th>Remove</th>
                  </tr>
                  @foreach($options as $key=>$f)
                  <tr>
                     <td>{{$key+1}}</td>
                     <td>{{$f->contact_position}}</td>
                     <td><a href="{{url('contact-form-option/detail')}}/{{$f->id}}">{{$f->option_name}}</a></td>
                     <td>
                        <a href="javascript:;" class="edit-data-btn" data-id="{{$f->id}}"><span class="glyphicon glyphicon-edit"></span></a>
                        <a href="{{url('contact-form-option/delete/'.$f->id)}}"><span class="glyphicon glyphicon-trash"></span></a>
                     </td>
                  </tr>
                  @endforeach
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addEditModal" tabindex="-1" role="dialog" aria-labelledby="addEditModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addEditModalLabel">Add Option</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="post" action="{{url('contact-form-option/save')}}" enctype="multipart/form-data">
         @csrf
      <div class="modal-body"> 
         <div class="form-group">
            <label for="focusedinput" class="col-sm-2 control-label">Select Position:</label>
            <div class="col-sm-4">
               <select name="contact_position" id="contact_position"  class="form-control" required>
                  <option value="">Select Position</option>
                  <option value="position_one">position one</option>
                  <option value="position_two">position two</option>
                  <!-- <option value="position_third">position third</option> -->
               </select>
            </div>
         </div>
         <input type="hidden" name="id" id="id" value="0">
         <div class="form-group">
            <label for="focusedinput" class="col-sm-2 control-label">Select Page:</label>
            <div class="col-sm-4">
               <input type="text" name="option_name" id="option_name" class="form-control" value="" required>
            </div>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('js-script')
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
        });
    </script>
@endsection