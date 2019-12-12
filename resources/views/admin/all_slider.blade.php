@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      SLIDER
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
            <th>Slider ID</th>
            <th>Slider image</th>
            <th> Status </th>
            <th>Hành động</th>                      
          </tr>
        </thead>
          @foreach( $all_slider_info as $v_slider )
        <tbody>
         
          <tr>
            <td>{{($v_slider->slider_id)}}</td>
           
            
            <td ><img src="{{URL::to($v_slider->slider_image)}}" style=" width: 200px;"></td>
            

            <td class="center">
              @if($v_slider->publication_status == 1)
              <span class="label label-success">Active
              </span>
              @else
               <span class="label label-danger">Unactive
              </span>
              @endif
            </td>
            <td class="center">
              @if($v_slider->publication_status==1)
              <a class="btb btn-success" href="{{URL::to('/unactive-slider/'.$v_slider->slider_id)}}" style="margin: 4px;">
               <i class="fa fa-thumbs-down" ></i>
              </a>
              @else
               <a class="btb btn-success" href="{{URL::to('/active-slider/'.$v_slider->slider_id)}}" style="margin: 4px;" name="">
               <i class="fa fa-thumbs-up" ></i>
              </a>

              @endif
              <a onclick="return confirm('Ban co muon xoa danh muc nay khong')" class="btb btn-danger" href="{{URL::to('/delete-slider/'.$v_slider->slider_id)}}" style="margin: 4px;">
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
          {{$all_slider_info->links()}}
        </div>
      </div>
    </footer>
  </div>
</div>

@endsection