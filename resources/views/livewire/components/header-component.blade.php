<div>
    <nav class="navigation closed clearfix">
        <ul class="nav sf-menu">
            <li>
                <a href="#">All Categories </a>
                <ul class="allcatdk">
                    @if($categories->count() > 0)
                    @foreach ($categories as $key=>$category)
                    <li class="catsdropdownow"><a class="allcat_drop"> {{ $category->name }}</a>
                        <ul class="allcatdk listdk" style="    width: 200px; height:100%;">
                            @if(count($category->SubCategory) > 0)
                            @foreach ($category->SubCategory as $key=>$sub_category)
                            <li class="catsdropdownextnow">
                                <a
                                    href="{{ route('product.type',['category_slug'=>$category->slug,'sub_category_slug'=>$sub_category->slug]) }}">{{
                                    $sub_category->name }}</a>
                                <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
                                    @if(count($sub_category->Type) > 0)
                                    @foreach ($sub_category->Type as $key=>$type)
                                    <li class="catsdropdownextnow">
                                        <a
                                            href="{{ route('product.type',['category_slug'=>$category->slug,'sub_category_slug'=>$sub_category->slug,'type_slug'=>$type->slug]) }}">{{
                                            $type->name }}</a>
                                    </li>
                                    @endforeach
                                    @endif
                                </ul>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </li>
                    @endforeach
                    @endif
                </ul>
            </li>
            </li>
            @if($vcategories->count() > 0)
            @foreach ($vcategories as $key=>$vcategory)
            <li>
                <a href="{{ route('vendor.category',['vcategory_slug'=>$vcategory->slug]) }}">
                    {{ $vcategory->name }}
                </a>
            </li>
            @endforeach
            @endif
            <li>
                <a href="#">
                    {{ __('header.flight_holiday') }}
                </a>
            </li>
            <li>
                <a href="{{ route('vendor.dashboard') }}">
                    Sell On Dkten
                </a>
            </li>
            <li>
                <a href="{{ route('user.order') }}">
                    Track My Order
                </a>
            </li>
            <li>
                <a href="{{ route('reffer') }}">
                    Reffer And Earn
                </a>
            </li>
            <li>
                <a href="{{ route('contact') }}">
                    Helpline
                </a>
            </li>
        </ul>
    </nav>
</div>