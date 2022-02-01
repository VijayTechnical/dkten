<div>
    <div class="contact-info contact_bg">
        <h2 class="block-title">
            <span>Reffer Earn</span>
        </h2>
        <div class="media-list">
            <form action="#" class="form-horizontal" wire:submit.prevent="sendReffer()" accept-charset="utf-8">
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
                    <input type="hidden" value="" name="reffer_by">
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="demo-hor-4">Reffer Code</label>
                        <div class="col-sm-6">
                            <input type="text" name="reffer_code" id="demo-hor-4" class="form-control "
                                placeholder="Reffer Code" spellcheck="false" data-ms-editor="true" wire:model="code">
                            @error('code')
                            <span class="text-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>