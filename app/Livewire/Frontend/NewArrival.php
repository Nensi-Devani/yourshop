<?php

namespace App\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;

class NewArrival extends Component
{
    public function render()
    {
        $products = Product::latest()->paginate(16);
        return view('livewire.frontend.new-arrival',compact('products'))->extends('layouts.app')->section('content');
    }
}
