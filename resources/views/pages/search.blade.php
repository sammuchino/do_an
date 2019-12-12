@extends('layout')
@section('content')
@include('slider')


<h2 class="title text-center">Tim kiem</h2>
			 <?php foreach($data as $v_data){ ?>			
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to($v_data->product_image)}}" style="height: 300px;" alt="" />
											<h2>{{$v_data->product_price}} VND</h2>
											<p>{{$v_data->product_name}}</p>
											<a href="{{URL::to('/view_product/'.$v_data->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>{{$v_data->product_price}} VND</h2>
												<a href="{{URL::to('/view_product/'.$v_data->product_id)}}"><p> {{$v_data->product_name}}</p></a>
												<a href="{{URL::to('/view_product/'.$v_data->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
								</div>
								<div class="choose">
									
								</div>
							</div>
						</div>
						<?php } ?>
						
						
					
						
						
					</div><!--features_items-->

@endsection