<div>
    <div class="container">
        <div class="page-header">
            <h2 class="section-title section-title-lg">
                <span>All {{ $vtype_name }} </span>
            </h2>
        </div>
    </div>
    <section class="page-section all-malls">
        <div class="container">
            <div class="row">
                <div class="product">
                    <div id="result" style="display: block;">
                        @if($vendors->count() > 0)
                        @foreach ($vendors as $key=>$vendor)
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="mall-details" itemscope="" itemendor="http://schema.org/Store">
                                <div class="mall-mall">
                                    <img class="img-responsive" itemprop="logo"
                                        src="{{ asset('/storage/vendor/cover_image') }}/{{ $vendor->cover_image }}">
                                </div>
                                <div class="mall-profile">
                                    <h3>
                                        <a href="">
                                            <span itemprop="name">
                                                {{ $vendor->display_name }} </span>
                                        </a>
                                    </h3>
                                </div>
                                <div class="mall-products">
                                    <div class="mall-btn">
                                        <a href="{{ route('vendor.detail',['vendor_display_name'=>$vendor->display_name]) }}"
                                            class="btn btn-custom btn-block btn-theme">
                                            Visit </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center pagination-wrapper"
                            style="padding-top: 10px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>