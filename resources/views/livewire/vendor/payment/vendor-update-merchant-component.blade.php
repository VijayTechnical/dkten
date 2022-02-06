<div>
    <div class="page-header">
        <h3 class="page-title"> Esewa Merchant Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('vendor.dashboard') }}">Vendor</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Esewa Merchant Id
                    </h4>
                    <p class="card-description">Update your esewa merchant id from here.</p>
                    <form class="forms-sample" enctype="multipart/form-data" wire:submit.prevent="updateEsewaMerchantId()">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="merchant_id">Esewa Merchant Id</label>
                                    <input type="text" class="form-control" id="merchant_id" placeholder="Esewa Merchant Id"
                                        wire:model="merchant_id">
                                    @error('merchant_id')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>