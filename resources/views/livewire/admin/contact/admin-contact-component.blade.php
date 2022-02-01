<div>
    <div class="row">
        <div class="col-md-12 col-xl-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                        <h4 class="card-title">Messages</h4>
                        <p class="text-muted mb-1 small">View all</p>
                    </div>
                    @if ($contacts->count() > 0)
                    <div class="preview-list">
                        @foreach ($contacts as $key => $contact)
                        <div class="preview-item border-bottom">
                            <div class="preview-item-content d-flex flex-grow">
                                <div class="flex-grow">
                                    <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                        <h6 class="preview-subject">{{ $contact->name }}
                                            (Subject:{{ $contact->subject }})</h6>
                                        <p class="text-muted text-small">
                                            {{ $contact->created_at->diffForHumans() }}</p>
                                    </div>
                                    <p class="text-muted">{{ $contact->message }}</p>
                                    <div>
                                        <button
                                            onclick="confirm('Are you sure you want to delete the contact?') || event.stopImmediatePropagation()"
                                            wire:click.prevent="deleteContact({{ $contact->id }})"
                                            class="btn btn-danger"><i class="mdi mdi-delete"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 float-right">
            <ul class="pagination-box">
                {{ $contacts->links('pagination::bootstrap-4') }}
            </ul>
        </div>
    </div>
</div>