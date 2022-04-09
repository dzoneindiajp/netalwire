@extends('layouts.app')

@section('content')
<?php use App\User;
$cor=new User();?>
<div id="page-wrapper">
			<div class="main-page">
			<div class="col_3">
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa  fa-cubes icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $cor->getproducts();?></strong></h5>
                      <span>Total Products</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-file-word-o user1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $cor->getpages();?></strong></h5>
                      <span>Total Pages</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-users user2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $cor->getclients();?></strong></h5>
                      <span>Total Clients</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-user dollar1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $cor->getusers();?></strong></h5>
                      <span>Total Users</span>
                    </div>
                </div>
        	 </div>
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-envelope-o dollar2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $cor->contactform();?></strong></h5>
                      <span>Total Enquiries</span>
                    </div>
                </div>
        	 </div>
        	<div class="clearfix"> </div>
		</div>
		
		<div class="row-one widgettable">
			<div class="col-md-12 content-top-2 card">
				<div class="agileinfo-cdr">
					<div class="card-header">
                        <h3>Top 5 Enquiries/Subscription: <a href="<?php echo url("enquiries");?>">View All</a></h3>
                    </div>
					
				</div>
			</div>
			<div class="card"> 
						<table class="table table-striped">
						<tr>
							<td>Sr. No.</td>
							<td>Type</td>
							<td>Name</td>
							<td>Email</td>
							<td>Phone</td>
							<td>Subject</td>
							<td>Date</td>
							<td>Query</td>
						
						
						</tr>
						<?php $i=1;
						foreach($cor->toptenqn() as $dt)
						{?>
						<tr>
							<td><?php echo $i++;?></td>
									<td><?php if($dt->type=='1'){ echo "Enquiry";}else { echo "Subscription";}?></td>
									<td><?php echo $dt->name; ?></td>
									<td><?php echo $dt->email; ?></td>
									<td><?php echo $dt->phone; ?></td>
									<td><?php echo $dt->subject; ?></td>
									<td  width="200"><?php echo date("d-M-Y H:i:s",strtotime($dt->created_at)); ?></td>
									<td><?php echo $dt->message; ?></td>
						
						
						</tr>
						<?php } ?>
						</table>
						
				</div>
			
			
			<div class="clearfix"> </div>
		</div>
				
				
				
	
	<!-- for amcharts js -->
			
	<!-- for amcharts js -->

    
	
		
				
			</div>
		</div>
@endsection
