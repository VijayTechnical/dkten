<div>
    <nav class="navigation closed clearfix">
        <ul class="nav sf-menu">
            <li>
                <a href="#">All Categories</a>
                <ul class="allcatdk">
                    @if($categories->count() > 0)
                    @foreach ($categories as $key=>$category)
                    <li class="catsdropdownow"><a class="allcat_drop"> {{ session()->get('locale') == 'en' ?
                            $category->name : $category->nepali_name }}</a>
                        <ul class="allcatdk listdk" style="    width: 200px; height:100%;">
                            @if(count($category->SubCategory) > 0)
                            @foreach ($category->SubCategory as $key=>$sub_category)
                            <li class="catsdropdownextnow">
                                <a
                                    href="{{ route('product.type',['category_id'=>$category->id,'sub_category_id'=>$sub_category->id]) }}">{{
                                    session()->get('locale') == 'en' ? $sub_category->name : $sub_category->nepali_name
                                    }}</a>
                                <ul class="allcatdk bhosdk" style="width: 200px; height:100%; background-color:white;">
                                    @if(count($sub_category->Type) > 0)
                                    @foreach ($sub_category->Type as $key=>$type)
                                    <li class="catsdropdownextnow">
                                        <a
                                            href="{{ route('product.type',['category_id'=>$category->id,'sub_category_id'=>$sub_category->id,'type_id'=>$type->id]) }}">{{
                                            session()->get('locale') == 'en' ? $type->name : $type->nepali_name }}</a>
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
                    {{ session()->get('locale') == 'en' ? $vcategory->name : $vcategory->nepali_name }}
                </a>
            </li>
            @endforeach
            @endif
            <li>
                <a href="#">
                    {{ session()->get('locale') == 'en' ? 'Flights Holiday' : 'यात्रा टिकट र बिदा मनाउने स्थलहरु' }}
                </a>
            </li>
            <li>
                <a href="{{ route('vendor.dashboard') }}">
                    {{ session()->get('locale') == 'en' ? 'Sell On DKten' : 'Dkten मा बेच्नुहोस्' }}
                </a>
            </li>
            <li>
                <a href="{{ route('user.order') }}">
                    {{ session()->get('locale') == 'en' ? 'Track My Order' : 'मेरो अर्डर ट्र्याक गर्नुहोस्' }}
                </a>
            </li>
            <li>
                <a href="{{ route('reffer') }}">
                    {{ session()->get('locale') == 'en' ? 'Reffer And Earn' : 'सन्दर्भ गर्नुहोस् र कमाउनुहोस्' }}
                </a>
            </li>
            <li>
                <a href="{{ route('contact') }}">
                    {{ session()->get('locale') == 'en' ? 'Helpline' : 'हेल्पलाइन' }}
                </a>
            </li>
        </ul>
    </nav>
</div>