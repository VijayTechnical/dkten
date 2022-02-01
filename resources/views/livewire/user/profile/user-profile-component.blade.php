<div>
    <section class="page-section">
        <div class="wrap container">
            <div class="row profile">
                <div class="col-lg-3 col-md-3">
                    <input type="hidden" id="state" value="normal">
                    <div class="widget account-details">
                        <div class="information-title" style="margin-bottom: 0px;">My Profile</div>
                        @livewire('user.components.user-sidebar-component')
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div id="profile_content">
                        <div class="information-title">
                            Profile Information </div>
                        <div class="details-wrap">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tabs-wrapper content-tabs">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab1" data-toggle="tab" aria-expanded="true" wire:ignore>
                                                    Personal Info </a>
                                            </li>
                                            <li class="">
                                                <a href="#tab2" data-toggle="tab" aria-expanded="false" wire:ignore>
                                                    Change Password </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade active in" id="tab1" wire:ignore.self>
                                                <div class="details-wrap">
                                                    <div class="block-title alt">
                                                        <i class="fa fa-angle-down"></i>
                                                        Change Your Profile Information
                                                    </div>
                                                    <div class="details-box">
                                                        <form action="#" wire:submit.prevent="updateProfile()"
                                                            class="form-login" method="post"
                                                            enctype="multipart/form-data" accept-charset="utf-8">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input class="form-control required" type="text"
                                                                            placeholder="First Name"
                                                                            wire:model="first_name">
                                                                        @error('first_name')
                                                                        <span class="error" role="alert">
                                                                            <strong class="text-danger">{{ $message
                                                                                }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input class="form-control required" type="text"
                                                                            placeholder="Last Name"
                                                                            wire:model="last_name">
                                                                        @error('last_name')
                                                                        <span class="error" role="alert">
                                                                            <strong class="text-danger">{{ $message
                                                                                }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input class="form-control emails required"
                                                                            type="email" placeholder="Email"
                                                                            wire:model="email">
                                                                        @error('email')
                                                                        <span class="error" role="alert">
                                                                            <strong class="text-danger">{{ $message
                                                                                }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input class="form-control required"
                                                                            type="phone" placeholder="Phone"
                                                                            wire:model="phone">
                                                                        @error('phone')
                                                                        <span class="error" role="alert">
                                                                            <strong class="text-danger">{{ $message
                                                                                }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <input class="form-control required" type="text"
                                                                            placeholder="Address Line 1"
                                                                            wire:model="line1">
                                                                        @error('line1')
                                                                        <span class="error" role="alert">
                                                                            <strong class="text-danger">{{ $message
                                                                                }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <input class="form-control required" type="text"
                                                                            placeholder="Address Line 2"
                                                                            wire:model="line2">
                                                                        @error('line2')
                                                                        <span class="error" role="alert">
                                                                            <strong class="text-danger">{{ $message
                                                                                }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input class="form-control required" type="text"
                                                                            placeholder="City" wire:model="city">
                                                                        @error('city')
                                                                        <span class="error" role="alert">
                                                                            <strong class="text-danger">{{ $message
                                                                                }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input class="form-control required" type="text"
                                                                            placeholder="State" wire:model="state">
                                                                        @error('state')
                                                                        <span class="error" role="alert">
                                                                            <strong class="text-danger">{{ $message
                                                                                }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input class="form-control required" type="text"
                                                                            placeholder="Country" wire:model="country">
                                                                        @error('country')
                                                                        <span class="error" role="alert">
                                                                            <strong class="text-danger">{{ $message
                                                                                }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input class="form-control required" type="text"
                                                                            placeholder="ZIP" wire:model="zip">
                                                                        @error('zip')
                                                                        <span class="error" role="alert">
                                                                            <strong class="text-danger">{{ $message
                                                                                }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <button type="submit"
                                                                        class="btn btn-theme pull-right signup_btn"
                                                                        data-unsuccessful="Info Update Unsuccessful!"
                                                                        data-success="Info Updated Successfully!"
                                                                        data-ing="Updating..">
                                                                        Update </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab2" wire:ignore.self>
                                                <div class="details-wrap">
                                                    <div class="block-title alt"> <i class="fa fa-angle-down"></i>
                                                        Change Your Password</div>
                                                    <div class="details-box">
                                                        <form action="#" wire:submit.prevent="changePassword"
                                                            class="form-delivery" method="post"
                                                            enctype="multipart/form-data" accept-charset="utf-8">
                                                            <input type="hidden" name="csrf_test_name"
                                                                value="0d97448219b6a798a13bcf06676e247c">

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <input type="password" class="form-control"
                                                                            id="password-current"
                                                                            placeholder="Current Password"
                                                                            wire:model="current_password" />
                                                                        @error('current_password')
                                                                        <div class="help-block with-errors">{{ $message
                                                                            }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <input type="password" class="form-control"
                                                                            id="password-new" placeholder="New Password"
                                                                            wire:model="password" />
                                                                        @error('password')
                                                                        <div class="help-block with-errors">{{ $message
                                                                            }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group" wire:ignore>
                                                                        <input type="password" class="form-control"
                                                                            id="password-confirm"
                                                                            placeholder="Confirm Password"
                                                                            wire:model="password_confirmation" />
                                                                        @error('password_confirmation')
                                                                        <div class="help-block with-errors">{{ $message
                                                                            }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 col-sm-12">
                                                                    <button type="submit" class="btn btn-theme pull-right signup_btn"
                                                                        data-unsuccessful="Password Change Unsuccessful!"
                                                                        data-success="Password Changed Successfully!"
                                                                        data-ing="Updating..">
                                                                        Update

                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>
</div>