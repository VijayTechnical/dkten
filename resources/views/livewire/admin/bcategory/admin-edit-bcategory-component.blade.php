<div>
    <div class="page-header">
        <h3 class="page-title"> Blog Category Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.bcategory') }}">Blog Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Blog Category</h4>
                    <p class="card-description">You can Edit Blog Category from here</p>
                    <form class="forms-sample" wire:submit.prevent="editBcategory()" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Blog Category Name</label>
                            <input type="text" class="form-control" id="name"
                                placeholder="Enter Blog Category Name..." wire:model="name" wire:keyup="generateSlug()">
                            @error('name')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Blog Category Slug</label>
                            <input type="text" class="form-control" id="slug"
                                placeholder="Enter Blog Category Slug..." wire:model="slug">
                            @error('slug')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('admin.bcategory') }}" class="btn btn-dark">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

