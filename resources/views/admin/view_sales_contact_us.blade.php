@extends('layouts.app')

@section('content')

<link rel="stylesheet"  type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
										
					<div class="row">
					<h3 class="title1">View Sales Contact us form:</h3>
						<table class="table table-striped" id="example" style="table-layout: fixed;word-wrap: break-word;">
						<tr>
							<th>Sr. No.</th>
							<th>purpose</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Location</th>
							<th>Biz Interes</th>
							<th>Comapny</th>
							<th>Position</th>
							<th>Description</th>
							<th>Action</th>
						</tr>
						@php $i=1; @endphp
						@foreach($sales_contact_data as $jb)
						
						<tr>
							<td><?php echo $i++;?></td>
							<td >{{ $jb->sales_purpose_contact}}</td>
							<td >{{ $jb->sales_name}}</td>
							<td >{{ $jb->sales_email}}</td>
							<td >{{ $jb->sales_mobile}}</td>
							<td >{{ $jb->sales_country}}</td>
							<td >{{ $jb->sales_biz_area_interest}}</td>
							<td >{{ $jb->sales_company}}</td>
							<td >{{ $jb->sales_position}}</td>
							<td >{{ $jb->sales_message}}</td>
							<td><a href="{{  url('delete-sales-contact-us-form/'.$jb->id) }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
							
					<!--	<td>
						<a href="<?php echo url("editjob/".$jb->sales_name);?>" class="btn btn-danger"><i class="fa fa-edit"></i></a>
						
						<a href="<?php echo url("deletejob/".$jb->id);?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
						</td>-->
						</tr>
					@endforeach
						
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
