<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Flat;


class CategoryConroller extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $flats =  Flat::all();
        return view('admin/category/index', compact('categories', 'flats'));
    }

    public function add()
    {
        return view('admin/category/add');
    }


    public function add_submit(request $request)
    {
        $request->validate([
            'name'=>'required',
        ],[
            'name.required'=>' name is required',
        ]);

        $category = new Category();
        $category->title = $request->name;
        $category->save();

        return Redirect()->route('category.index');
    }


    public function delete($id){
        $category=Category::find($id);
        $category->delete();
        return redirect()->route('category.index');
    }

    public function update($id){
        $category=category::find($id);
        return view('admin/category/edit', compact('category'));
    }

    public function update_submit(Request $request,$id){
        $category=Category::find($id);
        $category->title = $request->name;
        $category->save();

        return redirect()->route('category.index');

    }
}
