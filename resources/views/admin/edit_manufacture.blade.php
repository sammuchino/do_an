@extends('admin_layout')
@section('admin_content')
<!--<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script> -->
    <ul class="breadcrumb">
				
				<li>
					<i class="icon-edit"></i>
					<a href="#">UPDATE MANUFACTURE</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" style="border-radius: 5px;
					background-color: #f2f2f2;
					padding: 20px;" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span> update manufacture</h2>
						
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="{{url('/update-manufacture',$manufacture_info->manufacture_id)}}" method="post">
							{{csrf_field()}}
						  <fieldset>							
							<div class="control-group" style="  width: 100%;
  padding: 10px 15px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;">
							  <label class="control-label" for="date01">Manufacture Name</label>
							  <div class="controls">
								<input type="text" style="width: 100%; padding: 5px; margin: 5px;" class="input-xlarge datepicker" name="manufacture_name" value="{{$manufacture_info->manufacture_name}}">
							  </div>
							</div>
			        
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Manufacture description</label>
							  <div class="controls" >
								<textarea class="cleditor" name="manufacture_description" required="" rows="3">
									{{$manufacture_info->manufacture_description}}
								</textarea>
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