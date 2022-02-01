<div>
    <div class="contact-info contact_bg">
        <h2 class="block-title">
            <span>Reset Password</span>
        </h2>
        <div class="media-list">
            <form action="#" class="form-horizontal" wire:submit.prevent="updatePassword()" accept-charset="utf-8">
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
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="demo-hor-2">Password</label>
                        <div class="col-sm-6">
                            <input type="password" name="password" id="demo-hor-2" class="password form-control required"
                                placeholder="password" wire:model="password">
                            @error('password')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group" wire:ignore>
                        <label class="col-sm-4 control-label" for="demo-hor-2">Confirm Password</label>
                        <div class="col-sm-6">
                            <input type="password" name="password_confirmation" id="demo-hor-2" class="password_confirmation form-control required"
                                placeholder="password_confirmation" wire:model="password_confirmation">
                            @error('password_confirmation')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>