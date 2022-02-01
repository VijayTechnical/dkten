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
                                        <a href="{{ route('product.type',['category_slug'=>$category->slug]) }}"
                                            class="search_cat">
                                            {{ $category->name }}
                                        </a>
                                        @if(count($category->SubCategory) > 0)
                                        <ul class="children"
                                            style="margin-left: 10px; display:{{ $category->slug === $category_slug ? '' : 'none' }};">
                                            @foreach ($category->SubCategory as $key=>$sub_category)
                                            <li>
                                                <a
                                                    href="{{ route('product.type',['category_slug'=>$category->slug,'sub_category_slug'=>$sub_category->slug]) }}">
                                                    {{ $sub_category->name }}
                                                    <span class="count"> {{ $sub_category->Product->count() }} </span>
                                                </a>
                                                @if (count($sub_category->Type) > 0)
                                                <ul class="children"
                                                    style="margin-left: 10px; display:{{ $category->slug === $category_slug ? '' : 'none' }};">
                                                    @foreach ($sub_category->Type as $type)
                                                    <li>
                                                        <a
                                                            href="{{ route('product.type',['category_slug'=>$category->slug,'sub_category_slug'=>$sub_category->slug,'type_slug'=>$type->slug]) }}">
                                                            {{ $type->name }}
                                                            <span class="count"> 1 </span>
                                                        </a>
                                                        @if(count($type->SubType) > 0)
                                                        <ul class="children"
                                                            style="margin-left: 10px; display:{{ $category->slug === $category_slug ? '' : 'none' }};">
                                                            @foreach ($type->SubType as $key=>$sub_type)
                                                            <li>
                                                                <a
                                                                    href="{{ route('product.type',['category_slug'=>$category->slug,'sub_category_slug'=>$sub_category->slug,'type_slug'=>$type->slug,'sub_type_slug'=>$sub_type->slug]) }}">
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
                                                    <div class="media">
                                                        <a class="pull-left media-link"
                                                            href="https://dkten.com/home/product_view/369/Half-Cup-Padded-wired-Bra">
                                                            <img class="media-object img-responsive"
                                                                src="https://dkten.com/uploads/product_image/product_369_1_thumb.jpg"
                                                                alt="">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">
                                                                <a
                                                                    href="https://dkten.com/home/product_view/369/Half-Cup-Padded-wired-Bra">
                                                                    Half Cup Padded wired Bra </a>
                                                            </h4>
                                                            <div class="rateit rateit-bg" data-rateit-value="0"
                                                                data-rateit-ispreset="true" data-rateit-readonly="true">
                                                                <button id="rateit-reset-2" type="button"
                                                                    data-role="none" class="rateit-reset"
                                                                    aria-label="reset rating"
                                                                    aria-controls="rateit-range-2"
                                                                    style="display: none;"><span></span></button>
                                                                <div id="rateit-range-2" class="rateit-range"
                                                                    role="slider" aria-label="rating"
                                                                    aria-owns="rateit-reset-2" aria-valuemin="0"
                                                                    aria-valuemax="5" aria-valuenow="0"
                                                                    style="width: 80px; height: 16px;"
                                                                    aria-readonly="true">
                                                                    <div class="rateit-empty"></div>
                                                                    <div class="rateit-selected rateit-preset"
                                                                        style="height: 16px; width: 0px;"></div>
                                                                    <div class="rateit-hover" style="height: 16px;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="rating">
                                                                <div style="display: none" class="rating ratings_show"
                                                                    data-original-title="0" data-toggle="tooltip"
                                                                    data-placement="left">
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                </div>
                                                            </div>
                                                            <div class="price">

                                                                <ins>NPR580.00 </ins>
                                                                <del>NPR725.00</del>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <a class="pull-left media-link"
                                                            href="https://dkten.com/home/product_view/315/Virjeans-Stretchy-Ripped-Design-Biker-Denim-Jeans">
                                                            <img class="media-object img-responsive"
                                                                src="https://dkten.com/uploads/product_image/product_315_1_thumb.jpg"
                                                                alt="">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">
                                                                <a
                                                                    href="https://dkten.com/home/product_view/315/Virjeans-Stretchy-Ripped-Design-Biker-Denim-Jeans">
                                                                    Virjeans - Stretchy Ripped Design Biker Denim Jeans
                                                                </a>
                                                            </h4>
                                                            <div class="rateit rateit-bg" data-rateit-value="4.50"
                                                                data-rateit-ispreset="true" data-rateit-readonly="true">
                                                                <button id="rateit-reset-3" type="button"
                                                                    data-role="none" class="rateit-reset"
                                                                    aria-label="reset rating"
                                                                    aria-controls="rateit-range-3"
                                                                    style="display: none;"><span></span></button>
                                                                <div id="rateit-range-3" class="rateit-range"
                                                                    role="slider" aria-label="rating"
                                                                    aria-owns="rateit-reset-3" aria-valuemin="0"
                                                                    aria-valuemax="5" aria-valuenow="4.5"
                                                                    style="width: 80px; height: 16px;"
                                                                    aria-readonly="true">
                                                                    <div class="rateit-empty"></div>
                                                                    <div class="rateit-selected rateit-preset"
                                                                        style="height: 16px; width: 72px;"></div>
                                                                    <div class="rateit-hover" style="height: 16px;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="rating">
                                                                <div style="display: none" class="rating ratings_show"
                                                                    data-original-title="4.50" data-toggle="tooltip"
                                                                    data-placement="left">
                                                                    <span class="star "></span>
                                                                    <span class="star active"></span>
                                                                    <span class="star active"></span>
                                                                    <span class="star active"></span>
                                                                    <span class="star active"></span>
                                                                </div>
                                                            </div>
                                                            <div class="price">

                                                                <ins>NPR1,425.00 </ins>
                                                                <del>NPR1,500.00</del>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <a class="pull-left media-link"
                                                            href="https://dkten.com/home/product_view/426/Mens-Genuine-Leather-Biker-Jacket-Brown">
                                                            <img class="media-object img-responsive"
                                                                src="https://dkten.com/uploads/product_image/product_426_1_thumb.jpg"
                                                                alt="">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">
                                                                <a
                                                                    href="https://dkten.com/home/product_view/426/Mens-Genuine-Leather-Biker-Jacket-Brown">
                                                                    Men's Genuine Leather Biker Jacket Brown </a>
                                                            </h4>
                                                            <div class="rateit rateit-bg" data-rateit-value="0"
                                                                data-rateit-ispreset="true" data-rateit-readonly="true">
                                                                <button id="rateit-reset-4" type="button"
                                                                    data-role="none" class="rateit-reset"
                                                                    aria-label="reset rating"
                                                                    aria-controls="rateit-range-4"
                                                                    style="display: none;"><span></span></button>
                                                                <div id="rateit-range-4" class="rateit-range"
                                                                    role="slider" aria-label="rating"
                                                                    aria-owns="rateit-reset-4" aria-valuemin="0"
                                                                    aria-valuemax="5" aria-valuenow="0"
                                                                    style="width: 80px; height: 16px;"
                                                                    aria-readonly="true">
                                                                    <div class="rateit-empty"></div>
                                                                    <div class="rateit-selected rateit-preset"
                                                                        style="height: 16px; width: 0px;"></div>
                                                                    <div class="rateit-hover" style="height: 16px;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="rating">
                                                                <div style="display: none" class="rating ratings_show"
                                                                    data-original-title="0" data-toggle="tooltip"
                                                                    data-placement="left">
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                </div>
                                                            </div>
                                                            <div class="price">

                                                                <ins>NPR12,000.00 </ins>
                                                                <del>NPR15,000.00</del>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <a class="pull-left media-link"
                                                            href="https://dkten.com/home/product_view/398/Straight-Long-Kurti-Set">
                                                            <img class="media-object img-responsive"
                                                                src="https://dkten.com/uploads/product_image/product_398_1_thumb.jpg"
                                                                alt="">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">
                                                                <a
                                                                    href="https://dkten.com/home/product_view/398/Straight-Long-Kurti-Set">
                                                                    Straight Long Kurti Set </a>
                                                            </h4>
                                                            <div class="rateit rateit-bg" data-rateit-value="0"
                                                                data-rateit-ispreset="true" data-rateit-readonly="true">
                                                                <button id="rateit-reset-5" type="button"
                                                                    data-role="none" class="rateit-reset"
                                                                    aria-label="reset rating"
                                                                    aria-controls="rateit-range-5"
                                                                    style="display: none;"><span></span></button>
                                                                <div id="rateit-range-5" class="rateit-range"
                                                                    role="slider" aria-label="rating"
                                                                    aria-owns="rateit-reset-5" aria-valuemin="0"
                                                                    aria-valuemax="5" aria-valuenow="0"
                                                                    style="width: 80px; height: 16px;"
                                                                    aria-readonly="true">
                                                                    <div class="rateit-empty"></div>
                                                                    <div class="rateit-selected rateit-preset"
                                                                        style="height: 16px; width: 0px;"></div>
                                                                    <div class="rateit-hover" style="height: 16px;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="rating">
                                                                <div style="display: none" class="rating ratings_show"
                                                                    data-original-title="0" data-toggle="tooltip"
                                                                    data-placement="left">
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                </div>
                                                            </div>
                                                            <div class="price">

                                                                <ins>NPR3,500.00 </ins>
                                                                <del>NPR4,375.00</del>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- tab 2 -->
                                            <div class="tab-pane fade in active" id="tab-s2">
                                                <div class="product-list">
                                                    <div class="media">
                                                        <a class="pull-left media-link"
                                                            href="https://dkten.com/home/product_view/435/Mens-Casual-Fashion-Trouser">
                                                            <img class="media-object img-responsive"
                                                                src="https://dkten.com/uploads/product_image/product_435_1_thumb.jpg"
                                                                alt="">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">
                                                                <a
                                                                    href="https://dkten.com/home/product_view/435/Mens-Casual-Fashion-Trouser">
                                                                    Men's Casual Fashion Trouser </a>
                                                            </h4>
                                                            <div class="rateit rateit-bg" data-rateit-value="0"
                                                                data-rateit-ispreset="true" data-rateit-readonly="true">
                                                                <button id="rateit-reset-6" type="button"
                                                                    data-role="none" class="rateit-reset"
                                                                    aria-label="reset rating"
                                                                    aria-controls="rateit-range-6"
                                                                    style="display: none;"><span></span></button>
                                                                <div id="rateit-range-6" class="rateit-range"
                                                                    role="slider" aria-label="rating"
                                                                    aria-owns="rateit-reset-6" aria-valuemin="0"
                                                                    aria-valuemax="5" aria-valuenow="0"
                                                                    style="width: 80px; height: 16px;"
                                                                    aria-readonly="true">
                                                                    <div class="rateit-empty"></div>
                                                                    <div class="rateit-selected rateit-preset"
                                                                        style="height: 16px; width: 0px;"></div>
                                                                    <div class="rateit-hover" style="height: 16px;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="rating">
                                                                <div style="display: none" class="rating ratings_show"
                                                                    data-original-title="0" data-toggle="tooltip"
                                                                    data-placement="left">
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                </div>
                                                            </div>
                                                            <div class="price">

                                                                <ins>NPR1,650.00 </ins>
                                                                <del>NPR2,000.00</del>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <a class="pull-left media-link"
                                                            href="https://dkten.com/home/product_view/434/Baby-Canopy-handle-Tricycle">
                                                            <img class="media-object img-responsive"
                                                                src="https://dkten.com/uploads/product_image/product_434_1_thumb.jpg"
                                                                alt="">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">
                                                                <a
                                                                    href="https://dkten.com/home/product_view/434/Baby-Canopy-handle-Tricycle">
                                                                    Baby Canopy handle Tricycle </a>
                                                            </h4>
                                                            <div class="rateit rateit-bg" data-rateit-value="0"
                                                                data-rateit-ispreset="true" data-rateit-readonly="true">
                                                                <button id="rateit-reset-7" type="button"
                                                                    data-role="none" class="rateit-reset"
                                                                    aria-label="reset rating"
                                                                    aria-controls="rateit-range-7"
                                                                    style="display: none;"><span></span></button>
                                                                <div id="rateit-range-7" class="rateit-range"
                                                                    role="slider" aria-label="rating"
                                                                    aria-owns="rateit-reset-7" aria-valuemin="0"
                                                                    aria-valuemax="5" aria-valuenow="0"
                                                                    style="width: 80px; height: 16px;"
                                                                    aria-readonly="true">
                                                                    <div class="rateit-empty"></div>
                                                                    <div class="rateit-selected rateit-preset"
                                                                        style="height: 16px; width: 0px;"></div>
                                                                    <div class="rateit-hover" style="height: 16px;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="rating">
                                                                <div style="display: none" class="rating ratings_show"
                                                                    data-original-title="0" data-toggle="tooltip"
                                                                    data-placement="left">
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                </div>
                                                            </div>
                                                            <div class="price">

                                                                <ins>NPR6,500.00 </ins>
                                                                <del>NPR10,000.00</del>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <a class="pull-left media-link"
                                                            href="https://dkten.com/home/product_view/433/Squirrel-Baby-Scooter">
                                                            <img class="media-object img-responsive"
                                                                src="https://dkten.com/uploads/product_image/product_433_1_thumb.jpg"
                                                                alt="">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">
                                                                <a
                                                                    href="https://dkten.com/home/product_view/433/Squirrel-Baby-Scooter">
                                                                    Squirrel Baby Scooter </a>
                                                            </h4>
                                                            <div class="rateit rateit-bg" data-rateit-value="0"
                                                                data-rateit-ispreset="true" data-rateit-readonly="true">
                                                                <button id="rateit-reset-8" type="button"
                                                                    data-role="none" class="rateit-reset"
                                                                    aria-label="reset rating"
                                                                    aria-controls="rateit-range-8"
                                                                    style="display: none;"><span></span></button>
                                                                <div id="rateit-range-8" class="rateit-range"
                                                                    role="slider" aria-label="rating"
                                                                    aria-owns="rateit-reset-8" aria-valuemin="0"
                                                                    aria-valuemax="5" aria-valuenow="0"
                                                                    style="width: 80px; height: 16px;"
                                                                    aria-readonly="true">
                                                                    <div class="rateit-empty"></div>
                                                                    <div class="rateit-selected rateit-preset"
                                                                        style="height: 16px; width: 0px;"></div>
                                                                    <div class="rateit-hover" style="height: 16px;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="rating">
                                                                <div style="display: none" class="rating ratings_show"
                                                                    data-original-title="0" data-toggle="tooltip"
                                                                    data-placement="left">
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                </div>
                                                            </div>
                                                            <div class="price">

                                                                <ins>NPR9,500.00 </ins>
                                                                <del>NPR11,875.00</del>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <a class="pull-left media-link"
                                                            href="https://dkten.com/home/product_view/432/Indian-Fashion-Tunic-Tops-Cotton-Kurti-Pant-Set-With-Dupatta-for-Women">
                                                            <img class="media-object img-responsive"
                                                                src="https://dkten.com/uploads/product_image/product_432_1_thumb.jpg"
                                                                alt="">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">
                                                                <a
                                                                    href="https://dkten.com/home/product_view/432/Indian-Fashion-Tunic-Tops-Cotton-Kurti-Pant-Set-With-Dupatta-for-Women">
                                                                    Indian Fashion Tunic Tops Cotton Kurti Pant Set With
                                                                    Dupatta for Women </a>
                                                            </h4>
                                                            <div class="rateit rateit-bg" data-rateit-value="0"
                                                                data-rateit-ispreset="true" data-rateit-readonly="true">
                                                                <button id="rateit-reset-9" type="button"
                                                                    data-role="none" class="rateit-reset"
                                                                    aria-label="reset rating"
                                                                    aria-controls="rateit-range-9"
                                                                    style="display: none;"><span></span></button>
                                                                <div id="rateit-range-9" class="rateit-range"
                                                                    role="slider" aria-label="rating"
                                                                    aria-owns="rateit-reset-9" aria-valuemin="0"
                                                                    aria-valuemax="5" aria-valuenow="0"
                                                                    style="width: 80px; height: 16px;"
                                                                    aria-readonly="true">
                                                                    <div class="rateit-empty"></div>
                                                                    <div class="rateit-selected rateit-preset"
                                                                        style="height: 16px; width: 0px;"></div>
                                                                    <div class="rateit-hover" style="height: 16px;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="rating">
                                                                <div style="display: none" class="rating ratings_show"
                                                                    data-original-title="0" data-toggle="tooltip"
                                                                    data-placement="left">
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                </div>
                                                            </div>
                                                            <div class="price">

                                                                <ins>NPR3,500.00 </ins>
                                                                <del>NPR4,375.00</del>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- tab 3 -->
                                            <div class="tab-pane fade" id="tab-s3">
                                                <div class="product-list">
                                                    <div class="media">
                                                        <a class="pull-left media-link"
                                                            href="https://dkten.com/home/product_view/434/Baby-Canopy-handle-Tricycle">
                                                            <img class="media-object img-responsive"
                                                                src="https://dkten.com/uploads/product_image/product_434_1_thumb.jpg"
                                                                alt="">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">
                                                                <a
                                                                    href="https://dkten.com/home/product_view/434/Baby-Canopy-handle-Tricycle">
                                                                    Baby Canopy handle Tricycle </a>
                                                            </h4>
                                                            <div class="rateit rateit-bg" data-rateit-value="0"
                                                                data-rateit-ispreset="true" data-rateit-readonly="true">
                                                                <button id="rateit-reset-10" type="button"
                                                                    data-role="none" class="rateit-reset"
                                                                    aria-label="reset rating"
                                                                    aria-controls="rateit-range-10"
                                                                    style="display: none;"><span></span></button>
                                                                <div id="rateit-range-10" class="rateit-range"
                                                                    role="slider" aria-label="rating"
                                                                    aria-owns="rateit-reset-10" aria-valuemin="0"
                                                                    aria-valuemax="5" aria-valuenow="0"
                                                                    style="width: 80px; height: 16px;"
                                                                    aria-readonly="true">
                                                                    <div class="rateit-empty"></div>
                                                                    <div class="rateit-selected rateit-preset"
                                                                        style="height: 16px; width: 0px;"></div>
                                                                    <div class="rateit-hover" style="height: 16px;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="rating">
                                                                <div style="display: none" class="rating ratings_show"
                                                                    data-original-title="0" data-toggle="tooltip"
                                                                    data-placement="left">
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                </div>
                                                            </div>
                                                            <div class="price">

                                                                <ins>NPR6,500.00 </ins>
                                                                <del>NPR10,000.00</del>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <a class="pull-left media-link"
                                                            href="https://dkten.com/home/product_view/433/Squirrel-Baby-Scooter">
                                                            <img class="media-object img-responsive"
                                                                src="https://dkten.com/uploads/product_image/product_433_1_thumb.jpg"
                                                                alt="">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">
                                                                <a
                                                                    href="https://dkten.com/home/product_view/433/Squirrel-Baby-Scooter">
                                                                    Squirrel Baby Scooter </a>
                                                            </h4>
                                                            <div class="rateit rateit-bg" data-rateit-value="0"
                                                                data-rateit-ispreset="true" data-rateit-readonly="true">
                                                                <button id="rateit-reset-11" type="button"
                                                                    data-role="none" class="rateit-reset"
                                                                    aria-label="reset rating"
                                                                    aria-controls="rateit-range-11"
                                                                    style="display: none;"><span></span></button>
                                                                <div id="rateit-range-11" class="rateit-range"
                                                                    role="slider" aria-label="rating"
                                                                    aria-owns="rateit-reset-11" aria-valuemin="0"
                                                                    aria-valuemax="5" aria-valuenow="0"
                                                                    style="width: 80px; height: 16px;"
                                                                    aria-readonly="true">
                                                                    <div class="rateit-empty"></div>
                                                                    <div class="rateit-selected rateit-preset"
                                                                        style="height: 16px; width: 0px;"></div>
                                                                    <div class="rateit-hover" style="height: 16px;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="rating">
                                                                <div style="display: none" class="rating ratings_show"
                                                                    data-original-title="0" data-toggle="tooltip"
                                                                    data-placement="left">
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                </div>
                                                            </div>
                                                            <div class="price">

                                                                <ins>NPR9,500.00 </ins>
                                                                <del>NPR11,875.00</del>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <a class="pull-left media-link"
                                                            href="https://dkten.com/home/product_view/432/Indian-Fashion-Tunic-Tops-Cotton-Kurti-Pant-Set-With-Dupatta-for-Women">
                                                            <img class="media-object img-responsive"
                                                                src="https://dkten.com/uploads/product_image/product_432_1_thumb.jpg"
                                                                alt="">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">
                                                                <a
                                                                    href="https://dkten.com/home/product_view/432/Indian-Fashion-Tunic-Tops-Cotton-Kurti-Pant-Set-With-Dupatta-for-Women">
                                                                    Indian Fashion Tunic Tops Cotton Kurti Pant Set With
                                                                    Dupatta for Women </a>
                                                            </h4>
                                                            <div class="rateit rateit-bg" data-rateit-value="0"
                                                                data-rateit-ispreset="true" data-rateit-readonly="true">
                                                                <button id="rateit-reset-12" type="button"
                                                                    data-role="none" class="rateit-reset"
                                                                    aria-label="reset rating"
                                                                    aria-controls="rateit-range-12"
                                                                    style="display: none;"><span></span></button>
                                                                <div id="rateit-range-12" class="rateit-range"
                                                                    role="slider" aria-label="rating"
                                                                    aria-owns="rateit-reset-12" aria-valuemin="0"
                                                                    aria-valuemax="5" aria-valuenow="0"
                                                                    style="width: 80px; height: 16px;"
                                                                    aria-readonly="true">
                                                                    <div class="rateit-empty"></div>
                                                                    <div class="rateit-selected rateit-preset"
                                                                        style="height: 16px; width: 0px;"></div>
                                                                    <div class="rateit-hover" style="height: 16px;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="rating">
                                                                <div style="display: none" class="rating ratings_show"
                                                                    data-original-title="0" data-toggle="tooltip"
                                                                    data-placement="left">
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                </div>
                                                            </div>
                                                            <div class="price">

                                                                <ins>NPR3,500.00 </ins>
                                                                <del>NPR4,375.00</del>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <a class="pull-left media-link"
                                                            href="https://dkten.com/home/product_view/430/Mens-Genuine-Long-Slim-Fit-Leather-Jacket">
                                                            <img class="media-object img-responsive"
                                                                src="https://dkten.com/uploads/product_image/product_430_1_thumb.jpg"
                                                                alt="">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">
                                                                <a
                                                                    href="https://dkten.com/home/product_view/430/Mens-Genuine-Long-Slim-Fit-Leather-Jacket">
                                                                    Men's Genuine Long Slim Fit Leather Jacket </a>
                                                            </h4>
                                                            <div class="rateit rateit-bg" data-rateit-value="0"
                                                                data-rateit-ispreset="true" data-rateit-readonly="true">
                                                                <button id="rateit-reset-13" type="button"
                                                                    data-role="none" class="rateit-reset"
                                                                    aria-label="reset rating"
                                                                    aria-controls="rateit-range-13"
                                                                    style="display: none;"><span></span></button>
                                                                <div id="rateit-range-13" class="rateit-range"
                                                                    role="slider" aria-label="rating"
                                                                    aria-owns="rateit-reset-13" aria-valuemin="0"
                                                                    aria-valuemax="5" aria-valuenow="0"
                                                                    style="width: 80px; height: 16px;"
                                                                    aria-readonly="true">
                                                                    <div class="rateit-empty"></div>
                                                                    <div class="rateit-selected rateit-preset"
                                                                        style="height: 16px; width: 0px;"></div>
                                                                    <div class="rateit-hover" style="height: 16px;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="rating">
                                                                <div style="display: none" class="rating ratings_show"
                                                                    data-original-title="0" data-toggle="tooltip"
                                                                    data-placement="left">
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                    <span class="star "></span>
                                                                </div>
                                                            </div>
                                                            <div class="price">

                                                                <ins>NPR12,000.00 </ins>
                                                                <del>NPR12,500.00</del>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                        onclick="open_sidebar();">
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
                                    <div class="thumbnail box-style-1 no-padding" itemscope=""
                                        itemtype="http://schema.org/Product">
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
                                            <h4 itemprop="name" class="caption-title" style="height: 61px;">
                                                <a itemprop="url"
                                                    href="{{ route('product.detail',['product_slug'=>$product->slug]) }}">
                                                    <span itemprop="name">{{ $product->title }}</span>
                                                </a>
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