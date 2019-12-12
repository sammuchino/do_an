
<?php 
    $all_published_slider=DB::table('tbl_slider')
    ->where('publication_status',1)
    ->get(); 

?>  
<section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                    @foreach( $all_published_slider as $v_slider )
                        <li data-target="#slider-carousel" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
         

                
                <div class="carousel-inner" role="listbox">
                    @foreach( $all_published_slider as $v_slider )
                        <div class="item {{ $loop->first ? ' active' : '' }}" >
                            <div class="col-sm-8">
                            <img src="{{asset( $v_slider->slider_image )}}"  style="width:auto; height: 200px;">
                            </div>
                        </div>
                    @endforeach
                </div>
                <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                 
                    
            </div>
            
         </div>
     </div>
     </div>
 </section> 
  <!--end slide section -->