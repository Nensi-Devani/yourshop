<?php

namespace App\Livewire\Frontend;

use App\Models\Cart;
use \App\Models\WishList as WishlistModel;
use Livewire\Component;

class Wishlist extends Component
{
    public $wishlistId;
    public function render()
    {
        $wishlistItems = auth()->user()->wishlists()->get();
        return view('livewire.frontend.wishlist',compact('wishlistItems'))->extends('layouts.app')->section('content');
    }

    public function removeFromWishlist($wishlistId)
    {
        $w = WishlistModel::find($wishlistId)->delete();
        // $this->dispatch('wishlist-updated');
    }
}
