<div>
    <div class="page-header">
        <h3 class="page-title"> Product Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('vendor.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> Products Table
                        <a href="{{ route('vendor.product.add') }}"
                            class="btn btn-light create-new-button float-right">+ Add Products</a>
                    </h4>
                    <div class="table-header">
                        <form action="#" class="mt-1">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <select name="paginate" id="paginate" aria-placeholder="Number of orders"
                                            class="form-control" wire:model="paginate">
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-7"></div>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Search here...." class="form-control"
                                            wire:model="searchTerm">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th> Id </th>
                                    <th> Image </th>
                                    <th> Title </th>
                                    <th> Quantity </th>
                                    <th> Publish </th>
                                    <th> Featured </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    @php
                                    $product_image = product_image($product->id)
                                    @endphp
                                    <td class="py-1">
                                        <img src="{{ asset('/storage/product') }}/{{ $product_image }}"
                                            alt="{{ $product->title }}" />
                                    </td>
                                    <td>{{ $product->title }}</td>
                                    @php
                                    $current_status = product_status($product->id);
                                    @endphp
                                    <td>
                                        @if($current_status['status'] == 'In-Stock')
                                        {{ $current_status['quantity'] }} {{ $product->unit }}
                                        @else
                                        <label class="badge badge-danger">{{ $current_status['status'] }}</label>
                                        @endif
                                    </td>
                                    <td>
                                        <label wire:click.prevent="editPublish({{ $product->id }})"
                                            style="cursor: pointer;"
                                            class="badge badge-{{ $product->status ? 'success' : 'danger' }}">{{
                                            $product->status ? 'Yes' : 'No' }}</label>
                                    </td>
                                    <td>
                                        <label wire:click.prevent="editFeatured({{ $product->id }})"
                                            style="cursor: pointer;"
                                            class="badge badge-{{ $product->featured ? 'success' : 'danger' }}">{{
                                            $product->featured ? 'Yes' : 'No' }}</label>
                                    </td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-toggle="modal"
                                            wire:click.prevent="$emitTo('vendor.components.vendor-product-detail-component', 'open', {{ $product->id }})"
                                            class="btn btn-info"><i class="mdi mdi-eye"></i></a>
                                        <a href="{{ route('vendor.product.edit', ['slug' => $product->slug]) }}"
                                            class="btn btn-primary"><i class="mdi mdi-briefcase-edit"></i></a>
                                        <a href="#"
                                            onclick="confirm('Are you sure you want to delete the product?') || event.stopImmediatePropagation()"
                                            wire:click.prevent="deleteProduct({{ $product->id }})"
                                            class="btn btn-danger"><i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- PAGINATION-->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center justify-content-lg-end">
                            {{ $products->links('pagination::bootstrap-4') }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @livewire('vendor.components.vendor-product-detail-component')
</div>