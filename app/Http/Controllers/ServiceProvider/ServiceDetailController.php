<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Models\User;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceDetailController extends Controller
{
    public function service($id){

        $service = Service::find($id);  // For Description
        $order = Order::where('service_id' , $id)->get(); // For Orders and Processings

        // foreach($order as $o){
        //     echo User::find($o->user_id)->name;
        // }

        // foreach($order as $t){
        //     echo $t->status;
        // }

        return view('service_provider.service' , compact('service' , 'order'));
    }
}
