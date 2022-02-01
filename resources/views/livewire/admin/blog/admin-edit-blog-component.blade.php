<div>
    <div class="page-header">
        <h3 class="page-title"> Blog Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.blog') }}">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Blog</h4>
                    <p class="card-description">You can edit Blog from here</p>
                    <form class="forms-sample" wire:submit.prevent="editBlog()" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Blog Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Title" wire:model="title"
                                wire:keyup="generateSlug()">
                            @error('title')
                            <span class="error" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Blog Slug</label>
                            <input type="text" class="form-control" id="slug" placeholder="Slug" wire:model="slug">
                            @error('slug')
                            <span class="error" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="newimage">Blog Image</label>
                            <input type="file" class="form-control" id="newimage" wire:model="newimage">
                            @if ($newimage)
                            <img src="{{ $newimage->temporaryUrl() }}" width="60" height="60" alt="">
                            @else
                            <img src="{{ asset('/storage/blog') }}/{{ $image }}" width="60" height="60" alt="">
                            @endif
                            @error('newimage')
                            <span class="error" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="bcategory_id">Blog Category</label>
                            <select id="bcategory_id" class="form-control" wire:model="bcategory_id">
                                @foreach ($bcategories as $key=>$bcategory)
                                <option value="">select category</option>
                                <option value="{{ $bcategory->id }}">{{ $bcategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" wire:ignore>
                            <label for="description">Blog Description</label>
                            <textarea type="text" class="form-control" rows="10" id="description"
                                placeholder="Description" wire:model="description"></textarea>
                            @error('description')
                            <span class="error" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group" wire:ignore>
                            <label for="summary">Blog Summary</label>
                            <textarea type="text" class="form-control" rows="10" id="summary" placeholder="Summary"
                                wire:model="summary"></textarea>
                            @error('summary')
                            <span class="error" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('admin.blog') }}" class="btn btn-dark">Back</a>
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
            tinymce.init({
                selector: '#summary',
                setup: function(editor) {
                    editor.on('Change', function(e) {
                        tinyMCE.triggerSave();
                        var d_data = $('#summary').val();
                        @this.set('summary', d_data);
                    });
                }
            });
        });
</script>
@endpush