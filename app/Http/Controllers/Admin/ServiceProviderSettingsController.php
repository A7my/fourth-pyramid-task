<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceProviderSettingsController extends Controller
{
    public function settings(){

        $s_p = User::where('type' , 's.p')->get();
        return view('admin.serviceProvider' , compact('s_p'));
    }

    public function delete($id){
        $s_p = User::destroy($id);
        return redirect()->back()->with('delete_s_p' , 'you have deleted A service provider account');
    }

    public function changeStatus(Request $request , $id){

        $request->validate([
            'status' => 'required'
        ]);

        $serviceProvider = User::find($id);
        $serviceProvider->account_status = $request->status;
        $serviceProvider->save();
        return redirect()->back();

    }
}
