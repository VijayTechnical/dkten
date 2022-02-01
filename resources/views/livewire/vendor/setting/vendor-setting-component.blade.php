<div>
    <div class="page-header">
        <h3 class="page-title"> Setting Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('vendor.dashboard') }}">Vendor</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Image Setting
                    </h4>
                    <p class="card-description">Update Image Setting.</p>
                    <form class="forms-sample" enctype="multipart/form-data" wire:submit.prevent="updateImageSetting()">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="new_logo">Logo</label>
                                    <input type="file" class="form-control" id="new_logo" wire:model="new_logo">
                                    @if ($new_logo)
                                    <img src="{{ $new_logo->temporaryUrl() }}" width="60" height="60" alt="">
                                    @else
                                    <img src="{{ asset('/storage/vendor/logo') }}/{{ $logo }}" width="60" height="60"
                                        alt="">
                                    @endif
                                    @error('new_logo')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="new_cover_image">Cover Image</label>
                                    <input type="file" class="form-control" id="new_cover_image"
                                        wire:model="new_cover_image">
                                    @if ($new_cover_image)
                                    <img src="{{ $new_cover_image->temporaryUrl() }}" width="60" height="60" alt="">
                                    @else
                                    <img src="{{ asset('/storage/vendor/cover_image') }}/{{ $cover_image }}" width="60"
                                        height="60" alt="">
                                    @endif
                                    @error('new_cover_image')
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
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Seo Friendly Setting
                    </h4>
                    <p class="card-description">Update Seo Friendly Setting.</p>
                    <form class="forms-sample" enctype="multipart/form-data" wire:submit.prevent="updateSeoSetting()">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="keywords">Keywords</label>
                                    <input type="text" class="form-control" id="keywords"
                                        placeholder="keywords" wire:model="keywords" />
                                    @error('keywords')
                                    <div class="help-block with-errors text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="seo_title">Seo Friendly Title</label>
                                    <p class="text-muted">*Write An Seo Friendly Title Within 60 Characters</p>
                                    <input type="text" class="form-control" id="seo_title"
                                        placeholder="Ex. Nike - Just Do It!" wire:model="seo_title" />
                                    @error('seo_title')
                                    <div class="help-block with-errors text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="seo_description">Seo Friendly Description</label>
                                    <p class="text-muted">*Write An Seo Friendly Description Within 160 Characters</p>
                                    <textarea class="form-control" id="seo_description"
                                        placeholder="Ex. Find Best Athletic Shoes In North America And Europe" wire:model="seo_description" rows="5"></textarea>
                                    @error('seo_description')
                                    <div class="help-block with-errors text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Social Media
                    </h4>
                    <p class="card-description">Update Social Media.</p>
                    <form class="forms-sample" enctype="multipart/form-data" wire:submit.prevent="updateSocialMedia()">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="facebook">Facebook Link</label>
                                    <input type="text" class="form-control" id="facebook"
                                        placeholder="Facebook Link" wire:model="facebook" />
                                    @error('facebook')
                                    <div class="help-block with-errors text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="instagram">Instagram Link</label>
                                    <input type="text" class="form-control" id="instagram"
                                        placeholder="Instagram Link" wire:model="instagram" />
                                    @error('instagram')
                                    <div class="help-block with-errors text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="twitter">Twitter Link</label>
                                    <input type="text" class="form-control" id="twitter"
                                        placeholder="Twitter Link" wire:model="twitter" />
                                    @error('twitter')
                                    <div class="help-block with-errors text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="google">Google Link</label>
                                    <input type="text" class="form-control" id="google"
                                        placeholder="Google Link" wire:model="google" />
                                    @error('google')
                                    <div class="help-block with-errors text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="whatsapp">Whatsapp Link</label>
                                    <input type="text" class="form-control" id="whatsapp"
                                        placeholder="Whatsapp Link" wire:model="whatsapp" />
                                    @error('whatsapp')
                                    <div class="help-block with-errors text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="youtube">Youtube Link</label>
                                    <input type="text" class="form-control" id="youtube"
                                        placeholder="Youtube Link" wire:model="youtube" />
                                    @error('youtube')
                                    <div class="help-block with-errors text-danger">{{ $message }}</div>
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