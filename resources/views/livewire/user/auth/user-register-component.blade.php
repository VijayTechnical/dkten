<div>
    <section class="page-section color get_into">
        <div class="container">
            <div class="row margin-top-0">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="logo_top">
                        <a href="{{ route('home') }}">
                            @if($logo)
                            <img class="img-responsive" src="{{ asset('/storage/logo') }}/{{ $logo->home_header_logo }}"
                                alt="Shop" style="z-index:200">
                            @endif
                        </a>
                    </div>
                    <form action="#" wire:submit.prevent="Register()" class="form-login" method="post" id="sign_form"
                        accept-charset="utf-8">
                        <div class="row box_shape">
                            <div class="title">
                                Customer Registration
                                <div class="option">
                                    Already A Member ? Click To
                                    <a href="{{ route('user.dashboard') }}" target="_blank" class="customer_login_btn">
                                        Login As Customer
                                    </a>
                                    or
                                    <a href="{{ route('vendor.register') }}">
                                        Sign Up As Vendor
                                    </a>!
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control required" type="text" placeholder="First Name"
                                        wire:model="first_name">
                                    @error('first_name')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control required" type="text" placeholder="Last Name"
                                        wire:model="last_name">
                                    @error('last_name')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control emails required" type="email" placeholder="Email"
                                        wire:model="email">
                                    @error('email')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control required" type="phone" placeholder="Phone"
                                        wire:model="phone">
                                    @error('phone')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control pass1 required" type="password" placeholder="Password"
                                        wire:model="password">
                                    @error('password')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control pass2 required" type="password"
                                        placeholder="Confirm Password" wire:model="password_confirmation" wire:ignore>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="form-control required" type="text" placeholder="Address Line 1"
                                        wire:model="line1">
                                    @error('line1')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="form-control required" type="text" placeholder="Address Line 2"
                                        wire:model="line2">
                                    @error('line2')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control required" type="text" placeholder="City"
                                        wire:model="city">
                                    @error('city')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control required" type="text" placeholder="State"
                                        wire:model="state">
                                    @error('state')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control required" type="text" placeholder="Country"
                                        wire:model="country">
                                    @error('country')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control required" type="text" placeholder="ZIP" wire:model="zip">
                                    @error('zip')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control required" type="text" placeholder="Reffer Code"
                                        wire:model="reffer_code">
                                </div>
                            </div>
                            <div class="col-md-12 terms">
                                <input name="terms_check" type="checkbox" value="ok">
                                I Agree With
                                <a href="{{ route('term') }}" target="_blank">
                                    Terms &amp; Conditions
                                </a>
                            </div>
                            <div class="col-md-12">
                                <button type="submit"
                                    class="btn btn-theme-sm btn-block btn-theme-dark pull-right logup_btn">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>