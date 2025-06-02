<?php

namespace App\Livewire;

use App\Models\Cart as CartModel;
use App\Services\RajaOngkirService;
use Livewire\Component;

class CheckOut extends Component
{
    public $selectedProductIds;
    public $cartProduct;
    public $address;

    public function mount($cartIds)
    {
        $this->address = "49630";
        $this->selectedProductIds = $cartIds;
        $this->refreshCart();
    }

    public function refreshCart()
    {
        $this->cartProduct = CartModel::whereIn('id',$this->selectedProductIds)->get();
    }

    public function increment($id)
    {
        $cart = CartModel::findOrFail($id);
        if($cart->product_variant->stock != $cart->amount){
            $cart->amount++;
            $cart->save();
            $this->refreshCart();
        }
    }

    public function decrement($id)
    {
        $cart = CartModel::findOrFail($id);
        if ($cart->amount > 1) {
            $cart->amount--;
            $cart->save();
            $this->refreshCart();
        }
    }

    public function delete($id)
    {
        $product = CartModel::findOrFail($id);
        $product->delete();

        $this->selectedProductIds = array_values(array_diff($this->selectedProductIds, [$id]));

        $this->refreshCart();
    }

    public function getSubTotalPriceProperty()
    {
        return 
            CartModel::whereIn('id', $this->selectedProductIds)
                ->get()
                ->sum(function ($item) {
                    return $item->product_variant->price * $item->amount;
                });
    }

    public function calculateWeight(){
        $totalWeight = 0;
        foreach($this->cartProduct as $cart){
            $totalWeight += $cart->product_variant->product->weight * $cart->amount;
        }
        
        return $totalWeight * 100;
    }

    public function getShippingCostProperty(){
        $rajaOngkir = new RajaOngkirService();
        return $rajaOngkir->calculateCost($this->address, $this->calculateWeight());
    }

    public function checkout()
    {
       return redirect()->route('checkout.payment', [
            'cartIds' => $this->selectedProductIds,
            'email' => 'elvinsonwijaya14@gmail.com',
            'name' => 'Elvinson Wijaya'
        ]);
    }   

    public function render()
    {
        return view('livewire.check-out');
    }
}
