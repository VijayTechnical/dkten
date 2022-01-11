<div>
    <div class="page-header">
        <h3 class="page-title"> Product Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.product') }}">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Product
                        <a href="{{ route('admin.product') }}" class="btn btn-danger btn-icon-text float-right"><i
                                class="mdi mdi-chevron-double-left btn-icon-prepend"></i> Back </a>
                    </h4>
                    <p class="card-description">Add new product.</p>
                    <form class="forms-sample" enctype="multipart/form-data" wire:submit.prevent="addProduct()">
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
                                    <label for="seo_title">Product SEO Friendly Title</label>
                                    <input type="text" class="form-control" id="seo_title"
                                        placeholder="SEO Friendly Title" wire:model="seo_title">
                                    @error('seo_title')
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
                                    @if ($images)
                                        @foreach ($images as $image)
                                            <img src="{{ $image->temporaryUrl() }}" width="60" height="60" alt="">
                                        @endforeach
                                    @endif
                                    @error('images')
                                        <span class="error" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="sub_category_id">Product Sub Category</label>
                                    <select name="sub_category_id" id="sub_category_id" class="form-control"
                                        wire:model="sub_category_id">
                                        <option value="0" data-hidden="true">Please select sub category</option>
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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="type_id">Product Type</label>
                                    <select name="type_id" id="type_id" class="form-control" wire:model="type_id">
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
                            <div class="col-md-3">
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
                            <div class="col-md-3">
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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="sale_price">Product Sale Price</label>
                                    <input type="text" class="form-control" id="sale_price" placeholder="Sale Price"
                                        wire:model="sale_price">
                                    @error('sale_price')
                                        <span class="error" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tax">Product Tax</label>
                                    <input type="number" min="0" max="10" step="0.25" value="0.00"
                                        onchange="setTwoNumberDecimal" placeholder="In (%)" class="form-control"
                                        id="tax" wire:model="tax">
                                    @error('tax')
                                        <span class="error" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="discount">Product Discount</label>
                                    <input type="number" min="0" max="10" step="0.25" value="0.00"
                                        onchange="setTwoNumberDecimal" placeholder="In (%)" class="form-control"
                                        id="discount" wire:model="discount">
                                    @error('discount')
                                        <span class="error" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="t_deal">Product Today's Deal</label>
                                    <select name="t_deal" id="t_deal" class="form-control" wire:model="t_deal">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="status">Product Status</label>
                                    <select name="status" id="status" class="form-control" wire:model="status">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="featured">Product Featured</label>
                                    <select name="featured" id="featured" class="form-control" wire:model="featured">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="unit">Product Quantity</label>
                                    <input type="text" class="form-control" id="unit" placeholder="Quantity"
                                        wire:model="unit">
                                    @error('unit')
                                        <span class="error" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
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
                                    <div class="row">
                                        <div class="col-md-9">
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
                                        <div class="col-md-3"> <button type="button" class="btn btn-info mt-4"
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
                            <div class="col-md-6">
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
                            <div class="col-md-6">
                                <div class="form-group" wire:ignore>
                                    <label for="seo_description">Product SEO Friendly Description</label>
                                    <textarea type="text" class="form-control" rows="10" id="seo_description"
                                        placeholder="SEO Friendly Description" wire:model="seo_description"></textarea>
                                    @error('seo_description')
                                        <span class="error" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
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
        $(function() {
            tinymce.init({
                selector: '#description',
                setup: function(editor) {
                    editor.on('Change', function(e) {
                        tinyMCE.triggerSave();
                        var d_data = $('#description').val();
                        @this.set('description', d_data);
                    });
                }
            });
            tinymce.init({
                selector: '#seo_description',
                setup: function(editor) {
                    editor.on('Change', function(e) {
                        tinyMCE.triggerSave();
                        var d_data = $('#seo_description').val();
                        @this.set('seo_description', d_data);
                    });
                }
            });
        });
    </script>
@endpush
