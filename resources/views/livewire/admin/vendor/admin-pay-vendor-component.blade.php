<div>
    <div class="page-header">
        <h3 class="page-title"> Pay Vendor Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Pay Vendor </li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pay To Vendor</h4>
                    <p class="card-description">Pay to vendor from here.</p>
                    @if(Session::has('vendor_payment_error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('vendor_payment_error') }}
                    </div>
                    @elseif(Session::has('vendor_payment_success'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('vendor_payment_success') }}
                    </div>
                    @endif
                    <form class="forms-sample" enctype="multipart/form-data" wire:submit.prevent="payToVendor()">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vendor_id">Vendor</label>
                                    <select name="vendor_id" id="vendor_id" class="form-control" wire:model="vendor_id"
                                        wire:change="setTotal">
                                        <option value="0" data-hidden="true">Please select vendor</option>
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
                                    <label for="total_amount">Total Amount</label>
                                    <input type="number" min="0" class="form-control" id="total_amount"
                                        wire:model="total_amount">
                                    @error('total_amount')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="commision_percent">Commision Percent</label>
                                    <input type="number" min="0" class="form-control" id="commision_percent"
                                        wire:model="commision_percent">
                                    @error('commision_percent')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="commision_amount">Commision Amount</label>
                                    <input type="number" min="0" class="form-control" id="commision_amount"
                                        wire:model="commision_amount">
                                    @error('commision_amount')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="paid_amount">Amount You Want To Pay</label>
                                    <input type="number" min="0" class="form-control" id="paid_amount"
                                        wire:model="paid_amount">
                                    @error('paid_amount')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="payment_method">Payment Method</label>
                                    <select name="payment_method" id="payment_method" class="form-control"
                                        wire:model="payment_method">
                                        <option value="">Select method</option>
                                        <option value="esewa">Esewa</option>
                                    </select>
                                    @error('payment_method')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if ($payment_method)
    @if ($payment_method == 'esewa' && $merchant_id)
    <form action="https://uat.esewa.com.np/epay/main" method="POST" id="esewaForm">
        <input value="100" name="tAmt" type="hidden">
        <input value="90" name="amt" type="hidden">
        <input value="5" name="txAmt" type="hidden">
        <input value="2" name="psc" type="hidden">
        <input value="3" name="pdc" type="hidden">
        <input value="{{ $merchant_id }}" name="scd" type="hidden">
        <input value="{{ $payment_id }}" name="pid" type="hidden">
        <input value="http://localhost:8000/admin/vendor-payment/esewa-verify?q=su" type="hidden" name="su">
        <input value="http://localhost:8000/admin/vendor-payment/esewa-verify?q=fu" type="hidden" name="fu">
    </form>
    @endif
    @endif
</div>
@push('scripts')
<script>
    function setTwoNumberDecimal(event) {
        this.value = parseFloat(this.value).toFixed(2);
    }
</script>
<script>
    window.addEventListener('submitEsewa', function(event) {
    document.getElementById("esewaForm").submit();
});
</script>
@endpush