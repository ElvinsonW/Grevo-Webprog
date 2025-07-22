<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function show($order_id)
    {
        $user = Auth::user();
        $order = Order::with(['items.variant.product', 'statusHistories' => fn($q) => $q->orderBy('changed_at', 'desc')])
            ->where('order_id', $order_id)
            ->where('user_id', $user->id)
            ->firstOrFail();

        return view('User.orders.order-detail', compact('user', 'order')); 
    }

    public function cancelOrder(Order $order){
        if($order->latestStatus->status == "ORDER PLACED"){
            $order->statusHistories()->create([
                "status" => "CANCELLED",
                "created_at" => Carbon::now()
            ]);

            return redirect('/profile/orders')->with('cancelSuccess', 'Pesanan berhasil dibatalkan!');
        } else {
            return redirect('/profile/orders')->with('cancelFailed', 'Pesanan tidak bisa dibatalkan!');
        }
    }

    public function receiveOrder(Order $order){
        $order->statusHistories()->create([
            "status" => "ORDER RECEIVED",
            "created_at" => Carbon::now()
        ]);
        return redirect('/profile/orders')->with('recievedSuccess', 'Pesanan mu telah diterima!');
    }
}
