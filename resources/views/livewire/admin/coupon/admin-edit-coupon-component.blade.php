<div>
    <div class="page-header">
        <h3 class="page-title"> Coupon Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.coupon') }}">Coupon</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Coupon</h4>
                    <p class="card-description">You can edit coupon from here</p>
                    <form class="forms-sample" wire:submit.prevent="updateCoupon()">
                        <div class="form-group">
                            <label for="code">Coupon Code</label>
                            <input type="text" class="form-control" id="code" placeholder="Enter Coupon Code..."
                                wire:model="code">
                            @error('code')
                            <span class="error" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="type">Coupon Type</label>
                           <select name="type" id="type" class="form-control" wire:model="type">
                               <option value="">Select</option>
                               <option value="fixed">Fixed</option>
                               <option value="percent">Percent</option>
                           </select>
                            @error('type')
                            <span class="error" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="value">Coupon Value</label>
                            <input type="text" class="form-control" id="value" placeholder="Enter Coupon Value..."
                                wire:model="value">
                            @error('value')
                            <span class="error" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cart_value">Coupon Cart Value</label>
                            <input type="text" class="form-control" id="cart_value" placeholder="Enter Coupon Cart Value..."
                                wire:model="cart_value">
                            @error('cart_value')
                            <span class="error" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group" wire:ignore>
                            <label for="expiry_date">Coupon Expiry Date</label>
                            <input type="text" class="form-control" id="expiry_date" placeholder="Enter Coupon Expiry Date..."
                                wire:model="expiry_date">
                            @error('expiry_date')
                            <span class="error" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('admin.coupon') }}" class="btn btn-dark">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(function() {
            $('#expiry_date').datetimepicker({
                format: 'Y-MM-DD'
            })
            .on('dp.change', function(ev) {
                var data = $('#expiry_date').val();
                @this.set('expiry_date',data);
            });
        });
    </script>
@endpush

