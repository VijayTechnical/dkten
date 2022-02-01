<div>
    <div class="page-header">
        <h3 class="page-title">Social Setting</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Social Setting </li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Social Setting</h4>
                    <form class="forms-sample" action="#" wire:submit.prevent="updateSocialSetting()">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" class="form-control" id="facebook" placeholder="Facebook Link"
                                        wire:model="facebook" />
                                    @error('facebook')
                                    <span class="text-danger text-xs mt-1" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="instagram">Instagram</label>
                                    <input type="text" class="form-control" id="instagram" placeholder="Instagram Link"
                                        wire:model="instagram" />
                                    @error('instagram')
                                    <span class="text-danger text-xs mt-1" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="youtube">Youtube</label>
                                    <input type="text" class="form-control" id="youtube" placeholder="Youtube Link"
                                        wire:model="youtube" />
                                    @error('youtube')
                                    <span class="text-danger text-xs mt-1" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2"> update </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>