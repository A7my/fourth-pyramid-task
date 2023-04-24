<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bought;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Notifications\newBought;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class BoughtController extends Controller
{

    public function index()
    {
        // $admin = User::where('role' , 's.admin')->first();
        // انت اشتريت منتج والمنتج له اي دي , اجيب عن طريقه الاي دي بتاع الكاتيجوري

        // $admins = Category::find(7)->user->where('id' ,  '!=' , 7);
        $admins = Product::find(8)->category->id;


        echo  $admins;
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $newBuy = new Bought;
        $newBuy->user_id = Auth::user()->id;
        $newBuy->product_id = $request->product;
        $newBuy->save();

        $categoryId = Product::find($request->product)->category->id;

        $admin = User::where('role' , 's.admin')->first();
        $admins = Category::find($categoryId)->user->where('id' ,  '!=' , Auth::user()->id);

        $buyerName = Auth::user()->name;
        $productName = Product::find($request->product)->name;
        $productPrice = Product::find($request->product)->price;

        if(Auth::user()->role == 's.admin'){
            Notification::send($admins , new newBought($buyerName ,$productName, $productPrice));
        }else{
            Notification::send($admin  , new newBought($buyerName ,$productName, $productPrice));
            Notification::send($admins , new newBought($buyerName ,$productName, $productPrice));
        }



        return redirect()->back()->with('success' , 'You have bought the item succssfully');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
