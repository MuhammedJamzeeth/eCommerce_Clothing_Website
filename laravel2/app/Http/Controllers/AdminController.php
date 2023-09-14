<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
    public function delete_category($id){
        Category::destroy($id);

        return redirect()->back()->with('deleteMessage','Category Deleted Successfully');

    }
    public function view_product(){
         return view('admin.product');
    }
}
