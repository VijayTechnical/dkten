<div>
    <div class="page-header">
        <h3 class="page-title"> Category Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.category') }}">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Category</h4>
                    <p class="card-description">You can Edit category from here</p>
                    <form class="forms-sample" wire:submit.prevent="editCategory()" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Category Name..."
                                wire:model="name" wire:keyup="generateslug()">
                            @error('name')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Category Slug</label>
                            <input type="text" class="form-control" id="slug" placeholder="Enter Category Slug..."
                                wire:model="slug">
                            @error('slug')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Category Image</label>
                            <input type="file" class="form-control" id="image" wire:model="newimage">
                            @if ($newimage)
                                <img src="{{ $newimage->temporaryUrl() }}" width="60" height="60" alt="">
                            @else
                                <img src="{{ asset('/storage/category') }}/{{ $image }}" width="60" height="60" alt="">
                            @endif
                            @error('newimage')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="parent_category_id">Parent Category</label>
                            <select name="parent_category_id" id="parent_category_id" class="form-control" wire:model="parent_category_id">
                                <option value="">None</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                        <a href="{{ route('admin.category') }}" class="btn btn-dark">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
