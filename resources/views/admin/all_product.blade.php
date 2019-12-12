@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê danh mục sản phẩm
    </div>
   
    <div class="table-responsive">
       <p class="alert-success">
              <?php
              $message=Session::get('message');
              if($message){
                echo $message;
                Session::put('message',null);

              }
            ?>
            </p>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>           
            <th>Product ID</th>
            <th> Tên danh mục </th>
            
            <th>Product image</th>
            <th>Product price</th>
            <th>category name</th>
            <th>manufacture name</th>
            <th> Status </th>
            <th>Hành động</th>                      
          </tr>
        </thead>
          @foreach( $all_product_info as $v_product )
        <tbody>
         
          <tr>
            <td>{{($v_product->product_id)}}</td>
            <td class="center">{{($v_product->product_name)}}</td>
            
            <td ><img src="{{URL::to($v_product->product_image)}}" style="height: 80px; width: 80px;"></td>
            <td class="center">{{($v_product->product_price)}} VND</td>
            <td class="center">{{($v_product->category_name)}}</td>
            <td class="center">{{($v_product->manufacture_name)}}</td>

            <td class="center">
              @if($v_product->publication_status == 1)
              <span class="label label-success">Active
              </span>
              @else
               <span class="label label-danger">Unactive
              </span>
              @endif
            </td>
            <td class="center">
              @if($v_product->publication_status==1)
              <a class="btb btn-success" href="{{URL::to('/unactive-product/'.$v_product->product_id)}}" style="margin: 4px;">
               <i class="fa fa-thumbs-down" ></i>
              </a>
              @else
               <a class="btb btn-success" href="{{URL::to('/active-product/'.$v_product->product_id)}}" style="margin: 4px;" name="">
               <i class="fa fa-thumbs-up" ></i>
              </a>

              @endif
              <a class="btb btn-info" href="{{URL::to('/edit-product/'.$v_product->product_id)}}" style="margin: 4px;">
                <i class="icon-edit"></i>
              </a>
              <a onclick="return confirm('Ban co muon xoa danh muc nay khong')" class="btb btn-danger" href="{{URL::to('/delete-product/'.$v_product->product_id)}}" style="margin: 4px;">
                <i class="icon-trash"></i> 
              </a>
              
            </td>


          </tr>
        
        </tbody>
        @endforeach
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
         {{$all_product_info->links()}}
        </div>
      </div>
    </footer>
  </div>
</div>

@endsection