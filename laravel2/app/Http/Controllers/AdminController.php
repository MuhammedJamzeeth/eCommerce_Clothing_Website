<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductPhotos;
use App\Models\subcategories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function view_category(){
        $datas = Category::all();
        return view('admin.category',compact('datas'));
    }
    public function add_category(Request $request){
        $request->validate([
            'category_name'=>'required|unique:categories|max:255'
        ]);

        $data = new Category();
        $data->category_name = $request->category_name;
        $data->save();

        return redirect()->back()->with('message','Category Added Successfully');
    }
    public function view_subCategory(){
        $datas = subcategories::all();
        $topCat = Category::all();
        return view('admin.subcategory',compact('datas','topCat'));
    }
    public function add_subCategory(Request $request){
        $request->validate([
            'Top_Level_Category'=>'required|max:255',
            'subcategory_name'=>'required|max:255',
        ]);

        $id = DB::table('categories')->where('id','=',$request->Top_Level_Category)->get();
        foreach ($id as $row){
            $name =$row->category_name;
        }
        $data = new subcategories();
        $data->top_category_id = $request->Top_Level_Category;
        $data->top_category_name = $name;
        $data->subcategory_name = $request->subcategory_name;
        $data->save();

        return redirect()->back()->with('message','Category Added Successfully');
    }
    public function destroySubCat(Request $request){
        $id = $request->confirm_id;

        subcategories::destroy($id);
        return redirect()->back()->with('deleteMessage','Subcategory Deleted Successfully');
    }
    public function delete_category(Request $request){
//        Category::destroy($request->confirm_id);
        $id = $request->confirm_id;
        Category::destroy($id);
        return redirect()->back()->with('deleteMessage','Category Deleted Successfully');

    }
    public function delete_product($id){
//        Category::destroy($request->confirm_id);
        Product::destroy($id);
        return redirect()->back()->with('deleteMessage','Product Deleted Successfully');

    }
//    public function view_product(){
//
//        $subCategory = subcategories::all();
//         return view('admin.product',compact('subCategory'));
//    }
    public function show_product(){
        $products = Product::all();

        return view('admin.showProduct',compact('products'));
    }
    public function add_product(Request $request){
        $request->validate([
            'Top_Level_Category'=>'required',
            'end_level_category'=>'required',
            'product_name'=>'required',
            'old_price'=>'nullable|numeric',
            'current_price'=>'required|numeric',
            'quantity' =>'required|min:0',
            'size' => 'required',
            'color'=>'required',
            'featured_photo'=>'required',
            'is_active'=>'required',
        ]);


        $data = new Product();
        $data->cat_id = $request->Top_Level_Category;
        $data->end_cat = $request->end_level_category;
        $data->title = $request->product_name;
        $data->old_price = $request->old_price;
        $data->current_price = $request->current_price;
        $data->quantity = $request->quantity;
        $data->size = $request->size;
        $data->color = $request->color;
        $image = $request->featured_photo;
        $data->description = $request->p_description;
        $data->short_description = $request->short_description;
        $data->condition = $request->condition;
        $data->return_policy = $request->return_policy;
        $data->is_featured = $request->is_featured;
        $data->is_active = $request->is_active;

        $imagename = time().'.'.$image->getClientOriginalExtension();
//        Store the image in product folder
        $image->move('product',$imagename);

        $data->image = $imagename;

        $data->save();

        $productId = $data->id;

        $otherPhotos = $request->file('photo');

//        $otherPhotoName = time().'.'.$otherPhotos->getClientOriginalExtension();

//        dd($otherPhotos);

        $i=0;
        if($otherPhotos){
            foreach($otherPhotos as $otherPhoto){

                $productPhoto = new ProductPhotos();
                $originalFilename = $otherPhoto->getClientOriginalName();
                $extension = $otherPhoto->getClientOriginalExtension();
                $newFilename = md5($originalFilename . time()) . '.' . $extension; // Generate a unique filename
                $ip[$i] = $newFilename;
                $i++;
                $otherPhoto->move('product',$newFilename);
                $productPhoto->image = $newFilename;
                $productPhoto->product_id = $productId;
                $productPhoto->save();

            }
        }



        return redirect()->back()->with('message','Product Added Successfully');
    }
    public function activateOrDeactivate(Request $request, $id){
//        dd($request);
        DB::table('products')->where('id',$id)->update(['is_active'=>$request->action]);
        return redirect()->back();
    }
    public function showCat(){
        $category = Category::all();
        $color = DB::select('SELECT * from tbl_color');
        $subCategory = subcategories::all();
        $size = DB::select('select * from tbl_size');
        return view('admin.product',compact('category','size','subCategory','color'));
    }

    public function editProduct($id){
//        dd($id);
        $category = Category::all();
        $color = DB::select('SELECT * from tbl_color');
        $subCategory = subcategories::all();
        $size = DB::select('select * from tbl_size');
        return view('admin.editProduct',['product' => Product::where('id',$id)->first()],compact('category','size','subCategory','color'));
    }

    public function editP(Request $request,$id){

        $image = $request->featured_photo;
        if ($request->hasFile('featured_photo')) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move('product',$imagename);
        }else{
            $imagename = $request->photo;
        }



        DB::table('products')
            ->where('id',$id)
            ->update([
                'cat_id' => $request->Top_Level_Category,
                'end_cat' => $request->end_level_category,
                'title' => $request->product_name,
                'old_price' => $request->old_price,
                'current_price' => $request->current_price,
                'quantity' => $request->quantity,
                'size' => $request->size,
                'color' => $request->color,
                'description' => $request->p_description,
                'short_description' => $request->short_description,
                'condition' => $request->condition,
                'return_policy' => $request->return_policy,
                'is_featured' => $request->is_featured,
                'is_active' => $request->is_active,
                'image'=> $imagename,
            ]);
        $products = Product::all();

        return redirect('/show_product')->with('message','Product edited successfully');
//        return redirect()->back();
    }

    public function viewHome(){
        $currentDate = Carbon::now()->toDateString();

        $countProducts =DB::table('products')->whereNotNull('id')->count();
        $countNew = Product::whereDate('created_at', $currentDate)->count();

        $countUsers = DB::table('users')->whereNotNull('id')->count();
        $countUsers--;
        $countNewUsers = DB::table('users')->whereDate('created_at',$currentDate)->count();

        $countTCat = DB::table('categories')->whereNotNull('id')->count();
        $countNewTCat = DB::table('categories')->whereDate('created_at',$currentDate)->count();

        $countECat = DB::table('subcategories')->whereNotNull('id')->count();
        $countNewECat = DB::table('subcategories')->whereDate('created_at',$currentDate)->count();

        $pendingOrders = DB::table('orders')->where('shipping_status','=','Pending')->count();
        $pendingNewOrders = DB::table('orders')
            ->where('shipping_status','=','Pending')
            ->whereDate('created_at',$currentDate)
            ->count();
        ;
        $completeOrders = DB::table('orders')->where('shipping_status','=','Completed')->count();
        $completeNewOrders = DB::table('orders')
            ->where('shipping_status','=','Completed')
            ->whereDate('created_at',$currentDate)
            ->count();
        ;
        $completeOrdersFinal = DB::table('orders')->where('shipping_status','=','Completed')
            ->where('payment_status','=','PAID')
            ->count();
        $completeNewOrdersFinal = DB::table('orders')
            ->where('shipping_status','=','Completed')
            ->where('payment_status','=','PAID')
            ->whereDate('created_at',$currentDate)
            ->count();
        ;
        $pendingOrdersFinal = DB::table('orders')->where('shipping_status','=','Pending')
            ->orWhere('payment_status','=','NOT PAID')
            ->count();
        $pendingNewOrdersFinal = DB::table('orders')
            ->where('shipping_status','=','Pending')
            ->orWhere('payment_status','=','NOT PAID')
            ->whereDate('created_at',$currentDate)
            ->count();
        ;
        $totalOrders = DB::table('orders')
            ->count();
        $totalNewOrders = DB::table('orders')
            ->whereDate('created_at',$currentDate)
            ->count();
        ;
        return view('admin.home',compact('countProducts','countNew','countUsers','countNewUsers','countTCat','countNewTCat','countECat','countNewECat','pendingOrders','pendingNewOrders','completeOrders','completeNewOrders','completeOrdersFinal','completeNewOrdersFinal','pendingOrdersFinal','pendingNewOrdersFinal','totalOrders','totalNewOrders'));
    }

    public function showOrder(){

        $orders = Order::all();
        return view('admin.show_orders',compact('orders'));
    }

    public function paymentStatus($id, Request $request){

        DB::table('orders')->where('id',$id)
            ->update(['payment_status'=>$request->pStatus]);

        return redirect()->back();
    }
    public function shipStatus($id, Request $request){

        DB::table('orders')->where('id',$id)
            ->update(['shipping_status'=>$request->pStatus]);

        return redirect()->back();
    }
    public function orderDelete($id){

        DB::table('orders')->where('id',$id)->delete();
        return redirect()->back();
    }

    public function showUsers(){

        $users = DB::table('users')
            ->where('usertype','=','0')
            ->get();
        ;

        return view('admin.show_users',compact('users'));
    }
    public function userDelete($id){

        DB::table('users')->where('id',$id)->delete();
        return redirect()->back();
    }

}
