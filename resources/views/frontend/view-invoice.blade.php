<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="shortcut icon" href="{{asset($app->getFirstMediaUrl('big_screen'))}}" />
    <title>View Invoice</title>
    <style>
        *{
            font-family:Arial;
        }
        @if(request()->is('admin/orders/invoice/'.$order->id))
            .container{
                width: 85%;
                margin: 40px auto;
            }
        @else
            .container{
                margin: auto;
            }
        @endif
        .text-dark-blue{
            color: #19427D;
            margin: auto 20px
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }
        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
        }
        .small-heading {
            font-size: 16px;
        }
        .total-heading {
            font-size: 16px;
            font-weight: 700;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }
        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #19427D;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        @if(isset($isOrderMail))
            <div style="text-align: center">
                <h2>Thank you for your Order</h2>
                <p>Thank you for purchasing with {{$app->name}} <br> Your order items and details are provided below.</p>
            </div>
        @endif
        <table class="order-details">
            <thead>
                <tr>
                    <th width="50%" colspan="2">
                        <h2 class="text-start text-dark-blue">{{$app->name}}</h2>
                    </th>
                    <th width="50%" colspan="2" class="text-end company-data">
                        <span>Invoice Id: #{{$order->id}}</span> <br>
                        <span>Date: {{date('d / m / Y')}}</span> <br>
                        {{-- demo address of yourShop --}}
                        <span>Pin code : {{$app->pincode}}</span> <br>
                        <span>Address: {{$app->address}}</span> <br>
                    </th>
                </tr>
                <tr class="bg-blue">
                    <th width="50%" colspan="2">Order Details</th>
                    <th width="50%" colspan="2">User Details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Order Id:</td>
                    <td>{{$order->id}}</td>

                    <td>Full Name:</td>
                    <td>{{$order->fullname}}</td>
                </tr>
                <tr>
                    <td>Tracking Id/No.:</td>
                    <td>{{$order->tracking_no}}</td>

                    <td>Email Id:</td>
                    <td>{{$order->email}}</td>
                </tr>
                <tr>
                    <td>Ordered Date:</td>
                    <td>{{$order->created_at}}</td>

                    <td>Phone:</td>
                    <td>{{$order->phone}}</td>
                </tr>
                <tr>
                    <td>Payment Mode:</td>
                    <td>{{$order->payment_mode}}</td>

                    <td>Address:</td>
                    <td>{{$order->address}}</td>
                </tr>
                <tr>
                    <td>Order Status:</td>
                    <td style="text-transform: capitalize">{{$order->status_message}}</td>

                    <td>Pin code:</td>
                    <td>{{$order->pincode}}</td>
                </tr>
            </tbody>
        </table>

        <table>
            <thead>
                <tr>
                    <th class="no-border text-start heading text-dark-blue" colspan="5">
                        Order Items
                    </th>
                </tr>
                <tr class="bg-blue">
                    <th>Sn.</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Delivery Charge</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalAmount = 0;
                    $sn=1;
                @endphp
                @foreach($order->orderItems as $ordItem)

                    @if ($ordItem->product->selling_price > 0)
                        @php
                            $price = $ordItem->product->selling_price;
                            $delivary = $ordItem->product->delivery_charge * $ordItem->quantity;
                        @endphp
                    @else
                        @foreach ($ordItem->product->productSizes as $size)
                            @if ($size->size_id == $ordItem->size_id)
                                @php
                                    $price = $size->price;
                                    $delivary = $size->delivery_charge * $ordItem->quantity;
                                @endphp
                            @endif
                        @endforeach
                    @endif
                <tr>
                    <td width="10%">{{$sn++}}</td>
                    <td> {{$ordItem->product->name}} </td>
                    <td width="10%">
                            Rs. {{$price}}
                    </td>
                    <td>
                            Rs. {{$delivary}}
                    </td>
                    <td width="10%">{{$ordItem->quantity}}</td>
                    <td width="15%" class="fw-bold">{{-- &#8377 --}}
                        Rs. {{$delivary + $ordItem->quantity * $price}}
                        @php
                             $totalAmount += ($ordItem->quantity * $price) + $delivary;
                        @endphp
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="5" class="total-heading">Total Amount - <small>Inc. all tax</small></td>
                    <td colspan="1" class="total-heading">Rs. {{$totalAmount}}</td>
                </tr>
            </tbody>
        </table>

        <br>
        <p class="text-center">
            Thank your for shopping with YouShop
        </p>
    </div>
</body>
</html>
