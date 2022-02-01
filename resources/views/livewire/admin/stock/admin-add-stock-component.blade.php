<div>
    <div class="page-header">
        <h3 class="page-title"> Stock Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.stock') }}">Stock</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Stock
                        <a href="{{ route('admin.stock') }}" class="btn btn-danger btn-icon-text float-right"><i
                                class="mdi mdi-chevron-double-left btn-icon-prepend"></i> Back </a>
                    </h4>
                    <p class="card-description">Add new Stock from here.</p>
                    <form class="forms-sample" enctype="multipart/form-data" wire:submit.prevent="addStock()">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" id="category_id" class="form-control"
                                        wire:model="category_id">
                                        <option value="0" data-hidden="true">Please select category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sub_category_id">Sub Category</label>
                                    <select name="sub_category_id" id="sub_category_id" class="form-control"
                                        wire:model="sub_category_id">
                                        <option value="0" data-hidden="true">Please select sub category
                                        </option>
                                        @foreach ($sub_categories as $sub_category)
                                        <option value="{{ $sub_category->id }}">{{ $sub_category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('sub_category_id')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product_id">Product</label>
                                    <select name="product_id" id="product_id" class="form-control"
                                        wire:model="product_id" wire:change="setRate">
                                        <option value="0" data-hidden="true">Please select product
                                        </option>
                                        @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->title }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('product_id')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" min="0" max="100000" step="1" value="0.00"
                                        onchange="setTwoNumberDecimal" class="form-control" id="quantity"
                                        wire:model="quantity" wire:change="setTotal">
                                    @error('quantity')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rate">Rate</label>
                                    <input type="number" min="0" step="100" class="form-control" id="rate" wire:model="rate">
                                    @error('rate')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="total">Total</label>
                                    <input type="number" min="0" class="form-control" id="total" wire:model="total">
                                    @error('total')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="entry_note">Entry Note</label>
                                    <textarea class="form-control" id="entry_note" wire:model="entry_note" rows="3"></textarea>
                                    @error('entry_note')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    function setTwoNumberDecimal(event) {
        this.value = parseFloat(this.value).toFixed(2);
    }
</script>
@endpush