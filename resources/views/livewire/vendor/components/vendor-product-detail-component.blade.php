<div>
    @if($product)
    <div wire:ignore.self class="modal fade" id="productView" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $product->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <style>
                    ul {
                        list-style: none;
                    }

                    li {
                        text-decoration: none;
                    }
                </style>
                <div class="modal-body">
                    <div class="row align-items-start">
                        <div class="col-md-12">
                            <ul>
                                <li>
                                    @php
                                    $product_images = explode(',',$product->images);
                                    @endphp
                                    @if(count($product_images) > 0)
                                    @foreach ($product_images as $key=>$product_image)
                                    @if($key == 1)
                                    <div class="related-product image selected" id="main{{ $key }}">
                                        <img itemprop="image" class="img-responsive img"
                                            data-src="{{ asset('/storage/product') }}/{{ $product_image }}"
                                            src="{{ asset('/storage/product') }}/{{ $product_image }}" height="100"
                                            width="100" alt="">
                                    </div>
                                    @endif
                                    @endforeach
                                    @endif
                                </li>
                                <li>
                                    <p>{!! $product->description !!}</p>
                                </li>
                                <li>Title : {{ $product->title }}</li>
                                <li>Category : {{ $product->Category->name }}</li>
                                <li>SubCategory : {{ $product->SubCategory->name }}</li>
                                <li>Brand : {{ $product->Brand->name }}</li>
                                <li>Unit : {{ $product->unit }}</li>
                                <li>Sale Price : {{ $product->sale_price }} / {{ $product->unit }}</li>
                                <li>Purchase Price : {{ $product->purchase_price }} / {{ $product->unit }}</li>
                                <li>Shipping Cost : {{ $product->shipping_cost }}</li>
                                <li>Tax : {{ $product->tax }} / {{ $product->unit }}</li>
                                <li>Discount : {{ $product->discount }} / {{ $product->unit }}</li>
                                <li>Featured : {{ $product->featured ? 'Yes' : 'No' }}</li>
                                <li>Tags : {{ $product->tags }}</li>
                                <li>Status : {{ $product->status ? 'Yes' : 'No' }}</li>
                                @foreach ($product->AttributeValues->unique('product_attribute_id') as $attributeValue)
                                <li>{{ $attributeValue->Attribute->name }} :
                                    @foreach ($attributeValue->Attribute->AttributeValues->where('product_id',
                                    $product->id) as $pav)
                                    {{ $pav->value }},
                                    @endforeach
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>