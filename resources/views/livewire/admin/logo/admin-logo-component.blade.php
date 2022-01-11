<div>
    <div class="page-header">
        <h3 class="page-title"> Logo Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Logo</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Logo</h4>
                    <form class="forms-sample" enctype="multipart/form-data" wire:submit.prevent="updateLogo()">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="new_admin_logo">Admin Logo</label>
                                    <input type="file" class="form-control" id="new_admin_logo"
                                        wire:model="new_admin_logo">
                                    @if ($new_admin_logo)
                                        <img src="{{ $new_admin_logo->temporaryUrl() }}" width="60" height="60"
                                            alt="">
                                    @else
                                        <img src="{{ asset('/storage/logo') }}/{{ $admin_logo }}" width="60"
                                            height="60" alt="">
                                    @endif
                                    @error('new_admin_logo')
                                        <span class="error" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="new_home_header_logo">Home Page Header Logo</label>
                                    <input type="file" class="form-control" id="new_home_header_logo"
                                        wire:model="new_home_header_logo">
                                    @if ($new_home_header_logo)
                                        <img src="{{ $new_home_header_logo->temporaryUrl() }}" width="60" height="60"
                                            alt="">
                                    @else
                                        <img src="{{ asset('/storage/logo') }}/{{ $home_header_logo }}" width="60"
                                            height="60" alt="">
                                    @endif
                                    @error('new_home_header_logo')
                                        <span class="error" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="new_home_footer_logo">Home Page Footer Logo</label>
                                    <input type="file" class="form-control" id="new_home_footer_logo"
                                        wire:model="new_home_footer_logo">
                                    @if ($new_home_footer_logo)
                                        <img src="{{ $new_home_footer_logo->temporaryUrl() }}" width="60" height="60"
                                            alt="">
                                    @else
                                        <img src="{{ asset('/storage/logo') }}/{{ $home_footer_logo }}" width="60"
                                            height="60" alt="">
                                    @endif
                                    @error('new_home_footer_logo')
                                        <span class="error" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="new_mobile_logo">Mobile Logo</label>
                                    <input type="file" class="form-control" id="new_mobile_logo" wire:model="new_mobile_logo">
                                    @if ($new_mobile_logo)
                                        <img src="{{ $new_mobile_logo->temporaryUrl() }}" width="60" height="60" alt="">
                                    @else
                                        <img src="{{ asset('/storage/logo') }}/{{ $mobile_logo }}" width="60"
                                            height="60" alt="">
                                    @endif
                                    @error('new_mobile_logo')
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
