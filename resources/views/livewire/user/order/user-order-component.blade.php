<div>
    <section class="page-section">
        <div class="wrap container">
            <!-- <div id="profile-content"> -->
            <div class="row profile">
                <div class="col-lg-3 col-md-3">
                    <input type="hidden" id="state" value="normal">
                    <div class="widget account-details">
                        <div class="information-title" style="margin-bottom: 0px;">My Profile</div>
                        @livewire('user.components.user-sidebar-component')
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div id="profile_content">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="information-title">
                                    Your Order History </div>
                                <div class="details-wrap">
                                    <div class="details-box orders">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Sale Code</th>
                                                    <th>Date</th>
                                                    <th>Amount</th>
                                                    <th>Payment Status</th>
                                                    <th>Delivery Status</th>
                                                    <th>Invoice</th>
                                                </tr>
                                            </thead>
                                            <tbody id="result2">
                                                @if($orders->count() > 0)
                                                @foreach ($orders as $key=>$order)
                                                @if($order->Transaction)
                                                <tr>
                                                    <td>
                                                        {{ $key+1 }}
                                                    </td>
                                                    <td class="image">
                                                        #{{ $order->sale_code }}
                                                    </td>
                                                    <td class="quantity">
                                                        {{ $order->created_at->toDateString() }} </td>
                                                    <td class="description">
                                                        NPR{{ $order->total }} </td>
                                                    <td class="order-id">
                                                        <span class="label label-danger" style="margin:2px;">
                                                            {{ $order->Transaction->status }}:({{
                                                            $order->Transaction->PaymentMode->name }})</span>
                                                        <br>
                                                    </td>
                                                    <td class="order-id">
                                                        <span class="label label-danger" style="margin:2px;">
                                                            {{ $order->status }} </span>
                                                        <br>
                                                    </td>
                                                    <td class="add">
                                                        <a class="btn btn-theme btn-theme-xs"
                                                            href="{{ route('user.order.detail',['order_id'=>$order->id]) }}">Invoice</a>
                                                    </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center justify-content-lg-end">
                                        @if($orders->count() >0)
                                        {{ $orders->links('pagination::bootstrap-4') }}
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-lg-3">
                                <div class="information-title">
                                    Order Tracing </div>
                                <div class="details-wrap">
                                    <div class="details-box orders">
                                        <form action="" class="form-login" method="post" enctype="multipart/form-data"
                                            accept-charset="utf-8" wire:submit.prevent="getStatus()">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <span
                                                            style="width: 10%;float:left;padding-top: 3px;font-size: 25px;">#</span>
                                                        <input style="width: 90%;float:left;" class="form-control"
                                                            name="sale_code" type="text" placeholder="Sale Code"
                                                            spellcheck="false" data-ms-editor="true"
                                                            wire:model="sale_code">
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="margin-top:0px;">
                                                    <button type="submit" class="btn btn-theme btn-block signup_btn">
                                                        Trace My Order </button>
                                                    <div id="trace_details">
                                                        @if($status)
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <b>Delivery Status : </b> {{ $status }}
                                                                        ()<br><br>
                                                                        @if($status == 'cancelled')
                                                                        <b>Status Updated On : </b> {{ $cancelled_date
                                                                        }}
                                                                        PM
                                                                        @elseif ($status == 'delivered')
                                                                        <b>Status Updated On : </b> {{ $delivered_date
                                                                        }}
                                                                        PM
                                                                        @else
                                                                        <b>Status Updated On : </b> {{ $created_date }}
                                                                        PM
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->
        </div>
    </section>
</div>