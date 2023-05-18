<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceUpdateController extends Controller
{
    public function update(Request $request , $id){

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|integer'
        ]);



        if(isset($request->image)){
            $imageName  = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('Image/'), $imageName);
            $service = Service::find($id);
            $service->image = $imageName;
            $service->save();
        }

        $service = Service::find($id);
        $service->title = $request->title;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->save();

        return  redirect()->back()->with('update' , 'You have updated your service information');
    }

}
