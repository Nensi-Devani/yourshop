<?php

namespace App\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;

class Featured extends Component
{
    public function render()
    {
        $products = Product::latest()->where('featured','1')->paginate(16);
        return view('livewire.frontend.featured',compact('products'))->extends('layouts.app')->section('content');
    }
}
