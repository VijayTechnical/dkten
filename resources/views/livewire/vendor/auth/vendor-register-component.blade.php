<div>
    <section class="page-section color get_into">
        <div class="container">
            <div class="row margin-top-0">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="logo_top">
                        @if($logo)
                        <img class="img-responsive" src="{{ asset('/storage/logo') }}/{{ $logo->home_header_logo }}"
                            alt="Shop" style="z-index:200">
                        @endif
                    </div>

                    <form action="#" wire:submit.prevent="Register()" class="form-login" method="post"
                        id="sign_form" accept-charset="utf-8">
                        <div class="row box_shape">
                            <div class="title">
                                Vendor Registration
                                <div class="option">
                                    Already A Vendor ? Click To
                                    <a href="{{ route('vendor.dashboard') }}" target="_blank" class="vendor_login_btn">
                                        Login As Vendor
                                    </a>!
                                    Not A Member Yet ? Click To
                                    <a href="{{ route('user.register') }}">
                                        Sign Up As Customer
                                    </a>!
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label" for="demo-hor-2">Vendor Category</label>
                                    <select class="form-control required" data-placeholder="Choose a categories"
                                        style="border-color: rgb(147, 30, 205);" wire:model="vcategory_id">
                                        <option value="">Choose one</option>
                                        @foreach ($vcategories as $key=>$category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('vcategory_id')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label" for="vtype_id">Vendor Type</label>
                                    <div id="cat">
                                        <select name="vtype_id" class="form-control required" wire:model="vtype_id">
                                            <option value="">Choose one</option>
                                            @foreach ($vtypes as $key=>$vtype)
                                            <option value="{{ $vtype->id }}">{{ $vtype->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('vtype_id')
                                        <span class="error" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control required" type="text" placeholder="Name"
                                        wire:model="name">
                                        @error('name')
                                        <span class="error" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control required" type="text" placeholder="Display Name"
                                        wire:model="display_name">
                                        @error('display_name')
                                        <span class="error" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
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
                                    <input class="form-control" type="text" placeholder="Company" wire:model="company">
                                    @error('company')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
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
                            <div class="col-md-12 terms">
                                <input name="terms_check" type="checkbox" value="ok">
                                I Agree With
                                <a href="{{ route('term') }}" target="_blank">
                                    Terms &amp; Conditions
                                </a>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-theme-sm btn-block btn-theme-dark pull-right logup_btn">
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