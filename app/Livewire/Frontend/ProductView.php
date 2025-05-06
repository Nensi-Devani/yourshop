<?php

namespace App\Livewire\Frontend;

use App\Livewire\Frontend\Inc\Navbar;
use App\Models\Product;
use App\Models\Cart;
use App\Models\WishList;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ProductView extends Component
{
    use LivewireAlert;
    public $categorySlug, $productSlug, $product, $quantity=1;

    public $index=0, $isProductAddedInWishlist = false; // global access- general purpose variable
    public function mount($categorySlug,$productSlug)
    {
        $this->categorySlug = $categorySlug;
        $this->productSlug = $productSlug;

        $this->product = Product::where('slug',$this->productSlug)->first(); // to use product globally
        if(Auth::check())
        {
            if(WishList::where('user_id',auth()->user()->id)->where('product_id',$this->product->id)->exists()) //to display if product added in wishlist (red heart)
                $this->isProductAddedInWishlist = true;
            else
                $this->isProductAddedInWishlist = false; // (simple border heart symbol)
        }
    }
    public function render()
    {
        $description = $this->product->description;
        $descriptionItems = Str::of($description)->explode('.');
        return view('livewire.frontend.product_view',['product'=>$this->product,'descriptionItems'=>$descriptionItems])->extends('layouts.app')->section('content');
    }

    public function WishList($product_id)
    {
        if(Auth::check()) // check for log in
        {
            if(WishList::where('user_id',auth()->user()->id)->where('product_id',$product_id)->exists()) { //remove from wishlist
                WishList::where('user_id',auth()->user()->id)->where('product_id',$product_id)->delete();
                $this->isProductAddedInWishlist = false;
                $this->alert('success', 'Product Removed from your Wishlist', [
                    'position' => 'bottom-end',
                    'timer' => '5000',
                    'toast' => true,
                    'text' => '',
                   ]);
            }
            else{ //add to wishlist
                WishList::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $product_id
                ]);
                $this->isProductAddedInWishlist = true;
                // alert msg
                $this->alert('success', 'Product Saved to your Wishlist', [
                    'position' => 'bottom-end',
                    'timer' => '5000',
                    'toast' => true,
                    'text' => '',
                ]);
            }
            // $this->dispatch('wishlist-updated');
        }
        else
            return Redirect::to('/login');
    }

    public function updateIndex($index)
    {
        $this->index = $index;
    }
    public function decQty()
    {
        if($this->quantity > 1)
            $this->quantity --;
    }
    public function incQty($qty)
    {
        if($this->quantity < $qty)
        $this->quantity ++;
    }
    public function addToCart()
    {
        if(Auth::check())
        {
            if($this->quantity <= $this->product->quantity){ //single size product
                if(Cart::where('user_id',auth()->user()->id)->where('product_id',$this->product->id)->exists()){
                    $this->alert('warning', 'Product already added to your cart !!!', [
                        'position' => 'bottom-end',
                        'timer' => '5000',
                        'toast' => true,
                        'text' => '',
                    ]);
                }
                else{
                    // insert product to the cart
                    Cart::create([
                        'user_id' => auth()->user()->id,
                        'product_id' => $this->product->id,
                        'quantity' => $this->quantity
                    ]);
                    $this->alert('success', 'Product Added to your Cart', [
                        'position' => 'bottom-end',
                        'timer' => '5000',
                        'toast' => true,
                        'text' => '',
                    ]);
                    // $this->dispatch('cart-updated');
                }
            }
            elseif ($this->product->quantity==0 || $this->product->quantity==null){ //multi size product
                if(Cart::where('user_id',auth()->user()->id)->where('product_id',$this->product->id)->where('size_id',$this->product->productSizes[$this->index]->size_id)->exists()){
                    $this->alert('warning', 'Product already added to your cart !!!', [
                        'position' => 'bottom-end',
                        'timer' => '5000',
                        'toast' => true,
                        'text' => '',
                    ]);
                }
                else{
                    if($this->product->productSizes[$this->index]->quantity > 0){
                        Cart::create([
                            'user_id' => auth()->user()->id,
                            'product_id' => $this->product->id,
                            'size_id' => $this->product->productSizes[$this->index]->size_id,
                            'quantity' => $this->quantity
                        ]);
                        // $this->dispatch('cart-updated');
                        $this->alert('success', 'Product Added to your Cart', [
                            'position' => 'bottom-end',
                            'timer' => '5000',
                            'toast' => true,
                            'text' => '',
                        ]);
                    }
                    else{
                        $this->alert('warning', 'Product quantity is not appropriate !!!', [
                            'position' => 'bottom-end',
                            'timer' => '5000',
                            'toast' => true,
                            'text' => '',
                        ]);
                    }
                }
            }
            else{
                $this->alert('warning', 'Product quantity is not appropriate !!!', [
                    'position' => 'bottom-end',
                    'timer' => '5000',
                    'toast' => true,
                    'text' => '',
                ]);
            }
        }
        else
            return Redirect::to('/login');
    }
}
