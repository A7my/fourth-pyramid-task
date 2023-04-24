<?php

namespace App\Http\Controllers\JAdmin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JuniorAdminController extends Controller
{
    public function index(){
        $cats = Auth::user()->category;
        return view('jadmin.index' , compact('cats'));
    }

    public function edit($id){
        $userId = Auth::user()->id;
        $info = DB::table('category_user')->where('user_id' ,$userId)->where('category_id' , $id)->first();

        if(!isset($info)){
            abort(403);
        }else{
            $cat = Category::find($id);
            return view('jadmin.edit' , compact('cat'));
        }

    }
}
