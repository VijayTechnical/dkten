<div>
    <div class="page-header">
        <h3 class="page-title"> Vendor Element </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Vendor</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> Vendors Table </h4>
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
                        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th> Id </th>
                                    <th> Logo </th>
                                    <th>Display Name</th>
                                    <th> Name </th>
                                    <th> Status </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vendors as $key => $vendor)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class="py-1">
                                        <img src="{{ asset('/storage/vendor/cover_image') }}/{{ $vendor->cover_image }}"
                                            alt="{{ $vendor->name }}" />
                                    </td>
                                    <td>{{ $vendor->display_name }}</td>
                                    <td>{{ $vendor->name }}</td>
                                    <td>
                                        <label class="badge badge-{{ $vendor->status ? 'success' : 'danger' }}">{{
                                            $vendor->status ? 'Approved' : 'Pending' }}</label>
                                    </td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-toggle="modal"
                                            wire:click.prevent="$emitTo('admin.components.modal.admin-vendor-profile-component', 'showVendor', {{ $vendor->id }})"
                                            class="btn btn-secondary"><i class="mdi mdi-eye"></i></a>
                                        <a href="#" class="btn btn-{{ $vendor->status ? 'warning' : 'success'
                                        }}" onclick="confirm('Are you sure you want to change the vendor status?') || event.stopImmediatePropagation()"
                                            wire:click.prevent="editVendor({{ $vendor->id }})"><i class="mdi mdi-{{
                                                    $vendor->status ? 'minus-circle' : 'check' }}"></i></a>
                                        <a href="#"
                                            onclick="confirm('Are you sure you want to delete the vendor?') || event.stopImmediatePropagation()"
                                            wire:click.prevent="deleteVendor({{ $vendor->id }})"
                                            class="btn btn-danger"><i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- PAGINATION-->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center justify-content-lg-end">
                            {{ $vendors->links('pagination::bootstrap-4') }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @livewire('admin.components.modal.admin-vendor-profile-component')
</div>