<?php

namespace App\Livewire;

use Livewire\Component;

class DashboardOrderDetails extends Component
{
    public function render()
    {
        return view('livewire.dashboard-order-details')->extends('layouts.admin')->section('content');
    }
}
