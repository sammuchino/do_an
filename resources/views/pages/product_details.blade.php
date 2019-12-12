@extends('layout')
@section('content')	


				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{URL::to($product_by_details->product_image)}}" alt="" />
								<h3>ZOOM</h3>
							</div>
	
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$product_by_details->product_name}}</h2>
								<p>{{$product_by_details->product_color}}</p>
								<div class="controls">
									  <select id="selectError3" style="width: 40%;" name="category_id">
									  	<option>Chọn màu</option>
									  
										<option value=""></option>
									  </select>
									</div>
								<img src="{{URL::to('frontend/images/product-details/rating.png')}}" alt="" />

								<span>
									<span>{{$product_by_details->product_price}} VND</span>
									<form action="{{url('/add-to-cart')}}" method="post">
										{{csrf_field()}}
										<label>Quantity:</label>
										<input name="qty" type="text" value="1" />
										<input type="hidden" name="product_id" value="{{$product_by_details->product_id}}">
										<button type="submit" class="btn btn-fefault cart">
											<i class="fa fa-shopping-cart"></i>
											Add to cart
										</button>
								</form>
								</span>
								<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b> {{$product_by_details->manufacture_name}}</p>
								<p><b>Category:</b> {{$product_by_details->category_name}}</p>
								<p><b>Size:</b> {{$product_by_details->product_size}}</p>
								<div class="controls">
									  <select id="selectError3" style="width: 40%;" name="category_id">
									  	<option>Chọn size</option>
									  
										<option value="{{$product_by_details->product_id}}">{{$product_by_details->product_size}}</option>
									  </select>
									</div>
								
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
								<li><a href="#tag" data-toggle="tab">Tag</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
								<p>{{$product_by_details->product_long_description}}</p>
							</div>
								
							
							<div class="tab-pane fade" id="companyprofile" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												
												<h2>{{$product_by_details->manufacture_name}}</h2>
												
											</div>
										</div>
									</div>
								</div>
								
								
							
							</div>
							
						
								</div>
							</div>
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<p><b>Write Your Review</b></p>
									
									<form action="#" style="background-color: white; ">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="{{URL::to('frontend/images/product-details/rating.png')}}" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">

							<div class="carousel-inner">
								<div class="item active">	
								@foreach($related_product as $key => $lienquan)
									<div class="col-sm-3">
										
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{URL::to($lienquan->product_image)}}" alt="" style="width: 80px; height: 80px;" />
													<h2>{{$lienquan->product_price}}</h2>
													<p>{{$lienquan->product_name}}</p>
													<a href="{{URL::to('/view_product/'.$lienquan->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
											</div>
										</div>
										
									</div>
									@endforeach
							</div>
								
								
						</div>
								
					</div>
					{{$related_product->links()}}
					</div><!--/recommended_items-->
					
				</div>
@endsection