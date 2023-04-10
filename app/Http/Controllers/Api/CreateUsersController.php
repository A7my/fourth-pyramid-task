<?php

namespace App\Http\Controllers\Api;

use App\Models\type1;
use App\Models\type2;
use App\Models\type3;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateUsersController extends Controller
{
    public function index(){
        return response()->json('Welcome');
    }

    public function storeData(Request $request){


        // Check The Type of the User
        $request->validate([
            'user_type' => 'required',
        ]);


        // Record if the type of use is type1
        if($request->user_type == 'type1'){
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users',
                'bio' => 'required'
            ]);

            $newRecord = new type1;
            $newRecord->name = $request->name;
            $newRecord->email = $request->email;
            $newRecord->bio = $request->bio;
            $newRecord->user_type = 'type1';
            $newRecord->save();
            return response()->json('You Created Type 1 User Successfully');


        // Record if the type of use is type2
        }else if($request->user_type == 'type2'){

            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users',
                'bio' => 'required',
                'certification_title' => 'required',
                'certification_image' => 'required'
            ]);

            // Get Image name and store it on server
            $imageName  = $request->file('certification_image')->getClientOriginalName();
            $imageStore = $request->file('certification_image')->storeAs('img', $imageName , 'img');


            $newRecord = new type2;
            $newRecord->certification_image = $imageName;
            $newRecord->name = $request->name;
            $newRecord->email = $request->email;
            $newRecord->bio = $request->bio;
            $newRecord->user_type = 'type2';
            $newRecord->certification_title = $request->certification_title;
            $newRecord->save();
            return response()->json('You Created Type 2 User Successfully');


        // Record if the type of use is type3
        }else if ($request->user_type == 'type3'){
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users',
                'bio' => 'required',
                'map_location' => 'required',
                'birth_date' => 'required',
            ]);

            $newRecord = new type3;
            $newRecord->name = $request->name;
            $newRecord->email = $request->email;
            $newRecord->bio = $request->bio;
            $newRecord->user_type = 'type3';
            $newRecord->map_location = $request->map_location;
            $newRecord->birth_date = $request->birth_date;
            $newRecord->save();
            return response()->json('You Created Type 3 User Successfully');


        }else{
            return response()->json('Please, Enter The Correct User Type');
        }

    }
}
