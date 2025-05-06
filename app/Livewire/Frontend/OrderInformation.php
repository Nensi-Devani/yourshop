<?php

namespace App\Livewire\Frontend;

use App\Models\Order;
use App\Models\OrderItem;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class OrderInformation extends Component
{
    use LivewireAlert;
    public $orderId, $orderItemId, $modal = false,$cancel = false, $reason, $status;
    public function mount($orderId,$orderItemId)
    {
        $this->orderId = $orderId;
        $this->orderItemId = $orderItemId;
    }
    public function render()
    {
        $order = Order::find($this->orderId);
        $orderItem = OrderItem::find($this->orderItemId);
        return view('livewire.frontend.order-information',compact('order','orderItem'))->extends('layouts.app')->section('content');
    }
    public function showModal($m)
    {
        $this->status = $m;
        $this->modal = true;
    }
    public function closeModal()
    {
        $this->modal = false;
    }
    public function rules()
    {
        return [
            'reason' => 'required'
        ];
    }
    public function returnProduct()
    {
        $this->validate();
        $orderItem = OrderItem::find($this->orderItemId);
        $orderItem->update([
            'order_status'=>$this->status,
            'reason'=>$this->reason
        ]);
        if($this->status=='returned')
            session()->flash('message','Return request received ! ,We will arrange the pickup of the returned product within 7-8 days.');
        $this->closeModal();
    }
}
