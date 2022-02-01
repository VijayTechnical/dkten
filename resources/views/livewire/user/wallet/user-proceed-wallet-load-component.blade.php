<div>
    <section class="page-section">
        <div class="wrap container">
            <div class="col-lg-9 col-md-9">
                <div id="profile_content">
                    <div class="details-wrap">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="#" wire:submit.prevent="proceedToLoad()" accept-charset="utf-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input class="form-control required" type="text" placeholder="OTP"
                                                    wire:model="otp">
                                                @error('otp')
                                                <span class="error" role="alert">
                                                    <strong class="text-danger">{{ $message
                                                        }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-theme pull-right signup_btn">
                                                    Proceed </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if ($method)
    @if ($method == 'esewa')
    <form action="https://uat.esewa.com.np/epay/main" method="POST" id="esewaForm">
        <input value="100" name="tAmt" type="hidden">
        <input value="90" name="amt" type="hidden">
        <input value="5" name="txAmt" type="hidden">
        <input value="2" name="psc" type="hidden">
        <input value="3" name="pdc" type="hidden">
        <input value="{{ config('app.esewa_merchent') }}" name="scd" type="hidden">
        <input value="{{ $wallet_id }}" name="pid" type="hidden">
        <input value="http://localhost:8000/user/load-wallet/esewa-verify?q=su" type="hidden" name="su">
        <input value="http://localhost:8000/user/load-wallet/esewa-verify?q=fu" type="hidden" name="fu">
    </form>
    @endif
    @endif
</div>
@push('scripts')
<script>
    window.addEventListener('submitEsewa', function(event) {
    document.getElementById("esewaForm").submit();
});
</script>
@endpush