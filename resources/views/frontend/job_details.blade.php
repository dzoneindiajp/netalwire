@extends('layouts.app')

@section('content')
<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
										
					<div class="row">
					<h3 class="title1">View Apply Job:</h3>
						<table class="table table-striped">
						
						<tr>
							<th>Sr. No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Image</th>
							<th>Description</th>
							<th>Action</th>
						</tr>
						<?php $i=1;
						foreach($applyjob as $aj)
						{?>
						<tr>
							<td><?php echo $i++;?></td>
							<td ><?php echo $aj->name;?></td>
							<td ><?php echo $aj->email;?></td>
							<td ><?php echo $aj->phone;?></td>
							 <td><a href="<?php echo url("uploads/".$aj->image);?>" download class="danger"><i class="fa fa-file-pdf-o fa-5"></i></a><!--<img src="<?php echo url("uploads/".$aj->image);?>">--></td>
							<td ><?php echo $aj->description;?></td>
							<td><a href="<?php echo url("deleteapplyjob/".$aj->id);?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
							
						</tr>
						<?php } ?>
						
						</table>
					</div>
					
				</div>
			</div>
		</div>
@endsection
