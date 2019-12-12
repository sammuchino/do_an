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
            <th>Category ID</th>
            <th> Tên danh mục </th>
            <th> Mô tả  </th>
            <th> Status </th>
             <th>Hành động</th>                      
          </tr>
        </thead>
          @foreach( $all_category_info as $v_category )
        <tbody>
         
          <tr>
            <td>{{($v_category->category_id)}}</td>
            <td class="center">{{($v_category->category_name)}}</td>
            <td class="center">{{($v_category->category_description)}}</td>
            <td class="center">
              @if($v_category->publication_status == 1)
              <span class="label label-success">Active
              </span>
              @else
               <span class="label label-danger">Unactive
              </span>
              @endif
            </td>
            <td class="center">
              @if($v_category->publication_status==1)
              <a class="btb btn-success" href="{{URL::to('/unactive-category/'.$v_category->category_id)}}" style="margin: 4px;">
               <i class="fa fa-thumbs-down" ></i>
              </a>
              @else
               <a class="btb btn-success" href="{{URL::to('/active-category/'.$v_category->category_id)}}" style="margin: 4px;" name="">
               <i class="fa fa-thumbs-up" ></i>
              </a>

              @endif
              <a class="btb btn-info" href="{{URL::to('/edit-category/'.$v_category->category_id)}}" style="margin: 4px;">
                <i class="icon-edit"></i>
              </a>
              <a onclick="return confirm('Ban co muon xoa danh muc nay khong')" class="btb btn-danger" href="{{URL::to('/delete-category/'.$v_category->category_id)}}" style="margin: 4px;">
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
         {{$all_category_info->links()}}
        </div>
      </div>
    </footer>
  </div>
</div>

@endsection