@push('styles')
    <link rel="stylesheet" href="{{ asset('admin_assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
@endpush
<div>
    <div class="page-header">
        <h3 class="page-title"> Type Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.type') }}">Type</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Type</h4>
                    <p class="card-description">You can Edit Type from here</p>
                    <form class="forms-sample" wire:submit.prevent="editType()" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Type Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Type Name..."
                                wire:model="name" wire:keyup="generateslug()">
                            @error('name')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Type Slug</label>
                            <input type="text" class="form-control" id="slug" placeholder="Enter Type Slug..."
                                wire:model="slug">
                            @error('slug')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="newimage">Type Image</label>
                            <input type="file" class="form-control" id="newimage" wire:model="newimage">
                            @if ($newimage)
                                <img src="{{ $newimage->temporaryUrl() }}" width="60" height="60" alt="">
                            @else
                                <img src="{{ asset('/storage/type') }}/{{ $image }}" width="60" height="60"
                                    alt="">
                            @endif
                            @error('newimage')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type_id">Parent Type</label>
                                    <select name="type_id" id="type_id" class="form-control" wire:model="parent_type_id">
                                        <option value="">None</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category_id">Category</label>
                                        <select name="category_id" id="category_id" class="form-control"
                                            wire:model="category_id">
                                            <option value="">None</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sub_category_id">Sub Category</label>
                                        <select name="sub_category_id" id="sub_category_id" class="form-control"
                                            wire:model="sub_category_id">
                                            <option value="">None</option>
                                            @foreach ($sub_categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            <div class="col-md-6">
                                <div class="form-group" wire:ignore>
                                    <label>Brands</label>
                                    <select class="js-example-basic-multiple" data-placeholder="Select brands"
                                        id="brands" multiple="multiple" style="width:100%" wire:model="sel_brands">
                                        @foreach ($brands as $key => $brand)
                                            <option value="{{ $brand->id }}" @if (is_array($sel_brands) && in_array($brand->id, $sel_brands)) selected @endif>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('admin.type') }}" class="btn btn-dark">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script src="{{ asset('admin_assets/vendors/select2/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#brands").select2();
            $('#brands').on('change', function(e) {
                var data = $('#brands').select2("val");
                @this.set('sel_brands', data);
            });
        });
    </script>
@endpush
