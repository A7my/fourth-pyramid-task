<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApiGetOrderController extends Controller
{

    public function getOrders(){
        $id = Auth::user()->id;
        $orders = Order::where('user_id' , $id)->get();
        return response()->json([
            'status' => 1,
            'data' => $orders
        ]);

    }
}
