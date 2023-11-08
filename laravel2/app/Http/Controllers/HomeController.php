<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function redirect(){
        $products = Product::all();
        if (Auth::check())
        {
            $userType = Auth::user()->usertype;


            if($userType == 1){
                return redirect('/admin_home');
            }else{
                return view('home.userpage',compact('products'));
            }
        }
        else{
            return view('home.userpage',compact('products'));
        }

    }
    public function index(){
        $products = Product::all();

        return view('home.userpage',compact('products'));
    }

    public function add_to_cart($id){
        $showCarts = DB::table('carts')->where('u_id','=',$id)->get();
        $product = new Product();
        $getCart = DB::table('carts')->where('u_id','=',$id)->first();
        return view('home.add_to_cart',compact('showCarts','product','getCart'));
    }
    public function buyNow($id){
        $product = DB::table('products')->find($id);
        $productNames = DB::table('products')->where('title','=',$product->title)->get();
        $productPhotos = DB::table('product_photos')->where('product_id','=',$id)->get();
//        dd($productNames);
        return view('home.show_add_products',compact('product','productPhotos','productNames'));
    }
    public function addToCart($id,Request $request){
        $product = DB::table('products')
            ->where('title','=',$request->pTitle)
            ->where('size','=',$request->size_id)
            ->first()
        ;
//        dd($product);
        $cart = new Cart();
        $cart->p_id = $product->id;
        $cart->u_id = $id;
        $cart->qty = $request->p_qty;
        $cart->save();

        $grandTotal = 0.0;
        $showCarts = DB::table('carts')->where('u_id','=',$id)->get();
        $product = new Product();
        foreach ($showCarts as $showCart){
            $qty = (float)$showCart->qty;
            $pID = (float)$showCart->p_id;
            $productPrice = DB::table('products')->where('id','=',$pID)->select('current_price')->first();
            if ($productPrice) {
                $price = (float) $productPrice->current_price;
                $subtotal = $price * $qty;
                $grandTotal += $subtotal;
            }

        }
        return redirect()->back()->with('grandTotal',$grandTotal);

    }

    public function catProduct(){

        $products = Product::all();
        $category = Category::all();
        return view('home.category_product',compact('products','category'));
    }

    public function filterCat($id){
        $category = Category::all();
        $products = DB::table('products')->where('cat_id','=',$id)->get();
        return view('home.category_product',compact('products','category'));
    }
    public function deleteCart($id){

        DB::table('carts')->where('id',$id)->delete();

        return redirect()->back();
    }

    public function pay_order($id){

        $carts = DB::table('carts')->where('u_id','=',$id)->get();
        $user = DB::table('users')->where('id','=',$id)->first();
        return view('home.order',compact('carts','user'));
    }
    public function place_order(Request $request){
        $request->validate([
            'first_name'=>'required',
            'address'=>'required',
            'city'=>'required',
            'district'=>'required',
            'zip' =>'required|numeric',
            'phone' => 'required',
            'email'=>'required',
        ]);
        $products = Product::all();

        $cart = new Order();

//        dd($request->allID);
        $requestID = explode("|",$request->allID);
        $requestQty = explode("|",$request->resultQty);
        $errorProduct = 0;

        for ($i=0;$i<count($requestID);$i++){
            $product = DB::table('products')->where('id',$requestID[$i])->first();

            $currentQty = $product->quantity;

            if($currentQty <= $requestQty[$i]) {
                $errorProduct = DB::table('products')->where('id', $requestID[$i])->first();
                $errorDetail = "Exceed quantity We have " . $errorProduct->title . " " . $errorProduct->size . " Only " . $errorProduct->quantity;
                return redirect()->back()->with('error', $errorDetail);
            }

//            DB::table('products')
//                ->where('id',$requestID[$i])
//                ->update(['quantity'=> $subQty]);
////            dd($requestQty[0]);
////            dd($requestID[0]);
        }
        for ($i = 0; $i < count($requestID); $i++) {
            $product = DB::table('products')->where('id', $requestID[$i])->first();
            $currentQty = $product->quantity;
            $subQty = $currentQty - $requestQty[$i];

            // Update the database
            DB::table('products')->where('id', $requestID[$i])->update(['quantity' => $subQty]);
        }

        $cart->customer_id = $request->userid;
        $cart->total_price = $request->grandTotal;
        $cart->street = $request->address;
        $cart->city = $request->city;
        $cart->zipcode = $request->zip;
        $cart->email = $request->email;
        $cart->phone1= $request->phone;
        $cart->firstname = $request->first_name;
        $cart->lastname = "null";
        $cart->pro_id = $request->resultPrice;
        $cart->qty = $request->resultQty;
        $cart->pro_name = $request->resultProduct;

        $cart->save();

        DB::table('carts')->where('u_id','=',$request->userid)->delete();

        $success = 1;
        return redirect()->route('home.userpage')->with(['products' => $products, 'success' => 'Order placed successfully']);
    }
    public function contact(){

        return view('home.contact');
    }

    public function buyCart(){

        return view();
    }

    public function about(){
        return view('home.about');
    }

}


