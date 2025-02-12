<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Hash;

class SubcategoryController extends Controller
{


    public function index()
    {

        $subcategory = SubCategory::all();

        return view('admin/subcategory/index', compact('subcategory'));
    }





    public  function add()
    {
        $category = Category::select('title', 'id')->get();
        return view('admin/subcategory/add', compact('category'));
    }


    public function add_submit(request $request)
    {

        $subcategory = new SubCategory();
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->categoryid;

        $filename = ' ';
        if ($request->hasfile('image')) {
            $filename = uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('/asset/image/'), $filename);
        }
        $subcategory->image = $filename;
        $subcategory->save();

        return redirect()->route('subcategory.index');
    }

    public function delete($id)
    {
        $subcategory = subcategory::find($id);
        $subcategory->delete();
        return redirect()->route('subcategory.index');
    }

    public function edit($id)
    {
        $subcategory = subcategory::find($id);
        $category = category::select('title', 'id')->get();
        return view('admin/subcategory/edit', compact('subcategory', 'category'));
    }

    public function edit_submit(Request $request, $id)
    {

        $subcategory = SubCategory::find($id);
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->categoryid;
        if ($request->hasfile('image')) {

            $filename = uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('/asset/image'), $filename);
            $subcategory->image = $filename;

        }
        $subcategory->save();
        return redirect()->route('subcategory.index');
    }
}
