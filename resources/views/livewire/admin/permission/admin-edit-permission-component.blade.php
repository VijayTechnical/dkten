<div>
    <div class="page-header">
        <h3 class="page-title"> Permission Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.permission') }}">Permission</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Permission</h4>
                    <p class="card-description">You can Edit permission from here</p>
                    <form class="forms-sample" wire:submit.prevent="editPermission()">
                        <div class="form-group">
                            <label for="name">Permission Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Permission Name..."
                                wire:model="name">
                            @error('name')
                            <span class="error" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('admin.permission') }}" class="btn btn-dark">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
