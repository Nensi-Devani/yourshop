<?php

namespace App\Livewire\Frontend;

use App\Models\Category;
use Livewire\Component;

class PhotosIdol extends Component
{
    public function render()
    {
        $category = Category::where('slug','photos-idols')->first();
        $products = $category->products()->latest()->paginate(16);
        return view('livewire.frontend.photos-idol',compact('products'))->extends('layouts.app')->section('content');
    }
}
