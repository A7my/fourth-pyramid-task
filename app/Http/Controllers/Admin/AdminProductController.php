<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('product.index' , compact('products'));
    }

    public function edit($id){
        $product = Product::find($id);
        return view('product.edit' , compact('product'));
    }

    public function update(Request $request , $id){

        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required',
        ]);


        $product = Product::find($id);
        $product->name = $request->product_name;
        $product->price = $request->product_price;
        $product->save();
        return redirect()->back();
    }

    public function delete($id){

        Product::destroy($id);
        return redirect()->back();
    }


    public function create(){
        $category = Category::get();
        return view('product.create' , compact('category'));
    }

    public function store(Request $request){
        $request->validate([
            'price' => 'integer|required',
            'name' => 'required',
            'cat' => 'required',
        ]);

        $pr = new Product;
        $pr->name = $request->name;
        $pr->price = $request->price;
        $pr->category_id = $request->cat;
        $pr->save();

        return redirect()->back();
    }
}
