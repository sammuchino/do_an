@extends('admin_layout')
@section('admin_content')
<!--<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script> -->
    <ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{URL::to('/all-category')}}">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">ADD SLIDER</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" style="border-radius: 5px;
					background-color: #f2f2f2;
					padding: 20px;" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span> Add Slider</h2>
						<p class="alert-success">
							<?php
							$message=Session::get('message');
							if($message){
								echo $message;
								Session::put('message',null);

							}
						?>
						</p>
						
					</div>
					<div class="box-content">
						<form action="{{ url('/save-slider') }}" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
						  <fieldset>							
							<div class="control-group">
							  <label class="control-label" for="fileInput"> Slider Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" name="slider_image" type="file" required="">
							  </div>
							</div>							
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Status</label>
							  <div class="controls">
							  	 <input type="checkbox" name="publication_status" value="1" required=""> 
							</div>
							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-primary">Save changes</button>
								<button class="btn">Cancel</button>
							  </div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
   

@endsection