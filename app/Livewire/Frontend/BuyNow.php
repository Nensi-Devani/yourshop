<?php

namespace App\Livewire\Frontend;

use App\Mail\orderPlaceMail;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use App\Models\Product;
use Mail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class BuyNow extends Component
{
    use LivewireAlert;
    public $product, $totalProductAmount=0, $productSizeIndex, $quantity, $size_id;
    public $fullname, $email, $phone_number, $address, $pincode, $payment_mode = null, $payment_id = null;
    public function mount($productSlug,$productSizeIndex,$quantity)
    {
        $this->product = Product::where('slug',$productSlug)->first();
        $this->productSizeIndex = $productSizeIndex;
        $this->quantity = $quantity;
    }
    public function render()
    {
        // to display user details
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;
        $userDetail = auth()->user()->userDetail()->first();
        $this->phone_number = $userDetail->phone_no;
        $this->address = $userDetail->address;
        $this->pincode = $userDetail->pin_code;
        $this->totalProductAmount();
        return view('livewire.frontend.buy-now')->extends('layouts.app')->section('content');
    }
    public function totalProductAmount()
    {
        if($this->product->selling_price > 0)
        {
            $this->totalProductAmount = $this->product->selling_price + $this->product->delivery_charge;
            $this->size_id = null;
        }
        else
        {
            $this->totalProductAmount += $this->product->productSizes[$this->productSizeIndex]->price + $this->product->productSizes[$this->productSizeIndex]->delivery_charge;
            $this->size_id = $this->product->productSizes[$this->productSizeIndex]->size_id;
        }

        $this->totalProductAmount *= $this->quantity;
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
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $this->product->id,
            'size_id' => $this->size_id,
            'quantity' => $this->quantity,
            'price' => $this->totalProductAmount,
            'order_status' => 'in progress'
        ]);
        $this->resetInputs();
        Mail::to($this->email)->send(new orderPlaceMail($order));
        return $order;
    }
}
