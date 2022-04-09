@extends('layouts.app')

@section('content')
<link rel="stylesheet"  type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>


<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
										
					<div class="row">
					<h3 class="title1">View Media:</h3>
						<table id="example" class="table table-striped">
						 <thead>
						<tr>
							<th>Sr. No.</th>
							<th>Image</th>
							<th>Image Name</th>
							<th>Place</th>
							
						</tr>
						 </thead>
						 <tbody>
						<?php $i=1;
						foreach($images as $dt)
						{?>
						<tr>
							<td><?php echo $i++;?></td>
							<td style="max-width:300px; word-break: break-all;">
							<img src="<?php echo url("uploads/".$dt->path);?>" width="100"></td>
							<td style="max-width:300px; word-break: break-all;"><?php echo $dt->path;?></td> 
							<td style="max-width:300px; word-break: break-all;" title=''><?php echo $dt->foldername;?></td>
							
							
						
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
