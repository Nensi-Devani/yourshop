<?php

namespace App\Livewire\Frontend;

use App\Models\Cart as CartModel;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Cart extends Component
{
    use LivewireAlert;
    public $quantity, $totalPrice = 0, $deliveryCharges = 0;
    public function render()
    {
        $cartItems = auth()->user()->carts()->get();
        return view('livewire.frontend.cart',compact('cartItems'))->extends('layouts.app')->section('content');
    }
    public function removeFromCart($cartId)
    {
        $w = CartModel::findOrFail($cartId)->delete();
        // $this->dispatch('cart-updated');
    }
    public function decQty($cart_id)
    {
        $cart = CartModel::where('id',$cart_id)->first();
        if($cart->quantity > 1)
            $cart->decrement('quantity');
    }
    public function incQty($cart_id)
    {
        $productQty = 0;
        $cart = CartModel::where('id',$cart_id)->first();
        if($cart->product->selling_price > 0)
        {
            $productQty = $cart->product->quantity;
        }
        else
        {
            foreach ($cart->product->productSizes as $size) {
                if($size->size_id == $cart->size_id)
                $productQty = $size->quantity;
            }
        }
        if($cart->quantity < $productQty)
            $cart->increment('quantity');
        else
            $this->alert('warning', 'Product quantity is not appropriate !!!', [
                'position' => 'bottom-end',
                'timer' => '5000',
                'toast' => true,
                'text' => '',
            ]);
    }
}
