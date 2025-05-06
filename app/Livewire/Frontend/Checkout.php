<?php

namespace App\Livewire\Frontend;

use App\Mail\orderPlaceMail;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Stripe;
use Mail;
use Livewire\Component;

class Checkout extends Component
{
    use LivewireAlert;
    public $carts, $totalProductAmount = 0, $quantity=0;
    public $fullname, $email, $phone_number, $address, $pincode, $payment_mode = null, $payment_id = null;
    public function render()
    {
        // to display the user name automatically
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;
        $userDetail = auth()->user()->userDetail()->first();
        $this->phone_number = $userDetail->phone_no;
        $this->address = $userDetail->address;
        $this->pincode = $userDetail->pin_code;
        $this->totalProductAmount();
        return view('livewire.frontend.checkout')->extends('layouts.app')->section('content');
    }
    public function totalProductAmount()
    {
        $this->carts = Cart::where('user_id',auth()->user()->id)->get();
        foreach($this->carts as $cart)
        {
            $this->quantity +=$cart->quantity;
            if($cart->product->selling_price > 0 && $cart->product->quantity > 0)
            {
                $this->totalProductAmount += ($cart->product->selling_price * $cart->quantity) + ($cart->product->delivery_charge * $cart->quantity);
            }
            else
            {
                if($cart->product->productSizes){
                    foreach($cart->product->productSizes as $size){
                        if($size->size_id == $cart->size_id && $size->quantity > 0){
                            $this->totalProductAmount += ($size->price * $cart->quantity) + ($size->delivery_charge * $cart->quantity);
                        }
                    }
                }
            }
        }
    }
    public function resetInputs()
    {
        $phone_number = null;
        $address = null;
        $pincode = null;
        $payment_mode = null;
        $payment_id = null;
    }
    public function rules()
    {
        return [
            'fullname' => 'required',
            'email' => 'required|email',
            'pincode' => 'required|min:6|max:6',
            'phone_number' => 'required|min:10|max:10',
            'address' => 'required'
        ];
    }
    public function onlineOrder()
    {
        \Stripe\Stripe::setApiKey(config('STRIPE_SECRET','sk_test_51P8epfSB2CzLpUtIDtuyW3yGTdTouFfxr6V16VTfVMEevEGQQyshSMsdQwSjUfbso2CqQF9daNjY2dWblX097QlD00O4l8fGVZ'));
        $r = \Stripe\Checkout\Session::create([
            'success_url' => route('success'),
            'customer_email' => $this->email,
            'payment_method_types'=>['card'],

            'line_items' => [
                [
                    'price_data' => [
                        'product_data' => [
                            'name' => $this->fullname
                        ],
                        'unit_amount' => $this->totalProductAmount/2 * 100,
                        'currency' => 'INR',
                    ],
                    'quantity' => $this->quantity,
                ],
            ],
            'mode' => 'payment',
            'allow_promotion_codes' => true,
        ]);
        $this->payment_mode = 'Online';
        if($r)
        {
            Redirect::to($r->url);
            $this->placeOrder();
            Cart::where('user_id',auth()->user()->id)->delete();
            $this->alert('success', 'Order placed successfully.', [
                'position' => 'bottom-end',
                'timer' => '5000',
                'toast' => true,
                'text' => '',
            ]);
        }
        else
            $this->alert('error', 'Something went wrong!!!', [
                'position' => 'bottom-end',
                'timer' => '5000',
                'toast' => true,
                'text' => '',
            ]);
    }
    public function codOrder()
    {
        $this->payment_mode = 'COD';
        $coOrd = $this->placeOrder();
        if($coOrd)
        {
            Cart::where('user_id',auth()->user()->id)->delete();
            $this->alert('success', 'Order placed successfully.', [
                'position' => 'bottom-end',
                'timer' => '5000',
                'toast' => true,
                'text' => '',
            ]);
            Redirect::to('/thank-you');
        }
        else
            $this->alert('error', 'Something went wrong!!!', [
                'position' => 'bottom-end',
                'timer' => '5000',
                'toast' => true,
                'text' => '',
            ]);
    }
    public function placeOrder()
    {
        $this->validate();
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'yourShop'.Str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone_number,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id
        ]);
        if($this->carts->count() > 0)
        {
            foreach($this->carts as $cart) // order every item in the cart
            {
                $price = 0;
                if($cart->product->selling_price > 0)
                    $price = $cart->product->selling_price; // price for single size product
                else
                {
                    if($cart->product->productSizes->count() > 0)
                    {
                        foreach ($cart->product->productSizes as $size) { //check for all the sizes
                            if($size->size_id == $cart->size_id)
                                $price = $size->price; // price for multi size
                        }
                    }
                }
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'size_id' => $cart->size_id,
                    'quantity' => $cart->quantity,
                    'price' => $price,
                    'order_status' => 'in progress'
                ]);
            }
        }
        else
            $this->alert('error', 'No product found !, Please add some product to buy', [
                'position' => 'bottom-end',
                'timer' => '5000',
                'toast' => true,
                'text' => '',
            ]);
        $this->resetInputs();
        Mail::to($this->email)->send(new orderPlaceMail($order));
        return $order;
    }
}
