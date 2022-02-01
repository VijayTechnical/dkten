<div>
    <section class="page-section light" itemscope="" itemtype="http://schema.org/Product">
        <div class="container">
            <div class="row product-single" id="abc">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="row" wire:ignore>
                        <div class="col-md-2 col-sm-2 col-xs-2 others-img container">
                            @php
                            $product_image = product_image($product->id)
                            @endphp
                            <div class="related-product image selected" id="main1">
                                <img itemprop="image" class="img-responsive img"
                                    data-src="{{ asset('/storage/product') }}/{{ $product_image }}"
                                    src="{{ asset('/storage/product') }}/{{ $product_image }}" alt="">
                            </div>
                            @php
                            $product_images = all_product_image($product->id);
                            @endphp
                            @if(count($product_images) > 0)
                            @foreach ($product_images as $key=>$product_image)
                            @if($key > 1)
                            <div class="related-product image" id="main1">
                                <img itemprop="image" class="img-responsive img"
                                    data-src="{{ asset('/storage/product') }}/{{ $product_image }}"
                                    src="{{ asset('/storage/product') }}/{{ $product_image }}" alt="">
                            </div>
                            @endif
                            @endforeach
                            @endif
                        </div>

                        <div class="col-md-10 col-sm-10 col-xs-10 zoom">
                            <div class="badges">
                                @if($product->featured)
                                <div class="hot">Featured</div>
                                @endif
                                @if($product->t_deal)
                                <div class="new">Today’s Deal</div>
                                @endif
                            </div>
                            <div class="zm-wrap image">
                                <div></div>
                                <img class="img-responsive main-img zoom" id="set_image"
                                    src="{{ asset('/storage/product') }}/{{ $product_image }}" alt="">
                            </div>
                            <div class="loupe"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12 col-xs-12">
                    <h3 itemprop="name" class="product-title">{{ $product->title }} </h3>
                    <div class="product-info">
                        <p>
                            <a href="https://dkten.com/home/category/30">
                                {{ $product->Category->name }}
                            </a>
                        </p>

                        ||

                        <p>
                            <a href="https://dkten.com/home/category/30/119">
                                {{ $product->SubCategory->name }}
                            </a>
                        </p>
                        ||
                        <p itemscope="" itemtype="http://schema.org/Brand">
                            <a href="https://dkten.com/home/category/30/119-">
                                <span itemprop="name">{{ $product->Brand->name }}</span>
                            </a>
                        </p>
                    </div>
                    <div class="added_by" itemscope="" itemtype="http://schema.org/Store">
                        Sold By :
                        <p itemprop="name">
                            @if($product->vendor_id)
                            <a href="https://dkten.com/home/vendor_profile/158/A-One-Nepal-Leather-Craft">{{
                                $product->Vendor->display_name }}</a>
                            @else
                            <a href="https://dkten.com/home/vendor_profile/158/A-One-Nepal-Leather-Craft">{{
                                $product->Admin->name }}</a>
                            @endif
                        </p>
                    </div>
                    <div class="product-rating clearfix" itemprop="aggregateRating" itemscope=""
                        itemtype="https://schema.org/AggregateRating">
                        @php
                        $avgrating = 0;
                        @endphp
                        @foreach ($product->OrderItem->where('rstatus', 1) as $orderItem)
                        @php
                        $avgrating = $avgrating + $orderItem->Review->rating;
                        @endphp
                        @endforeach
                        @for ($i = 1; $i <= 5; $i++) @if ($i <=$avgrating) <i class="fa fa-star text-warning"></i>
                            @else
                            <i class="fa fa-star text-secondary"></i>
                            @endif
                            @endfor
                            <br>

                            <a class="reviews ratings_show" href="#">
                                {{ $product->OrderItem->where('rstatus', 1)->count() }}
                                Review(s)
                            </a>
                    </div>
                    <hr class="page-divider">
                    <div class="product-price">
                        Price :
                        <ins>
                            NPR{{ $product->sale_price }}
                            <unit> /{{ $product->unit }}</unit>
                        </ins>
                        <del itemprop="price">NPR{{ $product->purchase_price }}</del>
                        <span class="label label-success">
                            Discount: {{ $product->discount }}%
                        </span>
                    </div>
                    <div class="col-md-6">
                        <form action="https://dkten.com/home/product_view/430/Mens-Genuine-Long-Slim-Fit-Leather-Jacket"
                            method="post" class="sky-form" accept-charset="utf-8">
                            <div class="order">
                                <div class="buttons">
                                    <fieldset class="options">
                                        <div class="form-group">
                                            @foreach ($product->AttributeValue->unique('attribute_id') as
                                            $attributeValue)
                                            <h3>{{ $attributeValue->Attribute->name }}</h3>
                                            <select name="{{ $attributeValue->Attribute->name }}"
                                                id="{{ $attributeValue->Attribute->name }}" class="form-control"
                                                id="{{ $attributeValue->Attribute->name }}"
                                                wire:model="sattr.{{ $attributeValue->Attribute->name }}">
                                                <option value="">Choose</option>
                                                @foreach($attributeValue->Attribute->attributeValues->where('product_id',
                                                $product->id) as $pav)
                                                <option value="{{ $pav->value }}">
                                                    {{ $pav->value }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <label for="{{ $attributeValue->Attribute->name }}">{{
                                                $attributeValue->Attribute->name }}</label>
                                            @endforeach
                                        </div>
                                    </fieldset>
                                    <div class="options">
                                        {!! $product->description !!}
                                    </div>
                                    @php
                                    $current_status = product_status($product->id);
                                    @endphp
                                    <div class="item_count">
                                        <div class="quantity product-quantity" style="width:150px;">
                                            <span class="btn" name="subtract" wire:click.prevent="decreaseQuantity">
                                                <i class="fa fa-minus"></i>
                                            </span>
                                            <input type="number" class="form-control qty quantity-field cart_quantity"
                                                min="1" value="{{ $qty }}" max="{{ $current_status['quantity'] }}"
                                                name="qty" value="1" id="qty">
                                            <span class="btn" name="add" wire:click.prevent="increaseQuantity">
                                                <i class="fa fa-plus">
                                                </i></span>
                                        </div>
                                        @if($current_status['status'] == 'In-Stock')
                                        <div class="stock" itemprop="availability" href="http://schema.org/InStock">
                                            {{ $current_status['quantity'] }} {{ $product->unit }} Available
                                        </div>
                                        @else
                                        <label class="btn btn-add-to cart">{{ $current_status['status'] }}</label>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="buttons" style="display:inline-flex;">
                                <span class="btn btn-add-to buy_now cart" onclick="to_buy(430,event)">
                                    <i class="fa fa-shopping-cart"></i>
                                    Buy Now
                                </span>
                                <span class="btn btn-add-to cart"
                                    wire:click.prevent="store({{$product->id}},'{{$product->title}}',{{$product->sale_price}})">
                                    <i class="fa fa-shopping-cart"></i>
                                    Add To Cart
                                </span>
                                <span class="btn btn-add-to wishlist"
                                    wire:click.prevent="wishlist({{ $product->id }},'{{ $product->title }}',{{ $product->sale_price }})">
                                    <i class="fa fa-heart"></i>
                                    <span class="hidden-sm hidden-xs">
                                        Add To Wishlist
                                    </span>
                                </span>
                            </div>
                        </form>
                        <div id="pnopoi"></div>
                        <div class="buttons">
                            <div id="share"><a
                                    href="http://www.facebook.com/share.php?u=https%3A%2F%2Fdkten.com%2Fhome%2Fproduct_view%2F430%2FMens-Genuine-Long-Slim-Fit-Leather-Jacket"
                                    title="Share this page on facebook" class="pop share-square share-square-facebook"
                                    style="display: inline-block;"></a><a
                                    href="https://twitter.com/share?url=https%3A%2F%2Fdkten.com%2Fhome%2Fproduct_view%2F430%2FMens-Genuine-Long-Slim-Fit-Leather-Jacket&amp;text=Men"
                                    s%20genuine%20long%20slim%20fit%20leather%20jacket%20%7c%20dk%20ten%20-%20always%20deliver%20more%20than%20expected.'=""
                                    title="Share this page on twitter" class="pop share-square share-square-twitter"
                                    style="display: inline-block;"></a><a
                                    href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Fdkten.com%2Fhome%2Fproduct_view%2F430%2FMens-Genuine-Long-Slim-Fit-Leather-Jacket&amp;title=Men"
                                    s%20genuine%20long%20slim%20fit%20leather%20jacket%20%7c%20dk%20ten%20-%20always%20deliver%20more%20than%20expected.&summary="Long"
                                    leather="" jacket&source="in1.com'" title="Share this page on linkedin"
                                    class="pop share-square share-square-linkedin" style="display: inline-block;"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section specification">
        <div class="container">
            <div class="tabs-wrapper content-tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1" data-toggle="tab">Full Description</a></li>
                    <li class><a href="#tab2" data-toggle="tab">Additional Specification</a></li>
                    <li><a href="#tab3" data-toggle="tab">Shipment Info</a></li>
                    <li><a href="#tab4" data-toggle="tab">Reviews</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab1" itemprop="description">
                        {!! htmlspecialchars_decode($product->description) !!}
                    </div>
                    <div class="tab-pane fade" id="tab2">
                        <div class="panel panel-sea margin-bottom-40">
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab3">
                        this transfer is done by cost on delivery&nbsp;
                    </div>
                    <div class="tab-pane fade" id="tab4">
                        <div class="reviews-view">
                            <div class="reviews-view__list">
                                <h4 class="reviews-view__header">Customer
                                    Reviews</h4>
                                <div class="reviews-list">
                                    <ol class="reviews-list__content">
                                        @if ($orderItems->count() > 0)
                                        @foreach ($orderItems as $orderItem)
                                        <li class="reviews-list__item">
                                            <div class="review">
                                                <div class="review__avatar">
                                                    <img src="{{ asset('/storage/user') }}/{{ $orderItem->Order->User->image }}"
                                                        alt="{{ $orderItem->Order->User->first_name }}" height="20"
                                                        width="20" />
                                                </div>
                                                <div class="review__content">
                                                    <div class="review__author">
                                                        {{ $orderItem->Order->User->first_name }}</div>
                                                    <div class="review__rating">
                                                        <div class="rating">
                                                            <div class="rating__body">
                                                                @for ($i = 0; $i < 5; $i++) 
                                                                @if ($i < $orderItem->Review->rating)
                                                                    <i class="fa fa-star text-secondary"></i>
                                                                    @else
                                                                    <i class="fa fa-star text-warning"></i>
                                                                    @endif

                                                                    @endfor
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="review__text">
                                                        {{ $orderItem->Review->comment }}
                                                    </div>
                                                    <div class="review__date">
                                                        {{ $orderItem->Review->created_at->diffForHumans() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                        @else
                                        <p>No reviews yet on this product.
                                        </p>
                                        @endif
                                    </ol>
                                    {{-- <div class="reviews-list__pagination">
                                        <ul class="pagination
                                                justify-content-center">
                                            <li class="page-item
                                                    disabled">
                                                <a class="page-link
                                                        page-link--with-arrow" href="#" aria-label="Previous">
                                                    <i class="fa fa-angle-left"></i>
                                                </a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item
                                                    active">
                                                <a class="page-link" href="#">2 <span
                                                        class="sr-only">(current)</span></a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link
                                                        page-link--with-arrow" href="#" aria-label="Next">
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Related Products -->

    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="recommendation col-md-12">
                    <div class="row">
                        <h3 class="title">
                            Related Products </h3>
                        @if($r_products->count() > 0)
                        @foreach ($r_products as $product)
                        <div class="col-md-2 col-sm-6 col-xs-6">
                            <div class="recommend_box_1">
                                <a class="link" href="{{ route('product.detail',['product_slug'=>$product->slug]) }}">
                                    @php
                                    $product_image = product_image($product->id)
                                    @endphp
                                    <div class="image-box"
                                        style="background-image:url({{ asset('/storage/product') }}/{{ $product_image }});background-size:cover; background-position:center;">
                                    </div>
                                    <h4 class="caption-title " style="height: 41px;">
                                        <b>{{ $product->title }} </b>
                                    </h4>
                                    @php
                                    $avgrating = 0;
                                    @endphp
                                    @foreach ($product->OrderItem->where('rstatus', 1) as $orderItem)
                                    @php
                                    $avgrating = $avgrating + $orderItem->Review->rating;
                                    @endphp
                                    @endforeach
                                    @for ($i = 1; $i <= 5; $i++) @if ($i <=$avgrating)<i
                                        class="fa fa-star text-warning"></i>
                                        @else
                                        <i class="fa fa-star text-secondary"></i>
                                        @endif
                                        @endfor
                                        <div class="price clearfix">
                                            <ins>
                                                <ins>NPR{{ $product->sale_price }} </ins>
                                                <del itemprop="price">NPR{{ $product->purchase_price }}</del> </ins>
                                        </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@push('scripts')
<!-- JS Start -->
<script src="https://dkten.com/template/front/js/ajax_method.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    console.log(availableTags);
                      $(document).ready(function() {
                  $('.select2').select2();
              });
</script>
<script src="https://dkten.com/template/front/rateit/jquery.rateit.min.js"></script>
<script src="https://dkten.com/template/front/js/theme.js"></script>
<script>
    var $loupe = $(".loupe"),
    loupeWidth = $loupe.width(),
    loupeHeight = $loupe.height();
    
    $(document).on("mouseenter", ".image", function (e) {
    var $currImage = $(this),
        $img = $('<img/>')
        .attr('src', $('img', this).attr("src"))
        .css({ 'width': $currImage.width() * 2, 'height': $currImage.height() * 2 });
    
    $loupe.html($img).fadeIn(100);
    
    $(document).on("mousemove",moveHandler);
                   
    function moveHandler(e) {
        var imageOffset = $currImage.offset(),
            fx = imageOffset.left - loupeWidth / 2,
            fy = imageOffset.top - loupeHeight / 2,
            fh = imageOffset.top + $currImage.height() + loupeHeight / 2,
            fw = imageOffset.left + $currImage.width() + loupeWidth / 2;
        
        $loupe.css({
            'left': e.pageX - 100,
            'top': e.pageY - 100
        });
    
        var loupeOffset = $loupe.offset(),
            lx = loupeOffset.left,
            ly = loupeOffset.top,
            lw = lx + loupeWidth,
            lh = ly + loupeHeight,
            bigy = (ly - loupeHeight / 4 - fy) * 2,
            bigx = (lx - loupeWidth / 4 - fx) * 2;
    
        $img.css({ 'left': -bigx, 'top': -bigy });
    
        if (lx < fx || lh > fh || ly < fy || lw > fw) {
            $img.remove();
            $(document).off("mousemove",moveHandler);
            $loupe.fadeOut(100);
        }
    }
    });
    
</script>

<!-- JS END -->
@endpush