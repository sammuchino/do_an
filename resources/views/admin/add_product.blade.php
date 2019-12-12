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
					<a href="#">ADD PRODUCT</a>
				</li>
			</ul>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" style="border-radius: 5px;
					background-color: #f2f2f2;
					padding: 20px;" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span> Add Product</h2>
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
						<form action="{{ url('/save-product') }}" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
						  <fieldset>
							<div class="control-group" style="  width: 100%;
  padding: 10px 15px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;">
							  <label class="control-label" for="date01">Product Name</label>
							  <div class="controls">
								<input type="text" style="width: 100%; padding: 5px; margin: 5px;" class="input-xlarge datepicker" name="product_name" required="">
							  </div>
							</div>
							<div class="control-group">
								<label class="control-label" for="selectError3">Product Category</label>
								<div class="controls">
								  <select id="selectError3" style="width: 40%;" name="category_id">
								  	<option>Select Category</option>
								  	<?php
                               $all_published_category = DB::table('tbl_category')
                                                                ->where('publication_status',1)
                                                                ->get();
                                foreach($all_published_category as $v_category){ ?>
									<option value="{{$v_category->category_id}}">{{$v_category->category_name}}</option>
									<?php } ?>
								  </select>
								</div>
							  </div>

							 <div class="control-group">
								<label class="control-label" for="selectError3" >Product Manufacture</label>
								<div class="controls">
								  <select id="selectError3" style="width: 40%;" name="manufacture_id">
								  	<option>Select Menu</option>
								  	<?php
                               $all_published_manufacture = DB::table('menufacture')
                                                                ->where('publication_status',1)
                                                                ->get();
                                foreach($all_published_manufacture as $v_manufacture){ ?>
									<option value="{{$v_manufacture->manufacture_id}}">{{$v_manufacture->manufacture_name}}</option>
									<?php } ?>
								  </select>
								</div>
							  </div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product short description</label>
							  <div class="controls" >
								<textarea class="cleditor" name="product_short_description" required="" rows="3"></textarea>
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product long description</label>
							  <div class="controls" >
								<textarea class="cleditor" name="product_long_description" required="" rows="3"></textarea>
							  </div>
							</div>
							<div class="control-group" style="  width: 100%;
											  padding: 10px 15px;
											  margin: 8px 0;
											  display: inline-block;
											  border: 1px solid #ccc;
											  border-radius: 4px;
											  box-sizing: border-box;">
							  <label class="control-label" for="date01">Product Price</label>
							  <div class="controls">
								<input type="text" style="width: 100%; padding: 5px; margin: 5px;" class="input-xlarge datepicker" name="product_price" required="">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="fileInput">Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" name="product_image" type="file">
							  </div>
							</div>
							 <div class="control-group">
								<label class="control-label" for="selectError3" >Product size</label>
								<div class="controls">
								  <select id="selectError3" style="width: 40%;" name="product_size">
								  	<option>Select size</option>
								  	<?php
                               $all_product_size = DB::table('size')
                                                                
                                                                ->get();
                                foreach($all_product_size as $v_size){ ?>
									<option value="{{$v_size->id}}">{{$v_size->name}}</option>
									<?php } ?>
								  </select>
								</div>
							  </div>
							<div class="control-group">
								<label class="control-label" for="selectError3" >Product color</label>
								<div class="controls">
								  <select id="selectError3" style="width: 40%;" name="product_size">
								  	<option>Select Color</option>
								  	<?php
                               $all_product_color = DB::table('color')
                                                                
                                                                ->get();
                                foreach($all_product_color as $v_color){ ?>
									<option value="{{$v_color->id}}">{{$v_color->name}}</option>
									<?php } ?>
								  </select>
								</div>
							  </div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Status</label>
							  <div class="controls">
							  	 <input type="checkbox" name="publication_status" value="1">
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
