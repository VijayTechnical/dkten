<div>
    <div class="page-header">
        <h3 class="page-title">General Setting</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page"> General Setting </li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update General Setting</h4>
                    <form class="forms-sample" action="#" wire:submit.prevent="updateGsetting()">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Name"
                                        wire:model="name" />
                                    @error('name')
                                    <span class="text-danger text-xs mt-1" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" placeholder="Email"
                                        wire:model="email" />
                                    @error('email')
                                    <span class="text-danger text-xs mt-1" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" placeholder="Phone"
                                        wire:model="phone" />
                                    @error('phone')
                                    <span class="text-danger text-xs mt-1" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="head_office">Head Office</label>
                                    <input type="text" class="form-control" id="head_office"
                                        placeholder="Head Office Location" wire:model="head_office" />
                                    @error('head_office')
                                    <span class="text-danger text-xs mt-1" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="corporate_office">Corporate Office</label>
                                    <input type="text" class="form-control" id="corporate_office"
                                        placeholder="Corporate Office Location" wire:model="corporate_office" />
                                    @error('corporate_office')
                                    <span class="text-danger text-xs mt-1" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hub_center">Hub Center</label>
                                    <input type="text" class="form-control" id="hub_center"
                                        placeholder="Hub Center Location" wire:model="hub_center" />
                                    @error('hub_center')
                                    <span class="text-danger text-xs mt-1" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" wire:ignore>
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" wire:model="description"></textarea>
                                    @error('description')
                                    <span class="text-danger text-xs mt-1" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" id="submit" class="btn btn-primary mr-2"> update </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@push('scripts')
<script>
    $(function() {
        const editor1 = CKEDITOR.replace('description');
            document.querySelector("#submit").addEventListener("click", () => {
                @this.set('description', editor1.getData());
            });
        });
</script>
@endpush