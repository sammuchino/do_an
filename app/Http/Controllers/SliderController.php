<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\UploadedFile;

class SliderController extends Controller
{
    public function index(){
    	return view('admin.add_slider');
    }
    public function save_slider(Request $request){
    	$data=array();
   	$data['publication_status']=$request->publication_status;
   	$image=$request->file('slider_image');
   	if($image){
   		$image_name = Str::random(40);
        $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'slider/';    //Creating Sub directory in Public folder to put image
        $image_url = $upload_path.$image_full_name;
        $success = $image->move($upload_path,$image_full_name);
        	if($success){
        		$data['slider_image'] = $image_url;
        		DB::table('tbl_slider')->insert($data);
        		Session::put('message','successs');
        		return Redirect::to('/add-slider');
        	}
        	$data['slider_image']='';
        	DB::table('tbl_slider')->insert($data);
        		Session::put('message','successs');
        		return Redirect::to('/add-slider');
   		}
   	}

   	public function all_slider(){

     $all_slider_info = DB::table('tbl_slider')
     ->where('publication_status',1)
     ->paginate(15);
    	$manage_slider=view('admin.all_slider')->with('all_slider_info',$all_slider_info);
    	return view('admin_layout')
    			->with('all_slider',$manage_slider);
   	}
   	public function unactive_slider($slider_id){
   		DB::table('tbl_slider')
    ->where('slider_id',$slider_id)
    ->update(['publication_status'=>0]);
    Session::put('message',' slider unactive success!!');
    return Redirect::to('/all-slider');

   	}

   		public function active_slider($slider_id){
   		DB::table('tbl_slider')
    ->where('slider_id',$slider_id)
    ->update(['publication_status'=>1]);
    Session::put('message',' slider active success!!');
    return Redirect::to('/all-slider');

   	}
   	public function delete_slider($slider_id){
        DB::table('tbl_slider')
        ->where('slider_id',$slider_id)
        ->delete();
        Session::put('message','Slider delete success!!');
        return Redirect::to('/all-slider');
   }
    }

