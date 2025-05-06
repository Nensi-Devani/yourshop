<?php

namespace App\Livewire\Frontend;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class HomeApplience extends Component
{
    public function render()
    {
        $category = Category::where('slug','home-furniture')->first();
        $products = $category->products()->latest()->paginate(16);
        return view('livewire.frontend.home-applience',compact('products'))->extends('layouts.app')->section('content');
    }
}
