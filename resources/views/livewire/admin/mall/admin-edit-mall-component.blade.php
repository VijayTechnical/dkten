<div>
    <div class="page-header">
        <h3 class="page-title"> Shopping Mall Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.mall') }}">Shopping Mall</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Shopping Mall</h4>
                    <p class="card-description">You can Edit Shopping Mall from here</p>
                    <form class="forms-sample" wire:submit.prevent="editMall()" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Shopping Mall Name</label>
                            <input type="text" class="form-control" id="name"
                                placeholder="Enter Shopping Mall Name..." wire:model="name" wire:keyup="generateSlug()">
                            @error('name')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Shopping Mall Slug</label>
                            <input type="text" class="form-control" id="slug"
                                placeholder="Enter Shopping Mall Slug..." wire:model="slug">
                            @error('slug')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Shopping Mall Image</label>
                            <input type="file" class="form-control" id="image" wire:model="newimage">
                            @if ($newimage)
                                <img src="{{ $newimage->temporaryUrl() }}" width="60" height="60" alt="">
                            @else
                                <img src="{{ asset('/storage/mall') }}/{{ $image }}" width="60" height="60"
                                    alt="">
                            @endif
                            @error('newimage')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group" wire:ignore>
                            <label for="description">Shopping Mall Description</label>
                            <textarea type="text" class="form-control" rows="10" id="description"
                                placeholder="Description" wire:model="description"></textarea>
                            @error('description')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('admin.mall') }}" class="btn btn-dark">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(function() {
            tinymce.init({
                selector: '#description',
                setup: function(editor) {
                    editor.on('Change', function(e) {
                        tinyMCE.triggerSave();
                        var d_data = $('#description').val();
                        @this.set('description', d_data);
                    });
                }
            });
        });
    </script>
@endpush
