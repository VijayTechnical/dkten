<div>
    <div class="page-header">
        <h3 class="page-title"> Vendor Type Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.vtype') }}">Vendor Type</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Vendor Type</h4>
                    <p class="card-description">You can add Vendor Type from here</p>
                    <form class="forms-sample" wire:submit.prevent="addVtype()" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="vcategory_id">Vendor Category</label>
                            <select name="vcategory_id" id="vcategory_id" class="form-control"
                                wire:model="vcategory_id">
                                <option value="">None</option>
                                @foreach ($vcategories as $vcategory)
                                <option value="{{ $vcategory->id }}">{{ $vcategory->name }}</option>
                                @endforeach
                            </select>
                            @error('vcategory_id')
                            <span class="error" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Vendor Type Name</label>
                            <input type="text" class="form-control" id="name"
                                placeholder="Enter Vendor Type Name..." wire:model="name" wire:keyup="generateSlug()">
                            @error('name')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Vendor Type Slug</label>
                            <input type="text" class="form-control" id="slug"
                                placeholder="Enter Vendor Type Slug..." wire:model="slug">
                            @error('slug')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Vendor Type Image</label>
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
                        <div class="form-group" wire:ignore>
                            <label for="description">Vendor Type Description</label>
                            <textarea type="text" class="form-control" rows="10" id="description"
                                placeholder="Description" wire:model="description"></textarea>
                            @error('description')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" id="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('admin.vtype') }}" class="btn btn-dark">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
