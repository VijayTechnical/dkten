<div>
    <div class="page-header">
        <h3 class="page-title"> Shipping Area Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.shipping.area') }}">Shipping Area</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Shipping Area</h4>
                    <p class="card-description">You can add Shipping Area from here</p>
                    <form class="forms-sample" wire:submit.prevent="addShippingArea()" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Shipping Area Name</label>
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
                        <div class="form-group">
                            <label for="city_id">Shipping city</label>
                            <select class="form-control" id="city_id" wire:model="city_id">
                                <option value="">select city</option>
                                @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                            @error('city_id')
                            <span class="error" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="shipping_cost">Shipping Cost</label>
                            <input type="number" min="0" step="50" value="0" onchange="setTwoNumberDecimal"
                                placeholder="Shipping Cost" class="form-control" id="shipping_cost"
                                wire:model="shipping_cost">
                            @error('shipping_cost')
                            <span class="error" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('admin.shipping.area') }}" class="btn btn-dark">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    function setTwoNumberDecimal(event) {
        this.value = parseFloat(this.value).toFixed(2);
    }
</script>
@endpush