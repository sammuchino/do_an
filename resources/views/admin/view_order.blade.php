@extends('admin_layout')
@section('admin_content')

<div class="row-fluid sortable" style=" background-color: white; margin:0px;
padding: 0px; " >	
				<div class="box span6" style="float: left; width: 50%; height: 50%; ">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Custom details</h2>
						
					</div>
					<div class="box-content" >
						<table class="table table-bordered">
							  <thead>
								  <tr>
									  <th>Username</th>
									  <th>Mobile</th>
									  
								  </tr>
							  </thead>   
							  <tbody>
								<tr>
									@foreach($order_by_id as $v_order)
									@endforeach	
									<td>{{$v_order->customer_name}}</td>
									<td >{{$v_order->mobile_number}}</td>							

									                                     
								</tr>
								        
							  </tbody>
						 </table>  
						
					</div>
				</div><!--/span-->
				
				<div class="box span6" style="float: right; width: 50%; height: 50%;">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping details</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-condensed">
							  <thead>
								  <tr>
									  <th>Shipping name</th>
									  <th>City</th>
									  <th>Mobile number</th>
									  <th>Email</th>
									                                            
								  </tr>
							  </thead>   
							  <tbody>

								<tr>
									@foreach($order_by_id as $v_order)
									@endforeach
									<td>{{$v_order->shipping_last_name}}</td>
									<td>{{$v_order->shipping_city}}</td>
									<td>{{$v_order->shipping_mobile_number}}</td>
									<td>{{$v_order->shipping_email}}</td>                                     
								</tr>
								
								
								
								                       
							  </tbody>
						 </table>  
						
					</div>
				</div><!--/span-->

			
			</div><!--/row-->
			<div class="row-fluid sortable" style=" background-color: white; ">	
				<div class="box span12" >
					<div class="box-header" >
						<h2><i class="halflings-icon align-justify"></i><span style="text-align: center;" class="break"></span>Order details</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-bordered table-striped table-condensed">
							  <thead>
								  <tr>
									  <th>ID</th>
									  <th>Product name</th>
									  <th>Product price</th>
									  <th>Product sales quantity</th>
									  <th>Product sub total</th>                                          
								  </tr>
							  </thead>   
							  <tbody>
							  	@foreach( $order_by_id as $v_order)
								<tr>
									<td>{{$v_order->order_id}}</td>
									<td>{{$v_order->product_name}}</td>
									<td>{{$v_order->product_price}}</td>
									<td>{{$v_order->product_sales_quantity}}</td>
									<td>{{$v_order->product_price*$v_order->product_sales_quantity}}</td>
									                                       
								</tr>
								@endforeach
								
								
								                                   
							  </tbody>
							  <tfoot>
							  	<tr>
							  		<td colspan="4">total</td>
							  		<td><strong>{{$v_order->order_total}} VND</strong></td>
							  	</tr>
							  </tfoot>
						 </table>  
						 
					</div>
				</div><!--/span-->
			</div><!--/row-->
			


@endsection