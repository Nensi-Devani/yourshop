<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Category;

class Categories extends Component
{
    public function render()
    {
        $categories = Category::where('status','1')->get();
        return view('livewire.frontend.categories',compact('categories'))->extends('layouts.app');
    }
}
