@extends('layouts.app')

@section('content')
<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
										
					<div class="row">
					<h3 class="title1">View Pages:</h3>
					<div class="form-three widget-shadow">
						<table class="table table-striped">
						
						<tr>
							<th>Sr. No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Mobile</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
						<?php $i=1;
						foreach($user as $dt)
						{?>
						<tr>
							<td><?php echo $i++;?></td>
							<td><?php echo $dt->name;?></td>
							<td><?php echo $dt->email;?></td>
							<td><?php echo $dt->mobile;?></td>
							<td><?php echo $dt->address;?></td>
						
							
						<td>
						<a href="<?php echo url("edituser/".$dt->id);?>" class="btn btn-danger"><i class="fa fa-edit"></i></a>
						
						<a href="<?php echo url("deleteuser/".$dt->id);?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
