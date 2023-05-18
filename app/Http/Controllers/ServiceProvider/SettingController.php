<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function setting(){

        $info = Auth::user();
        // echo $info;
        return view('service_provider.setting' , compact('info'));
    }

    public function update(Request $request){

        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);

        echo $request->name;
        echo $request->email;
        echo $request->password;

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return  redirect()->back()->with('update_user' , 'You have updated your own information');

    }
}
