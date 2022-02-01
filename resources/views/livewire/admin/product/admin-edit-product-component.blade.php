<div>
    <div class="page-header">
        <h3 class="page-title"> Product Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.product') }}">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Product
                        <a href="{{ route('admin.product') }}" class="btn btn-danger btn-icon-text float-right"><i
                                class="mdi mdi-chevron-double-left btn-icon-prepend"></i> Back </a>
                    </h4>
                    <p class="card-description">Edit new product from here.</p>
                    <form class="forms-sample" enctype="multipart/form-data" wire:submit.prevent="editProduct()">
                        <ul class="nav nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="detail-tab" data-toggle="tab" href="#detail" role="tab"
                                    aria-controls="detail" aria-selected="true" wire:ignore>Product Details</a>
                            </li>
                            <li class="nav-item">
                                <a id="business-tab" data-toggle="tab" href="#business" role="tab"
                                    aria-controls="business" aria-selected="false" wire:ignore>Business Details</a>
                            </li>
                            <li class="nav-item">
                                <a id="customer_choice-tab" data-toggle="tab" href="#customer_choice" role="tab" aria-controls="customer_choice"
                                    aria-selected="false" wire:ignore>Customer Choice</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="detail" role="tabpanel"
                                aria-labelledby="detail-tab" wire:ignore.self>
                                <div class="detail-cont">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title">Product Title</label>
                                                <input type="text" class="form-control" id="title" placeholder="Title"
                                                    wire:model="title" wire:keyup="generateslug()">
                                                @error('title')
                                                <span class="error" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="slug">Product Slug</label>
                                                <input type="text" class="form-control" id="slug" placeholder="Slug"
                                                    wire:model="slug">
                                                @error('slug')
                                                <span class="error" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="category_id">Product Category</label>
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
                                                <label for="sub_category_id">Product Sub Category</label>
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
                                                <label for="type_id">Product Type</label>
                                                <select name="type_id" id="type_id" class="form-control"
                                                    wire:model="type_id">
                                                    <option value="0" data-hidden="true">Please select type</option>
                                                    @foreach ($types as $type)
                                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('type_id')
                                                <span class="error" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="sub_type_id">Product Sub type</label>
                                                <select name="sub_type_id" id="sub_type_id" class="form-control"
                                                    wire:model="sub_type_id">
                                                    <option value="0" data-hidden="true">Please select sub type</option>
                                                    @foreach ($sub_types as $sub_type)
                                                    <option value="{{ $sub_type->id }}">{{ $sub_type->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('sub_type_id')
                                                <span class="error" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="brand_id">Product brand</label>
                                                <select name="brand_id" id="brand_id" class="form-control"
                                                    wire:model="brand_id">
                                                    <option value="0" data-hidden="true">Please select brand</option>
                                                    @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('brand_id')
                                                <span class="error" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="unit">Product Unit</label>
                                                <input type="text" class="form-control" id="unit"
                                                    placeholder="Unit(Eg:kg,pc,etc)" wire:model="unit">
                                                @error('unit')
                                                <span class="error" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tags">Product Tags</label>
                                                <input type="text" class="form-control" id="tags" placeholder="Tags"
                                                    wire:model="tags">
                                                @error('tags')
                                                <span class="error" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="images">Product Image Gallary</label>
                                                <input type="file" class="form-control" id="images" placeholder="Image"
                                                    wire:model="images" multiple>
                                                @if ($newimages)
                                                    @foreach ($newimages as $image)
                                                        <img src="{{ $image->temporaryUrl() }}" width="60" height="60" alt="">
                                                    @endforeach
                                                @else
                                                    @php
                                                        $images = explode(',', $images);
                                                    @endphp
                                                    @foreach ($images as $key => $image)
                                                        @if ($key >= 1)
                                                            <img src="{{ asset('/storage/product') }}/{{ $image }}"
                                                                width="60" height="60" alt="">
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @error('newimages')
                                                    <span class="error" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group" wire:ignore>
                                                <label for="description">Product Description</label>
                                                <textarea type="text" class="form-control" rows="10" id="description"
                                                    placeholder="Description" wire:model="description"></textarea>
                                                @error('description')
                                                <span class="error" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="seo_title">Product SEO Friendly Title</label>
                                                <p class="text-muted">*Write An Seo Friendly Title Within 60 Characters</p>
                                                <input type="text" class="form-control" id="seo_title"
                                                    placeholder="Ex. Yahama RT - Model 2020" wire:model="seo_title">
                                                @error('seo_title')
                                                <span class="error" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="seo_description">Product SEO Friendly Description</label>
                                                <p class="text-muted">*Write An Seo Friendly Description Within 160 Characters</p>
                                                <textarea type="text" class="form-control" rows="5"
                                                    id="seo_description" placeholder="Ex. New Yamaha Sports Bike in 2020 from Japan."
                                                    wire:model="seo_description"></textarea>
                                                @error('seo_description')
                                                <span class="error" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="business" role="tabpanel" aria-labelledby="business-tab"
                                wire:ignore.self>
                                <div class="business-cont pt-20">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="purchase_price">Product Purchase Price</label>
                                                <input type="text" class="form-control" id="purchase_price"
                                                    placeholder="Purchase Price" wire:model="purchase_price">
                                                @error('purchase_price')
                                                <span class="error" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="sale_price">Product Sale Price</label>
                                                <input type="text" class="form-control" id="sale_price"
                                                    placeholder="Sale Price" wire:model="sale_price">
                                                @error('sale_price')
                                                <span class="error" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="shipping_cost">Product Shipping Cost</label>
                                                <input type="text" class="form-control" id="shipping_cost"
                                                    placeholder="Shipping Cost" wire:model="shipping_cost">
                                                @error('shipping_cost')
                                                <span class="error" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tax">Product Tax</label>
                                                <input type="number" min="0" max="10" step="0.25" value="0.00"
                                                    onchange="setTwoNumberDecimal" placeholder="In (%)"
                                                    class="form-control" id="tax" wire:model="tax">
                                                @error('tax')
                                                <span class="error" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="discount">Product Discount</label>
                                                <input type="number" min="0" max="10" step="0.25" value="0.00"
                                                    onchange="setTwoNumberDecimal" placeholder="In (%)"
                                                    class="form-control" id="discount" wire:model="discount">
                                                @error('discount')
                                                <span class="error" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="customer_choice" role="tabpanel" aria-labelledby="customer_choice-tab"
                                wire:ignore.self>
                                <div class="customer_choice-cont">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <label for="attr">Product Attributes</label>
                                                        <select name="attr" id="attr" class="form-control" wire:model="attr">
                                                            <option value="" data-hidden="true">Please select product attribute
                                                            </option>
                                                            @foreach ($pattributes as $pattribute)
                                                            <option value="{{ $pattribute->id }}">{{ $pattribute->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2"> <button type="button" class="btn btn-info mt-4"
                                                            wire:click.prevent="add"><i class="mdi mdi-plus-box"></i> Add</button>
                                                    </div>
                                                </div>
                                            </div>
                                            @foreach ($inputs as $key => $value)
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter {{ $pattributes->where('id', $attribute_arr[$key])->first()->name }}"
                                                            wire:model="attribute_values.{{ $value }}">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <button type="button" class="btn btn-danger"
                                                            wire:click.prevent="remove({{ $key }})"><i
                                                                class="mdi mdi-delete-sweep"></i> Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" id="submit" class="btn btn-primary mt-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function setTwoNumberDecimal(event) {
            this.value = parseFloat(this.value).toFixed(2);
        }
    </script>
</div>


@push('scripts')
<script>
    $(document).ready(function() {
            const editor1 = CKEDITOR.replace('description');
            document.querySelector("#submit").addEventListener("click", () => {
                @this.set('description', editor1.getData());
            });
        });
</script>
@endpush