<div>
    <div class="page-header">
        <h3 class="page-title"> Brand Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.brand') }}">Brand</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Brand</h4>
                    <p class="card-description">You can add Brand from here</p>
                    <form class="forms-sample" wire:submit.prevent="addBrand()" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Brand Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Brand Name..."
                                wire:model="name" wire:keyup="generateslug()">
                            @error('name')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Brand Slug</label>
                            <input type="text" class="form-control" id="slug" placeholder="Enter Brand Slug..."
                                wire:model="slug">
                            @error('slug')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Brand Image</label>
                            <input type="file" class="form-control" id="image" wire:model="image">
                            @if ($image)
                                <img src="{{ $image->temporaryUrl() }}" width="60" height="60" alt="">
                            @endif
                            @error('image')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('admin.brand') }}" class="btn btn-dark">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

