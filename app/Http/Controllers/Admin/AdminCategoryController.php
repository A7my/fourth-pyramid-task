<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('admin.index' , compact('category'));
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin.edit' , compact('category'));
    }

    public function update(Request $request , $id){

        $request->validate([
            'category_name' => 'required',
        ]);

        $category = Category::findorfail($id);
        $category->name = $request->category_name;
        $category->save();
        return  redirect()->back()->with('success' , 'You Updated the categeory');

    }

    public function delete($id){
        $category = Category::destroy($id);
        return redirect('admin/category')->with('delete' , 'you deleted the category');
    }

    public function create(){
        return view('admin.create');
    }
    public function store(Request $request){
        $request->validate([
            'category_name' => 'required',
        ]);

        $category = new Category;
        $category->name = $request->category_name;
        $category->save();

        return redirect('admin/category')->with('create' , 'You created a new category');
    }
}
