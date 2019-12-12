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
						<a href="#">Sửa sản phẩm</a>
					</li>
				</ul>
				
				<div class="row-fluid sortable">
					<div class="box span12">
						<div class="box-header" style="border-radius: 5px;
						background-color: #f2f2f2;
						padding: 20px;" data-original-title>
							<h2><i class="halflings-icon edit"></i><span class="break"></span> Sửa sản phẩm</h2>
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
							<form action="{{url('/update-product',$product_info->product_id)}}" method="post" enctype="multipart/form-data">
								{{csrf_field()}}
							  <fieldset>							
								<div class="control-group" style=" ">
								  <label class="control-label" for="date01">Tên Sản Phẩm</label>
								  <div class="controls">
									<input type="text" style="width: 100%; padding: 5px; margin: 5px;" class="input-xlarge datepicker" name="product_name" value="{{$product_info->product_name}}">
								  </div>
								</div>
								<div class="control-group">
									<label class="control-label" for="selectError3">Tên loại sản phẩm</label>
									<div class="controls">
									  <select id="selectError3" style="width: 40%;" name="category_id">
									  	<option>Chọn loại sản phẩm</option>
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
									<label class="control-label" for="selectError3" >Thương hiệu sản phẩm</label>
									<div class="controls">
									  <select id="selectError3" style="width: 40%;" name="manufacture_id">
									  	<option>Chọn thương hiệu sản phẩm</option>
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
								  <label class="control-label" for="textarea2">Mô tả ngắn</label>
								  <div class="controls" >
									<textarea class="cleditor" name="product_short_description" required="" rows="3">{{$product_info->product_short_description}}</textarea>
								  </div>
								</div>

								<div class="control-group hidden-phone">
								  <label class="control-label" for="textarea2">Mô tả thêm</label>
								  <div class="controls" >
									<textarea class="cleditor" name="product_long_description" required="" rows="3">
										{{$product_info->product_long_description}}
									</textarea>
								  </div>
								</div>
								<div class="control-group" >
								  <label class="control-label" for="date01">Gía sản phẩm</label>
								  <div class="controls">
									<input type="text" style="width: 100%; padding: 5px; margin: 5px;" class="input-xlarge datepicker" name="product_price" value="{{$product_info->product_price}}"> 
								  </div>
								</div>

								<div class="control-group">
								  <label class="control-label" for="fileInput">ẢNH</label>
								  <div class="controls">
									<input class="input-file uniform_on" name="product_image" id="product_image" type="file"><img src="{{URL::to('/'.$product_info->product_image)}}" height="80" width="80">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="date01">kích cỡ</label>
								  <div class="controls">
									<input type="text" style="width: 100%; padding: 5px; margin: 5px;" class="input-xlarge datepicker" name="product_size" value="{{$product_info->product_size}}">
								  </div>
								</div>
								<div class="control-group">
								  <label class="control-label" for="date01">màu sắc</label>
								  <div class="controls">
									<input type="text" style="width: 100%; padding: 5px; margin: 5px;" class="input-xlarge datepicker" name="product_color" value="{{$product_info->product_color}}">
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