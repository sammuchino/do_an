<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Redirect;
use App\Expense;
use Image;
use Illuminate\Pagination\Paginator;
//use Illuminate\Http\UploadedFile;

session_start();

class ProductController extends Controller
{


	public function AdminAuthCheck(){
    	$admin_id=Session::get('admin_id');
    		if($admin_id){
    			return;
    		}else{
    			return Redirect::to('/admin')->send();
    		}

    }
   public function index(){
   	$this->AdminAuthCheck();
   	return view('admin.add_product');
   }
   public function all_product(){
   	$this->AdminAuthCheck();
   	$all_product_info = DB::table('tbl_products')
   								->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
   								->join('menufacture','tbl_products.manufacture_id','=','menufacture.manufacture_id')
   								->select('tbl_products.*','tbl_category.category_name','menufacture.manufacture_name')

   								->paginate(15)
                  ;

    	$manage_product=view('admin.all_product')->with('all_product_info',$all_product_info);
    	return view('admin_layout')
    			->with('all_product',$manage_product);
   }

    public function save_product (Request $request)
    {
        $data=array ();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['manufacture_id'] = $request->manufacture_id;
        $data['product_short_description'] = $request->product_short_description;
        $data['product_long_description'] = $request->product_long_description;
        $data['product_price'] = $request->product_price;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color;
        $data['publication_status'] = $request->publication_status;
        
        $image=$request->file('product_image');
        if($image){
            $image_name=Str::random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $img_full_name=$image_name.'.'.$ext;
            $upload_path='image/';
            $img_url=$upload_path.$img_full_name;
            $success=$image->move($upload_path, $img_full_name);
            if($success){
                $data['product_image']=$img_url;
                    DB::table('tbl_products')->insert($data);
                    Session::put('message', 'Product Successfully Added');
                    return Redirect::to ('/add-product');
            }

        }
        $data['product_image']='';
            DB::table('tbl_product')->insert($data);
            Session::put('message', 'Product Successfully Added without image');
            return Redirect::to ('/add-product');



    }
    
   	public function unactive_product($product_id){
   		DB::table('tbl_products')
    ->where('product_id',$product_id)
    ->update(['publication_status'=>0]);
    Session::put('message',' Product unactive success!!');
    return Redirect::to('all-product');

   	}
   	public function active_product($product_id){
   		DB::table('tbl_products')
    ->where('product_id',$product_id)
    ->update(['publication_status'=>1]);
    Session::put('message',' Product active success!!');
    return Redirect::to('all-product');
   	}
   	public function delete_product($product_id){
        DB::table('tbl_products')
        ->where('product_id',$product_id)
        ->delete();
        Session::put('message',' Product delete success!!');
        return Redirect::to('/all-product');
   }

   public function edit_product($product_id){

    $cate = DB::table('tbl_category')->orderby('category_id','desc')->get();
    $manu = DB::table('menufacture')->orderby('manufacture_id','desc')->get();
    $product_info=DB::table('tbl_products')
    ->where('product_id',$product_id)
    ->first();
    $product_info=view('admin.edit_product')->with('product_info',$product_info)->with('cate',$cate)->with('manu',$manu);
        return view('admin_layout')
                ->with('admin.edit_product',$product_info);
   }


   public function update_product(Request $request, $product_id)
    {

        $data = array();

    $image=$request->file('product_image');

    $data['product_name']=$request->product_name;
    $data['category_id']=$request->category_id;
    $data['manufacture_id']=$request->manufacture_id;
    $data['product_short_description']=$request->product_short_description;
    $data['product_long_description']=$request->product_long_description;
    $data['product_price']=$request->product_price;
    $data['product_size']=$request->product_size;
    $data['product_color']=$request->product_color;

    if($image){
      $image_name = Str::random(40);
        $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()

        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'image/';    //Creating Sub directory in Public folder to put image
        $image_url = $upload_path.$image_full_name;
        $moveImage = $image->move($upload_path,$image_full_name);
        if($moveImage){
            $data['product_image'] = $image_url;
           DB::table('tbl_products')->where('product_id',$product_id)->update($data);
           Session::put('message','successs');
            return redirect('all-product');
          }
      }
   }
}
