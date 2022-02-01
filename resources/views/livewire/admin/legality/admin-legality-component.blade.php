<div>
    <div class="page-header">
        <h3 class="page-title"> legality Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update legality</h4>
                    <p class="card-description">You can update legality from here</p>
                    <form class="forms-sample" wire:submit.prevent="updateLegality()" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" wire:ignore>
                                    <label for="return_policy">Return Policy</label>
                                    <textarea type="text" class="form-control" rows="15" id="return_policy"
                                        wire:model="return_policy"></textarea>
                                </div>
                                @error('return_policy')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" wire:ignore>
                                    <label for="mission_and_vision">Mission and Vision</label>
                                    <textarea type="text" class="form-control" rows="15" id="mission_and_vision"
                                        placeholder="mission_and_vision" wire:model="mission_and_vision"></textarea>
                                </div>
                                @error('mission_and_vision')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" wire:ignore>
                                    <label for="legal_information">Legal Information</label>
                                    <textarea type="text" class="form-control" rows="15" id="legal_information"
                                        placeholder="legal_information" wire:model="legal_information"></textarea>
                                </div>
                                @error('legal_information')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" wire:ignore>
                                    <label for="careers">Careers</label>
                                    <textarea type="text" class="form-control" rows="15" id="careers"
                                        placeholder="careers" wire:model="careers"></textarea>
                                </div>
                                @error('careers')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" wire:ignore>
                                    <label for="terms_and_condition">Terms and Condition</label>
                                    <textarea type="text" class="form-control" rows="15" id="terms_and_condition"
                                        placeholder="terms_and_condition" wire:model="terms_and_condition"></textarea>
                                </div>
                                @error('terms_and_condition')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" wire:ignore>
                                    <label for="privacy_and_policy">Privacy and Policy</label>
                                    <textarea type="text" class="form-control" rows="15" id="privacy_and_policy"
                                        placeholder="privacy_and_policy" wire:model="privacy_and_policy"></textarea>
                                </div>
                                @error('privacy_and_policy')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" wire:ignore>
                                    <label for="travel_and_tours">Travel and Tours</label>
                                    <textarea type="text" class="form-control" rows="15" id="travel_and_tours"
                                        placeholder="travel_and_tours" wire:model="Travel and tours"></textarea>
                                </div>
                                @error('travel_and_tours')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" wire:ignore>
                                    <label for="employee_aid">Employee Aid</label>
                                    <textarea type="text" class="form-control" rows="15" id="employee_aid"
                                        placeholder="employee_aid" wire:model="employee_aid"></textarea>
                                </div>
                                @error('employee_aid')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" wire:ignore>
                                    <label for="easy_eservice">Easy Eservice</label>
                                    <textarea type="text" class="form-control" rows="15" id="easy_eservice"
                                        placeholder="easy_eservice" wire:model="easy_eservice"></textarea>
                                </div>
                                @error('easy_eservice')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" wire:ignore>
                                    <label for="shipping">Shipping</label>
                                    <textarea type="text" class="form-control" rows="15" id="shipping"
                                        placeholder="shipping" wire:model="shipping"></textarea>
                                </div>
                                @error('shipping')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" id="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-dark">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(document).ready(function() {
            const editor1 = CKEDITOR.replace('terms_and_condition');
            document.querySelector("#submit").addEventListener("click", () => {
                @this.set('terms_and_condition', editor1.getData());
            });
            const editor2 = CKEDITOR.replace('privacy_and_policy');
            document.querySelector("#submit").addEventListener("click", () => {
                @this.set('privacy_and_policy', editor2.getData());
            });
            const editor3 = CKEDITOR.replace('return_policy');
            document.querySelector("#submit").addEventListener("click", () => {
                @this.set('return_policy', editor3.getData());
            });
            const editor4 = CKEDITOR.replace('mission_and_vision');
            document.querySelector("#submit").addEventListener("click", () => {
                @this.set('mission_and_vision', editor4.getData());
            });
            const editor5 = CKEDITOR.replace('legal_information');
            document.querySelector("#submit").addEventListener("click", () => {
                @this.set('legal_information', editor5.getData());
            });
            const editor6 = CKEDITOR.replace('travel_and_tours');
            document.querySelector("#submit").addEventListener("click", () => {
                @this.set('travel_and_tours', editor6.getData());
            });
            const editor7 = CKEDITOR.replace('easy_eservice');
            document.querySelector("#submit").addEventListener("click", () => {
                @this.set('easy_eservice', editor7.getData());
            });
            const editor8 = CKEDITOR.replace('employee_aid');
            document.querySelector("#submit").addEventListener("click", () => {
                @this.set('employee_aid', editor8.getData());
            });
            const editor9 = CKEDITOR.replace('shipping');
            document.querySelector("#submit").addEventListener("click", () => {
                @this.set('shipping', editor9.getData());
            });
            const editor10 = CKEDITOR.replace('careers');
            document.querySelector("#submit").addEventListener("click", () => {
                @this.set('careers', editor10.getData());
            });
        });
</script>
@endpush