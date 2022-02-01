<div>
    <div class="page-header">
        <h3 class="page-title"> Slider Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('vendor.dashboard') }}">Vendor</a></li>
                <li class="breadcrumb-item"><a href="{{ route('vendor.slider') }}">Slider</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Vendor Slider
                    </h4>
                    <p class="card-description">Add Vendor Slider from here.</p>
                    <form class="forms-sample" enctype="multipart/form-data" wire:submit.prevent="addSlider()">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="new_banner_image">Banner Image</label>
                                    <input type="file" class="form-control" id="new_banner_image"
                                        wire:model="new_banner_image">
                                    @if ($new_banner_image)
                                    <img src="{{ $new_banner_image->temporaryUrl() }}" width="60" height="60" alt="">
                                    @else
                                    <img src="{{ asset('/storage/vendor/slider/banner_image') }}/{{ $banner_image }}"
                                        width="60" height="60" alt="" />
                                    @endif
                                    @error('new_banner_image')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" wire:ignore.self>
                                    <label for="button_color">Button Color</label>
                                    <input type="text" class="form-control" id="button_color"
                                        wire:model.defer="button_color" name="button_color" /><i
                                        class="mdi mdi-circle" id="button_icon"></i>
                                    @error('button_color')
                                    <div class="help-block with-errors text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" wire:ignore.self>
                                    <label for="text_color">Text Color</label>
                                    <input type="text" class="form-control" id="text_color"
                                        wire:model.defer="text_color" name="text_color" />
                                    <i class="mdi mdi-circle" id="text_icon"></i>
                                    @error('text_color')
                                    <div class="help-block with-errors text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text">Button Text</label>
                                    <input type="text" class="form-control" id="text" placeholder="Button Text"
                                        wire:model="text" />
                                    @error('text')
                                    <div class="help-block with-errors text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="link">Button Link</label>
                                    <input type="text" class="form-control link" id="link" placeholder="Button Link"
                                        wire:model="link" />
                                    @error('link')
                                    <div class="help-block with-errors text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('vendor.slider') }}" class="btn btn-dark">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.1/css/bootstrap-colorpicker.min.css"
    rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.1/js/bootstrap-colorpicker.min.js">
</script>
<script>
    $(document).ready(function(){
        $('#button_color').colorpicker().on('change', function(event) {
            $('#button_icon').css('color', event.color.toString());
        });
        $('#text_color').colorpicker().on('change', function(event) {
            $('#text_icon').css('color', event.color.toString());
        });
    });  
</script>
<script>
    $('form').submit(function() {
            @this.set('button_color', $('[name=button_color]').val());
            @this.set('text_color', $('[name=text_color]').val());
        });
</script>
@endpush