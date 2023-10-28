<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\subcategories;
use Illuminate\Http\Request;
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
}
