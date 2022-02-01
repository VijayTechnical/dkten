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
                            Load Wallet </div>
                        <div class="details-wrap">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tabs-wrapper content-tabs">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab1" data-toggle="tab" aria-expanded="true" wire:ignore>
                                                    Load Your Wallet </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade active in" id="tab1" wire:ignore.self>
                                                <div class="details-wrap">
                                                    <div class="block-title alt">
                                                        <i class="fa fa-angle-down"></i>
                                                        Load Your Wallet
                                                    </div>
                                                    <div class="details-box">
                                                        @if(Session::has('wallet_load_success_message'))
                                                        <div class="alert alert-success" role="alert">
                                                            {{ Session::get('wallet_load_success_message') }}
                                                        </div>
                                                        @elseif(Session::has('wallet_load_error_message'))
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ Session::get('wallet_load_error_message') }}
                                                        </div>
                                                        @endif
                                                        <form action="#" wire:submit.prevent="loadWallet()"
                                                            accept-charset="utf-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <input class="form-control required" type="text"
                                                                            placeholder="Amount" wire:model="amount">
                                                                        @error('amount')
                                                                        <span class="error" role="alert">
                                                                            <strong class="text-danger">{{ $message
                                                                                }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <select name="method" class="form-control"
                                                                            id="method" wire:model="method">
                                                                            <option value="">Please Select Payment
                                                                                Method</option>
                                                                            <option value="esewa">Esewa</option>
                                                                            <option value="khalti">Khalti</option>
                                                                        </select>
                                                                    </div>
                                                                    @error('method')
                                                                    <span class="error" role="alert">
                                                                        <strong class="text-danger">{{ $message
                                                                            }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <button type="submit"
                                                                        class="btn btn-theme pull-right signup_btn">
                                                                        Load Now </button>
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