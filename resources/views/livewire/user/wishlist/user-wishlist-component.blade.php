<div>
    <section class="page-section">
        <div class="wrap container">
            <!-- <div id="profile-content"> -->
            <div class="row profile">
                <div class="col-lg-3 col-md-3">
                    <input type="hidden" id="state" value="normal">
                    <div class="widget account-details">
                        <div class="information-title" style="margin-bottom: 0px;">My Profile</div>
                        @livewire('user.components.user-sidebar-component')
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div id="profile_content">
                        <div class="information-title">
                            Your Wishlist</div>
                        <div class="wishlist">
                            <table class="table" style="background: #fff;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Availability</th>
                                        <th>Purchase</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody id="result4">
                                    @if (Cart::instance('wishlist')->count() > 0)
                                    @foreach (Cart::instance('wishlist')->content() as $product)
                                    <tr>
                                        <td>{{ $product->model->id }}</td>
                                        <td class="image">
                                            @php
                                            $product_images = explode(',',$product->model->images);
                                            @endphp
                                            @if(count($product_images) > 0)
                                            @foreach ($product_images as $key=>$product_image)
                                            @if($key == 1)
                                            <a class="media-link"
                                                href="{{ route('product.detail',['product_slug'=>$product->model->slug]) }}">
                                                <i class="fa fa-plus"></i>
                                                <img width="100"
                                                    src="{{ asset('/storage/product') }}/{{ $product_image }}"
                                                    alt="{{ $product->model->title }}">
                                            </a>
                                            @endif
                                            @endforeach
                                            @endif
                                        </td>
                                        <td class="description">{{ $product->model->title }}</td>
                                        <td class="price">NPR{{ $product->model->sale_price }}</td>
                                        <td class="add">
                                            <span class="label label-success">
                                                Available </span>
                                        </td>
                                        <td class="add">
                                            <span class="btn btn-theme btn-theme-xs btn-icon-left  ajax-to-cart"
                                                data-pid="400"
                                                wire:click.prevent="store({{ $product->model->id }},'{{ $product->model->title }}',{{ $product->model->sale_price }})">
                                                <i class="fa fa-shopping-cart"></i>
                                                Add To Cart </span>
                                        </td>
                                        <td class="total">
                                            <span class="remove_from_wish"
                                                wire:click.prevent="removewishlist({{ $product->model->id }})"
                                                style="cursor:pointer;" data-pid="400">
                                                <i class="fa fa-trash" style="color: #f00;"></i>
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    <!--/end pagination-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->
        </div>
    </section>
</div>