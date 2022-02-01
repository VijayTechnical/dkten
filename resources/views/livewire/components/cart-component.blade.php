<div>
    <div class="modal fade popup-cart in" wire:ignore.self id="popup-cart" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="container">
                <div class="cart-items">
                    <div class="cart-items-inner">
                        <span class="top_carted_list">
                            @if (Cart::instance('cart')->count() > 0)
                            @foreach (Cart::instance('cart')->content() as $item)
                            <div class="media" data-rowid="aa942ab2bfa6ebda4840e7360ce6e7ef">
                                @php
                                $product_image = product_image($item->model->id)
                                @endphp
                                <a class="pull-left"
                                    href="{{ route('product.detail',['product_slug'=>$item->model->slug]) }}">
                                    <img class="media-object item-image"
                                        src="{{ asset('/storage/product') }}/{{ $product_image }}"
                                        alt="{{ $item->model->title }}">
                                </a>
                                <p class="pull-right item-price">NPR{{ $item->model->sale_price }}
                                    <span class="remove_one" wire:click.prevent="destroy('{{ $item->rowId }}')">
                                        <i class="fa fa-close"></i>
                                    </span>
                                </p>
                                <div class="media-body">
                                    <h4 class="media-heading item-title"><a href="#">{{ $item->model->title }}e</a></h4>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <p>No products on cart.</p>
                            @endif
                        </span>
                        <div class="media">
                            <p class="pull-right item-price shopping-cart__total">NPR{{
                                Cart::instance('cart')->subtotal() }}</p>
                            <div class="media-body">
                                <h4 class="media-heading item-title summary">
                                    Subtotal </h4>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-body">
                                <div>
                                    <span class="btn btn-theme-dark" data-dismiss="modal"
                                        wire:click.prevent="$emitSelf('closeCart')">
                                        Close </span>
                                    <!--
                                    -->
                                    <a href="{{ route('checkout') }}"
                                        class="btn  btn-theme-transparent btn-call-checkout">
                                        Checkout </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script type="text/javascript">
    var options = {
        "backdrop": "static",
        "show": true
    }
    window.addEventListener('showCart', function(event) {
        $('#popup-cart').modal(options);
    });
</script>
<script type="text/javascript">
    var options = {
        "backdrop": "static",
        "show": false
    }
    window.addEventListener('closeCart', function(event) {
        $('#popup-cart').modal(options);
    });
</script>
@endpush