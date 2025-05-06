<?php

namespace App\Livewire\Frontend;

use App\Models\Category;
use Livewire\Component;

class Jewellery extends Component
{
    public function render()
    {
        $category = Category::where('slug','jewellery')->first();
        $products = $category->products()->latest()->paginate(16);
        return view('livewire.frontend.jewellery',compact('products'))->extends('layouts.app')->section('content');
    }
}
