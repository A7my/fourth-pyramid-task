<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApiCreateOrderController extends Controller
{
    public function createOrder(Request $request){
        $auth = Auth::user()->id;

        $request->validate([
            'service_id' => 'required',
        ]);

        $order = new Order;
        $order->user_id = $auth;
        $order->service_id = $request->service_id;
        $order->save();

        return response()->json([
            'status' => 1,
            'message' => 'you have made an order',
            'data' => $order
        ]);
    }
}
