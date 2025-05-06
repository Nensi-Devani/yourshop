<?php

namespace App\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;
use App\Models\Slider;
use App\Models\Category;

class Index extends Component
{
    public function render()
    {
        $sliders = Slider::where('status','1')->get();
        $categories = Category::where('status','1')->get();
        $trending = Product::where('trending','1')->latest()->get();
        $newArrival = Product::latest()->limit(15)->get();
        $featured = Product::where('featured','1')->latest()->limit(15)->get();
        return view('livewire.frontend.index',compact('sliders','categories','trending','newArrival','featured'))->extends('layouts.app')->section('content');
    }

}
