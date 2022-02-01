@push('styles')
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin_assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
@endpush
<div>
    <div class="page-header">
        <h3 class="page-title"> Role Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.role') }}">Role</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Role</h4>
                    <p class="card-description">You can Edit Role from here</p>
                    <form class="forms-sample" wire:submit.prevent="editRole()">
                        <div class="form-group">
                            <label for="name">Role Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Role Name..."
                                wire:model="name">
                            @error('name')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group" wire:ignore>
                            <label>Select Permissions</label>
                            <select class="js-example-basic-multiple" id="permissions" multiple="multiple"
                                style="width:100%">
                                @foreach ($permissions as $key => $permission)
                                    <option value="{{ $permission->name }}" @if ( is_array($sel_permissions) && in_array($permission->id, $sel_permissions) ) {{ 'selected' }} @endif>
                                        {{ $permission->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('admin.role') }}" class="btn btn-dark">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <!-- Plugin js for this page -->
    <script src="{{ asset('admin_assets/vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#permissions").select2({
                placeholder: "Select permissions",
            }).prepend('<option selected=""></option>');
            $('#permissions').on('change', function(e) {
                var data = $('#permissions').select2("val");
                @this.set('sel_permissions', data);
            });
        });
    </script>
@endpush
