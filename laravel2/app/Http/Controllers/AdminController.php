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
            'Top_Level_Category'=>'required|unique:subcategories|max:255',
            'sub_category_name'=>'required|unique:subcategories|max:255',
        ]);

        $id = DB::table('categories')->where('id','=',$request->Top_Level_Category)->get();
        foreach ($id as $row){
            $name =$row->category_name;
        }
        $data = new subcategories();
        $data->top_category_id = $request->Top_Level_Category;
        $data->top_category_name = $name;
        $data->subcategory_name = $request->sub_category_name;
        $data->save();

        return redirect()->back()->with('message','Category Added Successfully');
    }
    public function delete_category(Request $request){
//        Category::destroy($request->confirm_id);
        $id = $request->confirm_id;
        Category::destroy($id);
        return redirect()->back()->with('deleteMessage','Category Deleted Successfully');

    }
    public function view_product(){
         return view('admin.product');
    }
    public function show_product(){
        return view('admin.showProduct');
    }
    public function add_product(Request $request){
        $request->validate([
            'Top_Level_Category'=>'required',
            'p_name'=>'required',
            'p_old_price'=>'required',
            'p_current_price'=>'required',
            'p_qty' =>'required|min:0',
//            'size[]' => 'required',
//            'color[]'=>'required',
            'p_featured_photo',
            'p_is_active'=>'required',
        ]);

        $data = new Product();
        $data->title = $request->p_name;
        $data->description = $request->p_description;
        $data->cat_id = $request->Top_Level_Category;
        $data->quantity = $request->p_qty;
        $data->price = $request->p_current_price;
        $image = $request->featured_photo;

        $imagename = time().'.'.$image->getClientOriginalExtension();
//        Store the image in product folder
        $image->move('product',$imagename);

        $data->image = $imagename;

        $data->save();

        return redirect()->back()->with('message','Category Added Successfully');
    }
    public function showCat(){
        $category = Category::all();
        $size = DB::select('select * from tbl_size');
        return view('admin.product',compact('category','size'));
    }
}
