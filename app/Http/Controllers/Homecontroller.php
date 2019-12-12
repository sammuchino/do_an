<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use DB;
use Session;

class Homecontroller extends Controller
{
    public function index()
    {
    	$all_published_product = DB::table('tbl_products')
   								->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
   								->join('menufacture','tbl_products.manufacture_id','=','menufacture.manufacture_id')
   								->select('tbl_products.*','tbl_category.category_name','menufacture.manufacture_name')
   								->where('tbl_products.publication_status',1)
   								->limit(9)
   								->paginate(9);
    	$manage_published_product=view('pages.home_content')->with('all_published_product',$all_published_product);
    	return view('layout')
    			->with('pages.home_content',$manage_published_product);
    	//return view('pages.home_content');
    }
  //tim kiem
    public function search(Request $request){
      $keyworks_submit=$request->keyworks_submit;
      //start jquery search
      //
      $cate = DB::table('tbl_category')->where('publication_status',0)->orderby('category_id','desc')->get();
      $menu = DB::table('menufacture')->where('publication_status',0)->orderby('manufacture_id','desc')->get();
      $data=DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id') 
             ->where('tbl_products.product_name','like','%'.$keyworks_submit.'%')
                          
               ->get();
        return view('pages.search')->with('cate',$cate)->with('menu',$menu)->with('data',$data);
    }
     public function price_range(Request $request){
     
         $price = explode("-",$request->price);

          $start = $price[0];
          $end = $price[1];

          //echo "both are selected";
          $data = DB::table('tbl_products')
          ->join('tbl_category','tbl_category.category_id','tbl_products.category_id')
          //->where('products.cat_id',$cat_id)
          ->where('tbl_products.product_price', ">=", $start)
          ->where('tbl_products.product_price', "<=", $end)
          ->get();
      
      return view('pages.price_range')->with('data',$data);
     }


    public function showproduct_by_category($category_id){
      $product_by_category = DB::table('tbl_products')
                  ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                  ->join('menufacture','tbl_products.manufacture_id','=','menufacture.manufacture_id')
                  ->select('tbl_products.*','tbl_category.category_name','menufacture.manufacture_name')
                  ->where('tbl_category.category_id',$category_id)
                  ->where('tbl_category.publication_status',1)
                  ->limit(9)
                  ->paginate(9);
      $manage_product_by_category=view('pages.category_by_product')->with('product_by_category',$product_by_category);
      return view('layout')
          ->with('pages.category_by_product',$manage_product_by_category);
    }
     public function showproduct_by_manufacture($manufacture_id){
      $product_by_manufacture = DB::table('tbl_products')
                  ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                  ->join('menufacture','tbl_products.manufacture_id','=','menufacture.manufacture_id')
                  ->select('tbl_products.*','tbl_category.category_name','menufacture.manufacture_name')
                  ->where('menufacture.manufacture_id',$manufacture_id)
                  ->where('menufacture.publication_status',1)
                  ->limit(18)
                  ->paginate(15);
      $manage_product_by_manufacture=view('pages.manufacture_by_product')->with('product_by_manufacture',$product_by_manufacture);
      return view('layout')
          ->with('pages.manufacture_by_product',$manage_product_by_manufacture);
    }
    public function product_details_by_id($product_id){
        $product_by_details = DB::table('tbl_products')
                  ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                  ->join('menufacture','tbl_products.manufacture_id','=','menufacture.manufacture_id')
                  
                  ->select('tbl_products.*','tbl_category.category_name','menufacture.manufacture_name')
                  ->where('tbl_products.product_id',$product_id)
                  ->where('tbl_products.publication_status',1)
                  ->first();

     //relate item             
        $details_product = DB::table('tbl_products')
                  ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                  ->join('menufacture','tbl_products.manufacture_id','=','menufacture.manufacture_id')
                  ->where('tbl_products.product_id',$product_id)                
                  ->get();
                  foreach ($details_product as $key => $value) {
                    $category_id = $value->category_id;
                  }

        $related_product = DB::table('tbl_products')
                  ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                  ->join('menufacture','tbl_products.manufacture_id','=','menufacture.manufacture_id')
                  ->where('tbl_category.category_id',$category_id)->whereNotIn('tbl_products.product_id',[$product_id])->paginate(3);
;
               
  

      $manage_product_by_details=view('pages.product_details')->with('product_by_details',$product_by_details)->with('related_product',$related_product);
      return view('layout')
          ->with('pages.product_details',$manage_product_by_details);
      //return view('pages.home_content');
    }
    public function error(){
      return view('pages.error');
    }
}
