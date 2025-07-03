<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        // Logic to retrieve and display order details
        // This is a placeholder; implement your logic here
        return view('User.orders.order-detail'); // Adjust the view path as necessary
    }
}
