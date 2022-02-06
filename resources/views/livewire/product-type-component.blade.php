<div>
    <div class="content-area" page_name="product_list/other">
        <!-- PAGE WITH SIDEBAR -->
        <section class="page-section with-sidebar">
            <div class="container">
                <div class="row">
                    <!-- SIDEBAR -->
                    <aside class="col-md-3 sidebar close_now" id="sidebar">
                        <!-- widget shop categories -->
                        <span class="btn btn-theme-transparent pull-left hidden-lg hidden-md" onclick="close_sidebar();"
                            style="border-radius:50%; position: absolute; top:5px;">
                            <i class="fa fa-times"></i>
                        </span>
                        <div class="widget shop-categories">
                            <div class="widget-content">
                                <ul>
                                    <li class="title-for-list">
                                        <a href="#" class="search_cat">
                                            All Products
                                        </a>
                                    </li>
                                    @if(count($categories) > 0)
                                    @foreach ($categories as $key=>$category)
                                    <li>
                                        <span class="arrow search_cat search_cat_click">
                                            <i class="fa fa-angle-down"></i>
                                        </span>
                                        <a href="{{ route('product.type',['category_id'=>$category->id]) }}"
                                            class="search_cat">
                                            {{ $category->name }}
                                        </a>
                                        @if(count($category->SubCategory) > 0)
                                        <ul class="children"
                                            style="margin-left: 10px; display:{{ $category->id == $category_id ? '' : 'none' }};">
                                            @foreach ($category->SubCategory as $key=>$sub_category)
                                            <li>
                                                <a
                                                    href="{{ route('product.type',['category_id'=>$category->id,'sub_category_id'=>$sub_category->id]) }}">
                                                    {{ $sub_category->name }}
                                                    <span class="count"> {{ $sub_category->Product->count() }} </span>
                                                </a>
                                                @if (count($sub_category->Type) > 0)
                                                <ul class="children"
                                                    style="margin-left: 10px; display:{{ $category->id == $category_id ? '' : 'none' }};">
                                                    @foreach ($sub_category->Type as $type)
                                                    <li>
                                                        <a
                                                            href="{{ route('product.type',['category_id'=>$category->id,'sub_category_id'=>$sub_category->id,'type_id'=>$type->id]) }}">
                                                            {{ $type->name }}
                                                            <span class="count"> 1 </span>
                                                        </a>
                                                        @if(count($type->SubType) > 0)
                                                        <ul class="children"
                                                            style="margin-left: 10px; display:{{ $category->id == $category_id ? '' : 'none' }};">
                                                            @foreach ($type->SubType as $key=>$sub_type)
                                                            <li>
                                                                <a
                                                                    href="{{ route('product.type',['category_id'=>$category->id,'sub_category_id'=>$sub_category->id,'type_id'=>$type->id,'sub_type_id'=>$sub_type->id]) }}">
                                                                    {{ $sub_type->name }}
                                                                </a>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                        @endif
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                @endif
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="widget widget-filter-price">
                            <h4 class="widget-title">
                                Price
                            </h4>
                            <div class="widget-content">
                                <div id="slider-range" wire:ignore
                                    class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                    <div class="ui-slider-range ui-widget-header ui-corner-all"
                                        style="width: 100%; left: 0%;"></div><span
                                        class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"
                                        style="left: 0%;"></span><span
                                        class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"
                                        style="left: 100%;"></span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row hidden-sm hidden-xs">
                            <div class="col-md-12">
                                <div class="widget widget-tabs">
                                    <div class="widget-content">
                                        <ul id="tabs" class="nav nav-justified">
                                            <li>
                                                <a href="#tab-s1" data-toggle="tab">
                                                    Popular </a>
                                            </li>
                                            <li class="active">
                                                <a href="#tab-s2" data-toggle="tab">
                                                    Latest </a>
                                            </li>
                                            <li>
                                                <a href="#tab-s3" data-toggle="tab">
                                                    Deals </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <!-- tab 1 -->
                                            <div class="tab-pane fade" id="tab-s1">
                                                <div class="product-list">
                                                    @if($popular_products->count() > 0)
                                                    @foreach ($popular_products as $product)
                                                    <div class="media">
                                                        @php
                                                        $product_image = product_image($product->id)
                                                        @endphp
                                                        <a class="pull-left media-link"
                                                            href="{{ route('product.detail',['product_slug'=>$product->slug]) }}">
                                                            <img class="media-object img-responsive"
                                                                src="{{ asset('/storage/product') }}/{{ $product_image }}"
                                                                alt="{{ $product->title }}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">
                                                                <a
                                                                    href="{{ route('product.detail',['product_slug'=>$product->slug]) }}">
                                                                    {{ $product->title }} </a>
                                                            </h4>
                                                            <div class="rating">
                                                                @php
                                                                $avgrating = get_product_rating($product->id);
                                                                @endphp
                                                                @for ($i = 1; $i <= 5; $i++) @if ($i <=$avgrating)<i
                                                                    class="fa fa-star text-warning"></i>
                                                                    @else
                                                                    <i class="fa fa-star text-secondary"></i>
                                                                    @endif
                                                                    @endfor
                                                            </div>
                                                            <div class="price">
                                                                <div class="price">
                                                                    <ins>NPR{{ $product->sale_price }} </ins>
                                                                    <del itemprop="price">NPR{{ $product->purchase_price
                                                                        }}</del>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- tab 2 -->
                                            <div class="tab-pane fade in active" id="tab-s2">
                                                <div class="product-list">
                                                    @if($latest_products->count() > 0)
                                                    @foreach ($latest_products as $product)
                                                    <div class="media">
                                                        @php
                                                        $product_image = product_image($product->id)
                                                        @endphp
                                                        <a class="pull-left media-link"
                                                            href="{{ route('product.detail',['product_slug'=>$product->slug]) }}">
                                                            <img class="media-object img-responsive"
                                                                src="{{ asset('/storage/product') }}/{{ $product_image }}"
                                                                alt="{{ $product->title }}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">
                                                                <a
                                                                    href="{{ route('product.detail',['product_slug'=>$product->slug]) }}">
                                                                    {{ $product->title }} </a>
                                                            </h4>
                                                            <div class="rating">
                                                                @php
                                                                $avgrating = get_product_rating($product->id);
                                                                @endphp
                                                                @for ($i = 1; $i <= 5; $i++) @if ($i <=$avgrating)<i
                                                                    class="fa fa-star text-warning"></i>
                                                                    @else
                                                                    <i class="fa fa-star text-secondary"></i>
                                                                    @endif
                                                                    @endfor
                                                            </div>
                                                            <div class="price">
                                                                <div class="price">
                                                                    <ins>NPR{{ $product->sale_price }} </ins>
                                                                    <del itemprop="price">NPR{{ $product->purchase_price
                                                                        }}</del>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- tab 3 -->
                                            <div class="tab-pane fade" id="tab-s3">
                                                <div class="product-list">
                                                    @if($deal_products->count() > 0)
                                                    @foreach ($deal_products as $product)
                                                    <div class="media">
                                                        @php
                                                        $product_image = product_image($product->id)
                                                        @endphp
                                                        <a class="pull-left media-link"
                                                            href="{{ route('product.detail',['product_slug'=>$product->slug]) }}">
                                                            <img class="media-object img-responsive"
                                                                src="{{ asset('/storage/product') }}/{{ $product_image }}"
                                                                alt="{{ $product->title }}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">
                                                                <a
                                                                    href="{{ route('product.detail',['product_slug'=>$product->slug]) }}">
                                                                    {{ $product->title }} </a>
                                                            </h4>
                                                            <div class="rating">
                                                                @php
                                                                $avgrating = get_product_rating($product->id);
                                                                @endphp
                                                                @for ($i = 1; $i <= 5; $i++) @if ($i <=$avgrating)<i
                                                                    class="fa fa-star text-warning"></i>
                                                                    @else
                                                                    <i class="fa fa-star text-secondary"></i>
                                                                    @endif
                                                                    @endfor
                                                            </div>
                                                            <div class="price">
                                                                <div class="price">
                                                                    <ins>NPR{{ $product->sale_price }} </ins>
                                                                    <del itemprop="price">NPR{{ $product->purchase_price
                                                                        }}</del>
                                                                </div>
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
                    </aside>
                    <style>
                        .sub_cat {

                            padding-left: 30px !important;

                        }
                    </style>
                    <!-- /SIDEBAR -->

                    <!-- CONTENT -->
                    <div class="col-md-9 col-sm-12 col-xs-12 content" id="content">
                        <!-- shop-sorting -->
                        <div class="shop-sorting">
                            <div class="row">
                                <div class="col-md-10 col-sm-12 col-xs-12 sort-item">
                                    <div class="form-inline">
                                        <div class="form-group selectpicker-wrapper">
                                            <select name="sorting" id="sorting" wire:model.lazy="sorting"
                                                class="form-control">
                                                <option value="default" selected="selected">Default sorting</option>
                                                <option value="date">Sort by newness</option>
                                                <option value="price">Sort by price: low to high</option>
                                                <option value="price-desc">Sort by price: high to low</option>
                                            </select>
                                        </div>
                                        <div class="form-group selectpicker-wrapper">
                                            <select name="brand_id" id="brand_id" class="form-control"
                                                wire:model.lazy="brand_id">
                                                <option value="">Please Select Brand</option>
                                                @if($brands->count() > 0)
                                                @foreach ($brands as $key=>$brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group selectpicker-wrapper">
                                            <select wire:model.lazy="vendor_id" name="vendor_id" id="vendor_id"
                                                class="form-control">
                                                <option value="">Please Select Vendor</option>
                                                @if($vendors->count() > 0)
                                                @foreach ($vendors as $key=>$vendor)
                                                <option value="{{ $vendor->id }}">{{ $vendor->display_name }}
                                                </option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group widget hidden-xs">
                                            <div class="widget-search">
                                                <input class="form-control" type="text" id="texted"
                                                    wire:model="searchTerm" placeholder="Search" spellcheck="false"
                                                    data-ms-editor="true" style="padding: 10px 10px; height:40px;">
                                                <button class="on_click_search txt_src_btn"
                                                    wire:click.prevent="submitData()">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-12 col-xs-12 text-right view_select_btn">
                                    <span class="btn btn-theme-transparent pull-left hidden-lg hidden-md"
                                        wire:click.prevent="addToCompare()">
                                        <i class="fa fa-bars"></i>
                                    </span>
                                    <a class="btn btn-theme-transparent btn-theme-sm grid active"
                                        onclick="set_view('grid')" href="#"><img
                                            src="https://dkten.com/template/front/img/icon-grid.png" alt=""></a>

                                    <a class="btn btn-theme-transparent btn-theme-sm list" onclick="set_view('list')"
                                        href="#"><img src="https://dkten.com/template/front/img/icon-list.png"
                                            alt=""></a>
                                </div>
                            </div>
                        </div>

                        <!-- /shop-sorting -->

                        <div id="result" style="min-height:300px;">
                            <div class="row products grid flex-gutters-10">
                                @if($products->count() > 0)
                                @foreach ($products as $key=>$product)
                                <div
                                    class="col-md-3 col-sm-6 col-xs-6 mb-4 sunil_type_filter sunil_type_236 sunil_subaaa_type_0">
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
                                        <div class="caption text-center">
                                            <h4 class="caption-title" style="height: 61px;">
                                                <a href="{{ route('product.detail',['product_slug'=>$product->slug]) }}">
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
                                                        wire:click.prevent="wishlist({{ $product->id }},'{{ $product->title }}',{{ $product->sale_price }})"
                                                        data-toggle="tooltip" data-original-title="Add To Wishlist">
                                                        <strong><i class="fa fa-heart"></i></strong>
                                                    </span>
                                                    <span class="icon-view right "
                                                        wire:click.prevent="store({{ $product->id }},'{{ $product->title }}',{{ $product->sale_price }})">
                                                        <strong><i class="fa fa-shopping-cart"></i></strong>
                                                    </span>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                            <div class="pagination-wrapper bottom">
                                <ul class="pagination pagination-v2">
                                    {{ $products->links('pagination::bootstrap-4') }}
                                </ul>
                            </div>
                            <!-- /Pagination -->
                        </div>
                    </div>
                    <!-- /CONTENT -->
                </div>
            </div>
        </section>
        <!-- /PAGE WITH SIDEBAR -->
        <style>
            .widget.shop-categories ul ul.children label {

                margin-right: 0;

            }

            .widget.shop-categories ul label {

                display: block;

                margin-right: 20px;

                color: #232323;

                cursor: pointer;

            }

            .pagination-wrapper.bottom {

                text-align-last: center;

            }

            .sort-item {

                display: table;

            }

            .sort-item .form-inline {

                display: table-row;

            }

            .sort-item .form-group {

                display: table-cell;

            }

            .sort-item .widget-search .form-control {

                height: 35px;

                line-height: 35px;

            }

            .sort-item .widget-search button {

                line-height: 26px;

            }

            .sort-item .widget-search button:before {

                height: 30px;

            }

            .shop-sorting .btn-theme-sm {

                padding: 5px 7px;

            }

            .sidebar.close_now {

                position: relative;

                left: 0px;

                opacity: 1;

            }

            @media(max-width: 991px) {

                .sidebar.open {

                    opacity: 1;

                    position: fixed;

                    z-index: 9999;

                    top: -30px;

                    background: #f5f5f5;

                    height: 100vh;

                    overflow-y: auto;

                    padding-top: 50px;

                    left: 0px;

                }

                .sidebar.close_now {

                    position: fixed;

                    left: -500px;

                    opacity: 0;

                }

                .view_select_btn {

                    margin-top: 10px !important;

                }

            }
        </style>
    </div>
</div>
@push('scripts')
<script src="{{ asset('assets/vendor/nouislider/nouislider.min.js') }}"></script>
<script>
    var range = document.getElementById('slider-range');
    noUiSlider.create(range, {
        range: {
            'min': 0,
            'max': 10000000
        },
        step: 10,
        start: [0, 10000000],
        margin: 300,
        connect: true,
        direction: 'ltr',
        orientation: 'horizontal',
        behaviour: 'tap-drag',
        tooltips: true,
    });

    range.noUiSlider.on('update',function(value){
        @this.set('min_price',value[0]);
        @this.set('max_price',value[1]);
    });
</script>
@endpush