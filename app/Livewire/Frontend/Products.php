<?php

namespace App\Livewire\Frontend;

use App\Models\Category;
use App\Models\Product;
use App\Models\WishList;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Products extends Component
{
    use WithPagination;
    public $categorySlug, $wishlist = [];
    // #[Url]
    #[Url(as: 'brands')]
    public $selected_brands = [];
    #[Url(as: 'categories')]
    public $selected_category = [];
    // #[Url(as: 'in-stock')]
    // public $product_stock = false;

    #[Url(as: 'price-max')]
    public $minPrice=5000;
    public function mount($categorySlug)
    {
        $this->categorySlug = $categorySlug;
    }
    public function render()
    {
        $category = Category::where('slug',$this->categorySlug)->first();
        $products = $category->products()->where('status','1')->where('parent_id',null);
        if($this->selected_brands)
        {
            $products->whereIn('brand_id',$this->selected_brands);
        }
        if($this->selected_category)
        {
            $products->whereIn('sub_category_id',$this->selected_category);
        }
        if($this->minPrice)
        {
            $products->where('selling_price','<=',$this->minPrice);
        }
        return view('livewire.frontend.products',[
            'category' => $category,
            'products' => $products->latest()->paginate(16)
        ])->extends('layouts.app')->section('content');
    }

    // public function addToWishList($product_id)
    // {
    //     if(Auth::check()) // check for log in
    //     {
    //         if(WishList::where('user_id',auth()->user()->id)->where('product_id',$product_id)->exists()) { //remove from wishlist
    //             WishList::where('user_id',auth()->user()->id)->where('product_id',$product_id)->delete();
    //             $this->isProductAddedInWishlist = false;
    //         }
    //         else{ //add to wishlist
    //             WishList::create([
    //                 'user_id' => auth()->user()->id,
    //                 'product_id' => $product_id
    //             ]);
    //             $this->isProductAddedInWishlist = true;
    //         }
    //     }
    //     else
    //         return Redirect::to('/login');
    // }
    public function addToWishList($productId)
    {
        if (!in_array($productId, $this->wishlist)) {
            $this->wishlist[] = $productId;
        }
    }
    public function removeFromWishlist($productId)
    {
        $this->wishlist = array_diff($this->wishlist, [$productId]);
    }
}
