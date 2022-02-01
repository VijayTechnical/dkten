<div>
    <div class="contact-info contact_bg">
        <h2 class="block-title">
            <span>Verify Email</span>
        </h2>
        <div class="media-list">
            <form action="#" class="form-horizontal" wire:submit.prevent="checkEmail()" accept-charset="utf-8">
                <input type="hidden" name="csrf_test_name" value="6a59ba27b4f54e8bf818379d1838e8b9">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="demo-hor-2">Email</label>
                        <div class="col-sm-6">
                            <input type="email" name="email" id="demo-hor-2" class="emails form-control required"
                                placeholder="Email" wire:model="email">
                            @error('email')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>