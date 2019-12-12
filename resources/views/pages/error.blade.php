@extends('layout')
@section('content')
@include('slider')

<div >
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to('frontend/images/error.png')}}" style="width: 100%; height: 260px">
											<h2>ERROR</h2>
											
											
										</div>
										
								</div>
								
							</div>

							<div>
                            <a href="{{URL::to('/')}}">Home</a>
                        </div>
						</div>


@endsection