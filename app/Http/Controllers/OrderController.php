<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Order;
use App\Models\User;

class OrderController extends Controller
{
    public function show($order_id)
    {
        $user = Auth::user();
        $order = Order::with(['items', 'statusHistories' => fn($q) => $q->orderBy('changed_at', 'desc')])
            ->where('order_id', $order_id)
            ->where('user_id', $user->id)
            ->firstOrFail();
        // Logic to retrieve and display order details
        // This is a placeholder; implement your logic here
        return view('User.orders.order-detail', compact('user', 'order')); // Adjust the view path as necessary
    }
}
