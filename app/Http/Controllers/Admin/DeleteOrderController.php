<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteOrderController extends Controller
{
    public function delete($id){
        $order = Order::destroy($id);
        return redirect()->back()->with('order_delete' ,'You have deleted an order' );
    }
}
