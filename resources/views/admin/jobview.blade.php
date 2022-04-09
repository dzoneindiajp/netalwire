@extends('layouts.app')

@section('content')

<link rel="stylesheet"  type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
										
					<div class="row">
					<h3 class="title1">View Job:</h3>
						<table class="table table-striped" id="example">
						<tr>
							<th>Sr. No.</th>
							<th>Company</th>
							<!--<th>Logo</th>-->
							<th>Title</th>
							<th>Location</th>
							<th>Company Function</th>
							<th>Level</th>
							<th>Description</th>
							<th>Status</th>
							<!--<th>Responsibility</th>-->
							<th>Action</th>
						</tr>
						<?php $i=1;
						foreach($jobs as $jb)
						{?>
						<tr>
							<td><?php echo $i++;?></td>
							<td style="max-width:10%;"><?php echo $jb->company;?></td>
							<!--<td style="max-width:10%;"><img src="<?php echo url("uploads/".$jb->logo);?>"></td>-->
							<td style="max-width:10%;"><?php echo $jb->title;?></td>
							<td style="max-width:10%;"><?php echo $jb->location;?></td>
							<td style="max-width:10%;"><?php echo $jb->company_function;?></td>
							<td style="max-width:10%;"><?php echo $jb->level_name;?></td>
							<td style="max-width:10%;"><div style="height:120px;overflow-y: scroll;"><?php echo $jb->description;?></div></td>
							<td style="max-width:8%;">
							   <?php if($jb->status==1)
							   {?>
							   <a href="<?php echo url("update-job-status/0/".$jb->id);?>" class="btn btn-success">Active</a>
							   <?php }
								else{?>
								
								<a href="<?php echo url("update-job-status/1/".$jb->id);?>"   class="btn btn-danger">Inactive</a>
								<?php } ?>
							   
							   </td>
							<!--<td style="max-width:10%;"><div style="height:120px;overflow-y: scroll;"><?php echo $jb->responsibility;?></div></td>-->	
						<td>
						<a href="<?php echo url("editjob/".$jb->slug);?>" class="btn btn-danger"><i class="fa fa-edit"></i></a>
						
						<a href="<?php echo url("deletejob/".$jb->id);?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
						</td>
						</tr>
						<?php } ?>
						
						</table>
						
					</div>
					
				</div>
			</div>
		</div>
			<script>
	$(document).ready(function() {
    $('#example').DataTable();
} );
	</script>
@endsection
