<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ApiRegisterController extends Controller
{
    public function register(Request $request){

            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed',
            ]);

            $customer = new User;
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->password = Hash::make($request->password);
            $customer->type = 'customer';
            $customer->save();

            return response()->json('you have registered');
    }

    public function test(){
        return response()->json('you have registered');

    }
}
