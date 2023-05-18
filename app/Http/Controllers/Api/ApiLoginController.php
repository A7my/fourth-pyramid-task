<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ApiLoginController extends Controller
{
    public function login(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $customer = User::where('email' , $request->email);
        if($customer->exists()){

            $customer = User::where('email' , $request->email)->first();

            if(Hash::check($request->password , $customer->password)){
                $token = $customer->createToken("auth_token")->plainTextToken;
                return response()->json([
                    "status" => "you're logged in ",
                    "token" => $token,
                ]);
            }else{
                echo "the password is Invalid";
            }
        }else{
            echo "There's No A Just Inserted Email";
        }
    }
}
