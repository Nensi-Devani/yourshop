<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;
use Stripe;
use Illuminate\Support\Facades\Request;

class OrderController extends Controller
{
    public function viewInvoice($orderId)
    {
        $order = Order::findOrFail($orderId);
        $isOrderMail = null;
        return view('frontend.view-invoice',compact('order','isOrderMail'));
    }
    public function generateInvoice($orderId)
    {
        $order = Order::findOrFail($orderId);
        $data = ['order' => $order, 'isOrderMail' => null];
        $pdf = Pdf::loadView('frontend.view-invoice', $data);
        $today = Carbon::now()->format('d-m-Y');
        return $pdf->download('ys_invoice'.$order->id.'-'.$today.'.pdf');
    }
    // for user invoice download
    public function downloadInvoice($orderId,$orderItemId)
    {
        $order = Order::findOrFail($orderId);
        $orderItem = OrderItem::findOrFail($orderItemId);
        $data = ['order' => $order,'orderItem' => $orderItem];
        $pdf = Pdf::loadView('frontend.download-invoice', $data);
        $today = Carbon::now()->format('d-m-Y');
        return $pdf->download('ys_invoice'.$order->id.'-'.$today.'.pdf');
    }
}
