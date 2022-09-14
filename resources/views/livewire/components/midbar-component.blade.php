<div>
    <div class="row align-items-center">
        <div class="col-xl-2 col-lg-2">
            <div class="logo">
                @if($logo)
                <a href="{{ route('home') }}">
                    <img src="{{ asset('/storage/logo') }}/{{ $logo->home_header_logo }}" class=""
                        alt="DKten - Online Shopping In Nepal | Best Deals, Combo Offers">
                </a>
                @endif
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 header-search mt-4">
            <form action="#" wire:submit.prevent="submitSearch" method="post" accept-charset="UTF-8">
                <div class="d-flex position-relative">
                    <div class="flex-grow-1">
                        <input class="form-control ui-autocomplete-input" type="text" name="query"
                            accept-charset="utf-8" placeholder="What Are You Looking For?" autocomplete="off"
                            id="searchQueryInput" wire:model.defer="searchTerm">
                    </div>
                    <button type="submit" class="shrc_btn"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
        <div class="col-xl-4 col-lg-4">
            <div class="header-action header-action-flex">
                <a class=" fa fa-bars cls-tgl-prt menu-toggle-close btn"></a>
                <div class="languageselect">
                    <img src="https://dkten.com/uploads/USA.png" alt="USA">
                    <i class="fa fa-caret-down"></i>
                    <div class="languagediv">
                        <p>Change Language</p>
                        <div class="form-check">
                            <a class="set_langs">
                                <input class="form-check-input Langchange" type="radio" name="exampleRadios"
                                    id="exampleRadios1" value="en" wire:model="locale">
                                <label class="form-check-label" for="exampleRadios1">English</label>
                            </a>
                        </div>
                        <div class="form-check">
                            <a class="set_langs">
                                <input class="form-check-input Langchange" type="radio" name="exampleRadios"
                                    id="exampleRadios" value="ne" wire:model="locale">
                                <label class="form-check-label" for="exampleRadios">Nepali</label>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="sign-in">
                    <div class="midsignin">
                        <div class="midsigninlabel">
                            @if (!Auth::user())
                            <p>Hello, Sign In</p>
                            <p style="font-weight: 600">My Account <i class="fa fa-caret-down"></i></p>
                            @else
                            <p>Hello, {{ Auth::guard('web')->user()->first_name }}</p>
                            <p style="font-weight: 600">My Account <i class="fa fa-caret-down"></i></p>
                            @endif
                        </div>
                        <div class="midsignbox">
                            @if (!Auth::user())
                            <div class="midsignboxlogin">
                                <a href="{{ route('user.login') }}">Login</a>
                            </div>
                            <p style="text-align: center; margin: 6px">New to Dkten?</p>
                            <div class="midsignboxregister">
                                <a href="{{ route('user.register') }}">Register</a>
                            </div>
                            @else
                            <div class="midsignboxlogin">
                                <a href="{{ route('user.dashboard') }}">Account</a>
                            </div>
                            <div class="midsignboxlogin">
                                <a href="{{ route('user.wishlist') }}">Wishlist</a>
                            </div>
                            <div class="midsignboxlogin">
                                <a href="#" wire:click.prevent="Logout()">Logout</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="same-style-2 same-style-2-white same-style-2-font-inc header-cart">
                    <a class="cart-active" href="#" data-toggle="modal" data-target="#popup-cart"
                        wire:click.prevent="$emitTo('components.cart-component', 'showCart')">
                        <div class="cartimagewithspans">
                            <i style="color:grey;" class="fa fa-shopping-cart" aria-hidden="true"> </i>
                            <span class="pro-count black">
                                @if (Cart::instance('cart')->count() > 0)
                                <span class="cart_num">{{ Cart::instance('cart')->count() }}</span>
                                @else
                                <span class="cart_num">0</span>
                                @endif
                            </span>
                        </div>
                        <div class="realmycart">
                            <p>My Cart</p>
                        </div>
                    </a>
                </div>
                <div class="returnsorders"><a href="{{ route('user.support.admin') }}">Returns &amp; Orders</a></div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script type="text/javascript">
    $(".Langchange").change(function(){
        @this.setLocale();
    });  
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
    var route = "{{ url('autocomplete-search') }}";
    $('#searchQueryInput').typeahead({
        source: function (query, process) {
            return $.get(route, {
                query: query
            }, function (data) {
                console.log(data);
                return process(data);
            });
        }
    });
});
</script>
@endpush