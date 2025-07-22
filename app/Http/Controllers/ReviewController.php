<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Review;
use App\Models\ReviewImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function show(string $slug)
    {
        $product = Product::where("slug", $slug)->firstOrFail();
        $reviews = Review::where("product_id", $product->id)->get();
        $totalReview = $reviews->count();
                
        if ($totalReview > 1000){
            $totalReview = (string)round($totalReview / 1000, 1) . 'k';
        }
        return view('User.review.index-review', [
            'reviews' => $reviews,
            'totalReview' => $totalReview,
            'avgRate' => round($reviews->avg('rate'),1)
        ]);
    }
}

