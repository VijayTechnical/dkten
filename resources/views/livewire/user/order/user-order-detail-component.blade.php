<div>
    <div class="content-area" page_name="shopping_cart/invoice">
        @if($order)
        <section class="page-section invoice">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="invoice_body">
                            <div class="invoice-title">
                                <div class="invoice_logo hidden-xs">
                                    @if($logo)
                                    <img src="{{ asset('/storage/logo') }}/{{ $logo->home_header_logo }}"
                                        alt="SuperShop" style="max-width: 350px; max-height: 80px;">
                                    @endif
                                </div>
                                <div class="invoice_info">
                                    <p><b>Invoice # :</b>{{ $order->sale_code }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <address>
                                        <strong>
                                            <h4>
                                                Billed To :
                                            </h4>
                                        </strong>
                                        <p>
                                            <b>First Name :</b>
                                            {{ $order->User->first_name }}
                                        </p>
                                        <p>
                                            <b>Last Name :</b>
                                            {{ $order->User->last_name }}
                                        </p>
                                        <p>
                                            <b>Address :</b>
                                            <br>
                                            {{ $order->User->line1 }} <br>
                                            {{ $order->User->line2 }} <br>
                                            ZIP : {{ $order->User->zip }} <br>
                                            Phone : {{ $order->User->phone }} <br>
                                            E-mail : <a href="">{{ $order->User->email }}</a>
                                        </p>
                                    </address>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-6 hidden-xs text-right">
                                    <address>
                                        <strong>
                                            <h4>
                                                Shipped To :
                                            </h4>
                                        </strong>
                                        <p>
                                            <b>First Name :</b>
                                            {{ $order->firstname }}
                                        </p>
                                        <p>
                                            <b>Last Name :</b>
                                            {{ $order->lastname }}
                                        </p>
                                        <p>
                                            <b>Address :</b>
                                            <br>
                                            {{ $order->line1 }} <br>
                                            {{ $order->line2 }} <br>
                                            ZIP : {{ $order->zip }}<br>
                                            Phone : {{ $order->mobile }} <br>
                                            E-mail : <a href="">{{ $order->email }}</a>
                                        </p>
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6 ">
                                    <address>
                                        <strong>
                                            <h4>
                                                Payment Details :
                                            </h4>
                                        </strong>
                                        @if($order->Transaction)
                                        <p>
                                            <b>Payment Status :</b>
                                            <i>{{ $order->Transaction->status }}</i>
                                        </p>
                                        @endif
                                        @if($order->Transaction)
                                        <p>
                                            <b>Payment Method :</b>
                                            {{ $order->Transaction->PaymentMode->name }}
                                        </p>
                                        @endif
                                    </address>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6  text-right">
                                    <address>
                                        <strong>
                                            <h4>
                                                Order Date :
                                            </h4>
                                            <p>
                                                {{ $order->created_at->toDateString() }} </p>
                                        </strong>
                                    </address>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Payment Invoice</strong></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-condensed">
                                            <thead>
                                                <tr>
                                                    <td><strong>No</strong></td>
                                                    <td class="text-center"><strong>Item</strong></td>
                                                    <td class="text-center"><strong>Options</strong></td>
                                                    <td class="text-right"><strong>Quantity</strong></td>
                                                    <td class="text-right"><strong>Unit Cost</strong></td>
                                                    <td class="text-right"><strong>Total</strong></td>
                                                    <td class="text-right">Actions</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order->OrderItem as $key=>$item)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>
                                                        <span>{{ $item->product->title }}</span>
                                                    </td>
                                                    <td>
                                                        @if($item->options)
                                                        <ul>
                                                            @foreach (unserialize($item->options) as $key => $value)
                                                            <li>
                                                                <p><b>{{ $key }} : {{ $value }}</b></p>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                        @else
                                                        <p>No option selected.</p>
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->quantity }}</td>
                                                    <td>NPR{{ $item->price }}</td>
                                                    <td>NPR{{ number_format($item->price * $item->quantity,2)}}</td>
                                                    <td>
                                                        @if($order->status == 'delivered' && $item->rstatus == false)
                                                        <a class="btn btn-info" href="{{ route('user.review',['order_item_id'=>$item->id]) }}">Write Review</a>
                                                        @endif
                                                        <a class="btn btn-primary" href="{{ route('product.detail',['product_slug'=>$item->Product->slug]) }}"><i class="fas fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line text-right">
                                                        <strong>
                                                            Sub Total Amount :
                                                        </strong>
                                                    </td>
                                                    <td class="thick-line text-right">
                                                        NPR{{ $order->subtotal }} </td>
                                                </tr>
                                                <tr>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line text-right">
                                                        <strong>
                                                            Tax :
                                                        </strong>
                                                    </td>
                                                    <td class="no-line text-right">
                                                        NPR{{ $order->tax }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line text-right">
                                                        <strong>
                                                            Shipping :
                                                        </strong>
                                                    </td>
                                                    <td class="no-line text-right">
                                                        NPR{{ $order->shipping_cost }} </td>
                                                </tr>
                                                <tr>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line text-right">
                                                        <strong>
                                                            Grand Total :
                                                        </strong>
                                                    </td>
                                                    <td class="no-line text-right">
                                                        NPR{{ $order->total }} </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 col-md-offset-1 btn_print hidden-xs" style="margin-top:10px;">
                        <span class="btn btn-info pull-right" onclick="print_invoice()">
                            Print </span>
                        <a class="btn btn-danger pull-right" href="{{ route('user.order') }}"
                            style="margin-right: 5px;">Back To Profile</a>
                    </div>
                </div>
            </div>
        </section>
        @endif
        <style type="text/css">
            @media print {
                .top-bar {
                    display: none !important;
                }

                header {
                    display: none !important;
                }

                footer {
                    display: none !important;
                }

                .to-top {
                    display: none !important;
                }

                .btn_print {
                    display: none !important;
                }

                .invoice {
                    padding: 0px;
                }

                .table {
                    margin: 0px;
                }

                address {
                    margin-bottom: 0px;
                    border: 1px solid #fff !important;
                }
            }
        </style>

    </div>
</div>