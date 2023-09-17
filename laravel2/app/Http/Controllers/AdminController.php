<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
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
    public function delete_category(Request $request){
//        Category::destroy($request->confirm_id);
        $id = $request->confirm_id;
        Category::destroy($id);
        return redirect()->back()->with('deleteMessage','Category Deleted Successfully');

    }
    public function view_product(){
         return view('admin.product');
    }
    public function add_product(Request $request){
        $request->validate([
//            'cat_id'=>'required',
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
        $data->cat_id = $request->category;
        $data->p_qty = $request->quantity;
        $data->p_current_price = $request->price;

        $data->save();

        return redirect()->back()->with('message','Category Added Successfully');
    }
    public function showCat(){
        $category = Category::all();
        return view('admin.product',compact('category'));
    }
}
