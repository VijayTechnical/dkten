<div>
    <div class="page-header">
        <h3 class="page-title"> Vendor Commision Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.coupon') }}">Vendor</a></li>
                <li class="breadcrumb-item active" aria-current="page">Commision</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Vendor Commision</h4>
                    <p class="card-description">You can add vendor commision from here</p>
                    <form class="forms-sample" wire:submit.prevent="addCommision()">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vendor_id">Vendor</label>
                                    <select name="vendor_id" id="vendor_id" wire:model="vendor_id" class="form-control">
                                        <option value="">select vendor</option>
                                        @foreach ($vendors as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('vendor_id')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="commision">Commision</label>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <input type="number" id="commision" max="100" step="1.00" value="0.00"
                                                onchange="setTwoNumberDecimal" class="form-control"
                                                wire:model="commision">
                                            @error('commision')
                                            <span class="error" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-2">
                                            <select name="type" id="type" class="form-control">
                                                <option value="%">%</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('admin.vendor') }}" class="btn btn-dark">Back</a>
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