@extends('layout')
@section('content')

	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-1">
					<h2 class="or">Card</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Điền thông tin thẻ </h2>
						<form action="{{url('/')}}" method="post">
							{{csrf_field()}}
							<input type="text" placeholder=" Card Name" name="card_name" />
							<input type="password" placeholder="card_code" name="card_code"/>
							<input type="text" placeholder="date-time"name="date"/>
							<button type="submit" class="btn btn-default">Thanh toán</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->


@endsection