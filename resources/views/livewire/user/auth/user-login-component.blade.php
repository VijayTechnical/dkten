<div>
    <section class="page-section color get_into">
        <div class="container">
            <div class="row margin-top-0">
                <div class="col-sm-6 col-sm-offset-2">
                    <div class="logo_top">
                        <a href="https://dkten.com/">

                            <img class="img-responsive" src="https://dkten.com/uploads/logo_image/logo_76.png" alt="Shop"
                                style="z-index:200">
                        </a>
                    </div>
                    <form action="#" wire:submit.prevent="Login()" class="form-login" method="post" id="sign_form"
                        accept-charset="utf-8">
                        <div class="row box_shape">
                            <div class="title">
                                SIGN IN
                                <div class="option">
                                    Not A Member Yet ? Click To
                                    <a href="{{ route('user.register') }}">
                                        Sign Up Now
                                    </a>!
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="form-control emails required" name="email" type="email"
                                        placeholder="Email" data-toggle="tooltip" title="" data-original-title="Email"
                                        wire:model="email">
                                    @error('email')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="form-control pass1 required" type="password" name="password1"
                                        placeholder="Password" data-toggle="tooltip" title=""
                                        data-original-title="Password" wire:model="password">
                                    @error('password')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 terms">
                                <input name="terms_check" type="checkbox" value="ok" wire:model="remember_me">
                                Remember me
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('user.verify.email') }}" class="float-right">forgot password?</a>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-theme-sm btn-block btn-theme-dark pull-right logup_btn"
                                    type="submit">
                                    Login
                                </button>
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex">
                                    <button class="btn btn-facebook mr-2 col">
                                        <i class="mdi mdi-facebook"></i> Facebook </button>
                                    <button class="btn btn-google col">
                                        <i class="mdi mdi-google-plus"></i> Google plus </button>
                                </div>
                                <p class="sign-up">Don't have an Account?<a href="{{ route('user.register') }}"> Sign Up</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
