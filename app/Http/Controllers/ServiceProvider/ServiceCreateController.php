<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ServiceCreateController extends Controller
{
    public function create(){
        return view('service_provider.create');
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'image' => 'required'
        ]);

        if(isset($request->image)){
            $imageName  = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('Image/'), $imageName);

            $service = new Service;
            $service->title = $request->title;
            $service->description = $request->description;
            $service->price = $request->price;
            $service->image = $imageName;
            $service->user_id = Auth::user()->id;
            $service->save();

            return  redirect()->back()->with('create' , 'You have created a new service ');

        }
    }
}
