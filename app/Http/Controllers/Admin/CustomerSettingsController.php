<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerSettingsController extends Controller
{
    public function customersSetting(){
        $customers = User::where('type' , 'customer')->get();
        return view('admin.customers' , compact('customers'));
    }

    public function delete($id){
        $order = User::destroy($id);
        return redirect()->back()->with('customer_delete' ,'You have deleted a customer account' );
    }
}
