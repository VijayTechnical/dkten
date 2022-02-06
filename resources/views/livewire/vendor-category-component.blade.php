<div>
    <div class="container">
        <div class="page-header">
            <h2 class="section-title section-title-lg">
                <span>All {{ $vcategory_name }} </span>
            </h2>
        </div>
    </div>
    <section class="page-section all-malls">
        <div class="container">
            <div class="row">
                <div class="product">
                    <div id="result" style="display: block;">
                        @if($vtypes->count() > 0)
                        @foreach ($vtypes as $key=>$vtype)
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="mall-details">
                                <div class="mall-mall">
                                    <img class="img-responsive" itemprop="logo"
                                        src="{{ asset('/storage/vtype') }}/{{ $vtype->image }}">
                                </div>
                                <div class="mall-profile">
                                    <h3>
                                        <a href="">
                                            <span itemprop="name">
                                                {{ $vtype->name }} </span>
                                        </a>
                                    </h3>
                                </div>
                                <div class="mall-products">
                                    <div class="mall-btn">
                                        <a href="{{ route('vendor.category.detail',['vcategory_slug'=>$vtype->Category->slug,'vtype_slug'=>$vtype->slug]) }}"
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