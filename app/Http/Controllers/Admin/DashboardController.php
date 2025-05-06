<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Material;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\Color;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::count();
        $products = Product::where('status','1')->count();
        $totalOrders = Order::count();
        // order details
            // count only existing orders not cancelled order products
                // $cancelledOrd = OrderItem::where('order_status','cancelled')->pluck('id')->toArray();

            // total
            $inProgressOrders = OrderItem::where('order_status','in progress')->count();
            $pendingOrders = OrderItem::where('order_status','pending')->count();
            $shippedOrders = OrderItem::where('order_status','shipped')->count();
            $deleveredOrders = OrderItem::where('order_status','delivered')->count();
            $cancelledOrders = OrderItem::where('order_status','cancelled')->count();
            $returnedOrders = OrderItem::where('order_status','returned')->count();

            $totalSells = 0;
            $paymentRecievedOrders = Order::all();
            foreach ($paymentRecievedOrders as $order) {
                $paymentRecievedProducts = $order->orderItems()->get();
                foreach ($paymentRecievedProducts as $product) {
                    if ($order->payment_mode == 'paypal' || $product->order_status == 'delivered') {
                        $totalSells += ($product->price * $product->quantity);
                    }
                }
            }


            // today
                $today = Carbon::now();

            $inProgressOrdersToday = OrderItem::where('order_status','in progress')->whereDate('created_at',$today)->count();
            $pendingOrdersToday = OrderItem::where('order_status','pending')->whereDate('updated_at',$today)->count();
            $shippedOrdersToday = OrderItem::where('order_status','shipped')->whereDate('updated_at',$today)->count();
            $deleveredOrdersToday = OrderItem::where('order_status','delivered')->whereDate('updated_at',$today)->count();
            $cancelledOrdersToday = OrderItem::where('order_status','cancelled')->whereDate('updated_at',$today)->count();
            $returnedOrdersToday = OrderItem::where('order_status','cancereturnedlled')->whereDate('updated_at',$today)->count();

            // $orderProductsToday = OrderItem::whereDate('updated_at',$today)->whereNotIn('order_id',$cancelledOrd)->count();

            // all
            $categories = Category::where('status','1')->count();
            $subCategories = SubCategory::where('status','1')->count();
            $brands = Brand::where('status','1')->count();
            $colors = Color::where('status','1')->count();
            $materials = Material::where('status','1')->count();
            $sizes = Size::where('status','1')->count();
        return view('admin.dashboard',compact('users','products','totalOrders','categories','subCategories','brands','colors','materials','sizes',
                                              'inProgressOrders','pendingOrders','shippedOrders','deleveredOrders','cancelledOrders','totalSells','returnedOrders',
                                              'inProgressOrdersToday','pendingOrdersToday','shippedOrdersToday','deleveredOrdersToday','cancelledOrdersToday','returnedOrdersToday'));

    }
}
