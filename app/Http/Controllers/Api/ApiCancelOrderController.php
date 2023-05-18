<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApiCancelOrderController extends Controller
{
    public function cancelOrder(Request $request){
        $auth = Auth::user()->id;

        $request->validate([
            'id' => 'required',
        ]);

        $order = Order::where('id' , $request->id)->first();
        if($order == NULL){
            return response()->json('There is no order with this ID');
        }else{
            $orderOwner = $order->user_id;
            if($auth != $orderOwner){
                return response()->json('you have not permission for this order');
            }else if( $auth == $orderOwner){
                $orderDelete = Order::destroy($request->id);
                return response()->json('you have deleted an order');
            }
        }





    }
}
