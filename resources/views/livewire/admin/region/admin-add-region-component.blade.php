<div>
    <div class="page-header">
        <h3 class="page-title"> Shipping Region Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.shipping.region') }}">Shipping Region</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Shipping Region</h4>
                    <p class="card-description">You can add Shipping Region from here</p>
                    <form class="forms-sample" wire:submit.prevent="addShippingRegion()" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Shipping Region Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Name" wire:model="name">
                            @error('name')
                            <span class="error" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('admin.shipping.region') }}" class="btn btn-dark">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>