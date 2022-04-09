@extends('layouts.app')

@section('content')
<link rel="stylesheet"  type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>


<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
										
					<div class="row">
					<h3 class="title1">View Pages:</h3>
						<table id="example" class="table table-striped">
						 <thead>
						<tr>
							<th>Sr. No.</th>
							<th>Title</th>
							<th>Description</th>
							<th>Meta Keywords</th>
							<th>Meta Description</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
						 </thead>
						 <tbody>
						<?php $i=1;
						foreach($pages as $dt)
						{?>
						<tr>
							<td><?php echo $i++;?></td>
							<td style="max-width:300px; word-break: break-all;"><?php echo $dt->title;?></td>
							<td style="max-width:300px; word-break: break-all;" title='<?php echo strip_tags($dt->description);?>'><?php echo substr(strip_tags($dt->description),0,100);?> .....</td>
							<td style="max-width:300px; word-break: break-all;"><?php echo $dt->metakeywords;?></td>
							<td style="max-width:300px; word-break: break-all;"><?php echo $dt->metadescription;?></td>
							<td>
							<?php if($dt->status==1)
							{?>
							<a href="<?php echo url("update-page-status/0/".$dt->id);?>" class="btn btn-success">Active</a>
							<?php }
							else
							{?>
							<a href="<?php echo url("update-page-status/1/".$dt->id);?>" class="btn btn-danger">Deactive</a>
							<?php } ?>
							
							</td>
						<td>
						<?php if($dt->templateone_content=='')
						{?>
						<a href="<?php echo url("editpage/".$dt->id);?>"  class="btn btn-danger"><i class="fa fa-edit"></i></a>
						<?php } 
						else{?>
						<a href="<?php echo url("editpagett/".$dt->id);?>"  class="btn btn-danger"><i class="fa fa-edit"></i></a>
						<?php } ?>
						
						<a href="<?php echo url("deletepage/".$dt->id);?>"  onclick="editPage(this.id)" class="btn btn-danger"><i class="fa fa-trash"></i></a>
						</td>
						</tr>
						<?php } ?>
						</tbody> 
						</table>
					</div>
					
				</div>
			</div>
		</div>
		
	

<div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>This is a small modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  
	<script>
	$(document).ready(function() {
    $('#example').DataTable();
} );
	</script>	
	
	
	<script>
	function editPage(id)
	{
		alert(id);
		
		
	}
	
	
	
	</script>
@endsection
