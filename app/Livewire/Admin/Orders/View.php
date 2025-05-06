<?php

namespace App\Livewire\Admin\Orders;

use App\Mail\sendInvoice;
use App\Models\Order;
use App\Models\OrderItem;
use Mail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class View extends Component
{
    use LivewireAlert;
    public $orderId, $ordStatus, $orderItem, $modal=false,$showPickupModal = false, $order;
    public function mount($orderId)
    {
        $this->orderId = $orderId;
    }
    public function render()
    {
        $this->order = Order::findOrFail($this->orderId);
        $orderItems = $this->order->orderItems()->get();
        return view('livewire.admin.orders.view',compact('orderItems'))->extends('layouts.admin')->section('content');
    }
    public function showPickupmodal($orderItemId){
        $this->orderItem = OrderItem::findOrFail($orderItemId);
        $this->showPickupModal = true;
    }
    public function closeModal()
    {
        $this->modal = false;
        $this->showPickupModal = false;
    }
    public function setOrdItmId($orderItemId)
    {
        $this->orderItem = OrderItem::findOrFail($orderItemId);
        $this->ordStatus = $this->orderItem->order_status;
        $this->modal = true;
    }
    public function updateOrdStatus()
    {
        // send invoice via mail after successfully delivery of product
        if($this->ordStatus=='delivered')
            Mail::to($this->order->email)->send(new sendInvoice($this->order,$this->orderItem));
        $this->orderItem->update(['order_status'=>$this->ordStatus]);
        $this->closeModal();
        // $this->alert('success', 'Order status updated successfully', [
        //     'position' => 'top-end',
        //     'timer' => '5000',
        //     'toast' => true,
        //     'text' => '',
        // ]);
        session()->flash('message','Order status updated successfully');
    }
    public function pickedup()
    {
        $this->orderItem->update(['pickup'=>'1']);
        $this->closeModal();
    }
}
