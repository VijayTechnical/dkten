<div>
    <div class="page-header">
        <h3 class="page-title"> Faq Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.faq') }}">Faq</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Faq</h4>
                    <p class="card-description">You can edit faq from here</p>
                    <form class="forms-sample" wire:submit.prevent="editFaq()" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" class="form-control" id="question" placeholder="Question"
                                wire:model="question">
                            @error('question')
                            <span class="error" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group" wire:ignore>
                            <label for="answer">Answer</label>
                            <textarea class="form-control" id="answer" wire:model="answer"></textarea>
                        </div>
                        @error('answer')
                        <span class="text-danger text-xs mt-1" role="alert">{{ $message }}</span>
                        @enderror
                        <div class="form-group">
                            <button type="submit" id="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="{{ route('admin.faq') }}" class="btn btn-dark">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(function() {
        const editor1 = CKEDITOR.replace('answer');
            document.querySelector("#submit").addEventListener("click", () => {
                @this.set('answer', editor1.getData());
            });
        });
</script>
@endpush