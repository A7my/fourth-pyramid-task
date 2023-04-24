<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    public function index(){
        return view('admin.adminUserIndex');
    }

    public function admin(){
        $admins = User::where('role' , 'admin')->get();
        return view('admin.adminIndex' , compact('admins'));
    }

    public function user(){
        $users = User::where('role' , 'user')->get();
        return view('admin.userIndex' , compact('users'));
    }

    public function create(){
        return view('admin.adminUserCreate');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ]);

        return redirect('admin/adminUser');
    }


    public function delete($id){
        $user = User::destroy($id);
        return redirect()->back();
    }

    public function changeRole(Request $request , $id){
        $request->validate([
            'role' => 'required'
        ]);

        $user = User::find($id);
        $user->role = $request->role;
        $user->save();

        return redirect()->back();
    }

    public function changeCategory($id){
        $categories = User::find($id)->category;
        $userId = User::find($id)->id;
        return view('admin.changeCategory' , compact('userId' , 'categories'));
    }

    public function deleteCategory(Request $request ,$id){

        $categoryId = $id;
        $userId = $request->userId;

        $category = Category::find($categoryId);
        $category->user()->detach($userId);

        return redirect('admin/adminUser/admin');
    }

    public function addCategory( $id){
        $user =  User::where('id' , $id)->first();
        $userCategoryIds = $user->category->pluck('id');
        $category = Category::whereNotIn('id', $userCategoryIds)->get();

        return view('admin.addCategory' , compact('category' , 'id'));
    }

    public function storeCategory(Request $request , $id){
        print_r($request->all());
        $arr = $request->all();
        unset($arr['_token']);
        unset($arr['_method']);


        foreach($arr as $k){


            DB::table('category_user')->insert(
                [
                    'user_id'     => $id,
                    'category_id'    => $k,
                ]
            );


        }

        return redirect('admin/adminUser/admin');;
    }
}
