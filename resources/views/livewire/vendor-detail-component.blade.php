<div>
    @if($vendor)
    <div class="header header-logo-left" style="border-bottom:none;">
        <div class="header-wrapper" style="padding: 15px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="https://dkten.com/home/vendor_profile/158/A-One-Nepal-Leather-Craft">
                                <img class="img-responsive"
                                    src="{{ asset('/storage/vendor/logo') }}/{{ $vendor->logo }}"
                                    style="height:90px; width:90px" alt="Shop">
                            </a>
                        </div>
                        <!-- /Logo -->
                        <div class="info">

                            <h6>
                                Member Since:
                                {{ $vendor->created_at->format('d') }},{{ $vendor->created_at->format('M') }},{{
                                $vendor->created_at->format('Y') }} <br>
                                Email: {{ $vendor->email }} </h6>

                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <!-- new code -->
                        <div class="vendor_cover_img"
                            style="background-image: url({{ asset('/storage/vendor/cover_image') }}/{{ $vendor->cover_image }})">
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-6 author_rating">
                                <h6>Vendor Rating</h6>
                                <div class="rating ratings_show" data-original-title="0" data-toggle="tooltip"
                                    data-placement="left">
                                    <span class="star "></span>
                                    <span class="star "></span>
                                    <span class="star "></span>
                                    <span class="star "></span>
                                    <span class="star "></span>
                                </div>
                            </div>

                            <ul class="col-md-6 social-icons social-icons-ven hidden-sm hidden-xs"
                                style="margin-bottom:0px;margin-top:0px;">
                                <li><a href="{{ $vendor->facebook }}" class="facebook"><i
                                            class="fab fa-facebook"></i></a></li>
                                <li><a href="{{ $vendor->twitter }}" class="twitter"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li><a href="{{ $vendor->google }}" class="google"><i
                                            class="fab fa-google-plus"></i></a></li>
                                <li><a href="{{ $vendor->instagram }}" class="instagram"><i
                                            class="fab fa-instagram"></i></a></li>
                                <li><a href="{{ $vendor->youtube }}" class="youtube"><i class="fab fa-youtube"></i></a>
                                </li>
                                <li><a href="{{ $vendor->whatsapp }}" class="whatsapp"><i
                                            class="fab fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-md-offset-6 profile_top">
                        <div class="row">
                            <div class="col-md-12" style="margin-top:0px;">
                                <div class="top_nav">
                                    <ul>
                                        <li class="active">
                                            <a class="active" id="profile-tab" data-toggle="tab" href="#profile"
                                                role="tab" aria-controls="profile" aria-selected="true"
                                                wire:ignore>About Vendor</a>
                                        </li>
                                        <li>
                                            <a id="all-products-tab" data-toggle="tab" href="#all-products" role="tab"
                                                aria-controls="all-products" aria-selected="false" wire:ignore>All
                                                Products
                                            </a>
                                        </li>
                                        <li>
                                            <a id="featured-products-tab" data-toggle="tab" href="#featured-products" role="tab"
                                                aria-controls="featured-products" aria-selected="false" wire:ignore>Featured
                                                Products
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://dkten.com/index.php/home/store_locator/AB Tech"
                                                target="_blank">
                                                Find Location </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="tab-content" id="myTabContent">
        <div class="page-section tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab"
            wire:ignore.self>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="slider">
                            <!-- BREADCRUMBS -->
                            <div class="main-slider">
                                <div class="owl-carousel owl-theme owl-loaded" id="main-slider"
                                    style="max-height:350px; overflow:hidden">
                                    <div class="owl-stage-outer">
                                        <div class="owl-stage"
                                            style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1370px;">
                                            @php
                                            $vsliders =
                                            DB::table('vsliders')->where('vendor_id',$vendor->id)->where('status',true)->get();
                                            @endphp
                                            @if($vsliders->count() > 0)
                                            @foreach($vsliders as $key=>$vslider)
                                            <div class="owl-item active" style="width: 1370px; margin-right: 0px;">
                                                <div class="item slide1 alt">
                                                    <img class="slide-img"
                                                        src="{{ asset('/storage/vendor/slider/banner_image') }}/{{ $vslider->banner_image }}"
                                                        alt="">
                                                    <div class="caption">
                                                        <div class="div-table">
                                                            <div class="div-cell">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="owl-controls">
                                        <div class="owl-nav">
                                            <div class="owl-prev" style=""><i class="fa fa-angle-left"></i></div>
                                            <div class="owl-next" style=""><i class="fa fa-angle-right"></i></div>
                                        </div>
                                        <div class="owl-dots" style="">
                                            <div class="owl-dot active"><span></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <h2 class="section-title">
                    <span>About {{ $vendor->display_name }}</span>
                </h2>
                <div class="partners-carousel">
                    <p>{{ $vendor->about }}</p>
                </div>
            </div>
        </div>
        <div class="page-section with-sidebar tab-pane fade" id="all-products" role="tabpanel"
            aria-labelledby="all-products-tab" wire:ignore.self>
            <div class="container">
                <div class="row">
                    <!-- CONTENT -->
                    <div class="col-md-9 content" id="content">
                        <div id="featured-content">
                            <!-- Blog List -->
                            <div class="products list">
                                <div id="result" style="display: block;">
                                    <div class="row products grid">
                                        @if($products->count() > 0)
                                        @foreach ($products as $key=>$product)
                                        <div
                                            class="col-md-3 col-sm-6 col-xs-6 mb-4">
                                            <div class="thumbnail box-style-1 no-padding" itemscope=""
                                                itemtype="http://schema.org/Product">
                                                @php
                                                $product_images = explode(',',$product->images);
                                                @endphp
                                                @if(count($product_images) > 0)
                                                @foreach ($product_images as $key=>$product_image)
                                                @if($key == 1)
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
                                                @endif
                                                @endforeach
                                                @endif
                                                <div class="caption text-center" id="cap">
                                                    <h4 itemprop="name" class="caption-title" style="height: 61px;">
                                                        <a itemprop="url"
                                                            href="{{ route('product.detail',['product_slug'=>$product->slug]) }}">
                                                            <span itemprop="name">{{ $product->title }}</span>
                                                        </a>
                                                    </h4>
                                                    <span style="display: none" itemprop="ratingValue">0</span>
                                                    <span style="display: none" itemprop="reviewCount">0</span>
                                                    <div class="rateit rateit-bg" data-rateit-value="0"
                                                        data-rateit-ispreset="true" data-rateit-readonly="true"
                                                        itemprop="aggregateRating" itemscope=""
                                                        itemtype="https://schema.org/AggregateRating"><button
                                                            id="rateit-reset-2" type="button" data-role="none"
                                                            class="rateit-reset" aria-label="reset rating"
                                                            aria-controls="rateit-range-2"
                                                            style="display: none;"><span></span></button>
                                                        <div id="rateit-range-2" class="rateit-range" role="slider"
                                                            aria-label="rating" aria-owns="rateit-reset-2"
                                                            aria-valuemin="0" aria-valuemax="5" aria-valuenow="0"
                                                            style="width: 80px; height: 16px;" aria-readonly="true">
                                                            <div class="rateit-empty"></div>
                                                            <div class="rateit-selected rateit-preset"
                                                                style="height: 16px; width: 0px;"></div>
                                                            <div class="rateit-hover" style="height: 16px;"></div>
                                                        </div>
                                                    </div>

                                                    <div class="price">
                                                        <ins>NPR{{ $product->sale_price }} </ins>
                                                        <del itemprop="price">NPR{{ $product->purchase_price }}</del>
                                                    </div>
                                                    <div class="button">
                                                        <span class="icon-view left" onclick="do_compare(404,event)"
                                                            data-toggle="tooltip" data-original-title="Compare">
                                                            <strong><i class="fa fa-exchange"></i></strong>
                                                        </span>
                                                        <span class="icon-view middle"
                                                            wire:click.prevent="wishlist({{ $product->id }},'{{ $product->title }}',{{ $product->sale_price }})"
                                                            data-toggle="tooltip" data-original-title="Add To Wishlist">
                                                            <strong><i class="fa fa-heart"></i></strong>
                                                        </span>
                                                        <span class="icon-view right "
                                                            wire:click.prevent="store({{ $product->id }},'{{ $product->title }}',{{ $product->sale_price }})"
                                                            data-toggle="tooltip" data-original-title="Add To Cart">
                                                            <strong><i class="fa fa-shopping-cart"></i></strong>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                    <style type="text/css">
                                        h4.caption-title {
                                            height: 61px;
                                        }

                                        .products.list .thumbnail .price {
                                            float: none;
                                            margin-bottom: 0;
                                        }
                                    </style>
                                </div>
                            </div>
                            <!-- /Blog list -->
                        </div>
                    </div>
                    <!-- /CONTENT -->
                </div>
            </div>
        </div>
        <div class="page-section with-sidebar tab-pane fade" id="featured-products" role="tabpanel"
            aria-labelledby="featured-products-tab" wire:ignore.self>
            <div class="container">
                <div class="row">
                    <!-- CONTENT -->
                    <div class="col-md-9 content" id="content">
                        <div id="featured-content">
                            <!-- Blog List -->
                            <div class="products list">
                                <div id="result" style="display: block;">
                                    <div class="row products grid">
                                        @if($featured_products->count() > 0)
                                        @foreach ($featured_products as $key=>$product)
                                        <div
                                            class="col-md-3 col-sm-6 col-xs-6 mb-4">
                                            <div class="thumbnail box-style-1 no-padding" itemscope=""
                                                itemtype="http://schema.org/Product">
                                                @php
                                                $product_images = explode(',',$product->images);
                                                @endphp
                                                @if(count($product_images) > 0)
                                                @foreach ($product_images as $key=>$product_image)
                                                @if($key == 1)
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
                                                @endif
                                                @endforeach
                                                @endif
                                                <div class="caption text-center" id="cap">
                                                    <h4 itemprop="name" class="caption-title" style="height: 61px;">
                                                        <a itemprop="url"
                                                            href="{{ route('product.detail',['product_slug'=>$product->slug]) }}">
                                                            <span itemprop="name">{{ $product->title }}</span>
                                                        </a>
                                                    </h4>
                                                    <span style="display: none" itemprop="ratingValue">0</span>
                                                    <span style="display: none" itemprop="reviewCount">0</span>
                                                    <div class="rateit rateit-bg" data-rateit-value="0"
                                                        data-rateit-ispreset="true" data-rateit-readonly="true"
                                                        itemprop="aggregateRating" itemscope=""
                                                        itemtype="https://schema.org/AggregateRating"><button
                                                            id="rateit-reset-2" type="button" data-role="none"
                                                            class="rateit-reset" aria-label="reset rating"
                                                            aria-controls="rateit-range-2"
                                                            style="display: none;"><span></span></button>
                                                        <div id="rateit-range-2" class="rateit-range" role="slider"
                                                            aria-label="rating" aria-owns="rateit-reset-2"
                                                            aria-valuemin="0" aria-valuemax="5" aria-valuenow="0"
                                                            style="width: 80px; height: 16px;" aria-readonly="true">
                                                            <div class="rateit-empty"></div>
                                                            <div class="rateit-selected rateit-preset"
                                                                style="height: 16px; width: 0px;"></div>
                                                            <div class="rateit-hover" style="height: 16px;"></div>
                                                        </div>
                                                    </div>

                                                    <div class="price">
                                                        <ins>NPR{{ $product->sale_price }} </ins>
                                                        <del itemprop="price">NPR{{ $product->purchase_price }}</del>
                                                    </div>
                                                    <div class="button">
                                                        <span class="icon-view left" onclick="do_compare(404,event)"
                                                            data-toggle="tooltip" data-original-title="Compare">
                                                            <strong><i class="fa fa-exchange"></i></strong>
                                                        </span>
                                                        <span class="icon-view middle"
                                                            wire:click.prevent="wishlist({{ $product->id }},'{{ $product->title }}',{{ $product->sale_price }})"
                                                            data-toggle="tooltip" data-original-title="Add To Wishlist">
                                                            <strong><i class="fa fa-heart"></i></strong>
                                                        </span>
                                                        <span class="icon-view right "
                                                            wire:click.prevent="store({{ $product->id }},'{{ $product->title }}',{{ $product->sale_price }})"
                                                            data-toggle="tooltip" data-original-title="Add To Cart">
                                                            <strong><i class="fa fa-shopping-cart"></i></strong>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                    <style type="text/css">
                                        h4.caption-title {
                                            height: 61px;
                                        }

                                        .products.list .thumbnail .price {
                                            float: none;
                                            margin-bottom: 0;
                                        }
                                    </style>
                                </div>
                            </div>
                            <!-- /Blog list -->
                        </div>
                    </div>
                    <!-- /CONTENT -->
                </div>
            </div>
        </div>
    </div>
    @endif
</div>