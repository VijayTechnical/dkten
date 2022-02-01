<div>
    <div class="page-header">
        <h3 class="page-title"> Faq Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Faq's</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-header">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6 d-flex justify-content-between my-auto">
                                    <h4 class="card-title mt-2">Faq's Table</h4>
                                    <a href="{{ route('admin.faq.add') }}" class="btn btn-light btn-lg float-right">
                                        + Add Faq
                                    </a>
                                </div>
                                <div class="col-lg-2">
                                    <select name="paginate" id="paginate" aria-placeholder="Number of orders"
                                        class="form-control" wire:model="paginate">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" placeholder="Search here...." class="form-control float-right"
                                        wire:model="searchTerm">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Question</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqs as $key => $faq)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        {{ $faq->question }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.faq.edit', ['faq_id' => $faq->id]) }}"
                                            class="btn btn-primary"><i class="mdi mdi-briefcase-edit"></i></a>
                                        <a href="#"
                                            onclick="confirm('Are you sure you want to delete the faq?') || event.stopImmediatePropagation()"
                                            wire:click.prevent="deleteFaq({{ $faq->id }})" class="btn btn-danger"><i
                                                class="mdi mdi-delete"></i></a>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- PAGINATION-->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center justify-content-lg-end">
                            {{ $faqs->links('pagination::bootstrap-4') }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>