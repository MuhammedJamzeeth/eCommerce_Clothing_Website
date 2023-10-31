<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function redirect(){
        $userType = Auth::user()->usertype;
        $products = Product::all();


        if($userType == 1){
            return redirect('/admin_home');
        }else{
            return view('home.userpage',compact('products'));
        }
    }
    public function index(){
        $products = Product::all();

        return view('home.userpage',compact('products'));
    }

    public function add_to_cart(){
         return view('home.add_to_cart');
    }
    public function buyNow($id){
        $product = DB::table('products')->find($id);
        $productPhotos = DB::table('product_photos')->where('product_id','=',$id)->get();
//        dd($product);
        return view('home.show_add_products',compact('product','productPhotos'));
    }
}
