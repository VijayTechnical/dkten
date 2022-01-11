<div>
    <div class="page-header">
        <h3 class="page-title"> Payment Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.payment') }}">Payment</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Payment</h4>
                    <p class="card-description">You can add Payment from here</p>
                    <form class="forms-sample" wire:submit.prevent="addPayment()" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Payment Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Payment Name..."
                                wire:model="name">
                            @error('name')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Payment Method Logo</label>
                            <input type="file" class="form-control" id="image" wire:model="image">
                            @if ($image)
                                <img src="{{ $image->temporaryUrl() }}" width="60" height="60" alt="">
                            @endif
                            @error('image')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('admin.payment') }}" class="btn btn-dark">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

