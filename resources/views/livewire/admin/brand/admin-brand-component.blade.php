<div>
    <div class="page-header">
        <h3 class="page-title"> Brand Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Brand</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Brand Table
                        <a href="{{ route('admin.brand.add') }}"
                            class="btn btn-success create-new-button float-right">+ Add brand</a>
                    </h4>
                    <div class="table-header">
                        <form action="#" class="mt-1">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <select name="paginate" id="paginate" aria-placeholder="Number of orders"
                                            class="form-control" wire:model="paginate">
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-7"></div>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Search here...." class="form-control"
                                            wire:model="searchTerm">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $key => $brand)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td class="py-1">
                                            <img src="{{ asset('/storage/brand') }}/{{ $brand->image }}"
                                                alt="{{ $brand->name }}" />
                                        </td>
                                        <td>
                                            {{ $brand->name }}
                                        </td>
                                        <td>
                                            <label wire:click.prevent="statusUpdate({{ $brand->id }})"
                                                style="cursor: pointer;"
                                                class="badge badge-{{ $brand->status ? 'success' : 'danger' }}">{{ $brand->status ? 'Yes' : 'No' }}</label>
                                        </td>
                                        <td>{{ $brand->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('admin.brand.edit', ['slug' => $brand->slug]) }}"
                                                class="btn btn-primary"><i class="mdi mdi-briefcase-edit"></i></a>
                                            <a href="#"
                                                onclick="confirm('Are you sure you want to delete the brand?') || event.stopImmediatePropagation()"
                                                wire:click.prevent="deleteBrand({{ $brand->id }})"
                                                class="btn btn-danger"><i class="mdi mdi-delete"></i></a>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- PAGINATION-->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center justify-content-lg-end">
                            {{ $brands->links('pagination::bootstrap-4') }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
