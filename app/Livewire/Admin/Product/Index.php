<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Product;

class Index extends Component
{
    public $modal = 0, $product_id, $availableTxt = null;
    public function render()
    {
        $products = Product::latest()->paginate('5');
        return view('livewire.admin.product.index',compact('products'))->extends('layouts.admin')->section('content');
    }
    public function openModal()
    {
        $this->modal = true;
    }
    public function closeModal()
    {
        $this->modal = false;
    }
    public function deleteProduct($product_id,$availableTxt)
    {
        $this->availableTxt = $availableTxt;
        $this->openModal();
        $this->product_id = $product_id;
    }
    public function destroyProduct()
    {
        $product = Product::find($this->product_id);
        $available = $product->available=='0'?'1':'0';
        $product->update(['available'=>$available]);

        session()->flash('message','Product is '.$this->availableTxt.' now !');
        $this->closeModal();
    }
}
