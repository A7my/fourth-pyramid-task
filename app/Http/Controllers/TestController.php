<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\type1;
use App\Models\type2;
use App\Models\type3;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function index()
    {
        $typeOneUsers = type1::where('user_type' , 'type1')->get();
        $typeTwoUsers = type2::where('user_type' , 'type2')->get();
        $typeThreeUsers = type3::where('user_type' , 'type3')->get();
        return view('test.index' , compact('typeOneUsers' , 'typeTwoUsers' , 'typeThreeUsers'));
    }


    public function create()
    {
        $user = type1::find(2);
        echo $user;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        echo $request->certification_image;

        $new = new type2;
        $new->name = $request->name;
        $new->email = $request->email;
        $new->bio = $request->bio;
        $new->certification_title = $request->certification_title;
        $new->certification_image = $request->certification_image;
        $new->map_location = $request->map_location;
        $new->birth_date = $request->birth_date;
        $new->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
