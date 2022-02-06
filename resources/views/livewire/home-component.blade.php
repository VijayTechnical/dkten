<div>
    <section class="page-section featured-products sl-featured">
        <div class="container">
            <h2 class="section-title section-title-lg">
                <span>
                    <span class="thin"> Hot</span>
                    Deals
                    <span class="thin"> Products</span>
                </span>
            </h2>
            <div class="featured-products-carousel">
                @if($hot_deal_products->count() > 0)
                <div class="owl-carousel owl-theme owl-loaded" id="featured-products-carousel">
                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transform: translate3d(-1400px, 0px, 0px); transition: all 0.25s ease 0s; width: 7000px;">
                            @foreach ($hot_deal_products as $product)
                            <div class="owl-item cloned" style="width: 250px; margin-right: 30px;">
                                <div class="thumbnail box-style-1 no-padding">
                                    @php
                                    $product_image = product_image($product->id)
                                    @endphp
                                    <a itemprop="url"
                                        href="{{ route('product.detail',['product_slug'=>$product->slug]) }}">
                                        <div class="media">
                                            <div class="cover"></div>
                                            <div class="media-link image_delay"
                                                data-src="{{ asset('/storage/product') }}/{{ $product_image }}"
                                                style="background-image: url({{ asset('/storage/product') }}/{{ $product_image }}); background-size: cover;">
                                                <div class="sticker green">Discount {{ $product->discount }} %
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="caption text-center" id="cap">
                                        <h4 itemprop="name" class="caption-title">
                                            <a itemprop="url"
                                                href="{{ route('product.detail',['product_slug'=>$product->slug]) }}">
                                                <span itemprop="name">{{ $product->title }}</span>
                                            </a>
                                        </h4>
                                        @php
                                        $avgrating = get_product_rating($product->id);
                                        @endphp
                                        @for ($i = 1; $i <= 5; $i++) @if ($i <=$avgrating)<i
                                            class="fa fa-star text-warning"></i>
                                            @else
                                            <i class="fa fa-star text-secondary"></i>
                                            @endif
                                            @endfor
                                            <div class="price">
                                                <ins>NPR{{ $product->sale_price }} </ins>
                                                <del itemprop="price">NPR{{ $product->purchase_price }}</del>
                                            </div>
                                            <div class="button">
                                                <span class="icon-view left" wire:click.prevent="addToCompare()">
                                                    <strong><i class="fa fa-exchange"></i></strong>
                                                </span>
                                                <span class="icon-view middle"
                                                    wire:click.prevent="wishlist({{ $product->id }},'{{ $product->title }}',{{ $product->sale_price }})">
                                                    <strong><i class="fa fa-heart"></i></strong>
                                                </span>
                                                <span class="icon-view right"
                                                    wire:click.prevent="store({{ $product->id }},'{{ $product->title }}',{{ $product->sale_price }})">
                                                    <strong><i class="fa fa-shopping-cart"></i></strong>
                                                </span>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @else
                <p class="text-center text-danger">No hot deal products found.</p>
                @endif
            </div>
        </div>
    </section>
    <section class="page-section featured-products sl-featured">
        <div class="container">
            <h2 class="section-title section-title-lg">
                <span>
                    <span class="thin"> Latest</span>
                    Featured
                    <span class="thin"> Products</span>
                </span>
            </h2>
            <div class="featured-products-carousel">
                @if($featured_products->count() > 0)
                <div class="owl-carousel procar owl-theme owl-loaded" id="">
                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transform: translate3d(-3640px, 0px, 0px); transition: all 0.25s ease 0s; width: 7000px;">
                            @foreach ($featured_products as $product)
                            <div class="owl-item cloned" style="width: 250px; margin-right: 30px;">
                                <div class="thumbnail box-style-1 no-padding">
                                    @php
                                    $product_image = product_image($product->id)
                                    @endphp
                                    <a itemprop="url"
                                        href="{{ route('product.detail',['product_slug'=>$product->slug]) }}">
                                        <div class="media">
                                            <div class="cover"></div>
                                            <div class="media-link image_delay"
                                                data-src="{{ asset('/storage/product') }}/{{ $product_image }}"
                                                style="background-image: url({{ asset('/storage/product') }}/{{ $product_image }}); background-size: cover;">
                                                <div class="sticker green">Discount {{ $product->discount }} %
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="caption text-center" id="cap">
                                        <h4 itemprop="name" class="caption-title">
                                            <a itemprop="url"
                                                href="{{ route('product.detail',['product_slug'=>$product->slug]) }}">
                                                <span itemprop="name">{{ $product->title }}</span>
                                            </a>
                                        </h4>
                                        @php
                                        $avgrating = get_product_rating($product->id);
                                        @endphp
                                        @for ($i = 1; $i <= 5; $i++) @if ($i <=$avgrating)<i
                                            class="fa fa-star text-warning"></i>
                                            @else
                                            <i class="fa fa-star text-secondary"></i>
                                            @endif
                                            @endfor
                                            <div class="price">
                                                <ins>NPR{{ $product->sale_price }} </ins>
                                                <del itemprop="price">NPR{{ $product->purchase_price }}</del>
                                            </div>
                                            <div class="button">
                                                <span class="icon-view left" wire:click.prevent="addToCompare()">
                                                    <strong><i class="fa fa-exchange"></i></strong>
                                                </span>
                                                <span class="icon-view middle"
                                                    wire:click.prevent="wishlist({{ $product->id }},'{{ $product->title }}',{{ $product->sale_price }})">
                                                    <strong><i class="fa fa-heart"></i></strong>
                                                </span>
                                                <span class="icon-view right"
                                                    wire:click.prevent="store({{ $product->id }},'{{ $product->title }}',{{ $product->sale_price }})">
                                                    <strong><i class="fa fa-shopping-cart"></i></strong>
                                                </span>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @else
                <p class="text-center text-danger">No featured products found.</p>
                @endif
            </div>
        </div>
    </section>
    <section class="page-section featured-products sl-featured">
        <div class="container">
            <h2 class="section-title section-title-lg">
                <span>
                    <span class="thin"> Latest</span>
                    Men Collections
                    <span class="thin"> Products</span>
                </span>
            </h2>
            <div class="featured-products-carousel">
                @if($men_collection_products->count() > 0)
                <div class="owl-carousel procar owl-theme owl-loaded" id="">
                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transform: translate3d(-3640px, 0px, 0px); transition: all 0.25s ease 0s; width: 7000px;">
                            @foreach ($men_collection_products as $product)
                            <div class="owl-item cloned" style="width: 250px; margin-right: 30px;">
                                <div class="thumbnail box-style-1 no-padding">
                                    @php
                                    $product_image = product_image($product->id)
                                    @endphp
                                    <a itemprop="url"
                                        href="{{ route('product.detail',['product_slug'=>$product->slug]) }}">
                                        <div class="media">
                                            <div class="cover"></div>
                                            <div class="media-link image_delay"
                                                data-src="{{ asset('/storage/product') }}/{{ $product_image }}"
                                                style="background-image: url({{ asset('/storage/product') }}/{{ $product_image }}); background-size: cover;">
                                                <div class="sticker green">Discount {{ $product->discount
                                                    }} %</div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="caption text-center" id="cap">
                                        <h4 itemprop="name" class="caption-title">
                                            <a itemprop="url"
                                                href="{{ route('product.detail',['product_slug'=>$product->slug]) }}">
                                                <span itemprop="name">{{ $product->title }}</span>
                                            </a>
                                        </h4>
                                        @php
                                        $avgrating = get_product_rating($product->id);
                                        @endphp
                                        @for ($i = 1; $i <= 5; $i++) @if ($i <=$avgrating)<i
                                            class="fa fa-star text-warning"></i>
                                            @else
                                            <i class="fa fa-star text-secondary"></i>
                                            @endif
                                            @endfor
                                            <div class="price">
                                                <ins>NPR{{ $product->sale_price }} </ins>
                                                <del itemprop="price">NPR{{ $product->purchase_price
                                                    }}</del>
                                            </div>
                                            <div class="button">
                                                <span class="icon-view left" wire:click.prevent="addToCompare()">
                                                    <strong><i class="fa fa-exchange"></i></strong>
                                                </span>
                                                <span class="icon-view middle"
                                                    wire:click.prevent="wishlist({{ $product->id }},'{{ $product->title }}',{{ $product->sale_price }})">
                                                    <strong><i class="fa fa-heart"></i></strong>
                                                </span>
                                                <span class="icon-view right"
                                                    wire:click.prevent="store({{ $product->id }},'{{ $product->title }}',{{ $product->sale_price }})">
                                                    <strong><i class="fa fa-shopping-cart"></i></strong>
                                                </span>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @else
                <p class="text-center text-danger">No men's collection products found.</p>
                @endif
            </div>
        </div>
    </section>
    <section class="page-section featured-products sl-featured">
        <div class="container">
            <h2 class="section-title section-title-lg">
                <span>
                    <span class="thin"> Latest</span>
                    Women’s Collection
                    <span class="thin"> Products</span>
                </span>
            </h2>
            <div class="featured-products-carousel">
                @if($women_collection_products->count() > 0)
                <div class="owl-carousel procar owl-theme owl-loaded" id="">
                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transform: translate3d(-3640px, 0px, 0px); transition: all 0.25s ease 0s; width: 7000px;">
                            @foreach ($women_collection_products as $product)
                            <div class="owl-item cloned" style="width: 250px; margin-right: 30px;">
                                <div class="thumbnail box-style-1 no-padding">
                                    @php
                                    $product_image = product_image($product->id)
                                    @endphp
                                    <a itemprop="url"
                                        href="{{ route('product.detail',['product_slug'=>$product->slug]) }}">
                                        <div class="media">
                                            <div class="cover"></div>
                                            <div class="media-link image_delay"
                                                data-src="{{ asset('/storage/product') }}/{{ $product_image }}"
                                                style="background-image: url({{ asset('/storage/product') }}/{{ $product_image }}); background-size: cover;">
                                                <div class="sticker green">Discount {{
                                                    $product->discount }} %</div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="caption text-center" id="cap">
                                        <h4 itemprop="name" class="caption-title">
                                            <a itemprop="url"
                                                href="{{ route('product.detail',['product_slug'=>$product->slug]) }}">
                                                <span itemprop="name">{{ $product->title }}</span>
                                            </a>
                                        </h4>
                                        @php
                                        $avgrating = get_product_rating($product->id);
                                        @endphp
                                        @for ($i = 1; $i <= 5; $i++) @if ($i <=$avgrating)<i
                                            class="fa fa-star text-warning"></i>
                                            @else
                                            <i class="fa fa-star text-secondary"></i>
                                            @endif
                                            @endfor
                                            <div class="price">
                                                <ins>NPR{{ $product->sale_price }} </ins>
                                                <del itemprop="price">NPR{{ $product->purchase_price
                                                    }}</del>
                                            </div>
                                            <div class="button">
                                                <span class="icon-view left" wire:click.prevent="addToCompare()">
                                                    <strong><i class="fa fa-exchange"></i></strong>
                                                </span>
                                                <span class="icon-view middle"
                                                    wire:click.prevent="wishlist({{ $product->id }},'{{ $product->title }}',{{ $product->sale_price }})">
                                                    <strong><i class="fa fa-heart"></i></strong>
                                                </span>
                                                <span class="icon-view right"
                                                    wire:click.prevent="store({{ $product->id }},'{{ $product->title }}',{{ $product->sale_price }})">
                                                    <strong><i class="fa fa-shopping-cart"></i></strong>
                                                </span>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @else
                <p class="text-center text-danger">No women's collection products found.</p>
                @endif
            </div>
        </div>
    </section>
    <section class="page-section featured-products sl-featured">
        <div class="container">
            <h2 class="section-title section-title-lg">
                <span>
                    <span class="thin"> Latest</span>
                    Bags And Luggage
                    <span class="thin"> Products</span>
                </span>
            </h2>
            <div class="featured-products-carousel">
                @if($bags_and_laugage_products->count() > 0)
                <div class="owl-carousel procar owl-theme owl-loaded" id="">
                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transform: translate3d(-3640px, 0px, 0px); transition: all 0.25s ease 0s; width: 7000px;">
                            @foreach ($bags_and_laugage_products as $product)
                            <div class="owl-item cloned" style="width: 250px; margin-right: 30px;">
                                <div class="thumbnail box-style-1 no-padding">
                                    <a itemprop="url"
                                        href="{{ route('product.detail',['product_slug'=>$product->slug]) }}">
                                        <div class="media">
                                            <div class="cover"></div>
                                            @php
                                            $product_image = product_image($product->id)
                                            @endphp
                                            <div class="media-link image_delay"
                                                data-src="{{ asset('/storage/product') }}/{{ $product_image }}"
                                                style="background-image: url({{ asset('/storage/product') }}/{{ $product_image }}); background-size: cover;">
                                                <div class="sticker green">Discount {{
                                                    $product->discount }} %</div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="caption text-center" id="cap">
                                        <h4 itemprop="name" class="caption-title">
                                            <a itemprop="url"
                                                href="{{ route('product.detail',['product_slug'=>$product->slug]) }}">
                                                <span itemprop="name">{{ $product->title }}</span>
                                            </a>
                                        </h4>
                                        @php
                                        $avgrating = get_product_rating($product->id);
                                        @endphp
                                        @for ($i = 1; $i <= 5; $i++) @if ($i <=$avgrating)<i
                                            class="fa fa-star text-warning"></i>
                                            @else
                                            <i class="fa fa-star text-secondary"></i>
                                            @endif
                                            @endfor
                                            <div class="price">
                                                <ins>NPR{{ $product->sale_price }} </ins>
                                                <del itemprop="price">NPR{{ $product->purchase_price
                                                    }}</del>
                                            </div>
                                            <div class="button">
                                                <span class="icon-view left" wire:click.prevent="addToCompare()">
                                                    <strong><i class="fa fa-exchange"></i></strong>
                                                </span>
                                                <span class="icon-view middle"
                                                    wire:click.prevent="wishlist({{ $product->id }},'{{ $product->title }}',{{ $product->sale_price }})">
                                                    <strong><i class="fa fa-heart"></i></strong>
                                                </span>
                                                <span class="icon-view right"
                                                    wire:click.prevent="store({{ $product->id }},'{{ $product->title }}',{{ $product->sale_price }})">
                                                    <strong><i class="fa fa-shopping-cart"></i></strong>
                                                </span>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @else
                <p class="text-center text-danger">No bags and laugage products found.</p>
                @endif
            </div>
        </div>
    </section>
    <section class="page-section">
        <div class="container">
            @if($women_category)
            <div class="row home_category_theme_1" style="border-top: 2px solid rgba(201,39,49,1);">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <h2 class="category_title" style="background-color:rgba(201,39,49,1);">
                        <span>
                            <a href="{{ route('product.type',['category_id'=>$women_category->id]) }}"
                                style="color:rgba(255,255,255,1)">
                                {{ $women_category->name }} </a>
                        </span>
                    </h2>
                    <div class="row hidden-sm hidden-xs">
                        <div class="col-md-6">
                            <article class="post-wrap" style="border-right: 2px solid rgba(201,39,49,1);">
                                <div class="owl-carousel img-carousel owl-theme owl-loaded">
                                    <div class="owl-stage-outer">
                                        <div class="owl-stage"></div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6">
                            <div class="list-items">
                                <ul>
                                    @if(count($women_category->SubCategory) > 0)
                                    @foreach ($women_category->SubCategory as $key=>$women_sub_category)
                                    <li>
                                        <a href="{{ route('product.type',['category_id'=>$women_category->id,'sub_category_id'=>$women_sub_category->id]) }}">
                                            <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                                            {{ $women_sub_category->name }} </a>
                                    </li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="tabs-wrapper content-tabs">
                        <div class="tab-content">
                            <div class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6 category">
                                        <div class="p-item p-item-type-zoom">
                                            <span class="p-item-hover">
                                                <div class="p-item-info">
                                                    <div class="p-headline">
                                                        <span>{{ $women_category->name }}</span>
                                                        <div class="p-line"></div>
                                                        <div class="p-btn">
                                                            <a href="{{ route('product.type',['category_id'=>$women_category->id]) }}"
                                                                class="btn  btn-theme-transparent btn-theme-xs">Browse</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="p-mask"></div>
                                            </span>
                                            <div class="p-item-img">
                                                <img class="img-responsive image_delay"
                                                    src="{{ asset('/storage/category') }}/{{ $women_category->image }}"
                                                    data-src="{{ asset('/storage/category') }}/{{ $women_category->image }}"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="row">
                                            @if(count($women_category->SubCategory) > 0)
                                            @foreach ($women_category->SubCategory as $key=>$women_sub_category)
                                            <div class="col-md-6 col-sm-6 col-xs-6 sub-category">
                                                <div class="p-item p-item-type-zoom">
                                                    <span class="p-item-hover" target="_blank">
                                                        <div class="p-item-info">
                                                            <div class="p-headline">
                                                                <span>{{ $women_sub_category->name }}</span>
                                                                <div class="p-line"></div>
                                                                <div class="p-btn">
                                                                    <a href="{{ route('product.type',['category_id'=>$women_category->id,'sub_category_id'=>$women_sub_category->id]) }}"
                                                                        class="btn  btn-theme-transparent btn-theme-xs">Browse</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="p-mask"></div>
                                                    </span>
                                                    <div class="p-item-img">
                                                        <img class="img-responsive img-box image_delay"
                                                            src="{{ asset('/storage/category') }}/{{ $women_sub_category->image }}"
                                                            data-src="{{ asset('/storage/category') }}/{{ $women_sub_category->image }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
    <section class="page-section special-products hidden-xs hidden-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-4 product-list">
                    <h4 class="special-products-title">
                        <span>
                            Latest Products </span>
                    </h4>
                    @if($latest_products->count() > 0)
                    @foreach ($latest_products as $key=>$product)
                    <div class="product-box-sm" style="width: 100%; height: 164px;">
                        <div class="row">
                            @php
                            $product_image = product_image($product->id)
                            @endphp
                            <div class="col-md-4" style="max-height:110px; overflow:hidden;">
                                <img class="media-object img-responsive pull-left image_delay" style="width:100%;"
                                    src="{{ asset('/storage/product') }}/{{ $product_image }}"
                                    data-src="{{ asset('/storage/product') }}/{{ $product_image }}" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="inro-section" style="height: 72px;">
                                    <h4 class="title">
                                        <a href="{{ route('product.detail',['product_slug'=>$product->slug]) }}">
                                            {{ $product->title }} </a>
                                    </h4>
                                    <p>
                                        <a
                                            href="{{ route('product.type',['category_id'=>$product->Category->id]) }}">
                                            {{ $product->Category->name }} </a>
                                    </p>
                                </div>
                                @php
                                $avgrating = get_product_rating($product->id);
                                @endphp
                                @for ($i = 1; $i <= 5; $i++) @if ($i <=$avgrating)<i class="fa fa-star text-warning">
                                    </i>
                                    @else
                                    <i class="fa fa-star text-secondary"></i>
                                    @endif
                                    @endfor
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="price pull-left">
                                                <ins>
                                                    NPR{{ $product->sale_price }} </ins>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="buttons">
                                                <span class="btn-icon wishlist pull-right"
                                                    wire:click.prevent="wishlist({{ $product->id }},'{{ $product->title }}',{{ $product->sale_price }})">
                                                    <i class="fa fa-heart"></i>
                                                </span>
                                                <span class="btn-icon pull-right"
                                                    wire:click.prevent="store({{ $product->id }},'{{ $product->title }}',{{ $product->sale_price }})">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="col-md-4 product-list">
                    <h4 class="special-products-title">
                        <span>
                            Recently Viewed </span>
                    </h4>
                    @php
                    $recently_viewed_products = collect(recently_viewed());
                    @endphp
                    @if(count($recently_viewed_products) > 0)
                    @foreach ($recently_viewed_products as $product)
                    <div class="product-box-sm" style="width: 100%; height: 164px;">
                        <div class="row">
                            @php
                            $product_image = product_image($product->id)
                            @endphp
                            <div class="col-md-4" style="max-height:110px; overflow:hidden;">
                                <img class="media-object img-responsive pull-left image_delay" style="width:100%;"
                                    src="{{ asset('/storage/product') }}/{{ $product_image }}"
                                    data-src="{{ asset('/storage/product') }}/{{ $product_image }}" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="inro-section" style="height: 72px;">
                                    <h4 class="title">
                                        <a href="{{ route('product.detail',['product_slug'=>$product->slug]) }}">
                                            {{ $product->title }} </a>
                                    </h4>
                                    <p>
                                        <a
                                            href="{{ route('product.type',['category_id'=>$product->Category->id]) }}">
                                            {{ $product->Category->name }} </a>
                                    </p>
                                </div>
                                @php
                                $avgrating = get_product_rating($product->id);
                                @endphp
                                @for ($i = 1; $i <= 5; $i++) @if ($i <=$avgrating)<i class="fa fa-star text-warning">
                                    </i>
                                    @else
                                    <i class="fa fa-star text-secondary"></i>
                                    @endif
                                    @endfor
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="price pull-left">
                                                <ins>
                                                    NPR{{ $product->sale_price }} </ins>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="buttons">
                                                <span class="btn-icon wishlist pull-right"
                                                    wire:click.prevent="wishlist({{ $product->id }},'{{ $product->title }}',{{ $product->sale_price }})">
                                                    <i class="fa fa-heart"></i>
                                                </span>
                                                <span class="btn-icon pull-right"
                                                    wire:click.prevent="store({{ $product->id }},'{{ $product->title }}',{{ $product->sale_price }})">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="col-md-4 product-list">
                    <h4 class="special-products-title">
                        <span>
                            Most Viewed </span>
                    </h4>
                    @if(count($most_viewed_products) > 0)
                    @foreach ($most_viewed_products as $key=>$product)
                    <div class="product-box-sm" style="width: 100%; height: 164px;">
                        <div class="row">
                            @php
                            $product_image = product_image($product->id)
                            @endphp
                            <div class="col-md-4" style="max-height:110px; overflow:hidden;">
                                <img class="media-object img-responsive pull-left image_delay" style="width:100%;"
                                    src="{{ asset('/storage/product') }}/{{ $product_image }}"
                                    data-src="{{ asset('/storage/product') }}/{{ $product_image }}" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="inro-section" style="height: 72px;">
                                    <h4 class="title">
                                        <a href="{{ route('product.detail',['product_slug'=>$product->slug]) }}">
                                            {{ $product->title }} </a>
                                    </h4>
                                    <p>
                                        <a
                                            href="{{ route('product.type',['category_id'=>$product->Category->id]) }}">
                                            {{ $product->Category->name }} </a>
                                    </p>
                                </div>
                                @php
                                $avgrating = get_product_rating($product->id);
                                @endphp
                                @for ($i = 1; $i <= 5; $i++) @if ($i <=$avgrating)<i class="fa fa-star text-warning">
                                    </i>
                                    @else
                                    <i class="fa fa-star text-secondary"></i>
                                    @endif
                                    @endfor
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="price pull-left">
                                                <ins>
                                                    NPR{{ $product->sale_price }} </ins>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="buttons">
                                                <span class="btn-icon wishlist pull-right"
                                                    wire:click.prevent="wishlist({{ $product->id }},'{{ $product->title }}',{{ $product->sale_price }})">
                                                    <i class="fa fa-heart"></i>
                                                </span>
                                                <span class="btn-icon pull-right"
                                                    wire:click.prevent="store({{ $product->id }},'{{ $product->title }}',{{ $product->sale_price }})">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="page-section image testimonials vendors image_delay"
        data-src="https://dkten.com/uploads/others/parralax_vendor.jpg"
        style="background: url(&quot;https://dkten.com/uploads/others/parralax_vendor.jpg&quot;) center top / cover no-repeat fixed;">
        <div class="container">
            <h2 class="section-title section-title-lg">
                <span>
                    OUR VENDOR </span>
            </h2>
            <div class="partners-carousel">
                @if($vendors->count() > 0)
                <div class="owl-carousel partners owl-theme owl-loaded owl-responsive-1280">
                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transform: translate3d(-1400px, 0px, 0px); transition: all 0s ease 0s; width: 5133.33px;">
                            @foreach ($vendors as $key=>$vendor)
                            <div class="owl-item cloned" style="width: 203.333px; margin-right: 30px;">
                                <div class="p-item p-item-type-zoom" style="padding:5px;">
                                    <a href="{{ route('vendor.detail',['vendor_display_name'=>$vendor->display_name]) }}"
                                        class="p-item-hover">
                                        <div class="p-item-info">
                                            <div class="p-headline">
                                                <span>{{ $vendor->display_name }}</span>
                                                <div class="p-line"></div>
                                                <div class="p-btn">
                                                    <button type="button"
                                                        class="btn  btn-theme-transparent btn-theme-xs">
                                                        Visit </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-mask"></div>
                                    </a>
                                    <div class="p-item-img">
                                        <img class="image_delay"
                                            src="{{ asset('/storage/vendor/logo') }}/{{ $vendor->logo }}"
                                            data-src="{{ asset('/storage/vendor/logo') }}/{{ $vendor->logo }}">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="owl-controls">
                        <div class="owl-nav">
                            <div class="owl-prev" style="display: block;"><i class="fa fa-angle-left"></i></div>
                            <div class="owl-next" style="display: block;"><i class="fa fa-angle-right"></i></div>
                        </div>
                        <div class="owl-dots" style="display: none;"></div>
                    </div>
                </div>
                @else
                <p class="text-danger text-center">No vendors found.</p>
                @endif
            </div>
        </div>
    </section>
</div>
@push('scripts')
<script>
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        loop: true,
        dots: false,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 3,
                loop: true
            },
            480: {
                items: 3,
                loop: true
            },
            769: {
                items: 5,
                loop: true
            }
        }
    });
</script>
<script>
    console.log(availableTags);
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endpush