<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\SubCategory;


class ProductController extends Controller
{

    public function index()
    {

        $products = Product::all();
        return view('admin/product/index', compact('products'));
    }


    public function subcategory_get(Request $request)
    {
        $subcategory = SubCategory::where('category_id',$request->id)->get();

        return $subcategory;
    }



    public function add()
    {
        $category = Category::all();

        return view('admin/product/add', compact('category'));
    }

    public function add_submit(request $request)
    {

        $product = new product();
        $product->name = $request->name;
        $product->price = $request->price;

        $filename = '';
        if ($request->hasfile('image')) {
            $filename = uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('/asset/img/'), $filename);
        }
        $product->image = $filename;
        $product->save();

        return Redirect()->route('product.index');
    }

    public function delete($id)
    {
        $product = product::find($id);
        $product->delete();
        return redirect()->route('product.index');
    }




    public function edit($id)
    {
        $product = product::find($id);
        $subcategory = subcategory::all();
        return view('/admin/product/edit', compact('product', 'subcategory'));
    }



    public function edit_submit(Request $request, $id)
    {
        $product = product::find($id);
        $product->name = $request->name;

        $product = SubCategory::find($id);

        $product->subcategory_id = $request->subcategoryid;


        $filename = '';
        if ($request->hasfile('image')) {
            $filename = uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('/asset/img/'), $filename);
        }
        $product->image = $filename;
        $product->save();

        return Redirect()->route('product.index');
    }
}
