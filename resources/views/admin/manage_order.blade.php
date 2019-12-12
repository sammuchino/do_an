@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      ORDER-DETAILS
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
            <th>order ID</th>
            <th> customer name </th>
            <th> order total </th>
            <th> Status </th>
             <th>Hành động</th>                      
          </tr>
        </thead>
          @foreach( $all_order_info as $v_order )
        <tbody>
         
          <tr>
            <td>{{($v_order->order_id)}}</td>
            <td class="center">{{($v_order->customer_name)}}</td>
            <td class="center">{{($v_order->order_total)}}</td>
            <td class="center">{{($v_order->order_status)}}</td>
          <!--<td class="center">
             
              <span class="label label-success">Active
              </span>
        
               <span class="label label-danger">Unactive
              </span>
        
            </td> -->
            <td class="center">
              @if($v_order->order_status=="pending")
              <a class="btb btn-success" href="{{URL::to('/unactive-order/'.$v_order->order_id)}}" style="margin: 4px;">
               <i class="fa fa-thumbs-down" ></i>
              </a>
              @else
               <a class="btb btn-success" href="{{URL::to('/active-order/'.$v_order->order_id)}}" style="margin: 4px;" name="">
               <i class="fa fa-thumbs-up" ></i>
              </a> 
             @endif
             
              <a class="btb btn-info" href="{{URL::to('/view-order/'.$v_order->order_id)}}" style="margin: 4px;">
                <i class="icon-edit"></i>
              </a>
              <a onclick="return confirm('Ban co muon xoa danh muc nay khong')" class="btb btn-danger" href="{{URL::to('/delete-order/'.$v_order->order_id)}}" style="margin: 4px;">
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
         {{$all_order_info->links()}}
        </div>
      </div>
    </footer>
  </div>
</div>

@endsection