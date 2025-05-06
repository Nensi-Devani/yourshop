<?php

namespace App\Livewire\Frontend;

use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Component;

class Orders extends Component
{
    public function render()
    {
        $orderItems = Order::where('user_id',auth()->user()->id)->latest('created_at')->get();
        return view('livewire.frontend.orders',compact('orderItems'))->extends('layouts.app')->section('content');
    }
}
