<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Services\RajaOngkirService;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        try {
            $customer = Customer::create([
                'email' => $request->user()->email ?? $request->email, 
                'name' => $request->user()->name ?? $request->name
            ]);

            
            $lineItems = [];
            $cartIds = $request->get('cartIds');
            $carts = Cart::whereIn('id', $cartIds)->get();
            
            foreach($carts as $cart){
                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'idr',
                        'product_data' => [
                            'name' => $cart->product_variant->product->name,
                            
                        ],
                        'unit_amount' => $cart->product_variant->price * 100,
                    ],
                    'quantity' => $cart->amount
                ];
            }

            $shippingFee = $request->get('shippingFee');
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'idr',
                    'product_data' => [
                        'name' => 'Shipping Fee',
                    ],
                    'unit_amount' => $shippingFee * 100,
                ],
                'quantity' => 1];

            $session = Session::create([
                'customer' => $customer->id,
                'payment_method_types' => ['card'],
                'line_items' => [$lineItems],
                'mode' => 'payment',
                'success_url' => route('checkout.success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
                'cancel_url' => route('checkout.cancel', [], true),
            ]);

            return redirect($session->url);

        } catch (ApiErrorException $e) {
            return back()->with('error', 'Payment processing error. Please try again.');
        }
    }

    public function success(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        try {
            $session = Session::retrieve($request->get('session_id'));

            return view('homepage');

        } catch (ApiErrorException $e) {
            return redirect()->route('checkout.cancel')->with('error', 'Unable to verify payment.');
        }
    }

    public function cancel(Request $request)
    {
        return view('checkout.cancel');
    }

    public function calculateShippingCost(Request $request){
        $origin = $request->input('origin');
        $weight = $request->input('weight');

        $rajaOngkirService = new RajaOngkirService();

        $result = $rajaOngkirService->calculateCost($origin, $weight);

        return response()->json($result);
    }
}
