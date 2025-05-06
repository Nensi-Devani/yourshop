<?php

namespace App\Livewire\Admin\Orders;

use App\Models\Order;
// use Illuminate\Support\Carbon;
use Carbon\Carbon;
use Livewire\Component;

class Index extends Component
{
    public $filter_date = null;
    public function render()
    {
        $orders = Order::latest('created_at');
        if($this->filter_date)
            $orders = Order::whereDate('created_at',$this->filter_date);

        $orders = $orders->paginate(6);
        return view('livewire.admin.orders.index',compact('orders'))->extends('layouts.admin')->section('content');
    }
}
