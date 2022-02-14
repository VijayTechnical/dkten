<div>
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order Status
                        <a href="{{ route('vendor.sale') }}" class="float-right btn btn-danger">Back</a>
                    </h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Sale Code</th>
                                    <th>Order Status</th>
                                    <th>Order Date</th>
                                    <th>
                                        @if ($order->status == 'delivered')
                                        Delivery Date
                                        @else
                                        Cancelled Date
                                        @endif
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->sale_code }}</td>
                                    <td>
                                        @if ($order->status == 'ordered')
                                        <div class="badge badge-outline-warning">{{ $order->status }}</div>
                                        @elseif($order->status == 'delivered')
                                        <div class="badge badge-outline-success">{{ $order->status }}</div>
                                        @else
                                        <div class="badge badge-outline-danger">{{ $order->status }}</div>
                                        @endif
                                    </td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>
                                        @if ($order->status == 'delivered')
                                        <p class='text-primary'>{{ $order->delivered_date }}</p>
                                        @else
                                        <p class='text-danger'>{{ $order->cancelled_date }}</p>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order Details</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Cost</th>
                                    <th>Product Attributes</th>
                                    <th>Product Quantity</th>
                                    <th>Product Total Cost</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->OrderItem as $item)
                                <tr>
                                    @php
                                    $images = explode(',', $item->product->images);
                                    @endphp
                                    <td class="py-1">
                                        @foreach ($images as $key => $image)
                                        @if ($key === 1)
                                        <img src="{{ asset('/storage/product') }}/{{ $image }}"
                                            alt="{{ $item->product->title }}" />
                                        @endif
                                        @endforeach
                                        <span class="pl-2">{{ $item->product->title }}</span>
                                    </td>
                                    <td>NPR. {{ $item->price }}</td>
                                    <td>
                                        @if($item->options)
                                        <ul>
                                            @foreach (unserialize($item->options) as $key => $value)
                                            <li>
                                                <p><b>{{ $key }} : {{ $value }}</b></p>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>NPR. {{ number_format($item->price * $item->quantity,2)}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Order Summary</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Subtotal</th>
                                    <th>Tax</th>
                                    <th>Discount</th>
                                    <th>Shipping</th>
                                    <th>Total</th>
                                    <th>Delivey Region</th>
                                    <th>Delivery City</th>
                                    <th>Delivery Area</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>NPR. {{ $order->subtotal }}</td>
                                    <td>NPR. {{ $order->tax }}</td>
                                    <td>NPR. {{ $order->discount }}</td>
                                    <td>NPR. {{ $order->shipping_cost }}</td>
                                    <td>NPR. {{ $order->total }}</td>
                                    <td>{{ $order->Region->name }}</td>
                                    <td>{{ $order->City->name }}</td>
                                    <td>{{ $order->Area->name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Billing Details</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Line1</th>
                                    <th>Line2</th>
                                    <th>Zip</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $order->User->first_name }}</td>
                                    <td>{{ $order->User->last_name }}</td>
                                    <td>{{ $order->User->phone }}</td>
                                    <td>{{ $order->User->email }}</td>
                                    <td>{{ $order->User->line1 }}</td>
                                    <td>{{ $order->User->line2 }}</td>
                                    <td>{{ $order->User->zip }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Shipping Details</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Line1</th>
                                    <th>Line2</th>
                                    <th>Zip</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $order->firstname }}</td>
                                    <td>{{ $order->lastname }}</td>
                                    <td>{{ $order->mobile }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->line1 }}</td>
                                    <td>{{ $order->line2 }}</td>
                                    <td>{{ $order->zip }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($order->Transaction)
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Transaction Details</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Transaction Mode</th>
                                    <th>Transaction Status</th>
                                    <th>Transaction Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $order->Transaction->PaymentMode->name }}</td>
                                    <td>
                                        @if ($order->Transaction->status == 'pending')
                                        <div class="badge badge-outline-warning">{{ $order->Transaction->status }}</div>
                                        @elseif($order->Transaction->status == 'approved')
                                        <div class="badge badge-outline-success">{{ $order->Transaction->status }}</div>
                                        @elseif($order->Transaction->status == 'declined')
                                        <div class="badge badge-outline-danger">{{ $order->Transaction->status }}</div>
                                        @else
                                        <div class="badge badge-outline-primary">{{ $order->Transaction->status }}</div>
                                        @endif
                                    </td>
                                    <td>{{ $order->Transaction->created_at->toDateString() }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>