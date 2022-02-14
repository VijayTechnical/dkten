<div>
    <div class="page-header">
        <h3 class="page-title"> Shipping City Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.shipping.city') }}">Shipping City</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Shipping City</h4>
                    <p class="card-description">You can edit Shipping City from here</p>
                    <form class="forms-sample" wire:submit.prevent="editShippingCity()" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Shipping City Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Name" wire:model="name">
                            @error('name')
                            <span class="error" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="region_id">Shipping Region</label>
                            <select class="form-control" id="region_id" wire:model="region_id">
                                <option value="">select region</option>
                                @foreach ($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                                @endforeach
                            </select>
                            @error('region_id')
                            <span class="error" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('admin.shipping.city') }}" class="btn btn-dark">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>