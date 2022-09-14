@push('styles')
<link rel="stylesheet" href="{{ asset('dk10_assets/theme-red-1.css') }}">
<link rel="stylesheet" href="{{ asset('dk10_assets/checkout.css') }}">
<script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
@endpush
<div>
    <section class="page-section color">
        <div class="container box_shadow">
            <div class="tabs-container">
                <div class="form-wizard">
                    <div class="form-wizard-header">
                        <ul class="list-unstyled form-wizard-steps clearfix">
                            <li class="active"><span>1</span></li>
                            <li><span>2</span></li>
                            <li><span>3</span></li>
                        </ul>
                    </div>
                    <fieldset class="wizard-fieldset show">
                        <h3 class="block-title alt">
                            <i class="fa fa-angle-down"></i>1.Orders
                        </h3>
                        <div class="row orders tab">
                            @if(Session::has('product_payment_error'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('product_payment_error') }}
                            </div>
                            @endif
                            <div class="col-md-9" style="max-width: 600px;">
                                <table class="table table-bordered carter_table" style="background: #fff;">
                                    <thead>
                                        <tr>
                                            <th class="hidden-sm hidden-xs">Image</th>
                                            <th>Product Details</th>
                                            <th>Choices</th>
                                            <th>Unit Price</th>
                                            <th style="text-align:center;">Quantity</th>
                                            <th>Subtotal</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (Cart::instance('cart')->count() > 0)
                                        @foreach (Cart::instance('cart')->content() as $item)
                                        <tr data-rowid="a49e9411d64ff53eccfdd09ad10a15b3">
                                            <td class="image hidden-sm hidden-xs" align="center">
                                                @php
                                                $product_image = product_image($item->model->id)
                                                @endphp
                                                <a class="media-link"
                                                    href="{{ route('product.detail',['product_slug'=>$item->model->slug]) }}">
                                                    <i class="fa fa-plus"></i>
                                                    <img src="{{ asset('/storage/product') }}/{{ $product_image }}"
                                                        width="60" alt="{{ $item->model->title }}">
                                                </a>
                                            </td>
                                            <td class="description">
                                                <h4>
                                                    <a
                                                        href="{{ route('product.detail',['product_slug'=>$item->model->slug]) }}">
                                                        {{ $item->model->title }}
                                                    </a>
                                                </h4>
                                            </td>
                                            <td class="description">
                                                <ul>
                                                    @foreach ($item->options as $key => $value)
                                                    <li>{{ $key }} : {{ $value }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td class="quantity pric">
                                                NPR{{ $item->model->sale_price }}
                                            </td>
                                            <td class="quantity product-single"
                                                style="text-align:center;max-width:200px;">
                                                <span class="buttons">
                                                    <div class="quantity product-quantity" style="width:150px;">
                                                        <button type="button"
                                                            wire:click.prevent="decreaseQuantity({{ $item->rowId }})"
                                                            class="btn in_xs quantity-button minus" value="minus">
                                                            <i class="fa fa-minus"></i>
                                                        </button>
                                                        <input type="number"
                                                            class="form-control qty in_xs quantity-field quantity_field"
                                                            data-rowid="a49e9411d64ff53eccfdd09ad10a15b3"
                                                            data-limit="no" min="1" value="{{ $item->qty }}" id="qty1">
                                                        <button type="button"
                                                            wire:click.prevent="increaseQuantity({{ $item->rowId }})"
                                                            class="btn in_xs quantity-button plus" value="plus">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </span>
                                            </td>
                                            <td class="quantity pric">
                                                <span class="sub_total" class="font-size:14px;">
                                                    NPR{{ $item->subtotal() }}
                                                </span>
                                            </td>
                                            <td class="total" style="max-width: 100px;">
                                                <button type="button" wire:click.prevent="destroy('{{ $item->rowId }}')"
                                                    class="close" style="color:#f00;">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-3 shopping_position">
                                <h3 class="block-title">
                                    <span>
                                        Shopping Cart
                                    </span>
                                </h3>
                                <div class="shopping-cart" style="background: #fff;">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>Subtotal:</td>
                                                @if ($subtotalAfterDiscount)
                                                <td id="total">NPR. {{ $subtotalAfterDiscount }}</td>
                                                @else
                                                <td id="total">NPR. {{ Cart::instance('cart')->subtotal() }}</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>Discount:</td>
                                                @if ($discount)
                                                <td class="disco">NPR. {{ $discount }}</td>
                                                @else
                                                <td class="disco">NPR. 0.00</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>Shipping:</td>
                                                @if ($shipping)
                                                <td class="shipping">NPR. {{ $shipping }}</td>
                                                @else
                                                <td class="shipping">NPR. 0.00</td>
                                                @endif
                                            </tr>
                                            <tr class="coupon_disp">
                                                <td>Tax:</td>
                                                @if ($taxAfterDiscount)
                                                <td class="tax">NPR. {{ $taxAfterDiscount }}</td>
                                                @else
                                                <td class="tax">NPR. 0.00</td>
                                                @endif
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>Grand Total:</td>
                                                @if ($totalAfterDiscount)
                                                <td class="grand_total" id="grand">NPR. {{ $totalAfterDiscount }}</td>
                                                @else
                                                <td class="grand_total" id="grand">NPR.
                                                    {{ str_replace(',', '', Cart::instance('cart')->subtotal()) +
                                                    $shipping }}
                                                </td>
                                                @endif
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <h5>
                                        Enter Your Coupon Code If You Have One.
                                    </h5>
                                    <form action="#" wire:submit.prevent="applyCouponCode">
                                        <div class="form-group" id="thisiscoupon">
                                            <input type="text" class="form-control coupon_code"
                                                placeholder="Enter your coupon code" wire:model="couponCode" required>
                                        </div>
                                        <button type="submit" class="btn btn-theme btn-block coupon_btn">
                                            Apply Coupon
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <form action="#" wire:submit.prevent="proceedToCheckout()" onsubmit="$('#processing').show();">
                        <fieldset class="wizard-fieldset show">
                            <h3 class="block-title alt">
                                <i class="fa fa-angle-down"></i>
                                2.
                                Delivery
                            </h3>
                            <div action="#" class="form-delivery delivery_address">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select class="form-control" style="border-color: rgb(147, 30, 205);"
                                                wire:model="region_id">
                                                <option value="">Select Region</option>
                                                @foreach ($regions as $region)
                                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('region_id')
                                            <span class="text-danger mt-1" role="alert">{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control" style="border-color: rgb(147, 30, 205);"
                                            wire:model="city_id">
                                            <option value="">Select City</option>
                                            @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('city_id')
                                        <span class="text-danger mt-1" role="alert">{{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control" style="border-color: rgb(147, 30, 205);"
                                        wire:model="area_id" wire:change="setAmountForCheckout">
                                        <option value="">Select Area</option>
                                        @foreach ($areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('area_id')
                                    <span class="text-danger mt-1" role="alert">{{ $message }}
                                </div>
                                @enderror
                            </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input class="form-control" name="first_name" type="text" placeholder="First Name"
                    style="border-color: rgb(147, 30, 205);" wire:model="first_name">
                @error('first_name')
                <span class="text-danger mt-1" role="alert">{{ $message }}
            </div>
            @enderror
        </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <input class="form-control" name="lastname" type="text" placeholder="Last Name"
            style="border-color: rgb(147, 30, 205);" wire:model="last_name">
        @error('last_name')
        <span class="text-danger mt-1" role="alert">{{ $message }}
    </div>
    @enderror
</div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <input class="form-control address" name="address1" value="" type="text" placeholder="Address Line 1"
            style="border-color: rgb(147, 30, 205);" required wire:model="line1">
        @error('line1')
        <span class="text-danger mt-1" role="alert">{{ $message }}
    </div>
    @enderror
</div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <input class="form-control address" name="address2" value="" type="text" placeholder="Address Line 2" required
            wire:model="line2">
        @error('line2')
        <span class="text-danger mt-1" role="alert">{{ $message }}
    </div>
    @enderror
</div>
</div>

<div class="col-md-4">
    <div class="form-group">
        <input class="form-control" name="zip" type="text" value="" placeholder="Postcode/ZIP"
            style="border-color: rgb(147, 30, 205);" wire:model="zip">
        @error('zip')
        <span class="text-danger mt-1" role="alert">{{ $message }}
    </div>
    @enderror
</div>
</div>

<div class="col-md-4">
    <div class="form-group">
        <input class="form-control" name="email" type="text" placeholder="Email"
            style="border-color: rgb(147, 30, 205);" wire:model="email">
        @error('email')
        <span class="text-danger mt-1" role="alert">{{ $message }}
    </div>
    @enderror
</div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <input class="form-control" name="phone" type="text" placeholder="Phone Number"
            style="border-color: rgb(147, 30, 205);" wire:model="phone">
        @error('phone')
        <span class="text-danger mt-1" role="alert">{{ $message }}
    </div>
    @enderror
</div>
</div>
<div class="col-sm-12" id="lnlat" style="display:none;">
    <div class="form-group">
        <div class="col-sm-12">
            <input id="langlat" type="text" placeholder="langitude - latitude" name="langlat" class="form-control"
                readonly="">
        </div>
    </div>
</div>
<div class="col-md-12" style="display:none;">
    <div class="checkbox">
        <label>
            <input type="checkbox">
            Ship To Different Address For Invoice
        </label>
    </div>
</div>
</div>
</div>
</fieldset>
<fieldset class="wizard-fieldset show">
    <div class="panel-group payments-options" id="accordion" role="tablist">
        <div class="row">
            @if($payment_methods->count() > 0)
            @foreach ($payment_methods as $key=>$method)
            <div class="cc-selector col-sm-3">
                <input id="{{ $method->name }}" style="display:block;" type="radio" name="payment_type"
                    value="{{ $method->id }}" wire:model="payment_mode_id">
                <label class="drinkcard-cc" style="margin-bottom:0px; width:100%; overflow:hidden; "
                    for="{{ $method->name }}">
                    <img src="{{ asset('/storage/payment') }}/{{ $method->image }}" width="100%" height="100%"
                        style=" text-align-last:center;" alt="{{ $method->name }}">
                </label>
            </div>
            @endforeach
            @endif
            @error('payment_mode_id')
            <span class="text-danger" role="alert">{{ $message }}</span>
            @enderror
        </div>
    </div>
</fieldset>
<div class="overflowed" style="margin-top: 20px; float: right; margin-right: 25px;">
    <a class="btn btn-theme-dark" href="{{ route('home') }}">
        Cancel Order
    </a>
    @if (!$errors->isEmpty())
    <button wire:ignore id="processing" class="btn btn-theme pull-right form-wizard-submit">
        <i class="fa fa-spinner fa-pulse fa-fw"></i>
        <span>Processing...</span>
    </button>
    @else
    <button type="submit" class="btn btn-theme pull-right form-wizard-submit">
        Place Order
    </button>
    @endif
</div>
</form>
</div>
</div>
</div>
</section>
<style>
    .cc-selector input {
        margin: 0;
        padding: 0;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    .cc-selector input:active+.drinkcard-cc {
        opacity: 1;
        border: 4px solid #169D4B;
    }

    .cc-selector input:checked+.drinkcard-cc {
        -webkit-filter: none;
        -moz-filter: none;
        filter: none;
        border: 4px solid black;
    }

    .drinkcard-cc {
        cursor: pointer;
        background-size: contain;
        background-repeat: no-repeat;
        display: inline-block;
        -webkit-transition: all 100ms ease-in;
        -moz-transition: all 100ms ease-in;
        transition: all 100ms ease-in;
        -webkit-filter: opacity(.5);
        -moz-filter: opacity(.5);
        filter: opacity(.5);
        transition: all .6s ease-in-out;
        border: 4px solid transparent;
        border-radius: 5px !important;
    }

    .drinkcard-cc:hover {
        -webkit-filter: opacity(1);
        -moz-filter: opacity(1);
        filter: opacity(1);
        transition: all .6s ease-in-out;
        border: 4px solid #8400C5;
    }
</style>
@if ($paymentmode)
@if ($paymentmode == 'esewa')
<form action="https://uat.esewa.com.np/epay/main" method="POST" id="esewaForm">
    <input value="100" name="tAmt" type="hidden">
    <input value="90" name="amt" type="hidden">
    <input value="5" name="txAmt" type="hidden">
    <input value="2" name="psc" type="hidden">
    <input value="3" name="pdc" type="hidden">
    <input value="{{ config('app.esewa_merchent') }}" name="scd" type="hidden">
    <input value="{{ $order_id }}" name="pid" type="hidden">
    <input value="http://localhost:8000/checkout/esewa-verify?q=su" type="hidden" name="su">
    <input value="http://localhost:8000/checkout/esewa-verify?q=fu" type="hidden" name="fu">
</form>
@endif
@endif
</div>
@push('scripts')
<script type="text/javascript">
    var config = {
    // replace the publicKey with yours
    "publicKey": "{{ config('app.khalti_public_key') }}",
    "productIdentity": "10000000",
    "productName": "Dragon",
    "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
    "paymentPreference": [
        "KHALTI",
        "EBANKING",
        "MOBILE_BANKING",
        "CONNECT_IPS",
        "SCT",
    ],
    "eventHandler": {
        onSuccess(payload) {
            @this.verifyKhalti(payload);
        },
        onError(error) {
            console.log(error);
        },
        onClose() {
            console.log('widget is closing');
        }
    }
};

var checkout = new KhaltiCheckout(config);
window.addEventListener('showKhalti', function(event) {
    var amount = 1000;
    checkout.show({
        amount: amount
    });
});
</script>
<script>
    window.addEventListener('submitEsewa', function(event) {
    document.getElementById("esewaForm").submit();
});
</script>
@endpush