<?php

namespace App\Livewire\Frontend\Inc;

use App\Models\WishList;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class Navbar extends Component
{
    public $total_wishlist=0, $total_carts=0, $search;

    #[On('wishlist-updated')]
    public function updateWishlistCount()
    {
        $this->total_wishlist = WishList::where('user_id',auth()->user()->id)->count();
    }
    #[On('cart-updated')]
    public function updateCartCount()
    {
        $this->total_carts = Cart::where('user_id',auth()->user()->id)->count();
    }
    public function render()
    {
        if(Auth::check())
        {
            $this->total_wishlist = WishList::where('user_id',auth()->user()->id)->count();
            $this->total_carts = Cart::where('user_id',auth()->user()->id)->count();
        }
        return view('livewire.frontend.inc.navbar');
    }
}
